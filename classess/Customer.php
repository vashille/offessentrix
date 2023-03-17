<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/vendor/autoload.php';



?>


<?php

class Customer{
	
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
public function customerRegistration($data){

$name = mysqli_real_escape_string($this->db->link, $data['name']);
$address = mysqli_real_escape_string($this->db->link, $data['address']);
$city = mysqli_real_escape_string($this->db->link, $data['city']);
$country = mysqli_real_escape_string($this->db->link, $data['country']);
$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));





if (empty(trim($name))  || empty(trim($address))  || empty(trim($city))  || empty(trim($country)) || empty(trim($zip)) || empty(trim($phone))  || empty(trim($email))  || empty(trim($pass))) {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}






  $mailquery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
  $mailchk = $this->db->select($mailquery);
  if ($mailchk != false) {
  	$msg = "<span class='error'>Email already exist !</span>";
	return $msg;
  }else{


  	 $query = "INSERT INTO tbl_customer(name,address,city,country,zip,phone,email,pass) VALUES('$name','$address','$city','$country','$zip','$phone','$email','$pass')";

	 $inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				
				//$msg = "<span class='success'>Customer Data inserted Successfully.</span>";
				
				//check email
				
				$sql = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
				$result = $this->db->select($sql);
				 if ($result != false) {
					 $value = $result->fetch_assoc();
					 $email=   $value['email'];
					 $cmrId=  $value['id'];
					
					
					  //redirect to verify otp page
					  
					  echo "<script> window.location.href ='otp.php?id='+$cmrId;  </script>";
					  //header("Location:otp.php");
					  //die();
				 }
			
				//return $msg;
			} else{
				$msg = "<span class='error'>Customer Data Not inserted.</span>";
				return $msg;
		}
  }
  
} 

public function customerLogin($data){
	
	
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$pass = mysqli_real_escape_string($this->db->link, $data['pass']);


if (empty(trim($email)) || empty(trim($pass))) {
$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}

	$pass_md5 = md5($pass);
	
	$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$pass_md5'";
	$result = $this->db->select($query);


	if($result != false){
		$value = $result->fetch_assoc();
	
		//send otp to e-mail
		$this->sendOtpMail($email,$value['id'],$value['phone']);
		
		
		
		
		header("Location:otp.php?id=".$value['id']);
	
		die();
	}else{
		$msg = "<span class='error'>Email or Password not matched !</span>";
				return $msg;
	}


/*
if ($result != false) {
	$value = $result->fetch_assoc();
	Session::set("cuslogin",true);
	Session::set("cmrId",$value['id']);
	Session::set("cmrName",$value['name']);
	header("Location:cart.php");

}else{
	$msg = "<span class='error'>Email or Password not matched !</span>";
				return $msg;
}


*/



}


public function sendOtpMail($email, $cmrId,$cellnumber){
	
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
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject='Your OTP Code';
$mail->Body = "Here is your OTP code: <br> $otp";
$mail->send();
}catch(Exception $e)
    {echo $e;}


// update cutomer otp

$this->updateCustomerOtp($otp,$cmrId);
	
	
}




 

public function updateCustomerOtp($otp,$cmrId){
	
	
	$query = "UPDATE tbl_customer SET otp = '$otp'  WHERE id = '$cmrId'";
	$updated_row = $this->db->update($query);
	
}

public function verifyOtp($data){
	
	$cmrId = $data['id'];
	$otp = $data['otp'];
	
	$query = "SELECT * FROM tbl_customer WHERE id = '$cmrId' AND otp = '$otp'";
	$result = $this->db->select($query);
	
	if($result==true){
		
		$value = $result->fetch_assoc();
		Session::set("cuslogin",true);
		Session::set("cmrId",$value['id']);
		Session::set("cmrName",$value['name']);
		
		header("Location:cart.php");
		
	}
	else{
		
		$msg ="Wrong OTP";
		return $msg;
		
	}
	
	
}








public function customerUpdate($data,$cmrId){

$name = mysqli_real_escape_string($this->db->link, $data['name']);
$address = mysqli_real_escape_string($this->db->link, $data['address']);
$city = mysqli_real_escape_string($this->db->link, $data['city']);
$country = mysqli_real_escape_string($this->db->link, $data['country']);
$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
$email = mysqli_real_escape_string($this->db->link, $data['email']);


if (empty(trim($name)) || empty(trim($address)) || empty(trim($city)) || empty(trim($country))  || empty(trim($zip)) || empty(trim($phone)) || empty(trim($email))) {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}else{


  	

	$query = "UPDATE tbl_customer

	SET
	name = '$name',
	address = '$address', 
	city = '$city', 
	country = '$country', 
	zip = '$zip', 
	phone = '$phone', 
	email = '$email' 

	WHERE id = '$cmrId'";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success'>Customer Data Updated Successfully.</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Customer Data Not Updated !</span>";
				return $msg;
	}
  }
}



public function changepassword($data, $cmrId){
	
	
	
	$oldpassword = mysqli_real_escape_string($this->db->link, $data['oldpassword']);
	
	
	$newpassword = mysqli_real_escape_string($this->db->link, $data['newpassword']);
	
	
	
	if(empty(trim($oldpassword)) || empty(trim($newpassword)) ){
		
		
		$msg = "<span class='error'>Fields must not be empty !</span>";
			 
					 return $msg;
	
	
	
	}
	else{
		
		
	$oldpassword_md5 = md5($oldpassword);
	$newpassword_md5 = md5($newpassword);
	
	
			//check old password
	$sql = "SELECT * FROM tbl_customer WHERE id = '$cmrId' AND pass = '$oldpassword_md5'";
	
				$result = $this->db->select($sql);
				//if old password is correct
				 if ($result != false) {
					 
					 
						//change old password to new pasword
						$query = "UPDATE tbl_customer SET pass = '$newpassword_md5' WHERE id = '$cmrId'";

						$updated_row = $this->db->update($query);
						
						if ($updated_row) {
							
							$msg = "<span class='success'>YOU'VE SUCCESSFULLY CHANGE YOUR PASSWORD</span>";
							
							return $msg ; 
						}
				
				} 
				 else{
					 
					 $msg = "<span class='error'>OLD PASSWORD IS INCORRECT</span>";
					 
					 return $msg ; 
				 }
					 
		
		
	}
	
	
}




public function forgotpassword($data){
	 
	
	
	$email = $this->fm->validation($data['email']);
	

	$email = mysqli_real_escape_string($this->db->link, $email);
	
	
		if (empty($email) ) {
	
			$loginmsg = "<span class='otp-error'>Email must not be empty !</span>";
			
			return $loginmsg;
			
		} else{
			
			
		if (!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/", $email)) {
				
				
				$msg = "<span class='otp-error'> Email is invalid</span>";
			 
			 return $msg;
				
		} 

			$query = "SELECT * FROM tbl_customer WHERE email = '$email'";

			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();
				
					 $email_val=   $value['email'];
					 
					 //send link to email
					 
				 	 $gencode = rand(111111, 999999);
					 
					 
					 //insert to table 
					 $this->insertTotbl_emailgencode($email,$gencode);
					 
					 //send URL change password to admin email 
					$this->sendURLToMailCustomer($email_val,$gencode); 
					
				$msg = "<span class='otp-success'>Successfully Sent!</span>";
			 
			 return $msg; 
					 
					 
			}
			else{
				
			$msg = "<span class='otp-error'>Email could not found!</span>";
			 
			 return $msg;
			}
		}
	
	 
 }
 

public function insertTotbl_emailgencode($email,$gencode){
	
	//tbl_emailgencode
	
	// delete column from tbl_emailgencode table
	$this->deleteGencode($email);
	
	
	// insert email and gencode to tbl_emailgencode table
	$query = "INSERT INTO tbl_emailgencode(email,gencode) VALUES('$email','$gencode')";

	 $inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				
				
				
			}
	

}

public function deleteGencode($email){
	
$delemail = mysqli_real_escape_string($this->db->link, $email);

	$query = "DELETE FROM tbl_emailgencode WHERE email = '$delemail'";
	$deldata = $this->db->delete($query);
	

}

public function sendURLToMailCustomer($email,$gencode)
{
	$url_link =$_SERVER['HTTP_HOST'].'/shop/customerchangepassword.php?code='.$gencode;
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
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject='Make your new password';
$mail->Body = "Click this link to make your new password: <br> <a href='$url_link'>Change your password here..</a>";
$mail->send();
}catch(Exception $e)
    {echo $e;}


	
	
}











}

?>
