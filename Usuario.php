<?php

require_once 'database.php';

class Usuario {
    private PDO $conexion;

    public function __construct() {
        $this->conexion = (new Database())->getConnection();
    }

    // Ver la lista de todos los usuarios
    public function listarUsuarios() {
        $sql = "SELECT * FROM personas";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un usuario específico por su ID
    public function obtenerUsuario($id) {
        $sql = "SELECT * FROM personas WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo usuario
    public function crearUsuario($primernombre, $segundonombre, $primerapellido, $segundoapellido, $edad, $telefono, $correo, $direccion) {
        $sql = "INSERT INTO personas (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, edad, telefono, correo, direccion)
                VALUES (:primernombre, :segundonombre, :primerapellido, :segundoapellido, :edad, :telefono, :correo, :direccion)";
        
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

    // Actualizar los datos de un usuario
    public function actualizarUsuario($id, $primernombre, $segundonombre, $primerapellido, $segundoapellido, $edad, $telefono, $correo, $direccion) {
        $sql = "UPDATE personas
                SET primer_nombre = :primernombre, segundo_nombre = :segundonombre, primer_apellido = :primerapellido, segundo_apellido = :segundoapellido, edad = :edad, telefono = :telefono, correo = :correo, direccion = :direccion
                WHERE id = :id";
        
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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

    // Eliminar un usuario por su ID
    public function eliminarUsuario($id) {
        $sql = "DELETE FROM personas WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
