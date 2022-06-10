

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

       <link href="codes/design/dashboard_style.css" rel="stylesheet">
 
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures"  >
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="index.html">
                    <!-- <img src="assets/images/logo.png" alt="" /> --><span>Erlinda's Grocery</span></a></div>
                             <li class="label" style="margin-top: 5%;">Main</li>
                    <li><a class="sidebar-sub-toggle" href="index.html"><i class="fas fa-home" ></i> Dashboard </a>
                            
                    </li>

                     <li class="label">Item Management</li>
                    <li><a class="sidebar-sub-toggle" href="#"><i class="fa fa-barcode"></i> Item <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                           
                            <li><a href="#">Item group</a></li>
                             <li><a href="#">Item</a></li>
                            <li><a href="#">Barcode Generator</a></li>
                            <li><a href="#">Price Rules</a></li>
                        </ul>
                    </li>

                     <li class="label">Inventory Management</li>
                    <li><a class="sidebar-sub-toggle" href="#"><i class="fa fa-archive"></i> Inventory 
                        <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                           
                            <li><a href="#">Warehouse Capacity</a></li>
                             <li><a href="#">Batch Tracking</a></li>
                            <li><a href="#">Barcode Generator</a></li>
                        </ul>
                    </li>

                     <li class="label">Supplier Management</li>
                    <li><a class="sidebar-sub-toggle" href="#"><i class="fa fa-truck"></i>Supplier<span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                           
                            <li><a href="#">Purchase Order</a></li>
                            <li><a href="#">Returns</a></li>
                            
                        </ul>
                    </li>


                    <li class="label">Sales Management</li>
                    <li><a href="#"><i class="ti-stats-up"></i>Sales</a></li>
                    <li><a href="#"><i class="fas fa-cart-arrow-down"></i>Online Orders</a></li>
                    <li><a href="#"><i class="fas fa-cash-register"></i>POS</a></li>


                    <li class="label">Financial Analytics</li>
                    <li><a href="#"><i class="fas fa-coins"></i>Expenses</a></li>            
                    <li><a href="#"><i class="ti-printer"></i>Reports</a></li>
                    


                    <li class="label">Accounts</li>
                    <li><a href="account.php"><i class="ti-id-badge"></i>Employee Accounts</a></li>
                    <li><a href="#"><i class="ti-power-off"></i>Logouts</a></li>            
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Menu for collapsible-->
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>

        <div class="float-right">
            <div class="dropdown dib">
                <div class="header-icon" data-toggle="dropdown" style="margin-left: -30px;">
                    <i class="ti-bell"></i>
                        <div class="drop-down dropdown-menu dropdown-menu-right">
                            <div class="dropdown-content-heading">
                                <span class="text-left">Recent Notifications</span>
                            </div>
                                <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">5 members joined today </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mariam</div>
                                                        <div class="notification-text">likes a photo of you</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Tasnim</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-email" style=""></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="email.html">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/1.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown" id="user">
                                <span class="user-avatar">John
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-lock"></i>
                                                    <span>Lock Screen</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
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
                    <span class="title-page"> <br>Dashboard </span>
                    </div>
                                
                </div>
<form action="" method="POST">
<section id="main-content">


 
   <br>           
   <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="sales-table" class="table table-striped table-bordered" style="width:99%">
                      
                    <tbody>

                       <tr> <td>Sales Activity</td></tr>
                       <tr> <td>
                               <div class="row">

                        <div class="col-lg-3" id="one">
                            <div class="card">
                                <div class="stat-widget-one" id="widget1">
                                    <div class="stat-icon dib"><i id="icons" class="fas fa-receipt"></i>
                                    </div>
                                      <div class="stat-content dib" style="position: absolute;margin-top: -13px;">
                                    <div class="stat-text">No of Sales</div>
                                        <div class="stat-digit">14984984</div>
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
                                        <div class="stat-digit">14984984</div>
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
                                        <div class="stat-digit">14984984</div>
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
                                        <div class="stat-text">Sales Return</div>
                                        <div class="stat-digit">14984984</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        </td></tr>
                    </tbody>
          
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 




                <br>       
<div class="row g-3"> 
    <div class="col-sm" style="width:50%" >   
   <div class="bootstrap-data-table-panel" >
                    <div class="table-responsive">
                    <table id="inventory-table" class="table table-striped table-bordered" >
                      
                    <tbody>

                       <tr> <th colspan="3">Inventory Summary</th></tr>
                       <tr> 
                            <td id="header-td" style="width:8%"><i class="fas fa-warehouse"></i></td>
                            <td style="border-left-style: none; width: 60%;">Qty in Hand</td>
                            <td style="border-left-style: none;">400</td>
                        </tr>
                         <tr> 
                            <td id="header-td" style="width:8%">&nbsp;<i class="fas fa-clipboard-list"></i></td>
                            <td style="border-left-style: none;">Inventory Value</td>
                            <td style="border-left-style: none;">400</td>
                         
                        </tr>
                         <tr> 
                            <td id="header-td" style="width:8%"><i class=" fas fa-boxes"></i></td>
                            <td style="border-left-style: none;">No of Batches</td>
                            <td style="border-left-style: none;">400</td>
                        </tr>
                         <tr> 
                            <td id="header-td" style="width:8%"><i class="fas fa-truck"></i></td>
                            <td style="border-left-style: none;">No of Batches</td>
                            <td style="border-left-style: none;">400</td>
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
                                <div class="row g-3" style="width:80%; margin-top: 5px;">
                                    <label id="inv-id">All Items</label>
                                 <label id="inv-val"> 30</label>
                                </div>

                                 <div class="row g-3" style="width:80%">
                                    <label id="inv-id">All Item Group</label>
                                    <label id="inv-val"> 30</label>
                                </div>

                                 <div class="row g-3" style="width:80%">
                                    <label id="inv-id">Low Stock Item</label>
                                    <label id="inv-val"> 30</label>
                                </div>

                                 <div class="row g-3" style="width:80%">
                                    <label id="inv-id">Item to Be Expired</label>
                                    <label id="inv-val"> 302</label>
                                </div>

                                <div class="row g-3" style="width:80%">
                                    <label id="inv-id">Out of Stock</label>
                                    <label id="inv-val"> 30</label>
                                </div>

                            </td>

                            <td style="width:40%">
                                <canvas id="myChart" style="width:20px; height: 20px;"></canvas>


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


<div class="row" style="margin-top: 20px;"> 
    <div class="col-sm-4"  style="width:50%">   
   <div class="bootstrap-data-table-panel" >
                    <div class="table-responsive">
                    <table id="best-selling" class="table table-striped table-bordered" style="width:190%" >
                      
                    <tbody id="scroll-for-top-selling">

                       <tr> <th colspan="2">Top 5 Best Selling Items</th></tr>

                       <tr> 
                          
                            <td style="border-right-style: none;">Chuncky Cheese Corned Beef Argentina 25mg</td>
                            <td style="width: 20%">30</td>
                        </tr>
                       <tr> 
                           
                           <td style="border-right-style: none;">Chuncky Cheese Corned Beef Argentina 25mg</td>
                            <td>30</td>
                        </tr>

                        <tr> 
                            
                            <td style="border-right-style: none;">Chuncky Cheese Corned Beef Argentina 25mg</td>
                            <td>30</td>
                        </tr>

                        <tr>
                            
                            <td style="border-right-style: none;">Chuncky Cheese Corned Beef Argentina 25mg</td>
                            <td>30</td>
                        </tr>

                        <tr> 
                           
                            <td style="border-right-style: none;">Chuncky Cheese Corned Beef Argentina 25mg</td>
                            <td>30</td>
                        </tr>

                    </tbody>
          
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 
        </div>

            <div class="col-sm-4" style="width:25%" >   
   <div class="bootstrap-data-table-panel" >
                    <div class="table-responsive">
                    <table id="purchase-order" class="table table-striped table-bordered"  >
                      
                    <tbody id="scroll-for-top-selling">

                       <tr> <th >Purchase Order</th></tr>
                         <tr height="8px"></tr>


                       <tr> 
                            <td class="poLabel" ><label class="title-PO"> Quantity Ordered </label><br>
                                <label class="value-PO"> 123049</label>
                            </td>
                            
                        </tr>

                         <tr> 
                           <td class="poLabel"><label class="title-PO"> No of Orders </label><br>
                                <label class="value-PO"> 123049</label>
                            </td>    
                        </tr>

                        <tr> 
                            <td class="poLabel"><label class="title-PO"> Total Cost </label><br>
                               <label class="value-PO">Php 12304.00</label>
                            </td>    
                        </tr>

                         <tr> 
                            <td class="poLabel"><label class="title-PO"> Return/Refund Cost </label><br>
                               <label class="value-PO">Php 12304.00</label>
                            </td>    
                        </tr>
                      
                    </tbody>
          
                </table>

             
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 
        </div>

         <div class="col-sm-4" style="width:25%" >  
            <div class="bootstrap-data-table-panel" >
                    <div class="table-responsive">
                <table id="purchase-order" class="table table-striped table-bordered" >
                      
                    <tbody id="scroll-for-top-selling">

                       <tr> <th >Expenses</th></tr>
                         <tr height="8px"></tr>


                       <tr> 
                            <td class="poLabel" ><label class="title-PO">Total Amount </label><br>
                                <label class="value-PO"> 123049</label>
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
var xValues = ["Active", "Not Active"];
var yValues = [55, 49];
var barColors = [
"#00aba9",
"#b91d47"


];

new Chart("myChart", {
  type: "doughnut",
  data: {
    
    datasets: [{

      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Active Items"
    }
  }
});


var x = ["Active", "Not Active"];
var y = [55, 49];
var Colors = [
"#00aba9",
"#b91d47"


];

new Chart("my", {
  type: "doughnut",
  data: {
    
    datasets: [{

      backgroundColor: Colors,
      data: y
    }]
  },
  options: {
    title: {
      display: true,
      text: "Warehouse Capacity"
    }
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