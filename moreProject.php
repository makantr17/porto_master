<?php
     include "dbconnect.php";
    

    //  Query all the gallery info
    $sql = "SELECT * FROM `project`  "; 
    $result= mysqli_query($db, $sql); 
    $allInGallery= mysqli_fetch_all($result, MYSQLI_ASSOC); 
    
?>

<?php  session_start();  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="HomeStyle.css"> -->
	<link rel="stylesheet" type="text/css" href="styleit.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    
</head>



<body>
       
        <!-- All images click on goes here -->
        <div id="moreAboutProject" style="display:block" class="allFromProject">
            <?php include "popUp.php"; ?>
           
        </div>

</body>