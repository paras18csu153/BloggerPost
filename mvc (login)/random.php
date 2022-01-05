<?php
set_time_limit(5000);
// Start the session
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("Connection to this database failed due to ". mysqli_connect_error());
}

for($i = 0; $i < 100000; $i++){
    $name = "user-".uniqid()."-Name-".uniqid();
    $username = uniqid();
    $email = uniqid().'@gmail.com';
    $password = uniqid().uniqid();

    $sql = "INSERT INTO `db_seeder`.`users` (`name`, `username`, `email`, `password`) VALUES ('$name','$username','$email', '$password');";
    $result = $con->query($sql);

    echo "Record entered: $i<br>";
}

$con->close();
?>