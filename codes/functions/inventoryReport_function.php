<?php    
$dateFrom = isset($_REQUEST['dateFrom'])?$_REQUEST['dateFrom']:"";
$dateTo = isset($_REQUEST['dateTo'])?$_REQUEST['dateTo']:"";
$categories =isset($_REQUEST['categories'])?$_REQUEST['categories']:"";
$item =isset($_REQUEST['item'])?$_REQUEST['item']:"";
$batch_YES=isset($_REQUEST['batch_YES'])?$_REQUEST['batch_YES']:"";
$batch_NO=isset($_REQUEST['batch_No'])?$_REQUEST['batch_NO']:"";
$type=isset($_REQUEST['type'])?$_REQUEST['type']:"";

function table_header_with_batch(){

	echo '   
		<table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="margin-top:30px">
            <thead>


                        <tr>
                                <th>Stock In No</th>
                                <th>Barcode</th>
                                <th>Item Name</th>
                                <th>Total Supply</th>
                                <th>Total Cost</th>
                                <th>Damaged Qty</th>
                              

                        </tr>
            </thead>';
}

function table_header_with_no_batch(){

	echo '   
		<table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="margin-top:30px">
            <thead>


                        <tr>
                            
                                <th>Barcode</th>
                                <th>Item Name</th>
                                <th>Stock In Count</th>
                                <th>Total Supply</th>
                                <th>Total Cost</th>
                                <th>Qty Sold</th>

                        </tr>
            </thead>';
}
include 'connection.php';
  $dateFrom = isset($_REQUEST['dateFrom'])?$_REQUEST['dateFrom']:"";
$dateTo = isset($_REQUEST['dateTo'])?$_REQUEST['dateTo']:"";
$categories =isset($_REQUEST['categories'])?$_REQUEST['categories']:"";
$item =isset($_REQUEST['item'])?$_REQUEST['item']:"";
$batch_YES=isset($_REQUEST['batch_YES'])?$_REQUEST['batch_YES']:"";
$batch_NO=isset($_REQUEST['batch_No'])?$_REQUEST['batch_NO']:"";
$type=isset($_REQUEST['type'])?$_REQUEST['type']:"";




if ($type=="Inventory_Summary_Report"){

    if ($categories=="All"){
        table_header_with_no_batch();
         $select2= "SELECT * from inventory WHERE date_created BETWEEN '$dateFrom' AND '$dateTo' ";
        

     $select2=$link->query($select2);
     $totalSupply=0;
         $inventory_value=0;
          $qty_sold=0;
         $batch_count=0;
       if ($select2->num_rows>0){
           while ($row=$select2->fetch_assoc()) {
         $totalSupply+=$row['total_supply'];
             $inventory_value+=$row['inventory_value'];
             $qty_sold+=$row['qty_sold'];
             $batch_count+=$row['batch_count'];

            echo ' <tbody>
                    <tr>
                     <td>'.$row["barcode"].'</td>
                     <td>'.$row["item_name"].'</td>
                     <td>'.$row["batch_count"].'</td>
                     <td>'.$row["total_supply"].'</td>
                     <td>'.number_format($row["inventory_value"],2).'</td>
                     <td>'.$row["qty_sold"].'</td>
                  
                    </tr>';
      }
      echo "<tr style='font-size:16px'>";
      echo "<td></td><td></td>";
      echo "<td>".$batch_count."</td><td>".$totalSupply."</td><td>".number_format($inventory_value,2)."</td><td>".$qty_sold."</td>";
      echo "</tbody></table>";

}


}

 if (!empty($categories) && $categories!="All"){
        table_header_with_no_batch();
         $select2= "SELECT * from inventory WHERE category='$categories' and date_created BETWEEN '$dateFrom' AND '$dateTo' ";
        

     $select2=$link->query($select2);
     $totalSupply=0;
         $inventory_value=0;
          $qty_sold=0;
         $batch_count=0;
       if ($select2->num_rows>0){
           while ($row=$select2->fetch_assoc()) {
         $totalSupply+=$row['total_supply'];
             $inventory_value+=$row['inventory_value'];
             $qty_sold+=$row['qty_sold'];
             $batch_count+=$row['batch_count'];

            echo ' <tbody>
                    <tr>
                     <td>'.$row["barcode"].'</td>
                     <td>'.$row["item_name"].'</td>
                     <td>'.$row["batch_count"].'</td>
                     <td>'.$row["total_supply"].'</td>
                     <td>'.number_format($row["inventory_value"],2).'</td>
                     <td>'.$row["qty_sold"].'</td>
                  
                    </tr>';
      }
      echo "<tr style='font-size:16px'>";
      echo "<td></td><td></td>";
      echo "<td>".$batch_count."</td><td>".$totalSupply."</td><td>".number_format($inventory_value,2)."</td><td>".$qty_sold."</td>";
      echo "</tbody></table>";

}


}


if (!empty($item)){
        table_header_with_no_batch();
         $select2= "SELECT * from inventory WHERE item_name='$item' and date_created BETWEEN '$dateFrom' AND '$dateTo' ";
        

     $select2=$link->query($select2);
     $totalSupply=0;
         $inventory_value=0;
          $qty_sold=0;
         $batch_count=0;
       if ($select2->num_rows>0){
           while ($row=$select2->fetch_assoc()) {
         $totalSupply+=$row['total_supply'];
             $inventory_value+=$row['inventory_value'];
             $qty_sold+=$row['qty_sold'];
             $batch_count+=$row['batch_count'];

            echo ' <tbody>
                    <tr>
                     <td>'.$row["barcode"].'</td>
                     <td>'.$row["item_name"].'</td>
                     <td>'.$row["batch_count"].'</td>
                     <td>'.$row["total_supply"].'</td>
                     <td>'.number_format($row["inventory_value"],2).'</td>
                     <td>'.$row["qty_sold"].'</td>
                  
                    </tr>';
      }
 

}


}


}


function DamagedItem_table_header_with_batch(){

    echo '   
        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
            <thead>


                        <tr>
                                <th>Stock In No</th>
                                <th>Barcode</th>
                                <th>Item Name</th>
                                <th>Total Supply</th>
                                <th>Damaged Qty</th>
                                <th>Damaged Cost</th>

                        </tr>
            </thead>';
}


if ($type=='Damaged_Item_Report'){
    DamagedItem_table_header_with_batch();
   
                if ($categories=="All"){
                 $select2= "SELECT * from batch WHERE date_created BETWEEN '$dateFrom' AND '$dateTo' ";
                

              $select2=$link->query($select2);
              $qty=0;
              $damage=0;
              $damage_cost=0;
             if ($select2->num_rows>0){
                 while ($row=$select2->fetch_assoc()) {
                    $qty+=$row['qty'];
                    $damage+=$row['damage'];
                    $damage_cost+=$row['damage_cost'];
                    echo ' <tbody>
                            <tr>
                                <td>'.$row["batch_no"].'</td>
                                <td>'.$row["barcode"].'</td>
                                <td>'.$row["item_name"].'</td>
                                <td>'.$row["qty"].'</td>
                                <td>'.$row["damage"].'</td>
                                <td>'.$row["damage_cost"].'</td>
                            </tr>';
                }
              echo "<tr><td></td><td></td><td></td>";
              echo "<td>".$qty."</td><td>".$damage."</td><td>".number_format($damage_cost,2)."</td>";
            echo "</tbody></table>";
               }

           }


          if (!empty($categories) && $categories!="All"){
                 $select2= "SELECT * from batch WHERE category='$categories' and date_created BETWEEN '$dateFrom' AND '$dateTo' ";
                

              $select2=$link->query($select2);
              $qty=0;
              $damage=0;
              $damage_cost=0;
             if ($select2->num_rows>0){
                 while ($row=$select2->fetch_assoc()) {
                    $qty+=$row['qty'];
                    $damage+=$row['damage'];
                    $damage_cost+=$row['damage_cost'];
                    echo ' <tbody>
                            <tr>
                                <td>'.$row["batch_no"].'</td>
                                <td>'.$row["barcode"].'</td>
                                <td>'.$row["item_name"].'</td>
                                <td>'.$row["qty"].'</td>
                                <td>'.$row["damage"].'</td>
                                <td>'.$row["damage_cost"].'</td>
                            </tr>';
                }
              echo "<tr><td></td><td></td><td></td>";
              echo "<td>".$qty."</td><td>".$damage."</td><td>".number_format($damage_cost,2)."</td>";
            echo "</tbody></table>";
               }




        }
if (!empty($item)){
       $select2= "SELECT * from batch WHERE item_name='$item' and date_created BETWEEN '$dateFrom' AND '$dateTo' ";
                

              $select2=$link->query($select2);
              $qty=0;
              $damage=0;
              $damage_cost=0;
             if ($select2->num_rows>0){
                 while ($row=$select2->fetch_assoc()) {
                    $qty+=$row['qty'];
                    $damage+=$row['damage'];
                    $damage_cost+=$row['damage_cost'];
                    echo ' <tbody>
                            <tr>
                                <td>'.$row["batch_no"].'</td>
                                <td>'.$row["barcode"].'</td>
                                <td>'.$row["item_name"].'</td>
                                <td>'.$row["qty"].'</td>
                                <td>'.$row["damage"].'</td>
                                <td>'.$row["damage_cost"].'</td>
                            </tr>';
                }
              echo "<tr><td></td><td></td><td></td>";
              echo "<td>".$qty."</td><td>".$damage."</td><td>".number_format($damage_cost,2)."</td>";
            echo "</tbody></table>";
               }

}


}


function ExpiredItem_table_header_with_batch(){

    echo '   
        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
            <thead>


                        <tr>
                                <th>Stock In No</th>
                                <th>Barcode</th>
                                <th>Item Name</th>
                                <th>Expiration Date</th>
                                <th>Quantity</th>
                                <th>Expiry Cost</th>

                        </tr>
            </thead>';
}
if ($type=="Expiring_Item_Report"){

        if ($categories=="All"){
            ExpiredItem_table_header_with_batch();
         $select2= "SELECT * from batch WHERE expiration BETWEEN '$dateFrom' AND '$dateTo' ";
        

      $select2=$link->query($select2);
    
     if ($select2->num_rows>0){
         $qty=0;
         $remaining_cost=0;
         while ($row=$select2->fetch_assoc()) {
            $qty+=$row['qty'];
            $remaining_cost+=$row['remaining_cost'];
            echo ' <tbody>
                    <tr>
                        <td>'.$row["batch_no"].'</td>
                        <td>'.$row["barcode"].'</td>
                        <td>'.$row["item_name"].'</td>
                        <td>'.$row["expiration"].'</td>
                        <td>'.$row["qty"].'</td>
                        <td>'.number_format($row["remaining_cost"],2).'</td>
                    </tr>';

        }
      echo "<tr><td></td><td></td><td></td><td></td>";
      echo "<td>".$qty."</td><td>".number_format($remaining_cost,2)."</td>";
    echo " </tbody></table>";
    }

    }

     if (!empty($categories) && $categories!="All"){
            ExpiredItem_table_header_with_batch();
         $select2= "SELECT * from batch WHERE category='$categories' and expiration BETWEEN '$dateFrom' AND '$dateTo' ";
        

      $select2=$link->query($select2);
    
     if ($select2->num_rows>0){
         $qty=0;
         $remaining_cost=0;
         while ($row=$select2->fetch_assoc()) {
            $qty+=$row['qty'];
            $remaining_cost+=$row['remaining_cost'];
            echo ' <tbody>
                    <tr>
                        <td>'.$row["batch_no"].'</td>
                        <td>'.$row["barcode"].'</td>
                        <td>'.$row["item_name"].'</td>
                        <td>'.$row["expiration"].'</td>
                        <td>'.$row["qty"].'</td>
                        <td>'.number_format($row["remaining_cost"],2).'</td>
                    </tr>';

        }
      echo "<tr><td></td><td></td><td></td><td></td>";
      echo "<td>".$qty."</td><td>".number_format($remaining_cost,2)."</td>";
    echo " </tbody></table>";
    }

    }

     if (!empty($item)){
            ExpiredItem_table_header_with_batch();
         $select2= "SELECT * from batch WHERE item_name='$item_name' and expiration BETWEEN '$dateFrom' AND '$dateTo' ";
        

      $select2=$link->query($select2);
    
     if ($select2->num_rows>0){
         $qty=0;
         $remaining_cost=0;
         while ($row=$select2->fetch_assoc()) {
            $qty+=$row['qty'];
            $remaining_cost+=$row['remaining_cost'];
            echo ' <tbody>
                    <tr>
                        <td>'.$row["batch_no"].'</td>
                        <td>'.$row["barcode"].'</td>
                        <td>'.$row["item_name"].'</td>
                        <td>'.$row["expiration"].'</td>
                        <td>'.$row["qty"].'</td>
                        <td>'.number_format($row["remaining_cost"],2).'</td>
                    </tr>';

        }
      echo "<tr><td></td><td></td><td></td><td></td>";
      echo "<td>".$qty."</td><td>".number_format($remaining_cost,2)."</td>";
    echo " </tbody></table>";
    }

    }
}


function LowInventory_table_header_with_Nobatch(){

    echo '   
        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
            <thead>


                        <tr>
                                <th>Barcode</th>
                                <th>Item Name</th>
                                <th>Qty Remaining</th>
                                <th>Reoder Level</th>
                                <th>Reorder Qty</th>
                               
                              

                        </tr>
            </thead>';
}

if ($type=="Low_Inventory_Report"){
     if ($categories=="All"){
        LowInventory_table_header_with_Nobatch();
        $select2= "SELECT * from inventory WHERE total_supply<10 ";

          $select2=$link->query($select2);
    
     if ($select2->num_rows>0){
         while ($row=$select2->fetch_assoc()) {
            $select3=mysqli_query($link, "SELECT * from items where item_name='$item'");
            $rowSupplier=mysqli_fetch_assoc($select3);
            $supplier=$rowSupplier['supplier'];
            echo ' <tbody>
                    <tr>
                        <td>'.$row["barcode"].'</td>
                        <td>'.$row["item_name"].'</td>
                        <td>'.$row["total_supply"].'</td>
                        <td>'.$row["reorder_level"].'</td>
                        <td>'.$row["reorder_quantity"].'</td>
                   
                    </tr>            
                            
                                 
                    </tbody>';

        }
    echo "</table>";
       }

    }

     if (!empty($categories) && $categories!="All"){
        LowInventory_table_header_with_Nobatch();
        $select2= "SELECT * from inventory WHERE category='$categories' where total_supply<10 ";

          $select2=$link->query($select2);
    
     if ($select2->num_rows>0){
         while ($row=$select2->fetch_assoc()) {
            $select3=mysqli_query($link, "SELECT * from items where item_name='$item'");
            $rowSupplier=mysqli_fetch_assoc($select3);
            $supplier=$rowSupplier['supplier'];
            echo ' <tbody>
                    <tr>
                        <td>'.$row["barcode"].'</td>
                        <td>'.$row["item_name"].'</td>
                        <td>'.$row["total_supply"].'</td>
                        <td>'.$row["reorder_level"].'</td>
                        <td>'.$row["reorder_quantity"].'</td>
                    
                    </tr>            
                            
                                 
                    </tbody>';

        }
    echo "</table>";
       }

    }


      if (!empty($item)){
        LowInventory_table_header_with_Nobatch();
        $select2= "SELECT * from inventory WHERE category='$categories'  where total_supply<10 ";

          $select2=$link->query($select2);
    
     if ($select2->num_rows>0){
         while ($row=$select2->fetch_assoc()) {
            $select3=mysqli_query($link, "SELECT * from items where item_name='$item'");
            $rowSupplier=mysqli_fetch_assoc($select3);
            $supplier=$rowSupplier['supplier'];
            echo ' <tbody>
                    <tr>
                        <td>'.$row["barcode"].'</td>
                        <td>'.$row["item_name"].'</td>
                        <td>'.$row["total_supply"].'</td>
                        <td>'.$row["reorder_level"].'</td>
                        <td>'.$row["reorder_quantity"].'</td>
                    
                    </tr>            
                            
                                 
                    </tbody>';

        }
    echo "</table>";
       }

    }
}
function table_header_batch_tracking(){

    echo '   
        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
            <thead>


                        <tr>
                                <th>Batch No</th>
                                <th>Barcode</th>
                                <th>Item Name</th>
                                <th>Total Supply</th>
                                <th>Qty Sold</th>
                                <th>Qty on Shelf</th>
                                <th>Total Cost</th>
                                <th>Damaged Qty</th>
                                <th>Damaged Cost</th>
                              
                              

                        </tr>
            </thead>';
}



if ($type=="Batch_Tracking_Report"){
        if ($categories=="All"){
            table_header_batch_tracking();
             $select2= "SELECT * from batch WHERE date_created BETWEEN '$dateFrom' AND '$dateTo' ";
        

      $select2=$link->query($select2);
      $qty=0;
      $cost=0;
      $damage=0;
      $qty_sold=0;
      $qty_on_shelf=0;
      $damage_cost=0;
     if ($select2->num_rows>0){
         while ($row=$select2->fetch_assoc()) {
            $qty+=$row['qty'];
            $cost+=$row['cost'];
            $damage+=$row['damage'];
            $damage_cost+=$row['damage_cost'];
            $qty_sold+=$row['qty_sold'];
            $qty_on_shelf+=$row['qty_on_shelf'];
            echo ' <tbody>
                    <tr>
                        <td>'.$row["batch_no"].'</td>
                        <td>'.$row["barcode"].'</td>  
                        <td>'.$row["item_name"].'</td>
                        <td>'.$row["qty"].'</td>
                        <td>'.$row["qty_sold"].'</td>
                        <td>'.$row["qty_on_shelf"].'</td>
                        <td>'.number_format($row["cost"],2).'</td>
                        <td>'.$row["damage"].'</td>
                        <td>'.number_format($row["damage_cost"],2).'</td>
                    </tr>            
                            
                                 
                    ';
        }
      echo "<tr style='font-size:16px'>"; 
    echo '
                         <td></td>
                        <td></td>  
                        <td></td>
                        <td>'.$qty.'</td>
                        <td>'.$qty_sold.'</td>
                        <td>'.$qty_on_shelf.'</td>
                        <td>'.number_format($cost,2).'</td>
                        <td>'.$damage.'</td>
                        <td>'.number_format($damage_cost,2).'</td>
  </tr>  ';
    
       }
        }


         if (!empty($categories) && $categories!="All"){
            table_header_batch_tracking();
             $select2= "SELECT * from batch WHERE category='$categories' and date_created BETWEEN '$dateFrom' AND '$dateTo' ";
        

      $select2=$link->query($select2);
      $qty=0;
      $cost=0;
      $damage=0;
      $qty_sold=0;
      $qty_on_shelf=0;
      $damage_cost=0;
     if ($select2->num_rows>0){
         while ($row=$select2->fetch_assoc()) {
            $qty+=$row['qty'];
            $cost+=$row['cost'];
            $damage+=$row['damage'];
            $damage_cost+=$row['damage_cost'];
            $qty_sold+=$row['qty_sold'];
            $qty_on_shelf+=$row['qty_on_shelf'];
            echo ' <tbody>
                    <tr>
                        <td>'.$row["batch_no"].'</td>
                        <td>'.$row["barcode"].'</td>  
                        <td>'.$row["item_name"].'</td>
                        <td>'.$row["qty"].'</td>
                        <td>'.$row["qty_sold"].'</td>
                        <td>'.$row["qty_on_shelf"].'</td>
                        <td>'.number_format($row["cost"],2).'</td>
                        <td>'.$row["damage"].'</td>
                        <td>'.number_format($row["damage_cost"],2).'</td>
                    </tr>            
                            
                                 
                    ';
        }
      echo "<tr style='font-size:16px'>"; 
    echo '
                         <td></td>
                        <td></td>  
                        <td></td>
                        <td>'.$qty.'</td>
                        <td>'.$qty_sold.'</td>
                        <td>'.$qty_on_shelf.'</td>
                        <td>'.number_format($cost,2).'</td>
                        <td>'.$damage.'</td>
                        <td>'.number_format($damage_cost,2).'</td>
  </tr>  ';
    
       }
        }


          if (!empty($item)){
            table_header_batch_tracking();
             $select2= "SELECT * from batch WHERE item_name='$item' and date_created BETWEEN '$dateFrom' AND '$dateTo' ";
        

      $select2=$link->query($select2);
      $qty=0;
      $cost=0;
      $damage=0;
      $qty_sold=0;
      $qty_on_shelf=0;
      $damage_cost=0;
     if ($select2->num_rows>0){
         while ($row=$select2->fetch_assoc()) {
            $qty+=$row['qty'];
            $cost+=$row['cost'];
            $damage+=$row['damage'];
            $damage_cost+=$row['damage_cost'];
            $qty_sold+=$row['qty_sold'];
            $qty_on_shelf+=$row['qty_on_shelf'];
            echo ' <tbody>
                    <tr>
                        <td>'.$row["batch_no"].'</td>
                        <td>'.$row["barcode"].'</td>  
                        <td>'.$row["item_name"].'</td>
                        <td>'.$row["qty"].'</td>
                        <td>'.$row["qty_sold"].'</td>
                        <td>'.$row["qty_on_shelf"].'</td>
                        <td>'.number_format($row["cost"],2).'</td>
                        <td>'.$row["damage"].'</td>
                        <td>'.number_format($row["damage_cost"],2).'</td>
                    </tr>            
                            
                                 
                    ';
        }
      echo "<tr style='font-size:16px'>"; 
    echo '
                         <td></td>
                        <td></td>  
                        <td></td>
                        <td>'.$qty.'</td>
                        <td>'.$qty_sold.'</td>
                        <td>'.$qty_on_shelf.'</td>
                        <td>'.number_format($cost,2).'</td>
                        <td>'.$damage.'</td>
                        <td>'.number_format($damage_cost,2).'</td>
  </tr>  ';
    
       }
        }


}
?>


