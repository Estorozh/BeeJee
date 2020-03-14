<?php
    include_once ('models/validator.php');

    if(count($_POST) > 0) {
        foreach($_POST as $key=>$value) {
            if(empty($value)) {
                $err = "Please, fill all fields";
            }
            if($key == 'email'){
                if(!checkEmail($value)) {
                    $err = "Please, input the correct email";
                }
            }
        }
        if($err == '') {
            if (isset($_POST['username'])) {
                include_once ('controllers/login.php');
            } elseif(isset($_POST['author'])) {
                include_once ('controllers/taskController.php');
            } elseif(isset($_POST['logout'])) {
                logout();
                reload();
            } else {
                $err = 'dont\'t find this form';
            }
        }
    } else{
        $author = '';
        $email = '';
        $task = '';
        $err = '';
    }

    // $tasks->getAll = getTasks('author');