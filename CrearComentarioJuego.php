<?php
session_start();

// Info
$juegoID = isset($_GET["juegoID"]) ? $_GET["juegoID"] : "";
$usuarioID = isset($_GET["usuarioID"]) ? $_GET["usuarioID"] : "";
$fechaActual = date('Y-m-d H:i');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioID = isset($_POST['usuarioID']) ? $_POST['usuarioID'] : "";
    $juegoID = isset($_POST['juegoID']) ? $_POST['juegoID'] : "";
    $fechaActual = isset($_POST['fechaActual']) ? $_POST['fechaActual'] : "";
    $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : "";

    try {
        require 'bd.php';
        $stmt = $bd->prepare("INSERT INTO `comentarios_juegos` (`comentarioJuegoID`, `juegoID`, `UsuarioID`, `comentario`, `fecha`) VALUES (NULL, ?, ?, ?, ?)");
        $stmt->execute([$juegoID, $usuarioID, $comentario, $fechaActual]);

        header("Location: PagJuego.php?juegoID=" . urlencode($juegoID));
        exit;
    } catch (PDOException $e) {
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
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark">
                <div class="card-body bg-dark">
                    <h5 class="card-title text-center">Introduzca el comentario</h5>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <input type="hidden" name="usuarioID" value="<?php echo htmlspecialchars($usuarioID ?? ""); ?>">
                        <input type="hidden" name="juegoID" value="<?php echo htmlspecialchars($juegoID ?? ""); ?>">
                        <input type="hidden" name="fechaActual" value="<?php echo htmlspecialchars($fechaActual ?? ""); ?>">
                        <div class="form-group">
                            <label for="comentario">Comentario</label>
                            <textarea class="form-control" id="comentario" name="comentario" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a class="btn btn-secondary" href="PagJuego.php?juegoID=<?php echo urlencode($juegoID); ?>">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

