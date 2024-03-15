<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        Login
        <br>
        Email: <input type="number" name="NumEmp" value="<?php if (isset($Email)) echo $Email; ?>"> 
        <br>              
        Password: <input type="password" name="Pass" value="<?php if (isset($Password)) echo $Password; ?>"> 
        <br>
        <input type="submit" name="actualizar" value="Login">
    </form>
    </body>
</html>
