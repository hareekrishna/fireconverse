// Quick Access @ fireconverse 

function scroller(configaration){
	var element=configaration['element'];
	var mat_par=configaration['matchingParent'];
	$(mat_par).find("li").last().animate({'padding-right':'30px'},400);
	var left=element.offset().left-$(mat_par).offset().left;	
	
	$(mat_par).animate({'scrollLeft':left+0},500);
	
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
			flag:'sign'
			},
		success: function(data){	
			var f=JSON.parse(data);
			
			var append=f[0].fonts+"<li class='navbar_list'><a href='profile.php'><h4 class='options_navbar_txt' style='font-family:"+f[0].fontname+"'>"+f[0].sign+"</h4></a></li>";
			$(append).appendTo(".options_navbar_main");
			
			}
		});
	}
$(function(){
	sign_bar();
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