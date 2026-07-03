<?php

// CONEXION A LA BASE DE DATOS - LECTOSMART

// Datos de conexion
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "lectosmart";

// Crear la conexion
$conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);

// Verificar si hubo un error
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar la codificacion de caracteres
$conexion->set_charset("utf8");
?>