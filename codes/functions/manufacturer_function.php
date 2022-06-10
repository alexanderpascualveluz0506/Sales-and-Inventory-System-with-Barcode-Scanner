<?php 
include 'connection.php';

$name= isset($_REQUEST['name'])?$_REQUEST['name']:"";
		if (!empty($name)){
			$sql=mysqli_query($link, "INSERT INTO manufacturer (name) VALUES ('$name')");
		}

$brand= isset($_REQUEST['brand'])?$_REQUEST['brand']:"";
$manufacturer= isset($_REQUEST['manufacturer'])?$_REQUEST['manufacturer']:"";

if (!empty($manufacturer)){

	$sql=mysqli_query($link, "INSERT into brand (manufacturer, brand) VALUES ('$manufacturer', '$brand')");
}

if(isset($_POST['save_changes'])){
	$manu=$_POST['manu_brand'];
	foreach($_POST['brandname_input'] as $key=>$value) {

		  $brand = $_POST['brandname_input'][$key];

		  $sql=mysqli_query($link, "INSERT into brand (manufacturer, brand) VALUES ('$manu', '$brand')");
}
}



if (isset($_POST['save_post_new'])){
	$name=$_POST['manufacturer_name_post'];
$sql=mysqli_query($link, "INSERT INTO manufacturer (name) VALUES ('$name')");


}



$manu= isset($_REQUEST['name1'])?$_REQUEST['name1']:"";

if(!empty($manu)){
		$sql=mysqli_query($link, "SELECT * from brand where manufacturer='$manu'");
			   if ($sql->num_rows >0){
                   while ($row= $sql->fetch_assoc()) {  	
                   	$brand=$row["brand"];
              echo '
             
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr style="background-color:#343957">
                              
                                 <th colspan="6" ><label style="color:white; font-weight:normal;font-family:arial">'.$row["brand"].'</label></th>    
                            </tr>

                         </thead>
                         	<tr>
                         			<td style="width:120px">Barcode</td>
                         			<td style="width:320px">Item Name</td>
                         			<td style="width:90px">Price</td>
                         			<td style="width:100px">Total Stock </td>
                         			<td style="width:90px">Stock Out</td>
                         			<td style="width:160px">Location</td>

                         	</tr>
                         <tbody>';
              
          $sqlItem=mysqli_query($link, "SELECT * from items where manufacturer='$manu' and brand='$brand'");

             		if ($sqlItem->num_rows >0){
                   		while ($rowItem= $sqlItem->fetch_assoc()) {  	
	                   			$item_name=$rowItem['item_name'];
	                   			$perisable=$rowItem['perisable'];


	                   		echo '
	                   				<tr style="background-color:white">
	                   					<td>'.$rowItem['barcode'].'</td>
	                   					<td>'.$rowItem['item_name'].'</td>
	                   				
	                   		';
                 
	                   			$sqlInv=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
	                   		$rowInv=mysqli_fetch_assoc($sqlInv);
	                   		$total_supply=$rowInv['total_supply'];

	                   		$sqlBatch=mysqli_query($link, "SELECT * from batch where item_name='$item_name' and qty_on_shelf>0");
	                   		$rowBatch=mysqli_fetch_assoc($sqlBatch);
	                   		$location=$rowBatch['location'];
	                   		$shelves=$rowBatch['shelves_name'];

	                   		$sqlLoc=mysqli_query($link, "SELECT * from storage where storage_no='$location'");
	                   		$rowStorage=mysqli_fetch_assoc($sqlLoc);
	                   		$storageName=$rowStorage['name'];

	                   	

	                   		if (!empty($shelves)){
	                   			$loc=$storageName." (".$shelves.")";
	                   		}else{
	                   			$loc=$storageName;
	                   		}	

	                   		

	                   			if ($perisable=="YES"){
	                   				$qty_sold=$rowInv['qty_sold']."g";
	                   				$total_supply=$rowInv['total_supply']."g";
	                   			}
	                   			else{
	                   				$qty_sold=$rowInv['qty_sold'];
	                   				$total_supply=$rowInv['total_supply'];
	                   			}

	                   		
	                   			echo '
	                   				<td>'.$rowInv['cost_price'].'</td>
	                   					<td>'.$total_supply.'</td>
	                   				<td>'.$qty_sold.'</td>
	                   			
	                   				<td>'.$loc.'</td>
	                   				</tr>	
	                   			';

                				echo '
                					</table>
                				';

                			}
                		}
 
      }
	}	


}




$nameforbrand= isset($_REQUEST['nameforbrand'])?$_REQUEST['nameforbrand']:"";

if(!empty($nameforbrand)){
       echo '
             
                    <table class="table table-striped table-bordered">
                        <thead>
                        	  <tr style="background-color:#343957;color:white">
                            		<th>No</td>
                                    <th>Brand Name</th>
                                    <th>Total Items</th>
                                    <th>Total Stock </th>
                                    <th>Qty on Shelf</th>
                                    <th>Stock Out</th>
                                    <th>Total Sales</th>
                               </tr>
                         </thead>
                         <tbody >';


}


    $sql=mysqli_query($link, "SELECT * from brand where manufacturer='$nameforbrand'");
               if ($sql->num_rows >0){
               $a=1;   
                   while ($row= $sql->fetch_assoc()) {      
                        $brand=$row['brand'];

                        $sqlItem=mysqli_query($link, "SELECT * from items where manufacturer='$nameforbrand' and brand='$brand'");
                        $row1=mysqli_fetch_assoc($sqlItem);
                        $rowcount=mysqli_num_rows($sqlItem);
                       
                        $perisable=$row1['perisable'];
                      	
                      	echo "<tr style='background-color:white'>";
			            echo "<td>".$a."</td>";
			           	echo "<td>".$brand."</td>";
			            echo "<td>".$rowcount."</td>";

			                  	$sum = 0;
			                  	$shelf =0;
			                  	$sold=0;
			           $sqlItem=mysqli_query($link, "SELECT * from items where manufacturer='$nameforbrand' and brand='$brand'"); 
			             if ($sqlItem->num_rows >0){
			       
                           while ($row4a= $sqlItem->fetch_assoc()) { 
                           	$itemname=$row4a['item_name'];
									
										$sql3=mysqli_query($link, "SELECT * from inventory where item_name='$itemname'");
                      					$row4=mysqli_fetch_assoc($sql3);
									    $sum += $row4['total_supply'];
									    $shelf += $row4['qty_on_shelf'];
									    $sold +=$row4['qty_sold'];
									
                           }
                         
                            

                        }

                               	$sale=0;
			           $sqlsale=mysqli_query($link, "SELECT * from items where manufacturer='$nameforbrand' and brand='$brand'"); 
			             if ($sqlsale->num_rows >0){
			       
                           while ($row5a= $sqlsale->fetch_assoc()) { 
                           	$itemname=$row5a['item_name'];
									
										$sql3=mysqli_query($link, "SELECT sum(total_amount) as total from transaction where 
											item_name='$itemname'");
                      					$row6a=mysqli_fetch_assoc($sql3);
									    $sale += $row6a['total'];
									  
									
                           }
                         
                            

                        }

                        if ($perisable=="YES"){
                        	$sum=$sum."g";
                        	$shelf=$shelf."g";
                        	$sold=$sold."g";
                        }

                        echo "<td>".$sum."</td>";
                        echo "<td>".$shelf."</td>";
                        echo "<td>".$sold."</td>";
                        echo "<td>".number_format($sale,2)."</td>";
                        echo "</tr>";
               			


               			$a++;
                       
               }
              
            


      }


      $nameforitem= isset($_REQUEST['nameforitem'])?$_REQUEST['nameforitem']:"";

      if (!empty($nameforitem)){
      echo '

             
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr style="background-color:#343957;color:white">
                              <th>Barcode</th>
                         		<th>Item Name</th>
                         			<th>Price</th>
                         			<th>Total Stock </th>
                         			<th>Stock Out</th>
                         			<th>Location</th>

                            </tr>

                         </thead>
                         
                         <tbody>
      ';
      	$sql=mysqli_query($link, "SELECT * from brand where manufacturer='$nameforitem'");
			   if ($sql->num_rows >0){
                   while ($row= $sql->fetch_assoc()) {  	
                   	$brand=$row["brand"];
                   		$sqlItem=mysqli_query($link, "SELECT * from items where manufacturer='$nameforitem' and brand='$brand'");

             		if ($sqlItem->num_rows >0){
                   		while ($rowItem= $sqlItem->fetch_assoc()) {  	
	                   			$item_name=$rowItem['item_name'];
	                   			$perisable=$rowItem['perisable'];


	                   		echo '
	                   				<tr style="background-color:white">
	                   					<td>'.$rowItem['barcode'].'</td>
	                   					<td>'.$rowItem['item_name'].'</td>
	                   				
	                   		';
                 
	                   			$sqlInv=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
	                   		$rowInv=mysqli_fetch_assoc($sqlInv);
	                   		$total_supply=$rowInv['total_supply'];

	                   		$sqlBatch=mysqli_query($link, "SELECT * from batch where item_name='$item_name' and qty_on_shelf>0");
	                   		$rowBatch=mysqli_fetch_assoc($sqlBatch);
	                   		$location=$rowBatch['location'];
	                   		$shelves=$rowBatch['shelves_name'];

	                   		$sqlLoc=mysqli_query($link, "SELECT * from storage where storage_no='$location'");
	                   		$rowStorage=mysqli_fetch_assoc($sqlLoc);
	                   		$storageName=$rowStorage['name'];

	                   	

	                   		if (!empty($shelves)){
	                   			$loc=$storageName." (".$shelves.")";
	                   		}else{
	                   			$loc=$storageName;
	                   		}	

	                   		

	                   			if ($perisable=="YES"){
	                   				$qty_sold=$rowInv['qty_sold']."g";
	                   				$total_supply=$rowInv['total_supply']."g";
	                   			}
	                   			else{
	                   				$qty_sold=$rowInv['qty_sold'];
	                   				$total_supply=$rowInv['total_supply'];
	                   			}

	                   		
	                   			echo '
	                   				<td>'.$rowInv['cost_price'].'</td>
	                   					<td>'.$total_supply.'</td>
	                   				<td>'.$qty_sold.'</td>
	                   			
	                   				<td>'.$loc.'</td>
	                   				</tr>	
	                   			';

                			
                			}
                		}

                }

            }
  }
?>