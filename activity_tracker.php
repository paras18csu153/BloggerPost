<?php
// Start the session
session_start();
if(isset($_SESSION['username']) || !empty($_SESSION['username'])){

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
  // last request was more than 30 minutes ago
  session_unset();     // unset $_SESSION variable for the run-time 
  session_destroy();   // destroy session data in storage
  echo "<script> location.href='login.php'; </script>";
}
else{
  $id = $_SESSION["uid"];
  $_SESSION['LAST_ACTIVITY'] = time();
  $server = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server, $username, $password);

  if(!$con){
    die("Connection to this database failed due to ". mysqli_connect_error());
  }

  $sql = "UPDATE `bloggerpost`.`users_activity` SET `last_access_AT`=current_timestamp(), `is_online`=true WHERE `user_id`='$id'";
  $result = $con->query($sql);

  $con->close();
}
}
?>