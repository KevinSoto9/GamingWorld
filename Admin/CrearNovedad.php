<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fecha"];
    $imagen = $_POST["imagen"];
    
    try {
        require '../bd.php';
        $ins = "INSERT INTO `novedades` (`novedadID`, `titulo`, `descripcion`, `fecha`, `imagen`) VALUES (NULL, '$titulo', '$descripcion', '$fecha', '$imagen')";
        $resul = $bd->query($ins);
        if ($resul) {
            header("Location:../Admin.php");
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
        <title>Gaming World</title>
        <link rel="stylesheet" href="../css/main.css">
        
        <?php require '../menu2.php'; ?>
        
    </head>
    <body>
        
        <!-- Formulario de creacion de Novedades -->
        <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            
            <h1 class="formularioCrear-titulo">Introduzca los datos de la Novedad</h1>
            
            <!-- Contenedor de los datos -->
            <div class="formularioCrear-container">
                
                <!-- Titulo -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-titulo">Titulo</p>
                    <input type="text" name="titulo">
                    
                </div>
                
                <!-- Descripcion -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-titulo">Drescripcion</p>
                    <input type="textarea" name="descripcion">
                    
                </div>
                
                <!-- Fecha -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-titulo">Fecha</p>
                    <input type="date" name="fecha">
                    
                </div>
                
                <!-- Imagen -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-titulo">Imagen</p>
                    <input type="text" name="imagen">
                    
                </div>
                
                <input type="submit">
                
            </div>
    </body>
</html>
