<?PHP

$auth=false;
include("csign.php");
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
	}
sec_session_start();
	
if(isset($_SESSION['u_ID'],$_SESSION['u_name'],$_SESSION['u_email'], $_SESSION['xploded_u_email'], $_SESSION['login_string'])) {
     $auth=$U_ID = $_SESSION['u_ID'];
	 $xploded_u_email=$_SESSION['xploded_u_email'];
	 $u_email=$_SESSION['u_email'];
	 $u_name=$_SESSION['u_name'];
	 $json='[';
	
	 //-------------------functions 
	 function topics_list_total($config){
		 $s=$config['start'];
		 $e=$config['end'];
		 $U_ID_t=$U_ID=$GLOBALS['U_ID'];
		 $dat=$GLOBALS['auth']=0;
		 $likers_temp=array();
		 $u_mem_name=$u_tumb='';
		 if($config['ID'] != 'false'){
			 $U_ID=$config['ID'];
			 }
			$json=array();
			if(($stmt=$GLOBALS['mysqli']->prepare("SELECT `TOPIC_ID`, `ID`, `ROOM_ID`, `CORNER_ID`, `topic_type`, `topictitle`, `date_of_topic` from `fireconverse`.`topics` where ID=$U_ID "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($topic_id,$U_ID_t1,$room_id,$corner_id,$topic_type,$t_title,$t_date);
				while($stmt->fetch()){
					if(($stmt1=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$U_ID_t1."'"))){
								$stmt1->execute();
								$stmt1->store_result();
								$stmt1->bind_result($u_mem_name);
								$stmt1->fetch();
								$stmt1->close();
								if($u_mem_name) {
									 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$U_ID_t1."'");
									 if($stmt_tumb){
										 $stmt_tumb->execute();
										 $stmt_tumb->store_result();
										 $stmt_tumb->bind_result($u_tumb);
										 $stmt_tumb->fetch();
										 $stmt_tumb->close();
									 }
								}
					}
				$filename="../../data/userprofile/topics/".$U_ID_t1."/".$topic_id."/".$U_ID_t1."_".$room_id."_".$corner_id."_".$topic_id.".txt";
					if(file_exists($filename) && $topic_array_file=json_decode(file_get_contents($filename),true)){
					
					 
			
						$t_title=$topic_array_file['topic_title'];
						$topic=$topic_array_file['topic_content'];
						$t_date=$topic_array_file['topic_time'];
						$data=$topic_array_file['topic_pic'];
						$corner_id=$topic_array_file['CORNER_ID'];
						$likes_no=$liked=$dislikes_no=0; 
						if($topic_array_file['likers']){
							$likers_temp=$topic_array_file['likers'];
							$likes_no=sizeof($likers_temp);
							if(in_array($U_ID,$likers_temp)){
							$liked=1;
								}
							
						   }
						if($topic_array_file['dislikers']){
							$dislikers_temp=$topic_array_file['dislikers'];
							$dislikes_no=sizeof($dislikers_temp); 
							if(in_array($U_ID,$dislikers_temp)){
								$liked=-1;
								}
						}	
						if($U_ID_t1==$U_ID) $auth=1;
						else $auth=0;
						if($corner_id){
							if(($stmt1=$GLOBALS['mysqli']->prepare("select `corner_name` from `fireconverse`.`corner` where CORNER_ID=$corner_id "))&& ($stmt1->execute())){
							
							$stmt1->store_result();
							$stmt1->bind_result($corner_name);
							$stmt1->fetch();
								}
						}
						else{
							$corner_name="";
							}
						$res_array=array();
						if($topic_array_file['res_array']){
						$res_array_file=$topic_array_file['res_array'];
						$count_res=sizeof($res_array_file)-1; 
						$c=sizeof($res_array_file);
						if(-$s<$count_res) $temp_start=$count_res+$s; else $temp_start=0;
						if(-$e<$count_res) $temp_end=$count_res+$e; else $temp_end=$count_res; 
						if($c)
						for($i=$temp_start;$i<$temp_end;$i++){ 
							$responses_array=$res_array_file[$i];
							$mem_name='';
							$tumb='';
							$cres_array=array();
							if(($stmt1=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$responses_array['U_ID']."'"))){
								$stmt1->execute();
								$stmt1->store_result();
								$stmt1->bind_result($mem_name);
								$stmt1->fetch();
								if($mem_name) {
									 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$responses_array['U_ID']."'");
									 if($stmt_tumb){
										 $stmt_tumb->execute();
										 $stmt_tumb->store_result();
										 $stmt_tumb->bind_result($tumb);
										 $stmt_tumb->fetch();
										 if($responses_array['cres'] !=''){
											 $stmt1->close();
											 if($responses_array['cres'] != null){
												 $cres_array_file=$responses_array['cres'][0];
												 $mem_name_cres=$tumb_res='';
												 if(($stmt1=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$cres_array_file['U_ID']."'"))){
													$stmt1->execute();
													$stmt1->store_result();
													$stmt1->bind_result($mem_name_cres);
													$stmt1->fetch();
													if($mem_name_cres) {
														$stmt_tumb->close();
													
														 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$cres_array_file['U_ID']."'");
														 if($stmt_tumb){
															 $stmt_tumb->execute();
															 $stmt_tumb->store_result();
															 $stmt_tumb->bind_result($tumb_cres);
															 $stmt_tumb->fetch();
															 $date_of_cres=date("j \.m \.Y",$cres_array_file['cres_time']);
															 $cres_array=array('CRES_ID'=>$cres_array_file['CRES_ID'],
																				'name'=>$mem_name_cres,
																				'tumb'=>$tumb_cres,
																				'cres_content'=>$cres_array_file['cres_content'],
																				'cres_time'=>$date_of_cres
																				);
															 }
														}
													}
												
												 }
											 }
											 $date_of_res=date("j \.m \.Y",$responses_array['res_time']);
											 $temp_array=array('RES_ID'=>$responses_array['RES_ID'],
																'U_ID'=>$responses_array['U_ID'],
																'name'=>$mem_name,
																'tumb'=>$tumb,
																'res_content'=>$responses_array['res_content'],
																'res_time'=>$date_of_res,
																'cres_array'=>$cres_array
																);
																
											 array_push($res_array,$temp_array);
											
										 }
									}
								}
							}
						}
						 $date=date("j \of F Y",$t_date);
						 $json_temp['topic_id']=$topic_id;
						 $json_temp['ID']=$U_ID_t1;
						 $json_temp['name']=$u_mem_name;
						 $json_temp['tumb']=$u_tumb;
						 $json_temp['auth']=$auth;
						 $json_temp['room_id']=$room_id;
						 $json_temp['corner_id']=$corner_id;
						 $json_temp['corner_name']=$corner_name;
						 $json_temp['t_title']=$t_title;
						 $json_temp['topic']=$topic;
						 $json_temp['t_date']=$date;
						 $json_temp['data']=$data;
						 $json_temp['likes']=$likes_no;
						 $json_temp['dislikes']=$dislikes_no;	
						 $json_temp['liked']=$liked;
						 $json_temp['responses']=$res_array;		
						 array_push($json,$json_temp);	
							}
						
					
					
			}return ($json);
						 }
		 
		 
		 }
	 function corner_topics_list($corner_id){
		 
		 $s=$config['start'];
		 $e=$config['end'];
		 $U_ID_t=$U_ID=$GLOBALS['U_ID'];
		 $dat=$GLOBALS['auth']=0;
		 $likers_temp=array();
		 $u_mem_name=$u_tumb='';
		 if($config['ID'] != 'false'){
			 $U_ID=$config['ID'];
			 }
			$json=array();
			if(($stmt=$GLOBALS['mysqli']->prepare("SELECT `TOPIC_ID`, `ID`, `ROOM_ID`, `CORNER_ID`, `topic_type`, `topictitle`, `date_of_topic` from `fireconverse`.`topics` where ID=$U_ID "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($topic_id,$U_ID_t1,$room_id,$corner_id,$topic_type,$t_title,$t_date);
				while($stmt->fetch()){
					if(($stmt1=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$U_ID_t1."'"))){
								$stmt1->execute();
								$stmt1->store_result();
								$stmt1->bind_result($u_mem_name);
								$stmt1->fetch();
								$stmt1->close();
								if($u_mem_name) {
									 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$U_ID_t1."'");
									 if($stmt_tumb){
										 $stmt_tumb->execute();
										 $stmt_tumb->store_result();
										 $stmt_tumb->bind_result($u_tumb);
										 $stmt_tumb->fetch();
										 $stmt_tumb->close();
									 }
								}
					}
				$filename="../../data/userprofile/topics/".$U_ID_t1."/".$topic_id."/".$U_ID_t1."_".$room_id."_".$corner_id."_".$topic_id.".txt";
					if(file_exists($filename) && $topic_array_file=json_decode(file_get_contents($filename),true)){
					
					 
			
						$t_title=$topic_array_file['topic_title'];
						$topic=$topic_array_file['topic_content'];
						$t_date=$topic_array_file['topic_time'];
						$data=$topic_array_file['topic_pic'];
						$corner_id=$topic_array_file['CORNER_ID'];
						$likes_no=$liked=$dislikes_no=0; 
						if($topic_array_file['likers']){
							$likers_temp=$topic_array_file['likers'];
							$likes_no=sizeof($likers_temp);
							if(in_array($U_ID,$likers_temp)){
							$liked=1;
								}
							
						   }
						if($topic_array_file['dislikers']){
							$dislikers_temp=$topic_array_file['dislikers'];
							$dislikes_no=sizeof($dislikers_temp); 
							if(in_array($U_ID,$dislikers_temp)){
								$liked=-1;
								}
						}	
						if($U_ID_t1==$U_ID) $auth=1;
						else $auth=0;
						if($corner_id){
							if(($stmt1=$GLOBALS['mysqli']->prepare("select `corner_name` from `fireconverse`.`corner` where CORNER_ID=$corner_id "))&& ($stmt1->execute())){
							
							$stmt1->store_result();
							$stmt1->bind_result($corner_name);
							$stmt1->fetch();
								}
						}
						else{
							$corner_name="";
							}
						$res_array=array();
						if($topic_array_file['res_array']){
						$res_array_file=$topic_array_file['res_array'];
						$count_res=sizeof($res_array_file)-1; 
						$c=sizeof($res_array_file);
						if(-$s<$count_res) $temp_start=$count_res+$s; else $temp_start=0;
						if(-$e<$count_res) $temp_end=$count_res+$e; else $temp_end=$count_res; 
						if($c)
						for($i=$temp_start;$i<$temp_end;$i++){ 
							$responses_array=$res_array_file[$i];
							$mem_name='';
							$tumb='';
							$cres_array=array();
							if(($stmt1=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$responses_array['U_ID']."'"))){
								$stmt1->execute();
								$stmt1->store_result();
								$stmt1->bind_result($mem_name);
								$stmt1->fetch();
								if($mem_name) {
									 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$responses_array['U_ID']."'");
									 if($stmt_tumb){
										 $stmt_tumb->execute();
										 $stmt_tumb->store_result();
										 $stmt_tumb->bind_result($tumb);
										 $stmt_tumb->fetch();
										 if($responses_array['cres'] !=''){
											 $stmt1->close();
											 if($responses_array['cres'] != null){
												 $cres_array_file=$responses_array['cres'][0];
												 $mem_name_cres=$tumb_res='';
												 if(($stmt1=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$cres_array_file['U_ID']."'"))){
													$stmt1->execute();
													$stmt1->store_result();
													$stmt1->bind_result($mem_name_cres);
													$stmt1->fetch();
													if($mem_name_cres) {
														$stmt_tumb->close();
													
														 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$cres_array_file['U_ID']."'");
														 if($stmt_tumb){
															 $stmt_tumb->execute();
															 $stmt_tumb->store_result();
															 $stmt_tumb->bind_result($tumb_cres);
															 $stmt_tumb->fetch();
															 $date_of_cres=date("j \.m \.Y",$cres_array_file['cres_time']);
															 $cres_array=array('CRES_ID'=>$cres_array_file['CRES_ID'],
																				'name'=>$mem_name_cres,
																				'tumb'=>$tumb_cres,
																				'cres_content'=>$cres_array_file['cres_content'],
																				'cres_time'=>$date_of_cres
																				);
															 }
														}
													}
												
												 }
											 }
											 $date_of_res=date("j \.m \.Y",$responses_array['res_time']);
											 $temp_array=array('RES_ID'=>$responses_array['RES_ID'],
																'U_ID'=>$responses_array['U_ID'],
																'name'=>$mem_name,
																'tumb'=>$tumb,
																'res_content'=>$responses_array['res_content'],
																'res_time'=>$date_of_res,
																'cres_array'=>$cres_array
																);
																
											 array_push($res_array,$temp_array);
											
										 }
									}
								}
							}
						}
						 $date=date("j \of F Y",$t_date);
						 $json_temp['topic_id']=$topic_id;
						 $json_temp['ID']=$U_ID_t1;
						 $json_temp['name']=$u_mem_name;
						 $json_temp['tumb']=$u_tumb;
						 $json_temp['auth']=$auth;
						 $json_temp['room_id']=$room_id;
						 $json_temp['corner_id']=$corner_id;
						 $json_temp['corner_name']=$corner_name;
						 $json_temp['t_title']=$t_title;
						 $json_temp['topic']=$topic;
						 $json_temp['t_date']=$date;
						 $json_temp['data']=$data;
						 $json_temp['likes']=$likes_no;
						 $json_temp['dislikes']=$dislikes_no;	
						 $json_temp['liked']=$liked;
						 $json_temp['responses']=$res_array;		
						 array_push($json,$json_temp);	
							}
						
					
					
			}return json_encode(($json));
						 }
		 
		 
		 
		 }
	 function likers_list($topic_id){
		 
		 $json='['; 
		 if(($stmt=$GLOBALS['mysqli']->prepare("select `TOPIC_ID`,`ID`,`ROOM_ID`,`CORNER_ID` from `fireconverse`.`topics` where TOPIC_ID='".$topic_id."' "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($topic_id,$mem_ID,$room_id,$corner_id);
				$stmt->fetch();
				if($topic_id){
					$stmt->close();
					$filename="../../data/userprofile/topics/".$mem_ID."/".$topic_id."/".$mem_ID."_".$room_id."_".$corner_id."_".$topic_id.".txt";
					if(file_exists($filename)){
						$topic_array_file=json_decode(file_get_contents($filename),true);
						$likers=$topic_array_file['likers'];
						if($likers){
							foreach($likers as $U_ID_l){
								
								if(($stmt=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$U_ID_l."'")) && ($stmt->execute())){
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
			
				}
			}
		$json.=']';
		return $json;	
		 }
		 
	function dislikers_list($topic_id){
		$json='['; 
		 if(($stmt=$GLOBALS['mysqli']->prepare("select `TOPIC_ID`,`ID`,`ROOM_ID`,`CORNER_ID` from `fireconverse`.`topics` where TOPIC_ID='".$topic_id."' "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($topic_id,$mem_ID,$room_id,$corner_id);
				$stmt->fetch();
				if($topic_id){
					$stmt->close();
					$filename="../../data/userprofile/topics/".$mem_ID."/".$topic_id."/".$mem_ID."_".$room_id."_".$corner_id."_".$topic_id.".txt";
					if(file_exists($filename)){
						$topic_array_file=json_decode(file_get_contents($filename),true);
						$dislikers=$topic_array_file['dislikers'];
					if($dislikers){
				
				foreach($dislikers as $U_ID_l){
					
					if(($stmt=$GLOBALS['mysqli']->prepare("select `name` from `fireconverse`.`members` where ID='".$U_ID_l."'")) && ($stmt->execute())){
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
						
				}}}
			}
		}
		$json.=']';
		return $json;	
		} 
	
	function show_responses($topic_id,$s,$e){
		
		
		
		 if(($stmt=$GLOBALS['mysqli']->prepare("select `TOPIC_ID`,`ID`,`ROOM_ID`,`CORNER_ID` from `fireconverse`.`topics` where TOPIC_ID='".$topic_id."' "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($topic_id,$mem_ID,$room_id,$corner_id);
				$stmt->fetch();
				if($topic_id){
					$stmt->close();
					$filename="../../data/userprofile/topics/".$mem_ID."/".$topic_id."/".$mem_ID."_".$room_id."_".$corner_id."_".$topic_id.".txt";
					if(file_exists($filename)){
						$topic_array_file=json_decode(file_get_contents($filename),true);
						$res_array_file=$topic_array_file['res_array'];
						$count_res=sizeof($res_array_file)-1;
						$c=$count_res+1;
						if(-$s<$count_res) $temp_start=$count_res+$s; else $temp_start=0;
						if(-$e<$count_res) $temp_end=$count_res+$e; else $temp_end=$count_res; 
						if($count_res)
						for($i=$temp_start;$i<$temp_end;$i++){
							$responses_array=$res_array_file[$i];
							if(($stmt1=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$responses_array['U_ID']."'"))){
								$stmt1->execute();
								$stmt1->store_result();
								$stmt1->bind_result($mem_name);
								$stmt1->fetch();
								if($mem_name) {
									 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$mem_ID");
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
								 
								 
									 $date=date("j \.m \.Y",$responses_array['res_time']);
									 
									 $json.='{"res_id":"'.$responses_array['RES_ID'].'",';
									 $json.='"ID":"'.$responses_array['U_ID'].'",';
									 $json.='"mem_name":"'.$mem_name.'",';
									 $json.='"mem_tumb":"'.$tumb.'",';
									 $json.='"topic_id":"'.$topic_id.'",';
									 $json.='"res_text":"'.$responses_array['res_content'].'",';
									 $json.='"date_of_res":"'.$date.'"}';
							 
						}
					
					}
					else $error="file not found";
				}
			}
			$json.=']';
			return $json;
		 
		}
	function topics_list($config){
		 $U_ID_t=$U_ID=$GLOBALS['U_ID'];
		 $dat=$auth=0;
		 $likers_temp=array();
		 if($config['ID'] != 'false'){
			 $U_ID=$config['ID'];
			 }
			$json='[';
			if(($stmt=$GLOBALS['mysqli']->prepare("SELECT `TOPIC_ID`, `ID`, `ROOM_ID`, `CORNER_ID`, `topic_type`, `topictitle`, `date_of_topic` from `fireconverse`.`topics` where ID=$U_ID "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($topic_id,$U_ID_t1,$room_id,$corner_id,$topic_type,$t_title,$t_date);
				while($stmt->fetch()){
					
				$filename="../../data/userprofile/topics/".$U_ID_t1."/".$topic_id."/".$U_ID_t1."_".$room_id."_".$corner_id."_".$topic_id.".txt";
					if(file_exists($filename) && $topic_array_file=json_decode(file_get_contents($filename),true)){
						if($json !='[')
					 		$json.=',';
					 
						
						$t_title=$topic_array_file['topic_title'];
						$topic=$topic_array_file['topic_content'];
						$t_date=$topic_array_file['topic_time'];
						$data=$topic_array_file['topic_pic'];
						$corner_id=$topic_array_file['CORNER_ID'];
						$likes_no=$liked=$dislikes_no=0; 
						if($topic_array_file['likers']){
							$likers_temp=$topic_array_file['likers'];
							$likes_no=sizeof($likers_temp);
							if(in_array($U_ID,$likers_temp)){
							$liked=1;
								}
							
						   }
						if($topic_array_file['dislikers']){
							$dislikers_temp=$topic_array_file['dislikers'];
							$dislikes_no=sizeof($dislikers_temp); 
							if(in_array($U_ID,$dislikers_temp)){
								$liked=-1;
								}
						}	
						if($U_ID_t1==$U_ID) $auth=1;
						else $auth=0;
						if($corner_id){
							if(($stmt1=$GLOBALS['mysqli']->prepare("select `corner_name` from `fireconverse`.`corner` where CORNER_ID=$corner_id "))&& ($stmt1->execute())){
							
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
			 
		}
	function mem_name($mem_ID){
		if(($stmt=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$mem_ID."'")) && ($stmt->execute())){
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
	function cornersid_in_room($room_id){
		if(($stmt=$GLOBALS['mysqli']->prepare("select * from `fireconverse`.`corner` where `ROOM_ID`='".$room_id."'")) && ($stmt->execute())){
				$stmt->store_result();
				$stmt->bind_result($corner_id,$admin_id1,$room_id,$corner_name,$corner_desc,$data,$topic_id,$articles,$polls,$followers,$time,$heat);
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
				 $json.='"articles":"'.$articles.'",';
				 $json.='"polls":"'.$polls.'",';
				 $json.='"followers":"'.$followers.'",';
				 $json.='"time":"'.$date.'",';
				 $json.='"heat":"'.$heat.'"}';
			
			
  			 }
			$json.=']';
	echo $json; 
		}
	}		

	function mem_info($mem_ID){
		$json='[';
		foreach($mem_ID as $temp_ID){
		if(($stmt=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$temp_ID."'")) && ($stmt->execute())){
			$stmt->store_result();
			$stmt->bind_result($mem_name);
			$stmt->fetch();
				if($mem_name) {
			 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$temp_ID");
			 if($stmt_tumb){
				 $stmt_tumb->execute();
				 $stmt_tumb->store_result();
				 $stmt_tumb->bind_result($tumb);
				 $stmt_tumb->fetch();
				  if($json !='['){
					 $json.=',';
					 }
				if($tumb=="" || !file_exists($tumb)){
					$tumb="../../mydata/pics/unknownuser.jpg"; 
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
	function navbar_info(){
		$array=array();
		$stmt_signs=$GLOBALS['mysqli']->prepare("select `tumb_realavatar`,`signno`,`sign` from fireconverse.meminfo where ID='".$GLOBALS['U_ID']."' ");
			if($stmt_signs){
				$stmt_signs->execute();
				$stmt_signs->store_result();
				$stmt_signs->bind_result($tumb,$sign_id,$sign);
				$stmt_signs->fetch();
				}
				
					if($sign==""){
								$sign=$GLOBALS['u_name'];
						}
					if($sign_id==0){
						$sign_id="1";
			
						}
			$stmt_font=$GLOBALS['mysqli']->prepare("select `fontname`,`fonts` from fireconverse.fonts where `fontid`='".$sign_id."' ");
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
				$array=array('sign'=>$sign,   
						'signid'=>$sign_id,
						'fontname'=>$fontname,
						'fonts'=>$fonts,
						'tumb'=>$tumb);
				
				return $array;
		}
	function tumb(){
	 $status="(no status)";
	 
	 $stmt_tumb_updater=$GLOBALS['mysqli']->prepare("SELECT `status`,`wrappers`,`tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$GLOBALS['U_ID']."'");
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
				if($tumb=="" || !file_exists($tumb)){
					$tumb="../../mydata/pics/unknownuser.jpg"; 
					 }
				if($wrapper=="" && !file_exists($wrapper)){
					$wrapper=false; 
					 }
				$tumb_array=array('status'=>$status_div,
									'wrapper'=>$wrapper,
									'tumb'=>$tumb);
				
				return $tumb_array;
	}
	function admin($mem_ID){ 
		if($mem_ID==='true'){
		$mem_ID=$GLOBALS['U_ID'];
		}
	else{
		$mem_ID=$mem_ID;
		}
	if($mem_ID){
		$r=0;
		$corner_ids=array(); 
	  	if(($stmt=$GLOBALS['mysqli']->prepare("select `CORNER_ID` from `fireconverse`.`corner` where `ADMIN_ID`=$mem_ID LIMIT 5")) &&($stmt->execute())){
			$res=$stmt->get_result();
			while($row=$res->fetch_array(MYSQLI_NUM)){
				foreach($row as $r) {
					$corner_ids[]=$r;
					} 
				}return corners_info($corner_ids);
				
			}
		else return "notfound";
		}
		
		}
	function corners_info($corners_id){
		$corners_array=array();
		foreach($corners_id as $forum_id){
			
		
		   if(($stmt=$GLOBALS['mysqli']->prepare("select * from `fireconverse`.`corner` where `CORNER_ID`=$forum_id")) && ($stmt->execute())){
			 $stmt->store_result(); 
			 $stmt->bind_result($forum_id,$admin_id,$room_id,$corner_name,$corner_desc,$data,$topic_id,$articles,$polls,$followers,$time_c,$heat);
				 while($stmt->fetch()){
				 
					 $date=date("j \of F Y",$time_c);
					 array_push($corners_array,array('admin_id'=>$admin_id,
										'corner_id'=>$forum_id,
										'room_id'=>$room_id,
										'corner_name'=>$corner_name,
										'corner_desc'=>$corner_desc,
										'banner_pic'=>$data,
										'topic_id'=>$topic_id,
										'articles'=>$articles,
										'polls'=>$polls,
										'followers'=>$followers,
										'time'=>$date));
			
		
			
  			 		}
				}
			}
			return $corners_array;		
		
		}
	 //===================
if(isset($_POST['flag'])){
	 if(($_POST['flag']=='topics_list_total') && $_POST['configaration']){
		  echo json_encode(topics_list_total($_POST['configaration']));
		 }
	 
	 if(($_POST['flag']=='likers_list') && $_POST['topic_id']){
		echo likers_list($_POST['topic_id']);
	 }
	 if(($_POST['flag']=='dislikers_list') && $_POST['topic_id']){
		echo dislikers_list($_POST['topic_id']);
	 }
	 
	 if(($_POST['flag']=="show_responses") && isset($_POST['topic_id'],$_POST['count_res_start'],$_POST['count_res_end']) ){
		 echo show_responses($_POST['topic_id'],$_POST['count_res_start'],$_POST['count_res_end']);
		 }
	 
	 if(($_POST['flag']=='topics_list') && $_POST['configaration']){
		echo  topics_list($_POST['configaration']);
		 }
	 if(($_POST['flag']=='corner_topics_list') && $_POST['configaration']){
		 echo corner_topics_list($_POST['configaration']);
		 }
	if(($_POST['flag']=="cornersid_in_room") && $_POST['room_id']){
		echo cornersid_in_room($_POST['room_id']);
			
 		 } 
   if(($_POST['flag'] =="mem_info") && ($_POST['id_list'])){
		echo mem_info($_POST['id_list']);
		
		}
	if($_POST['flag']=='mem_name' && $_POST['mem_ID']){
		echo mem_name($_POST['mem_ID']);
		}
	
	 if($_POST['flag']=="navbar_info"){	
		echo json_encode(navbar_info());
	 }
	if($_POST['flag']=="tumb"){
	echo json_encode(tumb());
				
	}	
	if(($_POST['flag']=="admin_corner") && ($_POST['mem_ID'])){
		echo json_encode(admin($_POST['mem_ID']));
	}
	if(($_POST['flag']=="corner_info") && (isset($_POST['corner_id']))){
	
		echo json_encode(corners_info($_POST['corner_id']));
 	 }
  
 if(($_POST['flag']=='search_members') && isset($_POST['key_term'])){ 
	 $key_term='"'.$_POST['key_term'].'"'; 
	 $matched=array();
	 $stm=$GLOBALS['mysqli']->prepare("select `ID`,`name` from `fireconverse`.`members` WHERE MATCH(`name`) AGAINST('".$key_term."' IN BOOLEAN MODE)");
	 if($stm->execute()){  
		 $stm->store_result();
		 $stm->bind_result($m_ID,$matchd);
		 while($stm->fetch()){
			
			array_push($matched,array("ID"=>$m_ID,
										"name"=>$matchd,
										"tumb"=>tumb_others($m_ID),
										"follow_check"=>follow_check($U_ID,$m_ID)));
		 }
		 }
		 echo json_encode($matched);
	 }
 if($_POST['flag']=="previous_tumbs"){
		$array_pre="";
		$array='';
		$articles=$polls='';
		$stmt_mem=$GLOBALS['mysqli']->prepare("select `avatars` from `fireconverse`.`meminfo` where ID='$U_ID'");
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
					if(file_exists($add)){
						$append_div="<li class='li_pre'><img class='prevs' src='".$add."'/></li>";
						$array.=$append_div;
					}
				}
				
				echo $array;
			}
			else {
				echo "no_prev";
				}
			}
		 }
	

if($_POST['flag']=="fonts_loader"){
	$font_array=array();
	$json='[';
	if(($stmt=$GLOBALS['mysqli']->prepare("select * from `fireconverse`.`fonts`")) && $stmt->execute()){
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


   
	
 if(($_POST['flag']=="corner_info_single") && (isset($_POST['corner_id_single']))){
	$json='[';
		if($_POST['corner_id_single']){
		$forum_id=$_POST['corner_id_single'];
	   if(($stmt=$GLOBALS['mysqli']->prepare("select * from `fireconverse`.`corner` where `CORNER_ID`=$forum_id")) && ($stmt->execute())){
		 $stmt->store_result(); 
		 $stmt->bind_result($forum_id,$admin_id,$room_id,$corner_name,$corner_desc,$data,$topic_id,$articles,$polls,$followers,$time_c,$heat);
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
			 $json.='"articles":"'.$articles.'",';
			 $json.='"polls":"'.$polls.'",';
			 $json.='"followers":"'.$followers.'",';
			 $json.='"time":"'.$date.'",';
			 $json.='"heat":"'.$heat.'"}';
			}
			$json.=']';
			echo $json;
   
		}		
 	}
  



	
}}}

	 else{
		 header("location:loginPage.php");
	 }
	 //--------------non-users
	 
	 function topic_info_single_non($config){
		 $topic_id=$config['topic_id'];
		 $s=$config['start'];
		 $e=$config['end'];
		 $U_ID_t=$U_ID=$GLOBALS['U_ID'];
		 $dat=$GLOBALS['auth']=0;
		 $likers_temp=array();
		 $u_mem_name=$u_tumb='';
		 
			$json=array();
			if(($stmt=$GLOBALS['mysqli']->prepare("SELECT `TOPIC_ID`, `ID`, `ROOM_ID`, `CORNER_ID`, `topic_type`, `topictitle`, `date_of_topic` from `fireconverse`.`topics` where 	`TOPIC_ID`=$topic_id "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($topic_id,$U_ID_t1,$room_id,$corner_id,$topic_type,$t_title,$t_date);
				if($stmt->fetch()){
					
					if($topic_type=='1'){
						header("location:article.php?article=$topic_id");
						}
					else if($topic_type=='2'){
						header("location:poll.php?poll=$topic_id");
						}
					
					
					if(($stmt1=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$U_ID_t1."'"))){
								$stmt1->execute();
								$stmt1->store_result();
								$stmt1->bind_result($u_mem_name);
								$stmt1->fetch();
								$stmt1->close();
								if($u_mem_name) {
									 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$U_ID_t1."'");
									 if($stmt_tumb){
										 $stmt_tumb->execute();
										 $stmt_tumb->store_result();
										 $stmt_tumb->bind_result($u_tumb);
										 $stmt_tumb->fetch();
										 $stmt_tumb->close();
									 }
								}
					}
				$filename="../../data/userprofile/topics/".$U_ID_t1."/".$topic_id."/".$U_ID_t1."_".$room_id."_".$corner_id."_".$topic_id.".txt";
					if(file_exists($filename) && $topic_array_file=json_decode(file_get_contents($filename),true)){
					
					 
						switch($topic_array_file['ROOM_ID']){
											case '1':
												$room_name='Sports';
												break;
											case '2':
												$room_name='Health';
												break;
											case '3':
												$room_name='Movies';
												break;
											case '4':
												$room_name='Fashion';
												break;
											case '5':
												$room_name='Tech';
												break;
											default:$room_name='Sports';
										}
						$t_title=$topic_array_file['topic_title'];
						$topic=$topic_array_file['topic_content'];
						$t_date=$topic_array_file['topic_time'];
						$data=$topic_array_file['topic_pic'];
						$corner_id=$topic_array_file['CORNER_ID'];
						$likes_no=$liked=$dislikes_no=0; 
						$liked="../../mydata/pics/like.png";
						$liked_id='like_i';
						if($topic_array_file['likers']){
							$likers_temp=$topic_array_file['likers'];
							$likes_no=sizeof($likers_temp);
							if(in_array($U_ID,$likers_temp)){
							$liked="../../mydata/pics/liked.png";
							$liked_id='liked_i';
								}
							
						   }
						if($topic_array_file['dislikers']){
							$dislikers_temp=$topic_array_file['dislikers'];
							$dislikes_no=sizeof($dislikers_temp); 
							if(in_array($U_ID,$dislikers_temp)){
								$liked="../../mydata/pics/disliked.png";
								$liked_id='disliked_i';
								}
						}	
						if($U_ID_t1==$U_ID) $auth=1;
						else $auth=0;
						if($corner_id){
							if(($stmt1=$GLOBALS['mysqli']->prepare("select `corner_name` from `fireconverse`.`corner` where CORNER_ID=$corner_id "))&& ($stmt1->execute())){
							
							$stmt1->store_result();
							$stmt1->bind_result($corner_name);
							$stmt1->fetch();
								}
						}
						else{
							$corner_name="";
							}
						$res_array=array();
						if($topic_array_file['res_array']){
						$res_array_file=$topic_array_file['res_array'];
						$count_res=sizeof($res_array_file)-1; 
						$c=sizeof($res_array_file);
						if(-$s<$count_res) $temp_start=$count_res+$s; else $temp_start=0;
						if(-$e<$count_res) $temp_end=$count_res+$e; else $temp_end=$count_res; 
						if($c)
						for($i=$temp_start;$i<=$temp_end;$i++){ 
							$responses_array=$res_array_file[$i];
							$mem_name='';
							$tumb='';
							$cres_array=array();
							if(($stmt1=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$responses_array['U_ID']."'"))){
								$stmt1->execute();
								$stmt1->store_result();
								$stmt1->bind_result($mem_name);
								$stmt1->fetch();
								if($mem_name) {
									 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$responses_array['U_ID']."'");
									 if($stmt_tumb){
										 $stmt_tumb->execute();
										 $stmt_tumb->store_result();
										 $stmt_tumb->bind_result($tumb);
										 $stmt_tumb->fetch();
										 if($responses_array['cres'] !=''){
											 $stmt1->close();
											 if($responses_array['cres'] != null){
												 $cres_array_file=$responses_array['cres'][0];
												 $mem_name_cres=$tumb_res='';
												 if(($stmt1=$GLOBALS['mysqli']->prepare("select `name` from fireconverse.members where ID='".$cres_array_file['U_ID']."'"))){
													$stmt1->execute();
													$stmt1->store_result();
													$stmt1->bind_result($mem_name_cres);
													$stmt1->fetch();
													if($mem_name_cres) {
														$stmt_tumb->close();
													
														 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$cres_array_file['U_ID']."'");
														 if($stmt_tumb){
															 $stmt_tumb->execute();
															 $stmt_tumb->store_result();
															 $stmt_tumb->bind_result($tumb_cres);
															 $stmt_tumb->fetch();
															 $date_of_cres=date("j \.m \.Y",$cres_array_file['cres_time']);
															 $cres_array=array('CRES_ID'=>$cres_array_file['CRES_ID'],
																				'name'=>$mem_name_cres,
																				'tumb'=>$tumb_cres,
																				'cres_content'=>$cres_array_file['cres_content'],
																				'cres_time'=>$date_of_cres
																				);
															 }
														}
													}
												
												 }
											 }
											 $date_of_res=date("j \.m \.Y",$responses_array['res_time']);
											 $temp_array=array('RES_ID'=>$responses_array['RES_ID'],
																'U_ID'=>$responses_array['U_ID'],
																'name'=>$mem_name,
																'tumb'=>$tumb,
																'res_content'=>$responses_array['res_content'],
																'res_time'=>$date_of_res,
																'cres_array'=>$cres_array
																);
																
											 array_push($res_array,$temp_array);
											
										 }
									}
								}
							}
						}
						 $date=date("j \of F Y",$t_date);
						 $json_temp['topic_id']=$topic_id;
						 $json_temp['ID']=$U_ID_t1;
						 $json_temp['name']=$u_mem_name;
						 $json_temp['tumb']=$u_tumb;
						 $json_temp['auth']=$auth;
						 $json_temp['room_id']=$topic_array_file['ROOM_ID'];
						 $json_temp['room_name']=$room_name;
						 $json_temp['corner_id']=$corner_id;
						 $json_temp['corner_name']=$corner_name;
						 $json_temp['t_title']=$t_title;
						 $json_temp['topic']=$topic;
						 $json_temp['t_date']=$date;
						 $json_temp['data']=$data;
						 $json_temp['likes']=$likes_no;
						 $json_temp['dislikes']=$dislikes_no;	
						 $json_temp['liked']=$liked;
						 $json_temp['liked_id']=$liked_id;
						 $json_temp['responses']=$res_array;		
						 array_push($json,$json_temp);	
							}
						
					
					
			}return ($json);
						 }
		 
		 
		 
		 }
	if(isset($_POST['flag'])){
		if(($_POST['flag']=='topic_info_single') && ($_POST['configaration'])){
		 return json_encode(topic_info_single_non($_POST['configaration']));
		 }
	}
	
	 //functions 
	 
	 function tumb_others($other_ID){
		 if($other_ID){
		 $stmt_tumb=$GLOBALS['mysqli']->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`='".$other_ID."'");
			if($stmt_tumb){
				$stmt_tumb->execute();
				$stmt_tumb->store_result();
				$stmt_tumb->bind_result($tumb);
				$stmt_tumb->fetch();
				if($tumb) return $tumb;
				else return "../../mydata/pics/unknownuser.jpg";
			}
		 }
	 }
	 
	 function follow_check($memid,$fllw_id){
		 $array=array('me'=>false,'he'=>false);
		 if($stmt03=$GLOBALS['mysqli']->prepare("select `followings_ID` from `fireconverse`.`followings` where ID=$memid")){
				 if($stmt03->execute()){
					$stmt03->bind_result($temp4);
					$stmt03->store_result();
					$stmt03->fetch();
					$temp_f2=array();
					if($temp4)
						$temp_f2=unserialize($temp4);
					if(in_array($fllw_id,$temp_f2)==true){
						$array['he']=true;
						}
					
				 }
			}
		$stmt03->close();
		if($stmt03=$GLOBALS['mysqli']->prepare("select `followings_ID` from `fireconverse`.`followings` where ID=$fllw_id")){
				 if($stmt03->execute()){
					$stmt03->bind_result($temp);
					$stmt03->store_result();
					$stmt03->fetch();
					$temp_f=array();
					if($temp)
						$temp_f=unserialize($temp);
					if(in_array($memid,$temp_f)==true){
						$array['me']=true;
						}
					
				 }
			}
		return $array;
		 }
	 
	 //inserting counter response from profile.php
	 
 ?>
