<?php include 'inc/header.php';?>

<?php 
/*
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
   
   echo "<script>window.location.href='404.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catId']);
}


price highest lowest

*/

 ?>
 

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<a href="products.php" class="details">All</a> ||
			<a href="products.php?price=lowest" class="details">lowest</a> ||
			<a href="products.php?price=highest" class="details">highest</a>
    		</div>
    		<div class="clear"></div>
    	</div>
		
		
		<?php if(!isset($_GET['price'])){ ?>
		
		
	      <div class="section group">

	      	<?php 
	      	$Allproduct = $pd->Allproduct();
	      	if ($Allproduct) {
	      		while ($result = $Allproduct->fetch_assoc()) {
	      	

	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					
					 <h2><?php echo $fm->textShorten($result['productName'],10); ?></h2>
					
					 <p><span class="price">₱ <?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>

			
			<?php }}else{
				
				echo "<script>window.location.href='404.php';</script>";
			} ?>
			</div>
			

		<?php } ?>
		
		<?php if(isset($_GET['price'])){ ?> 
		
		
		<?php if($_GET['price']=="lowest"){ ?>
	
		  <div class="section group">

	      	<?php 
	      	$lowprice = $pd->lowprice();
	      	if ($lowprice) {
	      		while ($result = $lowprice->fetch_assoc()) {
	      	

	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					
					 <h2><?php echo $fm->textShorten($result['productName'],10); ?></h2>
					
					 <p><span class="price">₱ <?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>

			
			<?php }}else{
				
				echo "<script>window.location.href='404.php';</script>";
			} ?>
			</div>
	
		<?php } ?>
		
		
		
		
		
		<?php if($_GET['price']=="highest"){ ?>
		
	
		  <div class="section group">

	      	<?php 
	      	$highestprice = $pd->highestprice();
	      	if ($highestprice) {
	      		while ($result = $highestprice->fetch_assoc()) {
	      	

	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					
					 <h2><?php echo $fm->textShorten($result['productName'],10); ?></h2>
					
					 <p><span class="price">₱ <?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>

			
			<?php }}else{
				
				echo "<script>window.location.href='404.php';</script>";
			} ?>
			</div>
	
		<?php } ?>
		
		
		
		<?php } ?>
	
    </div>
 </div>
<?php include 'inc/footer.php';?>