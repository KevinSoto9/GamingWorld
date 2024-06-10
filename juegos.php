<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <!-- Enlace a los archivos CSS -->
        <link rel='stylesheet' href='assets/cssPlus/cssPlus.css'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Cargar Bootstrap CSS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <?php
        // Incluye el menú 
        require 'menu.php';
        ?>
    </head>
    <body>
        <div class="container-fluid mv-80">
            <div class="text-center mb-5">
                <h1 class="text-center mt-5 text-white mb-5">Juegos</h1>
            </div>

            <div class="container">
                <!-- Botones para ver juegos por diferentes categorías -->
                <div class="row mb-4 justify-content-center">
                    <div class="col-md-4 text-center mb-4">
                        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href = 'categorias.php';">Ver Juegos por Géneros</button>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href = 'desarrolladores.php';">Ver Juegos por Desarrolladores</button>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href = 'editores.php';">Ver Juegos por Editores</button>
                    </div>
                </div>

                <!-- Buscador de juegos -->
                <div class="buscador mb-4 mt-5 text-center">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" name="searchTerm" id="buscar-juego" placeholder="Buscar por nombre...">
                    </div>
                </div>

                <?php
                // Código HTML para el modal de mensaje
                $html = "";

                $html .= "<div class='modal fade text-dark' id='mensajeModal' tabindex='-1' role='dialog' aria-labelledby='mensajeModalLabel' aria-hidden='true'>";
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

                echo $html;
                ?>

                <!-- Filtros de juegos -->
                <div class="row justify-content-center mb-5">
                    <!-- Columna de Géneros -->
                    <div class="col-md-6 mt-5 text-center">
                        <button id="toggleGenero" class="btn btn-info mb-4">Mostrar/Ocultar Géneros</button>
                        <div class="filtros" id="filtroGenero" style="display:none;">
                            <h3 class="mb-4">Filtrar por Géneros:</h3>
                            <div class="generos-container d-flex flex-wrap mb-4">
                                <?php
                                // Conectar a la base de datos y obtener los géneros
                                require 'bd.php';

                                $sql_generos = "SELECT * FROM generos ORDER BY nombre ASC";
                                $statement_generos = $bd->query($sql_generos);
                                $generos = $statement_generos->fetchAll();

                                foreach ($generos as $genero) :
                                ?>
                                    <div class="col-6 col-md-4 col-lg-4 d-flex align-items-center">
                                        <div class="form-check w-100">
                                            <input class="form-check-input filtro-genero" type="checkbox" value="<?= $genero['generoID'] ?>" id="genero<?= $genero['generoID'] ?>">
                                            <label class="form-check-label w-100 text-left" for="genero<?= $genero['generoID'] ?>">
                                                <?= $genero['nombre'] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>  
                    </div>

                    <!-- Columna de Precios -->
                    <div class="col-md-6 mt-5 text-center">
                        <button id="togglePrecio" class="btn btn-info mb-4">Mostrar/Ocultar Precio</button>
                        <div class="filtros" id="filtroPrecio">
                            <h3 class="mb-4">Filtrar por Precio:</h3>
                            <div class="d-flex justify-content-center align-items-center flex-column mb-4">
                                <?php
                                // Obtener los precios mínimo y máximo de los juegos
                                $sql_precios = "SELECT MAX(precio) AS precio_maximo, MIN(precio) AS precio_minimo FROM juegos;";
                                $statementPrecios = $bd->prepare($sql_precios);
                                $statementPrecios->execute();
                                $precios = $statementPrecios->fetch(PDO::FETCH_ASSOC);
                                $valor_defecto = $precios['precio_maximo'];
                                ?>
                                <div class="w-100 mb-3">
                                    <span><?php echo $precios['precio_minimo']; ?></span>
                                    <input type="range" class="form-range" id="precios" name="precio" min="<?php echo $precios['precio_minimo']; ?>" max="<?php echo $precios['precio_maximo']; ?>" step="1" value="<?php echo $valor_defecto; ?>">
                                    <span><?php echo $precios['precio_maximo']; ?></span>
                                </div>
                                <p>Precio seleccionado: <span id="precioSeleccionado"><?php echo $valor_defecto; ?></span></p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

            <!-- Contenedor para los juegos -->
            <div class="row contenedor-juegos container-xxl mt-5">
                <!-- Listado inicial de juegos se cargará aquí -->
            </div>
        </div>
        
        <?php
        // Incluir el pie de página
        require 'footer.php';
        ?>

        <!-- Script AJAX para buscar juegos -->
        <script>
            $(document).ready(function () {
                // Función para cargar juegos con filtros aplicados
                function cargarJuegos(searchTerm, generosSeleccionados, precioSeleccionado) {
                    $.ajax({
                        url: "buscar_juego.php",
                        method: "POST",
                        data: {searchTerm: searchTerm, generos: generosSeleccionados, precio: precioSeleccionado},
                        success: function (response) {
                            $(".contenedor-juegos").html(response);
                        }
                    });
                }

                // Función para obtener los géneros seleccionados
                function obtenerSeleccion(nombreClase) {
                    var seleccion = [];
                    $(nombreClase + ":checked").each(function () {
                        seleccion.push($(this).val());
                    });
                    return seleccion;
                }

                // Inicialmente ocultar los filtros
                $("#filtroGenero").hide();
                $("#filtroPrecio").hide();

                // Cargar juegos inicialmente sin filtros
                cargarJuegos("", obtenerSeleccion(".filtro-genero"), $("#precios").val());

                // Filtrar juegos mientras se escribe en el buscador
                $("#buscar-juego").on("input", function () {
                    var searchTerm = $(this).val();
                    var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                    cargarJuegos(searchTerm, generosSeleccionados, $("#precios").val());
                });

                // Filtrar juegos cuando se seleccionan géneros
                $(".filtro-genero").change(function () {
                    var searchTerm = $("#buscar-juego").val();
                    var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                    cargarJuegos(searchTerm, generosSeleccionados, $("#precios").val());
                });

                // Filtrar juegos cuando se cambia el precio
                $("#precios").on("input", function () {
                    var precioSeleccionado = $(this).val();
                    $("#precioSeleccionado").text(precioSeleccionado);
                    var searchTerm = $("#buscar-juego").val();
                    var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                    cargarJuegos(searchTerm, generosSeleccionados, precioSeleccionado);
                });

                // Mostrar/ocultar filtro de géneros
                $("#toggleGenero").click(function () {
                    $("#filtroGenero").slideToggle();
                });

                // Mostrar/ocultar filtro de precios
                $("#togglePrecio").click(function () {
                    $("#filtroPrecio").slideToggle();
                });
            });
        </script>
        <!-- Cargar Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
