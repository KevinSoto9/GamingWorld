<?php

session_start();

$html = "";

if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioID'] === null) {
    $html .= "<div class='NoSesion'>";
    $html .= "No has iniciado sesión";
    $html .= "<button onclick='window.location.href=\"index.php\"'>Hazlo Aquí</button>";
    $html .= "</div>";
   
    echo $html;
}

else{
    
    // Conseguir el ID del Juego
$juegoID = "";
if (isset($_GET["juegoID"])) {
    $juegoID = $_GET["juegoID"];
}

session_abort()
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
                    <h1>Juego</h1>
                </div>

                <?php
                // Consulta SQL para el juego
                $sel = "SELECT
                        juegos.juegoID,
                        juegos.nombre,
                        juegos.imagen,
                        juegos.descripcion,
                        juegos.fecha_salida,
                        juegos.precio,
                        desarrolladores.desarrolladorID,
                        editores.editorID,
                        GROUP_CONCAT(DISTINCT generos.nombre) AS generos,
                        desarrolladores.nombre AS desarrollador,
                        editores.nombre AS editor
                        FROM juegos
                        INNER JOIN juegos_generos ON juegos_generos.juegoID = juegos.juegoID
                        INNER JOIN generos ON generos.generoID = juegos_generos.generoID
                        INNER JOIN juegos_desarrolladores ON juegos_desarrolladores.juegoID = juegos.juegoID
                        INNER JOIN desarrolladores ON desarrolladores.desarrolladorID = juegos_desarrolladores.desarrolladorID
                        INNER JOIN juegos_editores ON juegos_editores.juegoID = juegos.juegoID
                        INNER JOIN editores ON editores.editorID = juegos_editores.editorID
                        WHERE juegos.juegoID = '$juegoID'
                        GROUP BY juegos.juegoID";

                $juegos = $bd->query($sel);

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

                foreach ($juegos as $juego) {

                    $html .= "<div class='juegoSolo' style='background-color: black; color: white;'>";
                    $html .= "<div class='contenidoSolo'>";

                    // Contenedor Principal
                    $html .= "<div class='infoPrincipal'>";

                    // Nombre
                    $html .= "<h2>$juego[nombre]</h2>";

                    // Imagen
                    $html .= "<img src='ImagenesJuegos/{$juego['imagen']}' alt='$juego[nombre]'>";
                    $html .= "</div>";

                    // Contenedor Secundario
                    $html .= "<div class='infoSecundaria'>";

                    // Descripcion
                    $html .= "<p>$juego[descripcion]</p>";
                    $html .= "</div>";

                    // Contenedor Final
                    $html .= "<div class='infoFinal'>";

                    // Precio
                    $html .= "<p>Precio: $juego[precio]</p>";

                    // Fecha de salida
                    $fecha_salida = strtotime($juego['fecha_salida']);
                    $fechaFormateada = 'Publicado el ' . date('j', $fecha_salida) . ' de ' . $meses[date('F', $fecha_salida)] . ' de ' . date('Y', $fecha_salida);
                    $html .= "<p>Fecha de salida: $fechaFormateada</p>";

                    //  Generos
                    // Generos
                    $generos = explode(",", $juego["generos"]);
                    $html .= "<p>Géneros: ";
                    $generosCount = count($generos);
                    foreach ($generos as $key => $genero) {
                        $query = "SELECT generoID FROM generos WHERE nombre = ?";
                        $statement = $bd->prepare($query);
                        $statement->execute([$genero]);
                        $resultado = $statement->fetch();
                        $generoID = isset($resultado['generoID']) ? urlencode($resultado['generoID']) : '';
                        $html .= "<a href='PagGenero.php?generoID=$generoID' id='$generoID'>$genero</a>";

                        // Añadir coma si no es el último género
                        if ($key < $generosCount - 1) {
                            $html .= ", ";
                        }
                    }
                    $html .= "</p>";

                    // Desarrollador
                    $desarrolladorID = urlencode($juego['desarrolladorID']);
                    $html .= "<p>Desarrollador: <a href='PagDesarrollador.php?desarrolladorID=$desarrolladorID'>$juego[desarrollador]</a></p>";

                    // Editor
                    $editorID = urlencode($juego['editorID']);
                    $html .= "<p>Editor: <a href='PagEditor.php?editorID=$editorID'>$juego[editor]</a></p>";
                    $html .= "</div>";

                    $html .= "</div>";
                    $html .= "</div>";
                }

                echo $html;

                // Mostrar comentarios
                $htmlComentarios = "";

                $htmlComentarios .= "<div class='juegoSolo comentarios'>";
                $htmlComentarios .= "<h2>Comentarios</h2>";

                $sel2 = "SELECT * FROM `comentarios_juegos` WHERE `JuegoID` = '$juegoID'";

                $comentarios = $bd->query($sel2);

                if ($comentarios->rowCount() < 1) {

                    $htmlComentarios .= "<div class='noComentarios'>";
                    $htmlComentarios .= "<h2>No hay comentarios, sé el primero en decir algo</h2>";
                    $htmlComentarios .= "<button onclick='window.location.href=\"CrearComentarioJuego.php?juegoID=" . urlencode($juegoID) . "&usuarioID=" . urldecode($_SESSION['UsuarioID']) . "\"'>Hazlo Aquí</button>";
                    $htmlComentarios .= "</div>";
                } else {

                    foreach ($comentarios as $comentario) {

                        $htmlComentarios .= "<div class='comentarios-content'>";

                        $htmlComentarios .= "<div class='comentarios-content-info'>";

                        $NombreUsuario = $comentario['UsuarioID'];

                        $sel3 = "SELECT * FROM `usuarios` WHERE `UsuarioID` = '$NombreUsuario'";

                        $usuarios = $bd->query($sel3);

                        foreach ($usuarios as $usuario) {
                            $htmlComentarios .= '<p>' . $usuario['Alias'] . '</p>';
                        }

                        $htmlComentarios .= '<p>' . $comentario['comentario'] . '</p>';

                        $fecha = strtotime($comentario['fecha']);
                        $fechaFormateada = 'Publicado el ' . date('j', $fecha) . ' de ' . $meses[date('F', $fecha)] . ' de ' . date('Y', $fecha) . ' a las ' . date('H:i', $fecha);
                        
                        $htmlComentarios .= '<p>' . $fechaFormateada . '</p>';

                        $htmlComentarios .= "</div>";

                        $htmlComentarios .= "<div class='comentario-content-opciones'>";

                        if ($usuario['Alias'] == $_SESSION['Alias']) {
                            $htmlComentarios .= "<button onclick=\"window.location.href='EditarComentarioJuego.php?comentarioJuegoID=" . urlencode($comentario['comentarioJuegoID']) . "&JuegoID=" . $juegoID . "'\">Editar</button>";
                        }
                        
                        if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
                            $htmlComentarios .= "<button onclick=\"window.location.href='EliminarComentarioJuego.php?comentarioJuegoID=" . urlencode($comentario['comentarioJuegoID']) . "&JuegoID=" . $juegoID . "'\">Eliminar</button>";
                        }

                        $htmlComentarios .= "</div>";

                        $htmlComentarios .= "</div>";
                    }

                    $htmlComentarios .= "<div class='comentar'>";
                    $htmlComentarios .= "<h2>¿Quieres comentar algo?</h2>";
                    $htmlComentarios .= "<button onclick='window.location.href=\"CrearComentarioJuego.php?juegoID=" . urlencode($juegoID) . "&usuarioID=" . urldecode($_SESSION['UsuarioID']) . "\"'>Hazlo Aquí</button>";
                    $htmlComentarios .= "</div>";
                }

                $htmlComentarios .= "</div>";

                echo $htmlComentarios;
                ?>
            </div>
        </div>
    </body>
</html>

<?php
}
?>
