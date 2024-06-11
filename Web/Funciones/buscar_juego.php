<?php
// Iniciar la sesión
session_start();

// Incluir el archivo de conexión a la base de datos
require '../bd.php';

// Obtener el término de búsqueda enviado por el formulario
$searchTerm = $_POST['searchTerm'];

// Verificar si se han seleccionado géneros
if (isset($_POST['generos'])) {
    $generosSeleccionados = $_POST['generos'];
} else {
    $generosSeleccionados = array(); // Caso vacío
}

// Verificar si se ha especificado un precio
if (isset($_POST["precio"])) {
    $precioSeleccionado = $_POST["precio"];
} else {
    // Si no se especifica un precio, obtener el precio máximo de los juegos
    $maxPrecioQuery = "SELECT MAX(precio) AS max_precio FROM juegos";
    $maxPrecioStatement = $bd->query($maxPrecioQuery);
    $maxPrecioRow = $maxPrecioStatement->fetch();
    $precioSeleccionado = $maxPrecioRow['max_precio'];
}

// Consulta SQL base
$sel = "SELECT
            juegos.juegoID,
            juegos.nombre,
            juegos.descripcion,
            juegos.fecha_salida,
            juegos.precio,
            GROUP_CONCAT(generos.nombre) AS generos
        FROM juegos
        INNER JOIN juegos_generos ON juegos_generos.juegoID = juegos.juegoID
        INNER JOIN generos ON generos.generoID = juegos_generos.generoID
        WHERE juegos.nombre LIKE '%$searchTerm%'";

// Si hay géneros seleccionados, agregar filtro por género
if (!empty($generosSeleccionados)) {
    $generosFiltro = implode(",", $generosSeleccionados);
    $sel .= " AND juegos_generos.generoID IN ($generosFiltro)";
}

// Agregar filtro por precio
$sel .= " AND juegos.precio <= " . $precioSeleccionado;

// Agrupar resultados por ID de juego y ordenar alfabéticamente por nombre
$sel .= " GROUP BY juegos.juegoID
        ORDER BY juegos.nombre ASC";

// Ejecutar la consulta SQL
$statement = $bd->query($sel);
$resultados = $statement->fetchAll();

// Llamar a la función para renderizar los juegos
renderizarJuegos($resultados);

// Función para renderizar los juegos
function renderizarJuegos($juegos)
{
    // Incluir el archivo de conexión a la base de datos
    require '../bd.php';

    // Crear el HTML para mostrar los juegos
    $html = "<div class='container-fluid mv-80'>"; // Cambiamos a container-fluid para que ocupe todo el ancho disponible
    $html .= "<div class='row'>"; // Creamos una fila de Bootstrap

    // Iterar sobre cada juego y crear su tarjeta correspondiente
    foreach ($juegos as $juego) {
        $html .= "<div class='col-md-3 mb-4'>"; // Dividimos en columnas de Bootstrap
        $html .= "<div class='bg-dark card h-100'>"; // Clase h-100 para que todas las cartas tengan la misma altura
        $html .= "<a href='../PaginasIndividuales/PagJuego.php?juegoID={$juego['juegoID']}' class='text-white enlace-juego'>";
        $html .= "<img class='card-img-top text-white' src='../../Imagenes/ImagenesJuegos/{$juego['nombre']}.jpg' alt='{$juego['nombre']}'>";
        $html .= "<div class='card-body'>";
        $html .= "<h5 class='card-title text-white'>{$juego['nombre']}</h5>";
        $html .= "<p class='card-text text-white'>Precio: {$juego['precio']}</p>";
        $html .= "<p class='card-text text-white'>Géneros: ";
        $generos = explode(",", $juego["generos"]);
        
        // Obtener el ID de género para cada género del juego
        foreach ($generos as $index => $genero) {
            $query = "SELECT generoID FROM generos WHERE nombre = ?";
            $statement = $bd->prepare($query);
            $statement->execute([$genero]);
            $resultado = $statement->fetch();
            $generoID = isset($resultado['generoID']) ? urlencode($resultado['generoID']) : '';
            $html .= "<a class='generos text-white' href='PagGenero.php?generoID=$generoID' id='$generoID'>$genero</a>";
            if ($index < count($generos) - 1) {
                $html .= ", ";
            }
        }

        $html .= "</p>";
        $html .= "</div>";
        $html .= "</a>";
        $html .= "</div>";
        $html .= "</div>";
    }

    $html .= "</div>"; // Cerramos la fila de Bootstrap
    $html .= "</div>"; // Cerramos el contenedor de Bootstrap

    // Mostrar el HTML generado
    echo $html;
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
