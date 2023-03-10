
<?php include '../classess/Adminlogin.php';?>

 
<?php $adminlogin = new Adminlogin(); ?> 

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $customerForgot = $adminlogin->forgotpassword($_POST);
}
?> 

    <div class="container otp-container">
        <h2>Enter Admin Email</h2>
		<div id="cye">You will receive an e-mail</div>
        <form action="" class="form otp-form" method="post">
		
            <input type="text" name="adminEmail" id="otp" placeholder="Enter Admin E-mail...">
			            
<br>
            <?php if(isset($customerForgot)){echo $customerForgot;} ?>
			<br>
            <button class="btn otp-submit" name="submit">Send</button>
        </form>
    </div>
	

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
.otp-form input[type="text"] {
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
.otp-form input[type="text"]:focus {
    border: 1px solid #1E1E1E;
    outline: none;
}

/* error message styles */
.otp-error {
    color: red;
    font-size: 14px;
    margin-bottom: 20px;
}

.otp-succes {
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