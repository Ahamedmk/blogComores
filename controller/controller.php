<?php

require_once('model/CreationsManager.php');
require_once('model/ArticlesManager.php');
require_once('model/AdminManager.php');


function home(){
    $creationsManager = new CreationsManager();
    $requete = $creationsManager->getCreations();

    require ('view/plageView.php');
}

function articles(){
    $articlesManager = new ArticlesManager();
    $requete = $articlesManager->getArticles();

    require ('view/articleView.php');
}

function admin(){
    $adminManager = new AdminManager();
    $requete = $adminManager->getAdmin();

    require ('view/adminView.php');
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