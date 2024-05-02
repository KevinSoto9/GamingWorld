<?php
session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {
    $html .= "<div class='NoAdmin'>";
    $html .= "No has iniciado sesión como administrador";
    $html .= "<button onclick='window.location.href=\"../index.php\"'>Hazlo Aquí</button>";
    $html .= "</div>";
   
    echo $html;
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
        $clave = $_POST["clave"];
        
        // Carpeta de destino para las imágenes subidas
        $carpeta_destino = "../ImagenesJuegos/";

        try {
            require '../bd.php';

            // Mueve la imagen de la carpeta temporal a la carpeta de destino
            if (move_uploaded_file($imagen_temp, $carpeta_destino . $imagen)) {
                // Inserta los datos en la base de datos
                $ins = "INSERT INTO `juegos` (`JuegoID`, `nombre`, `imagen`, `descripcion`, `fecha_salida`, `precio`, `clave`) VALUES (NULL, '$nombre', '$imagen', '$descripcion', '$fecha', '$precio', '$clave')";
                $resul = $bd->query($ins);
                if ($resul) {
                    header("Location:../Admin.php");
                }
            } else {
                echo "Error al subir la imagen.";
            }
        } catch (PDOException $e) {
            echo "Error: Comprueba que los datos introducidos no están ya en la base de datos";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="../css/styles.css">
    <?php require '../menu2.php'; ?>
</head>
<body>
    <!-- Formulario de creación de Juegos -->
    <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <h1 class="formularioCrear-tituloPrincipal">Introduzca los datos del Juego</h1>
        
        <!-- Contenedor de los datos -->
        <div class="formularioCrear-container">
            <!-- Nombre -->
            <div class="formularioCrear-container-datos">
                <p class="formularioCrear-container-datos-nombre">Nombre</p>
                <input type="text" name="nombre">
            </div>
            
            <!-- Imagen -->
            <div class="formularioCrear-container-datos">
                <p class="formularioCrear-container-datos-imagen">Imagen</p>
                <input type="file" name="imagen">
            </div>
            
            <!-- Descripcion -->
            <div class="formularioCrear-container-datos">
                <p class="formularioCrear-container-datos-descripcion">Descripcion</p>
                <input type="textarea" name="descripcion">
            </div>
            
            <!-- Fecha  -->
            <div class="formularioCrear-container-datos">
                <p class="formularioCrear-container-datos-fecha">Fecha</p>
                <input type="date" name="fecha">
            </div>
            
            <!-- Precio -->
            <div>
                <p class="formularioCrear-container-datos-precio">Precio</p>
                <input type="text" name="precio">
            </div>
            
            <!-- Clave -->
            <div class="formularioCrear-container-datos">
                <p class="formularioCrear-container-datos-clave">Clave</p>
                <input type="text" name="clave">
            </div>
            
            <br></br>
            
            <input type="submit">
        </div>
    </form>
</body>
</html>
