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

    // Obtener el total de cada bloque
    $totalPonentes = Ponente::total();
    $totalConferencias = Evento::total('categoria_id', 1);
    $totalWorkshops = Evento::total('categoria_id', 2);

    // Obtener todos los ponentes
    $todosPonentes = Ponente::all();

    // Formatear Tags
    foreach ($todosPonentes as $ponente) {
      $ponente->tagsArray = explode(',', $ponente->tags);
    }

    // Decodificar Redes Sociales
    foreach ($todosPonentes as $ponente) {
      $ponente->sociales = json_decode($ponente->redes);
    }

    $router->render('paginas/index', [
      'titulo' => 'Inicio',
      'eventos' => $eventosFormateados,
      'ponentes' => $totalPonentes,
      'conferencias' => $totalConferencias,
      'workshops' => $totalWorkshops,
      'todosPonentes' => $todosPonentes
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
