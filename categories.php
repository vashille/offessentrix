<?php include 'inc/header.php';?>

 <div class="main">
    <div class="content">


    <div class="content_top">
    		<div class="heading">
    		<h3>CATEGORIES</h3>
			
    		</div>
    		<div class="clear"></div>
    	</div>

			<div class="section group">
            <?php
			
	      	$getTop4 = $pd->getCategoryTops();
	      	if ($getTop4) {
	      		while ($result = $getTop4->fetch_assoc()) { 
	      
	      			
	      	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					
					<h2><?php echo $fm->textShorten($result['catName'],10); ?><h2>
					
			<div class="button">
			<span><a href="productbycat.php?catId=<?php echo $result['catId']; ?>" class="details"><?php echo $result['catName']; ?></a></span>
			</div>
				</div>
				
				
				<?php } ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="products.php"><img src="admin/uploads/al.png" alt="" /></a>
					
					
				      <div class="button"><span><a href="products.php" class="details">ALL</a></span></div>
				</div>
				<?php } ?>

			</div>
			
			
			
    
			
		
	
    </div>
 </div>
<?php include 'inc/footer.php';?>