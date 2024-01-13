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

    <nav class="main-nav bg-dark d-flex justify-content-center py-3 ">
      <a href="index.php" class="text-light text-uppercase text-decoration-none">Home</a>
    <a href="inscription2.php" class="text-light text-uppercase text-decoration-none ms-3">Inscription</a>
    <a href="reservation.html" class="text-light text-uppercase text-decoration-none ms-3">Reservation</a>
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

    <?= $content ?>

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
