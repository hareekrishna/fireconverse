<?PHP 
echo $_POST['settings'];
if(isset($_POST['width'])){ 
			
			$original = getimagesize($_POST['imgSrc']);
			$name='temp'.time().'.jpg';
			$location=$_POST['location'].$name;
			if($original['mime']=='image/jpeg'){
				$srcImage=imagecreatefromjpeg($_POST['imgSrc']);
				$reX=imagesx($srcImage);
				$reY=imagesy($srcImage);
				$imgWidth=$_POST['imgWidth'];
				$imgHeight=$_POST['imgHeight'];
				$mulX=$reX/$imgWidth;
				$mulY=$reY/$imgHeight;
				$srcW=$_POST['width']*$mulX;
				$srcH=$_POST['height']*$mulY;
				$dstImage = imagecreatetruecolor($srcW,$srcH);
				$srcX=$_POST['left']*$mulX;
				$srcY=$_POST['top']*$mulY;
				imagecopy($dstImage, $srcImage, 0, 0, $srcX,$srcY, $srcW, $srcH);
				if(imagejpeg($dstImage,$location,90)){
					echo $location;
					}
				else echo false;
				
				}
			else echo false;
			
		}
		
?>