<?php

require_once 'models/Usuario.php';

class UsuarioController {

    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function index() {
        return $this->usuario->listarUsuarios();
    }

    public function show($id) {
        return $this->usuario->obtenerUsuario($id);
    }

    public function store($nombre, $email, $password, $rol) {
        return $this->usuario->crearUsuario($nombre, $email, $password, $rol);
    }

    public function update($id, $nombre, $email, $password, $rol) {
        return $this->usuario->actualizarUsuario($id, $nombre, $email, $password, $rol);
    }

    public function destroy($id) {
        return $this->usuario->eliminarUsuario($id);
    }
}
?>
