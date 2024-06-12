<?php
session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {

    require '/Web/PaginasAdicionales/PersonalAutorizado.php';
} else {

    session_abort();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo"];
        $resumen = $_POST["resumen"];

        // Manejo de la imagen subida
        $imagen = $_FILES["imagen"]["name"];
        $imagen_temp = $_FILES["imagen"]["tmp_name"];

        // Carpeta de destino para las imágenes subidas
        $carpeta_destino = "/Imagenes/ImagenesNoticias/";

        try {
            require '../bd.php';

            // Mueve la imagen de la carpeta temporal a la carpeta de destino
            if (move_uploaded_file($imagen_temp, $carpeta_destino . $imagen)) {
                // Inserta los datos en la base de datos
                $ins = "INSERT INTO `noticias` (`noticiaID`, `titulo`, `resumen`) VALUES (NULL, '$titulo', '$resumen')";
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
            <title>Gaming World - Crear Noticia</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php require '/Web/Menus/menu2.php'; ?>
        </head>
        <body>
            <!-- Formulario de creación de Noticias -->
            <div class="container mt-5">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="formularioCrear" enctype="multipart/form-data">
                    <h1 class="text-center">Introduzca los datos de la Noticia</h1>

                    <!-- Contenedor de los datos -->
                    <div class="formularioCrear-container">

                        <!-- Título -->
                        <div class="form-group formularioCrear-container-datos">
                            <label for="titulo" class="formularioCrear-container-datos-titulo">Título</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                        </div>

                        <!-- Resumen -->
                        <div class="form-group formularioCrear-container-datos">
                            <label for="resumen" class="formularioCrear-container-datos-resumen">Resumen</label>
                            <textarea name="resumen" id="resumen" rows="4" cols="50" class="form-control" required></textarea>
                        </div>

                        <!-- Imagen -->
                        <div class="form-group formularioCrear-container-datos">
                            <label for="imagen" class="formularioCrear-container-datos-imagen">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/*" required>
                        </div>

                        <br>

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
