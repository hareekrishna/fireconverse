<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?PHP
include 'secure_session.php';
include 'function.php';
include 'login_status.php';
sec_session_start();

$_SESSION = array();

$params = session_get_cookie_params();

setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

session_destroy();
echo 'loged out';
echo 'you hv loged out!!'; 
function loga(){
	echo 'hareee';
	}
echo '<input type="button" id="logout" onClick=" loga()" value="logout"/>';
?>

</body>
</html>