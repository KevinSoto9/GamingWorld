<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST["email"];
    $alias = $_POST["alias"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validar el formato del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('El correo electrónico ingresado no tiene un formato válido.');</script>";
    } 
    // Validar la longitud de la contraseña
    elseif (strlen($password) < 8) {
        echo "<script>alert('La contraseña debe tener al menos 8 caracteres.');</script>";
    } 
    // Verificar si las contraseñas coinciden
    elseif ($password !== $confirmPassword) {
        echo "<script>alert('Las contraseñas no coinciden.');</script>";
    } 
    else {
        // Intentar insertar los datos en la base de datos
        try {
            require '../bd.php'; // Conectar a la base de datos
            // Consulta SQL para insertar un nuevo usuario
            $ins = "INSERT INTO `usuarios` (`UsuarioID`, `Email`, `Password`, `Alias`, `Tipo`) VALUES (NULL, '$email', '$password', '$alias', 'Cliente')";
            // Ejecutar la consulta
            $resul = $bd->query($ins);
            if ($resul) {
                // Redirigir al usuario a la página de inicio
                header("Location:../PaginasPrincipales/index.php");
            }
        } catch (PDOException $e) {
            // Mostrar mensaje de error si ocurre una excepción
            echo "Error: Comprueba que los datos que has puesto no han sido puestos antes";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/cssPlus/cssPlus.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h3 class="card-title text-center">Introduzca sus datos</h3>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="alias">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="alias" name="alias" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" minlength="8" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" minlength="8" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="../PaginasPrincipales/index.php" class="btn btn-link">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
