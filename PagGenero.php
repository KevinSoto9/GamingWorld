<?php
// Obtener el ID del genero
$generoID = "";
if (isset($_GET["generoID"])) {
    $generoID = $_GET["generoID"];
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php require 'menu.php'; ?>
        <?php require 'bd.php'; ?>

        <div class="contenedor-titulo">
            <?php
            
            // Consulta SQL Genero
            $sel = "SELECT nombre FROM generos WHERE generoID = ?";
            $statementGenero = $bd->prepare($sel);
            $statementGenero->execute([$generoID]);
            $genero = $statementGenero->fetch();
            $nombreDelGenero = isset($genero['nombre']) ? $genero['nombre'] : 'Desconocido';

            // Nombre del genero
            echo "<div class='listado-titulo'>Género: $nombreDelGenero</div>";
            ?>
        </div>

        <div class="contenedor-juegos">
            <?php
            
            // Número de juegos por pagina
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

            // Calcular el total de paginas
            $total_paginas = ceil($total_registros / $registros_por_pagina);

            // Consulta SQL para obtener los juegos del genero con paginacion
            $sel = "SELECT
            juegos.juegoID,
            juegos.nombre,
            juegos.imagen,
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

            // Juegos
            foreach ($juegos as $juego) {
                ?>
                <a href='PagJuego.php?juegoID=<?= $juego['juegoID'] ?>' class='enlace-juego'>
                    <div class='juego'>
                        <div class='contenido'>
                            
                            <!-- Nombre -->
                            <h2><?= $juego['nombre'] ?></h2>
                            
                            <!-- Imagen -->
                            <img src='ImagenesJuegos/<?= $juego['imagen'] ?>' alt='<?= $juego['nombre'] ?>'>
                            
                            <!-- Precio -->
                            <p>Precio: <?= $juego['precio'] ?></p>
                        </div>
                    </div>
                </a>
                <?php
            }
            ?>
        </div> 

        <!-- Paginacioin -->
        <div class='paginacion'>
            <?php
            for ($i = 1; $i <= $total_paginas; $i++) {
                echo "<form action='' method='GET' style='display:inline;'>";
                echo "<input type='hidden' name='pagina' value='$i'>";
                echo "<input type='hidden' name='generoID' value='$generoID'>";
                echo "<button type='submit'>$i</button>";
                echo "</form>";
            }
            ?>
        </div>
    </body>
</html>
