<?php


    define('TEMPLATES_URL', __DIR__ . '/templates');
    define('FUNCIONES_URL', __DIR__ . 'funciones.php');
    define('CARPETA_IMAGENES', __DIR__ . '/../imagenesProductos/');
    define('CARPETA_LANCHES', $_SERVER['DOCUMENT_ROOT'] . '/imagenesLanches/' );
    define('CARPETA_PRATOS', $_SERVER['DOCUMENT_ROOT'] . '/imagenesPratos/' );
    define('CARPETA_SOBREMESAS', $_SERVER['DOCUMENT_ROOT'] . '/imagenesSobremesas/' );
    define('CARPETA_BLOG', $_SERVER['DOCUMENT_ROOT'] . '/imagenesBlog/' );

    // define('CARPETA_LANCHES', __DIR__ . '/../imagenesLanches/');
    // define('CARPETA_PRATOS', __DIR__ . '/../imagenesPratos/');
    // define('CARPETA_SOBREMESAS', __DIR__ . '/../imagenesSobremesas/');


    function addTemplate( string $name, bool $inicio = false ) {  
        include TEMPLATES_URL . "/${name}.php";
    }

    function isAuthenticated() {
        session_start();

        if(!$_SESSION['login']) {
            header('Location: /');
        }

    }


    function debuguear($variable) {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    }


    // Escapa / Sanitizar el HTML
    function s($html) : string {
        $s = htmlspecialchars($html);
        return $s;
    }

    // Validar tipo de Contenido
    function validateContentType($tipo) {
       $tipos = ['seccionBlog', 'seccionSobremesas', 'seccionPratos', 'seccionLanches', 'propiedad'];

        return in_array($tipo, $tipos);
    }

    // Muestra los mensajes

    function showNotification($codigo) {
        $msg = '';

        switch($codigo) {
            case 1:
                $msg = 'Creado Correctamente';
            break;

            case 2:
                $msg = 'Actualizado Correctamente';
            break;

            case 3:
                $msg = 'Eliminado Correctamente';
            break;

            default:
                $msg = false;
            break;
        }

        return $msg;
    }

    function validateOrRedirect(string $url) {
        // Validar que sea un ID valido
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header("Location: ${url}");
        }

        return $id;
    }
