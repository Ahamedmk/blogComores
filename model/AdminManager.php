<?php
require_once('Manager.php');

class AdminManager extends Manager {

    public function getAdmin() {
        $bdd = $this->connection();
        $requete = $bdd->query('SELECT * FROM creations');
        return $requete;
    }

    public function addAdmin($titre, $description) {
        $bdd = $this->connection();

        if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            // L'image est trop lourde ?
            if($_FILES['image']['size'] <= 3000000) {

                $informationsImage = pathinfo($_FILES['image']['name']);
                $extensionImage = $informationsImage['extension'];
                $extensionArray = ['png', 'gif', 'jpg', 'jpeg'];

                if(in_array($extensionImage, $extensionArray)) {

                    $newImageName = time().rand().rand().'.'.$extensionImage;
                    $deplacer_img = move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$newImageName);
                    
                    if($deplacer_img) {  
                        $req = $bdd->prepare('INSERT INTO creations(photos, titre, commentaire) VALUES(?, ?, ?)');
                        $req->execute([$newImageName, $titre, $description]);
                        echo 'Envoi effectué avec succès';
                    } else {
                        echo 'Envoi effectué sans succès';
                    }  
                }
            }
        }
    }
}
?>
