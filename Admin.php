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

                    <div class="instrucciones">
                        <button id="instrucciones-btn" class="toggle-button">Mostrar/ocultar Instrucciones</button>

                        <!-- Instrucciones -->
                        <div id="instrucciones-container" style="display: none;" class="instrucciones-container">

                            <p>- Instrucciones para insertar un Juego:</p>
                            <ul>
                                <li>Para poder insertar un juego este debe tener tanto sus generos, desarrollador y editor añadido de lo contrario el juego no se mostrara</li>
                                <li>Primero insertar la informacion del juego</li>
                                <li>Segundo hay que crear si es necesario el genero o generos al que pertenece y tras eso o si ya estan creados insertar los generos en el juego</li>
                                <li>Tercero hay que crear si es necesario el desarrollador al que pertenece y tras es o si ya esta creado insertar el desarrolador en el juego</li>
                                <li>Cuarto hay que crear si es necesario el editor al que pertenece y tras eso o si ya esta creadp insertar el editor al juego</li>
                                <li>Tras eso el juego deberia poder visualizarse</li>
                            </ul>
                            <br>

                            <p>- Instrucciones para añadir generos a un Juego:</p>
                            <ul>
                                <li>Para poder añadir generos a un juego, estos tienen que estar creados anteriormente</li>
                                <li>Primero hay que elegir el juego en el listado que aparece, y luegos los generos</li>
                                <li>Al añadir los generos no se pueden repetir , si lo intentas saldra un mensaje diciendo lo anterior</li>
                                <li>Tras eso se deberian haber añadido correctamente</li>
                            </ul>
                            <br>

                            <p>- Instrucciones para añadir un desarrollador/editor a un Juego:</p>
                            <ul>
                                <li>Para poder añadir un desarrollador/editor a un juego, este tienen que estar creado anteriormente</li>
                                <li>Primero hay que elegir el juego en el listado que aparece, y luego el desarrollador/genero</li>
                                <li>Tras eso se deberia haber añadido correctamente</li>
                            </ul>
                            <br>

                            <p>- Instrucciones para insertar una Novedad:</p>
                            <ul>
                                <li>Para poder insertar una novedad , la fecha debe ser mayor a la actual</li>
                                <li>No hace falta informacion de generos , desarroladores o editores, solo la que pone en el formulario y enviarlo</li>
                                <li>Tras eso se deberia haber añadido correctamente</li>
                            </ul>
                            <br>
                            
                            <p>- Instrucciones para crear una Noticia:</p>
                            <ul>
                                <li>Prinero debes crear la noticia principal en si, sin detalles</li>
                                <li>Tras eso deberas ir poner los detalles de la noticias, (el titulo y la imagen no son las mismas)</li>
                                <li>Sin intentas ver la noticia sin haber creado sus detalles, esta no aparecera</li>
                                <li>Tras haber insertado todo lo necesario deberia poder ver la noticia y todo la informacion de los detalles</li>
                            </ul>
                            <br>
                            
                            <p>- Instrucciones para crear un Usuario Admin:</p>
                            <ul>
                                <li>El correo debe terminar en @gamingworld.com, de lo contrario no te dejara crearlo</li>
                                <li>La contrasena debe tener minimo 8 caracteres y debe ser la misma que en confirmar constrasena</li>
                                <li>Tras eso envias los datos y se deberia crear el usuario administrador</li>
                            </ul>
                            <br>
                            
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
