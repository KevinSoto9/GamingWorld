<?php
session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {
    require '../PersonalAutorizado.php';
} else {
    session_abort();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $noticiaID = $_POST["noticiaID"];
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];

// Manejo de la imagen subida
        $imagen = $_FILES["imagen"]["name"];
        $imagen_temp = $_FILES["imagen"]["tmp_name"];

        $fechaPublicacion = $_POST["fechaPublicacion"];
        $urlNoticia = $_POST["urlNoticia"];

// Carpeta de destino para las imágenes subidas
        $carpeta_destino = "../ImagenesNoticiasDetalles/";

        try {
            require '../bd.php';

// Mueve la imagen de la carpeta temporal a la carpeta de destino
            if (move_uploaded_file($imagen_temp, $carpeta_destino . $imagen)) {
// Inserta los datos en la base de datos
                $ins = "INSERT INTO `noticias_detalles` (`noticiaDetalleID`, `noticiaID`, `titulo`, `descripcion`, `imagen`, `fechaPublicacion`, `urlNoticia`) VALUES (NULL, :noticiaID, :titulo, :descripcion, :imagen, :fechaPublicacion, :urlNoticia)";
                $stmt = $bd->prepare($ins);
                $stmt->bindParam(':noticiaID', $noticiaID);
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':imagen', $imagen);
                $stmt->bindParam(':fechaPublicacion', $fechaPublicacion);
                $stmt->bindParam(':urlNoticia', $urlNoticia);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    header("Location:../Admin.php");
                } else {
                    echo "Error: No se pudo insertar el detalle de la noticia.";
                }
            } else {
                echo "Error al subir la imagen.";
            }
        } catch (PDOException $e) {
            echo "Error: Comprueba que los datos introducidos son correctos.";
        }
    }

    try {
        require '../bd.php';
        $consultaNoticias = "SELECT noticiaID, titulo FROM noticias ORDER BY titulo";
        $stmtNoticias = $bd->query($consultaNoticias);
    } catch (PDOException $e) {
        echo "Error al obtener las noticias.";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World - Crear Noticia Detalle</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <?php require '../menu2.php'; ?>
    </head>
    <body>
        <!-- Formulario de creación de Detalle de Noticias -->
        <div class="container mt-5">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="formularioCrear" enctype="multipart/form-data">
                <h1 class="text-center">Introduzca los datos del Detalle de la Noticia</h1>

                <!-- Contenedor de los datos -->
                <div class="formularioCrear-container">

                    <!-- Noticia -->
                    <div class="form-group formularioCrear-container-datos">
                        <label for="noticiaID" class="formularioCrear-container-datos-noticiaID">Noticia</label>
                        <select name="noticiaID" id="noticiaID" class="form-control">
                            <?php foreach ($stmtNoticias as $fila): ?>
                                <option value="<?php echo htmlspecialchars($fila['noticiaID']); ?>"><?php echo htmlspecialchars($fila['titulo']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Título -->
                    <div class="form-group formularioCrear-container-datos">
                        <label for="titulo" class="formularioCrear-container-datos-titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>

                    <!-- Descripción -->
                    <div class="form-group formularioCrear-container-datos">
                        <label for="descripcion" class="formularioCrear-container-datos-descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="4" cols="50" class="form-control" required></textarea>
                    </div>

                    <!-- Imagen -->
                    <div class="form-group formularioCrear-container-datos">
                        <label for="imagen" class="formularioCrear-container-datos-imagen">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/*" required>
                    </div>

                    <!-- Fecha de Publicación -->
                    <div class="form-group formularioCrear-container-datos">
                        <label for="fechaPublicacion" class="formularioCrear-container-datos-fechaPublicacion">Fecha de Publicación</label>
                        <input type="date" name="fechaPublicacion" id="fechaPublicacion" class="form-control" required>
                    </div>

                    <!-- URL de la Noticia -->
                    <div class="form-group formularioCrear-container-datos">
                        <label for="urlNoticia" class="formularioCrear-container-datos-urlNoticia">URL de la Noticia</label>
                        <input type="text" name="urlNoticia" id="urlNoticia" class="form-control" required>
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
