<?php

include 'connection.php';

function fetch_data_supplier(){
include 'connection.php';

	$supplier_post=$_POST['supplier_post'];
    $output='';
    	$sql= "SELECT * from suppliers where id='$supplier_post'";
	$result= $link->query($sql);

while ($row=mysqli_fetch_array($result)){
    $output.='
   	<span><b>Requested To</b></span><br>
    <span>'.$row["firstname"].' '.$row["lastname"].'</span><br>
    <span>'.$row["company_name"].'</span><br>
                            <span>'.$row["address"].'</span><br>
                            <span>'.$row["contact_no"].'</span><br>
                            <span>'.$row["email"].'</span><br><br>
    ';
}
return $output;
}

function fetch_data_owner(){
include 'connection.php';


	$owner_post=$_POST['owner_post'];
    $output='';
    	$sql= "SELECT * from accounts where Account_No='$owner_post'";
	$result= $link->query($sql);

while ($row=mysqli_fetch_array($result)){
    $output.='
   		<span><b>Requested By</b></span><br>
   	<span>Erlindas Grocery Store</span><br>
    <span>'.$row["Firstname"].' '.$row["Lastname"].'</span><br>
    <span>Owner</span><br>
    <span>'.$row["Contact_No"].'</span><br>
    <span>'.$row["Email"].'</span><br><br>';
}
return $output;
}


function fetch_data(){
include 'connection.php';


$purchase_order_post=$_POST['purchase_order_post'];
    $output='';
	$sql= "SELECT * from purchaseorder where purchaseOrderNo='$purchase_order_post'";
	$result= $link->query($sql);

while ($row=mysqli_fetch_array($result)){
    $output.='
    <tr>
    
        <td style="height:30px;">'.$row['item_name'].'</td>
        <td align="center">'.$row["qty"].'</td>
        <td align="center">'.$row["discount"].'</td>
    </tr>';
}

return $output;
}




$data = isset($_REQUEST['myData'])?$_REQUEST['myData']:"";

if (!empty($data)){


	   $select= "SELECT * from suppliers where id='$data'";

     $result= $link->query($select);

    if ($result->num_rows >0){
         while ($row= $result->fetch_assoc()) {
           
         	echo"

							<br><span>".$row["firstname"]." ".$row["lastname"]."</span><br>
                            <span>".$row["company_name"]."</span><br>
                            <span>".$row["address"]."</span><br>
                            <span>".$row["contact_no"]."</span><br>
                            <span>".$row['email']."</span>";
                        
}

       }
            }
 $owner = isset($_REQUEST['ownerselect'])?$_REQUEST['ownerselect']:"";

 if (!empty($owner)){


	   $select= "SELECT * from accounts where Account_No='$owner'";

     $result= $link->query($select);

    if ($result->num_rows >0){
         while ($row= $result->fetch_assoc()) {
          
         	echo"
							<br><span>".$row["Firstname"]." ".$row['Lastname']."</span><br>
                            <span>Owner</span><br>
                            <span>".$row["Address"]."</span><br>
                            <span>".$row["Contact_No"]."</span><br>
                            <span>".$row['Email']."</span>";
}

       }
            }

if (isset($_POST['Send-to-draft'])){
    $purchase_order_post=$_POST['purchase_order_post'];
    $date_created_post=$_POST['date_created_post']; 
    $expected_delivery_post=$_POST['expected_delivery_post'];
    $payment_terms_post=$_POST['payment_terms_post'];
    $overall_disc=$_POST['overall_disc'];
    $comments=$_POST['comments'];
    $owner_post=$_POST['owner_post'];
   
     $select1= "SELECT * from account where Account_No='$owner_post'";

     $result= $link->query($select1);
     $owner_name="";
     $address="";
    if ($result->num_rows >0){
         while ($row= $result->fetch_assoc()) {
          $owner_name=$row["Firstname"]." ".$row["Lastname"];
          $address=$row["address"];
        }
    
       }
       

    $supplier_post=$_POST['supplier_post'];


     $select2= "SELECT * from suppliers where id='$supplier_post'";

     $result2= $link->query($select2);
     $supplier_name="";
     if ($result2->num_rows >0){
         while ($row= $result2->fetch_assoc()) {
          $supplier_name=$row["firstname"]." " .$row["lastname"];
        }
    
       }
       

    foreach ($_POST['item_name'] as $key=>$value) {
         
         $item_name = $_POST['item_name'][$key];
         $qty = $_POST['qty'][$key];
         $discount=$_POST['discount'][$key];

         $sql=mysqli_query($link, "INSERT INTO purchaseorder (`purchaseOrderNo`, `dateCreated`, `supplierName`, `deliveryDate`, `payment_terms`, `requested_by`, `item_name`, `qty`,`discount`,`status`,`payment_status`,`customer_note` ) values 
              ('$purchase_order_post','$date_created_post', '$supplier_name', '$expected_delivery_post', '$payment_terms_post', '$owner_name','$item_name', '$qty', '$discount', 'ORDERED', 'Not Paid', '$comments')");
      
   
  } 

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
$content.=fetch_data_supplier();
$content.=fetch_data_owner();
$content.='  <center><table class="table table-botdered table-hover" border="1" id="table_id">
        
                <tr>
                    <td style="height:25px;width:310px;background-color:black; color:white" ><div align="center" style="margin-top:20px;">Item Name</div></td>
                    <td style="height:25px;width:100px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Quantity</div></td>
                    <td style="height:25px;width:93px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Discount %</div></td>
                            
                </tr>
             ';
 $content .=fetch_data();
 $content .= '</table>';
  $content.='

<div><br><span align="right">Entire Order Discount: '.$overall_disc.'%</span><br><br>
<span align="right">Payment Terms: '.$payment_terms_post.'</span>
</div>';

 $content.='

<div>
<br>
<span style="color:blue">Customer Notes:
'.$comments.'   </span>     
</div>
 ';


$obj_pdf->writeHTML($content);
date_default_timezone_set('Asia/Manila');
$timefiledate=date("h:i");
$filename=$purchase_order_post;



$sFilePath = __DIR__ . '/files/'.$filename.'.pdf' ;
$obj_pdf->Output( $sFilePath , 'F'); // Save to folder


header("Location:purchaseOrder.php");
}




if (isset($_POST['Send-to-email'])){
    $purchase_order_post=$_POST['purchase_order_post'];
    $date_created_post=$_POST['date_created_post']; 
    $expected_delivery_post=$_POST['expected_delivery_post'];
    $payment_terms_post=$_POST['payment_terms_post'];
    $overall_disc=$_POST['overall_disc'];
    $comments=$_POST['comments'];

    $owner_post=$_POST['owner_post'];

     $select1= "SELECT * from suppliers where id='$owner_post'";

     $result= $link->query($select1);
     $owner_name="";
     $address="";
    if ($result->num_rows >0){
         while ($row= $result->fetch_assoc()) {
          $owner_name=$row["firstname"]." ".$row["lastname"];
          $address=$row["address"];
        }
    
       }
       

    $supplier_post=$_POST['supplier_post'];


     $select2= "SELECT * from suppliers where id='$supplier_post'";

     $result2= $link->query($select2);
     $supplier_name="";
     if ($result2->num_rows >0){
         while ($row= $result2->fetch_assoc()) {
          $supplier_name=$row["firstname"]." " .$row["lastname"];
        }
    
       }
       

    foreach ($_POST['item_name'] as $key=>$value) {
         
         $item_name = $_POST['item_name'][$key];
         $qty = $_POST['qty'][$key];
         $discount=$_POST['discount'][$key];

        $sql=mysqli_query($link, "INSERT INTO purchaseorder (`purchaseOrderNo`, `dateCreated`, `supplierName`, `deliveryDate`, `payment_terms`, `requested_by`, `item_name`, `qty`,`discount`,`status`,`payment_status`,`customer_note`) values 
              ('$purchase_order_post','$date_created_post', '$supplier_name', '$expected_delivery_post', '$payment_terms_post', '$owner_name','$item_name', '$qty', '$discount', 'ORDERED', 'Not Paid', '$comments')");
   
  } 

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
$content.=fetch_data_supplier();
$content.=fetch_data_owner();
$content.='  <center><table class="table table-botdered table-hover" border="1" id="table_id">
        
                <tr>
                    <td style="height:25px;width:310px;background-color:black; color:white" ><div align="center" style="margin-top:20px;">Item Name</div></td>
                    <td style="height:25px;width:100px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Quantity</div></td>
                    <td style="height:25px;width:93px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Discount %</div></td>
                            
                </tr>
             ';
 $content .=fetch_data();
 $content .= '</table>';
  $content.='

<div><br><span align="right">Entire Order Discount: '.$overall_disc.'%</span><br><br>
<span align="right">Payment Terms: '.$payment_terms_post.'</span>
</div>';

 $content.='

<div>
<br>
<span style="color:blue">Customer Notes:
'.$comments.'   </span>     
</div>
 ';


$obj_pdf->writeHTML($content);
$timefiledate=date("h:i");



$filename=$purchase_order_post.".pdf";


$location= "files/".$filename."";
 $obj_pdf->Output();
$pdfString = $obj_pdf->Output($filename, 'S');;

$sFilePath = __DIR__ . '/files/'.$filename;
$obj_pdf->Output( $sFilePath , 'F'); // Save to folder

include 'email.php';


header("Location:purchaseOrder.php");
 

}


// this is form the table in thr main table of purhcase order

$purchaseOrder = isset($_REQUEST['purchaseOrder'])?$_REQUEST['purchaseOrder']:"";

if (!empty($purchaseOrder)){
    $select="SELECT * from purchaseorder where purchaseOrderNo='$purchaseOrder'";

    $result= $link->query($select);
    $qty=0;
    while ($row=mysqli_fetch_array($result)){

        echo ' <tr>
              
            <td>'.$row["item_name"].'</td>
            <td>'.$row["qty"].'</td>
            <td>'.$row["total_amount"].'</td>
            </tr>


        ';
        $qty+=$row["qty"];
        $total_amount+=$row["total_amount"];
        $final_amount = round($total_amount, 2);
    }
echo ' $("#item-ordered-table").append("<tr><td style="border-style:none"></td><td>= '.$qty.' pcs</td><td>= Php '.$final_amount.'</td></tr>");  ';
}



$po_name = isset($_REQUEST['po_name'])?$_REQUEST['po_name']:"";
if (!empty($po_name)){
    $select="SELECT * from purchaseorder where purchaseOrderNo='$po_name'";
    $qty_total=0;
    $amount_total=0;
    $result= $link->query($select);
    if ($result->num_rows >0){
    
    while ($row=mysqli_fetch_array($result)){
        $qty_total+=$row["qty"];
        $amount_total+=$row["total_amount"];

        $total=sprintf('%.2f', $amount_total);
        echo '<tr> 
            <td>'.$row["item_name"].'</td>
            <td id="">'.$row["qty"].'</td>
            <td id="total">'.$total.'</td>
            <td><a href="#" class="edit-item-details">Edit</a></td>
            </tr>


        ';
    
    }
    echo "<tr><td style='text-align:right; padding-right:5%'>Total</td><td>".$qty_total."</td><td>".number_format($amount_total,2)."</td><td></td></tr>";
}
}

$purchaseOrderNoForSave= isset($_REQUEST['purchaseOrderNoForSave'])?$_REQUEST['purchaseOrderNoForSave']:"";
$payment_terms= isset($_REQUEST['payment_terms'])?$_REQUEST['payment_terms']:"";
$status= isset($_REQUEST['status'])?$_REQUEST['status']:"";
$dateCreated=isset($_REQUEST['dateCreated'])?$_REQUEST['dateCreated']:"";
$date_expect=isset($_REQUEST['date_expect'])?$_REQUEST['date_expect']:"";
$payment_status=isset($_REQUEST['paymentStatus'])?$_REQUEST['paymentStatus']:"";

if (!empty($purchaseOrderNoForSave)){
  $sql=mysqli_query($link, "UPDATE purchaseorder set dateCreated='$dateCreated',deliveryDate='$date_expect', payment_terms='$payment_terms',payment_status='$payment_status', status='$status' where purchaseOrderNo='$purchaseOrderNoForSave'");
}


 
$id1=isset($_REQUEST['id1'])?$_REQUEST['id1']:"";
$qty=isset($_REQUEST['id2'])?$_REQUEST['id2']:"";
$total=isset($_REQUEST['id3'])?$_REQUEST['id3']:"";
$PO=isset($_REQUEST['PO'])?$_REQUEST['PO']:"";


if (!empty($id1)){
   $sql=mysqli_query($link, "UPDATE purchaseorder set qty='$qty', total_amount='$total' where item_name='$id1' and purchaseOrderNo='$PO'");

    $select="SELECT * from purchaseorder where purchaseOrderNo='$PO'";
     $qty_total=0;
    $amount_total=0;
    $result= $link->query($select);
    if ($result->num_rows >0){
    
    while ($row=mysqli_fetch_array($result)){
         $qty_total+=$row["qty"];
        $amount_total+=$row["total_amount"];
        $total=sprintf('%.2f', $row["total_amount"]);
        echo '<tr> 
            <td>'.$row["item_name"].'</td>
            <td>'.$row["qty"].'</td>
            <td>'.$total.'</td>
            <td><a href="#" class="edit-item-details">Edit</a></td>
            </tr>


        ';
    
    }
 echo "<tr><td style='text-align:right; padding-right:5%'>Total</td><td>".$qty_total."</td><td>".number_format($amount_total,2)."</td><td></td></tr>";
}
}



function showUpdate(){
    include 'connection.php';

$purchaseOrderNoForUpdateForm=isset($_REQUEST['purchaseOrderNoForUpdateForm'])?$_REQUEST['purchaseOrderNoForUpdateForm']:"";

    $output='';
     $result=mysqli_query($link, "SELECT * from purchaseorder where purchaseOrderNo='$purchaseOrderNoForUpdateForm'");
   
    
            while ($row=mysqli_fetch_array($result)){
                 $output.='
                    <tr>
                    
                        <td style="height:30px;">'.$row['item_name'].'</td>
                        <td align="center">'.$row["qty"].'</td>
                        <td align="center">'.$row["discount"].'</td>
                        <td align="center">'.$row["total_amount"].'</td>
                        
                    </tr>';
    }


    return $output;

}


function fetch_data_owner_update(){
include 'connection.php';


  
    $output='';
        $sql= "SELECT * from accounts where Account_No='1'";
    $result= $link->query($sql);

while ($row=mysqli_fetch_array($result)){

    $output.='
        <span><b>Requested By</b></span><br>
    <span>Erlindas Grocery Store</span><br>
    <span>'.$row["Firstname"].' '.$row["Lastname"].'</span><br>
    <span>Owner</span><br>
    <span>'.$row["Contact_No"].'</span><br>
    <span>'.$row["Email"].'</span><br><br>';
}
return $output;

}
include 'connection.php';

$purchaseOrderNoForUpdateForm=isset($_REQUEST['purchaseOrderNoForUpdateForm'])?$_REQUEST['purchaseOrderNoForUpdateForm']:"";

if (!empty($purchaseOrderNoForUpdateForm)){
          $result=mysqli_query($link, "SELECT sum(discount) as total_discount, supplierName,dateCreated,deliveryDate,payment_terms,customer_note from purchaseorder where purchaseOrderNo='$purchaseOrderNoForUpdateForm'");  
          $rowSelect=mysqli_fetch_assoc($result);
          $SupplierName=$rowSelect['supplierName'];
          $overall_disc=$rowSelect['total_discount'];
          $abbreviation = explode(' ', trim($SupplierName ))[0];
          $date_created = $rowSelect["dateCreated"];
          $deliveryDate =$rowSelect["deliveryDate"];
          $payment_terms= $rowSelect["payment_terms"];
          $comments=$rowSelect["customer_note"];

          $sql=mysqli_query($link, "SELECT * from suppliers where firstname='$abbreviation'");
          $rowSupplier=mysqli_fetch_assoc($sql);
          $company=$rowSupplier["company_name"];
          $address=$rowSupplier["address"];
          $contact=$rowSupplier["contact_no"];
          $email=$rowSupplier["email"];

          $selectOwner=mysqli_query($link, "SELECT * from accounts where Role='Admin'");
          $rowAccount=mysqli_fetch_assoc($selectOwner);
          $address1=$rowAccount['Address'];

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
            <span><br><b>&nbsp;&nbsp;Date Ordered:</b>&nbsp;'.$date_created.'</span>
            <span><br><b>&nbsp;&nbsp;Expected Delivery Date:</b>&nbsp;'.$deliveryDate.'</span><br><br>
            <span><b>Shipping Address:</b>'.$address1.'</span><br><br>';

        $content.='
            <span><b>Requested To</b></span><br>
            <span>'. $SupplierName.'</span><br>
            <span>'.$company.'</span><br>
            <span>'.$address.'</span><br>
            <span>'.$contact.'</span><br>
            <span>'.$email.'</span><br><br>
        ';

        $content.=fetch_data_owner_update();

        $content.='  <center><table class="table table-botdered table-hover" border="1" id="table_id">
        
                <tr>
                    <td style="height:25px;width:200px;background-color:black; color:white" ><div align="center" style="margin-top:20px;">Item Name</div></td>
                    <td style="height:25px;width:100px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Quantity</div></td>
                    <td style="height:25px;width:93px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Discount %</div></td>
                     <td style="height:25px;width:120px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Total Amount </div></td>
                            
                </tr>
             ';

              $content .=showUpdate();
 $content .= '</table>';
  $content.='

<div><br><span align="right">Entire Order Discount: '.$overall_disc.'%</span><br><br>
<span align="right">Payment Terms: '.$payment_terms.'</span>
</div>';

    $content.='

<div>
<br>
<span style="color:blue">Customer Notes:
'.$comments.'   </span>     
</div>
 ';

        $filename=$purchaseOrderNoForUpdateForm."-updated".".pdf";
        $obj_pdf->writeHTML($content);
        $sFilePath = __DIR__ . '/files/'.$filename ;
        $obj_pdf->Output( $sFilePath , 'F'); // Save to folder


    }


?>

