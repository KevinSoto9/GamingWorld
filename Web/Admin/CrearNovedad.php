<?php
session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {

    require '/Web/PaginasAdicionales/PersonalAutorizado.php';
} else {

    session_abort();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];
        $fecha = $_POST["fecha"];

        // Manejo de la imagen subida
        $imagen = $_FILES["imagen"]["name"];
        $imagen_temp = $_FILES["imagen"]["tmp_name"];

        // Carpeta de destino para las imágenes subidas
        $carpeta_destino = "/Imagenes/ImagenesNovedades/";

        try {
            require '../bd.php';

            // Mueve la imagen de la carpeta temporal a la carpeta de destino
            if (move_uploaded_file($imagen_temp, $carpeta_destino . $imagen)) {
                // Inserta los datos en la base de datos
                $ins = "INSERT INTO `novedades` (`novedadID`, `titulo`, `descripcion`, `fecha`) VALUES (NULL, '$titulo', '$descripcion', '$fecha')";
                $resul = $bd->query($ins);
                if ($resul) {
                    header("Location:/Web/PaginasPrincipales/Admin.php");
                }
            } else {
                echo "Error al subir la imagen.";
            }
        } catch (PDOException $e) {
            echo "Error: Comprueba que los datos introducidos no están ya en la base de datos";
        }
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Gaming World - Crear Novedad</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php require '/Web/Menus/menu2.php'; ?>
        </head>
        <body>
            <div class="container mt-5">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="formularioCrear" enctype="multipart/form-data">
                    <h1 class="text-center">Introduzca los datos del Detalle de la Noticia</h1>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Título -->
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                            </div>

                            <!-- Descripción -->
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4" class="form-control" required></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Imagen -->
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/*" required>
                            </div>

                            <!-- Fecha de Publicación -->
                            <div class="form-group">
                                <label for="fecha">Fecha de Publicación</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
    </html>

    <?php
}
?>
