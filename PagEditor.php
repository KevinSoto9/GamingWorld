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
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php require 'menu.php'; ?>
        <?php require 'bd.php'; ?>

        <div class="contenedor-titulo">
            <?php
            
            // Consulta SQL Editor
            $sel = "SELECT nombre FROM editores WHERE editorID = ?";
            $statementEditor = $bd->prepare($sel);
            $statementEditor->execute([$editorID]);
            $editor = $statementEditor->fetch();
            $nombreDelEditor = isset($editor['nombre']) ? $editor['nombre'] : 'Desconocido';

            // Nombre del editor
            echo "<div class='listado-titulo'>Editor: $nombreDelEditor</div>";
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
                echo "<input type='hidden' name='editorID' value='$editorID'>";
                echo "<button type='submit'>$i</button>";
                echo "</form>";
            }
            ?>
        </div>
    </body>
</html>
