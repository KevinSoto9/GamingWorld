<?php
// Incluye el menú y la base de datos
require '../Menus/menuIndividual.php';
require '../bd.php';

// Enlace a la hoja de estilo de Bootstrap
echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";

// Inicio del contenedor principal
$html = "<div class='container-fluid mv-80'>";
$html .= "<div class='text-center text-white mb-4 mt-4'>";
$html .= "<h1>Historial de Videojuegos</h1>";
$html .= "</div>";

// Obtener la década seleccionada del parámetro GET, por defecto 2020
$decada_seleccionada = isset($_GET['decada']) ? intval($_GET['decada']) : 2020;

// Calcular el inicio y fin de la década
$decada_inicio = $decada_seleccionada;
$decada_fin = $decada_seleccionada + 9;
if ($decada_inicio == 2020) {
    $decada_fin = 2024; // Ajustar fin de la década si es 2020
}

// Consulta SQL para obtener los juegos de la década seleccionada
$sel = "SELECT
            juegos.juegoID,
            juegos.nombre,
            juegos.descripcion,
            juegos.fecha_salida,
            juegos.precio
        FROM juegos
        WHERE YEAR(juegos.fecha_salida) BETWEEN $decada_inicio AND $decada_fin
        ORDER BY juegos.fecha_salida DESC";

// Ejecutar la consulta
$juegos = $bd->query($sel);

// Botones para seleccionar la década
$html .= "<div class='mb-4 text-center text-white'>";
$html .= "<div class='btn-group' role='group mx-auto'>";

$html .= "<form action='' class='mr-2' method='GET' style='display:inline;'>";
$html .= "<input type='hidden' name='decada' value='2020'>";
$html .= "<button type='submit' class='btn btn-primary'>2024-2020</button>";
$html .= "</form>";

$html .= "<form action='' class='mr-1' method='GET' style='display:inline;'>";
$html .= "<input type='hidden' name='decada' value='2010'>";
$html .= "<button type='submit' class='btn btn-primary'>2019-2010</button>";
$html .= "</form>";

$html .= "<form action='' class='ml-1' method='GET' style='display:inline;'>";
$html .= "<input type='hidden' name='decada' value='2000'>";
$html .= "<button type='submit' class='btn btn-primary'>2009-2000</button>";
$html .= "</form>";

$html .= "<form action='' class='ml-2' method='GET' style='display:inline;'>";
$html .= "<input type='hidden' name='decada' value='1990'>";
$html .= "<button type='submit' class='btn btn-primary'>1999-1990</button>";
$html .= "</form>";

$html .= "</div>";
$html .= "</div>";

// Título de la sección
$html .= "<div>";
$html .= "<h2 class='text-center mt-2 text-white'>$decada_fin - $decada_inicio</h2>";

// Agrupar juegos por año de salida
$juegos_por_anio = [];
foreach ($juegos as $juego) {
    $anio = date('Y', strtotime($juego['fecha_salida']));
    $juegos_por_anio[$anio][] = $juego;
}

// Mostrar juegos agrupados por año
foreach ($juegos_por_anio as $anio => $juegos) {
    $html .= "<div class='container-fluid mv-80 mb-3'>";
    $html .= "<h3 class='text-center text-white mt-2 mb-5'>$anio</h3>";

    $html .= "<div class='row'>";
    foreach ($juegos as $juego) {
        $html .= "<div class='col-md-3 mb-4'>";
        $html .= "<div class='card h-100 bg-dark text-white'>";
        $html .= "<a href='PagJuego.php?juegoID={$juego['juegoID']}' class='text-decoration-none text-white'>";
        $html .= "<img src='../../Imagenes/ImagenesJuegos/{$juego['nombre']}.jpg' class='card-img-top' alt='{$juego['nombre']}'>";
        $html .= "<div class='card-body'>";
        $html .= "<h5 class='card-title'>{$juego['nombre']}</h5>";
        $html .= "</div>";
        $html .= "</a>";
        $html .= "</div>";
        $html .= "</div>";
    }
    $html .= "</div>";

    $html .= "</div>";
}

$html .= "</div>";
$html .= "</div>";

// Imprimir el HTML generado
echo $html;

require 'footer.php';
?>
