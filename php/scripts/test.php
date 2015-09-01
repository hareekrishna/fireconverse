<?PHP 
	header('content-type:application/JSON',true);
	if(isset($_POST['flag'])){
		include("csign.php");
		function sec_session_start() {
					$session_name = 'sec_session_id';
					$secure = false;
					$httponly = true; 
					ini_set('session.use_only_cookies', 1);
					$cookieParams = session_get_cookie_params(); 
					session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
					session_name($session_name); 
					if(!isset($_SESSION)){
						session_start();
						}
					session_regenerate_id(); 	 
			}
		sec_session_start();
			
		if(isset($_SESSION['u_ID'],$_SESSION['u_name'],$_SESSION['u_email'], $_SESSION['xploded_u_email'], $_SESSION['login_string'])) {
			$U_ID = $_SESSION['u_ID'];
			 if(isset($_POST['res_add'],$_POST['flag']) && $_POST['flag']=='res_add'){
			    $topic_title=$_POST['top_title'];
			    $topic_desc=$_POST['topic_desc'];
			    $loc=$_POST['loc'];
			    $ID=$_SESSION['U_ID'];
		    	    $main_array={'TOPIC_ID'=>$topic_id,
	        	           
	                  };
			 }
		}
	  }
?>
