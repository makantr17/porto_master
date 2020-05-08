<?php
  
     include "dbconnect.php";
    

    //  Query all the gallery info
    $sql = "SELECT * FROM `project`  "; 
    $result= mysqli_query($db, $sql); 
    $allInGallery= mysqli_fetch_all($result, MYSQLI_ASSOC); 
    $_SESSION["projectID"] = 0;
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
       
        <!-- All images click on goes here -->
        <div id="moreAboutProject" style="display:none" class="allFromProject">
             <p>Hello I ame ekljpger;l</p>
        </div>


        <div class="commonSlider">
            <h1>Projects</h1>
        </div>
        <!-- include the navbar -->
        <?php include 'navBar.php'; ?>
        
        <!-- project board start here -->
        <div class="projectBoard">

             <?php foreach ($allInGallery as $projectCateg) {
                 ?>
              <div id="<?php echo "projectContent".$projectCateg['projectID']; ?>" class="sampleProject">
                    
                    <div class="ProjectHeader">
                         <h1><?php echo $projectCateg['Name']; ?></h1>
                         <!-- <img src="/PORTO-MASTER/icons/icon/addMe.png"> -->
                         <form method="Post" action="test.php">
                              <input style="display:none" type="number" name="indeType" >
                              <input style="background-color: rgb(243, 243, 243); border:0px; padding:5px; float:right" type="submit" value="more" name="submit">
                         </form>
                        
                    </div>
                    <img id="imageBoardP" src="<?php echo '/PORTO-MASTER/icons/'.$projectCateg['coverImage']; ?>" >
                    <div class="ProjectFooter">
                        <div class="statusProfile">
                            <p><i>Status</i> <?php echo $projectCateg['status']; ?></p>
                            <?php
                            //  Query root info
                                $rootId= $projectCateg['root'];
                                $rootQuery = "SELECT * from `portofolio`.users where `users`.`id`= '$rootId' "; 
                                $resultRoot= mysqli_query($db, $rootQuery); 
                                $fetchRoot= mysqli_fetch_all($resultRoot, MYSQLI_ASSOC); 
                            ?>
                            <?php foreach ($fetchRoot as $keyroot) { ?>
                                 <img src="<?php echo '/PORTO-MASTER/icons/'.$keyroot['image']; ?>">
                            <?php } ?>
                        </div>
                        <div class="publishedInfo">
                            <?php 
                                 $arrayLists = explode('/', $projectCateg['requiredForTask']);
                                 $addingTo = 0;
                                 foreach ($arrayLists as $keyCount) {
                                    $addingTo = $addingTo + $keyCount;
                                 } 
                            ?>
                            <p><?php echo 'Published: '.$projectCateg['published'].'; expected: '.$projectCateg['expected'].'; Contributors: '.$addingTo; ?></p>
                            <h3><?php echo $projectCateg['taskList']; ?></h3>
                        </div>
                    </div>
              </div>
            
             <?php } ?>


        </div>

        
       






        <!-- Gallery Scripts -->
        <script>

                var myContent =document.querySelectorAll(".projectBoard");
                var myArray = myContent[0].children;
                var indexVal = 0;
                for (let index = 0; index < myArray.length; index++) {
                    if( myArray[index].children[0].children[1].onclick = () =>{
                        myArray[index].children[0].children[1][0].value = index;
                    });
                    
                }

              
                
                



                document.querySelector(".publishedGallery div ul").onmouseover = ()=>{
                    document.querySelector(".publishedGallery div ul").children[0].style.display="block";
                }
                document.querySelector(".publishedGallery div ul").onmouseleave = ()=>{
                    document.querySelector(".publishedGallery div ul").children[0].style.display="none";
                }



             
                   
                

                
                function closeBox(){
                    document.getElementById("moreAboutProject").style.display="none";
                }
                function expandBox(){
                    document.getElementById("moreTohere").style.width="100%";
                    document.getElementById("moreTohere").style.margin="0px";
                    document.getElementById("moreTohere").style.left="0px";
                }
                function reduceBox(){
                    document.getElementById("moreTohere").style.width="70%";
                    document.getElementById("moreTohere").style.margin="0px";
                    document.getElementById("moreTohere").style.left="15%";
                }
            </script>

                






</body>