<?php
// Iniciar sesión
session_start();

// Requerir el archivo de conexión a la base de datos
require '../bd.php';

// Verificar si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los campos del formulario
    $numTarjeta = $_POST["numTarjeta"];
    $nombreApellidosPropie = $_POST["nombreApellidosPropie"];
    $fechaExp = $_POST["fechaExp"];
    $CVC = $_POST["CVC"];
    $confirmarCVC = $_POST["confirmarCVC"];

    // Validar los campos del formulario
    if (!preg_match("/^\d{16}$/", $numTarjeta)) {
        $error = "El número de tarjeta debe contener exactamente 16 dígitos.";
    } elseif (!preg_match("/^[a-zA-Z]+\s[a-zA-Z]+$/", $nombreApellidosPropie)) {
        $error = "El nombre del propietario debe contener al menos un nombre y un apellido separados por un espacio.";
    } elseif (!preg_match("/^\d{2}\/\d{2}$/", $fechaExp) || !checkdate(substr($fechaExp, 0, 2), 1, "20" . substr($fechaExp, 3, 2))) {
        $error = "La fecha de expiración ingresada no es válida.";
    } elseif (strlen($CVC) !== 3 || $CVC !== $confirmarCVC) {
        $error = "El CVC ingresado no es válido o no coincide.";
    } else {
        // Obtener el ID del usuario de la sesión
        $usuario_id = $_SESSION['UsuarioID'];
        
        try {
            // Preparar y ejecutar la consulta para insertar la tarjeta del usuario en la base de datos
            $insertQuery = $bd->prepare("INSERT INTO `tarjetas` (`tarjetaID`, `NumTarjeta`, `Nombre`, `FechaExp`, `CVC`, `UsuarioID`) VALUES (NULL, ?, ?, ?, ?, ?)");
            if ($insertQuery->execute([$numTarjeta, $nombreApellidosPropie, $fechaExp, $CVC, $usuario_id])) {
                // Obtener el ID de la tarjeta insertada
                $tarjetaID = $bd->lastInsertId();
                
                // Preparar y ejecutar la consulta para insertar el carrito del usuario en la base de datos
                $carritoQuery = $bd->prepare("INSERT INTO `carrito` (`carritoID`, `usuarioID`, `tarjetaID`) VALUES (NULL, ?, ?)");
                if ($carritoQuery->execute([$usuario_id, $tarjetaID])) {
                    // Redirigir al perfil del usuario después de completar el registro de la tarjeta
                    header("Location: /Web/PaginasPrincipales/perfil.php");
                    exit();
                } else {
                    $error = "Error al insertar en la tabla carrito.";
                }
            } else {
                $error = "Error al insertar en la tabla tarjetas.";
            }
        } catch (PDOException $e) {
            // En caso de error, mostrar el mensaje de error
            echo $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/cssPlus/cssPlus.css">
</head>
<body>

    <div class="container mt-5">
        <form class="card bg-dark text-white p-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h1 class="card-title text-center mb-4">Introduzca sus datos de la Tarjeta</h1>

            <!-- Campos del formulario -->
            <div class="form-group">
                <label for="numTarjeta">Numero de la Tarjeta</label>
                <input type="text" class="form-control" id="numTarjeta" name="numTarjeta" pattern="\d{16}" title="Debe contener 16 dígitos" required>
            </div>

            <div class="form-group">
                <label for="nombreApellidosPropie">Nombre y Apellidos del Propietario</label>
                <input type="text" class="form-control" id="nombreApellidosPropie" name="nombreApellidosPropie" required>
            </div>

            <div class="form-group">
                <label for="fechaExp">Fecha de Expiracion (MM/AA)</label>
                <input type="text" class="form-control" id="fechaExp" name="fechaExp" pattern="\d{2}/\d{2}" title="Debe ser en el formato MM/AA" required>
            </div>

            <div class="form-group">
                <label for="CVC">CVC</label>
                <input type="password" class="form-control" id="CVC" name="CVC" pattern="\d{3}" title="Debe contener 3 dígitos" required>
            </div>

            <div class="form-group">
                <label for="confirmarCVC">Confirmar CVC</label>
                <input type="password" class="form-control" id="confirmarCVC" name="confirmarCVC" pattern="\d{3}" title="Debe contener 3 dígitos" required>
            </div>

            <!-- Botón de envío del formulario -->
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <!-- Enlace para volver al perfil del usuario -->
        <div class="mt-3">
            <a href="/Web/PaginasPrincipales/perfil.php" class="btn btn-secondary">Volver</a>
        </div>    
    </div>

</body>
</html>
