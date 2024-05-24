<?php

session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {
    
    require '../PersonalAutorizado.php';
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
    <title>Gaming World - Crear Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <?php require '../menu2.php'; ?>
    
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <h1 class="formularioCrear-tituloPrincipal">Registro de Usuario</h1>
                    
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <!-- Nombre de Usuario -->
                    <div class="form-group">
                        <label for="alias">Nombre de Usuario</label>
                        <input type="text" id="alias" name="alias" class="form-control" required>
                    </div>
                    
                    <!-- Contraseña -->
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" minlength="8" required>
                    </div>
                    
                    <!-- Confirmar Contraseña -->
                    <div class="form-group">
                        <label for="confirmPassword">Confirmar Contraseña</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" minlength="8" required>
                    </div>
                    
                    <!-- Botón de Enviar -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
}
?>