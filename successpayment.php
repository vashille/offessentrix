<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>
<style>
.psuccess{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin: 0 auto;padding: 20px;}	
.psuccess h2{border-bottom: 1px solid #ddd;margin-bottom: 20px;padding-bottom: 10px;}
.psuccess p{line-height: 25px;text-align: left;font-size: 18px;}

</style>
 
 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="psuccess">
		
		
		<?php if(isset($_GET["success"])){ ?>
		 <h1 class="font-title">You've Ordered Successfully...!</h1>
    	  <div><img src="images/checked.png" alt=""></div>
		  
		<?php }else { ?>
			<h1 class="font-title">Payment Done Successfully...!</h1>
    	  <div><img src="images/checked.png" alt=""></div>
		<?php } ?>
		
		</div>
    	
 		</div>
 	</div>
	</div>
  <?php include 'inc/footer.php';?>
  
  
  
