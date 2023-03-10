<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');


 
 


class AdminChanges{
	
private $db;
private $fm;

	public function __construct()
	{
		 
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	
	public function changepassword($data, $adminId ){
	
	
	
	$oldpassword = mysqli_real_escape_string($this->db->link, $data['oldpassword']);
	
	
	$newpassword = mysqli_real_escape_string($this->db->link, $data['newpassword']);
	
	
	
	if(empty(trim($oldpassword)) || empty(trim($newpassword)) ){
		
		
		$msg = "<span class='otp-error'>Fields must not be empty !</span>";
			 
					 return $msg;
	
	
	
	}
	else{
		
		
	$oldpassword_md5 = md5($oldpassword);
	$newpassword_md5 = md5($newpassword);
	
	
			//check old password
	$sql = "SELECT * FROM tbl_admin WHERE adminId  = '$adminId ' AND adminPassword = '$oldpassword_md5'";
	
				$result = $this->db->select($sql);
				//if old password is correct
				 if ($result != false) {
					 
				 	 
						//change old password to new pasword
						$query = "UPDATE tbl_admin SET adminPassword = '$newpassword_md5' WHERE adminId  = '$adminId '";

						$updated_row = $this->db->update($query);
						
						if ($updated_row) {
							
							$msg = "<span class='otp-success'>YOU'VE SUCCESSFULLY CHANGE YOUR PASSWORD </span>";
							
							return $msg ; 
						}
				
				} 
				 else{
					 
					 $msg = "<span class='otp-error'>OLD PASSWORD IS INCORRECT</span>";
					 
					 return $msg ; 
				 }
					 
		
		
	}
	
	
}

public function changeAdminForgotPassword($newpass,$code,$email){

		$newpassword_md5 = md5($newpass);

	//change old password to new pasword
	$query = "UPDATE tbl_admin SET adminPassword = '$newpassword_md5' WHERE adminEmail  = '$email'";

	$updated_row = $this->db->update($query);
						
	if ($updated_row) {
							
		$msg = "<span class='otp-success'>YOU'VE SUCCESSFULLY CHANGE YOUR PASSWORD</span><br><a href='login.php'>login here</a>";
							
		return $msg ; 
	}
	
} 

public function checkCode($code){
	
	$gencode = mysqli_real_escape_string($this->db->link, $code);
	 if(!empty(trim($gencode))){
		$sql = "SELECT * FROM tbl_emailgencode WHERE gencode = '$gencode'";
			$result = $this->db->select($sql);
			
			return $result;
			/*
			if ($result != false){
				return true;
		 }
	*/
	}

	
}

public function deleteGencode($adminEmail){
	
$delemail = mysqli_real_escape_string($this->db->link, $adminEmail);

	$query = "DELETE FROM tbl_emailgencode WHERE email = '$delemail'";
	$deldata = $this->db->delete($query);
	

}


}
?>