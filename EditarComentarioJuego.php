<?php
session_start();

$comentarioJuegoID = isset($_GET["comentarioJuegoID"]) ? $_GET["comentarioJuegoID"] : "";
$JuegoID = isset($_GET["JuegoID"]) ? $_GET["JuegoID"] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comentarioJuegoID = $_POST['comentarioJuegoID'];
    $JuegoID = $_POST['JuegoID'];
    $comentario = htmlspecialchars($_POST['comentario']);

    try {
        require 'bd.php';
        $stmt = $bd->prepare("UPDATE `comentarios_juegos` SET `comentario` = :comentario WHERE `comentarios_juegos`.`comentarioJuegoID` = :comentarioNoticiaID");
        $stmt->bindParam(':comentario', $comentario);
        $stmt->bindParam(':comentarioNoticiaID', $comentarioJuegoID);
        $stmt->execute();

        header("Location: PagJuego.php?juegoID=" . urlencode($JuegoID));
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
                        <input type="hidden" name="comentarioJuegoID" value="<?php echo htmlspecialchars($comentarioJuegoID); ?>">
                        <input type="hidden" name="JuegoID" value="<?php echo htmlspecialchars($JuegoID); ?>">
                        <div class="form-group">
                            <label for="comentario">Comentario</label>
                            <textarea class="form-control" id="comentario" name="comentario" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a class="btn btn-secondary" href="PagJuego.php?juegoID=<?php echo urlencode($JuegoID); ?>">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
