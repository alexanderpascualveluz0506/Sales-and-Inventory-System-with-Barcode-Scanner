
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
    <link href="codes/design/report_style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="codes/javascript/JSsupplier.js"></script>
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
                    <span class="title-page"> <br>Dashboard / Report</span>
                    </div>
                                
                </div>
<form action="" method="POST">
<section id="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="cardForStorage">
                  <div class="l-lcog-4 p-l-0 title-margin-left">


            <div class="row g-3">
                    <div class="col-sm">
                    <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="mainreport" class="table table-striped table-bordered">     
                        <tbody>
                            <tr><td id="sales"><i class="far fa-chart-bar"></i>Sales</td></tr>
                            <tr><td id="items"><i class="fas fa-box-open"></i>Items </td></tr>
                            <tr><td id="inventory"><i class="fas fa-dolly"></i>Inventory </td></tr>       
                            <tr><td id="expenses"><i class=" fas fa-file-invoice-dollar"></i>Expenses</td></tr>
                            <tr><td id="accounts"><i class=" fas fa-address-card"></i>Accounts</td></tr>

                                 
                    </tbody>
                </table>
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 
            </div><!-- column end here-->

            <div class="col-sm"  id="OptionDiv" style="display:none">
                 <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="optionDiv" class="table table-striped table-bordered">
                        <thead><th>SELECT REPORT TYPE</th></thead>
                         
                           <tbody id="sales-report" style="display:none">
                          
                            <tr><td onclick="summary();"><i class="far fa-file"></i> Summary Report</td></tr>
                            <tr><td onclick="daily();"><i class=" far fa-clock"></i>Daily Sales Report </td></tr>
                            <tr><td onclick="weekly();"><i class="fas fa-calendar-week"></i></i>Weekly Sales Report</td></tr>
                            <tr><td onclick="monthly();" ><i class="far fa-calendar-alt"></i>Monthly Sales Report</td> </tr>
                            <tr><td  onclick="yearly();"><i class="fas fa-calendar"></i>Yearly Sales Report</td></tr>
                              <tr><td  onclick="item();"><i class="fas fa-tags"></i>Item Sales</td></tr>
                                <tr><td  onclick="manufacturing();"><i class="fas fa-truck"></i>Item Manufacturing Sales</td></tr>
                       
                           
                            <tr><td onclick="returnReport();"><i class=" fas fa-cart-arrow-down"></i>Return/Refund</td></tr>                  
                            </tbody>


                            <tbody id="items-report" style="display:none">     
                            <tr><td onclick="topItem();"><i class="fas fa-long-arrow-alt-up"></i>Top Selling Item Report</td></tr>
                            <tr><td onclick="lowItem();"><i class="  fas fa-long-arrow-alt-down"></i>Low Selling Items Report</td></tr>
                            <tr><td onclick="pricingItem();"><i class="fas fa-tag"></i>Pricing History Report</td></tr>
                            </tbody>


                            <tbody id="inventory-report" style="display:none">     
                            <tr><td onclick="InventorySummary();"><i class="far fa-file"></i> Summary Report</td></tr>
                            <tr><td onclick="DamagedItem();"><i class="fas fa-exclamation-triangle"></i>Damaged Item Report</td></tr>
                            <tr><td onclick="ExpiringItem();"><i class="fas fa-calendar-times"></i>Expiring Item Report</td></tr>
                            <tr><td onclick="LowInventory();"><i class="fas fa-arrow-down"></i>Low Inventory Report</td></tr>
                            <tr><td onclick="BatchTracking();"><i class="fas fa-boxes"></i>Batch Tracking Report</td></tr>
                            </tbody>

                            <tbody id="store-capacity-report"style="display:none"> 
                            <tr><td><i class="far fa-file"></i> Summary Report</td></tr>
                            <tr><td><i class="fa fa-line-chart"></i>Graphical Report</td></tr>
                            <tr><td><i class="fas fa-pallet"></i>Storage Report</td></tr>
                            </tbody>

                

                            <tbody id="supplier-report" style="display:none"> 
                            <tr><td onclick="supplierSummary();"><i class="far fa-file"></i> Summary Report</td></tr>
                             <tr><td><i class="fa fa-line-chart"></i>Graphical Report</td></tr>
                            
                    

                            <tbody id="purchase-order-report"style="display:none"> 
                            <tr><td onclick="purchaseSummary();"><i class="far fa-file"></i> Summary Report</td></tr>
                            <tr><td onclick="purchaseClaimed();"><i class="fas fa-clipboard-check"></i>Purchase Order Claimed Report</td></tr>
                            <tr><td onclick="purchaseReceiving();"><i class="fas fa-truck-loading"></i>Purchase Order Receiving Report</td></tr>
                            <tr><td onclick="canceledOrder();"><i class="fas fa-ban"></i>Canceled Order Report</td></tr>
                            </tbody>


                            <tbody id="online-orders-report"style="display:none"> 
                            <tr><td><i class="far fa-file"></i> Summary Report</td></tr>
                            <tr><td><i class="fas fa-inbox"></i>Pending Orders Report </td></tr>
                            <tr><td><i class="fas fa-truck"></i>To Delivered Orders Report</td></tr>
                            <tr><td><i class="fas fa-hand-holding"></i>Claimed Orders Report</td></tr>
                            </tbody>

                            <tbody id="expenses-report"style="display:none"> 
                            <tr><td onclick="ExpenseSummary();"><i class="far fa-file"></i> Summary Report</td></tr>
                            <tr><td onclick="ExpenseGraph();"><i class="fa fa-line-chart"></i>Graphical Report</td></tr>
                            </tbody>
                            
                            <tbody id="accounts-report"style="display:none"> 
                            <tr><td onclick="accountLogs();"><i class="fa fa-line-chart"></i>Account Logs Report</td></tr>
                            </tbody>
       
                        </table>       
                     </div><!-- /# table-responsive -->     
                </div><!-- /# bootstrap-data-table-panel --> 
            </div>

    
        
 </div><!-- end of the table column-->


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

</html>

<script type="text/javascript">

function summary(){ 
document.location.href = "salesReport.php?type=Summary_of_Sales_Report";
}
function daily(){ 
document.location.href = "salesReport.php?type=Daily_Sales_Report";
}
function weekly(){ 
document.location.href = "salesReport.php?type=Weekly_Sales_Report";
}
function monthly(){ 
document.location.href = "salesReport.php?type=Monthly_Sales_Report";
}
function yearly(){ 
document.location.href = "salesReport.php?type=Yearly_Sales_Report";
}

function item(){ 
document.location.href = "salesReportConti.php?type=Item_Sales_Report";
}

function manufacturing(){ 
document.location.href = "salesReportConti.php?type=Item_Manufacturer_Report";
}
function online(){ 
document.location.href = "salesReport.php?type=onlineReport";
}
function returnReport(){ 
document.location.href = "salesReport.php?type=Sales_Return_Report";
}
function InventorySummary(){ 
document.location.href = "InventoryReport.php?type=Inventory_Summary_Report";
}
function DamagedItem(){ 
document.location.href = "InventoryReport.php?type=Damaged_Item_Report";
}
function ExpiringItem(){ 
document.location.href = "InventoryReport.php?type=Expiring_Item_Report";
}
function LowInventory(){ 
document.location.href = "InventoryReport.php?type=Low_Inventory_Report";
}
function BatchTracking(){ 
document.location.href = "InventoryReport.php?type=Batch_Tracking_Report";
}

function itemSummary(){ 
document.location.href = "itemReport.php?type=Item_Summary_Report";
}
function topItem(){ 
document.location.href = "itemReport.php?type=Top_Selling_Item_Report";
}
function lowItem(){ 
document.location.href = "itemReport.php?type=Low_Selling_Item_Report";
}
function pricingItem(){ 
document.location.href = "itemPriceReport.php?type=Pricing_History_Report";
}
function ExpenseSummary(){ 
document.location.href = "expensesReport.php?type=Expense_Summary_Report";
}
function ExpenseGraph(){ 
document.location.href = "expenseReportGraph.php?type=Expense_Graphical_Report";
}
function purchaseSummary(){ 
document.location.href = "purchaseOrderReport.php?type=purchaseSummaryReport";
}
function purchaseClaimed(){ 
document.location.href = "purchaseOrderReport.php?type=purchaseClaimedReport";
}
function purchaseReceiving(){ 
document.location.href = "purchaseOrderReport.php?type=purchaseReceivingReport";
}
function canceledOrder(){ 
document.location.href = "purchaseOrderReport.php?type=canceledOrderReport";
}
function priceRulesSummary(){
  document.location.href = "priceRulesReport.php?type=priceRulesSummaryReport";  
}
function taxSummary(){
  document.location.href = "priceRulesReport.php?type=taxSummaryReport";  
}

function discountSummary(){
  document.location.href = "priceRulesReport.php?type=discountSummaryReport";  
}

function supplierSummary(){
  document.location.href = "supplierReport.php?type=supplierSummaryReport";  
}
function accountLogs(){
  document.location.href = "accountReport.php?type=Account_Logs_Report";  
}
 $(document).ready(function(){
  $("td").click(function(){
         $("#OptionDiv").css("display", "block"); 
            if (this.id == "sales") {
                $("#sales-report").show(); 

                $("#items-report").hide();
                $("#inventory-report").hide(); 
                $("#store-capacity-report").hide();
                $("#purchase-order-report").hide();
                $("#supplier-report").hide();
                $("#online-orders-report").hide();
                $("#expenses-report").hide();
                $("#accounts-report").hide();         
            }
            if(this.id == "items") {
                $("#items-report").show(); 

                $("#sales-report").hide();
                $("#inventory-report").hide();
                $("#store-capacity-report").hide(); 
                $("#price-rules-report").hide();
                $("#purchase-order-report").hide();
                $("#supplier-report").hide();
                $("#online-orders-report").hide();
                $("#expenses-report").hide();
                $("#accounts-report").hide();          
            }
              if(this.id == "inventory") {
                $("#inventory-report").show(); 

                $("#sales-report").hide();
                $("#items-report").hide();
                $("#store-capacity-report").hide();
                $("#price-rules-report").hide();
                $("#purchase-order-report").hide();
                $("#supplier-report").hide();
                $("#online-orders-report").hide();
                $("#expenses-report").hide();
                $("#accounts-report").hide();           

            }
             if(this.id == "capacity") {
                $("#store-capacity-report").show(); 

                $("#sales-report").hide();
                $("#items-report").hide();
                $("#inventory-report").hide();
                $("#price-rules-report").hide();
                $("#purchase-order-report").hide();
                $("#supplier-report").hide(); 
                $("#online-orders-report").hide();
                $("#expenses-report").hide();
                $("#accounts-report").hide();         

            }

              if(this.id == "price-rules") {
                $("#price-rules-report").show(); 

                $("#sales-report").hide();
                $("#items-report").hide();
                $("#inventory-report").hide();
                $("#store-capacity-report").hide();
                $("#purchase-order-report").hide();
                $("#supplier-report").hide();
                $("#online-orders-report").hide();
                $("#expenses-report").hide();
                $("#accounts-report").hide();        

            }

             if(this.id == "purchase-order") {
                $("#purchase-order-report").show(); 

                $("#sales-report").hide();
                $("#items-report").hide();
                $("#inventory-report").hide();
                $("#store-capacity-report").hide();
                $("#price-rules-report").hide(); 
                $("#supplier-report").hide();
                $("#online-orders-report").hide();
                $("#expenses-report").hide();
                $("#accounts-report").hide();      

            }

             if(this.id == "supplier") {
                $("#supplier-report").show(); 

                $("#sales-report").hide();
                $("#items-report").hide();
                $("#inventory-report").hide();
                $("#store-capacity-report").hide();
                $("#purchase-order-report").hide(); 
                $("#price-rules-report").hide();
                $("#online-orders-report").hide();
                $("#expenses-report").hide();
                $("#accounts-report").hide();     

            }

             if(this.id == "online-orders") {
                $("#online-orders-report").show(); 

                $("#sales-report").hide();
                $("#items-report").hide();
                $("#inventory-report").hide();
                $("#store-capacity-report").hide();
                $("#purchase-order-report").hide(); 
                $("#price-rules-report").hide();
                $("#supplier-report").hide();
               $("#expenses-report").hide();
                $("#accounts-report").hide();     

            }

               if(this.id == "expenses") {
                $("#expenses-report").show(); 

                $("#sales-report").hide();
                $("#items-report").hide();
                $("#inventory-report").hide();
                $("#store-capacity-report").hide();
                $("#purchase-order-report").hide(); 
                $("#price-rules-report").hide();
                $("#supplier-report").hide();
                $("#online-orders-report").hide();
                $("#accounts-report").hide();    

            }
  
              if(this.id == "accounts") {
                $("#accounts-report").show(); 

                $("#sales-report").hide();
                $("#items-report").hide();
                $("#inventory-report").hide();
                $("#store-capacity-report").hide();
                $("#purchase-order-report").hide(); 
                $("#price-rules-report").hide();
                $("#supplier-report").hide();
                $("#online-orders-report").hide();
                $("#expenses-report").hide();   

            }
  
  
  
  
  });

});
</script>