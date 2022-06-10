<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

session_start();
include 'connection.php';
$error=0;
  date_default_timezone_set('Asia/Manila');

  function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}



 $ip=get_client_ip();


 $device_name=gethostbyaddr($_SERVER['REMOTE_ADDR']);




 if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$myusername = mysqli_real_escape_string($link,$_POST['username']);
    $mypassword = mysqli_real_escape_string($link,$_POST['password']); 

	$sql = "SELECT * FROM accounts WHERE Username = '$myusername' and Password = '$mypassword' and IP_address='$ip' and device_name='$device_name'";
    $result = mysqli_query($link,$sql);
	$count = mysqli_num_rows($result);


	
	if($count == 1) {
		
			while ($row = mysqli_fetch_array($result)) {
				$get_role=$row['Role'];
				$role=strtolower($get_role);
				$get_accNo=$row['Account_No'];
				$log_act="Login";
				$timestamp = date('Y-m-d H:i:s');
				$firstname=$row["Firstname"];
				$lastname=$row["Lastname"];
				$account_no=$row["Account_No"];

			if ($role=='admin'){
 						 date_default_timezone_set('Asia/Manila');
                       $time=date('g:i A');
					$_SESSION["Firstname"] = $firstname;
					$_SESSION["Lastname"]= $lastname;
					$_SESSION["Time"]=$time;
					$_SESSION["account_no"]=$account_no;

					$act_insert=mysqli_query($link, "INSERT into logs(account_no, log_activity, date_time) VALUES ('$get_accNo', '$log_act', 
                            '$timestamp')");


					date_default_timezone_set('Asia/Manila');

						

					header('Location:dashboard.php');
				

			}else{


					date_default_timezone_set('Asia/Manila');
                    $time=date('g:i A');
					$_SESSION["Firstname"] = $firstname;
					$_SESSION["Lastname"]= $lastname;
					$_SESSION["Time"]=$time;
					$_SESSION["account_no"]=$account_no;


					date_default_timezone_set('Asia/Manila');

					header('Location:pos1.php');
					$act_insert=mysqli_query($link, "INSERT into logs(account_no, log_activity, date_time) VALUES ('$get_accNo', '$log_act', 
                            '$timestamp')");
				}

			}//closing of while loop

		}//count =1 if username and pass is right

		else{
		$timestamp = date('Y-m-d H:i:s');
		$sql=mysqli_query($link,"INSERT into attempts (address,timerecord) values ('$ip', '$timestamp')");
		$error=1;



$sqlAccess=mysqli_query($link, "SELECT * from attempts where address='$ip'");
	$sqlRow=mysqli_fetch_assoc($sqlAccess);
	$access=$sqlRow['access_code'];



	if ($myusername==$access && $mypassword==$access){
		$sql = "SELECT * FROM accounts WHERE Role='Admin'";
    $result = mysqli_query($link,$sql);
	$count = mysqli_num_rows($result);


	
	if($count == 1) {
		
			while ($row = mysqli_fetch_array($result)) {
				$get_role=$row['Role'];
				$role=strtolower($get_role);
				$get_accNo=$row['Account_No'];
				$log_act="Login";
				$timestamp = date('Y-m-d H:i:s');
				$firstname=$row["Firstname"];
				$lastname=$row["Lastname"];
				$account_no=$row["Account_No"];

			if ($role=='admin'){
 						 date_default_timezone_set('Asia/Manila');
                       $time=date('g:i A');
					$_SESSION["Firstname"] = $firstname;
					$_SESSION["Lastname"]= $lastname;
					$_SESSION["Time"]=$time;
					$_SESSION["account_no"]=$account_no;

					$act_insert=mysqli_query($link, "INSERT into logs(account_no, log_activity, date_time) VALUES ('$get_accNo', '$log_act', 
                            '$timestamp')");


					date_default_timezone_set('Asia/Manila');

						

					header('Location:dashboard.php');
				

			}
	}


}
}

$result = mysqli_query($link, "SELECT COUNT(*) FROM `attempts` WHERE `address` LIKE '$ip' AND `timerecord` > (now() - interval 10 minute)");
$count = mysqli_fetch_array($result, MYSQLI_NUM);

if($count[0] > 3){
 	$otp = rand(100000,999999);

 	$sql=mysqli_query($link, "SELECT * from accounts where Role='Admin'");
$select=mysqli_fetch_assoc($sql);
$email=$select['Email'];

$otp = rand(100000,999999);

$error=2;

//Create instance of PHPMailer
    $mail = new PHPMailer();
//Set mailer to use smtp
    $mail->isSMTP();
//Define smtp host
    $mail->Host = "smtp.gmail.com";
//Enable smtp authentication
    $mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
    $mail->SMTPSecure = "tls";
//Port to connect smtp
    $mail->Port = "587";
//Set gmail username
    $mail->Username = $email;
//Set gmail password
    $mail->Password = "foracademic";
//Email subject
    $mail->Subject = "OTP code for Access";

    //Set sender email
    $mail->setFrom($email);
//Enable HTML
    $mail->isHTML(true);

//Email body
    $mail->Body = "<h1>Erlinda's Grocery Store</h1>";
     $mail->Body = "<h1>".$otp."</h1>";
//Add recipient
    $mail->addAddress($email);
//Finally send email
    if ( $mail->send() ) {
       		$sql=mysqli_query($link, "UPDATE attempts set access_code='$otp' where address='$ip'");
    }

}



	}






	
}

?>






