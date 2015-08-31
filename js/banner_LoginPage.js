//banner_LoginPage

$(function(){
	$("#l").click(function(){
		$("#u").css({ }).focus();
		
		});
	$("#s").on("click",function(){
		var margin_flag =  $("#s").css('margin-left');
		if(margin_flag != '200px'){
		$("#info_outer p").animate({'opacity':.5},250);
		$("#signup_outer").fadeIn().show();
		$("#signup_inner").animate({'margin-top': '85px','height': '122px'},500,function(){
			
			$("#s").css({'position': 'absolute','background-color':'green','color':'#fff'}).animate({
							'z-index': '1',
							'margin-left': '200'},300,function(){
					
					$("#s").animate({'width': '250px',},400,function(){
						$("#signup_outer").animate({'margin-top':'-222px'},300);
						$("#signup_inner").animate({'margin-top':0,'height': '415px'},300);
						$("#signup_body").fadeIn("slow").show();
						
						});
					
				});
		
			});
		}
		else{
			var email_check =$("#e").val();
			if(email_check){
					var atpos = email_check.indexOf("@");
					var dotpos = email_check.lastIndexOf(".");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email_check.length) {
					   email_check_flag=false;
			  
					}
					else{
						 email_check_flag=true;
					}
				}
			var gender_check = document.forms["signup_LoginPage"]["s_gender"].value;
			if(gender_check){
				gender_check_flag=true;
				}
			else{
				gender_check_flag=false;
				}
			if(name_check_flag==true && password_check_flag==true && repassword_check_flag==true && email_check_flag==true && gender_check_flag==true){
				$("#submit_hidden").click();
			}
			else{
				$("#s_txt").html('Provide details as required.').animate({marginTop:'-=1px'},100,function(){$("#s_txt").animate({marginTop:'+=1px'},50);}).css({'font-size':'12px','color':'red'});

				}
			if( email_check_flag==false){
						$("#s_txt").html('E-mail address is not valid.').animate({marginTop:'-=1px'},100,function(){$("#s_txt").animate({marginTop:'+=1px'},50);}).css({'font-size':'12px','color':'red'});
				}
			}
			
			
	});
		
	
	
	})
//functions
var name_check_flag;
var password_check_flag;
var repassword_check_flag;
var email_check_flag;
var gender_check_flag;
$(function(){
	$("#formlogin").submit(function(event){
	var emailLength=$("#u").val().length;
	var passwordLength=$("#password_login").val().length;
	if(emailLength===0 || passwordLength===0){
	event.preventDefault();
		}
	});
});
function re(){
alert("A");
$('#navbar').css({'background-color':'rgba(255, 0, 0, 0.26)'});
}
function name_check(){
	var u1_length;
	var u1_length=$("#u1").val().length;
	var u2_length=$("#u2").val().length;
	var total_length=u1_length+u2_length;
	if(total_length>16 || total_length<5){

		$("#s_txt").html('Name should be between 5-16 letters.').css({'font-size':'12px','color':'red'});
		name_check_flag=false;
		}		
	
	else {
		$("#s_txt").html("It's simplier than you think.!").css({'font-size':'inherit','color':'inherit'});
		 name_check_flag=true;
		}
	
}
 function password_check(){
	 	var s_repassword=$("#s_repassword").val();
		var s_password=$("#s_password").val();
		if(s_repassword.length>0){
			if(s_repassword !=s_password){
				$("#s_txt").html('Passwords do not match.').css({'font-size':'12px','color':'red'});
				repassword_check_flag=false;
				}
			else{
				$("#s_txt").html("It's simplier than you think.!").css({'font-size':'inherit','color':'inherit'});
				repassword_check_flag=true;

			}
			}
		else{
	 	var s_password=$("#s_password").val().length;
		if(s_password>16 || s_password<8){
		$("#s_txt").html('Password should be between 8-16 letters.').css({'font-size':'12px','color':'red'});
		password_check_flag=false;
				}

		else{
		$("#s_txt").html("It's simplier than you think.!").css({'font-size':'inherit','color':'inherit'});
		 password_check_flag=true;
			
			}
		}
	 }
function repassword_check(){
	
	var s_repassword=$("#s_repassword").val();
	var s_password_check=$("#s_password").val();
	if(s_repassword==s_password_check){
		
		$("#s_txt").html("It's simplier than you think.!").css({'font-size':'inherit','color':'inherit'});
		repassword_check_flag=true;
		}
	else
		{
		$("#s_txt").html('Passwords do not match.').css({'font-size':'12px','color':'red'});
		repassword_check_flag=false;
	}
	}
function email_check(){
	  var x =$("#e").val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
       email_check_flag=false;
    }
	else{
		 email_check_flag=true;
		}
	}