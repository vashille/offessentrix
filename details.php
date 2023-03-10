<?php include 'inc/header.php';?>

<?php
if (isset($_GET['proid'])) {
   

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}
 


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	 
	//name quantity = quantity of stocks number
					
	//name variantname = variant_id
	
	
    $quantity = $_POST['quantity'];
	$variant_id = $_POST['variantname'];
	
	
	$size_id = $_POST['sizesname'];
    $addCart = $ct->addToCart($quantity,$id, $variant_id,$size_id);
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
	$productId = $_POST['productId'];
    $insertCom = $pd->insertCompareData($productId,$cmrId);
}

?> 

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])) {
    $saveWlist = $pd->saveWishListData($id,$cmrId);
}

?> 
<?php $showSize = $pd->sizesShowbypProductId($id); ?>
		
		
			

<style>
	.mybutton{width: 100px;float: left;margin-right: 50px;}

</style>

 <div class="main"> 
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">	

				<?php 
				$getPd = $pd->getSingleProduct($id);
				if ($getPd) {
					while ($result = $getPd->fetch_assoc()) {
						
				
					
				 ?>		
					
				 
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?> </h2>				
					<div class="price">
						<p>Price: <span>₱<?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						<p>Stocks: <span id="stocks"></span></p>
						
					</div> 
				<div class="add-cart">
					<form action="" method="post">
						
						<span id="numbertype"></span>
						
						<input type="submit" class="buysubmit" name="submit" id="submitid" value="Buy Now"/>
						
						<a href="review.php?productId=<?php echo $result['productId'];  ?>" class="buysubmit">Reviews</a>
						<br><br>
						
						<select name="sizesname" id="sizes" class="buysubmit" onchange="choosesize();">
						
							<?php if($showSize){ ?>
							<option>Select sizes</option>
							<?php	while($size_res = $showSize->fetch_assoc()){ ?>
								<option value="<?php echo $size_res["sizeid"]; ?>"><?php echo $size_res["sizename"]; ?></option>
							<?php } ?>
							<?php 	} ?>
							
						</select>
						
						<span id="variantname_option"></span>
						
						<div id="stocks"> </div>
						
					</form>				
				</div>

				<span style="color: red;font-size: 18px;">
					<?php 

					if (isset($addCart)) {
						echo $addCart;
					}
					 ?>

					 <?php 

					if (isset($insertCom)) {
						echo $insertCom;
					}


					if (isset($saveWlist)) {
						echo $saveWlist;
					}
					 ?>

				</span>
				<?php 
				$login = Session::get("cuslogin");
				if ($login == true) {
					?>

				<div class="add-cart">
					<div class="mybutton">
					<form action="" method="post">
						<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']; ?>"/>
						<input type="submit" class="buysubmit" name="compare" value="Compare"/>
					
					</form>	
					
					
					</div>

					<div class="mybutton">
					<form action="" method="post">
							<input type="submit" class="buysubmit" name="wlist" value="Wish list"/>
					</form>	
					<br>
					
					</div>
				
				</div>
			<?php } ?>

			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $result['body']; ?>
	    </div>
			<?php
			
				} }?>	
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>

						<?php 

						$getCat = $cat->getAllCat();
						if ($getCat) {
							while ($result = $getCat->fetch_assoc()) {
								
						
						 ?>
				      <li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
				      <?php }} ?>
				    
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
  <?php include 'inc/footer.php';?>
  
  
  <script> 
  
	
		var submitid = document.getElementById("submitid")
		
		submitid.disabled= true;
	
	function choosesize(){
		
		var sizeid = document.getElementById("sizes").value;
		var variantname_option = document.getElementById("variantname_option");
		
		
		var submitid = document.getElementById("submitid")
		
		submitid.disabled= true;
		
		
		
				var xhttp;
			
				xhttp = new XMLHttpRequest();
				
				xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("variantname_option").innerHTML = this.responseText;
			}
		};
				xhttp.open("GET", "choosevariant.php?sizeid="+sizeid, true);
				xhttp.send();  
	} 
	
	
	function choosevariant(){
		
		var variant_id = document.getElementById("variant_id").value;

		
if(variant_id !=="Select variation"){
		var stocks = document.getElementById("stocks");
		
		var submitid = document.getElementById("submitid");
		
		submitid.disabled= false;
		
		
		var xhttp;
		xhttp = new XMLHttpRequest();
				
				xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				
				
				document.getElementById("stocks").innerHTML = this.responseText;
				
			}
		}; 
				xhttp.open("GET", "choosevariant.php?variant_id="+variant_id, true);
				xhttp.send(); 

		 stockforNumbertype();	
}	 
		 

	}
	
	
	function stockforNumbertype(){
		
		var variant_id = document.getElementById("variant_id").value;
		
		
		
		var xhttp;
				xhttp = new XMLHttpRequest();
				
				xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				
				
				document.getElementById("numbertype").innerHTML = this.responseText;
				
			}
		}; 
				xhttp.open("GET", "choosevariant.php?max_id="+variant_id, true);
				xhttp.send();  
	}
	
  
  </script>