<!doctype html>
<html>
  <head>
  </head>
  <body>
 <?php
  
   $signname="";
   if (isset($_GET['id'])) {
	$signname = $_GET['id'];
	$sign=$_GET['name'];
	}
    session_start();
		
		if(isset($_SESSION['name']))
	{
		 echo'<form name=form1 action="" method="POST"  />';
		 $target="_self";
	  }
   else
	{		
	  echo'<form name=form1 action="" method="POST" target="_blank" />';
	  $target="new";
	  }
	?>
 
 <div>Do sign here:</div><P>
   <input name="sign" type="text" maxlength="15">
  </P>
  <p>
    <input name="submit" type="submit" value="submit"></form>
    
  <a href="signid.php" target='$target' title="Sign With Sign Id!" style="color:#808080; text-shadow: 1px 1px 1px #aaa;">Know Sign Id?</a></p>
  <p>&nbsp;</p>
  <?PHP
	  if(isset($_POST['submit'])||isset($_GET['id'])) { 
	if($_SESSION['name']){ 
	$s=$_SESSION['name'];
	}
	else{
		
		print "	Refresh the page...";
		header("Location: loginnow.php" );}
   
	$db_field=array();
	$db_field1=array();
    $user_name = "root";
	$pass_word = "";
	$database = "signs";
	$server = "127.0.0.1";
	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
	
	if ($signname){
		
				if($db_found){
					 
					$SQL2="select `fontid` from fonts where fontname='".$signname."'";;
					$result=mysql_query($SQL2);
					if($result){
					while ( $db_field2 = mysql_fetch_assoc($result) ) {
						$fontid= $db_field2['fontid'];
						
						mysql_close($db_handle);
						
						$user_name = "root";
						$pass_word = "";
						$database = "signup";
						$server = "127.0.0.1";
						$db_handle = mysql_connect($server, $user_name, $pass_word);
						$db_found = mysql_select_db($database, $db_handle);
	
						if($db_found){
							
							$SQL3="UPDATE signup.members SET`signno` ='".$fontid."' ,`sign`='".$sign."' WHERE name='".$s."' ";
							$result3=mysql_query($SQL3);
							if($result3){
								print "Your sign has been added sucessfully...";
								}
								 else{
									  print"no";
									  }
									  mysql_close($db_handle); 	 	 	
							
							}}
						
						
						
						
						
						}
					
				}}} 
	$sign="";
  	if(isset($_POST['submit']))
	{
	$sign=$_POST['sign'];
	}
	if(isset($_POST['submit2'])){
		$sign=$_SESSION['sign'];
	}	
 	$fontid=array();
	$swap=array();
    $user_name = "root";
	$pass_word = "";
	$database = "signs";
	$server = "127.0.0.1";
	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
	if(isset($_POST['submit'])	){
	if($db_found){
	$SQL="select fontid from signs.fonts  ";
	$result=mysql_query($SQL);
	
	if($result){
	$totalrows=mysql_num_rows($result);
    
	while($db_field= mysql_fetch_array($result))
	{
		$fontid[]=$db_field['fontid'];
		}
	
    	shuffle($fontid);
	$swap=$fontid;
	$b=1;
	$c=7;
	if(isset($_POST['submit2'])){
	$b=$_SESSION['b'];
	$c=$_SESSION['c'];
	$b=$b+7;
	$c=$c+7;
	$swap=$_SESSION['swap'];
	
	}
	for($j=$b; $j<$c; $j++){ 
	$SQL1="select * from signs.fonts where fontid='".$swap[$j]."'";
	$result1=mysql_query($SQL1);
    $db_field1[$j] = mysql_fetch_array($result1);}
      
	}
	else
	{
		print "something went wrong!! Be patient till hareee fix it!";
		}
		}
			else{
				print "something went wrong!! Be patient till hareee fix it!";
		}}

?>
   <a href="signs.php?id=<?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) 
   {
	    echo $db_field1[$b]['fontname'];
		}
		?>&name=<?PHP echo $sign; ?>"style="text-decoration: none; color:#808080" >
		<?php 
		  if(isset($_POST['submit'])||isset($_POST['submit2']))
		   { 
		  echo $db_field1[$b]['fonts'];
		  }
		  ?>
    <style >
     .a {
        font-family: <?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
		echo $db_field1[$b]['fontname'];
		}
		?>;
        font-size: 40px;
		text-shadow: 0 0 1px rgba(51,51,51,0.2);
		  text-shadow: 4px 4px 4px #aaa;
		margin:20px;
      }
	  .n{ font-size:10px;
	      color:#808080;
		  }
    </style>
   <span class="a" ><?php  
    if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
	echo $sign;
	echo'</span></a>';
	echo'<span class="n">'; 
	echo $db_field1[$b]['fontid'];
	echo'</span></n>';
	 }?>
   
    
	 <a href="signs.php?id=<?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
	 echo $db_field1[$b+1]['fontname'];
	 }?>&name=<?PHP echo $sign; 
	 ?>
     "style="text-decoration: none; color:#808080	"><?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) {
		  echo $db_field1[$b+1]['fonts'];
		  }?>
		  

    <style >
     .b {
        font-family: <?php    if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
		 echo $db_field1[$b+1]['fontname'];
		 }?>;
        font-size: 40px;
		text-shadow: 0 0 1px rgba(51,51,51,0.2);
	    text-shadow: 4px 4px 4px #aaa;
		margin:55px;
      }
    </style> <span class="b" >
    <?php  
    if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
	echo $sign;
	echo'</span></b>';
	echo'<span class="n">'; 
	echo $db_field1[$b+1]['fontid'];
	echo'</span></n>';
	 }?>
	 <a href="signs.php?id=<?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
	 echo $db_field1[$b+2]['fontname'];
	 }?>&name=<?PHP echo $sign; ?>"style="text-decoration: none; color:#808080	"><?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
	  echo $db_field1[$b+3]['fonts'];
	 }?>
    <style >
     .c {
        font-family: <?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) {   echo $db_field1[$b+2]['fontname'];}?>;
        font-size: 40px;
		text-shadow: 0 0 1px rgba(51,51,51,0.2);
		  text-shadow: 4px 4px 4px #aaa;
		margin:55px;

      }
    </style>
    <span class="c">
    <?php  
    if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
	echo $sign;
	echo'</span></c>';
	echo'<span class="n">'; 
	echo $db_field1[$b+2]['fontid'];
	echo'</span></n>';
	 }?>
	 <a href="signs.php?id=<?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) {
		  echo $db_field1[$b+3]['fontname'];
		  }?>&name=<?PHP echo $sign; ?>"style="text-decoration: none; color:#808080	"><?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
		  echo $db_field1[$b+3]['fonts'];
		  }?>
    <style >
     .d {
        font-family: <?php  if(isset($_POST['submit'])||isset($_POST['submit2'])) {
			  echo $db_field1[$b+3]['fontname'];
			  }?>;
        font-size: 40px;
		text-shadow: 0 0 1px rgba(51,51,51,0.2);
		  text-shadow: 4px 4px 4px #aaa;
		margin:55px;
      }
        </style>
         <span class="d" >
  <?php  
    if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
	echo $sign;
	echo'</span></d>';
	echo'<span class="n">'; 
	echo $db_field1[$b+3]['fontid'];
	echo'</span></n>';
	 }?>   
  
  <a href="signs.php?id=<?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) 
  {
	   echo $db_field1[$b+4]['fontname'];
	   }
  ?>&name=<?PHP echo $sign; ?>"style="text-decoration: none; color:#808080	"><?php  if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
   echo $db_field1[$b+4]['fonts'];
   }?>
     
    <style >
     .e {
        font-family: <?php echo $db_field1[$b+4]['fontname'];?>;
        font-size: 40px;
		text-shadow: 0 0 1px rgba(51,51,51,0.2);
		text-shadow: 4px 4px 4px #aaa;
		margin:55px;
		text_decoration:null;
      }
        </style>
  <span class="e">
  <?php  
    if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
	echo $sign;
	echo'</span></e>';
	echo'<span class="n">'; 
	echo $db_field1[$b+4]['fontid'];
	echo'</span></n>';
	 }?>
   <a href="signs.php?id=<?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) {
	    echo $db_field1[$b+5]['fontname'];
		}?>&name=<?PHP echo $sign; ?>"style="text-decoration: none; color:#808080	"><?php   if(isset($_POST['submit'])||isset($_POST['submit2'])) {
	    echo $db_field1[$b+5]['fonts'];
		}?>
    <style >
     .f{
        font-family: <?php  if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
		 echo $db_field1[$b+5]['fontname'];}
		 ?>;
        font-size: 40px;
		text-shadow: 0 0 1px rgba(51,51,51,0.2);
		  text-shadow: 4px 4px 4px #aaa;
		margin:55px;
      }
        </style>
  <span class="f">
  <?php  
    if(isset($_POST['submit'])||isset($_POST['submit2'])) { 
	echo $sign;
	echo'</span></f>';
	echo'<span class="n">'; 
	echo $db_field1[$b+5]['fontid'];
	echo'</span></n>';
	 }?> 
  <?PHP 
	if(isset($_POST['submit'])||isset($_POST['submit2'])){
	  
	  if($sign&&$c<+$totalrows){
		  
	  $_SESSION['c']=$c;
	  $_SESSION['b']=$b;
	  $_SESSION['swap']=$swap;
	  $_SESSION['sign']=$sign;
	  echo '<form name=form2 action="" method="post" />';
	  echo'<form><input name="submit2" type="submit" value="Next>>"></form>';
	  }
		}
	?>
	  </div>
	 
</body>
</html>
