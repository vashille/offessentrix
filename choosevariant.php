
<?php 
include 'lib/Database.php';
include 'helpers/Formate.php';


spl_autoload_register(function($class){
include_once "classess/".$class.".php";

});

?>

 


<?php $pd = new Product(); ?>

<?php 
if(isset($_GET["sizeid"])){
	// for variant
 $sizeid = $_GET["sizeid"];
 
 
 $showVariant = $pd->showVariantbySizeid($sizeid); 
	
}

?>

<?php if(isset($_GET["variant_id"])){
// stocks	
	$variant_id =$_GET["variant_id"];
	
	$showstocks = $pd->showVariantbyVariantid($variant_id);
}
?>


<?php

if(isset($_GET["max_id"])){
	
	
	
// stocks for number type  for max	
	$variant_id =$_GET["max_id"];
	
	$showstocksForNumbertype = $pd->showVariantbyVariantid($variant_id);
}


 ?>

<?php if(isset($showVariant)){ ?>

	<select name="variantname" id="variant_id" class="buysubmit" onchange="choosevariant();">
		<option>Select variation</option>
		<?php while($variant_res = $showVariant->fetch_assoc()){ ?>
		
			<?php if( $variant_res["stocks"] > 0){ ?>
					<option value="<?php echo $variant_res["variant_id"]; ?>"><?php echo $variant_res["variant_name"]; ?></option>
			<?php } } ?>
	</select>
<?php 	} ?>


<?php if(isset($showstocks)){ ?>

<?php while($stocks_res = $showstocks->fetch_assoc()){ ?>

<?php echo $stocks_res["stocks"];?>



<?php } ?>
<?php } ?>

	
<?php if(isset($showstocksForNumbertype)){
// will be shown in  span id= numbertype
	?>

<?php while($stocks_res = $showstocksForNumbertype->fetch_assoc()){ ?>


<input type="number" class="buyfield" name="quantity" value="1" min="1" max="<?php echo $stocks_res["stocks"];?>"/>

<?php } ?>
<?php } ?>				
				
					