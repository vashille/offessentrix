<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>

<?php

class Product{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	 
	 
	 
	 public function deleteVariant($variant_id){
		 
		 
		 $delquery = "DELETE FROM tbl_variant WHERE variant_id = '$variant_id'";
		$deldata = $this->db->delete($delquery);

		 
	 }
	 
	  public function deletesize($sizeid){
		 
		 $delquery_size = "DELETE FROM tbl_sizes WHERE 	sizeid = '$sizeid'";
		$deldata_size = $this->db->delete($delquery_size);
		
		
		 $delquery_variant = "DELETE FROM tbl_variant WHERE size_id = '$sizeid'";
		$deldata_variant = $this->db->delete($delquery_variant);
		
	 }
	
	public function sizeUpdate($sizeid,$sizename){
		
		
		$query = "UPDATE tbl_sizes 
		SET
		sizename = '$sizename'
		WHERE sizeid = '$sizeid'";

		$updatedted_row = $this->db->update($query);
		
	}
	
	
	public function variationUpdate($variant_id ,$variant_name,$stocks){
		
	$query = "UPDATE tbl_variant 
		SET
		
		variant_name = '$variant_name',
		stocks	 = '$stocks'
		
		
		WHERE variant_id  = '$variant_id '";

		$updatedted_row = $this->db->update($query);
		
		
		
		
	}
	
	
	 
	public function variantShowTOEdit($sizeid){
		
		
		
		 
		$query = "SELECT tbl_sizes.sizeid AS sizeid, tbl_sizes.productid AS productid, tbl_sizes.sizename AS sizename, tbl_variant.variant_id  AS variant_id,
		tbl_variant.size_id AS variant_size_id , tbl_variant.product_id AS variantproduct_id, tbl_variant.variant_name AS variant_name , tbl_variant.stocks AS Stocks
		FROM tbl_sizes INNER JOIN tbl_variant ON tbl_sizes.sizeid=tbl_variant.size_id 
		WHERE tbl_sizes.sizeid ='$sizeid' 
		GROUP BY tbl_variant.variant_id ORDER BY `tbl_variant`.`stocks` ASC";
		
		$result = $this->db->select($query);
		return $result;
		
	} 
	 
	
	public function sizesShowbySizeId($sizeid){
		$query = "SELECT * FROM `tbl_sizes` WHERE sizeid ='$sizeid'";
		
		$result = $this->db->select($query);
		return $result;
		
	}
	
	public function showVariantbySizeid($sizeid){
		
		$query = "SELECT * FROM `tbl_variant` WHERE size_id ='$sizeid'";
		
		$result = $this->db->select($query);
		return $result;
		
	}
	
	public function showVariantbyVariantid($variant_id){
		
		$query = "SELECT * FROM `tbl_variant` WHERE variant_id  ='$variant_id'";
		
		$result = $this->db->select($query);
		return $result;
		
	}
	
	
	public function sizesShowbypProductId($productid){
		$query = "SELECT * FROM `tbl_sizes` WHERE productid ='$productid' GROUP BY sizename	";
		
		$result = $this->db->select($query);
		return $result;
		
	}
	
	
	public function variantInsert($variantid,$sizeid, $productid, $variantname, $stocksValue){
		
		
		
		$variant_id = mysqli_real_escape_string($this->db->link, $variantid);
		$size_id = mysqli_real_escape_string($this->db->link,$sizeid);
		$product_id = mysqli_real_escape_string($this->db->link,$productid);
		$variant_name =  mysqli_real_escape_string($this->db->link,$variantname);
		$stocks =  mysqli_real_escape_string($this->db->link,$stocksValue);
		
		
		 $query = "INSERT INTO tbl_variant (variant_id, size_id, product_id, variant_name, stocks)VALUES('$variant_id', '$size_id', '$product_id', '$variant_name', '$stocks') ";

	 $inserted_row = $this->db->insert($query);
	 /*
			if ($inserted_row) {
				//$msg = "<span class='success'>Product inserted Successfully.</span>";
				return $msg;
			} else{
				//$msg = "<span class='error'>Product Not inserted.</span>";
				return $msg;
		}
		*/
	}
	
	
	
	public function sizesInsert($size_id,$product_id, $size_name){
		
		
		$sizeid = mysqli_real_escape_string($this->db->link, $size_id);
		
		$productid = mysqli_real_escape_string($this->db->link, $product_id);
		
		$sizename = mysqli_real_escape_string($this->db->link, $size_name);
		
		
		
		
		
	 $query = "INSERT INTO tbl_sizes (sizeid, productid, sizename)VALUES('$sizeid', '$productid', '$sizename') ";

	 $inserted_row = $this->db->insert($query);
	 /*
			if ($inserted_row) {
				//$msg = "<span class='success'>Product inserted Successfully.</span>";
				return $msg;
			} else{
				//$msg = "<span class='error'>Product Not inserted.</span>";
				return $msg;
		}
		*/
	}
		
		
	
	
	
	
	
	public function productInsert($data,$file,$productId){
		
		

		
	

	$productName = $this->fm->validation($data['productName']);
	$catId = $this->fm->validation($data['catId']);

	$body = $this->fm->validation($data['body']);
	$price = $this->fm->validation($data['price']);
	$type = $this->fm->validation($data['type']);
	

	$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
	$catId       = mysqli_real_escape_string($this->db->link, $data['catId']);

	$body        = mysqli_real_escape_string($this->db->link, $data['body']);
	$price       = mysqli_real_escape_string($this->db->link, $data['price']);
	$type        = mysqli_real_escape_string($this->db->link, $data['type']);


    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;
/*
	echo $productName.'<br>';
	echo $catId.'<br>';
	echo $body.'<br>';
	echo $price.'<br>';
	echo $file_name.'<br>';
	echo $type.'<br>';
	echo $stocks ;
	*/

if($productName=="" || $catId=="Select Category" || $body=="" || $price=="" || $file_name==""  || $type==="Select Type" || $price <= 0  ) {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}
elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";


}else{

	 move_uploaded_file($file_temp, $uploaded_image);
	 
	 $query = "INSERT INTO tbl_product(productId ,productName,catId,body,price,image, type) VALUES('$productId' ,'$productName','$catId','$body','$price','$uploaded_image','$type') ";

	 $inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				$msg = "<span class='success'>Product inserted Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not inserted.</span>";
				return $msg;
		}
		
		/*
		$stock_id =
		$stock_productid =
		$stock_count =
		$stock_type = 
		
		
		 $query_stocks = "INSERT INTO tbl_stocks(stock_id ,stock_productid,stock_count,stock_type) VALUES('$stock_id' ,'$stock_productid','$stock_count','$stock_type') ";

		$query_stocks = $this->db->insert($query);
		
		*/
		
		}


}

public function getAllProduct(){

$query = "SELECT p.*,c.catName
FROM tbl_product as p,tbl_category as c
WHERE p.catId = c.catId 
ORDER BY p.productId DESC";



	$result = $this->db->select($query);
	return $result;
}

public function getProById($id){

	$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
	$result = $this->db->select($query);
	return $result;

}

public function productUpdate($data,$file,$id){

$productName = $this->fm->validation($data['productName']);
$catId = $this->fm->validation($data['catId']);

$body = $this->fm->validation($data['body']);
$price = $this->fm->validation($data['price']);
$type = $this->fm->validation($data['type']);




$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
$catId       = mysqli_real_escape_string($this->db->link, $data['catId']);

$body        = mysqli_real_escape_string($this->db->link, $data['body']);
$price       = mysqli_real_escape_string($this->db->link, $data['price']);
$type        = mysqli_real_escape_string($this->db->link, $data['type']);



    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;





if($productName=="" || $catId=="Select Category" || $body=="" || $price=="" || $type==="Select Type" || $price <= 0) {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;


}else{
if (!empty($file_name)) {
	



if ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";


}else{

	 move_uploaded_file($file_temp, $uploaded_image);


	 $query = "UPDATE tbl_product 
	 SET
	 productName = '$productName',
	 catId       = '$catId',
	  body        = '$body',
	 price       = '$price',
	 image       = '$uploaded_image',
	 type        = '$type'
	 WHERE productId = '$id'";

	 $updatedted_row = $this->db->update($query);
			if ($updatedted_row) {
				$msg = "<span class='success'>Product Updated Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Updated.</span>";
				return $msg;
		}
		}
}else{

	 $query = "UPDATE tbl_product 
	 SET
	 productName = '$productName',
	 catId       = '$catId',
	
	 body        = '$body',
	 price       = '$price',
	 type        = '$type'

	 WHERE productId = '$id'";

	 $updatedted_row = $this->db->update($query);
			if ($updatedted_row) {
				$msg = "<span class='success'>Product Updated Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Updated.</span>";
				return $msg;
		}
}

}
}
 
public function delProById($id){
	
	
$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
$getData = $this->db->select($query);
if ($getData) {
while ($delImg = $getData->fetch_assoc()) {
$dellink = $delImg['image'];
unlink($dellink);

}

}

$delquery = "DELETE FROM tbl_product where productId = '$id'";
$deldata = $this->db->delete($delquery);
	if ($deldata) {
		$msg = "<span class='success'>Product Deleted Successfully.</span>";
				return $msg;
	}else{
$msg = "<span class='error'>Product Not Deleted !</span>";
				return $msg;
 
	}

}

 
public function delectSizesVariantByProductId($id){
	
	
	$delquery_variant = "DELETE FROM tbl_variant WHERE product_id = '$id'";
	$deldatavariant = $this->db->delete($delquery_variant);
	
	
	
	$delquery_sizes = "DELETE FROM tbl_sizes WHERE productid = '$id'";
	$deldatasizes = $this->db->delete($delquery_sizes);
	
	
}






public function getFeaturedProduct(){

	$query = "SELECT * FROM tbl_product WHERE type = '0' ORDER BY productId ASC LIMIT 4";
	$result = $this->db->select($query);
	return $result;
}
 
public function getNewProduct(){
   $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
	$result = $this->db->select($query);
	return $result;
 
}

public function getSingleProduct($id){

	$query = "SELECT p.*,c.catName
FROM tbl_product as p,
tbl_category as c
WHERE p.catId = c.catId AND p.productId = '$id'";
	$result = $this->db->select($query);
	return $result;
}

public function lastetTops(){
	$query = "SELECT * FROM tbl_product WHERE catId = '10' ORDER BY productId DESC LIMIT 1";
	$result = $this->db->select($query);
	return $result;
}
public function lastestCaps(){
	$query = "SELECT * FROM tbl_product WHERE catId = '8' ORDER BY productId DESC LIMIT 1";
	$result = $this->db->select($query);
	return $result;
}
public function lastestShorts(){
	$query = "SELECT * FROM tbl_product WHERE catId = '9' ORDER BY productId DESC LIMIT 1";
	$result = $this->db->select($query);
	return $result;
}
public function lastestMask(){
	$query = "SELECT * FROM tbl_product WHERE catId = '7' ORDER BY productId DESC LIMIT 1";
	$result = $this->db->select($query);
	return $result;
}

public function productByCat($id, $price){
	
	//ORDER BY `tbl_product`.`price` DESC - highes
	//SELECT * FROM `tbl_product` WHERE catId =10 ORDER BY `tbl_product`.`price` ASC; - lowet

if($price=="lowest"){
	
$catId       = mysqli_real_escape_string($this->db->link,$id);

$query       = "SELECT * FROM tbl_product WHERE catId = '$catId'  ORDER BY `tbl_product`.`price` ASC";

$result      = $this->db->select($query);
 
}


if($price=="highest"){
	
	$catId       = mysqli_real_escape_string($this->db->link,$id);

	$query       = "SELECT * FROM tbl_product WHERE catId = '$catId'  ORDER BY `tbl_product`.`price` DESC  ";

	$result      = $this->db->select($query);
	
}


if($price=="all"){
	
	$catId       = mysqli_real_escape_string($this->db->link,$id);

	$query       = "SELECT * FROM tbl_product WHERE catId = '$catId'";

	$result      = $this->db->select($query);
	
}





return $result;	 




}

public function insertCompareData($cmprid,$cmrId){
	$cmrId     = mysqli_real_escape_string($this->db->link,$cmrId);
	$productId = mysqli_real_escape_string($this->db->link,$cmprid);

	$cquery = "SELECT * FROM tbl_compare WHERE cmrId = '$cmrId' AND productId = '$productId'";
	$check = $this->db->select($cquery);
	if ($check) {
		$msg = "<span class='error'>Already Added !</span>";
				return $msg;
	}
	$query = "SELECT * FROM tbl_product WHERE productId = '$productId'";
	$result = $this->db->select($query)->fetch_assoc();
	if ($result) {
		$productId = $result['productId'];
		$productName = $result['productName'];
		$price = $result['price'];
		$image = $result['image'];

		$query = "INSERT INTO tbl_compare(cmrId,productId,productName,price,image)VALUES
			('$cmrId','$productId','$productName','$price','$image')";
			$inserted_row = $this->db->insert($query);

			if ($inserted_row) {
				
	$msg = "<span class='success'>Added ! Check Compare Page</span>";
				return $msg;
	}else{
$msg = "<span class='error'>Not Added !</span>";
				return $msg;

	}
	}
}

public function getCompareData($cmrId){
	$query = "SELECT * FROM tbl_compare WHERE cmrId = '$cmrId' ORDER BY id desc";
	$result = $this->db->select($query);
	return $result;
}

public function delCompareData($productId){
	$query = "DELETE FROM tbl_compare WHERE productId = '$productId'";
	$deldata = $this->db->delete($query);
}

public function saveWishListData($id,$cmrId){


	$cquery = "SELECT * FROM tbl_wlist WHERE cmrId = '$cmrId' AND productId = '$id'";
	$check = $this->db->select($cquery);
	if ($check) {
		$msg = "<span class='error'>Already Added !</span>";
				return $msg;
	}
	$pquery = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$result = $this->db->select($pquery)->fetch_assoc();
		if ($result) {
				$productId = $result['productId'];
				$productName = $result['productName'];
				$price = $result['price'];
				$image = $result['image'];

				$query = "INSERT INTO tbl_wlist(cmrId,productId,productName,price,image) VALUES('$cmrId','$productId','$productName','$price','$image') ";
			$inserted_row = $this->db->insert($query);

	if ($inserted_row) {
				
	$msg = "<span class='success'>Added ! Check wishlist Page</span>";
		return $msg;
	}else{
   $msg = "<span class='error'>Not Added !</span>";
		return $msg;
	}
 }
}







public function checkWlistData($cmrId){
	$query = "SELECT * FROM tbl_wlist WHERE cmrId = '$cmrId' ORDER BY id desc";
	$result = $this->db->select($query);
	return $result;	
}
public function delWlistData($cmrId, $productId){
	$query = "DELETE FROM tbl_wlist WHERE cmrId = '$cmrId' AND productId = '$productId'";
	$delete = $this->db->delete($query);
}












public function getCategoryShorts(){

	$query = "SELECT * FROM tbl_product WHERE catId = '9' ORDER BY productId DESC LIMIT 4";
	$result = $this->db->select($query);
	return $result;
}


public function getCategoryCaps(){

	$query = "SELECT * FROM tbl_product WHERE catId = '8' ORDER BY productId DESC LIMIT 4";
	$result = $this->db->select($query);
	return $result;
}

public function getCategoryMask(){

	$query = "SELECT * FROM tbl_product WHERE catId = '7' ORDER BY productId DESC LIMIT 4";
	$result = $this->db->select($query);
	return $result;
}

public function getCategoryTops(){
	
	$query =  "SELECT tbl_category.catId AS catId, tbl_category.catName As catName, tbl_product.image as image
 FROM `tbl_category` INNER JOIN tbl_product ON tbl_category.catId = tbl_product.catId GROUP BY tbl_category.catId;";
 
	//$query = "SELECT * FROM tbl_product WHERE catId = '10' ORDER BY productId DESC LIMIT 4";
	$result = $this->db->select($query);
	return $result;
}


public function Allproduct(){
	$query = "SELECT * FROM tbl_product";
	$result = $this->db->select($query);
	return $result;
}


public function lowprice(){
	
	$query = "SELECT * FROM `tbl_product` ORDER BY `tbl_product`.`price` ASC";
	$result = $this->db->select($query);
	return $result;
	
	
}


public function highestprice(){
	
	$query = "SELECT * FROM `tbl_product` ORDER BY `tbl_product`.`price` DESC";
	$result = $this->db->select($query);
	return $result;
	
	
}

}

?>