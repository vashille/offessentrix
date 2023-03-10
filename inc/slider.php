	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			
			
			
		
				<?php 
				$getTops = $pd->lastetTops();

				if ($getTops) {
					while ($result = $getTops->fetch_assoc()) {
				
				 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Tops</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>">Details</a></span></div>
				   </div>
			   </div>

			   <?php }} ?>	

			   <?php 
				$getCaps = $pd->lastestCaps();

				if ($getCaps) {
					while ($result = $getCaps->fetch_assoc()) {
				
				 ?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Caps</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>">Details</a></span></div>
				   </div>
			   </div>

				 <?php }} ?>	
			</div>
			
			
			

			<div class="section group">

				  <?php 
				$getShorts = $pd->lastestShorts();

				if ($getShorts) {
					while ($result = $getShorts->fetch_assoc()) {
				
				 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Shorts</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>">Details</a></span></div>
				   </div>
			   </div>

			   <?php }} ?>

			     <?php 
				$getMask = $pd->lastestMask();

				if ($getMask) {
					while ($result = $getMask->fetch_assoc()) {
				
				 ?>			
				
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Masks</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>">Details</a></span></div>
				   </div>
			   </div>
				<?php }} ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/new11.png" alt=""/></li>
						<li><img src="images/new22.jpg" alt=""/></li>

				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	
