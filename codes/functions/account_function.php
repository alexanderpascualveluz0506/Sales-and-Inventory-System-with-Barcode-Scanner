<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'connection.php';

function showTable(){

include 'connection.php';
$sql= "SELECT `Account_No`, `Firstname`, `Lastname`, `Contact_No`, `Email`, `Username`, `Password`, `Role`,`Address` FROM `accounts`";
$result= $link->query($sql);

if ($result->num_rows >0){
    while ($row= $result->fetch_assoc()) {
        $name=$row['Firstname'];
        $name2=$row['Lastname'];

        echo "
        <tr row_id='". $row['Account_No']."'>
       
        

        <td data-label='Account_No' scope='row'>".$row['Account_No']."</td></td>"
        ."<td data-label='Name'>" .$row['Lastname']." ".$row['Firstname']. "</td>"
        ."<td data-label='Email' >".$row['Email']. "</td>". "<td data-label='Contact_No'>".$row['Contact_No']."</td>". "<td data-label='Username'>".$row['Username']. "</td>"
        ."<td data-label='Role'>". $row['Role']. "</td>
          <td>
          
          <a href='' data-toggle='modal' data-target='#accounts' class='view' data-account=".$name." data-last=".$name2." data-no=".$row['Account_No']." data-email=".$row['Email']." data-contact=".$row['Contact_No']." data-address='".$row["Address"]."'> <button id='edit-button' class='btn btn-success'><i class='ti-pencil' style='margin-left:-7px; font-size:18px;'></i></button></a>
          
          <a href='' data-toggle='modal' data-target='#modal-delete' data-id=".$row["Account_No"].">
           <button type='button' class='btn btn-danger' id='delete-button' ><i class='ti-trash'  style='margin-left:-7px; font-size:18px;'></i></button></a>
          


          </td>
        "

        ;
    }

    echo"</table>";
    }
   
}

$email_admin = isset($_REQUEST['email_admin'])?$_REQUEST['email_admin']:"";

if($email_admin==1){



    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';


$sql=mysqli_query($link, "SELECT * from accounts where Role='Admin'");
$select=mysqli_fetch_assoc($sql);
$email=$select['Email'];

$otp = rand(100000,999999);


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
    $mail->Subject = "OTP code for Account Update";
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
       
    }else{
    
    }

     echo '
            <input type="hidden" id="otp-value" value='.$otp.'>
        ';
//Closing smtp connection
    $mail->smtpClose();
 
}
$otp_value = isset($_REQUEST['otp_value'])?$_REQUEST['otp_value']:"";
$otp_input = isset($_REQUEST['otp_input'])?$_REQUEST['otp_input']:"";
$account_no = isset($_REQUEST['account_no'])?$_REQUEST['account_no']:"";
if (!empty($otp_value)){
if ($otp_input==$otp_value){
    $sql=mysqli_query($link, "SELECT * from accounts where Account_No='$account_no'");
    $row=mysqli_fetch_assoc($sql);
    $account_no=$row['Account_No'];

    if ($account_no==1){
        echo '
        <tr class="hide-account">
                                <td>Username</td>
                                <td id="username-td"><input type="text" class="form-control" 
                                value="'.$row["Username"].'" id="username-input"></td>

                            </tr>

                            <tr class="hide-account-old-pass">
                                <td>Password</td>
                                <td id="password"><a href="#" id="change-password">Change Password</a>
                                </td>

                            </tr>

                               <tr class="hide-account-password" style="display:none">
                                <td>New Password</td>
                                <td><input type="password" class="form-control " id="new-password">
                               </td>

                            <tr class="hide-account-password" style="display:none">
                                <td>Confirm Password</td>
                                <td><input type="password" class="form-control" id="confirm-password">
                                 <span id="message"></span>
                             </td>
                            </tr


                            <tr class="hide-account">
                                <td>Role</td>
                                <td><select class="form-control" id="role-select" name="role-input" required>
                                    <option selected>Choose...</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Cashier">Cashier</option>
                            </select></td>

                            </tr>

                             <tr class="hide-account-time" style="display:none">
                                <td>Login Start Time</td>
                                <td> <input type="time" class="form-control" id="start-time-input" value="'.$row["start"].'">
                               </td>

                            </tr>

                         


                            <tr class="hide-account-time"  style="display:none">
                                <td>Login End Time</td>
                                <td>
                                  <input type="time" class="form-control" id="end-time-input" value="'.$row["end_time"].'">
                                </td>

                            </tr>

                            <tr class="hide-account">
                                <td>Ip Address</td>
                                <td>
                                <input type="text" class="form-control" 
                                value="'.$row["IP_address"].'" id="ipaddress-input">
                                </td>

                            </tr>

                            <tr class="hide-account">
                                <td>Device Name</td>
                                <td>
                                 <input type="text" class="form-control" 
                                value="'.$row["device_name"].'" id="device-input">
                                </td>

                            </tr>

    ';
    }else{

echo '
        <tr class="hide-account">
                                <td>Username</td>
                                <td id="username-td"><input type="text" class="form-control" 
                                value="'.$row["Username"].'" id="username-input"></td>

                            </tr>

                            <tr class="hide-account-old-pass">
                                <td>Password</td>
                                <td id="password"><a href="#" id="change-password">Change Password</a>
                                </td>

                            </tr>

                               <tr class="hide-account-password" style="display:none">
                                <td>New Password</td>
                                <td><input type="password" class="form-control " id="new-password">
                               </td>

                            <tr class="hide-account-password" style="display:none">
                                <td>Confirm Password</td>
                                <td><input type="password" class="form-control" id="confirm-password">
                                 <span id="message"></span>
                             </td>
                            </tr


                            <tr class="hide-account">
                                <td>Role</td>
                                <td><select class="form-control" id="role-select" name="role-input" required>
                                    <option selected>Choose...</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Cashier">Cashier</option>
                            </select></td>

                            </tr>

                             <tr class="hide-account-time" style="display:none">
                                <td>Login Start Time</td>
                                <td> <input type="time" class="form-control" id="start-time-input" value="'.$row["start"].'">
                               </td>

                            </tr>

                         


                            <tr class="hide-account-time" style="display:none">
                                <td>Login End Time</td>
                                <td>
                                  <input type="time" class="form-control" id="end-time-input" value="'.$row["end_time"].'">
                                </td>

                            </tr>

                            <tr class="hide-account">
                                <td>Ip Address</td>
                                <td>
                                <input type="text" class="form-control" 
                                value="'.$row["IP_address"].'" id="ipaddress-input">
                                </td>

                            </tr>

                            <tr class="hide-account">
                                <td>Device Name</td>
                                <td>
                                 <input type="text" class="form-control" 
                                value="'.$row["device_name"].'" id="device-input">
                                </td>

                            </tr>

    ';
}


}

}


$lastname = isset($_REQUEST['lastname'])?$_REQUEST['lastname']:"";
$firstname = isset($_REQUEST['firstname'])?$_REQUEST['firstname']:"";
$email = isset($_REQUEST['email'])?$_REQUEST['email']:"";
$contact = isset($_REQUEST['contact'])?$_REQUEST['contact']:"";
$address = isset($_REQUEST['address'])?$_REQUEST['address']:"";
$account_no = isset($_REQUEST['account_no'])?$_REQUEST['account_no']:"";

if (!empty($account_no) && !empty($email)){
    $sql=mysqli_query($link, "UPDATE accounts set Firstname='$firstname', Lastname='$lastname', Contact_No='$contact', Email='$email', Address='$address' where Account_No='$account_no'");
}


$username1 = isset($_REQUEST['username'])?$_REQUEST['username']:"";
$new_password = isset($_REQUEST['new_password'])?$_REQUEST['new_password']:"";
$role = isset($_REQUEST['role'])?$_REQUEST['role']:"";
$start = isset($_REQUEST['start'])?$_REQUEST['start']:"";
$end=isset($_REQUEST['end'])?$_REQUEST['end']:"";
$ipaddress=isset($_REQUEST['ipaddress'])?$_REQUEST['ipaddress']:"";
$device=isset($_REQUEST['device'])?$_REQUEST['device']:"";
$firstname=isset($_REQUEST['firstname'])?$_REQUEST['firstname']:"";

if (!empty($username1)){

        $first = explode(' ', trim($firstname))[0];

      $sql=mysqli_query($link, "UPDATE accounts set Username='$username1', Role='$role',IP_address='$ipaddress', 
        device_name='$device' where Firstname='$first'");
}


?>





<script type="text/javascript">
    function add_new_account(){
        window.location.href="connection.php";
    }




</script>