<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3> 
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">

	      	<?php
	      	$getFpd = $pd->getFeaturedProduct();
	      	if ($getFpd) {
	      		while ($result = $getFpd->fetch_assoc()) { 
	      
	      			
	      	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					
					 <h2><?php echo $fm->textShorten($result['productName'],10); ?></h2>
					 <p><span class="price">₱<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				
				<?php } } ?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">


	      	<?php
	      	$getNpd = $pd->getNewProduct();
	      	if ($getNpd) {
	      		while ($result = $getNpd->fetch_assoc()) { 
	      			
	      
	      	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']; ?>"><img class="img1" src="admin/<?php echo $result['image']; ?>" /></a>
				
					  <h2><?php echo $fm->textShorten($result['productName'],10); ?></h2>
					 <p><span class="price">₱<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } } ?>
		
			</div>
    </div>
 </div>

 <?php include 'inc/footer.php';?>

 <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/63cb0d96c2f1ac1e202ece24/1gn8iq5ev';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->