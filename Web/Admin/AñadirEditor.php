<?php

session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {
    
    require '../PaginasAdicionales/PersonalAutorizado.php';
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
        
        header("Location:../PaginasPrincipales/Admin.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gaming World - Añadir Editor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <?php require '../Menus/menu2.php'; ?>
    
</head>
<body>
    <!-- Formulario para seleccionar el juego y el editor -->
    <div class="container mt-5">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1 class="text-center">Introduzca el editor a añadir</h1>
            
            <div class="form-group">
                <label for="juegoID">Seleccione un juego existente:</label>
                <!-- Juego -->
                <select name="juegoID" id="juegoID" class="form-control">
                    <?php
                    require '../bd.php';
                    $consultaJuegos = "SELECT JuegoID, nombre FROM juegos ORDER BY nombre";
                    $stmtJuegos = $bd->query($consultaJuegos);
                    foreach ($stmtJuegos as $fila) {
                        echo "<option value='" . $fila['JuegoID'] . "'>" . $fila['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="editorID">Seleccione el editor:</label>
                <!-- Editores -->
                <select name="editorID" id="editorID" class="form-control">
                    <?php
                    $consultaEditores = "SELECT editorID, nombre FROM editores ORDER BY nombre";
                    $stmtEditores = $bd->query($consultaEditores);
                    foreach ($stmtEditores as $fila) {
                        echo "<option value='" . $fila['editorID'] . "'>" . $fila['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
}
?>