<?php
include 'connection.php';

$link = mysqli_connect("localhost", "root", "", "store");

define('TIMEZONE', 'Asia/Manila');
date_default_timezone_set(TIMEZONE);

global $january,$february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december;
$sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='January' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
           $january=$row['sale'];
     }
    }
    
$sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='February' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
           $february= $row['sale'];

        }
    }

$sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='March' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
            $march= $row['sale'];
     }
    }

$sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='April' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
            $april= $row['sale'];

        }
    }

$sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='May' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
            $may= $row['sale'];

        }
    }

$sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='June' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
           $june=$row['sale'];

        }
    }

$sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='July' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
          $july=$row['sale'];

        }
    }

    $sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='August' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
           $august=$row['sale'];

        }
    }

    $sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='September' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
           $september= $row['sale'];

        }
    }

    $sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='October' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
            $october=$row['sale'];

        }
    }

    $sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='November' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
            $november= $row['sale'];

        }
    }

    $sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where monthname(payment_date)='December' and YEAR(payment_date) = YEAR(CURDATE())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
            $december=$row['sale'];

        }
    }



  $sql= mysqli_query($link,"SELECT sum(total)  as sale from sales where DAYNAME(payment_date)='MONDAY' and YEARWEEK(payment_date) = YEARWEEK(NOW())");

if ($sql->num_rows>0){
    while ($row= $sql->fetch_assoc()) {
           $monday= $row['sale'];
           if (empty($monday)){
            $monday=0;
           }
        }
    }

  $sql1= mysqli_query($link,"SELECT sum(total)  as sale from sales where DAYNAME(payment_date)='TUESDAY' and YEARWEEK(payment_date) = YEARWEEK(NOW())");

if ($sql1->num_rows>0){
    while ($row1= $sql1->fetch_assoc()) {
           $tuesday=$row1['sale'];
             if (empty($tuesday)){
            $tuesday=0;
          }

        }
    }
  $sql2= mysqli_query($link,"SELECT sum(total)  as sale from sales where DAYNAME(payment_date)='WEDNESDAY' and YEARWEEK(payment_date) = YEARWEEK(NOW())");

if ($sql2->num_rows>0){
    while ($row2= $sql2->fetch_assoc()) {
           $wednesday= $row['sale'];
             if (empty($wednesday)){
            $wednesday=0;
          }

        }
    }

      $sql3= mysqli_query($link,"SELECT sum(total)  as sale from sales where DAYNAME(payment_date)='THURSDAY' and YEARWEEK(payment_date) = YEARWEEK(NOW())");

if ($sql3->num_rows>0){
    while ($row3= $sql3->fetch_assoc()) {
           $thursday=$row['sale'];
             if (empty($thursday)){
            $thursday=0;
          }

        }
    }
  $sql4= mysqli_query($link,"SELECT sum(total)  as sale from sales where DAYNAME(payment_date)='FRIDAY' and YEARWEEK(payment_date) = YEARWEEK(NOW())");

if ($sql4->num_rows>0){
    while ($row4= $sql4->fetch_assoc()) {
          $friday=$row4['sale'];

          if (empty($friday)){
            $friday=0;
          }

        }
    }

  $sql5= mysqli_query($link,"SELECT sum(total)  as sale from sales where DAYNAME(payment_date)='SATURDAY' and YEARWEEK(payment_date) = YEARWEEK(NOW())");

if ($sql5->num_rows>0){
    while ($row5= $sql5->fetch_assoc()) {
           $saturday= $row5['sale'];

        }
    }



  $sql6= mysqli_query($link,"SELECT sum(total) as sale from sales where YEARWEEK(payment_date) = YEARWEEK(NOW())");

if ($sql6->num_rows>0){
    while ($row6= $sql6->fetch_assoc()) {
           $sunday=$row6['sale'];
  if (empty($sunday)){
            $sunday=0.00;
          }

           

        }
    }


?>