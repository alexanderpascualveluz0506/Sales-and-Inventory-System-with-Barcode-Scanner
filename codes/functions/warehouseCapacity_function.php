<?php
function selectValuesfromCapacityProperties(){
	include 'connection.php';

 global $final_area;
 global  $nonStorageArea;
 global $storage_area;
global  $sizeOfStore;
global $storagetL;
global $storagetH;
global $final_storage_used;
global $area_in_storage;
	$sql=mysqli_query($link, "SELECT * FROM capacity");
if ($sql->num_rows >0){
    while ($row= $sql->fetch_assoc()) { 
        $stL= $row['StoreLenght'];
        $stW=$row['StoreWidth'];
        $stH=$row['StoreHeight'];
        $usL=$row['unStorageLenght'];
        $usW=$row['unStorageWidth'];
        $usH=$row['unStorageHeight'];

        $area_store= $stL*$stW;
        $unarea_store=$usL*$usW;
        $nonStorageArea=round($usL*$usW,2);
        $sizeOfStore=round($stL*$stW,2);
        $total_area1=$area_store-$unarea_store;
        $total_area2=$total_area1*$stH;
        $final_area=round($sizeOfStore-$nonStorageArea, 2);

    }
  }
$sql = "SELECT  SUM(length), SUM(width) from storage";
$result = $link->query($sql);

while($row = mysqli_fetch_array($result)){
    $totalLength=$row['SUM(length)'];
    $totalWidth=$row['SUM(width)'];

    $Slength= round($totalLength*0.0328084,2);
    $SWidth= round($totalWidth*0.0328084,2);
    $area_in_storage=round($Slength*$SWidth,2);
    
}




echo $storagetL;
$final_storage_used=$storagetH*$storagetL;
   

    
  
}
function showTableStorage(){
	include 'connection.php';
	$sql= "SELECT `storage_no`, `height`, `width`, `no_shelves`, `no_occupied_shelves`, `total_items`, `total_group`, `utilization` FROM `storage`";
		$result= $link->query($sql);

if ($result->num_rows >0){
    while ($row= $result->fetch_assoc()) {
        echo "
        <tr row_id='". $row['storage_no']."'>
        <td><input type='checkbox' id='vehicle1' name='vehicle1' value='Bike'></td>
       
        <td data-label='Storage_No' scope='row'>".$row['storage_no']."</td></td>"
        ."<td data-label='No of Shelves'>".$row['no_shelves']."</td>"
        ."<td data-label='No of Occupied Shelves' >".$row['no_occupied_shelves']. "</td>". "<td data-label='total items'>"
        .$row['total_items']."</td>". "<td data-label='total group'>".$row['total_group']. "</td>".
        "<td><input type='submit' value='view'><input type='submit' value='edit'><input type='submit' value='delete'</td>".
         "<td data-label='total group'>".$row['utilization']. "</td>";
    }

    echo"</table>";
    }else{
        
    }
}

function updateStoreCapacityProperties (){
	include 'connection.php';
	 if (isset($_POST['save_changes'])){
      $lstore=$_POST['l-store'];
      $wstore=$_POST['w-store'];
      $hstore=$_POST['h-store'];
      $ulstorage=$_POST['l-storage'];
      $uwstorage=$_POST['w-storage'];
      $uhstorage=$_POST['h-storage'];


      $sql= mysqli_query($link, "UPDATE capacity SET StoreLenght='$lstore', StoreWidth= '$wstore',
        StoreHeight='$hstore'; unStorageLenght='$ulstorage', unStorage='uwstorage', unStorageHeight='uhstorage'
        WHERE id=1");


}
}




function countNonStorageArea(){
	global $final_storage_area;
	include 'connection.php';

	$result = mysqli_query($link, 'SELECT SUM(length) AS value_sum, SUM(width) AS value_width, SUM(height) AS value_height FROM storage'); 
				$row = mysqli_fetch_assoc($result); 
				$sum_length = $row['value_sum'];
				$final_length= $sum_length/30.48;
				$sum_width=$row['value_width'];
				$final_width= $sum_width/30.48;	
				$sum_height=$row['value_height'];
				$final_height= $sum_height/30.48;	

				$storage_area= round($final_length*$final_width*$final_height,2);	
                $final_storage_area=round($storage_area*8);

}

function addNewStorageRedirect(){
    if (isset($_POST['add_new_storage'])){
        header("Location:storage.php");
    }
}

function showmonth(){
    global $current_month;
   $month= date("M");
    $year = date("Y");
   $current_month="Total Warehouse Capacity of Erlinda's Grocery ".$month. " ".$year;


}

?>
