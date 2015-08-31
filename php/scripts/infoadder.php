<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?PHP
$resulti="";
print $name;
include("configsignup.php");
$SQLi="SELECT * FROM  fireconverse.members WHERE name=$name";
				$resulti=mysql_query($SQLi);
				
				if($resulti)
				{
				$array=mysql_fetch_array($resulti);
				$IDi=$array['ID'];
				include("configmemdata.php");
				if($db_found)
				  {					
					$SQLi1="INSERT INTO `fireconverse`.`meminfo` (`ID`) VALUES('".$IDi."')";
					$resulti1=mysql_query($SQLi1);
				  }
				}
					else
					{
						print "some went wrong with info adder";
					}

?>
</body>
</html>