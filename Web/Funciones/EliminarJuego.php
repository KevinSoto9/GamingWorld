<?php
// Iniciar sesión
session_start();

// Requerir el archivo de conexión a la base de datos
require '../bd.php';

// Obtener el ID del juego y el ID del usuario de la sesión
$juegoID = $_GET['juegoID'];
$usuarioID = $_SESSION['UsuarioID'];

// Consultar el carrito del usuario
$selCarrito = "SELECT carritoID FROM `carrito` WHERE `usuarioID` = :usuarioID";
$stmtCarrito = $bd->prepare($selCarrito);
$stmtCarrito->bindParam(':usuarioID', $usuarioID);
$stmtCarrito->execute();
$carritoID = $stmtCarrito->fetchColumn();

// Si se encontró el carrito
if ($carritoID) {
    // Consultar la cantidad de un juego en el carrito
    $selJuego = "SELECT cantidad FROM `carrito_juegos` WHERE `carritoID` = :carritoID AND `juegoID` = :juegoID";
    $stmtJuego = $bd->prepare($selJuego);
    $stmtJuego->bindParam(':carritoID', $carritoID);
    $stmtJuego->bindParam(':juegoID', $juegoID);
    $stmtJuego->execute();
    
    // Si se encontró el juego en el carrito
    if ($stmtJuego->rowCount() > 0) {
        // Obtener la cantidad del juego
        $cantidad = $stmtJuego->fetchColumn();
        
        // Si la cantidad es mayor que 1, actualizar la cantidad
        if ($cantidad > 1) {
            $cantidad -= 1;
            $updCarr = "UPDATE `carrito_juegos` SET `cantidad` = :cantidad WHERE `carritoID` = :carritoID AND `juegoID` = :juegoID";
            $stmtUpd = $bd->prepare($updCarr);
            $stmtUpd->bindParam(':cantidad', $cantidad);
            $stmtUpd->bindParam(':carritoID', $carritoID);
            $stmtUpd->bindParam(':juegoID', $juegoID);
            $upd = $stmtUpd->execute();
            
            // Si la actualización fue exitosa, devolver respuesta JSON
            if ($upd == true) {
                echo json_encode(['success' => true, 'message' => 'Cantidad actualizada', 'cantidad' => $cantidad]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al actualizar la cantidad']);
            }
        } else { // Si la cantidad es 1, eliminar el juego del carrito
            $delJuego = "DELETE FROM `carrito_juegos` WHERE `carritoID` = :carritoID AND `juegoID` = :juegoID";
            $stmtDelJuego = $bd->prepare($delJuego);
            $stmtDelJuego->bindParam(':carritoID', $carritoID);
            $stmtDelJuego->bindParam(':juegoID', $juegoID);
            $del = $stmtDelJuego->execute();
            
            // Si la eliminación fue exitosa, devolver respuesta JSON
            if ($del == true) {
                echo json_encode(['success' => true, 'message' => 'Juego eliminado']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al eliminar el juego']);
            }
        }
    } else { // Si el juego no se encuentra en el carrito, devolver respuesta JSON
        echo json_encode(['success' => false, 'message' => 'Juego no encontrado en el carrito']);
    }
} else { // Si no se encontró el carrito, devolver respuesta JSON
    echo json_encode(['success' => false, 'message' => 'No se pudo encontrar el carrito']);
}
?>
