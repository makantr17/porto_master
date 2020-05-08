<?php     
     $projectIDD = $_SESSION['idProject'];
     $inputIDD = $_SESSION['inputID'];
     $proForm = "SELECT * FROM `project` where `projectID` = '$projectIDD' "; 
     $resultForm= mysqli_query($db, $proForm); 
     $allproForm= mysqli_fetch_all($resultForm, MYSQLI_ASSOC);
?>



               <div class="projectStatus">
                              <p>Can I join new project : Yes</p>
                              <p>Collaborations: 3; Session:  <?php echo $_SESSION['idProject'].' Status: '.$_SESSION['popUp'].' inputId: '.$_SESSION['inputID']; ?></p>
                          </div>



                          <!-- pop up the join form here -->
                          <?php $optionss = $_SESSION['popUp'];?>

                          <div class="popMeUp" style="<?php echo 'display:'.$optionss; ?>">
                              <!-- header pop me -->
                              <div id="headerPop">
                                   <p>Please pop me up</p>
                                   <form method="post" action="closeMe.php">
                                        <input type="submit" name="closeMe" value='' >
                                   </form>
                              </div>

                              <!-- get info from the database -->
                              <div id="bodyPop">
                                   
                                   <div id="detailspopMe">
                                        <?php foreach ($allproForm as $keyValueP) {?>
                                             <h1><?php echo $keyValueP['Name']; ?></h1>
                                             <p><?php echo $keyValueP['description']; ?></p>
                                        <?php  $sharableIDD=  $keyValueP['sharableId'];  } ?>
                                        <div style="height:150px; overflow:auto; border:1px solid rgb(248, 248, 247); padding:10px">
                                                  <h3 style="font-size:16px; font-weight:normal">Term of conditions before you join this project</h3>
                                                  <p>All collaborators should have the capacity to handle the task they have assigned for. More
                                                       importantly the respect of the term of conditions will result a good delivering. 
                                                       Any professional issue can be reported to the root users and the communicated to the team to avoid
                                                       the progress of others. All payment porcess is communicated by the root before the start of the project.
                                                       Any inconveniency are taking in charge by our department.
                                                  </p>
                                        </div>

                                   </div>

                              
                                   <div id="submitPopMe"> 
                                   
                                        <form method="post" id="joinAproject" action="addToProject.php">
                                             <input style="display:none" type="text" name="userInput" value="<?php echo $inputIDD; ?>">
                                             <input style="display:none" type="text" name="protoID" value="<?php echo $projectIDD; ?>">
                                             <input style="display:none" type="text" name="shaID" value="<?php echo $sharableIDD; ?>">
                                             <!-- /////////////////////////////cool -->
                                             <?php
                                                  $task0 = explode("/", $keyValueP["taskList"]);
                                                  $acquiredF = explode("/", $keyValueP["requiredForTask"]);
                                                  // $collabProID= $keyNewPro["projectID"];
                                                  $cPQuery = "SELECT `Users`.`id`, `users`.`userName`, `users`.`image`, `collaborators`.`collabID`,
                                                       `collaborators`.`projectID`,  `collaborators`.`userId`, `collaborators`.`taskID`,
                                                       `expectation`.`taskID`, `expectation`.`taskName` from `collaborators`, `users`, `expectation` 
                                                       where `collaborators`.`projectID`= $projectIDD and `collaborators`.`taskID` = `expectation`.`taskID` and `collaborators`.`userId` = `users`.`id` "; 
                                                  $resultCollabP= mysqli_query($db, $cPQuery); 
                                                  $fetchCollabP= mysqli_fetch_all($resultCollabP, MYSQLI_ASSOC);
                                             ?>
                                             <select name="nameTask">
                                                  <option>Choise available Task</option>
                                                  <?php 
                                                       for ($na=0; $na < sizeof($task0) ; $na++) {  
                                                            $lastColab = 0;
                                                            $identyPro = 0;
                                                            foreach($fetchCollabP as $keyCollabP1) {
                                                                 if ($keyCollabP1["taskName"] == $task0[$na]) {
                                                                      $identyPro = $identyPro + 1;
                                                                 }
                                                            }
                                                            if ($identyPro != $acquiredF[$na]) { ?>
                                                                 <option><?php echo $task0[$na]; ?></option>
                                                  <?php } } ?>                                           

                                             </select>
                                             
                                             <div>
                                                  <input type="checkbox" name="agree" value="Confirm">
                                                  <label>I Agree the term of conditions</label>
                                             </div>

                                             <input style="width:150px; background-color:orange; border:0px; border-radius:5px" type="submit" name="subJoined" value="Confirm">
                                       
                                        </form>
                                   </div>
                              </div>

                         </div>
                          
                         

<script>
                     
var joinForm = document.getElementById("joinAproject");
// var projectName= form.elements['user'];
// var userId= joinForm.elements['userId'];
if (window.addEventListener){
     joinForm.addEventListener('submit', checkJoinSubmit, true);
} 

function checkJoinSubmit(e){
     var checkPub0 = false;
     var checkPub1 = false;
     
     if(joinForm.elements['nameTask'].value == '' || joinForm.elements['nameTask'].value== "Choise available Task"){
          joinForm.elements['nameTask'].style.border="1px solid red";
          checkPub0 = true;
          e.preventDefault();   
     }else{
          joinForm.elements['nameTask'].style.border="1px solid  rgb(238, 230, 230)";
     }
     if(!this.elements['agree'].checked  ){
          alert("Please confirm it");
          checkPub1 = true;
          e.preventDefault();
     }
    
}

</script>





                         




                          <!-- broadProject where all are listed here -->
                          <div class="boardProject">

                           <?php 
                           
                           foreach ($allInProject as $keyNewPro) {
                                ?>    
                               <div class="sampleProject">
                                   <div>     
                                        <h1><?php echo $keyNewPro['Name']; ?></h1>
                                        <p><?php echo $keyNewPro['description']; ?></p>
                                       
                                   </div>
                                   <div class="descriptionPro">
                                       
                                        <div class="neededInfoPro">



                                        <?php
                                             $taskArray = explode("/", $keyNewPro["taskList"]);
                                             $acquiredFor = explode("/", $keyNewPro["requiredForTask"]);
                                             $collabProID= $keyNewPro["projectID"];
                                             $collQuery = "SELECT `Users`.`id`, `users`.`userName`, `users`.`image`, `collaborators`.`collabID`,
                                                  `collaborators`.`projectID`,  `collaborators`.`userId`, `collaborators`.`taskID`,
                                                  `expectation`.`taskID`, `expectation`.`taskName` from `collaborators`, `users`, `expectation` 
                                                  where `collaborators`.`projectID`= $collabProID and `collaborators`.`taskID` = `expectation`.`taskID` and `collaborators`.`userId` = `users`.`id` "; 
                                             $resultCollab= mysqli_query($db, $collQuery); 
                                             $fetchCollab= mysqli_fetch_all($resultCollab, MYSQLI_ASSOC);?>
                                             
                                           
                                             <table>
                                                  <tr>
                                                       <th>Task</th>
                                                       <th>Needed</th>
                                                  </tr>
                                           
                                                  <?php 
                                                  for ($n=0; $n < sizeof($taskArray) ; $n++) {  ?>
                                                  <tr>       
                                                       <?php $identyCount = 0;
                                                       foreach($fetchCollab as $keyCollab1) {
                                                            if ($keyCollab1["taskName"] == $taskArray[$n]) {
                                                                 $identyCount = $identyCount + 1;
                                                            }
                                                            }if ($identyCount != $acquiredFor[$n]) {
                                                                 ?>
                                                                  <td><?php echo $taskArray[$n]; ?></td>
                                                                 <td><?php echo $acquiredFor[$n] -$identyCount; ?></td><?php
                                                            } ?>
                                                  </tr>                                                      
                                                  <?php } ?>
                                             </table>

                                        </div>

                                        <div class="joindre">
                                             <p><?php echo 'Start: '.$keyNewPro['published'].'<br>'.'To: '.$keyNewPro['expected']; ?></p>
                                            
                                             <?php
                                                  //  Query root info
                                                  $frootId= $keyNewPro['root'];
                                                  $frootQuery = "SELECT * from `portofolio`.users where `users`.`id`= '$frootId' "; 
                                                  $fresultRoot= mysqli_query($db, $frootQuery); 
                                                  $ffetchRoot= mysqli_fetch_all($fresultRoot, MYSQLI_ASSOC); 
                                             ?>
                                             <form method="post" action="joinProject.php">
                                                 <?php foreach ($ffetchRoot as $keyValroot) { ?>
                                                  <img src="<?php echo '/PORTO-MASTER/icons/'.$keyValroot['image']; ?>" >
                                                 <?php } ?>
                                                  
                                                  <input style="display:none" type="number" name="joinID" value="<?php echo $keyNewPro['projectID']; ?>">
                                                  <input style="display:none" type="number" name="userID" value="<?php echo $userId; ?>">
                                                  <input style="display:none" type="text" name="popUp">

                                                  <!-- check if user is alread signed -->
                                                  <?php
                                                  $boolCheckif = false;
                                                  foreach ($fetchCollab as $keyCheckif) {
                                                      if ($keyCheckif['userId'] == $userId) {
                                                          $boolCheckif = true;
                                                      }
                                                  } 
                                                  
                                                  if ($boolCheckif == true) {?>
                                                       <p style="background-color:orange; margin-top:0px"> IN</p>
                                                  <?php } else{ ?>
                                                       <input type="submit" name='join' value="Join">
                                                  <?php } ?>
                                             </form>
                                        </div>
                                   </div>
                                   
                                    
                               </div>

                         <?php } ?>

                          </div>