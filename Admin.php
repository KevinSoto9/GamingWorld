<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div>
            <?php
            require 'menu.php';

            if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {

                require 'bd.php';
                ?>

                <!-- Area de Admin -->
                <div class='admin-container'>
                  
                    <h1 class="admin-titulo">Area de Administración</h1>  
                    
                    <button onclick="location.href = 'Instrucciones.php'">Ver Instrucciones</button>

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

                        <h2 class='admin-options-novedades-titulo'>Sección de Generos</h2>

                        <div class='admin-options-novedades-container'>
                            <button onclick="location.href = 'Admin/CrearGenero.php'">Añadir Genero</button>
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
                            <button onclick="location.href = 'calendario.php'">Ver Calendario</button>
                        </div>

                    </div>

                    <!-- Noticias -->
                    <div class='admin-options admin-options-noticias'>

                        <h2 class='admin-options-novedades-titulo'>Sección de Noticias</h2>

                        <div class='admin-options-novedades-container'>
                            <button onclick="location.href = 'Admin/CrearNoticia.php'">Añadir Noticia</button>
                            <button onclick="location.href = 'Admin/CrearNoticiaDetalles.php'">Añadir Detalles de la Noticia</button>
                            <button onclick="location.href = 'noticias.php?usuario=admin'">Administar</button>
                            <button onclick="location.href = 'noticias.php'">Listar</button>
                        </div>
                    </div>
                    
                    <!-- Usuarios -->
                    <div class='admin-options admin-options-usuarios'>

                        <h2 class='admin-options-novedades-titulo'>Usuarios</h2>

                        <div class='admin-options-novedades-container'>
                            <button onclick="location.href = 'Admin/CrearAdmin.php'">Crear Usuario Administrador</button>
                            <button onclick="location.href = 'Admin/ListarClientes.php'">Listar Usuarios</button>
                            <button onclick="location.href = 'Admin/ListarAdministradores.php'">Listar Administradores</button>
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
    <?php
} else {
    
    echo "<div class='NoAdmin'>";
    echo "<p>No tienes permiso para acceder a esta página.</p>";
    echo "<button onclick='window.location.href=\"PagPrincipal.php\"'>Hazlo Aquí</button>";
    echo "</div>";
}
?>
