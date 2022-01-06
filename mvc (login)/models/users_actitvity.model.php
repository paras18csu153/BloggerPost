<?php 
 include_once '../routes/router.php';
 include_once $runQuery;

 class User_Activity extends User{
    private $id;
    private $user_id;
    private $last_access_at;
    private $is_online;

    function getId() {
		return $id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getUser_id() {
		parent::getId();
	}

	function setUser_id($user_id) {
		parent::setId($user_id);
	}

	function getLast_access_at() {
		return $last_access_at;
	}
	function setLast_access_at($last_access_at) {
		$this->last_access_at = $last_access_at;
	}

	function getIs_online() {
		return $is_online;
	}

	function setIs_online($is_online) {
		$this->is_online = $is_online;
	}

    function get_By_UserID(){
        $sql = "SELECT * FROM `bloggerpost`.`users_activity` WHERE `user_id`='$id'";
        return runQuery($sql);
    }

    function insert_user_activity(){
        $sql = "INSERT INTO `bloggerpost`.`users_activity` (`user_id`, `last_access_At`, `is_online`) VALUES ('$id',current_timestamp(), true);";
        return runQuery($sql);
    }

    function update_user_activity(){
        $sql = "UPDATE `bloggerpost`.`users_activity` SET `last_access_AT` = current_timestamp(), `is_online` = true WHERE `user_id` = '$id'";
        return runQuery($sql);
    }
 }
?>