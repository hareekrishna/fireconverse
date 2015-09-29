<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Logging out...</title>
    </head>

    <body>
		<?PHP
			include 'secure_session.php';
			include 'function.php';
			include 'login_status.php';
			sec_session_start();
			
			$_SESSION = array();
			
			$params = session_get_cookie_params();
			
			setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
			if(session_destroy()){
				header("location:loginPage.php?auth=loggedOut");
				}
			
        ?>
        
    </body>
</html>