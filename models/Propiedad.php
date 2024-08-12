<?php

namespace Model;


class Propiedad extends ActiveRecord {

    protected static $table = 'propiedades';
    protected static $dataBaseColumns = ['id', 'creado', 'imagen', 'producto', 'descripcion', 'delivery', 'presentacion', 'precio', 'secciones_id' ];

    public $id;
    public $creado;
    public $imagen;
    public $producto;
    public $descripcion;
    public $delivery;
    public $presentacion;
    public $precio;
    public $secciones_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->creado = date('Y/m/d H:i');
        $this->imagen = $args['imagen'] ?? '';
        $this->producto = $args['producto'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->delivery = $args['delivery'] ?? '';
        $this->presentacion = $args['presentacion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->secciones_id = $args['secciones_id'] ?? '';
    }


    public function validate() {
        
        if(!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }

        if(!$this->producto) {
            self::$errores[] = "Debes añadir un producto";
        } 
        
        if( strlen( $this->descripcion ) < 50 ) { // Para los caracteres
            self::$errores[] = "Es obligatorio colocar una descripción (min. 50 caracteres)";
        } 

        if(!$this->delivery) {
            self::$errores[] = "Es obligatorio colocar una empresa delivery o donde pueden encontrar el producto";
        } 

        if( strlen( $this->presentacion ) < 100 ) {
            self::$errores[] = "Es obligatorio colocar una presentación al producto (min. 100 caracteres)";
        } 

        if(!$this->precio) {
            self::$errores[] = "Es obligatorio colocar precio al producto";
        } 
        
        if(!$this->secciones_id) {
            self::$errores[] = "Es obligatorio colocar al producto en una seccion ";
        } 



        return self::$errores;
}

}

