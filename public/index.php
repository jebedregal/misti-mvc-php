<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use MVC\Router;

use Controllers\BlogController;
use Controllers\LanchesController;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\PratosController;
use Controllers\SobremesasController;
use Controllers\TablesController;

$router = new Router();


//* Administración *//
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/tables', [TablesController::class, 'tables']);




//* Seccion Lanches *//
$router->get('/admin/crear-lanches', [LanchesController::class, 'crear']);
$router->post('/admin/crear-lanches', [LanchesController::class, 'crear']);
$router->get('/admin/actualizar-lanches', [LanchesController::class, 'actualizar']);
$router->post('/admin/actualizar-lanches', [LanchesController::class, 'actualizar']);
$router->post('/admin/eliminar-lanches', [LanchesController::class, 'eliminar']);
//* Seccion Pratos *//
$router->get('/admin/pratos-crear', [PratosController::class, 'crear']);
$router->post('/admin/pratos-crear', [PratosController::class, 'crear']);
$router->get('/admin/pratos-actualizar', [PratosController::class, 'actualizar']);
$router->post('/admin/pratos-actualizar', [PratosController::class, 'actualizar']);
$router->post('/admin/pratos-eliminar', [PratosController::class, 'eliminar']);
//* Seccion Sobremesas *//
$router->get('/admin/sobremesas-crear', [SobremesasController::class, 'crear']);
$router->post('/admin/sobremesas-crear', [SobremesasController::class, 'crear']);
$router->get('/admin/sobremesas-actualizar', [SobremesasController::class, 'actualizar']);
$router->post('/admin/sobremesas-actualizar', [SobremesasController::class, 'actualizar']);
$router->post('/admin/sobremesas-eliminar', [SobremesasController::class, 'eliminar']);
//* Seccion Blog *//
$router->get('/admin/blog-crear', [BlogController::class, 'crear']);
$router->post('/admin/blog-crear', [BlogController::class, 'crear']);
$router->get('/admin/blog-actualizar', [BlogController::class, 'actualizar']);
$router->post('/admin/blog-actualizar', [BlogController::class, 'actualizar']);
$router->post('/admin/blog-eliminar', [BlogController::class, 'eliminar']);




//* Páginas Principales *//
$router->get('/', [PaginasController::class, 'index']);
$router->get('/cardapio-misti', [PaginasController::class, 'cardapio']);
$router->get('/sobre-misti', [PaginasController::class, 'sobrenos']);
$router->get('/posts-misti', [PaginasController::class, 'posts']);
$router->get('/posts-misti/lacamento-siteweb', [PaginasController::class, 'firstPost']);
$router->get('/posts-misti/biscoitos-da-vovo', [PaginasController::class, 'secondPost']);
$router->get('/posts-misti/macarons', [PaginasController::class, 'thirdPost']);
//* Páginas Secundarias *//
$router->get('/comunidade-misti', [PaginasController::class, 'comunidade']);
$router->get('/meio-ambiente-misti', [PaginasController::class, 'meioAmbiente']);
$router->get('/seu-pedido-misti', [PaginasController::class, 'seuPedido']);
$router->get('/lancamentos-misti', [PaginasController::class, 'releases']);
//* Páginas Politicas *//
$router->get('/privacidade-misti', [PaginasController::class, 'privacidade']);
$router->get('/troca-de-produto-misti', [PaginasController::class, 'trocaProduto']);
$router->get('/termos-de-uso-misti', [PaginasController::class, 'termosUso']);
$router->get('/cookies-misti', [PaginasController::class, 'cookies']);





//* Login e Autenticación *//
$router->get('/admin/login', [LoginController::class, 'login']);
$router->post('/admin/login', [LoginController::class, 'login']);
$router->get('/admin/logout', [LoginController::class, 'logout']);

$router->checkRoutes();