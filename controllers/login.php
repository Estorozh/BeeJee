<?php

    if($_POST['username'] == 'admin' && $_POST['password'] == '123') {
        $_SESSION['is_auth'] = true;
        
        setcookie('username', 'admin', time() + 3600 * 24 * 7, '/');
        setcookie('password', '123', time() + 3600 * 24 * 7, '/');
        reload();
    } else {
        $msg = "Access forbidden";
    }