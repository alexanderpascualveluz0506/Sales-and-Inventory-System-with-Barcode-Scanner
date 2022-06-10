<html>  
  
<head>  
<style type="text/css">
.red {
    background-color: red;
}

.yellow {
    background-color: yellow;
}
td{
    background-color: white;
}
.greenBg {
    background: green;
}
</style>
</head>  
  <?php



    $lowest_price=19    ;
    $heighest_price=24;

    $min_demand=35;
    $max_demand=45;

    $min_supply=40;   //based on opening stock
    $max_supply=60;   //based on total supply

    $qd2=-45;

    $operationQD=($min_demand-$max_demand)/($heighest_price-$lowest_price);

    echo "QD = " .$operationQD;
    echo "<br>";

    $operationQS=($min_supply-$max_supply)/($lowest_price-$heighest_price);
 
     echo "QS = " .$operationQS;
      echo "<br>";

      $formula_operation_demand1=$operationQD*(-$lowest_price);
      $formula_operation_demand2=$formula_operation_demand1+56;


    $formula_operation_supply1=$operationQS*(-$heighest_price);
      $formula_operation_supply2=$formula_operation_supply1+$max_supply;


    $hello=($operationQS)+abs($operationQD);
    echo $hello;
    echo "<br>";
    $df=abs($formula_operation_supply2)+($formula_operation_demand2);
    echo $df;
    echo "<br>";
    $operate=$df/$hello;
  
    $format1 = number_format($operate, 2);
      echo "Equillibrium Price: ".$format1. " or " .round($operate);;


    $demand= $operationQD*($operate)+($formula_operation_demand2);
      echo "<br>";
    echo "Equillibrium Demand: " .(round($demand));

     $supply= $operationQS*($operate)+($formula_operation_supply2);
      echo "<br>";
    echo "Equillibrium Quantity: " .(round($supply));

            
    








    if ($formula_operation_demand1>0){
          echo "<br>";
            echo "QD = ".$operationQD. "P" ."+" .$formula_operation_demand2 ;

      }else{
         echo "<br>";
        echo "QD = ".$operationQD. "P" ." " .$formula_operation_demand2 ;
      }

    



        if ($formula_operation_supply1>0){
          echo "<br>";
      echo "QD = ".$operationQS. "P" ."+" .$formula_operation_supply2 ;

      }else{
         echo "<br>";
        echo "QS = ".$operationQS. "P" ." " .$formula_operation_supply2 ;
      }

echo "<br>";
?>


<body>


    <form action="" method="POST">
     
         
<br>
        
        <button class="btn btn-info" id="button-add-row" onclick="aa();"><i class="ti-plus"> 
                           <label>New Type</label></i></button>
<br><br>

                    <table id="table_ID" class="table table-striped table-bordered" style="width:60%; margin-left: 10%;">
                        <thead>
                            <tr>

                                 <th class="table-header" style="width:290px;" id>Price</th>
                                 <th class="table-header">Demand</th>
                                  <th class="table-header">Supply</th>
                            </tr>
                 
                        </thead>
                           <tbody id="tbody">
                                
                    </tbody>
                </table>

    </form>
    



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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
</body>  
  

</html>  




<script type="text/javascript">
    $('document').ready(function() {
 
       for(var a=19; a<=19+10; a++){
        
        pre=a-.33;
        opt = pre.toFixed(2);
        
        optValue=a;

        demand1=(opt)*(-2)+94;
         demand1A=Math.ceil(demand1);
        demand2=(optValue)*(-2)+94;

        supply1=(opt)*(4)-36;
        supply1A=Math.ceil(supply1);
        supply2=(optValue)*(4)-36;

        $("tbody").append('<tr><td>' + opt +'</td><td>'+demand1A+'</td><td>'+supply1A+'</td></tr>');
      


        $("td:contains('20.67')").parent().css("background-color","yellow");  
       
}

});




</script>

  <script>


    </script>