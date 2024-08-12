<?php

namespace Controllers;

use MVC\Router;
use Model\SeccionLanches;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class LanchesController {


    public static function crear(Router $router) {

        $seccionLanches = new SeccionLanches;



        // Arreglo con mensaje de errores / Validar formulario ->
        $errores = SeccionLanches::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            // Crear una nueva instancia
            $seccionLanches = new SeccionLanches($_POST['seccionLanches']);
    
    
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
    
    
            // Realiza un resize a la imagen con intervention
            if($_FILES['seccionLanches']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['seccionLanches']['tmp_name']['imagen'])->cover(800,600);
                $seccionLanches->setImagen($nombreImagen);
            }
    
            // Validar que no hayan campos vacios
            $errores = $seccionLanches->validate();
    
    
            if(empty($errores)) {
    
                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_LANCHES)) {
                    mkdir(CARPETA_LANCHES);
                }
                
                // Guardar la imagen en el servidor
                $image->save(CARPETA_LANCHES . $nombreImagen);
    
    
                $seccionLanches->guardar();
    
            }
        }
        
        $router->render('admin/lanches/crear', [
            'seccionLanches' => $seccionLanches,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        
        $id = validateOrRedirect('/admin/tables');
        $seccionLanches = SeccionLanches::find($id);

        // Arreglo con mensaje de errores / Validar formulario ->
        $errores = SeccionLanches::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            // Asignar los valores
            $args = $_POST['seccionLanches'];
    
            // Sincronizar objeto en memoria
            $seccionLanches->syncUp($args);
            
            // Validacion
            $errores = $seccionLanches->validate();
    
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
    
    
            if($_FILES['seccionLanches']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['seccionLanches']['tmp_name']['imagen'])->cover(800,600);
                $seccionLanches->setImagen($nombreImagen);
            }
    
            if(empty($errores)) {
    
                if($_FILES['seccionLanches']['tmp_name']['imagen']) {
                    $image->save(CARPETA_LANCHES . $nombreImagen);
                }
    
                $seccionLanches->guardar();
            }
        }    


        $router->render('admin/lanches/actualizar', [
            'seccionLanches' => $seccionLanches,
            'errores' => $errores
        ]);
    }

    


    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST')  {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
                $tipo = $_POST['tipo'];
    
                if(validateContentType($tipo)) {
                    $seccionLanches = SeccionLanches::find($id);
                    $seccionLanches->delete();
                } 
                
            }
    
        }
    }
}