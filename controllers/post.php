<?php
    include_once ('models/validator.php');

    if(count($_POST) > 0) {
        foreach($_POST as $key=>$value) {
            if(empty($value)) {
                $msg = "Please, fill all fields";
            }
            if($key == 'email'){
                if(!checkEmail($value)) {
                    $msg = "Please, input the correct email";
                }
            }
        }
        if (isset($_POST['username'])) {
            include_once ('controllers/login.php');
        } elseif(isset($_POST['author'])) {
            include_once ('controllers/taskController.php');
        } elseif(isset($_POST['logout'])) {
            logout();
            reload();
        } else {
            $msg = 'dont\'t find this form';
        }
        
    } else{
        $author = '';
        $email = '';
        $task = '';
        $msg = '';
    }

    // $tasks->getAll = getTasks('author');