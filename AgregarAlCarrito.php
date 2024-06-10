<?php

// Iniciar sesión
session_start();

// Requerir el archivo de conexión a la base de datos
require 'bd.php';

// Obtener el ID del juego y su precio desde la URL
$juegoID = $_GET['juegoID'];
$precio = floatval($_GET['precio']); 

// Obtener el ID del usuario de la sesión
$usuarioID = $_SESSION['UsuarioID'];

// Consultar el nombre del juego usando su ID
$selNombreJuego = "SELECT nombre FROM `juegos` WHERE `juegoID` = :juegoID";
$stmtNombreJuego = $bd->prepare($selNombreJuego);
$stmtNombreJuego->bindParam(':juegoID', $juegoID);
$stmtNombreJuego->execute();
$nombreJuego = $stmtNombreJuego->fetchColumn();

// Consultar el ID del carrito del usuario
$selCarrito = "SELECT carritoID FROM `carrito` WHERE `usuarioID` = :usuarioID";
$stmtCarrito = $bd->prepare($selCarrito);
$stmtCarrito->bindParam(':usuarioID', $usuarioID);
$stmtCarrito->execute();
$carritoID = $stmtCarrito->fetchColumn();

// Verificar si el usuario tiene un carrito
if ($carritoID) {
    // Si el usuario tiene un carrito, verificar si el juego ya está en el carrito
    $selJuego = "SELECT cantidad FROM `carrito_juegos` WHERE `carritoID` = :carritoID AND `juegoID` = :juegoID";
    $stmtJuego = $bd->prepare($selJuego);
    $stmtJuego->bindParam(':carritoID', $carritoID);
    $stmtJuego->bindParam(':juegoID', $juegoID);
    $stmtJuego->execute();

    // Si el juego ya está en el carrito, aumentar la cantidad
    if ($stmtJuego->rowCount() > 0) {
        $cantidad = $stmtJuego->fetchColumn() + 1;
        $updCarr = "UPDATE `carrito_juegos` SET `cantidad` = :cantidad WHERE `carritoID` = :carritoID AND `juegoID` = :juegoID";
        $stmtUpd = $bd->prepare($updCarr);
        $stmtUpd->bindParam(':cantidad', $cantidad);
        $stmtUpd->bindParam(':carritoID', $carritoID);
        $stmtUpd->bindParam(':juegoID', $juegoID);
        $upd = $stmtUpd->execute();

        // Mostrar mensaje si se ha actualizado correctamente
        if ($upd == true) {
            echo "$nombreJuego se ha vuelto a añadir al carrito";
        }
    } else {
        // Si el juego no está en el carrito, insertarlo
        $cantidad = 1;
        $insCarr = "INSERT INTO `carrito_juegos` (`carritoID`, `juegoID`, `cantidad`, `precio`) VALUES (:carritoID, :juegoID, :cantidad, :precio)";
        $stmtIns = $bd->prepare($insCarr);
        $stmtIns->bindParam(':carritoID', $carritoID);
        $stmtIns->bindParam(':juegoID', $juegoID);
        $stmtIns->bindParam(':cantidad', $cantidad);
        $stmtIns->bindParam(':precio', $precio);
        $ins = $stmtIns->execute();

        // Mostrar mensaje si se ha insertado correctamente
        if ($ins == true) {
            echo "$nombreJuego se ha añadido al carrito";
        }
    }
} else {
    // Mostrar mensaje si no existe un carrito asociado al usuario
    echo "No se pudo comprar debido a que no existe un carrito, para poder tener uno primero debes asociar una tarjeta de crédito a tu perfil";
}

?>
