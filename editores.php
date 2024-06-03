<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>
    <?php require 'menu.php'; ?>
    <?php require 'bd.php'; ?>

    <div class="container mb-5">
        <h1 class="text-center mt-5 mb-4">Lista de Editores</h1>

        <div class="row">
            <?php
            // Consulta SQL para obtener todos los editores
            $editores_query = "SELECT editorID, nombre FROM editores ORDER BY nombre ASC";
            $statementEditores = $bd->prepare($editores_query);
            $statementEditores->execute();

            // Mostrar los editores
            $contador = 0;
            foreach ($statementEditores as $editor) {
                $editorID = $editor['editorID'];
                $nombreEditor = $editor['nombre'];
                ?>
                <div class="col-md-3 mb-4 mt-4">
                    <div class="card bg-dark text-white">
                        <div class="card-body text-center">
                            <h5 class="card-title"><a href="PagEditor.php?editorID=<?php echo $editorID; ?>" class="text-white"><?php echo $nombreEditor; ?></a></h5>
                        </div>
                    </div>
                </div>
                <?php
                $contador++;
                // Cerrar la fila después de mostrar 4 editores
                if ($contador % 4 == 0) {
                    echo "</div><div class='row'>";
                }
            }
            ?>
        </div>
    </div>

</body>
</html>
