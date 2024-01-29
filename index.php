<?php
$title = "Comores";

ob_start();
session_start();

// Connexion à la bdd
require_once('connection.php');

// Récupération des créations depuis la base de données
$requete = $bdd->prepare('SELECT * FROM creations');
$requete->execute();
?>

<div class="bg-dark mb-5 text-center">
    <div class="d-flex justify-content-end me-5">
        <h1 class="playfair-font display-2 text-beige text-center m-2">Les Iles de la Lune</h1>
        <div class="d-none d-sm-block w-25">
            <img src="./ressources/images/lune.png" class="w-25" alt="lune">
        </div>
    </div>
    <p class="cinzel text-center fs-5">Al-quamar</p>
</div>

<div class="container flex-grow-1 flex-shrink-0 pb-5">
    <div class="row gx-4">
        <div class="d-none d-sm-block col-3 h-100 round">
            <!-- code du carousel -->
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
                <h2 class="my-3">Les iles aux 1000 parfums <i class="bi bi-facebook"></i></h2>
                <p class="text-dark-1 text-start fw-bolder">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias ipsam eius animi nesciunt deleniti! Soluta quas corrupti, ratione, dolorum quo esse animi cupiditate sapiente eaque quos recusandae ipsam deleniti ea dicta temporibus dolores quaerat natus cumque exercitationem maxime. Illo sit eos, excepturi rerum id sint placeat tempora iste, at, voluptatibus cumque? Voluptate nihil aspernatur doloribus molestiae, facilis qui quisquam recusandae.
                </p>
            </div>
        </div>

        <div class="col">
            <div class="row row-cols-2 row-cols-md-3 g-4 h-100">
                <?php while ($creation = $requete->fetch()) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="./uploads/<?php echo $creation['photos'] ?>" class="card-img-top" alt="plage1">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $creation['titre'] ?></h5>
                                <p class="card-text">
                                    <?php
                                    // Limiter le nombre de mots affichés dans la carte
                                    $commentaire = $creation['commentaire'];
                                    $mots = explode(' ', $commentaire);
                                    $motsAffiches = array_slice($mots, 0, 20);
                                    echo implode(' ', $motsAffiches);
                                    ?>
                                </p>
                                <?php
                                // Vérifier si une session est active
                                if (isset($_SESSION['id'])) {
                                    // Si la session est active, afficher le lien vers la page article
                                    ?>
                                    <a href="article.php?id=<?php echo $creation['id'] ?>" class="card-link">Lire la suite...</a>
                                <?php
                                } else {
                                    // Sinon, afficher un lien avec une alerte pour inciter à s'inscrire
                                    ?>
                                    <a href="#" class="card-link" onclick="alert('Connectez-vous ou inscrivez-vous pour lire la suite.');">Lire la suite...</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require('base2.php');
?>
