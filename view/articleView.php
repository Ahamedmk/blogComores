<?php
$title = "articles";

ob_start();

     $article_id = $_GET['id'];

         $article = $requete->fetch();

        echo '<div class=" container text-center text-dark-1">';
        echo '<img src="./uploads/' . $article['photos'] . '" class="shadow p-3 mb-5 rounded w-50 mt-5" alt="ananas">';
        echo '<h1 class="text-shade-red-1">' . $article['titre'] . '</h1>';
        echo '<p class="lead text-start">' . $article['commentaire'] . '</p>';
        echo '</div>';

 ?>

<section class=" container text-dark-1 text-center">
    <div >
        <h2 class="my-5">Laissez un commentaire</h2>

        <form method="post" class="mb-3 form-floating" action="?page=articles&id=<?php echo $article_id ?>">
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
require('base.php');
?>
