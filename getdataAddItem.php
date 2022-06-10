<?php
include 'connection.php';

$itemname= isset($_REQUEST['itemname'])?$_REQUEST['itemname']:"";
$size= isset($_REQUEST['size'])?$_REQUEST['size']:"";
$unit= isset($_REQUEST['unit'])?$_REQUEST['unit']:"";

$barcode= isset($_REQUEST['barcode'])?$_REQUEST['barcode']:"";
$category= isset($_REQUEST['category'])?$_REQUEST['category']:"";
$itemDescription= isset($_REQUEST['itemDescription'])?$_REQUEST['itemDescription']:"";
$supplier= isset($_REQUEST['supplier'])?$_REQUEST['supplier']:"";

$brand= isset($_REQUEST['brand'])?$_REQUEST['brand']:"";
$manufacturer= isset($_REQUEST['manufacturer'])?$_REQUEST['manufacturer']:"";

$batch= isset($_REQUEST['batch'])?$_REQUEST['batch']:"";
$supply= isset($_REQUEST['supply'])?$_REQUEST['supply']:"";
$cost= isset($_REQUEST['cost'])?$_REQUEST['cost']:"";
$damage= isset($_REQUEST['damage'])?$_REQUEST['damage']:"";
$expiration= isset($_REQUEST['expiration'])?$_REQUEST['expiration']:"";

$returnable=isset($_REQUEST['returnable'])?$_REQUEST['returnable']:"";
$perishable=isset($_REQUEST['perishable'])?$_REQUEST['perishable']:"";
$monitor=isset($_REQUEST['monitor'])?$_REQUEST['monitor']:"";

$selling=isset($_REQUEST['selling'])?$_REQUEST['selling']:"";
$costPerUnit=isset($_REQUEST['costPerUnit'])?$_REQUEST['costPerUnit']:"";
$priceRule=isset($_REQUEST['priceRule'])?$_REQUEST['priceRule']:"";


$variety=$size."".$unit;
$full_item_name=$itemname." ".$variety;
$total_supply=($supply)-($damage);
$damage_cost=($cost/$supply)*$damage;

$batch_count=1;

$date = date('Y-m-d');

    $sqlItem= "INSERT INTO items ( `item_name`, `unit`,`barcode`,`category`,`supplier`, `description`,`returnable`,`perisable`,`selling_price`,`cost_price`,`date`, `manufacturer`, `brand`) VALUES ('$full_item_name', '$variety', '$barcode', '$category', '$supplier', '$itemDescription', '$returnable', '$perishable', '$selling', '$costPerUnit', '$date', '$manufacturer', '$brand')";

     if ($link->query($sqlItem) === TRUE) {
                       
                } else {
                            echo "Error: " . $sqlItem . "<br>" . $link->error;
                }

$sqlInventory= "INSERT INTO inventory ( `item_name`,`barcode`,`total_supply`,`inventory_value`,`damage_quantity`
    ,`expiration`,`perishable`,`category`,`date_created`,`batch_count`,`damaged_cost`, `total_batch_arrive`, `last_date_adjustment`, `cost_price`) VALUES ('$full_item_name', '$barcode', 
    '$total_supply', '$cost', '$damage', '$expiration', '$perishable', '$category', '$date', '$batch_count', '$damage_cost', '$supply', '$date', '$costPerUnit')";

     if ($link->query($sqlInventory) === TRUE) {
                         
                } else {
                            echo "Error: " . $sqlInventory . "<br>" . $link->error;
                }


$sqlBatch= "INSERT INTO batch (`date_created`, `batch_no`,`item_name`, `expiration`, `barcode`, `qty`, `damage`,`damage_cost`, `cost`, `category`,`price`,`remaining_cost`,`remaining`, `total_batch_arrive`, `costPerUnit`) VALUES ('$date', '$batch', '$full_item_name', '$expiration', '$barcode', '$total_supply', '$damage', '$damage_cost', '$cost', '$category', '$selling', '$cost', '$total_supply', '$supply', '$costPerUnit')";

     if ($link->query($sqlBatch) === TRUE) {
                         
                } else {
                            echo "Error: " . $sqlBatch. "<br>" . $link->error;
                }

                

$file= isset($_REQUEST['file'])?$_REQUEST['file']:"";

if (strlen($file)>3) {
   $base_to_php = explode(',', $file);
$data = base64_decode($base_to_php[1]);

$filepath = "uploads/barcode".$barcode.".png"; // or image.jpg

// Save the image in a defined path
file_put_contents($filepath,$data); 

 $data="UPDATE items SET barcode_image='$filepath' WHERE item_name='$full_item_name'";
    mysqli_query($link,$data); 
}

  $data="UPDATE maincategory SET item_under=item_under+1 , count=count+'$total_supply' WHERE category_name='$category'";
        mysqli_query($link,$data); 


    header("Location:item.php");     

?>