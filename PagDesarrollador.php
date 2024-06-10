<?php
session_start();

$html = "";

if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioID'] === null) {
    // Si el usuario no ha iniciado sesión, requerir la página de no inicio de sesión
    require 'NoInicioSesion.php';
} else {
    // Si el usuario ha iniciado sesión, proceder con la visualización de la página

    // Obtener el ID del desarrollador
    $desarrolladorID = isset($_GET["desarrolladorID"]) ? $_GET["desarrolladorID"] : "";

    ?>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <?php require 'menu.php'; ?>
    <?php require 'bd.php'; ?>

    <div class="container-fluid">

        <div class="contenedor-titulo">
            <?php
            // Consulta SQL para obtener el nombre del desarrollador
            $sel = "SELECT nombre FROM desarrolladores WHERE desarrolladorID = ?";
            $statementDesarrollador = $bd->prepare($sel);
            $statementDesarrollador->execute([$desarrolladorID]);
            $desarrollador = $statementDesarrollador->fetch();
            $nombreDelDesarrollador = isset($desarrollador['nombre']) ? $desarrollador['nombre'] : 'Desconocido';

            // Mostrar el nombre del desarrollador
            echo "<h1 class='text-center mt-5 text-white mb-5'>Desarrollador: $nombreDelDesarrollador</h1>";
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

            // Consulta SQL para contar el total de juegos del desarrollador
            $total_registros_query = "SELECT COUNT(*) AS total FROM juegos_desarrolladores WHERE desarrolladorID = ?";
            $total_registros_statement = $bd->prepare($total_registros_query);
            $total_registros_statement->execute([$desarrolladorID]);
            $total_registros_result = $total_registros_statement->fetch();
            $total_registros = $total_registros_result['total'];

            // Calcular el total de páginas
            $total_paginas = ceil($total_registros / $registros_por_pagina);

            // Consulta SQL para obtener los juegos del desarrollador con paginación
            $sel = "SELECT
                        juegos.juegoID,
                        juegos.nombre,
                        juegos.descripcion,
                        juegos.fecha_salida,
                        juegos.precio,
                        GROUP_CONCAT(desarrolladores.nombre) AS desarrolladores
                    FROM juegos
                    INNER JOIN juegos_desarrolladores ON juegos_desarrolladores.juegoID = juegos.juegoID
                    INNER JOIN desarrolladores ON desarrolladores.desarrolladorID = juegos_desarrolladores.desarrolladorID
                    WHERE juegos_desarrolladores.desarrolladorID = ?
                    GROUP BY juegos.juegoID
                    ORDER BY juegos.fecha_salida DESC
                    LIMIT $registros_por_pagina OFFSET $offset";

            $juegos = $bd->prepare($sel);
            $juegos->execute([$desarrolladorID]);

            // Mostrar los juegos
            foreach ($juegos as $juego) {
                ?>
                <div class="col-md-3">
                    <div class="card mb-5 bg-dark text-white">
                        <a href='PagJuego.php?juegoID=<?= $juego['juegoID'] ?>' class='enlace-juego text-white'>
                            <img class='card-img-top' src='ImagenesJuegos/<?= $juego['nombre'].".jpg" ?>' alt='<?= $juego['nombre'] ?>'>
                            <div class='card-body'>
                                <h5 class='card-title'><?= $juego['nombre'] ?></h5>
                                <p class='card-text'>Precio: <?= $juego['precio'] ?></p>
                                <p class='card-text'>Desarrolladores: <?= $juego["desarrolladores"] ?></p>
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
                for ($i = 1; $i <= $total_paginas; $i++) {
                    echo "<li class='page-item bg-dark'><a class='page-link bg-dark text-white' href='?pagina=$i&desarrolladorID=$desarrolladorID'>$i</a></li>";
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
