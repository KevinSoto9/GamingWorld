<?php
session_start();

require 'bd.php';

$searchTerm = $_POST['searchTerm'];
if (isset($_POST['generos'])) {
    $generosSeleccionados = $_POST['generos'];
} else {
    $generosSeleccionados = array(); // Caso vacío
}
if (isset($_POST["precio"])) {
    $precioSeleccionado = $_POST["precio"];
} else {
    // Si no se especifica un precio, obtener el precio máximo de los juegos
    $maxPrecioQuery = "SELECT MAX(precio) AS max_precio FROM juegos";
    $maxPrecioStatement = $bd->query($maxPrecioQuery);
    $maxPrecioRow = $maxPrecioStatement->fetch();
    $precioSeleccionado = $maxPrecioRow['max_precio'];
}

// Consulta SQL
$sel = "SELECT
            juegos.juegoID,
            juegos.nombre,
            juegos.imagen,
            juegos.descripcion,
            juegos.fecha_salida,
            juegos.precio,
            GROUP_CONCAT(generos.nombre) AS generos
        FROM juegos
        INNER JOIN juegos_generos ON juegos_generos.juegoID = juegos.juegoID
        INNER JOIN generos ON generos.generoID = juegos_generos.generoID
        WHERE juegos.nombre LIKE '%$searchTerm%'";

// Si hay géneros seleccionados
if (!empty($generosSeleccionados)) {
    $generosFiltro = implode(",", $generosSeleccionados);
    $sel .= " AND juegos_generos.generoID IN ($generosFiltro)";
}

$sel .= " AND juegos.precio <= " . $precioSeleccionado;

$sel .= " GROUP BY juegos.juegoID
        ORDER BY juegos.nombre ASC";

$statement = $bd->query($sel);
$resultados = $statement->fetchAll();

renderizarJuegos($resultados);

function renderizarJuegos($juegos)
{
    require 'bd.php';

    $html = "<div class='container-fluid mv-80'>"; // Cambiamos a container-fluid para que ocupe todo el ancho disponible
    $html .= "<div class='row'>"; // Creamos una fila de Bootstrap

    foreach ($juegos as $juego) {
        $html .= "<div class='col-md-3 mb-4'>"; // Dividimos en columnas de Bootstrap
        $html .= "<div class='bg-dark card h-100'>"; // Clase h-100 para que todas las cartas tengan la misma altura
        $html .= "<a href='PagJuego.php?juegoID={$juego['juegoID']}' class='text-white enlace-juego'>";
        $html .= "<img class='card-img-top text-white' src='ImagenesJuegos/{$juego['imagen']}' alt='{$juego['nombre']}'>";
        $html .= "<div class='card-body'>";
        $html .= "<h5 class='card-title text-white'>{$juego['nombre']}</h5>";
        $html .= "<p class='card-text text-white'>Precio: {$juego['precio']}</p>";
        $html .= "<p class='card-text text-white'>Géneros: ";
        $generos = explode(",", $juego["generos"]);
        foreach ($generos as $genero) {
            $query = "SELECT generoID FROM generos WHERE nombre = ?";
            $statement = $bd->prepare($query);
            $statement->execute([$genero]);
            $resultado = $statement->fetch();
            $generoID = isset($resultado['generoID']) ? urlencode($resultado['generoID']) : '';
            $html .= "<a class='generos text-white' href='PagGenero.php?generoID=$generoID' id='$generoID'>$genero</a>, ";
        }
        $html .= "</p>";
        $html .= "</div>";
        $html .= "</a>";
        $html .= "</div>";
        $html .= "</div>";
    }

    $html .= "</div>"; // Cerramos la fila de Bootstrap
    $html .= "</div>"; // Cerramos el contenedor de Bootstrap

    echo $html;
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var agregarCarritoBtns = document.querySelectorAll('.agregar-carrito');
        agregarCarritoBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var juegoID = btn.getAttribute('data-juego-id');
                var precio = btn.getAttribute('data-precio');
                fetch('AgregarAlCarrito.php?juegoID=' + juegoID + '&precio=' + precio + '&usuarioID=<?php echo $_SESSION['UsuarioID']; ?>')
                    .then(response => response.text())
                    .then(text => alert(text)); // Muestra una alerta con el mensaje devuelto por el servidor
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
