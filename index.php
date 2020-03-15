<?php 
    
    include_once ('./controllers/auth.php');
    include_once ('./controllers/postRouting.php');

    include_once ('./view/pagination.php');
    include_once ('./view/_main.php');

    function reload() {
        header('Location: index.php');
        exit;
    }