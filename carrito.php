<?php
require 'menu.php';
require 'bd.php';

echo "<link rel='stylesheet' href='assets/cssPlus/cssPlus.css'>";
echo "<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>";

$usuarioID = $_SESSION['UsuarioID'];

$selCarrito = "SELECT carritoID FROM `carrito` WHERE `usuarioID` = :usuarioID";
$stmtCarrito = $bd->prepare($selCarrito);
$stmtCarrito->bindParam(':usuarioID', $usuarioID);
$stmtCarrito->execute();
$carritoID = $stmtCarrito->fetchColumn();

$html = "<body>";
$html .= "<div class='container mt-5'>";

if ($carritoID) {
    $selCarritoJuegos = "SELECT cj.juegoID, j.nombre, cj.precio, cj.cantidad FROM `carrito_juegos` cj INNER JOIN `juegos` j ON cj.juegoID = j.juegoID WHERE `carritoID` = :carritoID";
    $stmtCarritoJuegos = $bd->prepare($selCarritoJuegos);
    $stmtCarritoJuegos->bindParam(':carritoID', $carritoID);
    $stmtCarritoJuegos->execute();

    if ($stmtCarritoJuegos->rowCount() > 0) {
        $html .= "<h2 class='text-center text-white'>Lista de la compra</h2>";
        $html .= "<table class='table table-dark table-striped'>";
        $html .= "<thead><tr><th>Nombre del Juego</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Acciones</th></tr></thead>";
        $html .= "<tbody>";

        $totalGeneral = 0;

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
                        <td class='total'>$total</td>
                        <td>
                            <button class='btn btn-danger eliminar-juego' data-juego-id='$juegoID' data-carrito-id='$carritoID'>Eliminar</button>
                        </td>
                      </tr>";
            $totalGeneral += $total;
        }

        $html .= "</tbody></table>";

        $html .= "<h3 class='text-center text-white total-general'>Total General: $$totalGeneral</h3>";

        $html .= "<form action='Email.php' method='post' class='text-center'>";
        $html .= "<input type='submit' value='Finalizar la compra' class='btn btn-success'>";
        $html .= "</form>";
    } else {
        $html .= "<div class='text-center'>";
        $html .= "<h2 class='text-white my-4'>Tu carrito está vacío</h2>";
        $html .= "<img src='Imagenes/carritoVacio.gif' alt='Carrito vacío' class='img-fluid my-4' style='max-width: 400px; height: auto;'>";
        $html .= "<div class='mt-4'>";
        $html .= "<a href='Pagprincipal.php' class='btn btn-primary btn-lg'>Volver a la tienda</a>";
        $html .= "</div>";
        $html .= "</div>";
    }
} else {
    $html .= "<div class='text-center'>";
    $html .= "<h2 class='text-white'>Tu carrito está vacío</h2>";
    $html .= "<img src='Imagenes/carritoVacio.gif' alt='Carrito vacío' class='img-fluid my-4'>";
    $html .= "<a href='Pagprincipal.php' class='btn btn-primary'>Volver a la tienda</a>";
    $html .= "</div>";
}

$html .= "</div>";
$html .= "</body>";

echo $html;
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                    // Update total general and check if it's zero
                    updateTotalGeneral();
                } else {
                    alert(res.message);
                }
            }
        });
    });

    function updateTotalGeneral() {
        var totalGeneral = 0;
        $('.table tbody tr').each(function() {
            var total = parseFloat($(this).find('td:eq(3)').text());
            totalGeneral += total;
        });
        if (totalGeneral === 0) {
            location.reload(); // Reload page to show empty cart
        } else {
            $('.total-general').text('Total General: $' + totalGeneral.toFixed(2));
        }
    }

});
</script>
