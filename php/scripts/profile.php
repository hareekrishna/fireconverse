<?PHP
	include("secure_session.php");
	sec_session_start();
?>
<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Untitled Document</title>
            <script src="../../js/placeholderforolds.js"></script>
			<script src='../../js/jquery.min.js' ></script>
            <script src="../../js/profile_page.js" ></script>
            <script src="../../js/quick_access.js" ></script>
            <link rel="stylesheet" type="text/css" href="../../css/navbar.css" >
       		<link rel="stylesheet" type="text/css" href="../../css/profile.css" >
        </head>
        
        <body>
        <?php
			include 'login_status.php';
			require_once 'csign.php';
			$verified_corner_name="";
			$verified_room="";
			$verified_corner_name_1="";	
			if(login_check($mysqli) == true)
			 {
				 if(isset($_SESSION['u_ID'], $_SESSION['u_name'], $_SESSION['u_email'], $_SESSION['xploded_u_email'] , $_SESSION['login_string'])) 
				 {
					 $u_ID = $_SESSION['u_ID'];
					 $xploded_u_email=$_SESSION['xploded_u_email'];
					 $u_email=$_SESSION['u_email'];
					 $u_name=$_SESSION['u_name'];
					 $flag_options="logged";
					 
				 }
			 }
			 else
			 {
				 header("location:loginPage.php");
			 }				
        ?>
       <div id="screen_splash"></div>
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
                                        <a href="profile.php"><img id="avatar_navbar" src=""></a>
                                    </li>
                                    
                                </ul>
                            </div>
                            
                        </div>
                    </div>
          <div id="page_body">
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
                <div class="searchbox_outer">
                                <div class="searchbox_inner">
                                    <div class="searchbox_main">
                                        <input type="text"  class="searchbox_top" name="searchbox" placeholder="Search.." >
                                        <div class="search_icon">
                                            <img src="../../mydata/pics/searc.gif" class="search_icon_gif1" id="search_icon_gif_id" >
                                            <img src="../../mydata/pics/close.gif" class="search_icon_gif1" id="close_icon_gif_id" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                <div id="topbar" >
                    <div id="cover_pic">
                        <img id="cover_pic_main" src=""/>
                        <div class="grad_pics">
                         </div>
            
                    </div>
                    <div id="pics">
                        <img src="" id="user_avatar" style="display:block" alt="No Photo Available." draggable="false" >
                    </div>
                    <div id="container">
                        <div id="username" >
                            <?php echo $u_name;?>
                        </div>
                    <div id="links">
                        <a href="edit_avatar.php" id="edit_avatar">edit avatar</a>
                        <div class="edit_avatar_bar" ></div>
                        <a href="profile.php" id="history">history</a>
                        <div class="history_bar"></div>
                        </div>
                    </div>
                </div>
            <!--    news feed goes here
            -->   
                
                <div id="status_outer">
                        <div id="status_body">
                            <div id="qoute_pic">
                                <img id="status_quote_pic" src="../../mydata/pics/quotation-marks.gif">
                               <p class="status_main"></p>
                                <div id="status_sign_body">
                                    
                                   <p id='status_sign'></p><p id='status_sign_id'></p>
                                    
                                 </div>
                                <img id="status_quote_pic_rev" src="../../mydata/pics/quotation-marks.gif">
                            </div>
                        </div>
                </div>
                <div id="main_body">
                    <div id="dashboard">
                        <div id="admin_panel">
                            <p id="admin">Admin Panel</p>
                            <div id="corner_names">
                            </div>
                            <p id="no_corner">
                                
                            </p>
                        </div>
                    
                        <div id="followings">
                            <div id="followed_by">
                                <span id="followed">followed by <p class="followed_no"></p></span>
                                
                            </div>
                           
                            <div id="follows_">
                                <span id="follows">follows   <p class="followed_no"></p></span>
                            </div> 
                            <div id="view_f"><p id="link_view_f">view</p></div>
                        </div>
                    </div>
                    <div id="splash"></div>
                    <div class="follow_window_outer">
                        <div class="follow_window_inner">
                            <div class="follow_list">
                                <form name="follow_select_form">
                                    <input type="radio" name="follow_select" id="radio_followings" checked><label for="radio_followings" class="follow_label"><h2>followings..</h2></label>
                                    <input type="radio" name="follow_select" id="radio_follows" ><label for="radio_follows" class="follow_label"><h2>follows..</h2></label>
                                </form>
                            </div>
                            <div class="follow_window_main">
                                <div class="followings_main">
                                    <div class="text1">
                                        <p class="info">People who follows you..</p>
                                    </div>
                                    <div class="searchbox_main">
                                        <input type="text" class="Fsearchbox" id="followings_search" placeholder="Search a name..">
                                        <div class="search_icon">
                                            <img src="../../mydata/pics/searc.gif" alt="Done" class="search_icon_gif1" />
                                        </div>
                                    </div>
                                    <div class="followings_d"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="center_body">
                        <div class="start_outer">
                            <div class="start_inner">
                                <div class="start_title">
                                    <h5>Start Something New..</h5>
                                </div>
                                <div class="bottom_line"></div>
                                <div class="start_items">
                                    <ul class="start_items_list">
                                        <li id="st_t"><a href="start.php#topic">Start Topic</a></li>
                                        <li id="st_g"><a href="start.php#group">Start Group</a></li>
                                        <li id="st_c"><a href="start.php#corner">Start Corner</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       <div class="topics_list_outer">
                            <div class="topics_list_inner">
                                <div class="topics_list">
                                    
                                </div>
                            </div>
                       </div>
                    </div>
                 </div>
                    
                </div>
            </div>
          
           
         </div>
        </body>
    </html>