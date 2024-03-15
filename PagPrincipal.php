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
                    GROUP BY juegos.juegoID";
                $juegos = $bd->query($sel);

                $html = "";

                foreach ($juegos as $juego) {

                    $html .= "<a  href='PagJuego.php?juegoID=$juego[juegoID]'>";
                    $html .= "<div class='juego'style='background-color: black; color: white;' >";
                    $html .= "<div class='contenido' >";
                    $html .= "<h2>$juego[nombre]</h2>";
                    $html .= "<img src='$juego[imagen]' alt='$juego[nombre]'>";
                    $html .= "<p>Precio: $juego[precio]</p>";

                    $generos = explode(",", $juego["generos"]);
                    $html .= "<p>Géneros: ";
                    foreach ($generos as $genero) {
                        $query = "SELECT generoID FROM generos WHERE nombre = ?";
                        $statement = $bd->prepare($query);
                        $statement->execute([$genero]);
                        $resultado = $statement->fetch();
                        $generoID = isset($resultado['generoID']) ? urlencode($resultado['generoID']) : '';
                        $html .= "<a href='PagGenero.php?generoID=$generoID' id='$generoID'>$genero</a>, ";
                    }
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
