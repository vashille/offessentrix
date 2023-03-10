<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once ($filepath.'/../classess/AdminChanges.php'); ?>


 

<?php $adminLogin = new AdminChanges(); ?>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$adminId = Session::get("adminId");
	
	$updateAdmin =	$adminLogin->changepassword($_POST, $adminId);
   
}
 
?> 
 
 

<div class="grid_10">
    <div class="box round first grid">
	

        <h2>Change Password </h2>
		

		
		
        <div class="block">               
         <form method="POST">
            <table class="form">

					<?php 
					if (isset($updateAdmin)) {
					
					echo "<tr><td colspan='2'>".$updateAdmin."</td></tr>";
					}
					 ?>
			
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="oldpassword" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="newpassword" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>