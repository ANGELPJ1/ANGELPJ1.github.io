<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../white_on_trans.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../white_on_trans.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../white_on_trans.png" />
    <title>Dashboard Angel Tech</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">
    <style>
        /* Estilos Generales */
        body {
            font-family: 'Open Sans', sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
            transition: margin-left 0.3s ease;
        }

        /* Estilo para el contenedor principal */
        .container {
            display: flex;
            height: 100vh;
        }

        /* Estilos del menú lateral */
        .sidebar {
            background: linear-gradient(135deg, #3b4f8c, #5f6e8a, #2c2f38);
            /* Degradado azul, gris, morado */
            color: white;
            width: 250px;
            padding-top: 20px;
            position: fixed;
            height: 100%;
            transition: width 0.3s ease;
            z-index: 1000;
        }

        .sidebar a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            margin: 10px 0;
            font-family: 'Roboto', sans-serif;
            transition: background 0.3s ease;
        }

        .sidebar a:hover {
            background: #444;
        }

        .sidebar .menu-header {
            text-align: center;
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 20px;
            padding: 10px 0;
        }

        .sidebar .logout-btn {
            background: #ff4747;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 8px;
        }

        .sidebar .logout-btn:hover {
            background: #e03e3e;
        }

        /* Estilos para el contenido principal */
        .main-content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
            box-sizing: border-box;
            transition: margin-left 0.3s ease;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
            font-size: 16px;
        }

        input[type="text"],
        input[type="url"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background: #333;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background: #555;
        }

        /* Estilos para el botón de ocultar/mostrar menú */
        .toggle-btn {
            background: #333;
            color: white;
            border: none;
            padding: 10px;
            position: absolute;
            top: 20px;
            right: -40px;
            border-radius: 8px;
            cursor: pointer;
            z-index: 1100;
        }

        /* Efecto de ocultar el menú */
        .sidebar.closed {
            width: 0;
            padding-top: 0;
        }

        .sidebar.closed a {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Menú lateral -->
        <div class="sidebar">
            <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
            <div class="menu-header">
                <h3>Panel de Control</h3>
            </div>
            <a href="Dashboard.php">Agregar Trabajos</a>
            <a href="form_testimonio.php">Registrar Opiniones</a>
            <a href="ver_clientes.php">Ver Clientes</a>
            <button class="logout-btn" onclick="logout()">Salir</button>
        </div>

        <!-- Contenido principal -->
        <div class="main-content">
            <div class="form-container">
                <h2>Agregar servicios a pantalla principal</h2>
                <form action="registrar_trabajo.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" required>
                    </div>

                    <div class="form-group">
                        <label for="categoria">Categoría:</label>
                        <input type="text" name="categoria" id="categoria" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="link_preview">Link de preview:</label>
                        <input type="url" name="link_preview" id="link_preview">
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen de portada:</label>
                        <input type="file" name="imagen" id="imagen" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="link_video">Link de Video:</label>
                        <input type="url" name="link_video" id="link_video">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Guardar Trabajo">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('closed');
            var mainContent = document.querySelector('.main-content');
            mainContent.style.marginLeft = sidebar.classList.contains('closed') ? '0' : '260px';
        }

        function logout() {
            // Redirigir a un archivo PHP para cerrar sesión (esto debe estar implementado en tu archivo logout.php)
            window.location.href = "index.php";
        }
    </script>

</body>

</html>