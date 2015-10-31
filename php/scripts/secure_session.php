<?PHP 
if(!function_exists('sec_session_start')){
	function sec_session_start() {
			$session_name = 'sec_session_id';
			$secure = false;
			$httponly = true; 
			ini_set('session.use_only_cookies', 1);
			$cookieParams = session_get_cookie_params(); 
			session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
			session_name($session_name); 
			if(!isset($_SESSION)){
			ob_start();		session_start();
				}
			session_regenerate_id(); 	 
	}
}
?>