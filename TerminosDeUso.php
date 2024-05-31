<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Términos de Uso - Gaming World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="<?php if (isset($_GET["ini"]) && $_GET["ini"] == "ok") { echo 'PagPrincipal.php'; } else { echo 'index.php';}; ?>">
                <img src="Imagenes/Titulo.png" width="200px" height="30px" class="d-inline-block align-top" alt="Logo">
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
            
            <?php
            if(isset($_GET["ini"]) && $_GET["ini"] == "ok")
            {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='PagPrincipal.php'>Ir al Inicio</a>";
                echo "</li>";
            }
            else {
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
                        <h1 class="text-center mb-4">Términos de Uso</h1>
                        <p>Bienvenido a Gaming World, tu tienda en línea de claves de videojuegos. Al acceder y utilizar nuestro sitio web, aceptas cumplir con los siguientes términos y condiciones. Te recomendamos leer estos términos detenidamente.</p>

                        <h2 class="mt-4">1. Aceptación de los Términos</h2>
                        <p>Al utilizar este sitio web, aceptas estos términos de uso en su totalidad. Si no estás de acuerdo con alguna parte de estos términos, no deberías usar nuestro sitio web.</p>

                        <h2 class="mt-4">2. Modificaciones de los Términos</h2>
                        <p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Es tu responsabilidad revisar estos términos periódicamente para estar al tanto de cualquier cambio. El uso continuado del sitio web después de la publicación de modificaciones constituye la aceptación de dichos cambios.</p>

                        <h2 class="mt-4">3. Uso del Sitio Web</h2>
                        <p>El contenido de este sitio web es solo para tu información general y uso. Está sujeto a cambios sin previo aviso. No ofrecemos ninguna garantía sobre la exactitud, oportunidad, rendimiento, integridad o idoneidad de la información y materiales encontrados u ofrecidos en este sitio web para ningún propósito en particular.</p>

                        <h2 class="mt-4">4. Cuentas de Usuario</h2>
                        <p>Para acceder a algunas funciones de nuestro sitio, es posible que necesites crear una cuenta. Eres responsable de mantener la confidencialidad de tu cuenta y contraseña, así como de las actividades que ocurran bajo tu cuenta.</p>

                        <h2 class="mt-4">5. Propiedad Intelectual</h2>
                        <p>Este sitio web contiene material que es de nuestra propiedad o con licencia para nosotros. Este material incluye, pero no se limita a, el diseño, la disposición, la apariencia y los gráficos. La reproducción está prohibida salvo de acuerdo con el aviso de derechos de autor, que forma parte de estos términos y condiciones.</p>

                        <h2 class="mt-4">6. Enlaces a Otros Sitios Web</h2>
                        <p>Nuestro sitio web puede contener enlaces a otros sitios web de interés. Sin embargo, una vez que hayas utilizado estos enlaces para salir de nuestro sitio, debes tener en cuenta que no tenemos control sobre ese otro sitio web. Por lo tanto, no podemos responsabilizarnos de la protección y privacidad de cualquier información que proporciones mientras visitas dichos sitios.</p>

                        <h2 class="mt-4">7. Limitación de Responsabilidad</h2>
                        <p>En ningún caso seremos responsables por cualquier pérdida o daño, incluyendo sin limitación, pérdidas o daños indirectos o consecuentes, o cualquier pérdida o daño que surja de la pérdida de datos o beneficios que surja de, o en conexión con, el uso de este sitio web.</p>

                        <h2 class="mt-4">8. Ley Aplicable</h2>
                        <p>El uso de este sitio web y cualquier disputa que surja de dicho uso del sitio está sujeto a las leyes de [tu país/estado].</p>

                        <h2 class="mt-4">9. Contacto</h2>
                        <p>Si tienes alguna pregunta sobre estos Términos de Uso, por favor contáctanos a través de [correo electrónico de contacto] o [número de teléfono].</p>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
