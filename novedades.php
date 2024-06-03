<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='assets/cssPlus/cssPlus.css'>
</head>
<body>
  
        <?php 
        // Requires
        require 'menu.php';
        require 'bd.php';

        //Fecha actual
        $fechaActual = date('Y-m-d');

        // Consulta SQL
        $sel = "SELECT * FROM novedades ORDER BY fecha DESC";
        $novedades = $bd->query($sel);
        ?>
<div class="container mt-5">
        <div class="titulo text-center mb-5">
            <h1>Novedades</h1>
        </div>

        <div class="row">
            <?php foreach ($novedades as $novedad): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <img src="ImagenesNovedades/<?php echo $novedad['imagen']; ?>" class="card-img-top" alt="<?php echo $novedad['titulo']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $novedad['titulo']; ?></h5>
                            <p class="card-text"><?php echo $novedad['descripcion']; ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Fecha de Lanzamiento: <?php echo $novedad['fecha']; ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <?php
    require 'footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
