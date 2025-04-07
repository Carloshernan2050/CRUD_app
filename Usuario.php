<?php

require_once 'database.php';

class Usuario {
    private PDO $conexion;

    public function __construct() {
        $this->conexion = (new Database())->getConnection();
    }

    public function listarUsuarios() {
        $sql = "SELECT * FROM personas";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerUsuario($id) {
        $sql = "SELECT * FROM personas WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearUsuario($primernombre, $segundonombre, $primerapellido, $segundoapellido, $edad, $telefono) {
        $sql = "INSERT INTO personas (primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,edad,telefono)
        VALUES ('primernombre','segundonombre','primerapellido','segundoapellido','edad','telefono')";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(':primernombre', $primernombre);
        $stmt->bindParam(':segundonombre', $segundonombre);
        $stmt->bindParam(':primerapellido', $primerapellido);
        $stmt->bindParam(':segundoapellido', $segundoapellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':telefono', $telefono);

        return $stmt->execute();
    }

    public function actualizarUsuario() {
        $sql = "UPDATE personas 
                SET primer_nombre = :primernombre, segundo_nombre = :segundo_nombre, primer_apellido = :primerapellido, segundo_apellido = :segundoapellido, edad = :edad, telefono = :telefono
                WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(':primernombre', $primernombre);
        $stmt->bindParam(':segundonombre', $segundonombre);
        $stmt->bindParam(':primerapellido', $primerapellido);
        $stmt->bindParam(':segundoapellido', $segundoapellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':telefono', $telefono);

        return $stmt;
    }

    public function eliminarUsuario($id)
    {
        
    }
}
