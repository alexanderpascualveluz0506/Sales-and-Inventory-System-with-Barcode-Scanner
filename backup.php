<?php  


$databases='store';
$user= "root";
$pass="";
$host="localhost";


date_default_timezone_set('Asia/Manila');

	$filename= "BACKUP"."_".date("F_D_Y")."@".date("g_ia").uniqid("_", false);
	$folder="C:/xampp/htdocs/dashboard/backup/".$filename.".sql";
	$mysqldump="C:/xampp/mysql/bin/mysqldump";

	exec("{$mysqldump} --user={$user} --password={$pass} --host={$host} {$databases} --result-file={$folder} 2>&1", $output);

print_r($output);

?>