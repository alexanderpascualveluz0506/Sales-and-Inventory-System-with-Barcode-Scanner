<?php 
 session_start();

$date=date("l j F Y");
$current=$date;
date_default_timezone_set('Asia/Manila');
$time=date("g:i A");
?>
<?php  
include 'connection.php';
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
    <link href="codes/design/item_style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
     <script src="codes/javascript/clock.js"></script>

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
                    <span class="title-page"> <br>Dashboard / Item List</span>
                    </div>
                                
                </div>
<form action="" method="POST">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">
                <div class="row" style="margin-left:1%"><h3 class="display-5">Items</h3> <div>
                    
                    <?php  
                        $sql = "SELECT * from items";
                        $result = mysqli_query($link, $sql);
                        $rowcount = mysqli_num_rows( $result );
                        echo ' <label id="total-label">'.$rowcount.'</label></div>';
                    ?>
                </div>

    <div class="row g-3" id="div-for-entries-show">
       <label class="search-label" >Search:</label>
            <div class="col-sm">
                <input type="text" id="search-bar" class="search-input" onkeyup="myFunction()">
            </div>
        
        <div class="col-sm"></div>
              <button type="button" class="btn btn-primary" onclick="window.location.href='addItem.php'"><i class="ti-plus" style=""></i><span>&nbsp; &nbsp;ITEM</span></button>
          </div>
        



    </div><!--/# div-for-entries-show -->
<br>
    <div class="bootstrap-data-table-panel" id="form-table">
                   
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered" id="maintable">
                        <thead>
                            <tr>
                                <th class="table-header" style="width:5%">No</th>
                                   <th class="table-header"style="width:18%">Manufacturer</th>
                                      <th class="table-header"style="width:18%">Brand</th>
                                <th class="table-header"style="width:18%">Item Name</th>
                               
                                <th class="table-header">Perishable</th>
                                <th class="table-header">Returnable</th>
                              
                                <th class="table-header">Category</th>
                                <th class="table-header">Supplier</th>
                                 <th class="table-header" style="width:10%">Actions</th>

                              
                            </tr>
                        </thead>
                            <tbody id="main-tbody">
            <?php 

                                            include 'connection.php';

$sql= mysqli_query($link,"SELECT * from items");

$no=1;
if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
        $width=$row['width'];
        $item_name=$row['item_name'];
        $select2=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
        $row2=mysqli_fetch_assoc($select2);
        $id2=$row2['id'];
        if (!empty($width)){
            $dimension="<span style='font-size:14px;'>".$row['length']." x ".$row['width']." x ".$row['height']."</span>";
        }else{
            $dimension="<span style='color:blue; font-style:italic'>Not Set</span>";
        }
         if (!empty($row['perisable'])){
           $perishable="YES";
        }else{
           $perishable="NO";
        }
         if (!empty($row['returnable'])){
           $returnable="YES";
        }else{
           $returnable="NO";
        }
         if (!empty($row2['monitor_storage'])){
           $monitor="YES";
        }else{
           $monitor="NO";
        }

         if (!empty($row2['monitor_storage'])){
           $monitor1="YES";
        }else{
           $monitor1="";
        }
        echo "
        <tr row_id='". $row['id']."'>
         <td>".$no."</td>
           <td>".$row['manufacturer']."</td>
             <td>".$row['brand']."</td>
         <td><a href='itemDetail.php' target='_blank'>".$row['item_name']."</a></td>
             <td>".$perishable."</td>
              <td>".$returnable."</td>
                 <td>".$row['category']."</td>
                <td>".$row['supplier']."</td>
           <td>
           <button id='edit-button' class='btn btn-success'><a href='' data-toggle='modal' data-target='.bd-example-modal-lg' 
           class='view' data-name='".$row["item_name"]."' data-unit='".$row["unit"]."' data-category='".$row["category"]."' data-perishable='".$row["perisable"]."' data-returnable='".$row['returnable']."' data-monitor='".$monitor1."' 
           data-supplier='".$row['supplier']."' data-ids='".$row['id']."' data-invid='".$id2."' data-manu='".$row["manufacturer"]."' data-brand='".$row["brand"]."'>

           <i class='fas fa-pencil-alt' style='font-size:16px;' ></i></a></button>
                  <button type='button' class='btn btn-danger' id='delete-button'><a href=''data-toggle='modal' data-target='#modal-delete' data-name='".$row["item_name"]."' class='delete-item'><i class='ti-trash'  style='font-size:16px;'></i></td></a></button>
         ";
         
         $no++;
      
    }

 

    echo"</table>";
    }
   
?>                   
</tbody></table></div><!-- /# table-responsive --> </div><!-- /# bootstrap-data-table-panel -->
<div id="result"></div>

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
</body>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
 <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="item-name"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="print-label"></div>
             <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="itemsDescription-table" class="table table-striped table-bordered">
                    
                     <tbody id="items-tbody-table">
                        <tr>
                            <td>Item Name</td>
                            <td><input type="text" class="form-control" id="item_name_input"></td>
                        </tr>

                         <tr>
                            <td>Manufacturer</td>
                            <td>
                                <select class="custom-select" aria-label="Default select example" id="manufacturer_select">
                                    <?php 
                                        include 'connection.php';
                                        $select= "SELECT * from manufacturer";
                                        $result= $link->query($select);

                                        if ($result->num_rows >0){
                                            while ($row= $result->fetch_assoc()) {
                                                echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
                                        }
                                    }

                                       ?>
                                </select>
                            </td> 
                        </tr>

                         <tr>
                            <td>Brand</td>
                            <td>
                                <select class="custom-select" aria-label="Default select example" id="brand_select">
                                    <?php 
                                        include 'connection.php';
                                        $select= "SELECT * from brand";
                                        $result= $link->query($select);

                                        if ($result->num_rows >0){
                                            while ($row= $result->fetch_assoc()) {
                                                echo '<option value="'.$row["brand"].'">'.$row["brand"].'</option>';
                                        }
                                    }

                                       ?>
                                </select>
                            </td> 
                        </tr>

                         <tr>
                            <td>Category</td>
                            <td>
                                <select class="form-control" aria-label="Default select example" id="category_select">
                                    <?php 
                                        include 'connection.php';
                                        $select= "SELECT * from maincategory";
                                        $result= $link->query($select);

                                        if ($result->num_rows >0){
                                            while ($row= $result->fetch_assoc()) {
                                                    echo '<option value="'.$row["category_name"].'">'.$row["category_name"].'</option>';
                                        }
                                    }

                                       ?>
                                </select>
                            </td> 
                        </tr>

                          <tr>
                            <td>Supplier</td>
                            <td>
                                <select class="form-control" aria-label="Default select example" id="supplier-select">

                                <?php  
                                    include 'connection.php';
                                    $select= "SELECT * from suppliers";
                                    $result= $link->query($select);

                                    if ($result->num_rows >0){
                                        while ($row= $result->fetch_assoc()) {
                                            $name=$row["firstname"]." ".$row["lastname"];
                                                echo '<option value="'.$name.'">'.$row["firstname"].' '.$row["lastname"].'</option>';
                                            }
                                        }

                                ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td id="barcode-label">Returnable</td>
                             <td>
                                <select class="form-control" aria-label="Default select example" style="width:20%" id="returnable_select">
                                         <option value="YES">YES</option>
                                        <option value="">NO</option>
                                </select>
                            </td>
                        </tr>
                         <tr>
                            <td id="barcode-label">Perishable</td>
                            <td>
                                <select class="form-control" aria-label="Default select example" style="width:20%" id="perishable_select">
                                         <option value="YES">YES</option>
                                        <option value="">NO</option>
                                </select>
                            </td> 
                        </tr>
                      
                
                      

                     
                    </tbody>
                     
                </table>
                <input type="hidden" id="item-id">
                 <input type="hidden" id="inv-id">
            </div><!-- /# table-responsive -->     
        </div><!-- /# bootstrap-data-table-panel --> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-change-button">Save changes</button>
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
       <center><span style="font-size:20px">&nbsp;Are you sure you want to delete this item? </span>
        <span id="item-name-del" style="font-size:18px; display: none;" ></span></center>
     </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary"  style="width:100px;" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" style="width:100px;" id="button-yes-del">DELETE</button>
      </div>
    </div>
  </div>
</div>


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

$(".view").click(function () {

    var name = $(this).data('name');   
    $('#item-name').text(name); 
    $("#item_name_input").val(name);

    var category=$(this).data('category');
    $("#category_select").val(category);

   var returnable=$(this).data('returnable');
    $("#returnable_select").val(returnable);
  
    var perishable=$(this).data('perishable');
     $("#perishable_select").val(perishable);

    var monitor=$(this).data('monitor');
     $("#monitor_select").val(perishable);

    var supplier=$(this).data('supplier');
     $("#supplier-select").val(supplier);


     var id=$(this).data('ids');
      $("#item-id").val(id);

    var id2=$(this).data('invid');
      $("#inv-id").val(id2);

      var manu=$(this).data("manu");
      
      var brand=$(this).data("brand");
      $("#manufacturer_select").val(manu);
      $("#brand_select").val(brand);
    

    if (monitor=="YES"){
            $("#monitor-append").html('<div class="input-group mb-3"><input type="text" class="form-control" placeholder="length in cm" id="length"><input type="text" class="form-control" placeholder="width in cm" id="width"><input type="text" class="form-control" placeholder="height in cm" id="height"></div>');
    }else{
        $("#monitor-append").text("Not available").css("font-style", "italic").css("color", "blue");  
    }

});
$('#monitor_select').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var monitor = this.value;

        if (monitor=="YES"){
            $("#monitor-append").empty();
             $("#monitor-append").html('<div class="input-group mb-3"><input type="text" class="form-control" placeholder="length in cm" id="length"><input type="text" class="form-control" placeholder="width in cm" id="width"><input type="text" class="form-control" placeholder="height in cm" id="height"></div>');
    }else{
        $("#monitor-append").text("Not available").css("font-style", "italic").css("color", "blue");  
    }
});



$(document).on('click','#save-change-button',function(e){

var itemname= $("#item_name_input").val();
var category=$("#category_select").val();
var supplier=$("#supplier-select").val();
var returnable=$("#returnable_select").val();
var perishable=$("#perishable_select").val();
var monitor=$("#monitor_select").val();
var length=$("#length").val();
var width=$("#width").val();
var height=$("#height").val();
var id=$("#item-id").val();
var orig=$("#item-name").text();

var brand=$("#brand_select").val();
var manufacturer=$("#manufacturer_select").val();

 $.ajax({
  url: "codes/functions/updateItem_function.php",
  type: "POST",
  data:{"itemname":itemname,
        "category":category,
        "supplier":supplier,
        "returnable":returnable,
        "perishable":perishable,
        "monitor":monitor,
        "length":length,
        "width":width,
        "height":height,
        "id":id,
        "orig":orig,
        "brand":brand,
        "manufacturer":manufacturer
      
},
success: function(data){    
            location.reload();
      
        }
    });

});

$(".delete-item").click(function () {
    var itemname=$(this).data('name');
$("#item-name-del").text(itemname);


});

$(document).on('click','#button-yes-del',function(e){

 var itemname_for_item=$("#item-name-del").text();

 $.ajax({
  url: "codes/functions/delete_function.php",
  type: "POST",
  data:{"itemname_for_item":itemname_for_item
      
},
success: function(data){ 
            location.reload();

      
        }
    });

});

</script>