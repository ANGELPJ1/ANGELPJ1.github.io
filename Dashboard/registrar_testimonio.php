<?php
include '../Conexion_BD/bd.php';

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $cargo = $_POST['cargo'];
    $opinion = $_POST['opinion'];

    $imagen = $_FILES['imagen']['tmp_name'];
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTipo = $_FILES['imagen']['type'];
    $imagenContenido = file_get_contents($imagen);

    $stmt = $conn->prepare("INSERT INTO testimonios (nombre, cargo, opinion, imagen_nombre, imagen_tipo, imagen) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre, $cargo, $opinion, $imagenNombre, $imagenTipo, $imagenContenido);

    if ($stmt->execute()) {
        echo "✅ Testimonio guardado correctamente.";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
}
?>