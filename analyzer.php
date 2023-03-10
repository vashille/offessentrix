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
//$ct = new Cart();
//$cmr = new Customer();

$bitcoin = new Bitcoinfunctions();

?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

	
	<?php 
	
	
	if(isset($_GET['bitcoin_addr'])) {
		$customer_id =  Session::get("cmrId");
		$TableName = "bitcoin_order";
	
	
	$bitcoin_addr = $_GET['bitcoin_addr']; 
	
	$bit_addr = $bitcoin->getBitcoinOrder($bitcoin_addr,$TableName,"","");
							if($bit_addr){
								if($result = $bit_addr->fetch_assoc()){
									
									
									$bitcoinAddress = $result['bitcoin_addr'];
									
									if($result['cmrId']==0){
										
										$bitcoin->updateBitcoinOrder($bitcoinAddress,$customer_id);
									}
									
									
								}
				 				
							}
	
	}
	
	
	if(isset($_GET['bitcoin_addr'])&& isset($_GET['session_id'])&& isset($_GET['codes'])) {
		 
		$customer_id =  Session::get("cmrId");
		$session_id =$_GET['session_id'];
		$code = $_GET['codes'];
		
		$TableName = "invoices";
		 if($TableName=="invoices"){
			  $bit_addr = $bitcoin->getBitcoinOrder($bitcoin_addr,$TableName,$session_id,$code);
							if($bit_addr){
								if($result = $bit_addr->fetch_assoc()){
									
									//$customer_id = $result['cmrId'];
									$bitcoinAddress = $result['address'];
									$statusBit = $result['status'];
									
									
									
										if($statusBit == 0){
											
												$status = "<span style='color: orangered' id='status'>PENDING</span>";
												//$info = "<p>Your payment has been received. Invoice will be marked paid on two blockchain confirmations.</p>";
											echo $status;
										}else if($statusBit == 1){
											
												$status = "<span style='color: orangered' id='status'>PENDING</span>";
												//$info = "<p>Your payment has been received. Invoice will be marked paid on two blockchain confirmations.</p>";
										echo $status;
										}else if($statusBit== 2){
											
												$status = "<span style='color: green' id='status'>PAID</span>";
												//delete cart session_id
												$delData = $bitcoin->delCustomerCart($bitcoinAddress,$session_id);
												
										echo $status;
										}else if($statusBit == -1){
											
												$status = "<span style='color: red' id='status'>UNPAID</span>";
											echo $status;	
										}else if($statusBit == -2){
												
												$status = "<span style='color: red' id='status'>Too little paid, please pay the rest.</span>";
												echo $status;
										}else {
											
											$status = "<span style='color: red' id='status'>Error, expired</span>";
											echo $status;
										}

								}
				 				
							}
			 
			 
		 }
		
	
	}			
		
					
		
		
		
		?>
		
		
