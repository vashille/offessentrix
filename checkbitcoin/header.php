<?php
 
include '../lib/Session.php';
Session::checkSession();

include '../lib/Database.php';
include '../helpers/Formate.php';
spl_autoload_register(function($class){
include_once "classess/".$class.".php";

});

 
?>

<?php  
$db = new Database();
$fm = new Format();

?>



<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>