<?php 
 include 'codes/functions/expenseReport_function.php';
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
    <link href="codes/design/salesReport_style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 
</head>
<style type="text/css">
thead.table-header{
position: sticky;
top: 0;

}
#form-table{
    margin-top: -1%;
 height:370px;   
  overflow-y:auto;
  
}
#maintable{
      overflow-y:hidden;
      font-size: 13px;
}


/* Hide scrollbar for Chrome, Safari and Opera */
#form-table::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
#form-table {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures"  >
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="index.html">
                    <!-- <img src="assets/images/logo.png" alt="" /> --><span>Erlinda's Grocery</span></a></div>
                             <li class="label" style="margin-top: 5%;">Main</li>
                    <li><a href="dashboard.php"><i class="fas fa-home"></i>Dashboard</a></li>
                            
                    </li>

                     <li class="label">Item Management</li>
                        <li><a class="sidebar-sub-toggle" href="#"><i class="fa fa-barcode"></i> Item 
                            <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                           
                            <li><a href="category.php">Item Category</a></li>
                             <li><a href="item.php">Item</a></li>
                            
                        </ul>
                    </li>

                     <li class="label">Inventory Management</li>
                    <li><a class="sidebar-sub-toggle" href="#"><i class="fa fa-archive"></i> Inventory 
                        <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="inventory.php">Stocks</a></li>
                            <li><a href="batchTracking.php">Batch Tracking</a></li>
                            <li><a href="warehouseCapacity.php">Warehouse Capacity</a></li> 
                        </ul>
                    </li>

                     <li class="label">Supplier Management</li>
                    <li><a class="sidebar-sub-toggle" href="#"><i class="fa fa-truck"></i>Supplier<span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                           
                            <li><a href="purchaseOrder.php">Purchase Order</a></li>
                            <li><a href="supplier.php">Suppliers</a></li>
                            <li><a href="return.php">Returns</a></li>
                            
                        </ul>
                    </li>


                    <li class="label">Sales Management</li>
                    <li><a href="sales.php"><i class="ti-stats-up"></i>Sales</a></li>
                    <li><a href="pos.php"><i class="fas fa-cash-register"></i>Sales Order</a></li>


                    <li class="label">Financial Analytics</li>
                    <li><a href="expense.php"><i class="fas fa-coins"></i>Expenses</a></li>            
                    <li><a href="report.php"><i class="ti-printer"></i>Reports</a></li>
                    


                    <li class="label">Accounts</li>
                    <li><a href="account.php"><i class="ti-id-badge"></i>Accounts</a></li>
                    <li><a href="login.php"><i class="ti-power-off"></i>Logouts</a></li>            
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
                    <div style="height:10px"></div>
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
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
                    <div style="text-align: center;width: 100%;margin-bottom: 1%;" id="print-div" >
               <center> <label style="font-size:20px;" id="title"></label><br>
                <label id="from"></label>
                <label id="to"> </label>
            </center>
        </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
            <canvas id="myChart"></canvas>

  <div class="row" style="width:101%; ">
   
        <div class="col-lg-12" id="result-div">

            
</div> <!-- /# column -->
</div> <!-- /# row -->

</div> <!--/# l-lcog-4 p-l-0 title-margin-left -->
</div><!-- /# card -->
</div> <!-- /# column -->
</div> <!-- /# row -->
      
   


        <div class="button-group" style="margin-left: 39%; margin-top:20px;">

        </div>


</div><!-- container-fluid end -->
</div><!-- main content end -->
 </div><!-- content wrap end -->
 <br><br>
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</body>


</html>
<script type="text/javascript"> 
$(document).on('click','#generateReport',function(e){

var dateFrom=$("#dateFromid").val();
var dateTo=$("#dateToid").val();


var type=$("#type").val();
if (type=="Expense_Graphical_Report"){
    var name = $('#type').val().replace(/[^A-Z0-9]/gi," ");
        $("#title").text("Expenses Report");
        $("#from").text("From"+" "+ dateFrom);
        $("#to").text("To"+" "+ dateTo);

      


}else{
var name = $('#type').val().replace(/[^A-Z0-9]/gi," ");
$("#title").text("Summary of Expenses Report");
$("#from").text("From"+" "+ dateFrom);
$("#to").text("To"+" "+ dateTo);
}



 $.ajax({
  url: "codes/functions/expenseReport_function.php",
  type: "POST",
  data:{"dateFrom":dateFrom,
        "dateTo":dateTo,
        "type":type
      
},
success: function(data){       
              $("#main-result-con").show();                
            $("#result-div").html(data); 
            $(".button-group").append('<center><button type="button" class="btn btn-primary" id="print" onclick="createPDF()" style="background-color:#0d6efd; color:white; width:150px;height:40px"><label style="font-size:16px">PRINT</label></button></center>'); 
         
        }
    });
});



</script>
<script>
var xValues = ["Rent", "Tax", "Salary", "Electricty", "Water Bill"];

var yValues = [<?php echo $RentAmount; ?>,<?php echo $TaxAmount?>, <?php echo $SalaryAmount ?>, <?php echo $ElectricityAmount ?>,
 <?php echo $WaterAmount  ?>];
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
     text: 
    }
  }
});
</script>
<script>
    function createPDF() {
        var sTable = document.getElementById('main-result-con').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Arial;margin-top:20px;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close();   // CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>