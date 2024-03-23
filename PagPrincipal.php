<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
    </head>
    <body>
        <div>
            <?php
            require 'menu.php';
            require 'bd.php';

            echo "<link rel='stylesheet' href='css/main.css'>";

            // Num de juegos por pagina
            $registros_por_pagina = 16;

            // Obtener la paggina actual
            $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

            // Offset por donde empezar a coger datos
            $offset = ($pagina_actual - 1) * $registros_por_pagina;

            // Numero total de juegos
            $total_registros_query = "SELECT COUNT(*) AS total FROM juegos";
            $total_registros_result = $bd->query($total_registros_query);
            $total_registros = $total_registros_result->fetch()['total'];

            $total_paginas = ceil($total_registros / $registros_por_pagina);

            // Consulta SQL (para que coja 16 por cada pagina)
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
                GROUP BY juegos.juegoID
                ORDER BY juegos.fecha_salida DESC
                LIMIT $registros_por_pagina OFFSET $offset";

            $juegos = $bd->query($sel);

            // Lista de juegos
            $html = "<div class='contenedor-juegos'>";

            foreach ($juegos as $juego) {
                $html .= "<div class='contenedor-juegos-content'>";
                $html .= "<a href='PagJuego.php?juegoID={$juego['juegoID']}' class='enlace-juego'>";
                $html .= "<div class='juego'>";
                $html .= "<div class='contenido'>";

                // Nombre
                $html .= "<h2>{$juego['nombre']}</h2>";

                // Imagen
                $html .= "<img src='{$juego['imagen']}' alt='{$juego['nombre']}'>";

                // Precio
                $html .= "<p>Precio: {$juego['precio']}</p>";

                // Generos 
                $generos = explode(",", $juego["generos"]);
                $html .= "<p>Géneros: ";
                foreach ($generos as $genero) {
                    $query = "SELECT generoID FROM generos WHERE nombre = ?";
                    $statement = $bd->prepare($query);
                    $statement->execute([$genero]);
                    $resultado = $statement->fetch();
                    $generoID = isset($resultado['generoID']) ? urlencode($resultado['generoID']) : '';
                    $html .= "<a class='generos' href='PagGenero.php?generoID=$generoID' id='$generoID'>$genero</a>, ";
                }
                $html .= "</p>";
                $html .= "</div>";
                $html .= "</div>";
                $html .= "</a>";
                $html .= "</div>";
            }

            $html .= "</div>";

            // Paginación botonoes
            $html .= "<div class='paginacion'>";
            for ($i = 1; $i <= $total_paginas; $i++) {
                $html .= "<form action='' method='GET' style='display:inline;'>";
                $html .= "<input type='hidden' name='pagina' value='$i'>";
                $html .= "<button type='submit'>$i</button>";
                $html .= "</form>";
            }
            $html .= "</div>";

            echo $html;
            ?>
        </div>
    </body>
</html>
