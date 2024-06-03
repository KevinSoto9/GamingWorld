<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>
    <?php require 'menu.php'; ?>
    <?php require 'bd.php'; ?>

    <div class="container mb-5">
        <h1 class="text-center mt-5 mb-4">Lista de Géneros</h1>

        <div class="row">
            <?php
            // Consulta SQL para obtener todos los géneros
            $generos_query = "SELECT generoID, nombre FROM generos ORDER BY nombre ASC";
            $statementGeneros = $bd->prepare($generos_query);
            $statementGeneros->execute();

            // Mostrar los géneros
            $contador = 0;
            foreach ($statementGeneros as $genero) {
                $generoID = $genero['generoID'];
                $nombreGenero = $genero['nombre'];
                ?>
                <div class="col-md-3 mb-4 mt-4">
                    <div class="card bg-dark text-white">
                        <div class="card-body text-center">
                            <h5 class="card-title"><a href="PagGenero.php?generoID=<?php echo $generoID; ?>" class="text-white"><?php echo $nombreGenero; ?></a></h5>
                        </div>
                    </div>
                </div>
                <?php
                $contador++;
                // Cerrar la fila después de mostrar 4 géneros
                if ($contador % 4 == 0) {
                    echo "</div><div class='row'>";
                }
            }
            ?>
        </div>
    </div>

</body>
</html>
