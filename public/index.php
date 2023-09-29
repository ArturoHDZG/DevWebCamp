<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\PonentesController;
use Controllers\DashboardController;
use Controllers\EventosController;
use Controllers\RegalosController;
use Controllers\RegistradosController;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/recuperar', [AuthController::class, 'recuperar']);
$router->post('/recuperar', [AuthController::class, 'recuperar']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

// Area de Administración
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

// Area de Administración - Ponentes
$router->get('/admin/ponentes', [PonentesController::class, 'index']);
$router->get('/admin/ponentes/crear', [PonentesController::class, 'crear']);
$router->post('/admin/ponentes/crear', [PonentesController::class, 'crear']);

// Area de Administración - Eventos
$router->get('/admin/eventos', [EventosController::class, 'index']);

// Area de Administración - Usuarios Registrados
$router->get('/admin/registrados', [RegistradosController::class, 'index']);

// Area de Administración - Regalos
$router->get('/admin/regalos', [RegalosController::class, 'index']);


$router->comprobarRutas();
