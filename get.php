<?php  
date_default_timezone_set('Asia/Manila');
function fetchDataforTransaction(){
     global $total_amount_table, $total_items_table;

date_default_timezone_set('Asia/Manila');
$final_date = date('Y-m-d');

	include 'connection.php';
	$select=mysqli_query($link, "SELECT * from transaction where payment_date='$final_date' and account_no=2");
   $total_amount_table=0;
   $total_items_table=0;
	while ($row=mysqli_fetch_array($select)){
    $total_amount_table+=$row["total_amount"];
    $total_items_table+=$row["qty"];
    $output.='
    <tr>
    
        <td align="center">'.$row['sales_order'].'</td>
        <td align="center">'.$row["batch_no"].'</td>
        <td align="center">'.$row["item_name"].'</td>
        <td align="center">'.$row["qty"].'</td>
        <td align="center">'.number_format($row["price"],2).'</td>
        <td align="center">'.number_format($row["total_amount"],2).'</td>
    </tr>';
}
  $output.='
    <tr style="line-height:20px; font-size:17px; border-style:none">
    
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center">'.$total_items_table.'</td>
        <td align="center"></td>
        <td align="center">'.number_format($total_amount_table,2).'</td>
    </tr>';
return $output;
}


function fetchDataforSaleSummary(){
    date_default_timezone_set('Asia/Manila');
$final_date = date('Y-m-d');
    include 'connection.php';
 $result=mysqli_query($link, "SELECT * from sales where payment_date='$final_date' and account_no=2");
       
     
            $total_amount=0;
            $vat=0;
            $discount=0;
            $payment_amount=0;
            $payment_change=0;
            $total_items=0;
            while ($row=mysqli_fetch_array($result)) {
                $total_amount+=$row['payment_amount'];
                $vat+=$row['vat_added'];
                $discount+=$row['discount_added'];
                $payment_amount+=$row['payment_amount'];
                $payment_change+=$row['payment_change'];
                $total_items+=$row['total_items'];
                    $output1.= '
                        <tr>
                            <td align="center">'.$row['sales_no'].'</td>
                            <td align="center">'.$row['total_items'].'</td>
                            <td align="center">'.number_format($row['vat_added'],2).'</td>
                            <td align="center">'.number_format($row['discount_added'],2).'</td>
                            <td align="center">'.number_format($row['total'],2).'</td>
                            <td align="center">'.$row['payment_type'].'</td>
                            <td align="center">'.number_format($row['payment_amount'],2).'</td>
                            <td align="center">'.number_format($row['payment_change'],2).'</td>
                        </tr>
                    ';
                   
                }

     $output1.='
    <tr style="line-height:20px; font-size:17px; border-style:none">
    
        <td align="center"></td>
        <td align="center">'.$total_items.'</td>
        <td align="center">'.number_format($vat,2).'</td>
        <td align="center">'.number_format($discount_added,2).'</td>
        <td align="center">'.number_format($total_amount,2).'</td>
        <td align="center"></td>
        <td align="center">'.number_format($payment_amount,2).'</td>
        <td align="center">'.number_format($payment_change,2).'</td>
    </tr>';
return $output1;
                
}


$time_in_label=$_GET['time_in_label'];
$cashier_name=$_GET['cashier_name'];
$account_no=$_GET['account_no'];

$timestamp=date('Y-m-d H:i:s');

include 'connection.php';

$sql=mysqli_query($link, "INSERT into logs (`account_no`, `log_activity`, `date_time`) VALUES ('$account_no','Logout','$timestamp')");

ob_start();
require_once("tcpdf_min/tcpdf.php");



 $obj_pdf1= new TCPDF (PDF_PAGE_ORIENTATION, PDF_UNIT, array(400, 300), true, 'UTF-8', false);
 $obj_pdf1->SetCreator(PDF_CREATOR);
 $obj_pdf1->SetTiTle("");
 $obj_pdf1->SetHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
 $obj_pdf1->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '',PDF_FONT_SIZE_MAIN));
 $obj_pdf1->SetFooterFont(Array(PDF_FONT_NAME_DATA, '',PDF_FONT_SIZE_DATA));
 $obj_pdf1->SetDefaultMonospacedFont('helvetica');

 $obj_pdf1->SetFooterMargin(PDF_MARGIN_FOOTER);
 $obj_pdf1->SetMargins(PDF_MARGIN_LEFT, '1', PDF_MARGIN_RIGHT);
 $obj_pdf1->SetPrintHeader(false);
 $obj_pdf1->SetPrintFooter(false);
 $obj_pdf1->SetAutoPageBreak(TRUE, 10);
 $obj_pdf1->SetFont('helvetica', '', '12');
 $obj_pdf1->AddPage();

     date_default_timezone_set('Asia/Manila');
     $time=date('g:i A');
$a=date("l, F d, Y");
 $content="";

 $content.="<br>";
 $content.='


<h3 align="center" style="font-weight:normal">Sales Summary History Report of '.$cashier_name.'
    <div>
            <center><span style="font-size:12px">'.$a.'</span>
            </center>
    </div>

</h3>';


$content.='  <table class="table table-botdered table-hover" border="1" id="table_id" style="margin-left:-10px">
        
                <tr style="border-style:none; background-color:black;line-height:25px; color:white">
                <thead>
                 <th style="border-style:none;text-align:center">Sales No</th>
                <th style="border-style:none;text-align:center">Total Items</th>
                <th style="border-style:none;text-align:center">Vat Added</th>
                <th style="border-style:none;text-align:center">Discount Added</th>
                <th style="border-style:none;text-align:center">Total</th>
                <th style="border-style:none;text-align:center">Payment Type</th>
                <th style="border-style:none;text-align:center">Payment Amount</th>
                <th style="border-style:none;text-align:center">Change</th>
                 </thead>                
                </tr>
             ';
 $content .= '<tbody>';
  $content .=fetchDataforSaleSummary();
  
  $content .= '</tbody>';
 $content .= '</table>';

 $content.="<br>";
 $content1.='

<br>
<h3 align="center" style="font-weight:normal">Item Transaction History Report of '.$cashier_name.'
    <div>
            <center><span style="font-size:12px">'.$a.'</span>
            </center>
    </div>

</h3>';


$content1.='  <table class="table table-botdered table-hover" border="1" id="table_id" style="margin-left:-10px">
        
                <tr style="border-style:none; background-color:black;line-height:25px; color:white">
                <thead>
                 <th style="border-style:none;text-align:center">Sales No</th>
                <th style="border-style:none;text-align:center;width:100px">Batch No</th>
                <th style="border-style:none;text-align:center;width:190px">Item Name</th>
                <th style="border-style:none;text-align:center;width:80px">Qty</th>
                <th style="border-style:none;text-align:center">Price</th>
                <th style="border-style:none;text-align:center">Total</th>

                 </thead>                
                </tr>
             ';
 $content1 .= '<tbody>';
  $content1 .=fetchDataforTransaction();
  
  $content1 .= '</tbody>';
 $content1 .= '</table>';


$obj_pdf1->writeHTML($content);
 $obj_pdf1->AddPage();
$obj_pdf1->writeHTML($content1);
date_default_timezone_set('Asia/Manila');
$timefiledate1=date("h:i");
$filename1="Sales_Summary-".$timefiledate1.".pdf";

  ob_end_clean();

$output1=$obj_pdf1->Output($filename1, 'D');



?>
