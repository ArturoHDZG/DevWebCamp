<?php

function debug($variable) : string {
  echo "<pre>";
  var_dump($variable);
  echo "</pre>";
  exit;
}

function s($html) : string {
  $s = htmlspecialchars($html);
  return $s;
}

function paginaActual($path) : bool {
  return str_contains($_SERVER['PATH_INFO'], $path) ? true : false;
}
