<?php
     include "dbconnect.php";
    

    //  Query all the gallery info
    $sql = "SELECT * from `portofolio`.users"; 
    $result= mysqli_query($db, $sql); 
    $allInUser= mysqli_fetch_all($result, MYSQLI_ASSOC); 

    // $query = "SELECT  MAX(`gallery`.`liked`) from `gallery` limit 2";
    // $result1= mysqli_query($db, $query); 
    // $topLiked= mysqli_fetch_all($result1, MYSQLI_ASSOC); 

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="HomeStyle.css"> -->
	<link rel="stylesheet" type="text/css" href="stylesheet1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    
</head>



<body>

        <div class="commonSlider">
            <h1>Community</h1>
        </div>
          <!-- nav bar -->
        <?php include 'navBar.php'; ?>

        <div class="allInCommunity">
            <div class="listOfMember">
                <!-- list all members here -->
                <?php foreach ($allInUser as $keyUser) { ?>

                <div class="users">
                     <div id="profile">
                         <img  src= <?php echo '/porto-master/icons/'.$keyUser['image']; ?> >
                         <p><?php echo $keyUser['userName']; ?></p>
                         <button>Follow</button>
                     </div>
                     <div id="skills">
                         <p><?php echo $keyUser['profession']; ?></p>
                         <p><?php echo $keyUser['preferedTask']; ?></p>
                         
                     </div>
                </div>

                <?php } ?>

            </div>

            
            <div class="infoBrowse">
                <h1>Search </h1>
                <div>
                    <input type="search">
                    <input type="submit" value='Search'>
                </div>
                <p>Find all community members and follow them to receive all new projects from
                    the users</p>

                <img src="">
                
                

            </div>



        </div>






</body>