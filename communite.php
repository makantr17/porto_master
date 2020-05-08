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
	<link rel="stylesheet" type="text/css" href="stylesheet3.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    
</head>



<body>

        <div class="commonSlider">
            <h1>Community</h1>
        </div>
          <!-- nav bar -->
        <?php include 'navBar.php'; ?>

        <div class="communauteBoard">
            <!-- left side -->
            <div class="listpubShows"> 

                <div id="headLstPub">
                    <h1>All contents here</h>
                </div>
                
                <!-- list all published here -->
                <div class="listOnclickContent" >
                    <div>
                        <p>15/16/2020</p>
                        <img src="/porto-master/icons/cff.jpg">
                    </div>
                    
                    <div>
                        <h2>Confirnement</h2>
                        <p>Those new information about the sudden growth of workability fall down</p>
                    </div>
                </div>
                
                
            </div>


            <script>
                    var clickListable = document.querySelectorAll(".listpubShows .listOnclickContent");
                    for (let index = 0; index < clickListable.length; index++) {
                        clickListable[index].onclick=()=>{
                            for (let loop = 0; loop < document.querySelectorAll(".contentShow #content").length; loop++) {
                                document.querySelectorAll(".contentShow #content")[loop].style.display="none";
                            }
                            document.querySelectorAll(".contentShow #content")[index].style.display="block";
                        }
                    }
             </script>

            <!-- right side -->
            <div class="contentShow">
               

               

                <div class="listAllContentShow" id="content">
                    <div class="headlistAll">
                        <h1>Confirnement</h1>
                        <p>15/16/2020</p>
                        <img src="/porto-master/icons/makant.jpg">
                       
                    </div>
                    
                    <div class="holdMultipleComment">
                        <div>
                            <!-- preleminary info -->
                            <!-- <h2>Architecture events</h2> -->
                            <p>Those new information about the sudden growth of workability fall down
                            Those new information about the sudden growth of workability fall down
                            Those new information about the sudden growth of workability fall down
                            </p>
                            <a href="coll.com">Join via this link</a>
                            <img src="/porto-master/icons/designJob.jpg">
                            <!-- social media if exist -->
                            <div id="socialMedia">
                                <a href="#"><img src="/porto-master/icons/icon/facebook.png"> </a>
                                <a href="#"><img src="/porto-master/icons/icon/linkedin.png"></a>
                            </div>

                         
                            <button>Read More</button>

                            <!-- more content -->
                            <div  id="moreHere">
                                <div>
                                   
                                    <h3>Conditions of joining the party</h3>
                                    <p>components in a system, and uses for this the special process flow chart 
                                        symbols: special shapes to represent different types of actions and process steps, lines and arrows to represent relationships and sequence of steps. It often named process flow diagram, it use colored flowchart symbols. It is incredibly convenient to use the ConceptDraw DIAGRAM software extended with Flowcharts Solution from the "Diagrams" 
                                        Area of ConceptDraw Solution Park for designing professional looking Process Flow Charts.</p>
                                    
                                    <p>Computer and Networks solution provides examples, templates and vector 
                                        stencils library with symbols of local area network (LAN) and wireless LAN (WLAN) equipment. This example shows the computer network diagram of the guesthouse connection to the Internet. You can see the needed equipment on the diagram and how it must be
                                         arranged to get the Internet in any point of the guesthouse.</p>
                                         <div>
                                          <img src="/porto-master/icons/geographic.png">
                                          <!-- <img src="/porto-master/icons/fanta.jpg"> -->
                                    </div>
                                </div>
                            </div>

                        </div>

                        

                    </div>
                </div>

                <!-- <div class="listAllContentShow" id="content">
                    <div class="headlistAll">
                        <h1>Confirnement</h1>
                        <p>15/16/2020</p>
                        <img src="/porto-master/icons/makant.jpg">
               
                    </div>
                    
                    <div class="holdMultipleComment">
                        <div>
                            <h2>Confirnement</h2>
                            <p>Those new information about the sudden growth of workability fall down</p>
                            <img src="/porto-master/icons/designJob.jpg">
                        </div>

                        
                    </div>
                </div> -->
              
            </div>

            <div class="publishEvent">
                 <h1>New events</h1>
                 <p>Those new information about the sudden growth of workability fall down</p>

            </div>

           


        </div>






</body>