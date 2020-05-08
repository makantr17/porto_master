<?php
    include "dbconnect.php";
    if (isset($_POST['submit'])) {
       $comment = $_POST['comment'];
       $date = $_POST['date'];
    //    $file = $_POST['file'];
       $projectID = $_POST['projectID'];
       $user = $_POST['userID'];
       $assignTo = $_POST['assigned'];
        
       $sqlUsers = "SELECT * from `users`";
       $resultUsers= mysqli_query($db, $sqlUsers); 
       $allUsers= mysqli_fetch_all($resultUsers, MYSQLI_ASSOC); 

       $shared= "SELECT * from `sharable`";
       $resultShare= mysqli_query($db, $shared); 
       $allShared= mysqli_fetch_all($resultShare, MYSQLI_ASSOC); 
       $lastID= sizeof($allShared);
       


       $count = '';
       $exploder = explode('/', $assignTo);
       for ($i=0; $i < sizeof($exploder); $i++) { 
           foreach ($allUsers as $keyValue) {
               if ($keyValue['email'] == $exploder[$i]) {
                   if ($i == 0) {
                       $count =$keyValue['id'];
                   }else{
                       $count = $count.'/'.$keyValue['id'];
                   }
                   
               }
           }
       }

    //   upload files;

    $linkAllFiles = '';
    $mfileName = array_filter($_FILES['file']['name']);
    echo $total = count($_FILES['file']['name']);
    if ($total > 5) {
        echo "maximum files is 5";
        header("location: userPage.php");
    }else{
        
        // loop
        for ($i=0; $i < $total ; $i++) { 
            # code...
            $nameMultiple =$_FILES['file']['name'][$i];
            $destina = 'C:\xampp\htdocs\porto-master\icons/' . $nameMultiple;
            $extens = pathinfo($nameMultiple, PATHINFO_EXTENSION);
            $tmpFilePath = $_FILES['file']['tmp_name'][$i];
            $tmpSize = $_FILES['file']['size'][$i];

            if(!in_array($extens, ['jpg','pdf', 'docx', 'skp', 'png'])){
                echo 'you file extension must be .zip, .skp, .jpg, .png, .jpeg .pdf or .docx'; 
            }elseif($tmpSize > 1000000) {
                echo "File too large!";
            }else{
                if(move_uploaded_file( $tmpFilePath, $destina)){
                    if ($i == 0) {
                        $linkAllFiles = $nameMultiple;
                    }else{
                        $linkAllFiles = $linkAllFiles.'/'.$nameMultiple;
                    }
                     echo "successfully uploaded";
                }
            }

        }

    }

    $sql ="INSERT INTO `sharable`(`id`, `accessedBy`, `projectId`, `ressources`, `sharedDate`, `userThatShared`, `Comment`, `sharedID`) 
    VALUES('$lastID', '$count', '$projectID', '$linkAllFiles', '$date', '$user', '$comment', '$projectID') ";
    $theRw= mysqli_query($db, $sql); 
    header("location: userPage.php");
}



?>