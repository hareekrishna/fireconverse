<?PHP
include("secure_session.php");
sec_session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<script src='../../js/jquery.min.js' ></script>
<link rel="stylesheet" type="text/css" href="../../css/navbar.css" >
<link rel="stylesheet" type="text/css" href="../../css/corner.css" >

</head>

<body>
<script>
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
function corner_info(){
	var url_info=getURLparams(window.location.search);
	if(url_info['cid']==""){
		window.location.replace("sections.php");
		}
	var corner_id=parseInt(url_info['cid']);
	var configaration={
					'corner_id':corner_id,
					'room':false,
					
					};
	topics_list(configaration);
	$.ajax({
		url:"infogiver.php",
		dataType:"text",
		method:"post",
		data:{
			flag:"corner_info_single",
			corner_id_single:corner_id
			},
		success:function(data){
			var info=JSON.parse(data);
				if(info){	
				
					var link_to="start.php#topic?cid="+corner_id;
					mem_name(info[0].admin_id,function(admin_name){
						$("#c_admin .f_t_v").html(admin_name);
						});					
					$("#st_t a").attr("href",link_to);
					$(".banner_pic_img").attr("src",info[0].banner_pic);
					$(".title_container h1").html(info[0].corner_name);
					$(".status_text p").html(info[0].corner_desc);
					$("#start_date .f_t_v").html(info[0].time);
					
				}
			},
		error:function(jXHR,textStatus,errorThrown){
			alert(errorthrown);
			}
		});
	}
	function mem_name(mem_id,fn){
		if(parseInt(mem_id,10)){
			$.ajax({
				url:"infogiver.php",
				method:"post",
				dataType:"text",
				
				data:{
					flag:"mem_name",
					mem_ID:mem_id
					},
				success:function(data){
					if(data == "notfound"){
						alert("Oops! Something error occured.");
						}
					else{
						fn(data);
						}
					},
				error:function(jXHR,textStatus,errorThrown){
					alert(errorThrown);
					}
				});
			}
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

	function topics_list(configaration){
	var configaration=configaration;var info1;
	if(configaration){
		$.ajax({
			url:'infogiver.php',
			method:'post',
			dataType:"html",
			data:{
				flag:'corner_topics_list',
				configaration:configaration
				},
			success:function(data){ 
				if(data){
					data.replace(" ","");
					var info=JSON.parse(data);
					var append_div1='';
					var id_list=[];
					var i=0,flag,liked='../../mydata/pics/like.png';
					var topic_info=[];
					
					if(info){
						
						var append_div="<ul class='topics_list_main'></ul>";
						$(".topics_list").append(append_div);
						$.each(info,function(index,val){
							if(id_list.indexOf(info[index].ID) == -1){
								
								id_list[i]=info[index].ID;
								i++;
								
							}
							});
						
					mem_info(id_list,function(mem_info_list){
						$.each(info,function(index,val){
							flag=0;
							switch(info[index].room_id){
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
							
							$.each(mem_info_list,function(index1,val){
								if(mem_info_list[index1].ID == info[index].ID){
									topic_info['tumb']=mem_info_list[index1].tumb;
									topic_info['u_name']=mem_info_list[index1].u_name;	
									}
								});
								
							switch(info[index].liked){
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
							append_div1 +="<li class='topics_li' id='t_id_"+info[index].topic_id+"'>"
											+"<div class='t_li_h'>"
											+"<p class='t_li_h_r'>"+topic_info['room_id']+"</p>"
											+"<span class='t_li_h_d'><img src='../../mydata/pics/arrow.png' /></span>"
											+"<p class='t_li_h_u'>"+topic_info['u_name']+"</p>"
											+"<p class='t_li_h_t'>"+info[index].t_date+"</p></div>";
											+"<div class='t_li_b'>";
							if(info[index].data){		
							append_div1 +=	"<span class='t_li_b_i'>"
											+"<img src='"+info[index].data+"' /></span>";
							}
							append_div1 +="<div class='t_li_b_m_o'>"
										  +"<div class='t_li_b_m'>"
										  +"<div class='t_li_b_m_t'>"
										  +"<div class='t_li_b_m_i'>"
										  +"<img src='"+topic_info['tumb']+"'/></div>"
										  +"<span><p>"+info[index].t_title+"</p></span></div>"
										  +"<div class='t_li_b_m_c'>"
										  +"<p>"+info[index].topic.replace(/\\"/g,'\\\\"')+"</p></div></div>";
										  
							append_div1	+="<div class='t_li_b_m_f'>"
										  +"<div class='t_li_b_m_f_i'>"
										  +"<span><img id='"+liked_id+"' onClick='likes()' src='"+liked+"'></span></div>"
										  +"<div class='t_li_b_m_f_l'>"
										  +"<div class='t_li_b_m_f_li' onClick='show_likers()'><p>"+info[index].likes+"</p><span>likes</span></div>"
										  +"<div class='t_li_b_m_f_di' onClick='show_dislikers()'><p>"+info[index].dislikes+"</p><span>dislikes</span></div></div>";
							if(info[index].auth==1){		  
								append_div1	+="<div class='t_li_b_m_f_r' onClick='response_to_topic()'><p>Respond</p></div>"
											  +"<div class='t_li_b_m_f_o' onClick='show_options()'><p>options</p></div>"
											  +"</div></div></li>";
							}
							else{
								append_div1	+="<div class='t_li_b_m_f_r' onClick='response_to_topic()'><p>Respond</p></div>"
											  +"</div></div></li>";
								}
										  topic_id='#t_id_'+info[index].topic_id;
										  show_responses(topic_id);
						});
						
						$(append_div1).appendTo(".topics_list_main");
						
						
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
		$(".topics_list_main").one("click",".t_li_b_m_f_i span img",function(){
			var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
			var id=$(t_id).find(this).attr("id");
			var like_info;
			switch(id){
				case 'like_i':	liked(1,t_id,function(like_info){
									if(like_info=="updated_liked"){
										var t=$(t_id).find(".t_li_b_m_f_li p").html();
										t=parseInt(t)+1;
										$(t_id).find(".t_li_b_m_f_li p").html(t);
									}
									});
								$(t_id).find(this).attr("src","../../mydata/pics/liked.png").attr("id","liked_i");
								break;
				case 'liked_i':	liked(-1,t_id,function(like_info){
									if(like_info=="updated_disliked"){
										 
										var t=$(t_id).find(".t_li_b_m_f_di p").html();
										t=parseInt(t)+1;
										$(t_id).find(".t_li_b_m_f_di p").html(t);
										var t=$(t_id).find(".t_li_b_m_f_li p").html();
										t=parseInt(t)-1;
										$(t_id).find(".t_li_b_m_f_li p").html(t);
									}
								});
								$(t_id).find(this).attr("src","../../mydata/pics/disliked.png").attr("id","disliked_i");
								break;
				case 'disliked_i':liked(9,t_id,function(like_info){
									if(like_info=="updated_like"){
										var t=$(t_id).find(".t_li_b_m_f_di p").html();
										t=parseInt(t)-1;
										$(t_id).find(".t_li_b_m_f_di p").html(t);
									}
								 });
								$(t_id).find(this).attr("src","../../mydata/pics/like.png").attr("id","like_i");
								break;
				}				
		});
		
	}
function liked(like_temp,t_id,fn){
	t_id=t_id.split("_").pop();
	if(t_id){
		$.ajax({
			url:'likes.php',
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
	$(".topics_list_main").one("click",".t_li_b_m_f_li",function(){
			var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
			if($(t_id).find(".likers_list_outer").length ==0){
				t_id1=t_id.split("_").pop();
				
				$.ajax({
				url:'likes.php',
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
						$(append_div).appendTo(".main_body");
						
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
	$(".topics_list_main").one("click",".t_li_b_m_f_di",function(){
			var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
			if($(t_id).find(".likers_list_outer").length ==0){
				t_id1=t_id.split("_").pop();
				
				$.ajax({
				url:'likes.php',
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
						$(append_div).appendTo(".main_body");
						
							var append_div="<span>No one disliked yet.<br/>Be the first to like.</span>";
							
							$.each(info,function(index,val){
								append_div="";
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
	$(document).on("click",".likers_list_outer span,#splash",function(){
		
		$(".likers_list_outer").remove();
		$("#splash").click();
		});
	}
function response_to_topic(){
	$(".topics_list_outer").one("click",".t_li_b_m_f_r",function(){
		var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
		var t_id1=t_id.split("_").pop();
		if($(t_id).find(".r_text_outer").length ==0){
			var append_div="<div class='r_text_outer'><div class='r_text_inner'><textarea placeholder='Write your response..'></textarea><button onClick='submit_response()'>Done</button></div></div>";
			$(append_div).appendTo($(t_id).find(".t_li_b_m"));
		}
		});
		
	}
function submit_response(){
	$(".topics_list_outer").one("click",".r_text_outer button",function(){
		var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
		var t_id1=t_id.split("_").pop();
		var response_text=$(".r_text_outer textarea").val();
		if(response_text){
			
				$.ajax({
					url:'forum_add.php',
					method:"post",
					dataType:"text",
					data:{
						flag:"add_response",
						topic_id:t_id1,
						response_text:response_text
						},
					success:function(data){
						if(data=="updated"){
							show_responses(t_id);
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
		});
	}
function show_responses(t_id){
	var t_id1=t_id.split("_").pop();

	$(t_id).find(".r_text_outer").remove();
	if($(t_id).find(".t_li_b_m_r").length == 0){
			$.ajax({
					url:'infogiver.php',
					method:"post",
					dataType:"text",
					data:{
						flag:"show_responses",
						topic_id:t_id1
						},
					success:function(data){
						if(data){
							var info=JSON.parse(data);
							if(info[0]){
							var append_div1; 
							append_div1="<div class='t_li_b_m_r'><ul>";
								$.each(info,function(index,val){
									
										append_div1 +="<li id='res_id_"+info[index].res_id+"'>"
													+"<span><p>"+info[index].mem_name+"</p></span>"
													+"<div class='t_li_b_m_r_d'><p>"+info[index].date_of_res+"</p></div><br/>"
													+"<div class='t_li_b_m_r_m'>"
													+"<span><img src='"+info[index].mem_tumb+"'/></span></div>"
													+"<div class='t_li_b_m_r_t'><p>"+info[index].res_text+"</p></div></li>";
													
														
									});
									append_div1+="</ul></div>";
								$(append_div1).appendTo($(t_id).find(".t_li_b_m"));	
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
$(function(){
	corner_info();
	
	$(".options_icon_gif").click(function(){
		var flag=$("#hide").css("display");
		if(flag=="none"){
		$(this).css({'transform':'rotate(90deg)'});
		$("#hide").show(200);
		$("#hide1").show(200);
		}
		else{
			$(this).css({'transform':'rotate(180deg)'});
		$("#hide").hide(200);
		$("#hide1").hide(200);
			}
		});
	

	$(".search_icon_gif").on("click",function(){
		$(".searchbox_outer").fadeIn().show();
		$(".searchbox_top").focus();
		});
		$("#close_icon_gif_id").on("click",function(){
		$(".searchbox_outer").fadeOut();hide();
			});
	$(".options_icon_gif").click(function(){
		var flag_d=$("#hide").css("display");
		if(flag_d=="none"){
		$(this).css({'transform':'rotate(90deg)'});
		$("#hide").show(200);
		$("#hide1").show(200);
		}
		else{
			$(this).css({'transform':'rotate(180deg)'});
		$("#hide").hide(200);
		$("#hide1").hide(200);
			}
		});
	$("div .start_outer").one("click",".start_title p",function(){
		$(".start_title p").css({"border-bottom":"1px solid #DADADA"});
		$(".start_items").css({'margin-top':10,'display':'block'}).animate({'margin-top':0},500);
		$("#st_t").fadeIn(500);
		$("#st_g").fadeIn(800);
		$("#st_c").fadeIn(1200);
	});	
	$("#splash").click(function(){
		$(".follow_window_outer,#splash").fadeOut("slow");hide();
		close_likers_list();
	});

	});

</script>
<?php
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
		 $stmt_tumb_updater=$mysqli->prepare("SELECT `tumb_realavatar` FROM `fireconverse`.`meminfo` WHERE `ID`=$u_ID");
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
		 //-----------forum add functions
		
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
<div id="splash"></div>
<div class="page_body">
 	<div class="global_container">
    	<div class="searchbox_outer">
                    	<div class="searchbox_inner">
                        	<div class="searchbox_main">
                            	<input type="text" class="searchbox_top"  name="searchbox" placeholder="Search.." >
                                <div class="search_icon">
                                	<img src="../../mydata/pics/searc.gif" class="search_icon_gif1" id="search_icon_gif_id" >
                                    <img src="../../mydata/pics/close.gif" class="search_icon_gif1" id="close_icon_gif_id" >
                                </div>
                            </div>
                        </div>
         </div>
       <div class="banner_outer">
       		<div class="banner_inner">
            	<div class="banner_pic">
                	<img src="" class="banner_pic_img">
                </div>
                <div class="grad_pics">
                </div>
                <div class="title_container">
                	<div>
                    	<h1></h1>
                    </div>
                </div>
            </div>
       </div>  
       <div class="head_container">
       		 <div class="start_outer">
             <div class="start_inner">
                 <div class="start_title">
                      <p>Start something new..</p>
                 </div>
                 <div class="start_items">
                    <ul class="start_items_list">
                       <li id="st_t"><a>Start Topic</a></li>
                        <li id="st_g"><a href="start.php#group">Start Group</a></li>
                        <li id="st_c"><a href="start.php#corner">Start Corner</a></li>
                    </ul>
                </div>
            </div>
       </div>
       		 <div id="status_outer">
                <div id="status_body">
                    <div id="qoute_pic">
                    	<div >
                        <img class="status_quote_pic" src="../../mydata/pics/quotation-marks.gif">
                       	</div>
                        <div class="status_text">
                        	<p></p>
                        </div>
                        
                    </div>
                </div>
            <div class="rev_div">
            	<img class="status_quote_pic" id="status_quote_pic_rev" src="../../mydata/pics/quotation-marks.gif">
           </div>
        </div>
        
       </div>
       <div class="dashboard_outer">
       		<div class="dashboard_inner">
            	<p class="db_title">Dashboard</p><br/>
            	<div class="dashboard_main">
                	<div class="field" id="start_date">
                    	<p class="f_t">Created on</p>
                        <p class="f_t_v"></p>
                    </div><br/>
                    <div class="field" id="c_follow">
                    	<p class="f_t">Followers</p>
                        <p class="f_t_v"></p>
                    </div><br/>
                   <div class="field" id="c_admin">
                   		<p class="f_t">Admin</p>
                        <p class="f_t_v"></p>
                   </div><br/>
                </div>
            </div>
       </div>
       <div class="main_body">
       	 <div class="topics_list_outer">
               		<div class="topics_list_inner">
                    	<div class="topics_list">
                        	
                        </div>
                    </div>
               </div>
       </div>
    </div>
</div>
</body>
</html>