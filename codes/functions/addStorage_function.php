<?php
global $length;
global $width;
function addStorage(){
include 'connection.php';
global $total_no_shelves;
global $upper;
global $lower;
global $no_shelves;
global $upper_beam;

if (isset($_POST['save-changes-storage'])){
  $name=$_POST['name'];
  $length=$_POST['length'];
   $height=$_POST['height'];
   $width=$_POST['width'];
   $no_shelves=$_POST['no_shelves'];
   $utilization="0%";
   $no_occupied=0;

  $upper_check=$_POST['upper_check'];
  $lower_check=$_POST['lower_check'];
  $total_no_shelves=0;
   

  if($_POST['upper_check']==0){

        $upper = 0;
   } else{
        $upper=1;
        $total_no_shelves+=1;
       
    }
    

    if($_POST['lower_check']==0){

        $lower = 0;
    }else{
        $lower=1;
         $total_no_shelves+=1;
       
    }

$total_no_shelves+=$no_shelves;
$result = mysqli_query($link,'SELECT * FROM storage where storage_no<100');
$rowcount=mysqli_num_rows($result);
$storage_no=$rowcount+1;
$name="Storage"." ".$storage_no;

$capacity=round($length*$width*$height,2);
$sql="INSERT into storage (`storage_no`, `length`, `height`, `width`, `no_shelves`, `capacity`, `name`) 
VALUES ('$storage_no', '$length', '$height', '$width','$total_no_shelves', '$capacity', '$name')";

$query= mysqli_query($link,$sql);



echo "<br>

      <div class='row'>
        <div class='col-lg-12'>
            <div class='card' id='' style='margin-top:-1%'>
                  <div class='l-lcog-4 p-l-0 title-margin-left'>";
        $alphabet = range('A', 'Z');
        for ($i=1; $i<=$total_no_shelves; $i++){
         $sub_name=$storage_no.'-'.$alphabet[$i-1];
           $a=1;

            

            if ($upper==1){
              $upper_beam='Level '.$i.' (Upper Beam)';
              $upper--;
              $upper_beam_height=243.84-$height;
            }

            else if ($upper==0 && $i<$total_no_shelves ){
              $a++;
              $upper_beam='Level '.$i;
              $upper_beam_height='';              
            }
            else if ($lower==1){
              $upper_beam='Level '.$i.' (Lower Beam)';
              $upper_beam_height='';
              $lower--;
            }else{
              $upper_beam='Level '.$i;
              $upper_beam_height='';    
            }

            echo "
                        <div class='row g-3' style='margin-top:1.5%; id='inputs''>
                            <div class='col-sm' style='width:2%'>
                              <label for='inputEmail4'>Shelves ID</label>
                              <input type='text' class='form-control' id='inputEmail4' value='$sub_name' name='shelves_id[]'>
                              </div>

                          <div  class='col-sm' style='width:2%'>
                          <label for='inputPassword'>Position</label>
                          <input type='text' class='form-control' id='position' value='$upper_beam' name='shelves_position[]'>
                        </div>
                          
                    

                   </div>
                     
                      ";

                    }//end of for loop
 
 





}//end of save changes button
}//end of function add 

function send(){
  include 'connection.php';


$sql1=mysqli_query($link, "SELECT SUM(height)as height  FROM storage");
$row1 = mysqli_fetch_assoc($sql1);




  if (isset($_POST['save_shelves'])){
     

   
        foreach ($_POST['shelves_id'] as $key=>$value) {
         

            $result2 = mysqli_query($link,'SELECT * FROM storage where storage_no<100');
            $rowcount2=mysqli_num_rows($result2);
            $storage_no2=$rowcount2;

            $id = $_POST['shelves_id'][$key];
            $position = $_POST['shelves_position'][$key];
        


           
            $sql=mysqli_query($link, "INSERT INTO shelves (`shelves_name`, `storage_no`, `position`)values 
              ('$id','$storage_no2','$position')");




 
  } 



echo ("<script>location.href='warehouseCapacity.php'</script>");
}
}
?>


