<?php

session_start();

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {
    $html .= "<div class='NoAdmin'>";
    $html .= "No has iniciado sesión";
    $html .= "<button onclick='window.location.href=\"index.php\"'>Hazlo Aquí</button>";
    $html .= "</div>";
   
    echo $html;
}

else{
    

session_abort();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noticiaID = $_POST["noticiaID"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $imagen = $_POST["imagen"];
    $fechaPublicacion = $_POST["fechaPublicacion"];
    $urlNoticia = $_POST["urlNoticia"];

    try {
        require '../bd.php';
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

        <!-- Formulario de creación de Detalle de Noticias -->
        <form class="formularioCrear" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <h1 class="formularioCrear-tituloPrincipal">Introduzca los datos del Detalle de la Noticia</h1>

            <!-- Contenedor de los datos -->
            <div class="formularioCrear-container">

                <!-- Noticia -->
                <div class="formularioCrear-container-datos">
                    <p class="formularioCrear-container-datos-noticiaID">Noticia</p>
                    <select name="noticiaID">
                        <?php foreach ($stmtNoticias as $fila): ?>
                            <option value="<?php echo htmlspecialchars($fila['noticiaID']); ?>"><?php echo htmlspecialchars($fila['titulo']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Título -->
                <div class="formularioCrear-container-datos">
                    <p class="formularioCrear-container-datos-titulo">Título</p>
                    <input type="text" name="titulo">
                </div>

                <!-- Descripción -->
                <div class="formularioCrear-container-datos">
                    <p class="formularioCrear-container-datos-descripcion">Descripción</p>
                    <textarea name="descripcion" rows="4" cols="50"></textarea>
                </div>

                <!-- Imagen -->
                <div class="formularioCrear-container-datos">
                    <p class="formularioCrear-container-datos-imagen">Imagen</p>
                    <input type="text" name="imagen">
                </div>

                <!-- Fecha de Publicación -->
                <div class="formularioCrear-container-datos">
                    <p class="formularioCrear-container-datos-fechaPublicacion">Fecha de Publicación</p>
                    <input type="date" name="fechaPublicacion">
                </div>

                <!-- URL de la Noticia -->
                <div class="formularioCrear-container-datos">
                    <p class="formularioCrear-container-datos-urlNoticia">URL de la Noticia</p>
                    <input type="text" name="urlNoticia">
                </div>

                <br></br>

                <input type="submit">

            </div>
        </form>
    </body>
</html>

<?php
}
?>