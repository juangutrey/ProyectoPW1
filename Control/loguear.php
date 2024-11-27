<?php 
include "./header.php"; 
require 'conexion.php'; 
session_start();

// Verificar si ya está logueado
if (isset($_SESSION['id_miembro'])) {
    // Si ya está logueado, redirigir directamente a principal.php
    header("location: ../principal.php");
    exit();
}

// Verificar si el formulario fue enviado
if (isset($_POST['telefono']) && isset($_POST['clave'])) {
    // Obtener los datos del formulario
    $telefono = $_POST['telefono']; 
    $clave = $_POST['clave']; 

    // Consulta para verificar credenciales
    $q = "SELECT * FROM residente WHERE telefono = '$telefono' AND password = '$clave'";
    $consulta = mysqli_query($conexion, $q);

    // Verificar si la consulta fue exitosa
    if (!$consulta) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    // Verificar si hay resultados
    if (mysqli_num_rows($consulta) > 0) {
        $usuario = mysqli_fetch_assoc($consulta);
        
        // Guardar los datos del usuario en la sesión
        $_SESSION['id_miembro'] = $usuario['id_miembro']; 
        $_SESSION['nombre'] = $usuario['nombre']; 

        // Redirigir a principal.php si el login es correcto
        header("location: ../principal.php");
        exit(); // Detener la ejecución del script
    } else {
        // Si las credenciales son incorrectas, redirigir a indexError.php
        header("location: ../indexError.php");
        exit(); // Detener la ejecución del script
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

?>
<?php include "./footer.php"; ?>
