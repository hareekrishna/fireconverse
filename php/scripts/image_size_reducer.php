<?PHP
	
	if($_POST['flag']=="image_size_reduce" && $_POST['filenames'] && $_POST['width_per']){
		$filenames=$_POST['filenames'];
		$json="";
		if($json==""){
			$json='[';
		}
		function reducer($filename){
			global $json;
			$per=$_POST['width_per'];
			if (!file_exists($filename)) {
				return false;
			}
			$original = getimagesize($filename);
			if($original['mime']=="image/jpeg") {
				$srcImage=imagecreatefromjpeg($filename);
				$reX=imagesx($srcImage);
				$reY=imagesy($srcImage);
			    $srcW=$reX*$per;
			    $srcH=$reY*$per;
				$dstImage = imagecreatetruecolor($srcW,$srcH);
				if(imagecopyresampled($dstImage,$srcImage,0,0,0,0,$srcW,$srcH, $reX, $reY)){
				   $time=time();
				   $dest_image="../../data/corners/temp/".$time.".jpg";
				 if(imagejpeg($dstImage, $dest_image, 90))
				 	{
						if (!file_exists($dest_image)) {
							$json.='{"'.$filename.'":"'.$dest_image.'"},';
						}
					
					}
				}
				
			}
			echo $json;
			}
		foreach($filenames as $filename){
			reducer($filename);	
		}
		
		
		}
 ?>