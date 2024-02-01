<?php
$title = "Erreur";

ob_start();
session_start();

// Connexion à la bdd
require_once('model/userModel.php');
?>

<div> Il n'y a pas de contenue</div>

<?php
$content = ob_get_clean();
require('base.php');
?>
