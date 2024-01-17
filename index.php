<?php
   session_start();
  
    // Connexion à la bdd
   
    require_once('connection.php');

    // variable
    // $pseudo        =htmlspecialchars($_POST['pseudo']);

   

         // creation de la requete
        //  $reponse = $bdd->prepare('SELECT * FROM user where id=3');
        //  $reponse->execute();
         // Affichage 
        
        

	
?>



<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Cinzel:wght@600&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/raw/global.css" />
  </head>
  <body class="max-width-body text-light bg-principal-color d-flex flex-column h-100">
  
    <!-- Navbar -->

    <nav class="main-nav bg-dark d-flex justify-content-center py-3 text-center  ">
      <a href="index.php" class="text-beige text-uppercase d-flex align-items-center text-decoration-none">Home</a>
      <?php if(isset($_SESSION['connect'])) { ?>
        <a href="logout.php" class="text-beige text-uppercase d-flex align-items-center text-decoration-none ms-3">Se déconnecter</a> 
        <?php } else { ?>
    <a href="inscription2.php" class="text-beige text-uppercase d-flex align-items-center text-decoration-none ms-3">Inscription</a>
    <?php } ?>
    <a href="reservation.html" class="text-beige text-uppercase d-flex align-items-center text-decoration-none ms-3">Reservation</a>

    <?php if(isset($_SESSION['connect'])) {  
     
      echo '<p class="ms-5 h2 d-flex align-items-center mb-0">Bonjour,  '.$_SESSION['pseudo'].'</p>';
       } else {
      echo  '<p class="ms-5 h2 d-flex align-items-center mb-0">Bonjour </p>';
       }
      
       
    ?>
    </nav>

    <div class="bg-dark mb-5 text-center ">
      <div class="d-flex justify-content-end me-5">
      <h1 class="playfair-font display-2 text-beige text-center m-2">Les Iles de la Lune</h1>
      <div class="d-none d-sm-block w-25">
        <img src="./ressources/images/lune.png" class="w-25" alt="lune">
      </div>
      
    </div>

      <p class="cinzel text-center fs-5">Al-quamar</p>
     </div>

    <!-- Global Container -->
    <div class="container flex-grow-1 flex-shrink-0 pb-5">

      <div class="row gx-4 ">
        <div class="d-none d-sm-block col-3 h-100 round">
           
            <div id="carouselExampleSlidesOnly" class="display-none sm-display-block carousel slide carousel-fade  " data-bs-ride="carousel">
              <div class="carousel-inner ">
                <div class="carousel-item active h-100 ">
                  <img src="./ressources/images/ananas.jpg" class="d-block w-100 rounded " alt="ananas">
                </div>
                <div class="carousel-item h-100">
                  <img src="./ressources/images/Mangue.jpg" class="d-block w-100 rounded " alt="mangue">
                </div>
                <div class="carousel-item h-100">
                  <img src="./ressources/images/moroni.jpg" class="d-block w-100 rounded " alt="marché">
                </div>
                <div class="carousel-item h-100">
                  <img src="./ressources/images/pirogue.jpg" class="d-block w-100 " alt="pirogue">
                </div>
              </div>
            </div>

            <div class="text-card-color-1 text-center">
              <h2 class="my-3">Les iles aux 1000 parfums
                <i class="bi bi-facebook"></i>
              </h2>
              <p class="text-dark-1 text-start fw-bolder">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias ipsam eius animi nesciunt deleniti! Soluta quas corrupti, ratione, dolorum quo esse animi cupiditate sapiente eaque quos recusandae ipsam deleniti ea dicta temporibus dolores quaerat natus cumque exercitationem maxime. Illo sit eos, excepturi rerum id sint placeat tempora iste, at, voluptatibus cumque? Voluptate nihil aspernatur doloribus molestiae, facilis qui quisquam recusandae.</p>
            </div>
          
        </div>

        <div class="col">
            <div class="row row-cols-2 row-cols-md-3 g-4 h-100">
              <div class="col">
                <div class="card">
                  <img src="./ressources/images/IMG_20171024_144321.jpg" class="card-img-top" alt="plage1">
                  <div class="card-body">
                    <h5 class="card-title">Grande Comores</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="#" class="card-link">lire la suite ...</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <img src="./ressources/images/IMG_20171024_152330.jpg" class="card-img-top" alt="plage2">
                  <div class="card-body">
                    <h5 class="card-title">Moheli</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="#" class="card-link">lire la suite ...</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <img src="./ressources/images/IMG_20171024_154729.jpg" class="card-img-top" alt="plage3">
                  <div class="card-body">
                    <h5 class="card-title">Anjouan</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="#" class="card-link">lire la suite ...</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <img src="./ressources/images/IMG_20171024_155345.jpg" class="card-img-top" alt="plage4">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="#" class="card-link">lire la suite ...</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <img src="./ressources/images/IMG_20171024_144321.jpg" class="card-img-top" alt="plage1">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="#" class="card-link">lire la suite ...</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <img src="./ressources/images/IMG_20171024_152330.jpg" class="card-img-top" alt="plage2">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="#" class="card-link">lire la suite ...</a>
                  </div>
                </div>
              </div>
            </div>
          
        </div>

      </div>
     
      <?php 
            //  while($commentaire = $reponse->fetch()) {
            //     echo '<div class="text-dark-1 m-2">' .$commentaire['contenu']  .$commentaire['date'].'</div>';
            //  }
            
            ?>
    </div>

 <footer class="bg-dark p-4 text-center">
  <a href="#" class="text-light text-decoration-none me-5">
    Copyright 2023 Comores. All Rights Reserved
  </a>
  <i class="bi bi-facebook me-2"></i>
  <i class="bi bi-twitter me-2"></i>
  <i class="bi bi-instagram"></i>
 </footer>
<!-- <script src="scripts/bootstrap.bundle.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>

 
</html>
