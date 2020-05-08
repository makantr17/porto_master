
<?php 
 include "dbconnect.php";

$follows = isset($_POST['actualNum']) ? $_POST['actualNum']: '' ;
$id = isset($_POST['id']) ? $_POST['id']: '' ;



if ($follows == '' or $id == '') {
     header("location: galleryPage.php");
}  else {
    $count = $follows + 1;
    $myInser = "UPDATE `gallery` SET `gallery`.`follows` = '$count'  where `gallery`.`id` = '$id' "; 
    $theRw= mysqli_query($db, $myInser); 
    header("location: galleryPage.php");
}


?>