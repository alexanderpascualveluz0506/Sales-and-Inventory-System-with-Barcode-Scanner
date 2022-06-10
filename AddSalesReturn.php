
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
       <link href="codes/design/addSalesReturn_style.css" rel="stylesheet">


       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />

  <script src="codes/javascript/clock.js"></script>


</head>

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
                    <li><a href="salesReturn.php" style="background-color:#6880fc;color:white;"><i class="bi bi-cart-x-fill"></i>Sales Return</a></li>
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


                  <div class="float-right">
                    <div style="height:16px"></div>
                        <div style="">

                          <span id='ct' style="padding-right: 20px;margin-top: 8px;color:white;"></span>
                            </div>
                           </div>


                </div>

      

              </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right" style="margin-left:1.3%">
                    <span class="title-page"> <br>Dashboard / Sales / Sales Return</span>
                    </div>      
                </div>

<section id="main-content" style="margin-top:1%">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                

                       <div class="container-title1"><h5><i class="fas fa-pen">&nbsp;&nbsp;</i>New Sales Return
                       </h5>
                        
                       </div>

                        <div class="row g-3" id="row1">
                            <label>Date Returned</label>
                                 <div class="col-sm">
                                        <input type="date" class="form-control" id="date_returned" name="dateReturned" style="border-color:#afafaf; border-width:-1px">
                                </div>
                        </div>

                          <div class="row g-3" id="row2">
                            <label>Receipt Date</label>
                                 <div class="col-sm">
                                        <input type="date" class="form-control" id="receipt_date" name="receiptDate" style="border-color:#afafaf">
                                </div>
                        </div>



                          <div class="row g-3" id="row3">
                            <label>Receipt No</label>
                                 <div class="col-sm">
                                        <input type="text" class="form-control" id="receipt_no" name="receiptNo" style="border-color:#afafaf">
                                </div>
                        </div>

                         <div class="row g-3" id="row7">
                            <label>Reason</label>
                                 <div class="col-sm">
                                    <input type="text" class="form-control" name="reasons" id="reason" style="border-color:#afafaf">
                                </div>
                        </div>
                        <div class="row g-3" id="row4">
                            <label>Item Name</label>
                                 <div class="col-sm">
                                    <select class="custom-select" id="item_returnable" name="itemReturnable" style="border-color:#afafaf">
                                            <option selected>Choose...</option>
                                    </select>


                                </div>
                        </div>

                    <div class="row g-3" id="row6">
                            <label>Qty to Returned  </label>
                                 <div class="col-sm">
                                        <input type="number" class="form-control" id="qty_bought" name="qtyBought" style="border-color:#afafaf">
                                </div>
                    </div>


                        <div class="row g-3" >
         
                              <div class="input-group-prepend" id="row5">
                                  <label>Stock Details &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label>   
                               <input type="text" id="input-batch-no" name="batchNo" class="form-control" placeholder="stockIn No" aria-label="" aria-describedby="basic-addon1" 
                               style="border-color:#afafaf;" readonly>
                               
                               <input type="text" id="input-cost-per-unit" name="inputCost" class="form-control" placeholder="Cost x Piece" aria-label="" aria-describedby="basic-addon1" 
                               style="border-color:#afafaf;" readonly>
                               
                               <input type="text" id="input-price" class="form-control" name="inputPrice" placeholder="Price" aria-label="" aria-describedby="basic-addon1" 
                               style="border-color:#afafaf; " readonly>
                              </div>
                        </div>


</form>


</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->

<div id="ss" style="display:none"></div>

<button type="submit" id="confirm" name="confirmBtn" style="width:200px;height: 47px; margin-left: 78%; margin-bottom: 2%; background-color:#054D7C; color:white; border-style: none; margin-top:2%">CONFIRM</button>

</div><!-- container-fluid end -->
</div><!-- main content end -->
</div><!-- content wrap end -->



</section>     





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



$(document).one('click','#item_returnable',function(e){
var receipt_date=$("#receipt_date").val();
var receipt_no=$("#receipt_no").val();

 $.ajax({
  url: "codes/functions/AddSalesReturn_function.php",
  type: "POST",
  data:{"receipt_no":receipt_no,
        "receipt_date":receipt_date
      
},
success: function(data){    
            
        $("#item_returnable").append(data); 

        }
    });


});

$(document).on('change','#item_returnable',function(e){
   var itemselect = $(this).val();
   var receipt_no1=$("#receipt_no").val();
   alert(itemselect);
 $.ajax({
  url: "codes/functions/AddSalesReturn_function.php",
  type: "POST",
  data:{"itemselect":itemselect,
        "receipt_no1":receipt_no1
},
success: function(data){    
         $("#ss").append(data); 

        var batch_no=$("#batch_no").text();
        var price=$("#price1").text();
        var costperUnit=$("#costperUnit").text();

        $("#input-batch-no").val(batch_no).css('background-color', 'white');
        $("#input-cost-per-unit").val(costperUnit).css('background-color', 'white');
        $("#input-price").val(price).css('background-color', 'white');



        }
    });

});

$(document).one('click','#confirm',function(e){
var item_returnable = $("#item_returnable").val();
var date_returned=$("#date_returned").val();
var receipt_date=$("#receipt_date").val();
var receipt_no=$("#receipt_no").val();
var qty_bought=$("#qty_bought").val();
var input_batch_no=$("#input-batch-no").val();
var input_cost_per_unit=$("#input-cost-per-unit").val();
var input_price=$("#input-price").val();
var reason=$("#reason").val();
 $.ajax({
  url: "codes/functions/AddSalesReturn_function.php",
  type: "POST",
  data:{"item_returnable":item_returnable,
        "date_returned":date_returned,
        "receipt_date":receipt_date,
        "receipt_no":receipt_no,
        "qty_bought":qty_bought,
        "input_batch_no":input_batch_no,
        "input_cost_per_unit":input_cost_per_unit,
        "input_price":input_price, 
        "reason":reason
},
success: function(data){    
     window.location.href = 'salesReturn.php';



        }
    });

});


</script>