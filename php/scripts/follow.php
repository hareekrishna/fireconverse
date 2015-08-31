<?PHP 
if(isset($_POST['flag'])){
 
include('csign.php');

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
	$temp_f=array();
	$temp=$temp1="";
	$ids="";
	$tumb_avatar="";
	$e="";
	$f="";
	$f_status=false;
	$followings_array=array();
	$json='[';
if(isset($_SESSION['u_ID'],$_SESSION['u_name'],$_SESSION['u_email'], $_SESSION['xploded_u_email'], $_SESSION['login_string'])) {
     $U_ID = $_SESSION['u_ID'];
	 $xploded_u_email=$_SESSION['xploded_u_email'];
	 $u_email=$_SESSION['u_email'];
	 $u_name=$_SESSION['u_name'];
	 $e_follows_count=$e_followings_count=0;
	 if($_POST['flag']=='info'){
		 
		  if(($stmt0=$mysqli->prepare(" select `follows_ID` from `fireconverse`.`follows` where ID=$U_ID")) && ($stmt0->execute())){
			 
				$stmt0->bind_result($temp1);
				$stmt0->store_result();
				$stmt0->fetch();
			if($temp1){
				$temp_f=unserialize($temp1);
			$e_follows_count=sizeof($temp_f);
			}
		 }
		 if(($stmt=$mysqli->prepare("Select `followings_ID` from `fireconverse`.`followings` where ID=$U_ID ")) && ($stmt->execute()))
		{
			
				$stmt->bind_result($temp);
				$stmt->store_result();
				$stmt->fetch();
			if($temp){
			$followings_array=unserialize($temp);
			$e_followings_count=sizeof($followings_array);
			}
		 }
		 echo $e_followings_count."_".$e_follows_count;
	 }
	 if($_POST['flag']=='followings_list'){
		 if($stmt0=$mysqli->prepare(" select `follows_ID` from `fireconverse`.`follows` where ID=$U_ID")){
			 if($stmt0->execute()){
				$stmt0->bind_result($temp1);
				$stmt0->store_result();
				$stmt0->fetch();
				$temp_f=unserialize($temp1);
			 }
		 }
		if($stmt=$mysqli->prepare("Select `followings_ID` from `fireconverse`.`followings` where ID=$U_ID "))
		{
			if($stmt->execute()){
				$stmt->bind_result($temp);
				$stmt->store_result();
				$stmt->fetch();
		if($temp){
			$followings_array=unserialize($temp);

			foreach($followings_array as $ids){
				
				$f_status=false;
				if($temp_f){	
				if(in_array($ids,$temp_f) == true){
					$f_status=true;
					}
				}
				$e_followings_count=$e_follows_count=0;
				if($stmt1=$mysqli->prepare("select `tumb_realavatar` from `fireconverse`.`meminfo` where ID=$ids")){
					if($stmt1->execute()){
						$stmt1->bind_result($tumb_avatar);
						$stmt1->store_result();
						$stmt1->fetch();
					}
				}
				if($stmt2=$mysqli->prepare("select `name`,`email` from `fireconverse`.`members` where ID=$ids")){
					if($stmt2->execute()){
						$stmt2->bind_result($n,$e);
						$stmt2->store_result();
						$stmt2->fetch();
						$e=explode("@" , $e);
						$e=$e[0];
						}
					if($n){
						if($stmt3=$mysqli->prepare("select `followings_ID` from `fireconverse`.`followings` where ID=$ids")){
							if($stmt3->execute()){
								$stmt3->bind_result($f);
								$stmt3->store_result();
								$stmt3->fetch();
								
								

									if($f){
									$e_followings=unserialize($f);
									$e_followings_count=sizeof($e_followings);
									} 
								
						}
							
						if($stmt4=$mysqli->prepare("select `follows_ID` from `fireconverse`.`follows` where ID=$ids")){
							if($stmt4->execute()){
								$stmt4->bind_result($g);
								$stmt4->store_result();
								$stmt4->fetch();
									
									if($g){
									$e_follows=unserialize($g);
									$e_follows_count=sizeof($e_follows);
									}
						}
							}
							
						}}
					}
				if($json!='['){
					$json.=',';
				} 
				$json.='{"name":"'.$n.'",';
				$json.='"email":"'.$e.'",';
				$json.='"auth":"'.$ids.'",';
				$json.='"avatar":"'.$tumb_avatar.'",';
				$json.='"f_status":"'.$f_status.'",';
				$json.='"followers":"'.$e_follows_count.'",';
				$json.='"followings":"'.$e_followings_count.'"}';
				}
				$json.="]";
				echo $json;
			}}
			else{
				echo 'error1';
				}
			}
		else {
			echo "error2";
			}
	 }
	if($_POST['flag']=='follows_info'){
		if($stmt=$mysqli->prepare("Select `follows_ID` from `fireconverse`.`follows` where ID=$U_ID"))
		{
			if($stmt->execute()){
				$stmt->bind_result($temp);
				$stmt->store_result();
				$stmt->fetch();
			if($temp){	
			$followings_array=unserialize($temp); 
			
			foreach($followings_array as $ids){
				if($stmt1=$mysqli->prepare("select `tumb_realavatar` from `fireconverse`.`meminfo` where ID=$ids")){
					if($stmt1->execute()){
						$stmt1->bind_result($tumb_avatar);
						$stmt1->store_result();
						$stmt1->fetch();
					}
				}
				if($stmt2=$mysqli->prepare("select `name` from `fireconverse`.`members` where ID=$ids")){
					if($stmt2->execute()){
						$stmt2->bind_result($n);
						$stmt2->store_result();
						$stmt2->fetch();
						
						}
					if($json!='['){
					$json.=',';
				}
				$json.='{"name":"'.$n.'",';
				$json.='"auth":"'.$ids.'",';
				$json.='"avatar":"'.$tumb_avatar.'"}';
				}
				$json.="]";
				
				echo $json;
			}}
			else{
				echo 'error1';
				}
			}
		else {
			echo "error2";
			}
				 
		}
	}
	if($_POST['flag']=='follows_list'){
		if($stmt=$mysqli->prepare("Select `follows_ID` from `fireconverse`.`follows` where ID=$U_ID"))
		{
			if($stmt->execute()){
				$stmt->bind_result($temp);
				$stmt->store_result();
				$stmt->fetch();
			if($temp){	
			$followings_array=unserialize($temp);
			
			foreach($followings_array as $ids){
				if($stmt1=$mysqli->prepare("select `tumb_realavatar` from `fireconverse`.`meminfo` where ID=$ids")){
					if($stmt1->execute()){
						$stmt1->bind_result($tumb_avatar);
						$stmt1->store_result();
						$stmt1->fetch();
					}
				}$e_followings_count=$e_follows_count=0;
				if($stmt2=$mysqli->prepare("select `name`,`email` from `fireconverse`.`members` where ID=$ids")){
					if($stmt2->execute()){
						$stmt2->bind_result($n,$e);
						$stmt2->store_result();
						$stmt2->fetch();
						$e=explode("@" , $e);
						$e=$e[0];
						}
					if($n){
						if($stmt3=$mysqli->prepare("select `followings_ID` from `fireconverse`.`followings` where ID=$ids")){
							if($stmt3->execute()){
								$stmt3->bind_result($f);
								$stmt3->store_result();
								$stmt3->fetch();
								
									if($f){
									$e_followings=unserialize($f);
									$e_followings_count=sizeof($e_followings);
									} 
						}
							
						if($stmt4=$mysqli->prepare("select `follows_ID` from `fireconverse`.`follows` where ID=$ids")){
							if($stmt4->execute()){
								$stmt4->bind_result($g);
								$stmt4->store_result();
								$stmt4->fetch();
									
									if($g){
									$e_follows=unserialize($g); 
									$e_follows_count=sizeof($e_follows);
									}
						}
							}
							
						}}
					}
				if($json!='['){
					$json.=',';
				}
				$json.='{"name":"'.$n.'",';
				$json.='"auth":"'.$ids.'",';
				$json.='"email":"'.$e.'",';
				$json.='"avatar":"'.$tumb_avatar.'",';
				$json.='"followers":"'.$e_follows_count.'",';
				$json.='"followings":"'.$e_followings_count.'"}';
				}
				$json.="]";
				
				echo $json;
			}}
			else{
				echo 'error1';
				}
			}
		else {
			echo "error2";
			}
		}
		
	
	if($_POST['flag']=="follow_me" && isset($_POST['Uf_ID'])){
		$Uf_ID=$_POST['Uf_ID'];
		if($stmt01=$mysqli->prepare(" select `follows_ID` from `fireconverse`.`follows` where ID=$U_ID")){
			 if($stmt01->execute()){
				$stmt01->bind_result($temp2);
				$stmt01->store_result();
				$stmt01->fetch();
				if($stmt03=$mysqli->prepare("select `followings_ID` from `fireconverse`.`followings` where ID=$Uf_ID")){
					 if($stmt03->execute()){
					$stmt03->bind_result($temp4);
					$stmt03->store_result();
					$stmt03->fetch();
					$temp_f2=array();
					if($temp4)
					$temp_f2=unserialize($temp4);
					if(in_array($U_ID,$temp_f2)==true){
						echo "updated";
						exit();
						}
					 }
					 array_push($temp_f2,$U_ID);
					 $temp5=serialize($temp_f2);
					 
				$temp_f1=array();
				if($temp2)
				$temp_f1=unserialize($temp2);
				if(in_array($Uf_ID,$temp_f1)==true){
						echo "updated";
						exit();
						}
					 
				array_push($temp_f1,$Uf_ID);
				$temp3=serialize($temp_f1); 
				if($temp3 && $temp2){ 
					if(($stmt02=$mysqli->prepare(" update `fireconverse`.`follows` set `follows_ID`='$temp3' where ID=$U_ID")) && ($stmt02->execute())){
						if($temp4){
							if(($stmt05=$mysqli->prepare(" update  `fireconverse`.`followings` set `followings_ID`='$temp5' where ID=$Uf_ID")) && ($stmt05->execute()))
								{echo "updated";}
						}
						else if($temp5){
							 if(($stmt05=$mysqli->prepare("insert into  `fireconverse`.`followings` (`ID`,`followings_ID`) values('$Uf_ID','$temp5') ")) && ($stmt05->execute()))
							 {	echo "updated";}
						}
							
						
					}
				}
				else if($temp3) {  
					if(($stmt02=$mysqli->prepare("insert into `fireconverse`.`follows` (`ID`,`follows_ID`) values('$U_ID','$temp3') ")) && ($stmt02->execute())){
						if($temp4){
							if(($stmt05=$mysqli->prepare(" update  `fireconverse`.`followings` set `followings_ID`='$temp5' where ID=$Uf_ID")) && ($stmt05->execute()))
								{echo "updated";}}
						else if($temp5){ 
							 if(($stmt05=$mysqli->prepare("insert into  `fireconverse`.`followings` (`ID`,`followings_ID`) values('$Uf_ID','$temp5') ")) && ($stmt05->execute()))
							 	{echo "updated";}	
						}
					
					}
					}
			 }
		 }
		} }
		
		
	if(($_POST['flag']=="unfollow_me") && (isset($_POST['Uf_ID']))){
		$Uf_ID=$_POST['Uf_ID'];
		$temp_f2=$temp_f3=array();
		if(($stmt12=$mysqli->prepare("select `follows_ID` from `fireconverse`.`follows` where ID=$U_ID")) && ($stmt12->execute())){
								$stmt12->bind_result($g);
								$stmt12->store_result();
								$stmt12->fetch();
			
		if(($stmt10=$mysqli->prepare("select `followings_ID` from `fireconverse`.`followings` where ID=$Uf_ID")) && ($stmt10->execute())  ){
						
								$stmt10->bind_result($f);
								$stmt10->store_result();
								$stmt10->fetch();
								
								
								if($f && $g){
									$temp_f2=unserialize($f);
									$temp_f3=unserialize($g); 
									while(in_array($U_ID,$temp_f2) == true){
											$key=array_search($U_ID,$temp_f2);
											unset($temp_f2[$key]);
											$temp_f2=array_values($temp_f2);
											$key1=array_search($Uf_ID,$temp_f3);
											unset($temp_f3[$key1]);
											$temp_f3=array_values($temp_f3);
											if($temp_f2){
											$temp6=serialize($temp_f2); 
											
												if(($stmt11=$mysqli->prepare(" update  `fireconverse`.`followings` set `followings_ID`='$temp6' where ID=$Uf_ID")) && ($stmt11->execute()) )
													{ 
													 if($temp_f3){
														if(($stmt13=$mysqli->prepare(" update  `fireconverse`.`follows` set `follows_ID`='$temp7' where ID=$U_ID")) && ($stmt13->execute()))
														echo "updated";	
													 }
													 else{
														 if(($stmt13=$mysqli->prepare("DELETE FROM `fireconverse`.`follows` WHERE `follows`.`ID` = $U_ID LIMIT 1")) && ($stmt13->execute()))
														echo "updated";	 
															 
														 }
													}
											}
											else{
												$temp7=serialize($temp_f3); 
												if(($stmt11=$mysqli->prepare("DELETE FROM `fireconverse`.`followings` WHERE `followings`.`ID` = $Uf_ID LIMIT 1")) && ($stmt11->execute()))
												if($temp_f3){
														if(($stmt13=$mysqli->prepare(" update  `fireconverse`.`follows` set `follows_ID`='$temp7' where ID=$U_ID")) && ($stmt13->execute()))
														echo "updated";	
													 }
													 else{
														 if(($stmt13=$mysqli->prepare("DELETE FROM `fireconverse`.`follows` WHERE `follows`.`ID` = $U_ID LIMIT 1")) && ($stmt13->execute()))
														echo "updated";	 
															 
														 }
												}
											
										
											
										}
									}}
			}
		}



	 
}
} 
?>