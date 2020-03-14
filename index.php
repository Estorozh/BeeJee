<?php 
    include_once ('./controllers/auth.php');
    include_once ('./models/tasksModel.php');
    include_once ('./controllers/postRouting.php');
    include_once ('./helper/vardump.php');

    session_start();

    $db = db_connect();

    // vardump($_POST);
    // echo 'sorted by '.$field ;

    $tasks = getTasks($field = 'author', $_COOKIE["sort"]);

    include_once ('./view/pagination.php');
    include_once ('./view/_main.php');

    function reload() {
        header('Location: index.php');
        exit;
    }