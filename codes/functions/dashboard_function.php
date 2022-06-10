<?php  

function selectValuesfromCapacityProperties(){
	include 'connection.php';

global $totalArea_percentage, $totalNonStorage_percentage,  $totalStorage_percentage;

	$sql=mysqli_query($link, "SELECT * FROM capacity");
	$row=mysqli_fetch_assoc($sql);
        $stL= $row['StoreLenght'];
        $stW=$row['StoreWidth'];
        $stH=$row['StoreHeight'];
        $usL=$row['unStorageLenght'];
        $usW=$row['unStorageWidth'];
        $usH=$row['unStorageHeight'];

        $area_store= $stL*$stW;
        $unarea_store=$usL*$usW;
       
        $sizeOfStore=round($stL*$stW,2);
        $total_area1=$area_store-$unarea_store;
        $total_area2=$total_area1*$stH;
      
        $nonStorageArea=round($usL*$usW,2);
        $final_area=round($sizeOfStore-$nonStorageArea, 2);


   
$sql = "SELECT  SUM(length) as length, SUM(width) as width from storage";
$result = $link->query($sql);
$row=mysqli_fetch_assoc($result);

$totalLength=$row['length'];
$totalWidth=$row['width'];

$Slength= round($totalLength*0.0328084,2);
$SWidth= round($totalWidth*0.0328084,2);
$area_in_storage=round($Slength*$SWidth,2);
    
   
$total=$final_area+$nonStorageArea+$area_in_storage;
$totalArea_percentage=round($final_area/$total*100,2);
$totalNonStorage_percentage=round($nonStorageArea/$total*100,2);
$totalStorage_percentage=round($area_in_storage/$total*100,2);


}
function all(){
	global $no_of_sales,$total_sales, $profit,$total_qty_in_hand, $total_inventory_value, $total_batch, $total_to_be_received_qty ;
	global $total_items, $total_category,$total_low_stock_item, $total_item_to_be_expiered, $total_out_of_stock,$total_active_item;
	global $active, $notactive, $total_qty_ordered, $total_no_of_orders, $total_cost, $total_expenses, $return_total, $return_refund_total;

	include 'connection.php';

	$sql=mysqli_query($link, "SELECT count(*) as salesNo, sum(total) as total_sale from sales");
	$row=mysqli_fetch_assoc($sql);

	$no_of_sales=$row['salesNo'];
	$to=$row['total_sale'];
	$total_sales=number_format($row['total_sale'],2);

	$sql=mysqli_query($link, "SELECT sum(amount) as total_expense from expenses");
	$row=mysqli_fetch_assoc($sql);
	$total_expenses=$row['total_expense'];

	$profit=$to-$total_expenses;

	$sql=mysqli_query($link, "SELECT sum(total_supply) as total_qty_in_hand, sum(inventory_value) as total_inventory_value, sum(batch_count) as total_batch from inventory");
	$row=mysqli_fetch_assoc($sql);
	$total_qty_in_hand=$row['total_qty_in_hand'];
	$total_inventory_value=number_format($row['total_inventory_value'],2);
	$total_batch=$row['total_batch'];

	$sql=mysqli_query($link, "SELECT sum(qty) as total_to_be_received_qty from purchaseorder where status='Accepted'");
	$row=mysqli_fetch_assoc($sql);
	$total_to_be_received_qty=$row['total_to_be_received_qty'];
	if (empty($total_to_be_received_qty)){
		$total_to_be_received_qty=0;
	}

	$sql=mysqli_query($link, "SELECT count(*) as total_items from items");
	$row=mysqli_fetch_assoc($sql);
	$total_items=$row['total_items'];

	$sql=mysqli_query($link, "SELECT count(*) as total_category from maincategory");
	$row=mysqli_fetch_assoc($sql);
	$total_category=$row['total_category'];

	$sql=mysqli_query($link, "SELECT count(*) as total_low_stock_item from inventory where total_supply<(reorder_level-10)");
	$row=mysqli_fetch_assoc($sql);
	$total_low_stock_item=$row['total_low_stock_item'];	

	$sql=mysqli_query($link, "SELECT count(*) as total_item_to_be_expiered from batch where expiration between curdate() AND curdate() + 2");
	$row=mysqli_fetch_assoc($sql);
	$total_item_to_be_expiered=$row['total_item_to_be_expiered'];	

	$sql=mysqli_query($link, "SELECT count(*) as total_out_of_stock from inventory where total_supply=0");
	$row=mysqli_fetch_assoc($sql);
	$total_out_of_stock=$row['total_out_of_stock'];	

	$sql=mysqli_query($link, "SELECT distinct item_name, count(*) as total_active_item from transaction");
	$row=mysqli_fetch_assoc($sql);
	$total_active_item=$row['total_active_item'];

	$active=$total_active_item/$total_items*100;	
	$not=$total_items-$total_active_item;
	$notactive=$not/$total_items*100;

	$sql=mysqli_query($link, "SELECT sum(qty) as total_qty_ordered, count(*) as total_no_of_orders, sum(total_amount) as total_cost from purchaseorder");
	$row=mysqli_fetch_assoc($sql);
	$total_qty_ordered=$row['total_qty_ordered']; 
	$total_no_of_orders=$row['total_no_of_orders'];
	$total_cost=number_format($row['total_cost'],2);

	if (empty($total_qty_ordered)){
		$total_qty_ordered=0;
	}

	$sql=mysqli_query($link, "SELECT sum(return_total_amount) as return_total from sales_return");
	$row=mysqli_fetch_assoc($sql);
	$return_total=number_format($row['return_total'],2);

	$sql=mysqli_query($link, "SELECT sum(total_amount) as return_refund_total from return_orders");
	$row=mysqli_fetch_assoc($sql);
	$return_refund_total=number_format($row['return_refund_total'],2);

}
function day(){
	global $no_of_sales,$total_sales, $profit,$total_qty_in_hand, $total_inventory_value, $total_batch, $total_to_be_received_qty ;
	global $total_items, $total_category,$total_low_stock_item, $total_item_to_be_expiered, $total_out_of_stock,$total_active_item;
	global $active, $notactive, $total_qty_ordered, $total_no_of_orders, $total_cost, $total_expenses, $return_total, $return_refund_total;

	include 'connection.php';

	$sql=mysqli_query($link, "SELECT count(*) as salesNo, sum(total) as total_sale from sales where DATE(payment_date)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);

	$no_of_sales=$row['salesNo'];
	$total_sales=number_format($row['total_sale'],2);

	$sql=mysqli_query($link, "SELECT sum(amount) as total_expense from expenses where DATE(date_created)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_expenses=$row['total_expense'];

	$profit=number_format($total_sales-$total_expenses,2);

	$sql=mysqli_query($link, "SELECT sum(total_supply) as total_qty_in_hand, sum(inventory_value) as total_inventory_value, sum(batch_count) as total_batch from inventory where DATE(last_date_adjustment)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_qty_in_hand=$row['total_qty_in_hand'];
	$total_inventory_value=number_format($row['total_inventory_value'],2);
	$total_batch=$row['total_batch'];

	if (empty($total_qty_in_hand)){
		$total_qty_in_hand=0;
	}
	if (empty($total_batch)){
		$total_batch=0;
	}

	$sql=mysqli_query($link, "SELECT sum(qty) as total_to_be_received_qty from purchaseorder where status='Accepted' and DATE(dateCreated)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_to_be_received_qty=$row['total_to_be_received_qty'];
	if (empty($total_to_be_received_qty)){
		$total_to_be_received_qty=0;
	}

	$sql=mysqli_query($link, "SELECT count(*) as total_items from items ");
	$row=mysqli_fetch_assoc($sql);
	$total_items=$row['total_items'];

	$sql=mysqli_query($link, "SELECT count(*) as total_category from maincategory");
	$row=mysqli_fetch_assoc($sql);
	$total_category=$row['total_category'];

	$sql=mysqli_query($link, "SELECT count(*) as total_low_stock_item from inventory where total_supply<(reorder_level-10) and DATE(last_date_adjustment)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_low_stock_item=$row['total_low_stock_item'];	

	$sql=mysqli_query($link, "SELECT count(*) as total_item_to_be_expiered from batch where DATE(expiration)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_item_to_be_expiered=$row['total_item_to_be_expiered'];	

	$sql=mysqli_query($link, "SELECT count(*) as total_out_of_stock from inventory where total_supply=0 and DATE(last_date_adjustment)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_out_of_stock=$row['total_out_of_stock'];	

	$sql=mysqli_query($link, "SELECT distinct item_name, count(*) as total_active_item from transaction where DATE(payment_date)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_active_item=$row['total_active_item'];

	$active=$total_active_item/$total_items*100;	
	$not=$total_items-$total_active_item;
	$notactive=$not/$total_items*100;

	$sql=mysqli_query($link, "SELECT sum(qty) as total_qty_ordered, count(*) as total_no_of_orders, sum(total_amount) as total_cost from purchaseorder where DATE(dateCreated)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_qty_ordered=$row['total_qty_ordered']; 
	$total_no_of_orders=$row['total_no_of_orders'];
	$total_cost=number_format($row['total_cost'],2);

	if (empty($total_qty_ordered)){
		$total_qty_ordered=0;
	}

	$sql=mysqli_query($link, "SELECT sum(return_total_amount) as return_total from sales_return where DATE(date_returned)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$return_total=number_format($row['return_total'],2);

	$sql=mysqli_query($link, "SELECT sum(total_amount) as return_refund_total from return_orders where DATE(date_created)=DATE(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$return_refund_total=number_format($row['return_refund_total'],2);

}

function week(){
	global $no_of_sales,$total_sales, $profit,$total_qty_in_hand, $total_inventory_value, $total_batch, $total_to_be_received_qty ;
	global $total_items, $total_category,$total_low_stock_item, $total_item_to_be_expiered, $total_out_of_stock,$total_active_item;
	global $active, $notactive, $total_qty_ordered, $total_no_of_orders, $total_cost, $total_expenses, $return_total,$return_refund_total;

	include 'connection.php';

	$sql=mysqli_query($link, "SELECT count(*) as salesNo, sum(total) as total_sale from sales where YEARWEEK(payment_date) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);

	$no_of_sales=$row['salesNo'];
	$total=$row['total_sale'];
	$total_sales=number_format($row['total_sale'],2);

	$sql=mysqli_query($link, "SELECT sum(amount) as total_expense from expenses where YEARWEEK(date_created) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_expenses=$row['total_expense'];

	$profit=number_format($total-$total_expenses,2);

	$sql=mysqli_query($link, "SELECT sum(total_supply) as total_qty_in_hand, sum(inventory_value) as total_inventory_value, sum(batch_count) as total_batch from inventory where YEARWEEK(last_date_adjustment) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_qty_in_hand=$row['total_qty_in_hand'];
	$total_inventory_value=number_format($row['total_inventory_value'],2);
	$total_batch=$row['total_batch'];

	if (empty($total_qty_in_hand)){
		$total_qty_in_hand=0;
	}
	if (empty($total_batch)){
		$total_batch=0;
	}

	$sql=mysqli_query($link, "SELECT sum(qty) as total_to_be_received_qty from purchaseorder where status='Accepted' and YEARWEEK(dateCreated) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_to_be_received_qty=$row['total_to_be_received_qty'];
	if (empty($total_to_be_received_qty)){
		$total_to_be_received_qty=0;
	}

	$sql=mysqli_query($link, "SELECT count(*) as total_items from items ");
	$row=mysqli_fetch_assoc($sql);
	$total_items=$row['total_items'];

	$sql=mysqli_query($link, "SELECT count(*) as total_category from maincategory");
	$row=mysqli_fetch_assoc($sql);
	$total_category=$row['total_category'];

	$sql=mysqli_query($link, "SELECT count(*) as total_low_stock_item from inventory where total_supply<(reorder_level-10) and YEARWEEK(last_date_adjustment) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_low_stock_item=$row['total_low_stock_item'];	

	$sql=mysqli_query($link, "SELECT count(*) as total_item_to_be_expiered from batch where YEARWEEK(expiration) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_item_to_be_expiered=$row['total_item_to_be_expiered'];	

	$sql=mysqli_query($link, "SELECT count(*) as total_out_of_stock from inventory where total_supply=0 and YEARWEEK(last_date_adjustment) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_out_of_stock=$row['total_out_of_stock'];	

	$sql=mysqli_query($link, "SELECT distinct item_name, count(*) as total_active_item from transaction where YEARWEEK(payment_date) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_active_item=$row['total_active_item'];

	$active=$total_active_item/$total_items*100;	
	$not=$total_items-$total_active_item;
	$notactive=$not/$total_items*100;

	$sql=mysqli_query($link, "SELECT sum(qty) as total_qty_ordered, count(*) as total_no_of_orders, sum(total_amount) as total_cost from purchaseorder where YEARWEEK(dateCreated) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$total_qty_ordered=$row['total_qty_ordered']; 
	$total_no_of_orders=$row['total_no_of_orders'];
	$total_cost=number_format($row['total_cost'],2);

	if (empty($total_qty_ordered)){
		$total_qty_ordered=0;
	}

$sql=mysqli_query($link, "SELECT sum(return_total_amount) as return_total from sales_return where YEARWEEK(date_returned) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$return_total=number_format($row['return_total'],2);


	$sql=mysqli_query($link, "SELECT sum(total_amount) as return_refund_total from return_orders where YEARWEEK(date_created) = YEARWEEK(NOW())");
	$row=mysqli_fetch_assoc($sql);
	$return_refund_total=number_format($row['return_refund_total'],2);


}
function month(){
	global $no_of_sales,$total_sales, $profit,$total_qty_in_hand, $total_inventory_value, $total_batch, $total_to_be_received_qty ;
	global $total_items, $total_category,$total_low_stock_item, $total_item_to_be_expiered, $total_out_of_stock,$total_active_item;
	global $active, $notactive, $total_qty_ordered, $total_no_of_orders, $total_cost, $total_expenses, $return_total, $return_refund_total;

	include 'connection.php';

	$sql=mysqli_query($link, "SELECT count(*) as salesNo, sum(total) as total_sale from sales where MONTH(payment_date)=MONTH(now())
       and YEAR(payment_date)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);

	$no_of_sales=$row['salesNo'];
	$total=$row['total_sale'];
	$total_sales=number_format($row['total_sale'],2);

	$sql=mysqli_query($link, "SELECT sum(amount) as total_expense from expenses where MONTH(date_created)=MONTH(now())
       and YEAR(date_created)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);
	$total_expenses=$row['total_expense'];

	$profit=number_format($total-$total_expenses,2);

	$sql=mysqli_query($link, "SELECT sum(total_supply) as total_qty_in_hand, sum(inventory_value) as total_inventory_value, sum(batch_count) as total_batch from inventory where MONTH(last_date_adjustment)=MONTH(now())
       and YEAR(last_date_adjustment)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);
	$total_qty_in_hand=$row['total_qty_in_hand'];
	$total_inventory_value=number_format($row['total_inventory_value'],2);
	$total_batch=$row['total_batch'];

	if (empty($total_qty_in_hand)){
		$total_qty_in_hand=0;
	}
	if (empty($total_batch)){
		$total_batch=0;
	}

	$sql=mysqli_query($link, "SELECT sum(qty) as total_to_be_received_qty from purchaseorder where status='Accepted' and MONTH(dateCreated)=MONTH(now())
       and YEAR(dateCreated)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);
	$total_to_be_received_qty=$row['total_to_be_received_qty'];
	if (empty($total_to_be_received_qty)){
		$total_to_be_received_qty=0;
	}

	$sql=mysqli_query($link, "SELECT count(*) as total_items from items ");
	$row=mysqli_fetch_assoc($sql);
	$total_items=$row['total_items'];

	$sql=mysqli_query($link, "SELECT count(*) as total_category from maincategory");
	$row=mysqli_fetch_assoc($sql);
	$total_category=$row['total_category'];

	$sql=mysqli_query($link, "SELECT count(*) as total_low_stock_item from inventory where total_supply<(reorder_level-10) and MONTH(last_date_adjustment)=MONTH(now())
       and YEAR(last_date_adjustment)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);
	$total_low_stock_item=$row['total_low_stock_item'];	

	$sql=mysqli_query($link, "SELECT count(*) as total_item_to_be_expiered from batch where MONTH(expiration)=MONTH(now())
       and YEAR(expiration)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);
	$total_item_to_be_expiered=$row['total_item_to_be_expiered'];	

	$sql=mysqli_query($link, "SELECT count(*) as total_out_of_stock from inventory where total_supply=0 and MONTH(last_date_adjustment)=MONTH(now())
       and YEAR(last_date_adjustment)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);
	$total_out_of_stock=$row['total_out_of_stock'];	

	$sql=mysqli_query($link, "SELECT distinct item_name, count(*) as total_active_item from transaction where MONTH(payment_date)=MONTH(now())
       and YEAR(payment_date)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);
	$total_active_item=$row['total_active_item'];

	$active=$total_active_item/$total_items*100;	
	$not=$total_items-$total_active_item;
	$notactive=$not/$total_items*100;

	$sql=mysqli_query($link, "SELECT sum(qty) as total_qty_ordered, count(*) as total_no_of_orders, sum(total_amount) as total_cost from purchaseorder where MONTH(dateCreated)=MONTH(now())
       and YEAR(dateCreated)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);
	$total_qty_ordered=$row['total_qty_ordered']; 
	$total_no_of_orders=$row['total_no_of_orders'];
	$total_cost=number_format($row['total_cost'],2);

	if (empty($total_qty_ordered)){
		$total_qty_ordered=0;
	}

	$sql=mysqli_query($link, "SELECT sum(return_total_amount) as return_total from sales_return where MONTH(date_returned)=MONTH(now())
       and YEAR(date_returned)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);
	$return_total=number_format($row['return_total'],2);


		$sql=mysqli_query($link, "SELECT sum(total_amount) as return_refund_total from return_orders where MONTH(date_created)=MONTH(now())
       and YEAR(date_created)=YEAR(now())");
	$row=mysqli_fetch_assoc($sql);
	$return_refund_total=number_format($row['return_refund_total'],2);

}
function year(){
	global $no_of_sales,$total_sales, $profit,$total_qty_in_hand, $total_inventory_value, $total_batch, $total_to_be_received_qty ;
	global $total_items, $total_category,$total_low_stock_item, $total_item_to_be_expiered, $total_out_of_stock,$total_active_item;
	global $active, $notactive, $total_qty_ordered, $total_no_of_orders, $total_cost, $total_expenses, $return_total, $return_refund_total;

	include 'connection.php';

	$sql=mysqli_query($link, "SELECT count(*) as salesNo, sum(total) as total_sale from sales where YEAR(payment_date) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);

	$no_of_sales=$row['salesNo'];
	$total_sales=number_format($row['total_sale'],2);
	$total=$row['total_sale'];

	$sql=mysqli_query($link, "SELECT sum(amount) as total_expense from expenses where YEAR(date_created) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);

	$total_expenses=$row['total_expense'];

	$profit=number_format($total-$total_expenses,2);

	$sql=mysqli_query($link, "SELECT sum(total_supply) as total_qty_in_hand, sum(inventory_value) as total_inventory_value, sum(batch_count) as total_batch from inventory where YEAR(last_date_adjustment) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);
	$total_qty_in_hand=$row['total_qty_in_hand'];
	$total_inventory_value=number_format($row['total_inventory_value'],2);
	$total_batch=$row['total_batch'];

	if (empty($total_qty_in_hand)){
		$total_qty_in_hand=0;
	}
	if (empty($total_batch)){
		$total_batch=0;
	}

	$sql=mysqli_query($link, "SELECT sum(qty) as total_to_be_received_qty from purchaseorder where status='Accepted' and YEAR(dateCreated) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);
	$total_to_be_received_qty=$row['total_to_be_received_qty'];
	if (empty($total_to_be_received_qty)){
		$total_to_be_received_qty=0;
	}

	$sql=mysqli_query($link, "SELECT count(*) as total_items from items ");
	$row=mysqli_fetch_assoc($sql);
	$total_items=$row['total_items'];

	$sql=mysqli_query($link, "SELECT count(*) as total_category from maincategory");
	$row=mysqli_fetch_assoc($sql);
	$total_category=$row['total_category'];

	$sql=mysqli_query($link, "SELECT count(*) as total_low_stock_item from inventory where total_supply<(reorder_level-10) and YEAR(last_date_adjustment) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);
	$total_low_stock_item=$row['total_low_stock_item'];	

	$sql=mysqli_query($link, "SELECT count(*) as total_item_to_be_expiered from batch where YEAR(expiration) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);
	$total_item_to_be_expiered=$row['total_item_to_be_expiered'];	

	$sql=mysqli_query($link, "SELECT count(*) as total_out_of_stock from inventory where total_supply=0 and YEAR(last_date_adjustment) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);
	$total_out_of_stock=$row['total_out_of_stock'];	

	$sql=mysqli_query($link, "SELECT distinct item_name, count(*) as total_active_item from transaction where YEAR(payment_date) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);
	$total_active_item=$row['total_active_item'];

	$active=$total_active_item/$total_items*100;	
	$not=$total_items-$total_active_item;
	$notactive=$not/$total_items*100;

	$sql=mysqli_query($link, "SELECT sum(qty) as total_qty_ordered, count(*) as total_no_of_orders, sum(total_amount) as total_cost from purchaseorder where YEAR(dateCreated) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);
	$total_qty_ordered=$row['total_qty_ordered']; 
	$total_no_of_orders=$row['total_no_of_orders'];
	$total_cost=number_format($row['total_cost'],2);

	if (empty($total_qty_ordered)){
		$total_qty_ordered=0;
	}
	$sql=mysqli_query($link, "SELECT sum(return_total_amount) as return_total from sales_return where YEAR(date_returned) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);
	$return_total=number_format($row['return_total'],2);

	$sql=mysqli_query($link, "SELECT sum(total_amount) as return_refund_total from return_orders where YEAR(date_created) = YEAR(CURDATE())");
	$row=mysqli_fetch_assoc($sql);
	$return_refund_total=number_format($row['return_refund_total'],2);

}


function AllTopItem(){
	include 'connection.php';
			$sql=mysqli_query($link, "SELECT item_name, sum(qty) as total_qty from transaction GROUP by item_name ORDER By total_qty desc limit 5;");
				 while ($row3=$sql->fetch_assoc()) {
				 		$item_name=$row3['item_name'];
				 		$total_qty=$row3['total_qty'];


				 			$sq2=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
				 			$rowSum=mysqli_fetch_assoc($sq2);
				 			$perishable=$rowSum['perishable'];

				 			if ($perishable=="YES"){
				 			
				 				$total_qty=$total_qty."g";
				 			} 			

   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty.'</td>
			                             
			                        </tr>
                  
   							 	';

   							 
   						}


   			
   			 		
   						
}

function DailyTopItem(){
	include 'connection.php';
						

   						$sql=mysqli_query($link, "SELECT item_name, sum(qty) as total_qty from transaction GROUP by item_name ORDER By total_qty desc limit 5;");
				 		while ($row3=$sql->fetch_assoc()) {
						 		$item_name=$row3['item_name'];
						 		


						 	$sql3=mysqli_query($link, "SELECT sum(qty) as total_qty1, sum(total_amount) as total_sale from transaction where item_name='$item_name' and DATE(payment_date)=DATE(NOW())");
				 			$rowSum3=mysqli_fetch_assoc($sql3);
				 			$total_qty1=$rowSum3['total_qty1'];
				 			$total_sale=$rowSum3['total_sale'];



				 			$sq2=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
				 			$rowSum=mysqli_fetch_assoc($sq2);
				 			$perishable=$rowSum['perishable'];

				 					
				 			if ($perishable=="YES"){
				 				
				 				$total_qty1=$total_qty1."g";
				 			} 	

				 			if (empty($perishable) && $total_qty1>10){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                           

			                             
			                        </tr>
                  
   							 	';
   							 }

   							 if (!empty($perishable) && $total_qty1>5){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                           

			                             
			                        </tr>
                  
   							 	';
   							 }
   							 
   						}
	
   					

   						
}


function WeeklyTopItem(){
	include 'connection.php';
		
				 		
   						$sql=mysqli_query($link, "SELECT item_name, sum(qty) as total_qty from transaction GROUP by item_name ORDER By total_qty desc limit 5;");
				 		while ($row3=$sql->fetch_assoc()) {
						 		$item_name=$row3['item_name'];
						 		


						 	$sql3=mysqli_query($link, "SELECT sum(qty) as total_qty1, sum(total_amount) as total_sale from transaction where item_name='$item_name' and YEARWEEK(payment_date) = YEARWEEK(NOW())");
				 			$rowSum3=mysqli_fetch_assoc($sql3);
				 			$total_qty1=$rowSum3['total_qty1'];
				 			$total_sale=$rowSum3['total_sale'];



				 			$sq2=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
				 			$rowSum=mysqli_fetch_assoc($sq2);
				 			$perishable=$rowSum['perishable'];

				 					
				 			if ($perishable=="YES"){
				 		
				 				$total_qty1=$total_qty1."g";
				 			} 	

				 			if (empty($perishable) && $total_qty1>10){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                           

			                             
			                        </tr>
                  
   							 	';
   							 }

   							 if (!empty($perishable) && $total_qty1>5){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                           

			                             
			                        </tr>
                  
   							 	';
   							 }
   							 
   						}

   						
}

function MonthlyTopItem(){
	include 'connection.php';
	
				 				
   						$sql=mysqli_query($link, "SELECT item_name, sum(qty) as total_qty from transaction GROUP by item_name ORDER By total_qty desc limit 5;");
				 		while ($row3=$sql->fetch_assoc()) {
						 		$item_name=$row3['item_name'];
						 		


						 	$sql3=mysqli_query($link, "SELECT sum(qty) as total_qty1, sum(total_amount) as total_sale from transaction where item_name='$item_name' and MONTH(payment_date)=MONTH(now())
       							and YEAR(payment_date)=YEAR(now())");
				 			$rowSum3=mysqli_fetch_assoc($sql3);
				 			$total_qty1=$rowSum3['total_qty1'];
				 			$total_sale=$rowSum3['total_sale'];



				 			$sq2=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
				 			$rowSum=mysqli_fetch_assoc($sq2);
				 			$perishable=$rowSum['perishable'];

				 					
				 			if ($perishable=="YES"){
				 		
				 				$total_qty1=$total_qty1."g";
				 			} 	

				 			if (empty($perishable) && $total_qty1>10){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                           

			                             
			                        </tr>
                  
   							 	';
   							 }

   							 if (!empty($perishable) && $total_qty1>5){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                           

			                             
			                        </tr>
                  
   							 	';
   							 }
   							 
   						}

}

function YearlyTopItem(){
	include 'connection.php';
					
   						$sql=mysqli_query($link, "SELECT item_name, sum(qty) as total_qty from transaction GROUP by item_name ORDER By total_qty desc limit 5;");
				 		while ($row3=$sql->fetch_assoc()) {
						 		$item_name=$row3['item_name'];
						 		


						 	$sql3=mysqli_query($link, "SELECT sum(qty) as total_qty1, sum(total_amount) as total_sale from transaction where item_name='$item_name' and  YEAR(payment_date) = YEAR(CURDATE())");
				 			$rowSum3=mysqli_fetch_assoc($sql3);
				 			$total_qty1=$rowSum3['total_qty1'];
				 			$total_sale=$rowSum3['total_sale'];



				 			$sq2=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
				 			$rowSum=mysqli_fetch_assoc($sq2);
				 			$perishable=$rowSum['perishable'];

				 					
				 			if ($perishable=="YES"){
				 			
				 				$total_qty1=$total_qty1."g";
				 			} 	

				 			if (empty($perishable) && $total_qty1>10){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                           

			                             
			                        </tr>
                  
   							 	';
   							 }

   							 if (!empty($perishable) && $total_qty1>5){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                           

			                             
			                        </tr>
                  
   							 	';
   							 }
   							 
   						}
   						
}


?>