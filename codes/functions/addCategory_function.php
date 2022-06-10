



<?php
global $i;
include 'connection.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {

	
		$category=$_POST['category'];
		$secondary=$_POST['secondary'];


		$brand=$_POST['brand'];
		$manufacturer=$_POST['manufacturer'];


		$sql="INSERT INTO maincategory ( `category_name`, `description`) VALUES ('$category', '$description')";
		$result= $link->query($sql);


		if (!empty($_POST['brand_main'])){
			$type="Brand";
			$brand=$_POST['brand_main'];
		    $add_brand="INSERT INTO `categorysubinfo`( `category_name`, `type`, `value`) VALUES ('$category', '$type',
		     ' $brand')";

		     $result= $link->query($add_brand);
		}

		if (!empty($_POST['manufacturer_main'])){
			$type="Manufacturer";
			$brand=$_POST['manufacturer_main'];
		    $add_manu="INSERT INTO `categorysubinfo`( `category_name`, `type`, `value`) VALUES ('$category', '$type',
		     ' $brand')";
		     $result= $link->query($add_manu);
		}


	
if(!empty($_POST['manufacturer'])){
		 foreach($_POST['manufacturer'] as $key=>$value) {

		 $manufacturer = $_POST['manufacturer'][$key];
			$type="Manufacturer";
		    $add_manu="INSERT INTO `categorysubinfo`( `category_name`, `type`, `value`) VALUES ('$category', '$type',
		     ' $manufacturer')";
		    $result= $link->query($add_manu);
		 
		}

}

if(!empty($_POST['brand'])){
		foreach($_POST['brand'] as $key=>$value) {

		 $brand = $_POST['brand'][$key];
			$type="Brand";
		    $add_brand="INSERT INTO `categorysubinfo`( `category_name`, `type`, `value`) VALUES ('$category', '$type',
		     ' $brand')";
		    $result= $link->query($add_brand);
		 
		}
}

if(!empty($_POST['sub'])){
		foreach($_POST['sub'] as $key=>$value) {

		 $secondary = $_POST['sub'][$key];
			$type="Secondary Category";
		    $add_secondary="INSERT INTO `categorysubinfo`( `category_name`, `type`, `value`) VALUES ('$category', '$type',
		     '$secondary')";
		    $result= $link->query($add_secondary);
		 
		}
}		

}

?>