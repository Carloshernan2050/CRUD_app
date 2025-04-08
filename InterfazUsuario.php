<?php
require_once 'Usuario.php';

class InterfazUsuario {
    public Usuario $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function menu() {
        echo "\n===== MENU PRINCIPAL =====\n";
        echo "1. Lista de usuarios\n";
        echo "2. Obtener usuario por ID\n";
        echo "3. Crear usuario\n";
        echo "4. Actualizar usuario\n";
        echo "5. Eliminar usuario\n";
        echo "6. Salir\n";
        echo "Ingrese una opción: ";
    }

    public function opcion() {
        return trim(fgets(STDIN));
    }

    public function eleccionAC($opcion) {
        switch ($opcion) {
            case 1:
                $usuarios = $this->usuario->listarUsuarios();
                foreach ($usuarios as $usuario) {
                    print_r($usuario);
                }
                break;

            case 2:
                echo "Ingrese el ID del usuario: ";
                $id = trim(fgets(STDIN));
                $usuario = $this->usuario->obtenerUsuario($id);
                if ($usuario) {
                    print_r($usuario);
                } else {
                    echo "Usuario no encontrado.\n";
                }
                break;

            case 3:
                echo "Ingrese primer nombre: ";
                $pn = trim(fgets(STDIN));
                echo "Ingrese segundo nombre: ";
                $sn = trim(fgets(STDIN));
                echo "Ingrese primer apellido: ";
                $pa = trim(fgets(STDIN));
                echo "Ingrese segundo apellido: ";
                $sa = trim(fgets(STDIN));
                echo "Ingrese edad: ";
                $edad = trim(fgets(STDIN));
                echo "Ingrese teléfono: ";
                $tel = trim(fgets(STDIN));
                echo "Ingrese correo: ";
                $correo = trim(fgets(STDIN));
                echo "Ingrese dirección: ";
                $dir = trim(fgets(STDIN));

                $resultado = $this->usuario->crearUsuario($pn, $sn, $pa, $sa, $edad, $tel, $correo, $dir);
                echo $resultado ? "Usuario creado exitosamente.\n" : "Error al crear el usuario.\n";
                break;

            case 4:
                echo "Ingrese el ID del usuario a actualizar: ";
                $id = trim(fgets(STDIN));
                echo "Ingrese nuevo primer nombre: ";
                $pn = trim(fgets(STDIN));
                echo "Ingrese nuevo segundo nombre: ";
                $sn = trim(fgets(STDIN));
                echo "Ingrese nuevo primer apellido: ";
                $pa = trim(fgets(STDIN));
                echo "Ingrese nuevo segundo apellido: ";
                $sa = trim(fgets(STDIN));
                echo "Ingrese nueva edad: ";
                $edad = trim(fgets(STDIN));
                echo "Ingrese nuevo teléfono: ";
                $tel = trim(fgets(STDIN));
                echo "Ingrese nuevo correo: ";
                $correo = trim(fgets(STDIN));
                echo "Ingrese nueva dirección: ";
                $dir = trim(fgets(STDIN));

                $resultado = $this->usuario->actualizarUsuario($id, $pn, $sn, $pa, $sa, $edad, $tel, $correo, $dir);
                echo $resultado ? "Usuario actualizado correctamente.\n" : "Error al actualizar el usuario.\n";
                break;

            case 5:
                echo "Ingrese el ID del usuario a eliminar: ";
                $id = trim(fgets(STDIN));
                $resultado = $this->usuario->eliminarUsuario($id);
                echo $resultado ? "Usuario eliminado correctamente.\n" : "Error al eliminar el usuario.\n";
                break;

            case 6:
                echo "Saliendo del programa...\n";
                exit;

            default:
                echo "Opción inválida.\n";
        }
    }
}
