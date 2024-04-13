<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gaming World</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    
    <?php
        require '../menu2.php';
    ?>
    
    <h1 class="tablaTitulo">Lista de Administradores</h1>
    
    <div class="tablaUsuarios">

     <?php
     
      try {
        require '../bd.php';
        $sel = "SELECT * FROM `usuarios` WHERE `Tipo` = 'administrador'";
        $resul = $bd->query($sel);
        
            if ($resul) {
                
                echo '<table class="tabla">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Nombre</th>';
                echo '<th>Email</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
            
                foreach($resul as $res){
                
                    echo '<tr>';
                    echo "<td>".$res['Alias']."</td>";
                    echo "<td>".$res['Email']."</td>";
                    echo '</tr>';

                }
             
                echo '</tbody>';
                echo '</table>';
            
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
     ?>
        
    <div>

</body>
</html>
