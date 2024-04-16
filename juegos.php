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
            // Función para cargar los juegos
            function cargarJuegos(searchTerm, generosSeleccionados, precioSeleccionado) {
                $.ajax({
                    url: "buscar_juego.php",
                    method: "POST",
                    data: { searchTerm: searchTerm, generos: generosSeleccionados, precio: precioSeleccionado }, // Pasar el precio seleccionado
                    success: function(response) {
                        $(".contenedor-juegos").html(response);
                    }
                });
            }
            
            // Por defecto oculto
            $("#filtroGenero, #filtroPrecio").hide();

            // Función para obtener los generos seleccionados
            function obtenerSeleccion(nombreClase) {
                var seleccion = [];
                $(nombreClase + ":checked").each(function() {
                    seleccion.push($(this).val());
                });
                return seleccion;
            }

            // Cargar todos los juegos al cargar la pagina
            cargarJuegos("", obtenerSeleccion(".filtro-genero"), $("#precios").val());

            // Escuchar cambios en el buscador
            $("#buscar-juego").on("input", function() {
                var searchTerm = $(this).val();
                var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                cargarJuegos(searchTerm, generosSeleccionados, $("#precios").val()); // Pasar el precio seleccionado
            });

            // Escuchar cambios en los géneros seleccionados
            $(".filtro-genero").change(function() {
                var searchTerm = $("#buscar-juego").val();
                var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                cargarJuegos(searchTerm, generosSeleccionados, $("#precios").val()); // Pasar el precio seleccionado
            });

            // Escuchar cambios en el rango de precios
            $("#precios").on("input", function() {
                var precioSeleccionado = $(this).val();
                $("#precioSeleccionado").text(precioSeleccionado);
                var searchTerm = $("#buscar-juego").val();
                var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                cargarJuegos(searchTerm, generosSeleccionados, precioSeleccionado); // Pasar el precio seleccionado
            });

            // Mostrar/ocultar el filtro de generos
            $("#toggleGenero").click(function() {
                $("#filtroGenero").slideToggle();
            });

            // Mostrar/ocultar el filtro de precios
            $("#togglePrecio").click(function() {
                $("#filtroPrecio").slideToggle();
            });
        });
    </script>

</body>
</html>
