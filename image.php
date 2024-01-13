<?php
    $title = "image";

    ob_start();
var_dump($_FILES);
    // Connexion à la bdd
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=formation_php;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }

    //Variable
		 $titre        =htmlspecialchars($_POST['titre']);
		 $lien         =htmlspecialchars($_POST['lien']);
         $commentaire         =htmlspecialchars($_POST['description']);
		

    
    
     //une image est bien envoyé 
     if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){
        // L'image est trop lourde ?
        if($_FILES['image']['size'] <=3000000){
           
            $informationsImage = pathinfo($_FILES['image']['name']);
            $extensionImage   = $informationsImage['extension'];
            $extensionArray   = ['png', 'gif', 'jpg', 'jpeg'];
            
            if(in_array($extensionImage, $extensionArray)){

                $newImageName =time().rand().rand().'.'.$extensionImage;
                $deplacer_img = move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$newImageName);
                $send = true;
                echo 'Envoi effectué avec succès';

                // Ajouter des donnée
               if ($deplacer_img) {  
           $requete = $bdd->prepare('INSERT INTO creations(photos, titre, lien, commentaire ) VALUES(?, ?, ?, ?)');
           $requete->execute([$newImageName, $titre, $lien, $commentaire]);
        } 
        else {
            echo 'Envoi effectué sans succès';
        }  

            }

        }
     }

     
                 // creation de la requete
           $reponse = $bdd->prepare('SELECT * FROM creations');
           $reponse->execute();

        
         // Affichage 
        

	
?>

<section>
		<div class="text-center" >
			<h1 class="pb-4 text-dark-1">S'inscrire</h1>


			<form method="post" class="d-flex flex-column w-50 h-50 m-auto mb-3" action="image.php" enctype="multipart/form-data">
				<div class="text-dark">
                
                <label for="image">fichier</label>
                <input type="file" name="image" id="image"  /><br>
                <label for="image">titre</label>
                <input type="text" name="titre" placeholder="titre" required><br>
                <label for="image">lien</label>
                <input type="text" name="lien" placeholder="lien" required><br>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
         
                </div>
				<input class=" bg-card-color-1 border-1 rounded-bottom-3 py-3 text-center text-white" type="submit" value="envoyer">
			</form>

			

            

		</div>

        <?php 
        
              while($creation = $reponse->fetch()) {
                 echo  '<div class="card">';
                 echo '<img src="./uploads/'.$creation['photos'].'" alt="plage4">';
                 echo '<div class="card-body">';
                 echo   '<h5 class="card-title">'.$creation['titre'].'</h5>';
                 echo   '<p class="card-text">'.$creation['commentaire'].'</p>';
                 echo   '<a href="'.$creation['lien'].'" class="card-link">lire la suite...</a></div></div>';    
                
              }
             
            
            ?>


	</section>

	<?php
    $content = ob_get_clean();

    require('base2.php');
?>