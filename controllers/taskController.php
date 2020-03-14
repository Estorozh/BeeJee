<?php

    $author = xss($_POST['author']);
    $email = xss($_POST['email']);
    $task = xss($_POST['task']);

    addTask($author, $email, $task);