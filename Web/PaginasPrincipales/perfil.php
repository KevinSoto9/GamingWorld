<?php

if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioID'] === null) {
    // Requerir archivo para usuario no logueado
    require '../PaginasAdicionales/NoInicioSesion.php';
} else {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <!-- Agregar referencia a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/cssPlus/cssPlus.css">
</head>

<body>
    <?php require '../Menus/menu.php'; ?>

    <div class="container mt-5">
        <div class="perfil">
            <h1 class="text-center mb-4">Perfil de Usuario</h1>

            <div class="perfil-contenido row">
                <!-- Información del Usuario -->
                <div class="perfil-usuario col-md-6">
                    <h1>Información del Usuario</h1>
                    <br>
                    <?php
                    $usuario_id = $_SESSION['UsuarioID'];

                    try {
                        require '../bd.php';
                        $ins = "SELECT * FROM `usuarios` WHERE `UsuarioID` = $usuario_id";
                        $resul = $bd->query($ins);
                        if ($resul) {
                            foreach ($resul as $res) {
                                echo "<div class='perfil-usuario-container p-3 mb-3 bg-secondary rounded'>";
                                if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
                                    echo '<h2 class="text-warning">Tienes Rol de Administrador</h2>';
                                }
                                echo "<h2>Nombre de Usuario: " . $res['Alias'] . "</h2>";
                                echo "<h2>Email: " . $res['Email'] . "</h2>";

                                $contrasena = $res['Password'];
                                $asteriscos = str_repeat("*", strlen($contrasena));

                                echo "<div id='password-container'>";
                                echo "<h2>Contraseña: $asteriscos</h2>";
                                echo "</div>";

                                echo "<button class='btn btn-primary mt-2' onclick='mostrarContrasena(\"$contrasena\")'>Mostrar Contraseña</button>";
                                echo "</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Ha habido un error en la consulta</div>";
                        }
                    } catch (PDOException $e) {
                        echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
                    }
                    ?>

                    <div class="perfil-cambiarContrasena mt-3">
                        <h2>¿Quieres cambiar la contraseña?</h2>
                        <?php echo "<button class='btn btn-primary mt-2' onclick='window.location.href=\"../Funciones/CambiarContra.php?UsuarioID=" . urlencode($usuario_id) . "\"'>Hazlo Aquí</button>"; ?>
                    </div>
                </div>

                <!-- Información de la Tarjeta -->
                <div class="perfil-tarjeta col-md-6">
                    <h1>Información de su Tarjeta</h1>
                    <br>
                    <?php
                    try {
                        require '../bd.php';
                        $tarjeta = "SELECT * FROM tarjetas WHERE UsuarioID = $usuario_id";
                        $tarjeta_res = $bd->query($tarjeta);

                        if (!$tarjeta_res || $tarjeta_res->rowCount() === 0) {
                            echo "<div class='alert alert-warning'>";
                            echo "<h2>No tienes ninguna tarjeta asociada a tu perfil</h2>";
                            echo "<button class='btn btn-primary' onclick='window.location.href=\"../Funciones/CrearTarjeta.php\"'>Hazlo aquí</button>";
                            echo "</div>";
                        } else {
                            echo "<div class='perfil-tarjeta-vinculada p-3 mb-3 bg-secondary rounded'>";
                            foreach ($tarjeta_res as $tar) {
                                echo "<h2>Número de Tarjeta: " . $tar['NumTarjeta'] . "</h2>";
                                echo "<h2>Nombre del Propietario: " . $tar['Nombre'] . "</h2>";
                                echo "<h2>Fecha de Expiración: " . $tar['FechaExp'] . "</h2>";

                                $cvc = $tar['CVC'];
                                $asteriscos_cvc = str_repeat("*", strlen($cvc));
                                echo "<div id='cvc-container'>";
                                echo "<h2>CVC: $asteriscos_cvc</h2>";
                                echo "</div>";
                                echo "<button class='btn btn-primary mt-2' onclick='mostrarCVC(\"$cvc\")'>Mostrar CVC</button>";
                            }
                            echo "</div>";
                        }
                    } catch (PDOException $e) {
                        echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
                    }
                    ?>

                    <div class="perfil-quitarTarjeta mt-3">
                        <?php
                        try {
                            require '../bd.php';
                            $tarjeta = "SELECT * FROM tarjetas WHERE UsuarioID = $usuario_id";
                            $tarjeta_res = $bd->query($tarjeta);

                            if ($tarjeta_res && $tarjeta_res->rowCount() > 0) {
                                foreach ($tarjeta_res as $tar) {
                                    echo "<div class='perfil-quitarTarjeta-content'>";
                                    echo "<h2>¿Quieres desvincular la tarjeta?</h2>";
                                    echo "<button class='btn btn-primary mt-2' onclick='window.location.href=\"../Funciones/QuitarTarjeta.php?tarjetaID=" . urlencode($tar['tarjetaID']) . "\"'>Hazlo Aquí</button>";
                                    echo "</div>";
                                }
                            }
                        } catch (PDOException $e) {
                            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para mostrar u ocultar la contraseña
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

        // Función para mostrar u ocultar el CVC
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    }
    ?>