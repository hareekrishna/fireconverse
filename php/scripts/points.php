<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?PHP

	if($_SESSION['u_ID'])
	{
	$u_ID_points=$_SESSION['u_ID']; 
	include ("configsignup.php");
	if($db_found){
	$SQL="select `topic_points`,`res_points`,`cres_points`,`total_points` from points.points where `u_ID`='".$u_ID_points."'";
	$result=mysql_query($SQL);
	
	$pointssql=mysql_fetch_assoc($result);
	$topic_points=$pointssql['topic_points'];
	$res_points=$pointssql['res_points'];
	$cres_points=$pointssql['cres_points'];
	$topic_points=$pointssql['total_points'];
	}
		if($pointres=="1"){
			
			$res_points=$res_points+2;
			$topic_points=$topic_points+2;
			$pointtop="";
			$pointcres="";
			}
		if($pointtop=="1"){
			$topic_points=$topic_points+5;
			$topic_points=$topic_points+5;
			$pointcres="";
			$pointres="";
			}
		if($pointcres=="1")
		{	$pointres="";
			$pointtop="";
			$topic_points=$topic_points+1;
			$cres_points=$cres_points+1;
			}
				
	
echo $res_points+2;
	$SQL="UPDATE signup.members SET `topic_points`='".$topic_points."',`res_points`='".$res_points."',`cres_points`='".$cres_points."',`total_points`='".$topic_points."' WHERE name='".$u_ID_points."' ";
	$result=mysql_query($SQL);
	if($result){ 
		}
		
		}
	
	else {
		echo "Something Went Wrong!!";
		}


?>


</body>
</html>