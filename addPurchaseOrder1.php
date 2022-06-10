<?php

include 'connection.php';
 session_start();
 date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Erlinda's Grocery</title>
    
    
    <!-- Styles -->
 <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
       <link href="codes/design/addPurchaseOrder_style.css" rel="stylesheet">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
</head>
<body>

<?php  


$itemname = isset($_REQUEST['item_name'])?$_REQUEST['item_name']:"";
$qty = isset($_REQUEST['qty'])?$_REQUEST['qty']:"";

$selectSupplier= mysqli_query($link, "SELECT * from items where item_name='$itemname'");
$rows=mysqli_fetch_assoc($selectSupplier);
$supplierName=$rows['supplier'];

$arr = explode(' ',trim($supplierName));
$firstname=$arr[0]; // will print Test


$selectSupplier2=mysqli_query($link, "SELECT * from suppliers where firstname='$firstname'");
$supDetails=mysqli_fetch_assoc($selectSupplier2);
$address=$supDetails['address'];
$contact=$supDetails['contact_no'];
$comapany_name=$supDetails['company_name'];
$email="hagonoyj@gmail.com";


$selectSupplier3=mysqli_query($link, "SELECT * from accounts where Role='Admin'");
$row1=mysqli_fetch_assoc($selectSupplier3);
$owner_name=$row1['Firstname']." " .$row1['Lastname'];
$owner_contact=$row1['Contact_No'];
$owner_email=$row1['Email'];

$date_created_post=date("Y-m-d");
if (isset($_POST['order_btn'])){
$payment_terms_post=$_POST['payment_terms_post'];
$comments=$_POST['comments'];
$expected_delivery_post=$_POST['expected_delivery_post'];
$PO_post=$_POST['PO_post'];
$discount=$_POST['discount_post'];



$sql=mysqli_query($link, "INSERT INTO purchaseorder (`purchaseOrderNo`, `dateCreated`, `supplierName`, `deliveryDate`, `payment_terms`, `requested_by`, `item_name`, `qty`,`discount`,`status`,`payment_status`,`customer_note`) values 
              ('$PO_post','$date_created_post', '$supplierName', '$expected_delivery_post', '$payment_terms_post', '$owner_name',
                '$itemname', '$qty', '$discount', 'ORDERED', 'Not Paid', '$comments')");

$sql=mysqli_query($link,"UPDATE inventory set status='' where item_name='$itemname'");

ob_start();
 require_once("tcpdf_min/tcpdf.php");
 $obj_pdf= new TCPDF ('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 $obj_pdf->SetCreator(PDF_CREATOR);
 $obj_pdf->SetTiTle("AUDIT LOG/EVENTS OF USERS");
 $obj_pdf->SetHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
 $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '',PDF_FONT_SIZE_MAIN));
 $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA, '',PDF_FONT_SIZE_DATA));
 $obj_pdf->SetDefaultMonospacedFont('helvetica');

 $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
 $obj_pdf->SetPrintHeader(false);
 $obj_pdf->SetPrintFooter(false);
 $obj_pdf->SetAutoPageBreak(TRUE, 10);
 $obj_pdf->SetFont('helvetica', '', '12');
 $obj_pdf->AddPage();


 $content="";

 $content.="";
 $content.='


<h3 align="center" style="background-color:black;color:white;line-height:20px">Purchase Order Form</h3>


        <span><span>
    <span><br><b>&nbsp;&nbsp;Date Ordered:</b>&nbsp;'.$date_created_post.'</span>
    <span><br><b>&nbsp;&nbsp;Expected Delivery Date:</b>&nbsp;'.$expected_delivery_post.'</span><br><br>
    <span><b>Shipping Address:</b>'.$address.'</span><br><br>



 ';
$content.='     <span><b>Requested To</b></span><br>
                <span>'.$supplierName.'</span><br>
                <span>'.$comapany_name.'</span><br>
                <span>'.$address.'</span><br>
                <span>'.$contact.'</span><br>
                <span>'.$email.'</span><br><br>
    
';
$content.='
                <span><b>Requested By</b></span><br>
                <span>Erlindas Grocery Store</span><br>
                <span>'.$owner_name.'</span><br>
                <span>Owner</span><br>
                <span>'.$owner_contact.'</span><br>
                <span>'.$owner_email.'</span><br><br>
';

$content.='  <center><table border="1" id="table_id">
        
                <tr>
                    <td style="height:25px;width:310px;background-color:black; color:white" ><div align="center" style="margin-top:20px;">Item Name</div></td>
                    <td style="height:25px;width:100px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Quantity</div></td>
                    <td style="height:25px;width:93px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Discount %</div></td>
                            
                </tr>
             ';

$content.='  
                <tr>
                    <td style="height:30px;">'.$itemname.'</td>
                    <td align="center">'.$qty.'</td>
                    <td align="center">'.$discount.'</td>
                </tr>
                </table>
             ';

              $content.='<span></span>';
  $content.='
<div style="margin-top:20px">
<span align="right" >Payment Terms: '.$payment_terms_post.'</span>
</div>';

 $content.='<span></span>';

 $content.='
<div style="margin-top:20px">
<span style="color:blue">Customer Notes:
'.$comments.'   </span>     
</div>
 ';


$obj_pdf->writeHTML($content);
$timefiledate=date("h:i");



$filename=$PO_post.".pdf";


$location= "files/".$filename."";
 $obj_pdf->Output();
$pdfString = $obj_pdf->Output($filename, 'S');;

$sFilePath = __DIR__ . '/files/'.$filename;
$obj_pdf->Output( $sFilePath , 'F'); // Save to folder

include 'email.php';


header("Location:purchaseOrder.php");
}
?>

<form action="" method="POST">
<section id="main-content">


        <div style="border-style: solid;width: 60%;height:630px;margin-left: 280px;margin-top: 10px;background-color: white;">
            <div style="background-color:black;color:white;">
               
                <center><label style="padding-top:4px;padding-bottom: 3px;font-size: 18px;">Purchase Order Form</label></center>
            </div>


            

              <div class="row g-3" id="row2" style="margin-top:10px; margin-left:50px;width:120%">
                           <label style="font-weight:bold;font-size:18px;">PO NO:</label>
                                 <div class="col-sm" style="margin-left:-10px">
                                       
                                         <?php 
                                        $sql=mysqli_query($link,"SELECT count(*) as total from purchaseorder");
                                       $count = mysqli_fetch_assoc($sql);
                                       $P=$count['total']+2;
                                       $PO='P10'.$P;
                                        echo '<label style="font-weight:bold;font-size:18px;margin-top:8px;margin-left:-10px">'.$PO.'</label>';
                                        echo '<input type="hidden" name="PO_post" value='.$PO.'>';

                                    ?>
                                </div>

                                <label style="font-weight:bold;font-size:17px;">Date Requested:</label>
                                 <div class="col-sm">
                                       
                                       <label style="font-size:17px;margin-top: 8px;margin-left: -13px;"><?php 
                                       echo date("m-d-Y");
                                        ?></label>
                                </div>
                        </div>

                
                  


                        <div class="row g-3" id="row2" style="margin-left:33px;margin-top: 10px;width: 100%;">
                           <div class="col-sm" style="">
                                        <label><b>Requested To</b></label><br>
                                        <label><?php echo $supplierName;?></label>
                                        <span style=" display: block;margin-bottom: -0.9em;"></span>
                                        <label><?php echo $comapany_name;?></label>
                                          <span style=" display: block;margin-bottom: -0.9em;"></span>
                                        <label><?php echo $address;?></label>
                                          <span style=" display: block;margin-bottom: -0.9em;"></span>
                                        <label><?php echo $contact;?></label>
                                          <span style=" display: block;margin-bottom: -0.9em;"></span>
                                        <label><?php echo $email;?></label>
                                </div>
                               <div class="col-sm" style="margin-left:90px">
                                        <label><b>Requested By</b></label><br>
                                        <label>Erlinda's Grocery</label>
                                          <span style=" display: block;margin-bottom: -0.9em;"></span>
                                        <label><?php echo $owner_name;?></label>
                                          <span style=" display: block;margin-bottom: -0.9em;"></span>
                                        <label>Owner</label>
                                          <span style=" display: block;margin-bottom: -0.9em;"></span>
                                        <label><?php echo $owner_contact;?></label>
                                          <span style=" display: block;margin-bottom: -0.9em;"></span>
                                        <label><?php echo $owner_email;?></label>
                                      
                                </div>


                                 
                        </div>


     
                   
                  <div class="row g-3" id="row2" style="margin-top:1px; margin-left:50px">
                           <label style="font-weight:bold;font-size:16px;">Shipping Address:</label>
                                 <div class="col-sm" style="margin-left:-10px">
                                    <label style="font-size:16px;">1046 Bayan Luma 8 Imus, City Cavite</label>
                                </div>

                                
                        </div> 

          

                          <div class="bootstrap-data-table-panel" style="width:91%; margin-left:30px;margin-top:10px">
  
                    <table  class="table table-striped table-bordered" style="margin-top:0%" >
                        <thead>
                            <tr>
                                <th style="width: 400px; background-color: #cdcdcd;">Item Name</th>
                                <th  style="width: 100px; background-color:#cdcdcd">Qty</th>
                                <th style="width: 150px; background-color:#cdcdcd">Discount</th>
                              
                            </tr>
                        </thead>
                            <tbody id="result">

                                <tr>
                                    <td><?php echo $itemname;  ?></td>
                                    <td><?php echo $qty;?></td>
                                    <td><input type="text" class="form-control" name="discount_post"></td>
                                </tr>
                                              
                            </tbody>
</table>

</div><!-- /# bootstrap-data-table-panel --> 

       <div class="row g-3" id="row2" style="margin-left:20px;width: 100%;">
                     
                           <label style="font-size: 15px;">Expected Delivery Date</label>
                                 <div class="col-sm">
                                        <input type="date"  name="expected_delivery_post" id="item-name-input">
                                </div>

                            <label style="margin-left:-50px;">Customer Notes</label>
                                <div class="col-sm">
                                        <textarea style="height: 60px;width:200px" name="comments"></textarea>
                                </div>



                             
                        </div>



   <div class="row g-3" id="row2" style="margin-left:20px;margin-top: -10px;">
                   <label style="margin-left:40px">Payment Terms</label>
                                  <div class="col-sm">
                            
                                   <select style="height:35px;width:35%" 
                                   name="payment_terms_post">
                                        <option selected>Choose...</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Online Payment">Online Payment</label>
                                    </select>
                               
                    </div>
                             
                        </div>

<button type="submit" name="order_btn" class="btn btn-primary" style="margin-left: 510px;margin-top: -10px;width: 240px;">CONFIRM PURCHASE ORDER</button>
</div>
</div>
</div>
               






</section>
</form>

    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"></link>

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' 
    crossorigin='anonymous'></script>
</body>

</html>
<script type="text/javascript">
</script>