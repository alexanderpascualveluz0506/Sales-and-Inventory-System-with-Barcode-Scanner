 <?php
 session_start();
      include 'codes/functions/supplier_function.php';
      include 'connection.php';
      add_files_Supplier();


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
    <script src="codes/javascript/JSsupplier.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />

       <link href="codes/design/supplier_style.css" rel="stylesheet">
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
                    <span class="title-page"> <br>Dashboard / Supplier List</span>
                    </div>
                                
                </div>
<form action=""  method="post" enctype="multipart/form-data">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                <div class="row" style="margin-left:1%"><h3 class="display-5">Suppliers</h3> <div>
                    
                    <?php  
                        $sql = "SELECT * from suppliers";
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
              <button type="button" class="btn btn-primary" onclick="window.location.href='addSupplier.php'">
              <i class="ti-plus" style=""><span>&nbsp;</span></i>SUPPLIER &nbsp;&nbsp;</button>
          </div>
                
    </div><!--/# div-for-entries-show -->
<br>
    <div class="bootstrap-data-table-panel" id="form-table">
                   
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="">
                        <thead>
                            <tr>
                               <th>No</th>
                               <th style="width:14%;">Company</th>
                               <th> Name</th>
                               <th style="width:20%;">Address</th>
                               <th style="width:13%;">Email</th>
                               <th>Contact No</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                            <tbody>
                        <?php 

                        showTableSupplier();
                        echo"</table>";
                        ?>                   
</tbody></table></div><!-- /# table-responsive --> 
</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->
</section>     
</div><!-- container-fluid end -->
</div><!-- main content end -->
 </div><!-- content wrap end -->




</section>     


          >
    </div><!-- content wrap end -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="supplier-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="bootstrap-data-table-panel" id="form-table">
                   
                    <table id="supplier" class="table table-striped table-bordered" style="">
                        <thead>
                            <tr>
                               <th colspan="2">Supplier Details
                                 <i class="far fa-edit" style="font-size:23px;float:right" id="edit-button"></i>
                               </th>

                            </tr>
                        </thead>
                            <tbody id="supplier-details-body">
                                <tr>
                                    <td id="company_name">Company Name</td>
                                    <td id="company_name_val"></td>
                                </tr>  
                                <tr>
                                    <td id="address">Address</td>
                                    <td id="address_val"></td>
                                </tr> 
                                <tr>
                                    <td id="email">Email</td>
                                    <td id="email_val"></td>
                                </tr>
                                 <tr>
                                    <td id="contact">Contact No</td>
                                    <td id="contact_val"></td>
                                </tr>    
                            </tbody>
                            </table>

                            <table id="supplier-files" class="table table-striped table-bordered" style="">
                            <thead>
                            <tr>
                               <th>Files                                    
                               </th>

                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div id="files_val" >
                                        </div><br>
                                        <div id='file-catcher' style="margin-left:3%">
                                      <input id='file-input' type='file' name='files_upload[]' accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg" multiple>
                                    </div>
                                    <br>
                                    <div id='file-list-display' style="margin-left:3%"></div></th>
                                    </td>
                                 
                                </tr>  
                            </tbody>
                        </table>
                </div><!-- /# table-responsive --> 

                <input type="hidden" id="id-input" name='id_post'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" style="display:none" id="save_changes" name="update_changes">Save Changes</button>
           <button type="submit" class="btn btn-primary" style="display:none" id="upload-id" name="upload_file">Upload Files</button>
      </div>
    </div>
  </div>
</div>

<!--modal-->

<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
       <center><span style="font-size:20px">&nbsp;Are you sure you want to delete this supplier? </span>
        <span id="item-name-del" style="font-size:18px; display: none;" ></span></center>
     </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary"  style="width:100px;" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" style="width:100px;" id="button-yes-del">DELETE</button>
      </div>
    </div>
  </div>
</div>

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

$(document).on('click','.view-supplier',function(e){
        var id=$("#id-input").val();
          var id=$(this).data("id");
          
        var company=$(this).data("company");
        var firstname=$(this).data("firstname");
        var lastname=$(this).data("lastname");
        var email=$(this).data("email");
        var contact=$(this).data("contact");
        var address=$(this).data("address");

        $("#exampleModalLabel").text(firstname+" "+lastname);
        $("#id-input").val(id);
        $("#company_name_val").text(company);
        $("#email_val").text(email);
        $("#address_val").text(address);
        $("#contact_val").text(contact);

 $.ajax({
  url: "codes/functions/supplier_function.php",
  type: "POST",
  data:{"id":id

},
success: function(data){ 
   
          $("#files_val").empty();                   
          $("#files_val").html(data);
           
        }
    });
});

$(document).on('click','.remove',function(e){
     e.preventDefault();
       var id_del=$("#id-input").val();
       var file = $(".remove").attr("id");

 $.ajax({
  url: "codes/functions/supplier_function.php",
  type: "POST",
  data:{"id_del":id_del,
        "file":file

},
success: function(data){ 
         $("#files_val").empty();                   
          $("#files_val").html(data);
         
           
        }
    });
});

$(document).one('click','#edit-button',function(e){
$("#save_changes").show();

var company_name=$("#company_name_val").text();
$("#company_name_val").empty();
$("#company_name_val").append('<input type="text" class="form-control" value="'+company_name+'" id="company_name_i">');


var address=$("#address_val").text();
$("#address_val").empty();
$("#address_val").append('<input type="text" class="form-control" value="'+address+'" id="address_i">');

var email=$("#email_val").text();
$("#email_val").empty();
$("#email_val").append('<input type="text" class="form-control" value='+email+' id="email_i">');

var contact=$("#contact_val").text();
$("#contact_val").empty();
$("#contact_val").append('<input type="text" class="form-control" value='+contact+' id="contact_i">');

});
$(document).one('click','#file-input',function(e){
$("#upload-id").show();


});

$(document).on('click','#save_changes',function(e){

      var id_update=$("#id-input").val();
       var company_name=$("#company_name_i").val();
       var address=$("#address_i").val();
       var email=$("#email_i").val();
       var contact=$("#contact_i").val();



 $.ajax({
  url: "codes/functions/supplier_function.php",
  type: "POST",
  data:{"company_name":company_name,
        "address":address,
        "email":email,
        "contact":contact,
        "id_update":id_update

},
success: function(data){ 
     location.reload();
           
        }
    });
});

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
</script>

