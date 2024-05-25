<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    try {
        require 'bd.php';
        
        $sel = "select * from usuarios;";
        $usuarios = $bd->query($sel);

        if ($usuarios) {
            foreach ($usuarios as $usuario) {
                if ($Email == $usuario['Email'] && $Password == $usuario['Password']) {

                    $_SESSION['tipo_usuario'] = $usuario['Tipo'];
                    $_SESSION['Alias'] = $usuario['Alias'];
                    $_SESSION['UsuarioID'] = $usuario['UsuarioID'];
                    header("Location: PagPrincipal.php?tipo=" . urlencode($usuario['Tipo']));
                    exit();
                }
            }
            $error_message = "El email o la password están mal";
        }
    } catch (Exception $ex) {
        $error_message = "Error: " . $ex->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
    </head>
    <body>
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div class="row w-100">
                <div class="col-md-8 offset-md-2 col-lg-12 offset-lg-0">
                    <div class="login-card p-4 rounded">
                        <div class="text-center mb-4">
                            <img src="Imagenes/LogoPng.png" alt="Gaming World Logo" class="img-fluid" style="max-width: 200px;">
                        </div>
                        <h3 class="card-title text-center mb-4">Inicia sesión</h3>
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" id="Email" name="Email" value="<?php if (isset($Email)) echo $Email; ?>" required>
                                </div>
                            </div>
                            <div class="form-group pb-2">
                                <label for="Password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="Password" name="Password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-block">Login</button>
                        </form>
                        <div class="register text-center mt-3">
                            <p>¿No te has registrado?</p>
                            <button class="btn btn-link text-warning" onclick="window.location.href='registroCliente.php'">Hazlo aquí</button>
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
