<?php
// Obtener el ID del editor
$editorID = "";
if (isset($_GET["editorID"])) {
    $editorID = $_GET["editorID"];
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
    <?php require 'menu.php'; ?>
    <?php require 'bd.php'; ?>

    <div class="container-fluid">

        <div class="contenedor-titulo">
            <?php
            
            // Consulta SQL Editor
            $sel = "SELECT nombre FROM editores WHERE editorID = ?";
            $statementEditor = $bd->prepare($sel);
            $statementEditor->execute([$editorID]);
            $editor = $statementEditor->fetch();
            $nombreDelEditor = isset($editor['nombre']) ? $editor['nombre'] : 'Desconocido';

            // Nombre del editor
            echo "<h1 class='text-center mt-5 text-white mb-5'>Editor: $nombreDelEditor</h1>";
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

            // Consulta SQL para contar el total de juegos del editor
            $total_registros_query = "SELECT COUNT(*) AS total FROM juegos_editores WHERE editorID = ?";
            $total_registros_statement = $bd->prepare($total_registros_query);
            $total_registros_statement->execute([$editorID]);
            $total_registros_result = $total_registros_statement->fetch();
            $total_registros = $total_registros_result['total'];

            // Calcular el total de páginas
            $total_paginas = ceil($total_registros / $registros_por_pagina);

            // Consulta SQL para obtener los juegos del editor con paginación
            $sel = "SELECT
            juegos.juegoID,
            juegos.nombre,
            juegos.imagen,
            juegos.descripcion,
            juegos.fecha_salida,
            juegos.precio,
            GROUP_CONCAT(editores.nombre) AS editores
        FROM juegos
        INNER JOIN juegos_editores ON juegos_editores.juegoID = juegos.juegoID
        INNER JOIN editores ON editores.editorID = juegos_editores.editorID
        WHERE juegos_editores.editorID = ?
        GROUP BY juegos.juegoID
        ORDER BY juegos.fecha_salida DESC
        LIMIT $registros_por_pagina OFFSET $offset";

            $juegos = $bd->prepare($sel);
            $juegos->execute([$editorID]);

            // Juegos
            foreach ($juegos as $juego) {
                ?>
                <div class="col-md-3">
                    <div class="card mb-5 bg-dark text-white">
                        <a href='PagJuego.php?juegoID=<?= $juego['juegoID'] ?>' class='enlace-juego text-white'>
                            <img class='card-img-top' src='ImagenesJuegos/<?= $juego['imagen'] ?>' alt='<?= $juego['nombre'] ?>'>
                            <div class='card-body'>
                                <h5 class='card-title'><?= $juego['nombre'] ?></h5>
                                <p class='card-text'>Precio: <?= $juego['precio'] ?></p>
                                <p class='card-text'>Editores: <?= $juego["editores"] ?></p>
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
                    echo "<li class='page-item bg-dark'><a class='page-link bg-dark text-white' href='?pagina=$i&editorID=$editorID'>$i</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
