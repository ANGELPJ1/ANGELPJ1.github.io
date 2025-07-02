<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Trabajo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f4f4f4;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="url"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px;
            background: #333;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #555;
        }
    </style>
</head>

<body>

    <form action="registrar_trabajo.php" method="POST" enctype="multipart/form-data">
        <h2>Agregar nuevo servicio</h2>

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" id="categoria" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="4" required></textarea>

        <label for="link_preview">Link de preview:</label>
        <input type="url" name="link_preview" id="link_preview">

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" required>

        <label for="link_video">Link de Video:</label>
        <input type="url" name="link_video" id="link_video">

        <input type="submit" name="submit" value="Guardar Trabajo">
    </form>

</body>

</html>