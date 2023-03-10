<?php include 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == true) {
	header("Location:order.php");
}
 ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $custLogin = $cmr->customerLogin($_POST);
}

?>  

 <div class="main">
    <div class="content">
    	 <div class="login_panel">

    	 	<?php 

    		if (isset($custLogin)) {
    			echo $custLogin;
    		}
    		 ?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input name="email" placeholder="Email" type="text"/>
                    <input name="pass" placeholder="Password" type="password"/>
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div>
					<a href="cusforgotpassword.php">Forgot Password</a>
					</div>
                      </div>
                 </form>
                 
                    
                  


<?php 

	$name ="";
	$country = "";
	$address = "";
	$email = "";
	$zip = "";
	$city = "";
	$phone = "";
	
	
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
	
	
/*	
	if(preg_match('/[^0-9]/', '',$phone)) { 

$msg = "<span class='error'>Incorrect Phone number</span>";
return $msg;

}
	$_POST["name"];
	$_POST["city"];
	$_POST["zip"];
	$_POST["email"];
	$_POST["address"];
	$_POST["country"];
	$_POST["phone"];
*/	
	
	
	
	
	$name = $_POST["name"];	
	$country = $_POST["country"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$zip = $_POST["zip"];
	$city = $_POST["city"];
	$phone = $_POST["phone"];
	
if(!preg_match('/^\d+$/',$_POST["phone"])){ 

	$msgphone= "<span class='error'>Phone numbers should consist of numbers</span>";
	//return $msg;

}



if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "<span class='error'>Invalid Email format</span>";
}



if(!preg_match('/^\d+$/',$_POST["zip"])){
	
		$msgzip= "<span class='error'>Zip code should consist of numbers</span>";
	
}


if(preg_match('/^\d+$/',$_POST["zip"])&& filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && preg_match('/^\d+$/',$_POST["phone"])){
	

	$customerReg = $cmr->customerRegistration($_POST);
	
}

	
	
	
	
	
    
}

?>          
    	<div class="register_account">
    		<?php 

    		if (isset($customerReg)) {
    			echo $customerReg;
    		}
    		 ?>
			 
			 <?php  if(isset($msgphone)){ ?> 
			 
				<?php echo $msgphone.'<br>'; ?>
			 
			 <?php } ?> 
			 
			 
			 
			 <?php  if(isset($emailErr)){ ?> 
			 
				<?php echo $emailErr.'<br>'; ?>
			 
			 <?php } ?> 
			 
			  <?php  if(isset($msgzip)){ ?> 
			 
				<?php echo $msgzip.'<br>'; ?>
			 
			 <?php } ?> 
			 
    		<h3>Register New Account</h3>
    		<form action="" method="post" name="form1" >
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name"  value="<?php echo $name; ?>" />
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City" value="<?php echo $city; ?>"/>
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code" onkeypress='allnumericZIP()'  value="<?php echo $zip; ?>"/>
							</div>
							<div>
								<input type="text" name="email" placeholder="Email"  value="<?php echo $email; ?>"/>
							</div>
		    			 </td> 
		    			<td>  
						<div>
							<input type="text" name="address" placeholder="Address"  value="<?php echo $address; ?>"/>
						</div>
		    		
						<div>
							<input type="text" name="country" placeholder="Country" value="<?php echo $country; ?>"  />
						</div>
			 	 	        
	
		           <div>
				  
		          <input type="text" name="phone" placeholder="Phone" onkeypress='allnumericplusminus()'  value="<?php echo $phone; ?>"/>
				  
		          </div>
				  
				  <div>
				  
					<input  type="password" name="pass" placeholder="Password"/>
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <div class="clear"></div>
		    </form>
			
		
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 
 
 
 
 <script> 
 




function allnumericplusminus()
   {
	   
	    var phone = document.getElementsByName('phone');
	   
		var numbers = /^[-+]?[0-9]+$/;
		
		//phone[0].style.backgroundColor =""; 
		
      if(phone[0].value.match(numbers))
      {
		//alert('Correct...Try another');
		
		 phone[0].style.backgroundColor =""; 
			
		
		//document.form1.phone.focus();
		//document.form1.text1.focus();
		//return true;
      }
      else
      {
		 
		  phone[0].style.backgroundColor ="#FFCCCB"; 
			//alert('Please input correct format');
			//document.form1.text1.focus();
			//document.form1.text1.focus();
			
      //return false;
      }
   }


function allnumericZIP()
   {
	   
	    var zip = document.getElementsByName('zip');
	   
		var numbers = /^[-+]?[0-9]+$/;
		
		//phone[0].style.backgroundColor =""; 
		
      if(zip[0].value.match(numbers))
      {
		//alert('Correct...Try another');
		
		 zip[0].style.backgroundColor =""; 
			
		
		//document.form1.phone.focus();
		//document.form1.text1.focus();
		//return true;
      }
      else
      {
		 
		  zip[0].style.backgroundColor ="#FFCCCB"; 
			//alert('Please input correct format');
			//document.form1.text1.focus();
			//document.form1.text1.focus();
			
      //return false;
      }
   }


function validEmail(){
	
	 
	 
	 
	   var email = document.getElementsByName('email');
	   
		var numbers = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		
		//phone[0].style.backgroundColor =""; 
		
      if(email[0].value.match(numbers))
      {
		//alert('Correct...Try another');
		
		 email[0].style.backgroundColor =""; 
			
		
		//document.form1.phone.focus();
		//document.form1.text1.focus();
		//return true;
      }
      else
      {
		 
		  email[0].style.backgroundColor ="#FFCCCB"; 
			//alert('Please input correct format');
			//document.form1.text1.focus();
			//document.form1.text1.focus();
			
      //return false;
      }
	 
	 
}

</script>
<?php include 'inc/footer.php';?>