<?php
require 'menu.php';
require 'bd.php';

echo "<link rel='stylesheet' href='css/styles.css'>";

// Num de juegos por pagina
$registros_por_pagina = 16;

// Obtener la paggina actual
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
$html .= "<div class='titulo'>";
$html .= "<h1>GamingWorld</h1>";
$html .= "<div id='mensaje'></div>";
$html .= "</div>";
$html .= "<div class='calendario-link'>";
$html .= "<button onclick=\"location.href = 'historico.php'\">Ver Historial</button>";
$html .= "</div>";
$html .= "<div class='contenedor-juegos'>";

foreach ($juegos as $juego) {
    $html .= "<div class='contenedor-juegos-content'>";
    $html .= "<a href='PagJuego.php?juegoID={$juego['juegoID']}' class='enlace-juego'>";
    $html .= "<div class='juego'>";
    $html .= "<div class='contenido'>";

    // Nombre
    $html .= "<h2>{$juego['nombre']}</h2>";

    //Imagen
    $html .= "<img src='ImagenesJuegos/{$juego['imagen']}' alt='{$juego['nombre']}'>";

    // Precio
    $html .= "<p>Precio: {$juego['precio']}</p>";

    // Generos 
    $generos = explode(",", $juego["generos"]);
    $html .= "<p>Géneros: ";
    foreach ($generos as $genero) {
        $query = "SELECT generoID FROM generos WHERE nombre = ?";
        $statement = $bd->prepare($query);
        $statement->execute([$genero]);
        $resultado = $statement->fetch();
        $generoID = isset($resultado['generoID']) ? urlencode($resultado['generoID']) : '';
        $html .= "<a class='generos' href='PagGenero.php?generoID=$generoID' id='$generoID'>$genero</a>, ";
    }
    $html .= "</p>";
    
    $usuarioID = $_SESSION['UsuarioID'];

    $carritoSelect = "SELECT * FROM carrito WHERE usuarioID = :usuarioID";
    $stmt = $bd->prepare($carritoSelect);
    $stmt->bindParam(':usuarioID', $usuarioID);
    $stmt->execute();
    $numFilas = $stmt->rowCount();


    if ($numFilas > 0) {
        $html .= "<a href='#' class='agregar-carrito' data-juego-id='{$juego['juegoID']}' data-precio='{$juego['precio']}'>Agregar al carrito</a>";
        
    } else {
        $html .= "<a href='#' class='asociar-tarjeta'>Asociar una tarjeta para poder comprar</a>";
    }


    $html .= "</div>";
    $html .= "</div>";
    $html .= "</a>";
    $html .= "</div>";
}

$html .= "</div>";

// Paginación botones
$html .= "<div class='paginacion'>";
for ($i = 1; $i <= $total_paginas; $i++) {
    $html .= "<form action='' method='GET' style='display:inline;'>";
    $html .= "<input type='hidden' name='pagina' value='$i'>";
    $html .= "<button type='submit'>$i</button>";
    $html .= "</form>";
}
$html .= "</div>";

$html .= "<script>";
$html .= "document.addEventListener('DOMContentLoaded', function() {";
$html .= "    var agregarCarritoBtns = document.querySelectorAll('.agregar-carrito');";
$html .= "    var asociarTarjetaBtns = document.querySelectorAll('.asociar-tarjeta');";

$html .= "    agregarCarritoBtns.forEach(function(btn) {";
$html .= "        btn.addEventListener('click', function(event) {";
$html .= "            event.preventDefault();"; 
$html .= "            var juegoID = btn.getAttribute('data-juego-id');";
$html .= "            var precio = btn.getAttribute('data-precio');";
$html .= "            fetch('AgregarAlCarrito.php?juegoID=' + juegoID + '&precio=' + precio + '&usuarioID={$_SESSION['UsuarioID']}')";
$html .= "                .then(response => response.text())";
$html .= "                .then(text => document.getElementById('mensaje').textContent = text);";
$html .= "        });";
$html .= "    });";

$html .= "    asociarTarjetaBtns.forEach(function(btn) {";
$html .= "        btn.addEventListener('click', function(event) {";
$html .= "            event.preventDefault();"; // Prevenir el comportamiento predeterminado del enlace
$html .= "            document.getElementById('mensaje').textContent = 'Debes tener una tarjeta asociada a tu perfil para poder comprar productos';";
$html .= "        });";
$html .= "    });";
$html .= "});";
$html .= "</script>";

echo $html;
?>
