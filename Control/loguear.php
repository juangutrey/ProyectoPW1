<?php include "./header.php"; ?>
<?php
require 'conexion.php'; 
session_start();

// Verificar si los datos fueron enviados a través del formulario
if (isset($_POST['id_miembro']) && isset($_POST['password'])) {
    // Recibir los datos del formulario
    $id_miembro = $_POST['id_miembro']; 
    $password = $_POST['password']; 

    // Consulta preparada para evitar inyección SQL
    $stmt = $conexion->prepare("SELECT * FROM miembro WHERE id_miembro = ? AND password = ?");
    $stmt->bind_param("ss", $id_miembro, $password);
    
    // Ejecutar la consulta
    $stmt->execute();
    $consulta = $stmt->get_result();
    
    // Verificar si se encontró al usuario
    if ($consulta->num_rows > 0) {
        $usuario = $consulta->fetch_assoc();
        
        // Guardar la información del usuario en la sesión
        $_SESSION['id_miembro'] = $usuario['id_miembro'];
        $_SESSION['nombre'] = $usuario['nombre'];

        // Redirigir a la página principal
        header("location: ../principal.php");
        exit(); // Detener la ejecución del script después del redireccionamiento
    } else {
        // Redirigir a la página de error si no se encuentran las credenciales
        header("location: ../indexError.php");
        exit(); // Detener la ejecución del script
    }
    
    // Cerrar la sentencia
    $stmt->close();
} else {
    // Si no se enviaron los datos correctamente, redirigir al formulario de inicio de sesión
    header("location: ../indexError.php");
    exit();
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<?php include "./footer.php"; ?>
