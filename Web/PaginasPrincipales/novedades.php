<?php

if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioID'] === null) {
    // Requerir archivo para usuario no logueado
    require '../PaginasAdicionales/NoInicioSesion.php';
} else {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a la hoja de estilos personalizada -->
    <link rel='stylesheet' href='../../assets/cssPlus/cssPlus.css'>
</head>
<body>

    <?php 
    // Incluir menú de navegación y conexión a la base de datos
    require '../Menus/menu.php';
    require '/..bd.php';

    // Obtener la fecha actual
    $fechaActual = date('Y-m-d');

    // Consulta SQL para obtener las novedades ordenadas por fecha descendente
    $sel = "SELECT * FROM novedades ORDER BY fecha DESC";
    $novedades = $bd->query($sel);
    ?>
    
    <div class="container mt-5">
        <div class="titulo text-center mb-5">
            <h1>Novedades</h1>
        </div>

        <div class="row">
            <!-- Iterar sobre cada novedad para mostrarla en la página -->
            <?php foreach ($novedades as $novedad): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <!-- Imagen de la novedad -->
                        <img src="../../Imagenes/ImagenesNovedades/<?php echo $novedad['titulo'].".jpg"; ?>" class="card-img-top" alt="<?php echo $novedad['titulo']; ?>">
                        <div class="card-body">
                            <!-- Título de la novedad -->
                            <h5 class="card-title"><?php echo $novedad['titulo']; ?></h5>
                            <!-- Descripción de la novedad -->
                            <p class="card-text"><?php echo $novedad['descripcion']; ?></p>
                        </div>
                        <div class="card-footer">
                            <!-- Fecha de lanzamiento de la novedad -->
                            <small class="text-muted">Fecha de Lanzamiento: <?php echo $novedad['fecha']; ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <?php
    // Incluir pie de página
    require '../Funciones/footer.php';
    ?>

    <!-- Enlaces a las librerías JavaScript de jQuery y Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    }
    ?>