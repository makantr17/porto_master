<?php 
session_start();
    if (isset($_POST['join'])) {
            $valueId = $_POST['joinID'];
            $userId = $_POST['userID'];
            $popUp = $_POST['popUp'];
            if ($valueId == '') {
                return "wrong project";
            }else{
                $_SESSION['idProject'] = $valueId;
                $_SESSION['popUp'] = 'block';
                $_SESSION['inputID'] = $userId;
                header("location: userPage.php");
            }
    }
?>