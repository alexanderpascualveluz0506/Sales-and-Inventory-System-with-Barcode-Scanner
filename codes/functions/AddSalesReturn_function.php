<?php  

include 'connection.php';

$receipt_no = isset($_REQUEST['receipt_no'])?$_REQUEST['receipt_no']:"";
$receipt_date = isset($_REQUEST['receipt_date'])?$_REQUEST['receipt_date']:"";

if (!empty($receipt_no)){
$sql=mysqli_query($link, "SELECT distinct item_name from transaction where sales_order='$receipt_no' Limit 1");
       if ($sql->num_rows >0){
    			 while ($row= $sql->fetch_assoc()) {
       				echo "<option value='".$row['item_name']."'>".$row['item_name']."</option>";
                    	}

                    }

                }



$itemselect = isset($_REQUEST['itemselect'])?$_REQUEST['itemselect']:"";
$receipt_no1= isset($_REQUEST['receipt_no1'])?$_REQUEST['receipt_no1']:"";
if (!empty($itemselect)){
	$sql=mysqli_query($link, "SELECT * from transaction where sales_order='$receipt_no1' and item_name='$itemselect'");
	$row= mysqli_fetch_assoc($sql);
	$batch_no=$row['batch_no'];
    echo "<label id='batch_no'>".$row['batch_no']."</label>";
    echo "<label id='price1'>".number_format($row['price'],2)."</label>";

    $sql1=mysqli_query($link, "SELECT * from batch where batch_no='$batch_no' and item_name='$itemselect'");
	$row1= mysqli_fetch_assoc($sql1);
    echo "<label id='costperUnit'>".number_format($row1['costPerUnit'],2)."</label>";            	


}

$date_returned = isset($_REQUEST['date_returned'])?$_REQUEST['date_returned']:"";
$receipt_date = isset($_REQUEST['receipt_date'])?$_REQUEST['receipt_date']:"";
$receipt_no = isset($_REQUEST['receipt_no'])?$_REQUEST['receipt_no']:"";
$item_returnable= isset($_REQUEST['item_returnable'])?$_REQUEST['item_returnable']:"";
$qty_bought= isset($_REQUEST['qty_bought'])?$_REQUEST['qty_bought']:"";
$input_batch_no= isset($_REQUEST['input_batch_no'])?$_REQUEST['input_batch_no']:"";
$input_cost_per_unit= isset($_REQUEST['input_cost_per_unit'])?$_REQUEST['input_cost_per_unit']:"";
$input_price= isset($_REQUEST['input_price'])?$_REQUEST['input_price']:"";

$return_amount=$input_price*$qty_bought;

if (!empty($qty_bought)){
	$sql=mysqli_query($link, "INSERT INTO `sales_return`( `date_returned`, `date_ordered`, `receipt_no`, `item_name`, `qty_returned`, `batch_no`, `costPerUnit`, `price`, `return_total_amount`, `reason`) VALUES ('$date_returned', '$receipt_date', '$receipt_no', 
		'$item_returnable', '$qty_bought', '$input_batch_no', '$input_cost_per_unit', '$input_price', '$return_amount', '$reason')");



	$sql=mysqli_query($link, "UPDATE inventory set damage_quantity=damage_quantity+'$qty_bought', damaged_cost=damaged_cost+'$return_amount' where item_name='$item_returnable'");

	$sql=mysqli_query($link, "UPDATE batch set damage=damage+'$qty_bought', damage_cost=damage_cost+'$return_amount' where batch_no='$input_batch_no'");
	

}
?>