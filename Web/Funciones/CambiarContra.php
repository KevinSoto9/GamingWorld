
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['password'] == $_POST['confirm_password']) {

        if (strlen($_POST['password']) >= 8) {
            $UsuarioID = $_POST['UsuarioID'];
            $password = $_POST['password'];

            try {
                require '../bd.php';

                $update_query = "UPDATE usuarios SET Password = '$password' WHERE UsuarioID = $UsuarioID";
                $bd->exec($update_query);

                header("Location: ../PaginasPrincipales/perfil.php");
                exit();
            } catch (PDOException $e) {
                echo "<script>alert('Error al cambiar la contraseña');</script>";
            }
        } else {
            echo "<script>alert('La contraseña debe tener al menos 8 caracteres.');</script>";
        }
    } else {
        echo "<script>alert('Las contraseñas no coinciden.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <!-- Estilos Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos adicionales -->
    <link rel="stylesheet" href="../../assets/cssPlus/cssPlus.css">
</head>
<body>
    
<div class="container mt-5">
    <h1 class="text-center">Introduzca los datos de la nueva contraseña</h1>
    <!-- Formulario para cambiar contraseña -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <!-- Campo oculto para el ID de usuario -->
        <input type="hidden" name="UsuarioID" value="<?php echo isset($_GET['UsuarioID']) ? $_GET['UsuarioID'] : ''; ?>">

        <!-- Campo de nueva contraseña -->
        <div class="form-group">
            <label for="password">Nueva Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <!-- Campo de confirmar contraseña -->
        <div class="form-group">
            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        
        <!-- Botón para cambiar contraseña -->
        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
    </form>

    <!-- Botón para volver -->
    <div class="mt-3">
        <a href="../PaginasPrincipales/perfil.php" class="btn btn-secondary">Volver</a>
    </div>
</div>

</body>
</html>
