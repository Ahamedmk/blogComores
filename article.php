<?php
    $title = "articles";

    ob_start();
    session_start();

    // Connexion à la bdd
    
		require_once('connection.php');


        //Variable
        
		$contenu         = isset($_POST['contenu']) ? htmlspecialchars($_POST['contenu']) : '';
        // $email         =htmlspecialchars($_POST['email']);
        $id_utilisateur        = isset($_POST['id_utilisateur']) ? htmlspecialchars($_POST['id_utilisateur']) : '';

        // $contenu   = htmlspecialchars($_POST['contenu']);

    $requete = $bdd->prepare('INSERT INTO commentaires(contenu,utilisateur_id ) VALUES(?, ?)');
           $requete->execute([$contenu, $id_utilisateur]);

           if(isset($_GET['id'])) {
            $article_id = $_GET['id'];

          // Récupération des détails de l'article depuis la base de données
$requete = $bdd->prepare('SELECT * FROM creations WHERE id = :article_id');
$requete->execute(array('article_id' => $article_id));

if ($requete->rowCount() > 0) {
    // Utilisez fetch pour récupérer une seule ligne, car vous utilisez WHERE id = :article_id
    $article = $requete->fetch();

    echo '<h1 class="text-shade-red-1">' . $article['titre'] . '</h1>';
    echo '<p class="text-shade-red-1">' . $article['commentaire'] . '</p>';
} else {
    echo "Article non trouvé";
}
           }

        
        //where
        $requete = $bdd->query('SELECT contenu, day_date, pseudo
         FROM commentaires, user
          WHERE user.id = commentaires.utilisateur_id');

       
    
     
	
?>

<section class="text-dark-1">
		<div class="text-center" >
        <!-- <div class="text-center"> -->
          <!-- <img src="ressources/images/IMG_20171024_144321.jpg" class="shadow p-3 mb-5 rounded w-50 mt-5" alt="ananas"> -->
        <!-- </div> -->
        <!-- <h1 class="pt-5">Moroni</h1> -->

        <!-- <p class=" lead text-start">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tincidunt placerat ante ut elementum. Vivamus mollis est sed enim iaculis, tempor dapibus turpis convallis. Pellentesque varius finibus molestie. Maecenas pellentesque lectus nec bibendum lobortis. Pellentesque egestas maximus sem. Vestibulum vulputate quis est a interdum. Nam at accumsan dolor. Phasellus porta nisi velit, tempus hendrerit mauris facilisis vel. Ut quis massa laoreet, dapibus libero sit amet, facilisis est. Cras efficitur elit nec mattis dictum. Proin posuere nulla cursus ultrices facilisis. Vivamus posuere ultricies tellus, quis sodales lectus iaculis vitae. In ultricies faucibus neque, id ullamcorper ex. Etiam eget lorem vitae metus pellentesque volutpat sit amet sit amet nulla.
        Maecenas sagittis tempus mi porttitor lacinia. Vestibulum mattis laoreet eros ac cursus. Donec fringilla porta condimentum. Phasellus malesuada auctor rhoncus. Etiam pharetra tellus a ex commodo lobortis. Mauris justo lorem, fermentum sit amet magna eget, venenatis ultrices purus. Morbi sodales ipsum sed velit imperdiet auctor. In aliquam in tortor sit amet tristique.
        </p> -->
        
        <h2 class="my-5">Laissez un commentaire</h2>

    <form method="post" class="mb-3 form-floating" action=" article.php ">
     
          <input type="hidden" name="id_utilisateur" value= "<?= $_SESSION['id'] ?>">
            <textarea class=" form-control" id="comment" name="contenu" rows="10" style="height:100px" required ></textarea>

        <button type="submit" class="btn btn-beige mt-3">Envoyer le commentaire</button>
    </form>
</div>
			

		</div>


	</section>


    <section class='container text-dark-1'>
        <div class='fst-italic mb-5'>
        <?php 
             while($commentaire = $requete->fetch()) {
                echo '<h5 class="text-decoration-underline">' .$commentaire['pseudo'].'</h5>';
                echo '<p>'.$commentaire['contenu'].'</p>';
                echo '<p>' .$commentaire['day_date'].'</p>';
             }
            
            ?>
        </div>
        <!-- <div class='fst-italic mb-5'>
            <h5 class='text-decoration-underline'> Jean Paul</h5>
            <p>
                J'ai bien aimé votre article!!!
            </p>
        </div>
        <div class='fst-italic mb-5'>
            <h5 class='text-decoration-underline'> Marie</h5>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui, culpa!
            </p>
        </div>
        <div class='mb-5'>
            <h5 class='text-decoration-underline'> Antoine</h5>
            <p>
               Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima, quam nesciunt praesentium alias cumque ab eius officia corrupti in, molestias numquam adipisci! Sequi nesciunt inventore voluptates reprehenderit facere quasi asperiores?
            </p>
        </div> -->
    </section>

	<?php
    $content = ob_get_clean();

    require('base2.php');
?>