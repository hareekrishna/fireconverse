<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <div>Do sign here:</div><P><form name="form2" action="" method="POST" />
   <input name="sign" type="text" maxlength="15">
  </P>
  <p>

    

  <p>   Enter The Sign Id:
    </p>
  <p>
  <input name="signid" type="text" maxlength="15">
  <p>
    
    <input name="submit3" type="submit" value="Search">  </form>
  </p>
    
  <p>
    <?php 
	
	$sign="";
	if(isset($_POST['submit3']))
	{
		$sign=$_POST['sign'];
	$signid=$_POST['signid'];
	
	$user_name = "root";
	$pass_word = "";
	$database = "signs";
	$server = "127.0.0.1";
	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
	if($db_found){
		$SQL="select * from `fonts` where fontid='".$signid."'";
		$result=mysql_query($SQL);
		if($result){
			$totalrows=mysql_num_rows($result);
			if($totalrows){	
			
				while($db_field=mysql_fetch_assoc($result)){
					$fontname=$db_field['fontname'];
					$fonts=$db_field['fonts'];
					$fontid=$db_field['fontid'];}
			?> 
            <a href="signs.php?id=<?php if($_POST['submit3']){echo $fontname;}?>&name=<?PHP if($_POST['submit3']){echo $sign;} ?>"style="text-decoration: none; color:#808080" ><?php if($_POST['submit3']){echo $fonts;}?>
    <style >
     .z {
        font-family: <?PHP if($_POST['submit3']){ echo $fontname;}?>;
        font-size: 40px;
		text-shadow: 0 0 1px rgba(51,51,51,0.2);
		  text-shadow: 4px 4px 4px #aaa;
		margin:20px;
      }
	  .n{ font-size:10px;
	      color:#808080;
		  }
    </style>
   <span class="z" > <?PHP if($_POST['submit3']){
	echo $sign;
	echo'</span></z>';
	echo'<span class="n">'; 
	echo $fontid;
	echo'</span></n>';
	 }}
					
}
	else {
		echo 'Oops!! You Missed Correct One..';
	}
	}else{echo'Oops!! Try with a correct one..';
	}
	 

	}?>
</body>
</html>