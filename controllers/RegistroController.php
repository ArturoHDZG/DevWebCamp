<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Paquete;
use Model\Ponente;
use Model\Usuario;
use Model\Registro;
use Model\Categoria;
use Model\Regalo;

class RegistroController
{
  public static function crear(Router $router)
  {
    if (!isAuth()) {
      header('Location: /login');
    }

    // Verificar si el usuario ya esta registrado
    $registro = Registro::where('usuario_id', $_SESSION['id']);

    if (isset($registro) && $registro->paquete_id === '3') {
      header('Location: /boleto?id=' . urlencode($registro->token));
    }

    $router->render('registro/crear', [
      'titulo' => 'Finalizar Registro'
    ]);
  }

  public static function gratis()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if (!isAuth()) {
        header('Location: /login');
      }

      // Verificar si el usuario ya esta registrado
      $registro = Registro::where('usuario_id', $_SESSION['id']);

      if (isset($registro) && $registro->paquete_id === '3') {
        header('Location: /boleto?id=' . urlencode($registro->token));
      }

      // Generar Token
      $token = substr(md5(uniqid(rand(), true)), 0, 8);

      // Crear Registro
      $datos = array(
        'paquete_id' => 3,
        'pago_id' => '',
        'token' => $token,
        'usuario_id' => $_SESSION['id']
      );

      $registro = new Registro($datos);
      $resultado = $registro->guardar();

      if ($resultado) {
        header('Location: /boleto?id=' . urlencode($registro->token));
      }
    }
  }

  public static function boleto(Router $router)
  {
    if (!isAuth()) {
      header('Location: /login');
    }

    $id = $_GET['id'];

    if (!$id || !strlen($id) === 8) {
      header('Location: /');
    }

    // Buscar el Token en la BD
    $registro = Registro::where('token', $id);

    if (!$registro) {
      header('Location: /');
    }

    // Llenar las Tablas de Referencia
    $registro->usuario = Usuario::find($registro->usuario_id);
    $registro->paquete = Paquete::find($registro->paquete_id);

    $router->render('registro/boleto', [
      'titulo' => 'Asistencia a DevWebCamp',
      'registro' => $registro
    ]);
  }

  public static function pagar()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if (!isAuth()) {
        header('Location: /login');
      }

      // Validar si el POST esta vacío
      if (empty($_POST)) {
        echo json_encode([]);
      }

      // Crear Registro
      $datos = $_POST;
      $datos['token'] = substr(md5(uniqid(rand(), true)), 0, 8);
      $datos['usuario_id'] = $_SESSION['id'];

      try {
        $registro = new Registro($datos);
        $resultado = $registro->guardar();
        echo json_encode($resultado);
      } catch (\Throwable $th) {
        echo json_encode(['resultado' => 'error']);
      }
    }
  }

  public static function conferencias(Router $router)
  {
    if (!isAuth()) {
      header('Location: /login');
    }

    // Validar si el usuario tiene el plan presencial
    $usuario_id = $_SESSION['id'];
    $registro = Registro::where('usuario_id', $usuario_id);

    if ($registro->paquete_id !== "1") {
      header('Location: /');
    }

    $eventos = Evento::ordenar('hora_id', 'ASC');
    $eventosFormateados = [];

    foreach ($eventos as $evento) {
      $evento->categoria = Categoria::find($evento->categoria_id);
      $evento->dia = Dia::find($evento->dia_id);
      $evento->hora = Hora::find($evento->hora_id);
      $evento->ponente = Ponente::find($evento->ponente_id);

      if ($evento->dia_id === '1' && $evento->categoria_id === '1') {
        $eventosFormateados['conferencias_s'][] = $evento;
      } elseif ($evento->dia_id === '2' && $evento->categoria_id === '1') {
        $eventosFormateados['conferencias_d'][] = $evento;
      } elseif ($evento->dia_id === '1' && $evento->categoria_id === '2') {
        $eventosFormateados['workshops_s'][] = $evento;
      } elseif ($evento->dia_id === '2' && $evento->categoria_id === '2') {
        $eventosFormateados['workshops_d'][] = $evento;
      }
    }

    $regalos = Regalo::all('ASC');

    // Manejando registro por Fetch y POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if (!isAuth()) {
        header('Location: /login');
      }

      $eventos = explode(',', $_POST['eventos']);

      if (empty($eventos)) {
        echo json_encode(['resultado' => false]);
        return;
      }

      // Recuperar ID del usuario
      $registro = Registro::where('usuario_id', $_SESSION['id']);

      if (!isset($registro) || $registro->paquete_id !== '1') {
        echo json_encode(['resultado' => false]);
        return;
      }

      // Validar disponibilidad de los Eventos Seleccionados
      foreach ($eventos as $evento_id) {
        $evento = Evento::find($evento_id);

        if (!isset($evento) || $evento->disponibles === '0') {
          echo json_encode(['resultado' => false]);
          return;
        }

        $evento->disponibles -= 1;
        debug($evento);
      }
    }

    $router->render('registro/conferencias', [
      'titulo' => 'Elige tus Conferencias y Workshops',
      'eventos' => $eventosFormateados,
      'regalos' => $regalos
    ]);
  }
}
