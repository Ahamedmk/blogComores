<?php
require_once('Manager.php');

class IdentificationManager extends Manager {

    public function getIdentification() {
        $bdd = $this->connection();
        $requete = $bdd->query('SELECT * FROM user');
        return $requete;
    }

    public function addIdentifie($email, $password, $pseudo) {

        $bdd = $this->connection();

        // L'adresse email est-elle correcte ?
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header('Location: ?page=identification&error=1&message=Votre adresse email est invalide.');
			exit();
		}

		// Chiffrement du mot de passe
		$password = "b1k" . sha1($password . "432") . "82";

		// Vérification si l'adresse email est bien utilisée
		$req = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM user WHERE email = ?');
		$req->execute([$email]);
		$emailVerification = $req->fetch();

		if($emailVerification['numberEmail'] != 1) {
			header('Location: ?page=identification&error=1&message=Impossible de vous authentifier correctement.');
			exit();
		}

		// Récupération des informations de l'utilisateur
		$req = $bdd->prepare('SELECT * FROM user WHERE email = ?');
		$req->execute([$email]);
		$user = $req->fetch();

		if($password == $user['password'] && $pseudo == $user['pseudo']) {
			// Authentification réussie
			$_SESSION['connect'] = 1;
			$_SESSION['email']	 = $user['email'];
			$_SESSION['pseudo']  = $user['pseudo'];
			$_SESSION['id']      = $user['id'];
       
			if(isset($_POST['auto'])) {
				setcookie('auth', $user['secret'], time() + 365*24*3600, '/', null, false, true);
			}

			header('Location: index.php');
			exit();
		}
		else {
			// Échec de l'authentification
			header('Location: ?page=identification&error=1&message=Impossible de vous authentifier correctement.');
			exit();
		}
	}
}
?>
