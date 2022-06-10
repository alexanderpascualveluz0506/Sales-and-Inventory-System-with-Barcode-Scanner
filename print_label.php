


<?php 
session_start();
$item_name=$_GET['name'];


$price=$_GET['price'];
$image=$_GET['image'];



/**
 *   ob_start();
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
	<span><br><b>&nbsp;Date Ordered:</b>&nbsp;'.$date_created_post.'</span><br>
	<span ><b>&nbsp;Expected Delivery Date:</b> '.$expected_delivery_post.'</span><br><br>
		<span><b>&nbsp;Shipping Address:</b>' .$address.'</span><br><br>


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
'.$comments.'	</span> 	
</div>
 ';


$obj_pdf->writeHTML($content);
date_default_timezone_set('Asia/Manila');
$timefiledate=date("h:i");
$filename="PurchaseOrder.pdf";

    ob_end_clean();
$obj_pdf->Output(__DIR__ . '\hellopdf\ '.$filename.'', 'F');




}
 **/

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"></link>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<body>
	<br>
	<div class="form-group row" style="margin-left: 28%;width:50%">
    		<label for="inputPassword" class="col-sm-2 col-form-label" >Item Name</label>
		    <div class="col-sm-10">
		      	<input type="text" class="form-control" id="item-name" value="<?php echo $item_name?>">
		    </div>
  	</div>

	<div class="form-group row" style="margin-left: 31%;width:50%">
    		<label for="inputPassword" class="col-sm-2 col-form-label" >Price</label>
		    <div class="col-sm-10">
		      	<input type="text" class="form-control" style="margin-left:-7.3%" id="item-price" value="<?php echo $price;?>">
		    </div>
 	</div>


	<div class="form-group row" style="margin-left: 21.9%;width:100%">
    		<label for="inputPassword" class="col-sm-2 col-form-label">No of Barcode to Print</label>
		    <div class="col-sm-10">
		      	<input type="text" class="form-control" id="number" style="width:48.5%; margin-left:-2.7%">
		    </div>
 	</div>

	<div class="form-group row" style="margin-left: 30.9%;width:50%">
    		  <label>Show Text:</label>
		<div class="col-sm-10">
		      	 <select name="showText" id="showText" class="form-control" required>
                            <option value="false">No</option>  
                            <option value="true">Yes</option>                                      
                 </select>
		</div>
 	</div>

	<div id="result" style="width:22%;  line-height: 0.8; margin-left: 43%;margin-top: 3%; ">
 		<center><label style="font-size:14px; display:none;" id="store" >Erlinda's Grocery Store</label></center>
 		<center><img src="<?php echo $image;?>" style='margin-top: -7px;' width="230px" height="100px"></center>

 
 	</div>

 	
 	<button type="button" class="btn btn-success" style="margin-left:42%; margin-top:2%" id="print" onclick="createPDF()">Print Barcode Label</button>

  <button type="button" class="btn btn-success" style="margin-top:2%"><a id="btn-Convert-Html2Image" href="#" style="color:white">Download Barcode Label</a></button>

 	<div id="result-final"></div>

 <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

  
</body>
</html>


<script>
	 $("#showText").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
            if (selectedValue=="true"){
            	var itemname=$("#item-name").val();
            	var price=$("#item-price").val();
            	$("#store").show();
            	$("#result").append('<center><label style="font-size:14px">'+itemname+'</label><center');
            	$("#result").append('<center><label style="font-size:14px">Php '+price+'</label><center>');
            }
        });

  
        $("#btn-Convert-Html2Image").click(function() {  
            var element = $("#result"); // global variable
            var itemname=$("#item-name").val()
            var getCanvas; //global variable
            html2canvas(element, {
                onrendered: function (canvas) {
                    getCanvas = canvas;
                }
            });
 
             $("#btn-Convert-Html2Image").on('click', function () {
                var imgageData = getCanvas.toDataURL("image/png");

 

                //Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", ""+itemname+".png").attr("href", newData);
            });
        });

</script>

<script>
    function createPDF() {
    	var number=document.getElementById('number').value;
        var sTable = document.getElementById('result').innerHTML;
    


        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.

        win.document.write('</head>');
        win.document.write('<body>');
        
        for (var i=1; i<=number; i++ ){
        win.document.write(sTable);   
         win.document.write('<br>');       // THE TABLE CONTENTS INSIDE THE BODY TAG.
    	}

        win.document.write('</body></html>');

        win.document.close();   // CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>