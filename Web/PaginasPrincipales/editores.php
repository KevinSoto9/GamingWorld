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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>
    <?php 
        // Incluye el menú y la base de datos
        require '../Menus/menu.php'; 
        require '../bd.php'; 
    ?>

    <div class="container mb-5">
        <h1 class="text-center mt-5 mb-4">Lista de Editores</h1>

        <div class="row">
            <?php
            // Consultar todos los editores ordenados por nombre
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
                            <!-- Enlace al editor con su ID -->
                            <h5 class="card-title"><a href="../PaginasIndividuales/PagEditor.php?editorID=<?php echo $editorID; ?>" class="text-white"><?php echo $nombreEditor; ?></a></h5>
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
<?php
    }
    ?>