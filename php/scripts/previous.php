<?PHP 
if(isset($_POST["userid"],$_POST["username"])){
	$u_ID=$_POST["userid"];
	$u_name=$_POST["username"];
	}
if(isset($_POST['address'])){
	$target=$_POST['address'];
	$tempaddress=explode("/",$target);
	$tempaddress1=end($tempaddress);
	$u_ID_avatar1=explode('_',$tempaddress1);
	$u_ID_avatar=$u_ID_avatar1[0];
	$tumbname="tumb".$tempaddress1;
	$targettumbdir=str_replace($tempaddress1,'',$target);
	$targettumb=$targettumbdir.$tumbname;

	$imageCrop = new ImageCrop();
							if ($imageCrop->openImage($target))
							{	
								$imageCrop->crop(); 
								$imageCrop->save($targettumb,$targettumbdir,$tumbname,$u_ID_avatar);}
	
	
	
	

	}
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
    }
	
   
    public function save($filename,$targettumbdir,$newname,$u_ID_avatar) {
       if( imagejpeg($this->dstImage, $filename, 90)){
		include('csign.php');

				 $stmt_tumb_updater=$mysqli->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$u_ID_avatar");
			 if($stmt_tumb_updater){
				 $stmt_tumb_updater->execute();
				 $stmt_tumb_updater->store_result();
				 $stmt_tumb_updater->bind_result($flag_tumb);
				 $stmt_tumb_updater->fetch();
				 
				 }
				 if($flag_tumb){
					 if($flag_tumb !=$filename){
						
					 $unlink=unlink($flag_tumb);
					 }}
				 
		   $stmt_tumb_update=$mysqli->prepare("UPDATE `fireconverse`.`meminfo` SET `tumb_realavatar`='$filename' WHERE `ID`=$u_ID_avatar");
		   if($stmt_tumb_update){
		  if( $stmt_tumb_update->execute()){
			
			  }
		   
		   }
		   $mysqli->close();
		   }
		
    }

   
    public function output() {
        imagejpeg($this->dstImage);
    }

}
?>
