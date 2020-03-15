<?php
    include_once ('./models/validator.php');
    include_once ('./models/tasksModel.php');
    include_once ('controllers/taskController.php');

    if(count($_POST) > 0) {
        foreach($_POST as $key=>$value) {
            if(empty($value)) {
                $err = "Please, fill all fields<br>";
            }
        }

        if(isset($_POST['email']) && !checkEmail($_POST['email'])) {
            $msg="Please, input the correct email";
        }
        
        if(empty($err) && empty($msg)) {
            ${$_POST['var']} = postRouting($_POST['function'], $isAuth);
        }
    } else {
        $field = 'author';
        $author = '';
        $email = '';
        $task = '';
        $err = '';
        $msg = '';
    }

    function postRouting($request, $isAuth) {
        return $request($_POST['numTask'] ?? $isAuth);
    }