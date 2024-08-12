<?php

namespace MVC;

class Router {

    public $routesGET = [];
    public $routesPOST = [];


    public function get($url, $fn) {
        $this->routesGET[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->routesPOST[$url] = $fn;
    }
    

    public function checkRoutes() {

        session_start();
        $auth = $_SESSION['login'] ?? null;


        // Arreglo de rutas protegidas
        $protected_routes = ['/admin', '/admin/tables', 
        '/admin/crear-lanches', '/admin/actualizar-lanches', '/admin/eliminar-lanches', 
        '/admin/pratos-crear', '/admin/pratos-actualizar', '/admin/pratos-eliminar', 
        '/admin/sobremesas-crear', '/admin/sobremesas-actualizar', '/admin/sobremesas-eliminar', 
        '/admin/blog-crear', '/admin/blog-actualizar', '/admin/blog-eliminar', 
        '/logout'];


        $currentUrl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/'; 
        $method = $_SERVER['REQUEST_METHOD'];


        if($method === 'GET') {
            $currentUrl = explode('?', $currentUrl)[0];
            $fn = $this->routesGET[$currentUrl] ?? null;
        } else {
            $currentUrl = explode('?', $currentUrl)[0];
            $fn = $this->routesPOST[$currentUrl] ?? null;
        }

        // Proteger las rutas / urls privadas
        if(in_array($currentUrl, $protected_routes) && !$auth) {
            header('Location: /');
        }

        if($fn) {
            // La URL existe y hay una funcion asociada
            call_user_func($fn, $this);

        } else {
            echo "Página no Encontrada";
        }
    }

    // Muestra una vista

    public function render($view, $datos = []) {

        foreach($datos as $key => $value) {
          $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/'; 

        if(str_contains($currentUrl, '/admin')) {
            include_once __DIR__ . "/views/admin-layout.php";
        } else {
            include_once __DIR__ . "/views/layout.php";
        }


    }
}



// $currentUrl = explode('?', $currentUrl)[0];