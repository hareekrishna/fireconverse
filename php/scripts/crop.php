<?PHP
$filename="../../data/userprofile/newname.jpg";
    class ImageCrop { 

    private $srcImage, $dstImage;

    private $width, $height;

    public function openImage($filename) {
        if (!file_exists($filename)) {
            return false;
        }
        $original = getimagesize($filename);
        switch ($original['mime']) {
        case 'image/jpeg':
            $this->srcImage = imagecreatefromjpeg($filename);
            break;
        case 'image/png':
            $this->srcImage = imagecreatefrompng($filename);
            break;
        case 'image/gif':
            $this->srcImage = imagecreatefromgif($filename);
            break;
        default:
            return false;
        }
		$srcImage1=imagecreatefromjpeg($filename);
				$reX=imagesx($srcImage1);
				$reY=imagesy($srcImage1);
			    $srcW=$reX*0.2;
			    $srcH=$reY*0.2;
				$dstImage1 = imagecreatetruecolor($srcW,$srcH);
				imagecopyresampled($dstImage1,$srcImage1,0,0,0,0,$srcW,$srcH, $reX, $reY);
				imagejpeg($dstImage1,$filename,90);
        $this->width = $original[0];
        $this->height = $original[1];
        return true;
    }

   
    public function crop() {
        $srcW = $this->width;
        $srcH = $this->height;
		if($srcW/$srcH<0.90476)
		$srcH=$srcW*1.10526;
		else
		$srcW=$srcH*0.90476;
		        $this->dstImage = imagecreatetruecolor($srcW,$srcH);

        $extraWidth = $this->width - $srcW;
        if ($extraWidth > 0) {
            $srcX = $extraWidth / 2;        
        }
		else {$srcW=$srcH*0.90476;
		 $extraWidth = $this->width - $srcW;
		 $srcX = $extraWidth / 2;     
		 }
        $extraHeight = $this->height - $srcH;
        if ($extraHeight > 0) {
            $srcY = $extraHeight / 2;
        }
		else{
			$srcH=$srcW*1.10526;
			 $extraHeight = $this->height - $srcH;
			  $srcY = $extraHeight / 2;
			}
        imagecopy($this->dstImage, $this->srcImage, 0, 0, 
            $srcX, $srcY, $srcW, $srcH);
			$reX=imagesx($this->dstImage);
				$reY=imagesy($this->dstImage);
			    $srcW=$reX*0.2;
			    $srcH=$reY*0.2;
				$this->dstImage1 = imagecreatetruecolor($srcW,$srcH);
				imagecopyresampled($this->dstImage1,$this->dstImage,0,0,0,0,$srcW,$srcH, $reX, $reY);
    }
	
   
    public function save($filename,$targettumbdir,$newname,$u_ID_avatar) {
       if( imagejpeg($this->dstImage1, $filename, 90)){
		  
		   include("csign.php");
			 $stmt_tumb_updater=$mysqli_memdata->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$u_ID_avatar");
			 if($stmt_tumb_updater){
				 $stmt_tumb_updater->execute();
				 $stmt_tumb_updater->store_result();
				 $stmt_tumb_updater->bind_result($flag_tumb);
				 $stmt_tumb_updater->fetch();
				 
				 }
				 if($flag_tumb){
					 $unlink=unlink($flag_tumb);
					 }
				
		   $stmt_tumb_update=$mysqli->prepare("UPDATE `fireconverse`.`meminfo` SET `tumb_realavatar`='$filename' WHERE `ID`=$u_ID_avatar");
		   if($stmt_tumb_update){
		  if( $stmt_tumb_update->execute()){
			
			
			  }
		   
		   }
		   $mysqli_memdata->close();
		   }
		
    }

   
    public function output() {
        imagejpeg($this->dstImage);
    }

}
	
	?>
