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
                <input type="hidden" name="usuarioID" value="<?php echo htmlspecialchars($usuarioID ?? ""); ?>">
                <input type="hidden" name="juegoID" value="<?php echo htmlspecialchars($juegoID ?? ""); ?>">
                <input type="hidden" name="fechaActual" value="<?php echo htmlspecialchars($fechaActual ?? ""); ?>">
                <div class="formularioCrear-container-datos">
                    <p class="formularioCrear-container-datos-comentario">Comentario</p>
                    <textarea name="comentario" rows="9" cols="90"></textarea>
                </div>
                <input type="submit" value="Enviar">
            </div>
        </form>

        <?php
        if (!empty($juegoID)) {
            require 'bd.php';
            $se = "SELECT * FROM `juegos` WHERE `JuegoID` = ?";
            $stmt = $bd->prepare($se);
            $stmt->execute([$juegoID]);
            $juegos = $stmt->fetchAll();

            foreach ($juegos as $juego) {
                echo "<div>";
                echo "<a href='PagJuego.php?juegoID=" . ($juego['JuegoID']) . "'>Volver</a>";
                echo "</div>";
            }
        }
        ?>

    </body>
</html>
