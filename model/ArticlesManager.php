<?php

require_once('Manager.php');

class ArticlesManager extends Manager {

 public function getArticles() {
   
    $bdd = $this->connection();
    $requete = $bdd->query('SELECT * FROM creations');
     return $requete;
}

}
 

