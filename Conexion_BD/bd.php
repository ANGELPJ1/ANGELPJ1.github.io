<?php
// Archivo: db.php (Conexion a la Base de Datos)

// Datos locales
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "consultora";

// Datos del servidor
//$servername = "srv1925.hstgr.io";
//$username = "u772537992_angelpj1371";
//$password = "O?sJG^51p[=";
//$dbname = "u772537992_antech_reg_717";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>