<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Categoria;

class EventosController
{
  public static function index(Router $router)
  {
    $paginaActual = $_GET['page'];
    $paginaActual = filter_var($paginaActual, FILTER_VALIDATE_INT);

    if (!$paginaActual || $paginaActual < 1) {
      header('Location: /admin/eventos?page=1');
    }

    $porPagina = 10;
    $total = Evento::total();
    $paginacion = new Paginacion($paginaActual, $porPagina, $total);
    $eventos = Evento::paginar($porPagina, $paginacion->offset());

    $router->render('admin/eventos/index', [
      'titulo' => 'Conferencias y Workshops',
      'paginacion' => $paginacion->paginacion(),
      'eventos' => $eventos
    ]);
  }

  public static function crear(Router $router)
  {
    $alertas = [];
    $categorias = Categoria::all('ASC');
    $dias = Dia::all('ASC');
    $horas = Hora::all('ASC');
    $evento = new Evento();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $evento->sincronizar($_POST);
      $alertas = $evento->validar();

      if (empty($alertas)) {
        $resultado = $evento->guardar();

        if ($resultado) {
          header('Location: /admin/eventos');
        }
      }
    }

    $router->render('admin/eventos/crear', [
      'titulo' => 'Nuevo Evento',
      'alertas' => $alertas,
      'categorias' => $categorias,
      'dias' => $dias,
      'horas' => $horas,
      'evento' => $evento
    ]);
  }
}
