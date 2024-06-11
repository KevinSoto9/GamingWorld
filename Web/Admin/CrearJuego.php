<?php
session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {
    
    require '../PaginasAdicionales/PersonalAutorizado.php';
    
} else {
    session_abort();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        // Manejo de la imagen subida
        $imagen = $_FILES["imagen"]["name"];
        $imagen_temp = $_FILES["imagen"]["tmp_name"];
        $descripcion = $_POST["descripcion"];
        $fecha = $_POST["fecha"];
        $precio = floatval($_POST["precio"]);
        
        // Carpeta de destino para las imágenes subidas
        $carpeta_destino = "../../Imagenes/ImagenesJuegos/";

        try {
            require '../bd.php';

            // Mueve la imagen de la carpeta temporal a la carpeta de destino
            if (move_uploaded_file($imagen_temp, $carpeta_destino . $imagen)) {
                // Inserta los datos en la base de datos
                $ins = "INSERT INTO `juegos` (`JuegoID`, `nombre`, `descripcion`, `fecha_salida`, `precio`) VALUES (NULL, '$nombre','$descripcion', '$fecha', '$precio')";
                $resul = $bd->query($ins);
                if ($resul) {
                    header("Location:../PaginasPrincipales/Admin.php");
                }
            } else {
                echo "Error al subir la imagen.";
            }
        } catch (PDOException $e) {
            echo "Compueba que los datos no estan yua en la base de datos";
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming World - Crear Juego</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php require '../Menus/menu2.php'; ?>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Introduzca los datos del Juego</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Juego</button>
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