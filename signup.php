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
    <link rel="stylesheet" href="./stylesheets/signup.css" />
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
    <script src="./scripts/signup.js"></script>
  </head>
  <body>
    <img
      class="bg"
      src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGJhY2thZ3JvdW5kJTIwbmF0dXJlJTIwaW1hZ2VzfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
      alt="img.jpg"
      draggable="false"
    />
    <form
      id="signup"
      autocomplete="off"
      action="signup.php"
      method="POST"
      enctype="multipart/form-data"
    >
      <h1>BloggerPost</h1>
      <div class="photo">
        <label for="upload-photo"
          ><img
            id="dummy"
            src="./images/dummy.svg"
            alt="dummy.jpg"
            draggable="false"
        /></label>
        <input
          onchange="loadFile(event)"
          type="file"
          name="photo"
          id="upload-photo"
        />
        <div id="name_phone">
          <div class="input-group mb-3 icons">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3"
                ><img src="./images/dummy1.svg" alt="dummy1.jpg"
              /></span>
            </div>
            <input
              type="text"
              class="form-control shadow-none"
              id="name"
              name="name"
              aria-describedby="basic-addon3"
              placeholder="Name"
              required
            />
          </div>
          <div class="input-group mb-3 icons">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  class="bi bi-phone"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"
                  />
                  <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" /></svg
              ></span>
            </div>
            <input
              type="tel"
              class="form-control shadow-none"
              id="phone"
              name="phone"
              aria-describedby="basic-addon3"
              placeholder="Phone"
              minlength="10"
              maxlength="10"
              pattern="[0-9]{10}"
              oninput="validate(this)"
              required
            />
          </div>
        </div>
      </div>
      <div class="input-group mb-3 icons">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3"
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="currentColor"
              class="bi bi-envelope"
              viewBox="0 0 16 16"
            >
              <path
                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"
              /></svg
          ></span>
        </div>
        <input
          type="email"
          class="form-control shadow-none"
          id="email"
          name="email"
          aria-describedby="basic-addon3"
          placeholder="Email"
          required
        />
      </div>
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
          id="password1"
          name="password1"
          aria-describedby="basic-addon3"
          placeholder="Confirm Password"
          required
        />
        <div class="input-group-append">
          <button
            id="showPasswordButton1"
            class="btn btn-outline-secondary shadow-none"
            type="button"
            onclick="showPassword('password1', 'hidePasswordImg1', 'showPasswordImg1')"
          >
            <svg
              id="hidePasswordImg1"
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
              id="showPasswordImg1"
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
      <p id="createAccount"><a href="#">I have an account...</a></p>
      <button id="submit" type="submit" class="btn btn-outline-warning">
        SignUp
      </button>
    </form>

    <?php
    if(isset($_SESSION['username']) || !empty($_SESSION['username'])){
        echo "<script> location.href='index.php'; </script>";
    }

    if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password);

        if(!$con){
            die("Connection to this database failed due to ". mysqli_connect_error());
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

        $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `username`='$username'";
        $result = $con->query($sql);
        if($result->num_rows!=0){
            $con->close();
            die("User already exists with same username!!");
        }

        $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `email`='$email'";
        $result = $con->query($sql);
        if($result->num_rows!=0){
            $con->close();
            die("User already exists with same email!!");
        }

        $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `pno`='$pno'";
        $result = $con->query($sql);
        if($result->num_rows!=0){
            $con->close();
            die("User already exists with same phone number!!");
        }

        $sql = "INSERT INTO `bloggerpost`.`users` (`name`, `pno`, `username`, `email`, `password`) VALUES ('$name','$pno','$username','$email','$hashed_password')";
        $result = $con->query($sql);
        if($result == true){
            $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `username`='$username'";
            $result = $con->query($sql);
            while($row = $result->fetch_assoc()) {
                $_SESSION["username"] = $row['username'];
                $_SESSION["uid"] = $row['id'];
            }
            if(is_uploaded_file($_FILES['photo']['tmp_name']) == 1){
                $name = $_POST['username'] . '.' . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $tmp_name = $_FILES['photo']['tmp_name'];
                if(move_uploaded_file($tmp_name, 'usersImage/' . $name)){
                    echo "<script> location.href='index.php'; </script>";
                }
                else{
                    echo "<script> location.href='index.php'; </script>";
                    echo "<script> alert('Photo Not Uploaded!!'; </script>";
                }
            }
            else{
                echo "<script> location.href='index.php'; </script>";
            }
        }
        else{
            echo "Error: $sql <br> $con->error";
        }

        $con->close();
    }
?>
  </body>
</html>