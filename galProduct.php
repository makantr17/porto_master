<div id="galProduct">

      <div class="pop" id='<?php echo "cat".$galProduct1['id']; ?>' >
    <!-- Div containing further information -->
        <div id="further">
            <span  onclick='<?php echo "groupform".$galProduct1['id']."()" ?>' class='close' title='Close PopUp'>&times;</span>
            <img  src=<?php echo "/icons/makant.jpg"; ?> >
            <h2>Mamady Kante</h2>
            <p style="font-weight:bold; color:green">
                <img style="width:15px; height:15px; margin:3px;" src='<?php echo "/icons/product.jpg"; ?>' >
                <?php echo $galProduct1['category']."<br>".$galProduct1['categoryName'] ?>
            </p>
            <p id="detailsR"> 
                <?php echo $galProduct1['details'] ?>
            </p>
        </div>
        <!-- Div containing images -->
        <div id="moreOfImage" >
            <?php 
            $counter=0;
            foreach ($ex as $moreP) {
              ?>
              <img style="width:20px; box-shadow:none; height:20px; margin:5px; margin-top:2px;" src='<?php echo "/icons/product1.jpg"; ?>' >
              <p><?php echo $galProduct1['categoryName']." ".$exFace[$counter]; ?> </p>
              <img src='<?php echo "/icons/".$moreP; ?>' >
              <?php  $counter= $counter + 1; } ?>

        </div>

    </div>
                              <!-- ------------------------------------------ -->
      <h3><?php echo $galProduct1['categoryName']; ?><img src="/icons/galery.png" style="width:30px; height:30px; float:left; margin-right:10px; border-radius:30px">
            <img onclick="iconLike()" src="/icons/like.jpg" style="width:20px; height:20px; float:right; margin-right:10px; box-shadow:2px 1px 1px 1px rgba(187, 187, 187, 0.699); border-radius:20px">
            <img src="/icons/love.jpg" style="width:20px; height:20px; float:right; margin-right:10px;box-shadow:2px 1px 1px 1px rgba(187, 187, 187, 0.699); border-radius:20px">
            <img onclick="comment()" src="/icons/comment.png" style="width:20px; height:20px; float:right; margin-right:10px; box-shadow:2px 1px 1px 1px rgba(187, 187, 187, 0.699); border-radius:20px">
      </h3>
      <img id="organisercontent"  src=<?php echo "/icons/".$galProduct1['images']; ?>  >
      <button onclick= <?php echo "function".$galProduct1['id']."()"; ?> >More Pict</button>
      <p><?php echo $galProduct1['description']; ?> </p>
        <p>
          <img src="/icons/archicad.jpeg" style="width:15px; height:15px; float:left; margin-right:5px; border-radius:15px">
          <img src="/icons/artlantis.jpg" style="width:15px; height:15px; float:left; margin-right:5px; border-radius:15px">
          <img src="/icons/photoshop.jpg" style="width:15px; height:15px; float:left; margin-right:5px; border-radius:15px">
            <form id="comment" style="display:none">
                <input  type="text" style="width:150px;  height:15px; border-radius:10px; border:1px solid gray; float:right; background-color: white; ">
            </form>
        </p>

    </div>
    <script>
          function iconLike(){
              alert("cliked");     
          }
          function comment(){
            document.querySelectorAll("form#comment").style.display="Block";
          }
    </script>
