<?php

namespace Model;

class Admin extends ActiveRecord {

    protected static $table = 'usuarios';
    protected static $dataBaseColumns = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    } 


    public function validate()
    {
        if(!$this->email) {
            self::$errores[] = "E-mail incorrecto o no válido";
        }

        if(!$this->password) {
            self::$errores[] = "Password incorrecto o no válido";
        }


        return self::$errores;
    }


    public function userExists() {
        
        $query = "SELECT * FROM " . self::$table . " WHERE email = '" . $this->email . "'LIMIT 1";

        $resultado = self::$database->query($query);

        if(!$resultado->num_rows) {
            self::$errores[] = 'El usuario no existe';
        }

        return $resultado;
    }

    public function checkPassword($resultado) {
        $user = $resultado->fetch_object();

        $authenticated = password_verify($this->password, $user->password ?? null);

        if(!$authenticated) {
            self::$errores[] = 'Password no válido';
        }

        return $authenticated;

    }

    public function authenticated() {
        session_start();

        // Llenar el arreglo de session
        $_SESSION['user'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}
