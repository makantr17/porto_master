
<?php 
 include "dbconnect.php";

$likes = isset($_POST['actualNum']) ? $_POST['actualNum']: '' ;
$id = isset($_POST['id']) ? $_POST['id']: '' ;



if ($likes == '' or $id == '') {
     header("location: galleryPage.php");
}  else {
    $count = $likes + 1;
    $myInser = "UPDATE `gallery` SET `gallery`.`liked` = '$count'  where `gallery`.`id` = '$id' "; 
    $theRw= mysqli_query($db, $myInser); 
    header("location: galleryPage.php");
}


?>