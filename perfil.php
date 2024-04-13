<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <?php require 'menu.php'; ?>

    <body>

        <div class="perfil">

            <h1>Perfil de Usuario</h1>

            <div class="perfil-contenido">

                <div class="perfil-usuario">

                    <h1>Información del Usuario</h1>

                    <br>

                    <?php
                    $usuario_id = $_SESSION['UsuarioID'];

                    try {
                        require 'bd.php';
                        $ins = "SELECT * FROM `usuarios` WHERE `UsuarioID` = $usuario_id";
                        $resul = $bd->query($ins);
                        if ($resul) {

                            foreach ($resul as $res) {

                                echo "<div class='perfil-usuario-container'>";
                                if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
                                    echo '<h2>Tienes Rol de Administrador</h2>';
                                }
                                echo "<h2>Nombre de Usuario:" . $res['Alias'] . "</h2>";
                                echo "<h2>Email:" . $res['Email'] . "</h2>";

                                $contrasena = $res['Password'];
                                $asteriscos = str_repeat("*", strlen($contrasena));

                                echo "<div id='password-container'>";
                                echo "<h2>Contraseña: $asteriscos</h2>";
                                echo "</div>";

                                echo "<button onclick='mostrarContrasena(\"$contrasena\")'>Mostrar Contraseña</button>";
                                echo "</div>";
                            }
                        } else {
                            echo "Ha habido un error en la consulta";
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>

                    <div class="perfil-cambiarContrasena">
                        <h2>¿Quieres cambiar la contraseña?</h2>
                        <?php echo "<button onclick='window.location.href=\"CambiarContra.php?UsuarioID=" . urlencode($usuario_id) . "\"'>Hazlo Aquí</button>"; ?>
                    </div>

                </div>

                <div class="perfil-tarjeta">

                    <h1>Información de su Tarjeta</h1>

                    <br>

                    <?php
                    $usuario_id = $_SESSION['UsuarioID'];

                    try {
                        require 'bd.php';
                        $tarjeta = "SELECT * FROM tarjetas WHERE UsuarioID = $usuario_id";
                        $tarjeta_res = $bd->query($tarjeta);

                        if (!$tarjeta_res || $tarjeta_res->rowCount() === 0) {

                            echo "<div class='perfil-tarjeta-noVinculada'>";
                            echo "<h2>No tienes ninguna tarjeta asociada a tu perfil</h2>";
                            echo "<button onclick='window.location.href=\"CrearTarjeta.php\"'>Hazlo aquí</button>";
                            echo "</div>";
                        } else {

                            echo "<div class='perfil-tarjeta-vinculada'>";

                            foreach ($tarjeta_res as $tar) {

                                echo "<h2>Número de Tarjeta: " . $tar['NumTarjeta'] . "</h2>";
                                echo "<h2>Nombre del Propietario: " . $tar['Nombre'] . "</h2>";
                                echo "<h2>Fecha de Expiración: " . $tar['FechaExp'] . "</h2>";

                                $cvc = $tar['CVC'];
                                $asteriscos_cvc = str_repeat("*", strlen($cvc));
                                echo "<div id='cvc-container'>";
                                echo "<h2>CVC: $asteriscos_cvc</h2>";
                                echo "</div>";
                                echo "<button onclick='mostrarCVC(\"$cvc\")'>Mostrar CVC</button>";
                            }

                            echo "</div>";
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>

                    <div class="perfil-quitarTarjeta">

                        <?php
                        try {
                            require 'bd.php';
                            $tarjeta = "SELECT * FROM tarjetas WHERE UsuarioID = $usuario_id";
                            $tarjeta_res = $bd->query($tarjeta);

                            if ($tarjeta_res && $tarjeta_res->rowCount() > 0) {
                                foreach ($tarjeta_res as $tar) {
                                    echo "<div class='perfil-quitarTarjeta-content'>";
                                    echo "<h2>¿Quieres desvincular la tarjeta?</h2>";
                                    echo "<button onclick='window.location.href=\"QuitarTarjeta.php?tarjetaID=" . urlencode($tar['tarjetaID']) . "\"'>Hazlo Aquí</button>";
                                    echo "</div>";
                                }
                            }
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                        ?>
                        
                    </div>

                </div>

            </div>

        </div>

        <script>
            function mostrarContrasena(contrasena) {
                var passwordContainer = document.getElementById('password-container');
                var contrasenaVisible = passwordContainer.innerHTML.includes(contrasena);
                if (contrasenaVisible) {
                    var asteriscos = "*".repeat(contrasena.length);
                    passwordContainer.innerHTML = "<h2>Contraseña: " + asteriscos + "</h2>"; // Mostrar asteriscos
                } else {
                    passwordContainer.innerHTML = "<h2>Contraseña: " + contrasena + "</h2>"; // Mostrar la contraseña
                }
            }

            function mostrarCVC(cvc) {
                var cvcContainer = document.getElementById('cvc-container');
                var cvcVisible = cvcContainer.innerHTML.includes(cvc);
                if (cvcVisible) {
                    var asteriscos = "*".repeat(cvc.length);
                    cvcContainer.innerHTML = "<h2>CVC: " + asteriscos + "</h2>"; // Mostrar asteriscos
                } else {
                    cvcContainer.innerHTML = "<h2>CVC: " + cvc + "</h2>"; // Mostrar el CVC
                }
            }
        </script>

    </body>
</html>