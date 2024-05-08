<?php
session_start();


require 'bd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numTarjeta = $_POST["numTarjeta"];
    $nombreApellidosPropie = $_POST["nombreApellidosPropie"];
    $fechaExp = $_POST["fechaExp"];
    $CVC = $_POST["CVC"];
    $confirmarCVC = $_POST["confirmarCVC"];


    if (!preg_match("/^\d{16}$/", $numTarjeta)) {
        $error = "El número de tarjeta debe contener exactamente 16 dígitos.";
    } elseif (!preg_match("/^[a-zA-Z]+\s[a-zA-Z]+$/", $nombreApellidosPropie)) {
        $error = "El nombre del propietario debe contener al menos un nombre y un apellido separados por un espacio.";
    } elseif (!preg_match("/^\d{2}\/\d{2}$/", $fechaExp) || !checkdate(substr($fechaExp, 0, 2), 1, "20" . substr($fechaExp, 3, 2))) {
        $error = "La fecha de expiración ingresada no es válida.";
    } elseif (strlen($CVC) !== 3 || $CVC !== $confirmarCVC) {
        $error = "El CVC ingresado no es válido o no coincide.";
    } else {

        $usuario_id = $_SESSION['UsuarioID'];
        $insertQuery = $bd->prepare("INSERT INTO `tarjetas` (`tarjetaID`, `NumTarjeta`, `Nombre`, `FechaExp`, `CVC`, `UsuarioID`) VALUES (NULL, ?, ?, ?, ?, ?)");
        if ($insertQuery->execute([$numTarjeta, $nombreApellidosPropie, $fechaExp, $CVC, $usuario_id])) {
            
            $tarjetaID = $bd->lastInsertId();
            $carritoQuery = $bd->prepare("INSERT INTO `carrito` (`carritoID`, `usuarioID`, `tarjetaID`) VALUES (NULL, ?, ?)");
            if ($carritoQuery->execute([$usuario_id, $tarjetaID])) {
                header("Location: perfil.php");
                exit();
            } else {
                $error = "Error al insertar en la tabla carrito.";
            }
        } else {
            $error = "Error al insertar en la tabla tarjetas.";
        }
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

    <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <h1 class="formularioCrear-tituloPrincipal">Introduzca sus datos de la Tarjeta</h1>

        <!-- Contenedor de los datos -->
        <div class="formularioCrear-container">

            <!-- Numero de la Tarjeta -->
            <div class="formularioCrear-container-datos">
                <p class="formularioCrear-container-datos-numTarjeta">Numero de la Tarjeta</p>
                <input type="text" name="numTarjeta" pattern="\d{16}" title="Debe contener 16 dígitos" required>
            </div>

            <!-- Nombre y Apellidos del Propietario -->
            <div class="formularioCrear-container-datos">
                <p class="formularioCrear-container-datos-nomPropie">Nombre y Apellidos del Propietario</p>
                <input type="text" name="nombreApellidosPropie" required>
            </div>

            <!-- Fecha de Expiracion -->
            <div class="formularioCrear-container-datos">
                <p class="formularioCrear-container-datos-fechaExp">Fecha de Expiracion (MM/AA)</p>
                <input type="text" name="fechaExp" pattern="\d{2}/\d{2}" title="Debe ser en el formato MM/AA" required>
            </div>

            <!-- CVC -->
            <div class="formularioCrear-container-datos">
                <p class="formularioCrear-container-datos-CVC">CVC</p>
                <input type="password" name="CVC" pattern="\d{3}" title="Debe contener 3 dígitos" required>
            </div>

            <!-- Confirmar CVC -->
            <div class="formularioCrear-container-datos">
                <p class="formularioCrear-container-datos-confirmarCVC">Confirmar CVC</p>
                <input type="password" name="confirmarCVC" pattern="\d{3}" title="Debe contener 3 dígitos" required>
            </div>

            <br>

            <input type="submit" value="Enviar">
        </div>
    </form>

    <div>
        <a href="perfil.php">Volver</a>
    </div>        

</body>
</html>
