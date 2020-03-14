<?php 
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

    function logout() {
        setcookie('username','admin',time(),'/');
        setcookie('password','123',time(),'/');
        if ($_SESSION['is_auth']) {
            unset ($_SESSION['is_auth']);
        }
        return $isAuth = false;
    }