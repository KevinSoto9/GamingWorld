<?php
require 'bd.php';

$searchTerm = $_POST['searchTerm'];
if(isset($_POST['generos'])) {
    $generosSeleccionados = $_POST['generos'];
} else {
    $generosSeleccionados = array(); // Caso vacio
}
if(isset($_POST["precio"])){
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

// Si hay generos seleccionados
if (!empty($generosSeleccionados)) {
    $generosFiltro = implode(",", $generosSeleccionados);
    $sel .= " AND juegos_generos.generoID IN ($generosFiltro)";
}

$sel .= " AND juegos.precio <= ".$precioSeleccionado;

$sel .= " GROUP BY juegos.juegoID
        ORDER BY juegos.nombre ASC";

$statement = $bd->query($sel);
$resultados = $statement->fetchAll();

renderizarJuegos($resultados);

function renderizarJuegos($juegos) {
    
    require 'bd.php';
    
    $html = "";
    foreach ($juegos as $juego) {
        $html .= "<div class='contenedor-juegos-content'>";
        $html .= "<a href='PagJuego.php?juegoID={$juego['juegoID']}' class='enlace-juego'>";
        $html .= "<div class='juego'>";
        $html .= "<div class='contenido'>";
        
        // Nombre
        $html .= "<h2>{$juego['nombre']}</h2>";
        
        // Imagen
        $html .= "<img src='ImagenesJuegos/{$juego['imagen']}' alt='{$juego['nombre']}'>";
        
        // Precio
        $html .= "<p>Precio: {$juego['precio']}</p>";
        
        // Géneros
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
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</a>";
        $html .= "</div>";
    }
    $html .= "</div>";

    echo $html;
}
?>
