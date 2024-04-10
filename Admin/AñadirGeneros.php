<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $juegoID = $_POST["juegoID"];

    $generosSeleccionados = array($_POST["genero1"], $_POST["genero2"], $_POST["genero3"]);

    try {
        require '../bd.php';

        // Verificar que los generos no estén repetidos
        if (count($generosSeleccionados) !== count(array_unique($generosSeleccionados))) {
            echo "Error: Se han seleccionado géneros duplicados.";
        } else {

            $insertarAsociaciones = "INSERT INTO `juegos_generos` (`JuegoID`, `generoID`) VALUES ";
            foreach ($generosSeleccionados as $genero) {
                $insertarAsociaciones .= "(:juegoID, $genero),";
            }
            $insertarAsociaciones = rtrim($insertarAsociaciones, ',');

            $stmtInsertarAsociaciones = $bd->prepare($insertarAsociaciones);
            
            $stmtInsertarAsociaciones->bindParam(':juegoID', $juegoID, PDO::PARAM_INT);

            $stmtInsertarAsociaciones->execute();
            
            header("Location:../Admin.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="../css/styles.css">
    
    <?php require '../menu2.php'; ?>
    
</head>
<body>
    <!-- Formulario para seleccionar el juego y los generos -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <h1 class="formularioCrear-titulo">Introduzca los generos a añadir</h1>
        
        <label for="juegoID">Seleccione un juego existente:</label>
        
        <!-- Juego -->
        <select name="juegoID" id="juegoID">
            <?php
             require '../bd.php';
             
            $consultaJuegos = "SELECT JuegoID, nombre FROM juegos ORDER BY nombre";
            $stmtJuegos = $bd->query($consultaJuegos);
            foreach ($stmtJuegos as $fila) {
                echo "<option value='" . $fila['JuegoID'] . "'>" . $fila['nombre'] . "</option>";
            }
            ?>
        </select><br></br>
        
        <!-- Generos -->
        <label for="genero1">Seleccione el primer género:</label>
        <select name="genero1" id="genero1">
            <?php
             require '../bd.php';
             
            $consultaGeneros = "SELECT GeneroID, nombre FROM generos ORDER BY nombre";
            $stmtGeneros = $bd->query($consultaGeneros);
            foreach ($stmtGeneros as $fila) {
                echo "<option value='" . $fila['GeneroID'] . "'>" . $fila['nombre'] . "</option>";
            }
            ?>
        </select><br></br>

        <label for="genero2">Seleccione el segundo género:</label>
        <select name="genero2" id="genero2">
            <?php

            $stmtGeneros = $bd->query($consultaGeneros);
            foreach ($stmtGeneros as $fila) {
                echo "<option value='" . $fila['GeneroID'] . "'>" . $fila['nombre'] . "</option>";
            }
            ?>
        </select><br></br>

        <label for="genero3">Seleccione el tercer género:</label>
        <select name="genero3" id="genero3">
            <?php

            $stmtGeneros = $bd->query($consultaGeneros);
            foreach ($stmtGeneros as $fila) {
                echo "<option value='" . $fila['GeneroID'] . "'>" . $fila['nombre'] . "</option>";
            }
            ?>
        </select><br></br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
