<?php

session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {
    
    require '../PaginasAdicionales/PersonalAutorizado.php';
}

else{
    

session_abort();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nombre = $_POST["nombre"];
    
    try {
        require '../bd.php';
        $ins = "INSERT INTO `generos` (`generoID`, `nombre`) VALUES (NULL, '$nombre')";
        $resul = $bd->query($ins);
        if ($resul) {
            header("Location:../PaginasPrincipales/Admin.php");
        }
    } catch (PDOException $e) {
        echo "Error: Comprueba que los datos introducidos no estan ya en la base de datos";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gaming World - Crear Género</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <?php require '../Menus/menu2.php'; ?>
    
</head>
<body>
    <!-- Formulario de creación de Géneros -->
    <div class="container mt-5">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="formularioCrear">
            <h1 class="text-center">Introduzca los datos del Género</h1>
            
            <!-- Contenedor de los datos -->
            <div class="formularioCrear-container">
                
                <!-- Nombre -->
                <div class="form-group formularioCrear-container-datos">
                    <label for="nombre" class="formularioCrear-container-datos-nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary">Enviar</button>
                
            </div>
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