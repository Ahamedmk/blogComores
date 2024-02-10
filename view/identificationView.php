<?php
    $title = "Identification";	
	ob_start();
?>
	
	<section class="container flex-grow-1 flex-shrink-0 pb-5">
		<div id="login-body" class="text-center pb-4 text-dark-1">
                 
				<?php if(isset($_SESSION['connect'])) {?>


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

					<form method="post" class="d-flex flex-column w-50 h-50 m-auto mb-3" action="?page=identification">
					<input class="mb-4 py-2 border-1  rounded-top-3 ps-2" type="text" name="pseudo" placeholder="Votre pseudo" required />
						<input class="mb-4 py-2 border-1  rounded-top-3 ps-2" type="email" name="email" placeholder="Votre adresse email" required />
						<input class="mb-4 py-2 ps-2" type="password" name="password" placeholder="Mot de passe" required />
						<button class=" bg-card-color-1 border-1 rounded-bottom-3 py-3 text-center text-white" type="submit">S'identifier</button>
						<label class="text-danger" id="option"><input class="text-danger" type="checkbox" name="auto" checked />Se souvenir de moi</label>
					</form>
				

					<p class="grey">Première visite sur le site ? <a href="?page=inscription">Inscrivez-vous</a>.</p>
				<?php } ?>
		</div>
	</section>

	<?php
    $content = ob_get_clean();

    require('base.php');
	?>
</body>
</html>