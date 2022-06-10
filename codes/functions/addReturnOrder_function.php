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


  $purchaseDamaged_order_post=$_POST['purchaseDamaged_order_post'];
    $output='';
     $sql= "SELECT * from return_orders where PDI_NO='$purchaseDamaged_order_post'";
     $result= $link->query($sql);

while ($row=mysqli_fetch_array($result)){
    $output.='
    <tr>
    
        <td style="height:30px;"><center>'.$row['item_name'].'</center></td>
        <td align="center">'.number_format($row["costPerUnit"],2).'</td>
        <td align="center">'.$row["qty"].'</td>
        <td align="center">'.number_format($row["total_amount"],2).'</td>
        <td align="center">'.$row["reason"].'</td>
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


        $select= "SELECT * from suppliers where id='$owner'";

     $result= $link->query($select);

    if ($result->num_rows >0){
         while ($row= $result->fetch_assoc()) {
          
          echo"
                                   <br><span>".$row["firstname"]." ".$row['lastname']."</span><br>
                            <span>".$row["company_name"]."</span><br>
                            <span>".$row["address"]."</span><br>
                            <span>".$row["contact_no"]."</span><br>
                            <span>".$row['email']."</span>";
}

       }
            }

 if (isset($_POST['Send-to-draft'])){

     $purchaseDamaged_order_post=$_POST['purchaseDamaged_order_post'];
     $date_created_post=$_POST['date_created_post'];
     $expected_response_post=$_POST['expected_response_post'];
     $owner_post=$_POST['owner_post'];
     $comments=$_POST['comments'];



     $supplier_post=$_POST['supplier_post'];
     $select2= "SELECT * from suppliers where id='$supplier_post'";
     $result2= $link->query($select2);
     $row1=mysqli_fetch_assoc($result2);
     $supplier_name=$row1["firstname"]." ".$row1["lastname"];
       $address=$row1["address"];
      


      foreach ($_POST['item_name'] as $key=>$value) {
         
         $item_name = $_POST['item_name'][$key];
         $costPerUnit = $_POST['costPerUnit'][$key];
         $qty=$_POST['qty'][$key];
         $total=$_POST['total'][$key];
         $reason=$_POST['reason'][$key];
         $batch_no=$_POST['batch'][$key];
         $status="Draft";
   
          $sql=mysqli_query($link, "INSERT INTO `return_orders`(`PDI_NO`, `supplier_name`, `item_name`, `qty`, `total_amount`, `status`, `date_created`, `expected_response`, `reason`, `costPerUnit`, `batch_no`) VALUES('$purchaseDamaged_order_post', '$supplier_name', '$item_name', '$qty', '$total', '$status', '$date_created_post', '$expected_response_post', '$reason', '$costPerUnit','$batch_no')");

          
  }

ob_start();
require_once("tcpdf_min/tcpdf.php");
 $obj_pdf= new TCPDF ('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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


<h3 align="center" style="background-color:black;color:white;line-height:20px">Return Order Form</h3>


      <span><span>
    <span><br><b>&nbsp;&nbsp;Date Ordered:</b>&nbsp;'.$date_created_post.'</span>
    <span><br><b>&nbsp;&nbsp;Expected Response Date:</b>&nbsp;'. $expected_response_post.'</span><br><br>
    <span><b>Shipping Address:</b>'.$address.'</span><br><br>


 '
 ;
$content.=fetch_data_supplier();
$content.=fetch_data_owner();
$content.='  <center><table class="table table-botdered table-hover" border="1" id="table_id">
        
                 <tr>
                    <td style="height:25px;;background-color:black; width:180px;color:white" ><div align="center" style="margin-top:20px;">Item Name</div></td>
                    <td style="height:25px;background-color:black; width:100px;color:white"><div align="center" style="margin-top:20px;">Cost*Unit</div></td>
                    <td style="height:25px;background-color:black;width:100px; color:white"><div align="center" style="margin-top:20px;">Qty</div></td>

                        <td style="height:25px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Total Amount</div></td>

                        <td style="height:25px;background-color:black;width:210px;color:white"><div align="center" style="margin-top:20px;">Reason</div></td>
                            
                </tr>
             ';
 $content .=fetch_data();
 $content .= '</table>';
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
$filename=$purchaseDamaged_order_post.".pdf";



$pdfString = $obj_pdf->Output($filename, 'S');;
$sFilePath = "C://xampp/htdocs/dashboard/files/".$filename;
$obj_pdf->Output($sFilePath , 'F'); // Save to folder

header("Location:/dashboard/return.php");
 }



  if (isset($_POST['Send-to-email'])){
       $purchaseDamaged_order_post=$_POST['purchaseDamaged_order_post'];
     $date_created_post=$_POST['date_created_post'];
     $expected_response_post=$_POST['expected_response_post'];
     $owner_post=$_POST['owner_post'];
     $comments=$_POST['comments'];



     $supplier_post=$_POST['supplier_post'];
     $select2= "SELECT * from suppliers where id='$supplier_post'";
     $result2= $link->query($select2);
     $row1=mysqli_fetch_assoc($result2);
     $supplier_name=$row1["firstname"]." ".$row1["lastname"];
       $address=$row1["address"];
      


      foreach ($_POST['item_name'] as $key=>$value) {
         
         $item_name = $_POST['item_name'][$key];
         $costPerUnit = $_POST['costPerUnit'][$key];
         $qty=$_POST['qty'][$key];
         $total=$_POST['total'][$key];
         $reason=$_POST['reason'][$key];
         $batch_no=$_POST['batch'][$key];
         $status="Waiting for Approval";
   
          $sql=mysqli_query($link, "INSERT INTO `return_orders`(`PDI_NO`, `supplier_name`, `item_name`, `qty`, `total_amount`, `status`, `date_created`, `expected_response`, `reason`, `costPerUnit`, `batch_no`) VALUES('$purchaseDamaged_order_post', '$supplier_name', '$item_name', '$qty', '$total', '$status', '$date_created_post', '$expected_response_post', '$reason', '$costPerUnit', '$batch_no')");

          
  }

ob_start();


 require_once("tcpdf_min/tcpdf.php");
 $obj_pdf= new TCPDF ('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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


<h3 align="center" style="background-color:black;color:white;line-height:20px">Return Order Form</h3>


        <span><span>
    <span><br><b>&nbsp;&nbsp;Date Ordered:</b>&nbsp;'.$date_created_post.'</span>
    <span><br><b>&nbsp;&nbsp;Expected Reponse Date:</b>&nbsp;'. $expected_response_post.'</span><br><br>
    <span><b>Shipping Address:</b>'.$address.'</span><br><br>


 '
 ;
$content.=fetch_data_supplier();
$content.=fetch_data_owner();
$content.='  <center><table class="table table-botdered table-hover" border="1" id="table_id">
        
                <tr>
                    <td style="height:25px;;background-color:black; width:180px;color:white" ><div align="center" style="margin-top:20px;">Item Name</div></td>
                    <td style="height:25px;background-color:black; width:100px;color:white"><div align="center" style="margin-top:20px;">Cost*Unit</div></td>
                    <td style="height:25px;background-color:black;width:100px; color:white"><div align="center" style="margin-top:20px;">Qty</div></td>

                        <td style="height:25px;background-color:black; color:white"><div align="center" style="margin-top:20px;">Total Amount</div></td>

                        <td style="height:25px;background-color:black;width:210px;color:white"><div align="center" style="margin-top:20px;">Reason</div></td>
                            
                </tr>
             ';
 $content .=fetch_data();
 $content .= '</table>';
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
$filename=$purchaseDamaged_order_post.".pdf";




$pdfString = $obj_pdf->Output($filename, 'S');;
$sFilePath = "C://xampp/htdocs/dashboard/files/".$filename;
$obj_pdf->Output($sFilePath , 'F'); // Save to folder


include 'email.php';
header("Location:/dashboard/return.php");
 }
?>