<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?> 


<?php

class Cart{
	
private $db;
private $fm;

	public function __construct()
	{
		 
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	
public function addToCart($quantity, $id,$variant_id,$size_id){
	$quantity = $this->fm->validation($quantity);
	
	
    $quantity = mysqli_real_escape_string($this->db->link, $quantity);
    $productId = mysqli_real_escape_string($this->db->link, $id);
 
    $sId  = session_id();

    $squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
    $result = $this->db->select($squery)->fetch_assoc();

    $productName = $result['productName'];
    $price = $result['price'];
    $image = $result['image'];


    $chquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId='$sId' AND size_id='$size_id' AND variant_id ='$variant_id' ";
    $getPro = $this->db->select($chquery);
    if ($getPro) {
    	$msg = "Product already added!";
    	return $msg;
    }else{



    $query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image,size_id,variant_id) VALUES('$sId','$productId','$productName','$price','$quantity','$image','$size_id','$variant_id') ";
			$inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				echo "<script>window.location.href='cart.php';</script>";
				//header("Location:cart.php");
			} else{
				header("Location:404.php");
			}
		}
}

 



 

public function getCartProduct(){

	$sId  = session_id();
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
	 
	 
	 
	 
	 
	$result = $this->db->select($query);
	return $result;
	
	
	
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

}


public function getTotalSales($table){
	
	

	if($table== "cod" && !empty(trim($table))){
		
		$query = "SELECT SUM(price) as total_sales FROM tbl_order";
		$result = $this->db->select($query);
		
		if($result != false){
			$value = $result->fetch_assoc();
			
			return $value['total_sales'];
		
		}
		
	
	
		
	}
	
	
	if($table== "bitcoin" && !empty(trim($table))){
		
		$query = "SELECT SUM(price) as total_sales FROM bitcoin_order";
		$result = $this->db->select($query);
		if($result != false){
			$value = $result->fetch_assoc();
			
			return $value['total_sales'];
		
		}
	
		
	}
	
	
	if($table== "paypal" && !empty(trim($table))){
		
		$query = "SELECT SUM(price) as total_sales FROM tbl_paypal_order_details";
		$result = $this->db->select($query);
		
		if($result != false){
			$value = $result->fetch_assoc();
			
			return $value['total_sales'];
		
		}
	
	
		
	}
	
	
		
	

	
	
}

public function totalSalesGroupbyMonthYear($table, $month, $year){
	
		//SELECT SUM(sales) as total_sales FROM orders;
	
//SELECT SUM(price), date FROM tbl_order  GROUP BY MONTH(date), YEAR(date);
//SELECT SUM(price), date, `productName` FROM tbl_order WHERE productName ='TOPS number 3' GROUP BY MONTH(date), YEAR(date);
//SELECT SUM(price), date, `productName` FROM tbl_order GROUP BY MONTH(2022-12-20);
//SELECT SUM(price) as total_price FROM `tbl_order` WHERE MONTH(date)=12 AND YEAR(date)=2022;



		if($table== "bitcoin" && !empty(trim($table))){
		
				
				$query ="SELECT SUM(price) as total_sales FROM `bitcoin_order` WHERE MONTH(date)= $month AND YEAR(date)=$year;";
				
				$result = $this->db->select($query);
				if($result != false){
				$value = $result->fetch_assoc();
			
				return $value['total_sales'];
		
			}
		}
		
		if($table== "cod" && !empty(trim($table))){
		
				//$query = "SELECT SUM(price) as total_sales FROM bitcoin_order";
				
				
				$query ="SELECT SUM(price) as total_sales FROM `tbl_order` WHERE MONTH(date)= $month AND YEAR(date)=$year;";
				
				$result = $this->db->select($query);
				if($result != false){
				$value = $result->fetch_assoc();
			
					return $value['total_sales'];
				}
	}

		if($table== "paypal" && !empty(trim($table))){
		
				//$query = "SELECT SUM(price) as total_sales FROM bitcoin_order";
				
				
				$query ="SELECT SUM(price) as total_sales FROM `tbl_paypal_order_details` WHERE MONTH(date)= $month AND YEAR(date)=$year;";
				
				$result = $this->db->select($query);
				if($result != false){
				$value = $result->fetch_assoc();
			
					return $value['total_sales'];
				}
	}

}



// GET TOTAL SALES DAY, MONTH  AND YEAR
public function totalSalesSpecificDate($table, $day, $month, $year){
	
	
	$date= "$year-$month-$day";
	if($table== "bitcoin" && !empty(trim($table))){
		
				
				$query ="SELECT SUM(price) as total_sales FROM `bitcoin_order` WHERE CAST(`date` AS date) = '$date';";
				
				$result = $this->db->select($query);
				if($result != false){
				$value = $result->fetch_assoc();
			
				return $value['total_sales'];
		
			}
		}
		
		if($table== "cod" && !empty(trim($table))){
		
				//$query = "SELECT SUM(price) as total_sales FROM bitcoin_order";
				
				
				
				$query ="SELECT SUM(price) as total_sales FROM `tbl_order` WHERE CAST(`date` AS date) = '$date';";
				$result = $this->db->select($query);
				if($result != false){
				$value = $result->fetch_assoc();
			
					return $value['total_sales'];
				}
	}

		if($table== "paypal" && !empty(trim($table))){
		
				//$query = "SELECT SUM(price) as total_sales FROM bitcoin_order";
				
				
				
				$query ="SELECT SUM(price) as total_sales FROM `tbl_paypal_order_details` WHERE CAST(`date` AS date) = '$date';";
				$result = $this->db->select($query);
				if($result != false){
				$value = $result->fetch_assoc();
			
					return $value['total_sales'];
				}
	}
	
	
	
}


public function yearlySales($table,$year){
	
	
	//SELECT SUM(price) as total_sales FROM `tbl_order` WHERE YEAR(date)='2023';
	
	
		if($table== "bitcoin" && !empty(trim($table))){
		
				
				$query ="SELECT SUM(price) as total_sales FROM `bitcoin_order` WHERE YEAR(date)= '$year';";
				
				$result = $this->db->select($query);
				if($result != false){
				$value = $result->fetch_assoc();
			
				return $value['total_sales'];
		
			}
		}
		
		if($table== "cod" && !empty(trim($table))){
		
				//$query = "SELECT SUM(price) as total_sales FROM bitcoin_order";
				
				
				
				$query ="SELECT SUM(price) as total_sales FROM `tbl_order` WHERE YEAR(date)= '$year';";
				$result = $this->db->select($query);
				if($result != false){
				$value = $result->fetch_assoc();
			
					return $value['total_sales'];
				}
	}

	if($table== "paypal" && !empty(trim($table))){
		
				//$query = "SELECT SUM(price) as total_sales FROM bitcoin_order";
				
				
				
				$query ="SELECT SUM(price) as total_sales FROM `tbl_paypal_order_details` WHERE YEAR(date)= '$year';";
				$result = $this->db->select($query);
				if($result != false){
				$value = $result->fetch_assoc();
			
					return $value['total_sales'];
				}
	}

}
 

	public function updateCartQuantity($cartId,$quantity){

		$cartId = mysqli_real_escape_string($this->db->link, $cartId);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);

	$query = "UPDATE tbl_cart

	SET
	quantity = '$quantity' 
	WHERE cartId = '$cartId'";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		//header("Location:cart.php");
			echo "<script>window.location.href='cart.php';</script>";
		
	} else{
			$msg = "<span class='error'>Quantity Not Updated !</span>";
				return $msg;
	}
	}


	public function delProductByCart($delId){

	$delId = mysqli_real_escape_string($this->db->link, $delId);
	$query = "DELETE FROM tbl_cart WHERE cartId = '$delId'";
	$deldata = $this->db->delete($query);
	if ($deldata) {
		echo "<script>window.location = 'cart.php';</script>";
	}else{
$msg = "<span class='error'>Product Not Deleted !</span>";
				return $msg;

	}
	}

	public function checkCartTable(){
	$sId  = session_id();
	$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	} 
 
	public function delCustomerCart(){
		$sId  = session_id();
		$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
		$this->db->delete($query);
	} 
   
	public function orderProduct($cmrId,$mop){
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
				
			$query = "INSERT INTO tbl_order(cmrId,productId,productName,variant_name, size_name, quantity,price,image,Mop) VALUES('$cmrId','$productId','$productName','$variant_name','$size_name','$quantity','$price','$image','$mop') ";
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
	
	
	public function payableAmount($cmrId){
	$query = "SELECT price FROM tbl_order WHERE cmrId = '$cmrId' AND date = now()";
	$result = $this->db->select($query);
	return $result;
	}

	public function getOrderedProduct($cmrId){
    $query = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId' ORDER BY date ASC ";
	$result = $this->db->select($query);
	return $result;

	} 
	public function checkOrder($cmrId){
	    $query = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function checkbitcoinOrder($cmrId){
	    $query = "SELECT * FROM bitcoin_order WHERE cmrId = '$cmrId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getAllOrderProduct(){
		//$query ="SELECT * FROM `tbl_order` GROUP BY date ORDER BY `tbl_order`.`date` DESC";
		
		$query = "SELECT * FROM tbl_order ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}
 
	public function productShifted($id){
		$id = mysqli_real_escape_string($this->db->link, $id);

	$query = "UPDATE tbl_order
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
 
	public function delProductShifted($id){
		
		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "DELETE FROM tbl_order WHERE id = '$id' ";
	    $deldata = $this->db->delete($query);
	    if ($deldata) {
		$msg = "<span class='success'>Data Deleted Successfully.</span>";
				return $msg;
	}else{
		$msg = "<span class='error'>Data Not Deleted !</span>";
				return $msg;

	}
	
	
	
	
	
	}
	
	
	
	public function insertToArchive($id){
		
		$query = "SELECT * FROM `tbl_order` WHERE id ='$id'";
		$mop = "COD";
		
		
		$getPro = $this->db->select($query);
		if ($getPro) {
			while ($result = $getPro->fetch_assoc()) {
				
				$cmrId = $result['cmrId'];
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];
				
				$variant_name= $result['variant_name'];
				$size_name = $result['size_name'];
				
			
				
				$date = $result['date'];
				
				
			$queryInsert = "INSERT INTO tbl_archive(cmrId,productId,productName,variant_name, size_name, quantity,price,image,date,Mop) VALUES('$cmrId','$productId','$productName','$variant_name','$size_name','$quantity','$price','$image','$date','$mop') ";
			$inserted_row = $this->db->insert($queryInsert);
		
	}
	
		}
	
	}
	
	

	public function productShiftConfirm($id){
	$id = mysqli_real_escape_string($this->db->link, $id);

	$query = "UPDATE tbl_order
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
}

?>