<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['password'] == $_POST['confirm_password']) {

        if (strlen($_POST['password']) >= 8) {
            $UsuarioID = $_POST['UsuarioID'];
            $password = $_POST['password'];

            try {
                require 'bd.php';

                $update_query = "UPDATE usuarios SET Password = '$password' WHERE UsuarioID = $UsuarioID";
                $bd->exec($update_query);

                header("Location: perfil.php");
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
    </head>
    <body>
        
        <h1>Introduzca los datos de la nueva Contrasena</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            
            <input type="hidden" name="UsuarioID" value="<?php echo isset($_GET['UsuarioID']) ? $_GET['UsuarioID'] : ''; ?>">
            Nueva Contraseña: <input type="password" id="password" name="password" required><br>
            <br>
            Confirmar Contraseña: <input type="password" id="confirm_password" name="confirm_password" required><br><br>
            <br>
            
            <input type="submit" >
            
        </form>
        
        <div>
            <a href="perfil.php">Volver</a>
        </div> 

    </body>
</html>
