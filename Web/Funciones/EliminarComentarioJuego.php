<?php
// Verificar si se ha recibido el ID del comentario del juego
if(isset($_GET['comentarioJuegoID'])) {
    $comentarioJuegoID = $_GET['comentarioJuegoID'];
}

// Verificar si se ha recibido el ID del juego
if(isset($_GET['JuegoID'])) {
    $JuegoID= $_GET['JuegoID'];
}
    
try {
    // Requerir el archivo de conexión a la base de datos
    require '../bd.php';
    
    // Preparar y ejecutar la consulta para eliminar el comentario del juego
    $delete_query = "DELETE FROM comentarios_juegos WHERE comentarioJuegoID = :comentarioJuegoID";
    $stmt = $bd->prepare($delete_query);
    $stmt->bindParam(':comentarioJuegoID', $comentarioJuegoID);
    $stmt->execute();

    // Redirigir de vuelta a la página del juego después de eliminar el comentario
    header("Location:/Web/PaginasIndividuales/PagJuego.php?juegoID=".$JuegoID);
    exit();
} catch (PDOException $e) {
    // En caso de error, mostrar el mensaje de error
    echo $e->getMessage();
}
?>
