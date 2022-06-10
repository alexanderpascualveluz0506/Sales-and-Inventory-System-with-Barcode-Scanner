<?php
include 'codes/functions/addItem_function.php';
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

</script>
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
   
    <link href="select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
     <link href="codes/design/addItem_style.css" rel="stylesheet">

</head>
<style>
    #brandselect option{
    margin-top: 2px;
}
</style>

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
                       <li><a href="item.php" style="background-color:#6880fc;color:white;"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Item</a></li>
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
                    <span class="title-page"> <br>Dashboard / Item / Add New Item<br></span>
                    </div>
                                
                </div>



 


    
                        <div class="navbar">
                            <a  class="active" id="item-info-tab" href="#"><i class="  fas fa-clipboard-list">&nbsp;&nbsp; </i>Item Info</a> 
                              <a href="#"  id="inventory-tab"><i class="fas fa-box">&nbsp;&nbsp; </i>Stock</a> 
                            <a  href="#" id="pricing-tab"><i class="fas fa-tag">&nbsp;&nbsp; </i>Pricing</a> 
                          
                            
                        </div>




    <div class="row" id="container1">
        <div class="col-lg-12">
            <div class="card" id="main-container">     
                   <section id="main-section">
                    <div class="row g-3" id="row1">   
                         <div class="container-title1"><h5>
                            
                        </h5></div>
                       
                        </div>
                       
         
                    <div class="row g-3" id="row2-a" style="margin-top:40px;margin-left:36px;width: 91.4%;">
                    <label>Manufacturer</label>
                        <div class="col-sm">
                             <select class="custom-select" id="selectManu" name="manu" style="border-color: darkgray;">
                                <option value="">Select Manufacturer</option>
                                    <?php  

                                     manufacturer();
                                    ?>
                          </select>
                        </div>
                    </div>


                    <div class="row g-3" id="row2-a" style="width:86%;margin-left:90px;margin-top:30px;">
                    <label>Brand</label>
                        <div class="col-sm">
                            <select class="custom-select" id="selectBrand" name="brand" style="border-color: darkgray;">
                                
                                    <?php  

                                    
                                    ?>
                          </select>
                        </div>
                    </div>

                             <div class="row g-3" id="row2-a" style="margin-top:26px">
                    <label>Item Name</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="item-name-input" name="item_name_post">
                        </div>
                </div>


                <div class="row g-3" id="row2-b">
                    <label>Size &nbsp;</label>
                        <div class="col-sm" >
                             <div class="input-group" id="dimension" style="width:94.4%; ">
                                <input type="text" class="form-control" id="size" 
                                name="size_name_post">
                        <div class="input-group-append">
                            <select class="custom-select" id="selectUnit" name="unit" style="border-color: darkgray;">
                                <option value="g">grams (g)</option>
                                <option value="pcs">piece (pcs)</option>
                                <option value="oz">ounce (oz)</option>
                                <option value="in">inch (in)</option>
                                <option value="in">liter (L)</option>
                                <option value="lb">pound (lb)</option>    
                                <option value="ml">ml</option>
                                <option value="dozen">dozen</option>
                                <option value="kg">kg</option>
                                <option value="mg">mg</option>
                          </select>
                      </div>
                    </div>
                    </div>
                </div>

            
                <div class="row g-3" id="barcodedislay">
                           <labeL>Barcode Display</labeL>
                        <div class="col-sm">
                           <div class="input-group mb-3"  style="width: 92%">
                          <input type="text" class="form-control" id="barcode-input" name="barcode_post">
                          <div class="input-group-append" >
                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#exampleModalCenter" id="open_modal">Generate Barcode</button>
                          </div>
                        </div>
                        </div>
                    </div>


                <div id="barcode-display-image">
                </div>

                         <div class="row g-3" id="category">
                           <label>Category</label>
                       <div class="col-sm">
                        <div class="input-group">
                           <select id="categoryselect" class="form-select" name="main_category_post" style="width:98%;">
                                <option selected>Choose...</option>
                                <?php
                                maincategory();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                    

                    <div class="row g-3" id="itemdescription">
                            <label>Item Description</label>
                        <div class="col-sm">
                             <textarea class="form-control" aria-label="With textarea" id="item_description_post" style="border-color: #b0b0b0;width:100%;"></textarea>
                        </div>
                        
                    </div>
                    

                    <div class="row g-3" id="supplier">
                           <label>Supplier</label>
                       <div class="col-sm">
                        <div class="input-group">
                           <select id="supplierselect" class="form-select" name="supplier_post" style="width:100%">
                                <option selected>Choose...</option>
                                <?php
                                supplier();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                    
                    <br>
                           
                    </div>



               


<div  id="catcher"></div>
            </div><!-- /# card -->
         </div> <!-- /# column -->
    </div> <!-- /# row -->
      
</section> 
 


  <div class="row" id="container-for-inventory" style="display:none;">
        <div class="col-lg-12">
            <div class="card" id="main-container" style="margin-left:1.4%;width: 97%;">     
                   <section id="main-section">
                             <div class="row g-3" id="row-for-item-name"> 
                                    <span id="label-for-item-name2">Item Name</span>  
                        
                    </div>

                    <div class="row g-3" id="batch-div">
                         <label id="" >Stock In No</labeL>
                              <div class="col-sm">
                                <?php batch_count();?>
                                                         </div>
                    </div>
                    

                 

                    <div class="row g-3" id="total-supply-div">           
                            <labeL>Total No of Supply</labeL>
                                <div class="col-sm">
                                     <input type="number" class="form-control" name="total_supply_d" id="total-supply-input">
                                </div>
                    </div>


                      <div class="row g-3" id="cost-div">           
                            <labeL>Cost</labeL>
                                <div class="col-sm">
                                     <input type="text" class="form-control" name="cost" id="cost-input">
                                </div>
                    </div>

                    <div class="row g-3" id="damaged-div">           
                            <labeL>Damaged Quantity</labeL>
                                <div class="col-sm">
                                     <input type="number" class="form-control" id="damage_input" name="damage_quantity">
                                </div>
                    </div>


                    <div class="row g-3" id="expiration-div">           
                            <labeL>Expiration</labeL>
                                <div class="col-sm">
                                        <input type="date" id="Expiration" name="expiration" >
                                </div>
                    </div>


                    <div class="row g-3" id="row10" style="margin-left:7.5%">
                            <label>Returnable</label>      
                        <div class="col-sm">
                            <input type="checkbox" class="form-check-input" id="returnable_input" value="YES" name="returnable" >
                        </div>
                    </div>



                    <div class="row g-3" id="perishable-div">
                         <label>Perishable</label>
                           
                            <div class="col-sm">
                             <input type="checkbox" class="form-check-input" id="perishable_input" value="YES" name="perishable">
                        </div>
                    </div>

                  
                    <div style="display: none" id="alert-for-monitor">
                        <span style="margin-left: 17%; color: red">
                        <i class="fas fa-exclamation-circle"></i> This field is Required</span>
                    </div>
         


                    <br style="margin-bottom: 20px;"> 
            </div>

        </div>        
    </div>
</section>

    <div class="row" id="container-for-pricing" style="display:none;">
        <div class="col-lg-12">
            <div class="card" id="main-container" style="margin-left:1.4%;width: 96%;">     
                   <section id="main-section">
                    <div class="row g-3" id="row-for-item-name"> 
                    <span id="label-for-item-name">Item Name</span>  
                       
                    </div>
                    <div class="row g-3" id="prices-row1">
                        <label >Selling Price</label>
                        <div class="col-sm">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="selling_price_post">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" 
                                        id="button-check-suggested" data-toggle="modal" data-target="#examplePrices">
                                        Check Suggested Prices</button>
                          </div>
                        </div>
                        </div>
                    </div>


                    <div class="row g-3" id="prices-row2">
                        <label>Cost Price</label>
                         <div class="col-sm">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="cost_price_post" id="costPerUnit-input">
                        </div>
                        </div>
                    </div>
                        

      
                     <br style="margin-bottom: 40px;">   
            </div>
          
        </div>   

        <button type="submit" value="ADD ITEM" id="add_item" style="width:200px;height: 47px; margin-left: 78%; background-color:#054D7C; color:white; border-style: none; margin-top:2%">ADD ITEM</button>

    </div>

</section>
</div>


<!-- Modal -->
<div class="modal fade" id="examplePrices" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-scrollable"role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Demand and Supply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
        <div >Assume only the following fields. (Based on monthly needs)</div>
                
            
     <div class="row g-3" id="row0cp">
                    <label>Cost per Unit: </label>
                     <div class="col-sm">
                            <label id="cost-label"></label>
                        </div>
                </div>


                <div class="row g-3" id="row1cp">
                    <label>Demand on Lowest Price</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="lowest-demand">
                        </div>
                </div>

                <div class="row g-3" id="row2cp">
                    <label>Demand on Highest Price</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="highest-demand">
                        </div>
                </div>



                <div class="row g-3" id="row3cp">
                    <label>Lowest No of Supply</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="lowest-supply">
                        </div>
                </div>

                <div class="row g-3" id="row4cp">
                     <label>Highest No of Supply</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="highest-supply">
                        </div>
                </div>

             
                    <div class="row g-3" id="row5cp">  
                          <span>Price Floor</span>  
                                 <div class="fields">                 
                        <div class="editbox">  
                            <span class="editlabel" style="margin-left:18px; letter-spacing:1px" id="price-floor"> 10%</span>  
                            <a class="lnkbtn" href="#" style="margin-left:10px;">  
                                <span class="role">Edit</span>  
                                 </a>  
                        </div>  
                    </div>
                </div>


                    <div class="row g-3" id="row6cp">  
                          <span>Price Ceiling</span>  
                                 <div class="fields">                 
                        <div class="editbox">  
                            <span class="editlabel" style="margin-left:16px; letter-spacing:1px"  id="price-ceiling"> 20%</span>  
                            <a class="lnkbtn" href="#" style="margin-left:10px;">  
                                <span class="role">Edit</span>  
                                 </a>  
                        </div>  
                    </div>
                </div>
                
           


                <div class="row g-3" id="row7cp">
                     <label>Min Price</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="min-price">
                        </div>
                </div>


                <div class="row g-3" id="row8cp">
                     <label>Max Price</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="max-price">
                        </div>
                </div>
                 
    
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#examplePricesTables" id="generateSuggestedPrices">
          Next
        </button>


      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<div  class="modal fade" id="examplePricesTables" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Price List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     

                   <table id="table_ID" class="table table-striped table-bordered" style="width:90%; margin-left: 5%;">
                        <thead>
                            <tr>

                                 <th class="table-header" >Price</th>
                                 <th class="table-header">Demand</th>
                                  <th class="table-header">Supply</th>
                            </tr>
                 
                        </thead>
                           <tbody id="tbody">
                                
                    </tbody>
                </table>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#examplePrices" id="button-to-clear">Back</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="button-to-clear2">Close</button>
       
      </div>
    </div>
  </div>
</div>

  


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Generate Barcode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
        <div class="form-group">
                        <label>Fill code</label>
                        <input type="text" name="barcodeValue" id="barcodeValue" class="form-control" >

                    </div>

        <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label>Barcode Types</label>
                        <select name="barcodeType" id="barcodeType" class="form-control">
                         <option value="CODE128">CODE128 auto</option>
                          <option value="CODE128A">CODE128 A</option>
                          <option value="CODE128B">CODE128 B</option>
                          <option value="CODE128C">CODE128 C</option>
                          <option value="EAN13">EAN13</option>                      
                        </select> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                     <div class="form-group">
                         <label>Show Text:</label>
                         <select name="showText" id="showText" class="form-control" required>
                             <option value="false">No</option>  
                            <option value="true">Yes</option>
                                                        
                        </select>
                     </div>
                </div>
            </div>  


            <div class="row">                   
                <div class="col-md-4">                                      
                    <input type="button" id="generateBarcode" name="generateBarcode" class="btn btn-success form-control" value="Generate">
                </div>
            </div>
            <br>
    <div id="result-barcode" style="display: none;">
       <center> <img src="" id="barcode" style="width:350px; height: 80px;">
       </center>
       </div>  
  
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-barcode" >Confirm</button>
      </div>
    </div>
  </div>
</div>

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
    <script src="select2/dist/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

</body>

</html>
<script type="text/javascript">

    $('document').ready(function() {
    $('#generateBarcode').on('click', function() {  
        $("#result-barcode").show();
        var barcodeValue = $("#barcodeValue").val();
        var barcodeType = $("#barcodeType").val();  
        var showText = $("#showText").val();  
        $("#barcode-display-label").empty();  

        JsBarcode("#barcode", barcodeValue, {
            format: barcodeType,
            displayValue: showText,
            lineColor: "#24292e",
            width:2,
            height:50,  
            fontSize: 17                    
        });   

      
       var file=$('#barcode').attr('src');


    
         
    });



$('#open_modal').on('click', function() {  
    
     var val1 = Math.floor(100000 + Math.random() * 999999);
   var val2 = Math.floor(10000 + Math.random() * 99999);
    var num=Math.floor(Math.random()*6)+1;

    var itemname=$("#barcodeValue").val(val1+''+val2);

 
    document.getElementById("barcodeValue").setAttribute('value', barcodename);

});

$('#confirm-barcode').on('click', function() {  
 var barcodeValue = $("#barcodeValue").val();
 document.getElementById("barcode-input").value=barcodeValue;



 });  





$('#pricing-tab').on('click', function() {  




var itemname=$('#item-name-input').val();
var cost=$('#cost-input').val();
var total_supply=$('#total-supply-input').val();
var costUnit= cost/total_supply;
var costPerUnit= costUnit.toFixed(2);
$('#label-for-item-name').text(itemname);
$('#cost-label').text(costPerUnit);
$('#costPerUnit-input').val(costPerUnit);
$('#container-for-pricing').show();

$('#container1').hide();   
$('#container-for-inventory').hide();

$("#item-info-tab").removeClass("active");
$("#inventory-tab").removeClass("active");
$(this).addClass("active");       


var floor=$("#price-floor").text();
var PriceFloor = floor.match(/\d+/);
var ceiling=$("#price-ceiling").text();
var PriceCeiling = ceiling.match(/\d+/);

var minPriceTotal=(costPerUnit/100)*PriceFloor;
var mp=(+minPriceTotal)+(+costPerUnit);
var maxPriceTotal=(costPerUnit/100)*PriceCeiling;
var mxp=(+maxPriceTotal)+(+costPerUnit);
var minPriceInput=$("#min-price").val(mp.toFixed(2));
var maxPriceInput=$("#max-price").val(mxp.toFixed(2));

var lowest=$('#total-supply-input').val();
var TotalnoSupply=$('#lowest-supply').val(lowest);

var highest=(mxp*lowest)/costPerUnit;
var finalhigh=Math.round(highest);
var TotalnoSupplyhigh=$('#highest-supply').val(finalhigh);

var Ldemand=Math.round(0.80*highest);
var Lowdemand=$('#lowest-demand').val(Ldemand);

var Hdemand=Math.round(0.60*lowest);
var Highdemand=$('#highest-demand').val(Hdemand);

 });

$('#inventory-tab').on('click', function() {  
var itemname=$('#item-name-input').val();
$('#label-for-item-name2').text(itemname);
$('#container-for-inventory').show();

$('#container1').hide(); 
$("#container-for-pricing").hide();  

$("#item-info-tab").removeClass("active");
$("#pricing-tab").removeClass("active");
$(this).addClass("active");       

 });

$('#item-info-tab').on('click', function() {  
$('#container1').show();

$('#container-for-inventory').hide(); 
$("#container-for-pricing").hide();  

$("#inventory-tab").removeClass("active");
$("#pricing-tab").removeClass("active");
$(this).addClass("active");       




 });


});

</script>
<script type="text/javascript">
 


$(document).ready(function() {
    $(".js-example-basic-single").select2({
    dropdownParent: $("#row5-a")
    });
    

    $('#disable_price').on('click', function() {  
        if($(this).is(":checked")) {
              $("#price_rule_select").prop('disabled', true);
        }  
        else if($(this).is(":not(:checked)")) {
                 $("#price_rule_select").prop('disabled', false);
        }
 });

$(".lnkbtn").click(function() {  
        var role = $(this).find('.role');  
        var value = $(this).siblings();  
        var values = value.text();  
        if(role.html() == "Edit") {  
            role.html("Save");  
            if(values == "enter username" || values == "enter title" || values == "enter email address") {  
                values = "";


            }  
            $(this).siblings().html('<input type="textbox" class="txtbox" value="' + values + '" placeholder="">');  
        } else {  
            if(value.find('.txtbox').val() != "") {  
                $(this).siblings().html('<span class="editlabel">' + value.find('.txtbox').val() + '</span>');  
                role.html("Edit");  
            } else {  
               
            }  
        }
var costPerUnit=$("#cost-label").text();  
var floor=$("#price-floor").text();
var PriceFloor = floor.match(/\d+/);
var ceiling=$("#price-ceiling").text();
var PriceCeiling = ceiling.match(/\d+/);

var minPriceTotal=(costPerUnit/100)*PriceFloor;
var mp=(+minPriceTotal)+(+costPerUnit);
var maxPriceTotal=(costPerUnit/100)*PriceCeiling;
var mxp=(+maxPriceTotal)+(+costPerUnit);
var minPriceInput=$("#min-price").val(mp.toFixed(2));
var maxPriceInput=$("#max-price").val(mxp.toFixed(2));
var lowest=$('#total-supply-input').val();
var TotalnoSupply=$('#lowest-supply').val(lowest);

var highest=(mxp*lowest)/costPerUnit;
var finalhigh=Math.round(highest);
var TotalnoSupplyhigh=$('#highest-supply').val(finalhigh);

var Ldemand=Math.round(0.80*highest);
var Lowdemand=$('#lowest-demand').val(Ldemand);

var Hdemand=Math.round(0.60*lowest);
var Highdemand=$('#highest-demand').val(Hdemand);

 });




$('#generateSuggestedPrices').on('click', function() {

var perishable=($("input[type=checkbox][name=perishable]:checked").val());
if(!$(perishable).val()){

$("tbody").empty();
var costPerUnit=$("#cost-label").text();  
var lowestDemand = $("#lowest-demand").val();
var highestDemand = $("#highest-demand").val();
var lowestSupply=$("#lowest-supply").val();
var highestSupply=$("#highest-supply").val();
var floor=$("#price-floor").text();
var PriceFloor = floor.match(/\d+/);
var ceiling=$("#price-ceiling").text();
var PriceCeiling = ceiling.match(/\d+/);

var minPrice=$("#min-price").val();
var maxPrice=$("#max-price").val();
var minPricefinal=Math.round(minPrice);
var maxPricefinal=Math.round(maxPrice);

// Quantity Demand Equal for QD
var operationQD=lowestDemand-highestDemand;
var operationPrice=maxPrice-minPrice;
var QD=(operationQD/operationPrice)*-1;


// Quantity Supply Equal for QS
var operationQS=lowestSupply-highestSupply;
var operationPriceQS=minPrice-maxPrice;
var QS=Math.round(operationQS/operationPriceQS);


// formula for demand
 var formula_operation_demand1= QD * (-minPricefinal);
 var formula_operation_demand2=Math.round((+highestDemand)+(+formula_operation_demand1));


// formula for supply
 var formula_operation_supply1= QS * (-maxPricefinal);
 var formula_operation_supply2=Math.round((+formula_operation_supply1)+(+highestSupply));

//equillibrium Price
var part1= (formula_operation_demand2)+(formula_operation_supply2*-1);
var part2= (QS)+(QD*-1);
var equillibriumPrice= (part1/part2);

var finalprice=equillibriumPrice.toFixed(2);
var label=$("#price-check").text(finalprice);  


// equillibrium demand

var demand1=(QD)*(equillibriumPrice);
var demand2=(+formula_operation_demand2)+(+demand1);
var finaldemand=demand2.toFixed(0);
var label=$("#demand-check").text(finaldemand + "pcs"); 

//equillibrium supply
var supply1=(QS)*(equillibriumPrice);
var supply2=(+formula_operation_supply2)+(+supply1);
var finalsupply=supply2.toFixed(0);
var label=$("#supply-check").text(finalsupply+ "pcs"); 

var costPerUnit1=$("#cost-label").text(); 
var cs=Math.round(costPerUnit);
       for(var  a=cs; a<=cs+7; a++){
       var decimals = finalprice-Math.floor(finalprice);
        pre=a+.50;
        opt = pre.toFixed(2);
        
        optValue=a;
        var final=optValue.toFixed(2);

     
        demand1=(optValue)*(QD)+formula_operation_demand2;
        demandforWholeNum=Math.ceil(demand1);
        demand2=(opt)*(QD)+formula_operation_demand2;
        demandforNotWholeNum=Math.ceil(demand2);

        supply1=(optValue)*(QS)+formula_operation_supply2;
        supplyforWholeNum=Math.ceil(supply1);
        supply2=(opt)*(QS)+formula_operation_supply2;
        supplyforNotWholeNum=Math.ceil(supply2);



        $("tbody").append('<tr><td >' + final + '</td><td>'+ demandforWholeNum+'</td><td>'+supplyforWholeNum+'</td></tr>');  
     
    
     
    
}
  var pricefloors=Math.round(costPerUnit/(100-PriceFloor)*100);
  var pricefloors=Math.round(costPerUnit/(100-PriceFloor)*100);
  var priceceiling=Math.round(costPerUnit/(100-PriceCeiling)*100);
 
    for (var i=pricefloors; i<=priceceiling; i++ ){
        var decimals = finalprice-Math.floor(finalprice);
        var dec=i-1+decimals;
        $('tr td:contains("'+dec+'")').parent().css("background-color","red"); 
        var b=i.toFixed(2);
         $('tr td:contains("'+b+'")').parent().css("background-color","red"); 
       

       var trs=pricefloors-1+decimals;

       $('tr td:contains("'+trs+'")').css("background-color","white");   
       
        
    }
 
}
    });     


});


    
$(document).on('click','#add_item',function(e){
var itemname=$("#item-name-input").val();
var size=$("#size").val();
var unit=$("#selectUnit").val();
var barcode=$("#barcode-input").val();
var category=$("#categoryselect").val();
var itemDescription=$("#item_description_post").val();
var supplier=$("#supplierselect").val();

var batch=$("#batch_input").val();
var supply=$("#total-supply-input").val();
var cost=$("#cost-input").val();
var damage=$("#damage_input").val();
var expiration=$("#Expiration").val();


var returnable=($("input[type=checkbox][name=returnable]:checked").val());
var perishable=($("input[type=checkbox][name=perishable]:checked").val());
var selling=$("#selling_price_post").val();
var costPerUnit=$("#costPerUnit-input").val();
var priceRule=$("#price_rule_select").val();


var file=$('#barcode').attr('src');


var brand=$("#selectBrand").val();
var manufacturer=$("#selectManu").val();

 $.ajax({
  url: "getdataAddItem.php",
  type: "POST",
  data:{"itemname":itemname,
        "size":size,
        "unit":unit,    
        "barcode":barcode,
        "itemDescription": itemDescription,
        "category":category,
        "supplier":supplier,
        "batch":batch,
        "supply":supply,
        "cost":cost,
        "damage":damage, 
        "expiration":expiration,
        "returnable":returnable,
        "perishable":perishable,
        "selling":selling,
        "costPerUnit":costPerUnit,
        "priceRule":priceRule,
        "file":file,
        "brand":brand,
        "manufacturer":manufacturer
       
       
      
},
success: function(data){    
             location.replace('item.php');
 

        }
    });

});

$(document).on('change','#selectManu',function(e){

    var manu=$("#selectManu").val();
alert(manu);
$.ajax({
  url: "codes/functions/addItem_function.php",
  type: "POST",
  data:{"manu":manu
       
      
},
success: function(data){    
           $("#selectBrand").html(data); 
        

        }
    });

});


</script>

