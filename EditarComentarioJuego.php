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
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>

        <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h1 class="formularioCrear-tituloPrincipal">Introduzca el comentario</h1>
            <div class="formularioCrear-container">
                <input type="hidden" name="comentarioJuegoID" value="<?php echo htmlspecialchars($comentarioJuegoID); ?>">
                <input type="hidden" name="JuegoID" value="<?php echo htmlspecialchars($JuegoID); ?>">
                <div class="formularioCrear-container-datos">
                    <p class="formularioCrear-container-datos-comentario">Comentario</p>
                    <textarea name="comentario" rows="9" cols="90"></textarea>
                </div>
                <input type="submit" value="Enviar">
            </div>
        </form>

        <div>
            <a href='PagJuego.php?juegoID=<?php echo urlencode($JuegoID); ?>'>Volver</a>
        </div>

    </body>
</html>
