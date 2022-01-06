<?php 
    include_once '../routes/router.php';
    include_once $session;
    include_once $user_model;
    include_once $user_activity_model;

    if(isset($_SESSION['username']) || !empty($_SESSION['username'])){
        echo "User is already Logged In!!";
        die("");
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($_POST['username'] == ""){
            echo "<script>alert('Username cannot be empty!!');</script>";
            die("");
        }

        if($_POST['password'] == ""){
            echo "<script>alert('Password cannot be empty!!');</script>";
            die("");
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new User();
        $user->setUsername($username);
        $result = $user->get_By_Username();
        
        if($result->num_rows==0){
            die("User doesn't exist!!");
        }

        if(password_verify($password, mysqli_fetch_array( $result )['password'])){
            $result = $user->get_By_Username();
            while($row = $result->fetch_assoc()) {
                $_SESSION["username"] = $row['username'];
                $_SESSION["uid"] = $row['id'];
            }
            
            $_SESSION['LAST_ACTIVITY']=time();
            $id = $_SESSION["uid"];

            $user_activity = new User_Activity();
            $user_activity->setUser_id($id);
            $result = $user_activity->get_By_UserID();
            
            if($result->num_rows == 0){
                $result = $user_activity->insert_user_activity();
                if($result == true){
                    echo "Logged in Successfully!!";
                }
            }

            else{
                $result = $user_activity->update_user_activity();
                if($result == true){
                    echo "Logged in Successfully!!";
                }
            }
        }

        else{
            echo "Password Incorrect!!";
        }
    }
?>