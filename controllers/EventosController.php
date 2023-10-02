<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
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
    $categorias = Categoria::all('ASC');
    $dias = Dia::all('ASC');
    $horas = Hora::all('ASC');

    $router->render('admin/eventos/crear', [
      'titulo' => 'Nuevo Evento',
      'alertas' => $alertas,
      'categorias' => $categorias,
      'dias' => $dias,
      'horas' => $horas
    ]);
  }
}
