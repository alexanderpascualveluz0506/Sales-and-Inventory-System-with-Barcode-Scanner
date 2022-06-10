<?php 
include 'connection.php';
$storage_name=isset($_REQUEST['name'])?$_REQUEST['name']:"";
$with_shelf=isset($_REQUEST['with_shelf'])?$_REQUEST['with_shelf']:"";
if ($with_shelf=="YES"){
	$sql=mysqli_query($link, "SELECT * from storage where name='$storage_name'");
	$row=mysqli_fetch_assoc($sql);
	$storage_no=$row['storage_no'];
        echo'
    
                         <thead>
                            <tr>
                                <th style="width:120px;">Stock In No</th>
                                <th style="width:340px;">Item Name</th>
                                <th style="width:130px;">Qty</th>
                                <th style="width:200px;">Shelves Location</th>

                            </tr>
                          </thead>

        ';
	  $sql1=mysqli_query($link, "SELECT * from batch where location='$storage_no'");

                         if ($sql1->num_rows>0){
                             while ($row1= $sql1->fetch_assoc()) {
                             	echo '
                             	<tr>
                             		<td>'.$row1['batch_no'].'</td>
                             		<td>'.$row1['item_name'].'</td>
                             		<td>'.$row1['qty_on_shelf'].'</td>
                             		<td>'.$row1['shelves_name'].'</td>

                             	</tr>

                             	';

                             }
                        }
                                
}else{



                       $sql=mysqli_query($link, "SELECT * from storage where name='$storage_name'");
	$row=mysqli_fetch_assoc($sql);
	$storage_no=$row['storage_no'];
    echo '
     <thead>
                            <tr>
                                <th style="width:120px;">Stock In No</th>
                                <th style="width:340px;">Item Name</th>
                                <th style="width:130px;">Qty</th>
                                <th style="width:200px;">Perishable After</th>

                            </tr>
                          </thead>

    ';
	  $sql1=mysqli_query($link, "SELECT * from batch where location='$storage_no'");

                         if ($sql1->num_rows>0){
                             while ($row1= $sql1->fetch_assoc()) {
                             	$total_qty=$row1['qty_on_shelf'];
                             if($storage_name=="Vegetable Section"){
                                    $total_qty=$total_qty.'g';
                                }
                                if ($storage_name=="Fruit Section"){
                                      $total_qty=$total_qty.'g';
                                }
                                if($storage_name=="Meat/Poultry Section"){
                                      $total_qty=$total_qty.'g';
                                }else{
                                	 $total_qty=$total_qty;
                                }
                             	echo '
                             	<tr>
                             		<td>'.$row1['batch_no'].'</td>
                             		<td>'.$row1['item_name'].'</td>
                             		<td>'.$total_qty.'</td>
                             		<td>'.$row1['expiration'].'</td>
  
                             	</tr>

                             	';

                             }
                        }

}




?>