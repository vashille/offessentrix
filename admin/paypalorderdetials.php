<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
$filepath = realpath(dirname(__FILE__));
//include_once ($filepath.'/../classess/Cart.php');
include_once ($filepath.'/../classess/Paypalfunctions.php');
//$ct = new Cart();
$fm = new Format();

$paypal = new Paypalfunctions();

?>
<?php 
if (isset($_GET['shippedid'])) {
	$id = $_GET['shippedid'];
	$shipped = $paypal->productShippedFromPaypal($id);

}

if (isset($_GET['delproid'])) {
	$transaction_id = $_GET['delproid'];
	$delOrder = $paypal->delProductShippedFromPaypal($transaction_id);

}



if(isset($_GET['transaction_id'])){
	
	$transaction_id = $_GET['transaction_id'];
	
}




 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Paypal Details Order</h2>
                <?php 
                if (isset($shipped)) {
                	echo $shipped;
                }

                if (isset($delOrder)) {
                	echo $delOrder;
                }


                 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
						
							<th>ID</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Size</th>
							<th>Variant</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Cust. ID</th>
							<th>Address</th>
							
						</tr>
					</thead>
					<tbody>






						<?php 

						$getOrder = $paypal->getProductDetailByTransactionID($transaction_id);
						if ($getOrder){
							while ($result = $getOrder->fetch_assoc()){
						
						  ?>
						<tr class="odd gradeX">
						
							
							
							
							
							
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['size_name']; ?></td>
							<td><?php echo $result['variant_name']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td>₱ <?php echo $result['price']; ?></td>
							<td><?php echo $result['cmrId']; ?></td>
							<td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>">View Details</a></td>

							
							
							
							
							
							
							
							
							
							
						
						

						</tr>
					<?php }} ?>
					</tbody>
				</table>
               </div>
			   
			   
			   
            </div>
        </div>
		
		
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
