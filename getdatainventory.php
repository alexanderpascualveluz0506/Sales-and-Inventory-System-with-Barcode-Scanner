
<?php

	include 'connection.php';
   

if (isset($_POST['save_changes'])){
	$item_name=$_POST['item_name'];
	$reorder_level=$_POST['reorder_level_input'];
	$reorder_quantity=$_POST['reorder_quantity_input'];
	$replenishment_quantity=$_POST['replenishment_quantity_input'];


	$data="UPDATE inventory SET reorder_level='$reorder_level', reorder_quantity='$reorder_quantity', replenishment_level='$replenishment_quantity' WHERE item_name='$item_name'";
	mysqli_query($link,$data);	



            echo '<script>location.replace("inventory.php")</script>';
}

 



$data = isset($_REQUEST['myData'])?$_REQUEST['myData']:"";


if (!empty($data)){
	  $select= "SELECT * FROM batch where item_name='$data'";

     $result= $link->query($select);

    if ($result->num_rows >0){
         while ($row= $result->fetch_assoc()) {
         	$item_name=$row["item_name"];
         	$batch_no=$row['batch_no'];
         	$expiration=$row['expiration'];
         	$result3 = mysqli_query($link, "SELECT * from inventory where item_name='$item_name'"); 
				$row3 = mysqli_fetch_assoc($result3); 
				$monitor=$row3["monitor_storage"];
				$barcode=$row3["barcode"];
				$replenishment_inv=$row3["replenishment_level"];
				$b=$row['barcode'];

				
			 $result4 = mysqli_query($link, "SELECT * from items where item_name='$item_name'"); 
				$row4 = mysqli_fetch_assoc($result4); 	
				$length=$row4["length"];
				$width=$row4["width"];
				$height=$row4["height"];
				$perishable=$row4["perisable"];

             if (!empty($row['location'])){
             	$location=$row['location'];

             }else{ 	
             	$location="Not Set";
             }
             if ($row3['perishable']=="YES"){
             	$qty=$row['qty']." "."g";
             	$qty_sold=$row['qty_sold'].""."g";
             	$remaining=$row['remaining'].""."g";
             	$qty_on_shelf=$row['qty_on_shelf'].""."g";

             }else{
             	$qty=$row['qty'];
             	$qty_sold=$row['qty_sold'];
             	$remaining=$row['remaining'];
             	$qty_on_shelf=$row['qty_on_shelf'];
             }


      

             if(!empty($row['new_barcode'])){
             		$barcodeImage=$row['new_barcode'];
             }elseif(!empty($row4['barcode_image'])){
             		$barcodeImage=$row4['barcode_image'];
             }else{
             	$barcodeImage="no barcode image available";
             }
             
             if (empty($row['barcode'])){
             	$barcode="no barcode available";
             }
             if (empty($row['shelves_name'])){
             	$shelves="";
             }else{
             	$shelves=$row['shelves_name'];
             }
        	

        	if ($expiration=="0000-00-00"){
        		$expiration="Not available";
        	}else{
        			$expiration=$row['expiration'];
        	}

            
              date_default_timezone_set('Asia/Manila');
              $date_today=date("Y-m-d");
            $final_date_today=strtotime($date_today);
            $final_date_expiration=strtotime($row['expiration']);

		$past_three_days=date('Y-m-d', strtotime($date_today. ' + 3 days')); 
        $select_expiration_three=mysqli_query($link, "SELECT * from batch where expiration BETWEEN '$date_today' AND ' $past_three_days' and batch_no='$batch_no' and expiration!='0000-00-00'");
        $rowcount2=mysqli_num_rows($select_expiration_three);

      $select_already_expired=mysqli_query($link,"SELECT * FROM batch WHERE expiration < CURRENT_DATE() and batch_no='$batch_no' and expiration!='0000-00-00'");
       $rowcount4=mysqli_num_rows($select_already_expired);

        	if ($date_today==$row['expiration'] || $rowcount4>0){
            		  echo "
             <tr id=".$row['batch_no']." data-id=".$row['id']." data-batch=".$row['batch_no']." class='expire-row'>
             <td class='aaq'>".$row['batch_no']." <input type='hidden' name='batch_input[]' value=".$row['batch_no']."></td>
             <td class='aaq'>".number_format($row['price'],2)."</label></td>
             <td class='aaq' >".$row['date_created']."</td>
             <td class='aaq'>".$expiration."</td>
             <td class='aaq'>".$qty."</td>
             <td class='aaq'>".$qty_sold."</td>
             <td class='aaq'>".$remaining."</td>
             <td class='aaq' style='border-right-style:none;'><label style='margin-left:10px'>".$qty_on_shelf."</label>
             <a href='#' data-toggle='modal'  data-dismiss='modal' data-target='#on-shelf-modal'
	             data-onshelf='".$row['qty_on_shelf']."' 
	             data-replenishment=".$replenishment_inv."
	             data-batch=".$row['batch_no']." 
	             data-name='".$item_name."'
	             data-left=".$remaining." 
	             data-monitor='".$monitor."' 
	             data-length='".$length."' data-width='".$width."' data-height='".$height."'
	             data-storage='".$row['location']."'
	             data-shelves='".$shelves."'
	             data-perishable='".$perishable."'
	             data-expiration='".$expiration."'   

             class='plus-for-on-shelf'>
             <i class='fas fa-plus' style='float:right;padding-right:20px; font-size:17px;margin-top:5px;color:black''></i></a>
          	</td>
          	

          	<td class='aaq'>
          	<a href='' data-toggle='modal' data-dismiss='modal' data-target='#price-changes-tab' id='view-tab-price' 	
          		data-name='".$item_name."'
          		data-price=".$row['price']." 
          		data-cost=".$row['costPerUnit']."
          		data-batch=".$row['batch_no']." 
          		data-barcode='".$b."'
          		data-image='".$barcodeImage."'>
          		<label style='font-size:16px;'>
          	<i class='fas fa-tag' style='font-size:16px;margin-left:1%;color:black'></i></a>


          	 <a href='' data-toggle='modal' data-target='#modal-delete-batch' data-name='".$row["item_name"]."' data-batch=".$row['batch_no']." class='delete-item-btn-batch'>
          	<i class='fas fa-trash' style='font-size:16px;margin-left:11%;color:black'></i></a>


          	</td>
            
           </tr>
             ";

         
           
        	}elseif ($rowcount2>0){
        				  echo "
             <tr id=".$row['batch_no']." data-id=".$row['id']." data-batch=".$row['batch_no']." class='expire-row'>
             <td class='aaq1'>".$row['batch_no']." <input type='hidden' name='batch_input[]' value=".$row['batch_no']."></td>
             <td class='aaq1'>".number_format($row['price'],2)."</label></td>
             <td class='aaq1' >".$row['date_created']."</td>
             <td class='aaq1'>".$expiration."</td>
             <td class='aaq1'>".$qty."</td>
             <td class='aaq1'>".$qty_sold."</td>
             <td class='aaq1'>".$remaining."</td>
             <td class='aaq1' style='border-right-style:none;'><label style='margin-left:10px'>".$qty_on_shelf."</label>
             <a href='#' data-toggle='modal'  data-dismiss='modal' data-target='#on-shelf-modal'
	             data-onshelf='".$row['qty_on_shelf']."' 
	             data-replenishment=".$replenishment_inv."
	             data-batch=".$row['batch_no']." 
	             data-name='".$item_name."'
	             data-left=".$remaining." 
	             data-monitor='".$monitor."' 
	             data-length='".$length."' data-width='".$width."' data-height='".$height."'
	             data-storage='".$row['location']."'
	             data-shelves='".$shelves."'   
	             data-perishable='".$perishable."'
	             data-expiration='".$expiration."'      

             class='plus-for-on-shelf'>
             <i class='fas fa-plus' style='float:right;padding-right:20px; font-size:17px;margin-top:5px;color:black''></i></a>
          	</td>
          	

          	<td class='aaq1'>
          	<a href='' data-toggle='modal' data-dismiss='modal' data-target='#price-changes-tab' id='view-tab-price' 	
          		data-name='".$item_name."'
          		data-price=".$row['price']." 
          		data-cost=".$row['costPerUnit']."
          		data-batch=".$row['batch_no']." 
          		data-barcode='".$b."'
          		data-image='".$barcodeImage."'>
          		<label style='font-size:16px;'>
          	<i class='fas fa-tag' style='font-size:16px;margin-left:1%;color:black'></i></a>


          	 <a href='' data-toggle='modal' data-target='#modal-delete-batch' data-name='".$row["item_name"]."' data-batch=".$row['batch_no']." class='delete-item-btn-batch'>
          	<i class='fas fa-trash' style='font-size:16px;margin-left:11%;color:black'></i></a>


          	</td>
            
           </tr>";



        	}else{
        		  echo "
             <tr id=".$row['batch_no']." data-id=".$row['id']." data-batch=".$row['batch_no'].">
             <td>".$row['batch_no']." <input type='hidden' name='batch_input[]' value=".$row['batch_no']."></td>
             <td>".number_format($row['price'],2)."</label></td>
             <td>".$row['date_created']."</td>
             <td>".$expiration."</td>
             <td>".$qty."</td>
             <td>".$qty_sold."</td>
             <td>".$remaining."</td>
             <td  style='border-right-style:none;'><label style='margin-left:10px'>".$qty_on_shelf."</label>
             <a href='#' data-toggle='modal'  data-dismiss='modal' data-target='#on-shelf-modal'
	             data-onshelf='".$row['qty_on_shelf']."' 
	             data-replenishment=".$replenishment_inv."
	             data-batch=".$row['batch_no']." 
	             data-name='".$item_name."'
	             data-left=".$remaining." 
	             data-monitor='".$monitor."' 
	             data-length='".$length."' data-width='".$width."' data-height='".$height."'
	             data-storage='".$row['location']."'
	             data-shelves='".$shelves."'
	             data-perishable='".$perishable."'
	             data-expiration='".$expiration."'    


             class='plus-for-on-shelf'>
             <i class='fas fa-plus' style='float:right;padding-right:20px; font-size:17px;margin-top:5px;color:black'></i></a>
          	</td>
          	

          	<td>
          	<a href='' data-toggle='modal' data-dismiss='modal' data-target='#price-changes-tab' id='view-tab-price' 	
          		data-name='".$item_name."'
          		data-price=".$row['price']." 
          		data-cost=".$row['costPerUnit']."
          		data-batch=".$row['batch_no']." 
          		data-barcode='".$b."'
          		data-image='".$barcodeImage."'>
          		<label style='font-size:16px;'>
          	<i class='fas fa-tag' style='font-size:16px;margin-left:1%; color:black' ></i></a>


          	 <a href='' data-toggle='modal' data-target='#modal-delete-batch' data-name='".$row["item_name"]."' data-batch=".$row['batch_no']." class='delete-item-btn-batch'>
          	<i class='fas fa-trash' style='font-size:16px;margin-left:11%; color:black'></i></a>


          	</td>
            
           </tr>
             ";
        	}
        	
           
                                }

                            }
}





$category = isset($_REQUEST['category'])?$_REQUEST['category']:"";
$batch_no = isset($_REQUEST['batch_no'])?$_REQUEST['batch_no']:"";
$item_name= isset($_REQUEST['item_name_for_batch'])?$_REQUEST['item_name_for_batch']:"";
$barcode = isset($_REQUEST['item_name_for_barcode'])?$_REQUEST['item_name_for_barcode']:"";
$quantity = isset($_REQUEST['qty_batch'])?$_REQUEST['qty_batch']:"";
$damage = isset($_REQUEST['damage_qty'])?$_REQUEST['damage_qty']:"";
$cost = isset($_REQUEST['cost_batch'])?$_REQUEST['cost_batch']:"";
$expiration_date = isset($_REQUEST['expiration_date'])?$_REQUEST['expiration_date']:"";
$selling_price = isset($_REQUEST['selling_price'])?$_REQUEST['selling_price']:"";



if (!empty($batch_no) && !empty($quantity)){

$total_quantity=$quantity-$damage;
$qty_sold=0;
$damage_cost=($cost)/($quantity)*$damage;
$remaining_cost=$cost-$damage_cost;
$final_date = date('Y-m-d');
$costPerUnit=($cost)/($quantity);

 $sql1= "INSERT INTO batch (`batch_no`, `qty`, `damage`,`expiration`,`item_name`, `barcode`, `date_created`, `qty_sold`,  `cost`, 
    `damage_cost`,`category`, `remaining_cost`, `total_batch_arrive`, `remaining`, `costPerUnit`, `price`) VALUES ('$batch_no', '$total_quantity', '$damage', '$expiration_date', '$item_name', '$barcode', '$final_date', '$qty_sold', '$cost', '$damage_cost', '$category', '$remaining_cost', '$quantity', '$total_quantity', '$costPerUnit', '$selling_price')";

 		$sql= $link->query($sql1);
     
        $data=mysqli_query($link,"UPDATE inventory SET batch_count=batch_count+1 , total_supply=total_supply+'$total_quantity', total_batch_arrive=total_batch_arrive+'$quantity', inventory_value=inventory_value+'$cost', damage_quantity=damage_quantity+'$damage', damaged_cost=damaged_cost+'$damage_cost', remaining=remaining+'$total_quantity', last_date_adjustment='$final_date' WHERE item_name='$item_name'");
             
      
             

}
function perisable(){

$perishable = isset($_REQUEST['perishable'])?$_REQUEST['perishable']:"";
$demand = isset($_REQUEST['demand'])?$_REQUEST['demand']:"";
$lead_time = isset($_REQUEST['lead_time'])?$_REQUEST['lead_time']:"";
$safety_stock = isset($_REQUEST['safety_stock'])?$_REQUEST['safety_stock']:"";

	$reorder_quantity=$demand*$lead_time;
	$reorder_level=($demand*($lead_time+3))-$reorder_quantity;
	$safety_stock=($reorder_level/100)*20;

	$reorder_level_with_safety_stock=$reorder_level+$safety_stock;
	

	echo 
	'<tr>
   		<td><label class="col-sm">Reorder Level With Safety Stock: </label></td>
		<td><label style="font-weight:bold">'.intval($reorder_level_with_safety_stock).'</label></td>
   
  	</tr>';

  		echo 
		'<tr>
   		<td><label class="col-sm">Reorder Level Without Safety Stock: </label></td>
		<td><label style="font-weight:bold">'.intval($reorder_level).'</label></td>
   
  	</tr>';

  		echo 
		'<tr>
   		<td><label class="col-sm">Reorder Quantity: </label></td>
		<td><label style="font-weight:bold">'.intval($reorder_quantity).'</label></td>
   
  	</tr>';
}

function nonPerishable(){

$perishable = isset($_REQUEST['perishable'])?$_REQUEST['perishable']:"";
$demand = isset($_REQUEST['demand'])?$_REQUEST['demand']:"";
$lead_time = isset($_REQUEST['lead_time'])?$_REQUEST['lead_time']:"";
$safety_stock = isset($_REQUEST['safety_stock'])?$_REQUEST['safety_stock']:"";

	$reorder_quantity=$demand*$lead_time;
	$reorder_level=($demand*($lead_time+3))-$reorder_quantity;
	$safety_stock=($reorder_level/100)*50;

	$reorder_level_with_safety_stock=$reorder_level+$safety_stock;
	
echo 
	'<tr>
   		<td><label class="col-sm">Reorder Level With Safety Stock: </label></td>
		<td><label style="font-weight:bold">'.intval($reorder_level_with_safety_stock).'</label></td>
   
  	</tr>';

  		echo 
		'<tr>
   		<td><label class="col-sm">Reorder Level Without Safety Stock: </label></td>
		<td><label style="font-weight:bold">'.intval($reorder_level).'</label></td>
   
  	</tr>';

  		echo 
		'<tr>
   		<td><label class="col-sm">Reorder Quantity: </label></td>
		<td><label style="font-weight:bold">'.intval($reorder_quantity).'</label></td>
   
  	</tr>';

}


$perishable = isset($_REQUEST['perishable'])?$_REQUEST['perishable']:"";
$demand = isset($_REQUEST['demand'])?$_REQUEST['demand']:"";
$lead_time = isset($_REQUEST['lead_time'])?$_REQUEST['lead_time']:"";
$safety_stock = isset($_REQUEST['safety_stock'])?$_REQUEST['safety_stock']:"";



if (!empty($perishable) && !empty($demand) && !empty($lead_time)){
	$perishable = isset($_REQUEST['perishable'])?$_REQUEST['perishable']:"";
	$demand = isset($_REQUEST['demand'])?$_REQUEST['demand']:"";
	$lead_time = isset($_REQUEST['lead_time'])?$_REQUEST['lead_time']:"";
	$safety_stock = isset($_REQUEST['safety_stock'])?$_REQUEST['safety_stock']:"";

	perisable();

}
if (empty($perishable) && !empty($demand) && !empty($lead_time)){
	$perishable = isset($_REQUEST['perishable'])?$_REQUEST['perishable']:"";
	$demand = isset($_REQUEST['demand'])?$_REQUEST['demand']:"";
	$lead_time = isset($_REQUEST['lead_time'])?$_REQUEST['lead_time']:"";
	$safety_stock = isset($_REQUEST['safety_stock'])?$_REQUEST['safety_stock']:"";
	nonPerishable();
	
}

$perishable_record = isset($_REQUEST['perishable_record'])?$_REQUEST['perishable_record']:"";
$record = isset($_REQUEST['record'])?$_REQUEST['record']:"";
$itemname_record = isset($_REQUEST['itemname_record'])?$_REQUEST['itemname_record']:"";

$current_date=date('Y-m-d');
$last_month_date=date("Y-m-d", strtotime("-30 days"));



if (!empty($record) && !empty($perishable_record)){
$result = mysqli_query($link, "SELECT AVG(qty) AS value_sum FROM transaction where item_name='$itemname_record' and payment_date between 
'$last_month_date' and '$current_date'"); 
   if ($result->num_rows >0){
$row = mysqli_fetch_assoc($result); 
$demand = intval($row['value_sum']);


$result3 = mysqli_query($link, "SELECT  SUM(dateCreated) AS dateCreated, SUM(deliveryDate) as deliveryDate FROM 
purchaseorder where item_name='$itemname_record'"); 


$row3 = mysqli_fetch_assoc($result3); 
$dateCreated = $row3['dateCreated'];
$deliveryDate = $row3['deliveryDate'];
$dateDiff=($deliveryDate)-($dateCreated);

$sql= mysqli_query($link, "SELECT * from transaction where item_name='$itemname_record'");
$rowcount=mysqli_num_rows($sql);
$lead_time=$rowcount;

$reorder_quantity=($demand)*($lead_time);

$reorder_level=round(($demand*($lead_time+3))-$reorder_quantity);
$safety_stock=round(($reorder_level/100)*30);

$reorder_level_with_safety_stock=round($reorder_level+$safety_stock);


	echo 
	'<tr>
   		<td><label class="col-sm">Reorder Level With Safety Stock: </label></td>
		<td><label style="font-weight:bold">'.$reorder_level_with_safety_stock.'</label></td>
   
  	</tr>';

  		echo 
		'<tr>
   		<td><label class="col-sm">Reorder Level Without Safety Stock: </label></td>
		<td><label style="font-weight:bold">'.$reorder_level.'</label></td>
   
  	</tr>';

  		echo 
		'<tr>
   		<td><label class="col-sm">Reorder Quantity: </label></td>
		<td><label style="font-weight:bold">'.$reorder_quantity.'</label></td>
   
  	</tr>';
 
}
else{

}
}



if (!empty($record) && empty($perishable_record)){
$result = mysqli_query($link, "SELECT AVG(qty) AS value_sum FROM transaction where item_name='$itemname_record' and payment_date between 
'$last_month_date' and '$current_date'"); 
   if ($result->num_rows >0){
$row = mysqli_fetch_assoc($result); 
$demand = intval($row['value_sum']);


$result3 = mysqli_query($link, "SELECT  SUM(dateCreated) AS dateCreated, SUM(deliveryDate) as deliveryDate FROM 
purchaseorder where item_name='$itemname_record'"); 


$row3 = mysqli_fetch_assoc($result3); 
$dateCreated = $row3['dateCreated'];
$deliveryDate = $row3['deliveryDate'];
$dateDiff=($deliveryDate)-($dateCreated);

$sql= mysqli_query($link, "SELECT * from transaction where item_name='$itemname_record'");
$rowcount=mysqli_num_rows($sql);
$lead_time=$rowcount;

$reorder_quantity=($demand)*($lead_time);

$reorder_level=round(($demand*($lead_time+3))-$reorder_quantity);
$safety_stock=round(($reorder_level/100)*50);

$reorder_level_with_safety_stock=round($reorder_level+$safety_stock);


	echo 
	'<tr>
   		<td><label class="col-sm">Reorder Level With Safety Stock: </label></td>
		<td><label style="font-weight:bold">'.$reorder_level_with_safety_stock.'</label></td>
   
  	</tr>';

  		echo 
		'<tr>
   		<td><label class="col-sm">Reorder Level Without Safety Stock: </label></td>
		<td><label style="font-weight:bold">'.$reorder_level.'</label></td>
   
  	</tr>';

  		echo 
		'<tr>
   		<td><label class="col-sm">Reorder Quantity: </label></td>
		<td><label style="font-weight:bold">'.$reorder_quantity.'</label></td>
   
  	</tr>';
 
}
else{
	echo 
	'<tr>
   		<td><label class="col-sm">No Result </label></td>
		
  	</tr>';
}
}


$storage_result = isset($_REQUEST['storage_result'])?$_REQUEST['storage_result']:"";
$stackable = isset($_REQUEST['stackable'])?$_REQUEST['stackable']:"";
$total_supply_shelf = isset($_REQUEST['total_supply_shelf'])?$_REQUEST['total_supply_shelf']:"";







if (!empty($storage_result)){
	 $sql="SELECT * from shelves where storage_no='$storage_result'";
                                      $result= $link->query($sql);

                                        if ($result->num_rows >0){
                                            while ($row= $result->fetch_assoc()) {
                                                echo '<option style="font-size:16px" value='.$row['shelves_name'].'>'.$row['shelves_name'].' '.$row['position'].'</option>';

                                           
                                             
                                            }
                                        }

                                     
}




$replenishment_batch = isset($_REQUEST['replenishment_batch'])?$_REQUEST['replenishment_batch']:"";
$batch_no_per_batch = isset($_REQUEST['batch_no_per_batch'])?$_REQUEST['batch_no_per_batch']:"";
$batch_item_name = isset($_REQUEST['batch_item_name'])?$_REQUEST['batch_item_name']:"";
$total_supply_shelf_for_storage = isset($_REQUEST['total_supply_shelf_for_storage'])?$_REQUEST['total_supply_shelf_for_storage']:"";
$shelves = isset($_REQUEST['shelves'])?$_REQUEST['shelves']:"";
$storage = isset($_REQUEST['storage'])?$_REQUEST['storage']:"";
$capacity = isset($_REQUEST['capacity'])?$_REQUEST['capacity']:"";
$add_new_qty = isset($_REQUEST['add_new_qty'])?$_REQUEST['add_new_qty']:"";
$stackable= isset($_REQUEST['stackable'])?$_REQUEST['stackable']:"";
$expiration_date= isset($_REQUEST['expiration_date'])?$_REQUEST['expiration_date']:"";


if (!empty($shelves)){
$final_date = date('Y-m-d');
        	$sqlAddshelf=mysqli_query($link, "SELECT * from shelves where shelves_name='$shelves'") ;
        	if ($sqlAddshelf->num_rows > 0) {
 
 				 while($row = $sqlAddshelf->fetch_assoc()) {

        		
  		

  			$sqlUpdate="UPDATE shelves set total_items=total_items+'$add_new_qty' 
  			where shelves_name='$shelves'";

  			mysqli_query($link,$sqlUpdate); 

  			$sqlUpdate2="UPDATE storage set total_items=total_items+'$add_new_qty' where storage_no='$storage_no'";

  			mysqli_query($link,$sqlUpdate2); 


  			$data1="UPDATE inventory SET qty_on_shelf=qty_on_shelf+'$add_new_qty', stock_location='$storage',replenishment_level='$replenishment_batch', last_date_adjustment='$final_date' WHERE 
            item_name='$batch_item_name'";
            mysqli_query($link,$data1); 

            $data2="UPDATE batch SET qty_on_shelf=qty_on_shelf+'$add_new_qty', 
            replenishment_level='$replenishment_batch', location='$storage', shelves_name='$shelves', stackable='$stackable', expiration='$expiration_date' WHERE batch_no='$batch_no_per_batch'";
            mysqli_query($link,$data2); 
}
}			  		
}



if (empty($shelves)){
	$sqlUpdate="UPDATE storage set total_items=total_items+'$add_new_qty' where storage_no='$storage'";
	mysqli_query($link,$sqlUpdate);

$final_date = date('Y-m-d');
  
  			$data1="UPDATE inventory SET qty_on_shelf=qty_on_shelf+'$add_new_qty', stock_location='$storage', replenishment_level='$replenishment_batch', last_date_adjustment='$final_date' WHERE 
            item_name='$batch_item_name'";
            mysqli_query($link,$data1); 

            $data2="UPDATE batch SET qty_on_shelf='$add_new_qty', 
            replenishment_level='$replenishment_batch', location='$storage', expiration='$expiration_date' WHERE batch_no='$batch_no_per_batch'";
            mysqli_query($link,$data2); 
}


$itemname = isset($_REQUEST['itemname'])?$_REQUEST['itemname']:"";
$batch_no = isset($_REQUEST['batch_no'])?$_REQUEST['batch_no']:"";
$selectType = isset($_REQUEST['selectType'])?$_REQUEST['selectType']:"";
$newPrice = isset($_REQUEST['newPrice'])?$_REQUEST['newPrice']:"";
$oldPrice = isset($_REQUEST['oldPrice'])?$_REQUEST['oldPrice']:"";
$barcodeNew = isset($_REQUEST['barcodeNew'])?$_REQUEST['barcodeNew']:"";
$file = isset($_REQUEST['file'])?$_REQUEST['file']:"";


if (!empty($newPrice)){
	$sql=mysqli_query($link, "UPDATE batch set price='$newPrice' where batch_no='$batch_no'");

	$insert=mysqli_query($link, "INSERT into price_rule (`batch_no`, `item_name`, `old_price`, `new_price`, `rule_type`) values 
		('$batch_no', '$itemname', '$oldPrice', '$newPrice', '$selectType')");
}
if (!empty($barcodeNew)){
	if (strlen($file)>3) {
   		$base_to_php = explode(',', $file);
		$data = base64_decode($base_to_php[1]);

		$filepath = "uploads/barcode/".$barcodeNew.".png"; // or image.jpg

		// Save the image in a defined path
		file_put_contents($filepath,$data); 

		$data1="UPDATE batch SET new_barcode='$filepath', barcode='$barcodeNew' WHERE batch_no='$batch_no'";
    	mysqli_query($link,$data1); 
	
}
}
?>

