
<?php include 'codes/functions/category_function.php';?>
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
    <link href="codes/design/category_style.css" rel="stylesheet">
   
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
                    <span class="title-page"> <br>Dashboard / Category</span>
                    </div>
                                
                </div>
<form action="" method="POST">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                  <div class="row" style="margin-left:1%"><h3 class="display-5">Categories</h3> <div>
                   <?php  
                        $sql = "SELECT * from maincategory";
                        $result = mysqli_query($link, $sql);
                        $rowcount = mysqli_num_rows( $result );
                        echo ' <label id="total-label">'.$rowcount.'</label></div>';
                    ?>
                </div>

    <div class="row g-3" id="div-for-entries-show">
          <label class="search-label">Search:</label>
            <div class="col-sm" >
                <input type="text" name="" class="search-input" id="search-bar" onkeyup="myFunction();">
            </div>

            <div class="col-sm"></div>
              <button type="button" class="btn btn-primary"  data-dismiss="modal" data-toggle="modal" data-target="#examplePrices"> <i class="fa fa-plus" aria-hidden="true"></i> NEW CATEGORY</button>
          </div>
</div>



    <div class="bootstrap-data-table-panel" style="margin-top: 20px;" >
                    <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              
                                 <th class="table-header" style="padding-left:30px">No</th>
                                 <th class="table-header">Category Name</th>
                                <th class="table-header">Item</th>  
                                 <th class="table-header">Count</th>
                                <th class="table-header" style="padding-left:30px">Status</th>
                                 <th class="table-header" style="width:110px">Actions</th>
                               
                            </tr>

                        </thead>
                            <tbody id="try-table">

                                <?php 
                            include 'connection.php';
                            $a=1;
                            $result=mysqli_query($link, "SELECT * from maincategory");
                              if ($result->num_rows >0){
                                    while ($row= $result->fetch_assoc()) {
                                        $category=$row['category_name'];

                                        $sql=mysqli_query($link, "SELECT sum(total_supply) as total, count(item_name) as item from inventory where category='$category'");
                                        $count=mysqli_fetch_assoc($sql);
                                        $total_supply=$count['total'];
                                        $items=$count['item'];

                                        if ($total_supply>2000){
                                            $total_supply=$total_supply.'g';
                                        }
                                        $status="";
                                        if (empty($total_supply)){
                                             $total_supply=0;
                                             $status="NOT ACTIVE";
                                        }else{
                                            $status="ACTIVE";
                                        }


                                        if ($total_supply==0){
                                        echo '
                                        <tr ">
                                        <td style="padding-left:30px;">'.$a.'</td>
                                        <td>'.$category.'</td>
                                        <td>'.$items.'</td>
                                        <td>'.$total_supply.'</td>
                                        <td><div id="not-active">&nbsp;&nbsp;<label class="status-label-not">'.$status.'</label></div></td>
                                         <td>  
                                           <button id="edit-button" class="btn btn-success"><a href="" data-toggle="modal" data-target="#editCategory"  class="edit-category" data-name="'.$row["category_name"].'"  data-id="'.$row["id"].'"><i class="fas fa-pencil-alt" style="font-size:14px;"></i></a></button>


                                           <button type="button" class="btn btn-danger" id="delete-button"><a href="" data-toggle="modal" data-target="#modal-delete" data-delete="'.$row["category_name"].'" class="delete-category"><i class="ti-trash"  style="font-size:14px;"></i></td></a></button>
                                        </tr>
                                        ';

                                    

                                        }else{
                                           echo '
                                        <tr >
                                        <td style="padding-left:30px;">'.$a.'</td>
                                        <td>'.$category.'</td>
                                        <td>'.$items.'</td>
                                        <td>'.$total_supply.'</td>
                                        <td class="status"><a href="" data-toggle="modal" data-target="#view-item" class="status-view" data-name="'.$row["category_name"].'">
                                        <div id="active">&nbsp;&nbsp;<label class="status-label">'.$status.'</label></div></a></td>
                                        
                                        <td>  
                                           <button id="edit-button" class="btn btn-success"><a href="" data-toggle="modal" data-target="#editCategory" class="edit-category" data-name="'.$row["category_name"].'" data-id="'.$row["id"].'"><i class="fas fa-pencil-alt" style="font-size:14px;"></i></a></button>


                                           <button type="button" class="btn btn-danger" id="delete-button"><a href="" data-toggle="modal" data-target="#modal-delete" data-delete="'.$row["category_name"].'" class="delete-category"><i class="ti-trash"  style="font-size:14px;"></i></td></a></button>
                                        </tr>
                                        ';  
                                        }
                                            $a++;
                                    }
                                }
                                ?>
                                 
                    </tbody>
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 

     

  

<div class="modal fade" id="examplePrices" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-scrollable"role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">New Item Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
     
                   <div class="row g-3" id="row2-a" style="width:90%; margin-left:3%">
                    <label>Category Name</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="item-name-input" name="category_name_post">

                        </div>
                </div>

    
    </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="save_changes" style="width:100px;">Confirm</button>


      </div>
    </div>
  </div>
</div>
<!-- Modal -->



<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-scrollable"role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Update Category Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
     
                   <div class="row g-3" id="row2-a" style="width:90%; margin-left:3%">
                    <label>Category Name</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="item-name-input-edit" name="category_name_post_edit">
                            <input type="hidden" name="edit-id-category" id="category-id">
                        </div>
                </div>

    
    </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" style="width:100px;" name="update_changes">Update</button>


      </div>
    </div>
  </div>
</div>
<!-- Modal -->

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
       <center><span style="font-size:20px">&nbsp;Are you sure you want to delete this category? </span>
        <input type="hidden" class="form-control" id="item-name-input-delete" name="category_name_post_delete">
        <input type="hidden" name="delete-id-category" id="category-id-delete">
     </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary"  style="width:100px;" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" style="width:100px;" id="button-yes-del" name="delete_category1">DELETE</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="view-item">
  <div class="modal-dialog modal-lg">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelCategory"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
             <div class="bootstrap-data-table-panel">
               
                      <table  id="storage-item-table" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th style="background-color:#343957; color:white;">Item Name</th>
                                    <th style="background-color:#343957; color:white;">Total Qty</th>
                                </tr>

                            </thead>
                            <tbody class="item-view-div">

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

</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->



</section>     


            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->

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


$(".edit-category").click(function () {
var name=$(this).data("name");
var id=$(this).data("id");
    $("#category-id").val(id);
  $("#item-name-input-edit").val(name);


});

$(".delete-category").click(function () {
var name=$(this).data("delete");
var id=$(this).data("id");
   $("#category-id-delete").val(id);
  $("#item-name-input-delete").val(name);

});


$(document).on('click','.status-view',function(e){
    var name=$(this).data("name");
  $("#exampleModalLabelCategory").text(name);

  


 $.ajax({
  url: "codes/functions/category_function.php",
  type: "POST",
  data:{"name":name
      
      
},
success: function(data){    
        $(".item-view-div").html(data); 
           
         
        }
    });
});
</script>