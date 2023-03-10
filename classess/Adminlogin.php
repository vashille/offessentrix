<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/vendor/autoload.php';

?>



<?php
 
 
class Adminlogin
{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}






	public function adminlogin($adminUser,$adminPassword){

		$adminUser = $this->fm->validation($adminUser);
		$adminPassword = $this->fm->validation($adminPassword);

		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);

		if (empty($adminUser) || empty($adminPassword) ) {
	
			$loginmsg = "Username or Password must not be empty !";
			return $loginmsg;
			
		} else{


			$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser'
			AND adminPassword = '$adminPassword'";

			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();
				
					 $adminEmail=   $value['adminEmail'];
					 $adminId=  $value['adminId'];
				//send otp to e-mail
				$this->sendOtpMailAdmin($adminEmail, $adminId);
	
				header("Location:otpadmin.php?id=".$adminId);
				
				/*
				Session::set("adminlogin",true);
				Session::set("adminId",$value['adminId']);
				Session::set("adminUser",$value['adminUser']);
				Session::set("adminName",$value['adminName']);

				header("Location:dashboard.php");
				
				*/
			} else{
				$loginmsg = "Username or Password not match !";
				return $loginmsg;
			}


		}

	}
	
	
	
	
public function sendOtpMailAdmin($adminEmail, $adminId){
	
	// send otp to email
	
	$mail = new PHPMailer(true);

	$otp = rand(111111, 999999);


try{
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Username ='tenratorrr@gmail.com';
$mail->Password = 'kseegfdyqnriggnj';
$mail->SMTPAuth=true;
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->setFrom('tenratorrr@gmail.com', 'OTP');
$mail->addAddress($adminEmail);
$mail->isHTML(true);
$mail->Subject='Your OTP Code';
$mail->Body = "Here is your OTP code: <br> $otp";
$mail->send();
}catch(Exception $e)
    {echo $e;}

// update cutomer otp
$this->updateAdminOtp($otp,$adminId);
	
	
}
	
	
	public function updateAdminOtp($otp,$adminId){
	
	
	$query = "UPDATE tbl_admin SET otp = '$otp'  WHERE adminId  = '$adminId '";
	$updated_row = $this->db->update($query);
	
}
	
	
	
	public function verifyOtp($data){
	
	$adminId = $data['id'];
	$otp = $data['otp'];
	
	$query = "SELECT * FROM tbl_admin WHERE adminId = '$adminId' AND otp = '$otp'";
	$result = $this->db->select($query);
	
	if($result==true){
		$value = $result->fetch_assoc();
		// SET ADMIN LOGIN SESSION
				Session::set("adminlogin",true);
				Session::set("adminId",$value['adminId']);
				Session::set("adminUser",$value['adminUser']);
				Session::set("adminName",$value['adminName']);

				header("Location:dashboard.php");
		
		
	}
	else{
		
		$msg ="Wrong OTP";
		return $msg;
		
	}
	
	
}



 public function forgotpassword($data){
	 
	
	
	$adminEmail = $this->fm->validation($data['adminEmail']);
	

	$adminEmail = mysqli_real_escape_string($this->db->link, $adminEmail);
	
	
		if (empty($adminEmail) ) {
	
			$loginmsg = "<span class='otp-error'>Email must not be empty !</span>";
			
			return $loginmsg;
			
		} else{
			
			
		if (!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/", $adminEmail)) {
				
				
				$msg = "<span class='otp-error'>Admin Email is invalid</span>";
			 
			 return $msg;
				
		} 

			$query = "SELECT * FROM tbl_admin WHERE adminEmail = '$adminEmail'";

			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();
				
					 $adminEmail_val=   $value['adminEmail'];
					 
					 //send link to email
					 
				 	 $gencode = rand(111111, 999999);
					 
					 
					 //insert to table 
					 $this->insertTotbl_emailgencode($adminEmail,$gencode);
					 
					 //send URL change password to admin email 
					$this->sendURLToMailAdmin($adminEmail_val,$gencode); 
					
				$msg = "<span class='otp-success'>Successfully Sent!</span>";
			 
			 return $msg; 
					 
					 
			}
			else{
				
			$msg = "<span class='otp-error'>Email could not found!</span>";
			 
			 return $msg;
			}
		}
	
	 
 }
 

public function insertTotbl_emailgencode($adminEmail,$gencode){
	
	//tbl_emailgencode
	
	// delete column from tbl_emailgencode table
	$this->deleteGencode($adminEmail);
	
	
	// insert email and gencode to tbl_emailgencode table
	$query = "INSERT INTO tbl_emailgencode(email,gencode) VALUES('$adminEmail','$gencode')";

	 $inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				
				
				
			}
	

}

public function deleteGencode($adminEmail){
	
$delemail = mysqli_real_escape_string($this->db->link, $adminEmail);

	$query = "DELETE FROM tbl_emailgencode WHERE email = '$delemail'";
	$deldata = $this->db->delete($query);
	

}

public function sendURLToMailAdmin($adminEmail,$gencode)
{
	$url_link =$_SERVER['HTTP_HOST'].'/shop/admin/adminchangepassword.php?code='.$gencode;
	// send otp to email
	
	$mail = new PHPMailer(true);

	//$gencode = rand(111111, 999999);
	

try{
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Username ='tenratorrr@gmail.com';
$mail->Password = 'kseegfdyqnriggnj';
$mail->SMTPAuth=true;
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->setFrom('tenratorrr@gmail.com', 'Make New Password');
$mail->addAddress($adminEmail);
$mail->isHTML(true);
$mail->Subject='Make your new password';
$mail->Body = "Click this link to make your new password: <br> <a href='$url_link'>Change your password here..</a>";
$mail->send();
}catch(Exception $e)
    {echo $e;}


	
	
}
	
	
}


?>