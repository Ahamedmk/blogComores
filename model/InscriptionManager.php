<?php
require_once('Manager.php');

class InscriptionManager extends Manager {

    public function getInscription() {
        $bdd = $this->connection();
        $requete = $bdd->query('SELECT * FROM user');
        return $requete;
    }

    public function addInscrit($email, $password, $passwordTwo, $pseudo) {

        $bdd = $this->connection();

        //Les mots de passe sont-ils différents ?
        if($password != $passwordTwo) {
            header('location: ?page=inscription&error=1&message=Vos mots de passe ne sont pas identiques');
            exit();
        }
        
        // L'adresse email est-elle correcte ?
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('location: ?page=inscription&error=1&message=Votre adresse email est invalide.');
            exit();
        }

        //L'adresse email est-elle en doublon ?
        $req = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM user WHERE email = ?');
        $req->execute([$email]);

        while($emailVerification = $req->fetch()) {
            if($emailVerification['numberEmail'] != 0) {
                header('location: ?page=inscription&error=1&message=Votre email est déjà utilisé par un autre utilisateur');
                exit();
            }
        }
        
        // Chiffrement du mot de passe
        $password = "b1k" . sha1($password . "432") . "82";
       
        // Génération d'un secret
        $secret = sha1($email) . time();
        $secret = sha1($secret) . time();

        // Ajouter un utilisateur
        $req = $bdd->prepare('INSERT INTO user(pseudo, email, password, secret) VALUES(?, ?, ?, ?)');
        $req->execute([$pseudo, $email, $password, $secret]);

        header('location: ?page=inscription&success=1');
        exit();
    }
}
