<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
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
        <a href="logout.php" class="text-beige text-uppercase d-flex align-items-center text-decoration-none ms-3">Déconnection</a> 
        <a href="admin.php" class="text-beige text-uppercase d-flex align-items-center text-decoration-none ms-3">Admin</a>
        <?php } else { ?>
    <a href="inscription2.php" class="text-beige text-uppercase d-flex align-items-center text-decoration-none ms-3">Inscription</a>
    <?php } ?>
    <a href="identification.php" class="text-beige text-uppercase d-flex align-items-center text-decoration-none ms-3">Connection</a>

    <?php if(isset($_SESSION['connect'])) {  
     
     
      echo '<p class="ms-5 h2 d-flex align-items-center mb-0">Bonjour,  '.$_SESSION['pseudo'].'</p>';
       } else {
      echo  '<p class="ms-5 h2 d-flex align-items-center mb-0">Bonjour </p>';
       }
      
       
    ?>
    </nav>

       <!-- Global Container -->
    

    <?= $content ?>

    

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
