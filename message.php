
<?php 

   $comment = isset($_POST['comment']) ? $_POST['comment']: '' ;
   $id = isset($_POST['fellowId']) ? $_POST['fellowId']: '' ;
   $date1 = date("Y-m-d H:i:s");

// compare email and password from the data base
$db = mysqli_connect("db4free.net", "mamadykante", "123456789", "portofolio");
if (mysqli_connect_errno()){
    echo 'Failed to connect to MYSQLI'. mysqli_connect_errno();
}






if ($comment == '' or $id == '') {
    header("location: fellows.php");
}  else {
    $sql = "INSERT INTO `comment`(`fellow_id`, `message`, `time`) VALUES ('$id', '$comment', '$date1')"; 
    $result= mysqli_query($db, $sql); 
    header("location: index.php");
  
}


?>














<?php
    require_once __DIR__. '/connect.php';
    class API{
        function Select(){
            $db = new Connect;
            $users = array();
            $data = $db->prepare('SELECT * from gallery ORDER BY id');
            $data->execute();
            while ($outputData= $data->fetch(PDO::FETCH_ASSOC)) {
                $users[$outputData['id']] = array(
                    'id' => $outputData['id'],
                    'title' => $outputData['title'],
                    'resources' => $outputData['resources'],
                    'date' => $outputData['date']
                );
                # code...
            }
            
            return json_encode($users);

        }
    }
    $API = new API;
    // header('content-Type: application/json');
    echo $API->Select();
    // echo $API;


?>
