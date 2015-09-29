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
				session_start();
				}
			session_regenerate_id(); 	 
	}
		sec_session_start();
		}
function fillKeys($keys, $value) {
    $return = array();
    foreach ( $keys as $key => $val ) {
        $return[is_array($val) ? $key : $val] = is_array($val) ? fillKeys($val, $value) : $value;
    }
    return $return;
}
function delTree($dir) { 
   $files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    } 
    return rmdir($dir); 
  } 
 if(isset($_SESSION['u_ID'],$_SESSION['u_name'],$_SESSION['u_email'], $_SESSION['xploded_u_email'], $_SESSION['login_string'])) {
     $U_ID = $_SESSION['u_ID'];
	 $xploded_u_email=$_SESSION['xploded_u_email'];
	 $u_email=$_SESSION['u_email'];
	 $u_name=$_SESSION['u_name'];
	 $error='';
	 include('csign.php');
	 //----initializing topic_array
	
	$cres_array=array("CRES_ID"=>'',"RES_ID"=>'',"TOPIC_ID"=>'',"U_ID"=>'',"cres_content"=>'',"cres_time"=>'');
	$res_array=array("RES_ID"=>'',"TOPIC_ID"=>'',"U_ID"=>'',"res_content"=>'',"res_time"=>'',"cres"=>array());
	$topic_array=array("TOPIC_ID"=>'',"U_ID"=>'',"ROOM_ID"=>'',"CORNER_ID"=>'', "topic_type"=>'', "topic_title"=>'', "topic_content"=>'', "topic_pic"=>'',"topic_time"=>'',"likers"=>array(),"dislikers"=>array(),"res_array"=>array());
	
	
	
	//-----scriptLikers
	
	if(isset($_POST['flag'], $_POST['like_temp'] , $_POST['topic_id']) && ($_POST['flag']=='like')){
		$like_temp=$_POST['like_temp'];
		$topic_id=$_POST['topic_id'];
		$likes=$likers=$dislikers=0;
		$likers_temp1=$dislikers_temp1=NULL;
		
		if($stmt0=$mysqli->prepare("SELECT `TOPIC_ID`, `ID`, `ROOM_ID`, `CORNER_ID`, `topic_type`, `topictitle` from `fireconverse`.`topics` where `TOPIC_ID` ='".$topic_id."'")){
			$stmt0->execute();
			$stmt0->store_result();
			$stmt0->bind_result($topic_id,$mem_id,$room_id,$corner_id,$topic_type,$topic_title);
			if($stmt0->fetch()){
				$filename="../../data/userprofile/topics/".$mem_id."/".$topic_id."/".$mem_id."_".$room_id."_".$corner_id."_".$topic_id.".txt";
				if(file_exists($filename)){
					$topic_array_file=json_decode(file_get_contents($filename),true);
					$likers=$topic_array_file['likers'];
					$dislikers=$topic_array_file['dislikers'];
					}
				}
		
		function update_likers($likers_temp1,$dislikers_temp1){
				global $topic_array_file,$filename; 
				
				$topic_array_file['likers']=$likers_temp1;
				$topic_array_file['dislikers']=$dislikers_temp1;
				if(file_put_contents($filename,json_encode($topic_array_file))) return true;
				else return false;
					}
				if($like_temp=='1'){
					if($likers){
						if(in_array($U_ID,$likers)){
							exit();
							}
						else{
							array_push($likers,$U_ID);
						    }
						  }
						else{
							$likers==array();
							array_push($likers,$U_ID);
							
							
							}
						if($dislikers){
						
							if(in_array($U_ID,$dislikers)){
								$key=array_search($U_ID,$dislikers);
								unset($dislikers[$key]);
								
								}
						 }
							
						if(update_likers($likers,$dislikers)){ 
							echo "updated_liked";
							}
						}
					
				if($like_temp == '-1'){
					if($dislikers){
						
							if(in_array($U_ID,$dislikers)){
								exit();
								}
							else{
								array_push($dislikers,$U_ID);
						    	}
						}
					else{
						$dislikers_=array ();
						array_push($dislikers,$U_ID);
						
						}
					if($likers){
							
							if(in_array($U_ID,$likers)){
								$key=array_search($U_ID,$likers);
								unset($likers[$key]);
								}
						 }
							
						if(update_likers($likers,$dislikers)){
							echo 'updated_disliked';
							}
					
					}
				
				if($like_temp=='9'){
					
					if($likers){
						
							if(in_array($U_ID,$likers)){
								$key=array_search($U_ID,$likers);
								unset($likers_[$key]);
								
								}
						}
					if($dislikers){
						
							if(in_array($U_ID,$dislikers)){
								$key=array_search($U_ID,$dislikers);
								unset($dislikers[$key]);
								
								}
						}
					if(update_likers($likers,$dislikers)){
							echo 'updated_like';
							}
					
					}
				
			
			}
	

		}
	
	

if(isset($_POST['flag']) && ($_POST['flag']=='add_response') && isset($_POST['topic_id'], $_POST['response_text'])){
	$json='[';
	$error=$tumb='';
	$topic_id=$_POST['topic_id'];
	$response_text=$_POST['response_text'];
	$time=time();
	$response_text=htmlspecialchars($response_text);
	$response_text=preg_replace("/\s+/", " ",nl2br($response_text));
	if($stmt0=$mysqli->prepare("SELECT `TOPIC_ID`, `ID`, `ROOM_ID`, `CORNER_ID`, `topic_type`, `topictitle` from `fireconverse`.`topics` where `TOPIC_ID` ='".$topic_id."'")){
		$stmt0->execute();
		$stmt0->store_result();
		$stmt0->bind_result($topic_id,$mem_id,$room_id,$corner_id,$topic_type,$topic_title);
		if($stmt0->fetch()){
			$filename="../../data/userprofile/topics/".$mem_id."/".$topic_id."/".$mem_id."_".$room_id."_".$corner_id."_".$topic_id.".txt";
			if(file_exists($filename)){
				$topic_array_file=json_decode(file_get_contents($filename),true);
				if($topic_array_file['res_array'] == ''){
					$res_id_count=1;
					}
				else{
					$res_end=end($topic_array_file['res_array']);
					$res_id_count=$res_end['RES_ID']+1;
					}
				fillKeys($res_array,'');
				$res_array['RES_ID']=$res_id_count;
				$res_array['TOPIC_ID']=$topic_id;
				$res_array['U_ID']=$U_ID;
				$res_array['res_content']=$response_text;
				$res_array['res_time']=time();
				array_push($topic_array_file['res_array'],$res_array);
				if(file_put_contents($filename,json_encode($topic_array_file))){
					$stmt_tumb=$mysqli->prepare("SELECT `name` FROM `fireconverse`.`members` WHERE `ID`=$U_ID");
					 if($stmt_tumb){
						 $stmt_tumb->execute();
						 $stmt_tumb->store_result();
						 $stmt_tumb->bind_result($mem_name);
						 $stmt_tumb->fetch();
						 }
					$stmt_tumb->close();
					$stmt_tumb=$mysqli->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$U_ID");
					 if($stmt_tumb){
						 $stmt_tumb->execute();
						 $stmt_tumb->store_result();
						 $stmt_tumb->bind_result($tumb);
						 $stmt_tumb->fetch();
						 }
					 if($json !='['){
						 $json.=',';
							 }
						$date=date("j \of F Y",$time);
						$json.='{"res_id":"'.$res_id_count.'",';
						$json.='"ID":"'.$U_ID.'",';
						$json.='"mem_name":"'.$mem_name.'",';
						$json.='"mem_tumb":"'.$tumb.'",';
						$json.='"topic_id":"'.$topic_id.'",';
						$json.='"res_text":"'.$response_text.'",';
						$json.='"date_of_res":"'.$date.'"}';
						 
					}
					$json.=']';
					echo $json;
				}
				else $error=false;
				
				
			}
			else $error="file not found";
			
		}
		else $error=false;
	echo $error;
	}
	
if( isset($_POST['flag'],$_POST['topic_id'], $_POST['edit'],$_POST['edit1']) && $_POST['flag']=='edit_topic' ){
	$topic_id=$_POST['topic_id'];
	$edit=$_POST['edit'];
	$edit1=$_POST['edit1'];
	$topic_t_edit=htmlspecialchars($edit1);
	$topic_t_edit=preg_replace("/\s+/", " ",nl2br($topic_t_edit));
	$topic_cont_edit=htmlspecialchars($edit);
	$topic_cont_edit=preg_replace("/\s+/", " ",nl2br($topic_cont_edit));
	if(($stmt0=$mysqli->prepare("SELECT `TOPIC_ID`, `ID`, `ROOM_ID`, `CORNER_ID`, `topic_type`, `topictitle` from `fireconverse`.`topics` where `TOPIC_ID` ='".$topic_id."'")) && $stmt0->execute()){
		$stmt0->store_result();
		$stmt0->bind_result($topic_id,$mem_id,$room_id,$corner_id,$topic_type,$topic_title);
		if($stmt0->fetch()){
			$filename="../../data/userprofile/topics/".$mem_id."/".$topic_id."/".$mem_id."_".$room_id."_".$corner_id."_".$topic_id.".txt";
			if(file_exists($filename)){
				$topic_array_file=json_decode(file_get_contents($filename),true);
				$topic_array_file['topic_title']=$topic_t_edit;
				$topic_array_file['topic_content']=$topic_cont_edit;
				if(file_put_contents($filename,json_encode($topic_array_file)))
					echo "updated";
				}
			else $error=false;
			}
		else $error=false;
		}
	else $error=false;
	echo $error;
	}
if( isset($_POST['flag'],$_POST['topic_id']) && ($_POST['flag']=='delete_topic')){
	$topic_id=$_POST['topic_id'];
	if(($stmt0=$mysqli->prepare("SELECT `TOPIC_ID`, `ID`, `ROOM_ID`, `CORNER_ID`,`topictitle`, `date_of_topic` from `fireconverse`.`topics` where `TOPIC_ID` ='".$topic_id."'")) && $stmt0->execute()){
		$stmt0->store_result();
		$stmt0->bind_result($topic_id,$mem_id,$room_id,$corner_id,$topic_title,$t_date);
		if($stmt0->fetch()){
			$filename="../../data/userprofile/topics/".$mem_id."/".$topic_id."/".$mem_id."_".$room_id."_".$corner_id."_".$topic_id.".txt";
			if(file_exists($filename)){
				$topic_array_file=json_decode(file_get_contents($filename),true);
				$corner_id=$topic_array_file['CORNER_ID'];
				$MEM_ID=$topic_array_file['U_ID'];
				$dir="../../data/userprofile/topics/".$mem_id."/".$topic_id;
				delTree($dir);
				if(($stmt=$mysqli->prepare("select `topics` from `fireconverse`.`meminfo` where `ID`='".$U_ID."' LIMIT 1")) && ($stmt->execute())){
					$stmt->store-result();
					$stmt->bind_result($topics_list);
					$stmt->fetch();
					$topics_list_array=unserialize($topic_list);
					$key = array_search($topic_id, $topics_list_array);
					if ($key != false) {
						unset($topics_list_array[$key]);
						}
					$topic_list_new=serialize($topics_list_array);
					$stmt->close();
					if(($stmt=$mysqli->prepare("update `fireconverse`.`meminfo` set `topics`='".$topic_list_new."' where `ID`='".$MEM_ID."'")) && ($stmt->execute()))
					$stmt->close();
					$topic_list=$topics_list_array=$topic_list_new='';
				if(($stmt=$mysqli->prepare("select `topics` from `fireconverse`.`corner` where `CORNER_ID`='".$corner_id."' LIMIT 1")) && ($stmt->execute())){
					$stmt->store-result();
					$stmt->bind_result($topics_list);
					$stmt->fetch();
					$topics_list_array=unserialize($topic_list);
					if (($key = array_search($topic_id, $topics_list_array)) !== false) {
						unset($topics_list_array[$key]);
						}
					$topic_list_new=serialize($topics_list_array);
					$stmt->close();
					if(($stmt=$mysqli->prepare("update `fireconverse`.`corner` set `topics`='".$topic_list_new."' where `CORNER_ID`='".$corner_id."'")) && ($stmt->execute())){	$stmt->close();
					if(($stmt=$mysqli->prepare("delete from `fireconverse`.`topics` where `TOPIC_ID`='".$topic_id."' LIMIT 1")) && ($stmt->execute()))
						echo "deleted";
						}
					}
				}
				else $error=false;
			}
			else $error=false;
		}
		else $error=false;
	}
	else $error=false;
	echo $error;
}
if(isset($_POST['topic_title'],$_POST['topic_content'],$_FILES['topic_pic'],$_POST['topic_corner'],$_POST['topic_room'])){
	$t_title=$_POST['topic_title'];
	$t_content=$_POST['topic_content'];
	$t_corner=$_POST['topic_corner'];
	if($t_corner=="") $t_corner=$_POST['topic_corner_origin'];
	$t_corner=intval(str_replace("corner_","",$t_corner));
	$t_room=$_POST['topic_room']; 
	$topic_type=$_POST['topic_type'];
	$topic_type_int=0;
	if($topic_type=='topic_article') $topic_type_int=1;
	$room_id=1;
	switch($t_room){
		case "room_sports":
			$room_id=1;
			break;
		case "room_health":
			$room_id=2;
			break;
		case "room_movies":
			$room_id=3;
			break;
		case "room_fashion":
			$room_id=4;
			break;
		case "room_tech":
			$room_id=5;
			break;
		default:$room_id=1;
			
			  
		}
	$time=time();
	$t_title=htmlspecialchars($t_title);
	$t_content=htmlspecialchars($t_content);
	$t_content=preg_replace("/\s+/", " ",nl2br($t_content));
	

	if($stmt=$mysqli->prepare("insert into `fireconverse`.`topics` (ID, ROOM_ID, CORNER_ID,topic_type, topictitle,date_of_topic) values(?,?,?,?,?,?)")){
		
		$stmt->bind_param('iiiisi',$U_ID,$room_id,$t_corner,$topic_type_int,$t_title,$time);
		if($stmt->execute()){ 
			$id = mysqli_insert_id($mysqli); 
			if($id){ 
				$error="";
				$target='../../data/userprofile/topics/'.$U_ID.'/'; 
				mkdir($target.'/'.$id);
				$filename=$U_ID.'_'.$room_id.'_'.$t_corner.'_'.$id.'.txt';
				$dirname1=$target.$id.'/'.$filename; 
				fillKeys($topic_array,"");
				$topic_array['TOPIC_ID']=$id;
				$topic_array['U_ID']=$U_ID;
				$topic_array['ROOM_ID']=$room_id;
				$topic_array['CORNER_ID']=$t_corner;
				$topic_array['topic_type']=$topic_type;
				$topic_array['topic_title']=$t_title;
				$topic_array['topic_content']=$t_content;
				$topic_array['topic_time']=$time;
				
					if($_FILES['topic_pic']['name']){
						$pic_div=$target.$id;
						$pic_name=array();
						$pic_name=explode("\\",$_FILES['topic_pic']['name']);
						$pic=end($pic_name);
						$temp1=explode(".",$pic);
						$ext=".".end($temp1);
						$pic_name='pic_'.$U_ID.'_'.$room_id.'_'.$t_corner.'_'.$id;
						$pic_final=$pic_div."/".$pic_name.$ext;
						if(move_uploaded_file( $_FILES['topic_pic']['tmp_name'],$pic_final)){
							$srcImage1=imagecreatefromjpeg($pic_final);
							$reX=imagesx($srcImage1);
							$reY=imagesy($srcImage1);
							$srcW=720;
							if($reX>$srcW){
								$temp=$reX/$srcW;
								 $srcH=$reY/$temp;
							}
							else {
								$temp=$srcW/$reX;
								 $srcH=$reY*$temp;
								}
					   
							$dstImage1 = imagecreatetruecolor($srcW,$srcH);
							imagecopyresampled($dstImage1,$srcImage1,0,0,0,0,$srcW,$srcH, $reX, $reY);
							imagejpeg($dstImage1,$pic_final,90);
							$topic_array['topic_pic']=$pic_final;
						}
					 else $error='not updated. file system error';
					 }
					
					if($error==''){
						$content=json_encode($topic_array);
						file_put_contents($dirname1,$content);	
							
						
						if($topic_type=="topic_topic"){
							$temp_array_temp=$topics_arraydb=array();
							$stmt1=$mysqli->prepare("select `topics` from `fireconverse`.`meminfo` where `ID`='".$U_ID."'");
							if($stmt1->execute()){
								$stmt1->store_result();
								$stmt1->bind_result($topic_array_temp);
								$stmt1->fetch();
								if($temp_array_temp) $topics_arraydb=unserialize($topic_array_temp);
								array_push($topics_arraydb,$id);
								$topic_array_temp1=serialize($topics_arraydb);
								$stmt1->close();
								
								$stmt1=$mysqli->prepare("update `fireconverse`.`meminfo` set `topics`='".$topic_array_temp1."' where `ID`='".$U_ID."'");
								if($stmt1->execute()) $error='updated'; 
								else $error="top_up";
									$stmt1->close();
								if($t_corner){
									$temp_array_temp=$topics_arraydb=array();
									$stmt1=$mysqli->prepare("select `topics` from `fireconverse`.`corner` where `CORNER_ID`='".$t_corner."'");
									if($stmt1->execute()){
										$stmt1->store_result();
										$stmt1->bind_result($topic_array_temp);
										
										$stmt1->fetch();
										if($temp_array_temp) $topics_arraydb=unserialize($topic_array_temp);
										array_push($topics_arraydb,$id);
										$topic_array_temp1=serialize($topics_arraydb);
										$stmt1->close();
										$stmt1=$mysqli->prepare("update `fireconverse`.`corner` set `topics`='".$topic_array_temp1."' where `CORNER_ID`='".$t_corner."'");
										if($stmt1->execute()) $error='updated'; 
									}
									else $error="top_sel_cor";
								}
							}
							
							
						}
						else if($topic_type=="topic_article"){
							$temp_array_temp=$topics_arraydb=array();
							$stmt1=$mysqli->prepare("select `articles` from `fireconverse`.`meminfo` where `ID`='".$U_ID."'");
							if($stmt1->execute()){
								$stmt1->store_result();
								$stmt1->bind_result($topic_array_temp);
								
								$stmt1->fetch();
								if($temp_array_temp) $topics_arraydb=unserialize($topic_array_temp);
								array_push($topics_arraydb,$id);
								$topic_array_temp1=serialize($topics_arraydb);
								$stmt1->close();
								
								$stmt1=$mysqli->prepare("update `fireconverse`.`meminfo` set `articles`='".$topic_array_temp1."' where `ID`='".$U_ID."'");
								if($stmt1->execute()) $error='updated'; 
								else $error="top_up";
									$stmt1->close();
								if($t_corner){
									$temp_array_temp=$topics_arraydb=array();
									$stmt1=$mysqli->prepare("select `articles` from `fireconverse`.`corner` where `CORNER_ID`='".$t_corner."'");
									if($stmt1->execute()){
										$stmt1->store_result();
										$stmt1->bind_result($topic_array_temp);
										
										$stmt1->fetch();
										if($temp_array_temp) $topics_arraydb=unserialize($topic_array_temp);
										array_push($topics_arraydb,$id);
										$topic_array_temp1=serialize($topics_arraydb);
										$stmt1->close();
										$stmt1=$mysqli->prepare("update `fireconverse`.`corner` set `articles`='".$topic_array_temp1."' where `CORNER_ID`='".$t_corner."'");
										if($stmt1->execute()) $error='updated'; 
									}
									else $error="top_sel_cor";
								}
							}
							
							
						}
						
					}
				unset($_POST['topic_title'],$_POST['topic_content'],$_POST['topic_pic'],$_POST['topic_corner'],$_POST['topic_room']);
				
				}
				else  $error='notupdated';
			
			}
		else{
			 $error='notupdated';
			}
			
			
		}

	echo $error;
	
	}
	if(isset($_POST['corner_name'],$_POST['corner_desc'],$_POST['location'])){
		$c_title=$_POST['corner_name'];
		$c_desc=$_POST['corner_desc'];
		$c_room=$_POST['corner_room']; 
		switch($c_room){
		case "room_sports":
			$room_id=1;
			break;
		case "room_health":
			$room_id=2;
			break;
		case "room_movies":
			$room_id=3;
			break;
		case "room_fashion":
			$room_id=4;
			break;
		case "room_tech":
			$room_id=5;
			break;
		default:$room_id=1;
			
			
		}
	$time=time();
	$c_title=htmlspecialchars($c_title);
	$c_desc=htmlspecialchars($c_desc);
	$location=$_POST['location'];
	
	if($stmt=$mysqli->prepare("insert into `fireconverse`.`corner` (`ADMIN_ID`,`ROOM_ID`,`corner_name`,`description`,`time`) values (?, ?, ?, ?, ?)")){
		$stmt->bind_param('iissi',$U_ID,$room_id,$c_title,$c_desc,$time);	
		if($stmt->execute()){
			$id=mysqli_insert_id($mysqli);
			if($id){
				$new_name=$id.'_'.$U_ID.'.jpg';
				$dirname="../../data/corners/".$id;
				mkdir($dirname);
				$target=$dirname.'/'.$new_name;
				rename($location,$target);
				$dirname_temp=$dirname."/temp";
				mkdir($dirname_temp);
				$new_name_temp="temp_".$new_name;
				$location_temp=$dirname_temp."/".$new_name_temp;
				$srcImage=imagecreatefromjpeg($target);
				$reX=imagesx($srcImage);
				$reY=imagesy($srcImage);
			    $srcW=$reX*0.1;
			    $srcH=$reY*0.1;
				$dstImage = imagecreatetruecolor($srcW,$srcH);
				if(imagecopyresampled($dstImage,$srcImage,0,0,0,0,$srcW,$srcH, $reX, $reY)){
				 imagejpeg($dstImage, $location_temp, 90);
				}
					 
				
				if($stmt1=$mysqli->prepare("update `fireconverse`.`corner` set `data`='".$target."' where `CORNER_ID`='".$id."'")){
					if($stmt1->execute()){
						
						echo $id;
						}
					else echo "notupdated";
				}
			}
		}
		}
	}
	
	}
 ?>