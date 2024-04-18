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
                <input type="hidden" name="usuarioID" value="<?php echo htmlspecialchars($usuarioID); ?>">
                <input type="hidden" name="noticiaDetalleID" value="<?php echo htmlspecialchars($noticiaDetalleID); ?>">
                <input type="hidden" name="fechaActual" value="<?php echo htmlspecialchars($fechaActual); ?>">
                <div class="formularioCrear-container-datos">
                    <p class="formularioCrear-container-datos-comentario">Comentario</p>
                    <textarea name="comentario" rows="9" cols="90"></textarea>
                </div>
                <input type="submit" value="Enviar">
            </div>
        </form>

        <?php
        require 'bd.php';
        $se = "SELECT * FROM `noticias_detalles` WHERE `noticiaDetalleID` = ?";
        $stmt = $bd->prepare($se);
        $stmt->execute([$noticiaDetalleID]);
        $noticias = $stmt->fetchAll();

        foreach ($noticias as $noticia) {
            echo "<div>";
            echo "<a href='PagNoticia.php?noticiaID=" . htmlspecialchars($noticia['noticiaID']) . "'>Volver</a>";
            echo "</div>";
        }
        ?>

    </body>
</html>
