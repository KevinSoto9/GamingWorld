<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $titulo = $_POST["titulo"];
    $resumen = $_POST["resumen"];
    $imagen = $_POST["imagen"];
    
    try {
        require '../bd.php';
        $ins = "INSERT INTO `noticias` (`noticiaID`, `titulo`, `resumen`, `imagen`) VALUES (NULL, '$titulo', '$resumen', '$imagen')";
        $resul = $bd->query($ins);
        if ($resul) {
            header("Location:../Admin.php");
        }
    } catch (PDOException $e) {
        echo "Error: Comprueba que los datos introducidos no estén ya en la base de datos";
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
    
    <!-- Formulario de creación de Noticias -->
    <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        
        <h1 class="formularioCrear-tituloPrincipal">Introduzca los datos de la Noticia</h1>
        
        <!-- Contenedor de los datos -->
        <div class="formularioCrear-container">
            
            <!-- Título -->
            <div class="formularioCrear-container-datos">
                
                <p class="formularioCrear-container-datos-titulo">Título</p>
                <input type="text" name="titulo">
                
            </div>
            
            <!-- Resumen -->
            <div class="formularioCrear-container-datos">
                
                <p class="formularioCrear-container-datos-resumen">Resumen</p>
                <textarea name="resumen" rows="4" cols="50"></textarea>
                
            </div>
            
            <!-- Imagen -->
            <div class="formularioCrear-container-datos">
                
                <p class="formularioCrear-container-datos-imagen">Imagen</p>
                <input type="text" name="imagen">
                
            </div>
            
            <br></br>
            
            <input type="submit">
            
        </div>
    </form>
</body>
</html>
