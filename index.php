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
        else if($_GET['page'] == 'inscription') {
            if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two']) && !empty($_POST['pseudo'])){
                addInscription(htmlspecialchars($_POST['email']),htmlspecialchars($_POST['password']),htmlspecialchars($_POST['password_two']),htmlspecialchars($_POST['pseudo']));
            }
            else {  
            inscription();
            }
        }
        else if($_GET['page'] == 'articles') {
            if(!empty($_POST['contenu']) && !empty($_POST['id_utilisateur']) && $_GET['id']){
                addCommentaire(htmlspecialchars($_POST['contenu']),htmlspecialchars($_POST['id_utilisateur']),htmlspecialchars($_GET['id']));
            }
            else {
            articles();
            }
        }

         else if($_GET['page'] == 'logout') {
             logout();
         }

        else if($_GET['page'] == 'admin') {
            if(!empty($_POST['titre']) && !empty($_POST['description'])){
                addDescription(htmlspecialchars($_POST['titre']),htmlspecialchars($_POST['description']));
            }
            else {
                admin();
            }
        } 

        else if($_GET['page'] == 'identification') {
            if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['pseudo'])){
                addIdentification(htmlspecialchars($_POST['email']),htmlspecialchars($_POST['password']),htmlspecialchars($_POST['pseudo']));
            }
            else {
                identification();
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
