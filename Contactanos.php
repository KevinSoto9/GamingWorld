<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - Gaming World</title>
    <!-- Estilos Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos adicionales -->
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="PagPrincipal.php">
                <!-- Logo -->
                <img src="Imagenes/Titulo.png" width="200px" height="30px" class="d-inline-block align-top" alt="Logo">
            </a>
            <!-- Botones de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class='nav-item'>
                        <a class='nav-link' href='PagPrincipal.php'>Ir al Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container-flex">
        <div class="content-flex">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow-sm">
                            <div class="card-body bg-dark">
                                <!-- Formulario de contacto -->
                                <h1 class="text-center mb-4">Contáctanos</h1>
                                <form action="EnviarContacto.php" method="post">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="asunto">Asunto</label>
                                        <input type="text" class="form-control" id="asunto" name="asunto" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mensaje">Mensaje</label>
                                        <textarea class="form-control" id="mensaje" name="mensaje" rows="9" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie de página -->
        <footer class="footer mt-5 py-3 bg-dark text-white">
            <div class="container text-center">
                <span>&copy; 2024 Gaming World. Todos los derechos reservados.</span>
            </div>
        </footer>
    </div>

    <!-- Scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
