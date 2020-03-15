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
        if(empty($err)) {
            if (isset($_POST['username'])) {
                include_once ('controllers/login.php');

            } elseif(isset($_POST['addTask'])) {
                include_once ('controllers/taskController.php');

            } elseif(isset($_POST['logout'])) {
                logout();
                reload();

            } elseif($_POST['edit']){
                $editTask = getTask_one($_POST['numTask']);

            } elseif($_POST['editTask']) {
                include_once ('controllers/edit.php');

            } elseif($_POST['ready']) {
                successTask($_POST['numTask']);

            } elseif($_POST['sort']) {
                $field = $_POST['sort'];
                changeSort();
                
            } else {
                $err = 'dont\'t find this form';
            }
        }
    } else {
        $field = 'author';
        $author = '';
        $email = '';
        $task = '';
        $err = '';
    }