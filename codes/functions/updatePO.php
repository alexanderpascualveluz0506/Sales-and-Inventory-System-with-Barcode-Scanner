<?php  
function showUpdate(){
    include 'connection.php';

$purchaseOrderNoForUpdateForm=isset($_REQUEST['purchaseOrderNoForUpdateForm'])?$_REQUEST['purchaseOrderNoForUpdateForm']:"";

     $result=mysqli_query($link, "SELECT * from purchaseorder where purchaseOrderNo='$purchaseOrderNoForUpdateForm'");
     if ($result->num_rows >0){
    
            while ($row=mysqli_fetch_array($result)){
                 $output.='
                    <tr>
                    
                        <td style="height:30px;">'.$row['item_name'].'</td>
                        <td align="center">'.$row["qty"].'</td>
                        <td align="center">'.$row["discount"].'</td>
                        <td align="center">'.number_format($row["total_amount"],2).'</td>
                        
                    </tr>';
    }
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
          $result=mysqli_query($link, "SELECT from purchaseorder where purchaseOrderNo='$purchaseOrderNoForUpdateForm'");  
          $rowSelect=mysqli_fetch_assoc($result);
          $SupplierName=$rowSelect['supplierName'];
          $abbreviation = explode(' ', trim($SupplierName ))[0];
          $date_created = $rowSelect["dateCreated"];
          $deliveryDate =$rowSelect["deliveryDate"];
          $comments=$rowSelect["comments"];

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

         $content.='

<div>
<br>
<span style="color:blue">Customer Notes:
'.$comments.'   </span>     
</div>
 ';

        $content.=fetch_data_owner_update();

        $obj_pdf->writeHTML($content);
        $obj_pdf->Output( 'ss.pdf' , 'D'); 



    }

?>