<?PHP
if (!defined('HOST')) 
define("HOST", "localhost"); 

if (!defined('USER')) 
define("USER", "root"); 

if (!defined('PASSWORD')) 
define("PASSWORD", ""); 

if (!defined('DATABASE')) 
define("DATABASE", "fireconverse"); 
$mysqli =new mysqli(HOST, USER, PASSWORD, DATABASE);
?>
