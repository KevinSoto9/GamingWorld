<?php
// Obtener el ID del desarrollador
$desarrolladorID = "";
if (isset($_GET["desarrolladorID"])) {
    $desarrolladorID = $_GET["desarrolladorID"];
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php require 'menu.php'; ?>
        <?php require 'bd.php'; ?>

        <div class="contenedor-titulo">
            <?php
            
            // Consulta SQL Desarrollador
            $sel = "SELECT nombre FROM desarrolladores WHERE desarrolladorID = ?";
            $statementDesarrollador = $bd->prepare($sel);
            $statementDesarrollador->execute([$desarrolladorID]);
            $desarrollador = $statementDesarrollador->fetch();
            $nombreDelDesarrollador = isset($desarrollador['nombre']) ? $desarrollador['nombre'] : 'Desconocido';

            // Nombre del desarrollador
            echo "<div class='listado-titulo'>Desarrollador: $nombreDelDesarrollador</div>";
            ?>
        </div>

        <div class="contenedor-juegos">
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
            juegos.imagen,
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

            // Juegos
            foreach ($juegos as $juego) {
                ?>
                <a href='PagJuego.php?juegoID=<?= $juego['juegoID'] ?>' class='enlace-juego'>
                    <div class='juego'>
                        <div class='contenido'>
                            
                            <!-- Nombre -->
                            <h2><?= $juego['nombre'] ?></h2>
                            
                            <!-- Imagen -->
                            <img src='<?= $juego['imagen'] ?>' alt='<?= $juego['nombre'] ?>'>
                            
                            <!-- Precio -->
                            <p>Precio: <?= $juego['precio'] ?></p>
                        </div>
                    </div>
                </a>
                <?php
            }
            ?>
        </div> 

        <!-- Paginación -->
        <div class='paginacion'>
            <?php
            for ($i = 1; $i <= $total_paginas; $i++) {
                echo "<form action='' method='GET' style='display:inline;'>";
                echo "<input type='hidden' name='pagina' value='$i'>";
                echo "<input type='hidden' name='desarrolladorID' value='$desarrolladorID'>";
                echo "<button type='submit'>$i</button>";
                echo "</form>";
            }
            ?>
        </div>
    </body>
</html>
