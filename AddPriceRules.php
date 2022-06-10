
<!DOCTYPE html>
<html lang="en">
<style>

</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="codes/design/AddPriceRules_style.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/lib/choices.min.css">
<script src="assets/js/lib/choices.min.js"></script>

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

                       <li><a class="sidebar-sub-toggle" href="#"><i class="fa fa-archive"></i>Inventory<span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                           
                            <li><a href="#">Capacity</a></li>
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
                    <li><a href="account.php" class="active" style="background-color: 
                    #5b75fd; color: white;"><i class="ti-id-badge"></i>Employee Accounts</a></li>
                    <li><a href="#"><i class="ti-power-off"></i>Logouts</a></li>            
            </div>
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
                                <i class="ti-email"></i>
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
                    <span class="title-page"> <br>Dashboard / Supplier / Warehouse Capacity</span>
                    </div>
                                
                </div>
<form action="" method="POST">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
 
                  <div class="row g-3">
                    <label>Price Rule Type</label>
                        <div class="col-sm">
                               <div class="input-group-append">
                             <select class="custom-select" id="inputGroupSelect04">
                                <option value="">Select Price Rules</option>
                                <option value="Discount (Near to Expire)">Discount (Near to Expire)</option>
                                <option value="Price Markup">Price Markup</option>
                                <option value="Price Markup">Price Markdown</option>

                                
                          </select>
                      </div>
                        </div>
                </div>

                <div class="row g-3">
                    <label>Rule Name</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="item-name-input">
                        </div>
                </div>

                <div class="row g-3">
                            <label>Description</label>
                        <div class="col-sm">
                             <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                        
                </div>
                    
                <div class="row g-3">           
                            <labeL>Start Date</labeL>
                                <div class="col-sm">
                                        <input type="date" id="Expiration" name="birthday">
                                </div>
                </div>
        
                <div class="row g-3">           
                            <labeL>End Date</labeL>
                                <div class="col-sm">
                                        <input type="date" id="Expiration" name="birthday">
                                </div>
                    </div>


                <div class="row g-3">
                    <label>Percent Off</label>
                     <div class="col-sm">
                            <input type="number" class="form-control" id="item-name-input">
                        </div>
                </div>

                    <div class="row g-3">
                        <label>Select Items</label>    
                            <div class="col-sm">
                                <select id="choices-multiple-remove-button" placeholder="Select upto 5 tags" class="try" multiple>
                                    <option value="HTML">HTML</option>
                                    <option value="Jquery">Jquery</option>
                                    <option value="CSS">CSS</option>
                                    <option value="Bootstrap 3">Bootstrap 3</option>
                                    <option value="Bootstrap 4">Bootstrap 4</option>
                                    <option value="Java">Java</option>
                                    <option value="Javascript">Javascript</option>
                                    <option value="Angular">Angular</option>
                                    <option value="Python">Python</option>
                                    <option value="Hybris">Hybris</option>
                                    <option value="SQL">SQL</option>
                                    <option value="NOSQL">NOSQL</option>
                                    <option value="NodeJS">NodeJS</option>
                                </select>
                            </div>

                    </div>

                  
                    


                     <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="table-header"><input type="checkbox" id="maincheckbox" name="vehicle1" value="Bike"></th>
                                 <th class="table-header">Name</th>
                                 <th class="table-header">Quantity to Sale</th>
                                <th class="table-header">Current Price</th>  
                                 <th class="table-header"> Discount Percentage</th>
                                <th class="table-header">Discounted Price</th>

                            </tr>
                            <tbody>
                        
                        </thead>
                                 
                    </tbody>
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 


                        
</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->
 
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
<script type="text/javascript">
    $(document).ready(function(){

var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
removeItemButton: true,
maxItemCount:5,
searchResultLimit:5,
renderChoiceLimit:5
});

});


</script>