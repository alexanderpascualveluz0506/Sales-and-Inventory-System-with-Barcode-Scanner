<?php 
 session_start();

$date=date("l j F Y");
$current=$date;
date_default_timezone_set('Asia/Manila');
$time=date("g:i A");

include 'codes/functions/inventory_categorize.php';


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
    <link href="codes/design/inventory_style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
 
</head>
<style>
#batches-div .aaq{
    background-color:#ff9797;
}
#batches-div .aaq1{
    background-color:#C0C0C0;
}
#batches-div .aaq2{
    background-color:#d9fae1;
}

#try-table tr td button{
    background-color: black;
}
#try-table tr td a{
color: black;
}

#try-table .btn-change{
background-color:red;

font-weight: bold;
font-size: 15px;
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
 status1();
                        include 'notif.php';
           
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
                    <span class="title-page"> <br>Dashboard / Inventory List</span>
                    </div>
                                
                </div>
<form action="" method="POST">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
               <div class="row" style="margin-left:1%"><h3 class="display-5">Inventory</h3> <div>

                
                    
                    <?php  
                    include 'connection.php';
                        $sql = "SELECT * from inventory";
                        $result = mysqli_query($link, $sql);
                        $rowcount = mysqli_num_rows( $result );
                        echo ' <label id="total-label">'.$rowcount.'</label></div>';
                    ?>
                </div>
            

    <div class="row g-3" id="div-for-entries-show" style="width:49.5%">
       <label class="search-label" >Search:</label>
            <div class="col-sm">
                <input type="text" id="search-bar" class="search-input" onkeyup="myFunction()">
               
             </div>
                     <div class="col-sm" style="">


                <div class="dropdown">
                          
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=" width:80%;">
                       Categorize
                      </button>
                      <div class="dropdown-menu col-xs-12" aria-labelledby="dropdownMenuButton" style=" width: 35%;">
                        <?php 
                            include 'connection.php';

                            $result=mysqli_query($link, "SELECT * from maincategory");
                            if ($result->num_rows >0){
                                    echo '
                                             <a class="dropdown-item" href="inventory.php">All</a>
                                        ';
                                while ($row= $result->fetch_assoc()) {
                                    $category=$row["category_name"];
                                        echo '
                                             <a class="dropdown-item" href="inventory.php?category='.$category.'">'.$category.'</a>
                                        ';

                                }

                            }

                        ?>
                      </div>
                    </div> 


            </div>
            </div>
             
          


    </div>

    
        
      

  

  
    <div class="row g-3" id="div-for-entries-show"> 


        <div style="width:20px; height: 20px; margin-top: 3px;" id="reorder-level-box"></div>
        <label style="margin-left:10px; margin-top: 1px;">Reorder Level</label>

         <div style="width:20px; height: 20px; margin-top: 3px;" id="lower-stock-box"></div>
        <label style="margin-left:10px; margin-top: 1px;">Lower Stock</label>

         <div style="width:20px; height: 20px; margin-top: 3px;" id="no-stock-box"></div>
        <label style="margin-left:10px; margin-top: 1px;">No Stock</label>

            <div style="width:20px; height: 20px; margin-top: 3px;" id="batches-box"></div>
        <label style="margin-left:10px; margin-top: 1px;">Stock Alert</label>

             <div style="width:20px; height: 20px; margin-top: 3px;" id="replesnish-box"></div>
        <label style="margin-left:10px; margin-top: 1px;">Replenishment Level</label>




</div>

    <div class="bootstrap-data-table-panel" id="form-table">
                    
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="border-style: solid;border-color: #adadad;">
                        <thead>
                            <tr>
                               
                                <th class="table-header">Item Name</th> 
                                <th class="table-header" style="width: 6%;">Total Supply</th>  
                                <th class="table-header" style="width: 10%;"><center>Stock In Count</center></th>
                                  <th class="table-header" style="width: 10%;"><center>Stocks Out</center></th>
                                <th class="table-header" style="width: 10%;"><center>Reorder Level</center></th>
                                <th class="table-header" style="width: 9%;"><center>Reorder Qty</center></th>
                                <th class="table-header" style="width: 9%;"><center>Qty on Shelf</center></th>                               
                                <th class="table-header" style="width: 7%;"><center>Replenish Level</center></th>
                                <th class="table-header"  style="width: 8%;"><center>Inventory Value</center></th>
                                <th class="table-header" style="width: 13%;"><center>Actions</center></th>
                                <th class="table-header" style="width: 13%;display: none;" ><center>Actions</center></th>
                            </tr>
                          </thead>
                            <tbody id="try-table">
                         
                      
                                <?php 

                                     $test = isset($_GET['category']) ? $_GET['category'] : '';
                                        $item_name = isset($_GET['item_name']) ? $_GET['item_name'] : '';

                                     if(!empty($test)){
                                           categorize();
                                     }elseif(!empty($item_name)){
                                        alert();
                                     }
                                     else{
                                            All();
                                     }

                                         
   
                                        ?>                        
                    </tbody>
                </table>
                     
                </div><!-- /# bootstrap-data-table-panel --> 

<!-- Modal -->

<div  class="modal fade" id="examplePricesTables" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><label id="item-name"></label></h5>
        <input type="hidden" name="item_name" id=for-name>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        
                    <table id="inventory-details" class="table table-striped table-bordered">
                      
                    <tbody>

                

            
             <thead>
                            <th colspan="2">Item Inventory Details
                              
                            </th>
                        </thead>
                    <tbody>

                    
                        <tr>
                            <td>Item Category</td>
                            <td id="item-category"></td>
                         </tr>
                        <tr>
                            <td>Qty on Hand</td>
                            <td id="qty-on-hand"></td>
                         </tr>
                        <tr>
                            <td>Qty on Shelf</td>
                            <td id="qty-on-sale"></td>
                         </tr>
                         <tr>
                            <td>Damaged Quantity</td>
                            <td id="damaged-quantity"></td>
                         </tr>

                        <tr>
                            <td>Damaged Cost</td>
                            <td id="damaged-cost"></td>
                         </tr>
                        <tr>

                            <td>Inventory Value</td>
                            <td id="inventory-value"></td>
                         </tr>

                          <tr>

                            <td>Storage Location</td>
                            <td id="location"></td>
                         </tr>

                        <tr>
   
                       </tbody>
         </table>
               


       <button type="button" class="btn btn-primary" style="float: right; margin-right: 1%;" id="edit-button">Edit</button>
       <button type="button" class="btn btn-primary" data-toggle="modal"  data-dismiss="modal"
        data-target="#view-suggestion-reorder" style="float: right;margin-right: 1.5%;" id="view-suggestion-button" >View Suggestion</button>
            <br>
               <table id="inventory-details" class="table table-striped table-bordered" style="margin-top: 3%">
                      
                    <tbody>
  
                        <tr>
                            <td>Reorder Level</td>
                            <td>
                            <div id="reorder-level"></div>                    
                            </td>
                         </tr>
                        <tr>
                            <td>Reorder Quantity</td>
                            <td>
                            <div id="reorder-qty"></div>
                            </td>  
                        </tr>

                        <tr>
                            <td>Replenishment Level</td>
                            <td>
                            <div id="replenishment-qty"></div>
                            </td>  
                        </tr>

                      
              
                       </tbody>
         </table>
                       

      
                     
                 
                       
              

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
     
<!--Modal-->
<div class="modal fade" id="add-new-stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-view">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row g-3" style="margin-left:16%;">
                <label>Stock In No</label>
                    <div class="col-sm">
                        <?php
                            include 'connection.php';
                            $result = mysqli_query($link, "SELECT * FROM batch");
                            $rows = mysqli_num_rows($result);
                               $rows+=1;
                               $batch=100+$rows;
                               $final_batch="stockIn-".$batch;
                            echo " <input type='text' class='form-control' value='$final_batch' style='width: 89%;' id='batch_no'/>";
                        ?>                       
                    </div>
            </div> 
             <div class="row g-3" style="margin-left:20%;">
                <label>Quantity</label>
                    <div class="col-sm">
                        <input type="number" class="form-control" style="width: 84%;" id="quantity"/>  
                    </div>
            </div> 
             <div class="row g-3">
                <label>Damaged Item</label>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="damage_qty" />  
                    </div>
            </div> 
            <div class="row g-3" style="margin-left: 18%;">
                <label>Total Cost</label>
                    <div class="col-sm">
                        <input type="text" class="form-control"style="width: 88%;" id="cost" />  
                    </div>
            </div>
            <div class="row g-3" id="expiration" style="margin-left: 10%;">
              <label>Expiration Date</label>
              <div class='col-sm'><input type='date' id='expiration_date' class='form-control' style='width:102%'/>  </div>
            </div>

            <div class="row g-3"  style="margin-left: 14.5%;">
              <label>Selling Price</label>
              <div class='col-sm'><input type='text' id='sellingPrice' class='form-control' style='width:95%'/>  </div>

            </div>

          


            <input type="hidden" id="item_name_for_batch" name="item_name_batch">
            <input type="hidden" id="item_name_for_barcode" name="item_name_barcode">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-view2">Close</button>
        <button type="button" class="btn btn-primary" name="add_new_batch" id="add-new-batch-button">Add New Batch</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal-->


    
<?php include 'getdatainventory.php';  ?>
        

<!-- Modal -->

<div  class="modal fade" id="batches" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><label id="item-name-for-batch"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" id="close-batch">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    <div class="row" id="alert-div" style="margin-top:0%">

        <div style="width:20px; height: 20px; margin-top: 3px;" id="expired"></div>
        <label style="margin-left:10px; margin-top: 1px;">Expired Item</label>

         <div style="width:20px; height: 20px; margin-top: 3px;" id="to-expired"></div>
        <label style="margin-left:10px; margin-top: 1px;">To be Expired in 3 days</label>
    </div>

             <div class="bootstrap-data-table-panel" style="margin-top:0.5%" >
                    <div class="table-responsive">
                    <table id="batch-item" class="table table-striped table-bordered">
                         <thead>
                            <tr>
                                <th class="table-header">Stock In No</th>  
                                <th class="table-header">Price</th>
                                <th class="table-header">Date Created</th>
                                <th class="table-header">Expiration Date</th>
                                <th class="table-header">Total Stock</th>
                                <th class="table-header">Qty Sold</th>
                                 <th class="table-header">Remaining</th>
                                <th class="table-header">On Shelf</th>
                                  <th class="table-header"></th>
                             
                               

                            </tr>
                          </thead>
                    <tbody id="batches-div">

                    </tbody>
        
                

                </table>
                <input type="hidden" id="category-value" name="category_input">
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-batch">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- Modal -->




</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->



</section>     


            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->

</form>


     
<!--Modal-->
<div class="modal fade" id="view-suggestion-reorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
              <h5 class="modal-title" ><label id="item-name-for-reorder"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="generate-x">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <input type="hidden" id="perishable">
                       <div class="row g-3" style="margin-left: 34%;">
                     <a href="#" id="generate-based-on-record" data-record="record" style="text-decoration: underline;text-decoration-color: blue;">Generate Based on Store Record</a>
               </div>

                 <center><label style="margin-top:1%">OR</label></center>

            <div style=" margin-left: 2%;" style="width:80%">
              <div class="row g-3" style="margin-top:1%">
                <label class="col-sm">Daily Demand</label>
                <div class="col-sm"  style="margin-left:-60%"> 
                  <input type="text" class="form-control" id="demand-input">
                </div>
              </div>

               <div class="row g-3" style="margin-top:1.4%; margin-left:.7%">
                <label class="col-sm" style="margin-top:-1%;">Lead Time <span style="font-size:14px; color:blue"><br>(no of days)</span></label>
                <div class="col-sm" style="margin-left:-65%">
                  <input type="text" class="form-control" id="lead-time-input">
                </div>
              </div>
     
              <center> <a href="#" id="generate-assume" style="margin-top:1%;text-decoration:underline;text-decoration-color: blue;">Generate Now</a></center>
              

               <div id="result-reorder" style="margin-left: 24.6%; margin-top:2%">

               </div>

      </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-toggle="modal"  data-dismiss="modal"
         id="close-for-generate">Close</button>
        
      </div>
    </div>
  </div>
</div>


<!-- Modal-->
<div  class="modal fade" id="on-shelf-modal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><label id="per-batch-label"></label>:&nbsp;<label id="per-batch-label-itemName"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

                    <table id="add-qty-shelf-table" class="table table-striped table-bordered" style="width:98.5%; margin-left: 1%;">
                         <thead>
                            <tr>
                                <th class="table-header" colspan="2">Stock Details</th>  
                            </tr>
                          </thead>
                    <tbody >
                            <tr>
                                <td>Total Stock Remaining</td>
                                <td  id="stock-remaining"></td>
                            </tr>
                                <tr>
                                <td>Qty not on shelf</span></td>
                                <td  id="not-on-shelf"></td>
                            </tr>
                             <tr>
                                <td>Current Qty on Shelf </td>
                                <td>
                                    <div class="row" style="margin-left:0%">
                                    <label id="current-qty-shelf" style="margin-top:4px"></label>
                                    &nbsp;&nbsp; 
                                    <i class='fas fa-plus' style="margin-top:7px"> &nbsp;&nbsp; </i> &nbsp;&nbsp; 
                                     <input type="text" class="form-control" id="add-qty-to-shelve-input" 
                                     style="width: 30%;" value="0"></td>
                                </div>
                            </tr>
                             <tr>
                                <td>Replenishment Level</td>
                                <td id="replenishment-td">
                                   
                                    <span id="replenishment-level-input"></span>
                                </td>
                            </tr>

                            <tr style="display:none" id="per-row">
                                <td>Perishable After</td>
                                <td id="perishable-td">
                                   <input type="date" class="form-control" id="Expiration" name="expiration" style="width:50%">
                                 
                                </td>
                            </tr>  
  

                    </tbody>
        
                </table>

                <div id="YES-monitor">
                    <table id="add-qty-shelf-table" class="table table-striped table-bordered" style="width:98.5%; margin-left: 1%;">
                         <thead>
                            <tr>
                                <th class="table-header" colspan="2">Location</th>  
                            </tr>
                          </thead>
                    <tbody >
                         
                        
                         
                      
                            <tr>
                                <td>Storage Location</span></td>
                                <td  id="not-on-shelf">
                                    <select class="form-select" aria-label="Default select example" id="storage" name="storage_name" style="height:35px;width: 100%;">
                                       <option value="" disabled selected hidden>Choose Storage Location</option>
                                     <?php  
                                     include 'connection.php';
                                     $sql="SELECT * from storage where storage_no<100";
                                      $result= $link->query($sql);

                                        if ($result->num_rows >0){
                                            while ($row= $result->fetch_assoc()) {
                                                if ($row['storage_no']<100){
                                                echo '<option style="font-size:16px" value='.$row['storage_no'].'>'.$row['name'].'</option>';
                                                }else{
                                                    echo '<option style="font-size:16px" value='.$row["name"].'>'.$row['name'].'</option>';
                                                }
                                            }
                                        }

                                     $sql="SELECT * from storage where storage_no>100";
                                      $result= $link->query($sql);

                                        if ($result->num_rows >0){
                                            while ($row= $result->fetch_assoc()) {
                                                echo '<option style="font-size:16px" value='.$row['storage_no'].'> '.$row['name'].'</option>';
                                            }
                                        }
                                     ?>
                                    </select>
                                </td>
                            </tr>
                           

                             <tr>
                                <td>Shelves Name</span></td>
                                <td  id="not-on-shelf">
                                    <select class="form-select" aria-label="Default select example" style="height:35px;width: 100%;" id="shelves" name="shelves_name">
                                             <option value="" disabled selected hidden>Choose Shelves Location</option>

                                             <?php   
                                                $sql="SELECT * from shelves";
                                                $result= $link->query($sql);

                                                if ($result->num_rows >0){
                                                 while ($row= $result->fetch_assoc()) {
                                                echo '<option style="font-size:16px" value='.$row['shelves_name'].'>'.$row['shelves_name'].' '.$row['position'].'</option>';

                                           
                                             
                                            }
                                        }


                                             ?>
                                    </select>
                                </td>
                            </tr>
                    </tbody>
                </table>
         
            </div>    
            
               
            
  <input type="hidden" class="form-control" id="length-input" >
 <input type="hidden" class="form-control" id="width-input" >
 <input type="hidden" class="form-control" id="height-input" >   
  <input type="hidden" class="form-control" id="monitor-input" >
 
      </div>
     <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-toggle="modal"  data-dismiss="modal"
                 id="close-for-generate">Close</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" id="save-changes-for-add-qtyShelf" >Save Changes</button>
                
              </div>
    </div>
  </div>
</div>

<!-- Modal-->
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
       <center><span style="font-size:19px">&nbsp;Are you sure you want to delete this item inventory? </span>
      <span id="item-name-del" style="font-size:18px;display: none;"></span></center>
     </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary"  style="width:100px;" data-dismiss="modal">CANCEL</button>
        <button type="button" class="btn btn-danger" style="width:100px;" id="button-yes-del">DELETE</button>
      </div>
    </div>
  </div>
</div>

<!--Modal-->



<!--modal-->

<div class="modal fade" id="modal-delete-batch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
       <center><span id="batch-delete" style="font-size: 18px; display: none"></span>
        <span id="item-name-del-batch" style="font-size: 18px; display: none"></span>
        <span style="font-size:20px">&nbsp;Are you sure you want to delete this batch? </span>
    </center>
     </div>
       <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary"  style="width:100px;" data-dismiss="modal">CANCEL</button>
        <button type="button" class="btn btn-danger" style="width:100px;" id="button-yes-del-batch">DELETE</button>
      </div>
    </div>
  </div>
</div>

<!--Modal-->


<div class="modal fade" id="price-changes-tab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
              <h5 class="modal-title" ><label id="prices-label-batch"></label>:&nbsp;<label id="prices-label-itemname"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="generate-label">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <table id="prices-table-change" class="table table-striped table-bordered" style="width:98.5%; margin-left: 1%;">
                         <thead>
                            <tr>
                                <th class="table-header" colspan="2">Pricing Details
                                    <i class="fas fa-edit" id="edit-price" style="color:white;float: right; font-size: 24px;"></i>
                                </th>  
                            </tr>
                          </thead>
                    <tbody id="current-div-price">
                         <tr>
                            <td>Cost Per Piece</td>
                            <td id="cost-per-unit-field"></td>
                        </tr>
                         <tr>
                            <td>Current Selling Price</td>
                            <td id="selling-price-field"></td>
                        </tr>
                      </tbody>
        


                    <tbody style="display:none" id="div-for-price-change">
                       <tr>
                            <td>New Selling Price</td>
                            <td><input type="text" class="form-control" id="new-price" style="width:70%"></td>
                        </tr>
                        <tr style="line-height:20px">
                            <td>Price Rule Type</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" id="select-rule">
                                  <option value="">Open this select menu</option>
                                  <option value="Discount (Near to Expire)">Discount (Near to Expire)</option>
                                  <option value="Price Markup">Price Markup</option>
                                  <option value="Price Mardown">Price Markdown</option>
                                </select>
                         <br><div id="href-for-suugested"></div>
                            </td>
                        </tr>

          
                        <tr>
                             <td>Price Floor</td>
                            <td>
                               <div class="input-group input-group-sm mb-3">
                                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  id="price-floor-input">
                                  <span class="input-group-text">%</span>
                            </div>

                            </td>
                        </tr>

                         <tr>
                             <td>Price Ceiling</td>
                            <td>
                               <div class="input-group input-group-sm mb-3">
                                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  id="price-ceiling-input">
                                  <span class="input-group-text">%</span>
                            </div>

                            </td>
                        </tr>


                         <tr>
                            <td>Min Price</td>
                            <td id="min-price-input">0.00</td>
                        </tr>

                        <tr>
                            <td>Max Price</td>
                            <td id="max-price-input">0.00</td>
                        </tr>
                        

                    </tbody>

                        <thead>
                            
                            <th colspan="2">Barcode
                            <i class="fas fa-edit" id="edit-price-barcode-label" style="color:white;float: right; font-size: 24px;"></i>
                            </th>
                        </thead>

                            <tbody id="current-barcode">
                                <tr>
                                    <td>Current Barcode</td>
                                    <td id="current-barcode-td">Barcode</td>
                                </tr>

                                 <tr>
                                    <td>Barcode Label</td>
                                    <td id="label-barcode-td">
                                        
                                        <div id="result-image-label"></div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody id="edit-label-barcode" style="display:none">
                          <tr>
                            <td >New Barcode</td>
                            <td>
                                
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" aria-describedby="button-addon2" style="width:50%" 
                                  id="barcode-field">
                                  <button class="btn btn-info" type="button" id="button-generate-barcode" style="width:30%">Randomize</button>
                                </div>

                            </td>
                        </tr>

                        <tr>
                        <td>Select Barcode Type</td>
                        <td>
                            <div class="form-group">
                   
                        <select name="barcodeType" id="barcodeType" class="form-control">
                         <option value="CODE128">CODE128 auto</option>
                          <option value="CODE128A">CODE128 A</option>
                          <option value="CODE128B">CODE128 B</option>
                          <option value="CODE128C">CODE128 C</option>
                          <option value="EAN13">EAN13</option>                      
                        </select> 
                             </div>
                
                        </td>
                        </tr>

                        <tr>
                           <td>Show Text</td>
                           <td>
                        <div class="form-group">
                         <select name="showText" id="showText" class="form-control" required>
                             <option value="false">No</option>  
                            <option value="true">Yes</option>
                                                        
                        </select>
                        </div>
                         <center><button type="button" class="btn btn-info" 
                        id="generateBarcode" name="generateBarcode">Generate</button></center>
                     </td>
               
                        </tr>

                    <tr>
                        <td>Barcode Image</td>
                        <td>
                            <label style="color:blue;font-style: italic;" id="label-display">Barcode Will Display Here</label>
                            <div id="result-barcode"><center><img src="" id="barcode1" style="width:250px; height: 80px;display: none;">
                            </center></div>  

                        </td>

                    </tr>
                    </tbody>

                </table>

     
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-toggle="modal"  data-dismiss="modal"
         id="close-for-label">Close</button>
         <button type="button" class="btn btn-primary" id="save-changes-label" style="display:none">Save Changes</button>
     
      </div>
    </div>
  </div>
</div>




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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
    <script src="select2/dist/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
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
$(document).ready(function() {
    $("#try-table tr").each(function(){
    var status =$(this).find("td:eq(10)").text();
 
     if (status=="Replenish"){
       $(this).css('background-color','#fdfd96'); 
       $(this ).css('color','black');

    
      
   }

     if (status == "Reorder Level"){
      $(this).css('background-color','#FFCCCC'); 
       $(this ).css('color','black');
             
    }

     if (status =="Lower Stock"){
      $(this).css('background-color','#c9a0dc'); 
       $(this ).css('color','black');
              
    }

     if (status =="No Stock"){
      $(this).css('background-color','#eeeeee'); 
       $(this ).css('color','black');
              
    }
  });   


});

  
           



$(".view").click(function () {

    var name = $(this).data('name'); 
    $('#item-name').text(name); 
    $('#for-name').val(name); 

   $("#item-name-for-reorder").text(name); 


    var barcode = $(this).data('barcode');   
    $('#item-barcode').text(barcode); 


    var qty=$(this).data('qty');
    $('#qty-on-hand').text(qty); 

    var level=$(this).data('rlevel');
    $('#reorder-level').text(level); 

    var rqty=$(this).data('rqty');
    $('#reorder-qty').text(rqty); 

    var replenishment=$(this).data('replenishment');
    $('#replenishment-qty').text(replenishment);

    var damage=$(this).data('damaged');
    $('#damaged-quantity').text(damage); 

    var value=$(this).data('value');
    $('#inventory-value').text("Php "+value+".00"); 


    var category=$(this).data('category');
    $('#item-category').text(category); 

    var perishable=$(this).data('perishable');
   $('#perishable').val(perishable);

    var qty_on_shelf=$(this).data('shelf'); 
    $("#qty-on-sale").text(qty_on_shelf);

    var damaged_cost=$(this).data('costpiece');
    $("#damaged-cost").text(damaged_cost);
   
    var location=$(this).data('location');

    $("#location").text(location)
                           
   
});
$(".view-count").click(function () {
   var name = $(this).data("name");
    $('#item-name-for-batch').text(name); 
 

var monitor=$(this).data("monitor");
 $('#monitor').val(monitor); 


   
});


$(".add").one('click', function () {

    var perishable = $(this).data('perishable');
    var name= $(this).data('name');
    $("#item_name_for_batch").val(name);

    var barcode= $(this).data('barcode');
    $("#item_name_for_barcode").val(barcode);

  
   
});
$("#edit-button").on('click', function () { 
     
 $(".modal-footer").html("<button type='submit' class='btn btn-primary' id='reloadbtn' name='save_changes'>Save Changes</button>"); 


var rlevel = $("#reorder-level").text();
$('#reorder-level').empty(); 
$("#reorder-level").append('<input class="form-control" name="reorder_level_input" type="text" value=' +rlevel+ '>');

var rquantity = $("#reorder-qty").text(); 
$('#reorder-qty').empty();

$("#reorder-qty").append('<input class="form-control" name="reorder_quantity_input" type="text" value=' +rquantity+ '>');



var replenishment=$("#replenishment-qty").text();
$('#replenishment-qty').empty();

$("#replenishment-qty").append('<input class="form-control" name="replenishment_quantity_input" type="text" value=' +replenishment+ '>');

});
$(document).on('click','#batch_count',function(e){
  
 var itemname=$('#item-name-for-batch').text(); 


 $.ajax({
  url: "getdatainventory.php",
  type: "POST",
  data:{"myData":itemname
      
},
success: function(data){   
            $("#batches-div").html(data); 

        
        }
    });
});


           
      


$(document).on('click','#add-new-batch-button',function(e){
  
var category=$(".add").data('category');
var batch_no=$("#batch_no").val();
var item_name_for_batch=$("#item_name_for_batch").val();
var item_name_for_barcode=$("#item_name_for_barcode").val();
var qty_batch=$("#quantity").val();
var damage_qty=$("#damage_qty").val();
var cost_batch=$("#cost").val();
var expiration_date=$("#expiration_date").val();
var selling_price=$("#sellingPrice").val();



 $.ajax({
  url: "getdatainventory.php",
  type: "POST",
  data:{"category":category, 
        "batch_no":batch_no,
        "item_name_for_batch":item_name_for_batch,
        "item_name_for_barcode":item_name_for_barcode,
        "qty_batch":qty_batch,
        "damage_qty":damage_qty,
        "cost_batch":cost_batch,
        "expiration_date":expiration_date,
        "selling_price":selling_price
      
},
success: function(data){                    
        location.reload();
        }
    });
});

$(document).on('click','#generate-assume',function(e){

var perishable=$("#perishable").val();
var demand=$("#demand-input").val();
var lead_time=$("#lead-time-input").val();



 $.ajax({
  url: "getdatainventory.php",
  type: "POST",
  data:{"perishable":perishable,
        "demand":demand,
        "lead_time":lead_time
      
      
},
success: function(data){                    
        $("#result-reorder").html(data);
        }
    });
});

$(document).on('click','#generate-based-on-record',function(e){

var perishable=$("#perishable").val();
var record="record";
var itemname=$("#item-name-for-reorder").text();

 $.ajax({
  url: "getdatainventory.php",
  type: "POST",
  data:{"perishable_record":perishable,
        "record":record, 
        "itemname_record":itemname
      
      
},
success: function(data){                    
        $("#result-reorder").html(data);

        }
    });
});
$("#generate-x").one('click', function () { 
$("#result-reorder").empty();
});

$("#close-for-generate").one('click', function () { 
$("#result-reorder").empty();


});

$("#close-batch").one('click', function () { 
$("#item-name-for-reorder").empty();
$("#modal-body").empty();

});
$("#close-for-generate").on('click', function () { 

 window.location.replace("inventory.php");


});

$(document).on('click','.plus-for-on-shelf',function(e){
var storage=$(this).data("storage");
var shelves=$(this).data("shelves");
var name=$(this).data("name");
var qtyOnshelf=$(this).data("onshelf");
var batch_no=$(this).data("batch");
var remaining=$(this).data("left");
var replenishment=$(this).data("replenishment");
var expiration=$(this).data("expiration");

$("#Expiration").val(expiration);
var perishable=$(this).data("perishable");

if (perishable=="YES"){
$("#per-row").show();
}


var notOnShelf=parseInt(remaining)-parseInt(qtyOnshelf);



$("#per-batch-label").text(batch_no);
$("#per-batch-label-itemName").text(name);
$("#stock-remaining").text(remaining);
$("#not-on-shelf").text(notOnShelf);
$("#current-qty-shelf").text(qtyOnshelf);   

$('#storage').val(storage);
$('#shelves').val(shelves);


$("#replenishment-level-input").text(replenishment);



});


$(document).on('click','#save-changes-for-add-qtyShelf',function(e){

var replenishment_batch=$("#replenishment-level-input").text();
var batch_no_per_batch=$("#per-batch-label").text();
var batch_item_name=$("#per-batch-label-itemName").text();
var add_new_qty=$("#add-qty-to-shelve-input").val();
var current_qty=$("#current-qty-shelf").text();
var total_supply_shelf_for_storage=(+add_new_qty)+(+current_qty);

var shelves=$('select[name="shelves_name"]').val();
var storage=$('select[name="storage_name"]').val();
var expiration_date=$("#Expiration").val();



 $.ajax({
  url: "getdatainventory.php",
  type: "POST",
  data:{"replenishment_batch":replenishment_batch,
        "batch_no_per_batch":batch_no_per_batch,
        "batch_item_name":batch_item_name,
        "total_supply_shelf_for_storage":total_supply_shelf_for_storage,
        "shelves":shelves,
        "storage":storage,
        "add_new_qty":add_new_qty,
        "expiration_date":expiration_date
      
      
      
},
success: function(data){                    
    location.reload(true);
        }
    });
});


$(document).on('change','#storage',function(e){

var storage_result=$('select[name="storage_name"]').val();
var add_new_qty=$("#add-qty-to-shelve-input").val();
var current_qty=$("#current-qty-shelf").text();


var total_supply_shelf=(+add_new_qty)+(+current_qty);

$('#shelves option').remove();


 $.ajax({
  url: "getdatainventory.php",
  type: "POST",
  data:{"storage_result":storage_result, 
        "total_supply_shelf":total_supply_shelf,
        "add_new_qty":add_new_qty,
      
},
success: function(data){                    
   $("#shelves").append(data);
    
        }
    });
});

$(document).on('click','#view-tab-price',function(e){
                             
        var price=$(this).data("price");
        var cost=$(this).data("cost");
        var barcode=$(this).data("barcode");
        var batch_no=$(this).data("batch");
        var name=$(this).data("name");
        var image=$(this).data("image");

         $("#result-image-label").empty();
             if (image=="no barcode image available"){
         $("#label-barcode-td").text('no barcode label available').css("color", "blue");
        }else{
        $("#result-image-label").append('<img src='+image+' width="230px" height="80px">');
        $("#result-image-label").append('<br><button type="button" class="btn btn-primary" id="print-barcode-btn" style="margin-left:12%">Print Barcode</button>');

        $("#print-barcode-btn").click(function () {
            window.open('print_label.php?name='+name+'&price='+price.toFixed(2)+'&image='+image+'', '_blank');
        });



        }

        if (barcode=="no barcode available"){  
        $("#current-barcode-td").text('no barcode available').css("color", "blue");    
        }
        $("#current-barcode-td").text(barcode);  


        $("#cost-per-unit-field").text(cost.toFixed(2));
        $("#selling-price-field").text(price.toFixed(2))

        $("#prices-label-batch").text(batch_no);
        $("#prices-label-itemname").text(name);

       
});

$(document).on('change','#select-rule',function(e){
    if($(this).val()=="Price Markup"){
       var itemname=$("#prices-label-itemname").text();
       var batch=$("#prices-label-batch").text();

     
     

    }else{
        $("#suggested-label").hide();
         $("#href-for-suugested").empty();
    }

});
$("#price-floor-input").keyup(function(){
  var cost=$("#cost-per-unit-field").text();
  var cost_convert=parseFloat(cost);
  var floor=$(this).val();

  $("#min-price-input").empty();
    var a = parseFloat(cost);
    var b = parseFloat(floor);
    var floor_final=(b/100)*a;
    var c = a + floor_final;

   $("#min-price-input").text(c.toFixed(2)).css("color", "blue");
  
});

$("#price-ceiling-input").keyup(function(){
  var cost=$("#cost-per-unit-field").text();
  var cost_convert=parseFloat(cost);
  var ceiling=$(this).val();

  $("#max-price-input").empty();
    var a = parseFloat(cost);
    var b = parseFloat(ceiling);
    var ceil_final=(b/100)*a;
    var c = a + ceil_final;

   $("#max-price-input").text(c.toFixed(2)).css("color", "blue");
  
});

$(document).on('click','#button-generate-barcode',function(e){
 var val1 = Math.floor(100000 + Math.random() * 999999);
   var val2 = Math.floor(10000 + Math.random() * 99999);
 $('#barcode-field').val('7'+val1+val2);    
       
});

 $('document').ready(function() {
    $('#generateBarcode').on('click', function() {  
        $("#label-display").hide();
        $("#barcode1").show();
        $("#print-barcode-btn").show();

        var barcodeValue = $("#barcode-field").val();
        var barcodeType = $("#barcodeType").val();  
        var showText = $("#showText").val();  
        $("#barcode-display-label").empty();  

        JsBarcode("#barcode1", barcodeValue, {
            format: barcodeType,
            displayValue: showText,
            lineColor: "#24292e",
            width:2,
            height:40,  
            fontSize: 20                    
        });   

      
       var file=$('#barcode1').attr('src');
      
    });
   });
$(document).one('click','#edit-price-barcode-label',function(e){
$('#current-barcode').hide();
  $("#edit-label-barcode").show();
  $("#save-changes-label").show();
       
});

$(document).on('click','#edit-price',function(e){
        $("#div-for-price-change").show();
        var price=$(this).data("price");
        var cost=$(this).data("cost");
          $("#save-changes-label").show();
       
});


$(document).on('click','#save-changes-label',function(e){
       var itemname= $("#prices-label-itemname").text();
       var batch_no=$("#prices-label-batch").text();
       var selectType=$("#select-rule").val();
       var newPrice=$("#new-price").val();
       var oldPrice=$("#selling-price-field").text();


       var barcodeNew=$("#barcode-field").val();
       var file=$('#barcode1').attr('src');
            

 $.ajax({
  url: "getdatainventory.php",
  type: "POST",
  data:{"itemname":itemname,
        "batch_no":batch_no,
        "selectType":selectType,
        "newPrice":newPrice,
        "oldPrice":oldPrice,
        "barcodeNew":barcodeNew,
        "file":file
      
},
success: function(data){                    
          location.reload();      
    
        }
    });
});

$('#price-changes-tab').on('hidden.bs.modal', function (e) {
   $("#edit-label-barcode").hide();
  $("#save-changes-label").hide();
  $("#div-for-price-change").hide();
    
});


$("#generate-label").on('click', function () { 
location.reload();
});

$("#close-for-label").on('click', function () { 
location.reload();
});

$("#close-view").on('click', function () { 
location.reload();
});

$("#close-view2").on('click', function () { 
location.reload();
});

$(".delete-item").click(function () {
    var itemname=$(this).data('name');
    $("#item-name-del").text(itemname);


});

$(document).on('click','#button-yes-del',function(e){

 var itemname_for_inv=$("#item-name-del").text();

 $.ajax({
  url: "codes/functions/delete_function.php",
  type: "POST",
  data:{"itemname_for_inv":itemname_for_inv
      
},
success: function(data){ 
            location.reload();

      
        }
    });

});

$(document).on('click','.delete-item-btn-batch',function(e){

    var itemname=$(this).data('name');
    $("#item-name-del-batch").text(itemname);
    var batch=$(this).data('batch');
    $("#batch-delete").text(batch);

});
$(document).on('click','#button-yes-del-batch',function(e){

 var itemname_for_batch=$("#item-name-del-batch").text();
 var batch_for_batch= $("#batch-delete").text();

 $.ajax({
  url: "codes/functions/delete_function.php",
  type: "POST",
  data:{"itemname_for_batch":itemname_for_batch,
        "batch_for_batch":batch_for_batch
      
},
success: function(data){ 
            location.reload();

      
        }
    });

});


    </script>

