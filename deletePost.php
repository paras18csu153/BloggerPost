<?php
// Start the session
session_start();
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

  $id = $_GET['id'];
  $user_id=$_SESSION['uid'];
  $sql = "SELECT * FROM `bloggerpost`.`user_blog_mapper` WHERE `blog_id`='$id'";
  $result = $con->query($sql);

  if($result->num_rows!=0){
      $row = $result->fetch_assoc();
    while($row) {
        if($row['user_id']==$user_id){
            $sql = "DELETE FROM `bloggerpost`.`blog` WHERE `id`='$id'";
            $result = $con->query($sql);
            break;
        }
        else{
            echo "<script>alert('The post does not belong to you. Do not dare to delete that!!');</script>";
            break;
        }
    }
  }
  else{
      echo "<script>alert('The post does not belong to you. Do not dare to delete that!!');</script>";
  }

  $con->close();

  echo "<script>history.back();</script>";
}
?>