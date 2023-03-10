<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?> 
 
 <?php 
 /*
if (isset($_GET['orderid']) && $_GET['orderid'] == 'Order') {
 $cmrId = Session::get("cmrId");
 $insertOrder = $ct->orderProduct($cmrId);
 $delData = $ct->delCustomerCart();
 


 
 
 header("Location:success.php");
}
*/
  ?>
  

  
  
  

<style>
.division{width: 50%;float: left;}
.tblone{width: 500px;margin: 0 auto;border: 2px solid #ddd;margin-bottom: 10px;}
.tblone tr td{text-align: justify;}
.tbltwo{float: right;text-align: left;width: 60%;border: 2px solid #ddd;margin-right: 14px;margin-top: 12px;}
.tbltwo tr td{text-align: justify;padding: 5px 10px;}
.ordernow{padding-bottom: 30px;}
.ordernow a{width: 200px;margin: 20px auto 0;text-align: center;padding: 5px;font-size: 30px;display: block;background: #ff0000;color: #fff;border-radius: 3px;}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="division">
         
            <table class="tblone">


                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            <tr>
							 
							
                            <?php 

                            $getPro = $ct->getCartProduct();
                            if ($getPro) {
                                $i = 0;
                                $sum = 0;
                                $qty = 0;
                                while ($result = $getPro->fetch_assoc()) {
                                
                                $i++;

                             ?>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['productName']; ?></td>
                                <td><?php echo "₱". $result['price']; ?></td>
                                 <td><?php echo $result['quantity']; ?></td>
                                <td>
                                  <?php
                        $total =  $result['price'] * $result['quantity'];
                        echo '₱'. $total;
                         ?>
                            

                                    </td>
                            </tr>
                            
                            <?php 
                            $qty = $qty + $result['quantity'];
                            $sum = $sum + $total;
                             ?>


                        <?php } }
						else{
							echo "<script> window.location.href='cart.php';</script>";
						}
						
						
						?>    
                        </table> 
                        <table class="tbltwo">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td>₱ <?php echo $sum; ?></td>
                            </tr>
                            <tr>
                                <td>Shipping Fee</td>
                                <td>:</td>
                                <td>₱<?php echo 165; ?></td>
                            </tr>

                            
                            <tr>
                                <td>Grand Total</td>
                                <td>:</td>
                                <td>₱ 
                                    <?php 
                                  //  $vat = $sum * 0.1;
                                   // $gtotal = $sum + $vat;
								   $gtotal = $sum+165;
                                    echo $gtotal;
                                     ?>
                                </td>
                            </tr>

                             <tr>
                                <td>Quantity</td>
                                <td>:</td>
                                <td><?php echo $qty; ?></td>
                            </tr>

                       </table>
					   
					   
					
                    
        </div>
        <div class="division">
            
            <?php 
            $id = Session::get("cmrId");
            $getdata = $cmr->getCustomerData($id);
            if ($getdata) {
                while ($result = $getdata->fetch_assoc()) {
            

             ?>
                <table class="tblone">
                    <tr>
                        <td colspan="3"><h2>Your Profile Details</h2></td>
                    </tr>
                    <tr>
                        <td width="20%">Name</td>
                        <td width="5%">:</td>
                        <td><?php echo $result['name'];?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?php echo $result['phone'];?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $result['email'];?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td><?php echo $result['address'];?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>:</td>
                        <td><?php echo $result['city'];?></td>
                    </tr>
                    <tr>
                        <td>Zipcode</td>
                        <td>:</td>
                        <td><?php echo $result['zip'];?></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>:</td>
                        <td><?php echo $result['country'];?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><a href="editprofile.php">Update Details</a></td>
                    </tr>

                </table>
            <?php }} ?>
        </div>
 		</div>
		
	
 

	
<?php $total_price=$gtotal; ?>	
 <?php //$code = $bitcoin->createInvoice($total_price); ?>

		
		 <?php
// Check code

		if(!isset($_GET['code'])){
				exit();
		} 
	
		
			$code = $_GET['code'];
		
			$bitcoin->updateInvoicePrice($code,$total_price);
			$BitcoinAddress =$bitcoin->getAddress($code);
		
		
			//select table invoices return status column
			$status = $bitcoin->getStatus($code);
		
		
			//NEED TOTAL PRICE
			$getdata = $cmr->getCustomerData($id);
		
			$PHPtoBTCprice = $bitcoin->PHPtoBTC($total_price);
		
			$sId  = session_id();
			
			$bitcoin->UpdateGenCode($sId,$BitcoinAddress);
			
			
			
			//$bitcoin->BitcoinOrderProduct($BitcoinAddress,$status,$code)
			
			//$code = mysqli_escape_string($conn, $_GET['code']);
			// Get invoice information
			//$address = getAddress($code);
			//$status = getStatus($code);
			//$product = getInvoiceProduct($code);

			

			//$price = getInvoicePrice($code);

			// Status translation
			
			
			$statusval = $status;
			$info = "";
		if($status == 0){
			$status = "<span style='color: orangered' id='status'>PENDING</span>";
			$info = "<p>You payment has been received. Invoice will be marked paid on two blockchain confirmations.</p>";
		}else if($status == 1){
			$status = "<span style='color: orangered' id='status'>PENDING</span>";
			$info = "<p>You payment has been received. Invoice will be marked paid on two blockchain confirmations.</p>";
		}else if($status == 2){
			$status = "<span style='color: green' id='status'>PAID</span>";
		}else if($status == -1){
			$status = "<span style='color: red' id='status'>UNPAID</span>";
		}else if($status == -2){
			$status = "<span style='color: red' id='status'>Too little paid, please pay the rest.</span>";
		}else {
			$status = "<span style='color: red' id='status'>Error, expired</span>";
		}

  
 ?> 
		
		
		
		
		
		
		
 	</div>

		
            <p style="display:block;width:100%;">Please pay <?php echo number_format($PHPtoBTCprice, 8); ?> 
			BTC to <br><br>address: 
			<span id="address"><?php echo $BitcoinAddress; ?></span></p>
			




  
		   <?php
            // QR code generation using google apis
            $cht = "qr";
            $chs = "300x300";
            $chl = $BitcoinAddress;
            $choe = "UTF-8";
			
            $qrcode = 'https://chart.googleapis.com/chart?cht=' . $cht . '&chs=' . $chs . '&chl=' . $chl . '&choe=' . $choe;
            ?>
			
		 	
            <div class="qr-hold">
                <img src="<?php echo $qrcode ?>" alt="My QR code" style="width:250px;">
            </div>
            
            
            <p style="display:block;width:100%;" id="statusBit">Status: <?php echo $status; ?></p>
			
			
		
            <?php echo $info; ?>
			
            <div id="info"></div>



   
	</div>

	
	   <script>
	   
        var status = <?php echo $statusval; ?>
		/*
         //setTimeout(function(){ window.location="index.php" }, 1000);
		// setTimeout ("window.location='index.php'", 1000);
        // Create socket variables
        if(status < 2 && status != -2){
        var addr =  document.getElementById("address").innerHTML;
        var wsuri2 = "wss://www.blockonomics.co/payment/"+ addr;
        // Create socket and monitor
        var socket = new WebSocket(wsuri2, "protocolOne")
            socket.onmessage = function(event){
                console.log(event.data);
                response = JSON.parse(event.data);
                //Refresh page if payment moved up one status
                if (response.status > status)
                  //setTimeout ("window.location='invoice.php'", 1000);
			  setTimeout ("window.location=window.location.href", 1000);
            }
        }
        */
		
		 
		function loadDoc() {
			
			var bitcoin_addr ="<?php echo $BitcoinAddress; ?>";
			var session_id ="<?php echo $sId ; ?>";
			var code ="<?php echo $_GET['code'] ; ?>";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("statusBit").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "analyzer.php?bitcoin_addr="+bitcoin_addr+"&session_id="+session_id+"&codes="+code, true);
			xhttp.send();
}


		const element = document.getElementById("statusBit");
				setInterval(function() {
					loadDoc();
					}, 1000);

		
		
		
		
		
		
    </script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>




	
	
	
  <?php include 'inc/footer.php';?>