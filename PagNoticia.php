<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
    // Conseguir el ID de la noticia
    $noticiaID = "";
    if (isset($_GET["noticiaID"])) {
        $noticiaID = $_GET["noticiaID"];
    }
    ?>

    <?php 
    // Requires
    require 'menu.php';
    require 'bd.php';
    ?>

    <div class="container mt-5">
        <div class="titulo text-center mb-4">
            <h1>Noticia</h1>
        </div>

        <?php
        // Consulta SQL
        $sel = "SELECT * FROM `noticias_detalles` WHERE `noticiaID` = '$noticiaID'";
        $novedades = $bd->query($sel);

        // Inicio lista de novedades
        foreach ($novedades as $novedad) {
            $html = "";
            $html .= "<div class='card bg-dark text-white mb-4'>";
            $html .= "<img src='ImagenesNoticiasDetalles/{$novedad['imagen']}' class='card-img-top' alt='{$novedad['titulo']}'>";
            $html .= "<div class='card-body'>";
            $html .= "<h5 class='card-title'>{$novedad['titulo']}</h5>";
            $html .= "<p class='card-text'>{$novedad['descripcion']}</p>";
            $html .= "<p class='card-text'><small class='text-muted'>Publicado el ". date('j \d\e F \d\e Y', strtotime($novedad['fechaPublicacion'])) ."</small></p>";
            $html .= "<a href='{$novedad['urlNoticia']}' class='btn btn-primary' target='_blank'>Ver noticia completa</a>";
            $html .= "</div>";
            $html .= "</div>";

            echo $html;
        }
        ?>
        
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">
                <h5 class="card-title">Comentarios</h5>

                <?php
                $sel2 = "SELECT * FROM `comentarios_noticias` WHERE `noticiaDetalleID` = '$noticiaID'";
                $comentarios = $bd->query($sel2);

                if ($comentarios->rowCount() < 1) {
                    echo "<p class='card-text'>No hay comentarios, sé el primero en decir algo</p>";
                } else {
                    foreach ($comentarios as $comentario) {
                        echo "<div class='card bg-secondary text-white mb-3'>";
                        echo "<div class='card-body'>";
                        $NombreUsuario = $comentario['usuarioID'];
                        $sel3 = "SELECT * FROM `usuarios` WHERE `UsuarioID` = '$NombreUsuario'";
                        $usuarios = $bd->query($sel3);
                        foreach ($usuarios as $usuario) {
                            echo "<h5 class='card-title'>{$usuario['Alias']}</h5>";
                        }
                        echo "<p class='card-text'>{$comentario['comentario']}</p>";
                        echo "<p class='card-text'><small class='text-muted'>Publicado el ". date('j \d\e F \d\e Y \a \l\a\s H:i', strtotime($comentario['fecha'])) ."</small></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>

                <a href="CrearComentarioNoticia.php?noticiaDetalleID=<?php echo urlencode($noticiaID) ?>&usuarioID=<?php echo urldecode($_SESSION['UsuarioID']) ?>" class="btn btn-primary">Agregar comentario</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
