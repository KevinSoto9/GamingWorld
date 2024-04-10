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
        <h1>Lista de Géneros</h1>
    </div>

    <div class="contenedor-listados">
        <?php
        // Consulta SQL para obtener todos los géneros
        $generos_query = "SELECT generoID, nombre FROM generos ORDER BY nombre ASC";
        $statementGeneros = $bd->prepare($generos_query);
        $statementGeneros->execute();

        // Mostrar los géneros
        $contador = 0;
        echo "<div class='fila'>";
        foreach ($statementGeneros as $genero) {
            $generoID = $genero['generoID'];
            $nombreGenero = $genero['nombre'];
            echo "<div class='listado'>";
            echo "<a class='enlace-listado' href='PagGenero.php?generoID=$generoID'>$nombreGenero</a>";
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
