<?php
$generoID = "";
if (isset($_GET["generoID"])) {
    $generoID = $_GET["generoID"];
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <div>
                <?php
                require 'menu.php';
                require 'bd.php';

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

                $queryGenero = "SELECT nombre FROM generos WHERE generoID = ?";
                $statementGenero = $bd->prepare($queryGenero);
                $statementGenero->execute([$generoID]);
                $genero = $statementGenero->fetch();
                $nombreDelGenero = isset($genero['nombre']) ? $genero['nombre'] : 'Desconocido';

                $html = "";

                $html .= "Genero: " . $nombreDelGenero . "";

                foreach ($juegos as $juego) {

                    $html .= "<a  href='PagJuego.php?juegoID=$juego[juegoID]'>";
                    $html .= "<div class='juego'style='background-color: black; color: white;' >";
                    $html .= "<div class='contenido' >";
                    $html .= "<h2>$juego[nombre]</h2>";
                    $html .= "<img src='$juego[imagen]' alt='$juego[nombre]'>";
                    $html .= "<p>Precio: $juego[precio]</p>";
                    $html .= "</p>";
                    $html .= "</div>";
                    $html .= "</div>";
                    $html .= "</a>";
                }

                echo $html;
                ?>
            </div>
        </div>
    </body>
</html>
