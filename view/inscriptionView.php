<?php
    $title = "inscription";
    ob_start();
?>

<section>
		<div class="text-center" >
			<h1 class="pb-4 text-dark-1">S'inscrire</h1>

			<?php if(isset($_GET['error']) && isset($_GET['message'])) {

				echo '<div class="text-danger">'.htmlspecialchars($_GET['message']).'</div>';

			} else if(isset($_GET['success'])) {

				echo '<div class="text-danger">Vous êtes désormais inscrit. <a href="identification.php">Connectez-vous</a>.</div>';

			} ?>

			<form method="post" class="d-flex flex-column w-50 h-50 m-auto mb-3" action="?page=inscription">
			<input class="mb-4 py-2 border-1  rounded-top-3 ps-2" type="text" name="pseudo" placeholder="Votre pseudo" required />
				<input class="mb-4 py-2 border-1  rounded-top-3 ps-2" type="email" name="email" placeholder="Votre adresse email" required />
				<input class="mb-4 py-2 ps-2  " type="password" name="password" placeholder="Mot de passe" required />
				<input class="mb-4 py-2 ps-2  " type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
				<button class=" bg-card-color-1 border-1 rounded-bottom-3 py-3 text-center text-white" type="submit">S'inscrire</button>
			</form>

			<p class="text-dark-1">Déjà inscrit ? <a href="?page=identification">Connectez-vous</a>.</p>
		</div>
	</section>

	<?php
    $content = ob_get_clean();

    require('base.php');
?>