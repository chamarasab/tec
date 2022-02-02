<?php
    $connection = mysqli_connect('localhost','root','','tec');

    if (mysqli_connect_errno()) {
        die('Database Connection Failed'.mysqli_connect_errno());
    } else {
        //echo "Connection Success!";
    }
?>