<?php

session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {
    
    require '../PaginasPrincipales/PersonalAutorizado.php';
}

else{
    

session_abort();

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
            
            header("Location:../PaginasPrincipales/Admin.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming World - Añadir Géneros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <?php require '../Menus/menu2.php'; ?>
    
</head>
<body>
    <!-- Formulario para seleccionar el juego y los géneros -->
    <div class="container mt-5">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1 class="text-center">Introduzca los géneros a añadir</h1>
            
            <div class="form-group">
                <label for="juegoID">Seleccione un juego existente:</label>
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
                <label for="genero1">Seleccione el primer género:</label>
                <select name="genero1" id="genero1" class="form-control">
                    <?php
                    $consultaGeneros = "SELECT GeneroID, nombre FROM generos ORDER BY nombre";
                    $stmtGeneros = $bd->query($consultaGeneros);
                    foreach ($stmtGeneros as $fila) {
                        echo "<option value='" . $fila['GeneroID'] . "'>" . $fila['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="genero2">Seleccione el segundo género:</label>
                <select name="genero2" id="genero2" class="form-control">
                    <?php
                    $stmtGeneros = $bd->query($consultaGeneros);
                    foreach ($stmtGeneros as $fila) {
                        echo "<option value='" . $fila['GeneroID'] . "'>" . $fila['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="genero3">Seleccione el tercer género:</label>
                <select name="genero3" id="genero3" class="form-control">
                    <?php
                    $stmtGeneros = $bd->query($consultaGeneros);
                    foreach ($stmtGeneros as $fila) {
                        echo "<option value='" . $fila['GeneroID'] . "'>" . $fila['nombre'] . "</option>";
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