

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
       <link href="codes/design/return_style.css" rel="stylesheet">
</head>

<body>
    <input type='text' id='salesNoInput' value='202112307' style='text-align:center' readonly>
<div id='DivIdToPrint' style="display:none;">
  <center><label style="font-size:12px; font-family:Arial">Erlinda's Grocery Store</label></center>
  <center><span style="font-size:10px; font-family:Arial">1046 Bayan Luma 8</span></center>
   <center><span style="font-size:10px; font-family:Arial">Imus, City Cavite</span></center>
   <center><span style="font-size: 10px; font-family:Arial">Date Issued: <?php $date=date("m/d/Y");
echo $date; ?></span></center>


 <center><span style="font-size: 10px; font-family:Arial;">Valid Until: <?php $date=date("m/d/Y" , strtotime($date. ' + 2 days')); ;
echo $date; ?></span></center>

<center><span style="font-size: 10px; font-family:Arial;">Order No:</span><span id="order-no" style="font-size:10px; font-family:Arial;"></span></center>

<span style="margin-bottom:20px;"></span>
</div>

<input type='button' id='btn' value='Print'>
  

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

	function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
$(document).on('click','#btn',function(e){
var idss=$("#salesNoInput").val();

$("#order-no").text(idss);
$.ajax({
  url: "codes/functions/return_function.php",
  type: "POST",
  data:{"idss":idss
      
},
success: function(data){  
            $("#DivIdToPrint").append(data); 
            printDiv();          
        }
    });
});




</script>



