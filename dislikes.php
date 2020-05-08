
<?php 
 include "dbconnect.php";

$dislikes = isset($_POST['actualNum']) ? $_POST['actualNum']: '' ;
$id = isset($_POST['id']) ? $_POST['id']: '' ;



if ($dislikes == '' or $id == '') {
     header("location: galleryPage.php");
}  else {
    $count = $dislikes + 1;
    $myInser = "UPDATE `gallery` SET `gallery`.`disliked` = '$count'  where `gallery`.`id` = '$id' "; 
    $theRw= mysqli_query($db, $myInser); 
    header("location: galleryPage.php");
}


?>