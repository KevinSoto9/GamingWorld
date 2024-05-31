<?php
require 'menu.php';
require 'bd.php';

echo "<link rel='stylesheet' href='assets/cssPlus/cssPlus.css'>";
echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>"; // Agregamos Bootstrap

// Num de juegos por pagina
$registros_por_pagina = 16;

// Obtener la página actual
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Offset por donde empezar a coger datos
$offset = ($pagina_actual - 1) * $registros_por_pagina;

// Numero total de juegos
$total_registros_query = "SELECT COUNT(*) AS total FROM juegos";
$total_registros_result = $bd->query($total_registros_query);
$total_registros = $total_registros_result->fetch()['total'];

$total_paginas = ceil($total_registros / $registros_por_pagina);

// Consulta SQL (para que coja 16 por cada pagina)
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
        GROUP BY juegos.juegoID
        ORDER BY juegos.fecha_salida DESC
        LIMIT $registros_por_pagina OFFSET $offset";

$juegos = $bd->query($sel);

// Lista de juegos
$html = "";
$html .= "<div class='container-fluid mv-80'>"; // Cambiamos a container-fluid para que ocupe todo el ancho disponible

// Título
$html .= "<h1 class='text-center mt-5 text-white mb-5'>GamingWorld</h1>";

// Botón del historial
$html .= "<div class='mb-5 container d-flex justify-content-center align-items-center'>";
$html .= "<button class='btn btn-secondary' onclick=\"window.location.href='historico.php'\">Ver Historial</button>";
$html .= "</div>";

$html .= "<div class='modal fade' id='mensajeModal' tabindex='-1' role='dialog' aria-labelledby='mensajeModalLabel' aria-hidden='true'>";
$html .= "<div class='modal-dialog' role='document'>";
$html .= "<div class='modal-content'>";
$html .= "<div class='modal-header'>";
$html .= "<h5 class='modal-title' id='mensajeModalLabel'>Juego añadido</h5>";
$html .= "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
$html .= "<span aria-hidden='true'>&times;</span>";
$html .= "</button>";
$html .= "</div>";
$html .= "<div class='modal-body' id='mensajeModalBody'></div>";
$html .= "</div>";
$html .= "</div>";
$html .= "</div>";

$html .= "<div id='mensaje'></div>"; // Movemos el div del mensaje al final

$html .= "<div class='row'>"; // Creamos una fila de Bootstrap

foreach ($juegos as $juego) {
    $html .= "<div class='col-md-3 mb-4'>"; // Dividimos en columnas de Bootstrap
    $html .= "<div class='card bg-dark text-white h-100'>";
    $html .= "<a href='PagJuego.php?juegoID={$juego['juegoID']}' class='enlace-juego text-white d-block'>";
    $html .= "<img class='card-img-top' src='ImagenesJuegos/{$juego['imagen']}' alt='{$juego['nombre']}'>";
    $html .= "<div class='card-body d-flex flex-column'>";
    $html .= "<h5 class='card-title mb-0'>{$juego['nombre']}</h5>";
    $html .= "<p class='card-text mb-auto'>Precio: {$juego['precio']}</p>";
    $html .= "<p class='card-text mb-2'>Géneros: ";
    $generos = explode(",", $juego["generos"]);
    foreach ($generos as $genero) {
        $html .= "<a class='generos text-white' href='#'>$genero</a>, ";
    }
    $html .= "</p>";
    $html .= "<button class='btn btn-primary mt-auto agregar-carrito' data-toggle='modal' data-target='#mensajeModal' data-juego-id='{$juego['juegoID']}' data-precio='{$juego['precio']}'>Agregar al carrito</button>"; // Botón de agregar al carrito con modal
    $html .= "</div>";
    $html .= "</a>";
    $html .= "</div>";
    $html .= "</div>";
}


$html .= "</div>"; // Cerramos la fila de Bootstrap
$html .= "</div>"; // Cerramos el contenedor de Bootstrap

// Paginación botones
$html .= "<div class='container'>";
$html .= "<ul class='pagination justify-content-center'>"; // Cambiamos a paginación de Bootstrap
for ($i = 1; $i <= $total_paginas; $i++) {
    $html .= "<li class='page-item bg-dark'><a class='page-link bg-dark text-white' href='?pagina=$i'>$i</a></li>";
}
$html .= "</ul>";
$html .= "</div>";

$html .= "<script>";
$html .= "document.addEventListener('DOMContentLoaded', function() {";
$html .= "    var agregarCarritoBtns = document.querySelectorAll('.agregar-carrito');";

$html .= "    agregarCarritoBtns.forEach(function(btn) {";
$html .= "        btn.addEventListener('click', function() {";
$html .= "            var juegoID = btn.getAttribute('data-juego-id');";
$html .= "            var precio = btn.getAttribute('data-precio');";
$html .= "            fetch('AgregarAlCarrito.php?juegoID=' + juegoID + '&precio=' + precio + '&usuarioID={$_SESSION['UsuarioID']}')";
$html .= "                .then(response => response.text())";
$html .= "                .then(text => document.getElementById('mensajeModalBody').textContent = text);";
$html .= "        });";
$html .= "    });";
$html .= "});";
$html .= "</script>";

echo $html;

require 'footer.php';

?>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
