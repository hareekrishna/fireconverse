// JavaScript Document
function cornersid_in_room(room_id,fn){
	$.ajax({
		url:"infogiver.php",
		dataType:"text",
		method:"post",
		data:{
			flag:"cornersid_in_room",
			room_id:room_id
			},
		success:function(data){
			if(data=="notfound"){
			fn(data);
				}
			else if(data){	
					
			var info=JSON.parse(data);
			fn(info);
				}
			else{
				alert("Oops!Something Went Wrong");
				}
			},
		error:function(jXHR,textStatus,errorThrown){
			alert(errorThrown);
			}
		});
	}

$(function(){
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
var hover_flag=1;
function showby_anim(section_name){
		$(section_name).children().each(function(index,element){
			$(element).hide();
			setTimeout(function(){	
			$(section_name).show();
				$(element).css({"display":'none',"margin-top":40}).fadeIn(10*index).animate({"margin":10},600);
				},20*index);
			});
		}
$(function(){
	$(".search_icon_gif").on("click",function(){
		$(".searchbox_outer").fadeIn().show();
		$(".searchbox_top").focus();
		});
		$("#close_icon_gif_id").on("click",function(){
		$(".searchbox_outer").fadeOut();hide();
			});
		
		$(".room_name").hover(function(){
			if(hover_flag){
				$(this).append("<h4 class='tap_txt'>Tap to expand.</h4>");
			}

			},function(){
				$(".tap_txt").remove();
				});
		
	$(".room_name").on("click",function(){
		
		expand=$(this).parent().parent();
		expand_id=expand[0].id;
		
		expand.css({'position':'absolute',
					'z-index': '2'
					});
		expand.animate({'width':'100%'},200);
		if($(".back_outer").length==0){
			var append_div1='<div class="back_outer">'
                                    +"<button onClick='back_section()' class='back' id='back_section'>back</button>"
                               		+'</div>';
				expand.find(".footer_outer").append(append_div1);

		}	
			var room_id=parseInt(expand_id.replace("s",""));
			if(expand.find(".corner_block").length==0){
			cornersid_in_room(room_id,function(info){;	
				if(info !=""){
					var append_div='<div class="corners_list_outer">'
                                    +'<div class="corners_list_inner">'
                                    +'<div class="corners_list">'
                                    +'</div></div></div>';
		
                    expand.prepend(append_div); 
					$.each(info,function(index,val){
						var temp_pic=info[index].banner_pic;
						var temp1=temp_pic.lastIndexOf("/");
						var temp=temp_pic.slice(0,temp1+1)+"temp/temp_";
						var final_temp=temp_pic.replace(temp_pic.slice(0,temp1+1),temp);
						var append_div2="<div class='corner_block'>"
										+"<div class='corner_block_banner'>"
										+"<img src='"+final_temp+"'/>"
										+"</div>"
										+"<div class='corner_block_name'>"
										+"<a href='corner.php?cid="+info[index].corner_id+"'><p>"+info[index].corner_name+"</p></a>"
										+"</div>"
										+"<div class='corner_block_desc'>"
										+"<p>"+info[index].corner_desc+"</p>"
										+"</div></div>";
										
						$(append_div2).prependTo(expand.find(".corners_list"));
					if(parseInt(index+1) === info.length){
						showby_anim(".corners_list");
						}
					});
					}
				else{
					var append_div="<div class='section_content'>"
					+"<div class='section_content_inner'>"
					+"<h1 class='no_section'>NO CORNERS BEGAN YET</h1>"
					+"</div>";
					expand.append(append_div);
					}
				
			
		});
		hover_flag=0;
			}});
	});
function back_section(){
	$(".section_content,.home_link,.back_outer,.corners_list_outer").remove();
	hover_flag=1;
	expand.css({'position':'relative'}).animate({'z-index':'0','width':190},400);
		}
		