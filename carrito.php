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
    $html .= "<tr><th>Nombre del Juego</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Acciones</th></tr>";
    while ($row = $stmtCarritoJuegos->fetch(PDO::FETCH_ASSOC)) {
        $nombreJuego = $row['nombre'];
        $precio = $row['precio'];
        $cantidad = $row['cantidad'];
        $total = $precio * $cantidad;
        $juegoID = $row['juegoID'];
        $html .= "<tr id='juego-$juegoID'>
                    <td>$nombreJuego</td>
                    <td>$precio</td>
                    <td>$cantidad</td>
                    <td>$total</td>
                    <td>
                        <button class='eliminar-juego' data-juego-id='$juegoID' data-carrito-id='$carritoID'>Eliminar</button>
                    </td>
                  </tr>";
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.eliminar-juego').on('click', function() {
        var juegoID = $(this).data('juego-id');
        var carritoID = $(this).data('carrito-id');
        var row = $('#juego-' + juegoID);

        $.ajax({
            url: 'Eliminarjuego.php',
            type: 'GET',
            data: {
                juegoID: juegoID,
                carritoID: carritoID
            },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.success) {
                    if (res.cantidad > 0) {
                        row.find('td:eq(2)').text(res.cantidad);
                        var precio = parseFloat(row.find('td:eq(1)').text());
                        var total = precio * res.cantidad;
                        row.find('td:eq(3)').text(total.toFixed(2));
                    } else {
                        row.remove();
                    }
                } else {
                    alert(res.message);
                }
            }
        });
    });
});
</script>
