


<?php
 include 'connection.php';

$data = isset($_REQUEST['myData'])?$_REQUEST['myData']:"";

$capacity_needed = isset($_REQUEST['myCapacity'])?$_REQUEST['myCapacity']:"";
echo $capacity_needed;  

 $select= "SELECT * from shelves where storage_no='$data' AND '$capacity_needed'<storage_capacity";

                 $result= $link->query($select);
                      
                if ($result->num_rows >0){
                        echo " Shelves<select class='custom-select' id=''>
                         <option value=''>Choose...</option>";
                    while ($row= $result->fetch_assoc()) {
                          echo "<option value=" .$row['shelves_name'].">".$row['shelves_name']."</option>";

                    }
                }else{
                    echo " Shelves<select class='custom-select' id=''>
                         <option value=''>No Space Available</option>";
                }

  echo "</select>"; 

  ?>