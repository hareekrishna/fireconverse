var flag=true;
var data;
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
			$("#layer2_field1 .l1_f_v_o,#layer2_field2 .l1_f_v_o").html(f[0].sign).css({'font-family':f[0].fontname});
			//$("#layer2_field1 .l1_f_v_o").html(f[0].signid);
			$("#layer2_field1 .l1_f_v_o,#layer2_field1 .l1_f_v_o").prepend(f[0].fonts);
			
			
				$(".fonts").prepend(f[0].sign);
			
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
			$("#user_avatar,.tumb_outer img").attr("src",f[0].tumb);
			$(".status_main,#layer1_field4 .l1_f_v").append(f[0].status);
			
			}
		});
	}
	
function fonts_loader(){
	var f,r="";
	$.ajax({
		url:'infogiver.php',
		method:'post',
		dataType:"text",
		data:{
			flag:"fonts_loader"
			},
		success:function(data){
			
			if(data){
				if($(".fonts").length ==0){
					sign();
				}
				f=JSON.parse(data);
			
					for(var i=0;i<f.length;i++){
						r +=f[i].fonts+"<li class='fonts' style='font-family:"+f[i].font_name+"'><p class='fontid'>"+f[i].font_id+"</p></li>";
					}
					$(".font_list").append(r); 
				}
			}
		});
	}


	
$(function(){
	setTimeout(function(){animateDiv();},200);
	//info giver
	sign();
	tumb();
	fonts_loader();
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
	});
var expand;
var expand_id;
$(function(){
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
});

function no_tumb(){
	
	$(function(){
	$(".grad_pics,#cover_pic_main").hide();
	$("#cover_pic").prepend("<div id='no_tumb_main'><p id='no_tumb_txt'>Keep A Wrapper Here..</p></div>");
	$("#no_tumb_txt").click(function(){
		$("#wrrpr_ch_txt").click();
		});
	});
	}	



function animateDiv(){
	 var h = $("#cover_pic_main").height() - $("#cover_pic").height();
    var w = $("#cover_pic_main").width() - $("#cover_pic").width();
    
    var nh = -Math.abs(Math.floor(Math.random(0,300) * h));
    var nw = -Math.abs(Math.floor(Math.random(0,300) * w));
    
    var newq=[nh,nw];   
    $('#cover_pic_main').animate({ top: newq[0], left: newq[1] }, 4500, function(){
      animateDiv();        
    });
	
}
function delete_av(){
	$.ajax({
		url:'edit_avatar_infolayer.php',
		dataType:"text",
		method:'post',
		data:{
			flag:'delete_av'
			},
		success: function(data){
			if(data=="deleted"){
				
				}
			else{
				alert("Oops! Something have went wrong.Please try again.");
				}
			},
		error:function(jXHR,textStatus,errorThrown){
			alert(errorThrown);
			}
		});
	}

$(function(){
	$(".pic_selection_text").click(function(){
		$("#file").click();
		});	
	$("#file").change(function(){
		data=$('#file').val();
		$("#upload").ajaxForm({}).submit();
		});

	$("#wrrpr_ch_txt").click(function(){
		$("#file_w").click();
		});	
	$("#file_w").change(function(){
		data=$('#file_w').val();
		$("#upload_w").ajaxForm({
		}).submit();
		});
});
$(function(){
	$("#splash").click(function(){
		$(".change_avatar_window").fadeOut(500).hide();
		$("#splash").fadeOut(800).hide();
		});
	});
$(function(){
	$("#edit_avatar_text").hover(function(){
		$(this).css({color:'#000'});
			},function(){
		$(this).css({color:'rgba(105, 102, 102, 0.95)'});
		});
	});
function slidedown(){
		var f="90px";
		if($("#edit_user_avatar_outer").height()==90){
			f="26px";
			}
		$("#edit_user_avatar_outer").animate({height:f},350);
		
	}

$(function(){
	$("#edit_avatar_text").click(function(){
		$("#avatar_ch_txt").toggle().animate({marginTop:'-7px'});
		$("#wrrpr_ch_txt").toggle();
	$("#avatar_ch_txt").hover(function(){
		$("#avatar_ch").css({backgroundColor:'rgba(176, 176, 176, 0.54)'});
		$("#user_avatary").css({opacity:'.85'});
		},function(){
			$("#avatar_ch").css({backgroundColor:"transparent"});
			$("#user_avatary").css({opacity:'1'});
		});
	
	});
	$("#wrrpr_ch_txt").hover(function(){
		$("#wrrpr_ch").css({backgroundColor:'rgba(176, 176, 176, 0.54)'});
		$("#cover_pic").css({opacity:'.85'});
		},function(){$("#wrrpr_ch").css({backgroundColor:"transparent"});
		$("#cover_pic").css({opacity:'1'});
		});
	
	
	
	});		
		
		


	$(function(){
		
	$("#history").hover(function(){
		$(".history_bar").show();
		},function(){
			$(".history_bar").fadeOut(1000);hide();
			});
	});
	/*var data=$("#file").val();
	document.write(data[0].files[0].size);*/
/* layers----------------------- */
$(function(){
	var u_name_changing;
	var u_name_changing1;
	
	var u_name_changed;
	var u_name_original;
	$(".editlayer_txt").on("click",function(){
		var id = '#'+$(this).closest('div[class="layer"]').attr('id');
		if($(id).find(".editlayer_txt").html()=="Edit"){
		$(id).find(".editlayer_txt").html("Done").css({'color':'red'});
		$(id).find(".edit_gray_o,.select_public").fadeIn();
		}
		else{
		$(id).find(".editlayer_txt").html("Edit").css({'color':'inherit'});
		
		$(id).find(".edit_gray_o ,.country_select,.l1_f_bttn0,.textarea_outer, .l1_f_info , .font_list, #layer2_field3,.select_public").hide();
		$(id).find(".l1_f_v_o,.public_type0").fadeIn();
		$(id).animate({'min-height':170},300);
			}
		});
		
	$("div .layer_field").on("click",".edit_gray",function(){
		var layerfield_id = '#'+$(this).closest('div[class="layer_field"]').attr('id');
			$(layerfield_id).find(".edit_gray_o,.l1_f_v_o,.public_type0").hide();
			$(layerfield_id).find(".textarea_outer,.l1_f_info, .l1_f_bttn0").fadeIn();
			});
		
	/*$("div .layer_field").on("click","#edit_gray_name",function(){
	    u_name_original=$(".l1_f_v").html();
	});*/
	
	$(".layer_field").on("click",".l1_f_bttn",function(){
		var layerfield_id = '#'+$(this).closest('div[class="layer_field"]').attr('id');
		$(layerfield_id).find(".l1_f_bttn0 ,.textarea_outer, .l1_f_info ").hide();
		$(layerfield_id).find(".l1_f_v_o , .edit_gray_o").fadeIn();
	});
	$("#layer1_field1 .l1_f_txtarea").keyup(function(){
		var u1=$("#u1").val();
		var u2=$("#u2").val();
		
		 u_name_changing=u1+" " + u2;

		 if(u_name_changing.match(/[^a-zA-Z ]/g)){
			$(".l1_f_infotext").html("Only Alphabets are allowed.").css({'color':'red'});
			 }
		 else{
			 var t=u_name_changing.length;
			 if(t<5 || t >16){
			$(".l1_f_infotext").html('Name should contain 5-16 charecters.').css({'color':'red'});
			}
			else{
				u_name_changed=u_name_changing; 	
				$(".l1_f_infotext").html('Name should contain 5-16 charecters.').css({'color':'#6F6F6F'});
				}
			 }
		
		});
	
	$("div .layer_field").on("click","#done_name",function(){
		 var t=u_name_changed.length;
			$.ajax({
				
				url:'edit_avatar_infolayer.php',
				method:'post',
				dataType:'text',
				data:{
				uname_changed:u_name_changed,
					},
				
				success:function(data){
					if(data=='updated'){ 
						$("#layer1_field1 .l1_f_v").html(u_name_changed);
						}
					else{
						$("#layer1_field1 .l1_f_v").html(u_name_original);
						alert('Oops! your name cannot be updated.Try after sometime.');
							}
					}
				
				
				});
		
		
       	
		});
	$("div .layer_field").on("click", "#edit_gray_country", function(){
		var s=$("#layer1_field2");
		var c=s.find(".l1_f_v").html();
		if(c=="Not updated yet"){
			c="Afghanistan";
			}
		$(".country_select").val(c); 
		});
	$("div .layer_field").on("click","#done_country" , function(){
		var s=$("#layer1_field2");
		var c=$("#country_select").val();
		if(c==""){
			c="Not updated yet";
			s.find(".l1_f_v").html(c).css({'color':'#BDBDBD'});
			
			}
		else{
			$.ajax({
				url:'edit_avatar_infolayer.php',
				method:'post',
				dataType:'text',
				data:{
					country_changed:c,
					},
				success:function(data){
					if(data=="updated"){
					s.find(".l1_f_v").html(c).css({'color':'inherit'});
					}
					else{
						alert("Oops! Something went wrong,Please try again.");
						s.find(".l1_f_v").html("Not updated yet").css({'color':'#BDBDBD'});

						}
					}
				});
			
			
			}
		});
	$("div .layer_field").on("click","#done_status",function(){
		var s=$("#layer1_field4");
		var c=$("#status_box").val();
		if(c!=""){
			$.ajax({
				url:'edit_avatar_infolayer.php',
				method:'post',
				dataType:'text',
				data:{
					status_changed:c,
					},
				success: function(data){
					if(data=="updated"){
						s.find(".status_txt").html(c).css({'color':'#inherit'});
						}
					else{
						alert("Oops! Something went wrong,Please try again. ");
						}
					}
				});
			
		
		}
		
		});
	
	$("div .layer_field").on("click","#done_sign",function(){
		var id=$("#layer2_field1");	
		var c =$("#signbox").val();
		if(c.length<=7 && c!=0){
			$.ajax({
				url:'edit_avatar_infolayer.php',
				method:'post',
				dataType:'text',
				data:{
					sign_changed:c,
					},
				success: function(data){
					if(data=="updated"){
						id.find(".l1_f_v").html(c);
						$("#layer2_field2").find(".l1_f_v").html(c);
						}
					else{
						alert("Oops! Something went wrong,Please try again. ");
						}
					}
				});
			}
		
		

		});
		

		$("div .layer_field").on("click","#edit_gray_font",function(){ 
		$("#layer2").animate({'min-height':530},300);
			$("#layer2_field2 .l1_f_v").css({'font-family':'inherit'});
			$(".edit_gray_o").hide();
			$("#layer2_field3,.font_list").fadeIn();
			$("#layer2_field3").find(".l1_f_info , .fontbox_outer,.l1_f_bttn0").show();
			$("#layer2_field3 .l1_f_bttn0").hide();
			});
		$("div .layer_field").on("mouseenter",".fonts",function(){ 
			
			$(this).find(".fontid").show();
			$(this).css({'background-color':'#EAEAEA'});
			});
		$("div .layer_field").on("mouseleave",".fonts",function(){ 
				$(this).find(".fontid").hide();
				$(this).css({'background-color':'inherit'});

				});
		$("div .layer_field").on("click",".fonts",function(){ 
			var fontid=$(this).find(".fontid").html();
			var fontname=$(this).css('font-family');
			
			$.ajax({
				url:'edit_avatar_infolayer.php',
				method:'POST',
				dataType:'text',
				data:{
					font_changed:fontid,
					},
				success:function(data){
					if(data=="updated"){
					   $(".editlayer_txt").click();
						$("#layer2_field2 .l1_f_v").css({'font-family':fontname});
						$("#layer2_field3").hide();	
						}
						else{
						alert("Oops! Something went wrong,Please try again. ");
				}
					}
					
				});
			
			
			});
			var d;
		
		$("#done_fonts").on("click",function(){
			var c=$(".font_loaded").attr('id');
			var f=$(".font_loaded").css('font-family');
			$.ajax({
				url:'edit_avatar_infolayer.php',
				method:'post',
				dataType:'text',
				data:{
					font_changed:c,
					U_ID:globalVar
					},
				success:function(data){
					if(data=="updated"){
						$(".edit_gray_o").fadeIn();
						$("#layer2_field3").hide();
						$(".editlayer_txt").click();
						$("#layer2_field2 .l1_f_v").css({'font-family':f});
						
						}
					else{
						alert("Oops! Something went wrong,Please try again. ");
						}
					}
				});
			});
				var privacy;
				$("div .layer_field").on("change",".privacy",function(){
					if($("#layer3_field1 #public").prop("checked")==true){
							privacy=0;
						}
					if($("#layer3_field1 #private").prop("checked")==true){
							privacy=1;
						}	
					$.ajax({
						url:'edit_avatar_infolayer.php',
						method:'POST',
						dataType:'text',
						data:{
							privacy_email_changed:privacy,
							U_ID:globalVar
							},
						success: function(data){
							if(data=="updated"){
								if(privacy==1)
								$("#layer3_field1 .public_type_text").html("PRIVATE");
								if(privacy==0)
								$("#layer3_field1 .public_type_text").html("PUBLIC");
								}	
							else{
						alert("Oops! Something went wrong,Please try again. ");
								}				
							}
						});				
					});

		
		$("div .layer_field").on("click","#done_email",function(){
			var email_check = $("#emailbox").val();
			if(email_check){
					var atpos = email_check.indexOf("@");
					var dotpos = email_check.lastIndexOf(".");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email_check.length) {
						$("#layer3_field1 .l1_f_infotext").html("Invalid E-mail address").fadeIn().css({'color':'red'});
			  
					}
					else{
						$("#layer3_field1 .l1_f_infotext").html("").hide();
						$.ajax({
							url:'edit_avatar_infolayer.php',
							dataType:'text',
							method:'post',
							data:{
								email_changed:email_check,
								U_ID:globalVar
								},
							success: function(data){
								if(data=="updated"){
									$("#layer3_field1 .l1_f_v").html(email_check);
									}
								else{
									alert("Oops! Something went wrong,Please try again. ");
									}
								}
							});
					}
				}
			});
			$("div #layer3_field1").on("change",".privacy",function(){
					if($("#layer3_field1 #public").prop("checked")==true){
							privacy=0;
						}
					if($("#layer3_field1 #private").prop("checked")==true){
							privacy=1;
						}	
					$.ajax({
						url:'edit_avatar_infolayer.php',
						method:'POST',
						dataType:'text',
						data:{
							privacy_email_changed:privacy,
							},
						success: function(data){
							if(data=="updated"){
								if(privacy==1)
								$("#layer3_field1 .public_type_text").html("PRIVATE");
								if(privacy==0)
								$("#layer3_field1 .public_type_text").html("PUBLIC");
								}	
							else{
						alert("Oops! Something went wrong,Please try again. ");
								}				
							}
						});				
					});
					var privacym;
			$("div #layer3_field2").on("change",".privacy",function(){
					if($("#layer3_field2 #public_m").prop("checked")==true){
							privacym=0;
						}
					if($("#layer3_field2 #private_m").prop("checked")==true){
							privacym=1;
						}	
					$.ajax({
						url:'edit_avatar_infolayer.php',
						method:'POST',
						dataType:'text',
						data:{
							privacy_mobileno_changed:privacym,
							},
						success: function(data){
							if(data=="updated"){
								if(privacym==1)
								$("#layer3_field2 .public_type_text").html("PRIVATE");
								if(privacym==0)
								$("#layer3_field2 .public_type_text").html("PUBLIC");
								}	
							else{
						alert("Oops! Something went wrong,Please try again. ");
								}				
							}
						});				
					});
			var mobileno;
			$("div .layer_field").on("click","#done_mobile",function(){
				mobileno=$("#mobilebox").val();
				if(/^\d+$/.test(mobileno)){
					if(mobileno.length<=15){
					$.ajax({
						url:'edit_avatar_infolayer.php',
						type:'POST',
						dataType:'text',
						data:{
							mobileno_changed:mobileno,
							},
						success: function(data){
							if(data=='updated'){
								$("#layer3_field2 .l1_f_v").html(mobileno);
								}
							else{
						alert("Oops! Something went wrong,Please try again. ");
								}
							}
						});
					}
					else{
					$("#layer3_field2 .l1_f_info p").html("Only numbers are allowed.");
					}
				}
				else{
					$("#layer3_field2 .l1_f_info p").html("Only 15 numbers allowed").fadeIn();
					}
				});
	$("div .layer_field").on("keyup","#fontbox",function(){
			var t=$("#layer2_field2 .l1_f_v_o").html();
			font_search(t);
		});
	}); var d;
function font_search(d){ 
			var c=$("#fontbox").val();
			if(c.length>0){
			if(c>=0 && c<65){
					
				$(".layer2_field3").find(".l1_f_infotext").html("Hover on any style to know its Style-Id").css({'color':'inherit'});
				$.ajax({
					url:'edit_avatar_infolayer.php',
					method:'post',
					dataType:'text',
					data:{
						font_search:c,
						S_name:d
					},
					success: function(data){
						$(".font_loaded_outer").fadeIn().html(data);
						$("#layer2_field3 .l1_f_bttn0").fadeIn();
						}
					
					});
				}
			else{
				$("#layer2_field3").find(".l1_f_infotext").html("Invalid Id").css({'color':'red'});
				}
			}
			else{
				$(".font_loaded_outer,#layer2_field3 .l1_f_bttn0 ").hide();
				}
			}


/*-----------------------functions-*/

$(function(){
	
$("#avatar_ch_txt").click(function(){
	$(".change_avatar_window").fadeIn().show();
	$("#splash").fadeIn(300).show();
	});		
$("#previous").click(function(){
	$("#previous").css({color:'#181818'});	
	$("#resize_pic,#remove_avatar").css({color:'#828282'});
	$(".cont_av,.prev_cont_av").show();
	$(".crop_div_outer,.remove_av_outer").hide();

		
});
$("#resize_pic").click(function(){
		$("#previous,#remove_avatar").css({color:'#828282'});	
		$("#resize_pic").css({color:'#181818'});
		$(".cont_av,.crop_div_outer").show();
		$(".prev_cont_av,.remove_av_outer").hide();
		var tumb_src=$(".tumb_inner img").attr("src");
		var t=tumb_src.replace("tumb","");
		$(".crop_div_image img").attr("src",t);
		setTimeout(function(){
			$(".crop_box").draggable({containment:"parent"});
			var w=$(".crop_div_image img").height();
			$(".crop_box").width(w*0.8136).height(w*0.9);
			$(".crop_div_image").width(w).height(h);
		},200);
		
	});
$(".crop_done_button button").on("click",function(){
				var settings ={};
				var loc="../../data/userprofile/avatar/temp/";
				settings={
					'location':loc,
					'top':$(".crop_box").position().top,
					'left':$(".crop_box").position().left,
					'width':$(".crop_box").width(),
					'height':$(".crop_box").height(),
					'imgSrc':$(".crop_div_image img").attr("src"),
					'imgWidth':$(".crop_div_image img").width(),
					'imgHeight':$(".crop_div_image img").height()
					
					};
					$.ajax({
						url:'cropper.php',
						type:"POST",
						cache:false,
						data:{settings:settings},
						success:function(data){alert(data);
							temp_location=data;
							
							if(temp_location != false){
								
								 $.ajax({
									url :'edit_avatar_infolayer.php',
									method: "POST",
									dataType:"text",
									
									data:{
										temp_location:temp_location
										},
									success: function(data){
									var data1=JSON.parse(data);
									
									flag=1;
									if(data !=''){
										if(data1[0].updated=="true")
										{	var d=new Date();
											$("#user_avatar,#avatar_navbar").attr("src",data1[0].location+"?"+d.getTime());
											
											}
										else{
											alert("Oops!Something error occurred,please try again later.");
											}
									}
									else{
										alert("Oops!Something error occurred,please try again later.");
										}	
										
									
									},
									error: function (jXHR, textStatus, errorThrown) {
										alert(errorThrown);
									}
								});
							}
						},
						error:function(jXHR,textStatus,errorThrown){
							alert(errorThrown);
							}
							
						});
				
				});
       
$("#remove_avatar").click(function(){
		$("#previous,#resize_pic").css({color:'#828282'});	
		$("#remove_avatar").css({color:'#181818'});
		$(".cont_av,.remove_av_outer").show();
		$(".prev_cont_av,.crop_div_outer").hide();
	});
	$(document).on("click", ".prevs", function (ev) {
	var addr=$(this).attr("src");
	if(addr){
		 $.ajax({
		 url:'previous.php',
		 type:'post',
		 dataType:"text",
		 data:{
			 address:addr                                    
				
		 },
		 success: function(data){
					$(".ul_cont_av").html(data);
				}
		 
		 });
		}
	});

	});


var userid,username;
function fn_previous(userid, username){
	 $.ajax({
		 url:'infogiver.php',
		 type:'post',
		 dataType:"text",
		 data:{
			 flag:"previous_tumbs"
		 },
		 success: function(data){
			if((data.trim()) && (data.trim() !="no_prev")){
				$(".ul_cont_av").append(data);
			 }
			 else{
				$(".ul_cont_av").prepend("<p id='no_prev'>you have no previous avatars..</br>tap 'choose avatar' to keep one..</p>");
				 }
			}
		 
		 });
			
}
	
/* -------crop function ---*/

