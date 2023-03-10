<?php

class Archive{
	
private $db;
private $fm;

	public function __construct()
	{
		 
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllArchiveProduct(){
		//$query ="SELECT * FROM `tbl_order` GROUP BY date ORDER BY `tbl_order`.`date` DESC";
		
		$query = "SELECT * FROM tbl_archive ORDER BY date ASC";
		$result = $this->db->select($query);
		return $result;
	}

public function insertToArchive($id,$mop){
		
		if($mop=="COD"){
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
		
		if($mop=="Bitcoin"){
			$query = "SELECT * FROM `bitcoin_order` WHERE id ='$id'";
			$mop = "Bitcoin";
			
			
				$getPro = $this->db->select($query);
		if ($getPro) {
			while ($result = $getPro->fetch_assoc()){
				
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
		if($mop=="Paypal"){
			
			$query = "SELECT * FROM `tbl_paypal_order_details` WHERE transaction_id	 ='$id'";
			$mop = "Paypal";
			
			
			
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
				
				$transaction_id = 	$result['transaction_id'];
				
			$queryInsert = "INSERT INTO tbl_archive(cmrId,productId,productName,variant_name, size_name, quantity,price,image,date,Mop,transaction_id) VALUES('$cmrId','$productId','$productName','$variant_name','$size_name','$quantity','$price','$image','$date','$mop','$transaction_id')";
			$inserted_row = $this->db->insert($queryInsert);
		
			}
			
			
		}
		
		
		
	
	
		}
	
	}
	
}