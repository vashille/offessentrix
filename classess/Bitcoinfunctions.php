 <?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?> 

 <?php
 
 
 
/*
This page defines a number of functions to make the code on other pages more readable
*/



class Bitcoinfunctions {



private $db;
private $fm;

	public function __construct()
	{
		 
		$this->db = new Database();
		$this->fm = new Format();
	}



 



public function paymentBitcoin($txid,$addr,$value,$status){
	
	$sql = "INSERT INTO `payment` (`txid`, `addr`, `total_price_value` , `status`)
	VALUES ('$txid', '$addr', '$value',  '$status')";
	$this->db->insert($sql);
}



//DONE
public function GetCode($address){

	
	$sql = "SELECT * FROM `invoices` WHERE `address`='$address'";
	$result = $this->db->select($sql)->fetch_assoc();
	 $code = "Error, try again";
	 	if ($result) {
		 $code = $result['code'];
	}
	return  $code;
	 
}

// NEED
function getInvoicePrice($code){
	
	
	$sql = "SELECT * FROM `invoices` WHERE `code`='$code'";
	$result = $this->db->select($sql)->fetch_assoc();
	  $price = "Error, try again";
	 	if ($result) {
		 $price = $result['total_price'];
	}
	return $price;
}


//DONE
public function updateInvoiceStatus($code, $status){
    global $conn;
    $sql = "UPDATE `invoices` SET `status`='$status' WHERE `code`='$code'";
	$this->db->update($sql);
    //mysqli_query($conn, $sql);
}



 

public function UpdateGenCode($sId,$BitcoinAddress){
	
	$sql = "UPDATE `tbl_cart` SET `gencode`='$BitcoinAddress' WHERE `sId`='$sId'";
	$this->db->update($sql);
}


public function delCustomerCart($BitcoinAddress){
		//$sId  = session_id();
		$query = "DELETE FROM tbl_cart WHERE gencode = '$BitcoinAddress'";
		$this->db->delete($query);
	} 


public function delCustomerInvoices($BitcoinAddress,$status){
		//$sId  = session_id();
		$query = "DELETE FROM invoices WHERE address = '$BitcoinAddress' AND status=$status";
		$this->db->delete($query);
	} 


  

	public function BitcoinOrderProduct($BitcoinAddress){
		//$sId  = session_id();
	   // $query = "SELECT * FROM tbl_cart WHERE gencode = '$BitcoinAddress'";
		
		
		$query =  "SELECT tbl_cart.cartId as cartId, 
	tbl_cart.image AS image, 
	tbl_cart.gencode AS gencode, 
	tbl_cart.productId as productId,
	tbl_cart.productName as productName,
	tbl_cart.price as price,
	tbl_cart.quantity as quantity ,
	tbl_variant.variant_id AS variant_id, 
	tbl_variant.variant_name AS variant_name,
	tbl_variant.stocks AS variant_stock, 
	tbl_sizes.sizeid AS size_id, 
	tbl_sizes.sizename AS sizename FROM tbl_cart  
	INNER JOIN tbl_sizes ON tbl_cart.size_id  = tbl_sizes.sizeid INNER JOIN tbl_variant ON tbl_cart.variant_id = tbl_variant.variant_id
	WHERE tbl_cart.gencode ='$BitcoinAddress';";
		
		
		
		
		
		
		$getPro = $this->db->select($query);
		if ($getPro) {
			while ($result = $getPro->fetch_assoc()) {
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];
				$bit_address =$result['gencode'];
				
				
				$variant_name= $result['variant_name'];
				$size_name = $result['sizename'];
				
				$variant_id = $result['variant_id'];
				
		
				//$variant_name= $result['variant_name'];
				//$size_name = $result['sizename'];
				
				 
			$query = "INSERT INTO bitcoin_order (productName,variant_name, size_name, productId,quantity,price,image,bitcoin_addr) VALUES('$productName','$variant_name', '$size_name', '$productId','$quantity','$price','$image','$bit_address') ";
			
			$inserted_row = $this->db->insert($query);
			
			$this->updateProductStocks($quantity,$variant_id);
			
			}
		}
	}

	
	public function updateProductStocks($stocks,$variant_id)
	{
		
			$variant_id = mysqli_real_escape_string($this->db->link,$variant_id);

			$query = "UPDATE tbl_variant SET stocks =stocks-'$stocks' WHERE variant_id  = '$variant_id' ";

			$updated_row = $this->db->update($query);
		
	}


	public function delProductShiftedFromBitcoin($id){
		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "DELETE FROM bitcoin_order WHERE id = '$id' ";
	    $deldata = $this->db->delete($query);
	    if ($deldata) {
		$msg = "<span class='success'>Data Deleted Successfully.</span>";
				return $msg;
	}else{
$msg = "<span class='error'>Data Not Deleted !</span>";
				return $msg;

	}
	}
	
	
	public function productShiftBitcoinConfirm($id){
		
		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "UPDATE bitcoin_order
		SET status ='2'
		WHERE id = '$id' ";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			$msg = "<span class='success'>Updated Successfully.</span>";
				return $msg;
		} else{
			$msg = "<span class='error'>Not Updated !</span>";
				return $msg;
		}
	}


public function productShiftedFromBitcoin($id){
		$id = mysqli_real_escape_string($this->db->link, $id);

	$query = "UPDATE bitcoin_order
	SET status ='1'
	WHERE id = '$id' ";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success'>Updated Successfully.</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Not Updated !</span>";
				return $msg;
	}

	}

 
public function getOrderedProductBitcoin($cmrId){
    $query = "SELECT * FROM bitcoin_order WHERE cmrId = '$cmrId' ORDER BY date ASC ";
	$result = $this->db->select($query);
	return $result;

	}



public function getAllBitcoinOrderProduct(){
		$query = "SELECT * FROM bitcoin_order ORDER BY date ASC ";
		$result = $this->db->select($query);
		return $result;
	}






 
public function getBitcoinOrder($bitcoin_addr,$table,$session_id,$code){

	if($table=="bitcoin_order"){
		
		$query = "SELECT * FROM bitcoin_order WHERE bitcoin_addr= '$bitcoin_addr'";
		$result = $this->db->select($query);
		return $result;
		
	}
	
	elseif ($table=="invoices"){
		
		$query = "SELECT * FROM invoices WHERE address= '$bitcoin_addr' AND sessionId='$session_id' AND code='$code'";
		$result = $this->db->select($query);
		return $result;
		
	}
	
	
	
	
	
 
}

public function updateBitcoinOrder($bitcoin_addr,$cmrId){
	
	$sql = "UPDATE `bitcoin_order` SET `cmrId`='$cmrId' WHERE `bitcoin_addr`='$bitcoin_addr'";
	$this->db->update($sql);
}




//DONE
public function createInvoice(){
	$price=0;
	$code = $this->generateRandomString(25);
    $address = $this->generateAddress();
	
    $status = -1;
    //$ip = getIp();
	$sessionId  = session_id();
	
	
	 
	 
	 
	 
	
    $sql = "INSERT INTO `invoices` (`code`, `address`, `total_price`, `status`, `sessionId`)
    VALUES ('$code', '$address', '$price', '$status', '$sessionId')";
    $this->db->insert($sql);
	return $code;
	
	
}





//DONE
 function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


//DONE
public function generateAddress(){
	
    global $apikey;
    global $url;
    $options = array( 
        'http' => array(
            'header'  => 'Authorization: Bearer '.$apikey,
            'method'  => 'POST',
            'content' => '',
            'ignore_errors' => true
        )   
    );  
     
    $context = stream_context_create($options);
    $contents = file_get_contents($url."new_address", false, $context);
    $object = json_decode($contents);
    
    // Check if address was generated successfully
    if (isset($object->address)) {
      $address = $object->address;
    } else {
      // Show any possible errors
      $address = $http_response_header[0]."\n".$contents;
    }
	
	
	
	//$address= "bc1qhvds42l8vdh0ftxy696fa6nxmkhzegjepterxq";
    return $address;
}






//DONE
function getAddress($code){

	
	
	$sql = "SELECT * FROM `invoices` WHERE `code`='$code'";
	$result = $this->db->select($sql)->fetch_assoc();
	
	 $address = "Error, try again";
	if ($result) {
		$address = $result['address'];
	}
	return $address;
	
	
	
}



 //DONE
function getStatus($code){
	$sql = "SELECT * FROM `invoices` WHERE `code`='$code'";
	$result = $this->db->select($sql)->fetch_assoc();
	
	 $status = "Error, try again";
	if ($result) {
		$status = $result['status'];
	}
	return $status;
}
//DONE GET CODE
public function getInvoice($addr){
	
	 

	
	//GET CODE
	$sql = "SELECT * FROM `invoices` WHERE `address`='$addr'";
	$result = $this->db->select($sql)->fetch_assoc();
	
	 $status = "Error, try again";
	if ($result) {
		$invoice = $result['code'];
	}
	return $invoice;
	
	
}




//DONE

public function updateInvoicePrice($code,$total_price){
		
    //$sql = "INSERT INTO `invoices` (`code`, `address`, `total_price`, `status`, `sessionId`)
   // VALUES ('$code', '$address', '$price', '$status', '$sessionId')";
	
	  $sql = "UPDATE `invoices` SET `total_price`='$total_price' WHERE `code`='$code'";
	
    $this->db->update($sql);
	
}
public function getBTCPrice($currency){
    $content = file_get_contents("https://www.blockonomics.co/api/price?currency=".$currency);
    $content = json_decode($content);
    $price = $content->price;
    return $price;
}
//DONE
public function BTCtoPHP($amount){
    $price = $this->getBTCPrice("PHP");
    return $amount * $price;
}
//DONE
public function PHPtoBTC($amount){
    $price = $this->getBTCPrice("PHP");
    return $amount/$price;
}


 









//DONE
public function createOrder($invoice, $ip){
	
	/*
    global $conn;
    $sql = "INSERT INTO `orders` (`invoice`, `ip`) VALUES ('$invoice', '$ip')";
    mysqli_query($conn, $sql);
	
*/
	
	$sql = "INSERT INTO `orders` (`invoice`, `ip`) VALUES ('$invoice', '$ip')";
	$this->db->insert($sql);
}







//NOT SURE
function getInvoiceIp($addr){
    global $conn;
    $sql = "SELECT * FROM `invoices` WHERE `address`='$addr'";
    $result = mysqli_query($conn, $sql);
    $ip = "Error, try again";
    while($row = mysqli_fetch_assoc($result)){
        $ip = $row['ip'];
    }
    return $ip;
}


//NOT SURE
function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}



















//NO NEED
function getProduct($id){
    global $conn;
    $sql = "SELECT * FROM `products` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        return $row['name'];
    }
}

//NO NEED
function getInvoiceProduct($code){
    global $conn;
    $sql = "SELECT * FROM `invoices` WHERE `code`='$code'";
    $result = mysqli_query($conn, $sql);
    $product = "Error, try again";
    while($row = mysqli_fetch_assoc($result)){
        $product = $row['product'];
    }
    return $product;
}






//NO NEED
function getDescription($product){
    global $conn;
    $sql = "SELECT * FROM `products` WHERE `id`='$product'";
    $result = mysqli_query($conn, $sql);
    $description = "Error, try again";
    while($row = mysqli_fetch_assoc($result)){
        $description = $row['description'];
    }
    return $description;
}

 //NO NEED
function getPrice($id){
    global $conn;
    $sql = "SELECT * FROM `products` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        return $row['price'];
    }
}
  

}

?>