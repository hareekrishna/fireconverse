<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
</head>
<body style=" width: 1366px; margin: 0 0 0 0; height: 1366px; ">
    <script src='../../js/jquery.min.js' ></script>
    <script src="../../js/jquery-ui.min.js"></script>
	<script src="../../js/edit_avatar_page.js" ></script>
    <script src="../../js/quick_access.js" ></script>
    <script src="../../js/jquery.form.js"></script>
<?PHP

	require_once("upload_file.php");
	require_once("upload_wrapper.php");
	require_once 'csign.php';
	include_once 'secure_session.php';
	include 'login_status.php';

	
	sec_session_start();
	if(login_check($mysqli) == true) {
		 if(isset($_SESSION['u_ID'],$_SESSION['u_name'],$_SESSION['u_email'], $_SESSION['xploded_u_email'], $_SESSION['login_string'])) {
			$u_ID = $_SESSION['u_ID'];
			$xploded_u_email=$_SESSION['xploded_u_email'];
			$u_email=$_SESSION['u_email'];	 
			$u_name=$_SESSION['u_name'];
			
			}
	}
	 else{
			 header("location:loginPage.php");
		 }
		 $country="";
		 $gender="";
		 $privacy="0_0";
		 $mobileno="";
		 
		 $stmt=$mysqli->prepare("select `gender`,`mobileno`,`privacy` from `fireconverse`.`members` where `ID`=$u_ID ");
		 if($stmt){
			 $stmt->execute();
			 $stmt->store_result();
			 $stmt->bind_result($gender ,$mobileno ,$privacy);
			 $stmt->fetch();
			 }
		 $stmt1=$mysqli->prepare("select `country` from `fireconverse`.`meminfo` where `ID`=$u_ID ");
		 if($stmt1){
			 $stmt1->execute();
			 $stmt1->store_result();
			 $stmt1->bind_result($country);
			 $stmt1->fetch();
			 }
		if($mobileno){
			$mobileno_div="<p class='l1_f_v'>".$mobileno."</p>";
			}
		else{
			$mobileno_div="<p class='l1_f_v' style='color:#BDBDBD'>Not updated yet</p>";
			}
		$privacy1=array();
		$privacy1=explode("_",$privacy);
		if($privacy1[0]==0){
			$public_email="PUBLIC";
			}
		else{
			$public_email="PRIVATE";
			}
		if($privacy1[1]==0){
			$public_mobile="PUBLIC";
			}
		else{
			$public_mobile="PRIVATE";
			}
		$stmt->close();
		if(!$country){
			$country="Not updated yet";
			$country_div="<p class='l1_f_v' style='color:#BDBDBD'>$country</p>";
			}
		else{
			$country_div="<p class='l1_f_v'>$country</p>";
			}
		
			if(isset($_POST['action']) && !empty($_POST['action'])) {
			$action = $_POST['action'];
			switch($action) {
				case 'previous' : previous();break;
			  
			} ?><script>var f="<?PHP echo $action;?>";
                </script>
				 <?PHP
		}
			function previous(){
				 $prev_array=array();
				 $stmt_prev_select=$mysqli->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$u_ID");
			 if($stmt_tumb_updater){
				 $stmt_prev_select->execute();
				  $stmt_prev_select->store_result();
				 $stmt_prev_select->bind_result($prev_array);
				 $stmt_prev_select->fetch();
				 echo $prev_array;
				
				 }
				}
		 $flag_options="0";

		 if($u_ID){
		 $flag_options="logged";
		 } 
		
	?>
	
	<link rel="stylesheet" type="text/css" href="../../css/navbar.css" >
	<link rel="stylesheet" type="text/css" href="../../css/edit_avatar.css">
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
                            	<input type="text" id="searchbox" name="searchbox" placeholder="Search.." >
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
			<img src="" id="user_avatar"  style="display:block" alt="No Photo Available." draggable="false" >
       
			<div class="edit_user_avatar" style="display:block" >
              <div id="edit_user_avatar_outer">
                   <div id="ch_txt">
                        <img src="../../mydata/pics/edit_brush.png" alt="" id="edit_brush" draggable="false">
                        <p id="edit_avatar_text" onClick="slidedown()">Change Avatar</p>
                    </div>
                    <div id="avatar_ch">
                      <p id="avatar_ch_txt">Avatar</p>
                    </div>
                    <div id="wrrpr_ch">
                       
                      <p id="wrrpr_ch_txt">Wrapper</p>
                    </div>
              <form action="" method="post" id="upload_w"  enctype="multipart/form-data">
                    <input type="file" style="display:none" name="file_w" id="file_w"><br>
               </form></div>
			</div> </div>
		
        	<div id="container">
			<div id="username" ><?php echo $u_name;?></div>
			<div id="links">
				<a href="edit_avatar.php" id="edit_avatar">edit avatar</a>
				<div class="edit_avatar_bar" ></div>
				<a href="profile.php" id="history">history</a>
				<div class="history_bar"></div>
			</div>
		</div>
        
        </div>

		

        <div id="splash">  </div>	
            <div class="change_avatar_window" >
            	<div class="change_avatar_window_inner">
                    <form action="" method="post" id="upload" style="display:none"  enctype="multipart/form-data">
                   		 <input type="file" style="display:none" name="file" id="file"><br>
                    </form>
                    
                   
                    <div class="user_avatar_inwindowa">
                    	<div class="tumb_outer"> 
                        	 <div class="tumb_inner">
                            	 <img src="" name="tumb"  alt="No Photo Available." draggable="false" >
                   			 </div>
                             <div class="choose_outer">
                                <p class="pic_selection_text" onClick="">Choose Avatar..</p>
                            </div>
                        </div>
                    <div class="container_av">
                    	<div class="sub_cont_av">
                            <div class="sub_cont_av_links">
                                <div id="previous" onClick="fn_previous(<?PHP echo $u_ID.", '".$u_name."'"; ?>);">previous avatars..</div>
                                <div id="resize_pic" onClick="pic_load();">resize avatar..</div>
                                <div id="remove_avatar">remove avatar..</div>
                            </div>
                       <div class="cont_av"> 
                             <div class="prev_cont_av">
                               <ul class="ul_cont_av">
                               
                               </ul>
                             </div>
                            <div class="crop_div_outer">
                                <div class="crop_div_image">
                                     <img src="" draggable="false"/>
                                      <div class="crop_box"></div>   
                                </div> 
                               <br/>
                               <div class="con_crop">
                                    <span class="l1_f_infotext"><p>Drag the box around the photo and tap done.</p></span>
                                   <br/>
                                    <div class="crop_done_button">
                                         <button class="l1_f_bttn" >Done</button>
                                    </div>
                               </div>
  						  </div>      
                        
                        <div class="remove_av_outer">
                        	<div class="remove_av_body">
                            	<p>Are you sure to remove your avatar?</p>
                                <div id="remove_av_btn">
                                	<button class="l1_f_bttn ok_re" onClick="delete_av();">Remove</button>
                                    
                                </div>
                                
                            </div>
                        </div>
                     </div>
				</div>
             </div>
          </div>
      </div>
        </div>
        <div class="main_body_outer">
        	<div class="main_body_inner">
            	<div class="layer_text">
                	<p style="margin: 0 0 0 0;color: #525252;">Basic Info of you..</p>
                </div>
            	<div class="layer" id="layer1" style="">
                	<div class="layer_content_outer">
                    	<div class="layer_content_inner">
                        	<div id="editlayer_outer1" class="editlayer_outer">
                            	<div class="editlayer_main">
                                	<p class="editlayer_txt">Edit</p>
                                </div>
                            </div>
                        	<div id="layer1_field1" class="layer_field">
                            	
                                <div class="l1_f_c_o" id="l1_f_c_o">
                                
                                    <div class="l1_f_n_o">
                                        <p class="l1_f_n">Name</p>
                                    </div>
                                    <div class="l1_f_s_o">
                                        <p class="l1_f_s">:</p>
                                    </div>
                                    <div class="l1_f_v_o">
                                        <p class="l1_f_v"><?PHP echo $u_name; ?></p>
                                    </div>
                                    <div class="textarea_outer" style="display:none">
                                        <textarea placeholder="First Name" id="u1" class="l1_f_txtarea"></textarea>
                                        <textarea placeholder="Last Name " id="u2" class="l1_f_txtarea"></textarea>
                                    </div>
                                    <div class='edit_gray_o'><img class='edit_gray' id="edit_gray_name" src='../../mydata/pics/edit_brush.png'></div>
                                    <div class="l1_f_bttn0">
                                    	<button id="done_name" class="l1_f_bttn">Done</button>
                                    </div>
                                    <div class="l1_f_info">
                                    	<p class="l1_f_infotext" >Name should contain 5-16 charecters.</p>
                                    </div>
                                 </div>
                             </div></br>
                             <div class="bottom_line"></div>
                             
                            <div id="layer1_field2" class="layer_field">
                              
                              <div class="l1_f_c_o" id="l1_f_c_o" >
                              	   <div class="l1_f_n_o">
                                   		<p class="l1_f_name">Country</p>
                                   </div>
                                   <div class="l1_f_s_o">
                                        <p class="l1_f_s">:</p>
                                    </div>
                                    <div class="l1_f_v_o">
                                       <?PHP echo $country_div; ?>
                                    </div>
                                   <div class="textarea_outer" style="display:none">

                                    <select id="country_select" class="country_select" >
                                        <option value="Afghanistan" title="Afghanistan">Afghanistan</option>
                                        <option value="Åland Islands" title="Åland Islands">Åland Islands</option>
                                        <option value="Albania" title="Albania">Albania</option>
                                        <option value="Algeria" title="Algeria">Algeria</option>
                                        <option value="American Samoa" title="American Samoa">American Samoa</option>
                                        <option value="Andorra" title="Andorra">Andorra</option>
                                        <option value="Angola" title="Angola">Angola</option>
                                        <option value="Anguilla" title="Anguilla">Anguilla</option>
                                        <option value="Antarctica" title="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda" title="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina" title="Argentina">Argentina</option>
                                        <option value="Armenia" title="Armenia">Armenia</option>
                                        <option value="Aruba" title="Aruba">Aruba</option>
                                        <option value="Australia" title="Australia">Australia</option>
                                        <option value="Austria" title="Austria">Austria</option>
                                        <option value="Azerbaijan" title="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas" title="Bahamas">Bahamas</option>
                                        <option value="Bahrain" title="Bahrain">Bahrain</option>
                                        <option value="Bangladesh" title="Bangladesh">Bangladesh</option>
                                        <option value="Barbados" title="Barbados">Barbados</option>
                                        <option value="Belarus" title="Belarus">Belarus</option>
                                        <option value="Belgium" title="Belgium">Belgium</option>
                                        <option value="Belize" title="Belize">Belize</option>
                                        <option value="Benin" title="Benin">Benin</option>
                                        <option value="Bermuda" title="Bermuda">Bermuda</option>
                                        <option value="Bhutan" title="Bhutan">Bhutan</option>
                                        <option value="Bolivia, Plurinational State of" title="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                                        <option value="Bonaire, Sint Eustatius and Saba" title="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="Bosnia and Herzegovina" title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana" title="Botswana">Botswana</option>
                                        <option value="Bouvet Island" title="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil" title="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory" title="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam" title="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria" title="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso" title="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi" title="Burundi">Burundi</option>
                                        <option value="Cambodia" title="Cambodia">Cambodia</option>
                                        <option value="Cameroon" title="Cameroon">Cameroon</option>
                                        <option value="Canada" title="Canada">Canada</option>
                                        <option value="Cape Verde" title="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands" title="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic" title="Central African Republic">Central African Republic</option>
                                        <option value="Chad" title="Chad">Chad</option>
                                        <option value="Chile" title="Chile">Chile</option>
                                        <option value="China" title="China">China</option>
                                        <option value="Christmas Island" title="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands" title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia" title="Colombia">Colombia</option>
                                        <option value="Comoros" title="Comoros">Comoros</option>
                                        <option value="Congo" title="Congo">Congo</option>
                                        <option value="Congo, the Democratic Republic of the" title="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands" title="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica" title="Costa Rica">Costa Rica</option>
                                        <option value="Côte d'Ivoire" title="Côte d'Ivoire">Côte d'Ivoire</option>
                                        <option value="Croatia" title="Croatia">Croatia</option>
                                        <option value="Cuba" title="Cuba">Cuba</option>
                                        <option value="Curaçao" title="Curaçao">Curaçao</option>
                                        <option value="Cyprus" title="Cyprus">Cyprus</option>
                                        <option value="Czech Republic" title="Czech Republic">Czech Republic</option>
                                        <option value="Denmark" title="Denmark">Denmark</option>
                                        <option value="Djibouti" title="Djibouti">Djibouti</option>
                                        <option value="Dominica" title="Dominica">Dominica</option>
                                        <option value="Dominican Republic" title="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador" title="Ecuador">Ecuador</option>
                                        <option value="Egypt" title="Egypt">Egypt</option>
                                        <option value="El Salvador" title="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea" title="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea" title="Eritrea">Eritrea</option>
                                        <option value="Estonia" title="Estonia">Estonia</option>
                                        <option value="Ethiopia" title="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)" title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands" title="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji" title="Fiji">Fiji</option>
                                        <option value="Finland" title="Finland">Finland</option>
                                        <option value="France" title="France">France</option>
                                        <option value="French Guiana" title="French Guiana">French Guiana</option>
                                        <option value="French Polynesia" title="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories" title="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon" title="Gabon">Gabon</option>
                                        <option value="Gambia" title="Gambia">Gambia</option>
                                        <option value="Georgia" title="Georgia">Georgia</option>
                                        <option value="Germany" title="Germany">Germany</option>
                                        <option value="Ghana" title="Ghana">Ghana</option>
                                        <option value="Gibraltar" title="Gibraltar">Gibraltar</option>
                                        <option value="Greece" title="Greece">Greece</option>
                                        <option value="Greenland" title="Greenland">Greenland</option>
                                        <option value="Grenada" title="Grenada">Grenada</option>
                                        <option value="Guadeloupe" title="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam" title="Guam">Guam</option>
                                        <option value="Guatemala" title="Guatemala">Guatemala</option>
                                        <option value="Guernsey" title="Guernsey">Guernsey</option>
                                        <option value="Guinea" title="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau" title="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana" title="Guyana">Guyana</option>
                                        <option value="Haiti" title="Haiti">Haiti</option>
                                        <option value="Heard Island and McDonald Islands" title="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                        <option value="Holy See (Vatican City State)" title="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras" title="Honduras">Honduras</option>
                                        <option value="Hong Kong" title="Hong Kong">Hong Kong</option>
                                        <option value="Hungary" title="Hungary">Hungary</option>
                                        <option value="Iceland" title="Iceland">Iceland</option>
                                        <option value="India" title="India">India</option>
                                        <option value="Indonesia" title="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of" title="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq" title="Iraq">Iraq</option>
                                        <option value="Ireland" title="Ireland">Ireland</option>
                                        <option value="Isle of Man" title="Isle of Man">Isle of Man</option>
                                        <option value="Israel" title="Israel">Israel</option>
                                        <option value="Italy" title="Italy">Italy</option>
                                        <option value="Jamaica" title="Jamaica">Jamaica</option>
                                        <option value="Japan" title="Japan">Japan</option>
                                        <option value="Jersey" title="Jersey">Jersey</option>
                                        <option value="Jordan" title="Jordan">Jordan</option>
                                        <option value="Kazakhstan" title="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya" title="Kenya">Kenya</option>
                                        <option value="Kiribati" title="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of" title="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of" title="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait" title="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan" title="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic" title="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia" title="Latvia">Latvia</option>
                                        <option value="Lebanon" title="Lebanon">Lebanon</option>
                                        <option value="Lesotho" title="Lesotho">Lesotho</option>
                                        <option value="Liberia" title="Liberia">Liberia</option>
                                        <option value="Libya" title="Libya">Libya</option>
                                        <option value="Liechtenstein" title="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania" title="Lithuania">Lithuania</option>
                                        <option value="Luxembourg" title="Luxembourg">Luxembourg</option>
                                        <option value="Macao" title="Macao">Macao</option>
                                        <option value="Macedonia, the former Yugoslav Republic of" title="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="Madagascar" title="Madagascar">Madagascar</option>
                                        <option value="Malawi" title="Malawi">Malawi</option>
                                        <option value="Malaysia" title="Malaysia">Malaysia</option>
                                        <option value="Maldives" title="Maldives">Maldives</option>
                                        <option value="Mali" title="Mali">Mali</option>
                                        <option value="Malta" title="Malta">Malta</option>
                                        <option value="Marshall Islands" title="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique" title="Martinique">Martinique</option>
                                        <option value="Mauritania" title="Mauritania">Mauritania</option>
                                        <option value="Mauritius" title="Mauritius">Mauritius</option>
                                        <option value="Mayotte" title="Mayotte">Mayotte</option>
                                        <option value="Mexico" title="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of" title="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of" title="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco" title="Monaco">Monaco</option>
                                        <option value="Mongolia" title="Mongolia">Mongolia</option>
                                        <option value="Montenegro" title="Montenegro">Montenegro</option>
                                        <option value="Montserrat" title="Montserrat">Montserrat</option>
                                        <option value="Morocco" title="Morocco">Morocco</option>
                                        <option value="Mozambique" title="Mozambique">Mozambique</option>
                                        <option value="Myanmar" title="Myanmar">Myanmar</option>
                                        <option value="Namibia" title="Namibia">Namibia</option>
                                        <option value="Nauru" title="Nauru">Nauru</option>
                                        <option value="Nepal" title="Nepal">Nepal</option>
                                        <option value="Netherlands" title="Netherlands">Netherlands</option>
                                        <option value="New Caledonia" title="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand" title="New Zealand">New Zealand</option>
                                        <option value="Nicaragua" title="Nicaragua">Nicaragua</option>
                                        <option value="Niger" title="Niger">Niger</option>
                                        <option value="Nigeria" title="Nigeria">Nigeria</option>
                                        <option value="Niue" title="Niue">Niue</option>
                                        <option value="Norfolk Island" title="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands" title="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway" title="Norway">Norway</option>
                                        <option value="Oman" title="Oman">Oman</option>
                                        <option value="Pakistan" title="Pakistan">Pakistan</option>
                                        <option value="Palau" title="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied" title="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama" title="Panama">Panama</option>
                                        <option value="Papua New Guinea" title="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay" title="Paraguay">Paraguay</option>
                                        <option value="Peru" title="Peru">Peru</option>
                                        <option value="Philippines" title="Philippines">Philippines</option>
                                        <option value="Pitcairn" title="Pitcairn">Pitcairn</option>
                                        <option value="Poland" title="Poland">Poland</option>
                                        <option value="Portugal" title="Portugal">Portugal</option>
                                        <option value="Puerto Rico" title="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar" title="Qatar">Qatar</option>
                                        <option value="Réunion" title="Réunion">Réunion</option>
                                        <option value="Romania" title="Romania">Romania</option>
                                        <option value="Russian Federation" title="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda" title="Rwanda">Rwanda</option>
                                        <option value="Saint Barthélemy" title="Saint Barthélemy">Saint Barthélemy</option>
                                        <option value="Saint Helena, Ascension and Tristan da Cunha" title="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="Saint Kitts and Nevis" title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia" title="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Martin (French part)" title="Saint Martin (French part)">Saint Martin (French part)</option>
                                        <option value="Saint Pierre and Miquelon" title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and the Grenadines" title="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa" title="Samoa">Samoa</option>
                                        <option value="San Marino" title="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe" title="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia" title="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal" title="Senegal">Senegal</option>
                                        <option value="Serbia" title="Serbia">Serbia</option>
                                        <option value="Seychelles" title="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone" title="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore" title="Singapore">Singapore</option>
                                        <option value="Sint Maarten (Dutch part)" title="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                                        <option value="Slovakia" title="Slovakia">Slovakia</option>
                                        <option value="Slovenia" title="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands" title="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia" title="Somalia">Somalia</option>
                                        <option value="South Africa" title="South Africa">South Africa</option>
                                        <option value="South Georgia and the South Sandwich Islands" title="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                        <option value="South Sudan" title="South Sudan">South Sudan</option>
                                        <option value="Spain" title="Spain">Spain</option>
                                        <option value="Sri Lanka" title="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan" title="Sudan">Sudan</option>
                                        <option value="Suriname" title="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen" title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland" title="Swaziland">Swaziland</option>
                                        <option value="Sweden" title="Sweden">Sweden</option>
                                        <option value="Switzerland" title="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic" title="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China" title="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan" title="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of" title="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand" title="Thailand">Thailand</option>
                                        <option value="Timor-Leste" title="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo" title="Togo">Togo</option>
                                        <option value="Tokelau" title="Tokelau">Tokelau</option>
                                        <option value="Tonga" title="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago" title="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia" title="Tunisia">Tunisia</option>
                                        <option value="Turkey" title="Turkey">Turkey</option>
                                        <option value="Turkmenistan" title="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands" title="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu" title="Tuvalu">Tuvalu</option>
                                        <option value="Uganda" title="Uganda">Uganda</option>
                                        <option value="Ukraine" title="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates" title="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom" title="United Kingdom">United Kingdom</option>
                                        <option value="United States" title="United States">United States</option>
                                        <option value="United States Minor Outlying Islands" title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay" title="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan" title="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu" title="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela, Bolivarian Republic of" title="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                                        <option value="Viet Nam" title="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British" title="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S." title="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna" title="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara" title="Western Sahara">Western Sahara</option>
                                        <option value="Yemen" title="Yemen">Yemen</option>
                                        <option value="Zambia" title="Zambia">Zambia</option>
                                        <option value="Zimbabwe" title="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    </div>
                                    <div class='edit_gray_o'><img class='edit_gray' id="edit_gray_country" src='../../mydata/pics/edit_brush.png'></div>
                                    <div   class="l1_f_bttn0">
                                    	<button id="done_country" class="l1_f_bttn">Done</button>
                                    </div>
                              </div>		
                            </div>
                            </br>
                             <div class="bottom_line"></div>
                              <div id="layer1_field3" class="layer_field">
                              
                              <div class="l1_f_c_o" id="l1_f_c_o" >
                              	   <div class="l1_f_n_o">
                                   		<p class="l1_f_n">Gender</p>
                                   </div>
                                   <div class="l1_f_s_o">
                                        <p class="l1_f_s">:</p>
                                    </div>
                                    <div class="l1_f_v_o">
                                        <p class="l1_f_v"><?PHP echo $gender; ?></p>
                                    </div>
                               </div>
                             </div>
                             <br/>
                             <div class="bottom_line"></div>
                            <div id="layer1_field4" class="layer_field">
                              
                              <div class="l1_f_c_o" id="l1_f_c_o" >
                              	   <div class="l1_f_n_o">
                                   		<p class="l1_f_n">Status</p>
                                   </div>
                                   <div class="l1_f_s_o">
                                        <p class="l1_f_s">:</p>
                                    </div>
                                    <div class="l1_f_v_o">
                                        <p class="l1_f_v"></p>
                                    </div>
                                    <div class="textarea_outer">
                                    	<textarea class="l1_f_txtarea" id="status_box" maxlength="52"></textarea>
                                    </div>
                                    <div class='edit_gray_o'><img class='edit_gray' id="edit_gray_status" src='../../mydata/pics/edit_brush.png'></div>
                                    <div   class="l1_f_bttn0">
                                    	<button id="done_status" class="l1_f_bttn">Done</button>
                                    </div>
                                    </br>
                                    <div class="l1_f_info">
                                    	<div class="l1_f_infotext">Only 52 charecters allowed.</div>
                                    </div>
                              </div>		
                            </div></br>
                            
                            </div>
                        </div>
                    </div>
                  <div class="layer_text">
                	<p style="margin: 0 0 0 0;color: #525252;">Signature</p>
                </div>
                <div class="layer" id="layer2" style="height:170px">
                    <div class="layer_content_outer">
                            <div class="layer_content_inner">
                                <div id="editlayer_outer2">
                                    <div class="editlayer_main">
                                        <p class="editlayer_txt">Edit</p>
                                    </div>
                                </div>
                              <div id="layer2_field1" class="layer_field">
                              
                                  <div class="l1_f_c_o" id="l1_f_c_o" >
                                       <div class="l1_f_n_o">
                                            <p class="l1_f_n">Signature</p>
                                       </div>
                                  </div>
                                  <div class="l1_f_s_o">
                                        <p class="l1_f_s">:</p>
                                  </div>
                                  <div class="l1_f_v_o">
                                     	
                                    </div>
                                   <div class="textarea_outer">
                                   		<textarea class="l1_f_txtarea" id="signbox" maxlength="7" ></textarea>
                                   </div>
                                    <div class='edit_gray_o'><img class='edit_gray' id="edit_gray_sign" src='../../mydata/pics/edit_brush.png'></div>
                                    <div   class="l1_f_bttn0">
                                    	<button id="done_sign" class="l1_f_bttn">Done</button>
                                    </div>
                                    <br/>
                                    <div class="l1_f_info">
                                    	<div class="l1_f_infotext">Only 7 charecters allowed.</div>
                                    </div>
                             </div>
                             <div class="bottom_line"></div>
                            </div>
                            <div id="layer2_field2" class="layer_field">
                              
                                  <div class="l1_f_c_o" id="l1_f_c_o" >
                                       <div class="l1_f_n_o">
                                            <p class="l1_f_n">Style</p>
                                       </div>
                                  </div>
                                  <div class="l1_f_s_o">
                                        <p class="l1_f_s">:</p>
                                  </div>
                                  <div class="l1_f_v_o">
                                       
                                    </div>
                                   
                                    <div class='edit_gray_o'><img class='edit_gray' id="edit_gray_font" src='../../mydata/pics/edit_brush.png'></div>
                                    
                                    <br/>
                                    <ul class="font_list">
                                    	
                                            
                                    </ul>
                                    <div class="l1_f_info">
                                    	<div class="l1_f_infotext">Choose a style for your Signature. Be patience untill font loads.</div>
                                    </div>
                             </div>  
                           
                             	<div id="layer2_field3" class="layer_field">
                                    <div class="l1_f_c_o" id="l1_f_c_o" >
                                       <div class="l1_f_n_o">
                                            <p class="l1_f_n">Style-Id</p>
                                       </div>
                                  </div>
                                  <div class="l1_f_s_o">
                                        <p class="l1_f_s">:</p>
                                  </div>
                                  <div id="textarea_outer">
                                   		<textarea class="l1_f_txtarea" id="fontbox"  maxlength="3" ></textarea>
                                   </div>
                                   <div class="font_loaded_outer" ></div>

                                   <div   class="l1_f_bttn0">
                                   		
                                    	<button id="done_fonts" class="l1_f_bttn" >Done</button>
                                    </div>
                                  <br/>
                                  <div class="l1_f_info">
                                    	<div class="l1_f_infotext">Hover on any style to know its Style-Id.</div>
                           			</div>
                                </div>
                            </div>
                     </div>
                 <div class="layer_text">
                	<p style="margin: 0 0 0 0;color: #525252;">Contact Info of you..</p>
                </div>
                	 <div class="layer" id="layer3" style="height:170px">
                        <div class="layer_content_outer">
                                <div class="layer_content_inner">
                                    <div id="editlayer_outer2">
                                        <div class="editlayer_main">
                                            <p class="editlayer_txt">Edit</p>
                                        </div>
                                    </div>
                                    <div id="layer3_field1" class="layer_field">
                              
                                 	 	<div class="l1_f_c_o" id="l1_f_c_o" >
                                       		<div class="l1_f_n_o">
                                           	 	<p class="l1_f_n">E-mail</p>
                                      		 </div>
                                  		</div>
                                  		<div class="l1_f_s_o">
                                        	<p class="l1_f_s">:</p>
                                 		 </div>
                                  		<div class="l1_f_v_o">
                                        	<p class="l1_f_v">
                                     	  <?PHP echo $u_email; ?>
                                          </p>
                                   		 </div>
                                         <div class="textarea_outer">
                                   			<input type="email" class="l1_f_txtarea" id="emailbox"  />
                                  		 </div>
                                         <div   class="l1_f_bttn0">
                                   		
                                    	<button id="done_email" class="l1_f_bttn" >Done</button>
                                   		 </div>
                                    	 <div class='edit_gray_o'>
                                         	<img class='edit_gray' id="edit_gray_email" src='../../mydata/pics/edit_brush.png'>
                                         </div>
										 <div class="public_type0">
                                         	<div class="public_type_inner">
                                            	<p class="public_type_text"><?PHP echo $public_email?></p>
                                                
                                            </div>
                                               
                                         </div>
                                          <div class="select_public" style="display:none">
                                                        <input type="radio" name="privacy" class="privacy" id="public" value="PUBLIC"<?PHP if($public_email=='PUBLIC')echo 'checked';?>>public
                                                        <input type="radio" name="privacy" class="privacy" id="private" value="PRIVATE"<?PHP if($public_email=='PRIVATE')echo 'checked';?> >private
                                                
                                                 </div>
                                         <br/>
                                          <div class="l1_f_info">
                                    		<div class="l1_f_infotext"></div>
                           				</div>
                               			 </div>
                                         
                               			 <div class="bottom_line"></div>
                                         <div id="layer3_field2" class="layer_field">
                              
                                 	 	<div class="l1_f_c_o" id="l1_f_c_o" >
                                       		<div class="l1_f_n_o">
                                           	 	<p class="l1_f_n">Contact.no</p>
                                      		 </div>
                                  		</div>
                                  		<div class="l1_f_s_o">
                                        	<p class="l1_f_s">:</p>
                                 		 </div>
                                  		<div class="l1_f_v_o">
                                        	
                                     	  <?PHP echo $mobileno_div; ?>
                                          
                                   		 </div>
                                         <div class="textarea_outer">
                                   			<textarea class="l1_f_txtarea" id="mobilebox" maxlength='15'  ></textarea>
                                  		 </div>
                                         <div   class="l1_f_bttn0">
                                   		
                                    	<button id="done_mobile" class="l1_f_bttn" >Done</button>
                                   		 </div>
                                    	 <div class='edit_gray_o'>
                                         	<img class='edit_gray' id="edit_gray_mobile" src='../../mydata/pics/edit_brush.png'>
                                         </div>
										 <div class="public_type0">
                                         	<div class="public_type_inner">
                                            	<p class="public_type_text"><?PHP echo $public_mobile?></p>
                                                
                                            </div>
                                               
                                         </div>
                                          <div class="select_public" style="display:none">
                                                        <input type="radio" name="privacy_m" class="privacy" id="public_m" value="PUBLIC"<?PHP  if($public_mobile=='PUBLIC')echo 'checked';?>>public
                                                        <input type="radio" name="privacy_m" class="privacy" id="private_m" value="PRIVATE"<?PHP if($public_mobile=='PRIVATE')echo 'checked';?> >private
                                                
                                         </div>
                                         <br/>
                                          <div class="l1_f_info">
                                    		<div class="l1_f_infotext"></div>
                           				</div>
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