<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentaire_id = $_POST["commentaire_id"];

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=formation_php;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur :' . $e->getMessage());
    }

    $requete = $bdd->prepare('DELETE FROM commentaires WHERE id = :commentaire_id');
    $requete->execute(array('commentaire_id' => $commentaire_id));

?>