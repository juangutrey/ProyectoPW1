<?php
// Para servidor local:
$host_db = "127.0.0.1";
$user_name = "root";
$user_pass = "";
$db_name = "gimnasio_db";

// Crear la conexión
$conexion = new mysqli($host_db, $user_name, $user_pass, $db_name);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("<h1>Error de conexión: " . $conexion->connect_error . "</h1>");
} else {
    echo "<h1></h1>";
}

