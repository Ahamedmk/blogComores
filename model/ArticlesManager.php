<?php

require_once('Manager.php');

class ArticlesManager extends Manager {

 public function getArticles() {
   
    $bdd = $this->connection();

    if (isset($_GET['id'])) {
      $article_id = $_GET['id'];
      $requete = $bdd->prepare('SELECT * FROM creations WHERE id = :article_id');
      $requete->execute(array('article_id' => $article_id));

    }
   //  $requete = $bdd->query('SELECT * FROM creations');
   //   return $requete;
}

}
 

