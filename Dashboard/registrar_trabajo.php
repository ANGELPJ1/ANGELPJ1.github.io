<?php
include '../Conexion_BD/bd.php';

if (isset($_POST['submit'])) {
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $link_preview = $_POST['link_preview'];
    $link_video = isset($_POST['link_video']) ? $_POST['link_video'] : null;  // Obtén el link de video si se proporciona

    // Guardar la imagen
    $imagen = $_FILES['imagen']['tmp_name'];
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTipo = $_FILES['imagen']['type'];
    $imagenContenido = file_get_contents($imagen);

    // Insertar los datos en la base de datos
    $stmt = $conn->prepare("INSERT INTO trabajos_destacados 
        (titulo, categoria, descripcion, imagen, imagen_tipo, imagen_nombre, link_preview, link_video) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssss", $titulo, $categoria, $descripcion, $imagenContenido, $imagenTipo, $imagenNombre, $link_preview, $link_video);

    if ($stmt->execute()) {
        echo "✅ Trabajo guardado correctamente.";
        echo "<br><a href='form_trabajo.php'>Agregar otro</a>";
    } else {
        echo "❌ Error al guardar: " . $stmt->error;
    }

    $stmt->close();
}
?>