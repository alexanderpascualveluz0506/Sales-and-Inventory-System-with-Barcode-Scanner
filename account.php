<?php
 include 'codes/functions/account_function.php';
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
    <link href="codes/design/account_style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
</head>

  <script src="codes/javascript/clock.js"></script>
<style type="text/css">
#accounts-login{
  overflow-y:auto;
}
</style>
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
                    <div style="height:10px"></div>
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
                    <span class="title-page" style="margin-left:10%"> <br>&nbsp;&nbsp; Dashboard / Accounts </span>
                    </div>
                                
                </div>
<form action="" method="POST">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                 <div class="row" style="margin-left:1%"><h3 class="display-5">Accounts</h3> <div>
                    
                    <?php  
                        $sql = "SELECT * from accounts";
                        $result = mysqli_query($link, $sql);
                        $rowcount = mysqli_num_rows( $result );
                        echo ' <label id="total-label">'.$rowcount.'</label></div>';
                    ?>
                </div>
            

    <div class="row g-3" id="div-for-entries-show" style="width:244%">
       <label class="search-label">Search:</label>
            <div class="col-sm" >
                <input type="text" name="" class="search-input">
            </div>
                <div class="col-sm" style="float:right;padding-right: 0px;">
                    <button type="button" class="btn btn-primary" onclick="window.location.href='addAccount.php'">
                            <i class="ti-plus" style=""><span>&nbsp; &nbsp;ACCOUNT&nbsp;</span></i></button>
                </div>  

                <div class="col-sm">
                    
                </div>      

          </div>
                


    </div><!--/# div-for-entries-show -->

<br>

                                 <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                             
                                
                                <th class="table-header" style="width:12px;">ID</th>
                                <th class="table-header" style="width:20%;">Name</th>
                                <th class="table-header"style="width:40px;">Email</th>
                                <th class="table-header"style="width:40px;">Contact Number</th>
                                <th class="table-header"style="width:40px;">Username</th>
                                <th class="table-header"style="width:40px;">Role</th>
                                <th class="table-header"style="width:15px;">Actions</th>
                            </tr>
                        </thead>
                             <?php
                                showTable();
                             ?>       
                    </tbody>
                                
                         
                     
                                 
                    </tbody>
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 

     

        


</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->



</section>     


            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->



<!-- Modal -->

<div  class="modal fade" id="accounts" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="x-icon">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
              <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    
                        <thead>
                            <tr>
                                <th colspan="2">Basic Account Details</th>
                            </tr>
                        </thead>
                     <tbody id="account">
                            <tr>
                                <td>Account No</td>
                                <td id="account-no-td"></td>

                            </tr>

                            <tr>
                                <td>Lastname</td>
                                <td id="lastname-td"></td>

                            </tr>

                            <tr>
                                <td>Firstname</td>
                                <td id="firstname-td"></td>

                            </tr>

                            <tr>
                                <td>Email</td>
                                <td id="email-td"></td>

                            </tr>
                            

                            <tr>
                                <td>Contact No</td>
                                <td id="contact-td"></td>

                            </tr>
                            
                            
                            <tr>
                                <td>Address</td>
                                <td id="address-td"></td>

                            </tr>

                            <tr id="lgon">
                                <td id="aa">Account Login Details</td>
                                <td id="login-btn"></td>


                            </tr>
                            
                          

                    </tbody>
                     
                </table>
                <input type="hidden" id="item-id">
                 <input type="hidden" id="inv-id">
            </div><!-- /# table-responsive -->     
        </div><!-- /# bootstrap-data-table-panel --> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="button-to-clear3">Close</button>
       <button type="button" class="btn btn-primary" id="update-basic-account-details">Update</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->

<div  class="modal fade" id="accounts-login" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label-part2"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
              <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    
                        <thead>
                            <tr>
                                <th colspan="2">Login Account Details</th>
                            </tr>
                        </thead>
                     <tbody id="account-login">
                              <tr>
                                <td>OTP (sent thru email)</td>
                                <td id="otp-td"><input type="text" class="form-control" id="otp-input">
                                  <center><button type="button" class="btn btn-primary" id="validate-btn">Validate</button></center>
                                </td>

                            </tr>
                    </tbody>
                     
                </table>
          
            </div><!-- /# table-responsive -->     
        </div><!-- /# bootstrap-data-table-panel --> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="button-to-clear2">Close</button>
       <button type="button" class="btn btn-primary" id="update-account-login-details">Update</button>
      </div>
    </div>
  </div>
</div>

<div id="otp-boxs" style="display:none"></div>
<input type="hidden" id="account_name">


<!--modal-->

<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
       <center><span style="font-size:20px">&nbsp;Are you sure you want to delete this account? </span>
        <span id="item-name-del" style="font-size:18px; display: none;" ></span></center>
     </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary"  style="width:100px;" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" style="width:100px;" id="button-yes-del">DELETE</button>
      </div>
    </div>
  </div>
</div>


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
       <center><span style="font-size:20px">&nbsp;Are you sure you want to delete this account? </span>
        <span id="item-name-del" style="font-size:18px; display: none;" ></span></center>
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
    <script src='https://kit.fontawesome.com/a076d05399.js' 
    crossorigin='anonymous'></script>
</body>

</html>

<script type="text/javascript">

$(".hide-account-otp").hide(100);

    $(".view").click(function () {
        var name=$(this).data('account');
        var name2=$(this).data('last');
        var account_name=$("#exampleModalScrollableTitle").text(name+" "+name2);

        var no=$(this).data('no');
        var email=$(this).data('email');
        var contact=$(this).data('contact');
        var address=$(this).data("address");

        $("#account-no-td").text(no);
        $("#lastname-td").html('<input type="text" class="form-control" value='+name2+' id="lastname">');
        $("#firstname-td").html('<input type="text" class="form-control" value='+name+' id="firstname">');
        $("#email-td").html('<input type="email" class="form-control" value='+email+' id="email">');
        $("#contact-td").html('<input type="text" class="form-control" value='+contact+' id="contact">');
        $("#address-td").html('<input type="text" class="form-control" value="'+address+'" id="address">');
        $("#login-btn").html('<a href="#" class="open-new"><button type="button" class="btn btn-success" id="update-account"  data-toggle="modal" data-target="#accounts-login" data-dismiss="modal" data-id='+account_name+' >OPEN ACCOUNT DETAILS</button></a>');
        $("#account_name").val(name+' '+name2);

});



$(document).on('click','#update-account',function(e){
  var email_admin=1;
    $.ajax({
      url: "codes/functions/account_function.php",
      type: "POST",
      data:{"email_admin":email_admin
           
},
success: function(data){    
        $("#otp-boxs").append(data);
        $('#accounts').modal('hide');
        }
    });

});

$(document).on('click','#validate-btn',function(e){
 var otp_value=$("#otp-value").val();
 var otp_input=$("#otp-input").val();
var account_no=$("#account-no-td").text();

    $.ajax({
      url: "codes/functions/account_function.php",
      type: "POST",
      data:{"otp_value":otp_value,
            "otp_input":otp_input,
            "account_no":account_no
           
},
success: function(data){    
        $("#account-login").append(data);
            $(document).on('click','#change-password',function(e){
                $(".hide-account-password").show();
                $(".hide-account-old-pass").hide();
                });

            $(' #confirm-password').on('keyup', function () {
                  if ($('#new-password').val() == $('#confirm-password').val()) {
                    $('#message').html('Password Match').css('color', 'green');
                  } else 
                    $('#message').html('The password does not match').css('color', 'red');
                });


            if (account_no==1){
                 $('#role-select').val("Admin");
            }else{
               $('#role-select').val("Cashier"); 
            }
        }
    });


});


$(document).on('click','.open-new',function(e){
var no=$("#account_name").val(); 

$("#label-part2").text(no);
});


$(document).on('click','#update-basic-account-details',function(e){
        var account_no= $("#account-no-td").text(); 
        var lastname=$("#lastname").val();
        var firstname=$("#firstname").val();
        var email=$("#email").val();
        var contact=$("#contact").val();
        var address=$("#address").val();

    $.ajax({
      url: "codes/functions/account_function.php",
      type: "POST",
      data:{"lastname":lastname,
            "firstname":firstname,
            "email":email,
            "contact":contact,
            "address":address,
            "account_no":account_no
},
success: function(data){    
       window.location.href="account.php";
        }
    });

});

$(document).on('click','#update-account-login-details',function(e){
      var username=$("#username-input").val();
      var new_password=$("#confirm-password").val();
      var role = $("#role-select").val();
      var start=$("#start-time-input").val();
      var end=$("#end-time-input").val();
      var ipaddress=$("#ipaddress-input").val();
      var device=$("#device-input").val();
      var firstname=$("#label-part2").text();
   alert(firstname);
   alert(role);
   alert(start);
   alert(end);
    $.ajax({
      url: "codes/functions/account_function.php",
      type: "POST",
      data:{"username":username,
            "new_password":new_password,
            "role":role,
            "start":start,
            "end":end,
            "ipaddress":ipaddress,
            "device":device, 
            "firstname":firstname


      },
success: function(data){    
       window.location.href="account.php";
        }
    });
    
});

 $("#button-to-clear2").click(function () {
        location.reload(true);

  });  
 $("#x-icon").click(function () {
        location.reload(true);

  });  

  $("#button-to-clear3").click(function () {
        location.reload(true);

  }); 


</script>