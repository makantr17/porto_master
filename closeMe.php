<?php
session_start();
     if (isset($_POST['closeMe'])) {
            $_SESSION['popUp'] = 'none';
            header("location: userPage.php");
         } ?>