<?php
require_once 'Usuario.php';

class interfazusuario {
    public Usuario $usuario;


    public function __construct() {
        $this->usuario = new Usuario();

    }
    public function menu() {
        echo "MENU PRINCIPAL \n";
        echo "1. Lista de usuarios \n";
        echo "2. Obtener usuario por id \n";
        echo "3. Crear usuario \n";
        echo "4. Actualizar usuario \n";
        echo "5. Eliminar usuario \n";
        echo "6. Salir \n";
    }
    function opccion() {
        $opcion = fgets(STDIN);

        $opcion = trim($opcion);
        return $opcion;
    }

    function eleccionAC() {
        if($opcion = 1) {
            
        }
    }
    

    }

}