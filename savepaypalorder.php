<?php //include 'inc/header.php';?>	
	<?php
  
	include 'lib/Session.php';
	Session::init();

	include 'lib/Database.php';
	include 'helpers/Formate.php';

	//include 'bitcoin/Bitcoinfunctions.php';
	spl_autoload_register(function($class){
	include_once "classess/".$class.".php";

});

	$db = new Database(); 
	$fm = new Format();
	//$pd = new Product();
	//$cat = new Category();

	//$cmr = new Customer();

	//$bitcoin = new Bitcoinfunctions();
	$ct = new Cart();
	$paypal = new Paypalfunctions(); 

?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>





 <?php 

 
/*
  payer_givename = ;
 payer_surname = ;
 payer_email = ;
 payer_id = ;
 transaction_id = ;
 currency = ;
 total_paid = ;
 business_email = ;
 transaction_date = ;
 */
 
	$transaction_id = $_POST["transaction_id"];
	$payer_givename =$_POST["payer_givename"] ;
	$payer_surname = $_POST["payer_surname"];
	$payer_email = $_POST["payer_email"];
	$payer_id = $_POST["payer_id"];

	$currency = $_POST["currency"];
	$total_paid = $_POST["total_paid"];
	$business_email =  $_POST["business_email"];
	$transaction_date = $_POST["transaction_date"];
 
 
 
 
 
 $cmrId = Session::get("cmrId");
 //insert table tbl_paypal_order_details
 $insertPaypalOrder = $paypal->orderProductbypaypal($cmrId,$transaction_id);
 
 //insert table tbl_paypal_payment
 $paypal->paypalPayment($transaction_id, $payer_givename,  $payer_surname, $payer_email, $payer_id, $currency, $total_paid, $business_email,$transaction_date);
 
  $delData = $ct->delCustomerCart();
  ?>