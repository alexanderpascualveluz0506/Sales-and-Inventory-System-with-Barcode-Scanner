

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
    <link href="codes/design/inventory_style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 
</head>


<body>

<a href="" data-perishable="YES" data-name="Mega Fried Sardines Hot and Spicy 155 grams" id="try">


   <div class="row g-3" style="margin-left: 41%;">
         <a href="#" id="generate-based-on-record" data-record="record">Generate Based on Store Record</a>
   </div>

     <center><label style="margin-top:1%">OR</label></center>

<div style=" margin-left: 2%;">
  <div class="row g-3" style="margin-top:1%">
    <label class="col-sm-2 col-form-label">Avg Daily Demand</label>
    <div class="col-sm-10" style="margin-left:-2%"> 
      <input type="text" class="form-control" id="demand-input">
    </div>
  </div>

   <div class="row g-3" style="margin-top:1.4%; margin-left:.7%">
    <label class="col-sm-2 col-form-label" style="margin-top:-1%;">Avg Lead Time <span style="font-size:14px; color:blue"><br>(no of days)</span></label>
    <div class="col-sm-10" style="margin-left:-3.5%">
      <input type="text" class="form-control" id="lead-time-input">
    </div>
  </div>

 
  
   <div class="row g-3" style="margin-left: 43.8%; margin-top:1%">
         <a href="#" id="generate-assume">Generate Now</a>
   </div>

   <div id="result-reorder" style="margin-left: 35.6%; margin-top:2%">

   </div>

</body>


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


$(document).on('click','#generate-assume',function(e){

var perishable=$("#try").data('perishable');
var demand=$("#demand-input").val();
var lead_time=$("#lead-time-input").val();



 $.ajax({
  url: "getdatainventory.php",
  type: "POST",
  data:{"perishable":perishable,
        "demand":demand,
        "lead_time":lead_time
      
      
},
success: function(data){                    
        $("#result-reorder").html(data);
        }
    });
});

$(document).on('click','#generate-based-on-record',function(e){

var perishable=$("#try").data('perishable');
var record=$("#generate-based-on-record").data("record");
var itemname=$("#try").data('name');


 $.ajax({
  url: "getdatainventory.php",
  type: "POST",
  data:{"perishable_record":perishable,
        "record":record, 
        "itemname_record":itemname
      
      
},
success: function(data){                    
        $("#result-reorder").html(data);
        }
    });
});
</script>