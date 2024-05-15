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
    $email = $_POST["email"];
    $alias = $_POST["alias"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validar 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('El correo electrónico ingresado no tiene un formato válido.');</script>";
    } elseif (strpos($email, '@gamingworld.com') === false) {
        echo "<script>alert('El correo electrónico debe ser de @gamingworld.com.');</script>";
    } elseif (strlen($password) < 8) {
        echo "<script>alert('La contraseña debe tener al menos 8 caracteres.');</script>";
    } elseif ($password !== $confirmPassword) {
        echo "<script>alert('Las contraseñas no coinciden.');</script>";
    } else {
         try {
            require '../bd.php';
            $ins = "INSERT INTO `usuarios` (`UsuarioID`, `Email`, `Password`, `Alias`, `Tipo`) VALUES (NULL, '$email', '$password', '$alias', 'administrador')";
            $resul = $bd->query($ins);
            if ($resul) {
                header("Location:../Admin.php");
            }
        } catch (PDOException $e) {
            echo "Error: Comprueba que los datos que has puesto no han sido puestos antes";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        
        <h1 class="formularioCrear-tituloPrincipal">Introduzca sus datos</h1>
        
        <!-- Contenedor de los datos -->
        <div class="formularioCrear-container">
            
            <!-- Email -->
            <div class="formularioCrear-container-datos">
                
                <p class="formularioCrear-container-datos-email">Email</p>
                <input type="email" name="email" required>
                
            </div>
            
            <!-- Usuario -->
            <div class="formularioCrear-container-datos">
                
                <p class="formularioCrear-container-datos-nombreUsuario">Nombre de Usuario</p>
                <input type="text" name="alias" required>
                
            </div>
            
            <!-- Contraseña -->
            <div class="formularioCrear-container-datos">
                
                <p class="formularioCrear-container-datos-password">Contraseña</p>
                <input type="password" name="password" minlength="8" required>
                
            </div>
            
            <!-- Confirmar contraseña -->
            <div class="formularioCrear-container-datos">
                
                <p class="formularioCrear-container-datos-conPassword">Confirmar Contraseña</p>
                <input type="password" name="confirmPassword" minlength="8" required>
                
            </div>
            
            <br>
            
            <input type="submit" value="Enviar">
        </div>
    </form>
    
    <div>
        <a href="../Admin.php">Volver<a>
    </div>        
            
</body>
</html>

<?php
}
?>