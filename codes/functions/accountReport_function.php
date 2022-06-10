<?php
function tableheader(){
	echo '
	<center><table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="width:90%; margin-top:1%" >
                        <thead>
                            <tr>
		<th>Account No</th>
		<th>Log Activity</th>
		<th>Date and Time</th>
    </tr>
                        </thead>
	';
}
include 'connection.php';
	$dateFrom = isset($_REQUEST['dateFrom'])?$_REQUEST['dateFrom']:"";
	$dateTo = isset($_REQUEST['dateTo'])?$_REQUEST['dateTo']:"";

	if (!empty($dateFrom)){
	
		 $select2= mysqli_query($link,"SELECT * from logs WHERE date_time BETWEEN '$dateFrom' AND '$dateTo' ");
		


       if ($select2->num_rows>0){
       	tableheader();
           while ($row=$select2->fetch_assoc()) {
       				echo '

       				<tr>
       					<td>'.$row['account_no'].'</td>
       					<td>'.$row['log_activity'].'</td>
       					<td>'.$row['date_time'].'</td>
       				</tr>
       				';


       }

       }
	}



?>