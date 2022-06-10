                                 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"></link>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<style type="text/css">
   input[type="text"]{
      margin-left:3%;
   }
   .row{
      margin-top: 2%;
   }
   #result-table th{

    background-color:#343957;
    color: white;
    border-style: none;
    font-weight: normal;
    border-color: none;
    height: 10px;
    text-align: center;

}

#result-table td{
    background-color: white;
          border-right: none;
        border-left: none;
        border-top: none;
        text-align: center;
    
}
</style>
<body>
  
<?php
include 'connection.php'; 
$itemname=$_GET['name'];
$batch=$_GET['batch'];

$sql=mysqli_query($link, "SELECT * from batch where batch_no='$batch'");
$row=mysqli_fetch_assoc($sql);
$price=$row['price'];
$cost=$row['costPerUnit'];
$total_batch_arrive=$row['total_batch_arrive'];
$quantity_sold=$row['qty_sold'];
?>
<br>
<center><label>Record of <?php echo $batch." "."- ".$itemname.""?></label></center>
<div style="width:50%;margin-left: 38%; margin-top: 2%;">

<div class="row">
   <label>Qty Supplied</label>
   <div class="col-sm">
      <input type="text" class="form-control" value="<?php echo $total_batch_arrive; ?>" style="width: 200px;" id="qty-supplied">
   </div>
</div>

<div class="row" style="margin-left: -4.5%;">
  <label>Qty Demanded</label>
   <div class="col-sm">
      <input type="text" class="form-control" value="<?php echo $quantity_sold; ?>" style="width: 200px;" id="qty-demand">
   </div>
</div>

<div class="row"  style="margin-left: -2.3%;">
  <label>Current Price</label>
   <div class="col-sm">
      <input type="text" class="form-control" value="<?php echo $price; ?>" style="width: 200px;" id="current-price">
   </div>
</div>
<br>
<label style="margin-left:8%">Assume the following fields</label>
<div class="row" style="margin-left: -5%;">
   <label>Supply to Offer</label>
   <div class="col-sm">
      <input type="text" class="form-control" style="width: 200px;" id="supply-to-offer">
   </div>
</div>

<div class="row"  style="margin-left: -10.5%;">
  <label>Goal Qty Demanded</label>
   <div class="col-sm">
      <input type="text" class="form-control" style="width: 200px;" id="goal-qty-demand">
   </div>
</div>

<div class="row" style="margin-left: -8.5%;">
       <label>New Price Markup</label>
   <div class="col-sm">
      <input type="text" class="form-control" style="width: 200px;" id="new-price">
   </div>
</div>

</div>

<div style="width:50%;margin-left: 48.5%; margin-top: 2%;">
   <button type="button" class="btn btn-primary" id="generateSuggestedPrices">View Result</button>
</div>

<div class="result" style="margin-top:2%">

<table id="result-table" class="table table-striped table-bordered" style="width:80%;margin-left: 10%;">
</table>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
    <script src="select2/dist/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <!-- sidebar -->

  
</body>
</html>
<script>
   $(document).ready(function() {
$('#generateSuggestedPrices').on('click', function() {
  
   var current_price=$("#current-price").val();
   var new_price=$("#new-price").val()

   var qty_demand=$("#qty-demand").val();
   var goal_qty_demand=$("#goal-qty-demand").val();
   
   var qty_supplied=$("#qty-supplied").val();
   var supply_to_offer=$("#supply-to-offer").val();

   var QD_1=(qty_demand-goal_qty_demand);
   var QD_2=(current_price-new_price);
   var QD_3=(QD_1)/(QD_2);


   var QS_1=(qty_supplied-supply_to_offer);
   var QS_2=(current_price-new_price);
   var QS_3=(QS_1)/(QS_2);


   var operation_QD1=QD_3*(new_price)*(-1);
   var operation_QD2=(operation_QD1)+(+goal_qty_demand);
   

   var operation_QS1=QS_3*(new_price)*(-1);;
   var operation_QS2=(operation_QS1)+(+supply_to_offer);




   $("#result-table").append('<thead><th>Price</th><th>Demand</th><th>Supply</th></thead>');
   var ab=(+current_price)+(+5);
       for(var a=current_price; a<=ab; a++){
         var final=a;
         var demand=(QD_3)*(a)+(operation_QD2);
         var supply=(QS_3)*(a)+(operation_QS2);

            $("#result-table").append('<tr><td >' + final +'.00</td><td>'+ demand+'</td><td>'+supply+'</td></tr>'); 
       }
});

})
</script>


