<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Ponente;
use Model\Categoria;

class PaginasController
{
  public static function index(Router $router)
  {
    $router->render('paginas/index', [
      'titulo' => 'Inicio'
    ]);
  }

  public static function evento(Router $router)
  {
    $router->render('paginas/devwebcamp', [
      'titulo' => 'Sobre DevWebCamp'
    ]);
  }

  public static function paquetes(Router $router)
  {
    $router->render('paginas/paquetes', [
      'titulo' => 'Paquetes DevWebCamp'
    ]);
  }

  public static function conferencias(Router $router)
  {
    $eventos = Evento::ORDENAR('hora_id', 'ASC');
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

    $router->render('paginas/conferencias', [
      'titulo' => 'Conferencias & Workshops',
      'eventos' => $eventosFormateados
    ]);
  }
}
