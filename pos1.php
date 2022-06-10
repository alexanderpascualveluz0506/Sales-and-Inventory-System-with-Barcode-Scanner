<?php 
 session_start();

global $firstname, $lastname, $time, $account_no, $cashier_name, $current;
$firstname=$_SESSION['Firstname'];
$lastname=$_SESSION['Lastname'];
$time=$_SESSION['Time'];
$account_no=$_SESSION['account_no'];
$cashier_name= $firstname." ".$lastname;
$date=date("l \,\ j F Y");
$current=$date;
date_default_timezone_set('Asia/Manila');
$time=date("g:i A");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Erlinda's Grocery</title>
    
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Barlow Condensed' rel='stylesheet'>

     <link href="codes/design/style_conti.css" rel="stylesheet">
     <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
</head>
<script src="codes/javascript/clock.js"></script>

<body style=" background-color:#4a4a4a;" onload=display_ct();>
  <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

             <div class="row" id="row-top" style="background-color:#007bff; height: 40px;">
                   
                    <label id="store-name">Erlindas Grocery POS</label>
                    <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label> 
                     <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label> 
                      <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label> 
                       <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label> 
                        <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label> 
                         <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label> 
                          <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label> 
                           <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label> 
                            <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label>  <label>&nbsp;&nbsp;</label> 
                      

                       <span id='ct' style="padding-right: 20px;margin-top: 8px;color:white;"></span>
                      <label id="cashier-label">Cashier Name : &nbsp;</label>
                                <label id='cashier_name' class='cashier-result'> 
                                <?php echo $firstname." ".$lastname ?></label>   

                                 <?php echo '<a href="get.php?account_no='.$account_no.'&cashier_name='.$cashier_name.'&time_in_label='.$time.'" target="_blank"><button class="btn btn-dark" id="logoutBTN" onclick="login()"><i class="fas fa-sign-out-alt"></i></button></a>'; ?> 

                                 <input type="hidden" id="account_no_input"value="<?php echo $account_no;?>">

                </div>
                        
        


              
                                  


</div> <!-- /# row -->    
</div><!-- container-fluid end -->
</div><!-- main content end -->
</div><!-- content wrap end --> 

 <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

             <div class="row" id="row1">
           
                      
                                      <div class="col" style="margin-top:-2px">   
                                        <label style="color:white;"> Enter or Scan Barcode</label>
                                          <input type="text" id="item-name" style="width: 290px"/>      
                                       </div>  

                                        <div class="col" style="margin-top:-2px">   
                                        <label style="color:white;"> Qty</label><br>
                                        <input type="text"  id="item-qty" style="width: 120px"/>   
                                       </div>

                                       <div class="col" style="margin-top:-2px">
                                       <br>   
                                          <button type="button" id="add-item-button" onclick=" countTotal();" >
                                            <i class="fas fa-cart-arrow-down" id="cart">&nbsp;</i></button>
                                        </div>     
                                         
            


                    <div class="col" id="col1-right">
                                  
                              <div class="row" style="margin-left:48px">
                               
                                  <label style="margin-left:-45px; padding-top:5px;color:white; font-weight: none;font-size: 18px;">Transaction No: &nbsp;&nbsp;</label>

                                          <?php  
                                            include 'connection.php';
                                                $date1=date("Y-m-d");
                                                $sql = "SELECT * FROM transaction where payment_date='$date1'";
                                                if ($result=mysqli_query($link,$sql)) {
                                                 $rowcount=mysqli_num_rows($result);
                                                 $total=$rowcount; 
                                                 $final=10000+$total+1;
                                                 

                                                 
                                             ?>
                                        
                                        <div id="transac-id-div"><label style="font-size:18px;margin-top: 4px" id="transaction-id"><?php echo $final;?></label></div>
                                       

                                        <?php
                                         }
                                        ?>
                            </div>



                            <div class="row" style="margin-left:50px;">
                               
                                  <label style="color:white; font-weight: none;font-size: 18px;">Sales No: &nbsp;&nbsp;</label>

                                          <?php  
                                            include 'connection.php';
                                            date_default_timezone_set('Asia/Manila');
                                                $sql = "SELECT * FROM sales";
                                                if ($result=mysqli_query($link,$sql)) {
                                                 $rowcount=mysqli_num_rows($result);
                                                 $timestamp = date('Y-m-d');
                                                 $total=$rowcount+1; 
                                                 $display=$timestamp."-".$total;

                                                 $result = str_replace('-', '', $display);
                                             ?>
                                          <label style="font-size:18px"><?php echo $result;?></label>
                                           <input type='hidden' id='salesNoInput' value='<?php echo $result;?>' style='text-align:center' readonly>

                                        <?php
                                         }
                                        ?>
                            </div>                                                
                </div>
                        


</div> <!-- /# row -->    
</div><!-- container-fluid end -->
</div><!-- main content end -->
</div><!-- content wrap end --> 


<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

           <div class="row" style="width:102%">
             <div style="overflow: auto; height: 420px; background-color:#f0f0f0; border-style:ridge" id="example">
                       
                            <table id="table-order" >
                                <thead >
                                    <tr>     
                                            <th style="width:60px; background-color: #696969;color:white">#</th>                
                                            <th style="width:400px;background-color: #696969;color:white">Item Description</th>
                                            <th style="width:80px;background-color:#696969;color:white">Qty</th> 
                                            <th style="width:130px;background-color:#696969;color:white">Price</th> 
                                            <th style="width:164px;background-color: #696969;color:white">Total</th>
                                    </tr>
                                </thead>
                                            <tbody style="height:20px;overflow:scroll" id="bodytable">
                                            
                                            
                                      
                                            </tbody>
                                </table>
            
</div><!-- /# card -->

 <!--dito po ako ng edit-->
                 <div class="col" style="margin-left:-17px" >
                            <div class="card" id="card3a" style="margin-top:2px; width:103.1%" >
                               
                                    <div class="row" id="row-disc" >
                                            <label id="label" style="font-size:17px">Customer No: </label>
                                            <label id="tax-added" class="value" style="display: none;">+0 </label>
       
                                                <?php
                                                include 'connection.php';  
                                                date_default_timezone_set('Asia/Manila');
                                                $date=date("Y-m-d");
                                                    $sql=mysqli_query($link, "SELECT count(*) as no from sales where payment_date='$date'");
                                                    $row=mysqli_fetch_assoc($sql);
                                                    $rowCount=$row['no']+1; 

                                                    echo ' <label id="customer-no" class="value" >'.$rowCount.'</label>';

                                                ?>

                                             
                                    </div>
                                   <div class="row">
                                            <label id="label">Total Items: &nbsp;</label>
                                            <label id="total-item-id" class="value">0 </label>
                                    </div>

                                    <div class="row">
                                            <label id="label">Sub Total: &nbsp;</label>
                                            <label id="sub-total-id" class="value">0.00 </label>
                                    </div>

                               
                                                

                                     <div class="row" id="row-disc" >
                                            <label id="label">Discount Added: </label>
                                            <label id="discount-added" class="value">-0 </label>
                                    </div>

                                 
                                               
                                    <div class="row" style="margin-top:1%">
                                            <label id="label" style="font-size:22px;">Grand Total:  &nbsp;</label>
                                            <label id="total-payment-to-paid" class="value" style="font-size:22px; font-weight: bold;">0.00</label>
                                    </div>             
                                 
                                     <div class="row" style="margin-top:0%" >
                                                  <label id="label" style="font-size: 16px;">Payment Amount: </label>
                                                  <label id="payment-result" class="value" style=" font-size:18px;">0 </label>
                                    </div>

                                     <div class="row" style="margin-top:0%" >
                                                  <label id="label" style="font-size: 16px;">Change: </label>
                                                  <label id="change" class="value" style=" font-size:18px;">0 </label>
                                    </div>
                                  
                </div>
<!--end ng edit-->


                <div class="row">
                  <button type="button" class="btn btn-primary"  id="complete-sales">
                        <i class="fas fa-receipt" style="font-size:27px">&nbsp;&nbsp;&nbsp;</i>
                        <label>PRINT RECEIPT</label>
                  </button>
                </div>

                <div class="row" style="margin-left:1px">
                    <button type="button" id="delete-item">
                        <i class="fas fa-trash"style="font-size:20px">&nbsp;&nbsp;</i>
                        <label>DELETE ITEM</label>
                    </button>
                    
                    <button type="button" id="new-sales">
                        <i class="fas fa-cart-plus" style="font-size:20px">&nbsp;&nbsp;</i>
                        <label>NEW SALE</label>
                    </button>
                   
                </div>


                <div class="row" style="margin-left:1px; margin-top:-1px">
                    <button  type="button" id="search-item-button" data-toggle="modal" data-target="#search-item-modal"> 
                        <i class="fa fa-search" style="font-size:20px">&nbsp;&nbsp;</i>
                        <label>SEARCH ITEM</label>
                    </button> 

                    <button type="button" id="check-price" data-toggle="modal" data-target="#check-price-modal"><i class="fas fa-tags" style="font-size:20px;color:white;">&nbsp;&nbsp;</i>
                        <label style="color:white;">CHECK PRICE</label>
                    </button> 
                      
                </div>


                 <div class="row" style="margin-left:1px; margin-top:-1px">
                    <button type="button" id="transaction" style="background-color:#9400D3;color:white;" data-toggle="modal" data-target="#trasaction-modal">
                        <i class="fas fa-clipboard" style="font-size:20px;">&nbsp;&nbsp;</i>
                        <label>SALES HISTORY</label>

                     </button>
                     <button type="button" id="cancel-sales">
                        <i class="fas fa-window-close" style="color:white;font-size: 20px">&nbsp;&nbsp;</i>
                        <label style="color:white">CANCEL SALE</label>
                    </button>

                    


                      
                </div>

              




                
                                   
                                   
                                    
                                   



</div> <!-- /# row -->    
</div><!-- container-fluid end -->
</div><!-- main content end -->
</div><!-- content wrap end --> 
  

<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
 
                <div class="row" class="aa" style="margin-left:-14px; margin-top:-122px;background-color:#4a4a4a;
                width: 63.6%;height: 117px;">
                    <div id="card4a" class="col">
                             
                         <div class="row" style="margin-left:10px; margin-top: 20px;">
                                 <label class="label1">Set Discount: </label>
                        <div class="col">  
                            <div class="input-group mb-3" style="width:100%">
                                <input type="text" id="discount-entire-order" class="value">
                                 <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div> 

                  
                        <button id="paybtn1">
                            <input type="radio" style="margin-top: 2%" value="Cash" name="typePay" id="select1">
                            <label style="margin-left:7px">Cash</label>
                        </button>



                         <div class="row" style="margin-left:46px;dis">
                            <label class="label1">Set Vat: </label>
                            <div class="col">
                                <div class="input-group mb-3">
                                <input type="text" id="vat" class="value" value="0">
                                 <span class="input-group-text" id="basic-addon2">%</span>
                                </div>
                             </div>  

                            
                             <button id="paybtn2">
                                <input type="radio" style="margin-top:1.6%; margin-left: 4%;" value="G-Cash" 
                                name="typePay" id="select2">
                                 <label style="margin-left:7px">G-Cash</label>
                            </button>        
                                          
                          </div>  

                      </div>  
                                                                     
                       </div>
                   </div>
                 <div style="position: absolute; margin-top: -78px; margin-left: 500px;">
                             <label id="label" style="font-size:20px;color:white">Payment: </label>
                                <input type="text" id="payment-input" class="value" style="width:150px; height: 50px;">  
                        </div>


<input type="hidden" id="barcode-for-del" >


 <div id='DivIdToPrint' style="display:none;">
<center><img src="assets/images/remove6.png" style="width:45px; padding-bottom:6px;"></center>

  <center><label style="font-size:12px;font-family:Arial">Erlinda's Grocery Store</label></center>
  <div style="height:7px"></div>
  <center><span style="font-size:10px; font-family:Arial; margin-top: 20px;">1046 Bayan Luma 8</span></center>
   <center><span style="font-size:10px; font-family:Arial">Imus, City Cavite</span></center>
  


 <center><span style="font-size: 10px; font-family:Arial;">Valid Until: <?php $date=date("m/d/Y" , strtotime($date. ' + 2 days')); ;
echo $date; ?></span></center>

 <div style="height:7px"></div>
<center><span style="font-size: 10px; font-family:Arial;">Receipt No:</span><span id="order-no" style="font-size:10px; font-family:Arial;"></span></center>

<center><span style="font-size: 10px; font-family:Arial;">TRN No:980628</span></center>


<span style="margin-bottom:20px;"></span>


</div>


</div> <!-- /# row -->    
</div><!-- container-fluid end -->
</div><!-- main content end -->
</div><!-- content wrap end --> 


<div  class="modal fade" id="trasaction-modal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="max-width:75%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="width:100%;"><label>Transaction History</label></h5>
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
                    <div class="table-responsive" id="exam">
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

        <center><div><label style="font-size: 19px;">Enter Barcode or Item Name</label><input class="form-control"  style="margin-top: 10px; width: 70%;height: 50px;text-align: center;" id="find-item-price"></div><br>
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


<div  class="modal fade" id="search-item-modal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="max-width:75%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="width:100%;"><label>Item Catalogue</label></h5>
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
                    <div class="table-responsive" id="exam2">
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


                                    $result=mysqli_query($link, "SELECT distinct item_name from batch where qty_on_shelf>0 ORDER BY `date_created` ASC");

                                    if ($result->num_rows >0){
                                        while ($row= $result->fetch_assoc()) {

                                              $item_name=$row['item_name'];
                                                    $sql1=mysqli_query($link, "SELECT * from items where item_name='$item_name'");
                                                    $row1=mysqli_fetch_assoc($sql1);
                                                    $perisable=$row1['perisable'];

                                                      $sqlRes=mysqli_query($link, "SELECT * from batch where item_name='$item_name'");
                                                    $rows=mysqli_fetch_assoc($sqlRes);


                                                    if ($perisable=="YES"){
                                                        $qty=$rows['qty_on_shelf']."g";
                                                    }else{
                                                        $qty=$rows['qty_on_shelf'];
                                                    }

                                                  
                                            echo '
                                                <tr>
                                                    <td>'.$rows['barcode'].'</td>
                                                    <td>'.$row['item_name'].'</td>
                                                    <td><center>'.number_format($rows['price'],2).'</center></td>
                                                    <td><center>'.$qty.'</center></td>
                                                </tr>
                                            ';

                                        }

                                    }
                                        
                                ?>                        
                    </tbody>
                </table>
                      
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
     <script src='codes/javascript/POS.js'></script>
</body>

</html>

<script type="text/javascript">
      
      
</script>