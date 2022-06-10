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
        <link href="select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


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
<?php
$type=$_GET['type'];
echo "<input type='hidden' id='type' value='$type'>";

?>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                    <span class="title-page"> <br>Dashboard / Report</span>
                    </div>
                                
                </div>
<form action="" method="POST">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">


                    <div class="container-title1"><h5>Price Rules Report</h5></div>

                    <div>
                        <div class="row g-3" id="row1" style="margin-top: 7%;">
                           
                                <label for="date">Date Range</label>
                           
                            <div class="col-sm" style="margin-left:40px">
                                <label for="date">From &nbsp;</label>
                                <input  id="date" name="date_from" value="<?php echo $date_from?>"placeholder="MM/DD/YYY" type="date">  
                            </div>
                            <div class="col-sm" style="margin-left:-20%;">
                                <label for="date">To &nbsp; </label>
                                <input  id="date" name="date_to" placeholder="MM/DD/YYY" type="date" value="<?php echo $date_to?>" >  
                            </div>
                        </div>

                        

                        <div class="row g-3" id="row2">
                            
                            <label>Item Category &nbsp;</label>
                             <div class="col-sm" style="margin-left:2%">
                                <select class="form-select" aria-label="Default select example" name="categories" id="categoriesSelect">
                                        <option value="">Select Categories</option>
                                        <option value="All Categories">All</option>
                                         <?php
                                        include 'connection.php';

                                        $select= "SELECT * from expense_type";

                                        $result= $link->query($select);

                                            if ($result->num_rows >0){
                                                while ($row= $result->fetch_assoc()) {
                                                    echo "<option value=".$row['expense_type'].">".$row['expense_type']."</option>";
                                            }
                                        }
                                        ?> 
                                </select>  
                            </div>
                        </div>

                                    <div class="row g-3" id="row23" style="margin-left:4.5%; margin-top:2.7%; width: 70.4%;">
                           <label for="date" style="margin-right:30px;">Search By Item</label>  
                           <div class="col-sm" style="margin-left:-1%; height: 50px;">
                                <input list="browsers" name="browser" style="height:36px; width: 100%;" id="selectItem">
                                  <datalist id="browsers" style="width:100%">
                                    <option value="Internet Explorer">
                                    <option value="Firefox">
                                    <option value="Chrome">
                                    <option value="Opera">
                                    <option value="Safari">
                                  </datalist>
                        </div>
                    </div>




                           <div class="row g-3" id="row2" style="margin-left: 10.7%; width: 64%;margin-top: 1.5%;">
                            <label for="date" style="margin-right:30px;">Status</label>  
                           <div class="col-sm" style="margin-left:-1%">
                                <select class="form-select" aria-label="Default select example" name="categories">
                                        <option value="">All</option>
                                        <option value="Cash">With Sales</option>
                                        <option value="Cash">Without Sales</option>

                                </select>  
                        </div>
                    </div>


        
       
                        <div class="row g-3" id="row3" style="margin-top:1.8%">
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
        <div id="tablediv2" style="margin-left:2%; width: 100%;" style="display:none; background-color: white;">
                 <br>

                    <div class="bootstrap-data-table-panel" id="tablediv" >
                    <div class="table-responsive">
                        <div style="text-align: center;" >
                            <label style="font-size: 20px;">  <?php if (!empty($_POST['categories'])){
                                echo "Purchase Order Report ".$_POST['categories']. " Item";
                            } ?><br>
                            <label style="font-size: 16px;"><?php if (!empty($_POST['date_from'])){
                                echo "From ".$_POST['date_from'];
                            } ?> <?php if (!empty($_POST['date_to'])){
                                echo "To ".$_POST['date_to'];
                            } ?></label>
                        </div>

               <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                
                                
                            </tr>
                        </thead>
                            <tbody>
                                
                            
                                 
                    </tbody>
                </table>
                     </div><!-- /# table-responsive -->    
                     
                </div><!-- /# bootstrap-data-table-panel --> 
                
            </div>    
          
                 
 

               

  


            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->
</section>   
     

</form>
                   
<!-- Modal -->


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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>





</body>

</html>
<script type="text/javascript">
 var type=document.getElementById("type").value;   
 if (type=="summaryReport"){

}else if(type=="dailyReport"){
   var gfg_down =document.getElementById("row1").style.display="none";   
    var b=document.getElementById("row2").style.marginTop="5%"; 
}
else if(type=="weeklyReport"){
   var gfg_down =document.getElementById("row1").style.display="none";   
    var b=document.getElementById("row2").style.marginTop="5%"; 
}

else if(type=="monthlyReport"){
   var gfg_down =document.getElementById("row1").style.display="none";   
    var b=document.getElementById("row2").style.marginTop="5%"; 
}
else if(type=="yearlyReport"){
   var gfg_down =document.getElementById("row1").style.display="none";   
    var b=document.getElementById("row2").style.marginTop="5%"; 
}

function aa(){
}
</script>

<script type="text/javascript">
$('#categoriesSelect').on('change', function() {
  if (this.value == "") {
    $("#selectItem").attr("disabled", false);
  }else{
     $("#selectItem").attr("disabled", true);
  }

 
});
$('#selectItem').on('change', function() {

     if (this.value == "") {
    $("#categoriesSelect").attr("disabled", false);
  }else{
     $("#categoriesSelect").attr("disabled", true);
  }
});
  $("#generateReport").click(function(){
    if (this.value == "GENERATE") {
    $("#tablediv2").show();
    $("#bootstrap-data-table-export").show();
 
  }
  });

   $(".js-example-basic-single").select2({
    dropdownParent: $("#row23")
    });

   $('select').selectize({
          sortField: 'text'
      });




</script>

