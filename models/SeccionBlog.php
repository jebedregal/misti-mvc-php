<?php

namespace Model;

class SeccionBlog extends ActiveRecord {
    protected static $table = 'seccion_blog';
    protected static $dataBaseColumns = ['id', 'creado', 'imagen', 'titulo', 'descripcion', 'descripcion_entrada'];

    public $id;
    public $imagen;
    public $creado;
    public $titulo;
    public $descripcion;
    public $descripcion_entrada;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->creado = date('Y/m/d H:i');
        $this->imagen = $args['imagen'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->descripcion_entrada = $args['descripcion_entrada'] ?? '';
    }

    public function validate() {
        
        if(!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }

        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        } 
        
        if( strlen( $this->descripcion ) < 50 ) { // Para los caracteres
            self::$errores[] = "Es obligatorio colocar una descripción (min. 50 caracteres)";
        } 

        if( strlen( $this->descripcion_entrada ) < 200 ) { // Para los caracteres
            self::$errores[] = "Es obligatorio colocar una descripción larga para el blog (min. 50 caracteres)";
        } 


        return self::$errores;

    }

}