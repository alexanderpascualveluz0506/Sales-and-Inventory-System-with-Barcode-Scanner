




  <?php  
    function allSales(){
    	   include 'connection.php';

      $sql=mysqli_query($link, "SELECT * from sales");
  
            if ($sql->num_rows > 0) {
 
                while($row = $sql->fetch_assoc()) {
                                     
                    echo '
                         <tr>
                                <td><a href="" class="view" style="color:#0000cd; font-size:16px" data-toggle="modal" data-target="#view-sales" data-cust='.$row["custNo"].' data-date='.$row["payment_date"].' data-account='.$row['account_no'].' data-time='.$row["time"].' data-order='.$row['sales_no'].' data-total='.$row['total'].' data-payment='.$row['payment_amount'].' data-change='.$row['payment_change'].' data-discount='.$row['discount_added'].'>'.$row['sales_no'].'</a></td>
                                <td>'.$row['payment_date'].' '.$row['time'].'</td>
                                <td>'.$row['total_items'].'</td>
                                <td>'.number_format($row['total'],2).'</td>
                                <td>'.number_format($row['payment_amount'],2).'</td>
                                <td>'.number_format($row['payment_change'],2).'</td>
                                 <td>'.str_replace("-","",$row['discount_added']).'</td>
                          </tr>';
                         
                 }
           }
    }

   function daySales(){
    	   include 'connection.php';
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');

      $sql=mysqli_query($link, "SELECT * from sales where payment_date='$date'");
             
            if ($sql->num_rows > 0) {
 
                while($row = $sql->fetch_assoc()) {
                                     
                    echo '
                         <tr>
                                 <td><a href="" class="view" style="color:#0000cd; font-size:16px" data-toggle="modal" data-target="#view-sales" data-cust='.$row["custNo"].' data-date='.$row["payment_date"].' data-account='.$row['account_no'].' data-time='.$row["time"].' data-order='.$row['sales_no'].' data-total='.$row['total'].' data-payment='.$row['payment_amount'].' data-change='.$row['payment_change'].' data-discount='.$row['discount_added'].'>'.$row['sales_no'].'</a></td>
                                <td>'.$row['payment_date'].' '.$row['time'].'</td>
                                <td>'.$row['total_items'].'</td>
                                <td>'.number_format($row['total'],2).'</td>
                                <td>'.number_format($row['payment_amount'],2).'</td>
                                <td>'.number_format($row['payment_change'],2).'</td>
                                <td>'.str_replace("-","",$row['discount_added']).'</td>
                          </tr>';
                 }
           }
    }

   function weekSales(){
    	   include 'connection.php';
$date=date('Y-m-d');
      $sql=mysqli_query($link, "SELECT * from sales where YEARWEEK(payment_date) = YEARWEEK(NOW())");
            
            if ($sql->num_rows > 0) {
 
                while($row = $sql->fetch_assoc()) {
                                     
                    echo '
                         <tr>
                               <td><a href="" class="view" style="color:#0000cd; font-size:16px" data-toggle="modal" data-target="#view-sales" data-cust='.$row["custNo"].' data-date='.$row["payment_date"].' data-account='.$row['account_no'].' data-time='.$row["time"].' data-order='.$row['sales_no'].' data-total='.$row['total'].' data-payment='.$row['payment_amount'].' data-change='.$row['payment_change'].' data-discount='.$row['discount_added'].'>'.$row['sales_no'].'</a></td>
                                <td>'.$row['payment_date'].' '.$row['time'].'</td>
                                <td>'.$row['total_items'].'</td>
                                <td>'.number_format($row['total'],2).'</td>
                                <td>'.number_format($row['payment_amount'],2).'</td>
                                <td>'.number_format($row['payment_change'],2).'</td>
                                 <td>'.str_replace("-","",$row['discount_added']).'</td>
                          </tr>';
                 }
           }
    }
   function yearSales(){
    	   include 'connection.php';
$date=date('Y-m-d');
      $sql=mysqli_query($link, "SELECT * from sales WHERE YEAR(payment_date) = YEAR( CURDATE() ) ");
           
            if ($sql->num_rows > 0) {
 
                while($row = $sql->fetch_assoc()) {
                                     
                    echo '
                         <tr>
                               <td><a href="" class="view" style="color:#0000cd; font-size:16px" data-toggle="modal" data-target="#view-sales" data-cust='.$row["custNo"].' data-date='.$row["payment_date"].' data-account='.$row['account_no'].' data-time='.$row["time"].' data-order='.$row['sales_no'].' data-total='.$row['total'].' data-payment='.$row['payment_amount'].' data-change='.$row['payment_change'].' data-discount='.$row['discount_added'].'>'.$row['sales_no'].'</a></td>
                                <td>'.$row['payment_date'].' '.$row['time'].'</td>
                                <td>'.$row['total_items'].'</td>
                                <td>'.number_format($row['total'],2).'</td>
                                <td>'.number_format($row['payment_amount'],2).'</td>
                                <td>'.number_format($row['payment_change'],2).'</td>
                                <td>'.str_replace("-","",$row['discount_added']).'</td>
                          </tr>';
                 }
           }
    }

   function monthSales(){
    	   include 'connection.php';
$date=date('Y-m-d');
      $sql=mysqli_query($link, "SELECT * from sales  WHERE YEAR(payment_date) = YEAR(CURDATE()) AND MONTH(payment_date) = MONTH(CURDATE())");
         
            if ($sql->num_rows > 0) {
 
                while($row = $sql->fetch_assoc()) {
                                     
                    echo '
                         <tr>
                                <td><a href="" class="view" style="color:#0000cd; font-size:16px" data-toggle="modal" data-target="#view-sales" data-cust='.$row["custNo"].' data-date='.$row["payment_date"].' data-account='.$row['account_no'].' data-time='.$row["time"].' data-order='.$row['sales_no'].' data-total='.number_format($row['total'],2).' data-payment='.number_format($row['payment_amount'],2).' data-change='.number_format($row['payment_change'],2).' data-discount='.number_format($row['discount_added'],2).'>'.$row['sales_no'].'</a></td>
                                <td>'.$row['payment_date'].' '.$row['time'].'</td>
                                <td>'.$row['total_items'].'</td>
                                <td>'.number_format($row['total'],2).'</td>
                                <td>'.number_format($row['payment_amount'],2).'</td>
                                <td>'.number_format($row['payment_change'],2).'</td>
                                <td>'.str_replace("-","",$row['discount_added']).'</td>
                          </tr>';
                 }
           }
    }












     function allSalesLabel1(){
           include 'connection.php';

      $sql=mysqli_query($link, "SELECT * from sales");
       $rowcount=mysqli_num_rows($sql);
          
    }

   function daySalesLabel1(){
           include 'connection.php';
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');

      $sql=mysqli_query($link, "SELECT * from sales where payment_date='$date'");
             $rowcount=mysqli_num_rows($sql);
         
    }

   function weekSalesLabel1(){
           include 'connection.php';
$date=date('Y-m-d');
      $sql=mysqli_query($link, "SELECT * from sales where YEARWEEK(payment_date) = YEARWEEK(NOW())");
             $rowcount=mysqli_num_rows($sql);
           
    }
   function yearSalesLabel1(){
           include 'connection.php';
$date=date('Y-m-d');
      $sql=mysqli_query($link, "SELECT * from sales WHERE YEAR(payment_date) = YEAR( CURDATE() ) ");
             $rowcount=mysqli_num_rows($sql);
           
    }

   function monthSalesLabel1(){
           include 'connection.php';
$date=date('Y-m-d');
      $sql=mysqli_query($link, "SELECT * from sales  WHERE YEAR(payment_date) = YEAR(CURDATE()) AND MONTH(payment_date) = MONTH(CURDATE())");
             $rowcount=mysqli_num_rows($sql);
            
    }

$customerno = isset($_REQUEST['customerno'])?$_REQUEST['customerno']:"";
$date= isset($_REQUEST['date'])?$_REQUEST['date']:"";
$account_no = isset($_REQUEST['account_no'])?$_REQUEST['account_no']:"";
$time = isset($_REQUEST['time'])?$_REQUEST['time']:"";
$customerno = isset($_REQUEST['customerno'])?$_REQUEST['customerno']:"";
$order= isset($_REQUEST['order'])?$_REQUEST['order']:"";

include 'connection.php';
if (!empty($order)){
    $sql=mysqli_query($link, "SELECT * from transaction where sales_order='$order'");
    $total=0;

    $sql3=mysqli_query($link, "SELECT * from accounts where Account_No='$account_no'");
    $row3=mysqli_fetch_assoc($sql3);
    $cashier_name=$row3['Firstname']." ".$row3['Lastname'];
      if ($sql->num_rows > 0) {
         

                while($row = $sql->fetch_assoc()) {
                $item=$row['item_name'];   
                $sql2=mysqli_query($link, "SELECT * from items where item_name='$item'");
                $rows=mysqli_fetch_assoc($sql2);
                $perisable=$rows['perisable'];
              $total=+$row["total_amount"];
                if($perisable=="YES"){
                    $qty=$row['qty']."g";
                }else{
                    $qty=$row['qty'];
                }    

                    echo '
                    <tr>
                        <td>'.$row['batch_no'].'</td>
                         <td>'.$row['item_name'].'</td>
                          <td>'.sprintf('%.2f',$row['price']).'</td>      
                           <td>'.$qty.'</td>


                        <td>'.sprintf('%.2f',$row['total_amount']).'</td>

                           <td style="display:none"><input type="text" id="accno" value="'.$cashier_name.'"></td>
                        </tr>
                    ' ;                              

            }

            
        

    }
}

?> 