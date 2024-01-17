<?php
    $title = "Identification";
	session_start();
	ob_start();

	// require_once('src/option.php');

	if(!empty($_POST['email']) && !empty($_POST['password'])) {

		// Connexion à la bdd
		require_once('connection.php');

		// Variables
		$email			= htmlspecialchars($_POST['email']);
		$password		= htmlspecialchars($_POST['password']);
		$pseudo        =htmlspecialchars($_POST['pseudo']);

		// L'adresse email est-elle correcte ?
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			header('location: identification.php?error=1&message=Votre adresse email est invalide.');
			exit();

		}

		// Chiffrement du mot de passe
		$password = "b1k".sha1($password."432")."82";

		// L'adresse email est-elle bien utilisée ?
		$req = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM user WHERE email = ?');
		$req->execute([$email]);

		while($emailVerification = $req->fetch()) {

			if($emailVerification['numberEmail'] != 1) {

				header('location: identification.php?error=1&message=Impossible de vous authentifier correctement.');
				exit();

			}

		}

		// Connexion
		$req = $bdd->prepare('SELECT * FROM user WHERE email = ?');
		$req->execute([$email]);

		while($user = $req->fetch()) {

			if($password == $user['password'] && $pseudo == $user['pseudo']) {

				$_SESSION['connect'] = 1;
				$_SESSION['email']	 = $user['email'];
				$_SESSION['pseudo']  = $user['pseudo'];

				if(isset($_POST['auto'])) {

					setcookie('auth', $user['secret'], time() + 365*24*3600, '/', null, false, true);

				}

				// header('location: identification.php?success=1');
				header('location: index.php');
				exit();

			}
			else {

				header('location: identification.php?error=1&message=Impossible de vous authentifier correctement.');
				exit();

			}

		}

	}

?>
	
	<section>
		<div id="login-body" class="text-center pb-4 text-dark-1">

				<?php if(isset($_SESSION['connect'])) { ?>

					<h1>Bonjour !</h1>
					<?php
					if(isset($_GET['success'])){
						echo'<div class="alert success text-danger">Vous êtes maintenant connecté.</div>';
					} ?>
					<p>Qu'allez-vous regarder aujourd'hui ?</p>
					<small><a href="logout.php">Déconnexion</a></small>

				<?php } else { ?>
					<h1>S'identifier</h1>

					<?php if(isset($_GET['error'])) {

						if(isset($_GET['message'])) {
							echo'<div class="text-danger">'.htmlspecialchars($_GET['message']).'</div>';
						}

					} ?>

					<form method="post" class="d-flex flex-column w-50 h-50 m-auto mb-3" action="identification.php">
					<input class="mb-4 py-2 border-1  rounded-top-3 ps-2" type="text" name="pseudo" placeholder="Votre pseudo" required />
						<input class="mb-4 py-2 border-1  rounded-top-3 ps-2" type="email" name="email" placeholder="Votre adresse email" required />
						<input class="mb-4 py-2 ps-2" type="password" name="password" placeholder="Mot de passe" required />
						<button class=" bg-card-color-1 border-1 rounded-bottom-3 py-3 text-center text-white" type="submit">S'identifier</button>
						<label class="text-danger" id="option"><input class="text-danger" type="checkbox" name="auto" checked />Se souvenir de moi</label>
					</form>
				

					<p class="grey">Première visite sur le site ? <a href="inscription2.php">Inscrivez-vous</a>.</p>
				<?php } ?>
		</div>
	</section>

	<?php
    $content = ob_get_clean();

    require('base2.php');
	?>
</body>
</html>