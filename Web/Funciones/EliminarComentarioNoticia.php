<?php
// Verificar si se ha recibido el ID del comentario de la noticia
if(isset($_GET['comentarioNoticiaID'])) {
    $comentarioNoticiaID = $_GET['comentarioNoticiaID'];
}

// Verificar si se ha recibido el ID de la noticia
if(isset($_GET['noticiaID'])) {
    $noticiaID = $_GET['noticiaID'];
}
    
try {
    // Requerir el archivo de conexión a la base de datos
    require '../bd.php';
    
    // Preparar y ejecutar la consulta para eliminar el comentario de la noticia
    $delete_query = "DELETE FROM comentarios_noticias WHERE comentarioNoticiaID = :comentarioNoticiaID";
    $stmt = $bd->prepare($delete_query);
    $stmt->bindParam(':comentarioNoticiaID', $comentarioNoticiaID);
    $stmt->execute();

    // Redirigir de vuelta a la página de la noticia después de eliminar el comentario
    header("Location:../PaginasIndividuales/PagNoticia.php?noticiaID=".$noticiaID);
    exit();
} catch (PDOException $e) {
    // En caso de error, mostrar el mensaje de error
    echo $e->getMessage();
}
?>
