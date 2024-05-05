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

                //Fecha actual
                $fechaActual = date('Y-m-d');
                
                // Consulta SQL
                $sel = "SELECT * FROM novedades ORDER BY fecha DESC";

                $novedades = $bd->query($sel);
                
                // Inicio lista de novedades
                
                $html = "";
                
                $html .= "<div class='titulo'>";
                $html .= "<h1>Novedades</h1>";
                $html .= "</div>";
                
                $html .= "<div class='calendario-link'>";
                $html .= "<button onclick=\"location.href = 'calendario.php'\">Ver Calendario</button>";
                $html .= "</div>";

                foreach ($novedades as $novedad) {

                    $html .= "<div class='juegoSolo' style='background-color: black; color: white;'>";
                    $html .= "<div class='contenidoSolo'>";
                    
                    //Contenedor Principal
                    $html .= "<div class='infoPrincipal'>";
                    
                    // Titulo
                    $html .= "<h2>$novedad[titulo]</h2>";
                    
                    // Imagen
                    $html .= "<img src='ImagenesNovedades/{$novedad['imagen']}' alt='$novedad[titulo]'>";
                    $html .= "</div>";
                    
                    //Contenedor Secundario
                    $html .= "<div class='infoSecundaria'>";
                    // Descripcion
                    $html .= "<p>$novedad[descripcion]</p>";
                    $html .= "</div>";
                    
                    //Contenedor Final
                    $html .= "<div class='infoFinal'>";
                    // Fecha
                    $html .= "<p>Fecha de Lanzamiento: $novedad[fecha]</p>";
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

