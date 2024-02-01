<?php

require('controller/controller.php');

try {
if(isset($_GET['page'])) {

    if($_GET['page'] == 'comores') {
        home();
    }
        else if($_GET['page'] == 'articles') {
            articles();
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