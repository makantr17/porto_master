<?php
  include 'header.php';

//   $db = mysqli_connect("localhost", "root", "", "portofolio");
$db = mysqli_connect("db4free.net", "mamadykante", "123456789", "portofolio");
if (mysqli_connect_errno()){
    echo 'Failed to connect to MYSQLI'. mysqli_connect_errno();
}


$sql = "SELECT * FROM `fellow` "; 
$result= mysqli_query($db, $sql); 
$catFetch= mysqli_fetch_all($result, MYSQLI_ASSOC); 

$sql00 = "SELECT * FROM `comment` "; 
$result00= mysqli_query($db, $sql00); 
$catFetch00= mysqli_fetch_all($result00, MYSQLI_ASSOC); 


$sql2 = "SELECT `fellow`.`image`, `fellow`.`fellow_id`, `comment`.`fellow_id`, `comment`.`message`, `comment`.`time` 
FROM `fellow`, `comment` where fellow.fellow_id = comment.fellow_id "; 
$result2= mysqli_query($db, $sql2); 
$catFetch2= mysqli_fetch_all($result2, MYSQLI_ASSOC); 



?>

<section id="fellowship">
 <!-- Slide image  -->
      <div id="slide">
          <img src="/icons/back.jpg" >                       
         <h1>Fellowship being Followed</h1>
         <p>Boost my profile and connect me to others</p>
      </div>

<!-- mini menu -->
      <div id="graber" onclick = "graberFetch()">Messagerie </div>
      <div id="Menu">
      <?php
       $comment = 0;
       $liked = 0;
       $view = 0;
      foreach ($catFetch as $extend) {
        //  $folowers = $extend['folowers'] + $folowers;
         $liked = $extend['liked'] + $liked;
         $view = $extend['view'] + $view;
          
      }
      
      foreach ($catFetch00 as $extend) {
        $comment = 1+ $comment;
     } ?>
      
      


            <ul>
                <li>Comment <?php echo $comment; ?></li>
                <li>liked <?php echo $liked; ?></li>
                <li>views <?php echo $view; ?></li>
            </ul>

      </div>
     
      <!-- Grab comments -->
     
      <div id="dataRecords">
            <h1>All the records</h1>
            <!-- Comment box -->
            <div id="commentBox">
                <img id='myUse' scr="">
                <!-- this form hold user message -->
                <form action="message.php" method="post" >
                    <input style="display:none"  id="myId" style="display:block" type="text" value="" name="fellowId">
                    <input  id="comt" type="text" placeholder="comment" name="comment">
                    <input id="saveS" type="submit" name="save" value="S">
                </form>
            </div>

          <!-- After comment, user will see comment here -->
            <div id="seeAllHere">
              <?php foreach ($catFetch2 as $commentDiff) { ?>
              <!-- fetch all the div -->
                    <div id="multipleComment">
                        <img  src=<?php echo "/icons/".$commentDiff['image']; ?> >
                        <p><?php echo $commentDiff['message']; ?></p>
                        <h4><?php echo $commentDiff['time']; ?></h4>
                    </div>

              <?php } ?>

            </div>

      </div>

      <div id="allCommunity">
          <!-- fetch all the users here -->
          <?php foreach ($catFetch as $allfellow) { ?>

          <div id="folowers">
              <div id="biography">
                  <img class='mypict' id="<?php echo "pro".$allfellow['fellow_id']; ?>" src= <?php echo "/icons/".$allfellow['image']; ?> >
                  <h3><?php echo $allfellow['fullName']; ?></h3>
                  <h3><?php echo $allfellow['email']; ?></h3>
                  <h3><?php echo $allfellow['contact']; ?></h3>
              </div>

              <div id="profile">
                  <h3><?php echo $allfellow['profession']; ?></h3>
                  <p><?php echo $allfellow['career']; ?></p>
                  <p><?php echo $allfellow['address']; ?></p>
                  <p style="font-size:16px; color:green"><?php echo $allfellow['Status']; ?></p>
              </div>

              <div id="views">
                  <ul>
                        <li><img class='icons' id=<?php echo "like".$allfellow['fellow_id']; ?> onclick=<?php echo "like".$allfellow['fellow_id'].'()' ?> src="/icons/like.jpg"><?php echo $allfellow['liked']; ?></li>
                        <li><img class='icons' id=<?php echo "view".$allfellow['fellow_id']; ?> onclick=<?php echo "view".$allfellow['fellow_id'].'()' ?> src= "/icons/eye.png"><?php echo $allfellow['view']; ?></li>
                        <li><img class='icons' id= <?php echo "follow".$allfellow['fellow_id']; ?>  onclick=<?php echo "follow".$allfellow['fellow_id'].'()' ?>  src="/icons/followers.png"><?php echo $allfellow['folowers']; ?></li>
                        <li><img class='icons' id="comment" onclick=<?php echo "comment".$allfellow['fellow_id'].'()' ?>  src= "/icons/comment.png"></li>
                  </ul>
                 
              </div>
              
           </div>

           


          <?php  } ?>
          
      </div>


</section>
  
<script>

          <?php foreach ($catFetch as $allcore) { ?>
                function  <?php echo "comment".$allcore['fellow_id'].'()' ?>{
                    document.getElementById('comt').style.display='block';
                    document.getElementById('myUse').src = "<?php echo '/icons/'.$allcore['image']; ?>";
                    document.getElementById('myId').value = "<?php echo $allcore['fellow_id']; ?>";
                }


                function  <?php echo "follow".$allcore['fellow_id'].'()' ?>{
                    document.getElementById('<?php echo "follow".$allcore["fellow_id"]; ?>').src="/icons/view.jpg";

                }





   



                function  <?php echo "view".$allcore['fellow_id'].'()' ?>{
                    document.getElementById('<?php echo "view".$allcore["fellow_id"]; ?>').src="/icons/like.jpg";
                }

            <?php } ?>




          
            <?php foreach ($catFetch as $teste) { ?>
                function <?php echo "like".$teste['fellow_id']."()" ?>{
                    alert(<?php echo "like".$teste['fellow_id']; ?>);
                       $count = 0;
                  <?php
                        $count = $teste["liked"] + 1;
                        $id= $teste["fellow_id"];
                        $myInser = "UPDATE `fellow` SET `fellow`.`liked` = $count  where fellow.`fellow_id` = '$id' "; 
                        $theRw= mysqli_query($db, $myInser); 
                    // $catFetch0= mysqli_fetch_all($theRw, MYSQLI_ASSOC);
                    
                    
                        
                     ?> 
                }
                    
                   
                

            <?php } ?>



            function graberFetch() {
                if ( document.getElementById("dataRecords").style.display == "block") {
                    document.getElementById("dataRecords").style.display="none";
                }
                else{
                    document.getElementById("dataRecords").style.display="block";
                }
               
            }
</script>




<!-- upload file in it -->
<?php  
    $conn = mysqli_connect('localhost', 'root', '', 'file-management');

    if(isset($_POST['save'])){
        $filename = $_FILES['myfile']['name'];

        $destination = 'uploads/' . $filename;
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file = $_FILES['myfile']['tmp_name'];
        $size = $_FILES['myfile']['size'];

        if(!in_array($extension, ['zip', 'pdf', 'docx'])){
            echo 'you file extension must be .zip, .pdf or .docx'; 
        }elseif($_FILES['myfile']['size'] > 1000000) {
            echo "File too large!";
        }else{
            if(move_uploaded_file($file, $destination)){
                $sql = "INSERT INTO files(name, size, downloads) VALUES('$filename', $size, 0)";
                if(mysqli_query($conn, $sql)){
                    echo "File uploaded successfully";
                }
            }
            else {
                echo "Failed to upload file.";
            }
        }
    }

?>



<!-- download file -->
<?php   

   $f = "resume.doc";
   $file = ("myfolder/$f");
   $filetype = filetype($file);
   $filename = basename($file);
   header("Content-Type: ".$filetype);
   header("Content-Length: ".filesize($file));
   header("Content-Disposition: attachment; filename=".$filename);
   readfile($file);
?>

<?php  
// filesLogic.php
if(isset($_GET['file_id'])){
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files where id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        header('uploads/' . $file['name']);

        // now update downloads counts
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }


}

?>


</body>
</html>
