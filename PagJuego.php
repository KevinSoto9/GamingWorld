<?php

// Conseguir el ID del Juego
$juegoID = "";
if (isset($_GET["juegoID"])) {
    $juegoID = $_GET["juegoID"];
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div>
            <div>
                <?php
                
                // Requires
                require 'menu.php';
                require 'bd.php';
                
                // Consulta SQL
                $sel = "SELECT
            juegos.juegoID,
            juegos.nombre,
            juegos.imagen,
            juegos.descripcion,
            juegos.fecha_salida,
            juegos.precio,
            GROUP_CONCAT(DISTINCT generos.nombre) AS generos,
            desarrolladores.nombre AS desarrollador,
            editores.nombre AS editor
        FROM juegos
        INNER JOIN juegos_generos ON juegos_generos.juegoID = juegos.juegoID
        INNER JOIN generos ON generos.generoID = juegos_generos.generoID
        INNER JOIN juegos_desarrolladores ON juegos_desarrolladores.juegoID = juegos.juegoID
        INNER JOIN desarrolladores ON desarrolladores.desarrolladorID = juegos_desarrolladores.desarrolladorID
        INNER JOIN juegos_editores ON juegos_editores.juegoID = juegos.juegoID
        INNER JOIN editores ON editores.editorID = juegos_editores.editorID
        WHERE juegos.juegoID = '$juegoID'
        GROUP BY juegos.juegoID";

                $juegos = $bd->query($sel);
                
                // Inicio lista de juegos
                $html = "";

                foreach ($juegos as $juego) {

                    $html .= "<div class='juegoSolo' style='background-color: black; color: white;'>";
                    $html .= "<div class='contenidoSolo'>";
                    
                    //Contenedor Principal
                    $html .= "<div class='infoPrincipal'>";
                    
                    // Nombre
                    $html .= "<h2>$juego[nombre]</h2>";
                    
                    // Imagen
                    $html .= "<img src='$juego[imagen]' alt='$juego[nombre]'>";
                    $html .= "</div>";
                    
                    //Contenedor Secundario
                    $html .= "<div class='infoSecundaria'>";
                    
                    // Descripcion
                    $html .= "<p>$juego[descripcion]</p>";
                    $html .= "</div>";
                    
                    //Contenedor Final
                    $html .= "<div class='infoFinal'>";
                    // Precio
                    $html .= "<p>Precio: $juego[precio]</p>";
                    
                    // Fecha de salida
                    $fecha_salida = $juego['fecha_salida'];
                    $fecha_formateada = date("d \\ F \\ Y", strtotime($fecha_salida));
                    $html .= "<p>Fecha de salida: $fecha_formateada</p>";
                    
                    //  Generos
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

                    // Desarrollador
                    $html .= "<p>Desarrollador: $juego[desarrollador]</p>";

                    // Editor
                    $html .= "<p>Editor: $juego[editor]</p>";
                    $html .= "</div>";

                    $html .= "</div>";
                    $html .= "</div>";
                }

                echo $html;
                ?>
            </div>
        </div>
    </body>
</html>
