<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a la hoja de estilos personalizada -->
    <link rel='stylesheet' href='assets/cssPlus/cssPlus.css'>
</head>
<body class="text-white">
    <!-- Incluye el menú -->
    <?php require 'menu.php'; ?>

    <div class="container mt-5">
        <?php
        // Conexión a la base de datos
        require 'bd.php';
        
        // Consulta SQL para obtener las noticias y sus detalles, ordenadas por fecha de publicación
        $sel = "SELECT n.*
                FROM noticias AS n
                INNER JOIN noticias_detalles AS nd ON n.noticiaID = nd.noticiaID
                ORDER BY nd.fechaPublicacion DESC";

        // Ejecución de la consulta
        $novedades = $bd->query($sel);
        
        // Título de la sección de noticias
        echo "<div class='text-center mb-5'>";
        echo "<h1>Noticias</h1>";
        echo "</div>";

        // Contenedor de las noticias
        echo "<div class='row'>";
        // Bucle a través de cada noticia obtenida
        foreach ($novedades as $novedad) {
            // Tarjeta para cada noticia
            echo "<div class='col-md-4 mb-4'>";
            echo "<div class='card bg-dark text-white h-100'>";
            echo "<a href='PagNoticia.php?noticiaID={$novedad['noticiaID']}' class='enlace-juego text-white'>";
            echo "<img src='ImagenesNoticias/{$novedad['titulo']}.jpg' class='card-img-top' alt='{$novedad['titulo']}'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$novedad['titulo']}</h5>";
            echo "<p class='card-text'>{$novedad['resumen']}</p>";
            echo "</div>";
            echo "</a>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
        ?>
    </div>
    
    <!-- Incluye el pie de página -->
    <?php require 'footer.php'; ?>

    <!-- Scripts de JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
