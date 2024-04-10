<html>
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php require 'menu.php'; ?>
    <?php require 'bd.php'; ?>

    <div class="contenedor-titulo">
        <h1>Lista de Editores</h1>
    </div>

    <div class="contenedor-listados">
        <?php
        // Consulta SQL para obtener todos los editores
        $editores_query = "SELECT editorID, nombre FROM editores ORDER BY nombre ASC";
        $statementEditores = $bd->prepare($editores_query);
        $statementEditores->execute();

        // Mostrar los editores
        $contador = 0;
        echo "<div class='fila'>";
        foreach ($statementEditores as $editor) {
            $editorID = $editor['editorID'];
            $nombreEditor = $editor['nombre'];
            echo "<div class='listado'>";
            echo "<a class='enlace-listado' href='PagEditor.php?editorID=$editorID'>$nombreEditor</a>";
            echo "</div>";
            $contador++;
            // Cerrar la fila después de mostrar 4 editores
            if ($contador % 4 == 0) {
                echo "</div><div class='fila'>";
            }
        }
        echo "</div>";
        ?>
    </div>

</body>
</html>
