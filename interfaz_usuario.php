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
        echo "ingrese una opcion:";

    }


    public function opcion() {
        $opcion = trim(fgets(STDIN));
        return $opcion;
    }

    public function eleccionAC($opcion) {
        switch ($opcion) {
            case 1:
                break;
                case 2:
                    break;
                    case 3:
                        break;
                        case 4:
                            break;
                            case 5:
                                break; 
                                case 6:
                                    echo "salinedo del programa...\n";
                                    exit;
                                    default:
                                    echo "opcion invalida\n";
                                }
                            }
                        }
?>