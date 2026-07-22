<?php
// ==========================================
// CONEXIÓN A LA BASE DE DATOS - LECTOSMART
// ==========================================

// Datos de conexión
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "lectosmart";

// Crear la conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);

// Verificar si hubo un error
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar la codificación de caracteres
$conexion->set_charset("utf8");
?>