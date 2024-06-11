<?php

$html = "";

$html .= "<!DOCTYPE html>";
$html .= "<html lang='es'>";
$html .= "<head>";
$html .= "<meta charset='UTF-8'>";
$html .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
$html .= "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";
$html .= "<link rel='stylesheet' href='../../assets/cssPlus/cssPlus.css'>";
$html .= "<title>Acceso Restringido</title>";
$html .= "</head>";
$html .= "<body>";
$html .= "<div class='container mt-5'>";
// Alerta de error
$html .= "<div class='alert alert-danger text-center mb-5' role='alert'>";
$html .= "La página que buscas no existe";
// Botón para volver al inicio de sesión
$html .= "<button class='btn btn-dark ml-4' onclick='window.location.href=\"../../PaginasPrincipales/index.php\"'>Volver a Inicio de Sesión</button>";
$html .= "</div>"; // Fin de la alerta
$html .= "<div class='text-center'>"; 
// Imagen de error 404
$html .= "<img src='../../Imagenes/Imagenes/404.jpg' class='img-fluid mt-2' alt='Imagen'>";
$html .= "</div>"; 
$html .= "</div>";
$html .= "</body>";
$html .= "</html>";

echo $html;
