<?php

if(isset($_GET['comentarioNoticiaID'])) {
    $comentarioNoticiaID = $_GET['comentarioNoticiaID'];
}
    
if(isset($_GET['noticiaID'])) {
    $noticiaID = $_GET['noticiaID'];
}
    
    try {
        require 'bd.php';
        $delete_query = "DELETE FROM comentarios_noticias WHERE comentarioNoticiaID = :comentarioNoticiaID";
        $stmt = $bd->prepare($delete_query);
        $stmt->bindParam(':comentarioNoticiaID', $comentarioNoticiaID);
        $stmt->execute();

        header("Location:PagNoticia.php?noticiaID=".$noticiaID);
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
