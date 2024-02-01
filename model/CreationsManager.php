<?php
require_once('Manager.php');

class CreationsManager extends Manager {

 public function getCreations() {
   
    $bdd = $this->connection();
    $requete = $bdd->query('SELECT * FROM creations');
     return $requete;
}

}
 

