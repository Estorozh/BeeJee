<?php

function xss($var) {
    return trim(htmlspecialchars($var));
}

function checkEmail($email) {
    return preg_match("/@/", $email);
}

function checkLength($var, $length) {
    if(is_array($length)) {

    } else {
        
    }
    
}