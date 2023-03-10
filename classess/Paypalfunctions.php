<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?> 


<?php

class Paypalfunctions{
	
private $db;
private $fm;

	public function __construct()
	{
		 
		$this->db = new Database();
		$this->fm = new Format();
	}
	
public function orderProductbypaypal($cmrId, $transaction_id){
	
	
	$sId  = session_id();
	  //  $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		 
		
	$query ="SELECT tbl_cart.cartId as cartId, 
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
	WHERE tbl_cart.sId ='$sId';";
		
		/*	
	cartId
	image
	gencode
	productId
	productName
	price
	quantity
	variant_id
	variant_name
	variant_stock
	size_id
	sizename
	
	*/
		$getPro = $this->db->select($query);
		if ($getPro) {
			while ($result = $getPro->fetch_assoc()) {
				
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];
				
				$variant_name= $result['variant_name'];
				$size_name = $result['sizename']; 
				
				$variant_id = $result['variant_id'];
				
			$query = "INSERT INTO tbl_paypal_order_details(cmrId,productId,productName,variant_name, size_name, quantity,price,image,transaction_id) VALUES('$cmrId','$productId','$productName','$variant_name','$size_name','$quantity','$price','$image','$transaction_id') ";
			$inserted_row = $this->db->insert($query);
			
			
			$this->updateProductStocks($quantity,$variant_id);
			}
		}
		
		
	} 
	
	public function updateProductStocks($stocks,$variant_id)
	{
		
			$variant_id= mysqli_real_escape_string($this->db->link,$variant_id);

			
			
			$query = "UPDATE tbl_variant SET stocks =stocks-'$stocks' WHERE variant_id = '$variant_id' ";

			$updated_row = $this->db->update($query);
		
	}
	
	
	
	
	public function paypalPayment($transaction_id, $payer_givename,  $payer_surname, $payer_email, $payer_id, $currency, $total_paid, $business_email,$transaction_date){
		
		$transaction_id = $transaction_id;
		$payer_name = $payer_givename." ".$payer_surname;
		$payer_email =  $payer_email;
		$payer_id = $payer_id;
		$currency = $currency;
		$total_paid = $total_paid;
		$business_email = $business_email;
		$transaction_date = $transaction_date;
		
		
		
		$query = "INSERT INTO tbl_paypal_payment(transaction_id,payer_name,payer_email,payer_id, currency, total_paid,business_email,transaction_date) 
		VALUES('$transaction_id','$payer_name','$payer_email','$payer_id','$currency','$total_paid','$business_email','$transaction_date')";
		$inserted_row = $this->db->insert($query);
		
		
	}
	 

	
	public function productShippedPaypalConfirm($id){
		
		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "UPDATE tbl_paypal_order_details
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
	
	public function productShippedFromPaypal($transaction_id){
		$transaction_id = mysqli_real_escape_string($this->db->link, $transaction_id);

	$query = "UPDATE tbl_paypal_order_details
	SET status ='1'
	WHERE transaction_id = '$transaction_id' ";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success'>Updated Successfully.</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Not Updated !</span>";
				return $msg;
	}

	}
	
	
		public function delProductShippedFromPaypal($transaction_id){
		$transaction_id = mysqli_real_escape_string($this->db->link, $transaction_id);


		$querypp = "DELETE FROM tbl_paypal_payment WHERE 	transaction_id	 = '$transaction_id' ";
	    $deldatapp = $this->db->delete($querypp);
		
		
		$querypod = "DELETE FROM tbl_paypal_order_details WHERE 	transaction_id	 = '$transaction_id' ";
	    $deldatapod = $this->db->delete($querypod);
	    if ($deldatapod) {
		$msg = "<span class='success'>Data Deleted Successfully.</span>";
				return $msg;
		}else{
			$msg = "<span class='error'>Data Not Deleted !</span>";
			return $msg;

	}
	}
	
	
	
	
	 
public function getOrderedProductPaypal($cmrId){
    $query = "SELECT * FROM tbl_paypal_order_details WHERE cmrId = '$cmrId' ORDER BY date ASC ";
	$result = $this->db->select($query);
	return $result;

	}
	
	public function getAllPaypalOrderProductByTransactionID(){
		$query = "SELECT tbl_paypal_payment.transaction_id AS transaction_id, 
		tbl_paypal_payment.payer_name AS payer_name, 
		tbl_paypal_payment.payer_email AS payer_email,
		tbl_paypal_payment.payer_id AS payer_id, 
		tbl_paypal_payment.currency AS currency, 
		tbl_paypal_payment.total_paid AS total_paid, 
		tbl_paypal_payment.business_email AS business_email,
		tbl_paypal_payment.transaction_date AS transaction_date,
		tbl_paypal_order_details.status AS status 
		FROM `tbl_paypal_payment` INNER JOIN tbl_paypal_order_details ON tbl_paypal_payment.transaction_id = tbl_paypal_order_details.transaction_id
		GROUP BY tbl_paypal_order_details.transaction_id ORDER BY `tbl_paypal_payment`.`transaction_date` ASC;";
		
		$result = $this->db->select($query);
		return $result;
	}
	
	
	 
	
	public function getProductDetailByTransactionID($transaction_id){
		
				$query = "SELECT * FROM tbl_paypal_order_details WHERE 	transaction_id	= '$transaction_id'";
		$result = $this->db->select($query);
		return $result;
		
	}
	
	
	
	
	
}




