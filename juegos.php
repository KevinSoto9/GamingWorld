<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel='stylesheet' href='css/main.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
        require 'menu.php';
    ?>
</head>
<body>
    <div class="container">
        <div class="buscador">
            <h3>Buscar juegos:</h3>
            <form id="form-buscar" action="buscar_juego.php" method="POST">
                <input type="text" name="searchTerm" id="buscar-juego" placeholder="Buscar por nombre...">
            </form>
        </div>

        <!-- Mostrar/ocultar el filtro de generos -->
        <button id="toggleGenero">Mostrar/Ocultar Género</button>

        <!-- Filtro de generos -->
        <div class="filtros" id="filtroGenero">
            <h3>Filtrar por Género:</h3>
            <div class="generos-container">
                <?php
                    require 'bd.php'; 

                    $sql_generos = "SELECT * FROM generos";
                    $statement_generos = $bd->query($sql_generos);
                    $generos = $statement_generos->fetchAll();

                    // Generos
                    foreach ($generos as $genero) :
                ?>
                    <label><input type="checkbox" class="filtro-genero" value="<?= $genero['generoID'] ?>"> <?= $genero['nombre'] ?></label>
                <?php endforeach; ?>
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
            function cargarJuegos(searchTerm, generosSeleccionados) {
                $.ajax({
                    url: "buscar_juego.php",
                    method: "POST",
                    data: { searchTerm: searchTerm, generos: generosSeleccionados },
                    success: function(response) {
                        $(".contenedor-juegos").html(response);
                    }
                });
            }

            // Función para obtener los generos seleccionados
            function obtenerSeleccion(nombreClase) {
                var seleccion = [];
                $(nombreClase + ":checked").each(function() {
                    seleccion.push($(this).val());
                });
                return seleccion;
            }

            // Cargar todos los juegos al cargar la pagina
            cargarJuegos("", obtenerSeleccion(".filtro-genero"));

            // Escuchar cambios en el buscador
            $("#buscar-juego").on("input", function() {
                var searchTerm = $(this).val();
                var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                cargarJuegos(searchTerm, generosSeleccionados);
            });

            // Escuchar cambios en los géneros seleccionados
            $(".filtro-genero").change(function() {
                var searchTerm = $("#buscar-juego").val();
                var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                cargarJuegos(searchTerm, generosSeleccionados);
            });

            // Mostrar/ocultar el filtro de generos
            $("#toggleGenero").click(function() {
                $("#filtroGenero").slideToggle();
            });
        });
    </script>

</body>
</html>
