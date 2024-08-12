<?php

    namespace Controllers;

    use MVC\Router;
    use Model\SeccionPratos;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    class PratosController {

        public static function crear(Router $router) {

            $seccionPratos = new SeccionPratos;

            // Arreglo con mensaje de errores / Validar formulario ->
            $errores = SeccionPratos::getErrores();

            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Crear una nueva instancia
                $seccionPratos = new SeccionPratos($_POST['seccionPratos']);
        
        
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
        
        
                // Realiza un resize a la imagen con intervention
                if($_FILES['seccionPratos']['tmp_name']['imagen']) {
                    $manager = new Image(Driver::class);
                    $image = $manager->read($_FILES['seccionPratos']['tmp_name']['imagen'])->cover(800,600);
                    $seccionPratos->setImagen($nombreImagen);
                }
        
                // Validar que no hayan campos vacios
                $errores = $seccionPratos->validate();
        
        
                if(empty($errores)) {
        
                    // Crear la carpeta para subir imagenes
                    if(!is_dir(CARPETA_PRATOS)) {
                        mkdir(CARPETA_PRATOS);
                    }
                    
                    // Guardar la imagen en el servidor
                    $image->save(CARPETA_PRATOS . $nombreImagen);
        
        
                    $seccionPratos->guardar();
        
                }
            }

            $router->render('admin/pratos/crear', [
                'seccionPratos' => $seccionPratos,
                'errores' => $errores
            ]);

        }

        public static function actualizar(Router $router) {

            $id = validateOrRedirect('/admin/tables');
            $seccionPratos = SeccionPratos::find($id);

            // Arreglo con mensaje de errores / Validar formulario ->
            $errores = SeccionPratos::getErrores();


            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Asignar los valores
                $args = $_POST['seccionPratos'];
        
                // Sincronizar objeto en memoria
                $seccionPratos->syncUp($args);
        
                // Validacion
                $errores = $seccionPratos->validate();
        
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
        
        
                if($_FILES['seccionPratos']['tmp_name']['imagen']) {
                    $manager = new Image(Driver::class);
                    $image = $manager->read($_FILES['seccionPratos']['tmp_name']['imagen'])->cover(800,600);
                    $seccionPratos->setImagen($nombreImagen);
                }
        
                if(empty($errores)) {
        
                    if($_FILES['seccionPratos']['tmp_name']['imagen']) {
                        $image->save(CARPETA_PRATOS . $nombreImagen);
                    }
        
                    $seccionPratos->guardar();
                }
        
            }
            
            $router->render('admin/pratos/actualizar', [
                'seccionPratos' => $seccionPratos,
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
                        $seccionPratos = SeccionPratos::find($id);
                        $seccionPratos->delete();
                    } 
                    
                }
        
            }
        }
    }