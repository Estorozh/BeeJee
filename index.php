<?php 

    include_once ('./controllers/auth.php');
    include_once ('./models/tasksModel.php');
    include_once ('./controllers/post.php');
    include_once ('./helper/vardump.php');

    session_start();

    $db = db_connect();

    vardump($_POST);

    include_once ('./view/_main.php');