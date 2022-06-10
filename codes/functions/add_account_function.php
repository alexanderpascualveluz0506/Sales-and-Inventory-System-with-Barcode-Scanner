<?php
include 'connection.php';
session_start();  

 if($_SERVER["REQUEST_METHOD"] == "POST") {
 	$firstname=$_POST["firstname-input"];
 	$lastname=$_POST['lastname-input'];
 	$email=$_POST['email-input'];
 	$contact=$_POST['contact-input'];
 	$address=$_POST['address-input'];
 	$username=$_POST['username-input'];
 	$password=$_POST['password-input'];
 	$pass_again=$_POST['pass-again'];
 	$ipaddress=$_POST['ipaddress-input']; 	
 	$role=$_POST['role-input'];
 	
 	

if (isset($_POST['save_account'])){
	 

	$sql= "INSERT INTO accounts ( `Firstname`, `Lastname`, `Contact_No`, `Email`, `Username`, `Password`, `Role`, `Address`, `IP_address`) VALUES ('$firstname', '$lastname', '$contact', '$email',
	'$username', '$password', '$role', '$address','$ipaddress', )";

				if ($link->query($sql) === TRUE) {
                      
                } else {
                            echo "Error: " . $sql . "<br>" . $link->error;
                }
}
}
?>

<script type="text/javascript">
      function check() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
   
    function new_employee(){
         window.location.href = "add_account.php";
    }

     function readURL(input) {

            if (input.files && input.files[0]) {
                 var reader = new FileReader();
              
                reader.onload = function (e) {
                    $('#blah').html('');
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(190)
                        .height(165);
                };
                

                reader.readAsDataURL(input.files[0]);
                   var files = event.target.files
                 var filename = files[0].name
              
            }      
        }

      </script>

