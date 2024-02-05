<?php
require_once('Manager.php');

class CreationsManager extends Manager {

 public function getCreations() {
   
    $bdd = $this->connection();
    $requete = $bdd->query('SELECT * FROM creations');
     return $requete;
}
  public function postCreations($contenu, $contenu_id) {
   $bdd = $this->connection();
   $requeteModifier = $bdd->prepare('UPDATE creations SET commentaire = :contenu WHERE id = :contenu_id ' );
   $result = $requeteModifier->execute(['contenu' => $contenu, 'contenu_id' => $contenu_id]);
    
   return $result;
  }

  public function suppCreations($suppr_id) {
    $bdd = $this->connection();
    $requeteSupprimer = $bdd->prepare('DELETE FROM creations WHERE id = :suppr_id');
    $result = $requeteSupprimer->execute(['suppr_id' => $suppr_id]);

    return $result;
  }
}
 

