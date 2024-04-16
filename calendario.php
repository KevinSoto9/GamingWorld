<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gaming World</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>

        <?php
        require 'menu.php';

        // Obtener las novedades del mes actual desde la base de datos
        function obtenerNovedadesMesActual($month, $year) {
            require 'bd.php';

            // Consulta SQL 
            $sql = "SELECT * FROM novedades WHERE MONTH(fecha) = ? AND YEAR(fecha) = ?";
            $stmt = $bd->prepare($sql);
            $stmt->execute([$month, $year]);
            $novedades = array();

            // Verificar si hay errores
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[0] !== '00000') {
                echo "Error al ejecutar la consulta: " . $errorInfo[2];
                return;
            }


            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $novedades[date('j', strtotime($row["fecha"]))] = $row["titulo"]; // Usamos 'j' para obtener el día del mes sin ceros iniciales
                }
            } 

            return $novedades;
        }

        // Gnerar el calendario 
        function generar_calendario($month, $year, $lang, $holidays = null) {
            $novedades = obtenerNovedadesMesActual($month, $year);

            $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

            if ($lang == 'en') {
                $headings = array('M', 'T', 'W', 'T', 'F', 'S', 'S');
            }
            if ($lang == 'es') {
                $headings = array('L', 'M', 'M', 'J', 'V', 'S', 'D');
            }
            if ($lang == 'ca') {
                $headings = array('DI', 'Dm', 'Dc', 'Dj', 'Dv', 'Ds', 'Dg');
            }

            $calendar .= '<tr class="calendar-row"><td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">', $headings) . '</td></tr>';

            $first_day_timestamp = mktime(0, 0, 0, $month, 1, $year);
            $first_day_weekday = date('N', $first_day_timestamp); // Obtener el día de la semana del primer día del mes
            $days_in_month = date('t', $first_day_timestamp);

            $calendar .= '<tr class="calendar-row">';

            // Rellenar los días en blanco al principio del mes
            for ($x = 1; $x < $first_day_weekday; $x++) {
                $calendar .= '<td class="calendar-day-np calendar-cell"> </td>';
            }

            // Recorrer los días del mes
            for ($list_day = 1; $list_day <= $days_in_month; $list_day++) {
                $calendar .= '<td class="calendar-day calendar-cell">';

                $class = "day-number ";
                $current_day_timestamp = mktime(0, 0, 0, $month, $list_day, $year);
                $current_day_weekday = date('N', $current_day_timestamp); // Obtener el día de la semana actual

                if ($current_day_weekday >= 6) { // Si es sábado o domingo, agregar la clase not-work
                    $class .= " not-work ";
                }

                // Comprueba si hay novedades 
                if (isset($novedades[$list_day])) {
                    $class .= " novedad ";
                    $calendar .= "<div class='{$class}'>" . $list_day . "<br>" . $novedades[$list_day] . "</div>";
                } else {
                    $calendar .= "<div class='{$class}'>" . $list_day . "</div>";
                }

                $calendar .= '</td>';

                // Si el día actual es viernes, cerrar la fila y abrir una nueva fila
                if ($current_day_weekday == 7) { // Si es domingo
                    $calendar .= '</tr>';
                    if ($list_day != $days_in_month) {
                        $calendar .= '<tr class="calendar-row">';
                    }
                }
            }

            $calendar .= '</table>';

            return $calendar;
        }


        $currentMonth = min(isset($_GET['month']) ? $_GET['month'] : date('n'), 12);
        $currentYear = isset($_GET['year']) ? $_GET['year'] : date('Y');


        $currentMonth = max($currentMonth, date('n'));

        echo '<div class="calendario">';
        echo "<div class='titulo'><h1>Calendario de Juegos del 2024</h1></div>";

        $meses = array(
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        );

        $nombre_mes = $meses[$currentMonth];

        echo "<h1 class='calendario-titulo'>" . $nombre_mes . ' ' . $currentYear . "</h1>";
        echo '</div>';

        echo generar_calendario($currentMonth, $currentYear, "es");
        ?>

        <div class="container">
            <button onclick="changeMonth(-1)" <?php if ($currentMonth == date('n')) echo "disabled"; ?>>Anterior</button>
            <button onclick="changeMonth(1)" <?php if ($currentMonth == 12) echo "disabled"; ?>>Siguiente</button>
        </div>

        <script>
            function changeMonth(delta) {
                var currentMonth = parseInt('<?php echo $currentMonth; ?>') + delta;
                var currentYear = parseInt('<?php echo $currentYear; ?>');

                // Redirige a la misma página con los nuevos valores del mes y el año
                window.location.href = '?month=' + currentMonth + '&year=' + currentYear;
            }
            
            document.addEventListener("DOMContentLoaded", function() {
    
   
    var calendarDays = document.querySelectorAll('.calendar-day');
    calendarDays.forEach(function(day) {
        if (day.querySelector('.novedad')) {
            day.style.backgroundColor = 'red';
        }
    });
});

        </script>

    </body>
</html>
