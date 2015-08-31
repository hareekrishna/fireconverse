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
function sign(){
	$.ajax({
		url:'infogiver.php',
		method:"post",
		dataType:"text",
		data:{
			flag:'sign'
			},
		success: function(data){	
			var f=JSON.parse(data);
			$("#status_sign_body").prepend(f[0].fonts);
			$("#status_sign").html(f[0].sign).css({'font-family':f[0].fontname});
			$("#status_sign_id").html(f[0].signid);
			}
		});
	}
function tumb(){
	$.ajax({
		url:'infogiver.php',
		method:"post",
		dataType:"text",
		data:{
			flag:'tumb'
			},
		success: function(data){	
			var f=JSON.parse(data);
			$("#avatar_navbar").attr("src",f[0].tumb);
			$("#cover_pic_main").attr("src",f[0].wrapper);
			$("#user_avatar").attr("src",f[0].tumb);
			$(".status_main").append(f[0].status);
			
			},
		 error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
			
		});
	}
function admin(){
	$.ajax({
		url:"infogiver.php",
		dataType:"json",
		method:"post",
		data:{
			flag:"admin_corner",
			mem_ID:true
			},
		success: function(data){
			if(data == "notfound"){
				alert("Oops! Something went wrong");
				}
			else{
				corners_info(data,function(info){
					$.each(info,function(index,val){
						var append_div="<div class='corner_info'>"
										+"<p class='corner_info_name'>"
										+"<a href=corner.php?cid="+parseInt(info[index].corner_id)+">"+info[index].corner_name+"</a>"
										+"</p>"
										+"<p class='corner_info_desc'>"
										+info[index].corner_desc
										+"</p>"
									    +"</div>";
						$("#corner_names").append(append_div);
						});
					});
					
				}
			
			},
		error:function(jXHR,textStatus,errorThrown){
			alert(errorThrown);
			}
		});
	}
function corners_info(corners_id,fn){
	$.ajax({
		url:"infogiver.php",
		dataType:"text",
		method:"post",
		data:{
			flag:"corner_info",
			corner_id:corners_id
			},
		success:function(data){
			var y=JSON.parse(data);
			fn(y);
			},
		error:function(jXHR,textStatus,errorThrown){
			alert(errorthrown);
			}
		});
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
				flag:'topics_list',
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
							if(info[index].corner_name){
								append_div1 +="<li class='topics_li' id='t_id_"+info[index].topic_id+"'>"
												+"<div class='t_li_h'>"
												+"<p class='t_li_h_r'>"+topic_info['room_id']+"</p>"
												+"<span class='t_li_h_d'><img src='../../mydata/pics/arrow.png' /></span>"
												+"<a href='corner.php?cid="+info[index].corner_id+"'><p class='t_li_h_c'>"+info[index].corner_name+"</p></a>"
												+"<span class='t_li_h_d'><img src='../../mydata/pics/arrow.png' /></span>"
												+"<p class='t_li_h_u'>"+topic_info['u_name']+"</p>"
												+"<p class='t_li_h_t'>"+info[index].t_date+"</p></div>";
												+"<div class='t_li_b'>";
							}
							else{
								append_div1 +="<li class='topics_li' id='t_id_"+info[index].topic_id+"'>"
												+"<div class='t_li_h'>"
												+"<p class='t_li_h_r'>"+topic_info['room_id']+"</p>"
												+"<span class='t_li_h_d'><img src='../../mydata/pics/arrow.png' /></span>"
												
												+"<p class='t_li_h_u'>"+topic_info['u_name']+"</p>"
												+"<p class='t_li_h_t'>"+info[index].t_date+"</p></div>";
												+"<div class='t_li_b'>";
								}
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
							if(info[index].auth){		  
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
						$(append_div).appendTo("#page_body");
						
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
						$(append_div).appendTo("#page_body");
						
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
						var info=JSON.parse(data);
						if(info){
							$.each(info,function(index,val){
									
										append_div1 ="<li id='res_id_"+info[index].res_id+"'>"
													+"<span><p>"+info[index].mem_name+"</p></span>"
													+"<div class='t_li_h_t'><p>"+info[index].date_of_res+"</p></div><br/>"
													+"<div class='t_li_b_m_r_m'>"
													+"<span><img src='"+info[index].mem_tumb+"'/></span></div>"
													+"<div class='t_li_b_m_r_t'><p>"+info[index].res_text+"</p></div></li>";
													
														
									});
									
									
								$(append_div1).appendTo($(t_id).find(".t_li_b_m ul"));
								$(t_id).find(".r_text_outer").remove();
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
													+"<div class='t_li_h_t'><input type='hidden' value='' id='del_res_flag'> <p>"+info[index].date_of_res+"</p></div><br/>"
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

function show_options(){
	$(document).one("click",".t_li_b_m_f_o",function(){
		
		var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
		var t_id1=t_id.split("_").pop();
		if($(t_id).find(this).find("ul").length==0){
			$(t_id).find(this).find("p").hide();
			var append_div="<ul><li onClick='edit_topic()'><p>Edit</p><li onClick='delete_topic()'><p style='color:rgb(254, 71, 71)'>Delete</p></li>";
		
			$(append_div).appendTo($(t_id).find(this));
		}
		});
	
	}
function edit_topic(){
	$(document).one("click",".t_li_b_m_f_o ul li",function(){
		if($(".t_li_b_m_c textarea,.t_li_b_m_c div").length==0){
			var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
			var t_id1=t_id.split("_").pop();
			var text=$(t_id).find(".t_li_b_m_c p").html(); 
			var text1=$(t_id).find(".t_li_b_m_t span p").html();
			$(t_id).find(".t_li_b_m_c p,.t_li_b_m_i,.t_li_b_m_t span p").fadeOut();
			$(t_id).find(".t_li_b_m_t span").animate({'margin-left':0});
			 
			
			$("<textarea ></textarea>").appendTo($(t_id).find(".t_li_b_m_c")).val(text);
			$("<textarea maxlength='100'></textarea>").appendTo($(t_id).find(".t_li_b_m_t span")).val(text1);
			
			var append_div="<div><span><button onClick='cancel_edit()'>Cancel</button><button onClick='done_edit()'>Done</button></span></div>";
			$(append_div).appendTo($(t_id).find(".t_li_b_m_c"));
		}
		
	});
	}
function delete_topic(){
	$(document).one("click",".t_li_b_m_f_o ul li",function(){
		if($(t_id).find(".notify_outer").length==0){
			var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
			var t_id1=t_id.split("_").pop();
			$("#splash").fadeIn().unbind("click");
			$(t_id).css({'z-index':99,'position':'relative'});
			
			$('html,body').animate({
				scrollTop:$(t_id).offset().top-60
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
		
		var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
		var t_id1=t_id.split("_").pop();
		$(t_id).css({'z-index':'0','position':'static'});
		$(document).find(".notify_outer").remove();
		$("#splash").fadeOut();
		
				});
}
function confirm_delete_topic(){
	$(document).one("click",".notify_outer button",function(){
		var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
		var t_id1=t_id.split("_").pop();
		var img=0;
		if($(t_id).find(".t_li_b_i img").length){
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
			success: function(data){alert(data);
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
	
	$(document).one("click",".t_li_b_m_c button",function(){
		var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
		var t_id1=t_id.split("_").pop();
		$(t_id).find(".t_li_b_m_c textarea,.t_li_b_m_c div,.t_li_b_m_t span textarea").remove();
		$(t_id).find(".t_li_b_m_c p").fadeIn();
		$(t_id).find(".t_li_b_m_t span p,.t_li_b_m_i").fadeIn();
		$(t_id).find(".t_li_b_m_t span").animate({'margin-left':40});
		
		});

	}
function done_edit(){
	$(document).one("click",".t_li_b_m_c button",function(){
		var t_id="#"+$(this).closest("li[class='topics_li']").attr("id");
		var t_id1=t_id.split("_").pop();
		
		var orig=$(t_id).find(".t_li_b_m_c p").html();
		var edit=$(t_id).find(".t_li_b_m_c textarea").val();
		
		var orig1=$(t_id).find(".t_li_b_m_t span p").html();
		var edit1=$(t_id).find(".t_li_b_m_t span textarea").val();
		
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
						$(t_id).find(".t_li_b_m_c textarea,.t_li_b_m_c div,.t_li_b_m_t textarea").remove();
						$(t_id).find(".t_li_b_m_c p").html(edit).fadeIn();
						$(t_id).find(".t_li_b_m_t span p").html(edit1).fadeIn();
						$(t_id).find(".t_li_b_m_i").fadeIn();
						$(t_id).find(".t_li_b_m_t span").animate({'margin-left':40});
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
			$(t_id).find(".t_li_b_m_c textarea,.t_li_b_m_c div,.t_li_b_m_t textarea").remove();
			$(t_id).find(".t_li_b_m_c p,.t_li_b_m_i").fadeIn();
			$(t_id).find(".t_li_b_m_t span p").fadeIn().animate({'margin-left':40});
			
			
			}
		});
	}
function no_tumb(){
	
	$(function(){
	$(".grad_pics,#cover_pic_main").hide();
	$("#cover_pic").prepend("<div id='no_tumb_main'></div>");
	});}
	
function makeNewPosition(){
    
    // Get viewport dimensions (remove the dimension of the div)
    var h = $("#cover_pic").height() - $("#cover_pic_main").height();
    var w = $("#cover_pic").width() - $("#cover_pic_main").width();
    
    var nh = Math.floor(Math.random() * h);
    var nw = Math.floor(Math.random() * w);
    
    return [nh,nw];    
    
}

function animateDiv(){
    var newq = makeNewPosition();
    var oldq = $('#cover_pic_main').offset(); 
    var speed = calcSpeed([oldq.top, oldq.left], newq);
	
	$('#cover_pic_main').animate({ top: newq[0], left: newq[1] }, 4500, function(){
      animateDiv(); 
	  });
	
	
    	
};

function calcSpeed(prev, next) {
    
    var x = Math.abs(prev[1] - next[1]);
    var y = Math.abs(prev[0] - next[0]);
    
    var greatest = x > y ? x : y;
    
    var speedModifier = 0.02;

    var speed = Math.ceil(greatest/speedModifier);

    return speed;

}
var f
var f_s=[];
var f1_s=[];
function follows(){
	$.ajax({
		url:'follow.php',
		method:"post",
		dataType:"text",
		data:{
			flag:"info"
			},
		success:function(data){
			var t=data; 
			var ta=t.split('_');
			if(ta){
				$("#followed p").html(ta[0]);
				$("#follows p").html(ta[1]);
				}
			}
		});
	}
$(function(){
	
	setTimeout(function(){animateDiv();},200);
	sign();
	tumb();
	admin();
	var configaration={
						'ID':false,
						'room':false,
						
						};
	topics_list(configaration);
	
	
	
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
		
	var expand;
	var expand_id;
	$(".search_icon_gif").on("click",function(){
		$(".searchbox_outer").fadeIn().show();
		$("#searchbox").focus();
		});
	$("#close_icon_gif_id").on("click",function(){
		$(".searchbox_outer").fadeOut();hide();
		});
			
	$(".room_name").hover(function(){
		$(this).append("<h4 class='tap_txt'>Tap to expand.</h4>");
		},function(){
			$(".tap_txt").remove(".tap_txt");
		});
	$("#status_sign").hover(function(){
		$("#status_sign_id").show();
		},function(){
			$("#status_sign_id").fadeOut(500);hide();
		});
		
	$("#edit_avatar").hover(function(){
		$(".edit_avatar_bar").show();
		},function(){
			$(".edit_avatar_bar").fadeOut(1000).hide();
		});
		
		
		//--------------------------------------------------------------follows
	follows();
	$(document).on("mouseenter",".topics_li li",function(){
		$(this).find(".t_li_h_t").prepend("<img class='c_res_op' src='../../mydata/pics/counter_respond.png' /><img class='delete_op' src='../../mydata/pics/delete.png'>");
			});
		$(document).on("mouseleave",".topics_li li",function(){
			$(this).find(".t_li_h_t .c_res_op,.t_li_h_t .delete_op").remove();
			});
		$("#view_f ,#radio_followings").click(function(){
			$("#splash").fadeIn(300).show();
			$(".follow_window_outer").fadeIn(400).show();
			$(".Fsearchbox").attr("id","followings_search");
			$(".text1 p").html("People who follows you.. ");
				$.ajax({
					url:'follow.php',
					dataType:"text",
					method:'POST',
					beforeSend:function(){
						if($(".loadgif_f").length ==0){
							$(".followings_d").append("<div class='loadgif_f'><img src='../../mydata/pics/ajax_loader.gif'></div>");
						}
						},
						
					
					data:{
						flag:"followings_list"
						},
					success:function(data){
						 
						 if(!data){
							 b="<div class='main_inner' ><p class='info'>No one is following you.</p></div>";
							 }
						else{
						f=JSON.parse(data);
						var i=0;
						var g="";
						var j=f.length;
						var b ="<div class='main_inner'>";
						for(i=0;i<j;i++){
							b +="<div class='mods' id="+f[i].auth+"_"+f[i].name.replace(' ','_')+"_"+f[i].f_status+">";
							b +="<div class='mod_avatar_outer'><img class='mod_avatar' draggable='false' src='"+f[i].avatar+"'></div>";
							b +="<div class='f_name'><h3>"+f[i].name+"</h3>";
							b +="<div class='f_info'><h5>"+f[i].followings+"</h5>";
							b +="<p> - </p>";
							b +="<h5>"+f[i].followers+"</h5></div>";
							b +="</div></div>";								
							}
						b +="</div>";
						}
						$(".followings_d").html(b);
						},
					error: function(xhr,status ,thrown){
						alert(status);
						}
					});
			
			});
			var f1;
	$(document).on("click" , "#radio_follows" ,function(){
		$(".text1 p").html("People whom you follows.. ");
		$(".Fsearchbox").attr("id","follows_search");
		$(".main_inner").fadeOut();
		$.ajax({
					url:'follow.php',
					dataType:"text",
					method:'POST',
					beforeSend:function(){
						if($(".loadgif_f").length ==0){
							$(".followings_d").append("<div class='loadgif_f'><img src='../../mydata/pics/ajax_loader.gif'></div>");
						}
						},
						
					
					data:{
						flag:"follows_list"
						},
					success:function(data){
						
						 if(!data){
							 b="<div class='main_inner1' ><p class='info'>You are following no one.</br>Get updates from people by following them.</p></div>";
							 }
						else{
						f1=JSON.parse(data);
						var i=0;
						var g="";
						var j=f1.length; 
						var b ="<div class='main_inner1'>";
						
						for(i=0;i<j;i++){
							b +="<div class='mods1' id="+f1[i].auth+"_"+f1[i].name.replace(' ','_')+"_"+">";
							b +="<div class='mod_avatar_outer'><img class='mod_avatar' draggable='false' src='"+f1[i].avatar+"'></div>";
							b +="<div class='f_name'><h3>"+f1[i].name+"</h3>";
							b +="<div class='f_info'><h5>"+f1[i].followings+"</h5>";
							b +="<p> - </p>";
							b +="<h5>"+f1[i].followers+"</h5></div>";
							b +="</div></div>";	
													
							}
						b +="</div>";
						}
						$(".followings_d").html(b);
						},
					error: function(xhr,status ,thrown){
						alert(status);
						}
					});
						
		});
	$(document).on("keyup" ,"#followings_search" ,function(){
		var f_id=$(this).attr("id");
		var v=$(".Fsearchbox").val();
		var mods=".mods";
		var main_inner=".main_inner";
		
		
		var a=[];
			if(v != ""){
			$(mods).fadeOut();
			for(var k=0;k<=f.length;k++){
				if(f[k].name.toLowerCase().indexOf(v.toLowerCase()) !=-1){
					if(!f[k].f_status){
						f[k].f_status="";
						}
					var u='#'+f[k].auth+'_'+f[k].name.replace(' ','_')+'_'+f[k].f_status;
					$(main_inner).find(u).fadeIn();
					}
				
				}
				
			
			}
			else{
				$(mods).fadeIn();
				}
			
			
		});
		
	$(document).on("keyup","#follows_search",function(){
	
		$.ajax({
			
			url:'follow.php',
			dataType:'text',
			method:'POST',
			data:{
				flag:'search_mems'
				},
			success:function(data){
				alert(data);
				}
			});
		});
		
	$(".followings_d").on('mouseenter','.mods .mod_avatar_outer',function(){
		var s_id=$(this).closest('div[class="mods"]').attr('id');
		var s=s_id.split('_');
		var t=s.length;
		if(!s[t-1]){
			$(this).append("<div class='follow_link'><p>follow</p></div>");
		}
		else{
		$(this).append("<div class='unfollow_link'><p>unfollow</p></div>");
			}
		});
	$(".followings_d").on('mouseenter','.mods1 .mod_avatar_outer',function(){
			$(this).append("<div class='unfollow_link'><p>unfollow</p></div>");
		});
	$(".followings_d").on('mouseleave','.mods .mod_avatar_outer,.mods1 .mod_avatar_outer',function(){
			$(this).find('.unfollow_link,.follow_link').remove();
			});
	$(".followings_d").on("click",".follow_link p",function(){
		var s_id=$(this).closest('div[class="mods"]').attr('id');
		var t=s_id.split("_");
		$.ajax({
			url:'follow.php',
			method:'post',
			dataType:'text',
			data:{
				Uf_ID:t[0],
				flag:"follow_me"
				},
			success: function(data){
				if(data=="updated"){  
				follows();
					$(".info").html("<p style='color:green;margin:0 0 0 0'>Done.</p>");
					
					}
				
	
				}
			});
		});
	$(".followings_d").on("click",".unfollow_link p",function(){ 
		var s_id=$(this).closest('div[class="mods1"]').attr('id');
		if(!s_id){s_id=$(this).closest('div[class="mods"]').attr('id');}
		var t=s_id.split("_"); 
		$.ajax({
			url:'follow.php',
			method:'post',
			dataType:"text",
			data:{
				Uf_ID:t[0],
				flag:"unfollow_me"
				},
			success: function(data){ 
				if(data=="updated"){
					follows();
				$(".info").html("<p style='color:green;margin:0 0 0 0'>Done.</p>");
				}
				}
			
				});
		});
	
	$("#splash").click(function(){
		$(".follow_window_outer,#splash").fadeOut("slow");hide();
		close_likers_list();
		cancel_delete_topic();
		});
	
		
	$(document).on('click', '.follows_text', function(e) {
		$("#f_text").animate({right:'+=400px' }, 500, function() { 
			$(".followed_text").css({color: '#ADABAB'});
			$(".follows_text").css({color:'#6B6B6B'});
		   });
		});
	
	$(document).on('click', '.followed_text', function() {		
		$("#f_text").animate({right:'-=400px',},400, function() {
			$(".follows_text").css({color: '#ADABAB'});
			$(".followed_text").css({color:'#6B6B6B'});
		});
	});	
	$("div .center_body").one("click",".start_title h5",function(){
		$(".bottom_line,.start_items").css({'margin-top':10,'display':'block'}).animate({'margin-top':0},500);
			$("#st_t").fadeIn(500);
			$("#st_g").fadeIn(800);
			$("#st_c").fadeIn(1200);
		});	
	$("#st_t_title").click(function(){
		$("#st_t_main,#st_splash").css({display:'block'});
		});
		//-----------response li
		
			
	});