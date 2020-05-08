<?php  
session_start();
$_SESSION['idProject']=''; 
$_SESSION['popUp']= 'none';
$_SESSION['inputID']= '';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="HomeStyle.css"> -->
	<link rel="stylesheet" type="text/css" href="styleus.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    
</head>

<body>
        <div class="slider">
            <div>
                    <div id="contentSlider">
                        <h1>Welcome to my professional portfolio</h1>
                        <p>Find some of my professional desgins and some being with my peers</p>
                       <div> <img id="sliderImg" src="/PORTO-MASTER/icons/arrowRR.png"><a href="http://localhost/porto-master/login.php"> <button>Login</button></a></div>
                    </div>
            </div>


            <div>
                    <img src="/PORTO-MASTER/icons/mamady.jpg">
            </div>

        </div>

        <!-- nav bar -->
       <?php include 'navBar.php'; ?>

        <!-- skills areas -->
        <div class="skills-section">
                <!-- about me -->
              <div class="about">
                      <div>
                              <h1>About Me</h1>
                              <p id="p-child">Self worker passionate about programming. Student in African leadership University actualy performing a honor degree in computer science.</p>
                      </div>

                      <div>
                              <img id="aboutImage" src="/PORTO-MASTER/icons/cool1.jpg">
                              <div class="profi">
                                      <h3>Mamady Kante</h3>
                                      <img id="user" src="/PORTO-MASTER/icons/makant.jpg">
                                      <p>Email: makante17@alustudent.com <br>
                                         Tel: +250787850457</p>
                              </div>
                      </div>
              </div>
              
              <!-- experiences or list the skills -->
              <h1 style="font-size:25px">Experiences </h1>
              <div  class="experiences">
                       
                        <div>
                                <div id="sameLinge"> <img id="icons" src="/PORTO-MASTER/icons/icon/cloud.png"> <h1>Cloud Computing</h1></div>
                                <p>Self worker passionate about programming. Student in African leadership University actualy performing a honor degree in computer science.</p>
                        </div>

                        <div>
                                <div id="sameLinge"> <img id="icons" src="/PORTO-MASTER/icons/icon/webDev.png"> <h1>Web and Mobile development</h1></div>
                                <p>Self worker passionate about programming. Student in African leadership University actualy performing a honor degree in computer science.</p>
                        </div>

                        <div>
                                <div id="sameLinge"> <img id="icons" src="/PORTO-MASTER/icons/icon/ai.png"> <h1>Artificial Intelligence</h1></div>
                                <p>Self worker passionate about programming. Student in African leadership University actualy performing a honor degree in computer science.</p>
                        </div>

                        <div>
                                <div id="sameLinge"> <img id="icons" src="/PORTO-MASTER/icons/icon/network.png"> <h1>Networking</h1></div>
                                <p>Self worker passionate about programming. Student in African leadership University actualy performing a honor degree in computer science.</p>
                        </div>

                        <div>
                                <div id="sameLinge"> <img id="icons" src="/PORTO-MASTER/icons/icon/programming.png"> <h1>Programming</h1></div>
                                <p>Self worker passionate about programming. Student in African leadership University actualy performing a honor degree in computer science.</p>
                        </div>

                        <div>
                                <div id="sameLinge"> <img id="icons" src="/PORTO-MASTER/icons/icon/designs.png"> <h1>Architectural Designs</h1></div>
                                <p>Self worker passionate about programming. Student in African leadership University actualy performing a honor degree in computer science.</p>
                        </div>
              
              </div>
              
              <!-- close skills -->
        </div>


        <!-- List my job -->
        <div class="listJob">

             <h1 style="font-size:25px; margin:20px">Services</h1>

             <div class="my-job">
                <div>
                        <img src="/PORTO-MASTER/icons/webDevJob.jpg">
                        <h2>Web development</h2>
                        <p>Develop Website including front-end and back-end</p>
                </div>

                <div>
                        <img src="/PORTO-MASTER/icons/interfaceJob.png">
                        <h2>UI & UX Designs</h2>
                        <p>Implementation of LOW, MEDIUM and HIGH fidelity prototype based on further research</p>
                </div>

                <div>
                        <img src="/PORTO-MASTER/icons/designJob.jpg">
                        <h2>Architecture Design</h2>
                        <p>House Design(Interior & Exterior Designs) with full packages delivering including(2D designs, 3D modeling, Cotation, Foundation plan, Documentation etc..)</p>
                </div>

                <div>
                        <img src="/PORTO-MASTER/icons/mobDevJob.jpg">
                        <h2>Mobile development</h2>
                        <p>Develop mobile application including front-end and back-end</p>
                </div>

                <div>
                        <img src="/PORTO-MASTER/icons/aiJob.png">
                        <h2>Data Analysis & Visualization</h2>
                        <p>Find Trends, Gaps, Correlations between events| Train Models| Prediction</p>
                </div>

             </div>

        </div>

        <!-- testimonial -->
        <div class="testimoni">
               <h1>Testimonial</h1>
               <div class="testimo-comment">
                       <div class="use1">
                               <img src="/PORTO-MASTER/icons/user1.jpg">
                               <div>
                                    <h2>Christian Pacific</h2>
                                    <h4><i>Customer requested a house plan</i></h4>
                                    <P>I had my first house done and really well implemented and delivered. He delivered on time with full package
                                    </P>
                               </div>
                       </div>

                       <div class="use2">
                               <img src="/PORTO-MASTER/icons/user2.jpg">
                               <div>
                                    <h2>Christian Pacific</h2>
                                    <h4><i>Customer requested a house plan</i></h4>
                                    <P>I had my first house done and really well implemented and delivered. He delivered on time with full package
                                    </P>
                               </div>
                       </div>

                       <div class="use3">
                               <img src="/PORTO-MASTER/icons/user3.jpg">
                               <div>
                                    <h2>Christian Pacific</h2>
                                    <h4><i>Customer requested a house plan</i></h4>
                                    <P>I had my first house done and really well implemented and delivered. He delivered on time with full package
                                    </P>
                               </div>
                       </div>

                       <div class="use4">
                               <img style="float:right" src="/PORTO-MASTER/icons/user1.jpg">
                               <div >
                                    <h2>Christian Pacific</h2>
                                    <h4><i>Customer requested a house plan</i></h4>
                                    <P>I had my first house done and really well implemented and delivered. He delivered on time with full package
                                    </P>
                               </div>
                       </div>

                       <div class="use5">
                               <img style="float:right" src="/PORTO-MASTER/icons/user2.jpg">
                               <div>
                                    <h2>Christian Pacific</h2>
                                    <h4><i>Customer requested a house plan</i></h4>
                                    <P>I had my first house done and really well implemented and delivered. He delivered on time with full package
                                    </P>
                               </div>
                       </div>


               </div>

        </div>

        <footer>
                
              <div>
                      <h1>Contact</h1>
                      <p>Email: makante17@alustudent.com <br>Email: kantemamady92@gmail.com
                      <br> Tel +250787850457</p>
              </div>

              <div>
                      <h1>Join Us</h1>
                      <div>
                              <img src="/PORTO-MASTER/icons/twitter.png">
                              <img src="/PORTO-MASTER/icons/facebook.png">
                              <img src="/PORTO-MASTER/icons/instagram.png">
                              <img src="/PORTO-MASTER/icons/linkedin.png">
                      </div>
                      <p style="margin-left:15px; color:gray">Copyright @ rwanda, kigali all reserved. Terms of use| Privacy policy</p>
              </div>

        </footer>


</body>