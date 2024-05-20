<header>
    
    <!-- Barra de navegacion -->
    <nav class="navbar">
        
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        
        <!-- Paginas de la web -->
        <ul class="menu-izquierdo">
            <li><button onclick="location.href = '../PagPrincipal.php'">Inicio</button></li>
            <li><button onclick="location.href = '../juegos.php'">Juegos</button></li>
            <li><button onclick="location.href = '../categorias.php'">Categorías</button></li>
            <li><button onclick="location.href = '../desarrolladores.php'">Desarrolladores</button></li>
            <li><button onclick="location.href = '../editores.php'">Editores</button></li>
            <li><button onclick="location.href = '../novedades.php'">Novedades</button></li>
            <li><button onclick="location.href = '../noticias.php'">Noticias</button></li>
            <li><button onclick="location.href = '../carrito.php'">Carrito</button></li>
            <?php
            session_start();
            if(isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
                echo '<li><button onclick="location.href = \'../Admin.php\'">Admin</button></li>';
            }
            ?>
        </ul>
        
        <!-- Log Out -->
        <ul class="menu-derecho">
            <li><button onclick="location.href = '../perfil.php'">Perfil</button></li>
            <li><button onclick="location.href = '../Logout.php'">Log Out</button></li>
        </ul>
    </nav>
</header>
