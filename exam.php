    <script src = 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
        </script>
<script>

  $('document').ready(function() {

    $('#btn').on('click', function() {

    var costPerUnit=$("#cost-label").text();  
var lowestDemand = $("#lowest-demand").val();
var highestDemand = $("#highest-demand").val();
var lowestSupply=$("#lowest-supply").val();
var highestSupply=$("#highest-supply").val();
var floor=$("#price-floor").text();
var PriceFloor = floor.match(/\d+/);
var ceiling=$("#price-ceiling").text();
var PriceCeiling = ceiling.match(/\d+/);

var minPriceTotal= costPerUnit/(100-PriceFloor)*100;
var maxPriceTotal=costPerUnit/(100-PriceCeiling)*100;
var minPriceInput=$("#min-price").val(Math.round(minPriceTotal));
var minPriceInput=$("#max-price").val(Math.round(maxPriceTotal));

var minPrice=$("#min-price").val();
var maxPrice=$("#max-price").val();

// Quantity Demand Equal for QD
var operationQD=lowestDemand-highestDemand;
var operationPrice=Math.round(maxPrice-minPrice);
var QD=Math.round(operationQD/operationPrice);

// Quantity Supply Equal for QS
var operationQS=lowestSupply-highestSupply;
var operationPriceQS=Math.round(minPrice-maxPrice);
var QS=Math.round(operationQS/operationPriceQS);


// formula for demand
 var formula_operation_demand1= QD * (-minPrice);
 var formula_operation_demand2=Math.round((+formula_operation_demand1)+(+highestDemand));
  alert(formula_operation_demand2);

// formula for supply
 var formula_operation_supply1= QS * (-maxPrice);
 var formula_operation_supply2=Math.round((+formula_operation_supply1)+(+highestSupply));


//equillibrium Price
var part1= (formula_operation_demand2)+(formula_operation_supply2*-1);
var part2= (QS)+(QD*-1);
var equillibriumPrice= (part1/part2);


var finalprice=equillibriumPrice.toFixed(2)
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

var num = Number(costPerUnit)
       for(var a=num; a<=18+10; a++){
       var decimals = finalprice-Math.floor(finalprice);
        pre=a+decimals;
        opt = pre.toFixed(2);
        
        optValue=a.toFixed(2);

     
        demand1=(optValue)*(QD)+formula_operation_demand2;
        demandforWholeNum=Math.ceil(demand1);
        demand2=(opt)*(QD)+formula_operation_demand2;
        demandforNotWholeNum=Math.ceil(demand2);

        supply1=(optValue)*(QS)+formula_operation_supply2;
        supplyforWholeNum=Math.ceil(supply1);
        supply2=(opt)*(QS)+formula_operation_supply2;
        supplyforNotWholeNum=Math.ceil(supply2);

        $("tbody").append('<tr><td >' + optValue + '</td><td>'+ demandforWholeNum+'</td><td>'+supplyforWholeNum+'</td></tr>');  

        if (a+decimals>a){
        $("tbody").append('<tr><td>' + opt +'</td><td>'+demandforNotWholeNum+'</td><td>'+supplyforNotWholeNum+'</td></tr>');
    }
        


        

       
}
  var pricefloors=Math.round(costPerUnit/(100-PriceFloor)*100);
  var priceceiling=Math.round(costPerUnit/(100-PriceCeiling)*100);
  alert(priceceiling);
    for (var i=pricefloors; i<=priceceiling; i++ ){
        var decimals = finalprice-Math.floor(finalprice);
        var dec=i-1+decimals;
        $('td:contains("'+dec+'")').parent().css("background-color","red"); 
        var b=i.toFixed(2);
         $('td:contains("'+b+'")').parent().css("background-color","red"); 
       

       var trs=pricefloors-1+decimals;

       $('td:contains("'+trs+'")').parent().css("background-color","white");   
       
        
    }
  $('td:contains("'+finalprice+'")').parent().css("background-color","yellow"); 

    });     



});

</script>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

      <div class="row g-3" id="row0cp">
                    <label>Cost per Unit: </label>
                     <div class="col-sm">
                            <label id="cost-label">20.00</label>
                        </div>
                </div>


                <div class="row g-3" id="row1cp">
                    <label>Lowest No of Demand</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="lowest-demand" value="50">
                        </div>
                </div>

                <div class="row g-3" id="row2cp">
                    <label>Highest No of Demand</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="highest-demand" value="70">
                        </div>
                </div>



                <div class="row g-3" id="row3cp">
                    <label>Lowest No of Supply</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="lowest-supply" value="85">
                        </div>
                </div>

                <div class="row g-3" id="row4cp">
                     <label>Highest No of Supply</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="highest-supply" value="100">
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
                            <input type="text" class="form-control" id="min-price" value="22">
                        </div>
                </div>


                <div class="row g-3" id="row8cp">
                     <label>Max Price</label>
                     <div class="col-sm">
                            <input type="text" class="form-control" id="max-price" value="25">
                        </div>
                </div>


                <div class="row g-3" id="row8cp">
                     <label>Equillibrium Price</label> <span id="price-check"></span>
                </div>
                   <div class="row g-3" id="row8cp">
                     <label>Equillibrium Demand Quantity</label> <span id="demand-check"></span>
                </div>

                      <div class="row g-3" id="row8cp">
                     <label>Equillibrium Supply Quantity</label> <span id="supply-check"></span>
                </div>



                <button id="btn">hrhr</button>



   
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

</body>
</html>