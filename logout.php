<?php
    session_start();
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to this database failed due to ". mysqli_connect_error());
    }

    $id = $_SESSION["uid"];

    $sql = "UPDATE `bloggerpost`.`users_activity` SET `is_online`=false WHERE `user_id`='$id'";
    $result = $con->query($sql);

    session_destroy();
    echo "<script>history.back()</script>";
?>