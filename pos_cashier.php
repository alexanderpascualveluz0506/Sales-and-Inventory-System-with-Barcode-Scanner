<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Erlinda's Grocery</title>
    
    
    <style type="text/css">
        

    </style>
 <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  
    <link href="codes/design/pos_cashier_style.css" rel="stylesheet">
   
</head>

<body style="background-color:red">
   




  <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

             <div class="row" style="background-color:#e6e6e7">
            <div  class="card" id="card1a">
                        <div class="input-group mb-3" style="margin-left: -0.5%; margin-top: -5px; height: 72px;width: 101%;">
                                          <div class="input-group-prepend" style="height:49px;">
                                            <button class="btn btn-outline-secondary" type="button" id="search-item-button" data-toggle="modal" data-target="#search-item-modal"> <i class="fa fa-search"></i></button>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Enter or Item Scan Barcode" id="item-name" style="width: 60%"/>  
                                           <input type="text" class="form-control" placeholder="Qty" id="item-qty"  />   
                                          <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="add-item-button" onclick=" countTotal();" >ADD ITEM</button>
                                          </div>
                                        </div>

               
            </div>


                 <div class="col" >
                            <div class="card" id="card2a">
                              <?php
                              global $firstname, $lastname, $time, $account_no, $cashier_name;
                                $firstname=$_SESSION['Firstname'];
                                $lastname=$_SESSION['Lastname'];
                                $time=$_SESSION['Time'];
                                $account_no=$_SESSION['account_no'];
                                $cashier_name= $firstname." ".$lastname;
                              ?>   
                                    <div class="row" style="margin-top:-6px">
                                         <label>Cashier Name :</label><label id='cashier_name'> <?php echo $firstname." ".$lastname ?></label>   
                                    </div>

                                      <div class="row" style="margin-top:1px">
                                         <label>Time In :</label><label id="time-in-label"><?php echo $time; ?></label>   
                                          <label id="time-out-label">Time Out : 
                                            <?php echo '<a href="get.php?account_no='.$account_no.'&cashier_name='.$cashier_name.'&time_in_label='.$time.'" target="_blank"><button id="now-div-button">Now</button></a>'; ?>  </label>
                                    </div>
                                        
                                    <input type="hidden" id="account_no_input"value="<?php echo $account_no;?>">
                        </div>
                        </div>
                        
                                  

</div><!-- /# card -->
</div> <!-- /# row -->    
</div><!-- container-fluid end -->
</div><!-- main content end -->
</div><!-- content wrap end --> 



 <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

           <div class="row" style="background-color:#e6e6e7">
             <div  id="card3" class="card" style="overflow: auto;">
                       
                                            <table id="table-order" class="table" >
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


                 <div class="col">
                            <div class="card" id="card3a">
                               
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

                                                <div class="row" style="margin-top:0%">
                                                    <br>
                                                    
                                                    <div class="col-sm" id="radios"style="width: 100%; float:right;">
                                                    <label style="margin-left:-1%">Payment Type</label>
                                                    </div>

                                                    <div class="col-sm" id="type" >
                                                    <input type="radio" style="margin-top:1.6%" value="Cash" name="typePay">
                                                    <label style="margin-left:7px">Cash</label>

                                                    <input type="radio" style="margin-top:1.6%; margin-left: 4%;" value="G-Cash" name="typePay">
                                                    <label style="margin-left:7px">G-Cash</label>
                                                    </div>
                                                    
                                                    
                                                </div>

                                                <div class="row" style="margin-top: 4%;">
                                                  <label id="label" style="font-size:20px;">Payment </label>
                                                    <input type="text" id="payment-input" style="width:40%;">
                                                </div>

                                             
                                 
                                                <div class="row" style="margin-top:4%" >
                                                  <label id="label" style="font-size: 18px;">Change: </label>
                                                  <label id="change" class="value" style="color:red; font-size:18px;">0 </label>
                                                </div>

                                                 <button type="button" class="btn btn-primary"  id="complete-sales"
                                                 style="height: 47px; margin-top: 6%;" 
                                                 >Complete Sales</button>
                                    </div>

                            
                            
                        </div>
                </div>

</div><!-- /# card -->
</div> <!-- /# row -->    
</div><!-- container-fluid end -->
</div><!-- main content end -->
</div><!-- content wrap end --> 
</div>

           <div class="row g-3" style="width:70%; margin-left:2%; margin-top: -3.5%;display: block;" id="nb">
                                        <div class="col-sm">
                                    <button type="button" class="btn btn-danger" id="delete-item" style="width:20%;height:54px;">Delete Item</button>
                                     <button type="button" class="btn btn-dark" id="cancel-sales" style="width:20%; height:54px;margin-left: 2%;">Cancel Sale</button>
                                     <button type="button" class="btn btn-success"  style="width:20%;height:54px; margin-left:2%" data-toggle="modal" data-target="#check-price-modal">Check Price</button>
                                    
                                       <button type="button" class="btn btn-success"  style="width:20%;height:54px; margin-left:2%; background-color:#9400D3; color:white;" data-toggle="modal" data-target="#trasaction-modal">Transaction History</button>
                          
                          

                                
                                </div>                         
                                </div>

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


<div  class="modal fade" id="trasaction-modal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="max-width:75%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="width:100%; margin-left:-3%"><label>Transaction History</label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <ul class="nav justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link" href="" id="per-item">Sales per Item Transaction</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="" id="per-customer">Sales Summary per Customer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="" id="deleted-item-list">Deleted Item History</a>
                  </li>
            </ul>

            <div id="transaction-result">
                <?php 

                      $result=mysqli_query($link, "SELECT * from transaction WHERE DATE(payment_date) = DATE(NOW())");
       if ($result->num_rows >0){

             echo '  <center><div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="batch-item" class="table table-striped table-bordered" >
                            <th>Barcode</th>
                            <th>Batch No</th>
                            <th>Item Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>

                    ';
            while ($row= $result->fetch_assoc()) {
                $item_name=$row['item_name'];
                $sql1=mysqli_query($link, "SELECT * from items where item_name='$item_name'");
                $row1=mysqli_fetch_assoc($sql1);
                $perisable=$row1['perisable'];
                if ($perisable=="YES"){
                    $qty=$row['qty']."g";
                }else{
                    $qty=$row['qty'];
                }
                    echo '
                        <tr>
                            <td>'.$row['barcode'].'</td>
                            <td>'.$row['batch_no'].'</td>
                            <td>'.$row['item_name'].'</td>
                            <td>'.$qty.'</td>
                            <td>'.number_format($row['price'],2).'</td>
                            <td>'.number_format($row['total_amount'],2).'</td>
                        </tr>
                    ';
                   
                }
                echo '</table></div></div>';
                }
                ?>
            </div>
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

<input type="hidden" id="barcode-for-del" >



<div  class="modal fade" id="search-item-modal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="max-width:75%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="width:100%; margin-left:-3%"><label>Item Catalogue</label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row" style="margin-left:2%; width:30%" ><label style="margin-top:4px"> Search</label> 
                <div class="col">
                    <input class="form-control" type="text" id="search-input" onkeyup="myFunction()">
                </div>
            </div>
                <center><div class="bootstrap-data-table-panel1">
                    <div class="table-responsive">
                    <table id="list-item" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="table-header">Barcode</th>  
                                <th class="table-header">Item Name</th>
                                <th class="table-header"><center>Price</center></th>
                                <th class="table-header"><center>Qty On Hand</center></th>
                            </tr>
                          </thead>
                            <tbody id="try-table">
                         
                      
                                <?php 
                                    include 'connection.php';


                                    $result=mysqli_query($link, "SELECT * from batch where qty_on_shelf>0");

                                    if ($result->num_rows >0){
                                        while ($row= $result->fetch_assoc()) {
                                            echo '
                                                <tr>
                                                    <td>'.$row['barcode'].'</td>
                                                    <td>'.$row['item_name'].'</td>
                                                    <td><center>'.number_format($row['price'],2).'</center></td>
                                                    <td><center>'.$row['qty_on_shelf'].'</center></td>
                                                </tr>
                                            ';
                                        }

                                    }
                                        
                                ?>                        
                    </tbody>
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> </center>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
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



$(document).on("keypress", "#find-item-price", function(e){
    var itemCheck=$("#find-item-price").val();
      $.ajax({
  url: "getdatapos.php",
  type: "POST",
  data:{"itemCheck":itemCheck
      
},
success: function(data){    
              $("#price-check-result").append(data); 
            

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
$(document).on("click", "#per-item", function(e){
    e.preventDefault();
    var salesNoTranasaction=1;

    $("#transaction-result").empty();
      $.ajax({
  url: "getdatapos.php",
  type: "POST",
  data:{"salesNoTranasaction":salesNoTranasaction
      
},
success: function(data){    
              $("#transaction-result").append(data); 
            

        }
    });

}); 


$(document).on("click", "#per-customer", function(e){
    e.preventDefault();
    var perCustomer=1;


    $("#transaction-result").empty();
      $.ajax({
  url: "getdatapos.php",
  type: "POST",
  data:{"perCustomer":perCustomer
      
},
success: function(data){    
              $("#transaction-result").append(data); 
            

        }
    });

}); 

$(document).on("click", "#deleted-item-list", function(e){
    e.preventDefault();
    var perdelete=1;


    $("#transaction-result").empty();
      $.ajax({
  url: "getdatapos.php",
  type: "POST",
  data:{"perdelete":perdelete
      
},
success: function(data){    
              $("#transaction-result").append(data); 
            

        }
    });

}); 

$(document).on("click", "#close-check", function(e){
    $("#find-item-price").val("");
    $("#price-check-result").empty(); 
   
});

$(document).on("click", "#close-check2", function(e){
    $("#find-item-price").val("");
    $("#price-check-result").empty(); 
   
});               

 $(document).on('click','#add-item-button',function(e){
  
  var myVar = $("#item-name").val();
  var myqty = $("#item-qty").val();
  var salesNo=$("#salesNoInput").val();
  var account_no=$("#account_no_input").val();

 $.ajax({
  url: "getdatapos.php",
  type: "POST",
  data:{"myData":myVar,
        "myQty":myqty,
        "account_no":account_no,
        "salesNo":salesNo
      
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
alert(barcodeForDel);
alert(salesNoForDel); 
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
$('#now-div-button').click(function(){
       location.replace("index1.php");
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
var account_no=$("#account_no_input").val();
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
        "account_no":account_no,
        "change":change,
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
  input = document.getElementById("search-input");
  filter = input.value.toUpperCase();
  table = document.getElementById("list-item");
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