<?php
$title = "articles";

ob_start();
session_start();

// Connexion à la bdd
require_once('connection.php');

// Variable
$contenu = isset($_POST['contenu']) ? htmlspecialchars($_POST['contenu']) : '';
$id_utilisateur = isset($_POST['id_utilisateur']) ? htmlspecialchars($_POST['id_utilisateur']) : '';

// Récupération des détails de l'article depuis la base de données
if (isset($_GET['id'])) {
    $article_id = $_GET['id'];
    $requete = $bdd->prepare('SELECT * FROM creations WHERE id = :article_id');
    $requete->execute(array('article_id' => $article_id));

    if ($requete->rowCount() > 0) {
        $article = $requete->fetch();

        echo '<div class=" container text-center text-dark-1">';
        echo '<img src="./uploads/' . $article['photos'] . '" class="shadow p-3 mb-5 rounded w-50 mt-5" alt="ananas">';
        echo '<h1 class="text-shade-red-1">' . $article['titre'] . '</h1>';
        echo '<p class="lead text-start">' . $article['commentaire'] . '</p>';
        echo '</div>';
    } else {
        echo "Article non trouvé";
    }
}

// Insertion du commentaire dans la base de données avec l'ID de l'article
if (isset($_GET['id']) && !empty($contenu) && !empty($id_utilisateur)) {
    $article_id = $_GET['id'];
    $requeteInsert = $bdd->prepare('INSERT INTO commentaires(contenu, utilisateur_id, article_id) VALUES(?, ?, ?)');
    $requeteInsert->execute([$contenu, $id_utilisateur, $article_id]);

    // Redirection uniquement si l'insertion est réussie
    if ($requeteInsert->rowCount() > 0) {
        // Redirection vers la même page pour éviter la soumission répétée du formulaire
        header("Location: article.php?id=$article_id");
        exit(); 
    }
}

// Récupération des commentaires spécifiques à cet article
$requeteCommentaires = $bdd->prepare('SELECT commentaires.contenu, commentaires.day_date, user.pseudo
                                     FROM commentaires
                                     INNER JOIN user ON commentaires.utilisateur_id = user.id
                                     WHERE commentaires.article_id = :article_id');
$requeteCommentaires->execute(array('article_id' => $article_id));
?>

<section class=" container text-dark-1 text-center">
    <div >
        <h2 class="my-5">Laissez un commentaire</h2>

        <form method="post" class="mb-3 form-floating" action="article.php?id=<?php echo $article_id; ?>">
            <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['id'] ?>">
            <textarea class="form-control" id="comment" name="contenu" rows="10" style="height:100px" required></textarea>
            <button type="submit" class="btn btn-beige mt-3">Envoyer le commentaire</button>
        </form>

    </div>
</section>

<section class='container text-dark-1'>
    <div class='fst-italic mb-5'>
        <?php
        while ($commentaire = $requeteCommentaires->fetch()) {
            echo '<h5 class="text-decoration-underline">' . $commentaire['pseudo'] . '</h5>';
            echo '<p>' . $commentaire['contenu'] . '</p>';
            echo '<p>' . $commentaire['day_date'] . '</p>';
        }
        ?>
    </div>
</section>

<?php
$content = ob_get_clean();
require('base2.php');
?>
