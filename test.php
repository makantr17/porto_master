<?php
session_start();

    if(isset($_POST['submit'])){
        $takeourIndex = $_POST['indeType'];
        if ($takeourIndex == '') {
            echo "wrong input";
        }else {
            $_SESSION["projectID"] = $takeourIndex;
            header("location: moreProject.php");
            echo $_SESSION["projectID"];
        }
    }
?>
