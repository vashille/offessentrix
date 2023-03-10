<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Product.php';?>
<?php include '../classess/Category.php';?>

<?php
	$pd = new Product();

	//product id
	$productid = rand();
	
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	
	
    $insertProduct = $pd->productInsert($_POST,$_FILES,$productid);
	
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	

if(!empty($_POST['productName']) &&  $_POST['catId'] !=="Select Category" && !empty($_POST['body']) && !empty($_POST['price']) && $_POST['type']!=="Select Type" && $_POST['price'] > 0 && !empty($_FILES["image"]["name"]))
{
	
	

	
	
	
	
//$insertProduct = $pd->productInsert($_POST,$_FILES,$productid);
	
//FREE SIZE
	if($_SERVER['REQUEST_METHOD'] && isset($_POST['VariantFSInputField']) && isset($_POST['StockFSInputField'])){

			//size id of freesize
			$sizeid = rand();
			//size name
			$size_name = "Free Size";
			
			$insertSizes = $pd->sizesInsert($sizeid,$productid, $size_name);
			
			$VariantFSInputField = $_POST['VariantFSInputField'];
			$StockFSInputField = $_POST['StockFSInputField'];
			
			
			//echo "FREE SIZE <br>";
			foreach($VariantFSInputField  as $key => $n ) {
				
				//variant id
				$variantid = rand();
				//variant name
				$variantname = $VariantFSInputField[$key];
				// stocks
				$stocksValue = $StockFSInputField[$key]; 
				//INSERT VARIANT
				$insertVariant = $pd->variantInsert($variantid,$sizeid, $productid, $variantname, $stocksValue);
			}
			
			
			
	}
	
	//SMALL
		if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['VariantSmallInputField']) && isset($_POST['StockSmallInputField'])){
			//size id of Small
			$sizeid = rand();
			//size name
			$size_name = "Small";
			
			//INSERT SMALL
			$insertSizes = $pd->sizesInsert($sizeid,$productid, $size_name);
			
			$VariantSmallInputField = $_POST['VariantSmallInputField'];
			$StockSmallInputField = $_POST['StockSmallInputField'];
			
		
			foreach($VariantSmallInputField  as $key => $n ) {
				
				//variant id
				$variantid = rand();
				//variant name
				$variantname = $VariantSmallInputField[$key];
				// stocks
				$stocksValue = $StockSmallInputField[$key]; 
				
				$insertVariant = $pd->variantInsert($variantid,$sizeid, $productid, $variantname, $stocksValue);
			}
		
		}
	
	
	//MEDUIM
	if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['VariantMeduimInputField']) && isset($_POST['StockMeduimInputField'])){
			
			//size id of meduim
			$sizeid = rand();
			//size name
			$size_name = "Medium";
			
			$insertSizes = $pd->sizesInsert($sizeid,$productid, $size_name);
			
			$VariantMeduimInputField = $_POST['VariantMeduimInputField'];
			$StockMeduimInputField = $_POST['StockMeduimInputField'];
			
			foreach($VariantMeduimInputField  as $key => $n ) {
				//variant id
				$variantid = rand();
				//variant name
				$variantname = $VariantMeduimInputField[$key];
				// stocks
				$stocksValue = $StockMeduimInputField[$key]; 
				$insertVariant = $pd->variantInsert($variantid,$sizeid, $productid, $variantname, $stocksValue);
			}
	}
		
	//Large
	if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['VariantLargeInputField']) && isset($_POST['StockLargeInputField'])){
			
			
			//size id of meduim
			$sizeid = rand();
			//size name
			$size_name = "Large";
			$insertSizes = $pd->sizesInsert($sizeid,$productid, $size_name);
			$VariantLargeInputField = $_POST['VariantLargeInputField'];
			$StockLargeInputField = $_POST['StockLargeInputField'];
			
			foreach($VariantLargeInputField  as $key => $n ) {
				
				//variant id
				$variantid = rand();
				//variant name
				$variantname = $VariantLargeInputField[$key];
				// stocks
				$stocksValue = $StockLargeInputField[$key]; 
				$insertVariant = $pd->variantInsert($variantid,$sizeid, $productid, $variantname, $stocksValue);
			}
		
		}
		
		//XL
			if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['VariantXLInputField']) && isset($_POST['StockXLInputField'])){
			
			//size id of meduim
			$sizeid = rand();
			//size name
			$size_name = "Extra Large";
			$insertSizes = $pd->sizesInsert($sizeid,$productid, $size_name);
			
			$VariantXLInputField = $_POST['VariantXLInputField'];
			$StockXLInputField = $_POST['StockXLInputField'];
			
		
			foreach($VariantXLInputField  as $key => $n ) {
				//variant id
				$variantid = rand();
				//variant name
				$variantname = $VariantXLInputField[$key];
				// stocks
				$stocksValue = $StockXLInputField[$key]; 
				$insertVariant = $pd->variantInsert($variantid,$sizeid, $productid, $variantname, $stocksValue);
			}
		
		}
		
		
		
		//XXL
		if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['VariantXXLInputField']) && isset($_POST['StockXXLInputField'])){
			
			//size id of meduim
			$sizeid = rand();
			//size name
			$size_name = "XXL";
			
			$insertSizes = $pd->sizesInsert($sizeid,$productid, $size_name);
			
			$VariantXXLInputField = $_POST['VariantXXLInputField'];
			$StockXXLInputField = $_POST['StockXXLInputField'];
			
			
			
			foreach($VariantXXLInputField  as $key => $n ) {
				//variant id
				$variantid = rand();
				//variant name
				$variantname = $VariantXXLInputField[$key];
				// stocks
				$stocksValue = $StockXXLInputField[$key]; 
				$insertVariant = $pd->variantInsert($variantid,$sizeid, $productid, $variantname, $stocksValue);
				
			}
		
		}
		

 
}
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


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block"> 

        <?php
        if (isset($insertProduct)) {
            echo $insertProduct;
        }

        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form"  id="myTable">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" onkeyup="checkthisValue(this.value);" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                            $cat = new Category();
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                                while ($result = $getCat->fetch_assoc()) {
                                   ?>
                             
                            <option value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                        <?php } } ?>
                            
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium"  onkeyup="checkprice(this.value);"/>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Featured</option>
                            <option value="1">General</option>
                        </select>
                    </td>
                </tr>



			
				
				
		
			
			<tr class="choosesizetr">
			<td>
			<label>Choose Size:</label>
			</td>
				<td>  
				<select id="sizeselect" name="sizes">
						<option>Select Size</option>
						<option value="Free Size">Free Size</option>
						<option value="Small">Small</option>
						<option value="Medium">Medium</option>
						<option value="Large">Large</option>
						<option value="Extra Large">XL</option>
						<option value="XXL">XXL</option>
                  </select>
				<input type='button' value='Add Size' onclick="choosesize(); return false;">
				<label id="chooseSizemsg"></label>
				</td>
		</tr>
	
			
			
						<tbody id="smalltbody"></tbody>
						<tbody id="xxltbody"></tbody>
						<tbody id="mediumtbody"></tbody>
						<tbody id="largetbody"></tbody>
						<tbody id="freesizetbody"></tbody>
						<tbody id="extralargetbody"></tbody>
			
				
				
				
				<tr>
                <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save"  id="myBtn" onmouseover="checkempty(this)" />
                    </td>
                </tr>
            </table>
			
			
			
			
			 
			 
            </form>
        </div>
    </div>
</div>


<style>
.variantnames{
	
	font-weight: bold; 
	padding-right: 125px;
}

</style>

<input type="hidden" name="xlname"  value= "<?php echo $xlsizename ; ?>" />

<input type="hidden" name="smallname"  value= "<?php echo $smallname ; ?>" />

<input type="hidden" name="xxlname"  value= "<?php echo $xxlname; ?>" />

<input type="hidden" name="mediumname"  value= "<?php echo $mediumname; ?>" />

<input type="hidden" name="largename"  value= "<?php echo $largename ; ?>" />

<input type="hidden" name="fsname"  value= "<?php echo $freesizename; ?>" />



<input type="hidden" name="xlname_deleted"  value=<?php echo $xlsizename_deleted ; ?> />

<input type="hidden" name="smallname_deleted"  value= <?php echo $smallname_deleted ; ?> />


<input type="hidden" name="xxlname_deleted"  value= <?php echo $xxlname_deleted; ?> />

<input type="hidden" name="mediumname_deleted"  value=<?php echo $mediumname_deleted; ?> />

<input type="hidden" name="largename_deleted"  value=<?php echo $largename_deleted ; ?> />

<input type="hidden" name="fsname_deleted"  value= <?php echo $freesizename_deleted; ?> />



<script>





function checkthisValue(thival){ 
	
	 var body = document.getElementsByName('body');

	var productName = document.getElementsByName('productName');
	
	//productName , catId, body price, type

		
	
	if(thival ===""){
	
	// document.getElementById("myBtn").disabled =  true;
	productName[0].style.backgroundColor ="#FFCCCB"; 
	 
	 return
	} else{
		
		//document.getElementById("myBtn").disabled =  false;
		  productName[0].style.backgroundColor =""; 
	}



	var alpanumeric = /^[A-Z0-9_]*[A-Z0-9][A-Z0-9 _]*$/;
	
	if(productName[0].value.match(alpanumeric))
      {
		
		   //document.getElementById("myBtn").disabled =  true;
		   
		   productName[0].style.backgroundColor ="#FFCCCB"; 
		   	// document.getElementById("myBtn").disabled =  true;
		    
			return;
		   
	  }else{
			
		  productName[0].style.backgroundColor =""; 
		  //document.getElementById("myBtn").disabled =  false;
	  }



//chooseSizemsg.style.color = "red";

		
}


function checkprice(thival){
	price = document.getElementsByName('price');
	if(thival ===""){
	price[0].style.backgroundColor ="#FFCCCB"; 
	 //document.getElementById("myBtn").disabled =  true;
	 return
	} else{
		price[0].style.backgroundColor =""; 
		// document.getElementById("myBtn").disabled =  false;
	}
	
	
	
	
	var numbers = /^[-+]?[0-9]+$/;
	
	 if(price[0].value.match(numbers))
      {
		  price[0].style.backgroundColor =""; 
		 // document.getElementById("myBtn").disabled =  false;
		   //document.getElementById("myBtn").disabled =  true;
	  }else{
		  
		   price[0].style.backgroundColor ="#FFCCCB"; 
		   //	 document.getElementById("myBtn").disabled =  true;
			 return;
	  }
	
	/*

	    var phone = document.getElementsByName('phone');
	   
		var numbers = /^[-+]?[0-9]+$/;
		
		//phone[0].style.backgroundColor =""; 
		
      if(phone[0].value.match(numbers))
      {
		  */
}

















document.getElementById("myBtn").disabled = true;

function choosesize(){

	var selectedOption = document.getElementById("sizeselect").value;
	
	var  chooseSizemsg = document.getElementById("chooseSizemsg");
	
	var sizename = document.getElementsByName('sizename[]');
	
	var smallname = document.getElementsByName('smallname');
	
	var xxlname = document.getElementsByName('xxlname');
	 var mediumname = document.getElementsByName('mediumname');
	
	
	var largename = document.getElementsByName('largename');
	var fsname = document.getElementsByName('fsname');
	var xlname = document.getElementsByName('xlname');
	
	
	
	
		/*		
				
	<tr class="smalltr">
						<td>
							<label>Size Name:</label>
						</td>
						
					<td>  
						<label class="variantnames" >Small Size:</label> 
						
						<input type="hidden" name="sizename[]"  value= "<?php echo $size_res["sizename"]; ?>" />
						
						<input type='button' value='Add Variant' onclick="SmallAddInputField(); return false;">
						<input type='button' value='Delete' onclick="deleteALLvariationAndSize('small','<?php echo $size_res["sizeid"]; ?>');">	
					</td>
						<input type="hidden" name="sizeid_sizes[]"  value= "<?php echo $size_res["sizeid"]; ?>" />
						
						
		</tr>	
				
				
		*/		
				
		
	
	
	
	switch(selectedOption) {
		
		case "Small":
		
			if(selectedOption === smallname[0].value){
		
				$("#chooseSizemsg").fadeIn();
				chooseSizemsg.style.color = "red";
				
				chooseSizemsg.innerHTML ="You've already chosen a small size";
				
				$("#chooseSizemsg").fadeOut(5000);
		
		//meron nang input field ang small kaya hindi na maglalagay ng isa pang input field
		
		}
			if(selectedOption !== smallname[0].value){
			
			// wala pang input field para sa small kaya maglagay ka ng input field
				$("#chooseSizemsg").fadeIn();
				chooseSizemsg.style.color = "green";
				
				chooseSizemsg.innerHTML ="Small Size has been entered please add a variation";
			
				$("#chooseSizemsg").fadeOut(5000);
			 
				smallname[0].value ="Small";
				
				var  smalltbody = document.getElementById("smalltbody");
			
				var tr1 = document.createElement("tr");
				tr1.setAttribute("class", "smalltr");
			
			
			var sizeNamelabelTD = "<td><label>Size Name:</label></td> <td>  <label class='variantnames'>Small Size:</label>";
			var AddbuttonTD = "<input type='button' value='Add Variant' onclick='SmallAddInputField(); return false;'>";
			var deleteTd = "<input type='button' value='Delete' onclick=deleteALLvariationAndSize('small',0);></td>";
		
		
				tr1.innerHTML = sizeNamelabelTD + AddbuttonTD + deleteTd;
				smalltbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
		}
		break ;
		
		case "Medium":
		
		
			if(selectedOption === mediumname[0].value){
		
			//meron nang input field ang small kaya hindi na maglalagay ng isa pang input field
				$("#chooseSizemsg").fadeIn();
			
				chooseSizemsg.style.color = "red";
				
				chooseSizemsg.innerHTML ="You've already chosen a Medium size";
				
				$("#chooseSizemsg").fadeOut(5000);
			}
			
			
			if(selectedOption !== mediumname[0].value){
		
				// wala pang input field para sa small kaya maglagay ka ng input field
				
				$("#chooseSizemsg").fadeIn();
				
				chooseSizemsg.style.color = "green";
				
				chooseSizemsg.innerHTML ="Medium Size has been entered please add a variation";
			
				$("#chooseSizemsg").fadeOut(5000);
				
				mediumname[0].value ="Medium";
				
				var  mediumtbody = document.getElementById("mediumtbody");
			
				var tr1 = document.createElement("tr");
				tr1.setAttribute("class", "mediumtr");
			
			
			var sizeNamelabelTD = "<td><label>Size Name:</label></td> <td>  <label class='variantnames'>Medium Size:</label>";
			var AddbuttonTD = "<input type='button' value='Add Variant' onclick='MediumAddInputField(); return false;'>";
			var deleteTd = "<input type='button' value='Delete' onclick=deleteALLvariationAndSize('medium',0);></td>";
		
		
				tr1.innerHTML = sizeNamelabelTD + AddbuttonTD + deleteTd;
				mediumtbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
		}
		
		break;
		
			
		case "Free Size":
		
		
			if(selectedOption === fsname[0].value){
		
			//meron nang input field ang small kaya hindi na maglalagay ng isa pang input field
				$("#chooseSizemsg").fadeIn();
			
				chooseSizemsg.style.color = "red";
				
				chooseSizemsg.innerHTML ="You've already chosen a Free size";
				
				$("#chooseSizemsg").fadeOut(5000);
			}
			if(selectedOption !== fsname[0].value){
		
				// wala pang input field para sa small kaya maglagay ka ng input field
				$("#chooseSizemsg").fadeIn();
				
				chooseSizemsg.style.color = "green";
				
				chooseSizemsg.innerHTML ="Free Size has been entered please add a variation";
			
				$("#chooseSizemsg").fadeOut(5000);
				
				fsname[0].value ="Free Size";
				
				var  freesizetbody = document.getElementById("freesizetbody");
			
				var tr1 = document.createElement("tr");
				tr1.setAttribute("class", "freesizetr");
			
			
			var sizeNamelabelTD = "<td><label>Size Name:</label></td> <td>  <label class='variantnames'>Free Size:</label>";
			var AddbuttonTD = "<input type='button' value='Add Variant' onclick='FreeSizeAddInputField(); return false;'>";
			var deleteTd = "<input type='button' value='Delete' onclick=deleteALLvariationAndSize('freesize',0);></td>";
		
		
				tr1.innerHTML = sizeNamelabelTD + AddbuttonTD + deleteTd;
				freesizetbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
		}
		
		break;
		
		case "Large":
		
			if(selectedOption === largename[0].value){
		
			//meron nang input field ang small kaya hindi na maglalagay ng isa pang input field
				$("#chooseSizemsg").fadeIn();
			
				chooseSizemsg.style.color = "red";
				
				chooseSizemsg.innerHTML ="You've already chosen a Large size";
				
				$("#chooseSizemsg").fadeOut(5000);
				
		}
			if(selectedOption !== largename[0].value){
		
				// wala pang input field para sa small kaya maglagay ka ng input field
				
				$("#chooseSizemsg").fadeIn();
				
				chooseSizemsg.style.color = "green";
				
				chooseSizemsg.innerHTML ="Large Size has been entered please add a variation";
			
				$("#chooseSizemsg").fadeOut(5000);
			
				largename[0].value ="Large";
				var  largetbody = document.getElementById("largetbody");
				var tr1 = document.createElement("tr");
				tr1.setAttribute("class", "largetr");
			
			
			var sizeNamelabelTD = "<td><label>Size Name:</label></td> <td>  <label class='variantnames'>Large Size:</label>";
			var AddbuttonTD = "<input type='button' value='Add Variant' onclick='LargeAddInputField(); return false;'>";
			var deleteTd = "<input type='button' value='Delete' onclick=deleteALLvariationAndSize('large',0);></td>";
		
		
				tr1.innerHTML = sizeNamelabelTD + AddbuttonTD + deleteTd;
				largetbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
		}
		
		break;
		
		case "Extra Large":
		
		
			if(selectedOption === xlname[0].value){
		
				//meron nang input field ang small kaya hindi na maglalagay ng isa pang input field
				$("#chooseSizemsg").fadeIn();
			
				chooseSizemsg.style.color = "red";
				
				chooseSizemsg.innerHTML ="You've already chosen a XL size";
				
				$("#chooseSizemsg").fadeOut(5000);
				
			}
				if(selectedOption !== xlname[0].value){
		
				// wala pang input field para sa small kaya maglagay ka ng input field
			
			
				$("#chooseSizemsg").fadeIn();
				
				chooseSizemsg.style.color = "green";
				
				chooseSizemsg.innerHTML ="XL Size has been entered please add a variation";
			
				$("#chooseSizemsg").fadeOut(5000);
				
			
				xlname[0].value ="Extra Large";
				
				var  extralargetbody = document.getElementById("extralargetbody");
			
				var tr1 = document.createElement("tr");
				tr1.setAttribute("class", "extralargetr");
			
			
			var sizeNamelabelTD = "<td><label>Size Name:</label></td> <td>  <label class='variantnames'>Extra Large Size:</label>";
			var AddbuttonTD = "<input type='button' value='Add Variant' onclick='XLAddInputField(); return false;'>";
			var deleteTd = "<input type='button' value='Delete' onclick=deleteALLvariationAndSize('extralarge',0);></td>";
		
		
				tr1.innerHTML = sizeNamelabelTD + AddbuttonTD + deleteTd;
				extralargetbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
				
		}
	
		break;
		
		
		case "XXL":
		
		
			if(selectedOption === xxlname[0].value){
		
				//meron nang input field ang small kaya hindi na maglalagay ng isa pang input field
			
				$("#chooseSizemsg").fadeIn();
			
				chooseSizemsg.style.color = "red";
				
				chooseSizemsg.innerHTML ="You've already chosen a XXL size";
				
				$("#chooseSizemsg").fadeOut(5000);
			}
			
			if(selectedOption !== xxlname[0].value){
		
				// wala pang input field para sa small kaya maglagay ka ng input field
				
				$("#chooseSizemsg").fadeIn();
				
				chooseSizemsg.style.color = "green";
				
				chooseSizemsg.innerHTML ="XXL Size has been entered please add a variation";
			
				$("#chooseSizemsg").fadeOut(5000);
		
			
				xxlname[0].value ="XXL";
				
				
				var  xxltbody = document.getElementById("xxltbody");
			
				var tr1 = document.createElement("tr");
				tr1.setAttribute("class", "xxltr");
			
			
			var sizeNamelabelTD = "<td><label>Size Name:</label></td> <td>  <label class='variantnames'>XXL Size:</label>";
			var AddbuttonTD = "<input type='button' value='Add Variant' onclick='XXLAddInputField(); return false;'>";
			var deleteTd = "<input type='button' value='Delete' onclick=deleteALLvariationAndSize('xxl',0);></td>";
		
		
				tr1.innerHTML = sizeNamelabelTD + AddbuttonTD + deleteTd;
				xxltbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
				
				
			
				
		}
		
		break;
		
		default:
		
	
}
	
	
	
	
	

	 
	
	
	/*
			
	small freesize  medium large extralarge xxl
	
	Small
	Medium
	Free Size
	Large
	XXL
	Extra Large
	
	class freesizetr 
	class largetr
	class	mediumtr
	class	xxltr
	class smalltr
	class extralargetr
	
	class freesizetr   id freesizetbody
		class largetr	  id largetbody
		class	mediumtr	id mediumtbody	
		class	xxltr	  id xxltbody
		class smalltr	  id smalltbody		
		class extralargetr id extralargetbody	
	
	choosesizetr
		choosesize
		 id smalltbody	
		id xxltbody
			id mediumtbody	
		id largetbody
		id freesizetbody
	id extralargetbody	
	*/
}





  function deleteRow(r,getvalue) {
			var i = r.parentNode.parentNode.rowIndex;
			document.getElementById("myTable").deleteRow(i);
			document.getElementById("myBtn").disabled = true;
			
			var smallname_deleted = document.getElementsByName('smallname_deleted');
	
			var xxlname_deleted = document.getElementsByName('xxlname_deleted');
			var mediumname_deleted = document.getElementsByName('mediumname_deleted');
	
	
			var largename_deleted = document.getElementsByName('largename_deleted');
			var fsname_deleted = document.getElementsByName('fsname_deleted');
			var xlname_deleted = document.getElementsByName('xlname_deleted');
			
	
			var smalltr = document.getElementsByClassName("smalltr");	
			
			var freesizetr	= document.getElementsByClassName("freesizetr");	
			
			var largetr	= document.getElementsByClassName("largetr");	
				
			var mediumtr = document.getElementsByClassName("mediumtr");	
					
			var xxltr	= document.getElementsByClassName("xxltr");	
						
			var extralargetr =document.getElementsByClassName("extralargetr");	
							
				
		//alert(smalltr.length); 
		
			if(smalltr.length==1){
			
				smallname_deleted[0].value = 0  ;
			
			}
		
			if(freesizetr.length==1){
			
				fsname_deleted[0].value = 0  ;
			
			}
		
			if(largetr.length==1){
			
				largename_deleted[0].value = 0  ;
			
			}
			if(mediumtr.length==1){
			
				mediumname_deleted[0].value = 0  ;
			
			}
			if(xxltr.length==1){
			
				xxlname_deleted[0].value = 0  ;
			
			}
		
			if(extralargetr.length==1){
			
				xlname_deleted[0].value = 0  ;
			
			}
		
			checkempty();
		
		
		//freesizetr.length
		//largetr.length
		//mediumtr.length
		//xxltr.length
		//extralargetr.length		
		
			//alert(getvalue);
			 //alert(i);
			
			//myFunction();
}





function deleteALLvariationAndSize(sizename,sizeid){
	
	switch(sizename) {
			case "small":
			
				var smallname = document.getElementsByName('smallname');
			
				smallname[0].value ="";
			
				const smalltr = document.getElementsByClassName("smalltr");

				while (smalltr.length > 0) smalltr[0].remove();
				
				var smallname_deleted = document.getElementsByName('smallname_deleted');
					document.getElementById("myBtn").disabled =  true;
		
					smallname_deleted[0].value=0;
					checkempty()
					
					
			break;
			
			case "freesize":
			
				var fsname = document.getElementsByName('fsname');
				fsname[0].value ="";
			
				const freesizetr = document.getElementsByClassName("freesizetr");

				while (freesizetr.length > 0) freesizetr[0].remove();
				
				var fsname_deleted = document.getElementsByName('fsname_deleted');
					document.getElementById("myBtn").disabled =  true;
		
					fsname_deleted[0].value = 0;
					checkempty()
			
			break;
			
			
			case "medium":
		
				var mediumname = document.getElementsByName('mediumname');
	
				mediumname[0].value ="";
			
				const mediumtr = document.getElementsByClassName("mediumtr");

				while (mediumtr.length > 0) mediumtr[0].remove();
				
				var mediumname_deleted = document.getElementsByName('mediumname_deleted');
				
					document.getElementById("myBtn").disabled =  true;
		
				mediumname_deleted[0].value = 0 ;
				checkempty()
				
			
			break;
			
			
			case "large":
		
					var largename = document.getElementsByName('largename');
			
					largename[0].value ="";
			
					const largetr = document.getElementsByClassName("largetr");

					while (largetr.length > 0) largetr[0].remove();
					
						document.getElementById("myBtn").disabled =  true;
		
					var largename_deleted = document.getElementsByName('largename_deleted');
					
					largename_deleted[0].value = 0;
					checkempty()
					
			break;
			
			case "extralarge":
		
					var xlname = document.getElementsByName('xlname');
			
					xlname[0].value ="";
				
					const extralargetr = document.getElementsByClassName("extralargetr");
			
					while (extralargetr.length > 0) extralargetr[0].remove();
					
					
						document.getElementById("myBtn").disabled =  true;
		
					var xlname_deleted = document.getElementsByName('xlname_deleted');
					
					xlname_deleted[0].value = 0;
					checkempty()
					
			break;
			
			
			case "xxl":
			
					var xxlname = document.getElementsByName('xxlname');
					
					
					xxlname[0].value ="";

					const xxltr = document.getElementsByClassName("xxltr");
					while (xxltr.length > 0) xxltr[0].remove();
					
					
						document.getElementById("myBtn").disabled =  true;
		
					var xxlname_deleted = document.getElementsByName('xxlname_deleted');
					xxlname_deleted[0].value = 0;
					checkempty()
					
			break;
			
			
			default:
			// code block
}
		
		
		
		
	myFunction();	
	
		
		
		
}




function FreeSizeAddInputField(){
	
	var  freesizetbody = document.getElementById("freesizetbody");
	var variantNameTD = "<td><label>Variant name</label></td> <td>  <input type='text' name='VariantFSInputField[]' onkeyup='myFunction(this.value)' placeholder='Free Size' class='variant_class'  />";
	var stocksTD = "<label>Stocks</label> <input type='number' name='StockFSInputField[]' value='0' onclick='stocksthis();'  class='Stocks_variant_class'/>";
	var deleteTrTd = "<input type='button' value='Delete' onclick=deleteRow(this)></td>";
		
		
				var tr1 = document.createElement("tr");
				tr1.setAttribute("class", "freesizetr");
				tr1.innerHTML = variantNameTD + stocksTD + deleteTrTd;
		
				//document.getElementsByClassName("form")[0].appendChild(tr1);
				
				
				freesizetbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
				
				
				
				
				
			var fsname_deleted = document.getElementsByName('fsname_deleted');	
			fsname_deleted[0].value = 1;	
				
	
	
	
	
}




function SmallAddInputField(){
	
	
		var  smalltbody = document.getElementById("smalltbody");
		var tr1 = document.createElement("tr");
		tr1.setAttribute("class", "smalltr");
				
				var variantNameTD ="<td><label>Variant name</label></td> <td>  <input type='text' name='VariantSmallInputField[]' onkeyup='myFunction(this.value)'  placeholder='Small Size' class='variant_class'  />";
				var stocksTD ="<label>Stocks</label> <input type='number' name='StockSmallInputField[]' value='0' onclick='stocksthis()'  class='Stocks_variant_class'/>";
				var deleteTrTd = "<input type='button' value='Delete' onclick=deleteRow(this)></td>";
				
				tr1.innerHTML = variantNameTD + stocksTD + deleteTrTd ;
				smalltbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
				
				
				
				
				var smallname_deleted = document.getElementsByName('smallname_deleted');
	
				smallname_deleted[0].value = 1;
}




function MediumAddInputField(){
	
	var  mediumtbody = document.getElementById("mediumtbody");
	var tr1 = document.createElement("tr");
				
				tr1.setAttribute("class", "mediumtr");
				
				var variantNameTD ="<td><label>Variant name</label></td> <td>  <input type='text' name='VariantMeduimInputField[]' onkeyup='myFunction(this.value)' placeholder='Medium size' class='variant_class'  />";
				var stocksTD ="<label>Stocks</label>  <input type='number' name='StockMeduimInputField[]' value='0' onclick='stocksthis()'  class='Stocks_variant_class'/>";
				var deleteTrTd = "<input type='button' value='Delete' onclick=deleteRow(this)></td>";
				
		
				tr1.innerHTML = variantNameTD +stocksTD +deleteTrTd ;
		
				//document.getElementsByClassName("form")[0].appendChild(tr1);
		
				mediumtbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
				//remove and disable stocks
				// RemoveTDFromStockstr();
				
				var mediumname_deleted = document.getElementsByName('mediumname_deleted');
				mediumname_deleted[0].value = 1;
	}




function XLAddInputField(){
	
				var  extralargetbody	= document.getElementById("extralargetbody");
				var tr1 = document.createElement("tr");
				
				tr1.setAttribute("class", "extralargetr");
				
				var variantNameTD ="<td><label>Variant name</label></td> <td><input type='text' name='VariantXLInputField[]'  onkeyup='myFunction(this.value)' placeholder='XL size' class='variant_class' />";
				var stocksTD = "<label>Stocks</label>  <input type='number' name='StockXLInputField[]'  onclick='stocksthis()'  value='0' class='Stocks_variant_class' />";
				var deleteTrTd = "<input type='button' value='Delete' onclick=deleteRow(this)></td>";
				
		
				tr1.innerHTML =  variantNameTD +stocksTD +deleteTrTd ;
				//document.getElementsByClassName("form")[0].appendChild(tr1);
				extralargetbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
				//remove and disable stocks
				// RemoveTDFromStockstr();
				
			var xlname_deleted = document.getElementsByName('xlname_deleted');
				
			xlname_deleted[0].value = 1;
}


function LargeAddInputField(){
	
				var  largetbody = document.getElementById("largetbody");
				var tr1 = document.createElement("tr");
				
				tr1.setAttribute("class", "largetr");
				
				
			
				var variantNameTD ="<td><label>Variant name</label></td> <td>  <input type='text' name='VariantLargeInputField[]' onkeyup='myFunction(this.value)'  placeholder='Large size'  class='variant_class'  />";
				var stocksTD ="<label>Stocks</label> <input type='number' name='StockLargeInputField[]'  value='0' onclick='stocksthis()'  class='Stocks_variant_class'/>";
				var deleteTrTd = "<input type='button' value='Delete' onclick=deleteRow(this)></td>";
			
				tr1.innerHTML = variantNameTD +stocksTD +deleteTrTd ;
		
				document.getElementsByClassName("form")[0].appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
				
				
				largetbody.appendChild(tr1);
				
				//remove and disable stocks
				// RemoveTDFromStockstr();
				
				var largename_deleted = document.getElementsByName('largename_deleted');
				largename_deleted[0].value =1 ;
}	 





function XXLAddInputField(){
	
				var  xxltbody	= document.getElementById("xxltbody");
				var tr1 = document.createElement("tr");
				tr1.setAttribute("class", "xxltr");
			
				var variantNameTD ="<td><label>Variant name</label></td> <td>  <input type='text' name='VariantXXLInputField[]'  onkeyup='myFunction(this.value)' placeholder='XXL size'  class='variant_class' />";
				var stocksTD ="<label>Stocks</label> <input type='number' name='StockXXLInputField[]' onclick='stocksthis()' value='0'  class='Stocks_variant_class'/>";
				var deleteTrTd = "<input type='button' value='Delete' onclick=deleteRow(this)></td>";
				
				
				tr1.innerHTML = variantNameTD+stocksTD+deleteTrTd;
		
				//document.getElementsByClassName("form")[0].appendChild(tr1);
				xxltbody.appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
				//remove and disable stocks
				//RemoveTDFromStockstr();
				
				var xxlname_deleted = document.getElementsByName('xxlname_deleted');
				
				xxlname_deleted[0].value = 1;
				
}




function stocksthis(){
		  
		
		  var StockFSInputField = document.getElementsByName('StockFSInputField[]');
		  var StockSmallInputField = document.getElementsByName('StockSmallInputField[]');
		  
		 
		  
		 var Stocks_variant = document.getElementsByName('Stocks_variant[]');
		 
		var  Stocks_variant_class = document.getElementsByClassName('Stocks_variant_class');
		 
		 	//red stock field    if value of stock less or equal to zero from  add variant button
		  for(var i = 0; i < Stocks_variant_class.length; i++){
			  
				var a = Stocks_variant_class[i];
				
			if(a.value <= 0){
				
				//if value of stock less or equal to zero red stock field
				Stocks_variant_class[i].style.backgroundColor ="#FFCCCB";
			}
			else{
				
				Stocks_variant_class[i].style.backgroundColor ="";
			}
		  }
		 
		 
		 
		 
		  	//red stock field    if value of stock less or equal to zero from  add variant button
		  for(var i = 0; i < Stocks_variant_class.length; i++){
			  
				var a = Stocks_variant_class[i];
				
			if(a.value <= 0){
				
				//if value of stock less or equal to zero red stock field
				
				
				document.getElementById("myBtn").disabled =  true;
				
				return ;
			}
			else{
				
				document.getElementById("myBtn").disabled =  false;
				
				
			}
		  }
		  
			 
			//myFunction(); 
			
	  }
	  
	  
	  
	  
	  
	  
function checkempty(){
	
	
		//checkthisValue(thival);
		//checkprice(thival);
	
	
			var variant_class = document.getElementsByClassName('variant_class');
			var  Stocks_variant_class = document.getElementsByClassName('Stocks_variant_class');
	
	
			var freesizetr = document.getElementsByClassName("freesizetr");
			var freesizetr_num = freesizetr.length	;
			
			var smalltr = document.getElementsByClassName("smalltr");
			var smalltr_num = smalltr.length	;
			
			
			var xxltr = document.getElementsByClassName("xxltr");
			var xxltr_num = xxltr.length	;
			
			var mediumtr = document.getElementsByClassName("mediumtr");
			var mediumtr_num = mediumtr.length	;
			
			var largetr = document.getElementsByClassName("largetr");
			var largetr_num = largetr.length	;
			
			
			
			var extralargetr = document.getElementsByClassName("extralargetr");
			var extralargetr_num = extralargetr.length	;
			
			
			
			
			
			if(freesizetr_num ==1){
				document.getElementById("myBtn").disabled =  true;
				//alert(freesizetr_num);
			return ;
			}
			if(smalltr_num==1){
				document.getElementById("myBtn").disabled =  true;
				//alert(smalltr_num);
			return ;
			}
			if(xxltr_num==1){
		 document.getElementById("myBtn").disabled =  true;
				//alert(xxltr_num);
			return ;
			}
			if(mediumtr_num==1){
		 document.getElementById("myBtn").disabled =  true;
				//alert(mediumtr_num);
			return ;
		 
			}
			if(largetr_num==1){
		 document.getElementById("myBtn").disabled =  true;
				//alert(largetr_num);
			return ;
			}
			if(extralargetr_num==1){
		 
		 document.getElementById("myBtn").disabled =  true;
			//alert(extralargetr_num);
			return ;
			}

	 
	 
	 
	
		for(var i = 0; i < variant_class.length; i++){
		
			var a = variant_class[i];
		
		//alert(a.value);
			if(a.value ===""){
			
				document.getElementById("myBtn").disabled =  true;
				
			return ;
		}
		else{
			 
			document.getElementById("myBtn").disabled =  false;
		
			
		}
        
     }
	 
	 
	   for(var i = 0; i < Stocks_variant_class.length; i++){
			  
				var a = Stocks_variant_class[i];
				
			if(a.value <= 0){
				
				//if value of stock less or equal to zero red stock field
				
				
				document.getElementById("myBtn").disabled =  true;
				
				return ;
			}
			else{
				
				document.getElementById("myBtn").disabled =  false;
				
				
			}
		  }
	 
	 
	 
		const smallname_deleted = document.getElementsByName('smallname_deleted');
	
		const xxlname_deleted = document.getElementsByName('xxlname_deleted');
		const mediumname_deleted = document.getElementsByName('mediumname_deleted');
	
	
		const largename_deleted = document.getElementsByName('largename_deleted');
		const fsname_deleted = document.getElementsByName('fsname_deleted');
		const xlname_deleted = document.getElementsByName('xlname_deleted');
	
	
	// one is not deleted
	 if(smallname_deleted[0].value ==1){
		 // on the update button
		 document.getElementById("myBtn").disabled =  false;
		 return
	 }
	
	
	// one is not deleted
	 if(xxlname_deleted[0].value ==1){
		 // on the update button
		 document.getElementById("myBtn").disabled =  false;
		 return
	 }
		// one is not deleted
	 if(mediumname_deleted[0].value ==1){
		 // on the update button
		 document.getElementById("myBtn").disabled =  false;
		 return
	 }
	
	// one is not deleted
	 if(largename_deleted[0].value ==1){
		 // on the update button
		 document.getElementById("myBtn").disabled =  false;
		 return
	 }
	
	
	

	// one is not deleted
	 if(fsname_deleted[0] ==1){
		 alert();
		 // on the update button
		 document.getElementById("myBtn").disabled =  false;
		 return
	 }
	
	
	
	// one is not deleted
	 if(xlname_deleted[0] ==1){
		 // on the update button
		 document.getElementById("myBtn").disabled =  false;
		 return
	 }
	 
	 
	 
	 
	 
	 
	 
}










  function myFunction(val){
		 // stocksthis();
		
		  
		var VariantFSInputField = document.getElementsByName('VariantFSInputField[]');
		
		var VariantSmallInputField = document.getElementsByName('VariantSmallInputField[]');	
		
			//var input2 = document.getElementsByName('array2[]');
		var VariantMeduimInputField = document.getElementsByName('VariantMeduimInputField[]');
		
		var VariantLargeInputField= document.getElementsByName('VariantLargeInputField[]');
		
		
		var VariantXLInputField= document.getElementsByName('VariantXLInputField[]');
		
		var VariantXXLInputField= document.getElementsByName('VariantXXLInputField[]');
   
		var variant_name= document.getElementsByName('variant_name[]');
   

	   
	   var  Stocks_variant_class = document.getElementsByClassName('Stocks_variant_class');
	   
	   
	   var variant_class = document.getElementsByClassName('variant_class');
		//document.getElementsByClassName('variant_class')[0].value;
		
		for(var i = 0; i < variant_class.length; i++){
			
                var a = variant_class[i];
     
		if(a.value ===""){
			variant_class[i].style.backgroundColor ="#FFCCCB";
			}
		 else{
			variant_class[i].style.backgroundColor ="";
		}
       }
	   
	   
	  for(var i = 0; i < variant_class.length; i++){
		
		var a = variant_class[i];
     
		if(a.value ===""){
				document.getElementById("myBtn").disabled =  true;
				
			return ;
		}
		else{
			
			document.getElementById("myBtn").disabled =  false;
		
			
		}
        
     }
		//stocksthis();
		 
		
		
}










































/*

function RemoveTDFromStockstr(){


//remove and disable stocks
				 var stockstr = document.getElementById("stockstr");
				 var num_stock = document.getElementById("num_stock");
				var stock_typeid = document.getElementById("stock_typeid");
				
				
				if(stockstr.style.display === ""){
			 
					stockstr.style.display = "none";
					num_stock.value =0;
					num_stock.disabled = true;
					stock_typeid.value= 2;
			
				}
				


}

function ShowStockTDFromStockstr(){



	//show and disable stocks
				 var stockstr = document.getElementById("stockstr");
				 var num_stock = document.getElementById("num_stock");
				var stock_typeid = document.getElementById("stock_typeid");
				
				
				if(stockstr.style.display === "none"){
			 
					stockstr.style.display = "";
					num_stock.value =0;
					num_stock.disabled = false;
					stock_typeid.value= 1;
					
			
				}



		
				


}


*/




</script>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">









 





 $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
	
	
	
	
	
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


