<?php
    $title = "inscription";

    ob_start();

    // Connexion à la bdd
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=formation_php;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }

    //Variable
		$story         =htmlspecialchars($_POST['texte']);
        // $email         =htmlspecialchars($_POST['email']);
        $nombre        =htmlspecialchars($_POST['number']);

    // Ajouter des donnée
    $requete = $bdd->prepare('INSERT INTO commentaires(contenu, utilisateur_id ) VALUES(?, ?)');
    $requete->execute([$story, $nombre]);
    
    // supprimer des donnée
    $requete = $bdd->prepare('DELETE FROM commentaires Where contenu = :id');
    $requete->execute(
        [
            'id'=> 'je reviendrais demain avec le reste de ma famille'
        ]
    );

    // modifier les donner
    //  $requete = $bdd->prepare('UPDATE commentaires SET contenu = :newContenu WHERE utilisateur_id = :userd');
    //  $requete->execute([
    //    'newContenu' => 'il change que le 7',
    //    'userd'=> 7
    //  ]);


         // creation de la requete
         $reponse = $bdd->prepare('SELECT * FROM commentaires');
         $reponse->execute();
         // Affichage 
        

	
?>

<section>
		<div class="text-center" >
			<h1 class="pb-4 text-dark-1">S'inscrire</h1>

			<?php if(isset($_GET['error']) && isset($_GET['message'])) {

				echo '<div class="text-danger">'.htmlspecialchars($_GET['message']).'</div>';

			} else if(isset($_GET['success'])) {

				echo '<div class="text-danger">Vous êtes désormais inscrit. <a href="identification.php">Connectez-vous</a>.</div>';

			} ?>

			<form method="post" class="d-flex flex-column w-50 h-50 m-auto mb-3" action="test.php">
				<div class="text-dark">
                <input type="number" name="number" required />
                <label for="story">Tell us your story:</label>
                <textarea id="texte" name="texte" rows="5" cols="33" require>
                It was a dark and stormy night...
                </textarea>
                </div>
				<button class=" bg-card-color-1 border-1 rounded-bottom-3 py-3 text-center text-white" type="submit">S'inscrire</button>
			</form>

			<p class="text-dark-1">Déjà inscrit ? <a href="test.php">Connectez-vous</a>.</p>

            <?php 
             while($commentaire = $reponse->fetch()) {
                echo '<div class="text-dark-1 m-2">' .$commentaire['contenu']. '<br>' .$commentaire['date'].'</div>';
             }
            
            ?>

		</div>


	</section>

	<?php
    $content = ob_get_clean();

    require('base2.php');
?>