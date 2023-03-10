<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>  
 
 <?php 
if (isset($_GET['orderid']) && $_GET['orderid'] == 'Order') {
	
	
 $cmrId = Session::get("cmrId");
 $insertOrder = $ct->orderProductbypaypal($cmrId);
 $delData = $ct->delCustomerCart();
 


 echo "<script>window.location.href='success.php';</script>";
 
 //header("Location:success.php");
}
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
								<th>size</th>
								<th>variant</th>
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
								 <td><?php echo $result['sizename']; ?></td>
								   <td><?php echo $result['variant_name']; ?></td>
								     
                                <td><?php echo "₱".$result['price']; ?></td>
                                 <td><?php echo $result['quantity']; ?></td>
                                <td>
                            <?php
                        $total = $result['price'] * $result['quantity'];
                        echo "₱".$total;
                         ?>
                            

                                    </td>
                            </tr>
                            
                            <?php 
                            $qty = $qty + $result['quantity'];
                            $sum = $sum + $total;
                             ?>


                        <?php } } ?>    
                        </table> 
                        <table class="tbltwo">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td><?php echo "₱".$sum; ?></td>
                            </tr>
                            
							 <tr>
                                <td>Shipping Fee</td>
                                <td>:</td>
                                <td>₱<?php echo 165; ?></td>
                            </tr>
							
							
                            <tr>
                                <td>Grand Total</td>
                                <td>:</td>
                                <td>
                                    <?php 
                                
								   $gtotal = $sum +165;
                                    echo "₱".$gtotal;
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
		
	

<div id="demo"> </div>
	



	  <div style="width:200px; margin: auto;"  id="paypal-button-container"></div>  




	</div>
	
	<script src="https://www.paypal.com/sdk/js?client-id=AbV2zTz035WVA0bJ1Z7plTmyibl7MS0gddAKBv8DoAgxEdYOWLUGHWrUjmUweYQXn5bIZ4DGawW_4i8Q&currency=PHP"></script>
  
  
  
  <script>

paypal.Buttons({
    style : {
         layout: 'vertical',
    color:  'blue',
    shape:  'rect',
    label:  'paypal'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: '<?php echo $gtotal;?>'
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details);
			
           // window.location.replace("http://localhost:63342/tutorial/paypal/success.php")
			
			//paymentMade(details.payer.name.given_name);
			
			//https://www.sandbox.paypal.com/activity/payment/transaction_id
			
			//payer email
			//alert(details.payer.email_address);
			//payer id hindi napapalitan
			//alert(details.payer.payer_id);
			
			//transaction_id napapalitan very transaction
				//alert(details.purchase_units[0].payments.captures[0].id);
			//currency	 
				//alert(details.purchase_units[0].amount.currency_code);
				

				//alert(details.purchase_units[0].amount.value);
				//business email address
				//alert(details.purchase_units[0].payee.email_address);
				
			var payer_givename = details.payer.name.given_name;	
			var payer_surname = details.payer.name.surname;
			var payer_email = details.payer.email_address;
			var payer_id = details.payer.payer_id;
			var transaction_id = details.purchase_units[0].payments.captures[0].id; 	
			var currency = details.purchase_units[0].amount.currency_code;
			var total_paid = details.purchase_units[0].amount.value;
			var business_email = details.purchase_units[0].payee.email_address; 
			var transaction_date = details.create_time; 
			
			paymentMade(payer_givename, payer_surname, payer_email, payer_id, transaction_id, currency, total_paid, business_email, transaction_date);
			
			
			 window.location.replace("successpayment.php");
			
			
        })
    },
    onCancel: function (data) {
        window.location.replace("cancelpayment.php")
    }
}).render('#paypal-button-container');
  
  
  
  
  
  function paymentMade(payer_givename, payer_surname, payer_email, payer_id, transaction_id, currency, total_paid, business_email, transaction_date){
     
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }
  xhttp.open("POST", "savepaypalorder.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send("payer_givename="+payer_givename+"&payer_surname="+payer_surname+"&payer_email="+payer_email+"&payer_id="+payer_id+"&transaction_id="+transaction_id+"&currency="+currency+"&total_paid="+total_paid+"&business_email="+business_email+"&transaction_date="+transaction_date);
  }
  
 </script>
  
  <?php include 'inc/footer.php';
  
  /*
  $_POST["payer_givename"];
  $_POST["payer_surname"];
  $_POST["payer_email"];
  $_POST["payer_id"];
  $_POST["transaction_id"];
  $_POST["currency"];
  $_POST["total_paid"];
  $_POST["business_email"];
  $_POST["transaction_date"];
  
  */
  
  ?>