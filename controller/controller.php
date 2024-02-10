<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
 }
 
require_once('model/CreationsManager.php');
require_once('model/ArticlesManager.php');
require_once('model/AdminManager.php');
require_once('model/IdentificationManager.php');
require_once('model/InscriptionManager.php');


function home(){

    $creationsManager = new CreationsManager();
    $requete = $creationsManager->getCreations();

    require ('view/plageView.php');
}

function articles(){
    $articlesManager = new ArticlesManager();
    $requete = $articlesManager->getArticles();
    $req = $articlesManager->getArticleComments();

    require ('view/articleView.php');
}

function admin(){
    $adminManager = new AdminManager();
    $requete = $adminManager->getAdmin();

    require ('view/adminView.php');
}

function inscription() {
    $inscriptionManager = new InscriptionManager();
    $requete = $inscriptionManager->getInscription();
    require ('view/inscriptionView.php'); 
}

function identification(){
    $identificationManager = new IdentificationManager();
    $requete = $identificationManager->getIdentification();
    require ('view/identificationView.php');
}

function addHome($contenu, $contenu_id){
    $creationsManager = new CreationsManager();
    $result = $creationsManager->postCreations($contenu, $contenu_id);
    if($result === false) {
        throw new Exception ("un problème est survenu");
    }
    else {
        header('location: index.php');
        exit();
    }
}

function supprId($suppr_id){
    $creationsManager = new CreationsManager();
    $result = $creationsManager->suppCreations($suppr_id);
    if($result === false) {
        throw new Exception ("un problème est survenu");
    }
    else {
        header('location: index.php');
        exit();
    }
}

function addDescription($titre, $description){
    $adminManager = new AdminManager();
    $result = $adminManager->addAdmin($titre, $description);
    if($result === false) {
        throw new Exception ("un problème est survenu");
    }
    else {
        header('location: index.php');
        exit();
    }

}

function addIdentification($email, $password, $pseudo){
    $identificationManager = new IdentificationManager();
    $result = $identificationManager->addIdentifie($email, $password, $pseudo);
    if($result === false) {
        throw new Exception ("un problème est survenu");
    }
    else {
        header('location: index.php');
        exit();
    }
}

function addInscription($email, $password,$password_two, $pseudo){
    $inscriptionManager = new InscriptionManager();
    $result = $inscriptionManager->addInscrit($email, $password,$password_two, $pseudo);
    if($result === false) {
        throw new Exception ("un problème est survenu");
    }
    else {
        header('location: index.php');
        exit();
    }
}

function addCommentaire($contenu, $id_utilisateur){
    $articlesManager = new ArticlesManager();
    $result = $articlesManager->addComment($contenu, $id_utilisateur);
    if($result === false) {
        throw new Exception ("un problème est survenu");
    }
    else {
        header('location: index.php');
        exit();
    }

}

