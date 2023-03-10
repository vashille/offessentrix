<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>


<?php

class CustomerAdmin{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
		
	}
	
	public function getCustomerData($id){
	$query = "SELECT * FROM tbl_customer WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
}
	}
	?>