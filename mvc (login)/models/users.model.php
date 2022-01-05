<?php 
 include_once '../routes/router.php';
 include_once $runQuery;

 class User{
    private $id;
    private $name;
    private $username;
    private $pno;
    private $email;
    private $password;

    function insert_User($name, $pno, $username, $email, $hashed_password){
        $sql = "INSERT INTO `bloggerpost`.`users` (`name`, `pno`, `username`, `email`, `password`) VALUES ('$name','$pno','$username','$email','$hashed_password')";
        return runQuery($sql);
    }

    function get_By_Username($username){
        $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `username`='$username'";
        return runQuery($sql);
    }

    function get_By_Email($email){
        $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `email`='$email'";
        return runQuery($sql);
    }

    function get_By_Pno($pno){
        $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `pno`='$pno'";
        return runQuery($sql);
    }
 }
?>