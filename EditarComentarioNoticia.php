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
                        <input type="hidden" name="comentarioNoticiaID" value="<?php echo htmlspecialchars($comentarioNoticiaID); ?>">
                        <input type="hidden" name="noticiaID" value="<?php echo htmlspecialchars($noticiaID); ?>">
                        <div class="form-group">
                            <label for="comentario">Comentario</label>
                            <textarea class="form-control" id="comentario" name="comentario" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </form>
                    <div class="mt-3 text-center">
                         <?php
                        require 'bd.php';
                        $se = "SELECT * FROM `noticias_detalles` WHERE `noticiaID` = ?";
                        $stmt = $bd->prepare($se);
                        $stmt->execute([$noticiaID]);
                        $noticias = $stmt->fetchAll();

                        foreach ($noticias as $noticia) {
                            echo "<a class='btn btn-secondary' href='PagNoticia.php?noticiaID=" . htmlspecialchars($noticia['noticiaID']) . "'>Volver</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
