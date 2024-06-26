<?php
session_start();

require '../../fpdf/fpdf.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

function randomString($length = 4) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generarClave() {
    return randomString() . '-' . randomString() . '-' . randomString() . '-' . randomString();
}

function procesarCompra($usuarioID, $pdf) {
    $output = "";

    require '../bd.php'; // Conectar a la base de datos
    // Consultar los detalles del carrito del usuario
    $selCarrito = "SELECT cj.juegoID, j.nombre, cj.precio, cj.cantidad
                  FROM carrito_juegos cj
                  INNER JOIN juegos j ON cj.juegoID = j.juegoID
                  WHERE cj.carritoID IN (SELECT carritoID FROM carrito WHERE usuarioID = :usuarioID)";
    $stmtCarrito = $bd->prepare($selCarrito);
    $stmtCarrito->bindParam(':usuarioID', $usuarioID);
    $stmtCarrito->execute();
    $carrito = $stmtCarrito->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si el carrito está vacío
    if (empty($carrito)) {
        $output .= "El carrito está vacío. No hay nada que procesar.";
        return $output;
    }

    // Configuración del PDF
    $pdf->SetFont('helvetica', '', 10);
    $pdf->SetFillColor(220, 220, 220); // Color de fondo de las filas alternas
    $pdf->SetLineWidth(0.2);

    $pdf->Cell(0, 10, 'Detalles de la compra:', 0, 1);

    // Encabezados de la tabla
    $pdf->Cell(90, 10, 'Nombre del Juego', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Precio ', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Cantidad ', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Total ', 1, 1, 'C');

    $totalPrecioJuegos = 0; // Inicializar total de precios de juegos

    // Array para almacenar las claves de los juegos
    $clavesJuegos = [];

    foreach ($carrito as $item) {
        $nombreJuego = $item['nombre'];
        $precio = $item['precio'];
        $cantidad = $item['cantidad'];

        // Ajustar altura de la fila según la longitud del nombre del juego
        $alturaCelda = ceil((strlen($nombreJuego) / 30) * 10) + 5;

        // Eliminar caracteres no deseados y convertir la codificación del nombre del juego
        $nombreJuego = iconv('UTF-8', 'windows-1252//TRANSLIT', preg_replace('/[^\w\s-]/', '', $nombreJuego));

        $pdf->Cell(90, $alturaCelda, $nombreJuego, 1, 0);
        $pdf->Cell(30, $alturaCelda, number_format($precio, 2, ',', '.'), 1, 0, 'C');
        $pdf->Cell(30, $alturaCelda, $cantidad, 1, 0, 'C');
        $pdf->Cell(30, $alturaCelda, number_format($precio * $cantidad, 2, ',', '.'), 1, 1, 'C');

        $totalPorJuego = $precio * $cantidad;
        $totalPrecioJuegos += $totalPorJuego; // Sumar al total de precios de juegos

        // Generar claves únicas para cada juego según la cantidad
        for ($i = 0; $i < $cantidad; $i++) {
            $clavesJuegos[] = [
                'nombre' => $nombreJuego,
                'clave' => generarClave()
            ];
        }
    }

    // Calcular el total de la compra en euros
    $totalCompra = array_sum(array_column($carrito, 'precio')) * array_sum(array_column($carrito, 'cantidad'));

    $output .= "Total: " . number_format($totalCompra, 2, ',', '.');

    // Mostrar el total de todos los juegos comprados
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'Total de todos los juegos comprados: ' . number_format($totalPrecioJuegos, 2, ',', '.') . ' Euros', 0, 1);

    // Añadir tabla con las claves de los juegos
    $pdf->Ln(10); // Añadir espacio
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 10, 'Claves de los juegos:', 0, 1);

    // Encabezado de la tabla de claves
    $pdf->Cell(90, 10, 'Nombre del Juego', 1, 0, 'C');
    $pdf->Cell(90, 10, 'Clave', 1, 1, 'C');

    // Llenar la tabla con las claves de los juegos
    foreach ($clavesJuegos as $item) {
        $nombreJuego = $item['nombre'];
        $clave = $item['clave'];

        $alturaCelda = ceil((strlen($nombreJuego) / 30) * 10) + 5;
        $pdf->Cell(90, $alturaCelda, $nombreJuego, 1, 0);
        $pdf->Cell(90, $alturaCelda, $clave, 1, 1);
    }

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

    require '../bd.php'; 
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

// Guardar el PDF en una variable en memoria
    $pdfContent = $pdf->Output('S'); // Generar el PDF en memoria y obtener el contenido
// Adjuntar el PDF al correo electrónico desde la memoria
    $mail->addStringAttachment($pdfContent, 'detalles_compra.pdf');

    try {
        // Enviar el correo electrónico
        $mail->send();
        
        header("Location: ../PaginasPrincipales/PagPrincipal.php");
    } catch (Exception $e) {
        echo 'Error al enviar correo electrónico: ', $e->getMessage();
    }
}

$usuarioID = $_SESSION['UsuarioID'];
enviarCorreoCompra($usuarioID);
?>
