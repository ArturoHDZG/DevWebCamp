<?php

namespace Controllers;

use Model\EventoHorarios;

class APIEventos
{
  public static function index()
  {
    $categoria_id = $_GET['categoria_id'] ?? '';
    $dia_id = $_GET['dia_id'] ?? '';

    $categoria_id = filter_var($categoria_id, FILTER_VALIDATE_INT);
    $dia_id = filter_var($dia_id, FILTER_VALIDATE_INT);

    if (!$dia_id || !$categoria_id) {
      echo json_encode([]);
      return;
    }

    // Consultar BD
    $eventos = EventoHorarios::whereArray([
      'categoria_id' => $categoria_id,
      'dia_id' => $dia_id
    ]);

    echo json_encode($eventos);
  }
}
