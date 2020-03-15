<?php
    function createTask() {
        $author = xss($_POST['author']);
        $email = xss($_POST['email']);
        $task = xss($_POST['task']);
    
        addTask($author, $email, $task);
        
        return $msg = 'The task is successfully created';
    }

    function edit($isAuth) {
        if($isAuth) {
            updateTask($_POST);
        } else {
            return $err = 'Not enough access rights. Edit forbidden.';
        }
    }
    
    $tasks = getTasks($_COOKIE['sortField'], $_COOKIE["sort"]);