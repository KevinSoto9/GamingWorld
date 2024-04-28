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
    $nombre = $_POST["nombre"];
    
    try {
        require '../bd.php';
        $ins = "INSERT INTO `generos` (`generoID`, `nombre`) VALUES (NULL, '$nombre')";
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
        
        <!-- Formulario de creacion de Generos -->
        <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            
            <h1 class="formularioCrear-tituloPrincipal">Introduzca los datos del Genero</h1>
            
            <!-- Contenedor de los datos -->
            <div class="formularioCrear-container">
                
                <!-- Nombre -->
                <div class="formularioCrear-container-datos">
                    
                    <p class="formularioCrear-container-datos-nombre">Nombre</p>
                    <input type="text" name="nombre">

                
                <input type="submit">
                
            </div>
    </body>
</html>

<?php
}
?>