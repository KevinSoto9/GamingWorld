<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">

     <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-xl navbar-dark ">
        <!-- Contenido de la barra de navegación -->
        <div class="container-fluid">
            <!-- Foto y contenido -->
            <a class="navbar-brand mr-auto" href="PagPrincipal.php">
                <img src="Imagenes/Titulo.png" width="200px" height="30px" class="d-inline-block align-top" alt="Logo">
            </a>

            <!-- Botón para mostrar opciones en dispositivos pequeños -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido de la barra de navegación -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="PagPrincipal.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="juegos.php">Juegos</a></li>
                    <li class="nav-item"><a class="nav-link" href="novedades.php">Novedades</a></li>
                    <li class="nav-item"><a class="nav-link" href="noticias.php">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="carrito.php">Carrito</a></li>
                    <?php
                    session_start();
                    if(isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
                        echo '<li class="nav-item"><a class="nav-link" href="Admin.php">Admin</a></li>';
                    }
                    ?>
                </ul>
                <ul class="navbar-nav md-auto">
                    <li class="nav-item"><a class="nav-link" href="perfil.php">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">LogOut</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
