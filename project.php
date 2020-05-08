<?php
  include 'header.php';
  // "localhost", "root", "", "archidb"
// $db = mysqli_connect("localhost", "root", "", "portofolio");
$db = mysqli_connect("db4free.net", "mamadykante", "123456789", "portofolio");
if (mysqli_connect_errno()){
    echo 'Failed to connect to MYSQLI'. mysqli_connect_errno();
}
$sql = "SELECT distinct (`category`) FROM `gallerycollection` "; 
$result= mysqli_query($db, $sql); 
$catFetch= mysqli_fetch_all($result, MYSQLI_ASSOC); 

$sql1 = "SELECT * FROM `gallery` "; 
$result1= mysqli_query($db, $sql1); 
$catFetch1= mysqli_fetch_all($result1, MYSQLI_ASSOC); 
?>


<section> 


    <div id=projectShow>

        
         <div id="gallerfetch">
         <?php foreach ($catFetch1 as $keygal) {
             
        ?>
             <img id="styleImage" src=<?php echo "/icons/all/".$keygal["images"]; ?> >
         <?php } ?>
        
         </div>
         <!-- <i class="fa fa-caret-right" id="move"></i> -->

    </div>



</section>
