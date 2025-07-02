<?php
include 'Conexion_BD/bd.php';

$sql = "SELECT * FROM trabajos_destacados ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
$contador = 1;

while ($row = mysqli_fetch_assoc($result)) {
    $titulo = htmlspecialchars($row['titulo']);
    $categoria = htmlspecialchars($row['categoria']);
    $descripcion = nl2br(htmlspecialchars($row['descripcion']));
    $preview = $row['link_preview'];
    $link_video = $row['link_video']; // Enlace del video
    $imgTipo = $row['imagen_tipo'];
    $imgData = base64_encode($row['imagen']);
    $descClass = "entry__desc-" . $contador;

    echo '
    <div class="column entry">
        <a
            href="data:' . $imgTipo . ';base64,' . $imgData . '"
            class="entry__link glightbox"
            data-glightbox="title: ' . $titulo . '; description: .' . $descClass . '"
        >
            <div class="entry__thumb">
                <img
                    src="data:' . $imgTipo . ';base64,' . $imgData . '"
                    srcset="data:' . $imgTipo . ';base64,' . $imgData . ' 1x, data:' . $imgTipo . ';base64,' . $imgData . ' 2x"
                    alt="' . $titulo . '"
                    style="width: 100%; max-width: 800px; display: block; margin: 0 auto 20px;"
                />
            </div>
            <div class="entry__info">
                <h4 class="entry__title">' . $titulo . '</h4>
                <div class="entry__cat">' . $categoria . '</div>
            </div>
        </a>

        <div class="glightbox-desc ' . $descClass . '">
            <p style="text-align: center;">';

    // Mostrar el video si hay un enlace
    if (!empty($link_video)) {
        // Si es un link de YouTube
        if (strpos($link_video, 'youtube.com') !== false || strpos($link_video, 'youtu.be') !== false) {
            preg_match('/(?:youtu\.be\/|v=)([^\&\?\/]+)/', $link_video, $matches);
            if (isset($matches[1])) {
                $videoId = $matches[1];
                $embed_link = "https://www.youtube.com/embed/" . $videoId;
            }
        }
        // Si es un link de Vimeo
        elseif (strpos($link_video, 'vimeo.com') !== false) {
            preg_match('/vimeo\.com\/(?:video\/)?(\d+)/', $link_video, $matches);
            if (isset($matches[1])) {
                $videoId = $matches[1];
                $embed_link = "https://player.vimeo.com/video/" . $videoId;
            } else {
                // Intenta extraer desde player.vimeo si incluye parámetros
                preg_match('/player\.vimeo\.com\/video\/(\d+)/', $link_video, $matches);
                if (isset($matches[1])) {
                    $videoId = $matches[1];
                    $embed_link = "https://player.vimeo.com/video/" . $videoId;
                }
            }
        }

        // Si encontró un link válido, mostrarlo
        if (!empty($embed_link)) {
            echo '<iframe src="' . $embed_link . '" width="100%" height="300px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe><br>';
        } else {
            echo '<small style="color:red;">Error al procesar el video. Revisa el enlace.</small>';
        }
    }

    echo $descripcion . '<br>';

    if (!empty($preview)) {
        echo '<a href="' . $preview . '" target="_blank">Preview del proyecto</a>';
    }

    echo '
            </p>
        </div>
    </div>';

    $contador++;
}
?>