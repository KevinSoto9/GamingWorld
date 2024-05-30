<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>
    
<div class="container mt-5">
    <h1 class="text-center">Introduzca los datos de la nueva contraseña</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="hidden" name="UsuarioID" value="<?php echo isset($_GET['UsuarioID']) ? $_GET['UsuarioID'] : ''; ?>">

        <div class="form-group">
            <label for="password">Nueva Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
    </form>

    <div class="mt-3">
        <a href="perfil.php" class="btn btn-secondary">Volver</a>
    </div>
</div>

</body>
</html>
