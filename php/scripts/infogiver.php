<?PHP
header('content-type:application/JSON',true);
if(isset($_POST['flag']))
{
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
	 $xploded_u_email=$_SESSION['xploded_u_email'];
	 $u_email=$_SESSION['u_email'];
	 $u_name=$_SESSION['u_name'];
	 
	 $json='[';
	 if(($_POST['flag']=="show_responses") && $_POST['topic_id']){
		 $topic_id=$_POST['topic_id'];
		 
		 if(($stmt=$mysqli->prepare("select * from `fireconverse`.`responses` where TOPIC_ID='".$topic_id."' "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($res_id,$mem_ID,$topic_id,$res_text,$date_of_res,$data);
				while($stmt->fetch()){
					if(($stmt1=$mysqli->prepare("select `name` from fireconverse.members where ID='".$mem_ID."'")) && ($stmt1->execute())){
						$stmt1->store_result();
						$stmt1->bind_result($mem_name);
						$stmt1->fetch();
						if($mem_name) {
							 $stmt_tumb=$mysqli->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$mem_ID");
							 if($stmt_tumb){
								 $stmt_tumb->execute();
								 $stmt_tumb->store_result();
								 $stmt_tumb->bind_result($tumb);
								 $stmt_tumb->fetch();
								 }
							}
						}
					 
					 if($json !='['){
					 $json.=',';
						 }
						 
						 
							 $date=date("j \of F Y",$date_of_res);
							 
							 $json.='{"res_id":"'.$res_id.'",';
							 $json.='"ID":"'.$mem_ID.'",';
							 $json.='"mem_name":"'.$mem_name.'",';
							 $json.='"mem_tumb":"'.$tumb.'",';
							 $json.='"topic_id":"'.$topic_id.'",';
							 $json.='"res_text":"'.$res_text.'",';
							 $json.='"date_of_res":"'.$date.'"}';
					 
				}
			
			}
			$json.=']';
			echo $json;
		 }
	 if(($_POST['flag']=='topics_list') && $_POST['configaration']){
		 $config=$_POST['configaration'];
		 $U_ID_t=$U_ID;
		 $dat=$auth=0;
		 $likers_temp=array();
		 if($config['ID'] != 'false'){
			 $U_ID=$config['ID'];
			 }
			$json='[';
			if(($stmt=$mysqli->prepare("select * from `fireconverse`.`topics` where ID=$U_ID "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($topic_id,$U_ID_t1,$room_id,$corner_id,$t_title,$topic,$t_date,$data,$liker,$disliker);
				while($stmt->fetch()){
					 if($json !='['){
					 $json.=',';
					 }
			    $likes_no=$dislikes_no=$liked=0; 
				if($liker){
					$likers_temp=unserialize($liker);
					$likes_no=sizeof($likers_temp);
					if(in_array($U_ID,$likers_temp)){
					$liked=1;
						}
					
				   }
				if($disliker){
					$dislikers_temp=unserialize($disliker);
					$dislikes_no=sizeof($dislikers_temp); 
					if(in_array($U_ID,$dislikers_temp)){
						$liked=-1;
						}
				}	
				if($U_ID_t1==$U_ID) $auth=1;
				else $auth=0;
				if($corner_id){
					if(($stmt1=$mysqli->prepare("select `corner_name` from `fireconverse`.`corner` where CORNER_ID=$corner_id "))&& ($stmt1->execute())){
					
					$stmt1->store_result();
					$stmt1->bind_result($corner_name);
					$stmt1->fetch();
						}
				}
				else{
					$corner_name="";
					}
				
				 $date=date("j \of F Y",$t_date);
				 $json.='{"topic_id":"'.$topic_id.'",';
				 $json.='"ID":"'.$U_ID_t1.'",';
				 $json.='"auth":"'.$auth.'",';
				 $json.='"room_id":"'.$room_id.'",';
				 $json.='"corner_id":"'.$corner_id.'",';
				 $json.='"corner_name":"'.$corner_name.'",';
				 $json.='"t_title":"'.$t_title.'",';
				 $json.='"topic":"'.$topic.'",';
				 $json.='"t_date":"'.$date.'",';
				 $json.='"data":"'.$data.'",';
				 $json.='"likes":"'.$likes_no.'",';
				 $json.='"dislikes":"'.$dislikes_no.'",';	
				 $json.='"liked":"'.$liked.'"}';			
					}
				}
			$json.=']';
			echo ($json);
			 
		 }
	 if(($_POST['flag']=='corner_topics_list') && $_POST['configaration']){
		 $config=$_POST['configaration'];
		 $U_ID_t=$U_ID;
		 $data=$auth=0;
		 $likers_temp=array();
		 if($config['corner_id'] != 'false'){
			 $corner_id=$config['corner_id'];
			 }
			$json='[';
			if(($stmt=$mysqli->prepare("select * from `fireconverse`.`topics` where CORNER_ID=$corner_id "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($topic_id,$U_ID_t1,$room_id,$corner_id,$t_title,$topic,$t_date,$data,$liker,$disliker);
				while($stmt->fetch()){
					 if($json !='['){
					 $json.=',';
					 }
			    $likes_no=$dislikes_no=$liked=0; 
				if($liker){
					$likers_temp=unserialize($liker);
					$likes_no=sizeof($likers_temp);
					if(in_array($U_ID,$likers_temp)){
					$liked=1;
						}
					
				   }
				if($disliker){
					$dislikers_temp=unserialize($disliker);
					$dislikes_no=sizeof($dislikers_temp); 
					if(in_array($U_ID,$dislikers_temp)){
						$liked=-1;
						}
					
					}
				if($corner_id){
					if(($stmt1=$mysqli->prepare("select `corner_name` from `fireconverse`.`corner` where CORNER_ID=$corner_id "))&& ($stmt1->execute())){
					
					$stmt1->store_result();
					$stmt1->bind_result($corner_name);
					$stmt1->fetch();
						}
				}
				else{
					$corner_name="";
					}
				if($U_ID_t1==$U_ID) $auth=1;
				else $auth=0;
				
				 $date=date("j \of F Y",$t_date);
				 $json.='{"topic_id":"'.$topic_id.'",';
				 $json.='"ID":"'.$U_ID_t1.'",';
				  $json.='"auth":"'.$auth.'",';
				 $json.='"room_id":"'.$room_id.'",';
				 $json.='"corner_id":"'.$corner_id.'",';
				 $json.='"corner_name":"'.$corner_name.'",';
				 $json.='"t_title":"'.$t_title.'",';
				 $json.='"topic":"'.$topic.'",';
				 $json.='"t_date":"'.$date.'",';
				 $json.='"data":"'.$data.'",';
				 $json.='"likes":"'.$likes_no.'",';
				 $json.='"dislikes":"'.$dislikes_no.'",';	
				 $json.='"liked":"'.$liked.'"}';			
					}
				}
			$json.=']';
			echo ($json);
			 
		 }
	 if($_POST['flag']=="previous_tumbs"){
		$array_pre="";
		$array='';
		$stmt_mem=$mysqli->prepare("select `avatars` from `fireconverse`.`meminfo` where ID='$U_ID'");
		if($stmt_mem){
			$stmt_mem->execute();
			$stmt_mem->store_result();
			$stmt_mem->bind_result($array_pre);
			$stmt_mem->fetch();
			$unse=unserialize($array_pre);
			$arr_len=sizeof($unse);
			if($unse){
				for($i=0;$i<$arr_len;$i++){
					
					$add="../../data/userprofile/avatar/".$U_ID."/".$unse[$i] ;
					$append_div="<li class='li_pre'><img class='prevs' src='".$add."'/></li>";
					$array.=$append_div;
				}
				
				echo $array;
			}
			else {
				echo "no_prev";
				}
			}
		 }
	if(($_POST['flag']=="cornersid_in_room") && $_POST['room_id']){
		if($_POST['room_id']){
			$room_id=$_POST['room_id'];
			if(($stmt=$mysqli->prepare("select * from `fireconverse`.`corner` where `ROOM_ID`='".$room_id."'")) && ($stmt->execute())){
				$stmt->store_result();
				$stmt->bind_result($corner_id,$admin_id1,$room_id,$corner_name,$corner_desc,$data,$topic_id,$followers,$time);
				 while($stmt->fetch()){
			 		 if($json !='['){
					 $json.=',';
					 }
				if($corner_id ==""){
					echo "notfound";
					}
				 $date=date("j \of F Y",$time);
				 
				 $json.='{"admin_id":"'.$admin_id1.'",';
				 $json.='"corner_id":"'.$corner_id.'",';
				 $json.='"room_id":"'.$room_id.'",';
				 $json.='"corner_name":"'.$corner_name.'",';
				 $json.='"corner_desc":"'.$corner_desc.'",';
				 $json.='"banner_pic":"'.$data.'",';
				 $json.='"topic_id":"'.$topic_id.'",';
				 $json.='"followers":"'.$followers.'",';
				 $json.='"time":"'.$date.'"}';
			
			
  			 }
			 
		}
	}		
	$json.=']';
	echo $json;
  }
   if(($_POST['flag'] =="mem_info") && ($_POST['id_list'])){
		$mem_ID=$_POST['id_list'];
		$json='[';
		foreach($mem_ID as $temp_ID){
		if(($stmt=$mysqli->prepare("select `name` from fireconverse.members where ID='".$temp_ID."'")) && ($stmt->execute())){
			$stmt->store_result();
			$stmt->bind_result($mem_name);
			$stmt->fetch();
				if($mem_name) {
			 $stmt_tumb=$mysqli->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$temp_ID");
			 if($stmt_tumb){
				 $stmt_tumb->execute();
				 $stmt_tumb->store_result();
				 $stmt_tumb->bind_result($tumb);
				 $stmt_tumb->fetch();
				  if($json !='['){
					 $json.=',';
					 }
			
				 $json.='{"ID":"'.$temp_ID.'",';
				 $json.='"u_name":"'.$mem_name.'",';
				 $json.='"tumb":"'.$tumb.'"}';
				 }
					}
				else {
					echo "notfound1";
					}
			}
			
		}
		$json.=']';
		echo $json;
		}
	if($_POST['flag']=='mem_name' && $_POST['mem_ID']){
		$mem_ID=$_POST['mem_ID'];
		if(($stmt=$mysqli->prepare("select `name` from fireconverse.members where ID='".$mem_ID."'")) && ($stmt->execute())){
			$stmt->store_result();
			$stmt->bind_result($mem_name);
			$stmt->fetch();
				if($mem_name) {
					echo $mem_name;
					}
				else {
					echo "notfound";
					}
			}
		}

	 if($_POST['flag']=="sign"){	
		$stmt_signs=$mysqli->prepare("select `signno`,`sign` from fireconverse.meminfo where ID='".$U_ID."' ");
			if($stmt_signs){
				$stmt_signs->execute();
				$stmt_signs->store_result();
				$stmt_signs->bind_result($sign_id,$sign);
				$stmt_signs->fetch();
				}
				
					if($sign==""){
								$sign=$u_name;
						}
					if($sign_id==0){
						$sign_id="1";
			
						}
			$stmt_font=$mysqli->prepare("select `fontname`,`fonts` from fireconverse.fonts where `fontid`='".$sign_id."' ");
			if($stmt_font){
				$stmt_font->execute();
				$stmt_font->store_result();
				$stmt_font->bind_result($fontname,$fonts);
				$stmt_font->fetch();
				}
			else{
				$fonts="";
				$fontname="cursive";
				}
				if($json!='['){
					$json.=',';
				} 
				$json.='{"sign":"'.$sign.'",';
				$json.='"signid":"'.$sign_id.'",';
				$json.='"fontname":"'.$fontname.'",';
				$json.='"fonts":"'.$fonts.'"}';	
				$json.=']';
				echo $json;
	 }
if($_POST['flag']=="tumb"){
	$status="(no status)";
	 $stmt_tumb_updater=$mysqli->prepare("SELECT `status`,`wrappers`,`tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$U_ID");
			 if($stmt_tumb_updater){
				 $stmt_tumb_updater->execute();
				 $stmt_tumb_updater->store_result();
				 $stmt_tumb_updater->bind_result($status,$wrapper,$tumb);
				 $stmt_tumb_updater->fetch();
				 
				 }
				 if($status){
					 $status_div="<p style='color:#2D2D2D' id='status_text'>$status</p>";
					 }
				else{
					 $status_div="<p style='color:#BDBDBD' id='status_text'>$status</p>";
					}
				if($tumb=="0"){
					$tumb="../../mydata/pics/unknownuser.jpg"; 
					 }
				
				if($json!='['){
					$json.=',';
				} 
				$json.='{"status":"'.$status_div.'",';
				$json.='"wrapper":"'.$wrapper.'",';
				$json.='"tumb":"'.$tumb.'"}';
				$json.=']';
				echo $json;
				
				
	}	
if($_POST['flag']=="fonts_loader"){
	$font_array=array();
	$json='[';
	if(($stmt=$mysqli->prepare("select * from `fireconverse`.`fonts`")) && $stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($font_id,$font_name,$fonts);
		while($stmt->fetch()){
			if($json!='['){
					$json.=',';
				} 
			$json.='{"font_id":"'.$font_id.'",';
			$json.='"font_name":"'.$font_name.'",';
			$json.='"fonts":"'.$fonts.'"}';
			
			
		}
			$json.=']';
			echo $json;
	}
	
}	
if(($_POST['flag']=="admin_corner") && ($_POST['mem_ID'])){
	if($_POST['mem_ID']==='true'){
		$mem_ID=$U_ID;
		}
	else{
		$mem_ID=$_POST['mem_ID'];
		}
	if($mem_ID){
		$r=0;
	  	if(($stmt=$mysqli->prepare("select `CORNER_ID` from `fireconverse`.`corner` where `ADMIN_ID`=$mem_ID")) &&($stmt->execute())){
			$res=$stmt->get_result();
			while($row=$res->fetch_array(MYSQLI_NUM)){
				foreach($row as $r) {
					$corner_ids[]=$r;
					}
				}echo json_encode($corner_ids);
				
			}
		else return "notfound";
		}
	}
if(($_POST['flag']=="corner_info") && (isset($_POST['corner_id']))){
	$json='[';
	
		foreach($_POST['corner_id'] as $forum_id){
		if($json !='['){
					 $json.=',';
					 }
	   if(($stmt=$mysqli->prepare("select * from `fireconverse`.`corner` where `CORNER_ID`=$forum_id")) && ($stmt->execute())){
		 $stmt->store_result(); 
		 $stmt->bind_result($forum_id,$admin_id,$room_id,$corner_name,$corner_desc,$data,$topic_id,$followers,$time_c);
		 while($stmt->fetch()){
			 
			 $date=date("j \of F Y",$time_c);
			 
			 $json.='{"admin_id":"'.$admin_id.'",';
			 $json.='"corner_id":"'.$forum_id.'",';
			 $json.='"room_id":"'.$room_id.'",';
			 $json.='"corner_name":"'.$corner_name.'",';
			 $json.='"corner_desc":"'.$corner_desc.'",';
			 $json.='"banner_pic":"'.$data.'",';
			 $json.='"topic_id":"'.$topic_id.'",';
			 $json.='"followers":"'.$followers.'",';
			 $json.='"time":"'.$date.'"}';
		
			
   }
}}		$json.=']';
			echo $json;
  }
   
	
 if(($_POST['flag']=="corner_info_single") && (isset($_POST['corner_id_single']))){
	$json='[';
		if($_POST['corner_id_single']){
		$forum_id=$_POST['corner_id_single'];
	   if(($stmt=$mysqli->prepare("select * from `fireconverse`.`corner` where `CORNER_ID`=$forum_id")) && ($stmt->execute())){
		 $stmt->store_result(); 
		 $stmt->bind_result($forum_id,$admin_id,$room_id,$corner_name,$corner_desc,$data,$topic_id,$followers,$time_c);
		 while($stmt->fetch()){
			 if($json !='['){
					 $json.=',';
					 }
			 $date=date("j \of F Y",$time_c);
			 
			 $json.='{"admin_id":"'.$admin_id.'",';
			 $json.='"corner_id":"'.$forum_id.'",';
			 $json.='"room_id":"'.$room_id.'",';
			 $json.='"corner_name":"'.$corner_name.'",';
			 $json.='"corner_desc":"'.$corner_desc.'",';
			 $json.='"banner_pic":"'.$data.'",';
			 $json.='"topic_id":"'.$topic_id.'",';
			 $json.='"followers":"'.$followers.'",';
			 $json.='"time":"'.$date.'"}';
		}
			$json.=']';
			echo $json;
   
}		
 } }
	}
	 else{
		 header("location:loginPage.php");
	 }
	 
}

 else{
		 header("location:loginPage.php");
	 }
	 
	 //inserting counter response from profile.php
	 
 ?>
 