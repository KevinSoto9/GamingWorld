<?php

if(isset($_GET['tarjetaID'])) {
    $tarjetaID = $_GET['tarjetaID'];
    
    try {
        require 'bd.php';
        $delete_query = "DELETE FROM tarjetas WHERE TarjetaID = :tarjetaID";
        $stmt = $bd->prepare($delete_query);
        $stmt->bindParam(':tarjetaID', $tarjetaID);
        $stmt->execute();

        header("Location:perfil.php");
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
