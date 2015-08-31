<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$db_field="";
	$user_name = "root";
	$pass_word = "";
	$database = "signup";
	$server = "127.0.0.1";
	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
	
						if($db_found){
							
							$SQL="select * from signup.members where name='".$name."' ";
							$result=mysql_query($SQL);
							if($result){
								$db_field=mysql_fetch_assoc($result);
								$fontid=$db_field['signno'];
								$sign=$db_field['sign'];
								$name=$db_field['name'];
								}
							
							}
							if(!$sign){
								$sign=$name;
								}
							mysql_close($db_handle);
    $user_name = "root";
	$pass_word = "";
	$database = "signs";
	$server = "127.0.0.1";
	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
	
	
		
				if($db_found){
					 
					$SQL2="select * from fonts where `fontid`='".$fontid."' ";;
					$result=mysql_query($SQL2);
					if($result){
					while ( $db_field1 = mysql_fetch_assoc($result) ) {
						$fontname= $db_field1['fontname'];
						$fonts=$db_field1['fonts'];
						
						
						}
						
							}
				else{
					$fontname="";
							$fonts="";
							}
				}
				
				mysql_close($db_handle);
						
?>
</body>
</html>