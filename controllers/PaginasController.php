<?php

namespace Controllers;

use MVC\Router;
use Model\SeccionLanches;
use Model\SeccionPratos;
use Model\SeccionSobremesas;
use Model\SeccionBlog;

class PaginasController {

    public static function index(Router $router) {
        
        $seccionLanches = SeccionLanches::get(3);
        $seccionPratos = SeccionPratos::get(3);
        $seccionSobremesas = SeccionSobremesas::all(); // get(3)
        $seccionBlog = SeccionBlog::all();
        $inicio = true;

        $router->render('paginas/index', [
            'seccionLanches' => $seccionLanches,
            'seccionPratos' => $seccionPratos,
            'seccionSobremesas' => $seccionSobremesas,
            'seccionBlog' => $seccionBlog,
            'inicio' => $inicio,
        ]);
    }
    public static function cardapio(Router $router) {
        
        $seccionLanches = SeccionLanches::all();
        $seccionPratos = SeccionPratos::all();
        $seccionSobremesas = SeccionSobremesas::all();

        $router->render('paginas/cardapio', [
            'seccionLanches' => $seccionLanches,
            'seccionPratos' => $seccionPratos,
            'seccionSobremesas' => $seccionSobremesas
        ]);
    }


    public static function sobrenos(Router $router) {
        $router->render('paginas/sobrenos', [
        ]);
    }

    public static function posts(Router $router) {
        $router->render('paginas/posts/posts', [
        ]);

    }
    
    public static function firstPost(Router $router) {
        $router->render('paginas/posts/firstPost', [
        ]);
    }

    public static function secondPost(Router $router) {
        $router->render('paginas/posts/secondPost', [
        ]);
    }
    
    public static function thirdPost(Router $router) {
        $router->render('paginas/posts/thirdPost', [
        ]);
    }





    public static function comunidade(Router $router) {
        $router->render('paginas/comunidade', [
        ]);
    }

    public static function meioAmbiente(Router $router) {
        $router->render('paginas/meioAmbiente', [
        ]);
    }

    public static function seuPedido(Router $router) {
        $router->render('paginas/seuPedido', [
        ]);
    }

    public static function releases(Router $router) {
        $router->render('/paginas/releases', [
        ]);
    }





    public static function privacidade(Router $router) {
        $router->render('/paginas/politicas/privacidade', [
        ]);
    }

    public static function trocaProduto(Router $router) {
        $router->render('/paginas/politicas/trocaProduto', [
        ]);
    }

    public static function termosUso(Router $router) {
        $router->render('/paginas/politicas/termosUso', [
        ]);
    }

    public static function cookies(Router $router) {
        $router->render('/paginas/politicas/cookies', [

        ]);
    }
}