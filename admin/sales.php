<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classess/Cart.php');
//include_once ($filepath.'/../classess/Bitcoinfunctions.php');
//$ct = new Cart();
$fm = new Format();


$ct = new Cart();


	$month =0;
	$months_arr = array(' ','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
 	$bitcoinSalesOutput = "";
	$codSalesOutput = "";
	$paypalSalesOutput = "";
	$year="";
	
	$day = "";
	$salesOption ="";
	$date="";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['getsales'])) 
{
    $year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	
	//$date= "$year-$month-$day"; 
	

	
	$salesOption = $_POST['salesOption'];
	
	
	
	switch ($salesOption) {
		
	case "allSales":
	
		$bitcoin_total = $ct->getTotalSales("bitcoin"); 
					
		$cod_total	 = $ct->getTotalSales("cod"); 
		
		$paypal_total	 = $ct->getTotalSales("paypal"); 

		
		$bitcoinSalesOutput = $bitcoin_total;
		$codSalesOutput = $cod_total;
		
		
		$paypalSalesOutput = $paypal_total;
		$salesOption = "TOTAL SALES ";	

		
		
		$date= "";
					
	break;
	
	case "monthly":
	
	$bitcoin_totalbyMonthYear = $ct->totalSalesGroupbyMonthYear("bitcoin", $month, $year);
						

	$cod_totalbyMonthYear = $ct->totalSalesGroupbyMonthYear("cod", $month, $year);
	

$paypal_totalbyMonthYear = $ct->totalSalesGroupbyMonthYear("paypal", $month, $year);

	
	$bitcoinSalesOutput =$bitcoin_totalbyMonthYear ;
	$codSalesOutput = $cod_totalbyMonthYear;
	
	
	$paypalSalesOutput = $paypal_totalbyMonthYear;
	
	
	
	$salesOption = "MONTHLY SALES";	
	$date = $months_arr[$month].' '.$year ;
	
	
    break;
	case "yearly": 
	
	 $bitcoin_yearlySales = $ct->yearlySales('bitcoin',$year);
	$cod_yearlySales = $ct->yearlySales('cod',$year);
	
	$paypal_yearlySales = $ct->yearlySales('paypal',$year);
	
	
	$bitcoinSalesOutput =$bitcoin_yearlySales;
	$codSalesOutput =	$cod_yearlySales;
	
	$paypalSalesOutput = $paypal_yearlySales;
	
	
	$salesOption = "YEARLY SALES";	
	
		
	
	$date = $year;
	
	break;
	
	case "specificDate":
		$bitcoin_totalSalesSpecificDate = $ct->totalSalesSpecificDate("bitcoin", $day, $month, $year);
						


		$cod_totalbyDate = $ct->totalSalesSpecificDate("cod", $day, $month, $year);
						
		$paypal_totalbyDate = $ct->totalSalesSpecificDate("paypal", $day, $month, $year);


		
		$bitcoinSalesOutput = $bitcoin_totalSalesSpecificDate ;
		$codSalesOutput = $cod_totalbyDate;
		$paypalSalesOutput =$paypal_totalbyDate;
	
	
		$salesOption = "SPECIFIC DATE";	
	
		$date = $months_arr[$month].' '.$day.' '.$year;
	
	break;
		
  default:
    echo "SOMETHING WENT WRONG";
}

}
/*
if($month !=0){
	if($months_arr[$month]){
	
		echo $months_arr[$month];
	}
	
}
*/
//echo $date;
?>


        <div class="grid_10">
		<div class="box round first grid">
	<h3><?php echo $date.'  '.$salesOption; ?></h3>
		<form  action="" method="post">
			<label for="month">Month:</label>
			<select id="month" name="month"><!-- Additional months --></select>
			<label for="day">Day:</label>
			<select id="day" name="day"><!-- Additional days --></select>
			<label for="year">Year:</label><select id="year" name="year"><!-- Additional years --></select>
			
			<label for="year">Sales option</label>
			
			<select id="year" name="salesOption">
			
			<option value="allSales">ALL TOTAL SALES</option>
			<option value="yearly">YEARLY</option>
			<option value="monthly">MONTHLY</option>
			<option value="specificDate">SPECIFIC DATE</option>
			
			</select>
			
			<button class="grey" name="getsales">GET SALES</button>
			
		</form>
		
					
		
		<a>TOTAL SALES</a>
				
		<div id="sales-container">
		<div id="bitcoin-sales" class="sales-rectangle">
				<h3>Bitcoin Sales</h3>
				<span id="bitcoin-total">
				<?php 
			
				
				echo $bitcoinSalesOutput;
				
				 
				?>
				
				</span>
		</div>
		
		<div id="cod-sales" class="sales-rectangle">
			<h3>COD Sales</h3>
			<span id="cod-total">
			<?php 
				echo $codSalesOutput ;
			
			?>
			</span>
		</div>
		
		
			
		<div id="cod-sales" class="sales-rectangle">
			<h3>Paypal Sales</h3>
			<span id="cod-total">
			<?php 
				echo $paypalSalesOutput;
			
			?>
			</span>
		</div>
		
		
		
		
		
		<div id="total-sales" class="sales-rectangle">
				<h3>Total Sales</h3>
				<span id="sales-total">
				<?php 
				$totalSalesSUM= intval($bitcoinSalesOutput)  + intval($codSalesOutput) +  intval($paypalSalesOutput) ; 
				
				echo $totalSalesSUM;

				?>
				
				
				</span>
		</div>
		
		
		</div>

			   
			   
        </div>
        </div>
		
		
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
	
	
	
	
	
	
	const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const monthSelect = document.getElementById('month');
const monthsNumber = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
var i=0;
months.forEach(month => {
  const option = document.createElement('option');
  //option.value = month.toLowerCase();
  option.value =monthsNumber[i++];
  option.text = month;
  
  
  monthSelect.appendChild(option);
});



const days = Array.from({length: 31}, (_, i) => i + 1);
const daySelect = document.getElementById('day');
days.forEach(day => {
  const option = document.createElement('option');
  option.value = day;
  option.text = day;
  daySelect.appendChild(option);
});





const years = Array.from({length: 50}, (_, i) => new Date().getFullYear() - i);
const yearSelect = document.getElementById('year');
years.forEach(year => {
  const option = document.createElement('option');
  option.value = year;
  option.text = year;
  yearSelect.appendChild(option);
});

	
	
</script>



<style>
#sales-container {
  display: flex;
  justify-content: center;
}

.sales-rectangle {
  background-color: #f2f2f2;
  padding: 20px;
  text-align: center;
  width: 300px;
  height: 150px;
  margin: 10px;
}

#bitcoin-sales {
  background-color: #ffcccb;
}

#paypal-sales {
  background-color: #ccebff;
}

#cod-sales {
  background-color: #e6ffcc;
}
#total-sales{
	 background-color: #9C27B0;
}

h3 {
  font-size: 18px;
  margin-bottom: 10px;
}

#cod-total, #paypal-total, #bitcoin-total, #sales-total {
  font-size: 36px;
  font-weight: bold;
}

</style>



<?php include 'inc/footer.php';?>
