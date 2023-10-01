<?php

namespace Classes;

class Paginacion
{
  public $paginaActual;
  public $registrosPorPagina;
  public $totalRegistros;

  public function __construct(
    $paginaActual = 1,
    $registrosPorPagina = 10,
    $totalRegistros = 0
  )
  {
    $this->paginaActual = (int) $paginaActual;
    $this->registrosPorPagina = (int) $registrosPorPagina;
    $this->totalRegistros = (int) $totalRegistros;
  }
}
