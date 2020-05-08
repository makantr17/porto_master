<?php

    include "dbconnect.php";

     
    if (isset($_POST['submit'])) {

        $listId = explode('/', $_POST['forDelete']);
       
        for ($i=1; $i < sizeof($listId) ; $i++) { 
            // echo $listId[$i];
            $idIndex = $listId[$i];
            $sql = "DELETE FROM `gallery` WHERE `id` = '$idIndex' ";
            $result = mysqli_query($db, $sql); 
            // echo $sql.'<br>';
        }

        header("location: userPage.php");
        
         
    }



?>