<?php
require_once 'Usuario.php';

class interfazusuario {
    public Usuario $usuario;


    public function __construct() {
        $this->usuario = new Usuario();

    }
    public function menu() {
        
    }

}