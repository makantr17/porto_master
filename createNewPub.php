<?php
    include "dbconnect.php";

    if (isset($_POST['submit'])) {
        $user = $_POST['userId'];
        $title = $_POST['pubTitle'];
        $description = $_POST['description'];
        $more = $_POST['moreDetail'];
        // $landFile = $_POST['landFile'];
        // $multi = $_POST['multipleFile'];
        $date = $_POST['date'];
        
        $lastIndex = "SELECT * FROM `gallery`"; 
        $resultIndex = mysqli_query($db, $lastIndex); 
        $fetchIndex= mysqli_fetch_all($resultIndex, MYSQLI_ASSOC);
        $id = sizeof($fetchIndex);

        $filename = $_FILES['landFile']['name'];

        //multiple file here;
        $linkAllFiles = '';
        $mfileName = array_filter($_FILES['upload']['name']);
        echo $total = count($_FILES['upload']['name']);
        if ($total > 5) {
            echo "maximum files is 5";
        }else{
            
            // loop
            for ($i=0; $i < $total ; $i++) { 
                # code...
                $nameMultiple =$_FILES['upload']['name'][$i];
                $destina = 'C:\xampp\htdocs\porto-master\icons/' . $nameMultiple;
                $extens = pathinfo($nameMultiple, PATHINFO_EXTENSION);
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                $tmpSize = $_FILES['upload']['size'][$i];

                if(!in_array($extens, ['jpg', 'png'])){
                    echo 'you file extension must be .zip, .jpg, .png, .jpeg .pdf or .docx'; 
                }elseif($tmpSize > 1000000) {
                    echo "File too large!";
                }else{
                    if(move_uploaded_file( $tmpFilePath, $destina)){
                        if ($i == 0) {
                            $linkAllFiles = $nameMultiple;
                        }else{
                            $linkAllFiles = $linkAllFiles.'/'.$nameMultiple;
                        }
                         echo "successfully uploaded";
                    }
                }

            }

        }



        $destination = 'C:\xampp\htdocs\porto-master\icons/' . $filename;
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file = $_FILES['landFile']['tmp_name'];
        $size = $_FILES['landFile']['size'];

        if(!in_array($extension, ['zip', 'pdf', 'jpg', 'png', 'docx'])){
            echo 'you file extension must be .zip, .jpg, .png, .jpeg .pdf or .docx'; 
        }elseif($_FILES['landFile']['size'] > 1000000) {
            echo "File too large!";
        }else{
            if(move_uploaded_file($file, $destination)){
                // $sql = "INSERT INTO files(name, size, downloads) VALUES('$filename', $size, 0)";
                $sql = "INSERT INTO `gallery`(`id`, `title`, `Details`, `date`, `resources`, `description`, `userId`, `moreRessources`) 
                VALUES('$id', '$title', '$more', '$date', '$filename', '$description', '$user', '$linkAllFiles')";
                if(mysqli_query($db, $sql)){
                    echo "File uploaded successfully";
                    header("location: userPage.php");
                    }

                }
            }











        
     
    
    
    }







?>