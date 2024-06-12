<?php

// Iniciar sesión
session_start();

$html = "";

// Comprobar si el usuario no ha iniciado sesión
if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioID'] === null) {
    // Requerir archivo para usuario no logueado
    require $_SERVER['DOCUMENT_ROOT'] .'/Web/PaginasAdicionales/NoInicioSesion.php';
} else {
    // Requerir archivos necesarios
    require $_SERVER['DOCUMENT_ROOT'] .'/Web/Menus/menu.php';
    require '../bd.php';

    // Agregar estilos CSS
    echo "<link rel='stylesheet' href='/assets/cssPlus/cssPlus.css'>";
    echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";

    // Número de juegos por página
    $registros_por_pagina = 16;

    // Obtener la página actual
    $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

    // Offset por donde empezar a coger datos
    $offset = ($pagina_actual - 1) * $registros_por_pagina;

    // Número total de juegos
    $total_registros_query = "SELECT COUNT(*) AS total FROM juegos";
    $total_registros_result = $bd->query($total_registros_query);
    $total_registros = $total_registros_result->fetch()['total'];

    $total_paginas = ceil($total_registros / $registros_por_pagina);

    // Consulta SQL (para que coja 16 por cada página)
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
        GROUP BY juegos.juegoID
        ORDER BY juegos.fecha_salida DESC
        LIMIT $registros_por_pagina OFFSET $offset";

    $juegos = $bd->query($sel);

    // Inicio de estructura HTML
    $html .= "<div class='container-fluid mv-80'>"; // Cambiamos a container-fluid para que ocupe todo el ancho disponible
    $html .= "<h1 class='text-center mt-5 text-white mb-5'>GamingWorld</h1>";

    // Botón del historial
    $html .= "<div class='mb-5 container d-flex justify-content-center align-items-center'>";
    $html .= "<button class='btn btn-secondary' onclick=\"window.location.href='" . $_SERVER['DOCUMENT_ROOT'] . "/Web/PaginasIndividuales/historico.php'\">Ver Juegos por año</button>";
    $html .= "</div>";

    // Modal para mensaje
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

    // Div para mensaje
    $html .= "<div id='mensaje'></div>";

    // Div para juegos
    $html .= "<div class='row'>";

    // Iterar sobre los juegos
    foreach ($juegos as $juego) {
        $html .= "<div class='col-md-3 mb-4'>";
        $html .= "<div class='bg-dark card h-100'>";
        $html .= "<a href='" . $_SERVER['DOCUMENT_ROOT'] . "/Web/PaginasIndividuales/PagJuego.php?juegoID={$juego['juegoID']}' class='text-white enlace-juego'>";
        $html .= "<img class='card-img-top text-white' src='/Imagenes/ImagenesJuegos/{$juego['nombre']}.jpg' alt='{$juego['nombre']}'>";
        $html .= "<div class='card-body d-flex flex-column'>";
        $html .= "<h5 class='card-title text-white'>{$juego['nombre']}</h5>";
        $html .= "<p class='card-text text-white'>Precio: {$juego['precio']}</p>";
        $html .= "<p class='card-text text-white'>Géneros: ";

        // Generar HTML de géneros
        $generosHtml = "";
        $generos = explode(",", $juego["generos"]);
        foreach ($generos as $genero) {
            $query = "SELECT generoID FROM generos WHERE nombre = ?";
            $statement = $bd->prepare($query);
            $statement->execute([$genero]);
            $resultado = $statement->fetch();
            $generoID = isset($resultado['generoID']) ? urlencode($resultado['generoID']) : '';
            $generosHtml .= "<a class='generos text-white' href='" . $_SERVER['DOCUMENT_ROOT'] . "/Web/PaginasIndividuales/PagGenero.php?generoID=$generoID' id='$generoID'>$genero</a>, ";
        }

        $html .= rtrim($generosHtml, ", ");

        $html .= "</p>";
        // Botón de agregar al carrito con modal
        $html .= "<button class='btn btn-primary mt-auto agregar-carrito' data-toggle='modal' data-target='#mensajeModal' data-juego-id='{$juego['juegoID']}' data-precio='{$juego['precio']}'>Agregar al carrito</button>";
        $html .= "</div>";
        $html .= "</a>";
        $html .= "</div>";
        $html .= "</div>";
    }

    // Cierre de la estructura HTML
    $html .= "</div>";
    $html .= "</div>";

    // Paginación botones
    $html .= "<div class='container'>";
    $html .= "<ul class='pagination justify-content-center'>";
    for ($i = 1; $i <= $total_paginas; $i++) {
        $html .= "<li class='page-item bg-dark'><a class='page-link bg-dark text-white' href='?pagina=$i'>$i</a></li>";
    }
    $html .= "</ul>";
    $html .= "</div>";

    // Script para agregar al carrito
    $html .= "<script>";
    $html .= "document.addEventListener('DOMContentLoaded', function() {";
    $html .= "    var agregarCarritoBtns = document.querySelectorAll('.agregar-carrito');";

    $html .= "    agregarCarritoBtns.forEach(function(btn) {";
    $html .= "        btn.addEventListener('click', function() {";
    $html .= "            var juegoID = btn.getAttribute('data-juego-id');";
    $html .= "            var precio = btn.getAttribute('data-precio');";
    $html .= "            fetch('" . $_SERVER['DOCUMENT_ROOT'] . "/Web/Funciones/AgregarAlCarrito.php?juegoID=' + juegoID + '&precio=' + precio + '&usuarioID={$_SESSION['UsuarioID']}')";
    $html .= "                .then(response => response.text())";
    $html .= "                .then(text => document.getElementById('mensajeModalBody').textContent = text);";
    $html .= "        });";
    $html .= "    });";
    $html .= "});";
    $html .= "</script>";
    
    echo $html;

    require $_SERVER['DOCUMENT_ROOT'] . '/Web/Funciones/footer.php';
    ?>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php

}
?>