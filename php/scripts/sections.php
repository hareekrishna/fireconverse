<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/sections.js"></script>
        <script src="../../js/quick_access.js" ></script>
        <link href="../../css/navbar.css" rel="stylesheet" type="text/css" >
        <link  href="../../css/sections.css" rel="stylesheet" type="text/css">
    </head>

    <body>
    <?php 
        
        include 'login_status.php';
        require_once 'csign.php';
        include_once 'secure_session.php';
        sec_session_start();
        $flag_tumb="0";
        $flag_options="0";
        $u_ID="";
    	if(login_check($mysqli) == true) {  
             if(isset($_SESSION['u_ID'],$_SESSION['u_name'],$_SESSION['u_email'], $_SESSION['xploded_u_email'], $_SESSION['login_string'])) {
                $u_ID = $_SESSION['u_ID'];
                $xploded_u_email=$_SESSION['xploded_u_email'];
                $u_email=$_SESSION['u_email'];	 
                $u_name=$_SESSION['u_name'];
                
             include("csign.php");
             
             $stmt_tumb_updater=$mysqli->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$u_ID");
                 if($stmt_tumb_updater){
                     $stmt_tumb_updater->execute();
                     $stmt_tumb_updater->store_result();
                     $stmt_tumb_updater->bind_result($flag_tumb);
                     $stmt_tumb_updater->fetch();
                 }
                
                
                }
                
        }
         if($u_ID){
             $flag_options="logged";
             } 
         if($flag_tumb=="0"){
             $flag_tumb='../../mydata/pics/unknownuser.jpg'; 
                     }
    ?>
    <div class='page_body'>
        <div id="main_container_outer">
            <div id="main_container_inner">
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
                                <li class='navbar_list' id='quick_acces_icon_o'>
                                    	<img id='quick_acces_icon' src="../../mydata/pics/qiuck_access.png"  alt="Quick Access">
                                </li>
                                <li class="navbar_list" id="avatar_navbar_list">
                                    <a href="profile.php"><img id="avatar_navbar" src="<?PHP echo $flag_tumb; ?>"></a>
                                </li>
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class='quick_outer'>
                <div class='quick_inner'>
                    <div class="quick_top">
                        <div class='quick_acces_icon_a_o'>
                        	<img id='quick_acces_icon_a' src="../../mydata/pics/qiuck_access.png"  alt="Quick Access">	
                        </div>
                        <span>
                        	<h6>Quick Access</h6>
                        </span>
                        <div>
                        	<ul>
                                 <li><input type="radio" name="quick_select"  id="quick_people" /><label class="quick_label" for="quick_people"><p>People</p></label></li>
                                 <li><input type="radio" name="quick_select"  id="quick_notifi" checked /><label class="quick_label" for="quick_notifi"><p>Notifications</label></p></li>
                                 <li><input type="radio" name="quick_select"  id="quick_group" /><label class="quick_label" for="quick_group"><p>Groups</label></p></li></li>
                                 <li><input type="radio" name="quick_select"  id="quick_topics" /><label class="quick_label" for="quick_topics"><p>Topics</label></p></li></li>
                            </ul>
                             	
                         </div>
                    </div> 
                    <div class='quick_main_outer'>
                       <div class='quick_main_inner'>
                       		<div class='not_outer'>
                            	
                            </div>
                            <div class=''>
                            
                            </div>
                       </div>
                            
                    </div>
                    <div class="quick_bottom_outer">
                    	<div class="quick_bottom_inner">
                        	<div class="quick_b_res">
                            	<form name='q_b_res_form' method="POST" action=''>
                                	<input type='textarea' name='q_b_res_text' class="q_b_res_text" placeholder="Write your response.."></form>
                                </form>
                            </div>
                  
                        </div>
                    </div>
                </div>
             </div>
                <div id="global_container">
                    <div id="main_container">
                        <div class="searchbox_outer">
                            <div class="searchbox_inner">
                                <div class="searchbox_main">
                                    <input type="text" class="searchbox_top" name="searchbox" placeholder="Search.." >
                                    <div class="search_icon">
                                        <img src="../../mydata/pics/searc.gif" class="search_icon_gif1" id="search_icon_gif_id" >
                                        <img src="../../mydata/pics/close.gif" class="search_icon_gif1" id="close_icon_gif_id" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="txt_outer">
                            <h1 id="txt_main">Check-In rooms..</h1>
                        </div>
                        <div id="section_bar_outer">
                            <div id="section_bar_inner">
                                <div id="section_bar_main">
                               
                                    <section class="section" id="s1">
                                        <div class="footer_outer">
                                            <h1 class="room_name" id="sports_txt">sports</h1>
                                            
                                         </div>
                                    </section>
                                    <section class="section" id="s2">
                                        <div class="footer_outer">
                                            <h1 class="room_name" id="health_txt">health</h1>
                                            
                                        </div>
                                    </section>
                                    <section class="section" id="s3">
                                        <div class="footer_outer">
                                            <h1 class="room_name" id="movies_txt">movies</h1>
                                            
                                        </div>
                                    </section>
                                    <section class="section" id="s4">
                                        <div class="footer_outer">
                                            <h1 class="room_name" id="fashion_txt">fashion</h1>
                                            
                                        </div>
                                    </section>
                                    <section class="section" id="s5">
                                        <div class="footer_outer">
                                            <h1 class="room_name" id="tech_txt">tech</h1>
                                            
                                        </div>
                                        
                                    </section>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>