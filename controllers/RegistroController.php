<?php

namespace Controllers;

use Model\Registro;
use MVC\Router;

class RegistroController
{
  public static function crear(Router $router)
  {
    if (!isAuth()) {
      header('Location: /login');
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
}
