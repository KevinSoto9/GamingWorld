<?php
session_start();

// Info
$noticiaDetalleID = isset($_GET["noticiaDetalleID"]) ? $_GET["noticiaDetalleID"] : "";
$usuarioID = isset($_GET["usuarioID"]) ? $_GET["usuarioID"] : "";
$fechaActual = date('Y-m-d H:i');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioID = $_POST['usuarioID'];
    $noticiaDetalleID = $_POST['noticiaDetalleID'];
    $fechaActual = $_POST['fechaActual'];
    $comentario = $_POST['comentario'];

    try {
        require 'bd.php';
        $stmt = $bd->prepare("INSERT INTO `comentarios_noticias` (`comentarioNoticiaID`, `noticiaDetalleID`, `usuarioID`, `comentario`, `fecha`) VALUES (NULL, ?, ?, ?, ?)");
        $stmt->execute([$noticiaDetalleID, $usuarioID, $comentario, $fechaActual]);

        $stmtNoticiaID = $bd->prepare("SELECT `noticiaID` FROM `noticias_detalles` WHERE `noticiaDetalleID` = ?");
        $stmtNoticiaID->execute([$noticiaDetalleID]);
        $noticia = $stmtNoticiaID->fetch();

        $noticiaID = $noticia['noticiaID'];

        header("Location: PagNoticia.php?noticiaID=" . $noticiaID);
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
                                <input type="hidden" name="usuarioID" value="<?php echo htmlspecialchars($usuarioID); ?>">
                                <input type="hidden" name="noticiaDetalleID" value="<?php echo htmlspecialchars($noticiaDetalleID); ?>">
                                <input type="hidden" name="fechaActual" value="<?php echo htmlspecialchars($fechaActual); ?>">
                                <div class="form-group">
                                    <label for="comentario">Comentario</label>
                                    <textarea class="form-control" id="comentario" name="comentario" rows="6"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                            </form>
                            <div class="mt-3 text-center">
                                 <?php
                                require 'bd.php';
                                $se = "SELECT * FROM `noticias_detalles` WHERE `noticiaDetalleID` = ?";
                                $stmt = $bd->prepare($se);
                                $stmt->execute([$noticiaDetalleID]);
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
