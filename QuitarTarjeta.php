<?php
if(isset($_GET['tarjetaID'])) {
    $tarjetaID = $_GET['tarjetaID'];
    
    try {
        require 'bd.php';

        // Eliminar cualquier fila correspondiente en la tabla 'carrito'
        $delete_carrito_query = "DELETE FROM carrito WHERE tarjetaID = :tarjetaID";
        $stmt_carrito = $bd->prepare($delete_carrito_query);
        $stmt_carrito->bindParam(':tarjetaID', $tarjetaID);
        $stmt_carrito->execute();

        // Luego, eliminar la fila de la tabla 'tarjetas'
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
