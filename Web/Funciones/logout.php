<?php
session_start();

session_destroy();

header("Location: ../PaginasPrincipales/index.php");
exit(); 

?>
