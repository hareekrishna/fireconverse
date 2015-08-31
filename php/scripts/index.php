<?PHP
include("secure_session.php");
sec_session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src='../../js/jquery.min.js' ></script>

<link rel="stylesheet" type="text/css" href="../../css/navbar.css" >
<link rel="stylesheet" type="text/css" href="../../css/home.css" >
<script type="text/javascript" src="../../js/home.js" ></script>

</head>

<body>

    <?PHP 
//	  include 'secure_session.php';
//	  sec_session_start() ;
//	  if($_SESSION['login'] = ""){header (" Location: login3.php");}
//$user_name = "root";
//$password = "";
//$database = "forum";
//$server = "127.0.0.1";
//
//$db_handle = mysql_connect($server, $user_name, $password);
//$db_found = mysql_select_db($database, $db_handle);
//
//if ($db_found) {
//$SQL = "SELECT  * FROM topics ORDER BY date_of_topic ASC limit 5";
//
//$result=mysql_query($SQL);
//
//for ($i = 1; $i <5; ++$i) {
//
//$topic[$i] = mysql_fetch_array($result);
//
// 
//echo '<a href="topic.php?id=' . $topic[$i]['topicid'] . '">'.$topic[$i]['topictitle'].'"<br>"</a>';
//
//}
//
////------------------------------------------------------------------------------------------------------
//print('popular topics') ."<br>";
//$SQL1 = "SELECT  * FROM topics ORDER BY numres DESC limit 5";
//
//$result1=mysql_query($SQL1);
//
//for ($i = 1; $i < 5; ++$i)
//{ $topic1[$i] = mysql_fetch_array($result1);
//
// 
//echo '<a href="topic.php?id=' . $topic1[$i]['topicid'] . '">'.$topic1[$i]['topictitle'].'"<br>"</a>';
//$topicid= $topic1[$i]['topicid'];
//$title= $topic1[$i]['topictitle'];
//$_SESSION['topictitle'] =$title;
//
//}
//mysql_close($db_handle);}
//
//
//
//?>
<?PHP 
include 'login_status.php';
require_once 'csign.php';
 $verified_corner_name="";
	 $verified_room="";
	 $verified_corner_name_1="";	


if(login_check($mysqli) == true) {
	 if(isset($_SESSION['u_ID'],$_SESSION['u_name'],$_SESSION['u_email'], $_SESSION['xploded_u_email'], $_SESSION['login_string'])) {
      $u_ID = $_SESSION['u_ID'];
	$xploded_u_email=$_SESSION['xploded_u_email'];
	 $u_email=$_SESSION['u_email'];
	 $u_name=$_SESSION['u_name'];
	}
	 }
	 else{
		 header("location:login3.php");
	 }
	 $flag_tumb="";
		 $stmt_tumb_updater=$mysqli_memdata->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$u_ID");
			 if($stmt_tumb_updater){
				 $stmt_tumb_updater->execute();
				 $stmt_tumb_updater->store_result();
				 $stmt_tumb_updater->bind_result($flag_tumb);
				 $stmt_tumb_updater->fetch();
				 
				 }
				 if($flag_tumb=="0"){
					$flag_tumb="../../mydata/pics/unknownuser.jpg"; 
					 }
					  $flag_options="0";

				 if($u_ID){
		 $flag_options="logged";
		 } 
?>
	<div id="navbar">
                <div class="fc_navbar">
                    <img src="../../mydata/pics/fireconvers_navbar.png" id="fc_logo" width="201.6" height="31.8" alt="fireconverse">
                </div>
                <div class="options_navbar_outer">
                	<div class="options_navbar_inner">
                    	<ul class="options_navbar_main">
                            <li class="navbar_list" >
                                <img class="search_icon_gif" src="../../mydata/pics/searc.gif">
                            </li>
                           	<li class="navbar_list">
                            	 <a href="index.php" ><h4 class="options_navbar_txt">home</h4></a>
                            </li>
                            <?PHP 
							if($flag_options=="logged"){
								echo '
                            <li class="navbar_list">
                            	<a href="profile.php"><h4 class="options_navbar_txt">profile</h4></a>
                            </li>
                             <li class="navbar_list">
                            	<a href="groups.php"><h4 class="options_navbar_txt">groups</h4></a>
                            </li>
                            <li class="navbar_list">
                                <img class="options_icon_gif" src="../../mydata/pics/options.gif">
                            </li>
                            
                            <li class="navbar_list" id="hide">
                            	<a href="help.php"><h4 class="options_navbar_txt">help</h4></a>
                            </li>
                            <li class="navbar_list" id="hide1">
                            	<a href="logout.php"><h4 class="options_navbar_txt">log-out</h4></a>
                            </li>  ';
							}
							else {
							echo '
                            <li class="navbar_list">
                            	<a href="loginPage.php"><h4 class="options_navbar_txt">Log-In</h4></a>
                            </li>
                             <li class="navbar_list">
                            	<a href="loginPage.php"><h4 class="options_navbar_txt">signup</h4></a>
                            </li>
                            <li class="navbar_list">
                                <img class="options_icon_gif" src="../../mydata/pics/options.gif">
                            </li>
                            
                            <li class="navbar_list" id="hide">
                            	<a href="help.php"><h4 class="options_navbar_txt">help</h4></a>
                            </li>
                             ';
							
								}
							?>
                            <li class="navbar_list" id="avatar_navbar_list">
                            	<a href="profile.php"><img id="avatar_navbar" src="<?PHP echo $flag_tumb; ?>"></a>
                            </li>
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
  <div id="global_container">
	<div class="searchbox_outer">
              <div class="searchbox_inner">
                        	<div class="searchbox_main">
                            	<input type="text" id="searchbox" class="searchbox_top" name="searchbox" placeholder="Search.." >
                                <div class="search_icon">
                                	<img src="../../mydata/pics/searc.gif" class="search_icon_gif1" id="search_icon_gif_id" >
                                    <img src="../../mydata/pics/close.gif" class="search_icon_gif1" id="close_icon_gif_id" >
                                </div>
                            </div>
                        </div>
                    </div>
   <div class="nc_outer">
   	<div class="nc_inner">
    	<div class="nc_main">
        	
        </div>
    </div>
   </div>
  </div>
</body>
</html>
s