<?php
session_start();

session_destroy();

header("Location: /Web/PaginasPrincipales/index.php");
exit(); 

?>
