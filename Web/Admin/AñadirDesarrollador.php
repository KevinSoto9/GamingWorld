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
    $desarrolladorID = $_POST["desarrolladorID"];

    try {
        require '../bd.php';

        $insertarAsociacion = "INSERT INTO `juegos_desarrolladores` (`JuegoID`, `desarrolladorID`) VALUES (:juegoID, :desarrolladorID)";
        
        $stmtInsertarAsociacion = $bd->prepare($insertarAsociacion);
            
        $stmtInsertarAsociacion->bindParam(':juegoID', $juegoID, PDO::PARAM_INT);
        $stmtInsertarAsociacion->bindParam(':desarrolladorID', $desarrolladorID, PDO::PARAM_INT);

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
    <title>Gaming World - Añadir Desarrollador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <?php require '../Menus/menu2.php'; ?>
    
</head>
<body>
    <!-- Formulario para seleccionar el juego y el desarrollador -->
    <div class="container mt-5">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1 class="text-center">Introduzca el desarrollador a añadir</h1>
            
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
                <label for="desarrolladorID">Seleccione el desarrollador:</label>
                <!-- Desarrolladores -->
                <select name="desarrolladorID" id="desarrolladorID" class="form-control">
                    <?php
                    $consultaDesarrolladores = "SELECT desarrolladorID, nombre FROM desarrolladores ORDER BY nombre";
                    $stmtDesarrolladores = $bd->query($consultaDesarrolladores);
                    foreach ($stmtDesarrolladores as $fila) {
                        echo "<option value='" . $fila['desarrolladorID'] . "'>" . $fila['nombre'] . "</option>";
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