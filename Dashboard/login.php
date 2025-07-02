<?php
session_start(); // Iniciar sesión para manejar las variables de sesión

// Si se ha enviado el formulario
if (isset($_POST['signin'])) {
    // Conectar a la base de datos
    include '../Conexion_BD/bd.php'; // Incluye tu archivo de conexión

    // Recibir los valores enviados desde el formulario
    $usuario = mysqli_real_escape_string($conn, $_POST['your_name']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['your_pass']);

    // Consulta para verificar si las credenciales coinciden
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = mysqli_query($conn, $sql);

    // Si hay una fila, las credenciales son correctas
    if (mysqli_num_rows($result) == 1) {
        // Obtén los datos del usuario
        $row = mysqli_fetch_assoc($result);

        // Establecer variables de sesión
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nombre'] = $row['usuario'];

        // Redirigir a la página de inicio o al panel de usuario
        header("Location: dashboard.php"); // Cambia a la URL de tu página principal
        exit(); // Asegúrate de detener la ejecución después de la redirección
    } else {
        // Si las credenciales son incorrectas
        echo "<script>alert('Usuario o Contraseña incorrectos');</script>";
        header("Location: index.php"); // Cambia a la URL de tu página principal
    }
}
?>