<?php
include '../lib/Database.php';
include '../helpers/Formate.php';

 
include '../classess/Product.php';
$db = new Database(); 
$fm = new Format();
$pd = new Product();
//$cat = new Category();
//$ct = new Cart();
//$cmr = new Customer();

//$bitcoin = new Bitcoinfunctions();

?>

 


<?php if(isset($_GET["variant_id"])){ 

$variant_id = $_GET["variant_id"]; 
?>


<?php  $pd->deleteVariant($variant_id); ?>


<?php } ?>



<?php if(isset($_GET["sizeid"])){ 

$sizeid = $_GET["sizeid"]; 
?>


<?php  $pd->deletesize($sizeid); ?>


<?php } ?>
