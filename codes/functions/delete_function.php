<?php  


include 'connection.php';


// for item table delete
$item_name = isset($_REQUEST['itemname_for_item'])?$_REQUEST['itemname_for_item']:"";

if (!empty($item_name)){
  

   $sql1=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
   $row1=mysqli_fetch_assoc($sql1);
   $qty=$row1['total_supply'];



    $sqlq=mysqli_query($link, "SELECT * from batch where item_name='$item_name' Limit 1");
    $sqlLoc=mysqli_fetch_assoc($sqlq);
    $storage=$sqlLoc['location'];
    $shelves=$sqlLoc['shelves_name'];
    $stackable=$sqlLoc['stackable'];


    if (!empty($shelves)){
        
         $sqla=mysqli_query($link,"UPDATE shelves set total_items=total_items-'$qty' where storage_no='$storage' and shelves_name='$shelves'");
         $sqlb=mysqli_query($link,"UPDATE storage set total_items=total_items-'$qty' where storage_no='$storage'"); 

    }
    if (empty($shelves)){     
       $sqlb=mysqli_query($link,"UPDATE storage set total_items=total_items-'$qty' where storage_no='$storage'"); 
    }


   $sql2=mysqli_query($link, "DELETE from items where item_name='$item_name'");
   $sql3=mysqli_query($link, "DELETE from inventory where item_name='$item_name'");
   $sql4=mysqli_query($link, "DELETE from batch where item_name='$item_name'");


}

//delete for inventory table
$itemname_for_inv = isset($_REQUEST['itemname_for_inv'])?$_REQUEST['itemname_for_inv']:"";
if (!empty($itemname_for_inv)){

   $sql1=mysqli_query($link, "SELECT * from inventory where item_name='$item_name'");
   $row1=mysqli_fetch_assoc($sql1);
   $qty=$row1['total_supply'];



    $sqlq=mysqli_query($link, "SELECT * from batch where item_name='$item_name' Limit 1");
    $sqlLoc=mysqli_fetch_assoc($sqlq);
    $storage=$sqlLoc['location'];
    $shelves=$sqlLoc['shelves_name'];
    $stackable=$sqlLoc['stackable'];


    if (!empty($shelves)){
        
         $sqla=mysqli_query($link,"UPDATE shelves set total_items=total_items-'$qty' where storage_no='$storage' and shelves_name='$shelves'");
          $sqlb=mysqli_query($link,"UPDATE storage set total_items=total_items-'$qty' where storage_no='$storage'"); 

    }
    if (empty($shelves)){     
       $sqlb=mysqli_query($link,"UPDATE storage set total_items=total_items-'$qty' where storage_no='$storage'"); 
    }


   $sql2=mysqli_query($link, "DELETE from items where item_name='$item_name'");
   $sql3=mysqli_query($link, "DELETE from inventory where item_name='$item_name'");
   $sql4=mysqli_query($link, "DELETE from batch where item_name='$item_name'");
}


// delete button for batch
$itemname_for_batch = isset($_REQUEST['itemname_for_batch'])?$_REQUEST['itemname_for_batch']:"";
$batch_for_batch = isset($_REQUEST['batch_for_batch'])?$_REQUEST['batch_for_batch']:"";

if (!empty($batch_for_batch)){
  
 
    $sqlq=mysqli_query($link, "SELECT * from batch where item_name='$item_name' and batch_no='$batch_for_batch'");
    $sqlLoc=mysqli_fetch_assoc($sqlq);
    $storage=$sqlLoc['location'];
    $shelves=$sqlLoc['shelves_name'];
    $stackable=$sqlLoc['stackable'];
    $qty=$sqlLoc['qty']; // total suply
    $cost=$sqlLoc['cost']; //for inventory value

    $damage=$sqlLoc['damage']; // for damage
    $damage_cost=$sqlLoc['damage_cost']; // for damage cost
    $qty_on_shelf=$sqlLoc['qty_on_shelf']; //qty on shelf


    if (!empty($shelves)){
        
         $sqla=mysqli_query($link,"UPDATE shelves set total_items=total_items-'$qty' where storage_no='$storage' and shelves_name='$shelves'");
          $sqlb=mysqli_query($link,"UPDATE storage set total_items=total_items-'$qty' where storage_no='$storage'"); 

    }
    if (empty($shelves)){     
       $sqlb=mysqli_query($link,"UPDATE storage set total_items=total_items-'$qty' where storage_no='$storage'"); 
    }
  
   $sql4=mysqli_query($link, "DELETE from batch where item_name='$item_name' and batch_no='$batch_for_batch'");


   $sql5=mysqli_query($link, "UPDATE inventory set total_supply=total_supply-'$qty', inventory_value=inventory_value-'$cost', damage_quantity=damage_quantity-'$damage', damaged_cost=damaged_cost-'$damage_cost', qty_on_shelf=qty_on_shelf-'$qty_on_shelf' where item_name='$itemname_for_batch'");
}

?>