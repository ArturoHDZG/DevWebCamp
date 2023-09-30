<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController
{
  public static function index(Router $router)
  {
    $ponentes = Ponente::all();

    $router->render('admin/ponentes/index', [
      'titulo' => 'Ponentes / Conferencistas',
      'ponentes' => $ponentes
    ]);
  }

  public static function crear(Router $router)
  {
    $alertas = [];
    $redes = [];
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

        $nombre_imagen = md5(uniqid(rand(), true));

        $_POST['imagen'] = $nombre_imagen;
      }

      // Convertir array de redes sociales a string
      $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

      $ponente->sincronizar($_POST);

      $redes = json_decode($ponente->redes);

      // Validar
      $alertas = $ponente->validar();

      //Guardar registro
      if (empty($alertas)) {
        //Guardar imágenes en el servidor
        $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
        $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

        // Guardar datos en la BD
        $resultado = $ponente->guardar();

        if ($resultado) {
          header('Location: /admin/ponentes');
        }
      }
    }

    $router->render('admin/ponentes/crear', [
      'titulo' => 'Registrar Ponente',
      'alertas' => $alertas,
      'ponente' => $ponente,
      'redes' => $redes
    ]);
  }

  public static function editar(Router $router)
  {
    $alertas = [];

    // Validar ID
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
      header('Location: /admin/ponentes');
    }

    // Recuperar Registro de la BD
    $ponente = Ponente::find($id);
    $redes = json_decode($ponente->redes);

    if (!$ponente) {
      header('Location: /admin/ponentes');
    }

    $ponente->imagen_actual = $ponente->imagen;

    $router->render('admin/ponentes/editar', [
      'titulo' => 'Editar Ponente',
      'alertas' => $alertas,
      'ponente' => $ponente,
      'redes' => $redes
    ]);
  }
}
