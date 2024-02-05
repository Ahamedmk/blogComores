<?php

require('controller/controller.php');

try {
    if(isset($_GET['page'])) {

        if($_GET['page'] == 'comores') {
            if(isset($_POST['texte']) && isset($_POST['commentaire_id'])) {
                addHome(htmlspecialchars($_POST['texte']), htmlspecialchars($_POST['commentaire_id']));
            }
            else if(isset($_POST['supprimer_id'])) {
                supprId(htmlspecialchars($_POST['supprimer_id']));
            }
            else {
                home();
            }
        }
        else if($_GET['page'] == 'articles') {
            articles();
        }

        else if($_GET['page'] == 'admin') {
            if(!empty($_POST['titre']) && !empty($_POST['description'])){
                addDescription(htmlspecialchars($_POST['titre']),htmlspecialchars($_POST['description']));
            }
            else {
                admin();
            }
        } 

        else {
            throw new Exception("Cette page n'existe pas ou a été supprimée.");
        }
    }
    else {
        home();
    }
}
catch(Exception $e) {
    $error = $e->getMessage();
    require('view/errorView.php');
}
?>
