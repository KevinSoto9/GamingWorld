<?php
session_start();

require 'fpdf/fpdf.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Función para procesar la compra y generar el contenido del PDF
function procesarCompra($usuarioID, $pdf) {
    $output = "";

    require 'bd.php';
    $selCarrito = "SELECT cj.juegoID, j.nombre, cj.precio, cj.cantidad 
                 FROM carrito_juegos cj 
                 INNER JOIN juegos j ON cj.juegoID = j.juegoID 
                 WHERE cj.carritoID IN (SELECT carritoID FROM carrito WHERE usuarioID = :usuarioID)";
    $stmtCarrito = $bd->prepare($selCarrito);
    $stmtCarrito->bindParam(':usuarioID', $usuarioID);
    $stmtCarrito->execute();
    $carrito = $stmtCarrito->fetchAll(PDO::FETCH_ASSOC);

    if (empty($carrito)) {
        $output .= "El carrito está vacío. No hay nada que procesar.";
        return $output;
    }

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, utf8_decode('Detalles de la compra:'), 0, 1);
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 10, utf8_decode('Nombre del Juego'), 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode('Precio (€)'), 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode('Cantidad'), 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode('Total por Juego (€)'), 1, 1, 'C');

    $totalPrecioJuegos = 0; // Inicializamos el total de precios de los juegos

    foreach ($carrito as $item) {
        $nombreJuego = $item['nombre'];
        $precio = $item['precio'];
        $cantidad = $item['cantidad'];

        $totalPorJuego = $precio * $cantidad;
        $totalPrecioJuegos += $totalPorJuego; // Sumamos al total de precios de los juegos

        $pdf->Cell(50, 10, utf8_decode($nombreJuego), 1, 0);
        $pdf->Cell(40, 10, utf8_decode(number_format($precio, 2, ',', '.') . ' €'), 1, 0, 'C');
        $pdf->Cell(40, 10, utf8_decode($cantidad), 1, 0, 'C');
        $pdf->Cell(40, 10, utf8_decode(number_format($totalPorJuego, 2, ',', '.') . ' €'), 1, 1, 'C');
    }

    // Calcular el total de la compra en euros
    $totalCompra = array_sum(array_column($carrito, 'precio')) * array_sum(array_column($carrito, 'cantidad'));

    $output .= "Total de la compra: " . number_format($totalCompra, 2, ',', '.') . ' €';

    // Mostrar el total de todos los juegos comprados
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, utf8_decode('Total de todos los juegos comprados: '.$totalPrecioJuegos), 0, 0);

    // Eliminar los elementos del carrito de la base de datos
    $delCarrito = "DELETE FROM carrito_juegos WHERE carritoID IN (SELECT carritoID FROM carrito WHERE usuarioID = :usuarioID)";
    $stmtDelCarrito = $bd->prepare($delCarrito);
    $stmtDelCarrito->bindParam(':usuarioID', $usuarioID);
    $stmtDelCarrito->execute();

    return $output;
}

// Función para enviar el correo de confirmación de la compra
function enviarCorreoCompra($usuarioID) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'zoidel97@gmail.com'; 
    $mail->Password = 'zham llez etie fggc'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 

    $mail->setFrom('zoidel97@gmail.com');

    require 'bd.php'; 
    $selEmail = "SELECT Email FROM usuarios WHERE UsuarioID = :usuarioID";
    $stmtEmail = $bd->prepare($selEmail);
    $stmtEmail->bindParam(':usuarioID', $usuarioID);
    $stmtEmail->execute();
    $email = $stmtEmail->fetchColumn();

    $mail->addAddress($email);

    $mail->Subject = 'Compra realizada correctamente';
    $mail->isHTML(false); 
    $mail->Body = "Tu compra ha sido procesada con éxito.\n\n";

    // Crear instancia de FPDF
    // Crear instancia de FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetTitle('Detalles de la Compra');
    $pdf->SetFont('Arial', '', 12);

// Configurar codificación de caracteres UTF-8
    $pdf->AddFont('Arial', '', 'times.php'); // Asegúrate de que el archivo arial.php esté presente
    $pdf->SetFont('Arial', '', 12);

// Agregar las líneas de texto en el PDF
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, utf8_decode('La compra se ha realizado con éxito'), 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, utf8_decode('Mira los detalles de la compra en el siguiente PDF:'), 0, 1, 'C');
    $pdf->Ln();

// Procesar la compra y agregar detalles al PDF
    $contenidoPDF = procesarCompra($usuarioID, $pdf);

// Guardar el PDF en una variable
    ob_start();
    $pdf->Output('F', 'detalles_compra.pdf'); // Guardar el PDF en un archivo
    ob_end_clean();
    $pdfContent = file_get_contents('detalles_compra.pdf');

// Adjuntar el PDF al correo electrónico
    $mail->addStringAttachment($pdfContent, 'detalles_compra.pdf');

    // Adjuntar el PDF al correo electrónico
    $mail->addStringAttachment($pdfContent, 'detalles_compra.pdf');

    try {
        // Enviar el correo electrónico
        $mail->send();
        
        header("Location: PagPrincipal.php");
    } catch (Exception $e) {
        echo 'Error al enviar correo electrónico: ', $e->getMessage();
    }
}

$usuarioID = $_SESSION['UsuarioID'];
enviarCorreoCompra($usuarioID);
?>
