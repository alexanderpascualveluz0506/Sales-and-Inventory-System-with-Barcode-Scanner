<?php
include 'codes/functions/add_account_function.php';
?>
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
    <link href="codes/design/addAcount_style.css" rel="stylesheet">
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
                    <li><a href="account.php"  style="background-color:#6880fc;color:white;"><i class="fas fa-id-card" ></i>&nbsp;&nbsp;Accounts</a></li>
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
                    <div style="height:12px"></div>
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
                    <span class="title-page"> <br>Dashboard / Accounts / Add New Account<br></span>
                    </div>
                                
                </div>
<form action="" method="POST" enctype="multipart/form-data">

  <section id="main-content1" style="width:99%">

    <div class="row" id="container1">
        <div class="col-lg-12">
            <div class="card">
                  <!-- picture properties-->
        <div class="row">
            <div class="container-title1"><h5><i class="fa fa-user">&nbsp;&nbsp;</i>Account Basic Information</h5></div>
                   
        </div>

      <br>


    <!--firstname-->
   <div class="row g-3" id="row1">
          <label>Firstname</label>
          <div class="col-sm">
            <input type="text" class="form-control"  name="firstname-input">
          </div>
          
          <label>Lastname</label>
            <div class="col-sm">
                <input type="text" class="form-control" name="lastname-input" >
            </div>
    </div>
    <!--firstname and lastname end here-->
  
    <!-- email-->
    <div class="row g-3" id="row2">
         <label>Email</label>
          <div class="col-sm">
            <input type="email" class="form-control"  name="email-input">
          </div>
          <label>Contact No</label>
          <div class="col-sm">
            <input type="text" class="form-control"  name="contact-input">
          </div>

    </div>
    <!--email end here-->

    <!--Address -->
     <div class="row g-3" id="row3">
         <label>Address </label>
          <div class="col-sm">
            <input type="text" class="form-control"  name="address-input">
          <br>
          </div>
    </div>
    <!-- Address end here -->

    
   

            </div><!-- /# card -->
         </div> <!-- /# column -->
    </div> <!-- /# row -->
</section>     



                    <section id="main-content" style="width:99%">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
               <div class="row">
             <div class="container-title1"><h5><i class="fa fa-lock">&nbsp;&nbsp;</i>Account Login Information</h5></div>
    </div>
  
                 <!-- Username AND ACCES ROLE -->
<br>
<div class="input-group mb-3" id="row4-a">
      <label>Access Role &nbsp; &nbsp;</label>    
  <select class="custom-select" id="inputGroupSelect02" name="role-input" required>
    <option selected>Choose...</option>
    <option value="Admin">Admin</option>
    <option value="Cashier">Cashier</option>
  </select>
</div>


    <div class="row g-3" id="row4-b">
           <label>Username</label>
          <div class="col-sm">
             <div class="input-group mb-2" >
                <div class="input-group-prepend">
                     <div class="input-group-text">@</div>
                </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" name="username-input">
        </div>
    </div>
</div>

    <!-- username end and acess role end here-->

    <!-- Password and Pass again -->
    <div class="row g-3" id="row5">
         <label>Password</label>
          <div class="col-sm">
            <input type="email" class="form-control"  name="password-input" id="pass1">
          </div>
          <label>Password Again</label>
          <div class="col-sm">
            <input type="text" class="form-control"  name="pass-again" id="pass2">
            <span id="message"></span>
          </div>
    </div>
    <!-- end of password and pass again -->

  


    <!--Ip address ands device name-->
         <div class="row g-3" id="row7">
               <label>Ip Address</label>
                  <div class="col-sm">
                      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="ipaddress-input">
                  </div>
                  <label style="margin-left:1.6%">Device Name</label>
                  <div class="col-sm">
                      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="device-name-input"><br>
                  </div>
          </div>
    <!--Ip address and device name end here-->
     
   
                 


            </div><!-- /# card -->
         </div> <!-- /# column -->
    </div> <!-- /# row -->
      <input type="submit" value="SAVE" class="save-button" name="save_account" style="margin-top: 1%;margin-bottom: 1%; margin-left: 80%;">
</section> 
 
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
    $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
      });

$(' #pass2').on('keyup', function () {
  if ($('#pass1').val() == $('#pass2').val()) {
    $('#message').html('Password Match').css('color', 'green');
  } else 
    $('#message').html('The password does not match').css('color', 'red');
});
</script>