<?php
include 'codes/functions/salesReport_function.php';

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

    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="codes/javascript/JSsupplier.js"></script>

    <link href="codes/design/salesReport_style.css" rel="stylesheet">

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
                    <span class="title-page"> <br>Dashboard / Report</span>
                    </div>
                                
                </div>
<form action="salesReport_table" method="POST">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">


                         <div class="container-title1"><h5>Report of Sales Report</h5></div>

                    <div>
                        <div class="row g-3" id="row1" >
                           
                                <label for="date">Date Range</label>
                           
                            <div class="col-sm" style="margin-left:40px">
                                <label for="date">From: </label>
                                <input  id="date" name="date_from" placeholder="MM/DD/YYY" type="date">  
                            </div>
                            <div class="col-sm" style="margin-left:-20%;">
                                <label for="date">To: </label>
                                <input  id="date" name="date_to" placeholder="MM/DD/YYY" type="date" >  
                            </div>
                        </div>



                        <div class="row g-3" id="row2">
                            
                            <label>Select Category</label>
                             <div class="col-sm" style="margin-left:2%">
                                <select class="form-select" aria-label="Default select example" name="categories">
                                        <option>Select Categories</option>
                                        <option value="All Item Categories">All Categories</option>
                                         <?php
                                        include 'connection.php';

                                        $select= "SELECT * from maincategory";

                                        $result= $link->query($select);

                                            if ($result->num_rows >0){
                                                while ($row= $result->fetch_assoc()) {
                                                    echo "<option value=".$row['category_name'].">".$row['category_name']."</option>";
                                            }
                                        }
                                        ?> 
                                </select>  
                            </div>
                        </div>

       
                        <div class="row g-3" id="row3">
                           <label for="date" style="margin-right:30px;">Select By Batch:</label>  
                            <div class="form-check form-check-inline" style="width:10%">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label for="inlineRadio1">YES</label>
                            </div>
                             <div class="form-check form-check-inline" style="margin-left:-30px;">
                              <input class="form-check-input" type="radio" name="radioNo" id="inlineRadio1" value="option1" <?php if(isset($_POST['radioNo'])) echo "checked='checked'"; ?>>
                              <label for="inlineRadio1">NO</label>
                            </div>
                        </div>

                          <div class="row g-3" id="row4">
                            <input type="submit" value="GENERATE"  name="generate" id="generateReport">
                    </div>






</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->

                  <div class="card" id="tablediv2">
                  

                    <div class="bootstrap-data-table-panel" id="tablediv" >
                    <div class="table-responsive">
                        
                        <div style="text-align: center;">
                            <label style="font-size: 20px;"> Sales Report of <?php echo $_POST['categories'] ?> Items<br>
                            <label style="font-size: 16px;"> From <?php echo $_POST['date_from'] ?> To <?php echo $_POST['date_to'] ?> </label>
                        </div>


                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               
                                <th class="table-header">Item Name</th>
                                <th class="table-header">Cost Per Item</th>
                                <th class="table-header">Qty on Shelves</th>  
                                <th class="table-header">Stock Location</th>
                                <th class="table-header">Reorder Level</th>
                                <th class="table-header">Reorder Quantity</th>
                                <th class="table-header">Reorder Quantity</th>
                                <th class="table-header">Inventory Value</th>
                                <th class="table-header">Actions</th>
                            </tr>
                            <tbody>
                         
                        </thead>
                                 
                    </tbody>
                </table>
                     </div><!-- /# table-responsive -->    
                       <div style="margin-left: 40%;">
                    <button type="button" class="btn btn-primary">Print</button>
                     <button type="button" class="btn btn-primary">Export</button>
                 </div> 
                </div><!-- /# bootstrap-data-table-panel --> 
                
            </div>   

         

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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>




</body>

</html>
