<?php 
 include_once '../routes/router.php';
 include_once $runQuery;

 class User_Activity{
    private $id;
    private $user_id;
    private $last_access_at;
    private $is_online;

    function get_By_UserID($id){
        $sql = "SELECT * FROM `bloggerpost`.`users_activity` WHERE `user_id`='$id'";
        return runQuery($sql);
    }

    function insert_user_activity($id){
        $sql = "INSERT INTO `bloggerpost`.`users_activity` (`user_id`, `last_access_At`, `is_online`) VALUES ('$id',current_timestamp(), true);";
        return runQuery($sql);
    }

    function update_user_activity($id){
        $sql = "UPDATE `bloggerpost`.`users_activity` SET `last_access_AT` = current_timestamp(), `is_online` = true WHERE `user_id` = '$id'";
        return runQuery($sql);
    }
 }
?>