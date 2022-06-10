<?php

$dateFrom = isset($_REQUEST['dateFrom'])?$_REQUEST['dateFrom']:"";
$dateTo = isset($_REQUEST['dateTo'])?$_REQUEST['dateTo']:"";
$categories =isset($_REQUEST['categories'])?$_REQUEST['categories']:"";
$item =isset($_REQUEST['item'])?$_REQUEST['item']:"";
$type=isset($_REQUEST['type'])?$_REQUEST['type']:"";


function headerTopSelling(){
		echo '   
		<table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="margin-top:30px">
            <thead>


                        <tr>
                        	
                        		
                                <th>Item Name</th>
                                <th>Qty Sold</th>
                                <th>Total Sale</th>
                              
                              
                              

                        </tr>
            </thead>';
}
include 'connection.php';
if ($type=="Top_Selling_Item_Report"){
			
		if ($categories=="All"){
			headerTopSelling();

				$sql=mysqli_query($link, "SELECT item_name, sum(qty) as total_qty from transaction GROUP by item_name ORDER By total_qty desc limit 5;");
				 		while ($row3=$sql->fetch_assoc()) {
						 		$item_name=$row3['item_name'];
						 		


						 	$sql3=mysqli_query($link, "SELECT sum(qty) as total_qty1, sum(total_amount) as total_sale from transaction where item_name='$item_name' and payment_date BETWEEN '$dateFrom' AND '$dateTo'");
				 			$rowSum3=mysqli_fetch_assoc($sql3);
				 			$total_qty1=$rowSum3['total_qty1'];
				 			$total_sale=$rowSum3['total_sale'];



				 			$sq2=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
				 			$rowSum=mysqli_fetch_assoc($sq2);
				 			$perishable=$rowSum['perishable'];

				 					
				 			if ($perishable=="YES"){
				 				$total_qty1=$total_qty1."g";
				 			} 	

				 			if (!empty($perishable) && $total_qty1>2000){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                             <td style="width: 20%">'.number_format($total_sale,2).'</td>

			                             
			                        </tr>
                  
   							 	';
   							 }

   							 if (empty($perishable) && $total_qty1>10){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                             <td style="width: 20%">'.number_format($total_sale,2).'</td>

			                             
			                        </tr>
                  
   							 	';
   							 }
   							 
   						}
	
   					
   			 		


}
	if (!empty($categories) && $categories!="All"){
			headerTopSelling();
   			 		$sql=mysqli_query($link, "SELECT item_name, sum(qty) as total_qty from transaction GROUP by item_name ORDER By total_qty desc limit 5;");
				 		while ($row3=$sql->fetch_assoc()) {
						 		$item_name=$row3['item_name'];
						 		


						 	$sql3=mysqli_query($link, "SELECT sum(qty) as total_qty1, sum(total_amount) as total_sale from transaction where item_name='$item_name' and category='$categories' and payment_date BETWEEN '$dateFrom' AND '$dateTo'");
				 			$rowSum3=mysqli_fetch_assoc($sql3);
				 			$total_qty1=$rowSum3['total_qty1'];
				 			$total_sale=$rowSum3['total_sale'];



				 			$sq2=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
				 			$rowSum=mysqli_fetch_assoc($sq2);
				 			$perishable=$rowSum['perishable'];

				 					
				 				if ($perishable=="YES"){
				 				$total_qty1=$total_qty1."g";
				 			} 	

				 			if (!empty($perishable) && $total_qty1>2000){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                             <td style="width: 20%">'.number_format($total_sale,2).'</td>

			                             
			                        </tr>
                  
   							 	';
   							 }

   							 if (empty($perishable) && $total_qty1>10){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                             <td style="width: 20%">'.number_format($total_sale,2).'</td>

			                             
			                        </tr>
                  
   							 	';
   							 }
   							 
   						}

}
}

if ($type=="Low_Selling_Item_Report"){
				if ($categories=="All"){
			headerTopSelling();

				
				$sql=mysqli_query($link, "SELECT distinct item_name from transaction ORDER by qty");
				 		while ($row3=$sql->fetch_assoc()) {
						 		$item_name=$row3['item_name'];
						 		


						 	$sql3=mysqli_query($link, "SELECT sum(qty) as total_qty1, sum(total_amount) as total_sale from transaction where item_name='$item_name' and payment_date BETWEEN '$dateFrom' AND '$dateTo'");
				 			$rowSum3=mysqli_fetch_assoc($sql3);
				 			$total_qty1=intval($rowSum3['total_qty1']);
				 			$total_sale=$rowSum3['total_sale'];



				 			$sq2=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
				 			$rowSum=mysqli_fetch_assoc($sq2);
				 			$perishable=$rowSum['perishable'];

				 					
				 			if ($perishable=="YES"){
				 				;
				 				$total_qty1=$total_qty1."g";
				 			} 	

				 			if (!empty($perishable) && $total_qty1<1000){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                             <td style="width: 20%">'.number_format($total_sale,2).'</td>

			                             
			                        </tr>
                  
   							 	';
   							 }

   							 if (empty($perishable) && $total_qty1<10){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                             <td style="width: 20%">'.number_format($total_sale,2).'</td>

			                             
			                        </tr>
                  
   							 	';
   							 }
   							 
   						}
	
   					
   			 		
}

	if (!empty($categories) && $categories!="All"){
			headerTopSelling();

				$sql=mysqli_query($link, "SELECT distinct item_name from transaction ORDER by qty");
				 		while ($row3=$sql->fetch_assoc()) {
						 		$item_name=$row3['item_name'];
						 		


						 	$sql3=mysqli_query($link, "SELECT sum(qty) as total_qty1, sum(total_amount) as total_sale from transaction where item_name='$item_name' and payment_date BETWEEN '$dateFrom' AND '$dateTo'");
				 			$rowSum3=mysqli_fetch_assoc($sql3);
				 			$total_qty1=intval($rowSum3['total_qty1']);
				 			$total_sale=$rowSum3['total_sale'];



				 			$sq2=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
				 			$rowSum=mysqli_fetch_assoc($sq2);
				 			$perishable=$rowSum['perishable'];

				 					
				 			if ($perishable=="YES"){
				 			
				 				$total_qty1=$total_qty1."g";
				 			} 	

				 			if (!empty($perishable) && $total_qty1<1000){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                             <td style="width: 20%">'.number_format($total_sale,2).'</td>

			                             
			                        </tr>
                  
   							 	';
   							 }

   							 if (empty($perishable) && $total_qty1<10){
   							 			echo '

			   						
			   						<tr> 
			                          
			                            <td style="border-right-style: none;">'.$row3["item_name"].'</td>
			                            <td style="width: 20%">'.$total_qty1.'</td>
			                             <td style="width: 20%">'.number_format($total_sale,2).'</td>

			                             
			                        </tr>
                  
   							 	';
   							 }
   							 
   						}
   					
   			 		
}
}

?>