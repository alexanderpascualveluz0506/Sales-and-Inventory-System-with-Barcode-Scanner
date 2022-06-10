<?php


function saveNewExpenses(){
	include 'connection.php';
	
	if  (isset($_POST['add_expense_post'])){
	
			$date=$_POST['date_post'];
            $amount= $_POST['amount_post'];
            $tax=$_POST['tax_post'];
            $type=$_POST['expense_type_post'];

             $sql=mysqli_query($link,"INSERT INTO `expenses`(`type`, `date_created`, `amount`, `tax`) VALUES ('$type','$date','$amount','$tax')");
			
  



  $uploadsDir = "uploads/expenses_files/";
    $allowedFileType = array('jpg','png','jpeg');

  

    $select=mysqli_query($link,"SELECT * from expenses where date_created='$date' and amount='$amount' and type='$type'");
    $row=mysqli_fetch_assoc($select);
    $expense_id=$row['id'];
        // Velidate if files exist
        if (!empty(array_filter($_FILES['images']['name']))) {
            
            // Loop through file items
            foreach($_FILES['images']['name'] as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['images']['name'][$id];
                $tempLocation    = $_FILES['images']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;

                if(in_array($fileType, $allowedFileType)){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                            $sqlVal = "('".$fileName."', '".$uploadDate."')";

                             $insert = mysqli_query($link,"INSERT INTO filesofexpenses (`files`, `expense_id`) VALUES 
                                ('$targetFilePath', '$expense_id')");
                        }
                }
              
            }
        }
		

 $uploadsDir1 = "uploads/expenses_files/";
    $allowedFileType1 = array('pdf', 'doc', 'docx', 'xls', 'xlsx');
              if (!empty(array_filter($_FILES['files_upload']['name']))) {
            
            // Loop through file items
            foreach($_FILES['files_upload']['name'] as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['files_upload']['name'][$id];
                $tempLocation    = $_FILES['files_upload']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir1 . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;

                if(in_array($fileType, $allowedFileType1)){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                            $sqlVal = "('".$fileName."', '".$uploadDate."')";

                             $insert = mysqli_query($link,"INSERT INTO filesofexpenses (`files`, `expense_id`) VALUES 
                                ('$targetFilePath', '$expense_id')");
                        }
                }
              
            }}

//main closing
        
echo "<script>location.href='expense.php'</script>";     
}

}

include 'connection.php';
$id = isset($_REQUEST['id'])?$_REQUEST['id']:"";

if (!empty($id)){
	$result=mysqli_query($link, "SELECT * from filesofexpenses where expense_id='$id'");

	  if ($result->num_rows >0){
       while ($row= $result->fetch_assoc()) {
       		   echo '<a href='.$row['files'].' target="_blank" class='.$row['files'].'>'.$row["files"].'</a>';
       			echo '<br>';

       
}
}else{

	echo '<center><span style="color:red">no files available</span></center>';
}
}

?>