<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel='stylesheet' href='css/styles.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
        require 'menu.php';
    ?>
</head>
<body>
    
    <div class="titulo">
        <h1>Juegos</h1>
        
        <div id="mensaje"></div>
        
    </div>
    
    <div class="container">
        <div class="buscador">
            <div id="form-buscar">
                <input type="search" name="searchTerm" id="buscar-juego" placeholder="Buscar por nombre...">
            </div>
        </div>

        <!-- Mostrar/ocultar el filtro de generos -->
        <button id="toggleGenero">Mostrar/Ocultar Géneros</button>

        <!-- Filtro de generos -->
        <div class="filtros" id="filtroGenero">
            <h3>Filtrar por Géneros:</h3>
            <div class="generos-container">
                <?php
                    require 'bd.php'; 

                    $sql_generos = "SELECT * FROM generos ORDER BY nombre ASC";
                    $statement_generos = $bd->query($sql_generos);
                    $generos = $statement_generos->fetchAll();

                    // Generos
                    foreach ($generos as $genero) :
                ?>
                    <label><input type="checkbox" class="filtro-genero" value="<?= $genero['generoID'] ?>"> <?= $genero['nombre'] ?></label>
                <?php endforeach; ?>
            </div>
        </div>  
        
        <!-- Mostrar/ocultar el filtro de precios -->
        <button id="togglePrecio">Mostrar/Ocultar Precio</button>
        
        <!-- Filtro de rango de precios -->
        <div class="filtros" id="filtroPrecio">
            <h3>Filtrar por Precio:</h3>
            <div class="filtros-container">
                <?php
                    require 'bd.php';

                    $sql_precios = "SELECT MAX(precio) AS precio_maximo, MIN(precio) AS precio_minimo FROM juegos;";
                    $statementPrecios = $bd->prepare($sql_precios);
                    $statementPrecios->execute();
                    $precios = $statementPrecios->fetch(PDO::FETCH_ASSOC); // Obtener resultados de la consulta
                    // Valor por defecto
                    $valor_defecto = $precios['precio_maximo'];

                    // Imprimir el rango de precios
                ?>
                <span><?php echo $precios['precio_minimo']; ?></span>
                <input type="range" id="precios" name="precio" min="<?php echo $precios['precio_minimo']; ?>" max="<?php echo $precios['precio_maximo']; ?>" step="1" value="<?php echo $valor_defecto; ?>">
                <span><?php echo $precios['precio_maximo']; ?></span>
            </div>
            <p>Precio seleccionado: <span id="precioSeleccionado"><?php echo $valor_defecto; ?></span></p>
        </div>
        </div>
    </div>
    
    <div>
        <!-- Listado inicial de juegos -->
        <div class='contenedor-juegos'>

        </div>
    </div>

    <!-- Script AJAX para buscar juegos -->
    <script>
$(document).ready(function() {
    // Function to load games
    function cargarJuegos(searchTerm, generosSeleccionados, precioSeleccionado) {
        $.ajax({
            url: "buscar_juego.php",
            method: "POST",
            data: { searchTerm: searchTerm, generos: generosSeleccionados, precio: precioSeleccionado },
            success: function(response) {
                $(".contenedor-juegos").html(response);
                // Attach event listeners after loading games
                attachEventListeners();
            }
        });
    }

    // Function to get selected genres
    function obtenerSeleccion(nombreClase) {
        var seleccion = [];
        $(nombreClase + ":checked").each(function() {
            seleccion.push($(this).val());
        });
        return seleccion;
    }

    // Load all games on page load
    cargarJuegos("", obtenerSeleccion(".filtro-genero"), $("#precios").val());

    // Listen for changes in the search input
    $("#buscar-juego").on("input", function() {
        var searchTerm = $(this).val();
        var generosSeleccionados = obtenerSeleccion(".filtro-genero");
        cargarJuegos(searchTerm, generosSeleccionados, $("#precios").val());
    });

    // Listen for changes in the genre filters
    $(".filtro-genero").change(function() {
        var searchTerm = $("#buscar-juego").val();
        var generosSeleccionados = obtenerSeleccion(".filtro-genero");
        cargarJuegos(searchTerm, generosSeleccionados, $("#precios").val());
    });

    // Listen for changes in the price range
    $("#precios").on("input", function() {
        var precioSeleccionado = $(this).val();
        $("#precioSeleccionado").text(precioSeleccionado);
        var searchTerm = $("#buscar-juego").val();
        var generosSeleccionados = obtenerSeleccion(".filtro-genero");
        cargarJuegos(searchTerm, generosSeleccionados, precioSeleccionado);
    });

    // Show/hide genre filter
    $("#toggleGenero").click(function() {
        $("#filtroGenero").slideToggle();
    });

    // Show/hide price filter
    $("#togglePrecio").click(function() {
        $("#filtroPrecio").slideToggle();
    });

    // Attach event listeners to the dynamically loaded buttons
     function attachEventListeners() {
        // Remove existing event listeners first to prevent duplication
        $('.contenedor-juegos').off('click', '.agregar-carrito');
        $('.contenedor-juegos').off('click', '.asociar-tarjeta');

        // Add new event listeners
        $('.contenedor-juegos').on('click', '.agregar-carrito', function(event) {
            event.preventDefault();
            var juegoID = $(this).data('juego-id');
            var precio = $(this).data('precio');
            var usuarioID = '<?php echo $_SESSION['UsuarioID']; ?>';
            fetch('AgregarAlCarrito.php?juegoID=' + juegoID + '&precio=' + precio + '&usuarioID=' + usuarioID)
                .then(response => response.text())
                .then(text => $('#mensaje').text(text));
        });

        $('.contenedor-juegos').on('click', '.asociar-tarjeta', function(event) {
            event.preventDefault();
            $('#mensaje').text('Debes tener una tarjeta asociada a tu perfil para poder comprar productos');
        });
    }

    // Initially attach event listeners
    attachEventListeners();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
