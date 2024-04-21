<?php
session_start();

$comentarioNoticiaID = isset($_GET["comentarioNoticiaID"]) ? $_GET["comentarioNoticiaID"] : "";
$noticiaID = isset($_GET["noticiaID"]) ? $_GET["noticiaID"] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comentarioNoticiaID = $_POST['comentarioNoticiaID'];
    $noticiaID = $_POST['noticiaID'];
    $comentario = htmlspecialchars($_POST['comentario']);

    try {
        require 'bd.php';
        $stmt = $bd->prepare("UPDATE `comentarios_noticias` SET `comentario` = :comentario WHERE `comentarios_noticias`.`comentarioNoticiaID` = :comentarioNoticiaID");
        $stmt->bindParam(':comentario', $comentario);
        $stmt->bindParam(':comentarioNoticiaID', $comentarioNoticiaID);
        $stmt->execute();

        header("Location: PagNoticia.php?noticiaID=" . urlencode($noticiaID));
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
                <input type="hidden" name="comentarioNoticiaID" value="<?php echo htmlspecialchars($comentarioNoticiaID); ?>">
                <input type="hidden" name="noticiaID" value="<?php echo htmlspecialchars($noticiaID); ?>">
                <div class="formularioCrear-container-datos">
                    <p class="formularioCrear-container-datos-comentario">Comentario</p>
                    <textarea name="comentario" rows="9" cols="90"></textarea>
                </div>
                <input type="submit" value="Enviar">
            </div>
        </form>

        <div>
            <a href='PagNoticia.php?noticiaID=<?php echo urlencode($noticiaID); ?>'>Volver</a>
        </div>

    </body>
</html>
