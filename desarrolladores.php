<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>
    <?php 
        // Incluye el menú y la base de datos
        require 'menu.php'; 
        require 'bd.php'; 
    ?>

    <div class="container mb-5">
        <h1 class="text-center mt-5 mb-4">Lista de Desarrolladores</h1>

        <div class="row">
            <?php
            // Consultar todos los desarrolladores ordenados por nombre
            $desarrolladores_query = "SELECT desarrolladorID, nombre FROM desarrolladores ORDER BY nombre ASC";
            $statementDesarrolladores = $bd->prepare($desarrolladores_query);
            $statementDesarrolladores->execute();

            // Mostrar los desarrolladores
            $contador = 0;
            foreach ($statementDesarrolladores as $desarrollador) {
                $desarrolladorID = $desarrollador['desarrolladorID'];
                $nombreDesarrollador = $desarrollador['nombre'];
            ?>
                <div class="col-md-3 mb-4 mt-4">
                    <div class="card bg-dark text-white">
                        <div class="card-body text-center">
                            <!-- Enlace al desarrollador con su ID -->
                            <h5 class="card-title"><a href="PagDesarrollador.php?desarrolladorID=<?php echo $desarrolladorID; ?>" class="text-white"><?php echo $nombreDesarrollador; ?></a></h5>
                        </div>
                    </div>
                </div>
            <?php
                $contador++;
                // Cerrar la fila después de mostrar 4 desarrolladores
                if ($contador % 4 == 0) {
                    echo "</div><div class='row'>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
