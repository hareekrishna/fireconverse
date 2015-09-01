<?PHP

include("secure_session.php");
sec_session_start();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Fire Converse Log-In</title>
<script src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="form.js"></script>
<link href="../../css/banner_LoginPage_desktop.css" rel="stylesheet" type="text/css">
<style>
html,body{
	font-family:Verdana, Geneva, sans-serif;
	margin: 0 0 0 0;
	overflow-y:hidden;
	overflow-x:auto;
	width: 100%;
    height: 100%;
    margin: 0px;
    padding: 0px;
	}
::-webkit-input-placeholder {
   color: rgba(150,150,150,1);
}

:-moz-placeholder { /* Firefox 18- */
   color: rgba(150,150,150,1);
}

::-moz-placeholder {  /* Firefox 19+ */
   color: rgba(150,150,150,1);
}

:-ms-input-placeholder {  
   color: rgba(150,150,150,1);
}
#navbar{
	z-index:3;
	top:0;
	left:0;
position:absolute;
	width:1366px;
	height:40px;
	background-position:top;
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwMDAwMDAiIHN0b3Atb3BhY2l0eT0iMC4xNyIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(255,255,255,0) 0%, rgba(0,0,0,0.17) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0)), color-stop(100%,rgba(0,0,0,0.17)));
background: -webkit-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.17) 100%);
background: -o-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.17) 100%);
background: -ms-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.17) 100%);
background: linear-gradient(to bottom,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.17) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#2b000000',GradientType=0 );
box-shadow:1px 1px 13px 3px rgba(20, 20, 20, 0.47);
-moz-box-shadow:1px 1px 13px 3px rgba(20, 20, 20, 0.47);
-webkit-box-shadow:1px 1px 13px 3px rgba(20, 20, 20, 0.47);
z-index:29px;
}
@keyframes f{
from{
	background-color:rgba(255,0,0,0.05);
	-webkit-box-shadow:1px 1px 1px 0px rgba(255, 0, 0, 0.09);}
to{ background-color:rgba(255,0,0,0.2);
	-webkit-box-shadow:1px 1px 1px 0px rgba(255, 0, 0, 0.27);}

	}
@keyframes error{
	from{
		transform:translateX(30px);
		}
	to{
		transform:translateX(-30px);
		}
	}
.fc_navbar{
	display: inline-block;
float: left;
	}
#fc_logo{
	
float:left;	
margin-right:40px;
margin-left: 40px;
margin-top: 6px;
	}
#error{
	transform-style:preserve-3d;
	transition: error 2s infinite;
	
	display:none;
	width:360px;
	color:#D4CFCF;
	height:100%;
	margin:0 0 0 0;
	position:absolute;
	left:340px;
	text-align:center;
	background-color: rgba(138, 9, 9, 0.56);
    border-right: 1px solid rgba(255, 0, 0, 0.38);
    border-left: 1px solid rgba(255, 0, 0, 0.38);
	
	}
#error_text{
	margin:10px;
	}
#global_container{
	width:1366px;
	height:698px;
	overflow-y:hidden;
	}
#main_container_outer{
	
	overflow-x:auto;
	
	}
.form_page_outer{
	display:inline-block;
	position: relative;
left: 425px;
top: 7px;
	}
#form_inner p{
	margin:0 0 0 0;
	}
#form_body{

	}
.text_field{
	border:none;
	height: 23px;
width: 200px;
color:rgba(66,66,66,1);
background-color:rgba(255, 255, 255, 0.5);
padding-left:5px;
	}
.button_small{
	border:1px solid #818181;
	background-color:rgba(0, 0, 0, 0.07);
	height:26px;
	width:70px;
	color:#EAEAEA;
	}
.button_small:hover{
	animation-delay:3s;	
background: rgb(64,150,238);
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzQwOTZlZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM0MDk2ZWUiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(64,150,238,1) 0%, rgba(64,150,238,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(64,150,238,1)), color-stop(100%,rgba(64,150,238,1)));
background: -webkit-linear-gradient(top,  rgba(64,150,238,1) 0%,rgba(64,150,238,1) 100%);
background: -o-linear-gradient(top,  rgba(64,150,238,1) 0%,rgba(64,150,238,1) 100%);
background: -ms-linear-gradient(top,  rgba(64,150,238,1) 0%,rgba(64,150,238,1) 100%);
background: linear-gradient(to bottom,  rgba(64,150,238,1) 0%,rgba(64,150,238,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4096ee', endColorstr='#4096ee',GradientType=0 );
	color:#fff;
	
	}

.grad{
background: -moz-linear-gradient(top,  rgba(255,255,255,0) 0%, rgba(0,0,0,0.45) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0)), color-stop(100%,rgba(0,0,0,0.45)));
background: -webkit-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.45) 100%);
background: -o-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.45) 100%);
background: -ms-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.45) 100%);
background: linear-gradient(to bottom,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.45) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#73000000',GradientType=0 );

	}
#banner_slide_outer{
	position:absolute;
	float:left;
	overflow-x:auto;
	}
	
#wrpp{
	margin-top: 400px;
	position:absolute;
	width:1366px;
	}
#info_outer{
	float:left;
position:absolute;
width:890px;
	font-size: 48px;
color: #fff;
text-shadow: 1px 1px 1px #000;
margin-left: 56px;


}
#info_outer p{
	margin:0 0 0 0;
	display:inline-block; word-break: nowrap;

	
	}
.explore_txt{}
.or_txt{
	font-size:40px;
	}
.button_big{
width: 110px;
height: 40px;
background-color: rgba(255,255,255,.3);
border: 1px solid #776E6E;	
position:relative;
bottom:10px;
}

#s:hover{
	background-color:green;
	color:#fff;
	
	}
#l:hover{
background: rgb(64,150,238);
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzQwOTZlZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM0MDk2ZWUiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(64,150,238,1) 0%, rgba(64,150,238,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(64,150,238,1)), color-stop(100%,rgba(64,150,238,1)));
background: -webkit-linear-gradient(top,  rgba(64,150,238,1) 0%,rgba(64,150,238,1) 100%);
background: -o-linear-gradient(top,  rgba(64,150,238,1) 0%,rgba(64,150,238,1) 100%);
background: -ms-linear-gradient(top,  rgba(64,150,238,1) 0%,rgba(64,150,238,1) 100%);
background: linear-gradient(to bottom,  rgba(64,150,238,1) 0%,rgba(64,150,238,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4096ee', endColorstr='#4096ee',GradientType=0 );

		color:#fff;

	}
#g:hover{
background: rgb(255,48,25);
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmMzAxOSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNjZjA0MDQiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(255,48,25,1) 0%, rgba(207,4,4,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,48,25,1)), color-stop(100%,rgba(207,4,4,1)));
background: -webkit-linear-gradient(top,  rgba(255,48,25,1) 0%,rgba(207,4,4,1) 100%);
background: -o-linear-gradient(top,  rgba(255,48,25,1) 0%,rgba(207,4,4,1) 100%);
background: -ms-linear-gradient(top,  rgba(255,48,25,1) 0%,rgba(207,4,4,1) 100%);
background: linear-gradient(to bottom,  rgba(255,48,25,1) 0%,rgba(207,4,4,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff3019', endColorstr='#cf0404',GradientType=0 );
		color:#fff;
	}
#signup_outer{
	display:inline-block;
	float:right;
	width:330px;
	display:none;
padding-right: 70px;	}
#signup_inner{
	opacity:.9;
	background-color:#fff;
	box-shadow:0px 0px 10px 0px #202020;
	
	}
#signup_body{
	display:none;
	padding: 0 18px 0 18px;
	}
#signup_LoginPage_id{
	margin: 0 37px 0px 37px;
	}
#s_txt{
margin: 0px;
color: #000;
padding: 18px;
text-align:center;	}
.s_textfield{
	padding: 4px 53px 7px 9px;
margin-bottom: 15px;
border: 1px solid rgba(216, 204, 204, 1);	
	
	}
.s_radio_body{
color: #4B4949;
padding-left: 10px;	
font-size:15px;
}
</style>
<!-------------------------js part begins------->
<script>
$(function(){
	var url_info=getURLparams(window.location.search); 
	if(url_info['auth']=='failed') $("#error").css({'display':'block'});
	$("#l").click(function(){px
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
			
			
			
			if(name_check_flag==true && password_check_flag==true && repassword_check_flag==true && email_check_flag==true && gender_check_flag==true  ){
				email_check =$("#e").val();
				$.ajax({
				
				url:'email_checker.php',
				type:'POST',
				dataType:"text",
				data:{
					email:email_check
					},
				success:function(response){
					if(response=="yes"){
						
						$("#submit_hidden").click();
						
						}
					else{
						
						
						}
					}
			
				});
				
				
				
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
function getURLparams(URL){
	var queryStart=URL.indexOf("?")+1,
		queryEnd=URL.indexOf("#")+1 || URL.length+1,
		query=URL.slice(queryStart,queryEnd-1),
		pairs=query.replace(/\+/g,"").split("&"),
		params={},
		n,v,
		nv,i;
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
function re(){
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
</script>
</head>

<body>

<?PHP
/*---signup form---*/
$name="";
$L2="";
$email="";
$error_messege="";
$male_status = 'unchecked';
$female_status = 'unchecked';
$first_name="";
$last_name="";
$password="";
$renterpassword="";
$gender="";
$s_email="";
$s_errorMessage="";
$error_on_password="";
$date= date('l jS F Y h:i:s a');

$date_of_benow=$date;
require_once ("csign.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (isset($_POST['Submit1'],$_POST['first_name'],$_POST['last_name'],$_POST['s_password'],$_POST['s_repassword'],$_POST['s_email'], $_POST['s_gender']))
	 {
		if($_SESSION['resubmit_flag'] == $_POST['resubmit_flag'])
		{
			$gender = $_POST['s_gender'];	
		    if ($gender == 'male')
			 {
			$male_status = 'checked';
    		 }
		else if ($gender == 'female')
		    {
			$female_status = 'checked';
		    }
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$s_password=$_POST['s_password'];
$s_email=$_POST['s_email'];
$name=$first_name." ".$last_name;
$mobileno=NULL;
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
$password = hash('sha512', $s_password.$random_salt);
$privacy='0_0';
  if($email_check=$mysqli->prepare("SELECT `email` FROM members WHERE email= '".$s_email."'"))
	{
		$email_check->execute();
		if($email_check->num_rows>0)
		{
			$s_errorMessage="The Email Adress You Provided Is Already Taken..!";
		}
	   else
	    {  
	     if($insert_stmt = $mysqli->prepare("INSERT INTO `fireconverse`.`members` (`name`, `L2`, `salt`, `date_of_benow`, `email`, `gender`, `mobileno`, `privacy`) VALUES (?,?,?,?,?,?,?,?)") )
		     {     	
				$insert_stmt->bind_param('sssssiss', $name, $password, $random_salt,$date_of_benow,$s_email,$gender,$mobileno,$privacy);   
		        unset( $_POST['Submit1'],$_POST['first_name'],$_POST['last_name'],$_POST['s_password'],$_POST['s_repassword'],$_POST['s_email']);
	            if($insert_stmt->execute())
	             {
		          if($stmt = $mysqli->prepare("SELECT ID,name, L2, salt FROM `fireconverse`.`members` WHERE email = '$s_email' "))
			       {    
					  $stmt->execute(); 
					  $stmt->store_result();
					  $stmt->bind_result($u_ID,$u_name,$db_L2, $salt);
					  $stmt->fetch();
					  $password = hash('sha512', $s_password.$salt);  				
     				  $dirname=$u_ID;
					  mkdir("../../data/userprofile/avatar/".$dirname);
					  mkdir("../../data/userprofile/topics/".$dirname);		          		 
					 if($db_L2 == $password)
					 {  
						$email_xplode=explode("@",$s_email);
					   $user_browser = $_SERVER['HTTP_USER_AGENT']; 
					   $u_ID = preg_replace("/[^0-9]+/","", $u_ID); 
					   $_SESSION['u_ID'] = $u_ID; 
					   $email_xplode = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $email_xplode[0]);
					   $u_name=preg_replace("/[^a-zA-Z0-9_\-]+/", "",$u_name);
					   $_SESSION['u_name'] = $u_name;
					   $_SESSION['u_email']=$s_email;
					   $_SESSION['xploded_u_email']=$email_xplode;
					   $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
					   header("location:edit_avatar.php");
		             }
		          }
						
			  $status="";
			  $bday="";
			  $city="";
			  $avatars=array("00");
			  $into_db=serialize($avatars);
			  $stmt_memdata=$mysqli_memdata->prepare("INSERT INTO `fireconverse`.`meminfo` (ID,bday,status,city,avatars) VALUES(?,?,?,?,?) ");
			  	if($stmt_memdata)
				{
				  $stmt_memdata->bind_param('sssss',$u_ID,$bday,$status,$city,$into_db);
				  $stmt_memdata->execute();
				}
				else
				{
				  echo "A Fatal Error Ocurred at s_p_104";
				 }
			}
		}
	}
		  
	}}
}}

$_SESSION['resubmit_flag'] = $resubmit_flag = rand();

//----------login form-------//
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
   
   
   
   if(isset($_POST['email'],$_POST['password'])){
  $L2=$_POST["password"];

   $email=$_POST["email"];
      if(login($email, $L2, $mysqli) == true) {
      header ("location:index.php");
   } else {
	  header("location:loginPage.php?auth=failed");
	  $error_messege="Wrong Email/Password. Try again.";
	  
	  
	   }
}
}	
mysqli_close($mysqli);
if(!function_exists('login_check')){

function login_check($mysqli) {
   if(isset($_SESSION['u_ID'], $_SESSION['u_name'],$_SESSION['xploded_u_email'],$_SESSION['u_email'], $_SESSION['login_string'])) {
     $u_ID = $_SESSION['u_ID'];
	 $u_name=$_SESSION['u_name'];
	 $login_string = $_SESSION['login_string'];
     $u_name_email= $_SESSION['xploded_u_email'];
	 $user_browser = $_SERVER['HTTP_USER_AGENT']; 
  
     if ($stmt =$mysqli->prepare("SELECT L2 FROM fireconverse.`members` WHERE ID=$u_ID")) { 

          $stmt->execute();       
		  $stmt->store_result();
 
        if($stmt->num_rows == 1) { 
           $stmt->bind_result($L2);
           $stmt->fetch();
           $login_check = hash('sha512', $L2.$user_browser);
           if($login_check == $login_string) {
             
              return true;
           } else {
              header("loginPage.php?auth=failed");
              return false;
           }
        } else {
            header("loginPage.php?auth=failed");
            return false;
        }
     } else {
        header("loginPage.php?auth=failed");
        return false;
     }
   } else {
    header("loginPage.php?auth=failed");
     return false;
   }
}} 

  function login($u_email, $L2, $mysqli) {	
  $stmt = $mysqli->prepare("SELECT ID,name, L2, salt FROM `fireconverse`.`members` WHERE email = '$u_email' ");
  		 if($stmt)
  		  {  	  
   			  $stmt->execute(); 
    		  $stmt->store_result();
    		  $stmt->bind_result($u_ID,$u_name,$db_L2, $salt);
    		  $stmt->fetch();
     		  $L2 = hash('sha512', $L2.$salt); 
  				
     			 if($stmt->num_rows == 1) { 
				
        		 if(checkbrute($u_ID, $mysqli) == true) { 
		
           $error_messege= "Sorry! Try After Sometime.";
            return false;
         } else {
         if($db_L2 == $L2) {  
		 
            	$email_xplode=explode("@",$u_email);
               $user_browser = $_SERVER['HTTP_USER_AGENT']; 
               $u_ID = preg_replace("/[^0-9]+/","", $u_ID); 
               $_SESSION['u_ID'] = $u_ID; 
               $email_xplode = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $email_xplode[0]);
			   $u_name=preg_replace("/[^a-zA-Z0-9_\-]+/", "",$u_name);
               $_SESSION['u_name'] = $u_name;
			   $_SESSION['u_email']=$u_email;
			   $_SESSION['xploded_u_email']=$email_xplode;
               $_SESSION['login_string'] = hash('sha512', $L2.$user_browser);
             
               return true;    
         } else {
		
           
            $now = time();
            $mysqli->query("INSERT INTO login_attempts (ID, time) VALUES ('$u_ID', '$now')");
            return false;
         }
      }
      } else {
         $error_messege= "Oops!! We Could Find The Records From Data You Provided.";
         return false;
      }
   }
}
 function checkbrute($u_ID, $mysqli) {
   
  				 $now = time();
    
  				 $valid_attempts = $now - (2 * 60 * 60);
   		if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE ID = ? AND time > '$valid_attempts'")) { 
   	  		 $stmt->bind_param('i', $u_ID); 
      
     		 $stmt->execute();
    	     $stmt->store_result();
     
     		 if($stmt->num_rows > 3) {
      		   return true;
     		 }
	 		  else
	 	  {
      	   return false;
      	}
  	 }
	}
 ?>


<!------------------------ HTML part begins----->
<div id="main_container_outer">
	<div id="main_container_inner">
    	<div id="navbar">
            <div class="fc_navbar">
                <img src="../../mydata/pics/fireconvers_navbar.png" id="fc_logo" width="201.6" height="31.8" alt="fireconverse">
            </div>
            <div id="error">
            	<p id="error_text">Wrong Email/Password. Try again.</p>
            </div>
			<div class="form_page_outer">
            	<div id="form_page_inner">
                	<div id="form_body">
                    	<form name="login_page" method="post" id="formlogin" action="loginPage.php">
                        	<input type="email" name="email"   class="text_field" id="u"value="" maxlength="50" placeholder="Email">
                            <input type="password" name="password" class="text_field" id="password_login" value="" maxlength="16" placeholder="Passcode" >
                            <button name="login" value="Log-In"   class="button_small" >Log-In</button>
                        </form>
                    	
                    </div>
                </div>
            </div>
		</div>
        
    	<div id="global_container">
        	<div id="banner_slide_outer">
            	<div id="banner_slide_inner">
                	<div class="slide">
                    	<img style="width:1366px" src="../../data/banner_LoginPage/banner1.jpg">
                    </div>
                    <div class="grad"></div>
                    <!--<div class="silde">
                    	<img src="banner2.jpg">
                    </div>
                    <div  class="slide">
                    	<img src="banner3.jpg">
                    </div>-->
                </div>
            </div>
           <div id="wrpp">
            <div id="info_outer">
            	<div id="info_inner">
                	<div id="explore_text">
                    	<p class="explore_txt">Explore every conversation..</p>
                        <button class="button_big" id="g">Get started.</button>
                    </div> 
                    <div id="login_text">
                   	  <p class="or_txt">or</p></br>
                        <p class="login_txt">Make your best part in by</p>
                        <button class="button_big" id="l">Log-In</button>
                        <button  id="s" class="button_big" Name = "Submit1"  VALUE = "">Sign-Up</button>
                    </div>
               </div> </div>
          <div id="signup_outer">
          	<div id="signup_inner">
            	<div id="s_text">
                	<p id="s_txt">It's simplier than you think.!</p>
            	<div id="signup_body">
                	<form name="signup_LoginPage" id="signup_LoginPage_id" method="post" action="loginPage.php">
                    	<input type="text" name="first_name" id="u1" onKeyUp="name_check()" class="s_textfield" value="<?php print $first_name;?>" placeholder="First name">
                    	<input type="text" name="last_name" id="u2" onKeyUp="name_check()"  class="s_textfield" value="<?php print $last_name;?>" placeholder="Last name">
                        <input type="password" name="s_password" onKeyUp="password_check()" id="s_password" class="s_textfield" placeholder="Password">
                        <input type="password" name="s_repassword" onKeyUp="repassword_check()" id="s_repassword" class="s_textfield" placeholder="Re-enter Password">
						<input type="email" name="s_email" class="s_textfield" id="e" value="" placeholder="E-mail address" >
                        <div class="s_radio_body">
                            <input type="radio" name="s_gender" class="s_radio" id="rm" value='male' <?PHP print $male_status; ?>>male
                            <input type="radio" name="s_gender" class="s_radio" id="rm" value='female' <?PHP print $female_status; ?>>female
                    	</div>
                        <input type="hidden" name="resubmit_flag" value="<?PHP echo $resubmit_flag;?>" >
                        <input type="submit" id="submit_hidden" name="Submit1" style="display:none">
                    </form>
                    
                </div>
            </div>
          </div> 
                	
           
        </div>
       </div>
    </div>

</div>


</body>
</html>