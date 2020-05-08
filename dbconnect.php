<?php

    $db = mysqli_connect("localhost", "root", "", "portofolio");
    // $db = mysqli_connect("db4free.net", "mamadykante", "123456789", "portofolio");
    if (mysqli_connect_errno()){
        echo 'Failed to connect to MYSQLI'. mysqli_connect_errno();
    }

?>