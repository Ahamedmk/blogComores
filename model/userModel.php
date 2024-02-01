<?php

function getCreations() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=comores;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }

    $requete = $bdd->query('SELECT * FROM creations');
     return $requete;
}
 function getArticles() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=comores;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }

     $requete = $bdd->query('SELECT * FROM creations');
      return $requete;
 }