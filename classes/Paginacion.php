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

  public function offset()
  {
    return $this->registrosPorPagina * ($this->paginaActual - 1);
  }

  public function totalPaginas()
  {
    return ceil($this->totalRegistros / $this->registrosPorPagina);
  }

  public function paginaAnterior()
  {
    $anterior = $this->paginaActual - 1;
    return ($anterior > 0) ? $anterior : false;
  }

  public function paginaSiguiente()
  {
    $siguiente = $this->paginaActual + 1;
    return ($siguiente <= $this->totalPaginas()) ? $siguiente : false;
  }
}
