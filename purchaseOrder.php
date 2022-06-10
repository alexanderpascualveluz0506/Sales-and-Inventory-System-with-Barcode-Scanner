<?php
include 'getdatapurchaseorder.php';

?>
<?php 
 session_start();

$date=date("l j F Y");
$current=$date;
date_default_timezone_set('Asia/Manila');
$time=date("g:i A");
?>
<?php  
include 'connection.php';
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
       <link href="codes/design/purchaseOrder_style.css" rel="stylesheet">
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
                    <span class="title-page"> <br>Dashboard / Supplier List / Purchase Order</span>
                    </div>
                                
                </div>

<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                  <div class="row" style="margin-left:1%"><h3 class="display-5">Purchase Orders</h3> <div>
                    
                    <?php  
                        $sql = "SELECT * from purchaseorder";
                        $result = mysqli_query($link, $sql);
                        $rowcount = mysqli_num_rows( $result );
                        echo ' <label id="total-label" style="font-size:18px">'.$rowcount.'</label></div>';
                    ?>
                </div>
                



     <div class="row g-3" id="div-for-entries-show">
       <label class="search-label" >Search:</label>
            <div class="col-sm">
                <input type="text" id="search-bar" class="search-input" onkeyup="myFunction()">
            </div>
        
        <div class="col-sm"></div>
              <button type="button" class="btn btn-primary" onclick="window.location.href='addPurchaseOrder.php'">
                  <i class="ti-plus" style="">&nbsp;</i>PURCHASE ORDER</button>
          </div>
        



    </div><!--/# div-for-entries-show -->

    <div class="bootstrap-data-table-panel" id="form-table">
                
                    <table id="maintable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               
                               
                                <th class="table-header">PO No</th>
                              
                                <th class="table-header">Date Created</th>
                                <th class="table-header">Supplier Name</th>  
                                <th class="table-header">Delivery Date</th>
                                <th class="table-header"><center>Status</center></th>
                                <th class="table-header">Item</th>
                                <th class="table-header" style="width:12%">Total Amount</th>
                               
                                <th class="table-header"><center><i class="ti-trash" style="font-size:18px;"></i></center></th>
                            </tr>
                      </thead>
                    <tbody id="try-table">
                            <?php
                                include 'connection.php';
                                $sql=mysqli_query($link,"SELECT DISTINCT purchaseOrderNo from purchaseorder" );
                                  if ($sql->num_rows >0){
                                    while ($row= $sql->fetch_assoc()) {
                                $purchaseOrderNo=$row['purchaseOrderNo'];
                                  
                                $select1=mysqli_query($link,"SELECT distinct supplierName, dateCreated,deliveryDate, status, payment_status, payment_terms from purchaseorder where purchaseOrderNo='$purchaseOrderNo'" );
                                $row1 = mysqli_fetch_assoc($select1);
                                $supplierName=$row1['supplierName'];
                                $dateCreated=$row1['dateCreated'];
                                $deliveryDate=$row1['deliveryDate'];


                                          



                    $select2=mysqli_query($link,"SELECT count(item_name) as item_name, SUM(qty) as value_sum, SUM(total_amount) as value_total_amount from purchaseorder where purchaseOrderNo='$purchaseOrderNo'" );
                                $row2 = mysqli_fetch_assoc($select2);
                                       
                                        
                $split = explode(' ', $supplierName, 2);
                $firstname = @$split[0];
                $lastname = @$split[1];

                $selectSupplier= "SELECT * FROM `suppliers` WHERE lastname='$lastname' and firstname='$firstname'";
                $resultselect = $link->query($selectSupplier);
                           
                                $row4 = mysqli_fetch_assoc( $resultselect);
                                $email = $row4['email'];
                                $contact = $row4['contact_no'];
                                $address= $row4["address"];


                                 echo ' <tr id='.$purchaseOrderNo.'>
                                             <td>'.$purchaseOrderNo.'</td>
                                            ';

                                     echo '
                                           
                                              <td>'.$dateCreated.'</td>
                                             <td>'.$supplierName.'</td>
                                              <td>'.$deliveryDate.'</td>
                                               <td><center><a href="" data-dismiss="modal" data-toggle="modal" data-target="#purchase-order"          
                                                data-purchase="'.$row["purchaseOrderNo"].'" 
                                                data-order="'.$row1["status"].'" 
                                                data-payment="'.$row1["payment_status"].'" 
                                                data-created="'.$row1["dateCreated"].'"
                                                data-expected="'.$row1["deliveryDate"].'"
                                                data-terms="'.$row1["payment_terms"].'"
                                                data-name="'.$row1["supplierName"].'"
                                                data-email="'.$email.'"
                                                data-contact="'.$contact.'"
                                                data-address="'.$address.'" class="view"> <button id="btn-status" >
                                              &nbsp;&nbsp;<span>'.$row1['status'].'</span>&nbsp;&nbsp;</button></a></center> </td>
                                              ';


                                              echo'
                                        <td><center><a href="" class="view-item" data-no="'.$row["purchaseOrderNo"].'"data-dismiss="modal" data-toggle="modal" data-target="#purchase-order-item"><button type="button"  id="item-ordered" >'.$row2["item_name"].'</button></a></center></td>
                                           
                                            <td>'.number_format($row2['value_total_amount'],2).'</td>
                                        ';




                                         



                                           echo '<td><center><a href=""           
                                                data-purchase="'.$row["purchaseOrderNo"].'" 
                                                data-order="'.$row1["status"].'" 
                                                data-payment="'.$row1["payment_status"].'" 
                                                data-created="'.$row1["dateCreated"].'"
                                                data-expected="'.$row1["deliveryDate"].'"
                                                data-terms="'.$row1["payment_terms"].'"
                                                data-name="'.$row1["supplierName"].'"
                                                data-email="'.$email.'"
                                                data-contact="'.$contact.'"
                                                data-address="'.$address.'"> 


                                                
                                             <button type="button" class="btn btn-danger" id="delete-button"><a href="" 
                                             data-toggle="modal" data-target="#modal-delete" data-name='.$row["purchaseOrderNo"].'
                                              class="delete-item"><i class="ti-trash" style="font-size:16px;"></i></td></a></button>
                                          
                                            </center></td>';

                                              echo "<tr>";



                            }
                        }


                                           
                            ?>     
                    </tbody>
                </table>
                   
                </div><!-- /# bootstrap-data-table-panel --> 




</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->



</section>     
<div  class="modal fade" id="purchase-order" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><label id="purchase-order-label"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
             <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="purchase-order-table" class="table table-striped table-bordered">
                        <thead id="save">
                            <th colspan="2" id="order-details">Purchase Order Status                         
                            </th>
                        </thead>
                    <tbody id="basic-details">
                       <tr>
                            <td>Order Status</td>
                            <td id="order-status-td" style="color: blue;font-style: italic;"></td>
                       </tr>

                        <tr>
                            <td>Payment Status</td>
                            <td id="payment-status-td" style="color: blue;font-style: italic;"></td>
                       </tr>

                        <tr>
                            <td>Payment Terms</td>
                            <td id="payment-terms-td"></td>
                       </tr>

                        <tr>
                            <td>Date Ordered</td>
                            <td id="order-created-td"></td>
                        </tr>

                        <tr>
                            <td>Delivery Date</td>
                            <td id="order-expected-td"></td>
                        </tr>

                        <tr>
                            <td>Files</td>
                            <td id="file-td">
                                <div id="not"></div>
                                <div id="yes"></div>

                            </td>
                        </tr>
                    </tbody>

                    <input type="hidden" name="PO_no" id="PO_input">
                        
                </table>
            </div><!-- /# table-responsive -->     
        </div><!-- /# bootstrap-data-table-panel --> 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <div id="div-button" style="display: none;"><button type="button" class="btn btn-primary" name="save_changes" id="btn_save_changes">
       Save Changes</button></div>
           
      </div>
    </div>
  </div>
</div>


            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->

<!-- Modal -->


<!-- Modal -->
<div  class="modal fade" id="purchase-order-item" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><label id="purchase-order-label-item"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
              <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="purchase-order-table" class="table table-striped table-bordered">
                        <thead > 
                            <th id="order-item" >Ordered Item List </th>
                            <th id="Qty" >Qty</th>
                            <th id="Amount">Amount</th>
                            <th></th>

                        </thead>
                     
                     <tbody id="item-ordered-table">
                                            </tbody>
                     
                </table>
            </div><!-- /# table-responsive -->     
        </div><!-- /# bootstrap-data-table-panel --> 
           
      </div>
      <div class="dd"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="update-form" >Update PO Form</button>
        <button type="button" class="btn btn-secondary" id="closeBtn" data-dismiss="modal">Close</button>
         
      </div>
    </div>
  </div>
</div>

<!--modal-->

<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
       <center><span style="font-size:20px">&nbsp;Are you sure you want to delete this order? </span>
        <span id="item-name-del" style="font-size:18px; display: none;" ></span></center>
     </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary"  style="width:100px;" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" style="width:100px;" id="button-yes-del">DELETE</button>
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
    $("#try-table tr .view").each(function(){

        var status = $(this).data('order');

        if (status=="ORDERED"){
           $(this).find("#btn-status").css("background-color", "#b94e48");
   
        }
         if (status=="RECEIVED"){
              $(this).find("#btn-status").css("background-color", "#b284be");
        }
        
  });   


});

$(".view").one('click', function () { 

    var name = $(this).data('purchase');
   

    var orderStatus= $(this).data('order');
  

    var paymentStatus=$(this).data('payment');
  

    var dateCreated=$(this).data('created');
   

    var expectedDate=$(this).data('expected');
    

    var paymentTerms=$(this).data('terms');
    

    $("#PO_input").val(name);

    $("#purchase-order-label").text(name);

           $("#order-status-td").empty();
            
            $("#order-status-td").append('<select class="form-control" aria-label="Default select example" id="select-orderStatus" name="order_status"><option value="ORDERED">ORDERED</option><option value="RECEIVED">RECEIVED</option></select>'); 
            $("#select-orderStatus").val(orderStatus);

     
             $("#payment-status-td").empty();
            $("#payment-status-td").append('<select class="form-control" aria-label="Default select example" id="select-paymentStatus" name="payment_status"><option value="Paid">Paid</option><option value="Not Paid">Not Paid</option></select>'); 
            $("#select-paymentStatus").val(paymentStatus);




             $("#payment-terms-td").empty();
            $("#payment-terms-td").append('<select class="form-control" aria-label="Default select example" id="select-paymentTerms" name="payment_terms"><option value="Cash">Cash</option><option value="Online Payment">Online Payment</option></select>'); 
            $("#select-paymentTerms").val(paymentTerms);



 
            $("#order-created-td").empty();
            $("#order-created-td").append('<input type="date" class="form-control" value="'+dateCreated+'" name="date_created" id="date-created">');

            $("#order-expected-td").empty();

        
            $("#order-expected-td").append('<input type="date" class="form-control" value="'+expectedDate+'" name="date_expected" id="date-expected">');

            var location="files/"+name+".pdf";
           
          
            $("#not").html('<a href='+location+' target="_blank">'+location+'</a>');
           

                $("#div-button").show();
 var location2="files/"+name+"-updated.pdf";
                $.ajax({
                        url: 'files/'+name+'-updated.pdf',
                        type: 'GET',
                        error: function()
                        {
                            //not exists
                        },
                        success: function()
                        {
                              $("#yes").html('<a href='+location2+' target="_blank">'+location2+'</a>');
                        }
                    });

});





$(document).on('click','#update-form',function(e){
   var purchaseOrderNoForUpdateForm = $("#purchase-order-label-item").text(); 

 $.ajax({
    url: "getdatapurchaseorder.php",
  type: "POST",
  data:{"purchaseOrderNoForUpdateForm":purchaseOrderNoForUpdateForm
      
},
success: function(data){  
             $(".dd").append(data);  
             location.reload(true);
        }
    });
});



$(document).on('click','.view',function(e){
   var purchaseOrder = $(this).data('purchase'); 
   $("#item-ordered-table").empty();
 $.ajax({
  url: "getdatapurchaseorder.php",
  type: "POST",
  data:{"purchaseOrder":purchaseOrder
      
},
success: function(data){  
             $("#item-ordered-table").append("<tr><td >Item Name</td><td>Qty</td><td>Amount</td></tr>"); 
            $("#item-ordered-table").append(data);           
        }
    });
});

$("#edit-order-details").on('click', function () { 
  
        
});



$(document).on('click','#btn_save_changes',function(e){
   
     var purchaseOrderNoForSave=$("#purchase-order-label").text();
      var payment_terms=$("#select-paymentTerms").val();
      var status=$("#select-orderStatus").val();
      var dateCreated=$("#date-created").val();
      var date_expect=$("#date-expected").val();
      var paymentStatus=$("#select-paymentStatus").val();
 
  
 $.ajax({
  url: "getdatapurchaseorder.php",
  type: "POST",
  data:{"purchaseOrderNoForSave":purchaseOrderNoForSave,
        "payment_terms":payment_terms,
        "status":status,
        "dateCreated":dateCreated,
        "date_expect":date_expect,
        "paymentStatus":paymentStatus
      
},
success: function(data){  
              location.reload();       
        }
    });
});


$(document).on('click','.view-item',function(e){
var po_name = $(this).data('no');
  $("#purchase-order-label-item").text(po_name);
   
 
  
 $.ajax({
  url: "getdatapurchaseorder.php",
  type: "POST",
  data:{"po_name":po_name
      
},
success: function(data){  
           
            $("#item-ordered-table").html(data);              
        }
    });
});


$(document).on('click','.edit-item-details',function(e){
var id = $(this).closest("tr").find('td:eq(0)').text();
var id2 = $(this).closest("tr").find('td:eq(1)').text();
var id3= $(this).closest("tr").find('td:eq(2)').text();

$(this).closest("tr").addClass("intro");

 $(".intro").html('<td>'+id+'</td><td><input type="text" value='+id2+' class="form-control" style="width:50%" id="qty"></td><td><input type="text" value='+id3+' class="form-control" style="width:70%" id="total"></td><td><a href="#" class="save-edit-item-details">Save</a></td>');
  
 $.ajax({
  url: "getdatapurchaseorder.php",
  type: "POST",
  data:{
      
},
success: function(data){  
           
                    
        }
    });
});

$(document).on('click','.save-edit-item-details',function(e){
 var PO= $("#purchase-order-label-item").text();   
var id1 = $(this).closest("tr").find('td:eq(0)').text();
var id2 =$("#qty").val();
var id3= $("#total").val();



 $.ajax({
  url: "getdatapurchaseorder.php",
  type: "POST", 
  data:{"id1":id1,
        "id2":id2,
        "id3":id3,
        "PO":PO
      
},
success: function(data){  
          $("#item-ordered-table").html(data);    
                    
        }
    });
});
$("#closeBtn").on('click', function () { 
window.location.href="purchaseOrder.php";

});
$(".close").on('click', function () { 
window.location.href="purchaseOrder.php";

});
</script>


