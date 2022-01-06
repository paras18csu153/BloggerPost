<?php 
include_once '../routes/router.php';
include_once $session;
include_once $user_model;
include_once $user_activity_model;

if(isset($_SESSION['username']) || !empty($_SESSION['username'])){
    echo "User already Logged In!!";
    die("");
}

if(isset($_POST['name'])){
    if($_POST['name'] == ""){
      echo "<script>alert('Name cannot be empty!!');</script>";
      die("");
    }

    if($_POST['phone'] == ""){
      echo "<script>alert('Phone cannot be empty!!');</script>";
      die("");
    }

    if($_POST['email'] == ""){
      echo "<script>alert('Email cannot be empty!!');</script>";
      die("");
    }

    if($_POST['username'] == ""){
      echo "<script>alert('Username cannot be empty!!');</script>";
      die("");
    }

    if($_POST['password'] == ""){
      echo "<script>alert('Password cannot be empty!!');</script>";
      die("");
    }

    if($_POST['password1'] == ""){
      echo "<script>alert('Confirm Password cannot be empty!!');</script>";
      die("");
    }

    if(!preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/',$_POST['password'])){
      echo "<script>alert('Password does not match required format!!');</script>";
      die("");
    }

    $name = $_POST['name'];
    $pno = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];

    if(empty($name) || empty($pno) || empty($email) || empty($username) || empty($password) || empty($password1)){
        die("Please Fill all Fields!!");
    }

    if($password != $password1){
        die("Passwords don't match!!");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $user = new User();
    $user->setUsername($username);
    $user->setName($name);
    $user->setPno($pno);
    $user->setEmail($email);
    $user->setPassword($password);
        
    $result = $user->get_By_Username();
    
    if($result->num_rows!=0){
        die("User already exists with same username!!");
    }

    $result = $user->get_By_Email();

    if($result->num_rows!=0){
        $con->close();
        die("User already exists with same email!!");
    }

    $result = $user->get_By_Pno();

    if($result->num_rows!=0){
        $con->close();
        die("User already exists with same phone number!!");
    }

    $result = $user->insert_User();

    if($result == true){
        $result = $user->get_By_Username();

        while($row = $result->fetch_assoc()) {
            $_SESSION["username"] = $row['username'];
            $_SESSION["uid"] = $row['id'];
        }

        $_SESSION['LAST_ACTIVITY']=time();
        $id=$_SESSION["uid"];
        $user_activity = new User_Activity();
        $user_activity->setUser_id($id);
        
        if(is_uploaded_file($_FILES['photo']['tmp_name']) == 1){
            $name = $_POST['username'] . '.' . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $tmp_name = $_FILES['photo']['tmp_name'];
            
            if(move_uploaded_file($tmp_name, 'usersImage/' . $name)){
                $result = $user_activity->insert_user_activity();
                if($result == true){
                    echo "User Created and Photo Uploaded Successfully!!";
                }
            }
            
            else{
                $result = $user_activity->insert_user_activity();
              
                if($result == true){
                    echo "User Created and Photo not uploaded!!";
                }
            }
        }

        else{
          $result = $user_activity->insert_user_activity();
          echo "User Created Successfully!!";
        }
    }
}
?>