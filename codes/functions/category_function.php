<?php
include 'connection.php';
if(isset($_POST['save_changes'])){
	
$category=$_POST['category_name_post'];
	 $sql1= "INSERT INTO maincategory( `category_name`) VALUES ('$category')";
	 $result=mysqli_query($link,$sql1);

	 	echo '<script>window.location.href="category.php"</script>';
}


if (isset($_POST['update_changes'])){
	$category=$_POST['category_name_post_edit'];
	$id=$_POST['edit-id-category'];

	$sql=mysqli_query($link, "UPDATE maincategory set category_name='$category' where id='$id'");

	echo '<script>window.location.href="category.php"</script>';
}

if (isset($_POST['delete_category1'])){
	$category=$_POST['category_name_post_delete'];
	$id=$_POST['delete-id-category'];
	echo $category;
	$sql=mysqli_query($link, "DELETE from maincategory where category_name='$category'");

	echo '<script>window.location.href="category.php"</script>';
}

$name = isset($_REQUEST['name'])?$_REQUEST['name']:"";

if(!empty($name)){
$result=mysqli_query($link, "SELECT * from inventory where category='$name'");
                              if ($result->num_rows >0){
                                    while ($row= $result->fetch_assoc()) {
                                    		
                                    		if ($name=="Fresh Vegetables" or $name=="Pork/Meat/Poultry" or $name=="Fruits"){
                                    			$total_supply=$row["total_supply"]."g";
                                    		}else{
                                    			$total_supply=$row["total_supply"];
                                    		}

                                    		echo '
                                    		<tr>
                                    			<td style="background-color:white">'.$row['item_name'].'</td>
                                    			<td style="background-color:white">'.$total_supply.'</td>

                                    		</tr>
                                    		';
                                   }

}
}
	?>