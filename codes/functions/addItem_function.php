<?php
function storage(){

    include 'connection.php';

    $select= "SELECT * from storage";

     $result= $link->query($select);

    if ($result->num_rows >0){
         while ($row= $result->fetch_assoc()) {
            echo "<option value=" .$row['storage_no'].">Storage ".$row['storage_no']."</option>";

                                }
                            }
        
}

function maincategory(){

    include 'connection.php';

    $select= "SELECT * from maincategory";

     $result= $link->query($select);

    if ($result->num_rows >0){
         while ($row= $result->fetch_assoc()) {
            echo '<option value="'.$row["category_name"].'">'.$row["category_name"].'</option>';

                                }
                            }
        
}


function supplier(){
	    include 'connection.php';

    $select= "SELECT * from suppliers";

     $result= $link->query($select);

    if ($result->num_rows >0){
         while ($row= $result->fetch_assoc()) {
         	$name=$row["firstname"]." ".$row["lastname"];

            echo '<option value="'.$name.'">'.$row["firstname"].' '.$row["lastname"].'</option>';


        }
    }
}

function manufacturer(){
	    include 'connection.php';

    $select= "SELECT * from manufacturer";

     $result= $link->query($select);

    if ($result->num_rows >0){
         while ($row= $result->fetch_assoc()) {
         	

            echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';


        }
    }
}



function batch_count(){

    include 'connection.php';
     $result = mysqli_query($link, "SELECT * FROM batch");
      $rows = mysqli_num_rows($result);
      $rows+=1;
     $batch=100+$rows;
     $final_batch="S-".$batch;

        echo '<input type="text" class="form-control" id="batch_input" value="'.$final_batch.'" >'; 
                         
                    
}

function addItem(){
	include 'connection.php';
	if (isset($_POST['add_item'])){
	//item details
	$item_name_post=$_POST['item_name_post'];
	$size_name_post=$_POST['size_name_post'];
	$unit_post = $_POST['unit'];
	$unit= $size_name_post.$unit_post;
	$barcode_post= $_POST['barcode_post'];
	$main_category_post=$_POST['main_category_post'];
	
	$item_description_post=htmlspecialchars($_POST['item_description_post']);
	$supplier=$_POST['supplier_post'];
	$image=$_FILES['userprofile_picture']['name'];
 	$img_path="uploads/".$image;

	$returnable="";
	if (!empty($_POST['returnable_post'])){
		$returnable="YES";
	}else{
		$returnable="NO"; 
	}

	$ecommerce="";
	if (!empty($_POST['ecommerce_post'])){
		$ecommerce="YES";
	}else{
		$ecommerce="NO"; 
	}


	//item inventory
	
	$total_supply=$_POST['total_supply_d'];
	$cost=$_POST['cost'];	
	$damage_quantity=$_POST['damage_quantity'];
	$expiration=$_POST['expiration'];

	$perisable="";
	if (!empty($_POST['perisable_post'])){
		$perisable="YES";
	}else{
		$perisable="NO"; 
	}

	


	//price rules
	$selling_price_post=$_POST['selling_price_post'];
	$cost_price_post=$_POST['cost_price_post'];


	    $batch=$_POST['batch_input'];

	$total_supply=$_POST['total_supply_d'];
	$cost=$_POST['cost'];


	$damage_quantity=$_POST['damage_quantity'];
	$expiration=$_POST['expiration'];
	$item_name= $item_name_post." ".$unit;
	date_default_timezone_set('Asia/Kolkata');
	 $currentDateTime = date('Y-m-d');


	$start_date_post="";
	$end_date_post="";
	if (!empty($_POST['instant_promo_post'])){
		$start_date_post=$_POST['start_date_post'];
		$end_date_post=$_POST['end_date_post'];
	}

	$include_tax="";
	if (!empty($_POST['include_tax_post'])){
		$include_tax="YES";
	}else{
		$include_tax="NO"; 
	}
date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-y');
$batch_count=1;	


       $data="UPDATE maincategory SET item_under=item_under+1 , count=count+'$total_supply' WHERE id='$main_category_post'";
		mysqli_query($link,$data); 


       $sql= "INSERT INTO items ( `item_name`, `unit`, `barcode`, `category`, `supplier`, `description`, `returnable`, `ecommerce`, `image`, `perisable`, `selling_price`, `cost_price`, `date`) VALUES ('$item_name_post', '$unit', '$barcode_post', '$main_category_post', '$supplier', '$item_description_post', '$returnable', '$ecommerce', '$img_path', '$perisable', '$selling_price_post', '$cost_price_post', '$date')";

                if ($link->query($sql) === TRUE) {
                        move_uploaded_file($_FILES['userprofile_picture']['tmp_name'], "uploads/$image");
                           
                } else {
                            echo "Error: " . $sql . "<br>" . $link->error;
                }


 $sql1= "INSERT INTO inventory ( `batch_count`,`item_name`, `total_supply`,  `damage_quantity`,  `expiration`, `perishable`, `unit_price`, 
	 	`inventory_value`, `category`, `date_created`, `barcode`) VALUES ('$batch_count','$item_name','$total_supply', '$damage_quantity', '$expiration', '$perisable', '$cost_price_post', '$cost', '$main_category_post', '$date', '$barcode_post')";


	 	if ($link->query($sql1) === TRUE) {
                     
                           
                } else {
                            echo "Error: " . $sql1 . "<br>" . $link->error;
                }


  $sql2="INSERT INTO batch (`batch_no`, `item_name`, `expiration`, `barcode`, `qty`, `damage`, `remaining`)
  VALUES('$batch', '$item_name', '$expiration', '$barcode_post', '$total_supply', '$damage_quantity', '$total_supply')";

  	if ($link->query($sql2) === TRUE) {
                     
                           
                } else {
                            echo "Error: " . $sql1 . "<br>" . $link->error;
                }


	header("Location:addItem.php");		
}


}




	    include 'connection.php';

   
   $manu= isset($_REQUEST['manu'])?$_REQUEST['manu']:"";

   if(!empty($manu)){
		 $select= "SELECT * from brand where manufacturer='$manu'";

		     $result= $link->query($select);

		    if ($result->num_rows >0){
		    	 echo '<option value="">Brands under '.$manu.'</option>';
		         while ($row= $result->fetch_assoc()) {
		         	$brand=$row["brand"];

		           echo '<option value='.$brand.'>'.$row["brand"].'</option>';

		        }

   }
}



?>