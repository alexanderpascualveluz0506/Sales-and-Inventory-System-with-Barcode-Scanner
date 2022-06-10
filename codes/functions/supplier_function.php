 
<script type="text/javascript">
    
        function changeFunction(selectValue){
            var x= selectValue.value;

            
        }

</script>

<?php  

function showTableSupplier(){
	include 'connection.php';


	
	$sql= "SELECT `id`,`company_name`, `firstname`, `lastname`, `address`, `email`, `contact_no` FROM `suppliers` LIMIT 0,10";
		$result= $link->query($sql);

		if ($result->num_rows >0){
              $a=1;
    while ($row= $result->fetch_assoc()) {
      if (empty($row["email"])){
        $email="<span style='color:blue;font-style: italic'>not available</span>";
        $email1="not available";
      }else{
        $email=$row['email'];
        $email1=$row['email'];
      }
        echo "

        <tr row_id='". $row['id']."'>
        <td>".$a."</td>
         <td data-label='company name' scope='row'>".$row['company_name']."</td>
          <td data-label='name' scope='row'>".$row['firstname']." ".$row['lastname']."</td>

          <td data-label='address' scope='row'>".$row['address']."</td>

          <td data-label='email' scope='row'>".$email."</td>

          <td data-label='contact no' scope='row'>".$row['contact_no']."</td>

           <td>
          
           <a href='#' data-id=".$row['id']." data-company='".$row["company_name"]."' data-firstname=".$row['firstname']." data-lastname=".$row['lastname']." data-address='".$row["address"]."' data-email='".$email1."' data-contact=".$row['contact_no']." data-toggle='modal' data-target='.bd-example-modal-lg' class='view-supplier'> <button id='view-button' class='btn btn-success'><i class='fas fa-eye' style='margin-left:-7px;font-size:17px;'></i></button></a>
           

           <button class='btn btn-danger' id='delete-button'><a href='' a href=''data-toggle='modal' data-target='#modal-delete' data-name='".$row["id"]."' ><i class='ti-trash'  style='margin-left:-7px; font-size:18px;'></i></a>
            </button>
           </td>
         ";

     

         $a++;
    }

    echo"</table>";

    
    }


}

function addSupplier(){
    include 'connection.php';

    if (isset($_POST['add_supplier_post'])){
      $company_name=$_POST['company_name'];
      $lastname=$_POST['lastname'];
      $firstname=$_POST['firstname'];
      $address=$_POST['address'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];

    $uploadsDir = "uploads/supplier_files/";
    $allowedFileType = array('jpg','png','jpeg');

    $sql=mysqli_query($link, "INSERT into suppliers (`company_name`, `firstname`, `lastname`, `address`, `email`, `contact_no`) VALUES ('$company_name', '$firstname', '$lastname', '$address', '$email', '$contact')");

    $select=mysqli_query($link,"SELECT * from suppliers where firstname='$firstname' and lastname='$lastname'");
    $row=mysqli_fetch_assoc($select);
    $supplier_id=$row['id'];
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


                                 $last_id = mysqli_insert_id($conn);
                             $insert = mysqli_query($link,"INSERT INTO filesofsupplier (`files`, `supplier_id`) VALUES 
                                ('$targetFilePath', '$supplier_id')");
                        }
                }
              
            }
        }


    $uploadsDir1 = "uploads/supplier_files/";
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

                             $insert = mysqli_query($link,"INSERT INTO filesofsupplier (`files`, `supplier_id`) VALUES 
                                ('$targetFilePath', '$supplier_id')");
                        }
                }
              
            }}

//main closing
        
echo "<script>location.href='supplier.php'</script>";    
}

}
include "connection.php";
$id = isset($_REQUEST['id'])?$_REQUEST['id']:"";
if (!empty($id)){
    $sql=mysqli_query($link, "SELECT * from filesofsupplier where supplier_id='$id'");

    if ($sql->num_rows >0){
        while ($row= $sql->fetch_assoc()) {
            echo '<div class="row g-3" style="margin-left:3%; width:90%">';
            echo '<a href='.$row['files'].' target="_blank" class='.$row['files'].'>'.$row["files"].'</a>';
            echo '<div class="col-sm" style="padding-right:1%">';
            echo "<a href='' style='float:right;color:red' class='remove' id=".$row["id"].">Remove</a>";

            echo '<br>';
            echo '</div></div>';
        }
    }

}

$id_del = isset($_REQUEST['id_del'])?$_REQUEST['id_del']:"";
$file = isset($_REQUEST['file'])?$_REQUEST['file']:"";

if (!empty($file)){
    $sql=mysqli_query($link, "DELETE from filesofsupplier where id='$file' and supplier_id='$id_del'");

    if (!empty($id)){
    $sql=mysqli_query($link, "SELECT * from filesofsupplier where supplier_id='$id_del'");

    if ($sql->num_rows >0){
        while ($row= $sql->fetch_assoc()) {
            echo '<div class="row g-3" style="margin-left:3%; width:90%">';
            echo '<a href='.$row['files'].' target="_blank" class='.$row['files'].'>'.$row["files"].'</a>';
            echo '<div class="col-sm" style="padding-right:1%">';
            echo "<a href='' style='float:right;color:red' class='remove' id=".$row["id"].">Remove</a>";

            echo '<br>';
            echo '</div></div>';
        }
    }

}

}

function add_files_Supplier(){
    include 'connection.php';

    if (isset($_POST['upload_file'])){
    
        $supplier_id=$_POST['id_post'];
        if (!empty(array_filter($_FILES['files_upload']['name']))) {
            
            // Loop through file items
          $uploadsDir1 = "uploads/supplier_files/";
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

                             $insert = mysqli_query($link,"INSERT INTO filesofsupplier (`files`, `supplier_id`) VALUES 
                                ('$targetFilePath', '$supplier_id')");
                        }
                }
              
            }


        }
        }
    }
}


include 'connection.php';

$company_name= isset($_REQUEST['company_name'])?$_REQUEST['company_name']:"";
      $address= isset($_REQUEST['address'])?$_REQUEST['address']:"";
      $email= isset($_REQUEST['email'])?$_REQUEST['email']:"";
      $contact=isset($_REQUEST['contact'])?$_REQUEST['contact']:"";
      $id_update=isset($_REQUEST['id_update'])?$_REQUEST['id_update']:"";


if (!empty($company_name)){
      $sql=mysqli_query($link, "UPDATE suppliers set company_name='$company_name', address='$address', email='$email', 
        contact_no='$contact' where id='$id_update'");
}


?>

  