<?PHP
	if(!function_exists('login_check'))
	{
		function login_check($mysqli)
         {
 			if(isset($_SESSION['u_ID'], $_SESSION['u_name'],$_SESSION['xploded_u_email'],$_SESSION['u_email'], $_SESSION['login_string'])) 
			{
				 $u_ID = $_SESSION['u_ID'];
				 $u_name=$_SESSION['u_name'];
				 $login_string = $_SESSION['login_string'];
				 $u_name_email= $_SESSION['xploded_u_email'];
				 $user_browser = $_SERVER['HTTP_USER_AGENT']; 
				 if ($stmt =$mysqli->prepare("SELECT L2 FROM fireconverse.`members` WHERE ID=$u_ID"))
				  { 			  
				 	  $stmt->execute();       
					  $stmt->store_result(); 
       				  if($stmt->num_rows == 1)
					   { 
						   $stmt->bind_result($L2);
						   $stmt->fetch();
						   $login_check = hash('sha512', $L2.$user_browser);
						   if($login_check == $login_string)
						    {
							  return true;
							 }
						    else
							 {
							    header("loginPage.php");
								return false;
							  }
                   }
				    else 
					{
						header("loginPage.php");
						return false;
					}
                }  
				else 
				{
					header("loginPage.php");
					return false;
				 }
              } 
			  else 
			  {
				header("loginPage.php");
				 return false;
			   }
         }} 
 ?>
