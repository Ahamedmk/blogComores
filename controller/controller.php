<?php

require_once('model/CreationsManager.php');
require('model/ArticlesManager.php');


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