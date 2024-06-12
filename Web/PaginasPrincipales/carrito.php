<?php
session_start();
if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioID'] === null) {
    // Requerir archivo para usuario no logueado
    require '../PaginasAdicionales/NoInicioSesion.php';
} else {
// Incluir archivos necesarios
require '../Menus/menu.php';
require '../bd.php';

// Incluir estilos CSS
echo "<link rel='stylesheet' href='assets/cssPlus/cssPlus.css'>";
echo "<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>";

// Obtener el ID del usuario de la sesión
$usuarioID = $_SESSION['UsuarioID'];

// Consultar el ID del carrito del usuario
$selCarrito = "SELECT carritoID FROM `carrito` WHERE `usuarioID` = :usuarioID";
$stmtCarrito = $bd->prepare($selCarrito);
$stmtCarrito->bindParam(':usuarioID', $usuarioID);
$stmtCarrito->execute();
$carritoID = $stmtCarrito->fetchColumn();

$html = "<body>";
$html .= "<div class='container mt-5'>";

// Verificar si el carrito del usuario no está vacío
if ($carritoID) {
    // Consultar los juegos en el carrito
    $selCarritoJuegos = "SELECT cj.juegoID, j.nombre, cj.precio, cj.cantidad FROM `carrito_juegos` cj INNER JOIN `juegos` j ON cj.juegoID = j.juegoID WHERE `carritoID` = :carritoID";
    $stmtCarritoJuegos = $bd->prepare($selCarritoJuegos);
    $stmtCarritoJuegos->bindParam(':carritoID', $carritoID);
    $stmtCarritoJuegos->execute();

    // Verificar si hay juegos en el carrito
    if ($stmtCarritoJuegos->rowCount() > 0) {
        // Construir la tabla de la lista de la compra
        $html .= "<h2 class='text-center text-white mb-5'>Lista de la compra</h2>";
        $html .= "<table class='table table-dark table-striped mb-5'>";
        $html .= "<thead><tr><th>Nombre del Juego</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Acciones</th></tr></thead>";
        $html .= "<tbody>";

        $totalGeneral = 0;

        // Iterar sobre los juegos en el carrito
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

        // Mostrar el total general
        $html .= "<h3 class='text-center text-white total-general mb-4'>Total General: $$totalGeneral</h3>";

        // Formulario para finalizar la compra
        $html .= "<form action='../Funciones/Email.php' method='post' class='text-center'>";
        $html .= "<input type='submit' value='Finalizar la compra' class='btn btn-success'>";
        $html .= "</form>";
    } else {
        // Mensaje si el carrito está vacío
        $html .= "<div class='text-center'>";
        $html .= "<h2 class='text-white my-4'>Tu carrito está vacío</h2>";
        $html .= "<img src='../../Imagenes/Imagenes/carritoVacio.gif' alt='Carrito vacío' class='img-fluid my-4' style='max-width: 400px; height: auto;'>";
        $html .= "<div class='mt-4'>";
        $html .= "<a href='PagPrincipal.php' class='btn btn-primary btn-lg'>Volver a la tienda</a>";
        $html .= "</div>";
        $html .= "</div>";
    }
} else {
    // Mensaje si el carrito está vacío
    $html .= "<div class='text-center'>";
    $html .= "<h2 class='text-white my-4'>Tu carrito está vacío</h2>";
    $html .= "<img src='../../Imagenes/Imagenes/carritoVacio.gif' alt='Carrito vacío' class='img-fluid my-4' style='max-width: 400px; height: auto;'>";
    $html .= "<div class='mt-4'>";
    $html .= "<a href='PagPrincipal.php' class='btn btn-primary btn-lg'>Volver a la tienda</a>";
    $html .= "</div>";
    $html .= "</div>";
}

$html .= "</div>";
$html .= "</body>";

// Imprimir HTML generado
echo $html;
?>

<!-- Scripts JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
// Script para eliminar un juego del carrito
$(document).ready(function() {
    $('.eliminar-juego').on('click', function() {
        var juegoID = $(this).data('juego-id');
        var carritoID = $(this).data('carrito-id');
        var row = $('#juego-' + juegoID);

        $.ajax({
            url: '../Funciones/EliminarJuego.php',
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
                    // Actualizar el total general y verificar si es cero
                    updateTotalGeneral();
                } else {
                    alert(res.message);
                }
            }
        });
    });

    // Función para actualizar el total general
    function updateTotalGeneral() {
        var totalGeneral = 0;
        $('.table tbody tr').each(function() {
            var total = parseFloat($(this).find('td:eq(3)').text());
            totalGeneral += total;
        });
        if (totalGeneral === 0) {
            location.reload(); // Recargar la página para mostrar el carrito vacío
        } else {
            $('.total-general').text('Total General: $' + totalGeneral.toFixed(2));
        }
    }
});
</script>

<?php
    }
    ?>