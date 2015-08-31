<?PHP 
		if(isset($_POST['settings'])){
		
			$settings=json_decode($_POST['settings']);
			$original = getimagesize($settings['imgSrc']);
			$name='temp'.time().'.jpg';
			$location=$settings['location'].$name;
			if($original['mime']=='image/jpeg'){
				$srcImage=imagecreatefromjpeg($settings['imgSrc']);
				$reX=imagesx($srcImage);
				$reY=imagesy($srcImage);
				$imgWidth=$settings['imgWidth'];
				$imgHeight=$settings['imgHeight'];
				$mulX=$reX/$imgWidth;
				$mulY=$reY/$imgHeight;
				$srcW=$settings['width']*$mulX;
				$srcH=$settings['height']*$mulY;
				$dstImage = imagecreatetruecolor($srcW,$srcH);
				$srcX=$settings['left']*$mulX;
				$srcY=$settings['top']*$mulY;
				imagecopy($dstImage, $srcImage, 0, 0, $srcX,$srcY, $srcW, $srcH);
				if(imagejpeg($dstImage,$location,90)){
					echo $location;
					}
				else echo false;
				
				}
			else echo false;
			
echo 44;
		}
		echo 32;
		
?>