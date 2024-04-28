<?php

session_start();

$html = "";

if (!isset($_SESSION['Tipo']) || $_SESSION['Tipo'] !== "administrador") {
    $html .= "<div class='NoAdmin'>";
    $html .= "No has iniciado sesión";
    $html .= "<button onclick='window.location.href=\"index.php\"'>Hazlo Aquí</button>";
    $html .= "</div>";
   
    echo $html;
}

else{
    

session_abort();

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
        <link rel="stylesheet" href="../css/styles.css">
        
        <?php require '../menu2.php'; ?>
        
    </head>
    <body>
        
        <!-- Formulario de creacion de Novedades -->
        <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            
            <h1 class="formularioCrear-tituloPrincipal">Introduzca los datos de la Novedad</h1>
            
            <!-- Contenedor de los datos -->
            <div class="formularioCrear-container">
                
                <!-- Titulo -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-titulo">Titulo</p>
                    <input type="text" name="titulo">
                    
                </div>
                
                <!-- Descripcion -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-descripcion">Descripcion</p>
                    <input type="textarea" name="descripcion">
                    
                </div>
                
                <!-- Fecha -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-fecha">Fecha</p>
                    <input type="date" name="fecha">
                    
                </div>
                
                <!-- Imagen -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-imagen">Imagen</p>
                    <input type="text" name="imagen">
                    
                </div>
                
                <input type="submit">
                
            </div>
    </body>
</html>

<?php
}
?>