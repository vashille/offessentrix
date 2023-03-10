
<?php include './classess/CustomerChanges.php';?>
<?php
    $CustomerChanges = new CustomerChanges(); 
?>
<?php 
$msg= "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	
	
	$newpass =	$_POST['newpass'];
	$confirmpass=	$_POST['confirmpass'];
	$email = $_POST['email'];
	$code = $_GET['code'];
	
	
	if(!empty(trim($newpass)) || !empty(trim($confirmpass))){
	
		//check id new password and confirm password are the same
		if($newpass == $confirmpass){
		 
		
			$adch = $CustomerChanges->changeCustomerForgotPassword($newpass,$code,$email);
			
		// delete column from tbl_emailgencode table
			$CustomerChanges->deleteGencode($email);
		}
		else{
			
			$msg ="<span class='otp-error'>New and Confirm password did not match</span>";
			
		}

	}
	else{
		
		$msg="<span class='otp-error'>Field are empty</span>";
	}


    //$adminForgot = $AdminChanges->changeAdminForgotPassword($_POST);
}
?> 

<?php

if(isset($_GET['code'])){
	
	$code = $_GET['code'];
	
 	//check code in table tbl_emailgencode
	$check = $CustomerChanges->checkCode($code);
	
	if($check==true){
?>
	<?php $value = $check->fetch_assoc(); ?>
	
	
	
	
    <div class="container otp-container">
        <h2>Make your Password</h2>
		
        <form action="" class="form otp-form" method="post">
		
            <input type="password" name="newpass" id="otp" placeholder="Enter New Password...">
			<input type="password" name="confirmpass" id="otp" placeholder="Enter Confirm Password...">           
			<input type="hidden" name="email"  value="<?php echo $value['email']; ?>">           
<br>
            <?php if(isset($adch)){
				echo $adch;
			
			
			}
			if($msg){
				echo $msg;
			}

			?>
			<br>
            <button class="btn otp-submit" name="submit">Change</button>
        </form>
    </div>

<?php
} else {?>

<script> window.location.href="login.php"; </script>
<?php } } ?>






<style>
/* container styles */
.otp-container {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
    font-family: Arial, sans-serif;
}

/* form styles */
.otp-form {
    margin-top: 20px;
}

/* input styles */
.otp-form input[type="password"] {
    width: 80%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1em;
    font-weight: bold;
    color: #1E1E1E;
    background-color: #F8F8F8;
}
.otp-form input[type="password"]:focus {
    border: 1px solid #1E1E1E;
    outline: none;
}

/* error message styles */
.otp-error {
    color: red;
    font-size: 14px;
    margin-bottom: 20px;
}
.otp-success {
    color: green;
    font-size: 14px;
    margin-bottom: 20px;
}
/* button styles */
.otp-submit {
    width: 20%;
    background-color: #1E1E1E;
    color: #F8F8F8;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1em;
    font-weight: bold;
}
.otp-submit:hover {
    background-color: #ccc;
    color: #1E1E1E;
}

/* Additional styles */
#cye {
    font-size: 0.9em;
    margin-bottom: 10px;
    color: #1E1E1E;
}
</style>

