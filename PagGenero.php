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
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php require 'menu.php'; ?>
    <?php require 'bd.php'; ?>

    <div class="contenedor-titulo">
        <?php
        // Consulta para obtener el nombre del genero

        $sel = "SELECT nombre FROM generos WHERE generoID = ?";
        $statementGenero = $bd->prepare($sel);
        $statementGenero->execute([$generoID]);
        $genero = $statementGenero->fetch();
        $nombreDelGenero = isset($genero['nombre']) ? $genero['nombre'] : 'Desconocido';
        
        // Nombre del genero
        echo "<div class='genero-titulo'>Género: $nombreDelGenero</div>";
        ?>
    </div>

    <div class="contenedor-juegos">
        <?php
        
        // Consulta SQL
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
        WHERE juegos_generos.generoID = '$generoID'
        GROUP BY juegos.juegoID";

        $juegos = $bd->query($sel);
        
        // Inicio lista de juegos de genero X
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

</body>
</html>
