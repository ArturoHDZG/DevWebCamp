<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController
{
  public static function index(Router $router)
  {
    $router->render('admin/ponentes/index', [
      'titulo' => 'Ponentes / Conferencistas'
    ]);
  }

  public static function crear(Router $router)
  {
    $alertas = [];
    $ponente = new Ponente;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (!empty($_FILES['imagen']['tmp_name'])) {
        $carpeta_imagenes = '../public/img/speakers';

        // Crear carpeta si no existe
        if (!is_dir($carpeta_imagenes)) {
          mkdir($carpeta_imagenes, 0777, true);
        }

        $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
        $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);
      }

      $ponente->sincronizar($_POST);

      // Validar
      $alertas = $ponente->validar();
    }

    $router->render('admin/ponentes/crear', [
      'titulo' => 'Registrar Ponente',
      'alertas' => $alertas,
      'ponente' => $ponente
    ]);
  }
}
