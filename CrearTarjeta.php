<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numTarjeta = $_POST["numTarjeta"];
    $nombreApellidosPropie = $_POST["nombreApellidosPropie"];
    $fechaExp = $_POST["fechaExp"];
    $CVC = $_POST["CVC"];
    $confirmarCVC = $_POST["confirmarCVC"];

    // Validar 
    if (!preg_match("/^\d{16}$/", $numTarjeta)) {
        echo "<script>alert('El número de tarjeta debe contener exactamente 16 dígitos.');</script>";
    } elseif (!preg_match("/^[a-zA-Z]+\s[a-zA-Z]+$/", $nombreApellidosPropie)) {
        echo "<script>alert('El nombre del propietario debe contener al menos un nombre y un apellido separados por un espacio.');</script>";
    } else {
        // Verificar fecha logicca
        list($mes, $anio) = explode('/', $fechaExp);
        if (!checkdate($mes, 1, "20$anio")) {
            echo "<script>alert('La fecha de expiración ingresada no es válida.');</script>";
        } elseif (!preg_match("/^\d{2}\/\d{2}$/", $fechaExp)) {
            echo "<script>alert('La fecha de expiración debe estar en el formato MM/AA.');</script>";
        } elseif (strlen($CVC) !== 3 || $CVC !== $confirmarCVC) {
            echo "<script>alert('El CVC ingresado no es válido o no coincide.');</script>";
        } else {
            
            $usuario_id = $_SESSION['UsuarioID'];
            
            try {
                require 'bd.php';
                $ins = "INSERT INTO `tarjetas` (`tarjetaID`, `NumTarjeta`, `Nombre`, `FechaExp`, `CVC`, `UsuarioID`) VALUES (NULL, '$numTarjeta', '$nombreApellidosPropie', '$fechaExp', '$CVC', '$usuario_id')";
                $resul = $bd->query($ins);
                if ($resul) {
                    header("Location:perfil.php");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
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
