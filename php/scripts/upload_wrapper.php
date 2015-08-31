
<?PHP
	require_once 'crop_wrapper.php';
	require_once 'csign.php';
	include_once 'secure_session.php';
	include 'login_status.php';
	sec_session_start();

	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		
		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		
		$temp = explode(".", $_FILES["file_w"]["name"]);
		$extension = end($temp);
		
			if ((($_FILES["file_w"]["type"] == "image/gif")
			|| ($_FILES["file_w"]["type"] == "image/jpeg")
			|| ($_FILES["file_w"]["type"] == "image/jpg")
			|| ($_FILES["file_w"]["type"] == "image/pjpeg")
			|| ($_FILES["file_w"]["type"] == "image/x-png")
			|| ($_FILES["file_w"]["type"] == "image/png"))
			&& ($_FILES["file_w"]["size"] < 2000000)
			&& in_array($extension, $allowedExts))
		  {
			if ($_FILES["file_w"]["error"] > 0)
			{
				
			echo "Return Code: " . $_FILES["file_w"]["error"] . "<br>";
			}
	  else
		{
	
			
			
		  if(login_check($mysqli) == true) {
			 if(isset($_SESSION['u_ID'], $_SESSION['u_name'], $_SESSION['login_string'])) {
			  $u_ID_avatar = $_SESSION['u_ID'];
			  $u_name_avatar = $_SESSION['u_name']; 
			if (file_exists("upload/" . $_FILES["file_w"]["name"]))
			  {
			  }
			else
			  {
				$info = pathinfo($_FILES['file_w']['name']);
				$newname = $u_ID_avatar.".".$extension;
				$wrapname= "wrap"."_".$u_ID_avatar.".".$extension;
				$dirname=$u_ID_avatar;
				$target = '../../data/userprofile/avatar/'.$dirname.'/'.$newname;
				$targetwrap = '../../data/userprofile/avatar/'.$dirname.'/'.$wrapname;
				$targetwrapdir='../../data/userprofile/avatar/'.$dirname.'/';
				move_uploaded_file( $_FILES['file_w']['tmp_name'], $target);
				
							$imageCrop_w= new ImageCrop_w();
							if ($imageCrop_w->openImage_w($target))
							{	
								$imageCrop_w->crop_w(); 
								$imageCrop_w->save_w($targetwrap,$targetwrapdir,$wrapname,$u_ID_avatar);
								
							}
								//else echo $newname;
											//	echo "Upload Success!!";		
		
			  }}}}}}
?>

