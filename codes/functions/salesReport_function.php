
<?php
include 'connection.php';
function salesWithBatch(){
echo '
 <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="width:100%; color:black" >
                        <thead>
                            <tr>
                                <th>Sales No</th>
                                <th>Stock In No</th>
                                <th style="width:380px">Item Name</th>
                               
                                <th style"width:200px">Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                 <th>Qty</th>

                                <th style"width:230px">Total Amount</th>
                            </tr>
                        </thead>
';
}
function salesWithNoBatch(){
echo '
 <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                            <tr>
                                <th>Sales No</th>
                                <th>Date and Time</th>
                                <th>Total Items</th>
                                <th>Total Amount</th>
                                <th>Payment</th>
                                <th>Change</th>
                                <th>Discount</th>
                            </tr>
                        </thead>
';
}

function returnSales(){
echo '
 <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                            <tr>
                                <th>Date Returned</th>
                                <th>Date Ordered</th>
                                  <th>Sales Order No</th>
                                <th>Stock In No</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total Amount</th>
                             
                            </tr>
                        </thead>
';
}


$dateFrom = isset($_REQUEST['dateFrom'])?$_REQUEST['dateFrom']:"";
$dateTo = isset($_REQUEST['dateTo'])?$_REQUEST['dateTo']:"";
$type=isset($_REQUEST['type'])?$_REQUEST['type']:"";
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');

$summarize=isset($_REQUEST['summarize'])?$_REQUEST['summarize']:"";
$transaction=isset($_REQUEST['transaction'])?$_REQUEST['transaction']:"";

if ($type=="Daily_Sales_Report"){
	if (!empty($transaction)){
		salesWithBatch();
        $final_total_qty=0;
        $final_total_amount=0;

        $sql1=mysqli_query($link,"SELECT * from transaction where payment_date='$date'");
         while($rowSum = $sql1->fetch_assoc()) {
                   $final_total_qty+=$rowSum['qty'];
                    $final_total_amount+=$rowSum['total_amount'];
      
               echo '
                         <tr>
                                  <td>'.$rowSum['sales_order'].'</td>
                                <td>'.$rowSum['batch_no'].'</td>
                                <td>'.$rowSum['item_name'].'</td>
                                <td>'.number_format($rowSum['price'],2).'</td>
                                <td>'.$rowSum['qty'].'</td>
                                <td>'.number_format($rowSum['total_amount'],2).'</td>

                          </tr>';
                 }

                 echo '
                  <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>'.$final_total_qty.'</td>
                                <td>'.number_format($final_total_amount,2).'</td>
                          </tr>';

                
    }
	

if (!empty($summarize)){
       salesWithNoBatch();

     $sql=mysqli_query($link, "SELECT * from sales where payment_date='$date'");
                     if ($sql->num_rows > 0) {
            $total_sales=0;
            $qty=0;
            $payment=0;
            $vat=0;
            $discount=0;
            $change=0;

                while($row = $sql->fetch_assoc()) {
                     $total_sales+=$row['total'];
                     $qty+=$row['total_items'];
                     $payment+=$row['payment_amount'];  
                     $change+=$row['payment_change'];
                     $vat+=$row['vat_added'];
                    $discount+=$row['discount_added'];

                    echo '
                         <tr>
                                <td>'.$row['sales_no'].'</td>
                                <td>'.$row['payment_date'].' '.$row['time'].'</td>
                                <td>'.$row['total_items'].'</td>
                                <td>'.number_format($row['total'],2).'</td>
                                <td>'.number_format($row['payment_amount'],2).'</td>
                                <td>'.number_format($row['payment_change'],2).'</td>
                               
                                <td>'.doubleval( str_replace("-","",$row['discount_added'])).'</td>

                          </tr>';
                 }
                echo '<tr style="font-size:19px; border-style:none">';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td>'.$qty.'</td>';
                echo '<td> '.number_format($total_sales,2).'</td>';
                echo '<td>'.number_format($payment,2).'</td>'; 
                echo '<td>'.number_format($change,2).'</td>';
              
                echo '<td> '.doubleval( str_replace("-","",$discount)).'</td>';
                 echo '</tr>';
           }
  }

    }



if ($type=="Weekly_Sales_Report"){
    if (!empty($transaction)){
        salesWithBatch();
        $final_total_qty=0;
        $final_total_amount=0;

        $sql1=mysqli_query($link,"SELECT * from transaction where YEARWEEK(payment_date) = YEARWEEK(NOW())");
         while($rowSum = $sql1->fetch_assoc()) {
                   $final_total_qty+=$rowSum['qty'];
                    $final_total_amount+=$rowSum['total_amount'];
      
               echo '
                         <tr>
                                  <td>'.$rowSum['sales_order'].'</td>
                                <td>'.$rowSum['batch_no'].'</td>
                                <td>'.$rowSum['item_name'].'</td>
                                <td>'.number_format($rowSum['price'],2).'</td>
                                <td>'.$rowSum['qty'].'</td>
                                <td>'.number_format($rowSum['total_amount'],2).'</td>
                          </tr>';
                 }

                 echo '
                  <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>'.$final_total_qty.'</td>
                                <td>'.number_format($final_total_amount,2).'</td>
                          </tr>';

    }
    

    
     if (!empty($summarize)){
       salesWithNoBatch();

     $sql=mysqli_query($link, "SELECT * from sales where YEARWEEK(payment_date) = YEARWEEK(NOW())");
                      if ($sql->num_rows > 0) {
             $total_sales=0;
            $qty=0;
            $payment=0;
            $vat=0;
            $discount=0;
            $change=0;

                while($row = $sql->fetch_assoc()) {
                      $total_sales+=$row['total'];
                     $qty+=$row['total_items'];
                     $payment+=$row['payment_amount'];  
                     $change+=$row['payment_change'];
                     $vat+=$row['vat_added'];
                       $discount+=$row['discount_added'];

                    echo '
                         <tr>
                                <td>'.$row['sales_no'].'</td>
                                <td>'.$row['payment_date'].' '.$row['time'].'</td>
                                <td>'.$row['total_items'].'</td>
                                <td>'.number_format($row['total'],2).'</td>
                                <td>'.number_format($row['payment_amount'],2).'</td>
                                <td>'.number_format($row['payment_change'],2).'</td>
                            
                                 <td>'.doubleval( str_replace("-","",$row['discount_added'])).'</td>
                          </tr>';
                 }
                echo '<tr style="font-size:19px; border-style:none">';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td>'.$qty.'</td>';
                echo '<td> '.number_format($total_sales,2).'</td>';
                echo '<td>'.number_format($payment,2).'</td>'; 
                echo '<td>'.number_format($change,2).'</td>';
             
             echo '<td> '.doubleval( str_replace("-","",$discount)).'</td>';
                 echo '</tr>';
           }
  }


                
 

    }


if ($type=="Monthly_Sales_Report"){
    if (!empty($transaction)){
        salesWithBatch();
        $final_total_qty=0;
        $final_total_amount=0;

        $sql1=mysqli_query($link,"SELECT * from transaction where YEAR(payment_date) = YEAR(CURDATE()) AND MONTH(payment_date) = MONTH(CURDATE()) ");
         while($rowSum = $sql1->fetch_assoc()) {
                   $final_total_qty+=$rowSum['qty'];
                    $final_total_amount+=$rowSum['total_amount'];
      
               echo '
                         <tr>
                                  <td>'.$rowSum['sales_order'].'</td>
                                <td>'.$rowSum['batch_no'].'</td>
                                <td>'.$rowSum['item_name'].'</td>
                                <td>'.number_format($rowSum['price'],2).'</td>
                                <td>'.$rowSum['qty'].'</td>
                                <td>'.number_format($rowSum['total_amount'],2).'</td>
                          </tr>';
                 }

                 echo '
                  <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>'.$final_total_qty.'</td>
                                <td>'.number_format($final_total_amount,2).'</td>
                          </tr>';

                
    }
   
  

    
     if (!empty($summarize)){
       salesWithNoBatch();

     $sql=mysqli_query($link, "SELECT * from sales where YEAR(payment_date) = YEAR(CURDATE()) 
            AND MONTH(payment_date) = MONTH(CURDATE())");
                      if ($sql->num_rows > 0) {
            $total_sales=0;
            $qty=0;
            $payment=0;
            $vat=0;
            $discount=0;
            $change=0;

                while($row = $sql->fetch_assoc()) {
                      $total_sales+=$row['total'];
                     $qty+=$row['total_items'];
                     $payment+=$row['payment_amount'];  
                     $change+=$row['payment_change'];
                     $vat+=$row['vat_added'];
                       $discount+=$row['discount_added'];

                    echo '
                         <tr>
                                <td>'.$row['sales_no'].'</td>
                                <td>'.$row['payment_date'].' '.$row['time'].'</td>
                                <td>'.$row['total_items'].'</td>
                                <td>'.number_format($row['total'],2).'</td>
                                <td>'.number_format($row['payment_amount'],2).'</td>
                                <td>'.number_format($row['payment_change'],2).'</td>
                            
                                 <td>'.doubleval( str_replace("-","",$row['discount_added'])).'</td>
                          </tr>';
                 }
                echo '<tr style="font-size:19px; border-style:none">';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td>'.$qty.'</td>';
                echo '<td> '.number_format($total_sales,2).'</td>';
                echo '<td>'.number_format($payment,2).'</td>'; 
                echo '<td>'.number_format($change,2).'</td>';
             
                  echo '<td> '.doubleval( str_replace("-","",$discount)).'</td>';
                 echo '</tr>';
           }
  }



    }

if ($type=="Yearly_Sales_Report"){
    if (!empty($transaction)){
        salesWithBatch();
        $final_total_qty=0;
        $final_total_amount=0;

        $sql1=mysqli_query($link,"SELECT * from transaction where YEAR(payment_date) = YEAR( CURDATE() )");
         while($rowSum = $sql1->fetch_assoc()) {
                   $final_total_qty+=$rowSum['qty'];
                    $final_total_amount+=$rowSum['total_amount'];
      
               echo '
                         <tr>
                                  <td>'.$rowSum['sales_order'].'</td>
                                <td>'.$rowSum['batch_no'].'</td>
                                <td>'.$rowSum['item_name'].'</td>
                                <td>'.number_format($rowSum['price'],2).'</td>
                                <td>'.$rowSum['qty'].'</td>
                                <td>'.number_format($rowSum['total_amount'],2).'</td>
                          </tr>';
                 }

                 echo '
                  <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>'.$final_total_qty.'</td>
                                <td>'.number_format($final_total_amount,2).'</td>
                          </tr>';

                
    }
    

    
     if (!empty($summarize)){
       salesWithNoBatch();

     $sql=mysqli_query($link, "SELECT * from sales where YEAR(payment_date) = YEAR( CURDATE())");
                      if ($sql->num_rows > 0) {
            $total_sales=0;
            $qty=0;
            $payment=0;
          
            $discount=0;
            $change=0;

                while($row = $sql->fetch_assoc()) {
                      $total_sales+=$row['total'];
                     $qty+=$row['total_items'];
                     $payment+=$row['payment_amount'];  
                     $change+=$row['payment_change'];
               
                       $discount+=$row['discount_added'];

                    echo '
                         <tr>
                                <td>'.$row['sales_no'].'</td>
                                <td>'.$row['payment_date'].' '.$row['time'].'</td>
                                <td>'.$row['total_items'].'</td>
                                <td>'.number_format($row['total'],2).'</td>
                                <td>'.number_format($row['payment_amount'],2).'</td>
                                <td>'.number_format($row['payment_change'],2).'</td>
                             
                               <td>'.doubleval( str_replace("-","",$row['discount_added'])).'</td>
                          </tr>';
                 }
                echo '<tr style="font-size:19px; border-style:none">';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td>'.$qty.'</td>';
                echo '<td> '.number_format($total_sales,2).'</td>';
                echo '<td>'.number_format($payment,2).'</td>'; 
                echo '<td>'.number_format($change,2).'</td>';
                
            echo '<td> '.doubleval( str_replace("-","",$discount)).'</td>';
                 echo '</tr>';
           }
  }

  
    }
if ($type=="Summary_of_Sales_Report"){
    if (!empty($transaction)){
        salesWithBatch();
        $final_total_qty=0;
        $final_total_amount=0;

        $sql1=mysqli_query($link,"SELECT * from transaction where payment_date between '$dateFrom' and '$dateTo' ");
         while($rowSum = $sql1->fetch_assoc()) {
                   $final_total_qty+=$rowSum['qty'];
                    $final_total_amount+=$rowSum['total_amount'];
      
               echo '
                         <tr>
                                  <td>'.$rowSum['sales_order'].'</td>
                                <td>'.$rowSum['batch_no'].'</td>
                                <td>'.$rowSum['item_name'].'</td>
                                <td>'.number_format($rowSum['price'],2).'</td>
                                <td>'.$rowSum['qty'].'</td>
                                <td>'.number_format($rowSum['total_amount'],2).'</td>
                          </tr>';
                 }

                 echo '
                  <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>'.$final_total_qty.'</td>
                                <td>'.number_format($final_total_amount,2).'</td>
                          </tr>';

                
    }
  


    
     if (!empty($summarize)){
       salesWithNoBatch();

     $sql=mysqli_query($link, "SELECT * from sales where payment_date between '$dateFrom' and '$dateTo'");
                      if ($sql->num_rows > 0) {
            $total_sales=0;
            $qty=0;
            $payment=0;
            $vat=0;
            $discount=0;
            $change=0;

                while($row = $sql->fetch_assoc()) {
                      $total_sales+=$row['total'];
                     $qty+=$row['total_items'];
                     $payment+=$row['payment_amount'];  
                     $change+=$row['payment_change'];
                 
                       $discount+=$row['discount_added'];

                    echo '
                         <tr>
                                <td>'.$row['sales_no'].'</td>
                                <td>'.$row['payment_date'].' '.$row['time'].'</td>
                                <td>'.$row['total_items'].'</td>
                                <td>'.number_format($row['total'],2).'</td>
                                <td>'.number_format($row['payment_amount'],2).'</td>
                                <td>'.number_format($row['payment_change'],2).'</td>
                                <td>'.$row['vat_added'].'</td>
                                <td>'.doubleval( str_replace("-","",$row['discount_added'])).'</td>
                          </tr>';
                 }
                echo '<tr style="font-size:19px; border-style:none">';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td>'.$qty.'</td>';
                echo '<td> '.number_format($total_sales,2).'</td>';
                echo '<td>'.number_format($payment,2).'</td>'; 
                echo '<td>'.number_format($change,2).'</td>';
             
                echo '<td> '.doubleval( str_replace("-","",$discount)).'</td>';
                 echo '</tr>';
           }
  }

    }

if ($type=="Sales_Return_Report"){
returnSales();
     $sql=mysqli_query($link, "SELECT * from sales_return where date_returned between '$dateFrom' and '$dateTo'");
                      if ($sql->num_rows > 0) {
            $total_amount=0;
            $total_qty=0;
         

                while($row = $sql->fetch_assoc()) {
                     $total_qty+=$row['qty_returned'];
                     $total_amount+=$row['return_total_amount'];
                    

                    echo '
                         <tr>
                                <td>'.$row['date_returned'].'</td>
                                <td>'.$row['date_ordered'].'</td>
                                 <td>'.$row['receipt_no'].'</td>
                                 <td>'.$row['batch_no'].'</td>
                                <td>'.$row['item_name'].'</td>
                                 <td>'.number_format($row['price'],2).'</td> 
                                 <td>'.$row['qty_returned'].'</td>  
                                <td>'.number_format($row['return_total_amount'],2).'</td>
                            
                          </tr>';
                 }
                echo '<tr style="font-size:19px; border-style:none">';
                                echo ' <td></td>
                                <td></td>
                                 <td></td>
                                 <td></td>
                                <td></td>
                                 <td></td> 
                                 <td>'.$total_qty.'</td>  
                                <td>'.number_format($total_amount,2).'</td>';
                 echo '</tr>';
           }
  
}

function salesWithItem(){
echo '
 <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="width:100%; color:black" >
                        <thead>
                            <tr>

                                <th>Invoice No</th>
                                <th>Customer No</th>
                                <th>Stock No</th>
                                  <th>Barcode</th>
                                <th>Item Name</th>
                               
                                <th>Price</th>
                                 <th>Qty</th>
                                 <th>Total Amount</th>

        
                            </tr>
                        </thead>
';
}

function salesWithCategory(){
echo '
 <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="width:100%; color:black" >
                        <thead>
                            <tr>

                                <th>Invoice No</th>
                                <th>Customer No</th>
                                <th>Stock No</th>
                                <th>Barcode</th>
                                <th>Item Name</th>  
                                <th>Price</th>
                                 <th>Qty</th>
                                 <th>Total Amount</th>

        
                            </tr>
                        </thead>
';
}

$dateFrom = isset($_REQUEST['dateFrom'])?$_REQUEST['dateFrom']:"";
$dateTo = isset($_REQUEST['dateTo'])?$_REQUEST['dateTo']:"";
$type=isset($_REQUEST['type'])?$_REQUEST['type']:"";
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');

$itemname=isset($_REQUEST['itemname'])?$_REQUEST['itemname']:"";
$category=isset($_REQUEST['category'])?$_REQUEST['category']:"";

if (!empty($itemname)){
       salesWithItem();
        $final_total_qty=0;
        $final_total_amount=0;
       

        $sql1=mysqli_query($link,"SELECT * from transaction where item_name='$itemname' and payment_date between '$dateFrom' and '$dateTo' ");
         while($rowSum = $sql1->fetch_assoc()) {
            $salesno=$rowSum['sales_order'];
            $sqlSale=mysqli_query($link, "SELECT * from sales where sales_no='$salesno'");
            $rowSale=mysqli_fetch_assoc($sqlSale);
            $customerno=$rowSale['custNo'];
             $final_total_amount+=$rowSum['total_amount'];
              $final_total_qty+=$rowSum['qty'];
      
            $item_name=$rowSum['item_name'];
            $sql3=mysqli_query($link, "SELECT * from items where item_name='$item_name'");
            $rowItem=mysqli_fetch_assoc($sql3);
            $perisable=$rowItem['perisable'];

            if ($perisable=="YES"){
                $qty=$rowSum['qty']."g";  
                $q_final=$final_total_qty."g";

            }else{
                 $qty=$rowSum['qty'];  

                 $q_final=$final_total_qty;
                
            }

               echo '
                         <tr>
                          
                          <td>'.$rowSum['sales_order'].'</td>
                          <td>'.$customerno.'</td>
                          <td>'.$rowSum['batch_no'].'</td>
                          <td>'.$rowSum['barcode'].'</td>
                          <td>'.$rowSum['item_name'].'</td>
                          <td>'.$rowSum['price'].'</td>
                          <td>'.$qty.'</td>
                          <td>'.number_format($rowSum['total_amount'],2).'</td>
                          </tr>';
                 }

                 echo '
                  <tr>
                                  <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>'.$q_final.'</td>
                                <td>'.$final_total_amount.'</td>
                          </tr>';

                
}


if (!empty($category)){
       salesWithItem();
        $final_total_qty=0;
        $final_total_amount=0;

        $sql1=mysqli_query($link,"SELECT * from transaction where category='$category' and payment_date between '$dateFrom' and '$dateTo' ");
         while($rowSum = $sql1->fetch_assoc()) {
            $salesno=$rowSum['sales_order'];
            $sqlSale=mysqli_query($link, "SELECT * from sales where sales_no='$salesno'");
            $rowSale=mysqli_fetch_assoc($sqlSale);
            $customerno=$rowSale['custNo'];
            

            if ($category=="Fresh Vegetables" || $category=="Fruits" || $category=="Pork/Meat/Poultry"){
                $qty=$rowSum['qty']."g";
            }else{
                 $qty=$rowSum['qty'];
            }    


            $final_total_qty+=$rowSum['qty'];
            $final_total_amount+=$rowSum['total_amount'];
      
               echo '
                         <tr>
                          
                          <td>'.$rowSum['sales_order'].'</td>
                          <td>'.$customerno.'</td>
                          <td>'.$rowSum['batch_no'].'</td>
                          <td>'.$rowSum['barcode'].'</td>
                          <td>'.$rowSum['item_name'].'</td>
                          <td>'.$rowSum['price'].'</td>
                          <td>'.$qty.'</td>
                          <td>'.number_format($rowSum['total_amount'],2).'</td>
                          </tr>';
                 }

            if ($category=="Fresh Vegetables" || $category=="Fruits" || $category=="Pork/Meat/Poultry"){
                $qty_final=$final_total_qty."g";
            }else{
                 $qty_final=$final_total_qty;
            }    

                 echo '
                  <tr>
                                  <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                  <td></td>
                                <td>'.$qty_final.'</td>
                                <td>'.number_format($final_total_amount,2).'</td>
                          </tr>';

                
}

function salesWithManufacturer(){
echo '
 <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="width:100%; color:black" >
                        <thead>
                            <tr>

                                <th>Barcode</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Total Amount</th>        
                            </tr>
                        </thead>
';
}

$dateFrom = isset($_REQUEST['dateFrom'])?$_REQUEST['dateFrom']:"";
$dateTo = isset($_REQUEST['dateTo'])?$_REQUEST['dateTo']:"";
$type=isset($_REQUEST['type'])?$_REQUEST['type']:"";
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');

$manufacture=isset($_REQUEST['manufacture'])?$_REQUEST['manufacture']:"";
$brand=isset($_REQUEST['brand'])?$_REQUEST['brand']:"";

if (!empty($manufacture)){
    salesWithManufacturer();
 $final_total_qty=0;
$final_total_amount=0;

    $sql=mysqli_query($link, "SELECT * from items where manufacturer='$manufacture'");
        while($row = $sql->fetch_assoc()) {
                $item_name=$row['item_name'];
                $perisable=$row['perisable'];


                $sqlItem=mysqli_query($link, "SELECT sum(qty) as total_qty, sum(total_amount) as total from transaction where item_name='$item_name' and payment_date between '$dateFrom' and '$dateTo'");
                $rowsItem=mysqli_fetch_assoc($sqlItem);

                if (empty($rowsItem['total_qty'])){
                    $total_qty=0;
                }else{
                       $total_qty=$rowsItem['total_qty'];
                }

                if ($perisable=="YES"){
                    $total_qty=$total_qty."g";
                     $final_total_qty+=$rowsItem['total_qty'];
                     $q_final=$final_total_qty."g";
                }else{
                       $total_qty=$total_qty;
                     $final_total_qty+=$rowsItem['total_qty'];
                      $q_final=$final_total_qty;
                }

               
                $final_total_amount+=$rowsItem['total'];

                echo '
                <tr>
                    <td>'.$row['barcode'].'</td>
                    <td>'.$row['item_name'].'</td>
                    <td>'.$total_qty.'</td>
                    <td>'.number_format($rowsItem['total'],2).'</td>
                </tr>
                ';


    }

     echo '
                  <tr>
                                <td></td>
                                <td></td>
                                <td>'.$q_final.'</td>
                                <td>'.number_format($final_total_amount,2).'</td>
                          </tr>';


}

if (!empty($brand)){
    salesWithManufacturer();
 $final_total_qty=0;
$final_total_amount=0;

    $sql=mysqli_query($link, "SELECT * from items where brand='$brand'");
        while($row = $sql->fetch_assoc()) {
                $item_name=$row['item_name'];
                $perisable=$row['perisable'];


                $sqlItem=mysqli_query($link, "SELECT sum(qty) as total_qty, sum(total_amount) as total from transaction where item_name='$item_name' and payment_date between '$dateFrom' and '$dateTo'");
                $rowsItem=mysqli_fetch_assoc($sqlItem);

                $total_qty=$rowsItem['total_qty'];
                
                if (empty($total_qty)){
                    $total_qty=0;
                }
                if ($perisable=="YES"){
                    $tota=$total_qty."g";
                }else{
                    $tota=$rowsItem['total_qty'];
                }

    
           

                if ($perisable=="YES"){
                  
                     $final_total_qty+=$rowsItem['total_qty'];
                     $q_final=$final_total_qty."g";
                }else{
                   
                     $final_total_qty+=$rowsItem['total_qty'];
                      $q_final=$final_total_qty;
                }
            

               
                $final_total_amount+=$rowsItem['total'];

                echo '
                <tr>
                    <td>'.$row['barcode'].'</td>
                    <td>'.$row['item_name'].'</td>
                    <td>'.$tota.'</td>
                    <td>'.number_format($rowsItem['total'],2).'</td>
                </tr>
                ';


    }

     echo '
                  <tr>
                                <td></td>
                                <td></td>
                                <td>'.$q_final.'</td>
                                <td>'.number_format($final_total_amount,2).'</td>
                          </tr>';


}


?>

