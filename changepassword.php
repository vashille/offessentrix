<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>

<?php
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	
	$updateCmr =$cmr->changepassword($_POST, $cmrId);
   
}
 
?> 
 
<style>
	
.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;margin-bottom: 10px;}
.tblone tr td{text-align: justify;}	
.tblone input[type="password"]{width: 400px;padding: 5px;font-size: 15px;}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		
    		 <form action="" method="post">
				<table class="tblone">
					<?php 
					if (isset($updateCmr)) {
					
					echo "<tr><td colspan='2'>".$updateCmr."</td></tr>";
					}
					 ?>
					<tr>
						<td colspan="2"><h2>Change Password</h2></td>
					</tr>
					<tr>
						<td width="20%">Old Password</td>
						<td><input type="password" name="oldpassword" ></td>
						
					</tr>
					<tr>
						<td>New Password</td>
						<td><input type="password" name="newpassword" ></td>
						
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="Change Password"></td>
					</tr>

				</table>
				</form>
			
 		</div>
 	</div>
	</div>  <?php include 'inc/footer.php';?>