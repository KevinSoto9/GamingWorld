<?php

if(isset($_GET['comentarioJuegoID'])) {
    $comentarioJuegoID = $_GET['comentarioJuegoID'];
}
    
if(isset($_GET['JuegoID'])) {
    $JuegoID= $_GET['JuegoID'];
}
    
    try {
        require 'bd.php';
        $delete_query = "DELETE FROM comentarios_juegos WHERE comentarioJuegoID = :comentarioJuegoID";
        $stmt = $bd->prepare($delete_query);
        $stmt->bindParam(':comentarioJuegoID', $comentarioJuegoID);
        $stmt->execute();

        header("Location:PagJuego.php?juegoID=".$JuegoID);
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
