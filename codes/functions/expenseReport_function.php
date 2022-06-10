<?php   

function tableheader(){
	echo '
	<center><table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="width:90%; margin-top:1%" >
                        <thead>
                            <tr>
        <th>No</th>
		<th>Expense Type</th>
		<th>Date</th>
		<th>Amount</th>
		<th>Tax</th>
    </tr>
                        </thead>
	';
}



include 'connection.php';
	$dateFrom = isset($_REQUEST['dateFrom'])?$_REQUEST['dateFrom']:"";
	$dateTo = isset($_REQUEST['dateTo'])?$_REQUEST['dateTo']:"";
	$type = isset($_REQUEST['type'])?$_REQUEST['type']:"";
	if (!empty($dateFrom) && $type=="Expense_Summary_Report"){
	
		 $select2= mysqli_query($link,"SELECT * from expenses WHERE date_created BETWEEN '$dateFrom' AND '$dateTo' ");
		
       	if ($select2->num_rows>0){
       	tableheader();
       	$a=1;
       	$total_amount=0;
       	$total_tax=0;
           while ($row=$select2->fetch_assoc()) {
       				echo '

       				<tr>
       					<td>'.$a.'</td>
       					<td>'.$row['type'].'</td>
       					<td>'.$row['date_created'].'</td>
       					<td>'.number_format($row['amount'],2).'</td>
       					<td>'.number_format($row['tax'],2).'</td>
       				</tr>
       				';

       				$a++;
       				$total_amount+=$row['amount'];
       				$total_tax+=$row['tax'];

       }
       	echo '

       				<tr style="font-size:20px;">
       					<td></td>
       					<td></td>
       					<td></td>
       					<td>'.number_format($total_amount,2).'</td>
       					<td>'.number_format($total_tax,2).'</td>
       				</tr>
       				';

       }
	}



$dateFrom1 = isset($_REQUEST['dateFrom1'])?$_REQUEST['dateFrom1']:"";
	$dateTo1 = isset($_REQUEST['dateTo1'])?$_REQUEST['dateTo1']:"";
	$type1 = isset($_REQUEST['type1'])?$_REQUEST['type1']:"";


$rent="Rent";
	global $RentAmount, $TaxAmount, $SalaryAmount, $ElectricityAmount, $WaterAmount;
	if (!empty($dateFrom1)){
	
		$select2= mysqli_query($link,"SELECT sum(amount) as rent_amount from expenses WHERE type='$rent' and date_created BETWEEN '$dateFrom1' AND '$dateTo1'");	
       	$row1=mysqli_fetch_assoc($select2);
       	$RentAmount=number_format($row1['rent_amount'],2);
      	echo '<input type="hidden" value='.$RentAmount.' id="rent">';


       	$select3= mysqli_query($link,"SELECT sum(amount) as tax_amount from expenses WHERE type='Tax' and date_created BETWEEN '$dateFrom1' AND '$dateTo1'");	
       	$row2=mysqli_fetch_assoc($select3);
       	$TaxAmount=number_format($row2['tax_amount'],2);
       	echo '<input type="hidden" value='.$TaxAmount.' id="tax">';
      
       	$select4= mysqli_query($link,"SELECT sum(amount) as salary_amount from expenses WHERE type='Employee Salary' and date_created BETWEEN '$dateFrom1' AND '$dateTo1'");	
       	$row3=mysqli_fetch_assoc($select4);
       	$SalaryAmount=number_format($row3['salary_amount'],2);
       	echo '<input type="hidden" value='.$SalaryAmount.' id="salary">';
      

       	$select5= mysqli_query($link,"SELECT sum(amount) as electricty_amount from expenses WHERE type='Electricty' and date_created BETWEEN '$dateFrom1' AND '$dateTo1'");	
       	$row4=mysqli_fetch_assoc($select5);
       	$ElectricityAmount=number_format($row4['electricty_amount'],2);
       	echo '<input type="hidden" value='.$ElectricityAmount.' id="electricity">';
       

       	$select6= mysqli_query($link,"SELECT sum(amount) as water_amount from expenses WHERE type='Water Bill' and date_created BETWEEN '$dateFrom1' AND '$dateTo1'");	
       	$row5=mysqli_fetch_assoc($select6);
       	$WaterAmount=number_format($row5['water_amount'],2);
      	echo '<input type="hidden" value='.$WaterAmount.' id="water">';
}







?>