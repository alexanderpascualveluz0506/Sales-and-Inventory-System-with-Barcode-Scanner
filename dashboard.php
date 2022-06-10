
<?php 
include 'codes/functions/dashboard_function.php';
selectValuesfromCapacityProperties();



                                $test = isset($_GET['sortBy']) ? $_GET['sortBy'] : '';

                                if (empty($test)){
                                   all();
                                }elseif($test=="day"){
                                    day();
                                }elseif($test=="week"){
                                    week();
                                }
                                elseif($test=="month"){
                                    month();
                                }
                                elseif($test=="year"){
                                    year();
                                }    


include 'sales_chart_dashboard.php';                           
   
?>

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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />

       <link href="codes/design/dashboard_style.css" rel="stylesheet">
 

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
</head>

  <script src="codes/javascript/clock.js"></script>




 
</head>

 <body style="background-color:#f8f9fe" onload=display_ct();>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures"  >
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="dashboard.php">
                    <span>Erlinda's Grocery</span></a></div>
                             <li class="label" style="margin-top: 5%;">Main</li>
                    <li><a class="sidebar-sub-toggle" href="dashboard.php" style="background-color: #6981fb;color:white;"><i class="fas fa-home" ></i>&nbsp; Dashboard </a>
                            
                    </li>

                     <li class="label">Item Management</li>
                       <li><a href="item.php"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Item</a></li>
                        <li><a href="category.php"><i class="fas fa-boxes"></i>&nbsp;&nbsp;Category</a></li>
                             <li><a href="manufacturer.php"><i class="fas fa-dolly-flatbed"></i>&nbsp;&nbsp;Manufacturer</a></li>        
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
                    
                    <div class="row" style="width:150%">        
                            <span class="title-page" style="margin-left:3%"> <br>Dashboard </span>

                            <div class="col-sm" style="margin-top: 1.5%;">
                                   <div class="col-sm float-right" id="button-group-rght" >
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort By</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="dashboard.php">All</a>
                                            <a class="dropdown-item" href="dashboard.php?sortBy=day">Daily</a>
                                            <a class="dropdown-item" href="dashboard.php?sortBy=week">Weekly</a>
                                            <a class="dropdown-item" href="dashboard.php?sortBy=month">Monthly</a>
                                            <a class="dropdown-item" href="dashboard.php?sortBy=year">Yearly</a>
                                        </div>
                                        </div>          
                                    </div>
                                    </div>
                            </div>
                    </div>
                  
                                
                </div>
<form action="" method="POST">
<section id="main-content">
  <br>           
   <div class="bootstrap-data-table-panel">
                    <div class="table-responsive" style="margin-top: -1%;">
                    <table id="sales-table" class="table table-striped table-bordered" style="width:99%; ">
                      
                    <tbody>

                       <tr> <td style="">
                      
                        <label style="margin-top: 4px; font-size: 18px;">Sales Activity</label>


                       </td></tr>
                       <tr> <td>
                               <div class="row">

                        <div class="col-lg-3" id="one">
                            <div class="card">
                                <div class="stat-widget-one" id="widget1">
                                    <div class="stat-icon dib"><i id="icons" class="fas fa-users" style="margin-left:15px"></i>
                                    </div>
                                      <div class="stat-content dib" style="position: absolute;margin-top: -13px;">
                                    <div class="stat-text">No of Customer</div>
                                        <div class="stat-digit"><?php echo $no_of_sales ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i id="icons" class="fas fa-chart-line" ></i>
                                    </div>
                                      <div class="stat-content dib" style="position: absolute;margin-top: -13px;">
                                         <div class="stat-text">Total Sales</div>
                                        <div class="stat-digit"><?php echo $total_sales ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i id="icons" class="fas fa-coins"></i>
                                    </div>
                                      <div class="stat-content dib" style="position: absolute;margin-top: -13px;">
                                       <div class="stat-text">Profit</div>
                                        <div class="stat-digit"><?php echo $profit ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i id="icons" class="fas fa-arrow-left"></i>
                                    
                                    </div>
                                    <div class="stat-content dib" style="position: absolute;margin-top: -13px;">
                                        <div class="stat-text">Return/Refund</div>
                                        <div class="stat-digit"><?php echo $return_total ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        </td></tr>
                    </tbody>
          
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 


   <div class="bootstrap-data-table-panel">
                    <div class="table-responsive" style="margin-top: -1%;">
                    <table id="sales-table" class="table table-striped table-bordered" style="width:99%;" >
                      <thead><th style="background-color: white; font-weight: normal;"><span style="margin-top: 15px; font-size: 16px;">Sales Graph</span>

                        <select class="form-control" aria-label="Default select example" style="width:230px; float:right; font-size: 15px;">
                                  <option value="1">Weekly Sales Report</option>
                                  <option value="2">Every Month Sales Report</option>
                                </select>
                      </th></thead>
                    <tbody style="display:none" id="everymonth" style="height:100px">
                        <td>
                            
                            
                            <canvas id="saleschart" style="width:100%;height:300px;" height="110"></canvas>


                        </td>
                   


                     
                    </tbody>

                     <tbody style="" id="everydayweek">
                        <td>
                            
                            
                            <center><canvas id="saleschartWeek" style="width:100%;height: 300px;"></canvas></center>


                        </td>
                   


                     
                    </tbody>
          
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 
                

                <br>       
<div class="row g-3" style="margin-top: -2%;"> 
    <div class="col-sm" style="width:50%" >   
   <div class="bootstrap-data-table-panel" >
                    <div class="table-responsive">
                    <table id="inventory-table" class="table table-striped table-bordered" >
                      
                    <tbody>

                       <tr> <th colspan="3">Inventory Summary</th></tr>
                       <tr> 
                            <td id="header-td" style="width:8%"><i class="fas fa-warehouse"></i></td>
                            <td style="border-left-style: none; width: 60%;">Qty in Hand</td>
                            <td style="border-left-style: none;"><?php echo $total_qty_in_hand ?></td>
                        </tr>
                         <tr> 
                            <td id="header-td" style="width:8%">&nbsp;<i class="fas fa-clipboard-list"></i></td>
                            <td style="border-left-style: none;">Inventory Value</td>
                            <td style="border-left-style: none;"><?php echo $total_inventory_value ?></td>
                         
                        </tr>
                         <tr> 
                            <td id="header-td" style="width:8%"><i class=" fas fa-boxes"></i></td>
                            <td style="border-left-style: none;">No of Batches</td>
                            <td style="border-left-style: none;"><?php echo $total_batch ?></td>
                        </tr>
                         <tr> 
                            <td id="header-td" style="width:8%"><i class="fas fa-truck"></i></td>
                            <td style="border-left-style: none;">To be Received</td>
                            <td style="border-left-style: none;"><?php echo $total_to_be_received_qty  ?></td>
                        </tr>

                    </tbody>
          
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 
        </div>


         <div class="col-sm" style="width:40%; margin-top:1px;">   
   <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="item-details" class="table table-striped table-bordered" style="width:98%">
                      
                    <tbody>

                      <tr>
                        <th colspan="3" id="itemdetailsTH">Item Details</th>
                        </tr>

                        <tr>
                            <td style="width:60%; border-right-style: none;">
                                <div class="row g-3" style="width:100%; margin-top: 5px;">
                                    <label id="inv-id">All Items</label>
                                  
                                </div>

                                 <div class="row g-3" >
                                    <label id="inv-id">All Item Group</label>
                                    
                                </div>

                                 <div class="row g-3" style="width:100%">
                                    <label id="inv-id">Low Stock Item</label>
                                  
                                </div>

                                 <div class="row g-3" style="width:80%">
                                    <label id="inv-id">Item to Be Expired</label>
                                    
                                </div>

                                <div class="row g-3" style="width:80%">
                                    <label id="inv-id">Out of Stock</label>
                                   
                                </div>

                            </td>

                            <td style="border-style: none;">
                                  <label id="inv-val"><?php echo $total_items ?></label>
                                  <label id="inv-val"><?php echo $total_category ?></label>
                                  <label id="inv-val"><?php echo $total_low_stock_item ?></label>
                                  <label id="inv-val"><?php echo $total_item_to_be_expiered ?></label>
                                   <label id="inv-val"><?php echo $total_out_of_stock ?></label>
                            </td>

                            <td style="width:40%">
                               <center> <label style="color:#6c6c6c"><b>Active Items</b></label></center>
                                <canvas id="myChart" style="width:40px; height: 40px;"></canvas>


                            </td>
                        </tr>

                    </tbody>
          
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 
        </div>
</div>
<style>


</style>


<div class="row" style="margin-top: 3px;"> 
    <div class="col-sm-4"  style="width:50%">   
   <div class="bootstrap-data-table-panel" >
                    <div class="table-responsive">
                    <table id="best-selling" class="table table-striped table-bordered" style="width:190%" >
                      
                    <tbody id="scroll-for-top-selling">

                       <tr> <th colspan="2">Top Best Selling Items</th></tr>

                        <?php  
                      


                                $test = isset($_GET['sortBy']) ? $_GET['sortBy'] : '';

                                if (empty($test)){
                                     AllTopItem();
                                }elseif($test=="day"){
                                    DailyTopItem();
                                }elseif($test=="week"){
                                    WeeklyTopItem();
                                }
                                elseif($test=="month"){
                                    MonthlyTopItem();
                                }
                                elseif($test=="year"){
                                   YearlyTopItem();
                                }    
                        ?>
                    </tbody>
          
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 
        </div>

            <div class="col-sm-4" style="width:25%; margin-top: 5px;" >   
   <div class="bootstrap-data-table-panel" >
                    <div class="table-responsive">
                    <table id="purchase-order" class="table table-striped table-bordered"  >
                      
                    <tbody id="scroll-for-top-selling">

                       <tr> <th >Purchase Order</th></tr>
                         <tr height="8px"></tr>


                       <tr> 
                            <td class="poLabel" ><label class="title-PO"> Quantity Ordered </label><br>
                                <label class="value-PO"><?php echo $total_qty_ordered ?></label>
                            </td>
                            
                        </tr>

                         <tr> 
                           <td class="poLabel"><label class="title-PO"> No of Orders </label><br>
                                <label class="value-PO"><?php echo $total_no_of_orders ?></label>
                            </td>    
                        </tr>

                        <tr> 
                            <td class="poLabel"><label class="title-PO"> Total Cost </label><br>
                               <label class="value-PO">₱ <?php echo $total_cost;?></label>
                            </td>    
                        </tr>

                         <tr> 
                            <td class="poLabel"><label class="title-PO"> Return/Refund Cost </label><br>
                               <label class="value-PO">₱ <?php echo $return_refund_total?></label>
                            </td>    
                        </tr>
                      
                    </tbody>
          
                </table>

             
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 
        </div>

         <div class="col-sm-4" style="width:25%; margin-top: 3px;" >  
            <div class="bootstrap-data-table-panel" >
                    <div class="table-responsive">
                <table id="purchase-order" class="table table-striped table-bordered" >
                      
                    <tbody id="scroll-for-top-selling">

                       <tr> <th >Expenses</th></tr>
                         <tr height="8px"></tr>


                       <tr> 
                            <td class="poLabel" ><label class="title-PO">Total Amount </label><br>
                                <label class="value-PO">₱ <?php echo number_format($total_expenses,2) ?></label>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

              <div class="bootstrap-data-table-panel" >
                    <div class="table-responsive">
                 <table id="purchase-order" class="table table-striped table-bordered" >
                      
                    <tbody id="scroll-for-top-selling">

                       <tr> <th >Warehouse Capacity</th></tr>
                         <tr height="8px"></tr>


                       <tr> 
                            <td style="height:20px;max-height:20px; ;width: 20%;">
                               <canvas id="my" style="width:50px; height: 30px;"></canvas>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        </div>

                  
       
</div>
<br>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</body>

</html>
<script>
var xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var yValues = [<?php echo $january ?>, <?php echo $february ?>, <?php echo $march ?>,<?php echo $april ?>,<?php echo $may ?>, <?php echo $june ?>, <?php echo $july ?>, <?php echo $august ?>,<?php echo $september ?>, <?php echo $october ?>,<?php echo $november ?>, <?php echo $december ?>];
var barColors = ["#9DADC9", "#ED8C79","#A8E3B3"," #F6BF85"," #EDAA98", "#80A0D6", "#E78963", "#C8566B", "#C4A69B", "#AEBFB1", "#FCDBC2","#C2C5D5" ];

new Chart("saleschart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Erlinda's Grocery Month in the Year Sale"
    }
  }
});
</script>
<script>
var xValues = ["Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
var yValues = [<?php echo $sunday ?>,<?php echo $monday ?>,<?php echo $tuesday?>,<?php echo $wednesday ?>,<?php echo $thursday ?>,<?php echo $friday ?>, <?php echo $saturday?>];
var barColors = ["#9DADC9", "#ED8C79","#A8E3B3","#F6BF85"," #EDAA98", "#80A0D6", "#E78963", "#C8566B"];

new Chart("saleschartWeek", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Erlinda's Grocery Current Week Sale"
    }
  }
});
</script>



<script>


var xValues = ["Active", "Not Active", "Not Active", "Active"];
var yValues = [ <?php echo $notactive;?>, <?php echo $active; ?>,];
var barColors = [
"#b91d47",
"#00aba9"



];

new Chart("myChart", {
  type: "doughnut",
  data: {
    
    datasets: [{
  labels: xValues,
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Blue: Active  Red:Not Active"
    }
  }
});


var xValues = ["Utilized Space for Storages", "Total Space for Storage Capacity", ];

var yValues = [ <?php echo $totalStorage_percentage;?>, <?php echo $totalArea_percentage; ?>,];
var barColors = [
"#b91d47",
"#00aba9"

 
];

new Chart("my", {
  type: "doughnut",
  data: {
    
     datasets: [{
  labels: xValues,
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Blue: Utilized Area  Red: Store Total Area "
    }
  }
});

$('select').on('change', function() {


  if (this.value=="1"){
    $("#everymonth").hide();
    $("#everydayweek").show();
  }else{
     $("#everymonth").show().css("height", "100px");
    $("#everydayweek").hide();
  }

});

</script>

<style>

#best-selling{
     border-collapse: separate;
        border-spacing: 0px 6px;
}
#best-selling th{
      background-color: white;
    font-weight: normal;
    font-size: 17px;
    border-style:solid; border-width: 1px;

}
#best-selling tr td{
background-color: white;
font-size: 14.5px;
border-style:solid; border-width: 1px;
}
#sales-table{
     border-collapse: separate;
        border-spacing: 0px 6px;
}
#purchase-order{
     
}
#purchase-order th{
      background-color: white;
    font-weight: normal;
    font-size: 17px;
 

}
#purchase-order tr td{
background-color: white;
font-size: 14.5px;
border-style:solid; border-width: 1px;
}

.poLabel{
  text-align: center;
}
.title-PO{
    padding-top: 12px;
    color:#4a4a4a;
    font-size: 14px;
}
.value-PO{
    font-size: 20px;
    color: #539fd8;
    font-weight: bold;
}
</style>