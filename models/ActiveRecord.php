<?php

namespace Model;

class ActiveRecord {

    // DataBase
    protected static $database;
    protected static $table = '';
    protected static $dataBaseColumns = [];

    //Errores
    protected static $errores = [];
    
    public $id;
    public $imagen;

    // Definir la co
    public static function setDataBase($databasecrud) {
        self::$database = $databasecrud;
    }




    public function guardar() {
        if(!is_null($this->id) ) {
            $this->actualizar();
        } else {
            $this->crear();
        }
    }

    
    public function crear() {
        // Sanitizar los datos
        $attributes = $this->sanitizeAttributes();
        
        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$table . " ( ";
        $query .= join(', ', array_keys($attributes));
        $query .= " ) VALUES ('"; 
        $query .= join("', '", array_values($attributes));
        $query .= " ') ";
        
        
        $resultado = self::$database->query($query);
        
        // Mensaje de exito o de error
        if($resultado) {
            // Redireccionar al usuario
            header('Location: /admin/tables?resultado=1');
        }
    }
    
    public function actualizar() {
        //Sanitizar los datos
        $attributes = $this->sanitizeAttributes();
 
        $valores = [];
 
        foreach ($attributes as $key => $value) {
            $valores [] = "{$key}='{$value}'";
        }
    
        $query = "UPDATE " . static::$table ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$database->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        
        $resultado = self::$database->query($query);

        if($resultado) {
            // Redireccionar al usuario
            header('Location: /admin/tables?resultado=2');
        }

    }

    
    // Identificar y unir los atributos a la base de datos
    
    public function attributes() {
        
        $attributes = [];
        
        foreach(static::$dataBaseColumns as $column) {
            if($column === 'id') continue;
            $attributes[$column] = $this->$column;
        }
        
        return $attributes;
    }
    
    
    
    public function sanitizeAttributes() {
        
        $attributes = $this->attributes();
        $sanitized = [];
        
        foreach($attributes as $key => $value ) {
            $sanitized[$key] = self::$database->escape_string($value);
        }
        
        return $sanitized;
        
        
    }
    
    // Subida de archivos
    public function setImagen($imagen) {
        // Elimina la imagen previa
        if( !is_null($this->id) ) {
            // Comprobar si existe el archivo
            $this->deleteImagen();
            $this->deleteImagenLanches();
            $this->deleteImagenPratos();
            $this->deleteImagenSobremesas();
            $this->deleteImagenBlog();
        }
        
        if($imagen) {
            $this->imagen = $imagen;
        }
    }
    
    // Elimina el archivo
    public function deleteImagen() {
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
    
    public function deleteImagenLanches() {
        
        $existeArchivoLanches = file_exists(CARPETA_LANCHES . $this->imagen);
        if($existeArchivoLanches) {
            unlink(CARPETA_LANCHES . $this->imagen);
        }
    }

    public function deleteImagenPratos() {
        $existeArchivoPratos = file_exists(CARPETA_PRATOS . $this->imagen);
        if($existeArchivoPratos) {
            unlink(CARPETA_PRATOS . $this->imagen);
        }
    }

    public function deleteImagenSobremesas() {
        $existeArchivoSobremesas = file_exists(CARPETA_SOBREMESAS . $this->imagen);
        if($existeArchivoSobremesas) {
            unlink(CARPETA_SOBREMESAS . $this->imagen);
        }
    }

    public function deleteImagenBlog() {
        $existeArchivoBlog = file_exists(CARPETA_BLOG . $this->imagen);
        if($existeArchivoBlog) {
            unlink(CARPETA_BLOG . $this->imagen);
        }
    }
    


    // Eliminar un registro
    public function delete() {

        $query = "DELETE FROM "  . static::$table . " WHERE id = " . self::$database->escape_string($this->id) . " LIMIT 1";;
        $resultado = self::$database->query($query);

        if($resultado) {
            $this->deleteImagen();
            $this->deleteImagenLanches();
            $this->deleteImagenPratos();
            $this->deleteImagenSobremesas();
            $this->deleteImagenBlog();
            header('Location: /admin/tables?resultado=3');
        }
    }

    // Validacion 
    public static function getErrores() {
        return static::$errores;
    }

    
    
    public function validate() {
        static::$errores = [];
         return static::$errores;
    }



    // Lista todas las propidades
    public static function all() {

        $query = "SELECT * FROM " . static::$table;

        $resultado = self::consultSQL($query);

        return $resultado;
    }

    // Obtiene determinado numero de registros
    public static function get($amount) {

        $query = "SELECT * FROM " . static::$table . " LIMIT " . $amount;

        $resultado = self::consultSQL($query);

        return $resultado;
    }


    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$table . " WHERE id = ${id}";

        $resultado = self::consultSQL($query);

        return array_shift($resultado);
    }


    public static function consultSQL($query) {
        // Consultar la base de datos
        $resultado = self::$database->query($query);

        // Interar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::createObject($registro);
        }


        // Liberar la mamoria
        $resultado->free();
        
        // Retornar los resultados
        return $array;
    }


    protected static function createObject($registro) {
        $objeto = new static;


        foreach($registro as $key => $value ) {
            if( property_exists( $objeto, $key ) ) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Sincroniza el objeto en memoria con los cambios realizados por el ususario
    public function syncUp( $args = []) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}