<?php
$title = "inscription";

ob_start();

// Connexion à la bdd
try {
    $bdd = new PDO('mysql:host=localhost;dbname=formation_php;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur :'.$e->getMessage());
}

// Variable modification
$story = isset($_POST['texte']) ? htmlspecialchars($_POST['texte']) : '';
$nombre = isset($_POST['commentaire_id']) ? htmlspecialchars($_POST['commentaire_id']) : '';

// Variable suppression
$supprimer_id = isset($_POST['supprimer_id']) ? htmlspecialchars($_POST['supprimer_id']) : '';

// Modifier les données
$requete = $bdd->prepare('UPDATE commentaires SET contenu = :story WHERE id = :nombre');
$requete->execute(['story' => $story, 'nombre' => $nombre]);

// Supprimer des données
$requete = $bdd->prepare('DELETE FROM commentaires WHERE id = :supprimer_id');
$requete->execute(['supprimer_id' => $supprimer_id]);

// Création de la requête
$reponse = $bdd->prepare('SELECT * FROM commentaires');
$reponse->execute();
// Affichage
?>

<section>
    <div class="text-center">
        <h1 class="pb-4 text-dark-1">Modification</h1>

        <?php if (isset($_GET['error']) && isset($_GET['message'])) {
            echo '<div class="text-danger">'.htmlspecialchars($_GET['message']).'</div>';
        } else if (isset($_GET['success'])) {
            echo '<div class="text-danger">Vous êtes désormais inscrit. <a href="identification.php">Connectez-vous</a>.</div>';
        } ?>

        <p class="text-dark-1">Déjà inscrit ? <a href="test.php">Connectez-vous</a>.</p>
        <ul>
            <?php
            while ($commentaire = $reponse->fetch()) {
                ?>
                <li>
                    <div class="text-dark-1 m-2"><?php echo $commentaire['contenu'] ?> <br>
                        <?php echo $commentaire['date'] ?>
                    </div>
                    <!-- Button trigger modal -->
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popupModifier<?php echo $commentaire['id']; ?>">
                            Modifier
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popupSupprimer<?php echo $commentaire['id']; ?>">
                            Supprimer
                        </button>
                    </div>

                    <!-- Modal modifier -->
                    <div class="modal fade" id="popupModifier<?php echo $commentaire['id']; ?>" tabindex="-1" aria-labelledby="popupModifierLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="popupModifierLabel">Modifier le commentaire</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulaire de modification -->
                                    <form method="post" action="http://localhost/modification.php">
                                        <input type="hidden" name="commentaire_id" value="<?php echo $commentaire['id']; ?>">
                                        <span class="text-danger"> Nouveau commentaire:</span> <textarea name="texte"></textarea><br>
                                        <button type="submit" class="btn btn-primary">Modifier le commentaire</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Modal supprimer -->
                    <div class="modal fade" id="popupSupprimer<?php echo $commentaire['id']; ?>" tabindex="-1" aria-labelledby="popupSupprimerLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="popupSupprimerLabel">Supprimer le commentaire</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulaire de modification -->
                                    <form method="post" action="http://localhost/modification.php">
                                        <input type="hidden" name="supprimer_id" value="<?php echo $commentaire['id']; ?>">
                                        <p class="text-danger">Êtes-vous sûr de vouloir supprimer ce commentaire ?</p>
                                        <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </li>
                <?php
            }
            ?>
        </ul>

    </div>

</section>

<?php
$content = ob_get_clean();

require('base2.php');
?>
