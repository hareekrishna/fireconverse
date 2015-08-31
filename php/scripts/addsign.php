<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?PHP if (isset($_POST['submit2'])) {
	 		
	  $ID1="";
	  $today=getdate();
	  $s=$_SESSION['name'];
	  include ("../../configsignup.php");
	  		if($db_found){
	  $SQL4 = "Select `ID` from members where name='".$s."'";	  
	  $result4 = mysql_query($SQL4);
			if($result4){
				while ( $db_field = mysql_fetch_assoc($result4) ) {
				$ID1=$db_field['ID'];
			}}}
	  $date= date('d-m-y'." ".$today['hours'].":".$today['minutes']);
	  $res=$_POST['response'];
	  include("../../configforum.php");
	  if($db_found){
			  $SQL3="INSERT INTO forum.responses (`ID`,`topicid`,`response`,`date_of_response`) values('".$ID1."','".$topicid."','".$res."','".$date."') ";
	  		  $result3=mysql_query($SQL3);
		 	 if(!$result){print "Something Went Wrong:( in adding your response!";}
	  }}  	




?>




</body>
</html>