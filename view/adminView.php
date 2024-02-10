<?php
$title = "admin";

ob_start();
var_dump($_FILES);


?>

<section class="container flex-grow-1 flex-shrink-0 pb-5">
    <div  >
        <h1 class="text-center pb-4 text-dark-1">ADMIN</h1>

        <form method="post" class=" d-flex flex-column w-50 h-50 m-auto mb-3" action="?page=admin" enctype="multipart/form-data">
            <div class="text-dark">
                <label for="image" class="fw-bolder">Fichier</label>
                <input type="file" class="form-control mb-2" name="image" id="image"  />
                <label for="image" class="fw-bolder">Titre</label>
                <input type="text" class="form-control mb-2" name="titre" placeholder="titre" required>
                <label for="image" class="fw-bolder">Description</label>
                <textarea name="description" class="form-control mb-2" id="description" ></textarea>
            </div>
            <input class=" bg-card-color-1 border-1 rounded-bottom-3 py-3 text-center text-white" type="submit" value="envoyer">
        </form>
    </div>

    
</section>

<?php
$content = ob_get_clean();
require('base.php');
?>
