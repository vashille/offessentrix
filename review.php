<?php include 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    //header("Location:login.php");
	
	echo "<script>window.location.href='login.php';</script>";
}

 ?>
 <?php 

 if(isset($_GET['productId'])){
  $prodId =$_GET['productId']; 
  
 }
 
 ?>
    
<?php  $result =$review->showproduct($prodId); ?>
<?php 
		if ($result != false) {
			$value = $result->fetch_assoc();
			
			 

						
 }else{
	 
	 echo "<script>window.location.href='404.php';</script>";
 }
 
 
 

 ?>
 <?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    
	
	if(!empty(trim($_POST['productId'])) ||  !empty(trim($_POST['productName'])) || !empty(trim($_POST['image'])) || !empty(trim($_POST['review'])) || !empty(trim($_POST['rating']))){
		
		  $insertReview = $review->insertReview($_POST['productId'],$_POST['productName'],$_POST['image'],$_POST['review'],$_POST['rating'], $login);
	}
	
	
	
  
}

?>
 
<?php
if(isset($_GET['productId'])){
   $productId =$_GET['productId'];

	$reviews = $review->showProductReview($productId);
	
	if($reviews==true){
		while ($result = $reviews->fetch_assoc()) {
?>	
		
<div class="review-container">
  <div class="review-product-img">
    <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['productName']; ?>" />
  </div>
  <div class="review-product-name">
    <?php echo $result['productName']; ?>
  </div>
   <div class="review-rating">
    <?php for($i = 0; $i < $result['rating']; $i++){ ?>
      <i class="fa fa-star"></i>
    <?php } ?>
  </div>
 
  <div class="review-review">
    <?php echo $result['body']; ?>
  </div>
 
</div>

<?php } } ?>



<form action="" id="review-form" method="POST">
  <img src="admin/<?php echo $value['image']; ?>" alt="" />
  
  <div><?php echo $value['productName']; ?></div>
  
  
  <input type="hidden"  name="productName" value="<?php echo $value['productName'];?>">
  <input type="hidden"  name="productId" value="<?php echo $value['productId'];?>">
  
  <input type="hidden"  name="image" value="<?php echo $value['image'];?>">
  <br>
  <label for="review">Review:</label>
  <textarea id="review" name="review"></textarea>
  <br>
  <label for="rating">Rating:</label>
  <div id="rating">
    <input type="radio" id="star5" name="rating" value="5">
    <label for="star5">5</label>
    <input type="radio" id="star4" name="rating" value="4">
    <label for="star4">4</label>
    <input type="radio" id="star3" name="rating" value="3">
    <label for="star3">3</label>
    <input type="radio" id="star2" name="rating" value="2">
    <label for="star2">2</label>
    <input type="radio" id="star1" name="rating" value="1">
    <label for="star1">1</label>
  </div>
  <br>
  <input type="submit" value="Submit" name="submit">
</form>
 
<?php 

} 

?>
 
 	
	<style>
	
#review-form {
  
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 10px;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

#review-form img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  border-radius: 50%;
  margin-right: 20px;
}

#review-form div{
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
  margin-right: 20px;
}

#review-form textarea {
  flex-grow: 1;
  padding: 12px 20px;
  margin-bottom: 20px;
  box-sizing: border-box;
  border-radius: 4px;
  border: 1px solid #ccc;
  font-size: 16px;
  resize: none;
}

#review-form #rating {
  margin-bottom: 20px;
  display: flex;
}

#review-form #rating label {
  font-size: 36px;
  color: #aaa;
  cursor: pointer;
  padding: 0 10px;
  position: relative;
}

#review-form #rating input[type="radio"] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

#review-form #rating input[type="radio"]:checked + label {
  color: #ffc107;
}

#review-form input[type="submit"] {
  width: 100%;
  padding: 12px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

#review-form input[type="submit"]:hover {
  background-color: #45a049;
}



.review-container {
    
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    transition: all 0.2s;
}

.review-container:hover {
    transform: translateY(-5px);
    box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.3);
}

.review-product-img img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 20px;
}

.review-product-name {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    margin-right: 20px;
}

.review-review {
    font-size: 16px;
    margin-bottom: 10px;
    margin-right: 20px;
}

.review-product-body {
    font-size: 16px;
    margin-bottom: 10px;
    margin-right: 20px;
}

.review-rating i{
    color: #ffc107;
    font-size: 36px;
}









  </style>
 
 <script>
 /*
 const reviewsContainer = document.getElementById("reviews-container");

// Fetch reviews from the server
fetch("get-reviews.php")
  .then(response => response.json())
  .then(reviews => {
    // Loop through the reviews and add them to the page
    reviews.forEach(review => {
      const reviewDiv = document.createElement("div");
      reviewDiv.classList.add("review");
      reviewDiv.innerHTML = `
        <h4>Name: ${review.name}</h4>
        <p>Review: ${review.review}</p>
        <p>Rating: ${review.rating}</p>
      `;
      reviewsContainer.appendChild(reviewDiv);
    });
  });

 */
 </script>
 
 
 <?php include 'inc/footer.php';?>

