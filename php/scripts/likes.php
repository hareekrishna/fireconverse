<?PHP
header('content-type:application/JSON',true);

if(isset($_POST['flag'])){

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
	 $xploded_u_email=$_SESSION['xploded_u_email'];
	 $u_email=$_SESSION['u_email'];
	 $u_name=$_SESSION['u_name'];
	 
	 if (!defined('HOST')) 
	define("HOST", "localhost"); 
	
	if (!defined('USER')) 
	define("USER", "root"); 
	
	if (!defined('PASSWORD')) 
	define("PASSWORD", ""); 
	
	if (!defined('DATABASE')) 
	define("DATABASE", "signup"); 
	$mysqli =new mysqli(HOST, USER, PASSWORD, DATABASE);
	
	if (!defined('HOST')) 
	define("HOST", "localhost"); 
	
	if (!defined('USER')) 
	define("USER", "root"); 
	
	if (!defined('PASSWORD')) 
	define("PASSWORD", ""); 
	
	if (!defined('DATABASE')) 
	define("DATABASE", "forum"); 
	$mysqli_forum =new mysqli(HOST, USER, PASSWORD, DATABASE);
	
	if (!defined('HOST')) 
	define("HOST", "localhost"); 
	
	if (!defined('USER')) 
	define("USER", "root"); 
	
	if (!defined('PASSWORD')) 
	define("PASSWORD", ""); 
	
	if (!defined('DATABASE')) 
	define("DATABASE", "corners"); 
	$mysqli_corners =new mysqli(HOST, USER, PASSWORD, DATABASE);
	
	if (!defined('HOST')) 
	define("HOST", "localhost"); 
	
	if (!defined('USER')) 
	define("USER", "root"); 
	
	if (!defined('PASSWORD')) 
	define("PASSWORD", ""); 
	
	if (!defined('DATABASE')) 
	define("DATABASE", "memdata"); 
	$mysqli_memdata=new mysqli(HOST, USER, PASSWORD, DATABASE);
	
	if (!defined('HOST')) 
	define("HOST", "localhost"); 
	
	if (!defined('USER')) 
	define("USER", "root"); 
	
	if (!defined('PASSWORD')) 
	define("PASSWORD", ""); 
	
	if (!defined('DATABASE')) 
	define("DATABASE", "signs"); 
	$mysqli_s =new mysqli(HOST, USER, PASSWORD, DATABASE);
	
	if(($_POST['flag']=='like') && $_POST['like_temp'] && $_POST['topic_id']){
		$like_temp=$_POST['like_temp'];
		$topic_id=$_POST['topic_id'];
		$likes=$likers=$dislikers=0;
		$likers_temp1=$dislikers_temp1=NULL;
		if(($stmt=$mysqli_forum->prepare("select `likers`,`dislikers` from `forum`.`topics` where `TOPIC_ID`=$topic_id")) && ($stmt->execute())){
			$stmt->store_result();
			$stmt->bind_result($likers,$dislikers);
			$stmt->fetch();

		
			function update_likers($likers_temp1,$dislikers_temp1){
				global $mysqli_forum,$topic_id; 
				if(($stmt1=$mysqli_forum->prepare("update `forum`.`topics` set `likers`='".$likers_temp1."' , `dislikers`='".$dislikers_temp1."' where `TOPIC_ID`=$topic_id")) && ($stmt1->execute())){
					return true;
					}
				}
				if($like_temp=='1'){
					
					
						if($likers){
							$likers_temp=unserialize($likers);
							if(in_array($U_ID,$likers_temp)){
								$likers_temp1=$likers;
								exit();
								}
							else{
								$likers_temp1=serialize(array_push($likers_temp,$U_ID));
						    	}
						   }
						else{
							$likers_temp=array ();
							array_push($likers_temp,$U_ID);
							$likers_temp1=serialize($likers_temp);
							
							}
						if($dislikers){
							$dislikers_temp=unserialize($dislikers);
							if(in_array($U_ID,$dislikers_temp)){
								$key=array_search($U_ID,$dislikers_temp);
								unset($dislikers_temp[$key]);
								$dislikers_temp1=serialize($dislikers_temp);
								}
						 }
							
						if(update_likers($likers_temp1,$dislikers_temp1)){
							echo "updated_liked";
							}
						}
					
				if($like_temp == '-1'){
					if($dislikers){
						$dislikers_temp=unserialize($dislikers);
							if(in_array($U_ID,$dislikers_temp)){
								$dislikers_temp1=$dislikers;
								exit();
								}
							else{
								$dislikers_temp1=serialize(array_push($dislikers_temp,$U_ID));
						    	}
						}
					else{
						$dislikers_temp=array ();
						array_push($dislikers_temp,$U_ID);
						$dislikers_temp1=serialize($dislikers_temp);
						}
					if($likers){
							$likers_temp=unserialize($likers);
							if(in_array($U_ID,$likers_temp)){
								$key=array_search($U_ID,$likers_temp);
								unset($likers_temp[$key]);
								$likers_temp1=serialize($likers_temp);
								}
						 }
							
						if(update_likers($likers_temp1,$dislikers_temp1)){
							echo 'updated_disliked';
							}
					
					}
				
				if($like_temp=='9'){
					
					if($likers){
						$likers_temp=unserialize($likers);
							if(in_array($U_ID,$likers_temp)){
								$key=array_search($U_ID,$likers_temp);
								unset($likers_temp[$key]);
								$likers_temp1=serialize($likers_temp);
								}
						}
					if($dislikers){
						$dislikers_temp=unserialize($dislikers);
							if(in_array($U_ID,$dislikers_temp)){
								$key=array_search($U_ID,$dislikers_temp);
								unset($dislikers_temp[$key]);
								$dislikers_temp1=serialize($dislikers_temp);
								}
						}
					if(update_likers($likers_temp1,$dislikers_temp1)){
							echo 'updated_like';
							}
					
					}
				
			
			}
	

		}
	if(($_POST['flag']=='likers_list') && $_POST['topic_id']){
		$topic_id=$_POST['topic_id'];
		$json='['; 
		if(($stmt=$mysqli_forum->prepare("select `likers` from `forum`.`topics` where `TOPIC_ID`='".$topic_id."'")) && ($stmt->execute())){
			$stmt->store_result();
			$stmt->bind_result($likers);
			$stmt->fetch();
			$likers_temp=array();
			if($likers){
				$likers_temp=unserialize($likers);
				foreach($likers_temp as $U_ID_l){
					if(($stmt=$mysqli->prepare("select `name` from signup.members where ID='".$U_ID_l."'")) && ($stmt->execute())){
						$stmt->store_result();
						$stmt->bind_result($mem_name);
						$stmt->fetch();
						if($mem_name){
							if($json !='['){
								 $json.=',';
								 }
							$json.='{"liker_id":"'.$U_ID_l.'",';
							$json.='"liker_name":"'.$mem_name.'"}';
							}
						}
						
					}
			
			}
		}
		$json.=']';
		echo $json;	
	 }
	 if(($_POST['flag']=='dislikers_list') && $_POST['topic_id']){
		$topic_id=$_POST['topic_id'];
		$json='['; 
		if(($stmt=$mysqli_forum->prepare("select `dislikers` from `forum`.`topics` where `TOPIC_ID`='".$topic_id."'")) && ($stmt->execute())){
			$stmt->store_result();
			$stmt->bind_result($dislikers);
			$stmt->fetch();
			$dislikers_temp=array();
			if($dislikers){
				$dislikers_temp=unserialize($dislikers);
				foreach($dislikers_temp as $U_ID_l){
					if(($stmt=$mysqli->prepare("select `name` from signup.members where ID='".$U_ID_l."'")) && ($stmt->execute())){
						$stmt->store_result();
						$stmt->bind_result($mem_name);
						$stmt->fetch();
						if($mem_name){
							if($json !='['){
								 $json.=',';
								 }
							$json.='{"disliker_id":"'.$U_ID_l.'",';
							$json.='"disliker_name":"'.$mem_name.'"}';
							}
						}
						
					}
			
			}
		}
		$json.=']';
		echo $json;	
	 }
	
}
}
?>