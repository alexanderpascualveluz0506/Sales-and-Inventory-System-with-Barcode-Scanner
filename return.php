<?php include 'codes/functions/return_function.php'  ?>
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
       <link href="codes/design/return_style.css" rel="stylesheet">
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
                    <li><a href="return.php"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Return Orders</a></li>   


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
                    <span class="title-page"> <br>Dashboard / Return Order List</span>
                    </div>
                                
                </div>

<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                 <div class="row" style="margin-left:1%"><h3 class="display-5">Return Orders</h3> <div>
                    
                    <?php  
                        $sql = "SELECT * from return_orders";
                        $result = mysqli_query($link, $sql);
                        $rowcount = mysqli_num_rows( $result );
                        echo ' <label id="total-label">'.$rowcount.'</label></div>';
                    ?>
                </div>
            


     <div class="row g-3" id="div-for-entries-show">
       <label class="search-label" >Search:</label>
            <div class="col-sm">
                <input type="text" id="search-bar" class="search-input" onkeyup="myFunction()">
            </div>
        
        <div class="col-sm"></div>
             <button type="button" class="btn btn-primary" onclick="window.location.href='addReturnOrder.php'">
                            <i class="ti-plus" style="">&nbsp;</i>RETURN ORDERS</button>
          </div>
        



    </div><!--/# div-for-entries-show -->
<br>

    <div class="bootstrap-data-table-panel" id="form-table" style="margin-top:0%">
                
                    <table id="return-order-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               
                               
                                <th class="table-header">PDI NO</th>
                                
                                <th class="table-header">Requested Date</th>
                                 <th class="table-header">Response Date</th>
                                <th class="table-header">Supplier Name</th> 
                                 <th class="table-header"><center>Status</center></th>
                                <th class="table-header">Items</th>
                                <th class="table-header">Total Amount</th>
                               
                                <th class="table-header"><center><i class="ti-trash" style="font-size:18px;"></i></th>
                            </tr>
                      </thead>
                    <tbody id="try-table">
                            <?php 
                            include 'connection.php';

                            $sql=mysqli_query($link, "SELECT distinct PDI_NO from return_orders");
                               if ($sql->num_rows >0){
                                    while ($row= $sql->fetch_assoc()) {
                                          $id=$row['PDI_NO'];
                                      
                                $sql1=mysqli_query($link, "SELECT distinct date_created, supplier_name, expected_response, status from return_orders where PDI_NO='$id'");
                                  $row1=mysqli_fetch_assoc($sql1);  

                                    echo '
                                        <tr>
                                        <td>'.$id.'</td>
                                        
                                         <td>'.$row1['date_created'].'</td>
                                         <td>'.$row1['expected_response'].'</td>
                                         <td>'.$row1['supplier_name'].'</td>

                                        ';

                                    $sqq=mysqli_query($link, "SELECT count(item_name) as items, sum(total_amount) as total from return_orders where PDI_NO='$id'");
                                    $rowSum=mysqli_fetch_assoc($sqq);
                                    $items=$rowSum['items'];
                                    $total=number_format($rowSum['total'],2);


                                        echo '

                                             <td><center><a href="" data-dismiss="modal" data-toggle="modal" data-target="#status-modal" data-id='.$id.' class="status-view" data-created='.$row1['date_created'].' data-response='.$row1['expected_response'].' data-status="'.$row1['status'].'"><button id="btn-status" >
                                              &nbsp;&nbsp;<span>'.$row1['status'].'</span>&nbsp;&nbsp;</button></a></center></td>

                                        <td><center><a href="" class="view-item-returned" data-pdi='.$row['PDI_NO'].' data-dismiss="modal" data-toggle="modal" data-target="#return-order-item"><button type="button"  id="item-ordered" >'.$items.'</button></a></center></td>



                                        <td><span style="padding-left:20px;">'.$total.'</span></td>
                                       

                                        <td> <center>
                                        <button type="button" class="btn btn-danger" id="delete-button">
                                        <a href="" data-toggle="modal" data-target="#modal-delete" 
                                        data-name='.$id.'class="delete-item">
                                        <i class="ti-trash" style="font-size:16px;"></i></td></a>
                                        </button></center></td>';


                                        echo '<tr>';
                                }
                            }
                            ?> 
                    </tbody>
                </table>
                   
                </div><!-- /# bootstrap-data-table-panel --> 

<!-- Modal -->


<div  class="modal fade" id="return-order-item" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><label id="return-order-label-item"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="button-view-edit">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
              <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="return-order-table" class="table table-striped table-bordered">
                        <thead > 
                            <th style="width:10%">Batch No</th>
                            <th style="width: 33%;">Item Name</th>
                            <th style="width: 11%;">Cost * Piece</th>
                            <th style="width:7%">Qty</th>
                            <th style="width:10%">Total</th>
                            <th>Reason</th>
                            <th style="width:10%">Actions</th>

                        </thead>
                     
                     <tbody id="item-return-ordered-table">
                                            </tbody>
                     
                </table>

                <div id="result"></div>
            </div><!-- /# table-responsive -->     
        </div><!-- /# bootstrap-data-table-panel --> 
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="button-view-edit" data-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
</div>
<!--end modal-->

<!-- Modal -->
<div class="modal fade" id="status-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="status-id">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="return-order-table" class="table table-striped table-bordered">
                        <thead > 
                            <th colspan="2">Status Details</th>
                        </thead>
                     
                     <tbody id="item-return-ordered-table">
                        <tr>
                            <td>Status</td>
                            <td id='status-td'></td>
                        </tr>

                         <tr>
                            <td>Date Created</td>
                            <td id='date-created-td'></td>
                        </tr>

                        <tr>
                            <td>Date of Response</td>
                            <td id='date-response-td'></td>
                        </tr>

                          <tr>
                            <td>File</td>
                            <td id='file-td'></td>
                        </tr>
                    </tbody>
                     
                </table>

                <div id="result"></div>
            </div><!-- /# table-responsive -->     
        </div><!-- /# bootstrap-data-table-panel --> 
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-btn-status">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!--end modal-->

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
       <center><span style="font-size:20px">&nbsp;Are you sure you want to delete this return order? </span>
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
  <script src='codes/javascript/RETURN_ORDER.js'></script>

</body>

</html>

<script type="text/javascript">
    
    function myFunction() {
  var input, filter, table, tr, td, cell, i, j;
  input = document.getElementById("search-bar");
  filter = input.value.toUpperCase();
  table = document.getElementById("return-order-table");
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

    
</script>
<script type="text/javascript">

    $(document).ready(function() {
    $("#try-table tr .status-view").each(function(){

        var status = $(this).data('status');

        if (status=="Draft"){
           $(this).find("#btn-status").css("background-color", "#b94e48");
   
        }
         if (status=="Request Accepted"){
              $(this).find("#btn-status").css("background-color", "#b284be");
        }
        if (status=="Waiting for Approval"){
              $(this).find("#btn-status").css("background-color", "#28a745");
        }
          if (status=="Claimed"){
              $(this).find("#btn-status").css("background-color", "#d1b200");
        }
      


                
   
  });   


});

   $(document).on('click','.view-item-returned',function(e){
   var id = $(this).data('pdi'); 

   $("#return-order-label-item").text(id);
   $("#item-return-ordered-table").empty();

 $.ajax({
  url: "codes/functions/return_function.php",
  type: "POST",
  data:{"id":id
      
},
success: function(data){  
            $("#item-return-ordered-table").append(data);           
        }
    });
});


$(document).on('click','#edit-item-details',function(e){
var id1 = $(this).closest("tr").find('td:eq(0)').text();
var id2 = $(this).closest("tr").find('td:eq(1)').text();
var id3 = $(this).closest("tr").find('td:eq(2)').text();
var id4 = $(this).closest("tr").find('td:eq(3)').text();
var id5= $(this).closest("tr").find('td:eq(4)').text();
var id6= $(this).closest("tr").find('td:eq(5)').text();

$(this).closest("tr").addClass("intro");

 $(".intro").html('<td>'+id1+'</td><td>'+id2+'</td><td><input type="text" value='+id3+' class="form-control" style="width:100%" id="cost"></td><td><input type="text" value='+id4+' class="form-control" style="width:100%" id="qty"></td><td><input type="text" value='+id5+' class="form-control" style="width:100%" id="total"></td><td><input type="text" class="form-control" style="width:100%" id="reason" value='+id6+'></td><td><a href="#" class="save-edit-item-details">Save</a></td>');
  
 $.ajax({
  url: "getdatapurchaseorder.php",
  type: "POST",
  data:{"id1":id1,
        "id2":id2,
        "id3":id3,
        "id4":id4,
        "id5":id5,
        "id6":id6,
      
},
success: function(data){  
          
                    
        }
    });
});



$(document).on('click','.save-edit-item-details',function(e){
     var PDI1= $("#return-order-label-item").text(); 
   var id1 = $(this).closest("tr").find('td:eq(0)').text();
    var id2 = $(this).closest("tr").find('td:eq(1)').text();
    var id3 = $("#cost").val();
    var id4 =$("#qty").val();
    var id5= $("#total").val();
    var id6= $("#reason").val();


 $.ajax({
   url: "codes/functions/return_function.php",
  type: "POST", 
  data:{"id1":id1,
        "id2":id2,
        "id3":id3,
        "id4":id4,
        "id5":id5,
        "id6":id6,
        "PDI1":PDI1
      
},
success: function(data){
       
          $("#item-return-ordered-table").html(data);

                    
        }
    });
});

$(document).on('click','#button-view-edit',function(e){
   window.location.href="return.php";
});


$(".status-view").on('click', function () { 

$("#status-td").empty();
 $("#date-response-td").empty();
 $("#date-created-td").empty();
var created=$(this).data('created');
var response=$(this).data('response');
var status=$(this).data('status');

var id=$(this).data('id');
$("#status-id").text(id);


var location="files/"+id+".pdf";
$("#file-td").html('<a href='+location+' target="_blank">'+location+'</a>');

$("#status-td").append('<select id="status-change" class="form-control" aria-label="Default select example"><option value="Draft">Draft</option><option value="Waiting for Approval">Waiting for Approval</option><option             value="Request Accepted">Request Accepted</option><option value="Claimed">Claimed</option></select>');
$("#date-created-td").append('<input type="date" class="form-control" value='+created+' id="created-input">');
$("#date-response-td").append('<input type="date" class="form-control" value='+response+' id="response-input">');
 $("#status-change option[value='" + status + "']").prop("selected",true);


});



$(document).on('click','#save-btn-status',function(e){

var status=$("#status-change").val();
var created=$("#created-input").val();
var response=$("#response-input").val();
var id1=$("#status-id").text();
 $.ajax({
   url: "codes/functions/return_function.php",
  type: "POST", 
  data:{"status":status,
        "created":created,
        "response":response, 
        "id1":id1
      
},
success: function(data){
 window.location.href="return.php";

                    
        }
    });
});
  


 

</script>