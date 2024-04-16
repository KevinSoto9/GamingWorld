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
                ?>
                
                
                
                
                <?php
                
                $fechaActual = date('Y-m-d');
                
                
                $sel = "SELECT * FROM noticias";

                $novedades = $bd->query($sel);
                
                // Inicio lista de novedades
                
                $html = "";
                
                $html .= "<div class='titulo'>";
                $html .= "<h1>Noticias</h1>";
                $html .= "</div>";

                foreach ($novedades as $novedad) {

                    $html .= "<div class='juegoSolo' style='background-color: black; color: white;'>";
                    $html .= "<a href='PagNoticia.php?noticiaID={$novedad['noticiaID']}' class='enlace-juego'>";
                    $html .= "<div class='contenidoSolo'>";
                    
                    //Contenedor Principal
                    $html .= "<div class='infoPrincipal'>";
                    
                    // Titulo
                    $html .= "<h2>$novedad[titulo]</h2>";
                    
                    // Imagen
                    $html .= "<img src='$novedad[imagen]' alt='$novedad[titulo]'>";
                    $html .= "</div>";
                    
                    //Contenedor Secundario
                    $html .= "<div class='infoSecundaria'>";
                    // Descripcion
                    $html .= "<p>$novedad[resumen]</p>";
                    $html .= "</div>";
                    
                    $html .= "<a>";
                    $html .= "</div>";
                }

                echo $html;
                ?>
            </div>
        </div>
    </body>
</html>

