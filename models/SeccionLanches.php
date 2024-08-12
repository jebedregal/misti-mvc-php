<?php

namespace Model;


class SeccionLanches extends ActiveRecord {
    protected static $table = 'seccion_sandwiches';
    protected static $dataBaseColumns = ['id', 'imagen', 'producto', 'descripcion', 'delivery', 'presentacion', 'precio'];


    public $id;
    public $imagen;
    public $producto;
    public $descripcion;
    public $delivery;
    public $presentacion;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['imagen'] ?? '';
        $this->producto = $args['producto'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->delivery = $args['delivery'] ?? '';
        $this->presentacion = $args['presentacion'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }


    public function validate() {
        
        if(!$this->imagen) {
            self::$errores[] = "Añadir una imagen";
        }

        if(!$this->producto) {
            self::$errores[] = "Añadir un nuevo producto";
        } 
        
        if( strlen( $this->descripcion ) < 50 ) { // Para los caracteres
            self::$errores[] = "Es obligatorio colocar una descripción (min. 50 caracteres)";
        } 

        if(!$this->delivery) {
            self::$errores[] = "Es obligatorio colocar el delivery";
        } 

        if( strlen( $this->presentacion ) < 100 ) {
            self::$errores[] = "Es obligatorio colocar una presentación al producto (min. 100 caracteres)";
        } 

        if(!$this->precio) {
            self::$errores[] = "Añadir un precio";
        } 



        return self::$errores;
}
}