<?php  

function headerItem(){
	
	echo '
		 <th class="table-header" style="width:200px">Barcode</th>
         <th class="table-header" style="width:400px">Item Name</th>
         
          <th class="table-header" style="width:130px">Qty on Shelf</th> 
          <th class="table-header" style="width:130px">Qty Sold</th> 
          <th class="table-header" style="width:130px">Total Sales</th> 
         

	';
}

function itemcontent(){
	include 'connection.php';
	$sql=mysqli_query($link, "SELECT * from inventory");


       if ($sql->num_rows >0){
    
       	    while ($row= $sql->fetch_assoc()) {
       	    		$item_name=$row['item_name'];
       	    	echo '<tr>
       	    		<td>'.$row['barcode'].'</td>
       	    		<td>'.$row['item_name'].'</td>
       	    				
       	    	';

       	    	$sql2=mysqli_query($link, "SELECT sum(qty) as qty, sum(total_amount) as amount from transaction where item_name='$item_name ' and DATE(payment_date) = DATE(NOW())");
       	    	$rowSum=mysqli_fetch_assoc($sql2);

       	    	$qty=$rowSum['qty'];
       	    	$total=$rowSum['amount'];

       	    	$sql3=mysqli_query($link, "SELECT * from items where item_name='$item_name'");
       	    	$rowItem=mysqli_fetch_assoc($sql3);
       	    	$perisable=$rowItem['perisable'];

       	    	if (empty($qty)){
       	    		$qty=0;
       	    	}
       	    	if ($perisable=="YES"){
       	    		$qty=$qty."g";
       	    		$shelf=$row['qty_on_shelf']."g";
       	    	}else{
       	    		$qty=$rowSum['qty'];
       	    		$shelf=$row['qty_on_shelf'];;
       	    	}

       	    		if (empty($qty)){     	
       	    			if ($perisable=="YES"){
       	    				$qty="0g";
       	    			}else{
       	    				$qty=0;
       	    			}
       	    		}
       	    	echo '
       	    		<td>'.$shelf.'</td>
       	    		<td>'.$qty.'</td>
       	    		<td>'.number_format($total,2).'</td>
       	    	';





}
}
}

function headerSales(){
	
	echo '
	 <th style="width:130px;">Customer No</th>
		  <th style="width:160px;">Invoice No</th>
                            <th style="width:160px;">Total Items</th>
                          
                            <th style="width:160px;">Discount Added</th>
                            <th style="width:150px;">Total Amount</th>
                            <th style="width:160px;">Payment Type</th>
                            <th style="width:160px;">Payment Amount</th>
                            <th style="width:160px;">Change</th>
         

	';
}

function customer(){
	include 'connection.php';
	 $result=mysqli_query($link, "SELECT * from sales WHERE DATE(payment_date) = DATE(NOW()) order by custNo");
       if ($result->num_rows >0){

           
            while ($row= $result->fetch_assoc()) {
                    echo '
                        <tr>
                        	<td>'.$row['custNo'].'</td>
                            <td>'.$row['sales_no'].'</td>
                            <td>'.$row['total_items'].'</td>
                        
                            <td>'.number_format($row['discount_added'],2).'</td>
                            <td>'.number_format($row['total'],2).'</td>
                            <td>'.$row['payment_type'].'</td>
                            <td>'.number_format($row['payment_amount'],2).'</td>
                            <td>'.number_format($row['payment_change'],2).'</td>
                        </tr>
                    ';
                   
                }

                }
}
function transactionheader(){
	 echo '  				 <th style="width:100px">Invoice No</th>
	  						<th style="width:100px">Cust No</th>
                            <th style="width:200px">Barcode</th>
                            <th style="width:150px">Stock No</th>
                            <th style="width:400px">Item Name</th>
                            <th style="width:100px">Qty</th>
                            <th style="width:150px">Price</th>
                            <th style="width:150px">Total</th>

                    ';
}
function transaction(){
	include 'connection.php';
	 $result=mysqli_query($link, "SELECT * from transaction WHERE DATE(payment_date) = DATE(NOW())");
       if ($result->num_rows >0){

            
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
                	$s=$row['sales_order'];
                $sql3=mysqli_query($link, "SELECT * from sales where sales_no='$s' ");
                $rows3=mysqli_fetch_assoc($sql3);

             
                    echo '
                        <tr>
                        	 <td>'.$row['sales_order'].'</td>
                        	  <td>'.$rows3['custNo'].'</td>
                            <td>'.$row['barcode'].'</td>
                            <td>'.$row['batch_no'].'</td>
                            <td>'.$row['item_name'].'</td>
                            <td>'.$qty.'</td>
                            <td>'.number_format($row['price'],2).'</td>
                            <td>'.number_format($row['total_amount'],2).'</td>
                        </tr>
                    ';
                
                }

                }
}

?>