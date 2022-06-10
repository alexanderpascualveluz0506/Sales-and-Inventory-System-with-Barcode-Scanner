<!DOCTYPE html>
<html lang="en">
<?php include 'codes/functions/addReturnOrder_function.php'?>
<?php 
 session_start();

$date=date("l j F Y");
$current=$date;
date_default_timezone_set('Asia/Manila');
$time=date("g:i A");
?>
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
       <link href="codes/design/addReturn_style.css" rel="stylesheet">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />  
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
                    <li><a href="return.php" style="background-color:#6880fc;color:white;"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Return Orders</a></li>   


                    <li class="label">Sales Management</li>
                    <li><a href="sales.php"><i class="fas fa-chart-line"></i>Sales</a></li>
                    <li><a href="salesReturn.php"><i class="bi bi-cart-x-fill"></i>Sales Return</a></li>
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
                    <div class="col-lg-8 p-r-0 title-margin-right">
                    <span class="title-page"> <br>Dashboard / Return Orders / Add Return Order</span>
                    </div>      
                </div>
<form action="" method="POST">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                

                       <div class="container-title1"><h5><i class="fas fa-pen">&nbsp;&nbsp;</i>New Return Order
                       </h5></div>



                        <div class="row g-3" id="row1">
                           <label>Purchase Order No</label>
                                 <div class="col-sm">
                                    <?php 
                                    include 'connection.php';
                                        $sql=mysqli_query($link,"SELECT count(*) as total from return_orders");
                                       $count = mysqli_fetch_assoc($sql);
                                       $P=$count['total']+1;
                                       $PO='PDI-10'.$P;
                                        echo '<input type="text" class="form-control" name="purchaseDamaged_order_post"  value='.$PO.'>';

                                    ?>
                                </div>
                        </div>

                        <div class="row g-3" id="row2">
                           <label>Date Requested</label>
                                 <div class="col-sm">
                                        <input type="date" class="form-control" name="date_created_post" id="item-name-input">
                                </div>
                        </div>


                        <div class="row g-3" id="row3">
                           <label>Select Supplier</label>
                               <div class="col-sm">
                                <div class="input-group">
                                   <select id="supplierselect" class="form-select" style="width:100%; height:40px; border-color:lightgray;" name="supplier_post">
                                        <option selected>Choose...</option>
                                           <?php
                                                include 'connection.php';

                                        $select= "SELECT * from suppliers ";

                                         $result= $link->query($select);

                                        if ($result->num_rows >0){
                                             while ($row= $result->fetch_assoc()) {
                                            
                                                $name=$row['firstname']." ".$row['lastname'];
                                                echo '<option value='.$row['id'].'>'.$name.'</option>';              
                                                
                                            }
                                                                }
                                            



                                          ?>
                                    </select>
                                </div>
                    </div>
                        </div>

                        <div id="sub-info-supplier" style="font-size: 15px;color: blue; margin-left:18%;">
                            
                        </div>


                        <div class="row g-3" id="row4">
                           <label>Expected Response</label>
                                 <div class="col-sm">
                                        <input type="date" class="form-control" name="expected_response_post" id="item-name-input">
                                </div>
                        </div>



        


                        <div class="row g-3" id="row6">
                           <label>Rquested By</label>
                               <div class="col-sm">
                                <div class="input-group">
                                   <select id="ownerselect" class="form-select" style="width:99%; height:40px; border-color:lightgray;" name="owner_post">
                                        <option selected>Choose...</option>
                                           <?php
                                                include 'connection.php';

                                        $select= "SELECT * from accounts where Role='Admin'";

                                         $result= $link->query($select);

                                        if ($result->num_rows >0){
                                             while ($row= $result->fetch_assoc()) {
                                            
                                                $name=$row['Firstname']." ".$row['Lastname'];
                                                echo '<option value='.$row['Account_No'].'>'.$name.'</option>';              
                                                
                                            }
                                            }

                                          ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="sub-info-owner" style="font-size: 15px;color: blue; margin-left:18%;">
                            
                        </div>

                            <br><br>

                            <div class="btn-group" style="width:60%; margin-left: 2%;">
                         <input list="item_list" class="trial" style="width:60%">

                                        <datalist id="item_list">
                                          <?php
                                                include 'connection.php';

                                        $select= "SELECT * from batch";

                                         $result= $link->query($select);

                                        if ($result->num_rows >0){
                                             while ($row= $result->fetch_assoc()) {
                                                echo '<option data-value='.number_format($row['costPerUnit'],2).' data-batch='.$row['batch_no'].' value="'.$row['item_name'].'">
                                                '.$row['batch_no'].' (Damaged Item: '.$row['damage'].') Cost: ₱'.number_format($row['costPerUnit'],2).'
                                                each
                                                </option>'; 


                                            }
                                                }

                                          ?>
                                        </datalist>

                      <button type="button" id="add-new" class="btn btn-primary" id="add-new" style="width:20%; margin-left:2%">Add Item</button>
                    </div><br><br>

                          <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="width:96%">
                        <thead>
                            <tr>
    
                                <th class="table-header">Item name</th>
                                <th class="table-header" style="width:13%">Cost x Unit</th>
                               
                                <th class="table-header" style="width: 8%;">Qty</th>
                                <th class="table-header" style="width: 13%;">Total</th>
                                <th class="table-header" style="width: 22%;">Reason</th>
                                <th class="table-header" style="width: 6%;"></th>

                               
  
                            </tr>
                                                
                        </thead>
                    <tbody id="body-of-table">       

                    </tbody>
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 
           
            

                <div class="row g-3" id="row7" style="margin-left:0.7%; margin-top: 5%;">
                     
                                 <div class="col-sm">
                                       <label>Customer Notes <span id="terms">(Terms and Condition)</span></label>
                                </div>
                    </div>

                        
                    <div class="row g-3" id="row8" style="width:126%">
                     
                                <div class="col-sm" style="margin-bottom: 3%; margin-left: 1%;">
                                       <textarea name="comments"></textarea>
                                </div>

                                    <div class="col-sm" style="margin-bottom: 2%; margin-top: 4%; float: right;">
                                      <button type="submit" name="Send-to-draft" id="draftbtn" class="btn btn-primary" 
                                      style="margin-right:15px;"><i class="fas fa-clipboard-list"  style="font-size:18px"></i>&nbsp;Save As Draft</button>                                       

                                      <button type="submit" name="Send-to-email" class="btn btn-primary" id="emailbtn"> <i class="fas fa-envelope" style="font-size:18px"></i> &nbsp;Send To Email</button>
                                </div>
                    </div>


                


</section>    

</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->


 

                
            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->



</form>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
$(document).ready(function() {

var data = {};
$("#item_list option").each(function(i,el) {  
   data[$(el).data("value")] = $(el).val();
   data[$(el).data("batch")] = $(el).val();
});
console.log(data, $("#item_list option").val());
});


$("#supplierselect").change(function () {
var selectedSupplier = $("#supplierselect option:selected").val();

 $.ajax({
  url: "codes/functions/addReturnOrder_function.php",
  type: "POST",
  data:{"myData":selectedSupplier
},
success: function(data){                    
            $("#sub-info-supplier").append(data); 
                        
        }
    });
});

$("#ownerselect").change(function () {
var selectedOwner = $("#ownerselect option:selected").val();

 $.ajax({
  url: "getdatapurchaseorder.php",
  type: "POST",
  data:{"ownerselect":selectedOwner
},
success: function(data){                    
            $("#sub-info-owner").append(data); 
           
        }
    });
});


$("#add-new").click(function(){
   var value=$(".trial").val();
    var cost=$('#item_list [value="' + value + '"]').data('value');
      var batch=$('#item_list [value="' + value + '"]').data('batch');
 
 $("#body-of-table").append( '<tr><td><input type="text" value="'+value+'" class="form-control" name="item_name[]"></td><td><input type="text" class="form-control qty" name="costPerUnit[]" value="'+cost+'"></td><td><input type="text" class="form-control" name="qty[]"></td><td><input type="text" class="form-control qty" name="total[]"></td><td><input type="text" class="form-control" name="reason[]"></td><td><div class="background" ><a id="remove-button"><i class="ti-close"></i></a></div></td><td style="display:none"><input type="text" value='+batch+' name="batch[]"></td></tr>' ); 

 $("#remove-button").click(function(){
  $(this).parents('tr').remove();
});


});


$('#draftbtn').click(function(){
        
    });
</script>