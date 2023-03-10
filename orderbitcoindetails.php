<?php include 'inc/header.php';?>


<div class="topnav">

 <a  href="orderdetails.php">Cash on Delivery</a>
  <a class="active" href="orderbitcoindetails.php">Bitcoin</a>
  <a href="orderpaypaldetails.php">Paypal</a>

  
</div>


<?php 
$login = Session::get("cuslogin");
if ($login == false) {
   echo "<script>window.location.href='login.php';</script>";
}
 ?>
 
 
<?php 
if (isset($_GET['customerId'])) {
	
    $id = $_GET['customerId'];
    $confirm = $bitcoin->productShiftBitcoinConfirm($id);

}

 ?>

 <style>
     .tblone tr td{text-align: justify;}

 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="order">
    			<h2>Your Ordered Details</h2>
                <table class="tblone">


                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
								<th>Size</th>
								<th>Variant</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Status</th> 
                                <th>Action</th>
                            </tr> 
                            <tr>

                            <?php 
                            $cmrId = Session::get("cmrId");
                            $getOrder = $bitcoin->getOrderedProductBitcoin($cmrId);
                            if ($getOrder) {
                                $i = 0;
                                while ($result = $getOrder->fetch_assoc()) {
                                
                                $i++;

                             ?>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['productName']; ?></td>
								<td><?php echo $result['size_name']; ?></td>
								<td><?php echo $result['variant_name']; ?></td>
                                <td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
                                <td><?php echo $result['quantity']; ?></td>
                    
                                <td>Pesos <?php echo $result['price'];?></td>
                         <td><?php echo $fm->formatDate($result['date']); ?></td>

                         <td><?php

                         if ($result['status'] == '0') {
                             echo "Pending";
                         }elseif($result['status'] == '1'){
                            echo "Shipped out";
                       } else{ 
                            echo "Ok";
                         }


           ?></td>
                    </td>

                
                    <?php 
                    if ($result['status'] == '1') { ?>
                     <td> <a href="?customerId=<?php echo $result['id']; ?>">Confirm</a><td>
                   <?php } elseif($result['status'] == '2'){?>
                    <td><a href="review.php?productId=<?php echo $result['productId'];  ?>">Review</a></td>

                  <?php }elseif ($result['status'] == '0') {?>
                      <td>N/A</td>
                 <?php  }  ?>
                   
            </tr>
                            


                        <?php } } ?>    
                        </table>

    		</div>
    	</div>
    	
    	 	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>