<?PHP 

if(!isset($_SESSION)){
	include_once 'secure_session.php';
	 sec_session_start();
	}
function login($u_email, $L2, $mysqli) {	
  $stmt = $mysqli->prepare("SELECT ID,name, L2, salt FROM `signup`.`members` WHERE email = '$u_email' ");
  		 if($stmt)
  		  {  	  
   			  $stmt->execute(); 
    		  $stmt->store_result();
    		  $stmt->bind_result($u_ID,$u_name,$db_L2, $salt);
    		  $stmt->fetch();
     		  $L2 = hash('sha512', $L2.$salt); 
  				
     			 if($stmt->num_rows == 1) { 
				
        		 if(checkbrute($u_ID, $mysqli) == true) { 
		
           echo "Sorry! Try After Sometime.";
            return false;
         } else {
         if($db_L2 == $L2) {  
		 
            	$email_xplode=explode("@",$u_email);
               $user_browser = $_SERVER['HTTP_USER_AGENT']; 
               $u_ID = preg_replace("/[^0-9]+/","", $u_ID); 
               $_SESSION['u_ID'] = $u_ID; 
               $email_xplode = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $email_xplode[0]);
			   $u_namae=preg_replace("/[^a-zA-Z0-9_\-]+/", "",$u_name);
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