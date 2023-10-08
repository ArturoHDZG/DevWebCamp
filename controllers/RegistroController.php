<?php

namespace Controllers;

use MVC\Router;

class RegistroController
{
  public static function crear(Router $router)
  {
    if (!isAuth()) {
      header('Location: /login');
    }

    $router->render('registro/crear', [
      'titulo' => 'Finalizar Registro'
    ]);
  }
}
