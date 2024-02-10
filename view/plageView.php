<?php
$title = "Comores";

ob_start();
if (session_status() === PHP_SESSION_NONE){
    session_start();
 }

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
                                    $motsAffiches = array_slice($mots, 0, 18);
                                    echo implode(' ', $motsAffiches);
                                    ?>
                                </p>
                                <?php
                                // Vérifier si une session est active
                                if (isset($_SESSION['id'])) {
                                    // Si la session est active, afficher le lien vers la page article
                                    ?>
                                    <a href="?page=articles&id=<?php echo $creation['id'] ?>" class="card-link">Lire la suite...</a>
                                <?php
                                } else {
                                    // Sinon, afficher un lien avec une alerte pour inciter à s'inscrire
                                    ?>
                                    <a href="#" class="card-link" onclick="alert('Connectez-vous ou inscrivez-vous pour lire la suite.');">Lire la suite...</a>
                                <?php
                                }
                                ?>
                                <?php if(isset($_SESSION['connect'])) { ?>
                                <div class="text-center mt-2">
                                    <button type="button" class="btn btn-card-color-1" data-bs-toggle="modal" data-bs-target="#popupModifier<?php echo $creation['id']; ?>">
                                        Modifier
                                    </button>
                                    <button type="button" class="btn btn-card-color-1 " data-bs-toggle="modal" data-bs-target="#popupSupprimer<?php echo $creation['id']; ?>">
                                        Supprimer
                                    </button>
                                </div>
                                <?php } else { ?>
                                    
                                    <?php }?>

                                <!-- Modal modifier -->
                    <div class="modal fade" id="popupModifier<?php echo $creation['id']; ?>" tabindex="-1" aria-labelledby="popupModifierLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="popupModifierLabel">Modifier l'article</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulaire de modification -->
                                    <form method="post" class="container" action="index.php?page=comores" >
                                        <input type="hidden" name="commentaire_id" value="<?php echo $creation['id']; ?>">
                                        <label class="text-danger fw-bolder "> Nouvel article:</label>
                                         <textarea name="texte" class="form-control" ></textarea>
                                        <button type="submit" class="btn btn-primary form-control mt-2">Modifier</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Modal supprimer -->
                    <div class="modal fade" id="popupSupprimer<?php echo $creation['id']; ?>" tabindex="-1" aria-labelledby="popupSupprimerLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="popupSupprimerLabel">Supprimer le commentaire</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulaire de suppression -->
                                    <form method="post" action="index.php?page=comores">
                                        <input type="hidden" name="supprimer_id" value="<?php echo $creation['id']; ?>">
                                        <p class="text-dark-1">Êtes-vous sûr de vouloir supprimer ce commentaire ?</p>
                                        <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

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
require('base.php');
?>
