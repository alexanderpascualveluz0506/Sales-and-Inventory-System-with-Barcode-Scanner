<style type="text/css">
  #btn-notif{
    border-style: none;
   background-color:#5c6681;
  }
   #btn-notif: hover{
    border-style: none;
    height: 20px;
    background-color: transparent;
  }
   #btn-notif:focus{
   
    border-color: #5c6681;
    background-color: transparent;
  }
  #number{
    background-color: red;
    color: white;
    border-radius: 50%;
      padding-top: 2px;
    padding-bottom: 4px;
    padding-left: 4px;
     padding-right: 4px;
  }
   .panel-body: focus{
    border-color:#5c6681 ;
   }
   .panel.panel-default:focus{
border-color:#5c6681 ;
   }
   .btn-group.pull-right.top-head-dropdown{
    border-color:#5c6681 ;
   }
#reorder-modal
  {
    z-index: 1020!important;
}
#btn-notif{
  box-shadow: none !important
}
#btn-notif:focus {
  outline: none;
  box-shadow: none;
}

.itemcontent:hover{
  background-color:#ebebeb  ;
}
.dropdown-menu.dropdown-menu-right{
  max-height:370px;   
  overflow-y:auto;
  font-family: arial;
      min-width: 300px !important;

}

/* Hide scrollbar for Chrome, Safari and Opera */
.dropdown-menu.dropdown-menu-right::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.dropdown-menu.dropdown-menu-right {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>


<?php   
function status(){
  include 'connection.php';

  $sql=mysqli_query($link, "SELECT * from inventory");

     if ($sql->num_rows >0){
          while ($row= $sql->fetch_assoc()) {    
              $reorder_level=$row["reorder_level"];
              $total_supply=$row["total_supply"];
              $item_name=$row["item_name"];
              if ($reorder_level==$total_supply){

                $sql1=mysqli_query($link, "SELECT count(*) as total FROM `purchaseorder` where item_name='$item_name' and dateCreated > NOW()- interval 3 day");
                $rows=mysqli_fetch_assoc($sql1);

                if ($rows['total']==0){
                $sql2=mysqli_query($link, "UPDATE inventory set status='Reorder Level' where item_name='$item_name'");
                }else{
                     $sql2=mysqli_query($link, "UPDATE inventory set status='' where item_name='$item_name'");
                }

              }elseif ($row['qty_on_shelf']==$row['replenishment_level']){
                $sql2=mysqli_query($link, "UPDATE inventory set status='Replenish' where item_name='$item_name'");
              }elseif($row['total_supply']<=10){
                $sql2=mysqli_query($link, "UPDATE inventory set status='Lower Stock' where item_name='$item_name'");
              }elseif ($row['total_supply']==0){
                $sql2=mysqli_query($link, "UPDATE inventory set status='No Stock' where item_name='$item_name'");
              }else{
                 $sql2=mysqli_query($link, "UPDATE inventory set status='' where item_name='$item_name'");
              }


}
}
}

?>
<?php 
include 'connection.php';
     $sql=mysqli_query($link, "SELECT count(*) as total FROM `inventory` WHERE `status` IS NOT NULL AND TRIM(status) <> ' '");
                      $rows=mysqli_fetch_assoc($sql);
                      $count=$rows['total'];    
                                       if ($count==0){
                                          
                  echo '
                      <div class="panel panel-default" style="margin-top: -30px;">
                          <div class="panel-body">
                          
                            <div class="btn-group pull-right top-head-dropdown">
                              <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn-notif" >
                                <i class="fas fa-bell" style="font-size:18px;color:white">&nbsp;&nbsp;</i><label id="number"></label>
                              </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                                  <a href="#" class="top-text-block" style="text-decoration:none">
                                                    
                                                    <div class="top-text-heading" style="margin-left:0px;background-color:#438afe;margin-top:-10px;height:40px;">
                                                     <center> <label style="color:white;margin-top:8px">Notifications</label></center>
                                                    </div>
                                                      <div>
                                                        
                                                      </div>
                                                  
                                                  </a> 
                                                </li>
                        ';



                    }else{
                      echo '
                       <div class="panel panel-default" style="margin-top: -30px;">
                          <div class="panel-body">
                          
                            <div class="btn-group pull-right top-head-dropdown">
                              <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn-notif" data-backdrop="false" >
                                <i class="fas fa-bell" style="font-size:18px;color:white">&nbsp;&nbsp;</i><label id="number">&nbsp;'.$count.'&nbsp;</label>
                              </button>
                        <ul class="dropdown-menu dropdown-menu-right">


                                               <li>
                                                  <a href="#" class="top-text-block" style="text-decoration:none">
                                                    
                                                    <div class="top-text-heading" style="margin-left:0px;background-color:#438afe;margin-top:-10px;height:40px;">
                                                     <center> <label style="color:white;margin-top:8px">Notifications</label></center>
                                                    </div>
                                                      <div>
                                                        
                                                      </div>
                                                  
                                                  </a> 
                                                </li>
                      ';

                    }
?>

 
                                
                                   <?php 
                                   include 'connection.php';
                                      $sql2=mysqli_query($link,"SELECT count(*)as count from inventory where status=''");
                                      $count=mysqli_fetch_assoc($sql2);
                                      if ($count['count']==0){
                                            echo '
                                               <li style="border-style:ridge;border-width:1px; background-color:#ebebeb">
                                                 
                                                    
                                  <div class="top-text-heading" style="margin-left:0px;padding-top:6px;">
                                  <center> <label style="color:black;">No Notifications Available</label></center>
                                                    </div>
                                                      
                                                  
                                                
                                                </li>

                                                  ';
                                      }



                                      $sql=mysqli_query($link, "SELECT * from inventory");
                                       if ($sql->num_rows >0){
                                           while ($row= $sql->fetch_assoc()) { 
                                            $status=$row['status'];
                                            $item_name=$row["item_name"];
                                            $qty=$row['reorder_level'];


                                                if($status=="Reorder Level"){
                                                                  echo '
                                               <li style="border-style:ridge;border-width:1px" class="itemcontent">
                                                  <a href="addpurchaseorder1.php?item_name='.$item_name.'&qty='.$qty.'" target="_blank" class="top-text-block" style="text-decoration:none">
                                                    
                                                    <div class="top-text-heading" style="margin-left:0px;padding-top:6px;"><i class="fas fa-exclamation-triangle" style="color:red;margin-left:10px">&nbsp;&nbsp;</i>
                                                      <label style="color:black;">Reorder level Alert</label>
                                                    </div>
                                                      <div >
                                                        <span style="color:#9f9f9f;margin-left:40px;font-size:15px"> '.$row['item_name'].' 
                                                       </span>
                                                       <label style="color:#9f9f9f;margin-left:40px;font-size:15px"> needs to reorder immediately</label>
                                                       
                                                      </div>
                                                  
                                                  </a> 
                                                </li>

                                                  ';


                                                     
                                                }

                                                 if($status=="Replenish"){
                                                                  echo '
                                               <li style="border-style:ridge;border-width:1px;" class="itemcontent">
                                                  <a href="inventory.php?item_name='.$item_name.'" class="top-text-block" style="text-decoration:none">
                                                    
                                                    <div class="top-text-heading" style="margin-left:0px;padding-top:6px;"><i class="fas fa-exclamation-triangle" style="color:red;margin-left:10px">&nbsp;&nbsp;</i>
                                                      <label style="color:black;">Replenish Alert</label>
                                                    </div>
                                                      <div >
                                                        <span style="color:#9f9f9f;margin-left:40px;font-size:15px"> '.$row['item_name'].' 
                                                       </span>
                                                       <label style="color:#9f9f9f;margin-left:40px;font-size:15px"> needs to fill up on shelf immediately</label>
                                                       
                                                      </div>
                                                  
                                                  </a> 
                                                </li>

                                                  ';



                                                     
                                                }

                                                   if($status=="Lower Stock"){
                                                                  echo '
                                               <li style="border-style:ridge;border-width:1px;" class="itemcontent">
                                                  <a href="inventory.php?item_name='.$item_name.'" class="top-text-block" style="text-decoration:none">
                                                    
                                                    <div class="top-text-heading" style="margin-left:0px;padding-top:6px;"><i class="fas fa-exclamation-triangle" style="color:red;margin-left:10px">&nbsp;&nbsp;</i>
                                                      <label style="color:black;"> Lower Stock Alert</label>
                                                    </div>
                                                      <div >
                                                        <span style="color:#9f9f9f;margin-left:40px;font-size:15px"> '.$row['item_name'].' 
                                                       </span>
                                                       <label style="color:#9f9f9f;margin-left:40px;font-size:15px"> needs to fill up on shelf immediately</label>
                                                       
                                                      </div>
                                                  
                                                  </a> 
                                                </li>

                                                  ';
                                                   
                                                }

                                            if($status=="No Stock"){
                                                                  echo '
                                               <li style="border-style:ridge;border-width:1px;" class="itemcontent">
                                                  <a href="inventory.php?item_name='.$item_name.'" class="top-text-block" style="text-decoration:none">
                                                    
                                                    <div class="top-text-heading" style="margin-left:0px;padding-top:6px;"><i class="fas fa-exclamation-triangle" style="color:red;margin-left:10px">&nbsp;&nbsp;</i>
                                                      <label style="color:black;"> Lower Stock Alert</label>
                                                    </div>
                                                      <div >
                                                        <span style="color:#9f9f9f;margin-left:40px;font-size:15px"> '.$row['item_name'].' 
                                                       </span>
                                                       <label style="color:#9f9f9f;margin-left:40px;font-size:15px"> needs to fill up on shelf immediately</label>
                                                       
                                                      </div>
                                                  
                                                  </a> 
                                                </li>

                                                  ';
                                                }
                                        }

                                      } 
                                   ?>
                                
                              </ul>
                            </div>
                          </div>
                        </div>


