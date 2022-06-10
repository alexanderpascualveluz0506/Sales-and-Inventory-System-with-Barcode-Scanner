<?php  
function status1(){
  include 'connection.php';

  $sql=mysqli_query($link, "SELECT * from inventory");

     if ($sql->num_rows >0){
          while ($row= $sql->fetch_assoc()) {    
              $reorder_level=$row["reorder_level"];
              $total_supply=$row["total_supply"];
              $item_name=$row["item_name"];
              if ($reorder_level==$total_supply){

                $sql1=mysqli_query($link, "SELECT count(*) as total FROM `purchaseorder` where item_name='$item_name' and dateCreated > NOW()- interval 3 day");
                $rows=mysqli_fetch_assoc($sql1);

                if ($rows['total']==0){
                $sql2=mysqli_query($link, "UPDATE inventory set status='Reorder Level' where item_name='$item_name'");
                }else{
                     $sql2=mysqli_query($link, "UPDATE inventory set status='' where item_name='$item_name'");
                }

              }elseif ($row['qty_on_shelf']==$row['replenishment_level']){
                $sql2=mysqli_query($link, "UPDATE inventory set status='Replenish' where item_name='$item_name'");
              }elseif($row['total_supply']<=10){
                $sql2=mysqli_query($link, "UPDATE inventory set status='Lower Stock' where item_name='$item_name'");
              }elseif ($row['total_supply']==0){
                $sql2=mysqli_query($link, "UPDATE inventory set status='No Stock' where item_name='$item_name'");
              }else{
                 $sql2=mysqli_query($link, "UPDATE inventory set status='' where item_name='$item_name'");
              }


}
}
}

function categorize(){
include 'connection.php';
   $test = isset($_GET['category']) ? $_GET['category'] : '';
$sql=mysqli_query($link, "SELECT * from inventory where category='$test'");
           			if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
        $perisable=$row['perishable'];
        $item_name=$row['item_name'];
        $status=$row['status'];
        if ($perisable=="YES"){
            $qty=$row['total_supply']."".'g';
            $on_shelf=$row["qty_on_shelf"]."".'g';
            $damage_quantity=$row["damage_quantity"]."".'g';
            $qty_sold=$row["qty_sold"]."".'g';
        }else{
            $qty=$row['total_supply'];
             $on_shelf=$row["qty_on_shelf"];
              $damage_quantity=$row["damage_quantity"];
              $qty_sold=$row['qty_sold'];
        }

        $location=$row["stock_location"];

        $sqlLocation=mysqli_query($link, "SELECT * from storage where storage_no='$location'");
        $rowLow=mysqli_fetch_assoc($sqlLocation);
        $locName=$rowLow["name"];

        $sql_count_batch=mysqli_query($link,"SELECT * from batch where item_name='$item_name'");
        $rowss=mysqli_fetch_assoc($sql_count_batch);
        $expirationss=$rowss['expiration'];

         $rowcountBatch=mysqli_num_rows($sql_count_batch);
       
        date_default_timezone_set('Asia/Manila');
        $date_today=date("Y-m-d");
        $select_expiration=mysqli_query($link, "SELECT * from batch where item_name='$item_name' and expiration='$date_today' and expiration!='0000-00-00' ");
        $rowcount=mysqli_num_rows($select_expiration);
       
        
       $past_three_days=date('Y-m-d', strtotime($date_today. ' + 3 days')); 
        $select_expiration_three=mysqli_query($link, "SELECT * from batch where expiration BETWEEN '$date_today' AND ' $past_three_days' and expiration!='0000-00-00' and item_name='$item_name'");
        $rowcount2=mysqli_num_rows($select_expiration_three);


       $select_already_expired=mysqli_query($link,"SELECT * FROM batch WHERE expiration < CURRENT_DATE() and expiration!='0000-00-00' and item_name='$item_name' ") ;
        $rowcount3=mysqli_num_rows($select_already_expired);


            if ($rowcount>0 || $rowcount2>0 || $rowcount3>0){
            echo '
            <tr row_id="'. $row["id"].'">
           
             <td ">'.$item_name.'<input type="hidden" id="item_name_td_to_get" value='.$row["item_name"].'></td>
             <td id="total-supply-td">'.$qty.'</td>
             <td><center><a href="" data-name="'.$row["item_name"].'" data-monitor="'.$row["monitor_storage"].'" data-dismiss="modal" data-toggle="modal" data-target="#batches" class="view-count"><button type="button" id="batch_count" class="btn-change" >
             '.$rowcountBatch.'</button></a></center></td>

               <td><center>'.$qty_sold.'</center></td>

              <td id="reorder-level-td">'.$row['reorder_level'].'</td>
              <td id="reorder-level-qty">'.$row["reorder_quantity"].'</td>
              <td id="on-shelf-qty">'.$on_shelf.'</td>
                <td id="replenish-qty">'.$row["replenishment_level"].'</td>
              <td id="inventory-total">'.number_format($row["inventory_value"],2).'</td>

              <td><center>
              
              <button id="plus-batch-button" class="btn btn-success" style="background-color:#007bff" ><a href=""  data-dismiss="modal" data-toggle="modal" data-target="#add-new-stock" data-perishable="'.$row["perishable"].'" data-name="'.$row["item_name"].'" data-barcode="'.$row["barcode"].'" data-category="'.$row["category"].'" class="add" style="margin-bottom:30px"><i class="fas fa-plus" style="margin-left:-4px;font-size:15px;color:white;"></i></a>

              </button>


             
          <button id="view-button" class="btn btn-success" style="background-color:#28a745">
          <a href="" data-dismiss="modal" data-toggle="modal" 
          data-perishable="'.$row["perishable"].'"  
          data-id="'.$row["id"].'"
          data-name="'.$row["item_name"].'"
          data-barcode="'.$row["barcode"].'" 
          data-cost="'.$row["cost_price"].'" 
          data-qty="'.$qty.'" 
          data-rlevel="'.$row["reorder_level"].'" 
          data-rqty="'.$row["reorder_quantity"].'" 
          data-value="'.$row["inventory_value"].'" 
          data-damaged="'.$damage_quantity.'"  
          data-category="'.$row["category"].'" 
          data-shelf="'.$on_shelf.'"
          data-replenishment="'.$row["replenishment_level"].'"  
          data-costpiece="'.number_format($row['damaged_cost'],2).'"
            data-location="'.$locName.'"
          data-target="#examplePricesTables"  
          class="view">
          <i class="fas fa-eye" style="margin-left:-7px; font-size:15px;color:white"></i></a>
          </button>



             
            <button id="delete-button" class="btn btn-success" style="background-color:#dc3545">
          <a href="" data-toggle="modal" data-target="#modal-delete" data-name="'.$row["item_name"].'" class="delete-item"><i class="ti-trash"  style="margin-left:-6px; font-size:16px; color:white"></i></a> </button></center></td>

          <td style="display:none">'.$status.'</td>
         ';


          }
          else{ 
         echo '
        <tr row_id="'. $row["id"].'">
       
         <td ">'.$row["item_name"].'<input type="hidden" id="item_name_td_to_get" value='.$row["item_name"].'></td>
         <td id="total-supply-td">'.$qty.'</td>
         <td><center><a href="" data-name="'.$row["item_name"].'" data-monitor="'.$row["monitor_storage"].'" data-dismiss="modal" data-toggle="modal" data-target="#batches" class="view-count"><button type="button" id="batch_count">'.$rowcountBatch.'</button></a></center></td>

           <td><center>'.$qty_sold.'</center></td>

          <td id="reorder-level-td">'.$row['reorder_level'].'</td>
          <td id="reorder-level-qty">'.$row["reorder_quantity"].'</td>
         <td id="on-shelf-qty">'.$on_shelf.'</td>
            <td id="replenish-qty">'.$row["replenishment_level"].'</td>
          <td id="inventory-total">'.number_format($row["inventory_value"],2).'</td>

          <td><center>
          
           <button id="plus-batch-button" class="btn btn-success" style="background-color:#007bff"  ><a href=""  data-dismiss="modal" data-toggle="modal" data-target="#add-new-stock" data-perishable="'.$row["perishable"].'" data-name="'.$row["item_name"].'" data-barcode="'.$row["barcode"].'" data-category="'.$row["category"].'" class="add" style="margin-bottom:30px"><i class="fas fa-plus" style="margin-left:-4px;font-size:15px;color:white;"></i></a>
           </button>


            <button id="view-button" class="btn btn-success" style="background-color:#28a745">
          <a href="" data-dismiss="modal" data-toggle="modal" 
          data-perishable="'.$row["perishable"].'"  
          data-id="'.$row["id"].'"
          data-name="'.$row["item_name"].'"
          data-barcode="'.$row["barcode"].'" 
          data-cost="'.$row["cost_price"].'" 
          data-qty="'.$qty.'" 
          data-rlevel="'.$row["reorder_level"].'" 
          data-rqty="'.$row["reorder_quantity"].'" 
          data-value="'.$row["inventory_value"].'" 
          data-damaged="'.$damage_quantity.'"  
          data-category="'.$row["category"].'" 
          data-shelf="'.$on_shelf.'"
          data-replenishment="'.$row["replenishment_level"].'"  
          data-costpiece="'.number_format($row['damaged_cost'],2).'"
            data-location="'.$locName.'"
          data-target="#examplePricesTables"  
          class="view">
          <i class="fas fa-eye" style="margin-left:-7px; font-size:15px;color:white"></i></a>
          </button>


          <button id="delete-button" class="btn btn-success" style="background-color:#dc3545">
          <a href="" data-toggle="modal" data-target="#modal-delete" data-name="'.$row["item_name"].'" class="delete-item"><i class="ti-trash"  style="margin-left:-6px;  font-size:15px; color:white"></i></a></button>

          </center></td>
            
            <td style="display:none">'.$status.'</td>
          ';
           
          

          

      }
    


    }//end fo while

    echo"</table>";
    }//end of if

         
}





function all(){
	   include 'connection.php';

$sql= mysqli_query($link,"SELECT * from inventory");


if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
        $perisable=$row['perishable'];
        $item_name=$row['item_name'];
        $status=$row['status'];
        if ($perisable=="YES"){
            $qty=$row['total_supply']."".'g';
            $on_shelf=$row["qty_on_shelf"]."".'g';
            $damage_quantity=$row["damage_quantity"]."".'g';
                     $qty_sold=$row["qty_sold"]."".'g';
        }else{
            $qty=$row['total_supply'];
             $on_shelf=$row["qty_on_shelf"];
              $damage_quantity=$row["damage_quantity"];
               $qty_sold=$row['qty_sold'];
        }



        $location=$row["stock_location"];

        $sqlLocation=mysqli_query($link, "SELECT * from storage where storage_no='$location'");
        $rowLow=mysqli_fetch_assoc($sqlLocation);
        $locName=$rowLow["name"];

        $sql_count_batch=mysqli_query($link,"SELECT * from batch where item_name='$item_name'");
         $rowcountBatch=mysqli_num_rows($sql_count_batch);
       
        date_default_timezone_set('Asia/Manila');
        $date_today=date("Y-m-d");
        $select_expiration=mysqli_query($link, "SELECT * from batch where item_name='$item_name' and expiration='$date_today'and expiration!='0000-00-00'");
        $rowcount=mysqli_num_rows($select_expiration);
       
        
       $past_three_days=date('Y-m-d', strtotime($date_today. ' + 3 days')); 
        $select_expiration_three=mysqli_query($link, "SELECT * from batch where expiration BETWEEN '$date_today' AND ' $past_three_days'
        and item_name='$item_name' and expiration!='0000-00-00'");
        $rowcount2=mysqli_num_rows($select_expiration_three);


       $select_already_expired=mysqli_query($link,"SELECT * FROM batch WHERE expiration < CURRENT_DATE() and item_name='$item_name'and expiration!='0000-00-00' ") ;
        $rowcount3=mysqli_num_rows($select_already_expired);



            if ($rowcount>0 || $rowcount2>0 || $rowcount3>0){
            echo '
            <tr row_id="'. $row["id"].'">
           
             <td ">'.$item_name.'<input type="hidden" id="item_name_td_to_get" value='.$row["item_name"].'></td>
             <td id="total-supply-td">'.$qty.'</td>
             <td><center><a href="" data-name="'.$row["item_name"].'" data-monitor="'.$row["monitor_storage"].'" data-dismiss="modal" data-toggle="modal" data-target="#batches" class="view-count"><button type="button" id="batch_count" class="btn-change" >
             '.$rowcountBatch.'</button></a></center></td>

                <td><center>'.$qty_sold.'</center></td>
              <td id="reorder-level-td">'.$row['reorder_level'].'</td>
              <td id="reorder-level-qty">'.$row["reorder_quantity"].'</td>
              <td id="on-shelf-qty">'.$on_shelf.'</td>
                <td id="replenish-qty">'.$row["replenishment_level"].'</td>
              <td id="inventory-total">'.number_format($row["inventory_value"],2).'</td>

              <td><center>
              
              <button id="plus-batch-button" class="btn btn-success" style="background-color:#007bff" ><a href=""  data-dismiss="modal" data-toggle="modal" data-target="#add-new-stock" data-perishable="'.$row["perishable"].'" data-name="'.$row["item_name"].'" data-barcode="'.$row["barcode"].'" data-category="'.$row["category"].'" class="add" style="margin-bottom:30px"><i class="fas fa-plus" style="margin-left:-4px;font-size:15px;color:white;"></i></a>

              </button>


             
          <button id="view-button" class="btn btn-success" style="background-color:#28a745">
          <a href="" data-dismiss="modal" data-toggle="modal" 
          data-perishable="'.$row["perishable"].'"  
          data-id="'.$row["id"].'"
          data-name="'.$row["item_name"].'"
          data-barcode="'.$row["barcode"].'" 
          data-cost="'.$row["cost_price"].'" 
          data-qty="'.$qty.'" 
          data-rlevel="'.$row["reorder_level"].'" 
          data-rqty="'.$row["reorder_quantity"].'" 
          data-value="'.$row["inventory_value"].'" 
          data-damaged="'.$damage_quantity.'"  
          data-category="'.$row["category"].'" 
          data-shelf="'.$on_shelf.'"
          data-replenishment="'.$row["replenishment_level"].'"  
          data-costpiece="'.number_format($row['damaged_cost'],2).'"
            data-location="'.$locName.'"
          data-target="#examplePricesTables"  
          class="view">
          <i class="fas fa-eye" style="margin-left:-7px; font-size:15px;color:white"></i></a>
          </button>



             
            <button id="delete-button" class="btn btn-success" style="background-color:#dc3545">
          <a href="" data-toggle="modal" data-target="#modal-delete" data-name="'.$row["item_name"].'" class="delete-item"><i class="ti-trash"  style="margin-left:-6px; font-size:16px; color:white"></i></a> </button></center></td>
         
         <td style="display:none">'.$status.'</td>
         ';


          }
          else{
         echo '
        <tr row_id="'. $row["id"].'">
       
         <td ">'.$row["item_name"].'<input type="hidden" id="item_name_td_to_get" value='.$row["item_name"].'></td>
         <td id="total-supply-td">'.$qty.'</td>
         <td><center><a href="" data-name="'.$row["item_name"].'" data-monitor="'.$row["monitor_storage"].'" data-dismiss="modal" data-toggle="modal" data-target="#batches" class="view-count"><button type="button" id="batch_count">'.$rowcountBatch.'</button></a></center></td>
            <td><center>'.$qty_sold.'</center></td>
          <td id="reorder-level-td">'.$row['reorder_level'].'</td>
          <td id="reorder-level-qty">'.$row["reorder_quantity"].'</td>
         <td id="on-shelf-qty">'.$on_shelf.'</td>
            <td id="replenish-qty">'.$row["replenishment_level"].'</td>
          <td id="inventory-total">'.number_format($row["inventory_value"],2).'</td>

          <td><center>
          
           <button id="plus-batch-button" class="btn btn-success" style="background-color:#007bff"  ><a href=""  data-dismiss="modal" data-toggle="modal" data-target="#add-new-stock" data-perishable="'.$row["perishable"].'" data-name="'.$row["item_name"].'" data-barcode="'.$row["barcode"].'" data-category="'.$row["category"].'" class="add" style="margin-bottom:30px"><i class="fas fa-plus" style="margin-left:-4px;font-size:15px;color:white;"></i></a>
           </button>


            <button id="view-button" class="btn btn-success" style="background-color:#28a745">
          <a href="" data-dismiss="modal" data-toggle="modal" 
          data-perishable="'.$row["perishable"].'"  
          data-id="'.$row["id"].'"
          data-name="'.$row["item_name"].'"
          data-barcode="'.$row["barcode"].'" 
          data-cost="'.$row["cost_price"].'" 
          data-qty="'.$qty.'" 
          data-rlevel="'.$row["reorder_level"].'" 
          data-rqty="'.$row["reorder_quantity"].'" 
          data-value="'.$row["inventory_value"].'" 
          data-damaged="'.$damage_quantity.'"  
          data-category="'.$row["category"].'" 
          data-shelf="'.$on_shelf.'"
          data-replenishment="'.$row["replenishment_level"].'"  
          data-costpiece="'.number_format($row['damaged_cost'],2).'"
            data-location="'.$locName.'"
          data-target="#examplePricesTables"  
          class="view">
          <i class="fas fa-eye" style="margin-left:-7px; font-size:15px;color:white"></i></a>
          </button>


          <button id="delete-button" class="btn btn-success" style="background-color:#dc3545">
          <a href="" data-toggle="modal" data-target="#modal-delete" data-name="'.$row["item_name"].'" class="delete-item"><i class="ti-trash"  style="margin-left:-6px;  font-size:15px; color:white"></i></a></button>

          </center></td>

             <td style="display:none">'.$status.'</td>
     
          ';
           
          

          

      }
    


    }//end fo while

    echo"</table>";
    }//end of if
}


function alert(){
    include 'connection.php';
   $item_name = isset($_GET['item_name']) ? $_GET['item_name'] : '';
$sql=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
                    if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
        $perisable=$row['perishable'];
        $item_name=$row['item_name'];
        $status=$row['status'];
        if ($perisable=="YES"){
            $qty=$row['total_supply']."".'g';
            $on_shelf=$row["qty_on_shelf"]."".'g';
            $damage_quantity=$row["damage_quantity"]."".'g';
            $qty_sold=$row["qty_sold"]."".'g';
        }else{
            $qty=$row['total_supply'];
             $on_shelf=$row["qty_on_shelf"];
              $damage_quantity=$row["damage_quantity"];
              $qty_sold=$row['qty_sold'];
        }

        $location=$row["stock_location"];

        $sqlLocation=mysqli_query($link, "SELECT * from storage where storage_no='$location'");
        $rowLow=mysqli_fetch_assoc($sqlLocation);
        $locName=$rowLow["name"];

        $sql_count_batch=mysqli_query($link,"SELECT * from batch where item_name='$item_name'");
        $rowss=mysqli_fetch_assoc($sql_count_batch);
        $expirationss=$rowss['expiration'];

         $rowcountBatch=mysqli_num_rows($sql_count_batch);
       
        date_default_timezone_set('Asia/Manila');
        $date_today=date("Y-m-d");
        $select_expiration=mysqli_query($link, "SELECT * from batch where item_name='$item_name' and expiration='$date_today' and expiration!='0000-00-00' ");
        $rowcount=mysqli_num_rows($select_expiration);
       
        
       $past_three_days=date('Y-m-d', strtotime($date_today. ' + 3 days')); 
        $select_expiration_three=mysqli_query($link, "SELECT * from batch where expiration BETWEEN '$date_today' AND ' $past_three_days' and expiration!='0000-00-00' and item_name='$item_name'");
        $rowcount2=mysqli_num_rows($select_expiration_three);


       $select_already_expired=mysqli_query($link,"SELECT * FROM batch WHERE expiration < CURRENT_DATE() and expiration!='0000-00-00' and item_name='$item_name' ") ;
        $rowcount3=mysqli_num_rows($select_already_expired);


            if ($rowcount>0 || $rowcount2>0 || $rowcount3>0){
            echo '
            <tr row_id="'. $row["status"].'">
           
             <td ">'.$item_name.'<input type="hidden" id="item_name_td_to_get" value='.$row["item_name"].'></td>
             <td id="total-supply-td">'.$qty.'</td>
             <td><center><a href="" data-name="'.$row["item_name"].'" data-monitor="'.$row["monitor_storage"].'" data-dismiss="modal" data-toggle="modal" data-target="#batches" class="view-count"><button type="button" id="batch_count" class="btn-change" >
             '.$rowcountBatch.'</button></a></center></td>

               <td><center>'.$qty_sold.'</center></td>

              <td id="reorder-level-td">'.$row['reorder_level'].'</td>
              <td id="reorder-level-qty">'.$row["reorder_quantity"].'</td>
              <td id="on-shelf-qty">'.$on_shelf.'</td>
                <td id="replenish-qty">'.$row["replenishment_level"].'</td>
              <td id="inventory-total">'.number_format($row["inventory_value"],2).'</td>

              <td><center>
              
              <button id="plus-batch-button" class="btn btn-success" style="background-color:#007bff" ><a href=""  data-dismiss="modal" data-toggle="modal" data-target="#add-new-stock" data-perishable="'.$row["perishable"].'" data-name="'.$row["item_name"].'" data-barcode="'.$row["barcode"].'" data-category="'.$row["category"].'" class="add" style="margin-bottom:30px"><i class="fas fa-plus" style="margin-left:-4px;font-size:15px;color:white;"></i></a>

              </button>


             
          <button id="view-button" class="btn btn-success" style="background-color:#28a745">
          <a href="" data-dismiss="modal" data-toggle="modal" 
          data-perishable="'.$row["perishable"].'"  
          data-id="'.$row["id"].'"
          data-name="'.$row["item_name"].'"
          data-barcode="'.$row["barcode"].'" 
          data-cost="'.$row["cost_price"].'" 
          data-qty="'.$qty.'" 
          data-rlevel="'.$row["reorder_level"].'" 
          data-rqty="'.$row["reorder_quantity"].'" 
          data-value="'.$row["inventory_value"].'" 
          data-damaged="'.$damage_quantity.'"  
          data-category="'.$row["category"].'" 
          data-shelf="'.$on_shelf.'"
          data-replenishment="'.$row["replenishment_level"].'"  
          data-costpiece="'.number_format($row['damaged_cost'],2).'"
            data-location="'.$locName.'"
          data-target="#examplePricesTables"  
          class="view">
          <i class="fas fa-eye" style="margin-left:-7px; font-size:15px;color:white"></i></a>
          </button>



             
            <button id="delete-button" class="btn btn-success" style="background-color:#dc3545">
          <a href="" data-toggle="modal" data-target="#modal-delete" data-name="'.$row["item_name"].'" class="delete-item"><i class="ti-trash"  style="margin-left:-6px; font-size:16px; color:white"></i></a> </button></center></td>

             <td style="display:none">'.$status.'</td>
         ';


          }
          else{ 
         echo '
        <tr row_id="'. $row["status"].'">
       
         <td ">'.$row["item_name"].'<input type="hidden" id="item_name_td_to_get" value='.$row["item_name"].'></td>
         <td id="total-supply-td">'.$qty.'</td>
         <td><center><a href="" data-name="'.$row["item_name"].'" data-monitor="'.$row["monitor_storage"].'" data-dismiss="modal" data-toggle="modal" data-target="#batches" class="view-count"><button type="button" id="batch_count">'.$rowcountBatch.'</button></a></center></td>

           <td><center>'.$qty_sold.'</center></td>

          <td id="reorder-level-td">'.$row['reorder_level'].'</td>
          <td id="reorder-level-qty">'.$row["reorder_quantity"].'</td>
         <td id="on-shelf-qty">'.$on_shelf.'</td>
            <td id="replenish-qty">'.$row["replenishment_level"].'</td>
          <td id="inventory-total">'.number_format($row["inventory_value"],2).'</td>

          <td><center>
          
           <button id="plus-batch-button" class="btn btn-success" style="background-color:#007bff"  ><a href=""  data-dismiss="modal" data-toggle="modal" data-target="#add-new-stock" data-perishable="'.$row["perishable"].'" data-name="'.$row["item_name"].'" data-barcode="'.$row["barcode"].'" data-category="'.$row["category"].'" class="add" style="margin-bottom:30px"><i class="fas fa-plus" style="margin-left:-4px;font-size:15px;color:white;"></i></a>
           </button>


            <button id="view-button" class="btn btn-success" style="background-color:#28a745">
          <a href="" data-dismiss="modal" data-toggle="modal" 
          data-perishable="'.$row["perishable"].'"  
          data-id="'.$row["id"].'"
          data-name="'.$row["item_name"].'"
          data-barcode="'.$row["barcode"].'" 
          data-cost="'.$row["cost_price"].'" 
          data-qty="'.$qty.'" 
          data-rlevel="'.$row["reorder_level"].'" 
          data-rqty="'.$row["reorder_quantity"].'" 
          data-value="'.$row["inventory_value"].'" 
          data-damaged="'.$damage_quantity.'"  
          data-category="'.$row["category"].'" 
          data-shelf="'.$on_shelf.'"
          data-replenishment="'.$row["replenishment_level"].'"  
          data-costpiece="'.number_format($row['damaged_cost'],2).'"
            data-location="'.$locName.'"
          data-target="#examplePricesTables"  
          class="view">
          <i class="fas fa-eye" style="margin-left:-7px; font-size:15px;color:white"></i></a>
          </button>


          <button id="delete-button" class="btn btn-success" style="background-color:#dc3545">
          <a href="" data-toggle="modal" data-target="#modal-delete" data-name="'.$row["item_name"].'" class="delete-item"><i class="ti-trash"  style="margin-left:-6px;  font-size:15px; color:white"></i></a></button>

          </center></td>

             <td style="display:none">'.$status.'</td>
     
          ';
           
          

          

      }
    


    }//end fo while

    echo"</table>";
    }//end of if

}
?>