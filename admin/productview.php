 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Product.php';?>
<?php include '../classess/Category.php';?>


<?php

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
   
   echo "<script>window.location='productlist.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateProduct = $pd->productUpdate($_POST,$_FILES,$id);
}

?>
<?php  $xlsizename = ""; ?>
				
<?php  $freesizename = ""; ?>
<?php  $largename = ""; ?>
<?php $smallname = ""; ?>
<?php $xxlname = ""; ?>
<?php $mediumname = ""; ?>



<?php  $xlsizename_deleted = 0; ?>
				
<?php  $freesizename_deleted = 0; ?>
<?php  $largename_deleted = 0; ?>
<?php $smallname_deleted = 0; ?>
<?php $xxlname_deleted = 0; ?>
<?php $mediumname_deleted = 0; ?>

<?php 




if($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['variant_name']) && isset($_POST['variant_id']) && isset($_POST['Stocks_variant']) &&  isset($_POST['productid_variant']) && isset($_POST['sizename']) && isset($_POST['sizeid_sizes'])){
		
		
		
		 
		
		//$sizeid = $_POST['sizeid'];
		//$variant_name = $_POST['variant_name'];
		//$stocks = $_POST['Stocks'];
		
		$variant_id = $_POST['variant_id'];
		$variant_name = $_POST['variant_name'];
		$Stocks_variant	= $_POST['Stocks_variant'];
		$productid_variant =  $_POST['productid_variant'];
		
		foreach($variant_id  as $key => $n ) {
				//$productid_variant[$key]
				// sizeid_variant, variant_name, Stocks_variant
				$pd->variationUpdate($variant_id[$key],$variant_name[$key],$Stocks_variant[$key]);
		}
		
		$sizename = $_POST['sizename'];
		$sizeid_sizes = $_POST['sizeid_sizes'];
		
			foreach($sizeid_sizes  as $key => $n){
				//sizeid_sizes, sizename
				$pd->sizeUpdate($sizeid_sizes[$key],$sizename[$key]);
			}
		
		//$pd->variationUpdate($sizeid,$variant_name,$stocks)
		//$pd->variationUpdate($sizeid,$variant_name,$stocks);
		//$pd->sizeUpdate($sizeid,$sizename);
			
}
						
						
						
                  	
?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>View Product</h2>
        <div class="block"> 

        <?php
        if (isset($updateProduct)) {
            echo $updateProduct;
        }

        ?> 

        <?php 
        $getPro = $pd->getProById($id);
        if ($getPro) {
           while ($value = $getPro->fetch_assoc()) {
               
    
         ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form" id="myTable">
			
			<tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td><?php echo $value['productName'];?></td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <?php 
                            $cat = new Category();
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                                while ($result = $getCat->fetch_assoc()) {
                                   ?>
                             <?php if ($value['catId'] == $result['catId']) { ?>
                               
                              <?php echo $result['catName'];?>
                          <?php } ?>
                         <?php } } ?>
                    </td>
                 </tr>
				
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td><div style="width:30%; height=80px;"><?php echo $value['body'];?></div>  </td>
                 </tr>
				 <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td><?php echo $value['price'];?>
                       
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image'] ;?>" height="80px" width="200px" > <br/>
                    
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type:</label>
                    </td>
                    <td>
					<?php 
                        if ($value['type'] == 0) { ?>
						<p>Featured</p>
                        <?php } else { ?>
						<p>General</p>		
                      <?php  } ?>
                     </td>
                </tr>

				
	<?php } } ?>
		
	</table >
</form>
   
	
	<table id="mytable2">	
		<thead> 
			<tr>	
				<th><label>Size Name:</label></th>
				<th><label>Variant name:</label></th>
				<th><label>Stocks:</label></th>
			</tr>
		</thead>
		
		
		<?php $showSize = $pd->sizesShowbypProductId($id);
			if($showSize){
			while($size_res = $showSize->fetch_assoc()){ 
			?>
				<?php if($size_res["sizename"]=="Small"){ ?>
				<?php $smallname = $size_res["sizename"]; ?>
				<?php $smallname_deleted = 1;  ?>
					
				<tbody id="smalltbody">
				<?php $variantshowtoedit = $pd->variantShowTOEdit($size_res["sizeid"]); ?>
			<?php
				if($variantshowtoedit){
				while ($variant_res = $variantshowtoedit->fetch_assoc()){
			?>		
			<tr class="smalltr">
				<td class="thistd"><label class="variantnames">Small</label></td>		
				<td class="thistd"><?php echo $variant_res["variant_name"]; ?></td>
				<td class="thistd"><?php echo $variant_res["Stocks"]; ?></td>
			</tr>	
				<?php } ?>	
				<?php } ?>
			</tbody>
			
				<?php } ?>
			  
				<?php if($size_res["sizename"]=="XXL"){ ?>
					<?php $xxlname = $size_res["sizename"]; ?>
					<?php $xxlname_deleted = 1; ?>
				<tbody id="xxltbody">
				
				<?php $variantshowtoedit = $pd->variantShowTOEdit($size_res["sizeid"]); ?>
					
				<?php
					if($variantshowtoedit){
					   while ($variant_res = $variantshowtoedit->fetch_assoc()){
				?>		
				<tr class="xxltr">	
					<td class="thistd"><label class="variantnames">XXL</label></td>				
					<td class="thistd"><?php echo $variant_res["variant_name"]; ?></td>
					<td class="thistd"><?php echo $variant_res["Stocks"]; ?></td>
				</tr>
				<?php } ?>	
				<?php } ?>
				</tbody>
				<?php } ?>
			
				<?php if($size_res["sizename"]=="Medium"){ ?>
				<?php $mediumname = $size_res["sizename"]; ?>
				<?php $mediumname_deleted = 1; ?>
				<tbody id="mediumtbody">
				
					
					<?php $variantshowtoedit = $pd->variantShowTOEdit($size_res["sizeid"]); ?>
					
				
					<?php
						if ($variantshowtoedit) {
							while ($variant_res = $variantshowtoedit->fetch_assoc()){
					?>		
				<tr class="mediumtr">	
				<td class="thistd"><label class="variantnames">Medium</label> </td>
				<td class="thistd"><?php echo $variant_res["variant_name"]; ?></td>
				<td class="thistd"><?php echo $variant_res["Stocks"]; ?></td>
				</tr>
				<?php } ?>	
				<?php } ?>
		</tbody>
				<?php } ?>
				<?php if($size_res["sizename"]=="Large"){ ?>
				<?php  $largename = $size_res["sizename"]; ?>
				
				<?php $largename_deleted = 1;  ?>
			
				<tbody id="largetbody">
					
					<?php $variantshowtoedit = $pd->variantShowTOEdit($size_res["sizeid"]); ?>
					
					<?php
					if ($variantshowtoedit) {
					   while ($variant_res = $variantshowtoedit->fetch_assoc()){
					?>		
				<tr class="largetr">	
					<td class="thistd"> <label class="variantnames">Large</label> </td>
					<td class="thistd"><?php echo $variant_res["variant_name"]; ?></td>
					<td class="thistd"><?php echo $variant_res["Stocks"]; ?></td>
				</tr>
				<?php } ?>	
				<?php } ?>
				</tbody>
				<?php } ?>
				
				<?php if($size_res["sizename"]=="Free Size"){ ?>
				
				<?php  $freesizename = $size_res["sizename"]; ?>
				
				<?php $freesizename_deleted = 1 ; ?>
				
				<tbody id="freesizetbody">
				
				
				<?php $variantshowtoedit = $pd->variantShowTOEdit($size_res["sizeid"]); ?>
					
				<?php
					if($variantshowtoedit){
					   while ($variant_res = $variantshowtoedit->fetch_assoc()){
				?>	
			
				<tr class="freesizetr">	
					<td class="thistd"><label class="variantnames" >Free Size:</label></td>				
					<td class="thistd"><?php echo $variant_res["variant_name"]; ?></td>
					<td class="thistd"><?php echo $variant_res["Stocks"]; ?></td>
				</tr>
				<?php } ?>	
				<?php } ?>
				</tbody>
				<?php } ?>
				
				<?php if($size_res["sizename"]=="Extra Large"){ ?>
				
				<?php  $xlsizename = $size_res["sizename"]; ?>
				
				<?php  $xlsizename_deleted = 1; ?>
						
			<tbody id="extralargetbody">
					
					<?php $variantshowtoedit = $pd->variantShowTOEdit($size_res["sizeid"]); ?>
					
					
					<?php
					 if($variantshowtoedit){
					 while ($variant_res = $variantshowtoedit->fetch_assoc()){
					?>		
					<tr class="extralargetr">	
						<td class="thistd" ><label class="variantnames" >Extra Large</label></td>
						<td class="thistd"><?php echo $variant_res["variant_name"]; ?></td>
						<td class="thistd"><?php echo $variant_res["Stocks"]; ?></td>
					</tr>
				<?php } ?>	
				<?php } ?>
			</tbody>
				<?php } ?>
				<?php }} else { ?>
						<tbody id="smalltbody"></tbody>
						<tbody id="xxltbody"></tbody>
						<tbody id="mediumtbody"></tbody>
						<tbody id="largetbody"></tbody>
						<tbody id="freesizetbody"></tbody>
						<tbody id="extralargetbody"></tbody>
				<?php } ?>
				<tr>
                <td></td>
                    <td><a href="productedit.php?proid=<?php echo  $id; ?>" class="square-button">Edit</a>
                     
                    </td>
					 <td></td>
                </tr>
</table>
	     </div>
    </div>
</div>

<style>
.square-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #f5f5f5;
  color: #333;
  text-decoration: none;
  border-radius: 0;
}

.square-button.light {
  background-color: #fff;
  color: #666;
}




.variantnames{
	
	font-weight: bold; 
	padding-right: 125px;
}



#mytable2 {
        border-collapse: collapse;
        width: 50%;
    }

    /* table headings */
 th {
        background-color: #f2f2f2;
        font-weight: bold;
        padding: 8px;
        text-align: left;
    }

    /* table data */
 td.thistd {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    /* table data labels */
    label {
        font-weight: bold;
    }

    /* table rows */
   tr.smalltr,
  tr.xxltr,
  tr.mediumtr,
 tr.largetr,
   tr.freesizetr {
        background-color: #fff;
    }

    /* table rows on hover */
   tr:hover {
        background-color: #f5f5f5;
    }

    /* variant names */
    .variantnames {
        color: #444;
        font-size: 14px;
    }




</style>


<?php include 'inc/footer.php';?>
