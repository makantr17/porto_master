<?php
session_start();
include "dbconnect.php";
    
    $userId =  $_SESSION['uniqueUserID'];

    $sqluser = "SELECT * from `portofolio`.users where `users`.`id`= '$userId'"; 
    $resultUser= mysqli_query($db, $sqluser); 
    $fetchUser= mysqli_fetch_all($resultUser, MYSQLI_ASSOC); 

    $Inuser = "SELECT * from `portofolio`.users"; 
    $resultInuser= mysqli_query($db, $Inuser); 
    $fetchInuser= mysqli_fetch_all($resultInuser, MYSQLI_ASSOC); 

    //  Query all the gallery info
    $sql = "SELECT * from `portofolio`.gallery where `gallery`.`userId`= '$userId'"; 
    $result= mysqli_query($db, $sql); 
    $allInGallery= mysqli_fetch_all($result, MYSQLI_ASSOC); 

      //  Query all the gallery info
      $sqlExp = "SELECT * from `portofolio`.expectation"; 
      $resultExp= mysqli_query($db, $sqlExp); 
      $allExp= mysqli_fetch_all($resultExp, MYSQLI_ASSOC); 

    $proSql = "SELECT `collaborators`.`userId`, `collaborators`.`projectID`,`collaborators`.`collabID`,
     `collaborators`.`taskID`, `project`.`Name`, `project`.`published`, `project`.`expected`, `project`.`description`,
      `project`.`projectID`, `project`.`root`,`project`.`sharableId`, `project`.`status` FROM `collaborators`, `project` 
    WHERE `userId` = '$userId' and `project`.`projectID` = `collaborators`.`projectID`"; 
    $resultPro= mysqli_query($db, $proSql); 
    $allPro= mysqli_fetch_all($resultPro, MYSQLI_ASSOC); 


     //  Query all the gallery info
     $sqlProject = "SELECT * FROM `project` "; 
     $resultProject= mysqli_query($db, $sqlProject); 
     $allInProject= mysqli_fetch_all($resultProject, MYSQLI_ASSOC); 

     $collList = "SELECT `collaborators`.`projectID`, `collaborators`.`userId`, `users`.`id`, `users`.`email`  FROM `collaborators`, `users` 
     WHERE `collaborators`.`userId`= `users`.`id` ";
     $resultColle = mysqli_query($db, $collList); 
     $fetchCol = mysqli_fetch_all($resultColle, MYSQLI_ASSOC); 


     $uniquePro = "SELECT DISTINCT `collaborators`.`projectID` FROM `collaborators` where `userId` = '$userId'";
     $resultUniP = mysqli_query($db, $uniquePro); 
     $fetchUniqPro = mysqli_fetch_all($resultUniP, MYSQLI_ASSOC); 

    ?>






<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="HomeStyle.css"> -->
	<link rel="stylesheet" type="text/css" href="user2Style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    
</head>


<body>
     <div class="userAccount">
          <div class="profileBoard">
               <div class="identity">
               <?php foreach ($resultUser as $keyUsers) { ?>
                    <img src="<?php echo '/PORTO-MASTER/icons/'.$keyUsers['image']; ?>">
                    <h1> <?php echo $keyUsers['userName']; ?></h1>
                    <p><?php echo $keyUsers['email']; ?></p>
                    <p><?php echo $keyUsers['country']; ?></p>
                    <p><?php echo $keyUsers['profession']; ?></p>
               <?php } ?>
               </div>
               <h1>Managment</h1>
               <div class="manager">    
                   <div onclick="publishPull()"><img src="/PORTO-MASTER/icons/icon/dbase.png"><p>Published</p></div>
                   <div onclick="collaboratePull()"><img src="/PORTO-MASTER/icons/icon/dbase.png"><p>Collaborations</p></div>
                   <div onclick="newProject()"><img src="/PORTO-MASTER/icons/icon/dbase.png"><p>Find new Project</p></div>
                   <div onclick="createNewPro()"><img src="/PORTO-MASTER/icons/icon/dbase.png"><p>New Project</p></div>
                   <div onclick="timePull()"><img src="/PORTO-MASTER/icons/icon/dbase.png"><p>Timeline</p></div>
                   <!-- <div><img src="/PORTO-MASTER/icons/icon/dbase.png"><p>Delivering</p></div> -->
                   <div><img src="/PORTO-MASTER/icons/icon/dbase.png"><p>Account</p></div>
                   <div><img src="/PORTO-MASTER/icons/icon/dbase.png"><p>Setting</p></div>
               </div>
          </div>
          <div class="reflexibleBoard">
               <div class="headerBoard">
                     <img src="/PORTO-MASTER/icons/makant.jpg">
                     <div>
                         <img id="notification" src="/PORTO-MASTER/icons/icon/lastPub.png">
                         <p>Timeline</p>
                     </div>

                     <div>
                         <img id="notification" src="/PORTO-MASTER/icons/icon/search.png">
                         <p>Notification</p>
                     </div>

                     <div>
                         <img id="notification" src="/PORTO-MASTER/icons/icon/ai.png">
                         <p>Account</p>
                     </div>
               </div>
               <!-- Simple operations -->
               <div class="operations">
                    <ul>Pubblish Details
                        <div>
                              <li>Allocated storage: 5</li>
                              <li>Allowed to Published: 3</li>
                              <li>Current published: 1</li>
                              <li>Last Published: 15/16/2020</li>
                        </div>
                    </ul>
                    <button>Timeline</button>
                    <button>Delivering</button>
                  
                  
               </div>

               <script>
                    document.querySelector(".operations ul").onmouseover=()=>{
                         document.querySelector(".operations ul").children[0].style.display="block";
                    }
                    document.querySelector(".operations ul").onmouseleave=()=>{
                         document.querySelector(".operations ul").children[0].style.display="none";
                    }
               </script>




               <!-- Manager execution goes here -->
               <div class="managerGoesHere">
                   





                   <!-- Created new project -->
                   <div style="display:none" class="createProjects">
                        <h1 id="manageH">Create new Project</h1>
                        <div class="createHeader">
                            <button onclick="createProject()">Create project</button>
                            <button onclick="addRessources()">Add ressources</button>
                            <!-- <button onclick="shareRessources()">Share ressources</button> -->
                            <script>
                                 function createProject(){
                                      document.querySelector(".addRessources").style.display="none";
                                      document.querySelector(".formCreatePro").style.display="block";
                                   //    document.querySelector(".shareRessources").style.display="none";
                                 }
                                 function addRessources(){
                                      document.querySelector(".addRessources").style.display="block";
                                      document.querySelector(".formCreatePro").style.display="none";
                                   //    document.querySelector(".shareRessources").style.display="none";
                                 }
                                 function shareRessources(){
                                      document.querySelector(".addRessources").style.display="none";
                                      document.querySelector(".formCreatePro").style.display="none";
                                   //    document.querySelector(".shareRessources").style.display="block";
                                 }
                            </script>
                        </div>
                         
                        

                         <div class="addRessources" style="display:none">
                              <h1>Add ressources</h1>
                              <form id="laForm" method="post" action="shareFile.php" enctype="multipart/form-data">
                                   <div id="firstSection">
                                        <input type="text" placeholder="Comment" name="comment">
                                        <input style="display:none" type="text" name="date">
                                        <input style="display:none" type="text" name="userID" value="<?php echo $userId; ?>">
                                        <label style="margin-top:0px; font-size:12px">Upload the file to share</label>
                                        <input type="file" name='file[]' multiple placeholder="Uploads files">
                                        <label style="margin-bottom:0px; font-size:12px">Add project ID below</label>
                                        <input type="text" id="adod" name="projectID" placeholder="project ID">
                                        
                                        <input type="button" name="assignTO" id="assignedto" value="Assign TO">
                                   </div>
                                   
                               
                                   <div style="display:none" class="addeur">
                                        <label>Add Users</label>
                                        <p style="font-size:14px; color:orange; margin-top:20px; font-weight:bold" id="listP"></p>
                                        <div id="listCollabs">
                                        <!-- list if only if user is a member of the  -->
                                           <?php foreach ($fetchUniqPro as $keyUniquePro){
                                                $ulId = "ul".$keyUniquePro['projectID'];  ?>
                                             <ul style="display:none" id="<?php echo $ulId; ?>">
                                                <?php foreach ($fetchCol as $keCol){
                                                 if ( $keyUniquePro['projectID'] == $keCol['projectID']) { ?>
                                                  <li><?php echo $keCol['email']; ?></li>
                                                  <?php }} ?>
                                             </ul>
                                            <?php } ?>
                                        </div>

                                        <div id="pasteCollabs">
                                        
                                        </div>
                                        <input type="text" style="display:none" name="assigned" id="assignedto">
                                        <input style="width:150px; height:30px; border-radius:10px; 
                                        background-color:orange; border:0px; margin-top:3em" type="submit" name="submit" value="Submit">
                                   </div>
                                   
                              </form>
                         </div>



                         
<script>

var lForm = document.getElementById("laForm");
    // var projectName= form.elements['user'];
    var projectIDD= lForm.elements['projectID'];
    if (window.addEventListener){
     lForm.addEventListener('submit', checkOnMySubmit, true);
     lForm.elements['assignTO'].addEventListener('click', openListToAss, true);
    } 

    function checkOnMySubmit(e){
         var checkCon1 = false;
         var checkCon2 = false;
          if(lForm.elements['comment'].value == ''){
               alert("add comment");
               checkCon1 = true;
               e.preventDefault();
          }
          if(document.querySelectorAll(".addeur #pasteCollabs div").length == 0){
               document.querySelector(".addeur #pasteCollabs").style.border="1px solid red";
               var checkCon2 = true;
               e.preventDefault();
          }if (document.querySelectorAll(".addeur #pasteCollabs div").length > 0) {
               document.querySelector(".addeur #pasteCollabs").style.border="1px solid rgb(245, 245, 243)";
               
          }
          if (checkCon1 == false && checkCon2 == false) {
               var idUsers = '';
               var myArray =document.querySelectorAll(".addeur #pasteCollabs div");
               for (let lop = 0; lop < myArray.length; lop++) {
                    if (lop == 0) {
                         idUsers = myArray[lop].children[0].textContent;
                    }else{
                         idUsers = idUsers + '/' + myArray[lop].children[0].textContent;   
                    } 
               }
               // mm/dd/year
               var today = new Date();
               var fullda = today.getFullYear()+'-'+(today.getMonth() + 1) + '-' + today.getDate();
               lForm.elements['date'].value =fullda;
               lForm.elements['assigned'].value = idUsers;
          }
         
    }

    function openListToAss(e){
         var fld;
         check0 = false;
         if(lForm.elements['projectID'].value == ''){
              alert('Invalid project id');
              
              e.preventDefault();
              check0 = true;
         }
         if(check0 == false){
              for (let iete = 0; iete < document.querySelectorAll(".addeur ul").length; iete++) {
                  document.querySelectorAll(".addeur ul")[iete].style.display="none"; 
              }
               // var le = "#listCollabs #ul"+ lForm.elements['projectID'].value;  
               var te =  ".addeur #ul"+ lForm.elements['projectID'].value;                       
               document.querySelector(".addeur").style.display="block";
               document.querySelector(te).style.display="block";    
               document.querySelector("#pasteCollabs").innerHTML = "";
               var keepMeInform=false;
               <?php foreach ($allPro as $Cvalue) {?>
                    if(lForm.elements['projectID'].value == "<?php echo $Cvalue['projectID']; ?>" ){
                         document.getElementById("listP").textContent= "<?php echo $Cvalue['Name']; ?>"; 
                         
                    }
                                  
               <?php } ?>
                  
         }}



</script>










                         <script>
                              //  var getMyId = document.getElementById("listId").textContent;
                              
                                   
                              
                               var lopti = document.querySelectorAll("#listCollabs ul");
                               for (let myI = 0; myI < lopti.length; myI++) {
                                    
                                    
                               
                              //  var ajoute = document.querySelectorAll("#pasteCollabs div img");
                               for (let integ = 0; integ < lopti[myI].children.length; integ++) {
                                        if(lopti[myI].children[integ].onclick=()=>{
                                             var comparer=0;
                                             for (let through = 0; through < document.querySelectorAll("#pasteCollabs div p").length; through++) {
                                                  if (document.querySelectorAll("#pasteCollabs div p")[through].innerText == lopti[myI].children[integ].innerText) {
                                                       comparer = comparer + 1;
                                                  } 
                                             }
                                             if (comparer == 0) {
                                                  document.querySelector("#pasteCollabs").innerHTML +=  '<div><p>' + lopti[myI].children[integ].textContent + '</p><img src="/PORTO-MASTER/icons/icon/close.png"></div>';
                                             }

                                             for (let delet = 0; delet < document.querySelectorAll("#pasteCollabs div").length; delet++) {
                                                       if (document.querySelectorAll("#pasteCollabs div")[delet].children[1].onclick=()=>{
                                                            document.querySelectorAll("#pasteCollabs div")[delet].outerHTML = "";
                                                            // alert("hello");

                                                       }); 
                                                       
                                                  }        
                                   });      
                               }
                              }
                 
                              

                         </script>

                        <div  class="formCreatePro">
                              <form id="myForm" method="post" action="createNewPro.php" enctype="multipart/form-data">
                                   <h1>New project</h1>
                                   <div class="section1" >
                                        <div>
                                             <input type="date" placeholder="Start date" name="start">
                                             <label>Maximum one week from the start date</label>
                                        </div>
                                        <div>
                                             <input type="date" placeholder="Expecting date" name="expected">
                                             <label>at least 1 month time for good expertise</label>
                                        </div>
                                        <div>
                                             <input type="text" name="proName" placeholder="Project name">
                                             <label>Maximum lenght 20</label>
                                        </div>
                                        
                                        <div>
                                             <input style="width:150px; height:30px; background-color:orange" type="button" name="next1" value="Next">
                                        </div>
                                        
                                   </div>

                                   <div class="section2" style="display:none">
                                        <div>
                                             <div id="descripto">
                                                  <div>
                                                       <input type="text" placeholder="Description" name="description">
                                                       <label>Maximum lenght characters 200</label>
                                                  </div>
                                                  <div>
                                                       <input type="text" placeholder="Details" name="details">
                                                       <label>Maximum lenght 45</label>
                                                  </div>

                                             </div>

                                             <div id="taskedL">
                                                  <h1>Select requested tasks</h1>
                                                  <div id="inputTasks" name="tasks">
                                                       <?php foreach ($allExp as $keyExpect) {?>
                                                       <input id="inputTask" type="checkbox"><label><?php echo $keyExpect['taskName']; ?></label><input id="requiredTothe" type="number" placeholder="expected for the task">
                                                       <?php } ?>
                                                  </div>
                                                  <input style="display:none" id="taskTo" type="text" name="taskList" >
                                                  <input style="display:none" id="requiredBy" type="text" name="requiredFor" >
                                             </div>
                                        </div>
                                        <div>
                                             <input style="width:150px; height:30px; background-color:orange" type="button" name="back1" value="Back">
                                             <input style="width:150px; height:30px; background-color:orange" type="button" name="next2" value="Next">
                                        </div>
                                        
                                   </div>

                                   <div class="sectionRoot" style="display:none">
                                        <input style="display:none" type="text" name="root" value= "<?php echo $userId; ?>">
                                        <div id="styleRoot">
                                             <input type="file" name="Addfiles">   
                                             <label>Add landing image of project</label>                    
                                        </div>

                                        <div id="confirmAll">
                                             <input type="checkbox" name="terms">
                                             <label>Confirm before you validate</label>
                                        </div>

                                        <div>
                                             <input style="width:150px; height:30px; background-color:orange" type="button" name="back2" value="Back">
                                             <input style="width:150px; height:30px; background-color:orange"  type="submit" name="submit" value="Register">
                                        </div>
                                        
                                   </div>
                              </form>

                     
                        
                         </div>
                    </div>




















                   <!-- Adhere to new project -->
                    <div  class="allProject">
                          <h1 id="manageH">Join new Projects</h1>
                          <?php include "newProject.php" ?>
                    </div>
                   

                    <!-- collaboration -->
                    <div style="display:none" class="collaboration">
                          <h1 id="manageH">Collaboration</h1>
                          <?php  include "collaborate.php"; ?>
                    </div>


                    <div style="display:none" class="timeline">
                          <h1 id="manageH">Time Schedule</h1>
                          <?php $valued = 20; ?>
                          <div class="grabTimeline">
                               <?php $arrColor = array('lightseagreen', 'plum', 'mediumturquoise', 'orange');
                               ?>
                               <!-- header timeline -->
                               <div class="timelineHeader">
                                   <div>
                                        <h1>Find project Timeline based on Start, Current and End date</h1>
                                        <p style="padding-left:10px; padding-right:20px"><i>At the left with vertical orange line is the start date; in the middle is 
                                             stated the current date converted by percentage of progress in different color of projects and last at the right we have the deadline in red color
                                             with vertical line.</i>
                                        </p>

                                   </div>
                                    
                                    <div id="labelColor">
                                        <!-- list all projec here with label -->
                                        <?php
                                         $changeCol = 0; 
                                         foreach ($allPro as $keyList) { ?>
                                             <div>
                                                  <div style="height:20px; width:20px; border-radius:20px; margin:5px; background-color: <?php echo $arrColor[$changeCol]; ?>" id="label"></div>
                                                  <p style="padding:0px;margin:5px; color:black"><?php echo $keyList['Name']; ?></p>
                                             </div>
                                        <?php $changeCol = $changeCol + 1;   } ?>
                                    </div>
                                   
                               </div>

                               <!-- display timeline format calender -->
                               <div class="timelineBody">
                             
                                   <?php
                                        $dm = getdate();
                                        $current= "";
                                        $addcounter = -1;
                                         foreach ($dm as $keyL) {
                                              $addcounter = $addcounter + 1;
                                              if ($addcounter == 3) {
                                                  $current = $keyL;
                                              }
                                              if ( $addcounter == 5 ) {
                                                  $current = $current.'-'.$keyL;
                                              }
                                              if ($addcounter == 6) {
                                                  $current = $current.'-'.$keyL;
                                              }
                                         }
                                   //  $current = "<script>document.write(DateOftoday)</script>"; 
                                   $colorChanger = 0;
                                    foreach ($allPro as $keyTime) {
                                         
                                        $starte = $keyTime['published'];
                                        $deadline =  $keyTime['expected'];
    
                                        $explStart = explode('-', $starte);
                                        $explDeadline = explode('-', $deadline);
                                        $explCurrent = explode('-', "$current");
                                        
                                        $dist0 = $explStart[0] * 365 + 30 *  $explStart[1] +  $explStart[2];
                                        $dist1 = $explCurrent[2] * 365 + 30 *  $explCurrent[1] + $explCurrent[0];
                                        $dist2 = $explDeadline[0] * 365 + 30 *  $explDeadline[1] + $explDeadline[2];
                                       
                                        // ruler balance dates
                                        $ruler = 30 + 30 * 12 + 2020 * 365;
                                        $TT = $ruler - $dist0;
                                        $widTT = $dist2 - $dist0;
                                        $totalDist = ($widTT * 100)/$TT;
                                        $proTotal = $dist2 -$dist0;
                                        $proWidth = $dist1 -$dist0;                            
                                        $totalCurrent = ($proWidth * 100)/$proTotal;
                                        $remaining = $dist2 - $dist1;
                                   ?>
                                    <!-- list -->
                                    <div class="timeforProject" style="width:<?php echo $totalDist.'%'; ?>;">
                                       <p style="margin-left:<?php echo $totalCurrent.'%'; ?>"><?php  echo $remaining.' Days'; ?></p>
                                     
                                       <div id="ruler" style="padding:2px; ">
                                             <div style="width: <?php echo $totalCurrent.'%'; ?>; text-align:center;  font-size:12px; background-color:<?php echo $arrColor[$colorChanger]; ?>">
                                                  <p style="margin:0px; padding:5px"><?php echo $totalCurrent.'%'; ?></p>
                                             </div>
                                             
                                       </div>
                                       <div>
                                             <p style="float:left; background-color:rgb(247, 245, 242); padding:5px;border-radius:20px; border-top-left-radius:0px; margin-top:2px; margin-left:-10px"><?php  echo $starte; ?></p>
                                             <p style="float:right; background-color:rgb(247, 245, 242); padding:5px;border-radius:20px; border-top-right-radius:0px; margin-top:2px; margin-right:-10px"><?php  echo $deadline; ?></p>
                                       </div>
                                      
                                    </div>

                                   <?php $colorChanger = $colorChanger + 1; } ?>

                               </div>
                              
                          </div>
                    </div>

                    <!-- publish related -->
                    <div style="display:none" class="published">
                         <?php include "newPublication.php";  ?>
                    </div>

               </div>
          </div>



     </div>
     












     <script>
          //  menu bar pull
          function publishPull(){
               document.querySelector(".allProject").style.display="none";
               document.querySelector(".collaboration").style.display="none";
               document.querySelector(".timeline").style.display="none";
               document.querySelector(".published").style.display="block";
               document.querySelector(".createProjects").style.display="none";
          }
          function collaboratePull(){
               document.querySelector(".allProject").style.display="none";
               document.querySelector(".published").style.display="none";
               document.querySelector(".timeline").style.display="none";
               document.querySelector(".collaboration").style.display="block";
               document.querySelector(".createProjects").style.display="none";
          }
          function timePull(){
               document.querySelector(".allProject").style.display="none";
               document.querySelector(".collaboration").style.display="none";
               document.querySelector(".published").style.display="none";
               document.querySelector(".timeline").style.display="block";
               document.querySelector(".createProjects").style.display="none";
          }
          function newProject(){
               document.querySelector(".collaboration").style.display="none";
               document.querySelector(".published").style.display="none";
               document.querySelector(".timeline").style.display="none";
               document.querySelector(".allProject").style.display="block";
               document.querySelector(".createProjects").style.display="none";


          }
          function createNewPro() {
               document.querySelector(".collaboration").style.display="none";
               document.querySelector(".published").style.display="none";
               document.querySelector(".timeline").style.display="none";
               document.querySelector(".allProject").style.display="none";
               document.querySelector(".createProjects").style.display="block";
          }


          // published pull off
          function listThatPublished(){
               document.querySelector(".containerPublished #holder1").style.display="none";
               document.querySelector(".containerPublished #holder3").style.display="none";
               document.querySelector(".containerPublished #holder2").style.display="block";
          }
          function addNewP(){
               document.querySelector(".containerPublished #holder2").style.display="none";
               document.querySelector(".containerPublished #holder3").style.display="none";
               document.querySelector(".containerPublished #holder1").style.display="block";
          }
          function deleteP(){
               document.querySelector(".containerPublished #holder2").style.display="none";
               document.querySelector(".containerPublished #holder1").style.display="none";
               document.querySelector(".containerPublished #holder3").style.display="block";
          }


          var listPubla = document.querySelectorAll(".childListPub");
          for(let index = 0; index < listPubla.length; index++) {
               listPubla[index].children[2].onclick=() =>{
                    document.querySelector(".openListPub").innerHTML = listPubla[index].children[3].innerHTML;
                    // listPubla[index].children[3].style.display="block";
               }    
          }

     </script>




































<script>
                              var form = document.getElementById("myForm");
                              // var projectName= form.elements['user'];
                              var projectName= form.elements['proName'];
                              var startDate= form.elements['start'];
                              if (window.addEventListener){
                                   form.addEventListener('submit', checkOnSubmit, true);
                                   form.elements['next1'].addEventListener('click', checkOnNext1, true);
                                   form.elements['next2'].addEventListener('click', checkOnNext2, true);
                                   projectName.addEventListener('focus', showMessage1, false);
                                   projectName.addEventListener('blur', checkMessage1, false);
                              } 


                              function checkOnNext1(e){
                                   var fld;
                                   var flo = form.elements['start'];
                                   var check0 = false;
                                   fld = form.elements['proName'];
                                   var check1 = false;
                                   var check2 = false;
                                   var check3 = false;
                                   var check4 = false;
                                   var dateB = form.elements['start'].value.split('-');
                                   var dateA = form.elements['expected'].value.split('-');

                                   if(fld.value.length < 5){
                                        alert('Invalid project name');
                                        fld.focus();
                                        e.preventDefault();
                                        check0 = true;
                                   }
                                   if(form.elements['start'].value == "" || form.elements['expected'].value == ""){
                                        alert('Chose exact start and expected date');
                                        check1 = true;
                                   }
                                   if(dateB[1] > dateA[1]){
                                        alert('Start date should be less than Expected date');
                                        check2 = true;
                                   }
                                   if (dateA[1] - dateB[1] == 1 && (dateA[2] - dateB[2]) < -2) {
                                             alert("28 days difference is required");
                                   }
                                   if (dateB[1] == dateA[1]) {
                                        if (dateA[2] - dateB[2] < 28 ) {
                                             alert("28 days difference is required");
                                             check4 = true;
                                        }   
                                   }
                                   
                                   if(check0 == false && check1 == false && check2 == false && check3 == false && check4 == false){
                                        document.querySelector(".section1").style.display = "none";
                                        document.querySelector(".sectionRoot").style.display = "none";
                                        document.querySelector(".section2").style.display = "block";
                                        
                                   }
                              }

                              function checkOnNext2(e){
                                   var fld1;
                                   var check3 = false;
                                   var check5 = false;
                                   var check4 = false;
                                   if(form.elements['description'].value == "" || form.elements['details'].value == ""){
                                        alert('Fill the input filed');
                                        e.preventDefault();
                                        check3= true;
                                   }
                                   fld1 = document.querySelectorAll("#inputTasks #inputTask");
                                   fld2 = document.querySelectorAll("#inputTasks label");
                                   fld3 = document.querySelectorAll("#inputTasks #requiredTothe");
                                   var countFld = 0;
                                   var tasksli = '';
                                   var reqli = '';
                                   for (let Flindex = 0; Flindex < fld1.length; Flindex++) {
                                        if (fld1[Flindex].checked) {
                                             if (Flindex == 0) {
                                                  reqli =fld3[Flindex].value;
                                                  tasksli = fld2[Flindex].innerText;
                                             }else{
                                                  reqli = reqli + '/' + fld3[Flindex].value;
                                                  tasksli = tasksli + '/' + fld2[Flindex].innerText;
                                             }
                                             
                                             countFld = countFld + 1;
                                             if (fld3[Flindex].value <=0) {
                                                  check5 = true;
                                                  alert("Negative input field");
                                             }
                                        }
                                   }if (countFld <= 0) {
                                        alert("Please select a task");
                                        check4= true;
                                   }
                                   if(check3 == false && check4 == false && check5 == false){
                                        document.querySelector("#taskTo").value = tasksli;
                                        document.querySelector("#requiredBy").value = reqli;
                                        document.querySelector(".section1").style.display = "none";
                                        document.querySelector(".section2").style.display = "none";
                                        document.querySelector(".sectionRoot").style.display = "block";
                                   }
                              }

                              function showMessage1(){
                                   this.className= 'active';

                              }
                              function checkMessage1(){
                                   this.className= '';
                                   if (this.value.length < 5) {
                                        this.className = "error";
                                   }
                              }


                              function checkOnSubmit(e){
                                  
                                   var conf0 = false;
                                   if(document.querySelector("#styleRoot input").value == ""){
                                        alert("add project Cover");
                                        conf0 = true;
                                   }
                                   // var conf2 = false;
                                   if(!this.elements['terms'].checked || conf0 == true){
                                        alert('Agree to our terms');
                                        e.preventDefault();
                                       
                                   }
                                 
                              }
                              

                          
                        </script>

</body>