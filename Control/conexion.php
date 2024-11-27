<?php
// Configuración de conexión
$host_db = "localhost";
$user_name = "huronmarron";
$user_pass = "123456789";
$db_name = "prueba_bd";

// Crear la conexión
$conexion = new mysqli($host_db, $user_name, $user_pass, $db_name);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("<h1>Error de conexión: " . $conexion->connect_error . "</h1>");
} else {
    echo "<h1>Conexion exitosa</h1>";
}
// Cerrar conexión
$conn->close();
?>