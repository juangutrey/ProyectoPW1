<?php
// Configuración de conexión
$servername = "localhost";
$username = "huronmarron";
$password = "123456";
$dbname = "prueba_bd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
echo "Conexión exitosa a la base de datos";

// Cerrar conexión
$conn->close();
?>

