<?php

$link = mysqli_connect("localhost", "root", "", "store");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information

?>