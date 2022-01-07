<?php 
 include_once '../routes/router.php';
 include_once $runQuery;
 include_once $user_model;

 class User_Activity extends User{
    private $id;
    private $user_id;
    private $last_access_at;
    private $is_online;

    function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getUser_id() {
		return parent::getId();
	}

	function setUser_id($user_id) {
		parent::setId($user_id);
	}

	function getLast_access_at() {
		return $this->last_access_at;
	}

	function setLast_access_at($last_access_at) {
		$this->last_access_at = $last_access_at;
	}

	function getIs_online() {
		return $this->is_online;
	}

	function setIs_online($is_online) {
		$this->is_online = $is_online;
	}

    function get_By_UserID(){
		$this->user_id = $this->getUser_id();
        $sql = "SELECT * FROM `bloggerpost`.`users_activity` WHERE `user_id`='$this->user_id'";
        return runQuery($sql);
    }

    function insert_user_activity(){
		$this->user_id = $this->getUser_id();
        $sql = "INSERT INTO `bloggerpost`.`users_activity` (`user_id`, `last_access_At`, `is_online`) VALUES ('$this->user_id',current_timestamp(), true);";
        return runQuery($sql);
    }

    function update_user_activity(){
		$this->user_id = $this->getUser_id();
        $sql = "UPDATE `bloggerpost`.`users_activity` SET `last_access_AT` = current_timestamp(), `is_online` = true WHERE `user_id` = '$this->user_id'";
        return runQuery($sql);
    }
 }
?>