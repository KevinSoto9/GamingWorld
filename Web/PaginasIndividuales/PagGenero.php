<?php
session_start();

$html = "";

// Verificar si el usuario está iniciado sesión
if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioID'] === null) {
    // Incluir el archivo para mostrar cuando el usuario no ha iniciado sesión
    require '../PaginasAdicionales/NoInicioSesion.php';
} else {
    // Obtener el ID del género
    $generoID = "";
    if (isset($_GET["generoID"])) {
        $generoID = $_GET["generoID"];
    }
    ?>

    <html>
        <head>
            <meta charset="UTF-8">
            <title>Gaming World</title>
            <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>
            <?php require '../Menus/menuIndividual.php'; ?>
            <?php require '../bd.php'; ?>

            <div class="container-fluid mv-80">

                <div class="contenedor-titulo">
                    <?php
                    // Consulta SQL para obtener el nombre del género
                    $sel = "SELECT nombre FROM generos WHERE generoID = ?";
                    $statementGenero = $bd->prepare($sel);
                    $statementGenero->execute([$generoID]);
                    $genero = $statementGenero->fetch();
                    $nombreDelGenero = isset($genero['nombre']) ? $genero['nombre'] : 'Desconocido';

                    // Mostrar el nombre del género
                    echo "<h1 class='text-center mt-5 text-white mb-5'>Género: $nombreDelGenero</h1>";
                    ?>
                </div>

                <div class="row">
                    <?php
                    // Número de juegos por página
                    $registros_por_pagina = 16;

                    // Obtener la página actual
                    $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                    // Calcular el offset para la consulta SQL
                    $offset = ($pagina_actual - 1) * $registros_por_pagina;

                    // Consulta SQL para contar el total de juegos del género
                    $total_registros_query = "SELECT COUNT(*) AS total FROM juegos_generos WHERE generoID = ?";
                    $total_registros_statement = $bd->prepare($total_registros_query);
                    $total_registros_statement->execute([$generoID]);
                    $total_registros_result = $total_registros_statement->fetch();
                    $total_registros = $total_registros_result['total'];

                    // Calcular el total de páginas
                    $total_paginas = ceil($total_registros / $registros_por_pagina);

                    // Consulta SQL para obtener los juegos del género con paginación
                    $sel = "SELECT
                        juegos.juegoID,
                        juegos.nombre,
                        juegos.descripcion,
                        juegos.fecha_salida,
                        juegos.precio,
                        GROUP_CONCAT(generos.nombre) AS generos
                    FROM juegos
                    INNER JOIN juegos_generos ON juegos_generos.juegoID = juegos.juegoID
                    INNER JOIN generos ON generos.generoID = juegos_generos.generoID
                    WHERE juegos_generos.generoID = ?
                    GROUP BY juegos.juegoID
                    ORDER BY juegos.fecha_salida DESC
                    LIMIT $registros_por_pagina OFFSET $offset";

                    $juegos = $bd->prepare($sel);
                    $juegos->execute([$generoID]);

                    // Mostrar juegos
                    foreach ($juegos as $juego) {
                        ?>
                        <div class="col-md-3">
                            <div class="card mb-5 bg-dark text-white">
                                <a href='PagJuego.php?juegoID=<?= $juego['juegoID'] ?>' class='enlace-juego text-white'>
                                    <img class='card-img-top' src='../../Imagenes/ImagenesJuegos/<?= $juego['nombre'].".jpg" ?>' alt='<?= $juego['nombre'] ?>'>
                                    <div class='card-body'>
                                        <h5 class='card-title'><?= $juego['nombre'] ?></h5>
                                        <p class='card-text'>Precio: <?= $juego['precio'] ?></p>
                                        <p class='card-text'>Géneros: <?= $juego["generos"] ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <!-- Paginación -->
                <div class="container">
                    <ul class="pagination justify-content-center">
                        <?php
                        // Mostrar enlaces de paginación
                        for ($i = 1; $i <= $total_paginas; $i++) {
                            echo "<li class='page-item bg-dark'><a class='page-link bg-dark text-white' href='?pagina=$i&generoID=$generoID'>$i</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
    </html>

    <?php
}
?>
