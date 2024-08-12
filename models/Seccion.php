<?php


namespace Model;


class Seccion extends ActiveRecord {

    protected static $table = 'secciones';
    protected static $dataBaseColumns = ['id', 'seccion_producto'];

    public $id;
    public $seccion_producto;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['seccion_producto'] ?? '';
    }

}