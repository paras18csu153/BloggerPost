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

    function getId() {
		return $id;
	}

	function setId($id) {
		$this->id = $id;
	}

    function getName() {
		return $this->name;
	}

    function setName($name) {
		$this->name = $name;
	}

    function getUsername() {
		return $username;
	}

	function setUsername($username) {
		$this->username = $username;
	}

	function getPno() {
		return $pno;
	}

	function setPno($pno) {
		$this->pno = $pno;
	}

	function getEmail() {
		return $email;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function getPassword() {
		return $password;
	}

	function setPassword($password) {
		$this->password = $password;
	}

    function insert_User(){
        $sql = "INSERT INTO `bloggerpost`.`users` (`name`, `pno`, `username`, `email`, `password`) VALUES ('$name,'$pno','$username','$email','$password')";
        return runQuery($sql);
    }

    function get_By_Username(){
        $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `username`='$username'";
        return runQuery($sql);
    }

    function get_By_Email(){
        $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `email`='$email'";
        return runQuery($sql);
    }

    function get_By_Pno(){
        $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `pno`='$pno'";
        return runQuery($sql);
    }
 }
?>