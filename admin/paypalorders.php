<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
$filepath = realpath(dirname(__FILE__));
//include_once ($filepath.'/../classess/Cart.php');
include_once ($filepath.'/../classess/Paypalfunctions.php');

include_once ($filepath.'/../classess/Archive.php');

//$ct = new Cart();
$fm = new Format();

$paypal = new Paypalfunctions();
$archive = new Archive();
?>
<?php 
if (isset($_GET['shippedid'])) {
	$id = $_GET['shippedid'];
	$shipped = $paypal->productShippedFromPaypal($id);

}

if (isset($_GET['delproid'])) {
	
	
	$transaction_id = $_GET['delproid'];
	
	$archive->insertToArchive($transaction_id,"Paypal");
	
	
	$delOrder = $paypal->delProductShippedFromPaypal($transaction_id);
	
	
	
	

}
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Paypal Orders</h2>
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
						
							<th>Payer name</th>
							<th>Payer email</th>
						
							<th>Currency</th>
							<th>Total paid</th>
							<th>Business email</th>
							<th>Transaction date</th>
							<th>Paypal</th>
							<th>Details</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php 

						$getOrder = $paypal->getAllPaypalOrderProductByTransactionID();
						if ($getOrder) {
							while ($result = $getOrder->fetch_assoc()) {
						
						  ?>
						<tr class="odd gradeX">
						
							
							<td><?php echo $result['payer_name']; ?></td>
							<td><?php echo $result['payer_email']; ?></td>
							
							<td><?php echo $result['currency']; ?></td>
							<td><?php echo $result['total_paid']; ?></td>
							<td><?php echo $result['business_email']; ?></td>
							
							<td><?php echo $fm->formatDate($result['transaction_date']); ?></td>
							
							<td><a href="https://www.sandbox.paypal.com/activity/payment/<?php echo $result['transaction_id']; ?>">View</a></td>


							<td><a href="paypalorderdetials.php?transaction_id=<?php echo $result['transaction_id']; ?>">View</a></td>
						

							<?php 

							if ($result['status'] == '0') { ?>
							<td><a href="?shippedid=<?php echo $result['transaction_id']; ?>">Shipped</a></td>	
							<?php }elseif($result['status'] == '1'){?>
								<td><a href="?shippedid=<?php echo $result['transaction_id']; ?>">Pending</a></td>
							<?php } else{ ?>
								<td><a href="?delproid=<?php echo $result['transaction_id']; ?>">Remove</a></td>
						<?php } ?>
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
