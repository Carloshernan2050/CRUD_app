<?php
require_once 'database.php';
require_once 'Usuario.php';
require_once 'InterfazUsuario.php';

$interfaz = new InterfazUsuario();

while (true) {
    $interfaz->menu();
    $opcion = $interfaz->opcion();
    $interfaz->eleccionAC($opcion);
}