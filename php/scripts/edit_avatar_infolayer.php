<?PHP 
header('content-type:application/JSON',true);
$u_name="";
if($_SERVER['REQUEST_METHOD']=='POST'){
include('csign.php');

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
				session_start();
				}
			session_regenerate_id(); 	 
	}
		sec_session_start();
		}
 if(isset($_SESSION['u_ID'],$_SESSION['u_name'],$_SESSION['u_email'], $_SESSION['xploded_u_email'], $_SESSION['login_string'])) {
     $U_ID = $_SESSION['u_ID'];
	 $xploded_u_email=$_SESSION['xploded_u_email'];
	 $u_email=$_SESSION['u_email'];
	 $u_name=$_SESSION['u_name'];
	 
	 
	 if(isset($_POST['flag']) && $_POST['flag']=='delete_av'){
		 
		$stmt_tumb_updater=$mysqli->prepare("SELECT `avatars`,`tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$U_ID");
			 if($stmt_tumb_updater){
				 $stmt_tumb_updater->execute();
				 $stmt_tumb_updater->store_result();
				 $stmt_tumb_updater->bind_result($tumbs,$flag_tumb);
				 $stmt_tumb_updater->fetch();
				 
				 } 
			if($flag_tumb){
				unlink($flag_tumb);
				$temp1=str_replace("tumb","",$flag_tumb);
				unlink($temp1);
				$array=unserialize($tumbs);
				$temp_flag=0;
				$stmt_tumb_updater1=$mysqli->prepare("update `fireconverse`.`meminfo` set`tumb_realavatar`='".$temp_flag."'   WHERE `ID`=$U_ID");
			 if($stmt_tumb_updater1){
				 $stmt_tumb_updater1->execute();
				
				  echo "deleted";
				 }
				}
		 }
 	
	if(isset($_POST['temp_location'])){
		$temp_location=$_POST['temp_location'];
		
		
		 $stmt_tumb_updater=$mysqli->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$U_ID");
			 if($stmt_tumb_updater){
				 $stmt_tumb_updater->execute();
				 $stmt_tumb_updater->store_result();
				 $stmt_tumb_updater->bind_result($flag_tumb);
				 $stmt_tumb_updater->fetch();
				 
				 }
			unlink($flag_tumb);
			if(rename($temp_location,$flag_tumb)){
		   $stmt_tumb_update=$mysqli->prepare("UPDATE `fireconverse`.`meminfo` SET `tumb_realavatar`='$flag_tumb' WHERE `ID`=$U_ID");
		   if($stmt_tumb_update){
		  if($stmt_tumb_update->execute()){
				$json='[';
				$json.='{"updated":"true",';
				$json.='"location":"'.$flag_tumb.'"}]';
				echo $json;
			  }
		   }
		
		}}
	if(isset($_POST['uname_changed'])){
	
		$u_name=$_POST['uname_changed'];
		if($stmt=$mysqli->prepare("update `fireconverse`.`members` set `name`='$u_name' where `ID`='$U_ID' ")){
		if($stmt->execute())
			echo "updated";
			$_SESSION['u_name']=$u_name;
			
			}
			else {
				echo "not updated";
				}
		$stmt->close();
		}
	if(isset($_POST['country_changed'])){
		$country=$_POST['country_changed']; 
		if($stmt=$mysqli->prepare("update `fireconverse`.`meminfo` set `country`='$country' where `ID`='$U_ID' ")){
			if($stmt->execute()){
				echo "updated";
				}
			else{
				echo "not updated";
				}
			}
		}
	if(isset($_POST['status_changed'])){
		$status_changed=$_POST['status_changed'];
		if($stmt=$mysqli->prepare("update `fireconverse`.`meminfo` set `status`='$status_changed' where `ID`='$U_ID' ")){
			if($stmt->execute()){
				echo "updated";
				}
			else{
				echo "not updated";
				}
			}
		}
	if(isset($_POST['sign_changed'])){
		$sign_changed=$_POST['sign_changed'];
		if($stmt=$mysqli->prepare("update `fireconverse`.`meminfo` set `sign`='$sign_changed' where `ID`='$U_ID' ")){
			if($stmt->execute()){
				echo "updated";
				}
			else{
				echo "not updated";
				}
			}
		}
	if(isset($_POST['font_changed'])){
		$font_changed=$_POST['font_changed'];
		if($stmt=$mysqli->prepare("update `fireconverse`.`meminfo` set `signno`='$font_changed' where `ID` ='$U_ID'")){
			if($stmt->execute()){
				echo "updated";
				}
			else{
				echo "not updated";
				}
			}
		}
	if(isset($_POST['font_search'],$_POST['S_name'])){
		$font_search=$_POST['font_search'];
		$S_name=$_POST['S_name'];
		$s="";
		$f="";
		if($stmt=$mysqli->prepare("select `fontname`,`fontid` from `fireconverse`.`fonts` where `fontid`='$font_search'")){
			if($stmt->execute()){
				$stmt->store_result();
				$stmt->bind_result($s , $f);
				$stmt->fetch();
				echo "<p class='font_loaded' id='$f' style='font-family:$s' >$S_name</p>";
				}
			
			}
		}
	if(isset($_POST['email_changed'])){
		
		$email_changed=$_POST['email_changed'];
		if($stmt=$mysqli->prepare("update `fireconverse`.`members` set `email`='$email_changed' where `ID` ='$U_ID'")){
			if($stmt->execute()){
				echo "updated";
				$_SESSION['u_email']=$email_changed;
				}
			else{
				echo "not updated";
				}
			}
		
		}
	if(isset($_POST['privacy_email_changed'])){
		$privacy="";
		$expolde_privacy=array();
		$privacy_changed=$_POST['privacy_email_changed'];
		if($stmt=$mysqli->prepare("select `privacy` from `fireconverse`.`members` where `ID` ='$U_ID'")){
			if($stmt->execute()){
				$stmt->store_result();
				$stmt->bind_result($privacy);
				$stmt->fetch();
				}
			if($privacy){
				$explode_privacy=explode("_",$privacy);
				$privacy=$privacy_changed."_".$explode_privacy[1];
		if($stmt=$mysqli->prepare("update `fireconverse`.`members` set `privacy`='$privacy' where `ID` ='$U_ID'")){
			if($stmt->execute()){
				echo "updated";
				}
			else{
				echo "not updated";
				}
			}
				}
			}
		}
	if(isset($_POST['mobileno_changed'])){
		
		$mobileno_changed=$_POST['mobileno_changed'];
		if($stmt=$mysqli->prepare("update `fireconverse`.`members` set `mobileno`='$mobileno_changed' where `ID` ='$U_ID'")){
			if($stmt->execute()){
				echo "updated";
				}
			else{
				echo "not updated";
				}
			}
		
		}
	if(isset($_POST['privacy_mobileno_changed'])){
		$privacy="";
		$expolde_privacy=array();
		$privacy_changed=$_POST['privacy_mobileno_changed'];
		if($stmt=$mysqli->prepare("select `privacy` from `fireconverse`.`members` where `ID` ='$U_ID'")){
			if($stmt->execute()){
				$stmt->store_result();
				$stmt->bind_result($privacy);
				$stmt->fetch();
				}
			if($privacy){
				$explode_privacy=explode("_",$privacy);
				$privacy=$explode_privacy[0]."_".$privacy_changed;
		if($stmt=$mysqli->prepare("update `fireconverse`.`members` set `privacy`='$privacy' where `ID` ='$U_ID'")){
			if($stmt->execute()){
				echo "updated";
				}
			else{
				echo "not updated";
				}
			}
				}
			}
		}
	}
}
?>