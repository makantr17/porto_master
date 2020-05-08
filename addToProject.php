<!-- Add user to aproject -->
<?php
session_start();
    include "dbconnect.php";
    
    if (isset($_POST['subJoined'])) {
        
      echo  $user = $_POST['userInput'];
      echo  $projectID = $_POST['protoID'];
      echo  $sharableID= $_POST['shaID'];
      echo  $nameTask= $_POST['nameTask'];  

      $lastIndex = "SELECT * FROM `collaborators`"; 
      $resultIndex = mysqli_query($db, $lastIndex); 
      $fetchIndex= mysqli_fetch_all($resultIndex, MYSQLI_ASSOC);
      $collabID =0;
      foreach ($fetchIndex as $last) {
        $collabID = $collabID + 1;
      }
      

      $proForm = "SELECT * FROM `expectation` where `taskName` = '$nameTask' limit 1 "; 
      $resultForm= mysqli_query($db, $proForm); 
      $allproForm= mysqli_fetch_all($resultForm, MYSQLI_ASSOC);
      foreach ($allproForm as $keytask) {
        $taskID = $keytask['taskID'];
      }
        if ($nameTask == 'Choise available Task') {
            header("location: userPage.php");
            echo "select again";
        }else{
            
            $sql ="INSERT INTO `collaborators`(`collabID`,`projectID`, `taskID`, `sharableId`, `userId`)
             VALUES('$collabID', '$projectID', ' $taskID', '$sharableID', '$user')" ;
            $resultSql= mysqli_query($db, $sql); 
            echo "successfully added";
            $_SESSION['popUp'] = 'none';
            header("location: userPage.php");
        }

    }

?>