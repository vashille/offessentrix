	 
	
	 
	 <?php


		
	

	
	
	//FREE SIZE
	if($_SERVER['REQUEST_METHOD'] && isset($_POST['VariantFSInputField']) && isset($_POST['StockFSInputField'])){
		
			$VariantFSInputField = $_POST['VariantFSInputField'];
			$StockFSInputField = $_POST['StockFSInputField'];
			echo "FREE SIZE <br>";
			foreach($VariantFSInputField  as $key => $n ) {
				echo '<br>';
				echo   $VariantFSInputField[$key]. "  "  ;
				echo 	$StockFSInputField[$key]. "<br>";
				
			}
	}
	
	//SMALL
		if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['VariantSmallInputField']) && isset($_POST['StockSmallInputField'])){
			
			$VariantSmallInputField = $_POST['VariantSmallInputField'];
			$StockSmallInputField = $_POST['StockSmallInputField'];
			echo "SMALL <br>";
			foreach($VariantSmallInputField  as $key => $n ) {
				echo '<br>';
				echo   $VariantSmallInputField[$key]. "  "  ;
				echo 	$StockSmallInputField[$key]. "<br>";
				
			}
		
		}
	
	
	//MEDUIM
	if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['VariantMeduimInputField']) && isset($_POST['StockMeduimInputField'])){
			
			
			echo "MEDUIM <br>";
			$VariantMeduimInputField = $_POST['VariantMeduimInputField'];
			$StockMeduimInputField = $_POST['StockMeduimInputField'];
			
			foreach($VariantMeduimInputField  as $key => $n ) {
				echo '<br>';					
				echo   $VariantMeduimInputField[$key]. "  "  ;
				echo 	$StockMeduimInputField[$key]. "<br>";
				
			}
		
		}
		
	//Large
	if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['VariantLargeInputField']) && isset($_POST['StockLargeInputField'])){
			
			
			echo "Large <br>";
			
			$VariantLargeInputField = $_POST['VariantLargeInputField'];
			$StockLargeInputField = $_POST['StockLargeInputField'];
			
			foreach($VariantLargeInputField  as $key => $n ) {
				echo '<br>';					
				echo   $VariantLargeInputField[$key]. "  " ;
				echo 	$StockLargeInputField[$key]. "<br>";
				
			}
		
		}
		
		//XL
			if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['VariantXLInputField']) && isset($_POST['StockXLInputField'])){
			
			$VariantXLInputField = $_POST['VariantXLInputField'];
			$StockXLInputField = $_POST['StockXLInputField'];
			
			echo "XL  <br>";
			foreach($VariantXLInputField  as $key => $n ) {
				echo '<br>';
				echo   $VariantXLInputField[$key]. "  "  ;
				echo 	$StockXLInputField[$key]. "<br>";
				
			}
		
		}
		
		
		
		//XXL
		if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['VariantXXLInputField']) && isset($_POST['StockXXLInputField'])){
			
			$VariantXXLInputField = $_POST['VariantXXLInputField'];
			$StockXXLInputField = $_POST['StockXXLInputField'];
			
			echo "XXL <br>";
			
			foreach($VariantXXLInputField  as $key => $n ) {
				echo '<br>';
				echo   $VariantXXLInputField[$key]. "  "  ;
				echo 	$StockXXLInputField[$key]. "<br>";
				
			}
		
		}
		
		
		
	
	
	/*
	
		$_POST['VariantFSInputField'];
		$_POST['StockFSInputField'];
	 
	 
		$_POST['VariantSmallInputField'] ;
		$_POST['StockSmallInputField'] ;
		
		$_POST['VariantMeduimInputField'];
		$_POST['StockMeduimInputField'];
		
		$_POST['VariantLargeInputField'];
		$_POST['StockLargeInputField'];
		
		
		$_POST['VariantXLInputField'];
		$_POST['StockXLInputField'];
	
	
		$_POST['VariantXXLInputField'];
	    $_POST['StockXXLInputField'];
	
	
	*/
	
	
	
	
	
	
		if($_SERVER['REQUEST_METHOD'] &&  isset($_POST['sizess']) ){
			
			$sizess = $_POST['sizess'];
			
			
			echo " <br>";
			
			foreach($sizess  as $key => $n ) {
				echo '<br>';
				echo   $sizess[$key]. "  "  ;
				
				
			}
		
		}
	
	
	
	
	
?>
 <form action="test.php" method="post" >
<select id="sizeselect" name="sizess[]">
				    <option>Select Size</option>
					<option value="FS">Free Size</option>
					<option value="S">S</option>
						<option value="M">M</option>
						<option value="L">L</option>
						<option value="XL">XL</option>
						<option value="XXL">XXL</option>
                  </select>
				  
				  <select id="sizeselect" name="sizess[]">
				    <option>Select Size</option>
					<option value="FS">Free Size</option>
					<option value="S">S</option>
						<option value="M">M</option>
						<option value="L">L</option>
						<option value="XL">XL</option>
						<option value="XXL">XXL</option>
                  </select>
				  <select id="sizeselect" name="sizess[]">
				    <option>Select Size</option>
					<option value="FS">Free Size</option>
					<option value="S">S</option>
						<option value="M">M</option>
						<option value="L">L</option>
						<option value="XL">XL</option>
						<option value="XXL">XXL</option>
                  </select>
				  <input type="submit" name="submit" Value="Save"  />
<form>

 <form action="test.php" method="post" >
	<table  class="form" id="myTable" >
		 <tr>
			 <td>Choose Size</td>
				<td>
				 <select id="sizeselect" name="sizes">
				    <option>Select Size</option>
					<option value="FS">Free Size</option>
					<option value="S">S</option>
						<option value="M">M</option>
						<option value="L">L</option>
						<option value="XL">XL</option>
						<option value="XXL">XXL</option>
                  </select>
				
					 <button onclick="addInputField();return false;">Add Color</button>
					 
			</td>
		</tr>
	</table> 
	 <input type="submit" name="submit" Value="Save"  id="myBtn"/>
</form>
    
	
	
	<form class="" action="index.html" method="post">
        <input type="text" name="array[]" value=""  onkeyup="myFunction(this.value)" /><br>
        <input type="text" name="array[]" value="" onkeyup="myFunction(this.value)"/><br>
        <input type="text" name="array[]" value="" onkeyup="myFunction(this.value)"/><br>
        <input type="text" name="array[]" value="" onkeyup="myFunction(this.value)"/><br>
        <input type="text" name="array[]" value="" onkeyup="myFunction(this.value)"/><br>
		
		<input type="text" name="array2[]"   onkeyup="myFunction(this.value)" /><br>
        <input type="text" name="array2[]"  onkeyup="myFunction(this.value)"/><br>
        <input type="text" name="array2[]"  onkeyup="myFunction(this.value)"/><br>
        <input type="text" name="array2[]"  onkeyup="myFunction(this.value)"/><br>
        <input type="text" name="array2[]"  onkeyup="myFunction(this.value)"/><br>
		
		
		
        <button type="button" name="button" onclick="Geeks()" >
            Submit
        </button>
		
		
		
		
		
    </form>
	 
	 
	 
	 
	 
	 
	 
	  <script>
	  
	  //document.getElementById("myBtn").disabled = true;
		/*	
        var k = "The respective values are :";
		
        function Geeks() {
            var input = document.getElementsByName('array[]');
 
            for (var i = 0; i < input.length; i++) {
                var a = input[i];
                k = k + "array[" + i + "].value= "
                                   + a.value + " ";
            }
 
            document.getElementById("par").innerHTML = k;
            document.getElementById("po").innerHTML = "Output";
        }
        
      */
	  
	  
	  
	  function deleteRow(r) {
		  document.getElementById("myBtn").disabled = false;
		  
			var i = r.parentNode.parentNode.rowIndex;
			document.getElementById("myTable").deleteRow(i);
			myFunction();
			
	}
	  
	  
	 
		
         
      function myFunction(val){
		  
		 
		  
		var VariantFSInputField = document.getElementsByName('VariantFSInputField[]');
		
		var VariantSmallInputField = document.getElementsByName('VariantSmallInputField[]');	
		
			//var input2 = document.getElementsByName('array2[]');
		var VariantMeduimInputField = document.getElementsByName('VariantMeduimInputField[]');
		
		var VariantLargeInputField= document.getElementsByName('VariantLargeInputField[]');
		
		
		var VariantXLInputField= document.getElementsByName('VariantXLInputField[]');
		
		var VariantXXLInputField= document.getElementsByName('VariantXXLInputField[]');
   
   //FREE SIZE
        for (var i = 0; i < VariantFSInputField.length; i++) {
			
                var a = VariantFSInputField[i];
     
			if(a.value ===""){
        
				//if no value disable button
				document.getElementById("myBtn").disabled =  true;
        
				return 
			}
        else{
			//if there is value enable button
				document.getElementById("myBtn").disabled =false;
        }
        
       } 
	   
	   //SMALL 
          for (var i = 0; i < VariantSmallInputField.length; i++) {
			  
                var a = VariantSmallInputField[i];
      
				if(a.value===""){
        
					document.getElementById("myBtn").disabled =  true;
				return 
			}
        else{
				document.getElementById("myBtn").disabled =false;
        }
        
        }
		
	//Meduim	
   for (var i = 0; i < VariantMeduimInputField.length; i++) {
			  
                var a = VariantMeduimInputField[i];
      
				if(a.value===""){
        
					document.getElementById("myBtn").disabled =  true;
				return 
			}
        else{
				document.getElementById("myBtn").disabled =false;
        }
        
        }
		
		//Large
		  for (var i = 0; i < VariantLargeInputField.length; i++) {
			  
                var a = VariantLargeInputField[i];
      
				if(a.value===""){
        
					document.getElementById("myBtn").disabled =  true;
				return 
			}
        else{
				document.getElementById("myBtn").disabled =false;
        }
        
        }
		
		//XL
		  for (var i = 0; i < VariantXLInputField.length; i++) {
			  
                var a = VariantXLInputField[i];
      
				if(a.value===""){
        
					document.getElementById("myBtn").disabled =  true;
				return 
			}
        else{
				document.getElementById("myBtn").disabled =false;
        }
        
        }
		
		//XLL
		  for (var i = 0; i < VariantXXLInputField.length; i++) {
			  
                var a = VariantXXLInputField[i];
      
				if(a.value===""){
        
					document.getElementById("myBtn").disabled =  true;
				return 
			}
        else{
				document.getElementById("myBtn").disabled =false;
        }
        
        }
		
		stocks();
     }
	  
	  
	  function stocks(){
		  
		
		  var StockFSInputField = document.getElementsByName('StockFSInputField[]');
		  var StockSmallInputField = document.getElementsByName('StockSmallInputField[]');
		  
		 //FREE SIZE STOCKS
		  for (var i = 0; i < StockFSInputField.length; i++) {
			
                var a = StockFSInputField[i];
				
				
				
			if(a.value <= 0){
				
				//if no value disable button
				document.getElementById("myBtn").disabled =  true;
        return
				
			}
        else{
			//if there is value enable button
				document.getElementById("myBtn").disabled =false;
        }
        
       } 
	   
	   //SMALL STOCKS
	    for (var i = 0; i < StockSmallInputField.length; i++) {
			
                var a = StockSmallInputField[i];
				
				
				
			if(a.value <= 0){
				
				//if no value disable button
				document.getElementById("myBtn").disabled =  true;
        return
				
			}
        else{
			//if there is value enable button
				document.getElementById("myBtn").disabled =false;
        }
        
       } 
	   
	   
	   
	   
	     //Meduim STOCKS
		var StockMeduimInputField = document.getElementsByName('StockMeduimInputField[]');
		  //Large STOCKS
		var StockLargeInputField = document.getElementsByName('StockLargeInputField[]');
		//XL STOCKS
		var StockXLInputField = document.getElementsByName('StockXLInputField[]');
		
		//XXL STOCKS
		var StockXXLInputField = document.getElementsByName('StockXXLInputField[]');
	   
	   
	   //Meduim STOCKS
	    for (var i = 0; i < StockMeduimInputField.length; i++) {
			
                var a = StockMeduimInputField[i];
				
		if(a.value <= 0){
				
			//if no value disable button
			document.getElementById("myBtn").disabled =  true;
        return
				
			}
        else{
			//if there is value enable button
				document.getElementById("myBtn").disabled =false;
        }
        
       } 
	   
	   
	    //Large STOCKS
	      for (var i = 0; i < StockLargeInputField.length; i++) {
			
                var a = StockLargeInputField[i];
				
		if(a.value <= 0){
				
			//if no value disable button
			document.getElementById("myBtn").disabled =  true;
        return
				
			}
        else{
			//if there is value enable button
				document.getElementById("myBtn").disabled =false;
        }
        
       } 
	   
	   
	   
	   //XL STOCKS
	     for (var i = 0; i < StockXLInputField.length; i++) {
			
                var a = StockXLInputField[i];
				
		if(a.value <= 0){
				
			//if no value disable button
			document.getElementById("myBtn").disabled =  true;
        return
				
			}
        else{
			//if there is value enable button
				document.getElementById("myBtn").disabled =false;
        }
        
       }
	   
	   //XXL STOCKS
	   
	   
	    for (var i = 0; i < StockXXLInputField.length; i++) {
			
                var a = StockXXLInputField[i];
				
		if(a.value <= 0){
				
			//if no value disable button
			document.getElementById("myBtn").disabled =  true;
        return
				
			}
        else{
			//if there is value enable button
				document.getElementById("myBtn").disabled =false;
        }
        
       }
	   
	   myFunction(); 
	  }
	  
	  
	  
	 function addInputField() {
	   
       var selectedOption = document.getElementById("sizeselect").value;
  
		switch (selectedOption) {
		
		case "FS":
		
		
		
		var variantNameTD = "<td><label>Variant name</label></td> <td>  <input type='text' name='VariantFSInputField[]' onkeyup='myFunction(this.value)' placeholder='Free Size' /></td>";
		var stocksTD = "<td><label>Stocks</label></td> <td>  <input type='number' name='StockFSInputField[]' value='0' onclick='stocks()'/></td>";
		var deleteTrTd = "<td><input type='button' value='Delete' onclick=deleteRow(this)></td>";
		
				var tr1 = document.createElement("tr");
				
		
				tr1.innerHTML = variantNameTD + stocksTD + deleteTrTd;
		
				document.getElementsByClassName("form")[0].appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
				
		break;
		
		case "S":
		
			
		
				var tr1 = document.createElement("tr");
				
				
				var variantNameTD ="<td><label>Variant name</label></td> <td>  <input type='text' name='VariantSmallInputField[]' onkeyup='myFunction(this.value)'  placeholder='Small Size'/></td>";
				var stocksTD ="<td><label>Stocks</label></td> <td>  <input type='number' name='StockSmallInputField[]' value='0' onclick='stocks()'/></td>";
				var deleteTrTd = "<td><input type='button' value='Delete' onclick=deleteRow(this)></td>";
				
				tr1.innerHTML = variantNameTD + stocksTD + deleteTrTd ;
				
				document.getElementsByClassName("form")[0].appendChild(tr1);
		
				document.getElementById("myBtn").disabled = true;
				
			break;
		
		
		
			case "M":
				var tr1 = document.createElement("tr");
				
				var variantNameTD ="<td><label>Variant name</label></td> <td>  <input type='text' name='VariantMeduimInputField[]' onkeyup='myFunction(this.value)' placeholder='Meduim size' /></td>";
				
				var stocksTD ="<td><label>Stocks</label></td> <td>  <input type='number' name='StockMeduimInputField[]' value='0' onclick='stocks()'/></td>";
				
				var deleteTrTd = "<td><input type='button' value='Delete' onclick=deleteRow(this)></td>";
				
		
				tr1.innerHTML = variantNameTD +stocksTD +deleteTrTd ;
		
				
		
				document.getElementsByClassName("form")[0].appendChild(tr1);
		
				document.getElementById("myBtn").disabled = true;
		
  	
			break;
			
			case "L":
				
				
				var tr1 = document.createElement("tr");
			
				var variantNameTD ="<td><label>Variant name</label></td> <td>  <input type='text' name='VariantLargeInputField[]' onkeyup='myFunction(this.value)'  placeholder='Large size'/></td>";
				
				var stocksTD ="<td><label>Stocks</label></td> <td>  <input type='number' name='StockLargeInputField[]'  value='0' onclick='stocks()'/></td>";
				
				var deleteTrTd = "<td><input type='button' value='Delete' onclick=deleteRow(this)></td>";
			
			
				tr1.innerHTML = variantNameTD +stocksTD +deleteTrTd ;
		
				document.getElementsByClassName("form")[0].appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
					
  
			break;
			case "XL":
						var tr1 = document.createElement("tr");
						
				var variantNameTD ="<td><label>Variant name</label></td> <td>  <input type='text' name='VariantXLInputField[]'  onkeyup='myFunction(this.value)' placeholder='XL size'/></td>";
				
				var stocksTD = "<td><label>Stocks</label></td> <td>  <input type='number' name='StockXLInputField[]'  onclick='stocks()'  value='0'/></td>";
				
				var deleteTrTd = "<td><input type='button' value='Delete' onclick=deleteRow(this)></td>";
				
		
				tr1.innerHTML =  variantNameTD +stocksTD +deleteTrTd ;
				document.getElementsByClassName("form")[0].appendChild(tr1);
		
				document.getElementById("myBtn").disabled = true;
				
					
			break;
			
			
			case "XXL":
				var tr1 = document.createElement("tr");
				
				var variantNameTD ="<td><label>Variant name</label></td> <td>  <input type='text' name='VariantXXLInputField[]'  onkeyup='myFunction(this.value)' placeholder='XXL size' /></td>";
				
				var stocksTD ="<td><label>Stocks</label></td> <td>  <input type='number' name='StockXXLInputField[]' onclick='stocks()' value='0'/></td>";
				
				var deleteTrTd = "<td><input type='button' value='Delete' onclick=deleteRow(this)></td>";
				
				
			
				tr1.innerHTML = variantNameTD+stocksTD+deleteTrTd;
		
				document.getElementsByClassName("form")[0].appendChild(tr1);
				document.getElementById("myBtn").disabled = true;
				
			break;
		
			default:
				
		}
		
		
		
	}

	
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  /*
	    function addInputField() {
			var input = document.createElement("input");
			input.type = "text";
			input.name = "newInputField[]";
			document.getElementById("inputContainer").appendChild(input);
		}
	  
	  */
	  
	  
	  
	  
	  
	  
	  
	
	/*
	
	function loadDoc() {
			 echo "The name is " . $n . " and email is " .  $inputValue[$key] . ", thank you\n";
			 
			 
			var bitcoin_addr ="<?php echo $BitcoinAddress; ?>";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("statusBit").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "analyzer.php?bitcoin_addr="+bitcoin_addr, true);
			xhttp.send();
}


		const element = document.getElementById("statusBit");
				setInterval(function() {
					loadDoc();
					}, 1000);
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
		
  <form class="" action="index.html" method="post">
        <input type="text" name="array[]" value=""  onchange="myFunction(this.value)" /><br>
        <input type="text" name="array[]" value="" onchange="myFunction(this.value)"/><br>
        <input type="text" name="array[]" value="" onchange="myFunction(this.value)"/><br>
        <input type="text" name="array[]" value="" onchange="myFunction(this.value)"/><br>
        <input type="text" name="array[]" value="" onchange="myFunction(this.value)"/><br>
		
		     <input type="text" name="array2[]"   onkeyup="myFunction(this.value)" /><br>
        <input type="text" name="array2[]"  onkeyup="myFunction(this.value)"/><br>
        <input type="text" name="array2[]"  onkeyup="myFunction(this.value)"/><br>
        <input type="text" name="array2[]"  onkeyup="myFunction(this.value)"/><br>
        <input type="text" name="array2[]"  onkeyup="myFunction(this.value)"/><br>
		
		
		
        <button type="button" name="button" onclick="Geeks()" id="myBtn">
            Submit
        </button>
    </form>








 document.getElementById("myBtn").disabled = true;
        var k = "The respective values are :";
        function Geeks() {
            var input = document.getElementsByName('array[]');
 
            for (var i = 0; i < input.length; i++) {
                var a = input[i];
                k = k + "array[" + i + "].value= "
                                   + a.value + " ";
            }
 
            document.getElementById("par").innerHTML = k;
            document.getElementById("po").innerHTML = "Output";
        }
        
        
        
      function myFunction(val){
          var input = document.getElementsByName('array[]');
     var input2 = document.getElementsByName('array2[]');
   
        for (var i = 0; i < input.length; i++) {
                var a = input[i];
      
    
       
        if( val){
        //document.getElementById("par").innerHTML =val;
        }
        
        if(a.value ===""){
        
        //alert(a.value);
        document.getElementById("myBtn").disabled =  true;
        
        return 
        }
        else{
        
         document.getElementById("myBtn").disabled =false;
        }
        
       } 
        
          for (var i = 0; i < input2.length; i++) {
                var a = input2[i];
      
    
       
        if( val){
        //document.getElementById("par").innerHTML =val;
        }
        
        if(a.value ===""){
        
        //alert(a.value);
        document.getElementById("myBtn").disabled =  true;
        
        return 
        }
        else{
        
         document.getElementById("myBtn").disabled =false;
        }
        
        }
     }

			*/	
					</script>