<?php
require 'menu.php';
require 'bd.php';

echo "<link rel='stylesheet' href='css/styles.css'>";

$html = "<div class='titulo'>";
$html .= "<h1>Historial de Videojuegos</h1>";
$html .= "</div>";

$decada_seleccionada = isset($_GET['decada']) ? intval($_GET['decada']) : 2020;

$decada_inicio = $decada_seleccionada;
$decada_fin = $decada_seleccionada + 9;
if ($decada_inicio == 2020) {
    $decada_fin = 2024;
}

$sel = "SELECT
            juegos.juegoID,
            juegos.nombre,
            juegos.imagen,
            juegos.descripcion,
            juegos.fecha_salida,
            juegos.precio
        FROM juegos
        WHERE YEAR(juegos.fecha_salida) BETWEEN $decada_inicio AND $decada_fin
        ORDER BY juegos.fecha_salida DESC";

$juegos = $bd->query($sel);

$html .= "<div class='decadas-nav'>";
$html .= "<form action='' method='GET' style='display:inline;'>";
$html .= "<input type='hidden' name='decada' value='2020'>";
$html .= "<button type='submit'>2024-2020</button>";
$html .= "</form>";

$html .= "<form action='' method='GET' style='display:inline;'>";
$html .= "<input type='hidden' name='decada' value='2010'>";
$html .= "<button type='submit'>2019-2010</button>";
$html .= "</form>";

$html .= "<form action='' method='GET' style='display:inline;'>";
$html .= "<input type='hidden' name='decada' value='2000'>";
$html .= "<button type='submit'>2009-2000</button>";
$html .= "</form>";

$html .= "<form action='' method='GET' style='display:inline;'>";
$html .= "<input type='hidden' name='decada' value='1990'>";
$html .= "<button type='submit'>1999-1990</button>";
$html .= "</form>";

$html .= "</div>";

$html .= "<div class='decada'>";
$html .= "<h2>$decada_fin - $decada_inicio</h2>";

$juegos_por_anio = [];
foreach ($juegos as $juego) {
    $anio = date('Y', strtotime($juego['fecha_salida']));
    $juegos_por_anio[$anio][] = $juego;
}

foreach ($juegos_por_anio as $anio => $juegos) {
    $html .= "<div class='anio'>";
    $html .= "<h3>$anio</h3>";

    $html .= "<div class='contenedor-juegos'>";
    foreach ($juegos as $juego) {
        $html .= "<div class='contenedor-juegos-content'>";
        $html .= "<a href='PagJuego.php?juegoID={$juego['juegoID']}' class='enlace-juego'>";
        $html .= "<div class='juego'>";
        $html .= "<div class='contenido'>";
        $html .= "<h3>{$juego['nombre']}</h3>";
        $html .= "<img src='ImagenesJuegos/{$juego['imagen']}' alt='{$juego['nombre']}'>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</a>";
        $html .= "</div>";
    }
    $html .= "</div>";

    $html .= "</div>";
}

$html .= "</div>";

echo $html;
?>
