<?php
<<<<<<< HEAD
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
=======
// Configuración de conexión
$servername = "localhost";
$username = "huronmarron";
$password = "123456789";
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
>>>>>>> 80dd47957068c793353f0182844eb14d05aed3c9
?>

