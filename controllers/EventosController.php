<?php

namespace Controllers;

use MVC\Router;
use Model\Categoria;

class EventosController
{
  public static function index(Router $router)
  {
    $router->render('admin/eventos/index', [
      'titulo' => 'Conferencias y Workshops'
    ]);
  }

  public static function crear(Router $router)
  {
    $alertas = [];
    $categorias = Categoria::all();

    $router->render('admin/eventos/crear', [
      'titulo' => 'Nuevo Evento',
      'alertas' => $alertas,
      'categorias' => $categorias
    ]);
  }
}
