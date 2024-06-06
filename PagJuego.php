<?php
session_start();

$html = "";

if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioID'] === null) {
    $html .= "<div class='container'>";
    $html .= "<div class='NoSesion'>";
    $html .= "<h2>No has iniciado sesión</h2>";
    $html .= "<button class='btn btn-primary' onclick='window.location.href=\"index.php\"'>Iniciar sesión</button>";
    $html .= "</div>";
    $html .= "</div>";
    echo $html;
} else {
    // Conseguir el ID del Juego
    $juegoID = "";
    if (isset($_GET["juegoID"])) {
        $juegoID = $_GET["juegoID"];
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Gaming World</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/styles.css">
        </head>
        <body>
            <!-- Modal HTML -->
            <div class='modal fade text-dark' id='mensajeModal' tabindex='-1' role='dialog' aria-labelledby='mensajeModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='mensajeModalLabel'>Juego añadido</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body' id='mensajeModalBody'></div>
                    </div>
                </div>
            </div>

            <?php
            session_abort();
            require 'menu.php';
            require 'bd.php';

            // Consulta SQL para el juego
            $sel = "SELECT
    juegos.juegoID,
    juegos.nombre,
    juegos.imagen,
    juegos.descripcion,
    juegos.fecha_salida,
    juegos.precio,
    GROUP_CONCAT(DISTINCT generos.nombre) AS generos,
    desarrolladores.desarrolladorID,
    desarrolladores.nombre AS desarrollador,
    editores.editorID,
    editores.nombre AS editor
FROM juegos
INNER JOIN juegos_generos ON juegos_generos.juegoID = juegos.juegoID
INNER JOIN generos ON generos.generoID = juegos_generos.generoID
INNER JOIN juegos_desarrolladores ON juegos_desarrolladores.juegoID = juegos.juegoID
INNER JOIN desarrolladores ON desarrolladores.desarrolladorID = juegos_desarrolladores.desarrolladorID
INNER JOIN juegos_editores ON juegos_editores.juegoID = juegos.juegoID
INNER JOIN editores ON editores.editorID = juegos_editores.editorID
WHERE juegos.juegoID = '$juegoID'
GROUP BY juegos.juegoID, desarrolladores.desarrolladorID, editores.editorID;
";

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

            echo "<div class='container-xxl'>";

            foreach ($juegos as $juego) {
                ?>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="card bg-dark text-white">
                            <div class="card-header">
                                <h2><?php echo $juego['nombre']; ?></h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="ImagenesJuegos/<?php echo $juego['imagen']; ?>" alt="<?php echo $juego['nombre']; ?>" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $juego['descripcion']; ?></p>
                                        <p>Precio: <?php echo $juego['precio']; ?></p>
                                        <?php
                                        $fecha_salida = strtotime($juego['fecha_salida']);
                                        $fechaFormateada = 'Publicado el ' . date('j', $fecha_salida) . ' de ' . $meses[date('F', $fecha_salida)] . ' de ' . date('Y', $fecha_salida);
                                        ?>
                                        <p>Fecha de salida: <?php echo $fechaFormateada; ?></p>
                                        <p>Géneros: <?php
                                                    $generos = explode(",", $juego["generos"]);
                                                    $generosOutput = [];
                                                    foreach ($generos as $genero) {
                                                        $query = "SELECT generoID FROM generos WHERE nombre = ?";
                                                        $statement = $bd->prepare($query);
                                                        $statement->execute([$genero]);
                                                        $resultado = $statement->fetch();
                                                        $generoID = isset($resultado['generoID']) ? urlencode($resultado['generoID']) : '';
                                                        $generosOutput[] = "<a class='generos text-white' href='PagGenero.php?generoID=$generoID' id='$generoID'>$genero</a>";
                                                    }
                                                    echo implode(", ", $generosOutput);
                                                    ?></p>
                                        <p>Desarrollador: <a class="text-white" href="PagDesarrollador.php?desarrolladorID=<?php echo urlencode($juego['desarrolladorID']); ?>"><?php echo $juego['desarrollador']; ?></a></p>
                                        <p>Editor: <a class="text-white"  href="PagEditor.php?editorID=<?php echo urlencode($juego['editorID']); ?>"><?php echo $juego['editor']; ?></a></p>
                                        <?php
                                        $usuarioID = $_SESSION['UsuarioID'];

                                        $carritoSelect = "SELECT * FROM carrito WHERE usuarioID = :usuarioID";
                                        $stmt = $bd->prepare($carritoSelect);
                                        $stmt->bindParam(':usuarioID', $usuarioID);
                                        $stmt->execute();
                                        $numFilas = $stmt->rowCount();

                                        if ($numFilas > 0) {
                                            echo "<a href='#' class='btn btn-primary agregar-carrito' data-juego-id='{$juego['juegoID']}' data-precio='{$juego['precio']}'>Agregar al carrito</a>";
                                        } else {
                                            echo "<a href='#' class='btn btn-primary asociar-tarjeta'>Asociar una tarjeta para poder comprar</a>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                    }

                    // Mostrar comentarios
                    $htmlComentarios = "";

                    $htmlComentarios .= "<div class='bg-dark mt-5 mb-5 rounded card comentarios'>";
                    $htmlComentarios .= "<h2 class='card-header'>Comentarios</h2>";

                    // Consulta SQL para obtener los comentarios del juego
                    $sel2 = "SELECT * FROM `comentarios_juegos` WHERE `JuegoID` = '$juegoID'";
                    $comentarios = $bd->query($sel2);

                    if ($comentarios->rowCount() < 1) {
                        $htmlComentarios .= "<div class='card-body'>";
                        $htmlComentarios .= "<div class='noComentarios'>";
                        $htmlComentarios .= "<h2>No hay comentarios, sé el primero en decir algo</h2>";
                        $htmlComentarios .= "<button class='mt-2 btn btn-primary' onclick='window.location.href=\"CrearComentarioJuego.php?juegoID=" . urlencode($juegoID) . "&usuarioID=" . urldecode($_SESSION['UsuarioID']) . "\"'>Hazlo Aquí</button>";
                        $htmlComentarios .= "</div>";
                        $htmlComentarios .= "</div>";
                    } else {
                        $htmlComentarios .= "<div class='card-body'>";
                        foreach ($comentarios as $comentario) {
                            $htmlComentarios .= "<div class='card comentarios-content bg-secondary mt-4'>";
                            $htmlComentarios .= "<div class='card-body comentarios-content-info'>";

                            // Consulta preparada para obtener los datos del usuario
                            $sel3 = $bd->prepare("SELECT Alias FROM `usuarios` WHERE `UsuarioID` = :UsuarioID");
                            $sel3->execute(['UsuarioID' => $comentario['UsuarioID']]);
                            $usuario = $sel3->fetch();

                            $htmlComentarios .= '<h5 class="card-title">' . $usuario['Alias'] . '</h5>';
                            $htmlComentarios .= '<p class="card-text">' . $comentario['comentario'] . '</p>';
                            $fecha = strtotime($comentario['fecha']);
                            $fechaFormateada = 'Publicado el ' . date('j', $fecha) . ' de ' . $meses[date('F', $fecha)] . ' de ' . date('Y', $fecha) . ' a las ' . date('H:i', $fecha);
                            $htmlComentarios .= '<p class="card-text">' . $fechaFormateada . '</p>';
                            $htmlComentarios .= "</div>";

                            $htmlComentarios .= "<div class='comentario-content-opciones card-body'>";
                            if ($usuario['Alias'] == $_SESSION['Alias']) {
                                $htmlComentarios .= "<button class='btn btn-primary mr-2' onclick=\"window.location.href='EditarComentarioJuego.php?comentarioJuegoID=" . urlencode($comentario['comentarioJuegoID']) . "&JuegoID=" . $juegoID . "'\">Editar</button>";
                            }
                            if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
                                $htmlComentarios .= "<button class='btn btn-primary' onclick=\"window.location.href='EliminarComentarioJuego.php?comentarioJuegoID=" . urlencode($comentario['comentarioJuegoID']) . "&JuegoID=" . $juegoID . "'\">Eliminar</button>";
                            }
                            $htmlComentarios .= "</div>";

                            $htmlComentarios .= "</div>";
                        }
                        $htmlComentarios .= "<div class='comentar mt-3'>";
                        $htmlComentarios .= "<h2>¿Quieres comentar algo?</h2>";
                        $htmlComentarios .= "<button class='btn btn-primary mt-3' onclick='window.location.href=\"CrearComentarioJuego.php?juegoID=" . urlencode($juegoID) . "&usuarioID=" . urldecode($_SESSION['UsuarioID']) . "\"'>Hazlo Aquí</button>";
                        $htmlComentarios .= "</div>";
                        $htmlComentarios .= "</div>";
                    }

                    $htmlComentarios .= "</div>";

                    echo $htmlComentarios;
                    ?>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var agregarCarritoBtns = document.querySelectorAll('.agregar-carrito');
                agregarCarritoBtns.forEach(function (btn) {
                    btn.addEventListener('click', function (event) {
                        event.preventDefault();
                        var juegoID = btn.getAttribute('data-juego-id');
                        var precio = btn.getAttribute('data-precio');
                        var usuarioID = '<?php echo $_SESSION['UsuarioID']; ?>';
                        fetch('AgregarAlCarrito.php?juegoID=' + juegoID + '&precio=' + precio + '&usuarioID=' + usuarioID)
                                .then(response => response.text())
                                .then(text => {
                                    document.getElementById('mensajeModalBody').textContent = text;
                                    $('#mensajeModal').modal('show');
                                });
                    });
                });

                document.querySelectorAll('.asociar-tarjeta').forEach(function (btn) {
                    btn.addEventListener('click', function (event) {
                        event.preventDefault();
                        document.getElementById('mensajeModalBody').textContent = 'Debes tener una tarjeta asociada a tu perfil para poder comprar productos';
                        $('#mensajeModal').modal('show');
                    });
                });
            });
        </script>
    </body>
    </html>
    <?php
}
?>
