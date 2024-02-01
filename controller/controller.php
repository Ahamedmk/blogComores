<?php

require('model/userModel.php');


function home(){
    $requete = getCreations();

    require ('view/plageView.php');
}

function articles(){
    $requete = getArticles();
    require ('view/articleView.php');
}