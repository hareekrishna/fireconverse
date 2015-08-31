<?php
	require_once 'crop.php';
	require_once 'csign.php';
	include_once 'secure_session.php';
	include 'login_status.php';
	sec_session_start();

	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 2000000)
			&& in_array($extension, $allowedExts))
		  {
			if ($_FILES["file"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
	  else
		{
	  //  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	  //  echo "Type: " . $_FILES["file"]["type"] . "<br>";
	  //  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	  //  echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
			
			
		  if(login_check($mysqli) == true) {
			 if(isset($_SESSION['u_ID'], $_SESSION['u_name'], $_SESSION['login_string'])) {
			  $u_ID_avatar = $_SESSION['u_ID'];
			  $u_name_avatar = $_SESSION['u_name']; 
			  
			if (file_exists("upload/" . $_FILES["file"]["name"]))
			  {
		// echo $_FILES["file"]["name"] . " already exists. ";
			  }
			else
			  {	
				$info = pathinfo($_FILES['file']['name']);
				$time_avatar=time();
				$newname = $u_ID_avatar."_".$time_avatar.".".$extension;
				$tumbname= "tumb".$u_ID_avatar."_".$time_avatar.".".$extension;
				$dirname=$u_ID_avatar;
				$target = '../../data/userprofile/avatar/'.$dirname.'/'.$newname;
				$targettumb = '../../data/userprofile/avatar/'.$dirname.'/'.$tumbname;
				$targettumbdir='../../data/userprofile/avatar/'.$dirname.'/';
				move_uploaded_file($_FILES['file']['tmp_name'], $target);

				
				
				 //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
					//echo $u_ID_avatar;
				
				include("csign.php");
				$stmt_avatar=$mysqli->prepare("SELECT avatars FROM `fireconverse`.`meminfo` WHERE ID=$u_ID_avatar");
				if($stmt_avatar){
					$stmt_avatar->execute();
					$stmt_avatar->store_result();
					$stmt_avatar->bind_result($array_in_db);
					$stmt_avatar->fetch();
					$restore=unserialize($array_in_db);
					if($restore){
						$push_newaddress = array_push($restore,$newname);
						}
					else{
						$restore[0]=$newname;
						}
					$back=serialize($restore);
					$stmt_avatar_update=$mysqli->prepare("UPDATE `fireconverse`.`meminfo` SET `avatars`='$back' WHERE `ID`=$u_ID_avatar");
						if($stmt_avatar_update){
						$stmt_avatar_update->execute();
						$imageCrop = new ImageCrop();
						 
							if ($imageCrop->openImage($target))
							{
								$imageCrop->crop(); 
								$imageCrop->save($targettumb,$targettumbdir,$tumbname,$u_ID_avatar);
							}
								//else echo $newname;
											//	echo "Upload Success!!";		
						}
					else {
						//echo 77;
						}
				$mysqli->close();
			}
		else{
			//echo 71;
			}
		  }
		}//else {echo "log-in to do it!";}
	  }
	else
	  {
	// echo "Invalid file";
	  }
		}
		}
		 }
?>
