<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="text-white"> 

<?php
require '../Menus/menu2.php';

$html = "";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== "administrador") {
    
    require '../PaginasAdicionales/PersonalAutorizado.php';
} else {

?>

<h1 class="text-center text-white mt-4">Lista de Administradores</h1> 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <table class="table text-white"> 
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                try {
                    require '../bd.php';
                    $sel = "SELECT * FROM `usuarios` WHERE `Tipo` = 'administrador'";
                    $resul = $bd->query($sel);

                    if ($resul) {
                        foreach ($resul as $res) {
                            echo '<tr>';
                            echo "<td>" . $res['Alias'] . "</td>";
                            echo "<td>" . $res['Email'] . "</td>";
                            echo '</tr>';
                        }
                    }
                } catch (PDOException $e) {
                    echo '<tr><td colspan="2">' . $e->getMessage() . '</td></tr>';
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
}
?>

</body>
</html>
