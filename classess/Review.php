<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>


<?php

class Review{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
		
	}
	
	public function showproduct($id){
	$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function showProductReview($productId){
		
		$query = "SELECT * FROM tbl_review WHERE  productId =$productId";
		$result = $this->db->select($query);
		return $result;
	}
	 
	
	public function insertReview($productId,$productName,$image,$body,$rating, $login){
		
		
		
		
		
		$productId = $this->fm->validation($productId);
		$productName= $this->fm->validation($productName);

		$image = $this->fm->validation($image);
		$body= $this->fm->validation($body);

		$rating= $this->fm->validation($rating);
		$login= $this->fm->validation($login);

		 $productIdv = mysqli_real_escape_string($this->db->link, $productId);
		 $productNamev = mysqli_real_escape_string($this->db->link, $productName);
		$imagev = mysqli_real_escape_string($this->db->link, $image);
		$bodyv = mysqli_real_escape_string($this->db->link, $body);
		 $ratingv = mysqli_real_escape_string($this->db->link, $rating);
		$cmrId = mysqli_real_escape_string($this->db->link, $login);
		
		
		
		
		
		$query = "INSERT INTO tbl_review(productId,productName,image,body,rating, cmrId) VALUES('$productIdv' ,'$productNamev' , '$imagev', '$bodyv', '$ratingv', '$cmrId')";

		$inserted_row = $this->db->insert($query);
		
		if ($inserted_row) {
		
		
	}
	
	
}
}
	?>
	
	
	
	

	
