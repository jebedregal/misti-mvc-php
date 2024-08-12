<?php

    namespace Controllers;

    use MVC\Router;
    use Model\SeccionSobremesas;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    class SobremesasController {

        public static function crear(Router $router) {

            $seccionSobremesas = new SeccionSobremesas;

            // Arreglo con mensaje de errores / Validar formulario ->
            $errores = SeccionSobremesas::getErrores();

            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Crear una nueva instancia
                $seccionSobremesas = new SeccionSobremesas($_POST['seccionSobremesas']);
        
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
        
                // Realiza un resize a la imagen con intervention
                if($_FILES['seccionSobremesas']['tmp_name']['imagen']) {
                    $manager = new Image(Driver::class);
                    $image = $manager->read($_FILES['seccionSobremesas']['tmp_name']['imagen'])->cover(800,600);
                    $seccionSobremesas->setImagen($nombreImagen);
                }
        
                // Validar que no hayan campos vacios
                $errores = $seccionSobremesas->validate();
        
                if(empty($errores)) {
        
                    // Crear la carpeta para subir imagenes
                    if(!is_dir(CARPETA_SOBREMESAS)) {
                        mkdir(CARPETA_SOBREMESAS);
                    }
                    
                    // Guardar la imagen en el servidor
                    $image->save(CARPETA_SOBREMESAS . $nombreImagen);
        
        
                    $seccionSobremesas->guardar();
        
                }
        
            }

            $router->render('admin/sobremesas/crear', [
                'seccionSobremesas' => $seccionSobremesas,
                'errores' => $errores
            ]);
        }


        public static function actualizar(Router $router) {

            $id = validateOrRedirect('/admin/tables');
            $seccionSobremesas = SeccionSobremesas::find($id);

            // Arreglo con mensaje de errores / Validar formulario ->
            $errores = SeccionSobremesas::getErrores();


            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Asignar los valores
                $args = $_POST['seccionSobremesas'];
        
                // Sincronizar objeto en memoria
                $seccionSobremesas->syncUp($args);
        
                // Validacion
                $errores = $seccionSobremesas->validate();
        
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
        
        
                if($_FILES['seccionSobremesas']['tmp_name']['imagen']) {
                    $manager = new Image(Driver::class);
                    $image = $manager->read($_FILES['seccionSobremesas']['tmp_name']['imagen'])->cover(800,600);
                    $seccionSobremesas->setImagen($nombreImagen);
                }
        
                if(empty($errores)) {
        
                    if($_FILES['seccionSobremesas']['tmp_name']['imagen']) {
                        $image->save(CARPETA_SOBREMESAS . $nombreImagen);
                    }
        
                    $seccionSobremesas->guardar();
                }
        
            }


            $router->render('admin/sobremesas/actualizar', [
                'seccionSobremesas' => $seccionSobremesas,
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
                        $seccionSobremesas = SeccionSobremesas::find($id);
                        $seccionSobremesas->delete();
                    } 
                    
                }
        
            }
        }

    }