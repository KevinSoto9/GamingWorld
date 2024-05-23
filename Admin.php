<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="text-light ">
    
        <?php require 'menu.php'; ?>

        <?php if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador'): ?>
    <div class="container-fluid p-4">
        <div class="admin-container">
            <h1 class="admin-titulo text-center mb-4">Área de Administración</h1>

            <div class="text-center mb-4">
                <button class="btn btn-warning" onclick="location.href = 'Instrucciones.php'">Ver Instrucciones</button>
            </div>

            <div class="row">
                <!-- Juegos -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-secondary text-light h-100">
                        <div class="card-header">
                            <h2 class="admin-options-novedades-titulo card-title"><i class="fas fa-gamepad"></i> Sección de Juegos</h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-center">
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/CrearJuego.php'"><i class="fas fa-plus"></i> Añadir Juego</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/AñadirGeneros.php'"><i class="fas fa-edit"></i> Añadir Géneros</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/AñadirDesarrollador.php'"><i class="fas fa-edit"></i> Añadir Desarrollador</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/AñadirEditor.php'"><i class="fas fa-edit"></i> Añadir Editor</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'juegos.php?usuario=admin'"><i class="fas fa-cogs"></i> Administrar</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'juegos.php'"><i class="fas fa-list"></i> Listar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categorias -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-secondary text-light h-100">
                        <div class="card-header">
                            <h2 class="admin-options-novedades-titulo card-title"><i class="fas fa-th-list"></i> Sección de Géneros</h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-center">
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/CrearGenero.php'"><i class="fas fa-plus"></i> Añadir Género</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'categorias.php?usuario=admin'"><i class="fas fa-cogs"></i> Administrar</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'categorias.php?'"><i class="fas fa-list"></i> Listar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desarrolladores -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-secondary text-light h-100">
                        <div class="card-header">
                            <h2 class="admin-options-novedades-titulo card-title"><i class="fas fa-laptop-code"></i> Sección de Desarrolladores</h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-center">
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/CrearDesarrollador.php'"><i class="fas fa-plus"></i> Añadir Desarrollador</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'desarrolladores.php?usuario=admin'"><i class="fas fa-cogs"></i> Administrar</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'desarrolladores.php'"><i class="fas fa-list"></i> Listar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Editores -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-secondary text-light h-100">
                        <div class="card-header">
                            <h2 class="admin-options-novedades-titulo card-title"><i class="fas fa-pencil-alt"></i> Sección de Editores</h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-center">
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/CrearEditor.php'"><i class="fas fa-plus"></i> Añadir Editor</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'editores.php?usuario=admin'"><i class="fas fa-cogs"></i> Administrar</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'editores.php'"><i class="fas fa-list"></i> Listar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Novedades -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-secondary text-light h-100">
                        <div class="card-header">
                            <h2 class="admin-options-novedades-titulo card-title"><i class="fas fa-bullhorn"></i> Sección de Novedades</h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-center">
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/CrearNovedad.php'"><i class="fas fa-plus"></i> Añadir Novedad</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'novedades.php?usuario=admin'"><i class="fas fa-cogs"></i> Administrar</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'novedades.php'"><i class="fas fa-list"></i> Listar</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'calendario.php'"><i class="fas fa-calendar-alt"></i> Ver Calendario</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Noticias -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-secondary text-light h-100">
                        <div class="card-header">
                            <h2 class="admin-options-novedades-titulo card-title"><i class="fas fa-newspaper"></i> Sección de Noticias</h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-center">
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/CrearNoticia.php'"><i class="fas fa-plus"></i> Añadir Noticia</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/CrearNoticiaDetalles.php'"><i class="fas fa-info-circle"></i> Añadir Detalles</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'noticias.php?usuario=admin'"><i class="fas fa-cogs"></i> Administrar</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'noticias.php'"><i class="fas fa-list"></i> Listar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Usuarios -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-secondary text-light h-100">
                        <div class="card-header">
                            <h2 class="admin-options-novedades-titulo card-title"><i class="fas fa-users"></i> Usuarios</h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-center">
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/CrearAdmin.php'"><i class="fas fa-user-plus"></i> Crear Administrador</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/ListarClientes.php'"><i class="fas fa-list"></i> Listar Usuarios</button>
                                <button class="btn btn-warning m-2" onclick="location.href = 'Admin/ListarAdministradores.php'"><i class="fas fa-list"></i> Listar Administradores</button>
                            </div>
                        </div>
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

        <?php else: ?>
        <div class='NoAdmin text-center'>
            <p>No tienes permiso para acceder a esta página.</p>
            <button class="btn btn-warning" onclick='window.location.href="PagPrincipal.php"'>Volver a la Página Principal</button>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>

