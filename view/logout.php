<?php
if (session_status() === PHP_SESSION_NONE){
    session_start(); // Initialiser
}
    
    session_unset(); // Désactiver
    session_destroy(); // Détruir

    setcookie('auth', '', time() - 1);

    header('location: inscriptionView.php');
    exit();