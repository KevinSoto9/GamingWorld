<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nombre = $_POST["nombre"];
    $imagen = $_POST["imagen"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fecha"];
    $precio = floatval($_POST["precio"]);
    $clave = $_POST["clave"];
    
    
    try {
        require '../bd.php';
        $ins = "INSERT INTO `juegos` (`JuegoID`, `nombre`, `imagen`, `descripcion`, `fecha_salida`, `precio`, `clave`) VALUES (NULL, '$nombre', '$imagen', '$descripcion', '$fecha', '$precio', '$clave')";
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
        <link rel="stylesheet" href="../css/styles.css">
        
        <?php require '../menu2.php'; ?>
        
    </head>
    <body>
        
        <!-- Formulario de creacion de Juegos -->
        <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            
            <h1 class="formularioCrear-tituloPrincipal">Introduzca los datos del Juego</h1>
            
            <!-- Contenedor de los datos -->
            <div class="formularioCrear-container">
                
                <!-- Nombre -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-nombre">Nombre</p>
                    <input type="text" name="nombre">
                    
                </div>
                
                <!-- Imagen -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-imagen">Imagen</p>
                    <input type="text" name="imagen">
                    
                </div>
                
                <!-- Descripcion -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-descripcion">Descripcion</p>
                    <input type="textarea" name="descripcion">
                    
                </div>
                
                <!-- Fecha  -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-fecha">Fecha</p>
                    <input type="date" name="fecha">
                    
                </div>
                
                <!-- Precio -->
                <div>
                    
                    <p class="formularioCrear-container-datos-precio">Precio</p>
                    <input type="text" name="precio">
                    
                </div>
                
                <!-- Clave -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-clave">Clave</p>
                    <input type="text" name="clave">
                    
                </div>
                
                <br></br>
                
                <input type="submit">
                
            </div>
    </body>
</html>
