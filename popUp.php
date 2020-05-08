<div id="colli"><?php 
    
      $valueID = $_SESSION["projectID"];
      $proSql = "SELECT * FROM `project` where `projectID`= $valueID"; 
      $resultPro= mysqli_query($db, $proSql); 
      $allPro= mysqli_fetch_all($resultPro, MYSQLI_ASSOC); 
      foreach ($allPro as $keyMore) { 
?><div class="sectionProject"><div class="projectInfoContent"><h1><?php 
    echo $keyMore["Name"]; ?></h1><p><?php echo $keyMore["description"];
?></p><img id="styledOneImg" src="<?php echo '/PORTO-MASTER/icons/'.$keyMore['coverImage']; ?>"><p>Status: <?php
 echo $keyMore["status"]; 
?></p><p>Delivering: 3D modeling, 2D plans, Cotations, All views, Documentation</p></div><div class="collaboratorsPanel"><div class="headPro"><div><?php 
                                  $root= $keyMore["root"];
                                  $rootQ = "SELECT * from `portofolio`.users where `users`.`id`= '$root' "; 
                                  $resultR= mysqli_query($db, $rootQ); 
                                  $fetchR= mysqli_fetch_all($resultR, MYSQLI_ASSOC); 
                                  foreach ($fetchR as $kefetchR) {
?><img id="root" src="<?php echo '/PORTO-MASTER/icons/'.$kefetchR['image']; ?>"><p style="float:left; font-size:12px; color:orange; font-weight:bold; margin:0px;">root</p><?php
} ?></div><h1>Collaborators</h1><p><?php 
echo "Published: ".$keyMore["published"]." Deadline: ".$keyMore["expected"]; 
?></p><div class="headProImage"><img src="/PORTO-MASTER/icons/icon/download.png"><img src="/PORTO-MASTER/icons/icon/addMe.png"><img  onclick="closeBox()" src="/PORTO-MASTER/icons/icon/close.png"><?php
?></div></div><?php
                        $taskArray = explode("/", $keyMore["taskList"]);
                        $acquiredFor = explode("/", $keyMore["requiredForTask"]);
                        $collabProID= $keyMore["projectID"];
                        $collQuery = "SELECT `Users`.`id`, `users`.`userName`, `users`.`image`, `collaborators`.`collabID`,
                         `collaborators`.`projectID`,  `collaborators`.`userId`, `collaborators`.`taskID`,
                          `expectation`.`taskID`, `expectation`.`taskName` from `collaborators`, `users`, `expectation` 
                          where `collaborators`.`projectID`= $collabProID and `collaborators`.`taskID` = `expectation`.`taskID` and `collaborators`.`userId` = `users`.`id` "; 
                        $resultCollab= mysqli_query($db, $collQuery); 
                        $fetchCollab= mysqli_fetch_all($resultCollab, MYSQLI_ASSOC); 
?><div class="overviewColab"><div id="listColab"><h1>Actual States </h1> <table><tr><th>Assigned</th> <th>Profiles</th><th>Username</th></tr><?php 
                                     foreach($fetchCollab as $keyCollab) { ?> <tr><td><?php echo $keyCollab["taskName"]; ?></td><td><img src="<?php echo '/PORTO-MASTER/icons/'.$keyCollab['image']; 
?>"></td><td><?php echo $keyCollab["userName"]; ?></td></tr> <?php 
} ?></table></div><div id="listNeeded"><h1>Project Tasks</h1><table><tr><th>Task</th><th>Required</th><th>Remaining slot</th><th>Do Needed</th></tr><?php 
                            for ($n=0; $n < sizeof($taskArray) ; $n++) { 
?><tr><td><?php 
echo $taskArray[$n]; ?></td><td><?php echo $acquiredFor[$n]; 
?></td><?php 
                                            $identyCount = 0;
                                            foreach($fetchCollab as $keyCollab1) {
                                                if ($keyCollab1["taskName"] == $taskArray[$n]) {
                                                    $identyCount = $identyCount + 1;
                                                }
                                            }if ($identyCount == $acquiredFor[$n]) {
?><td><?php echo $acquiredFor[$n] -$identyCount; ?></td><td style="background:green; color:white">Completed</td><?php
                     }else { ?><td><?php echo $acquiredFor[$n] -$identyCount; ?></td><td style="background:orange">Nedeed</td><?php
                                } ?></tr><?php } ?></table></div></div><?php
               
?><div class="delivering"><h1>Delivering Process</h1><p></p><div class="importantElement"><?php 
                                  $explodeRessources = explode("/", $keyMore["ressources"]);
                                  foreach ($explodeRessources as $keyPlanRes) {
?><div><img src="<?php echo '/PORTO-MASTER/icons/'.$keyPlanRes; ?>"><a href="<?php echo '/PORTO-MASTER/icons/'.$keyPlanRes; ?>"><button class="btn"><i class="fa fa-download"></i>Download</button></a></div> <?php 
} ?></div></div></div></div><?php } ?></div>