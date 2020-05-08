<?php
    include "dbconnect.php";

    if (isset($_POST['submit'])) {
       $projectName = $_POST['proName'];
       $description = $_POST['description'];
       $details = $_POST['details'];
       $startDate = $_POST['start'];
       $expected = $_POST['expected'];
      //  $cover = $_POST['Addfiles'];
       $root = $_POST['root'];
       $status = 'Unstarted';
       $taskList = $_POST['taskList'];
       $required = $_POST['requiredFor'];
       $lastProject = "SELECT * from `project`";
       $resultPro= mysqli_query($db, $lastProject); 
       $fetchPro= mysqli_fetch_all($resultPro, MYSQLI_ASSOC);
       $lastIndex = sizeof($fetchPro);


       $filename = $_FILES['Addfiles']['name'];
       // echo $filename;

       $destination = 'C:\xampp\htdocs\porto-master\icons/' . $filename;
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       $file = $_FILES['Addfiles']['tmp_name'];
       $size = $_FILES['Addfiles']['size'];

       if(!in_array($extension, ['zip', 'pdf', 'jpg', 'png', 'docx'])){
           echo 'you file extension must be .zip, .jpg, .png, .jpeg .pdf or .docx'; 
       }elseif($_FILES['Addfiles']['size'] > 1000000) {
           echo "File too large!";
       }else{
           if(move_uploaded_file($file, $destination)){
               // $sql = "INSERT INTO files(name, size, downloads) VALUES('$filename', $size, 0)";
               $sql = "INSERT INTO `project`(`projectID`, `Name`, `published`, `expected`, `taskList`, `requiredForTask`, 
               `root`, `status`, `description`, `coverImage`, `sharableId`)
               VALUES ('$lastIndex', '$projectName', '$startDate', '$expected', '$taskList', '$required',
               '$root', '$status', '$description', '$filename', '$lastIndex')"; 
               if(mysqli_query($db, $sql)){
                   echo "File uploaded successfully";

                  
                   // $result= mysqli_query($db, $sql); 
                   // echo $sql;
                   header("location: userPage.php");
                   


               }
           }
           else {
               echo "Failed to upload file.";
           }
       }

    //    echo $sql;
       header("location: userPage.php");
    }





?>