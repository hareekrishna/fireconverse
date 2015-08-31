
<?PHP
if(isset($_POST["wrappername"])){
	exit();
	}


$filename="../../data/userprofile/newname.jpg";
    class ImageCrop_w { 

    private $srcImage, $dstImage;

    private $width, $height;

    public function openImage_w($filename) {
      
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
//4.05084  0.246861
   
    public function crop_w() {
		
		
        $srcW = $this->width;
        $srcH = $this->height;
		if($srcW/$srcH<4.05084)
		$srcH=$srcW*0.246861;
		else
		$srcW=$srcH*4.05084;
		        $this->dstImage = imagecreatetruecolor($srcW,$srcH);

        $extraWidth = $this->width - $srcW;
        if ($extraWidth > 0) {
            $srcX = $extraWidth / 2;        
        }
		else {$srcW=$srcH*4.05084;
		 $extraWidth = $this->width - $srcW;
		 $srcX = $extraWidth / 2;     
		 }
        $extraHeight = $this->height - $srcH;
        if ($extraHeight > 0) {
            $srcY = $extraHeight / 2;
        }
		else{
			$srcH=$srcW*0.246861;
			 $extraHeight = $this->height - $srcH;
			  $srcY = $extraHeight / 2;
			}
        imagecopy($this->dstImage, $this->srcImage, 0, 0, 
            $srcX, $srcY, $srcW, $srcH);
			
    }
	
   
    public function save_w($filename,$targetwrapdir,$newname,$u_ID_avatar) {
		include("csign.php");

       if(imagejpeg($this->dstImage, $filename, 90)){
		
		 $flag_wrap="";
		  $stmt_wrap_select=$mysqli->prepare("SELECT `wrappers` FROM `fireconverse`.`meminfo`  WHERE `ID`=$u_ID_avatar");
		   if($stmt_wrap_select){ 
			    $stmt_wrap_select->execute();
				$stmt_wrap_select->store_result();
				$stmt_wrap_select->bind_result($flag_wrap);
				$stmt_wrap_select->fetch();
			 
		}
				
		
		 if($flag_wrap){
					 $unlink=unlink($targetwrapdir.$flag_wrap);
					 }
	     
			   $stmt_wrap_update=$mysqli->prepare("UPDATE `fireconverse`.`meminfo` SET `wrappers`='$filename' WHERE `ID`=$u_ID_avatar");
		   if($stmt_wrap_update){ 
		 if($stmt_wrap_update->execute()){
			 ?>
            <script> 
			var wrappername="<?PHP echo $filename; ?>";
			s(wrappername);
			
  </script>
			  <?PHP
			 }
			
    }
		   }		  
    }

   
    public function output_w() {
        if(imagejpeg($this->dstImage)){
						}
    }

}
	
	?>
