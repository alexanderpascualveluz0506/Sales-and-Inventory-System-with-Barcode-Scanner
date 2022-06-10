<?php
    include 'codes/functions/login_function.php';
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Alegreya Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="codes/design/login_style.css">
       <link rel="shortcut icon" href="assets/images/remove8.png" type="image/x-icon" />
    <title>Erlinda's Grocery</title>
</head>

<body style="background-color:#f0f2f5">
   <form action="" id="myform" method="POST">
    <div class="div-back">
            
        <br>
           <center> <img src="assets/images/remove6.png" class="logo" ></center>
          
        

                <center>
                    <span class="store-name" style="padding-bottom: 40px; font-size: 14px;padding-top: 10px; font-family:arial;">
                    <center><span class="store-name" style="padding-bottom: 40px;">ERLINDA'S GROCERY</span></center>        
                    Sales and Inventory Management System</span></center>
      
           <?php if ($error==1) {
                echo "<div style='float:center;text-align:center' class='error_field' style='margin-top:10px'>";
                echo "<span>Wrong Credentials</span>";
                echo '<br>';
                echo "<span>Account Does not Exists</span>";
                echo "</div>";
            } if ($error==2){
                 echo "<div style='float:center;text-align:center' class='error_field' style='margin-top:10px'>";
                echo "<span>Check your Email</span>";
                echo '<br>';
                echo "<span>Use the Code as temporary username and password</span>";
                echo "</div>";
            }



            ?>
            <div style="margin-top: 30px;">
                    <center>                    <input class="form-control" type="text" placeholder="USERNAME" id="input1" name="username" required>
                    <input class="form-control" type="password" placeholder="PASSWORD" id="input2" name="password" required></center>

                    <center><button class="login" onclick="validate();">LOGIN</button></center>
            </div>

            <br>
            
        
            
    </div>
    </form>
</body>
</html>




