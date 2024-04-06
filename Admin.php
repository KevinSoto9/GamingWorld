<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div>
            <?php
            require 'menu.php';
            require 'bd.php';
            ?>

            <!-- Area de Admin -->
            <div class='admin-container'>

                <h1 class="admin-titulo">Area de Administración</h1>  

                <div class="instrucciones">
                    <button id="instrucciones-btn" class="toggle-button">Mostrar/ocultar Instrucciones</button>

                    <!-- Instrucciones -->
                    <div id="instrucciones-container" style="display: none;" class="instrucciones-container">
                        
                        <p>Estas son las instrucciones para jugar:</p>
                        <ul>
                            <li>Primero...</li>
                            <li>Luego...</li>
                            <li>Finalmente...</li>
                        </ul>
                    </div>
                </div>

                <!-- Juegos -->
                <div class='admin-options admin-options-juegos'>

                    <h2 class='admin-options-novedades-titulo'>Sección de Juegos</h2>

                    <div class='admin-options-novedades-container'>
                        <button onclick="location.href = 'Admin/CrearJuego.php'">Añadir Juego</button>
                        <button onclick="location.href = 'Admin/AñadirGeneros.php'">Añadir Generos a un Juego</button>
                        <button onclick="location.href = 'Admin/AñadirDesarrollador.php'">Añadir Desarrollador a un Juego</button>
                        <button onclick="location.href = 'Admin/AñadirEditor.php'">Añadir Editor a un Juego</button>
                        <button onclick="location.href = 'juegos.php?usuario=admin'">Administrar</button>
                        <button onclick="location.href = 'juegos.php'">Listar</button>
                    </div>

                </div>

                <!-- Categorias -->
                <div class='admin-options admin-options-categorias'>

                    <h2 class='admin-options-novedades-titulo'>Sección de Categorias</h2>

                    <div class='admin-options-novedades-container'>
                        <button onclick="location.href = 'Admin/CrearCategoria.php'">Añadir Categoria</button>
                        <button onclick="location.href = 'categorias.php?usuario=admin'">Administar</button>
                        <button onclick="location.href = 'categorias.php?'">Listar</button>
                    </div>

                </div>

                <!-- Desarrolladores -->
                <div class='admin-options admin-options-desarrolladores'>

                    <h2 class='admin-options-novedades-titulo'>Sección de Desarrolladores</h2>

                    <div class='admin-options-novedades-container'>
                        <button onclick="location.href = 'Admin/CrearDesarrollador.php'">Añadir Desarrollador</button>
                        <button onclick="location.href = 'desarrolladores.php?usuario=admin'">Administrar</button>
                        <button onclick="location.href = 'desarrolladores.php'">Listar</button>
                    </div>

                </div>

                <!-- Editores -->
                <div class='admin-options admin-options-editores'>

                    <h2 class='admin-options-novedades-titulo'>Sección de Editores</h2>

                    <div class='admin-options-novedades-container'>
                        <button onclick="location.href = 'Admin/CrearEditor.php'">Añadir Editor</button>
                        <button onclick="location.href = 'editores.php?usuario=admin'">Administrar</button>
                        <button onclick="location.href = 'editores.php'">Listar</button>
                    </div>

                </div>

                <!-- Novedades -->
                <div class='admin-options admin-options-novedades'>

                    <h2 class='admin-options-novedades-titulo'>Sección de Novedades</h2>

                    <div class='admin-options-novedades-container'>
                        <button onclick="location.href = 'Admin/CrearNovedad.php'">Añadir Novedad</button>
                        <button onclick="location.href = 'novedades.php?usuario=admin'">Administar</button>
                        <button onclick="location.href = 'novedades.php'">Listar</button>
                    </div>

                </div>

                <!-- Noticias -->
                <div class='admin-options admin-options-noticias'>

                    <h2 class='admin-options-novedades-titulo'>Sección de Noticias</h2>

                    <div class='admin-options-novedades-container'>
                        <button onclick="location.href = 'Admin/CrearNoticia.php'">Añadir Noticia</button>
                        <button onclick="location.href = 'noticias.php?usuario=admin'">Administar</button>
                        <button onclick="location.href = 'noticias.php'">Listar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $("#instrucciones-btn").click(function () {
                    $("#instrucciones-container").slideToggle();
                });
            });
        </script>

    </body>
</html>
