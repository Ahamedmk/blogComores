<?php
$title = "Erreur";

ob_start();
session_start();

// Connexion à la bdd
// require_once('model/userModel.php');
?>
<div class="container text-dark-1 flex-grow-1 flex-shrink-0 mt-4 h1">
Il n'y a pas de contenue !!!
</div>

<?php
$content = ob_get_clean();
require('base.php');
?>
