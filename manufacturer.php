<?php include 'codes/functions/manufacturer_function.php';?>
<?php 
 session_start();


?>
<?php  
include 'connection.php';


if (isset($_POST['save_post'])){
    echo "aaaa";
}
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


      <style>
    .btn-result{
        width: 30px;
        border-radius: 50%;
        background-color:#004953;
        color: white;
        border-style: none;
        height: 28px;
    }
     .btn-result1{
        width: 30px;
        border-radius: 50%;
        background-color:#0047ab;
        color: white;
        border-style: none;
        height: 28px;
    }
</style>
 
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
                     <li><a href="manufacturer.php"><i class="fas fa-pallet"></i>&nbsp;&nbsp;Manufacturer</a></li> 

                

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

   

                  <div class="float-right" style="width: 68%;margin-top: 15px;padding-right: -10px;margin-left: 30px;" >    
                     <center><span id='ct' style="margin-top: 18px;color:white;margin-left: 130px;"></span></center>
                       

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
                    <span class="title-page"> <br>Dashboard / Category</span>
                    </div>
                                
                </div>
<form action="" method="POST">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                  <div class="row" style="margin-left:1%"><h3 class="display-5">Manufacturer</h3><div>
                   <?php  
                        $sql = "SELECT * from manufacturer";
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
              <button type="button" class="btn btn-primary"  data-dismiss="modal" data-toggle="modal" data-target="#examplePrices"> <i class="fa fa-plus" aria-hidden="true"></i>  MANUFACTURER</button>
          </div>
</div>



    <div class="bootstrap-data-table-panel" style="margin-top: 20px;" >
                    <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size:15px">
                        <thead>
                            <tr>
                              
                                 <th class="table-header" style="padding-left:20px"><center>No</center></th>
                                 <th class="table-header">Manufacturer Name</th>
                                 <th class="table-header"><center>Brands</center></th>
                                <th class="table-header"><center>Items</center></th>  
                              
                                 <th class="table-header"><center>Actions</center></th>
                               
                            </tr>

                        </thead>
                            <tbody id="try-table">
  <?php 
                            include 'connection.php';
                            $a=1;
                            $result=mysqli_query($link, "SELECT * from manufacturer");
                              if ($result->num_rows >0){
                                    while ($row= $result->fetch_assoc()) {
                                        $manu=$row["name"];

                                       $sql2=mysqli_query($link, "SELECT count(*) as total from brand where manufacturer='$manu'");
                                       $rows=mysqli_fetch_assoc($sql2);
                                       $total=$rows['total'];

                                       $sql3=mysqli_query($link, "SELECT count(*) as totalitem from items where manufacturer='$manu'");
                                       $rows3=mysqli_fetch_assoc($sql3);
                                       $item=$rows3['totalitem'];

                                       echo '<tr>';

                                       echo '<td><center>'.$a.'</center></td>';
                                       echo '<td>'.$row['name'].'</td>';
                                        echo '<td><center><a href="" id="brand-view" data-toggle="modal" data-target="#modal-brand" data-name="'.$row['name'].'"><button class="btn-result">'.$total.'</button></a></center></td>';



                                         echo "<td><center><a href='' id='item-view' data-name='".$row['name']."' data-toggle='modal' data-target='#modal-item'><button class='btn-result1'>".$item."</button></a></center></td>";
                                      
                                             echo "  <td><center>
           <a href='' data-toggle='modal' data-target='#add-brand' data-name='".$row['name']."'
           class='add'><button id='add-button' class='btn btn-success' style='width:30px;height:32px'><i class='fa fa-plus' style='font-size:16px;margin-left:-4px' ></i></button></a>

         

                  <a href=''data-toggle='modal' data-target='#modal-delete' data-name='".$row["name"]."' class='delete-item'><button type='button' class='btn btn-danger' id='delete-button'><i class='ti-trash'  style='font-size:16px;margin-left:-6px'></i></button></a></center></td>
         ";
         $a++;                                    }

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

        <h5 class="modal-title" id="exampleModalLongTitle">New Manufacturer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
     
                   <div class="row g-3" id="row2-a" style="width:90%; margin-left:3%">
                    <label>Manufacturer Name:</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="item-manu-input" name="manufacturer_name_post">

                        </div>
                </div>

    
    </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="save_changes" name="save_post_new" style="width:100px;">Confirm</button>


      </div>
    </div>
  </div>
</div>
<!-- Modal -->



<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-scrollable"role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Update Manufacturer Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
     
                   <div class="row g-3" id="row2-a" style="width:90%; margin-left:3%">
                    <label>Manufacturer Name</label>
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
       <center><span style="font-size:20px">&nbsp;Are you sure you want to delete this manufacturer? </span>
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

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="add-brand">
  <div class="modal-dialog" >
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelManu"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
    <input type="hidden" name="manu_brand" id="hiddenmanu">
               <div class="row" style="width:96%; margin-top:10px;margin-left: 14px;">
                <label for="inputPassword" class="col">New Brand</label>
                <div class="col" style="margin-left:-230px;">
                  <input type="text" class="form-control" name="brandname_input[]">
                    <a href="" class="new-input">Add New Brand</a>
                </div>
              </div>


              <div id="new-input-div">

                </div>
               
     </div>



      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" style="width:150px;" name="save_changes">Save Changes</button>
      </div>
    </div>
  </div>
</div>

</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->



</section>    


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="view-info">
<div class="modal-dialog" style="max-width: 75%;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelManuInfo"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
            <div id="view-table">

            </div>
     </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-brand">
<div class="modal-dialog" style="max-width: 75%;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titlebrand"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
            <div id="view-table-brand">

            </div>
     </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-item">
<div class="modal-dialog" style="max-width: 75%;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="item-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
            <div id="view-table-item">

            </div>
     </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

</form>
            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->

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





$(document).on('click','.add',function(e){
    e.preventDefault();
   var name=$(this).data("name");
   $("#exampleModalLabelManu").text(name);
 $("#hiddenmanu").val(name);

});
$(document).on('click','.view',function(e){
   var name=$(this).data("name");
   $("#exampleModalLabelManuInfo").text(name);
 var name1=$(this).data("name");

 $.ajax({
  url: "codes/functions/manufacturer_function.php",
  type: "POST",
  data:{"name1":name1

      
},
success: function(data){    
         $("#view-table").html(data);   
       
        }
    });

});



$(document).on('click','.new-input',function(e){
   e.preventDefault();
 $(".new-input").remove();
       $("#new-input-div").append('  <div class="row" style="width:96%; margin-top:10px;margin-left: 14px;"><label for="inputPassword" class="col">New Brand</label><div class="col" style="margin-left:-230px;"><input type="text" class="form-control" name="brandname_input[]"><a href="" class="new-input">Add New Brand</a></div></div>');
 
});

$(document).on('click','#brand-view',function(e){
   var name=$(this).data("name");
   $("#titlebrand").text(name);
 var nameforbrand=$(this).data("name");

 $.ajax({
  url: "codes/functions/manufacturer_function.php",
  type: "POST",
  data:{"nameforbrand":nameforbrand

      
},
success: function(data){    
         $("#view-table-brand").html(data);   
       
        }
    });

});
$(document).on('click','#item-view',function(e){
   var name=$(this).data("name");
    $("#item-title").text(name);
 var nameforitem=$(this).data("name");

 $.ajax({
  url: "codes/functions/manufacturer_function.php",
  type: "POST",
  data:{"nameforitem":nameforitem

      
},
success: function(data){    
         $("#view-table-item").html(data);   
       
        }
    });

});

</script>


