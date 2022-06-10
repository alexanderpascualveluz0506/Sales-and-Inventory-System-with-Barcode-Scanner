
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title></title>

	<style type="text/css">
	.col-md-4.control-label{
		font-size: 26px;
		font-family: arial;
	}
	#file{
margin-top: 3%;
margin-left: 100px;
	}
	#submit{
margin-top: 2%;

	}
	span{
		font-size: 16px;
		font-family: arial;
	}
</style>
</head>
<body>
 <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row"><br>
                   <center> <label class="col-md-4 control-label">UPLOAD OFFLINE SALE
                        </label></center> 


        <center> <input type="file" name="file" id="file" accept=".csv" ></center>
        <center> <button type="submit" id="submit" name="import" class="btn btn-primary" >Import File</button></center>
                    <br />

                </div>

<?php 

$link=mysqli_connect("localhost", "root", "", "store");

$items = array();
if (isset($_POST["import"])) {
 date_default_timezone_set('Asia/Manila');   
    $fileName = $_FILES["file"]["tmp_name"];
    
   
        $file = fopen($fileName, "r");
        fgets($file);
        while (($line = fgetcsv($file, 10000, ",")) !== FALSE) {
            
           		 	
				 	$barcode=$line[1];

				 	 $sql = "SELECT * FROM sales";
				            if ($result=mysqli_query($link,$sql)) {
				             $rowcount=mysqli_num_rows($result);
				             $timestamp = date('Y-m-d');
				             $total=$line[2]; 
				             $display="OFF-".$timestamp."-".$total;
							 $result = str_replace('-', '', $display);
				     		}

				 	$sql=mysqli_query($link, "SELECT * from batch where barcode='$barcode' and qty_on_shelf>$line[2]");
				 	$row=mysqli_fetch_assoc($sql);

				 	$total=$line[2]*$row["price"];

				 	 $items[] = $result;
				 	 $customer=$line[0];
				 	

				$qty=$line[2];

				$item_name=$row['item_name'];
				$batch_no=$row["batch_no"];
				$discount=$line[3];
				$price=$row["price"];
				$total=$line[2]*$row["price"];
				
				$date=date("Y-m-d");
				$category=$row["category"];
				$account_no=1;
				$storage=$row["location"];
				$shelves=$row["shelves_name"];

				

				$sqlTransaction= "INSERT INTO transaction (`sales_order`, `barcode`, `item_name`,`qty`,`price`, `total_amount`, `payment_date`, `batch_no`,`category` ,`account_no`,`discount`) VALUES ('$result','$barcode', '$item_name', 
					'$qty', '$price', '$total','$date', '$batch_no', '$category', '$account_no', '$discount')";
				 $sql1= $link->query($sqlTransaction);



        }
    

$result1 = array_unique($items);
date_default_timezone_set('Asia/Manila');
$cust=1;
$time=date('H:i:s');
$date=date('Y-m-d');

if (!empty($result1)){
	
		
		foreach($result1 as $value){
		  	$count=mysqli_query($link, "SELECT sum(qty) as sum_qty, sum(total_amount) as sum_total, sum(discount) as sum_discount from transaction where sales_order='$value'");
		  		  $rowSum=mysqli_fetch_assoc($count);
		  		  $total_items=$rowSum['sum_qty'];
		  		  $total_amount=$rowSum['sum_total'];
		  		  $total_discount=$rowSum['sum_discount'];


                  $sql=mysqli_query($link, "INSERT into sales ( `sales_no`, `total_items`, `sub_total`, `total`, `payment_type`,`time`, `payment_date`, `account_no`, `discount_added`, `payment_amount`) values ('$value', '$total_items', '$total_amount','$total_amount', 'Cash','$time', '$date', '2', '$total_discount', '$total_amount')");


                   $sqlUpdateInv="UPDATE inventory SET total_supply=total_supply-'$qty',remaining=remaining-'$qty', 
					qty_sold=qty_sold+'$qty', qty_on_shelf=qty_on_shelf-'$qty' where item_name='$item_name'";
					mysqli_query($link,$sqlUpdateInv);  

					$sqlUpdateBatch="UPDATE batch SET qty_sold=qty_sold+'$qty', qty_on_shelf=qty_on_shelf-'$qty',
					remaining=remaining-'$qty', remaining_cost=remaining_cost-('$qty'*costPerUnit), qty=qty-'$qty' 
					where batch_no='$batch_no'";
					mysqli_query($link,$sqlUpdateBatch);


					if (!empty($shelves)){  
					    $sql=mysqli_query($link,"UPDATE shelves set total_items=total_items-'$qty' where storage_no='$storage' and shelves_name='$shelves'");
					    mysqli_query($link,"UPDATE storage set total_items=total_items-'$qty' where storage_no='$storage'"); 
					}
					if (empty($shelves)){     
					    mysqli_query($link,"UPDATE storage set total_items=total_items-'$qty' where storage_no='$storage'"); 
					}
		}

		  	
		
		echo "<center><button type='submit' name='confirm' class='btn btn-success' id='last-btn' style='width:140px'>Show Result</button></center>";



}
}

if (isset($_POST['confirm'])){
	date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
	  echo '

	  	<center>
	  		<label style="font-size:17px;font-size:16px;font-family:arial">SALES RECORD OF ITEM SOLD <span style="color:red">(OFFLINE SALES)</span></label>
	  	</center>
              <center><div class="bootstrap-data-table-panel" style="width:60%;margin-top:20px">
                    <div class="table-responsive">
                    <table id="purchase-order-table" class="table table-striped table-bordered">
                        <thead > 
                            <th style="background-color:#343957;color:white">Sales No</th>
                            <th style="background-color:#343957;color:white">Stock In No</th>
                            <th style="background-color:#343957;color:white">Barcode</th>
                            <th style="background-color:#343957;color:white">Item Name</th>
                            <th style="background-color:#343957;color:white">Qty</th>
                            <th style="background-color:#343957;color:white">Price</th>
                            <th style="background-color:#343957;color:white">Total Amount</th>
                        </thead>
                     
                     <tbody id="item-ordered-table" style="background-color:white">
             ';

             
             $sql= mysqli_query($link,"SELECT * FROM transaction WHERE sales_order LIKE '%OFF%' and payment_date='$date' ");


				if ($sql->num_rows>0){
				    while ($row= $sql->fetch_assoc()) {
				    	$item_name=$row['item_name'];
				    	$sqlSelectItem=mysqli_query($link, "SELECT * from items where item_name='$item_name'");
				    	$sqlRow=mysqli_fetch_assoc($sqlSelectItem);
				    	$perisable=$sqlRow['perisable'];

				    	if ($perisable=="YES"){
				    		$qty=$row['qty']."g";
				    	}else{
				    		$qty=$row['qty'];
				    	}
				    	echo '
				    		<tr style="background-color:white">
				    			<td style="background-color:white">'.$row['sales_order'].'</td>
				    			<td style="background-color:white">'.$row['batch_no'].'</td>
				    			<td style="background-color:white">'.$row['barcode'].'</td>
				    			<td style="background-color:white">'.$row['item_name'].'</td>
				    			<td style="background-color:white">'.$qty.'</td>
				    			<td style="background-color:white">'.number_format($row['price'],2).'</td>
				    			<td style="background-color:white">'.number_format($row['total_amount'],2).'</td>
				    		</tr>

				    	';
				    }

				}    
          

             echo '

            </tbody>        
            </table>
            </div><!-- /# table-responsive -->     
        </div><!-- /# bootstrap-data-table-panel --></center> ';


        echo '<br><br>';


          echo '

	  	<center>
	  		<label style="font-size:17px;font-size:16px;font-family:arial">SALES SUMMARY <span style="color:red">(OFFLINE SALES)</span></label>
	  	</center>
              <center><div class="bootstrap-data-table-panel" style="width:60%; margin-top:20px">
                    <div class="table-responsive">
                    <table id="purchase-order-table" class="table table-striped table-bordered" >
                        <thead > 
                            <th style="background-color:#343957;color:white">Sales No</th>
                            <th style="background-color:#343957;color:white">Total Items</th>
                            <th style="background-color:#343957;color:white">Discount Added</th>
                            <th style="background-color:#343957;color:white">Total Amount</th>
                          
                        </thead>
                     
                     <tbody id="item-ordered-table" style="background-color:white">
             ';

             
             $sql= mysqli_query($link,"SELECT * FROM sales WHERE sales_no LIKE '%OFF%' and payment_date='$date' ");


				if ($sql->num_rows>0){
				    while ($row= $sql->fetch_assoc()) {
				    	echo '
				    		<tr style="background-color:white">
				    			<td style="background-color:white">'.$row['sales_no'].'</td>
				    			<td style="background-color:white">'.$row['total_items'].'</td>
				    			<td style="background-color:white">'.$row['discount_added'].'</td>
				    			<td style="background-color:white">'.number_format($row['total'],2).'</td>
				    			
				    		</tr>

				    	';
				    }

				}    
          

             echo '

            </tbody>        
            </table>
            </div><!-- /# table-responsive -->     
        </div><!-- /# bootstrap-data-table-panel --></center> ';



	
}
?>


            </form>
</div>
<!-- Import form (end) -->
</body>
</html>