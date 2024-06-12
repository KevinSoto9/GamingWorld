<?php
session_start();

$html = "";

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioID'] === null) {
    // Si no ha iniciado sesión, redirigir al usuario a la página de inicio de sesión
    require '../PaginasAdicionales/NoInicioSesion.php';
} else {
    // Si el usuario ha iniciado sesión, mostrar la página principal

    // Obtener el ID de la noticia si está presente en la URL
    $noticiaID = "";
    if (isset($_GET["noticiaID"])) {
        $noticiaID = $_GET["noticiaID"];
    }

    // Incluir los archivos necesarios
    require '../Menus/menuIndividual.php';
    require '../bd.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="titulo text-center mb-4 text-white">
        <h1>Noticia</h1>
    </div>

    <?php
    // Consultar la base de datos para obtener los detalles de la noticia
    $sel = "SELECT * FROM `noticias_detalles` WHERE `noticiaID` = '$noticiaID'";
    $novedades = $bd->query($sel);

    // Mostrar los detalles de la noticia
    foreach ($novedades as $novedad) {
        $html = "";
        $html .= "<div class='card bg-dark text-white mb-5'>";
        $html .= "<img src='../../Imagenes/ImagenesNoticiasDetalles/{$novedad['titulo']}.jpg' class='card-img-top' alt='{$novedad['titulo']}'>";
        $html .= "<div class='card-body'>";
        $html .= "<h5 class='card-title'>{$novedad['titulo']}</h5>";
        $html .= "<p class='card-text'>{$novedad['descripcion']}</p>";
        $html .= "<p class='card-text'><small class='text-muted'>Publicado el " . date('j \d\e F \d\e Y', strtotime($novedad['fechaPublicacion'])) . "</small></p>";
        $html .= "<a href='{$novedad['urlNoticia']}' class='btn btn-primary' target='_blank'>Ver noticia completa</a>";
        $html .= "</div>";
        $html .= "</div>";

        echo $html;
    }
    ?>

    <div class="card bg-dark text-white mb-4">
        <h2 class="card-header">Comentarios</h2>
        <div class="card-body">
            <?php
            // Consultar la base de datos para obtener los comentarios de la noticia
            $sel2 = "SELECT * FROM `comentarios_noticias` WHERE `noticiaDetalleID` = '$noticiaID'";
            $comentarios = $bd->query($sel2);

            // Verificar si hay comentarios
            if ($comentarios->rowCount() < 1) {
                // Si no hay comentarios, mostrar un mensaje
                echo "<p class='card-text'>No hay comentarios, sé el primero en decir algo</p>";
            } else {
                // Si hay comentarios, mostrar cada comentario
                foreach ($comentarios as $comentario) {
                    echo "<div class='card bg-secondary text-white mb-4'>";
                    echo "<div class='card-body'>";

                    // Obtener el nombre del usuario que realizó el comentario
                    $NombreUsuario = $comentario['usuarioID'];
                    $sel3 = "SELECT * FROM `usuarios` WHERE `UsuarioID` = '$NombreUsuario'";
                    $usuarios = $bd->query($sel3);
                    foreach ($usuarios as $usuario) {
                        echo "<h5 class='card-title'>{$usuario['Alias']}</h5>";
                    }

                    // Mostrar el comentario y la fecha de publicación
                    echo "<p class='card-text'>{$comentario['comentario']}</p>";
                    echo "<p class='card-text'>Publicado el " . date('j \d\e F \d\e Y \a \l\a\s H:i', strtotime($comentario['fecha'])) . "</p>";

                    // Botones de editar y eliminar comentarios
                    echo "<div class='btn-group' role='group'>";

                    // Botón de editar: solo visible si el usuario es el autor del comentario
                    if ($_SESSION['UsuarioID'] == $comentario['usuarioID']) {
                        echo "<button type='button' class='btn btn-primary mr-2' onclick=\"window.location.href='../Funciones/EditarComentarioNoticia.php?comentarioNoticiaID=" . urlencode($comentario['comentarioNoticiaID']) . "&noticiaID=" . urlencode($noticiaID) . "'\">Editar</button>";
                    }

                    // Botón de eliminar: solo visible para administradores
                    if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
                        echo "<button type='button' class='btn btn-primary' onclick=\"window.location.href='../Funciones/EliminarComentarioNoticia.php?comentarioNoticiaID=" . urlencode($comentario['comentarioNoticiaID']) . "&noticiaID=" . urlencode($noticiaID) . "'\">Eliminar</button>";
                    }

                    echo "</div>";

                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>

            <!-- Enlace para agregar un nuevo comentario -->
            <a href="../Funciones/CrearComentarioNoticia.php?noticiaDetalleID=<?php echo urlencode($noticiaID) ?>&usuarioID=<?php echo urldecode($_SESSION['UsuarioID']) ?>" class="btn btn-primary">Agregar comentario</a>
        </div>
    </div>
</div>

<?php
require '../Funciones/footer.php';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
}
?>
