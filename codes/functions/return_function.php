<?php  
include 'connection.php';

$id = isset($_REQUEST['id'])?$_REQUEST['id']:"";
    $sql=mysqli_query($link, "SELECT * from return_orders where PDI_NO='$id'");
            if ($sql->num_rows > 0) {
 
                while($row = $sql->fetch_assoc()) {
                                     
                        echo '
                        <tr>
                            <td>'.$row['batch_no'].'</td>
                            <td>'.$row['item_name'].'</td>
                            <td>'.number_format($row['costPerUnit'],2).'</td>
                            <td>'.$row['qty'].'</td>
                            <td>'.number_format($row['total_amount'],2).'</td>
                            <td>'.$row['reason'].'</td>
                            <td><a href="#" id="edit-item-details"><i class="ti-pencil"  style="margin-left:4px; font-size:19px;" ></i></a> 
                            <a href=""><i class="ti-trash" style="margin-left:12px; font-size:19px;"></i></a> 
                            </td>
                        </tr>

                        ';
                 }
           }


      
$PDI1 = isset($_REQUEST['PDI1'])?$_REQUEST['PDI1']:"";
$batch_no = isset($_REQUEST['id1'])?$_REQUEST['id1']:"";
$item_name = isset($_REQUEST['id2'])?$_REQUEST['id2']:"";
$cost = isset($_REQUEST['id3'])?$_REQUEST['id3']:"";
$qty = isset($_REQUEST['id4'])?$_REQUEST['id4']:"";
$total = isset($_REQUEST['id5'])?$_REQUEST['id5']:"";
$reason = isset($_REQUEST['id6'])?$_REQUEST['id6']:"";

if (!empty($PDI1)){
    $sql=mysqli_query($link, "UPDATE return_orders set costPerUnit='$cost', qty='$qty', total_amount='$total', reason='$reason' where item_name='$item_name' and batch_no='$batch_no' and PDI_NO='$PDI1' ");
  
  $sql1=mysqli_query($link, "SELECT * from return_orders where PDI_NO='$PDI1'");
            if ($sql1->num_rows > 0) {
 
                while($row = $sql1->fetch_assoc()) {
                                     
                        echo '
                        <tr>
                            <td>'.$row['batch_no'].'</td>
                            <td>'.$row['item_name'].'</td>
                            <td>'.number_format($row['costPerUnit'],2).'</td>
                            <td>'.$row['qty'].'</td>
                            <td>'.number_format($row['total_amount'],2).'</td>
                            <td>'.$row['reason'].'</td>
                            <td><a href="#" id="edit-item-details"><i class="ti-pencil"  style="margin-left:4px; font-size:19px;" ></i></a> 
                            <a href=""><i class="ti-trash" style="margin-left:12px; font-size:19px;"></i></a> 
                            </td>
                        </tr>

                        ';
                 }


}



}


$status = isset($_REQUEST['status'])?$_REQUEST['status']:"";
$created = isset($_REQUEST['created'])?$_REQUEST['created']:"";
$response = isset($_REQUEST['response'])?$_REQUEST['response']:""; 
$id1 = isset($_REQUEST['id1'])?$_REQUEST['id1']:""; 
if (!empty($response)){
    $sql=mysqli_query($link,"UPDATE return_orders set status='$status', date_created='$created', expected_response='$response' where PDI_NO='$id1'" );
} 


$idss = isset($_REQUEST['idss'])?$_REQUEST['idss']:"";
   $sql=mysqli_query($link,"SELECT * from sales where sales_no='$id1'");
   $rowR=mysqli_fetch_assoc($sql);
   $discount=$rowR['discount_added'];
   $vat=$rowR['vat_added'];
   $payment_type=$rowR['vat_added'];

if (!empty($idss)){
    $sql=mysqli_query($link, "SELECT * from transaction where sales_order='$idss'");
          if ($sql->num_rows > 0) {
                $total_amount=0;
              
                echo '<table style="font-size:11px; width:160px; font-family:Arial; line-height:9px; border-collapse:collapse;  border-collapse:separate;
                border-spacing:0 7px; margin-top:10px">';
                while($row = $sql->fetch_assoc()) {
                    $item_name = $row['item_name'];

                    $sql1=mysqli_query($link,"SELECT * from items where item_name='$item_name'");
                    $result=mysqli_fetch_assoc($sql1);
                    $qty=$row['qty'];
                   
                    if ($result['perisable']=="YES"){
                            $price=$row['price'];
                        $price=number_format($price*$qty,2);
                        $qty=$qty*0.001."K";
                    
                    }else{
                      $qty=$row['qty']; 
                      $price=$row['price'];
                    }

                    $total_amount+=$row['total_amount'];
                    echo '                      
                            <tr>
                                <td style="width:40px">'.number_format($price,2).'</td>
                                <td style="width:100px;line-height:12px">'.$row['barcode'].'<br>'.$item_name.' x'.$qty.'</td>
                                <td style="width:10px">'.number_format($row['total_amount'],2).'</td>
                            </tr>

                    ';

        }

     
        echo '<tr></tr>
            <tr>
                <td></td>
                <td style="font-size:12px;"><span style="font-weight:bold">TOTAL</span></td>
                <td style="font-size:12px;"><span style="font-weight:bold">'.number_format($total_amount,2).'</span></td>
            </tr>

            <tr>
                <td></td>
                <td style="font-size:11px;"><span>Discount</span></td>
                <td style="font-size:11px;"><span>-'.number_format($discount,2).'</span></td>
            </tr>
            <tr>
                <td></td>
                <td style="font-size:11px;"><span>Vat</span></td>
                <td style="font-size:11px;"><span>+'.number_format($vat,2).'</span></td>
            </tr>


        ';
        echo "</table>";

       
    }
}




?>



