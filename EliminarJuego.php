<?php

session_start();

require 'bd.php';

$juegoID = $_GET['juegoID'];
$usuarioID = $_SESSION['UsuarioID'];

$selCarrito = "SELECT carritoID FROM `carrito` WHERE `usuarioID` = :usuarioID";
$stmtCarrito = $bd->prepare($selCarrito);
$stmtCarrito->bindParam(':usuarioID', $usuarioID);
$stmtCarrito->execute();
$carritoID = $stmtCarrito->fetchColumn();

if ($carritoID) {
    $selJuego = "SELECT cantidad FROM `carrito_juegos` WHERE `carritoID` = :carritoID AND `juegoID` = :juegoID";
    $stmtJuego = $bd->prepare($selJuego);
    $stmtJuego->bindParam(':carritoID', $carritoID);
    $stmtJuego->bindParam(':juegoID', $juegoID);
    $stmtJuego->execute();
    
    if ($stmtJuego->rowCount() > 0) {
        $cantidad = $stmtJuego->fetchColumn();
        
        if ($cantidad > 1) {
            $cantidad -= 1;
            $updCarr = "UPDATE `carrito_juegos` SET `cantidad` = :cantidad WHERE `carritoID` = :carritoID AND `juegoID` = :juegoID";
            $stmtUpd = $bd->prepare($updCarr);
            $stmtUpd->bindParam(':cantidad', $cantidad);
            $stmtUpd->bindParam(':carritoID', $carritoID);
            $stmtUpd->bindParam(':juegoID', $juegoID);
            $upd = $stmtUpd->execute();
            
            if ($upd == true) {
                echo json_encode(['success' => true, 'message' => 'Cantidad actualizada', 'cantidad' => $cantidad]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al actualizar la cantidad']);
            }
        } else {
            $delJuego = "DELETE FROM `carrito_juegos` WHERE `carritoID` = :carritoID AND `juegoID` = :juegoID";
            $stmtDelJuego = $bd->prepare($delJuego);
            $stmtDelJuego->bindParam(':carritoID', $carritoID);
            $stmtDelJuego->bindParam(':juegoID', $juegoID);
            $del = $stmtDelJuego->execute();
            
            if ($del == true) {
                echo json_encode(['success' => true, 'message' => 'Juego eliminado']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al eliminar el juego']);
            }
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Juego no encontrado en el carrito']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No se pudo encontrar el carrito']);
}

?>
