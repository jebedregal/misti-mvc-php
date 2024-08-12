<?php

namespace Controllers;

use MVC\Router;
use Model\SeccionLanches;
use Model\SeccionPratos;
use Model\SeccionSobremesas;
use Model\SeccionBlog;

class TablesController {

    public static function tables(Router $router) {

        // $propiedades = Propiedad::all();
        $seccionLanches = SeccionLanches::all();
        $seccionPratos = SeccionPratos::all();
        $seccionSobremesas = SeccionSobremesas::all();
        $seccionBlog = SeccionBlog::all();

        //Mostrar mensaje condicional URL
        $resultado = $_GET['resultado'] ?? null;

        $router->render('admin/tables', [
            // 'propiedades' => $propiedades,
            'seccionLanches' => $seccionLanches,
            'seccionPratos' => $seccionPratos,
            'seccionSobremesas' => $seccionSobremesas,
            'seccionBlog' => $seccionBlog,

            'resultado' => $resultado
        ]);
    }
}