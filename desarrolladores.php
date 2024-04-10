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
        <h1>Lista de Desarrolladores</h1>
    </div>

    <div class="contenedor-listados">
        <?php
        // Consulta SQL para obtener todos los géneros
        $desarrolladores_query = "SELECT desarrolladorID, nombre FROM desarrolladores ORDER BY nombre ASC";
        $statementDesarrolladores = $bd->prepare($desarrolladores_query);
        $statementDesarrolladores->execute();

        // Mostrar los géneros
        $contador = 0;
        echo "<div class='fila'>";
        foreach ($statementDesarrolladores as $desarrollador) {
            $desarrolladorID = $desarrollador['desarrolladorID'];
            $nombreDesarrollador = $desarrollador['nombre'];
            echo "<div class='listado'>";
            echo "<a class='enlace-listado' href='PagDesarrollador.php?desarrolladorID=$desarrolladorID'>$nombreDesarrollador</a>";
            echo "</div>";
            $contador++;
            // Cerrar la fila después de mostrar 4 géneros
            if ($contador % 4 == 0) {
                echo "</div><div class='fila'>";
            }
        }
        echo "</div>";
        ?>
    </div>

</body>
</html>
