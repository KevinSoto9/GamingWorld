<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $juegoID = $_POST["juegoID"];
    $desarrolladorID = $_POST["desarrolladorID"];

    try {
        require '../bd.php';

        $insertarAsociacion = "INSERT INTO `juegos_desarrolladores` (`JuegoID`, `desarrolladorID`) VALUES (:juegoID, :desarrolladorID)";
        
        $stmtInsertarAsociacion = $bd->prepare($insertarAsociacion);
            
        $stmtInsertarAsociacion->bindParam(':juegoID', $juegoID, PDO::PARAM_INT);
        $stmtInsertarAsociacion->bindParam(':desarrolladorID', $desarrolladorID, PDO::PARAM_INT);

        $stmtInsertarAsociacion->execute();
        
        header("Location:../Admin.php");
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
    <!-- Formulario para seleccionar el juego y el desarrollador -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <h1 class="formularioCrear-titulo">Introduzca el desarrollador a añadir</h1>
        
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
        
        <!-- Desarrolladores -->
        <label for="desarrolladorID">Seleccione el desarrollador:</label>
        <select name="desarrolladorID" id="desarrolladorID">
            <?php
             require '../bd.php';
             
            $consultaDesarrolladores = "SELECT desarrolladorID, nombre FROM desarrolladores ORDER BY nombre";
            $stmtDesarrolladores = $bd->query($consultaDesarrolladores);
            foreach ($stmtDesarrolladores as $fila) {
                echo "<option value='" . $fila['desarrolladorID'] . "'>" . $fila['nombre'] . "</option>";
            }
            ?>
        </select><br></br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
