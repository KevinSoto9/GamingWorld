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
        <style>
            body {
                background-color: #121212;
                color: #f0f0f0;
            }
            .login-container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .login-card {
                background-color: #1e1e1e;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            }
            .form-control:focus {
                box-shadow: none;
                border-color: #ff8800;
            }
            .btn-warning {
                background-color: #ff8800;
                border-color: #ff8800;
                font-size: 1.2rem;
                padding: 10px 0;
            }
            .btn-warning:hover {
                background-color: #e67e00;
                border-color: #e67e00;
            }
            .card-title {
                font-family: 'Arial Black', sans-serif;
                font-size: 2rem;
                color: #ff8800;
            }
            .register p {
                margin-bottom: 0.5rem;
            }
            .input-group-text {
                background-color: #ff8800;
                border: none;
            }
            .input-group-text i {
                color: #fff;
            }
            .form-group label {
                font-size: 1.1rem;
            }
        </style>
    </head>
    <body>
        <div class="container login-container">
            <div class="row w-100">
                <div class="col-md-8 offset-md-2 col-lg-10 offset-lg-1">
                    <div class="login-card">
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
