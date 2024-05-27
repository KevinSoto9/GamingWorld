<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel='stylesheet' href='assets/cssPlus/cssPlus.css'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <?php
        require 'menu.php';
        ?>
    </head>
    <body>
        <div class="container-fluid mv-80">
            <div class="text-center mb-5">
                <h1 class="display-4 mt-5 mb-5">Juegos</h1>
            </div>

            <div class="container ">
                
                <div class="row mb-4">
                    <div class="col-md-4 text-center mb-4">
                        <button type="button" class="btn btn-primary" onclick="window.location.href = 'categorias.php';">Ver Juegos por Géneros</button>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <button type="button" class="btn btn-primary" onclick="window.location.href = 'desarrolladores.php';">Ver Juegos por Desarrolladores</button>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <button type="button" class="btn btn-primary" onclick="window.location.href = 'editores.php';">Ver Juegos por Editores</button>
                    </div>
                </div>

                
                <div class="buscador mb-4 mt-5 text-center">
                    <div id="form-buscar" class="input-group">
                        <input type="search" class="form-control" name="searchTerm" id="buscar-juego" placeholder="Buscar por nombre...">
                    </div>
                </div>

                <?php
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

                <div class="row justify-content-center mb-5">
                    <!-- Columna de Géneros -->
                    <div class="col-md-6 mt-5 text-center">
                        <button id="toggleGenero" class="btn btn-info mb-2">Mostrar/Ocultar Géneros</button>
                        <div class="filtros" id="filtroGenero">
                            <h3>Filtrar por Géneros:</h3>
                            <div class="generos-container">
                                <?php
                                require 'bd.php';

                                $sql_generos = "SELECT * FROM generos ORDER BY nombre ASC";
                                $statement_generos = $bd->query($sql_generos);
                                $generos = $statement_generos->fetchAll();

                                foreach ($generos as $genero) :
                                    ?>
                                    <label><input type="checkbox" class="filtro-genero" value="<?= $genero['generoID'] ?>"> <?= $genero['nombre'] ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>  
                    </div>

                    <!-- Columna de Precios -->
                    <div class="col-md-6 mt-5 text-center">
                        <button id="togglePrecio" class="btn btn-info mb-2">Mostrar/Ocultar Precio</button>
                        <div class="filtros" id="filtroPrecio">
                            <h3>Filtrar por Precio:</h3>
                            <div class="filtros-container">
                                <?php
                                require 'bd.php';

                                $sql_precios = "SELECT MAX(precio) AS precio_maximo, MIN(precio) AS precio_minimo FROM juegos;";
                                $statementPrecios = $bd->prepare($sql_precios);
                                $statementPrecios->execute();
                                $precios = $statementPrecios->fetch(PDO::FETCH_ASSOC);
                                $valor_defecto = $precios['precio_maximo'];
                                ?>
                                <span><?php echo $precios['precio_minimo']; ?></span>
                                <input type="range" class="form-range" id="precios" name="precio" min="<?php echo $precios['precio_minimo']; ?>" max="<?php echo $precios['precio_maximo']; ?>" step="1" value="<?php echo $valor_defecto; ?>">
                                <span><?php echo $precios['precio_maximo']; ?></span>
                            </div>
                            <p>Precio seleccionado: <span id="precioSeleccionado"><?php echo $valor_defecto; ?></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row contenedor-juegos container-xxl mt-5">
                <!-- Listado inicial de juegos se cargará aquí -->
            </div>
        </div>

        <!-- Script AJAX para buscar juegos -->
        <script>
            $(document).ready(function () {
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

                function obtenerSeleccion(nombreClase) {
                    var seleccion = [];
                    $(nombreClase + ":checked").each(function () {
                        seleccion.push($(this).val());
                    });
                    return seleccion;
                }

                $("#filtroGenero").hide();
                $("#filtroPrecio").hide();

                cargarJuegos("", obtenerSeleccion(".filtro-genero"), $("#precios").val());

                $("#buscar-juego").on("input", function () {
                    var searchTerm = $(this).val();
                    var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                    cargarJuegos(searchTerm, generosSeleccionados, $("#precios").val());
                });

                $(".filtro-genero").change(function () {
                    var searchTerm = $("#buscar-juego").val();
                    var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                    cargarJuegos(searchTerm, generosSeleccionados, $("#precios").val());
                });

                $("#precios").on("input", function () {
                    var precioSeleccionado = $(this).val();
                    $("#precioSeleccionado").text(precioSeleccionado);
                    var searchTerm = $("#buscar-juego").val();
                    var generosSeleccionados = obtenerSeleccion(".filtro-genero");
                    cargarJuegos(searchTerm, generosSeleccionados, precioSeleccionado);
                });

                $("#toggleGenero").click(function () {
                    $("#filtroGenero").slideToggle();
                });

                $("#togglePrecio").click(function () {
                    $("#filtroPrecio").slideToggle();
                });

            });

        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
