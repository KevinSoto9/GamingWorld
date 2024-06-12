<?php
// Iniciar sesión
session_start();

// Obtener los valores de los parámetros de la URL o establecerlos en cadena vacía si no están definidos
$comentarioNoticiaID = isset($_GET["comentarioNoticiaID"]) ? $_GET["comentarioNoticiaID"] : "";
$noticiaID = isset($_GET["noticiaID"]) ? $_GET["noticiaID"] : "";

// Verificar si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los campos del formulario
    $comentarioNoticiaID = $_POST['comentarioNoticiaID'];
    $noticiaID = $_POST['noticiaID'];
    $comentario = htmlspecialchars($_POST['comentario']);

    try {
        // Requerir el archivo de conexión a la base de datos
        require '../bd.php';
        
        // Preparar y ejecutar la consulta para actualizar el comentario de la noticia
        $stmt = $bd->prepare("UPDATE `comentarios_noticias` SET `comentario` = :comentario WHERE `comentarios_noticias`.`comentarioNoticiaID` = :comentarioNoticiaID");
        $stmt->bindParam(':comentario', $comentario);
        $stmt->bindParam(':comentarioNoticiaID', $comentarioNoticiaID);
        $stmt->execute();

        // Redirigir de vuelta a la página de la noticia después de actualizar el comentario
        header("Location: ../PaginasIndividuales/PagNoticia.php?noticiaID=" . urlencode($noticiaID));
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
    <link rel="stylesheet" href="../../assets/cssPlus/cssPlus.css">
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
                        // Requerir el archivo de conexión a la base de datos
                        require '../bd.php';
                        
                        // Consultar detalles de la noticia
                        $se = "SELECT * FROM `noticias_detalles` WHERE `noticiaID` = ?";
                        $stmt = $bd->prepare($se);
                        $stmt->execute([$noticiaID]);
                        $noticias = $stmt->fetchAll();

                        // Mostrar un botón para volver a la página de la noticia
                        foreach ($noticias as $noticia) {
                            echo "<a class='btn btn-secondary' href='../PaginasIndividuales/PagNoticia.php?noticiaID=" . htmlspecialchars($noticia['noticiaID']) . "'>Volver</a>";
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
