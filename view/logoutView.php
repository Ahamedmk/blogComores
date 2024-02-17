<?php
 $title = "logout";

 ob_start();
if (session_status() === PHP_SESSION_NONE){
    session_start(); // Initialiser
}
    
    session_unset(); // Désactiver
    session_destroy(); // Détruire

    setcookie('auth', '', time() - 1);

    header('location:index.php?page=inscription');
    exit();

$content = ob_get_clean();
require('base.php');