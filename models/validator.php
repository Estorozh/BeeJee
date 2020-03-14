<?php

function xss($var) {
    return (string) trim(htmlspecialchars($var));
}

function checkEmail($email) {
    return preg_match("/@/", $email);
}

function checkLength($var, $length) {
    if(is_array($length)) {

    } else {

    }
    
}