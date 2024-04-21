<?php
// Conseguir el ID de la noticia
$noticiaID = "";
if (isset($_GET["noticiaID"])) {
    $noticiaID = $_GET["noticiaID"];
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div>
            <div>
                <?php
                // Requires
                require 'menu.php';
                require 'bd.php';
                ?>

                <div class="titulo">
                    <h1>Noticia</h1>
                </div>

                <?php
                // Consulta SQL
                $sel = "SELECT * FROM `noticias_detalles` WHERE `noticiaID` = '$noticiaID'";
                $novedades = $bd->query($sel);

                // Inicio lista de novedades
                $html = "";

                $meses = array(
                    'January' => 'Enero',
                    'February' => 'Febrero',
                    'March' => 'Marzo',
                    'April' => 'Abril',
                    'May' => 'Mayo',
                    'June' => 'Junio',
                    'July' => 'Julio',
                    'August' => 'Agosto',
                    'September' => 'Septiembre',
                    'October' => 'Octubre',
                    'November' => 'Noviembre',
                    'December' => 'Diciembre'
                );

                foreach ($novedades as $novedad) {

                    $noticiaDetalleID = $novedad['noticiaDetalleID'];

                    $html .= "<div class='juegoSolo' style='background-color: black; color: white;'>";
                    $html .= "<div class='contenidoSolo'>";

                    // Contenedor Principal
                    $html .= "<div class='infoPrincipal'>";

                    // Titulo
                    $html .= "<h2>$novedad[titulo]</h2>";

                    // Imagen
                    $html .= "<img src='$novedad[imagen]' alt='$novedad[titulo]'>";
                    $html .= "</div>";

                    // Contenedor Secundario
                    $html .= "<div class='infoSecundaria'>";
                    $html .= "<p>{$novedad['descripcion']}</p>";
                    $html .= "<p>Publicación original: <a href='{$novedad['urlNoticia']}' target='_blank'>Ver aquí</a></p>";
                    $html .= "</div>";

                    // Fecha de publicación de la noticia
                    $fechaPublicacion = strtotime($novedad['fechaPublicacion']);
                    $fechaFormateadaPublicacion = 'Publicado el ' . date('j', $fechaPublicacion) . ' de ' . $meses[date('F', $fechaPublicacion)] . ' de ' . date('Y', $fechaPublicacion);
                    $html .= "<p>{$fechaFormateadaPublicacion}</p>";

                    $html .= "</div>";
                    $html .= "<a>";
                    $html .= "</div>";
                    $html .= "</div>";
                }

                $html .= "<div class='juegoSolo comentarios'>";
                $html .= "<h2>Comentarios</h2>";

                $sel2 = "SELECT * FROM `comentarios_noticias` WHERE `noticiaDetalleID` = '$noticiaDetalleID'";

                $comentarios = $bd->query($sel2);

                if ($comentarios->rowCount() < 1) {

                    $html .= "<div class='noComentarios'>";
                    $html .= "<h2>No hay comentarios, sé el primero en decir algo</h2>";
                    $html .= "<button onclick='window.location.href=\"CrearComentarioNoticia.php?noticiaDetalleID=" . urlencode($noticiaDetalleID) . "&usuarioID=" . urldecode($_SESSION['UsuarioID']) . "\"'>Hazlo Aquí</button>";
                    $html .= "</div>";
                } else {

                    foreach ($comentarios as $comentario) {

                        $html .= "<div class='comentarios-content'>";

                        $html .= "<div class='comentarios-content-info'>";

                        $NombreUsuario = $comentario['usuarioID'];

                        $sel3 = "SELECT * FROM `usuarios` WHERE `UsuarioID` = '$NombreUsuario'";

                        $usuarios = $bd->query($sel3);

                        foreach ($usuarios as $usuario) {
                            $html .= '<p>' . $usuario['Alias'] . '</p>';
                        }

                        $html .= '<p>' . $comentario['comentario'] . '</p>';

                        $fecha = strtotime($comentario['fecha']);
                        $fechaFormateada = 'Publicado el ' . date('j', $fecha) . ' de ' . $meses[date('F', $fecha)] . ' de ' . date('Y', $fecha) . ' a las ' . date('H:i', $fecha);

                        $html .= '<p>' . $fechaFormateada . '</p>';

                        $html .= "</div>";

                        $html .= "<div class='comentario-content-opciones'>";

                        if ($usuario['Alias'] == $_SESSION['Alias']) {
                            $html .= "<button onclick=\"window.location.href='EditarComentarioNoticia.php?comentarioNoticiaID=" . urlencode($comentario['comentarioNoticiaID']) . "&noticiaID=" . $noticiaID . "'\">Editar</button>";
                        }
                        if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
                            $html .= "<button onclick=\"window.location.href='EliminarComentarioNoticia.php?comentarioNoticiaID=" . urlencode($comentario['comentarioNoticiaID']) . "&noticiaID=" . $noticiaID . "'\">Eliminar</button>";
                        }

                        $html .= "</div>";

                        $html .= "</div>";
                    }

                    $html .= "<div class='comentar'>";
                    $html .= "<h2>¿Quieres comentar algo?</h2>";
                    $html .= "<button onclick='window.location.href=\"CrearComentarioNoticia.php?noticiaDetalleID=" . urlencode($noticiaDetalleID) . "&usuarioID=" . urldecode($_SESSION['UsuarioID']) . "\"'>Hazlo Aquí</button>";
                    $html .= "</div>";
                }

                $html .= "</div>";

                echo $html;
                ?>
            </div>
        </div>
    </body>
</html>
