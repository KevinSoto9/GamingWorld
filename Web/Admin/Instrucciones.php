<?php
require('../../fpdf/fpdf.php');

class PDF extends FPDF {
    function __construct($orientation='P', $unit='mm', $size='A4') {
        parent::__construct($orientation, $unit, $size);
        $this->SetAutoPageBreak(true, 10);
        $this->SetFont('Arial', '', 12);
    }

    // Método para renderizar las instrucciones con formato
    function RenderInstructions($title, $content) {
        // Título
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 2, utf8_decode($title), 2, 1, 'L');
        $this->Ln();

        // Contenido
        $this->SetFont('Arial', '', 12);
        // Agregar padding solo en la parte inferior
        $paddingBottom = 8;
        $this->MultiCell(0, 6, utf8_decode($content), 0, 'L');
        $y = $this->GetY();
        $this->SetY($y + $paddingBottom);
        $this->Ln();
    }
}

// Crear instancia de PDF
$pdf = new PDF();
$pdf->AddPage();

// Configurar documento
$pdf->SetTitle('Instrucciones');
$pdf->SetAuthor('Tu nombre');

// Renderizar las instrucciones
$pdf->RenderInstructions('-Instrucciones para insertar un Juego:', '
Para poder insertar un juego este debe tener tanto sus géneros, desarrollador y editor añadido de lo contrario el juego no se mostrará
Primero insertar la información del juego, la imagen debe llamarse de la misma manera que el nombre del juego con extension .jpg y debe ser de 600x900
Segundo hay que crear si es necesario el género o géneros al que pertenece y tras eso o si ya están creados insertar los géneros en el juego
Tercero hay que crear si es necesario el desarrollador al que pertenece y tras eso o si ya está creado insertar el desarrollador en el juego
Cuarto hay que crear si es necesario el editor al que pertenece y tras eso o si ya está creado insertar el editor al juego
Tras eso el juego debería poder visualizarse');

$pdf->RenderInstructions('-Instrucciones para añadir géneros a un Juego:', '
Para poder añadir géneros a un juego, estos tienen que estar creados anteriormente
Primero hay que elegir el juego en el listado que aparece, y luego los géneros
Al añadir los géneros no se pueden repetir, si lo intentas saldrá un mensaje diciendo lo anterior
Tras eso se deberían haber añadido correctamente');

$pdf->RenderInstructions('-Instrucciones para añadir un desarrollador/editor a un Juego:', '
Para poder añadir un desarrollador/editor a un juego, este tienen que estar creado anteriormente
Primero hay que elegir el juego en el listado que aparece, y luego el desarrollador/género
Tras eso se debería haber añadido correctamente');

$pdf->RenderInstructions('-Instrucciones para insertar una Novedad:', '
Para poder insertar una novedad, la fecha debe ser mayor a la actual
No hace falta información de géneros, desarrolladores o editores, solo la que pone en el formulario , la imagen debe llamarse de la misma manera que el nombre del juego con extension .jpg y debe ser de 600x900, tras eso enviarlo
Tras eso se debería haber añadido correctamente');

$pdf->RenderInstructions('-Instrucciones para crear una Noticia:', '
Primero debes crear la noticia principal en sí, sin detalles
Tras eso deberás poner los detalles de la noticia, la imagen debe llamarse de la misma manera que el titulo del noticia con extension .jpg y debe ser de 1024x1024
Si intentas ver la noticia sin haber creado sus detalles, esta no aparecerá
Tras haber insertado todo lo necesario deberías poder ver la noticia y toda la información de los detalles, la imagen de los detalles debe llamarse de la misma manera que el titulo del noticia con extension .jpg y debe ser de 960x540');

$pdf->RenderInstructions('-Instrucciones para crear un Usuario Admin:', '
El correo debe terminar en @gamingworld.com, de lo contrario no te dejará crearlo
La contraseña debe tener mínimo 8 caracteres y debe ser la misma que en confirmar contraseña
Tras eso envías los datos y se debería crear el usuario administrador');

// Salida del PDF como descarga
$pdf->Output('D', 'instrucciones.pdf');
?>
