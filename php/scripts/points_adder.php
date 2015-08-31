<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Point Table Adder!</title>
</head>

<body>
<?php
if(isset($_POST['Submit1'])){
$user_name = "root";
	$pass_word = "";
	$database = "points";
	$server = "127.0.0.1";

	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
if($db_found){
	
$SQL_points="insert into `points`.`points` (ID,topic_points,res_points,cres_points) values($u_ID,0,0,0)";
$result_points=mysql_query($SQL_points);
if(!$result_points){
echo 'A fatal error occured while processing!,Please try again.    (error:p_t_a.22)';	
}
}
	
	}
?>


</body>
</html>