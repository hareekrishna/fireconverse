<?PHP 
if(isset($_POST['adds'])){
	$target=$_POST['adds'];
	$picname=str_replace('tumb','',$target);
	echo $picname;
	}


if(isset($_POST['top'],$_POST['left'],$_POST['add'],$_POST['pic_width'],$_POST['pic_height'])){
		echo $_POST['top'].$_POST['add'].$_POST['pic_height'];
	$pic_height=$_POST['pic_height'];
	$pic_width=$_post['pic_width'];
	$top=$_POST['top'];
	$left=$_POST['left'];
	$target=$_POST['add'];
	$tempaddress=explode("/",$target);
	$tempaddress1=end($tempaddress);
	$u_ID_avatar1=explode('_',$tempaddress1);
	$u_ID_avatar=$u_ID_avatar1[0];
	$tumbname=$tempaddress1;
	$picname=str_replace('tumb','',$tumbname);
	$targettumbdir=str_replace($tempaddress1,'',$target);
	$targettumb=$targettumbdir.$tumbname;
	
	$filename=$targettumbdir.$picname;
	
	
	$imageCrop = new ImageCrop(); 
							
					if ($imageCrop->openImage($filename))
							{	
								$imageCrop->crop($left,$top); 
								$imageCrop->save($targettumb,$targettumbdir,$tumbname,$u_ID_avatar);
								
								}
}
	
	
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
//71.25 78.75
   
   public function crop($left,$top,$pic_width,$pic_height) {
	   $pic_height=$pic_height;
	   echo $pic_height."/////////////////";
	$this->dstImage = imagecreatetruecolor($pic_width, $pic_height);
        imagecopyresampled($this->dstImage, $this->srcImage, 0, 0, 0, 0, $pic_width, $pic_height, $this->width, $this->height);
       
			$this->dstImage1 = imagecreatetruecolor(71.25, 78.75);
       

        $srcX=$left;
		$srcY=$top;
        imagecopy($this->dstImage1, $this->dstImage, 0, 0, 
            $srcX, $srcY, $srcW, $srcH);
    }
	
   
    public function save($filename,$targettumbdir,$newname,$u_ID_avatar) {
       if( imagejpeg($this->dstImage, $filename, 90)){
		  
		   include("csign.php");
			 $stmt_tumb_updater=$mysqli->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$u_ID_avatar");
			 if($stmt_tumb_updater){
				 $stmt_tumb_updater->execute();
				 $stmt_tumb_updater->store_result();
				 $stmt_tumb_updater->bind_result($flag_tumb);
				 $stmt_tumb_updater->fetch();
				 
				 }
				 if($flag_tumb){
					 $unlink=unlink($flag_tumb);
					 }
				 
		   $stmt_tumb_update=$mysqli->prepare("UPDATE `fireconverse` SET `tumb_realavatar`='$filename' WHERE `ID`=$u_ID_avatar");
		   if($stmt_tumb_update){
		  if( $stmt_tumb_update->execute()){
			?>
				<script type="text/javascript">
                	var name="<?PHP echo $filename; ?>";
					$(function(){
					$.ajax({
						
						url:'ajaxcalls.php',
						data:{ callflag:name},
						dataType:"text",
						type:'POST',
						success: function(data){
							$("#pic_selection_text").html("12");
							}
						});		
					});
									
                 </script>
            <?PHP
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

