<?php

    $html .= "<!DOCTYPE html>";
    $html .= "<html lang='es'>";
    $html .= "<head>";
    $html .= "<meta charset='UTF-8'>";
    $html .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    $html .= "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";
    $html .= "<link rel='stylesheet' href='../assets/cssPlus/cssPlus.css'>";
    $html .= "<title>Acceso Restringido</title>";
    $html .= "</head>";
    $html .= "<body>";
    $html .= "<div class='container mt-5'>";
    $html .= "<div class='alert alert-danger text-center' role='alert'>";
    $html .= "No has iniciado sesión como administrador.";
    $html .= "<button class='btn btn-dark ml-4' onclick='window.location.href=\"../index.php\"'>Iniciar sesión</button>";
    $html .= "</div>";
    $html .= "<div class='text-center'>"; 
    $html .= "<img src='../Imagenes/PersonalAutorizado.jpg' class='img-fluid mt-2' alt='Imagen'>";
    $html .= "</div>";
    $html .= "</div>";
    $html .= "</body>";
    $html .= "</html>";
   
    echo $html;