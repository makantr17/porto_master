<?php
include "dbconnect.php";

if (isset($_POST['submit'])) {
    
    $prefered = $_POST['prefered'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    // $cv = $_FILES['uploadCV'];
    $address = $_POST['address'];
    $profession = $_POST['profession'];
    $phone = $_POST['phone'];
    $detail = $_POST['details'];


   
   $sql1 = "SELECT * FROM `users`";
   $result= mysqli_query($db, $sql1); 
   $fetchIfExist = mysqli_fetch_all($result, MYSQLI_ASSOC); 
   
   $confirm = false;
   // echo sizeof($fetchIfExist);
   foreach ($fetchIfExist as $keyFetch) {
       if ($keyFetch['email'] == $email || $keyFetch['password'] == $password) {
           $confirm = true;
       }
   }

   if ($confirm == true) {
       header("location: registration.php");
   }else{
        
    
        $filename = $_FILES['cover']['name'];
        // echo $filename;

        $destination = 'C:\xampp\htdocs\porto-master\icons/' . $filename;
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file = $_FILES['cover']['tmp_name'];
        $size = $_FILES['cover']['size'];

        if(!in_array($extension, ['jpg', 'png', 'jpeg'])){
            echo 'you file extension must be  .jpg, .png, .jpeg '; 
        }elseif($_FILES['cover']['size'] > 1000000) {
            echo "File too large!";
        }else{
            if(move_uploaded_file($file, $destination)){
                
                // start CV
                    $cvname = $_FILES['uploadCV']['name'];
                   
                    $destinationCV = 'C:\xampp\htdocs\porto-master\icons/' . $cvname;
                    $extensionCV = pathinfo($cvname, PATHINFO_EXTENSION);
                    $fileCV = $_FILES['uploadCV']['tmp_name'];
                    // $sizeCV = $_FILES['uploadCV']['size'];

                    if(!in_array($extensionCV, ['jpg', 'png', 'jpeg'])){
                        echo 'you file extension must be  .jpg, .png, .jpeg '; 
                    }elseif($_FILES['uploadCV']['size'] > 1000000) {
                        echo "File too large!";
                    }else{
                        if(move_uploaded_file($fileCV, $destinationCV)){
                            
                           $id = sizeof($fetchIfExist);

                            // $sql = "INSERT INTO files(name, size, downloads) VALUES('$filename', $size, 0)";
                           $sql = "INSERT INTO `users`(`id`, `userName`, `email`, `password`, `address`, `profession`, `country`, `city`, `image`, `CV`, `accepted`,
                             `aboutme`, `preferedTask`) 
                            VALUES ('$id', '$name', '$email', '$password', '$address', '$profession', '$country', '$city', '$filename', '$cvname', 'false',
                            '$detail', '$prefered')"; 

                            echo $sql;
                            if(mysqli_query($db, $sql)){
                                echo "File uploaded successfully";
                                header("location: homePage.php");
                            }
                        }else {
                            echo "Failed to upload file.";
                        }
                        // header("location: userPage.php");

                    }

                    // header("location: homePage.php");
            }

        // close else
        }
    }
}



?>