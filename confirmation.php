<?php
  session_start();
  include "dbconnect.php";



  if (isset($_POST['submit'])) {
 
    echo $email =  $_POST['email'];
    echo $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `email` = '$email' and `password` = '$password' limit 1";
    $result= mysqli_query($db, $sql); 
    $fetchIfExist = mysqli_fetch_all($result, MYSQLI_ASSOC); 

    // echo sizeof($fetchIfExist);

    if (sizeof($fetchIfExist) == 0) {
        header("location: login.php");
    }else{
        foreach ($fetchIfExist as $keyFetch) {
            $_SESSION['uniqueUserID'] = $keyFetch['id'];
        }
        // echo "successfully loged";
        // echo  $keyFetch['id'];
        header("location: userPage.php");
    }

}



?>