
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
                       <li><a href="manufacturer.php"><i class="fas fa-pallet"></i>&nbsp;&nbsp;Manufacturer</a></li>
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
                    <li><a href="report.php" style="background-color:#6880fc;color:white;"><i class="fas fa-print"></i>&nbsp;&nbsp;Reports</a></li>
                    


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


                    <div class="container-title1">
                    <?php
                    $type=$_GET['type'];
                    $result = str_replace('_', ' ', $type);
                    echo "<h5>$result</h5>";
                    ?>
                    </div>



                    <div>
                      
                        <div class="row g-3" id="row1" style="">
                           
                                <label for="date">Date Range</label>
                           
                            <div class="col-sm" style="margin-left:40px">
                                <label for="date">From: </label>
                                <input  id="dateFromid" name="date_from" placeholder="YY/MM/DD" type="date">  
                            </div>
                            <div class="col-sm" style="margin-left:-20%;">
                                <label for="date">To: </label>
                                <input  id="dateToid" name="date_to" placeholder="YY/MM/DD" type="date">  
                            </div>
                        </div>

<div class="item" style="display:none">          
                    <div class="row g-3"  style="margin-left: 23px;" id="row2">
                           
                                <label for="date">Search Category</label>
                           
                            <div class="col-sm" style="margin-left:18px">
                                <input list = "category" class="form-control" style="border-color: #6b6b6b;margin-left: 16px;" id="category-input">
                                    <datalist id = "category" >
                                    <?php
                                    include 'connection.php';
                                    $sql=mysqli_query($link, "SELECT * from maincategory");
                                      while ($row= $sql->fetch_assoc()) {
                                        echo '
                                         <option value="'.$row['category_name'].'"></option>
                                        ';

                                        }
                                    ?>
                                    
                                    </datalist>
                            </div>
                    </div>

                     <div class="row g-3"  style="width: 67%;" id="row2">
                           
                                <label for="date">Search Item </label>
                           
                            <div class="col-sm" style="margin-left:18px">
                                <input list = "item" class="form-control" style="border-color: #6b6b6b;margin-left: 18px;" id="item-input">
                                    <datalist id = "item" >
                                 
                                         <?php
                                    include 'connection.php';
                                    $sql=mysqli_query($link, "SELECT * from items");
                                      while ($row= $sql->fetch_assoc()) {
                                        echo '
                                         <option value="'.$row['item_name'].'">'.$row['barcode'].'</option>
                                        ';

                                        }
                                    ?>
                                    </datalist>
                            </div>
                        </div>

</div>   


<div class="manufacture" style="display:none">          
                    <div class="row g-3"  style="margin-left: 4px;width: 100%;" id="row2" >
                           
                                <label for="date">Search Manufacturer</label>
                           
                            <div class="col-sm" style="margin-left:18px">
                                <input list = "manufacture" class="form-control" style="border-color: #6b6b6b;margin-left: 16px;width: 530px;" id="manufacture-input">
                                    <datalist id = "manufacture" >
                                    <?php
                                    include 'connection.php';
                                    $sql=mysqli_query($link, "SELECT * from manufacturer");
                                      while ($row= $sql->fetch_assoc()) {
                                        echo '
                                         <option value="'.$row['name'].'"></option>
                                        ';

                                        }
                                    ?>
                                    
                                    </datalist>
                            </div>
                    </div>

                     <div class="row g-3"  style="width: 67.3%;" id="row2">
                           
                                <label for="date">Search Brand </label>
                           
                            <div class="col-sm" style="margin-left:18px">
                                <input list = "brand" class="form-control" style="border-color: #6b6b6b;margin-left: 18px;" id="brand-input">
                                    <datalist id = "brand" >
                                 
                                         <?php
                                    include 'connection.php';
                                    $sql=mysqli_query($link, "SELECT * from brand");
                                      while ($row= $sql->fetch_assoc()) {
                                        echo '
                                         <option value="'.$row['brand'].'"></option>
                                        ';

                                        }
                                    ?>
                                    </datalist>
                            </div>
                        </div>

</div>   
                        

                          <div class="row g-3" id="row4">
                            <button type="button"   name="generate" id="generateReport">GENERATE</button>
                    </div>


 


</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->
      
                 
  <div class="row" id="main-result-con" style="width:100%;margin-left: 0%;display: none;">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">


            
  <center><div class="row" style="width:101%; " >
         <div style="text-align: center;width: 100%;margin-bottom: 2%;" id="print-div" >
               <center> <label style="font-size:20px;" id="title"></label><br>
                <span class="aa">To &nbsp;</span><label id="from"></label>
                  <span class="aa">&nbsp; From &nbsp;</span><label id="to"> </label>
            </center>
        </div>
        <div class="col-lg-12" id="result-div" style="margin-top:-4%"> 
           
        </div> <!-- /# column -->
    </div> <!-- /# row -->
 </center>     
                 


</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->
      
   


        <div class="button-group" style="margin-left:40%; margin-top:20px;">

        </div>


            </div><!-- container-fluid end -->
        </div><!-- main content end -->
    </div><!-- content wrap end -->
    <br>
    <br>
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
    <script src='https://kit.fontawesome.com/a076d05399.js' 
    crossorigin='anonymous'></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>




</body>

</html>


<script type="text/javascript">



if($('#type').val() == "Item_Sales_Report"){
  $(".item").show(); 

}


if($('#type').val() == "Item_Manufacturer_Report"){

 $(".manufacture").show();
}


$('#category-input').on('change', function() {

     if (this.value == "") {
    $("#item-input").attr("disabled", false);
  }else{
     $("#item-input").attr("disabled", true);
  }
});


$('#item-input').on('change', function() {

     if (this.value == "") {
    $("#category-input").attr("disabled", false);
  }else{
     $("#category-input").attr("disabled", true);
  }
});


$('#manufacture-input').on('change', function() {

     if (this.value == "") {
    $("#brand-input").attr("disabled", false);
  }else{
     $("#brand-input").attr("disabled", true);
  }
});


$('#brand-input').on('change', function() {

     if (this.value == "") {
    $("#manufacture-input").attr("disabled", false);
  }else{
     $("#manufacture-input").attr("disabled", true);
  }
});



 
$(document).on('click','#generateReport',function(e){
  
var dateFrom=$("#dateFromid").val();
var dateTo=$("#dateToid").val();
var type=$("#type").val();

var itemname=$("#item-input").val();
var category=$("#category-input").val();
var manufacture=$("#manufacture-input").val();
var brand=$("#brand-input").val();


var name = $('#type').val().replace(/[^A-Z0-9]/gi," ");
$("#title").text("Sales Report of "+itemname+" "+category+" "+brand+" "+manufacture+" ");

$("#from").text(dateFrom);
$("#to").text(dateTo);


 $.ajax({
  url: "codes/functions/salesReport_function.php",
  type: "POST",
  data:{"dateFrom":dateFrom,
        "dateTo":dateTo,
        "itemname":itemname,
        "category":category,
        "type":type,
        "manufacture":manufacture,
        "brand":brand

      
},
success: function(data){
            $("#main-result-con").show();                    
            $("#result-div").html(data); 
            $(".button-group").html('<center><button type="button" class="btn btn-primary" id="print" onclick="createPDF()" style="background-color:#0d6efd; color:white"><label style="font-size:16px">PRINT</label></button></center>'); 
         
        }
    });
});



</script>

<script>
    function createPDF() {
        var header =document.getElementById('print-div').innerHTML;
        var sTable = document.getElementById('result-div').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 15px Arial;margin-top:20px;}";
         style = style + "table, th{background-color:white;color:black;height:45px}";
        style = style + "table, th, td {border: solid 1px black; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;line-height:20px}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(header); 
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close();   // CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>