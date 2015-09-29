
<?PHP
	include("secure_session.php");
	sec_session_start(); 
?>

<!doctype html>
<html>
    <head>
    	<meta charset="utf-8">
    	<title>FireConverse</title>
        <script src='../../js/jquery.min.js' ></script>
        <script src="../../js/quick_access.js" ></script>
        <link rel="stylesheet" type="text/css" href="../../css/navbar.css" >
        <link rel="stylesheet" type="text/css" href="../../css/topic.css" >
    </head>
	<body>
    	<script>
			var url_info,t_id_url;
        	function getURLparams(URL){
				var queryStart=URL.indexOf("?")+1,
					queryEnd=URL.indexOf("#")+1 || URL.length+1,
					query=URL.slice(queryStart,queryEnd-1),
					pairs=query.replace(/\+/g,"").split("&"),
					params={},
					n,v,
					nv,i;
				if(query===URL || query ===""){
					window.location.replace("sections.php");
					return;
					}
				for(i=0;i<pairs.length;i++){
					nv=pairs[i].split("=");
					n=decodeURIComponent(nv[0]);
					v=decodeURIComponent(nv[1]);
					if(!params.hasOwnProperty(n)){
						params[n]=[];
						}
					params[n].push(nv.length === 2?v:null);
					
					}
				return params;
			} 
			function mem_info(id_list,fn){
				var info1;
				
				$.ajax({
					url:'infogiver.php',
					method:'post',
					dataType:'text',
					data:{
						flag:'mem_info',
						id_list:id_list
						},
					success:function(data){
												
						if(data){
							info1=JSON.parse(data);
							fn(info1);
							}
					},
					error:function(jXHR,textStatus,errorThrown){
						alert(errorThrown);
					}
				});
				
				}
			function show_responses(t_id){
				var t_id1=t_id_url;
				var count_res_start=-10;
				var count_res_end=0;
				$(document).find(".ft_m_r_no").remove();
				if($(document).find(".ft_m_r_r").length == 0){
						$.ajax({
								url:'infogiver.php',
								method:"post",
								dataType:"text",
								data:{
									flag:"show_responses",
									topic_id:t_id1,
									count_res_start:count_res_start,
									count_res_end:count_res_end
									},
								success:function(data){
									if(data){
										var info=JSON.parse(data);
										if(info[0]){
										var append_div1; 
										append_div1="<div class='ft_m_r_r'><ul>";
											$.each(info,function(index,val){
												
													append_div1 +="<li id='res_id_"+info[index].res_id+"'>"
																+"<span><p>"+info[index].mem_name+"</p></span>"
																+"<div class='ft_m_r_r_li'><input type='hidden' value='' id='del_res_flag'> <p>"+info[index].date_of_res+"</p></div><br/>"
																+"<div class='ft_m_r_r_li_tu'>"
																+"<span><img src='"+info[index].mem_tumb+"'/></span></div>"
																+"<div class='ft_m_r_r_li_c'><p>"+info[index].res_text+"</p></div></li>";
																
																	
												});
												append_div1+="</ul></div>";
												
											$(append_div1).appendTo($(document).find(".ft_main_res"));	
											}
										}
									else{
										alert("Oops!Something wrong might have occured!.Please try again.");
										}
									
									},
								error:function(jXHR,textStatus,errorThrown){
									alert(errorThrown);
									}
							});
					}
				}

			function topic_info_single(topic_id){
				var append_div,topic_info=[],liked='../../mydata/pics/like.png';
				
				if(topic_id){
					$.ajax({
						url:'infogiver.php',
						dataType:"text",
						method:"post",
						data:{
							flag:'topic_info_single',
							topic_id:topic_id
							},
						success:function(data){
							if(data != false){
								if(data=='itsarticle!') window.location.replace("article.php?article="+topic_id);
								if(data=='itspoll!') window.location.replace("poll.php?poll="+topic_id);
								var info=JSON.parse(data);
								if(info){
									var ft_id="ft_id_"+info[0].topic_id;
									$(".ft_main").attr("id",ft_id);
									if(info[0].auth==0) $(".ft_m_h_i_o").remove();
									var id_list=[];
									id_list[0]=info[0].ID;
									
									mem_info(id_list,function(mem_info_list){
										flag=0;
										switch(info[0].room_id){
											case '1':
												topic_info['room_id']='Sports';
												break;
											case '2':
												topic_info['room_id']='Health';
												break;
											case '3':
												topic_info['room_id']='Movies';
												break;
											case '4':
												topic_info['room_id']='Fashion';
												break;
											case '5':
												topic_info['room_id']='Tech';
												break;
											default:flag=1;
										}
										if(flag) return;
										switch(info[0].liked){
											case '1':	
												liked="../../mydata/pics/liked.png";
												liked_id='liked_i';
											break;
											case '-1':
												liked="../../mydata/pics/disliked.png";
												liked_id='disliked_i';
											break;
											case '0':
												liked="../../mydata/pics/like.png";
												liked_id='like_i';
											break;
											}
										append_div="<div class='ft_author'><span class='ft_a_room'><p>"+topic_info['room_id']+"</p></span>";
										append_div+="<span class='ft_a_d'><img src='../../mydata/pics/arrow.png' /></span>";
										if(info[0].corner_name){
											append_div+="<span class='ft_a_coner'><a href='corner.php?cid="+info[0].corner_id+"'><p>avengers</p></a></span>";
											append_div+="<span class='ft_a_d'><img src='../../mydata/pics/arrow.png' /></span>";
											
											}
										append_div+="<span class='ft_a_u'><a href='people.php?ppl="+info[0].ID+"'><p>"+mem_info_list[0].u_name+"</p></span>";
										append_div+="</div>";
										$(append_div).prependTo(".ft_inner");
										show_reponses(info[0].topic_id);
										$(".ft_main_tumb img").attr('src',mem_info_list[0].tumb);
										$(".ft_m_h_t h2").html(info[0].t_title);
										$(".ft_m_h_i_li p").html(info[0].likes);
										$(".ft_m_h_i_di p").html(info[0].dislikes);
										$(".ft_m_h_i_d img").attr("src",liked).attr("id",liked_id);
										$(".ft_m_h_i_dat p").html(info[0].t_date);
										$(".ft_m_b_t p").html(info[0].topic);
										if(info[0].data) $(".ft_m_b_p").css({'display':'inline-block'});
										$(".ft_m_b_p span img").attr("src",info[0].data);
										room_nav_color(info[0].room_id);
										});
									
									}
								}
							},
						error:function(jXHR,textStatus,errorThrown){
							alert(errorThrown);
							}
						});
					}
				}
			
		function likes(){ 
			$(".ft_m_h_i").one("click",".ft_m_h_i_d span img",function(){
			var t_id=t_id_url;
			var id=$(this).attr("id");
			var like_info;
			switch(id){
				case 'like_i':	liked(1,t_id,function(like_info){
									if(like_info=="updated_liked"){
										var t=$(document).find(".ft_m_h_i_li p").html();
										t=parseInt(t)+1;
										$(document).find(".ft_m_h_i_li p").html(t);
									}
									});
								$(document).find(this).attr("src","../../mydata/pics/liked.png").attr("id","liked_i");
								break;
				case 'liked_i':	liked(-1,t_id,function(like_info){
									if(like_info=="updated_disliked"){
										 
										var t=$(document).find(".ft_m_h_i_di p").html();
										t=parseInt(t)+1;
										$(document).find(".ft_m_h_i_di p").html(t);
										var t=$(document).find(".ft_m_h_i_li p").html();
										t=parseInt(t)-1;
										$(document).find(".ft_m_h_i_li p").html(t);
									}
								});
								$(document).find(this).attr("src","../../mydata/pics/disliked.png").attr("id","disliked_i");
								break;
				case 'disliked_i':liked(9,t_id,function(like_info){
									if(like_info=="updated_like"){
										var t=$(document).find(".ft_m_h_i_di p").html();
										t=parseInt(t)-1;
										$(document).find(".ft_m_h_i_di p").html(t);
									}
								 });
								$(document).find(this).attr("src","../../mydata/pics/like.png").attr("id","like_i");
								break;
				}				
		});
		
	}
		function liked(like_temp,t_id,fn){
			if(t_id){
				$.ajax({
					url:'forum_add.php',
					method:"post",
					dataType:"text",
					data:{
						flag:"like",
						like_temp:like_temp,
						topic_id:t_id
						},
					success:function(data){
						fn(data);
						},
					error:function(jXHR,textStatus,errorThrown){
						alert(errorThrown);
						}
					});
			}
			else return false;
			}
		function show_likers(){
			$(".ft_m_h_i_l").one("click",".ft_m_h_i_li",function(){
					var t_id1=t_id_url;
					if($(document).find(".likers_list_outer").length ==0){
						
						$.ajax({
						url:'infogiver.php',
						method:"post",
						dataType:"text",
						data:{
							flag:"likers_list",
							topic_id:t_id1
							},
						success:function(data){
							if(data){
								var info=JSON.parse(data);
								$("#splash").fadeIn();
								var append_div="<div class='likers_list_outer'><div class='likers_list_inner'><h3>likers</h3><ul></ul>"
												+"<span onClick='close_likers_list()'><p>Close.</p></span></div></div>";
								$(append_div).appendTo("#global_container");
								
									var append_div="<span>No one liked yet.<br/>Be the first to like.</span>";
									
									$.each(info,function(index,val){
										append_div="";
										append_div +="<li>"+info[index].liker_name+"</li>";
										
										});
									$(append_div).appendTo(".likers_list_inner ul");
								}
							},
						error:function(jXHR,textStatus,errorThrown){
							alert(errorThrown);
							}
						});
					}
				});
			}
		function show_dislikers(){
			$(".ft_m_h_i_l").one("click",".ft_m_h_i_di",function(){
					var t_id1=t_id_url;
					if($(document).find(".likers_list_outer").length ==0){
						
						
						$.ajax({
						url:'infogiver.php',
						method:"post",
						dataType:"text",
						data:{
							flag:"dislikers_list",
							topic_id:t_id1
							},
						success:function(data){	
							if(data){
								var info=JSON.parse(data);
								$("#splash").fadeIn();
								var append_div="<div class='likers_list_outer'><div class='likers_list_inner'><h3>dislikers</h3><ul></ul>"
												+"<span onClick='close_likers_list()'><p>Close.</p></span></div></div>";
								$(append_div).appendTo("#global_container");
								append_div='';
									if(info =="") append_div="<span>No one disliked yet.<br/>Be the first to like.</span>";
									
									$.each(info,function(index,val){
										
										append_div +="<li>"+info[index].disliker_name+"</li>";
										
										});
									$(append_div).appendTo(".likers_list_inner ul");
								}
							},
						error:function(jXHR,textStatus,errorThrown){
							alert(errorThrown);
							}
						});
					}
				});
			}
			function close_likers_list(){
				
					
					$(".likers_list_outer").remove();
					$("#splash").click();
					
				}
			function show_options(){
				$(document).one("click",".ft_m_h_i_o",function(){
					
					if($(document).find(this).find("ul").length==0){
						$(document).find(this).find("p").hide();
						var append_div="<ul><li onClick='edit_topic()'><p>Edit</p><li onClick='delete_topic()'><p style='color:rgb(254, 71, 71)'>Delete</p></li>";
					
						$(append_div).appendTo($(document).find(this));
					}
					});
				
				}
				function edit_topic(){
					$(document).one("click",".ft_m_h_i_o ul li",function(){
						if($(".ft_m_b_t textarea,.ft_m_b_t div").length==0){
							
							var t_id1=t_id_url;
							var text=$(document).find(".ft_m_b_t span p").html(); 
							var text1=$(document).find(".ft_m_h_t h2").html();
							$(document).find(".ft_m_b_t span p,.ft_m_h_t h2").hide();
							$(document).find(".ft_m_h_t span").animate({'margin-left':0});
							 
							
							$("<textarea ></textarea>").appendTo($(document).find(".ft_m_b_t")).val(text);
							$("<textarea maxlength='100'></textarea>").appendTo($(document).find(".ft_m_h_t")).val(text1);
							
							var append_div="<div class='edit_buttons'><span><button onClick='cancel_edit()'>Cancel</button><button onClick='done_edit()'>Done</button></span></div>";
							$(append_div).appendTo($(document).find(".ft_m_b_t"));
						}
						
					});
					}
				function delete_topic(){
					$(document).one("click",".ft_m_h_i_o ul li",function(){
						if($(document).find(".notify_outer").length==0){
							
							var t_id1=t_id_url;
							$("#splash").fadeIn().unbind("click");
							$(document).css({'z-index':99,'position':'relative'});
							
							$('html,body').animate({
								scrollTop:$(document).offset().top-60
								},1500);
							var append_div="<div class='notify_outer'>"
										   +"<div class='notify_inner'>"
										   +"<span><p>Are you sure to delete this topic?</p></span><br/>"
										   +"<div><button onClick='confirm_delete_topic()'>Delete</button>"
										   +"<button onClick='cancel_delete_topic()' >No</button>"
										   +"</div></div>";
										   
						$(append_div).appendTo(t_id);
						}
					});
					}
				function cancel_delete_topic(){
					
					$(document).one("click",".notify_outer button",function(){
						
						
						var t_id1=t_id_url;
						$(document).css({'z-index':'0','position':'static'});
						$(document).find(".notify_outer").remove();
						$("#splash").fadeOut();
						
								});
				}
				function confirm_delete_topic(){
					$(document).one("click",".notify_outer button",function(){
						
						var img=0;
						if($(document).find(".t_li_b_i img").length){
							img=1;
							}
						$.ajax({
							url:'forum_add.php',
							dataType:"text",
							method:'post',
							data:{
								flag:'delete_topic',
								topic_id:t_id1,
								img:img
								},
							success: function(data){
								if(data=="deleted"){
									$(document).find(".topics_list_outer").find(t_id).remove();
									$(document).find(".notify_outer").remove();
									$("#splash").click();
									}
								else{
									alert("Oops! Something might have went wrong.Please try again.");
									}
								},
							error: function(jXHR,textStatus,errorThrown){
								
								}
							
							});
						
						});
					}
					
				function cancel_edit(){
					
					$(document).one("click",".ft_m_b_t button",function(){
						
						
						$(document).find(".ft_m_b_t textarea,.ft_m_b_t div,.ft_m_h_t textarea").remove();
						$(document).find(".ft_m_b_t span p").fadeIn();
						$(document).find(".ft_m_h_t h2").fadeIn();
						
						
						});
				
					}
				function done_edit(){
					$(document).one("click",".ft_m_b_t button",function(){
						
						
						
						var orig=$(document).find(".ft_m_b_t span p").html();
						var edit=$(document).find(".ft_m_b_t textarea").val();
						
						var orig1=$(document).find(".ft_m_h_t h2").html();
						var edit1=$(document).find(".ft_m_h_t textarea").val();
						
						if(!(orig == edit) || orig1 !==edit1){
							$.ajax({
								url:'forum_add.php',
								dataType:'text',
								method:"post",
								data:{
									flag:"edit_topic",
									topic_id:t_id1,
									edit:edit,
									edit1:edit1
									},
								success:function(data){ 
									if(data=="updated"){
										$(document).find(".ft_m_b_t textarea,.ft_m_b_t div,.ft_m_h_t textarea").remove();
										$(document).find(".ft_m_b_t span p").html(edit).fadeIn();
										$(document).find(".ft_m_h_t h2").html(edit1).fadeIn();
										
										}
									else{
										alert("Oops!Something might have went wrong.Please try again.");
										}
									},
								error:function(jXHR,textStatus,errorThrown){
									alert(errorThrown);
									}
									
								});
							}
						else{
							$(document).find(".ft_m_b_t textarea,.ft_m_b_t div,.ft_m_h_t textarea").remove();
							$(document).find(".ft_m_b_t span p").fadeIn();
							$(document).find(".ft_m_h_t h2 ").fadeIn();
							
							
							}
						});
					}
			
			function show_large_pic(){
				$(".ft_m_b_p span img").on("click",function(){
					var width=$(".ft_m_b_p").css('width');
					
					if(width=='260px')
						$(".ft_m_b_p").animate({'padding':'10px 105px','width':700},500);
					if(width=='700px')
						$(".ft_m_b_p").animate({'padding':'10px 325px','width':260},500);
					});
				}
			//-------------dom functions
			$(function(){
				url_info=getURLparams(window.location.search);
				t_id_url=url_info['topic'][0]; 
				if(Math.floor(t_id_url) == t_id_url && $.isNumeric(t_id_url))
					topic_info_single(t_id_url);
				else {//------ oops page
					}
					
				$("#splash").click(function(){
					$(".follow_window_outer,#splash").fadeOut("slow");hide();
					close_likers_list();
					cancel_delete_topic();
					});
					
				});
        </script>
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
							
        ?>
         <div id="splash"></div>
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
                    	<div class="main_body">
                        	<div class="ft_outer">
                            	<div class="ft_inner">
                                	<div class="ft_main">
                                    	<div class="ft_main_header">
                                            <div class="ft_main_tumb">
                                                <img src="../../mydata/pics/unknownuser.jpg" alt="Picture unavailable." />
                                            </div>
                                            <div class="ft_m_h_c">
                                            	<div class="ft_m_h_t">
                                                	<h2></h2>
                                                </div>
                                                <div class="ft_m_h_i">
                                                	<div class="ft_m_h_i_d">
                                                    	<span>
                                                        	<img onClick="likes()" src="../../mydata/pics/like.png" alt="like" />
                                                        </span>
                                                    </div>
                                                    <div class="ft_m_h_i_l">
                                                    	<div class="ft_m_h_i_li" onClick="show_likers()">
                                                        	<p>0</p>
                                                            <span>likes</span>
                                                        </div>
                                                        <div class="ft_m_h_i_di" onClick="show_dislikers()">
                                                        	<p>0</p>
                                                            <span>dislikes</span>
                                                        </div>
                                                        
                                                        <div class="ft_m_h_i_o" onClick="show_options()">
															<p>Options</p>
                                                        </div>
                                                       
                                                    </div>
      												<div class="ft_m_h_i_dat">
                                                        <p></p>
                                                    </div>                                       
                                                </div>
                                              
                                            </div>
                                    </div>
                                    <div class="ft_main_body">
                                    	<div class="ft_m_b_p">
                                        	<span>
                                            	<img onClick="show_large_pic()" src="" alt="" />
                                            </span>
                                        </div>
                                    	<div class="ft_m_b_t">
                                        	<span>
                                            	<p></p>
                                            </span>
                                        </div>
                                        <div class="ft_m_b_re">
                                        	<p>Responses</p>
                                        </div>
                                    </div>
                                    <div class="ft_main_res">
                                    	<div class="ft_m_r_no">
                                        	<span>
                                            	<p>Be the first to respond..</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
    </body>
</html>
