<?php

$item_name = isset($_REQUEST['itemname'])?$_REQUEST['itemname']:"";
$category = isset($_REQUEST['category'])?$_REQUEST['category']:"";
$supplier = isset($_REQUEST['supplier'])?$_REQUEST['supplier']:"";
$returnable = isset($_REQUEST['returnable'])?$_REQUEST['returnable']:"";
$perishable= isset($_REQUEST['perishable'])?$_REQUEST['perishable']:"";
$monitor= isset($_REQUEST['monitor'])?$_REQUEST['monitor']:"";
$length= isset($_REQUEST['length'])?$_REQUEST['length']:"";
$width= isset($_REQUEST['width'])?$_REQUEST['width']:"";
$height= isset($_REQUEST['height'])?$_REQUEST['height']:"";
$id= isset($_REQUEST['id'])?$_REQUEST['id']:"";
$orig= isset($_REQUEST['orig'])?$_REQUEST['orig']:"";

$brand= isset($_REQUEST['brand'])?$_REQUEST['brand']:"";
$manufacturer= isset($_REQUEST['manufacturer'])?$_REQUEST['manufacturer']:"";
include 'connection.php';


if (!empty($item_name)){
$sql=mysqli_query($link, "UPDATE items set category='$category', supplier='$supplier', returnable='$returnable', perisable='$perishable', length='$length', width='$width', height='$height', brand='$brand', manufacturer='$manufacturer' where id='$id'");

$sql=mysqli_query($link, "UPDATE inventory set item_name='$item_name', monitor_storage='$monitor' where item_name='$orig'");
$sql=mysqli_query($link, "UPDATE batch set item_name='$item_name' where item_name='$orig'");




}
	?>