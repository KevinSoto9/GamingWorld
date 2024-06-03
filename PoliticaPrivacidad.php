<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Política de Privacidad - Gaming World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="<?php if (isset($_GET["ini"]) && $_GET["ini"] == "ok") { echo 'PagPrincipal.php';}else{echo 'index.php';};?>">
                <img src="Imagenes/Titulo.png" width="200px" height="30px" class="d-inline-block align-top" alt="Logo">
            </a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                     <?php
                    if (isset($_GET["ini"]) && $_GET["ini"] == "ok") {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='PagPrincipal.php'>Ir al Inicio</a>";
                        echo "</li>";
                    } else {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="index.php">Iniciar Sesión</a>';
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="registroCliente.php">Registrarse</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body bg-dark">
                        <h1 class="text-center mb-4">Política de Privacidad</h1>
                        <p>En Gaming World, nos comprometemos a proteger tu privacidad. Esta política de privacidad explica cómo recopilamos, usamos y protegemos la información personal que nos proporcionas a través de nuestro sitio web.</p>

                        <h2 class="mt-4">1. Información que Recopilamos</h2>
                        <p>Podemos recopilar la siguiente información:</p>
                        <div class="container">
                            <p>- Nombre y datos de contacto, incluyendo dirección de correo electrónico.</p>
                            <p>- Otra información relevante para encuestas y/o ofertas.</p>
                        </div>

                        <h2 class="mt-4">2. Uso de la Información</h2>
                        <p>Utilizamos esta información para entender tus necesidades y ofrecerte un mejor servicio, y en particular por las siguientes razones:</p>
                        <div class="container">
                            <p>- Mantenimiento de registros internos.</p>
                            <p>- Mejora de nuestros productos y servicios.</p>
                            <p>- Envío de correos electrónicos promocionales sobre nuevos productos, ofertas especiales u otra información que pensamos que puede resultarte interesante.</p>
                        </div>

                        <h2 class="mt-4">3. Seguridad</h2>
                        <p>Estamos comprometidos a garantizar que tu información esté segura. Para prevenir el acceso no autorizado o divulgación, hemos implementado procedimientos físicos, electrónicos y administrativos apropiados para salvaguardar y asegurar la información que recopilamos en línea.</                        </p>

                        <h2 class="mt-4">4. Control de tu Información Personal</h2>
                        <p>Puedes optar por restringir la recopilación o el uso de tu información personal de las siguientes maneras:</p>
                        <div>
                            <p>- Siempre que se te pida rellenar un formulario en el sitio web, busca la casilla en la que puedes hacer clic para indicar que no deseas que la información sea utilizada por nadie para fines de marketing directo.</p>
                            <p>- Si previamente has aceptado que usemos tu información personal para fines de marketing directo, puedes cambiar de opinión en cualquier momento escribiéndonos o enviándonos un correo electrónico a [correo electrónico de contacto].</p>
                        </div>

                        <h2 class="mt-4">5. Contacto</h2>
                        <p>Si tienes alguna pregunta sobre esta Política de Privacidad, por favor contáctanos a través de nuestro formulario de contacto. <?php echo "<a class='text-white' href='Contactanos.php'>Contactanos</a>";?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="footer mt-5 py-3 bg-dark text-white">
        <div class="container text-center ">
            <span>&copy; 2024 Gaming World. Todos los derechos reservados.</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
