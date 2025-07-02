<?php
include 'Conexion_BD/bd.php';

$sql = "SELECT * FROM testimonios ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $nombre = htmlspecialchars($row['nombre']);
    $cargo = htmlspecialchars($row['cargo']);
    $opinion = nl2br(htmlspecialchars($row['opinion']));
    $imgTipo = $row['imagen_tipo'];
    $imgData = base64_encode($row['imagen']);

    echo '
    <div class="s-testimonials__slide swiper-slide">
        <div class="s-testimonials__author">
            <img src="data:' . $imgTipo . ';base64,' . $imgData . '" alt="Foto de ' . $nombre . '" class="s-testimonials__avatar" />
            <cite class="s-testimonials__cite">
                <strong>' . $nombre . '</strong>
                <span>' . $cargo . '</span>
            </cite>
        </div>
        <p>' . $opinion . '</p>
    </div>';
}
?>