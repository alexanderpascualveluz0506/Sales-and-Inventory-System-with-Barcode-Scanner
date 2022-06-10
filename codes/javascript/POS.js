 function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}

$('#cancel-sales').click(function(){
        location.reload();
    });

$('#new-sales').click(function(){
        location.reload();
    });

$("#paybtn1").click(function(){
  $("#select1").prop('checked', true);
  $("#paybtn1").css('background-color', '#dc3545');
  $("#paybtn2").css('background-color', '#007bff');

});
$("#paybtn2").click(function(){
   $("#select2").prop('checked', true);
  $("#paybtn2").css('background-color', '#dc3545');
  $("#paybtn1").css('background-color', '#007bff');

});

$("#per-customer").click(function(){
        $(this).css('color', '#dc3545');
        $("#per-item").css('color', '#3898ff');
        $("#deleted-item-list").css('color', '#3898ff');
});

$("#per-item").click(function(){
        $(this).css('color', '#dc3545');
        $("#per-customer").css('color', '#3898ff');
        $("#deleted-item-list").css('color', '#3898ff');
});

$("#deleted-item-list").click(function(){
        $(this).css('color', '#dc3545');
        $("#per-customer").css('color', '#3898ff');
        $("#per-item").css('color', '#3898ff');
});


$(document).on("keypress", "#find-item-price", function(e){
    var itemCheck=$("#find-item-price").val();
      $.ajax({
 url: "codes/functions/getdataPOS_function.php",
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
 url: "codes/functions/getdataPOS_function.php",
  type: "POST",
  data:{"itemCheckFIND":itemCheckFIND
      
},
success: function(data){    
              $("#price-check-result").append(data); 
            

        }
    });

}); 


$(document).on("click", "#per-item", function(e){
    e.preventDefault();
    var salesNoTranasaction=1;

    $("#transaction-result").empty();
      $.ajax({
 url: "codes/functions/getdataPOS_function.php",
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
 url: "codes/functions/getdataPOS_function.php",
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
  url: "codes/functions/getdataPOS_function.php",
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
  url: "codes/functions/getdataPOS_function.php",
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
                    var value = $('td', this).eq(4).text();
                    if (!isNaN(value)) {
                        total=(+total)+(+value);
                    }
                });
               
                $('#sub-total-id').text(total.toFixed(2));

                var dsicount_added=$("#discount-added").text();
                var final_discount=(parseFloat(dsicount_added)).toFixed(2);
                var final_total=total-final_discount;
                $('#total-payment-to-paid').text(final_total.toFixed(2));

                var tax_added=$("#tax-added").text();
                var final_tax=(parseFloat(tax_added)).toFixed(2);
                var final_total_tax=(+total)+(+final_tax);
                $('#total-payment-to-paid').text(final_total_tax.toFixed(2));


                var total_item = 0;
                $("#table-order tr").each(function() {
                    var total_item_value = parseInt($('td', this).eq(2).text());
                    if (!isNaN(total_item_value)) {
                       total_item += total_item_value;
                    }
                });

                $('#total-item-id').text(total_item);

                $('#table-order tr').dblclick(function(){
                    $(this).toggleClass('selected').css('background-color', '#ff6161');
                    $(this).addClass('highlighted');
    
                });

                $('#table-order tr').click(function(){
                    $('#table-order tr').css('background-color', 'white');
                    $(this).removeClass('highlighted');
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


$(document).on('click','#add-item-button',function(e){
  var itemTransaction=1;
  $("#transaction-id").remove();
 $.ajax({
  url: "codes/functions/getdataPOS_function.php",
  type: "POST",
  data:{"itemTransaction":itemTransaction,
},
success: function(data){    
          $("#transac-id-div").append(data);
        }
    });

});


     $('#vat').keypress(function(e) {
          if (e.which == 13) {
                var num=$("#vat").val();
                var totalpayment=$('#total-payment-to-paid').text();
                var totalwithvat=(totalpayment/100);
                var final=totalwithvat*num;
                var finaltax=final.toFixed();
                var tax=$("#tax-added").text("+"+finaltax);
                var finaltotalpayment=(+totalpayment)+(+final);
                var finalpayment=finaltotalpayment.toFixed(2);
                $('#total-payment-to-paid').text(finalpayment);
        }
});

  $('#discount-entire-order').keypress(function(e) {
        if (e.which == 13) {
               var totalpayment=$('#total-payment-to-paid').text(); 
                var num=$("#discount-entire-order").val();
               

                var discount=(totalpayment)*(num)/100;
               
                var b=$("#discount-added").text("-"+discount);


              var finaltotalpayment=(totalpayment)-(discount);
              var finalpayment=finaltotalpayment.toFixed(2);
               $('#total-payment-to-paid').text(finalpayment);

        }       
        
      });

  $('#payment-input').keypress(function(e) {
        if (e.which == 13) {
                var totalpayment=$('#total-payment-to-paid').text(); 
                var payment=$("#payment-input").val();
                var change= (payment)-(totalpayment);
                var dispalyChange=change.toFixed(2);
                $("#change").text(dispalyChange);
                $("#payment-result").text(payment);

        }       
        
      });

$(document).on('click','#complete-sales',function(e){
var salesNo=$("#salesNoInput").val();
var total_item=$("#total-item-id").text();
var tax_added=$("#tax-added").text();
var discount_added=$("#discount-added").text();
var total=$("#total-payment-to-paid").text();
var paymentType = $("input[name='typePay']:checked").val();
var payment=$("#payment-input").val();
var change=$("#change").text();
var account_no=$("#account_no_input").val();
var idss=$("#salesNoInput").val();
var sub=$("#sub-total-id").text();

$("#order-no").text(idss);
 $.ajax({
  url: "codes/functions/getdataPOS_function.php",
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
        "idss":idss,
        "sub":sub,
  
      
},
success: function(data){    
         $("#DivIdToPrint").append(data); 
            printDiv();    
            location.reload();
        }
    });

});
$(document).on('click','#delete-item',function(e){
var barcodeForDel= $("#barcode-for-del").val();
var salesNoForDel=$("#salesNoInput").val();

var total=0;
                $("#table-order tr").each(function() {
                    var value = $('td', this).eq(4).text();
                    if (!isNaN(value)) {
                        total=(+total)+(+value);
                    }
                });
               
                $('#sub-total-id').text(total.toFixed(2));

                var dsicount_added=$("#discount-added").text();
                var final_discount=(parseFloat(dsicount_added)).toFixed(2);
                var final_total=total-final_discount;
                $('#total-payment-to-paid').text(final_total.toFixed(2));

                var tax_added=$("#tax-added").text();
                var final_tax=(parseFloat(tax_added)).toFixed(2);
                var final_total_tax=(+total)+(+final_tax);
                $('#total-payment-to-paid').text(final_total_tax.toFixed(2));


                var total_item = 0;
                $("#table-order tr").each(function() {
                    var total_item_value = parseInt($('td', this).eq(2).text());
                    if (!isNaN(total_item_value)) {
                       total_item += total_item_value;
                    }
                });

                $('#total-item-id').text(total_item);

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
 function login(){
    window.location.replace("index1.php");
 }