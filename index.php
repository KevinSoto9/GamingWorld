<?php
// Inicia la sesión
session_start();

// Verifica si el método de solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los valores de email y password desde el formulario
    $Email = $_POST["email"];
    $Password = $_POST["password"];

    try {
        // Incluye el archivo de conexión a la base de datos
        require 'bd.php';
        
        // Consulta para seleccionar todos los usuarios
        $sel = "SELECT * FROM usuarios;";
        $usuarios = $bd->query($sel);

        // Verifica si la consulta fue exitosa
        if ($usuarios) {
            // Recorre todos los usuarios
            foreach ($usuarios as $usuario) {
                // Comprueba si el email y el password coinciden
                if ($Email == $usuario['Email'] && $Password == $usuario['Password']) {
                    // Establece las variables de sesión
                    $_SESSION['tipo_usuario'] = $usuario['Tipo'];
                    $_SESSION['Alias'] = $usuario['Alias'];
                    $_SESSION['UsuarioID'] = $usuario['UsuarioID'];
                    
                    // Redirige a la página principal
                    header("Location: PagPrincipal.php?tipo=" . urlencode($usuario['Tipo']));
                    exit();
                }
            }
            // Mensaje de error si el email o la password no coinciden
            $error_message = "El email o la password están mal";
        }
    } catch (Exception $ex) {
        // Mensaje de error en caso de excepción
        $error_message = "Error: " . $ex->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="ImagenesJuegos/BioShock™.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body ml-4 mr-4">
                            <div class="brand-wrapper mb-4">
                                <img src="Imagenes/LogoPng.png" alt="logo" class="logo">
                            </div>
                            <h3 class="card-title text-center mb-4">Inicia sesión</h3>
                            <?php if (isset($error_message)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error_message; ?>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($Email)) echo $Email; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group pb-3 mb-4">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning btn-block">Login</button>
                            </form>
                            <div class="register text-center mt-5">
                                <a href="ContraNueva.php" class="forgot-password-link text-warning">¿Has olvidado tu contraseña?</a>
                                <p class="login-card-footer-text mt-3">¿No tienes una cuenta? <a href="registroCliente.php" class="text-reset">Regístrate aquí</a></p>
                                <nav class="login-card-footer-nav">
                                    <a class="text-warning" href="TerminosDeUso.php">Términos de uso</a>
                                    <a class="text-warning" href="PoliticaPrivacidad.php">Política de privacidad</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
