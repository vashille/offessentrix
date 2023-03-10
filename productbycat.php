<?php include 'inc/header.php';?>

<?php 

if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
   
   echo "<script>window.location.href='404.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catId']);
}


 ?> 


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Category</h3>
			
			<a href="productbycat.php?catId=<?php echo $_GET['catId']; ?>" class="details">All</a> ||
			<a href="productbycat.php?catId=<?php echo $_GET['catId']; ?>&price=lowest" class="details">lowest</a> ||
			<a href="productbycat.php?catId=<?php echo $_GET['catId']; ?>&price=highest" class="details">highest</a>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">



 
			<?php if(isset($_GET["price"])){ ?>

				<?php if($_GET["price"]=="lowest"){?>
			
					<?php $productbycat = $pd->productByCat($id,$_GET["price"]); ?>
			
					<?php 	} ?>
			
			
				<?php if($_GET["price"]=="highest"){?>
	
					<?php $productbycat = $pd->productByCat($id,$_GET["price"],$_GET["price"]); ?>
			
					<?php 	} ?>
			
			<?php 	} ?>
			
			<?php if(!isset($_GET["price"])){ ?>
			
				<?php $productbycat = $pd->productByCat($id,"all"); ?>
				
			<?php 	} ?>
			
			<?php
			
	      	if ($productbycat) {
	      		while ($result = $productbycat->fetch_assoc()) {
	      	

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

	
	
    </div>
 </div>
<?php include 'inc/footer.php';?>