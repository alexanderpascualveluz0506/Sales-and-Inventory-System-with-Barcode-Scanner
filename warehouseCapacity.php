     <?php
 session_start();
      include 'codes/functions/warehouseCapacity_function.php';
      include 'connection.php';
   
selectValuesfromCapacityProperties();
updateStoreCapacityProperties ();
countNonStorageArea();
showmonth();

$total=$final_area+$nonStorageArea;+$final_storage_area;

global  $totalArea_percentage;
global  $totalNonStorage_percentage;
global   $totalStorage_percentage;


    $totalArea_percentage=round($final_area/$total*100,2);
    $totalNonStorage_percentage=round($nonStorageArea/$total*100,2);
  
    $totalStorage_percentage=round($area_in_storage/$total*100,2);



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
    <link href="codes/design/warehouseCapacity.css" rel="stylesheet">
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
                    <span class="title-page"> <br>Dashboard / Inventory / Warehouse Capacity</span>
                    </div>
                                
                </div>
<form action="" method="POST">

  <section id="main-content">

    <div class="row">
                        <div class="col-lg-3" id="one">
                            <div class="card">
                                <div class="stat-widget-one" id="widget1">
                                    <div class="stat-icon dib"><i class="fas fa-warehouse"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Size of <br>Entire Facility</div>
                                        <div class="stat-digit"><?php echo $sizeOfStore. " ft² "; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fas fa-boxes" id="boxes" ></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Usable Space for Storage</div>
                                        <div class="stat-digit"><?php echo $final_area. " ft² "; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fas fa-dolly"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Utilized Space for Storages</div>
                                        <div class="stat-digit"><?php echo $area_in_storage. " ft² "; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fas fa-box"></i>
                                    <i class="ti-close"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Utilized Space for Non-Storage </div>
                                        <div class="stat-digit"><?php echo $nonStorageArea. " ft² "; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

   
              
                   
            </div><!-- /# card -->
         </div> <!-- /# column -->
    </div> <!-- /# row -->




</section>  


<section id="main-content2">

    <div class="row" id="container1">
        <div class="col-lg-12">
            <div class="card">
              
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


<div class="forchart"><canvas id="myChart" style="width:50%; height: 10%;"></canvas></div>
                

            </div><!-- /# card -->
         </div> <!-- /# column -->
    </div> <!-- /# row -->
</section>     


<section id="main-content3">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
              <div class="row">          
                <h5 class="display-5" style="margin-left:20px">Storages</h5>

                  <?php  
                        include 'connection.php';
                        $sql = "SELECT * from storage";
                        $result = mysqli_query($link, $sql);
                        $rowcount = mysqli_num_rows( $result );
                        echo ' <label id="total-label">'.$rowcount.'</label>';
                    ?>
        
        <div class="col">
      <button type="button" class="btn btn-primary" style="float:right; margin-right: 10px;" onclick="window.location.href='addStorage.php'">
            <i class="ti-plus" style=""><span> STORAGE</span></i></button>
        </div>
       
                </div>
 

    <div class="row"  id="button-group-rght">
        
        <div class="column" style="float:right; margin-right: 10px;width: 120%;" >
          
        </div>
       
   
        </div>
    </div>
    <div class="bootstrap-data-table-panel" style="margin-top:20px" id="form-table"> 
                 
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                       
                                <th class="table-header">Storage Name</th>
                                <th class="table-header">No of Shelves</th>
                                <th class="table-header">Items</th>
                                <th class="table-header">Qty on Storage/Section </th>
                                <th class="table-header" style="width:12%">Actions</th>
                            </tr>

                          
                        </thead>
                    <tbody>
                        <?php 
                        include 'connection.php';
                         $sql=mysqli_query($link, "SELECT * from storage order by storage_no");

                         if ($sql->num_rows>0){
                             while ($row= $sql->fetch_assoc()) {
                                

                                $storage_no=$row["storage_no"];

                                $sqql=mysqli_query($link, "SELECT sum(qty_on_shelf) as total_qty from batch where location='$storage_no'");
                                $rowSumQty=mysqli_fetch_assoc($sqql);
                                $total_qty=$rowSumQty['total_qty'];
                                if (empty($total_qty)){
                                    $total_qty=0;
                                }
                                

                                $sql11=mysqli_query($link, "SELECT count(distinct item_name) as items from batch where location='$storage_no'");
                                $rowCountItem=mysqli_fetch_assoc($sql11);
                                $itemCount=$rowCountItem['items'];
                                
                                
                                $name=$row["name"];

                                if($name=="Vegetable Section"){
                                    $total_qty=$total_qty.'g';
                                }
                                if ($name=="Fruit Section"){
                                      $total_qty=$total_qty.'g';
                                }
                                if($name=="Meat/Poultry Section"){
                                      $total_qty=$total_qty.'g';
                                }

                                if ($row["no_shelves"]>0){
                                    $no_shelves=$row["no_shelves"];
                                }else{
                                    $no_shelves="<span style='color:blue; font-style:italic'>not available</span>";
                                }

                                echo '
                                <tr>
                                    <td>'.$row["name"].'</td>
                                    <td>'.$no_shelves.'</td>
                                    <td>'.$itemCount.'</td>
                                    <td>'.$total_qty.'</td>
                                    <td>
                                     <a href="" data-dismiss="modal" data-toggle="modal" data-target="#location-modal" 
                                    data-storage="'.$row["name"].'" id="view-modal"><button id="view-button" class="btn btn-success"><i class="fas fa-eye" style="font-size:16px; margin-left:-6px;"></i></button></a>

                                    
                                     <button id="delete-button" class="btn btn-success" style="background-color:#dc3545">
                                    <a href="" data-toggle="modal" data-target="#modal-delete" data-name='.$row["name"].'><i class="ti-trash" style="font-size:18px;margin-left:-6px;color:white"></i></a> </button>   
                                   </td>
                                </tr>

                                    ';
                            

                                echo'';




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


</section>   




            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->


<div  class="modal fade" id="location-modal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><label id="storage-name"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" id="close-batch">&times;</span>
        </button>
      </div>
      <div class="modal-body">

  
             <div class="bootstrap-data-table-panel">
               
                      <table  id="storage-item-table" class="table table-striped table-bordered" >
                            <tbody class="storage-div">

                            </tbody>
        
                

                </table>
             
             
                  
            </div><!-- /# bootstrap-data-table-panel --> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-batch">Close</button>
        
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
       <center><span style="font-size:20px">&nbsp;Are you sure you want to delete this Storage/Section? </span>
      
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
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>

</html>
<script>
var xValues = ["Total Space for Storage Capacity", "Utilized Space for Non-Storage Purposes", "Utilized Space for Storages"];

var yValues = [<?php echo $totalArea_percentage; ?>,<?php echo $totalNonStorage_percentage?>, <?php echo $totalStorage_percentage ?>];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      fontSize: 20,
     text: "<?php echo $current_month;?>"
    }
  }
});

$(document).on('click','#view-modal',function(e){
    var name=$(this).data("storage");
  $("#storage-name").text(name);

  var with_shelf="YES";

   if(name=="Vegetable Section" || name=="Fruit Section" || name=="Meat/Poultry Section"){
         with_shelf="NO";
    }else{

    }


 $.ajax({
  url: "codes/functions/warehouse_storage_item_function.php",
  type: "POST",
  data:{"name":name,
        "with_shelf":with_shelf
      
},
success: function(data){    
        $(".storage-div").html(data); 
           
         
        }
    });
});
</script>