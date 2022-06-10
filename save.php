<?php

 include 'connection.php';

$data = isset($_REQUEST['myData'])?$_REQUEST['myData']:"";
$qty = isset($_REQUEST['myQty'])?$_REQUEST['myQty']:"";
$salesNo = isset($_REQUEST['salesNo'])?$_REQUEST['salesNo']:"";
$account_no = isset($_REQUEST['account_no'])?$_REQUEST['account_no']:"";
 
if (!empty($qty) && !empty($data)){
 $select= "SELECT * from items where barcode='$data' or lower(item_name) like '%$data%'";

                 $result= $link->query($select);
                      
                if ($result->num_rows >0){
                    while ($row= $result->fetch_assoc()) {

                            $item_name=$row["item_name"];

                            $perisable=$row['perisable'];

                          
        $sqlSelect1=mysqli_query($link, "SELECT * FROM `batch` where item_name='$item_name' ORDER BY `date_created` ASC LIMIT 1");
        
                if ($sqlSelect1->num_rows >0){
                    while ($row1= $sqlSelect1->fetch_assoc()) {
                        $qty_on_shelf=$row1["qty_on_shelf"];
                        $item_name_f=$row1["item_name"];
                        $batch_no=$row1["batch_no"];
                        $barcode=$row1['barcode'];
                        $category=$row1["category"];


                        if ($qty_on_shelf>=$qty){
                        $price = number_format($row1['price'],2);
                        $total= $price*$qty;
                        $totalf=number_format($total, 2);

                          if ($perisable=="YES"){
                                $qty_final=$qty*0.001."K";
                            }
                        if (empty($perisable)){
                               $qty_final=$qty; 
                            }

                            echo "
                         <tr id=".$row['barcode'].">
                         <td>".$row['barcode']."<br>".$row['item_name']."<br>".$row['unit']."</td> 
                         <td>".$qty_final."</td>
                         <td>".$price."</td>
                         <td class='try'>".$totalf."</td>
                         </tr>
                        ";
                        
               
                        
$sqlUpdateInv="UPDATE inventory SET total_supply=total_supply-'$qty',remaining=remaining-'$qty', 
qty_sold=qty_sold+'$qty', qty_on_shelf=qty_on_shelf-'$qty' where item_name='$item_name'";
mysqli_query($link,$sqlUpdateInv);  

$sqlUpdateBatch="UPDATE batch SET qty_sold=qty_sold+'$qty', qty_on_shelf=qty_on_shelf-'$qty',
remaining=remaining-'$qty', remaining_cost=remaining_cost+('$qty'*costPerUnit), qty=qty-'$qty' 
where batch_no='$batch_no'";
mysqli_query($link,$sqlUpdateBatch);

$final_date = date('Y-m-d');
$sql= "INSERT INTO transaction (`sales_order`, `barcode`, `item_name`,`qty`,`price`, `total_amount`, `payment_date`, `batch_no`,`category` ,`account_no`) VALUES ('$salesNo','$barcode', '$item_name', '$qty_final', '$price', '$totalf','$final_date', '$batch_no', '$category', '$account_no')";
 $sql1= $link->query($sql);


    $words = explode( " ", $item_name);
    array_splice($words, -2 );
    $itemName= implode( " ", $words);
    $sql=mysqli_query($link, "SELECT * from items where item_name='$itemName'");
    $row=mysqli_fetch_assoc($sql);

    $length=$row['length'];
    $width=$row['width'];
    $height=$row['height'];

    $fqty=doubleval($qty);

    $sqlq=mysqli_query($link, "SELECT * from batch where item_name='$item_name' and batch_no='$batch_no'");
    $sqlLoc=mysqli_fetch_assoc($sqlq);
    $storage=$sqlLoc['location'];
    $shelves=$sqlLoc['shelves_name'];
    $stackable=$sqlLoc['stackable'];


    if (!empty($length) && !empty($shelves)){
         $capacity_out=$length*$width*$qty/$stackable;
    $sql=mysqli_query($link,"UPDATE shelves set space_utilized=space_utilized-'$capacity_out', total_items=total_items-'$qty' where storage_no='$storage' and shelves_name='$shelves'");

    }
    if (empty($length)){     
       mysqli_query($link,"UPDATE storage set total_items=total_items-'$qty' where storage_no='$storage'"); 
    }




}elseif ($qty_on_shelf<$qty) {
                               
                $sqlSelect2=mysqli_query($link, "SELECT * FROM `batch` where item_name='$item_name' and qty_on_shelf<'$qty' and qty_on_shelf <> 0 ORDER BY `date_created` ASC LIMIT 1");

                          if ($sqlSelect2->num_rows >0){
                            while ($row2= $sqlSelect2->fetch_assoc()) {
                        $batch_no=$row2["batch_no"]; 
                        $item_name=$row2["item_name"];   
                        $barcode2=$row2['barcode'];
                        $category2=$row2["category"];
                        $minus=$qty-$row2['qty_on_shelf'];
                        $minus2=$qty-$minus;
                        $price = number_format($row2['price'],2);
                        $total= $price*$minus2;
                        $totalf=number_format($total, 2);

                        if ($perisable=="YES"){
                            $minus2_final=$minus2."K";
                        }else{
                            $minus2_final=$qty-$minus; 
                        }

                        echo "
                         <tr id=".$row['barcode'].">
                         <td>".$row['barcode']."<br>".$row['item_name']."<br>".$row['unit']."</td>
                         <td>".$minus2_final."</td>
                         <td>".$price."</td>
                         <td class='try'>".$totalf."</td>
                         </tr>
                        ";  


 
$sqlUpdateInv="UPDATE inventory SET total_supply=total_supply-'$minus2',remaining=remaining-'$minus2', 
qty_sold=qty_sold+'$minus2', qty_on_shelf=qty_on_shelf-'$minus2' where item_name='$item_name'";
mysqli_query($link,$sqlUpdateInv); 

$sqlUpdateBatch="UPDATE batch SET qty_sold=qty_sold+'$minus2', qty_on_shelf=qty_on_shelf-'$minus2',
remaining=remaining-'$minus2', remaining_cost=remaining_cost+('$minus2'*costPerUnit), qty=qty-'$minus2' 
where batch_no='$batch_no'";
mysqli_query($link,$sqlUpdateBatch);

$final_date = date('Y-m-d');
$sql= "INSERT INTO transaction (`sales_order`, `barcode`, `item_name`,`qty`,`price`, `total_amount`, `payment_date`, `batch_no`, `category`, `account_no`) VALUES ('$salesNo','$barcode2', '$item_name', '$minus2_final', '$price', '$totalf','$final_date', '$batch_no', '$category2', '$account_no')";
 $sql1= $link->query($sql);


 $words = explode( " ", $item_name);
    array_splice($words, -2 );
    $itemName= implode( " ", $words);
    $sql=mysqli_query($link, "SELECT * from items where item_name='$itemName'");
    $row=mysqli_fetch_assoc($sql);

    $length=$row['length'];
    $width=$row['width'];
    $height=$row['height'];

    

    $sqlq=mysqli_query($link, "SELECT * from batch where item_name='$item_name' and batch_no='$batch_no'");
    $sqlLoc=mysqli_fetch_assoc($sqlq);
    $storage=$sqlLoc['location'];
    $shelves=$sqlLoc['shelves_name'];
    $stackable=$sqlLoc['stackable'];
    if (!empty($length) && !empty($shelves)){
        $capacity_out=$length*$width*$minus2/$stackable;
         $sql=mysqli_query($link,"UPDATE shelves set space_utilized=space_utilized-'$capacity_out', total_items=total_items-'$minus2' where storage_no='$storage' and shelves_name='$shelves'");

    }
     if (empty($length)){
       mysqli_query($link,"UPDATE storage set total_items=total_items-'$minus2' where storage_no='$storage'"); 
    }


                        $var=$minus;
                        $sqlSelect3=mysqli_query($link, "SELECT * FROM `batch` where item_name='$item_name' and qty_on_shelf>'$var' and qty_on_shelf <> 0 ORDER BY `date_created` ASC LIMIT 1");
                                if ($sqlSelect3->num_rows>0){
                                   while ($row3= $sqlSelect3->fetch_assoc()) {
                                    $batch_no3=$row3["batch_no"];
                                    $item_name3=$row3["item_name"];
                                    $barcode3=$row3['barcode'];
                                    $category3=$row3["category"];
                                    $price2 = number_format($row3['price'],2);
                                    $total2= $price2*doubleval($var);
                                    $totalf2=number_format($total2, 2);
                          if ($perisable=="YES"){
                            $var_final=$var."K";
                        }else{
                           $var_final=$var; 
                        }
                        echo "
                        <tr id=".$row['barcode'].">
                         <td>".$row['barcode']."<br>".$row['item_name']."<br>".$row['unit']."</td>
                         <td>".$var_final."</td>
                         <td>".$price2."</td>
                         <td class='try'>".$totalf2."</td>
                         </tr>
                        ";   

$sqlUpdateInv1="UPDATE inventory SET total_supply=total_supply-'$var',remaining=remaining-'$var', 
qty_sold=qty_sold+'$var', qty_on_shelf=qty_on_shelf-'$var' where item_name='$item_name3'";

mysqli_query($link,$sqlUpdateInv1);

$sqlUpdateBatch1="UPDATE batch SET qty_sold=qty_sold+'$var', qty_on_shelf=qty_on_shelf-'$var',
remaining=remaining-'$var', remaining_cost=remaining_cost+('$var'*costPerUnit), qty=qty-'$var' 
where batch_no='$batch_no3'";
  mysqli_query($link,$sqlUpdateBatch1);

$final_date = date('Y-m-d');
$sql2= "INSERT INTO transaction (`sales_order`, `barcode`, `item_name`,`qty`,`price`, `total_amount`, `payment_date`, `batch_no`, `category`, `account_no`) VALUES ('$salesNo','$barcode3', '$item_name', '$var_final', '$price', '$totalf2','$final_date', '$batch_no3', '$category3', '$account_no')";
 $sql1= $link->query($sql2);

    $words = explode( " ", $item_name);
    array_splice($words, -2 );
    $itemName= implode( " ", $words);
    $sql=mysqli_query($link, "SELECT * from items where item_name='$itemName'");
    $row=mysqli_fetch_assoc($sql);

    $length=$row['length'];
    $width=$row['width'];
    $height=$row['height'];

    $fqty=doubleval($var);

    $sqlq=mysqli_query($link, "SELECT * from batch where item_name='$item_name' and batch_no='$batch_no3'");
    $sqlLoc=mysqli_fetch_assoc($sqlq);
    $storage=$sqlLoc['location'];
    $shelves=$sqlLoc['shelves_name'];
    $stackable=$sqlLoc['stackable'];


    if (!empty($length) && !empty($shelves)){
        $capacity_out=$length*$width*$var/$stackable;
  
    $sql=mysqli_query($link,"UPDATE shelves set space_utilized=space_utilized-'$capacity_out', total_items=total_items-'$var' where storage_no='$storage' and shelves_name='$shelves'");

    }
     if (empty($length)){
       mysqli_query($link,"UPDATE storage set total_items=total_items-'$var' where storage_no='$storage'"); 
    }





                    }}
                    }}}




                }

            }


}// while not item selecting in item database


}else{
    $qty = isset($_REQUEST['myQty'])?$_REQUEST['myQty']:"";
  $sqlSelect1=mysqli_query($link, "SELECT * FROM `batch` where barcode='$data'");
            $name=mysqli_fetch_assoc($sqlSelect1);
            $item_name_perishable=$name['item_name'];;
            $words = explode( " ", $item_name_perishable );
            array_splice( $words, -2 );
            $final=implode( " ", $words );

    $sql=mysqli_query($link, "SELECT * from items where item_name='$final'");
    $row11=mysqli_fetch_assoc($sql);
    $perisable=$row11['perisable'];

    if ($perisable=="YES"){
        $qty_final=$qty*0.001."K";
    }else{
        $qty_final=$qty
    }
    if ( $sqlSelect1->num_rows >0){
        while ($row= $sqlSelect1->fetch_assoc()) {

                        $item_name=$row["item_name"];
                        $batch_no=$row["batch_no"];
                        $barcode=$row['barcode'];
                        $category=$row["category"];


                        $price = number_format($row['price'],2);
                        $total= $price*$qty;
                        $total=number_format($total, 2);

                        echo "
                         <tr id=".$row['barcode'].">
                         <td>".$row['barcode']."<br>".$row['item_name']."</td>
                         <td>".$qty_final."</td>
                         <td>".$price."</td>
                         <td class='try'>".$total."</td>
                         </tr>
                        ";  



$sqlUpdateInv="UPDATE inventory SET total_supply=total_supply-'$qty',remaining=remaining-'$qty', 
qty_sold=qty_sold+'$qty', qty_on_shelf=qty_on_shelf-'$qty' where item_name='$item_name'";
mysqli_query($link,$sqlUpdateInv);  

$sqlUpdateBatch="UPDATE batch SET qty_sold=qty_sold+'$qty', qty_on_shelf=qty_on_shelf-'$qty',
remaining=remaining-'$qty', remaining_cost=remaining_cost+('$qty'*costPerUnit), qty=qty-'$qty' 
where batch_no='$batch_no'";
mysqli_query($link,$sqlUpdateBatch);

$final_date = date('Y-m-d');
$sql= "INSERT INTO transaction (`sales_order`, `barcode`, `item_name`,`qty`,`price`, `total_amount`, `payment_date`, `batch_no`,`category` ,`account_no`) VALUES ('$salesNo','$barcode', '$item_name', '$qty_final', '$price', '$totalf','$final_date', '$batch_no', '$category', '$account_no')";
 $sql1= $link->query($sql);       

  $words = explode( " ", $item_name);
    array_splice($words, -2 );
    $itemName= implode( " ", $words);
    $sql=mysqli_query($link, "SELECT * from items where item_name='$itemName'");
    $row=mysqli_fetch_assoc($sql);

    $length=$row['length'];
    $width=$row['width'];
    $height=$row['height'];

    $sqlq=mysqli_query($link, "SELECT * from batch where item_name='$item_name' and batch_no='$batch_no'");
    $sqlLoc=mysqli_fetch_assoc($sqlq);
    $storage=$sqlLoc['location'];
    $shelves=$sqlLoc['shelves_name'];
    $stackable=$sqlLoc['stackable'];


    if (!empty($length) && !empty($shelves)){
        $capacity_out=$length*$width*$qty/$stackable;
    $sql=mysqli_query($link,"UPDATE shelves set space_utilized=space_utilized-'$capacity_out', total_items=total_items-'$qty' where storage_no='$storage' and shelves_name='$shelves'");
    } 
    if (empty($length)){
       mysqli_query($link,"UPDATE storage set total_items=total_items-'$qty' where storage_no='$storage'"); 
    }



  
        }

    }
}

}// if not empty item name or barcode


date_default_timezone_set('Asia/Manila');
$salesNo = isset($_REQUEST['salesNo'])?$_REQUEST['salesNo']:"";
$total_item = isset($_REQUEST['total_item'])?$_REQUEST['total_item']:"";
$tax_added = isset($_REQUEST['tax_added'])?$_REQUEST['tax_added']:"";
$discount_added = isset($_REQUEST['discount_added'])?$_REQUEST['discount_added']:"";
$total = isset($_REQUEST['total'])?$_REQUEST['total']:"";
$paymentType = isset($_REQUEST['paymentType'])?$_REQUEST['paymentType']:"";
$payment = isset($_REQUEST['payment'])?$_REQUEST['payment']:"";
$change = isset($_REQUEST['change'])?$_REQUEST['change']:"";
$date=date("Y-m-d");  
$time=date('H:i');
$account_no1 = isset($_REQUEST['account_no'])?$_REQUEST['account_no']:"";

    if (!empty($total)){

        $sql="INSERT INTO `sales`(`sales_no`, `total_items`, `vat_added`, `discount_added`, `total`, `payment_type`, `payment_amount`, `payment_change`, `time`, `payment_date`,`account_no`) VALUES ('$salesNo', '$total_item', '$tax_added', '$discount_added', '$total', '$paymentType', '$payment', '$change','$time', '$date', '$account_no')";

            $sql= $link->query($sql);

        echo"<script>document.location='pos.php';</script>";

    }



 $barcodeForDel = isset($_REQUEST['barcodeForDel'])?$_REQUEST['barcodeForDel']:"";
  $salesNoDel= isset($_REQUEST['salesNoForDel'])?$_REQUEST['salesNoForDel']:"";
        
if (!empty($salesNoDel)){
    $sql="DELETE from transaction where sales_order='$salesNoDel' and barcode='$barcodeForDel'";
     $sql2= $link->query($sql);
}




function fetchDataforTransaction(){
    include 'connection.php';
    $account_no=isset($_REQUEST['account_no'])?$_REQUEST['account_no']:"";

    $select=mysqli_query($link, "SELECT * from transaction where DATE(payment_date) = DATE(NOW()) and account_no='account_no");

    while ($row=mysqli_fetch_array($select)){
    $output.='
    <tr style="line-height:20px">
    
        <td align="center">'.$row['sales_order'].'</td>
        <td align="center">'.$row["batch_no"].'</td>
        <td align="center">'.$row["item_name"].'</td>
        <td align="center">'.$row["qty"].'</td>
        <td align="center">'.number_format($row["price"],2).'</td>
        <td align="center">'.number_format($row["total_amount"],2).'</td>
    </tr>';
}

return $output;

}




//generating report
$account_no=isset($_REQUEST['account_no'])?$_REQUEST['account_no']:"";
$cashier_name=isset($_REQUEST['cashier_name'])?$_REQUEST['cashier_name']:"";
$time_in_label=isset($_REQUEST['time_in_label'])?$_REQUEST['time_in_label']:"";
if (!empty($time_in_label)){
    echo '<script>
   window.open("get.php?account_no='.$account_no.'&cashier_name='.$cashier_name.'&time_in_label='.$time_in_label.' "); 
 </script>';

}
?>