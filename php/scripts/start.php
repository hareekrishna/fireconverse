<?PHP
include("secure_session.php");
sec_session_start();
?>
<!doctype html>
<html>
    <head>
    	<meta charset="utf-8">
        <title>Start Something New..</title>
        <script src='../../js/jquery.min.js' ></script>
        <script src="../../js/jquery.form.js"></script>
        <script src="../../js/jquery-ui.min.js"></script>
        <script src="../../js/quick_access.js" ></script>
        <link rel="stylesheet" type="text/css" href="../../css/navbar.css" >
        <link rel="stylesheet" type="text/css" href="../../css/start.css">
    
    </head>

    <body>
		<script> 
            var section_name,
                flag;
            function corner_info(corner_id){
            if(corner_id){ 
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
                                var append_div="<div class='corner_include' id='c_id_"+corner_id+"'><p>"+info[0].corner_name+"</p><img src='../../mydata/pics/close.gif'/></div>";
                                $(".corner_inclusion").fadeIn().prepend(append_div);
                            }
                        },
                    error:function(jXHR,textStatus,errorThrown){
                        alert(errorthrown);
                        }
                    });
                }
            }
            
            function f(){
                section_name=$("#start_selection_form input[name=start_select]:checked").attr("id");
                section_name="#"+section_name.replace("radio","start"); 
                $(".start_section").hide();
                showby_anim(section_name);
            }
            function showby_anim(section_name){
                $(section_name).find(".st_t_main").children().each(function(index,element){
                    setTimeout(function(){	
                    $(section_name).show();
                        $(element).css({"display":'none',"margin-left":40}).fadeIn(100*index).animate({"margin":0},500);
                        },20*index);
                    });
                }
            //--------------adding groups
            var k=0,settings={};
                var info;
            function add_people_to_group(){
                
                $(document).find("#start_group #field12").on("keypress",".st_textbox",function(){
                    var settings={};
                    if(k==0){
                        $.ajax({
                            url:'follow.php',
                            dataType:"text",
                            method:"post",
                            data:{
                                flag:'follows_info',
                                },
                            success:function(data){
                                if(data){
                                    info=JSON.parse(data);
                                        settings={
                                        'text_box':this,
                                        'list':data
                                        };
                                    }
                                else{
                                    k=0;
                                    }
                                },
                            error:function(jXHR,textStatus,errorThrown){
                                alert(errorThrown);
                                }
                        });	
                        k=1;
                    }	
                    else{
                        auto_complete(settings);
                        k=1;
                        }
                        
                        });
                }
            function auto_complete(settings){
                alert(settings);
                
                }	
            $(function(){
                
                
                var room="topic";
                if(window.location.hash){
                    t=window.location.hash;
                
                if(t){
                    t=t.split("#");
                    var w=t[1].length,
                    u=t[1].indexOf("#");
                 
                    if(t[1].indexOf("?") != -1)
                        {
                        var s=t[1].indexOf("?"),
                        v=t[1].slice(s+1,w),
                        y=v.split("="),
                        corner_id=y[1];
                        room=t[1].slice(0,s);
                        corner_info(corner_id);
                        }
                    else {room=t[1];}
                }
                }
                
                var section_select="#radio_"+room;
                $(section_select).click();
                f();
                $("input[name=start_select]").on("click",function(){
                    f();
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
            });
        var expand;
        var expand_id;
        $(function(){
            $(".search_icon_gif").on("click",function(){
                $(".searchbox_outer").fadeIn().show();
                $(".searchbox_top").focus();
                });
                $("#close_icon_gif_id").on("click",function(){
                $(".searchbox_outer").fadeOut();hide();
                    });
        var a,b,c,d,e;b="#field3 .browse_pic";
        $("div .field").on("click",".button",function(){
            a="#"+$(this).closest('div[class="field"]').attr("id");
            if(a=="#field3"){
                b="#field3 .browse_pic";
                c="#topic";
                d="#field3 .imagePreview";
                e="#field3 .remove_button";
                }
            else if(a=="#field22"){
                b="#field22 .browse_pic";
                c="#corner";
                d="#field22 .imagePreview";
                e="#field22 .remove_button,#field22 .crop_button";
                }
            $(b).click();
            $(c).submit(function (e) {
              e.preventDefault();});
        }); 
         $(".browse_pic").on("change",function(){  
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
         
                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
         
                    reader.onloadend = function(){ // set image data as background of div
                        $(d).fadeIn().css({"display":"inline-block"});
                        $(e).fadeIn();
                        $(d).attr("src",this.result);
                        
                    }
                }
            });
        $("div .field").on("click",".remove_button",function(){
            
            var f="#"+$(this).closest('div[class="field"]').attr("id")+" "+".imagePreview,.remove_button,.crop_button";
            $(f).fadeOut().attr("src","");
            });
        
        $("div").on("click",".room_label h3",function(){
            var val=$(this).html();
            switch(val)
            {
                case "Sports":
                $("#rooms").css({'background-color': '#ff6767'});
                break;
                case "Health":
                $("#rooms").css({'background-color': '#87e9e2'});
                break;
                case "Movies":
                $("#rooms").css({'background-color': '#2a9692'});
                break;
                case "Fashion":
                $("#rooms").css({'background-color': '#818384'});
                break;
                case "Tech":
                $("#rooms").css({'background-color': '#626262'});
                break;
                }
            
            });
        $("div").on("click",".corner_include img",function(){
                $(".corner_include").fadeOut().remove();
            });
            
            //------------forum add functions
            
            $("div #start_topic .footer_field").on("click",".button",function(){
                var t_title=$("#field1 .st_textbox").val();
                var t_content=$("#field2 .st_textarea").val();
                var t_room=$("input[name='room_select']:checked").attr("id");
                var t_pic=$("#start_topic #uploadpic").val();
                var t_corner=$("#field4 .st_textbox").val();
                flag=0;
                
                if(t_pic!=0){
                    flag=0;
                    var ext = $('#start_topic #uploadpic').val().split('.').pop().toLowerCase();
                    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                    flag=1;
                    prevent("#topic");
                    if($("#field3 .st_t_info p").length==0){
                        $("#field3").append("<div class='st_t_info'><p></p></div>");
                        $("#field3 .st_t_info p").css({"color":"red","margin-left":-5}).html("Invalid Image.").animate({'margin-left':0});
                        }		
                    }
                }
                if(t_title==0){
                    $("#field1 .st_t_info p").css({"color":"red","margin-left":-5}).html("Give some title to your topic.").animate({'margin-left':0});
                    flag=1;
                     prevent("#topic");
                    }
                
                
                if(t_content==0){
                    flag=1;
                    if($("#field2 .st_t_info p").length==0){
                        $("#field2").append("<div class='st_t_info'><p></p></div>");
                        $("#field2 .st_t_info p").css({"color":"red","margin-left":-5}).html("Give some content to your topic.").animate({'margin-left':0});
                    
                    prevent("#topic");
                    }
                    }
                
                if(flag==0){
                 $('#topic').on('submit', function(e) { 
                    e.preventDefault();
                    var formData = new FormData($(this)[0]);
                    var corner_id=0;
                    if($(".corner_include").length){
                        var temp=$(".corner_include").attr("id");
                        corner_id=temp.split("_").pop();
                        }
                    formData.append('topic_corner',parseInt(corner_id));
                    formData.append('topic_room',t_room);
                $(document).ajaxStart(function(){
                    if($("#start_topic .loading_pic").length==0){
                      $("#start_topic .footer_field").prepend("<div class='loading_pic'><img src='../../mydata/pics/ajax_loader.gif' /></div>");
                    }
                });	
                $(document).ajaxComplete(function() {
                    if($("#start_topic .loading_pic").length){
                        $("#start_topic .loading_pic").remove();
                        }
                });
                        
        
                $.ajax({
                    
                    url :'forum_add.php' ,
                    type: "POST",
                    processData: false,
                    contentType: false, 
                    data: formData,
                    success: function(data){
                    flag=1;
                    if(data=='updated'){
                        $('#topic')[0].reset();
                        $(".imagePreview,.remove_button").fadeOut();
                        $(".imagePreview").attr("src","");
                        if($(".success").length==0){
                              $(".start_outer").prepend("<div class='success'><h1>Successfuly done!</h1></div>").hide().fadeIn();
                            }
                        }
                        
                    if(data=='notupdated')
                    {
                        alert('Oops! Something Wrong occured.Try again.');
                        }
                    
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
                
                 
            });
                }
                
                });
                <!----------groups------>
            
            $("div #start_corner .footer_field").on("click",".button",function(){
                var t_title=$("#field21 .st_textbox").val();
                var t_content=$("#field23 .st_textarea").val();
                var t_room=$("input[name='room_select']:checked").attr("id");
                var t_pic=$("#start_corner .browse_pic").val();
                 flag=0;
                
                 if(t_pic == 0){
                    flag==1;
                    prevent("#corner");
                    $("#browse_botton").focus();
                    $("#field22").append("<div class='st_t_info'><p></p></div>");
                    $("#field22 .st_t_info p").css({"color":"red","margin-left":-5}).html("Invalid Image.").animate({'margin-left':0});
        
                    }
                if(t_pic!=0){
                    var ext = $('#start_corner .browse_pic').val().split('.').pop().toLowerCase();
                    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                    flag=1;
                    prevent("#corner");
                    if($("#field22 .st_t_info p").length==0){
                        $("#field22").append("<div class='st_t_info'><p></p></div>");
                        $("#field22 .st_t_info p").css({"color":"red","margin-left":-5}).html("Invalid Image.").animate({'margin-left':0});
                        }		
                    }
                }
                if(t_title==0){
                    $("#field21 .st_t_info p").css({"color":"red","margin-left":-5}).html("Give some name to your Corner.").animate({'margin-left':0});
                    flag=1;
                     prevent("#corner");
                    }
                
                 
                if(t_content==0){
                    $("#field23 .st_t_info p").css({"color":"red","margin-left":-5}).html("Give some description for your corner.").animate({'margin-left':0});
                    flag=1;
                    prevent("#corner");
                    }
                 $('#corner').on('submit', function(e){
                    e.preventDefault();
                    var formData1= new FormData($(this)[0]);
                    formData1.append('corner_room',t_room);
                $(document).ajaxStart(function(){
                    if($("#start_corner .loading_pic").length==0){
                      $("#start_corner .footer_field").prepend("<div class='loading_pic'><img src='../../mydata/pics/ajax_loader.gif' /></div>");
                    }
                });	
                $(document).ajaxComplete(function() {
                    if($("#start_corner .loading_pic").length){
                        $("#start_corner .loading_pic").remove();
                        }
                });
                if(flag==0){
                    var imagePreview=$("#start_corner .imagePreview").attr("src");
                    $(".crop_div_image img").attr("src",imagePreview);
                    $(".crop_div_outer , #splash").fadeIn(700);
                    $(".crop_box").draggable({containment:"parent"});
                    var w=$(".crop_div_image img").width();
                    var h=$(".crop_div_image img").height();
                    $(".crop_box").width(w*0.98).height(w*0.20);
                    $(".crop_div_image").width(w).height(h);
                    $("#splash").on("click",function(){
                        $(".crop_div_outer,#splash").fadeOut(700);
                        });
                    $(".crop_done_button button").on("click",function(){
                        var settings ={};
                        var loc="../../data/corners/temp/";
                        settings={
                            'location':loc,
                            'reduce_size':true,
                            'top':$(".crop_box").position().top,
                            'left':$(".crop_box").position().left,
                            'width':$(".crop_box").width(),
                            'height':$(".crop_box").height(),
                            'imgSrc':$(".crop_div_image img").attr("src"),
                            'imgWidth':$(".crop_div_image img").width(),
                            'imgHeight':$(".crop_div_image img").height()
                            
                            };
							var json = JSON.stringify(settings);
                            $.ajax({
                                url:'cropper.php',
                                method:'POST',
								dataType: "json",
								cache:false,
								contentType:'application/json',
                                data:{settings:json},
                                success:function(data){
									
                                    if(data != false){
                                        formData1.append('location',data);
                                         $.ajax({
                                            url :'forum_add.php' ,
                                            type: "POST",
                                            processData: false,
                                            contentType: false, 
                                            data: formData1,
                                            success: function(data){alert(data);
                                            flag=1;
                                            if(data=='notupdated'){
                                                alert('Oops! Something Wrong occured.Try again.');
                                                }
                                            else{
                                                
                                                $(".crop_div_outer,#splash").fadeOut(700);
                                                $('#corner')[0].reset();
                                                if($(".success").length==0){
                                                      $(".start_outer").prepend("<div class='success'><h1>Successfuly done!</h1></div>").hide().fadeIn();
                                                    }
                                                var link_to="corner.php?cid="+parseInt(data);
                                                window.location.replace(link_to);
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
               
                }
                 
            });
                
                });
        // crop function
            
            
        });
        //---------
        var form_prev;
        function prevent(form_prev){ 
            $(form_prev).on('submit', function(e) { 
                        e.preventDefault();
                         });
            }
        </script>
		<?PHP 
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
                                <li class='navbar_list' id='quick_acces_icon_o'>
                                    	<img id='quick_acces_icon' src="../../mydata/pics/qiuck_access.png"  alt="Quick Access">
                                </li>
                                <li class="navbar_list" id="avatar_navbar_list">
                                    <a href="profile.php"><img id="avatar_navbar" src="<?PHP echo $flag_tumb; ?>"></a>
                                </li>
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
                
     <div class="page_body">
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
             <div class="start_outer">
                <div class="start_inner">
                    <div class="start_list">
                        <form id="start_selection_form">
                          <input type="radio"  name="start_select" id="radio_topic" /><label class="start_label" for="radio_topic"><h3>Start Topic</h3></label>
                           <input type="radio" name="start_select"  id="radio_group" /><label class="start_label" for="radio_group"><h3>Start Group</a></h3></label>
                           <input type="radio"  name="start_select"  id="radio_corner" /><label class="start_label" for="radio_corner"><h3>Start Corner</h3></label>
                        </form>
                    </div>
                   <div id="rooms">
                         <div class="st_t_i" id="room_select_div">
                                 <form id="room_selection_form">
                                    <input type="radio" name="room_select"  id="room_sports" checked/><label class="room_label" for="room_sports"><h3>Sports</h3></label>
                                    <input type="radio" name="room_select"  id="room_health" /><label class="room_label" for="room_health"><h3>Health</h3></label>
                                    <input type="radio" name="room_select"  id="room_movies" /><label class="room_label" for="room_movies"><h3>Movies</h3></label>
                                    <input type="radio" name="room_select"  id="room_fashion" /><label class="room_label" for="room_fashion"><h3>Fashion</h3></label>
                                    <input type="radio" name="room_select"  id="room_tech" /><label class="room_label" for="room_tech"><h3>Tech</h3></label>
                                 </form>
                               </div>
                            </div>
                    <section class="start_section" id="start_topic">
                    
                        <div class="st_t_main">
                            
                            <div class="field" id="field1">
                                <div class="st_t_title"><p>Title of the topic</p></div>
                                <div class="st_t_s"><p>:</p></div>
                                <div class="st_t_i">
                                <form action="" method="post" name="topic" id="topic"  enctype="multipart/form-data">
                                    <input type="text" name="topic_title" class='st_textbox' maxlength="100" />
                               </div>
                               <br/>
                               <div class="st_t_info" ><p>Maximum 100 letters.</p></div>
                               
                            </div>
                            <div  class="field" id="field2">
                                <div class="st_t_title"><p>Content</p></div>
                                <div class="st_t_s"><p>:</p></div>
                                 <div class="st_t_i">
                                    <textarea name="topic_content" class="st_textarea" ></textarea>
                                 </div>
                                 <br/>
                            </div>
                            
                            <div  class="field" id="field3">
                                <div class="st_t_title"><p>Picture</p></div>
                                <div class="st_t_s"><p>:</p></div>
                                 <div class="st_t_i">
                                    
                                        <img src="" class="imagePreview"/>
                                            <input id="uploadpic" type="file" name="topic_pic" class="browse_pic" />
                                            <button class="button" >Browse</button>
                                             <button class="remove_button" >Remove</button>
                                 
                                 </div>
                                    <br/>
                        </div>
                        <div  class="field" id="field4">
                                <div class="st_t_title"><p>Include in</p></div>
                                <div class="st_t_s"><p>:</p></div>
                                 <div class="st_t_i">
                                    <input type="text" name="topic_corner" class='st_textbox' maxlength="100" />
                                 </div>
                                 <div class="corner_inclusion"></div>
                        </div>
                        <div class="footer_field">
                            
                            <button class="button" >Done</button>
                            </form>
                        </div>
                    </section>
                    <section class="start_section" id="start_group">
                        <div class="st_t_main">
                            
                            <div class="field" id="field11">
                                <div class="st_t_title"><p>Name of your Group</p></div>
                                <div class="st_t_s"><p>:</p></div>
                                <div class="st_t_i">
                                <form action="" method="post" name="group" id="group"  enctype="multipart/form-data">
                                    <input type="text" name="group_name" class='st_textbox'  maxlength="20" />
                               </div>
                               <br/>
                               <div class="st_t_info" ><p>Maximum 20 letters.</p></div>
                               
                            </div>
                            <div  class="field" id="field12">
                                <div class="st_t_title"><p>Add people..</p></div>
                                <div class="st_t_s"><p>:</p></div>
                                 <div class="st_t_i">
                                    <input type="text" name="add_people" onKeyPress="add_people_to_group();" class='st_textbox' maxlength="20" />
                                 </div>
                                 <br />
                                 <div class="st_t_info" ><p>You can only add people you follow.</p></div>
                            </div>
                            
                        <div class="footer_field">
                            
                            <button class="button" >Done</button>
                            </form>
                        </div>
                    </section>
                     <section class="start_section" id="start_corner">
                        <div class="st_t_main">
                            
                            <div class="field" id="field21">
                                <div class="st_t_title"><p>Name of your Corner</p></div>
                                <div class="st_t_s"><p>:</p></div>
                                <div class="st_t_i">
                                <form action="" method="post" name="corner" id="corner"  enctype="multipart/form-data">
                                    <input type="text" name="corner_name" class='st_textbox'maxlength="20" />
                               </div>
                               <br/>
                               <div class="st_t_info" ><p>Maximum 20 letters.</p></div>
                               
                            </div>
                            <div  class="field" id="field22">
                                <div class="st_t_title"><p>Banner</p></div>
                                <div class="st_t_s"><p>:</p></div>
                                 <div class="st_t_i">
                                    <img src="" class="imagePreview"/>
                                            <input type="file" name="corner_pic" class="browse_pic" />
                                            <button id='browse_botton' class="button" >Browse</button>
                                            <button class="remove_button" >Remove</button>
                                 </div>
                                 <br />
                                 
                            </div>
                             <div  class="field" id="field23">
                                <div class="st_t_title"><p>Description</p></div>
                                <div class="st_t_s"><p>:</p></div>
                                 <div class="st_t_i">
                                    <textarea name="corner_desc" class="st_textarea" maxlength="50" ></textarea>
                                 </div>
                                 <br/>
                                  <div class="st_t_info" ><p>Maximum 50 letters.</p></div>
                            </div>
                        <div class="footer_field">
                            
                            <button class="button" >Done</button>
                            </form>
                        </div>
                    </section>
                    
                </div>
             </div>
                        
        </div>
        <div id="splash"></div>
        <div class="crop_div_outer">
            <div class="crop_div_inner">
                <p class="crop_text">Adjust Photo..</p>
                <div class="crop_div_main">
                    <div class="crop_div_image">
                       <img src="" draggable="false"/>
                         <div class="crop_box"></div>   
                    </div> <br/>
                    <span class="st_t_info" style="display:inline-block"><p>Drag the box around the photo and tap done.</p></span>
                    <div class="crop_done_button">
                        <button class="button" >Done</button>
                    </div>
               </div>
            </div>
        </div>
      </div>
     </div>
    </body>
</html>