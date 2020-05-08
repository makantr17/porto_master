                         <h1 id="manageH">Publication</h1>
                         <div class="executeInPub">
                              <button onclick="listThatPublished()">List Published Dates</button>
                              <button onclick="addNewP()">New publish</button>
                              <button onclick="deleteP()">Delete</button>
                         </div>
                         <div id="headerPublished">
                             <p>Last publication: 15/02/2020; Comment: 15  liked: 200  Followers: 50; </p>
                             <p> Published: <?php echo sizeof($allInGallery);  ?> </p>
                          </div>
                         
                         <!-- play with container publisher when ever button above clicked -->
                         <div class="containerPublished" >
                              
                              <!-- Delete existing published  -->
                              <div style="display:none" id="holder3">
                                   <div class="deletePub">
                                         <form method="post" id="delPub" action="deletePub.php" enctype="multipart/form-data">
                                             <?php  foreach ($allInGallery as $categore) { ?>
                                              <!-- Loop here -->
                                              <div class="listDelete">
                                                   <p><?php echo $categore['id']; ?></p>
                                                   <p><?php echo $categore['title']; ?></p>
                                                   <p><?php echo $categore['date']; ?></p>
                                                   <input style="margin-top:15px" type="checkbox" name="selected">
                                              </div>

                                             <?php } ?>

                                             <input style="display:none" type="text" name="forDelete">

                                             
                                             <input style="width:150px; height:30px; border-radius:10px; border:1px solid gray;
                                                   background-color:orange; margin-top:30px; float:right" name="submit" type="submit" value="confirm">
                                         </form>
                                   </div>
                              </div>
     
     <script>
          
          var delForm = document.getElementById("delPub");
          if (window.addEventListener){
               delForm.addEventListener('submit', checkDelSubmit, true);
          } 

    function checkDelSubmit(e){
         
         var checkCount = 0;
         var allstring= "";
       
          for (let tex = 0; tex < (delForm.elements.length - 2); tex++) {
               if (delForm.elements[tex].checked) {
                    checkCount = checkCount + 1;
                    allstring = allstring + '/' + delForm.elements[tex].parentElement.children[0].innerText;
               }
          }
          if(checkCount == 0){
               alert("none checked");
               checkPub0 = true;
               e.preventDefault();
          }
          if(checkCount > 0){
                  alert(allstring);
              delForm.elements['forDelete'].value = allstring;
              
          }

    }
     
     
     </script>

                                
                              <div style="display:none" id="holder1">
                              <!-- New published here -->
                                  <div  class="newPub">
                                        <div id="createNewPublishHeader">
                                             <h1>Create new Publication</h1> <p>Storage allocated: 5; Storage used: <?php echo sizeof($allInGallery);  ?></p>
                                             <?php if (sizeof($allInGallery) == 5) { ?>
                                                <div style="border-radius:20px; background-color:red; height:20px; width:20px; margin:10px; float:right" ></div>
                                             <?php } else{ ?>
                                                <div style="border-radius:20px; background-color:green; height:20px; width:20px; margin:10px; float:right" ></div>
                                             <?php } ?>
                                        </div>
                                        <!-- check if the storage is atteinded -->
                                        <?php if (sizeof($allInGallery) >= 5) { ?>
                                             <h1 style="font-size:16px; text-align:center; margin-top:50px; font-weight:lighter">Reached maximum publication allocated to you....</h1>
                                        <?php } else{ ?>

                                             <form method="post" id="pubForm" action="createNewPub.php" enctype="multipart/form-data">
                                                  <div class="sectionForm1">
                                                       <div>
                                                            <input name="pubTitle" type="text" placeholder="Published title">
                                                            <label id="label1">maximum lenght 11</label>
                                                       </div>
                                                       <div>
                                                            <input name="description" type="text" placeholder="Details about publication">
                                                            <label id="label2">maximum lenght 100</label>
                                                       </div>
                                                       <div>
                                                            <input name="moreDetail" type="text" placeholder="Description and more comment of the publication">
                                                            <label id="label3">maximum lenght 200</label>
                                                       </div>

                                                       <div>
                                                            <input style="display:none" name="date" type="text" >
                                                       </div>

                                                       <div>
                                                            <input style="display:none" name="userId" type="text" value="<?php echo $userId; ?>">
                                                       </div>
                                                  
                                                  </div>
                                                  <div class="sectionForm2">
                                                       <div>
                                                            <input name="landFile" type="file"  placeholder="Add file">
                                                            <label>Upload landing Image</label>
                                                       </div>
                                                       <div>
                                                            <input name="upload[]" type="file" multiple placeholder="Add file">
                                                            <label>Upload multiple files max(5)</label>
                                                       </div>

                                                       <input style="width:150px; height:30px; border-radius:5px; border:1px solid orange;
                                                       background-color:orange; margin-top:50px; float:right" type="submit" name="submit" value="Submit">
                                                  
                                                  </div>
                                             
                                             </form>
                                        <?php } ?>
                                   </div>
                              </div>

                              <div style="display:block"  id="holder2">   
                                   <!-- I holde listPub -->
                                   <div  class="holdListPub">
                                        <!-- List published start here -->
                                        <div class="listPub" >
                                             <?php  foreach ($allInGallery as $categore) { ?>
                                                  <div class="childListPub">
                                                       <p><?php echo $categore['title']; ?></p>
                                                       <p><?php echo $categore['date']; ?></p>
                                                       <img id="open" src="/PORTO-MASTER/icons/icon/door.png">
                                                       <!-- to hide -->
                                                       <div style="display:none">
                                                            <div class="shapeMe">
                                                                 <p><?php echo 'Followers: '.$categore['follows'].' Likes: '.$categore['liked'].' Dislikes: '.$categore['disliked']; ?></p>
                                                                 <div class="firstLine">
                                                                      <img src="<?php echo '/PORTO-MASTER/icons/'.$categore['resources']; ?>">
                                                                      <p><?php echo $categore['Details'].'<br>'.$categore['description']; ?></p>
                                                                 </div>
                                                                 <div class="secondLine">
                                                                       <?php 
                                                                       $moreRessource = explode('/', $categore['moreRessources']);
                                                                       foreach ($moreRessource as $moreImges) {
                                                                       ?>
                                                                           <img src="<?php echo '/PORTO-MASTER/icons/'.$moreImges; ?>">
                                                                       <?php } ?>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <!-- close to hide -->
                                                  </div>

                                             <?php } ?>
                                         
                                        </div>

                                        <!-- by get element content list pub images there -->
                                        <div class="openListPub">
                                             <!-- <p>Display here</p> -->
                                        </div>
                                   </div>
                              </div>

                          </div>



                                                 
<script>

    var pubForm = document.getElementById("pubForm");
    // var projectName= form.elements['user'];
    var userId= pubForm.elements['userId'];
    if (window.addEventListener){
     pubForm.addEventListener('submit', checkPubSubmit, true);
    } 

    function checkPubSubmit(e){
         var checkPub0 = false;
         var checkPub1 = false;
         var checkPub2 = false;
         var checkPub3 = false;
          if(pubForm.elements['pubTitle'].value == '' || pubForm.elements['pubTitle'].value.length > 20){
               pubForm.elements['pubTitle'].style.border="1px solid red";
               checkPub0 = true;
               e.preventDefault();
          }
          if(pubForm.elements['pubTitle'].value != '' && pubForm.elements['pubTitle'].value.length < 20){
               pubForm.elements['pubTitle'].style.border="1px solid rgb(238, 230, 230)";
          }
       
          if(pubForm.elements['description'].value == '' || pubForm.elements['description'].value.length > 150){
               pubForm.elements['description'].style.border="1px solid red";
               checkPub1 = true;
               e.preventDefault();
          }
          if(pubForm.elements['description'].value != '' && pubForm.elements['description'].value.length < 150){
               pubForm.elements['description'].style.border="1px solid rgb(238, 230, 230)";
          }


          if(pubForm.elements['moreDetail'].value == '' || pubForm.elements['moreDetail'].value.length > 150){
               pubForm.elements['moreDetail'].style.border="1px solid red";
               checkPub2 = true;
               e.preventDefault();
          }
          if(pubForm.elements['moreDetail'].value != '' && pubForm.elements['moreDetail'].value.length < 150){
               pubForm.elements['moreDetail'].style.border="1px solid rgb(238, 230, 230)";
          }



          if(pubForm.elements['landFile'].value == '' && pubForm.elements['multipleFile'].value == ''){
               alert("Choose landing image and multiple views img");
               checkPub3 = true;
               e.preventDefault();
          }

          if (checkPub0 == false && checkPub1 == false && checkPub2 == false && checkPub3 == false) {
               var todayDate = new Date();
               var pubDate = todayDate.getFullYear()+'-'+(todayDate.getMonth() + 1) + '-' + todayDate.getDate();
               pubForm.elements['date'].value =pubDate;
               alert(pubForm.elements['date'].value);
          }
         
    }




</script>

