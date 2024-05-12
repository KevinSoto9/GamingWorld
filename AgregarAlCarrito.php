<?php

session_start();

require 'bd.php';

$juegoID = $_GET['juegoID'];
$precio = floatval($_GET['precio']); 
$usuarioID = $_SESSION['UsuarioID'];

$selNombreJuego = "SELECT nombre FROM `juegos` WHERE `juegoID` = :juegoID";
$stmtNombreJuego = $bd->prepare($selNombreJuego);
$stmtNombreJuego->bindParam(':juegoID', $juegoID);
$stmtNombreJuego->execute();
$nombreJuego = $stmtNombreJuego->fetchColumn();

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

        $cantidad = $stmtJuego->fetchColumn() + 1;
        $updCarr = "UPDATE `carrito_juegos` SET `cantidad` = :cantidad WHERE `carritoID` = :carritoID AND `juegoID` = :juegoID";
        $stmtUpd = $bd->prepare($updCarr);
        $stmtUpd->bindParam(':cantidad', $cantidad);
        $stmtUpd->bindParam(':carritoID', $carritoID);
        $stmtUpd->bindParam(':juegoID', $juegoID);
        $upd = $stmtUpd->execute();
        
        if ($upd == true) {
            echo "$nombreJuego se ha vuelto a añadir al carrito";
        }
    } else {

        $cantidad = 1;
        $insCarr = "INSERT INTO `carrito_juegos` (`carritoID`, `juegoID`, `cantidad`, `precio`) VALUES (:carritoID, :juegoID, :cantidad, :precio)";
        $stmtIns = $bd->prepare($insCarr);
        $stmtIns->bindParam(':carritoID', $carritoID);
        $stmtIns->bindParam(':juegoID', $juegoID);
        $stmtIns->bindParam(':cantidad', $cantidad);
        $stmtIns->bindParam(':precio', $precio);
        $ins = $stmtIns->execute();
        
        if ($ins == true) {
            echo "$nombreJuego se ha añadido al carrito";
        }
    }
} else {
    echo "No se pudo comprar debido a que no existe un carrito, para poder tener uno primero debes asociar una tarjeta de crédito a tu perfil";
}

?>
