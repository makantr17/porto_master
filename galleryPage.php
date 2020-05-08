<?php
     include "dbconnect.php";
    

    //  Query all the gallery info
    $sql = "SELECT * from `portofolio`.gallery"; 
    $result= mysqli_query($db, $sql); 
    $allInGallery= mysqli_fetch_all($result, MYSQLI_ASSOC); 

    // $query = "SELECT  MAX(`gallery`.`liked`) from `gallery` limit 2";
    // $result1= mysqli_query($db, $query); 
    // $topLiked= mysqli_fetch_all($result1, MYSQLI_ASSOC); 

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="HomeStyle.css"> -->
	<link rel="stylesheet" type="text/css" href="stylesheet2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    
</head>



<body>
       
        <!-- All images click on goes here -->
        <div id="moreTohere" class="moreHere" >
            <!-- header info -->
                             
        </div>

        <div class="commonSlider">
            <h1>Gallery</h1>
        </div>

        <!-- include the navbar -->
        <?php include 'navBar.php'; ?>

        <!-- list of the elemetns -->
        <div class="dataViews">
        <?php  
            $topl = 0;
            // foreach ($allInGallery as $topLiked) {
            //     $topl =  $topLiked['liked'];
            // }
            
            $followed = 0;
            $liker = 0;
            $disliker=0;
            $numberInGall = 0;
            
            foreach ($allInGallery as $categore) {
                $numberInGall = $numberInGall + 1;
                $followed = $followed + $categore['follows'];
                $liker = $liker +  $categore['liked'];
                $disliker = $disliker +  $categore['disliked'];
            }
        ?>
            <div><h4>Followers</h4><p><?php echo $followed; ?></p></div>
            <div><h4>Likes</h4><p><?php echo $liker; ?></p></div>
            <div><h4>Dislikes</h4><p><?php echo $disliker; ?></p></div>
            <div><h4>In Gallery</h4><p><?php echo $numberInGall; ?></p></div>
            <div><h4>Top liked Image</h4><p><?php echo $topl; ?></p>
                 
            </div>
        </div>

        <!-- Data about last published -->
        <div class="publishedGallery">
            <div><img src="/PORTO-MASTER/icons/icon/lastPub.png"><h4>Last published</h4><p>15 february 2020</p></div> 
            <div><img src="/PORTO-MASTER/icons/icon/history.png"><form><h4>History</h4><input type="number" placeholder="Number"></div>
            <div id="categoryFetch">
                 <ul>Category 
                    <div style="display:none; padding:5px; position:absolute; background-color:white; ">
                        <li>Exterior Designs</li>
                        <li>Interior Designs</li>
                        <li>UI Design</li>
                        <li>Poster Designs</li>
                    </div>
               </ul>
            </div>  
        </div>
        
        <!-- Loop of gallery images -->
        <div class="galleryContents">
            <?php  foreach ($allInGallery as $categories) {?>
            
                <!-- loop according to id -->
                <div id="allMeGall">
                        <!-- StoreHere ###############################-->
                    <div style="display:none" id="<?php echo "gallery".$categories['id']; ?>">
                        <div  class="moreHeader">
                            <h1><?php echo $categories['title']; ?></h1>
                            <p><?php echo "Published: ".$categories['date']; ?> </p>
                            <p><?php echo "Likes: ".$categories['liked']; ?></p>
                            <p><?php echo "Dislikes: ".$categories['disliked']; ?></p>
                            <p><?php echo "Followers: ".$categories['follows']; ?></p>
                            <p><?php echo "Views: ".$categories['views']; ?></p>
                            <div  class="applySize">
                                <img onclick="closeBox()" src="/PORTO-MASTER/icons/icon/close.png">
                                <img onclick="expandBox()" src="/PORTO-MASTER/icons/icon/maximized.png">
                                <img onclick="reduceBox()" src="/PORTO-MASTER/icons/icon/normal.png">
                            </div>
                            </div>
                            <!-- Slider: Loop images -->
                            <div class="imagesMore">
                                <img id="sizeImg" src="<?php echo '/PORTO-MASTER/icons/'.$categories['resources']; ?>">
                                <!-- grid format -->
                                <div class="sectionGall">
                                    <p><?php echo $categories['Details']; ?></p>
                                    <p><?php echo $categories['description']; ?></p>
                                    <p style="color:orange; font-weight:bold"><?php echo $categories['sides']; ?></p>
                                    <div id="<?php echo "small".$categories['id']; ?>" class="smallGall">
                                        <?php 
                                            $listArray = explode('/', $categories['moreRessources']);
                                            $increment=0;
                                            // create function change
                                            foreach ($listArray as $imagesSources) { 
                                                $functionImage = "ImgFunction".$categories['id'].$increment."()"; ?>
                                                <img onmouseover="<?php echo $functionImage; ?>" class="<?php echo "ImgGall".$increment; ?>" id="ImgGall" src="<?php echo '/PORTO-MASTER/icons/'.$imagesSources; ?>">
                                                <!-- Script mouse over change images -->
                                                <script>
                                                    function <?php echo $functionImage; ?>{
                                                        document.querySelector("#sizeImg").src = document.querySelector("<?php echo ".ImgGall".$increment; ?>").src;
                                                     
                                                    }
                                                </script>
                                            <?php $increment = $increment + 1;} ?>
                                       
                                    </div>
                                </div>
                                
                            </div>

                           
                    </div>
                    <!-- ############################ end storate -->

                    <!-- components -->
                    <img id="galImg" src="<?php echo '/PORTO-MASTER/icons/'.$categories['resources']; ?>">
                    <div class="lvcIcons">
                        <?php $follFunction = "follows_".$categories['id'];
                            if ($categories['id'] == 0) {?>
                        <form style="display:none" action="followers.php" method="post"> </form>
                            <?php } ?>
                        <form action="followers.php" method="post">
                             <input style="display:none" name="actualNum" type="number" value="<?php echo $categories['follows']; ?>" >
                             <input style="display:none" name="id" type="number" value="<?php echo $categories['id']; ?>" >
                             <input type="submit" value="follows" >
                        </form>

                        <form action="likes.php" method="post">
                             <input style="display:none" name="actualNum" type="number" value="<?php echo $categories['liked']; ?>" >
                             <input style="display:none" name="id" type="number" value="<?php echo $categories['id']; ?>" >
                             <input type="submit" value="like" >
                        </form>

                        <form action="dislikes.php" method="post">
                             <input style="display:none" name="actualNum" type="number" value="<?php echo $categories['disliked']; ?>" >
                             <input style="display:none" name="id" type="number" value="<?php echo $categories['id']; ?>" >
                             <input type="submit" value="dislike" >
                        </form>
                        
                        <img id="<?php echo $categories['id']; ?>"  src="/PORTO-MASTER/icons/icon/more.png">
                    </div>
                    
                </div>

            <?php  } ?>
        </div>
                 







        <!-- Gallery Scripts -->
        <script>
             
               
                var myContent =document.querySelectorAll(".galleryContents");
                var myArray = myContent[0].children;

                for (let index = 0; index < myArray.length; index++) {
                    if( myArray[index].children[2].children[3].onclick = () =>{
                        document.getElementById("moreTohere").style.display="block";
                        let getOurId = "gallery" + myArray[index].children[2].children[3].id;
                        
                        document.getElementById("moreTohere").innerHTML = document.getElementById(getOurId).innerHTML;
                    }
                    );
                }





                document.querySelector(".publishedGallery div ul").onmouseover = ()=>{
                    document.querySelector(".publishedGallery div ul").children[0].style.display="block";
                }
                document.querySelector(".publishedGallery div ul").onmouseleave = ()=>{
                    document.querySelector(".publishedGallery div ul").children[0].style.display="none";
                }



             
                   
                

                
                function closeBox(){
                    // document.getElementById("moreTohere").innerHTML="";
                    document.getElementById("moreTohere").style.display="none";
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