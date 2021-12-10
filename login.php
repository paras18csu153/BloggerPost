<?php
    if(isset($_POST['username']) && isset($_POST['password'])){
        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password);

        if(!$con){
            die("Connection to this database failed due to ". mysqli_connect_error());
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `username`='$username'";
        $result = $con->query($sql);
        if($result->num_rows==0){
            $con->close();
            die("User doesn't exist!!");
        }

        if(password_verify($password, mysqli_fetch_array( $result )['password'])){
            echo("Login Successful!!");
        };

        $con->close();
    }
    else{
        echo "Some Error Occured in parameters!!";
    }
?>