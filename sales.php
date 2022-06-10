<?php 
 session_start();

$date=date("l j F Y");
$current=$date;
date_default_timezone_set('Asia/Manila');
$time=date("g:i A");
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
       <link href="codes/design/sales_style.css" rel="stylesheet">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
</head>

  <script src="codes/javascript/clock.js"></script>

  <script src="codes/javascript/clock.js"></script>
<body style="background-color:#f8f9fe" onload=display_ct();>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures"  >
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="dashboard.php">
                    <span>Erlinda's Grocery</span></a></div>
                             <li class="label" style="margin-top: 5%;">Main</li>
                   <li><a href="dashboard.php" ><i class="fas fa-home" ></i> Dashboard </a>
                            
                    </li>

                     <li class="label">Item Management</li>
                       <li><a href="item.php"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Item</a></li>
                        <li><a href="category.php"><i class="fas fa-boxes"></i>&nbsp;&nbsp;Category</a></li>
                        <li><a href="manufacturer.php"><i class="fas fa-dolly"></i>&nbsp;&nbsp;Manufacturer</a></li>         
                    </li>


                     <li class="label">Inventory Management</li>
                    <li><a href="inventory.php"><i class="fa fa-archive"></i>&nbsp;&nbsp;Inventory</a></li>
                    <li><a href="warehouseCapacity.php"><i class="fas fa-pallet"></i>&nbsp;&nbsp;Warehouse Capacity</a></li> 

                

                     <li class="label">Supplier Management</li>
                    <li><a href="supplier.php"><i class="fas fa-users"></i>&nbsp;&nbsp;Supplier<span></a></li>
                    <li><a href="purchaseOrder.php"><i class="fa fa-truck"></i>&nbsp;&nbsp;Purchase Orders</a></li>
                    <li><a href="return.php"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Return Orders</a></li>   


                    <li class="label">Sales Management</li>
                    <li><a href="sales.php"><i class="fas fa-chart-line"></i>Sales</a></li>
                    <li><a href="salesReturn.php"><i class="bi bi-cart-x-fill"></i>Return/Refund</a></li>
                    <li><a href="pos.php"><i class="fas fa-cash-register"></i>&nbsp;&nbsp;POS</a></li>


                    <li class="label">Financial Analytics</li>
                    <li><a href="expense.php"><i class="fas fa-coins"></i>&nbsp;&nbsp;Expenses</a></li>            
                    <li><a href="report.php"><i class="fas fa-print"></i>&nbsp;&nbsp;Reports</a></li>
                    


                    <li class="label">Accounts</li>
                    <li><a href="account.php"><i class="fas fa-id-card" ></i>&nbsp;&nbsp;Accounts</a></li>
                    <li><a href="index1.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logouts</a></li>            
            </div>
        </div>
    </div>
 
<!-- /# sidebar -->

<div class="header" style=" position: sticky;top: 0px; background-color:#5c6681;border-style: none">
    <div class="container-fluid" >
        <div class="row" >
            <div class="col-lg-12" >
                <!-- Menu for collapsible-->
                <div class="float-left">
                    <div style="height:4px"></div>
                    <div class="hamburger sidebar-toggle">
                         <i class="bi bi-list" style="color:#ffffff; font-size:35px"></i>

                    </div>

                </div>

   

                  <div class="float-right" style="width: 58%;margin-top: 15px;padding-right: 15px;" >    
                     <center><span id='ct' style="margin-top: 18px;color:white;"></span></center>
                       

                        <?php

                        include 'notif.php';
            status();
                        ?>  

                </div>
                </div>


</div>
 </div>
</div>
</div>
</div>

<!-- sidebar end  -->




    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                    <span class="title-page"> <br>Dashboard / Sales<span>
                    </div>
                                
                </div>
<form action="" method="POST">
<section id="main-content">

                <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                 <div class="row" style="margin-left:1%"><h3 class="display-5">Sales</h3> <div>
                    <?php 

                    include 'connection.php';
                    
                     $test = isset($_GET['sales']) ? $_GET['sales'] : '';
                        $date=date("Y-m-d");
                                if (empty($test)){
                                    $sql=mysqli_query($link, "SELECT * from sales");
                                    $rowcount=mysqli_num_rows($sql);
                                }elseif($test=="day"){
                                    $sql=mysqli_query($link, "SELECT * from sales where payment_date='$date'");
                                    $rowcount=mysqli_num_rows($sql);
                                }elseif($test=="week"){
                                    $sql=mysqli_query($link, "SELECT * from sales where YEARWEEK(payment_date) = YEARWEEK(NOW())");
                                    $rowcount=mysqli_num_rows($sql);;
                                }elseif($test=="year"){
                                    $sql=mysqli_query($link, "SELECT * from sales WHERE YEAR(payment_date) = YEAR( CURDATE() ) ");
                                    $rowcount=mysqli_num_rows($sql);
                                }elseif($test="month"){
                                   $sql=mysqli_query($link, "SELECT * from sales  WHERE YEAR(payment_date) = YEAR(CURDATE()) AND MONTH(payment_date) = MONTH(CURDATE())");
                                    $rowcount=mysqli_num_rows($sql);
                                }



                    echo ' <label id="total-label">'.$rowcount.'</label></div>';



                        ?>
                  
                </div>

    <div class="row g-3" id="div-for-entries-show" style="width:95.5%">
       <label class="search-label" >Search:</label>
            <div class="col-sm" >
                <input type="text" id="search-bar" class="search-input" onkeyup="myFunction()">
               

            </div>


            <div class="col-sm float-right" id="button-group-rght" style="margin-left:-255px">
                    <button type="button" class="btn btn-success" style="background-color:#007575;border-style:none; margin-left:57px;height: 42px;" onclick="window.open('cashierTransaction.php')"><i class="fas fa-cash-register" style="font-size:19px"></i>&nbsp;&nbsp;Cashier Transaction</button>    


            </div>

            <div class="col-sm float-right" id="button-group-rght" style="margin-left:130px">
                
      <button type="button" class="btn btn-success"  onclick="window.open('offlineSales.php', '_blank');" style="margin-left: -10px"><i class="bi bi-wifi-off" style="font-size: 19px;"></i>&nbsp;Offline Sales</button>  

            </div>



            <div class="col-sm float-right" id="button-group-rght">

                <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort By
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style=" width: 25%;">
                         <a class="dropdown-item" href="sales.php">All Sales</a>
                        <a class="dropdown-item" href="sales.php?sales=day">Day Sales</a>
                        <a class="dropdown-item" href="sales.php?sales=week">Week Sales</a>
                        <a class="dropdown-item" href="sales.php?sales=month">Month Sales</a>
                        <a class="dropdown-item" href="sales.php?sales=year">Year Sales</a>
                      </div>
                    </div> 


            </div>


    </div>
<?php include'codes/functions/getDataSales.php';

  ?>
               <div class="bootstrap-data-table-panel" id="form-table">
  
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="margin-top:0%" >
                        <thead>
                            <tr>
                                <th class="table-header">Sales No</th>
                                <th class="table-header">Date and Time</th>
                                <th class="table-header">Total Items</th>
                                <th class="table-header">Total Amount</th>
                                <th class="table-header">Payment</th>
                                <th class="table-header">Change</th>
                                <th class="table-header">Discount</th>
                            </tr>
                        </thead>
                            <tbody id="result">

                                <?php  

                                $test = isset($_GET['sales']) ? $_GET['sales'] : '';

                                if (empty($test)){
                                   allSales();
                                }elseif($test=="day"){
                                    daySales();
                                }elseif($test=="week"){
                                    weekSales();
                                }elseif($test=="year"){
                                    yearSales();
                                }elseif($test="month"){
                                    monthSales();
                                }

                                ?>
                                              
                            </tbody>
</table>

</div><!-- /# bootstrap-data-table-panel --> 
</div>



</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->
</section>     
</div><!-- container-fluid end -->
</div><!-- main content end -->
 </div><!-- content wrap end -->


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="view-sales">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="salesNo">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           
           <div class="row">
            <div class="col"> 
               <label style="font-weight: bold;"> Customer No: &nbsp;</label><label id="cust-no"></label><br>
                <label style="font-weight: bold;">Date:  &nbsp;</label><label id="date"></label><br>
                <label style="font-weight: bold;">Time:  &nbsp;</label><label id="time"></label><br>
                <label style="font-weight: bold;">Issued By:  &nbsp;</label><label id="cashier-name"></label>
            </div>
            <div class="col"> 
                <label style="font-weight: bold;">Total Amount: &nbsp;</label><label id="total-amount"></label><br>
                <label style="font-weight: bold;">Discount Added: &nbsp;</label><label id="discount-amount"></label><br>
                <label style="font-weight: bold;">Payment: &nbsp;</label><label id="payment-amount"></label><br>
                <label style="font-weight: bold;">Change: &nbsp;</label><label id="change-amount"></label>

            </div>
         </div>
             <div class="bootstrap-data-table-panel">
  
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="margin-top:0%" >
                        <thead>
                            <tr>
                                <th class="table-header">Stock No</th>
                                <th class="table-header">Item Name</th>
                                <th class="table-header">Price</th>
                                <th class="table-header">Qty</th>
                                <th class="table-header">Total</th>
                              
                            </tr>
                        </thead>
                            <tbody id="result1">

                               
                                              
                            </tbody>
</table>

</div><!-- /# bootstrap-data-table-panel -->
      </div>
   
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal -->





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
  table = document.getElementById("bootstrap-data-table-export");
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


$(document).on("click", ".view", function(){


    var customer_no=$(this).data("cust");
    var date=$(this).data("date");
    var account_no=$(this).data("account");
    var time=$(this).data("time");
    var order=$(this).data("order");
    var total=$(this).data('total');
    var payment_amount=$(this).data('payment');
    var change=$(this).data('change');

    var discount=$(this).data('discount');
    var final_disc=parseFloat(discount*-1).toFixed(2);
   
    $("#cust-no").text(customer_no);
    $("#date").text(date);
    $("#time").text(time);


 
   
   


   $("#total-amount").text(total.toFixed(2));
   $("#discount-amount").text(final_disc);
   $("#payment-amount").text(payment_amount.toFixed(2));
   $("#change-amount").text(change.toFixed(2))


   $("#salesNo").text(order);
      $.ajax({
 url: "codes/functions/getDataSales.php",
  type: "POST",
  data:{"customer_no":customer_no,
        "date":date,
        "account_no":account_no,
        "time":time,
        "order":order
      
},
success: function(data){ 

          $("#result1").html(data); 
           var accno=$("#accno").val();     
           $("#cashier-name").text(accno);
        }
    });

 });
</script>
