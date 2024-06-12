<?php
// Iniciar sesión
session_start();

// Obtener los valores de los parámetros de la URL o establecerlos en cadena vacía si no están definidos
$comentarioJuegoID = isset($_GET["comentarioJuegoID"]) ? $_GET["comentarioJuegoID"] : "";
$JuegoID = isset($_GET["JuegoID"]) ? $_GET["JuegoID"] : "";

// Verificar si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los campos del formulario
    $comentarioJuegoID = $_POST['comentarioJuegoID'];
    $JuegoID = $_POST['JuegoID'];
    $comentario = htmlspecialchars($_POST['comentario']);

    try {
        // Requerir el archivo de conexión a la base de datos
        require '../bd.php';
        
        // Preparar y ejecutar la consulta para actualizar el comentario del juego
        $stmt = $bd->prepare("UPDATE `comentarios_juegos` SET `comentario` = :comentario WHERE `comentarios_juegos`.`comentarioJuegoID` = :comentarioJuegoID");
        $stmt->bindParam(':comentario', $comentario);
        $stmt->bindParam(':comentarioJuegoID', $comentarioJuegoID);
        $stmt->execute();

        // Redirigir de vuelta a la página del juego después de actualizar el comentario
        header("Location: /Web/PaginasIndividuales/PagJuego.php?juegoID=" . urlencode($JuegoID));
        exit;
    } catch (PDOException $e) {
        // En caso de error, mostrar el mensaje de error
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/cssPlus/cssPlus.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark">
                <div class="card-body bg-dark">
                    <h5 class="card-title text-center">Introduzca el comentario</h5>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <!-- Campos ocultos para pasar los IDs -->
                        <input type="hidden" name="comentarioJuegoID" value="<?php echo htmlspecialchars($comentarioJuegoID); ?>">
                        <input type="hidden" name="JuegoID" value="<?php echo htmlspecialchars($JuegoID); ?>">
                        <div class="form-group">
                            <label for="comentario">Comentario</label>
                            <textarea class="form-control" id="comentario" name="comentario" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </form>
                    <div class="mt-3 text-center">
                        <!-- Enlace para volver a la página del juego -->
                        <a class="btn btn-secondary" href="/Web/PaginasIndivduales/PagJuego.php?juegoID=<?php echo urlencode($JuegoID); ?>">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
