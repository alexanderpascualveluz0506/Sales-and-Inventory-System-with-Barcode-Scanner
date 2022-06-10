<?php 
 session_start();

$date=date("l j F Y");
$current=$date;
date_default_timezone_set('Asia/Manila');
$time=date("g:i A");
?>
<?php  
include 'connection.php';
include 'codes/functions/cashier_transaction.php';
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
  
     <link href="codes/design/transaction_style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
     <script src="codes/javascript/clock.js"></script>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<style>

</style>
</head>

<body style="background-color:white">
<form action="" method="POST" style="background-color:white">
<?php  
 $id= isset($_REQUEST['id'])?$_REQUEST['id']:"";

 echo '<input type="hidden" id="type" value='.$id.'>';

?>

<center><img src="assets/images/remove8.png" style="width:80px; margin-top: 10px;"></center>
<center><span style="font-family: arial;font-weight: bold;font-size: 20px;">Erlinda's Grocery</span></center>
<center><span style="font-family: arial;font-weight: bold;font-size: 16px;margin-top: -30px;">Daily Transaction Monitoring</span></center>
<center><label style="font-family: arial;font-weight: bold;font-size: 16px;margin-top: -30px;"><?php echo date("Y-m-d");?></label></center>


<div class="row" style="width:100%; margin-left: 6%;margin-top: 30px;">
    <div class="col-sm">
        <label style="margin-top:8px">Search:</label>
    </div>
    <div class="col-sm" >
        <input type="text" id="search-bar" class="form-control" onkeyup="myFunction()" style="margin-left:-260px" >
    </div>
    <div class="col-sm">
        <label style="margin-top:8px; margin-left:-210px">Sort By:</label>
    </div>
    <div class="col-sm">
        <div class="dropdown">
              <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:80%; margin-left: -470px;">
                Item Details
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item"  href="cashierTransaction.php" >Item Details</a></li>
                <li><a class="dropdown-item" href="cashierTransaction.php?id=customer">Customer Sales Transaction</a></li>
                <li><a class="dropdown-item" href="cashierTransaction.php?id=transaction">Per Item Transaction</a></li>
              </ul>
</div>
    </div>
</div>
 

  <center> <div class="bootstrap-data-table-panel" style="margin-top: 20px;" >
                    <div class="table-responsive" id="tableID">
                    <table  class="table table-striped table-bordered" style="font-size:15px;width:1200px">
                        <thead>
                            <tr>
                                   <?php  

            $id= isset($_REQUEST['id'])?$_REQUEST['id']:"";

                $id= isset($_REQUEST['id'])?$_REQUEST['id']:"";

                if (empty($id)){
                  headerItem();
                }
                 if ($id=="customer"){
                     headerSales();
                }
                 if ($id=="transaction"){
                     transactionheader();
                }

                                ?>    
                               
                            </tr>

                        </thead>
                            <tbody id="try-table">
                                <?php  

            $id= isset($_REQUEST['id'])?$_REQUEST['id']:"";

                $id= isset($_REQUEST['id'])?$_REQUEST['id']:"";

                if (empty($id)){
                    itemcontent();
                }
                if ($id=="customer"){
                     customer();
                }
                    if ($id=="transaction"){
                    transaction();
                }


                                ?>
                             
                                 
                            </tbody>
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 





</center>

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
  
    function myFunction() {
  var input, filter, table, tr, td, cell, i, j;
  input = document.getElementById("search-bar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableID");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    // Hide the row initially.
    tr[i].style.display = "none";
  
    td = tr[i].getElementsByTagName("td");
    for (var j = 0; j < td.length; j++) {
      cell = tr[i].getElementsByTagName("td")[j];
      if (cell) {
        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        } 
      }
    }
  }
}

$(document).ready(function() {
   var a=$("#type").val();

   if (a=="transaction"){
    $("#three").css("background-color", "#dd3847");
    $("#three").css("border-style", "ridge");
     $("#three").css("border-width", "2px");

    $("#one-c").css("color", "white");
   }
   if (a=="customer"){
    $("#two").css("background-color", "#dd3847");
      $("#two").css("border-style", "ridge");
     $("#two").css("border-width", "2px");
      $("#one-b").css("color", "white");
   }if (a==""){
      $("#one").css("background-color", "#dd3847");
        $("#one").css("border-style", "ridge");
     $("#one").css("border-width", "2px");
        $("#one-a").css("color", "white");
   }
    
  });   



</script>