 <?php //include 'header.php';
 include '../lib/Session.php';
 Session::init();
 
include '../lib/Database.php';
include '../helpers/Formate.php';
spl_autoload_register(function($class){
include_once "../classess/".$class.".php";

});
 
 
 
 

 
 ?>
 <?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
  
  $db = new Database(); 
$fm = new Format();
//$pd = new Product();
//$cat = new Category();
//$ct = new Cart();
//$cmr = new Customer();

$bitcoin = new Bitcoinfunctions();
  
?>
 <?php
 
 
 
 
 
 
 
 
 

$secretlocal = "asecretcode"; // Code in the callback, make sure this matches to what youve set

// Get all these values
$status = 0;
$txid = $_GET['txid'];
$value = $_GET['value'];
$status = $_GET['status']; 
$BitcoinAddress = $_GET['addr'];
$secret = $_GET['secret']; 

// Check all are set
if(!isset($txid) || !isset($value) || !isset($BitcoinAddress) || !isset($secret)){
   // exit();
}

if($secret != $secretlocal){
   // exit();
}

$cmrId = Session::get("cmrId");



//echo  'ssss'.$cmrId; 
echo $txid;


//insert payment table
$bitcoin->paymentBitcoin($txid,$BitcoinAddress,$value,$status);




// SELECT table invoices return code
$code = $bitcoin->GetCode($BitcoinAddress);

// Get invoice price  SELECT table invoices  return total_price
$price = $bitcoin->getInvoicePrice($code);

// Convert price to satoshi for check
$price = $bitcoin->PHPtoBTC($price);
$price = $price *100000000;


// Expired
if($status < 0){
    exit();
}

$mop ="Bitcoin";
if($value >= round($price)){
    // Update invoice status
    $bitcoin->updateInvoiceStatus($code, $status);
    if($status == 2){
		
        // Correct amount paid and fully confirmed
        // Do whatever you want here once payment is correct
		
		
      
		echo "first ". $status; 
		
		
	$insertOrder = $bitcoin->BitcoinOrderProduct($BitcoinAddress);
	
	
    $delData = $bitcoin->delCustomerCart($BitcoinAddress);
 
    }
}else {
    // Buyer hasnt paid enough
	echo "second ". $status; 
    $bitcoin->updateInvoiceStatus($code, -2);
}





?>