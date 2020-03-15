<?php 
    
    if($isAuth) {
        updateTask($_POST);
    } else {
        $err = 'Please login';
    }