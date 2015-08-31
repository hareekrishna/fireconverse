<?PHP 

	if(isset($_POST['u_ID'])){	
	$remove_add="";
	$u_ID=$_POST['u_ID'];	
	include('csign.php');
$stmt_remove=$mysqli->prepare("select `tumb_realavatar` from `fireconverse`.`meminfo` where ID=$u_ID ");
if($stmt_remove){
	$stmt_remove->execute();
	$stmt_remove->store_result();
	$stmt_remove->bind_result($remove_add);
	$stmt_remove->fetch();
	if($remove_add){
		$unlink=unlink($remove_add);
		$f="0";
		echo $f;
		$stmt_remove1=$mysqli->prepare("UPDATE `fireconverse`.`meminfo` SET `tumb_realavatar`='0' WHERE `ID`=".$u_ID."");
		if($stmt_remove1){
			$stmt_remove1->execute();
			echo "done";
			}
		}
		
	}
	
		
}
?>