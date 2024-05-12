<?php
require 'menu.php';
require 'bd.php';

echo "<link rel='stylesheet' href='css/styles.css'>";

$usuarioID = $_SESSION['UsuarioID'];

$selCarrito = "SELECT carritoID FROM `carrito` WHERE `usuarioID` = :usuarioID";
$stmtCarrito = $bd->prepare($selCarrito);
$stmtCarrito->bindParam(':usuarioID', $usuarioID);
$stmtCarrito->execute();
$carritoID = $stmtCarrito->fetchColumn();

$html = "<div>";

if ($carritoID) {
    $selCarritoJuegos = "SELECT cj.juegoID, j.nombre, cj.precio, cj.cantidad FROM `carrito_juegos` cj INNER JOIN `juegos` j ON cj.juegoID = j.juegoID WHERE `carritoID` = :carritoID";
    $stmtCarritoJuegos = $bd->prepare($selCarritoJuegos);
    $stmtCarritoJuegos->bindParam(':carritoID', $carritoID);
    $stmtCarritoJuegos->execute();
    
    $html .= "<h2>Lista de la compra</h2>";
    $html .= "<table>";
    $html .= "<tr><th>Nombre del Juego</th><th>Precio</th><th>Cantidad</th><th>Total</th></tr>";
    while ($row = $stmtCarritoJuegos->fetch(PDO::FETCH_ASSOC)) {
        $nombreJuego = $row['nombre'];
        $precio = $row['precio'];
        $cantidad = $row['cantidad'];
        $total = $precio * $cantidad;
        $html .= "<tr><td>$nombreJuego</td><td>$precio</td><td>$cantidad</td><td>$total</td></tr>";
    }
    $html .= "</table>";
    
    $html .= "<form action='Email.php' method='post'>";
    $html .= "<input type='submit' value='Finalizar la compra'>";
    $html .= "</form>";

} else {
    $html .= "<p>No hay juegos en el carrito.</p>";
}

$html .= "</div>";

echo $html;
?>
