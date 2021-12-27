<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BloggerPost</title>
    <link rel="icon" href="./images/icon.svg" />
    <link rel="stylesheet" href="./stylesheets/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Smooch&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="./scripts/login.js"></script>
  </head>
  <body>
    <img
      class="bg"
      src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGJhY2thZ3JvdW5kJTIwbmF0dXJlJTIwaW1hZ2VzfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
      alt="img.jpg"
      draggable="false"
    />
    <form id="login" action="login.php" method="POST" autocomplete="off">
      <h1>BloggerPost</h1>
      <div class="input-group mb-3 icons">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3"> &nbsp;@&nbsp;</span>
        </div>
        <input
          type="text"
          class="form-control shadow-none"
          id="username"
          name="username"
          aria-describedby="basic-addon3"
          placeholder="Username"
          required
        />
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3"
            ><img
              src="./images/password.svg"
              alt="dummy1.jpg"
              draggable="false"
          /></span>
        </div>
        <input
          type="password"
          class="form-control shadow-none"
          id="password"
          name="password"
          aria-describedby="basic-addon3"
          placeholder="Password"
          required
        />
        <div class="input-group-append">
          <button
            id="showPasswordButton"
            class="btn btn-outline-secondary shadow-none"
            type="button"
            onclick="showPassword('password', 'hidePasswordImg', 'showPasswordImg')"
          >
            <svg
              id="hidePasswordImg"
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-eye-slash"
              viewBox="0 0 16 16"
            >
              <path
                d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"
              />
              <path
                d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"
              />
              <path
                d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"
              />
            </svg>
            <svg
              id="showPasswordImg"
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-eye"
              viewBox="0 0 16 16"
            >
              <path
                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
              />
              <path
                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"
              />
            </svg>
          </button>
        </div>
      </div>
      <p id="createAccount"><a href="signup.php">I don't have an account...</a></p>
      <p id="forgetPassword"><a href="#">Forget password??</a></p>
      <button id="submit" type="submit" class="btn btn-outline-warning">
        Login
      </button>
    </form>

        <?php
        if(isset($_SESSION['username']) || !empty($_SESSION['username'])){
            echo "<script> location.href='index.php'; </script>";
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

            $server = "localhost";
            $username = "root";
            $password = "";

            $con = mysqli_connect($server, $username, $password);

            if(!$con){
                die("Connection to this database failed due to ". mysqli_connect_error());
            }

            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `username`='$username'";
            $result = $con->query($sql);
            if($result->num_rows==0){
                $con->close();
                die("User doesn't exist!!");
            }

            if(password_verify($password, mysqli_fetch_array( $result )['password'])){
                $result = $con->query($sql);
                while($row = $result->fetch_assoc()) {
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["uid"] = $row['id'];
                }
                $_SESSION['LAST_ACTIVITY']=time();
                $id=$_SESSION["uid"];
                $sql = "SELECT * FROM `bloggerpost`.`users_activity` WHERE `user_id`='$id'";
                $result = $con->query($sql);
                if($result->num_rows==0){
                  $sql = "INSERT INTO `bloggerpost`.`users_activity` (`user_id`, `last_access_At`, `is_online`) VALUES ('$id',current_timestamp(), true);";
                  $result = $con->query($sql);
                  if($result == true){
                    echo "<script> location.href='index.php'; </script>";
                  }
                }
                else{
                  $sql = "UPDATE `bloggerpost`.`users_activity` SET `last_access_AT`=current_timestamp(), `is_online`=true WHERE `user_id`='$id'";
                  $result = $con->query($sql);
                  if($result == true){
                    echo "<script> location.href='index.php'; </script>";
                  }
                }
                
            };

            $con->close();
        }
    ?>
  </body>
</html>