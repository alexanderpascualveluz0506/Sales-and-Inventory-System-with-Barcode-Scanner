
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
    <link href="codes/design/pos_style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
     <script src="codes/javascript/clock.js"></script>
</head>

  <style type="text/css">

#form-table{
    margin-top: 1%;
 height:370px;   
  overflow-y:auto;
  
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


   <div class="content-wrap" >
        <div class="main" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                    <span class="title-page"> <br>Dashboard / POS</span>
                    </div>                       
                </div>

<section id="main-content" >

                        <div class="row" >
                        <div class="col-sm" >
                            <div class="card" id="card1" >
                                       
                                        <div class="input-group mb-3" style="margin-left: -1.2%; margin-top: 0%; height: 72px;width: 101%;">
                                          <div class="input-group-prepend" style="height:49px;">
                                            <button class="btn btn-outline-secondary" type="button" id="search-item-button" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-search"></i></button>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Enter or Item Scan Barcode" id="item-name" style="width: 60%"/>  
                                           <input type="text" class="form-control" placeholder="Qty" id="item-qty"  />   
                                          <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="add-item-button" onclick=" countTotal();">ADD ITEM</button>
                                          </div>
                                        </div>

                                  
                            </div>
                        </div>

                            <div class="col-sm" >
                            <div class="card" id="card2">
                               
                                        <div class="input-group" style="margin-top: 3px;" >
                                         <label>Sales No:</label>

                                          <?php  
                                            include 'connection.php';

                                                $sql = "SELECT * FROM sales";
                                                if ($result=mysqli_query($link,$sql)) {
                                                 $rowcount=mysqli_num_rows($result);
                                                 $timestamp = date('Y-m-d');
                                                 $total=$rowcount+1; 
                                                 $display=$timestamp."-".$total;

                                                 $result = str_replace('-', '', $display);
                                             ?>
                                        
                                        <input type='text' id='salesNoInput' value='<?php echo $result;?>' style='text-align:center' readonly>

                                        <?php
                                         }
                                        ?>
                                        </div>
                            </div>
                        </div>
                        </div>
                    </div>


                        <div class="row" style="width:103%">
                        <div class="col-sm" >
                            <div class="card" id="card3" style="    overflow: auto;">
                                      
                                            <table id="table-order" class="table" style="width:100%;">
                                                <thead  class="table-dark">
                                                    <tr>

                                                
                                                         <th class="table-header" style="width:380px">Item Name</th>
                                                        <th class="table-header">Qty</th> 
                                                          <th class="table-header">Price</th> 
                                                       
                                                        <th class="table-header">Total</th>

                                                    </tr>
                                                  </thead>
                                                    <tbody style="height:20px;overflow:scroll" id="bodytable">
                                                    
                                                    
                                                         
                                            </tbody>
                                        </table>
                                    
                                </div>
                               
                            </div>

                            
                                <div class="col-sm">
                                    <div class="card" id="card4">
                                                <div class="row" >
                                                  <label id="label">Total Items: </label>
                                                  <label id="total-item-id" class="value">0 </label>
                                                </div>
                                                
                                                <div class="row">
                                                      <label id="label">Set Vat: </label>
                                                    <span id="vat" class="value" style="color:blue">0%</span>

                                                </div>

                                                <div class="row">
                                                  <label id="label">Tax added: </label>
                                                  <label id="tax-added" class="value" style="color:red">+0 </label>
                                                </div>

                                                
                                                 <div class="row" style="margin-top:1%">
                                                       <label id="label">Set Discount to Entire Order: </label>
                                                    <label id="discount-entire-order" class="value"  style="color:blue">0%</label>
                                                </div>

                                                <div class="row" >
                                                    <label id="label">Discount Added: </label>
                                                     <label id="discount-added" class="value" style="color:red">-0 </label>
                                                </div>

                                               
                                                  <div class="row" style="margin-top:2%">
                                                    <label id="label" style="font-size:22px;">Total </label>
                                                    <label id="total-payment" class="value" style="font-size:22px; font-weight: bold;">0.00</label>
                                                </div>

                                                <div class="row" style="margin-top:1%">
                                                    <br>
                                                    
                                                    <div class="col-sm" id="radios"style="width: 100%; float:right;">
                                                    <input type="radio" style="margin-top:1.6%" value="Cash" name="typePay">
                                                    <label style="margin-left:7px">Cash</label>

                                                    <input type="radio" style="margin-top:1.6%; margin-left: 4%;" value="G-Cash" name="typePay">
                                                    <label style="margin-left:7px">G-Cash</label>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row" style="margin-top: 2%;">
                                                  <label id="label" style="font-size:20px;">Payment </label>
                                                    <input type="text" id="payment-input" style="width:40%;">
                                                </div>

                                             
                                 
                                                <div class="row" style="margin-top:4%" >
                                                  <label id="label" style="font-size: 18px;">Change: </label>
                                                  <label id="change" class="value" style="color:red; font-size:18px;">0 </label>
                                                </div>

                                                 <button type="button" class="btn btn-primary"  id="complete-sales" style="height:50px; margin-top: 3.7%;">Complete Sales</button><br>
                                    </div>

                                </div>
                             
                        </div>
 
                                <div class="row g-3" style="width:70%; margin-top: -8.4%; margin-left:2%; padding-top: 1%;display: block;">
                                        <div class="col-sm">
                                    <button type="button" class="btn btn-danger" id="delete-item" style="width:28%;height:54px;">Delete Item</button>
                                     <button type="button" class="btn btn-dark" id="cancel-sales" style="width:28%; height:54px;margin-left: 2%;">Cancel Sale</button>
                                     <button type="button" class="btn btn-success" data-target="#check-price-modal" data-toggle="modal" style="width:28%;height:54px; margin-left:2%">Check Price</button>
                          

                                
                                </div>                         
                                </div>


<input type="hidden" id="barcode-for-del">
</div><!-- container-fluid end -->
</div><!-- main content end -->
</div><!-- content wrap end -->
</section>

<!-- Modal -->
<div class="modal fade" id="check-price-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Price Checker</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-check2">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <center><div>Enter Barcode or Item Name<input class="form-control"  style="margin-top: 10px; width: 80%;" id="find-item-price"></div><br>
        <button type="button" class="btn btn-primary" id="search-btn-checker">SEARCH</button>

        <br>

        <br>

        <div style="float:center; font-size:17px;" id="price-check-result">
              
        </div>

      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-check">Close</button>
      </div>
    </div>
  </div>
</div>



<div  class="modal fade" id="exampleModal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Item List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     

                 <div class="modal-body">
                 Search: &nbsp;<input type="text" id="search1" onkeyup="myFunction()"style="width:200px;height: 35px;">
                    <div class="table-responsive" id="form-table" >
                        
                    <table id="itemlist" class="table table-striped table-bordered" style="margin-top:3%">

                        <thead>
                            <tr>
                                <th class="table-header" style="position:sticky;top:0">Product Code</th>
                                <th class="table-header" style="position:sticky;top:0">Item Name</th>
                                <th class="table-header" style="position:sticky;top:0">Selling Price</th> 
                            </tr>
                        </thead>
                            <tbody id="item-list-body" >

                                <?php 
                                            include 'connection.php';
                                            $sql= mysqli_query($link,"SELECT * from batch where qty_on_shelf>0;");

                                                if ($sql->num_rows>0){
                                                    while ($row= $sql->fetch_assoc()) {
                                                        echo "
                                                        <tr row_id='". $row['id']."'>
                                                        <td>".$row['barcode']."</td>
                                                        <td>".$row['item_name']."</td>                                                  
                                                        <td>".$row['price']."</td>
                                                    ";}
                                                echo"</table>";
                                                                 }?>

                           
                                 
                    </tbody>
                </table>
                     </div><!-- /# table-responsive -->     
                
      </div>
      <div class="modal-footer">
         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
       
      </div>
    </div>
  </div>
</div>

<div id='DivIdToPrint' style="display:none;">
  <center><label style="font-size:12px; font-family:Arial">Erlinda's Grocery Store</label></center>
  <center><span style="font-size:10px; font-family:Arial">1046 Bayan Luma 8</span></center>
   <center><span style="font-size:10px; font-family:Arial">Imus, City Cavite</span></center>
   <center><span style="font-size: 10px; font-family:Arial">Date Issued: <?php $date=date("m/d/Y");
echo $date; ?></span></center>


 <center><span style="font-size: 10px; font-family:Arial;">Valid Until: <?php $date=date("m/d/Y" , strtotime($date. ' + 2 days')); ;
echo $date; ?></span></center>

<center><span style="font-size: 10px; font-family:Arial;">Receipt No:</span><span id="order-no" style="font-size:10px; font-family:Arial;"></span></center>

<span style="margin-bottom:20px;"></span>
</div>


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

 function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
 $(document).on('click','#add-item-button',function(e){
  
  var myVar = $("#item-name").val();
  var myqty = $("#item-qty").val();
  var salesNo=$("#salesNoInput").val();
  var account_no=1;

alert("aa");

 $.ajax({
  url: "getdatapos.php",
  type: "POST",
  data:{"myData":myVar,
        "myQty":myqty,
        "salesNo":salesNo,
        "account_no":account_no
      
},
success: function(data){    
            
            $("#bodytable").append(data); 

              $("#item-name").val("");
                $("#item-qty").val("");

                var total=0;
                $("#table-order tr").each(function() {
                var value = $('td', this).eq(3).text();
                if (!isNaN(value)) {
                    total=(+total)+(+value);
                }
             });
                $('#total-payment').text(total.toFixed(2));


                var total_item = 0;
                $("#table-order tr").each(function() {
                var total_item_value = parseInt($('td', this).eq(1).text());
                if (!isNaN(total_item_value)) {
                   total_item += total_item_value;
                }
             });
                $('#total-item-id').text(total_item);

                    
                $('#table-order tr').dblclick(function(){
                         $('#table-order tr').removeClass('highlighted');
                          $(this).addClass('highlighted');
                });

                $('#table-order tr').click(function(){
                         $('#table-order tr').removeClass('highlighted');
                });

                $('#delete-item').click(function(){
                     $(".highlighted").each(function(){
                    var barcode = $(this).closest('tr').attr('id');
                     $("#barcode-for-del").val(barcode);
                     $(".highlighted").remove(); 

                    });
                });


        }
    });

});

 $(document).on('click','#delete-item',function(e){
 var barcodeForDel= $("#barcode-for-del").val();
var salesNoForDel=$("#salesNoInput").val();

 $.ajax({
  url: "getdatapos.php",
  type: "POST",
  data:{"barcodeForDel":barcodeForDel,
        "salesNoForDel":salesNoForDel     
},
success: function(data){    
            
        }
    });

});

$(document).on("click", "#search-btn-checker", function(e){
    var itemCheckFIND=$("#find-item-price").val();

      $.ajax({
  url: "getdatapos.php",
  type: "POST",
  data:{"itemCheckFIND":itemCheckFIND
      
},
success: function(data){    
              $("#price-check-result").html(data); 
            

        }
    });

}); 

</script>

<script type="text/javascript">


$('#card4 span').bind('dblclick',function(){
                   $(this).attr('contentEditable',true);    

               });

$('#discount-entire-order').bind('dblclick',function(){
                   $(this).attr('contentEditable',true);    

               });


var contents = $('#vat').html();
     $('#vat').blur(function() {
            if (contents!=$(this).html()){
                    var vat=$("#vat").text();
                    var num = vat.match(/[\d\.]+/g);
                    var totalpayment=$('#total-payment').text();
                    var totalwithvat=(totalpayment/100);
                   var final=totalwithvat*num;
                   var finaltax=final.toFixed();
                   var tax=$("#tax-added").text("+"+finaltax);
                   var finaltotalpayment=(+totalpayment)+(+final);
                   var finalpayment=finaltotalpayment.toFixed(2);
                   $('#total-payment').text(finalpayment);
        }
});
var contentAlldiscount=$("#discount-entire-order").html();
  $('#discount-entire-order').blur(function() {
            if (contentAlldiscount!=$(this).html()){
                
                var totalpayment=$('#total-payment').text(); 
                var discountAllOrder=$("#discount-entire-order").text();
                var num = discountAllOrder.match(/[\d\.]+/g);

                var discount=(totalpayment/100);
                var final=(discount)*(num);
                var discount2=final.toFixed();
                var b=$("#discount-added").text("-"+ discount2);


              var finaltotalpayment=(totalpayment)-(discount);
              var finalpayment=finaltotalpayment.toFixed(2);
               $('#total-payment').text(finalpayment);

        }
});

$('#payment-input').keypress(function(e) {
        if (e.which == 13) {
                var totalpayment=$('#total-payment').text(); 
                var payment=$("#payment-input").val();
                var change= (payment)-(totalpayment);
                var dispalyChange=change.toFixed(2);
                $("#change").text(dispalyChange);


        }       
        
      });

$('#new-sales').click(function(){
        location.reload();
    });

$('#cancel-sales').click(function(){
        location.reload();
    });

$(document).on('click','#complete-sales',function(e){
var salesNo=$("#salesNoInput").val();
var total_item=$("#total-item-id").text();
var tax_added=$("#tax-added").text();
var discount_added=$("#discount-added").text();
var total=$("#total-payment").text();
var paymentType = $("input[name='typePay']:checked").val();
var payment=$("#payment-input").val();
var change=$("#change").text();
var account_no=1;
var idss=$("#salesNoInput").val();


$("#order-no").text(idss);
 $.ajax({
  url: "getdatapos.php",
  type: "POST",
  data:{"salesNo":salesNo,
        "total_item":total_item,
        "tax_added":tax_added,
        "discount_added":discount_added,
        "total":total,
        "paymentType":paymentType,
        "payment":payment,
        "change":change,
        "account_no":account_no,
        "idss":idss

      
},
success: function(data){    
            
        $("#DivIdToPrint").append(data); 
                printDiv();    
                location.reload();
        }
    });

});


          



function myFunction() {
  var input, filter, table, tr, td, cell, i, j;
  input = document.getElementById("search1");
  filter = input.value.toUpperCase();
  table = document.getElementById("itemlist");
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



</script>