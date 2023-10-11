<?php

namespace Controllers;

use MVC\Router;
use Model\Registro;
use Classes\Paginacion;
use Model\Paquete;
use Model\Usuario;

class RegistradosController
{
  public static function index(Router $router)
  {
    if (!isAdmin()) {
      header('Location: /login');
    }

    $paginaActual = $_GET['page'];
    $paginaActual = filter_var($paginaActual, FILTER_VALIDATE_INT);

    if (!$paginaActual || $paginaActual < 1) {
      header('Location: /admin/registrados?page=1');
    }

    $registrosPorPagina = 50;
    $totalRegistros = Registro::total();
    $paginacion = new Paginacion(
      $paginaActual,
      $registrosPorPagina,
      $totalRegistros
    );

    if ($paginacion->totalPaginas() < $paginaActual) {
      header('Location: /admin/registrados?page=1');
    }

    $registros = Registro::paginar($registrosPorPagina, $paginacion->offset());

    foreach ($registros as $registro) {
      $registro->usuario = Usuario::find($registro->usuario_id);
      $registro->paquete = Paquete::find($registro->paquete_id);
    }

    $router->render('admin/registrados/index', [
      'titulo' => 'Usuarios Registrados',
      'registros' => $registros,
      'paginacion' => $paginacion->paginacion()
    ]);
  }
}
