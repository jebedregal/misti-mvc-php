<?php

namespace Controllers;

use MVC\Router;
use Model\SeccionBlog;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class BlogController {

    public static function crear(Router $router) {

        $seccionBlog = new SeccionBlog;
        
        // Arreglo con mensaje de errores / Validar formulario ->
        $errores = SeccionBlog::getErrores();

        // Ejecutar el codigo despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {


                $seccionBlog = new SeccionBlog($_POST['seccionBlog']);



                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";


                // Realiza un resize a la imagen con intervention
                if($_FILES['seccionBlog']['tmp_name']['imagen']) {
                    $manager = new Image(Driver::class);
                    $image = $manager->read($_FILES['seccionBlog']['tmp_name']['imagen'])->cover(800,600);
                    $seccionBlog->setImagen($nombreImagen);
                }


                $errores = $seccionBlog->validate();

                
                if( empty($errores) ) {   

                    // Crear la carpeta para subir imagenes
                    if(!is_dir(CARPETA_BLOG)) {
                        mkdir(CARPETA_BLOG);
                    }
                    
                    // Guardar la imagen en el servidor
                    $image->save(CARPETA_BLOG . $nombreImagen);
                    
                    // Guardar en la base de datos
                    $seccionBlog->guardar();
            
            }
        }


        $router->render('admin/blog/crear', [
            'errores' => $errores,
            'seccionBlog' => $seccionBlog,

        ]);
    }

    public static function actualizar(Router $router) {
        
        $id = validateOrRedirect('/admin/tables');

        // Otra consulta para Obtener los datos de la propiedad en actualizar
        $seccionBlog = SeccionBlog::find($id);

        // Arreglo con mensaje de errores / Validar formulario ->
         $errores = SeccionBlog::getErrores();


         // Ejecutar el codigo despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['seccionBlog'];

            $seccionBlog->syncUp($args);

            // Validación
            $errores = $seccionBlog->validate();


            // Subida de archivos
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";


            if($_FILES['seccionBlog']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['seccionBlog']['tmp_name']['imagen'])->cover(800,600);
                $seccionBlog->setImagen($nombreImagen);
            }



            if( empty($errores) ) {   // Despues de validarlo coloque la informacion en la base de datos

                if($_FILES['seccionBlog']['tmp_name']['imagen']) {
                    $image->save(CARPETA_BLOG . $nombreImagen);
                }

                $seccionBlog->guardar();

            }

        }


        $router->render('admin/blog/actualizar', [
            'errores' => $errores,
            'seccionBlog' => $seccionBlog
        ]);
    }
        
    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST')  {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
                $tipo = $_POST['tipo'];
    
                if(validateContentType($tipo)) {
                    $seccionBlog = SeccionBlog::find($id);
                    $seccionBlog->delete();
                } 
                
            }
    
        }
    }


}