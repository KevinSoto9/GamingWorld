<?php

session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {
    $html .= "<div class='NoAdmin'>";
    $html .= "No has iniciado sesión";
    $html .= "<button onclick='window.location.href=\"index.php\"'>Hazlo Aquí</button>";
    $html .= "</div>";
   
    echo $html;
}

else{
    

session_abort();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $juegoID = $_POST["juegoID"];
    $editorID = $_POST["editorID"];

    try {
        require '../bd.php';

        $insertarAsociacion = "INSERT INTO `juegos_editores` (`JuegoID`, `editorID`) VALUES (:juegoID, :editorID)";
        
        $stmtInsertarAsociacion = $bd->prepare($insertarAsociacion);
            
        $stmtInsertarAsociacion->bindParam(':juegoID', $juegoID, PDO::PARAM_INT);
        $stmtInsertarAsociacion->bindParam(':editorID', $editorID, PDO::PARAM_INT);

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
    <!-- Formulario para seleccionar el juego y el editor -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <h1 class="formularioCrear-titulo">Introduzca el editor a añadir</h1>
        
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
        
        <!-- Editores -->
        <label for="editorID">Seleccione el editor:</label>
        <select name="editorID" id="editorID">
            <?php
             require '../bd.php';
             
            $consultaEditores = "SELECT editorID, nombre FROM editores ORDER BY nombre";
            $stmtEditores = $bd->query($consultaEditores);
            foreach ($stmtEditores as $fila) {
                echo "<option value='" . $fila['editorID'] . "'>" . $fila['nombre'] . "</option>";
            }
            ?>
        </select><br></br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
}
?>