<?php
    $title = "inscription";

    ob_start();

	if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])) {

		// Connexion à la bdd
		require_once('connection.php');

		//Variable
		$email         =htmlspecialchars($_POST['email']);
		$password         =htmlspecialchars($_POST['password']);
		$passwordTwo         =htmlspecialchars($_POST['password_two']);

		//Les mots de passe sont ils différents ?
		if($password !=$passwordTwo) {

			header('location: inscription2.php?error=1&message=Vos mots de passe ne sont pas identique');
			exit();

		}
		
		// L'adresse email est-elle correct
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			header('location: inscription2.php?error=1&message=Votre adresse email est invalide.');
			exit();			

		}

		//L'adresse email est-elle en doublon?
		$req = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM user WHERE email = ?');
		$req->execute([$email]);

		while($emailVerification = $req->fetch()) {

			if($emailVerification['numberEmail'] != 0) {
				header('location: inscription2.php?error=1&message=Votre email est déja utilisé par un autre utilisateur');
				exit();
			}
		}
		
       // Chiffrement du mot de passe
       $password = "b1k".sha1($password."432")."82";
	   
	   //secret
	   $secret = sha1($email).time();
	   $secret = sha1($secret).time();

	   // Ajouter un utilisateur
	   $req = $bdd->prepare('INSERT INTO user(email, password, secret) VALUES(?, ?, ?)');
	   $req->execute([$email, $password, $secret]);

	   header('location: inscription2.php?success=1');
	   exit();
	}
?>

<section>
		<div class="text-center" >
			<h1 class="pb-4 text-dark-1">S'inscrire</h1>

			<?php if(isset($_GET['error']) && isset($_GET['message'])) {

				echo '<div class="text-danger">'.htmlspecialchars($_GET['message']).'</div>';

			} else if(isset($_GET['success'])) {

				echo '<div class="text-danger">Vous êtes désormais inscrit. <a href="identification.php">Connectez-vous</a>.</div>';

			} ?>

			<form method="post" class="d-flex flex-column w-50 h-50 m-auto mb-3" action="inscription2.php">
				<input class="mb-4 py-2 border-1  rounded-top-3 ps-2" type="email" name="email" placeholder="Votre adresse email" required />
				<input class="mb-4 py-2 ps-2  " type="password" name="password" placeholder="Mot de passe" required />
				<input class="mb-4 py-2 ps-2  " type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
				<button class=" bg-card-color-1 border-1 rounded-bottom-3 py-3 text-center text-white" type="submit">S'inscrire</button>
			</form>

			<p class="text-dark-1">Déjà inscrit ? <a href="identification.php">Connectez-vous</a>.</p>
		</div>
	</section>

	<?php
    $content = ob_get_clean();

    require('base2.php');
?>