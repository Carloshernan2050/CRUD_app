<?php

require_once 'database.php';

class Usuario {
    private PDO $conexion;

    public function __construct() {
        $this->conexion = (new Database())->getConnection();
    }
// funcion para ver la lista de usuarios 
    public function listarUsuarios() {
        $sql = "SELECT * FROM personas";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
//funcion para obtener los datos de un usuario en especifico con su id
    public function obtenerUsuario($id) {
        $sql = "SELECT * FROM personas WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
<<<<<<< HEAD
//funcion para crear un usuario nuevo con todos sus datos y quede guardado en la base de datos
    public function crearUsuario($primernombre, $segundonombre, $primerapellido, $segundoapellido, $edad, $telefono, $correo, $direccion) {
        $sql = "INSERT INTO personas (primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,edad,telefono,correo,direccion)
        VALUES ('Carlos','Hernan','Molina','Arenas','20','3102396198',carloshernan@gmail.com,calle26#54-64)";
=======
    public function crearUsuario($primernombre, $segundonombre, $primerapellido, $segundoapellido, $edad, $telefono) {
        $sql = "INSERT INTO personas (primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,edad,telefono)
        VALUES ('primernombre','segundonombre','primerapellido','segundoapellido','edad','telefono')";

>>>>>>> c52bffdf14db8470d7a22a1b6f3068738f0b6ccf
        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(':primernombre', $primernombre);
        $stmt->bindParam(':segundonombre', $segundonombre);
        $stmt->bindParam(':primerapellido', $primerapellido);
        $stmt->bindParam(':segundoapellido', $segundoapellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo); 
        $stmt->bindParam(':direccion', $direccion);

        return $stmt->execute();
    }
//funcion para actualizar datos del usuario
    public function actualizarUsuario() {
        $sql = "UPDATE personas
                SET primer_nombre = :primernombre, segundo_nombre = :segundo_nombre, primer_apellido = :primerapellido, segundo_apellido = :segundoapellido, edad = :edad, telefono = :telefono, correo = :correo, direccion = :direccion
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(':primernombre', $primernombre);
        $stmt->bindParam(':segundonombre', $segundonombre);
        $stmt->bindParam(':primerapellido', $primerapellido);
        $stmt->bindParam(':segundoapellido', $segundoapellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo); 
        $stmt->bindParam(':direccion', $direccion);

        return $stmt;
    }
//funcion para eliminar usuario
    public function eliminarUsuario($id)
    {
        $sql = "DELETE FROM  personas WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    }
}