<div class="collabBoard">
                              <div class="collabPanel">
                                    <!-- list all projects here -->
                                    <?php foreach ($allPro as $keyProjects) {
                                         ?>
                                        <div id="clickOnPro" class="<?php echo 'project'.$keyProjects['projectID']; ?>">
                                             <h1><?php echo $keyProjects['Name']; ?></h1>
                                             <p><?php echo $keyProjects['status'].'<br>'.$keyProjects['published'].' To '.$keyProjects['expected']; ?></p>
                                             <img class="false"  src="/PORTO-MASTER/icons/icon/drop.png">
                                        </div>
                                        
                                        <script>
                                              document.querySelector("<?php echo '.project'.$keyProjects['projectID']; ?>").onclick=()=>{
                                                  document.querySelector("#isertHerePro").innerHTML = document.querySelector("<?php echo '#project'.$keyProjects['projectID']; ?>").innerHTML;
                                                  var imageto = document.querySelector("<?php echo '.project'.$keyProjects['projectID']; ?>").children[2];
                                                  var varlength =document.querySelector(".collabPanel").children.length;

                                                  // onclick change the icon to orange
                                                  if (imageto.className == "false") {
                                                       imageto.setAttribute("class",  "false")
                                                       imageto.src="/PORTO-MASTER/icons/icon/dropo.png";
                                                  }
                                                       for (let itss = 0; itss < varlength; itss++) {
                                                            var indexCreate = '.project' + itss;
                                                            if (document.querySelector(indexCreate).children[2] != imageto) {
                                                                 document.querySelector(indexCreate).children[2].src="/PORTO-MASTER/icons/icon/drop.png";
                                                            }    
                                                       }
                                                  }
                                        </script>
                                    <?php } ?>

                              </div>

                              <div id="isertHerePro" class="executeCollab"></div>
                              <!-- all information needed through those buttons -->
                              <?php foreach ($allPro as $keyProj) { ?>
                              <div id="<?php echo 'project'.$keyProj['projectID']; ?>" style="display:none" >
                                   <div class="opreationCollab">
                                   <?php
                                   //  Query root info
                                        $rootId= $keyProj['root'];
                                        $rootQuery = "SELECT * from `portofolio`.users where `users`.`id`= '$rootId' "; 
                                        $resultRoot= mysqli_query($db, $rootQuery); 
                                        $fetchRoot= mysqli_fetch_all($resultRoot, MYSQLI_ASSOC); 
                                   ?>
                                        <div class="rootPro">
                                             <?php foreach ($fetchRoot as $keyroot) { ?>
                                                  <p>root</p>
                                                  <img src="<?php echo '/PORTO-MASTER/icons/'.$keyroot['image']; ?>">
                                                  <p><?php echo $keyroot['userName']; ?></p>
                                             <?php } ?>
                                                  <h1><?php echo $keyProj['Name']; ?></h1>
                                        </div>
                                        <!-- <button><img src="#">My Task</button> -->
                                   
                                   </div>

                                   <div class="generalTaks">
                                        <!-- detail about the project -->
                                        <div class="secondTask" >
                                             <div class="detailsPro">
                                                  <h1><?php echo $keyProj['Name']; ?></h1>
                                                  <p><?php echo $keyProj['description']; ?></p> 
                                             </div>
                                             <!-- collaborators tasks -->
                                             <?php
                                                  //  Query task info
                                                  $taskToId= $keyProj['taskID'];
                                                  $taskQuery = "SELECT * from `portofolio`.expectation where `expectation`.`taskID`= '$taskToId' "; 
                                                  $resultTask= mysqli_query($db, $taskQuery); 
                                                  $fetchTask= mysqli_fetch_all($resultTask, MYSQLI_ASSOC); 
                                             ?>

                                             <div class="mytasks">
                                                  <?php foreach ($fetchTask as $keyTask) { ?>
                                                       <h1>Signed as: </h1> 
                                                       <p><i><?php echo $keyTask['taskName']; ?></i></p>
                                                       <h1>Expectation</h1>
                                                       <ul>
                                                            <li><?php echo $keyTask['description']; ?></li>
                                                            <li><?php echo $keyTask['expectations']; ?></li>
                                                       </ul>
                                                  <?php } ?>
                                             </div>

                                             <div lass="proDeliver">
                                                  <div class="progress">
                                                       <h1>Progress</h1>
                                                       <p><?php echo $keyProj['status']; ?></p>
                                                  </div>
                                                  <div class="deliver">
                                                       <h1>Push your work here</h1>
                                                       <p>Github: <a href="projectLamaria/group/repo0">projectLamaria/group/repo0</a></p>
                                                  </div>
                                             </div>
                                                 
                                        
                                        </div>





                                        <!-- All ressources shared with me -->
                                        <div class="tableressources">

                                             <?php 
                                             //  Query root info
                                             $sharableId= $keyProj['sharableId'];
                                             $proIdd= $keyProj['projectID'];
                                             // sharable ID
                                             $sharableQuery = "SELECT * from `portofolio`.sharable where `sharable`.`sharedID`= '$sharableId'"; 
                                             $resultSharable= mysqli_query($db, $sharableQuery); 
                                             $fetchSharable= mysqli_fetch_all($resultSharable, MYSQLI_ASSOC); 
                                              ?>
                                              


                                              <!-- shared with me -->
                                              <div class="sharedWithMe">
                                                  <!-- Ressources div -->
                                                  <h1>Shared with me</h1>
                                                  <?php  
                                                  if (sizeof($fetchSharable) == 0) { ?>
                                                       <h3 style="text-align:center; margin-top:40px; font-weight:lighter; font-size:15px"> 
                                                       No file shared with me... </h3>
                                                  <?php }else{
                                                  $verifyers = false;
                                                  foreach ($fetchSharable as $keyShared) { 
                                                       
                                                        $explodeId = explode('/', $keyShared['accessedBy']);
                                                            if ( sizeof($explodeId) <= 0) {
                                                            echo "";
                                                            }else{ 
                                                                 $checker = false;
                                                                 foreach ($explodeId as $keyAccessedBy) {
                                                                      if ($keyAccessedBy == $userId) {
                                                                           $checker = true;
                                                                           $verifyers = true;
                                                                      }        
                                                                 } 
                                                                 if ($checker == true) {?>
                                                                 <div id="ressources">
                                                                      <div id="headerRe">
                                                                           <?php foreach ($fetchInuser as $keyPartageur) {
                                                                                if ($keyPartageur['id'] == $keyShared['userThatShared']) {?>
                                                                                  <p>Shared By: <?php echo $keyPartageur['email']; ?></p>
                                                                          <?php } } ?>
                                                                           
                                                                      </div>
                                                                      <!-- Start listing them here -->
                                                                      <div id="contentRe">
                                                                           <div>
                                                                                <p><?php echo $keyShared['sharedDate']; ?></p>
                                                                                <p><?php echo $keyShared['Comment']; ?></p>
                                                                           </div>
                                                                           <div id="ressLink">
                                                                                <?php
                                                                                $expRessources= explode('/', $keyShared['ressources']);
                                                                                foreach ($expRessources as $keySharedFolder) { ?>
                                                                                     <!-- link bellow -->
                                                                                     <a href="<?php echo '/PORTO-MASTER/icons/'.$keySharedFolder; ?>">
                                                                                          <button class="btn">
                                                                                               <p> <?php echo $keySharedFolder; ?> </p>
                                                                                               <img src="/PORTO-MASTER/icons/icon/downloaded.png">
                                                                                          </button>
                                                                                     </a>
                                                                                <?php } ?>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            <?php } }  }
                                                            if ($verifyers  == false) { ?>
                                                                  <h3 style="text-align:center; margin-top:40px; font-weight:lighter; font-size:15px"> 
                                                                    No file shared with me... </h3>
                                                      <?php } } ?>      
    
                                              </div>

                                              <!-- I shared with them -->
                                              <div class="Ishared">
                                                  <h1>I Shared with others</h1>
                                              
                                                   <!-- Ressources div -->
                                                  <?php 
                                                  if (sizeof($fetchSharable) == 0) { ?>
                                                       <h3 style="text-align:center; margin-top:40px; font-weight:lighter; font-size:15px"> 
                                                       No file shared with others... </h3>
                                                  <?php }else{
                                                  $verifyer = false;
                                                  foreach ($fetchSharable as $keyShared1) {
                                                        ?>

                                                  
                                                       <!-- condition true list all files -->
                                                        <?php if ($keyShared1['userThatShared'] == $userId) {
                                                             $verifyer = true; ?>
                                                       
                                                       <div id="ressources">
                                                            <div id="headerRe">
                                                                 <p>Shared with-</p>
                                                                 <div>
                                                                     <?php
                                                                      $explodeStaff = explode('/', $keyShared1['accessedBy']); ?>
                                                                      <p style="padding:5px; float:left; ">
                                                                      <?php
                                                                      foreach ($fetchInuser as $keyPartageur) {
                                                                           foreach ($explodeStaff as $explodeStaffId) {
                                                                                if ($explodeStaffId == $keyShared1['userThatShared']) { ?>
                                                                                    <i style="color:darkgray;"><?php echo $keyPartageur['email']; ?></i>
                                                                               <?php echo " || "; }
                                                                           } } ?>
                                                                      </p>
                                                                      
                                                                 </div>
                                                            </div>
                                                            <div id="contentRe">
                                                                 <div>
                                                                      <p><?php echo $keyShared1['sharedDate']; ?></p>
                                                                      <p><?php echo $keyShared1['Comment']; ?></p>
                                                                 </div>
                                                                 <div>
                                                                      <?php
                                                                      $expRessources= explode('/', $keyShared1['ressources']);
                                                                      foreach ($expRessources as $keySharedFolder) { ?>
                                                                                          
                                                                           <a href="<?php echo '/PORTO-MASTER/icons/'.$keySharedFolder; ?>">
                                                                                <button class="btn">
                                                                                     <p>Download : "<?php echo $keySharedFolder; ?>" </p>
                                                                                     <img src="/PORTO-MASTER/icons/icon/downloaded.png">
                                                                                </button>
                                                                           </a>
                                                                      <?php } ?>   
                                                                 </div>
                                                            </div>
                                                       </div> 
                                                  <?php } } if($verifyer == false){ ?>
                                                       <h3 style="text-align:center; margin-top:40px; font-weight:lighter; font-size:15px"> 
                                                       No file shared with others... </h3>
                                                  <?php } }  ?> 

                                              </div>
                                        <!-- ########### end  ressources-->
                                        </div>

                                   </div>



                              </div>
                              <?php } ?>

                              

  
                          </div>

                         