<?php
    $title = "articles";

    ob_start();

    // Connexion à la bdd
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=formation_php;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }

	
?>

<section class="text-dark-1">
		<div class="text-center" >
        <!-- <div class="text-center"> -->
  <img src="ressources/images/IMG_20171024_144321.jpg" class="rounded w-50" alt="ananas">
        <!-- </div> -->
        <h1 class="pt-5">Moroni</h1>

        <p class=" lead text-start">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tincidunt placerat ante ut elementum. Vivamus mollis est sed enim iaculis, tempor dapibus turpis convallis. Pellentesque varius finibus molestie. Maecenas pellentesque lectus nec bibendum lobortis. Pellentesque egestas maximus sem. Vestibulum vulputate quis est a interdum. Nam at accumsan dolor. Phasellus porta nisi velit, tempus hendrerit mauris facilisis vel. Ut quis massa laoreet, dapibus libero sit amet, facilisis est. Cras efficitur elit nec mattis dictum. Proin posuere nulla cursus ultrices facilisis. Vivamus posuere ultricies tellus, quis sodales lectus iaculis vitae. In ultricies faucibus neque, id ullamcorper ex. Etiam eget lorem vitae metus pellentesque volutpat sit amet sit amet nulla.

Maecenas sagittis tempus mi porttitor lacinia. Vestibulum mattis laoreet eros ac cursus. Donec fringilla porta condimentum. Phasellus malesuada auctor rhoncus. Etiam pharetra tellus a ex commodo lobortis. Mauris justo lorem, fermentum sit amet magna eget, venenatis ultrices purus. Morbi sodales ipsum sed velit imperdiet auctor. In aliquam in tortor sit amet tristique.
        </p>
        
        <h2 class="my-5">Laissez un commentaire</h2>

    <form >
     
        <div class="mb-3 form-floating">  
            <textarea class=" form-control" id="comment" rows="10" placeholder="Votre commentaire" style="height:100px" required ></textarea>
            <label for="comments">Commentaire...</label>
        </div>

        <button type="submit" class="btn btn-beige">Envoyer le commentaire</button>
    </form>
</div>
			

		</div>


	</section>

	<?php
    $content = ob_get_clean();

    require('base2.php');
?>