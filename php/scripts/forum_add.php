<?PHP 
print_r($_POST);
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
	 include('csign.php');

if(isset($_POST['flag']) && ($_POST['flag']=='add_response') && isset($_POST['topic_id'], $_POST['response_text'])){
	$json='[';
	$topic_id=$_POST['topic_id'];
	$response_text=$_POST['response_text'];
	$time=time();
	$response_text=htmlspecialchars($response_text);
	$response_text=preg_replace("/\s+/", " ",nl2br($response_text));
	if($stmt0=$mysqli->prepare("insert into `fireconverse`.`responses` (ID, TOPIC_ID, response, date_of_response) values(?, ?, ?, ?)")){
		$stmt0->bind_param('issi',$U_ID,$topic_id,$response_text,$time);
		if($stmt0->execute()){
			$id = mysqli_insert_id($mysqli);
			if($id){ 
		 
		 if(($stmt=$mysqli->prepare("select * from `fireconverse`.`responses` where RES_ID='".$id."' "))&& ($stmt->execute())){
				
				$stmt->store_result();
				$stmt->bind_result($res_id,$mem_ID,$topic_id,$res_text,$date_of_res,$data);
				while($stmt->fetch()){
					if(($stmt1=$mysqli->prepare("select `name` from fireconverse.members where ID='".$mem_ID."'")) && ($stmt1->execute())){
						$stmt1->store_result();
						$stmt1->bind_result($mem_name);
						$stmt1->fetch();
						if($mem_name) {
							 $stmt_tumb=$mysqli_memdata->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$mem_ID");
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
			}
		else{
			
			}
		
		}
	}
	
if( isset($_POST['flag'],$_POST['topic_id'], $_POST['edit'],$_POST['edit1']) && $_POST['flag']=='edit_topic' ){
	$topic_id=$_POST['topic_id'];
	$edit=$_POST['edit'];
	$edit1=$_POST['edit1'];
	if(($stmt0=$mysqli->prepare("update `fireconverse`.`topics` set `topictitle`='".$edit1."', `topic`='".$edit."'  where `TOPIC_ID`='".$topic_id."'")) && ($stmt0->execute())){
		
		echo "updated";
		}
	}
if( isset($_POST['flag'],$_POST['topic_id'],$_POST['img']) && ($_POST['flag']=='delete_topic')){
	$topic_id=$_POST['topic_id'];
	if($_POST['img']==1){
		if(($stmt0=$mysqli->prepare("select `ROOM_ID` from `fireconverse`.`topics` where `TOPIC_ID`='".$topic_id."' LIMIT 1")) && ($stmt0->execute())){
			$stmt0->store_result();
			$stmt0->bind_result($room_id);
			$stmt0->fetch();
			}
	}
	if($room_id){
	if(($stmt=$mysqli->prepare("delete from `fireconverse`.`topics` where `TOPIC_ID`='".$topic_id."' LIMIT 1")) && ($stmt->execute())){
			echo "deleted";
			if($_POST['img']==1){
				$target="../../data/topics/".$room_id.'/'.$topic_id; 
				echo $target;
				unlink($target);
			}
			}
	}
	}
if(isset($_POST['topic_title'],$_POST['topic_content'],$_FILES['topic_pic'],$_POST['topic_corner'],$_POST['topic_room'])){
	$t_title=$_POST['topic_title'];
	$t_content=$_POST['topic_content'];
	$t_corner=$_POST['topic_corner'];
	$t_room=$_POST['topic_room'];
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
	$topic_array=array();
	$t_title=htmlspecialchars($t_title);
	$t_content=htmlspecialchars($t_content);
	$t_content=preg_replace("/\s+/", " ",nl2br($t_content));
	


if($stmt=$mysqli->prepare("insert into `fireconverse`.`topics` (ID, ROOM_ID, CORNER_ID, topictitle,date_of_topic) values(?,?,?,?,?)")){
	
	$stmt->bind_param('iiisi',$U_ID,$room_id,$t_corner,$t_title,$time);
	if($stmt->execute()){ 
		$id = mysqli_insert_id($mysqli);
		if($id){ 
			if($_FILES['topic_pic']['name']){
				
				$target='../../data/userprofile/topics'.$U_ID.'/'; 
				$filename=$U_ID.'_'.$room_id.'_'.$t_corner.'_'.$id.'txt';
				$dirname1=$target.$id.'/'.$filename;
				if(mkdir($dirname1)){
					$pic_div=$target.$id;
					$pic_name=array();
					$pic_name=explode("\\",$_FILES['topic_pic']['name']);
					$pic=end($pic_name);
					$ext=".".end(explode(".",$pic));
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
					
				if($stmt1=$mysqli->prepare("select `topics` from `fireconverse`.`meminfo` where `MEM_ID`='".$U_ID."'")){
					if($stmt1->execute()){
						$stmt1->bind_result($topic_array_temp);
						$stmt1->store_result();
						$stmt1->fetch();
						if($temp_array_temp) $topic_array=unserialize($topic_array_temp);
						array_push($topic_array,$id);
						$topic_array_temp1=serialize($topic_array);
						$stmt1->close();
						$stmt1=$mysqli->prepare("update `fireconverse`.`meminfo` set `topics`=$topic_array_temp1 where `MEM_ID`='".$U_ID."'");
						if($stmt->execute()) echo 'updated'; 
						}
					else echo "notupdated";
				}
				} else echo 'not updated. file system error';
			}
			}
			echo "updated";
			unset($_POST['topic_title'],$_POST['topic_content'],$_POST['topic_pic'],$_POST['topic_corner'],$_POST['topic_room']);
			
			}
			else echo 'notupdated';
		
		}
	else{
		echo 'notupdated';
		}
	}


	
	} echo 323;
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