<?php
    
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    try{
        require 'bd.php';
        
        $sel = "select * from usuarios;";
        $usuarios = $bd->query($sel);

        if ($usuarios) {
            foreach ($usuarios as $usuario) {
                if ($Email == $usuario['Email'] && $Password == $usuario['Password']) {

                    if ($usuario['Tipo'] == 'Cliente')  {
                        $_SESSION['tipo_usuario'] = $usuario['Tipo'];
                        $_SESSION['UsuarioID'] = $usuario['UsuarioID'];
                        header("Location: PagPrincipal.php?tipo=" . urlencode($usuario['Tipo']));
                    } else {
                        $_SESSION['tipo_usuario'] = $usuario['Tipo'];
                        $_SESSION['UsuarioID'] = $usuario['UsuarioID'];
                        header("Location: PagPrincipal.php?tipo=" . urlencode($usuario['Tipo']));
                    }
                }
            }
            exit();
        } else {
            echo "El email o la password están mal";
        }
    } catch (Exception $ex) {

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
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        Login
        <br>
        Email: <input type="text" name="Email" value="<?php if (isset($Email)) echo $Email; ?>"> 
        <br>              
        Password: <input type="password" name="Password" value="<?php if (isset($Password)) echo $Password; ?>"> 
        <br>
        <input type="submit" name="actualizar" value="Login">
        
        </form>
        
        <div class="regristo">
            
            <p>No te has registrado?<p>   
            <button onclick="window.location.href='registroCliente.php'">Hazlo aquí</button>

        <div>
    </body>
</html>
