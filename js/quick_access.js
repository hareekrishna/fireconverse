// Quick Access @ fireconverse 

function scroller(configaration){
	var element=configaration['element'];
	var mat_par=configaration['matchingParent'];
	$(mat_par).find("li").last().animate({'padding-right':'30px'},400);
	var left=element.offset().left-$(mat_par).offset().left;	
	
	$(mat_par).animate({'scrollLeft':left+0},500);
	
	}
function room_nav_color(room_id){
	var bg,bb;
	switch(room_id){
		case '1':
				 bg="rgba(241, 76, 76, 0.42)";
    		     bb="1px solid #DE6767";
				 break;
		case '2':
				bg="rgba(121, 239, 230, 0.43)";
				bb="1px solid #49BFBA";
				break;
		case '3':
				bg="rgba(6, 115, 111, 0.48)";
				bb="1px solid #0EADA6";
				break;
		case '4':
				bg="rgba(119, 120, 121, 0.52)";
				bb="1px solid #939696";
				break;
		case '5':
				bg='rgba(74, 71, 71, 0.56)';
				bb='1px solid #717575';
				break;
		}
	$(document).scroll(function(){
		var top=$(document).scrollTop();
			if(top>40){
				$("#navbar").css({'background-color':bg,'border-bottom':bb});
				$(".options_navbar_txt").css({'color':'#E4E4E4'});
				}
			else{
				$("#navbar").css({'background-color':'','border-bottom':''});
				$(".options_navbar_txt").css({'color':'#000'});
				}
		});
	}
function not_controller(){
	
	}
//sign
function sign_bar(){
	$.ajax({
		url:'infogiver.php',
		method:"post",
		dataType:"text",
		data:{
			flag:'navbar_info'
			},
		success: function(data){	
			var f=JSON.parse(data);
			var append="<li class='navbar_list' id='avatar_navbar_list'><a href='profile.php'><img id='avatar_navbar' src='"+f[0].tumb+"'></a> </li>";
			append+=f[0].fonts+"<li class='navbar_list'><a href='profile.php'><h4 class='options_navbar_txt' style='font-family:"+f[0].fontname+"'>"+f[0].sign+"</h4></a></li>";
			$(append).appendTo(".options_navbar_main");
			
			}
		});
	}
$(function(){
	sign_bar();
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
	$("#close_icon_gif_id").on("click",function(){
		$(".searchbox_outer").fadeOut();hide();
		});
	$(document).on("click","#quick_acces_icon",function(){
			$(this).css({'transform':'translate(30px)','opacity':0});
			$("#quick_acces_icon_a").css({'transform':'translateX(0px)rotate(180deg)','opacity':1});
			$(".quick_outer").animate({'right':0},600);
			});
		$(document).on("click","#quick_acces_icon_a",function(){
			$(this).css({'transform':'translate(-20px)rotate(0deg)','opacity':0});
			$("#quick_acces_icon").css({'transform':'translateX(0px)','opacity':1});
			$(".quick_outer").animate({'right':-300},600);
			});
	$(document).on("click",".quick_label",function(){
		var configaration={
							'element':$(this),
							'matchingParent':'.quick_top ul'
							};
		scroller(configaration);
		not_controller();
		});
	});