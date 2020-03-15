<?php 

    include_once ('models/DB.php');

    session_start();
    $db = db_connect();

    function login() {
        if($_POST['username'] == 'admin' && $_POST['password'] == '123') {
            $_SESSION['is_auth'] = true;
            
            setcookie('username', 'admin', time() + 3600 * 24 * 7, '/');
            setcookie('password', '123', time() + 3600 * 24 * 7, '/');

            reload();

        } else {

            return $err = "Access forbidden";
        }
    }

    function logout() {
        setcookie('username','admin',time(),'/');
        setcookie('password','123',time(),'/');

        if ($_SESSION['is_auth']) {
            unset ($_SESSION['is_auth']);
        }

        reload();

        return $isAuth = false;
    }

    function auth() {
        $isAuth = false;

        if(isset($_SESSION['is_auth']) && $_SESSION['is_auth']){
			$isAuth = true;
		}
		elseif(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
			if($_COOKIE['username'] == 'admin' && $_COOKIE['password'] == '123') {
				$_SESSION['is_auth'] = true;
				$isAuth = true;
			}
		}
		
		return $isAuth;
    }

    $isAuth = auth();