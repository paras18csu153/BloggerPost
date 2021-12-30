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

  $con->close();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BloggerPost</title>
    <link rel="icon" href="./images/icon.svg" />
    <link rel="stylesheet" href="./stylesheets/viewUser.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Smooch&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
    <script src="./scripts/viewUser.js"></script>
    <script src="./scripts/global.js"></script>
  </head>
  <body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light">
      <a id="title" class="navbar-brand" href="index.php">BloggerPost</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <!-- <li class="nav-item active">
            <a class="nav-link" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li> -->
        </ul>
        <form class="form-inline my-2 my-lg-0" method='POST' action='search.php'>
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
            name="search";
          />
          <button class="btn btn-outline-success my-2 mr-sm-2" type="submit">
            Search
          </button>
        </form>

        <?php 
        if(isset($_SESSION['username']) || !empty($_SESSION['username'])){
          $username=$_SESSION['username'];
          echo "<div class='nav-item dropdown'>
          <a
            class='nav-link'
            href='#'
            id='navbarDropdown'
            role='button'
            data-toggle='dropdown'
            aria-haspopup='true'
            aria-expanded='false'
          >
            <button id='profile' type='button'>
              <svg
                id='profileIcon'
                xmlns='http://www.w3.org/2000/svg'
                width='24'
                height='24'
                fill='currentColor'
                class='bi bi-person-circle'
                viewBox='0 0 16 16'
              >
                <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z' />
                <path
                  fill-rule='evenodd'
                  d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'
                />
              </svg>
            </button>
          </a>
          <div
            class='dropdown-menu dropdown-menu-right'
            aria-labelledby='navbarDropdown'
          >
          <a class='dropdown-item' href='users.php'>Users</a>
          <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='#'>My Articles</a>
            <a class='dropdown-item' href='viewUser.php?username=$username'>My Profile</a>
            <div class='dropdown-divider'></div>
            <a id='logout' class='dropdown-item' href='logout.php'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-arrow-bar-left' viewBox='0 0 16 16'>
            <path fill-rule='evenodd' d='M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z'/>
            </svg>&nbsp; Log Out</a>
          </div>
        </div>";
        }
        else{
            echo "<script>location.href='index.php';</script>";
        }
      ?> 
      </div>
    </nav>

    <div id="container">
        <?php
            $username = $_GET['username'];
            $path = "usersImage/".$username.".*";
            $result = glob ($path); 
            if(count($result)!=0){
              echo "<div id='image' style='text-align:center;'>
              <img style='margin-left: auto; margin-right: auto;width:128px;border-radius:50%;' src='$result[0]'>
              </div>";
            }
            else{
                echo "<div id='image' style='width:100%;text-align:center;'>
                <img style='margin-left: auto; margin-right: auto;' src='images/dummy2.svg'>
                </div>";
            }

            $server = "localhost";
            $username = "root";
            $password = "";

            $con = mysqli_connect($server, $username, $password);

            if(!$con){
                die("Connection to this database failed due to ". mysqli_connect_error());
            }

            $username = $_GET['username'];
            $sql = "SELECT * FROM `bloggerpost`.`users` WHERE `users`.`username`='$username';";
            $result = $con->query($sql);
            if($result->num_rows!=0){
                while($row = $result->fetch_assoc()) {
                  $id = $row['id'];
                  $name = $row['name'];
                  $name = strtoupper($name);
                  $pno = $row['pno'];
                  $email = $row['email'];
                  $username = $row['username'];
                  $sql = "SELECT * FROM `bloggerpost`.`blog` WHERE `blog`.`author_name`='$username' ORDER BY `comment_count` DESC;";
                  $result1 = $con->query($sql);
                  $count = $result1->num_rows;

                  echo "<div style='padding:25px;'>
                  <div style='display: inline-flex;width: 100%;'>
                  <p style='align-self:center;width: 25%;'>NAME:</p>
                  <p style='align-self:center;width: 25%;'><b>$name</b></p>
                  <p style='align-self:center;width: 25%;'>PNO:</p>
                  <p style='align-self:center;width: 25%;'><b>$pno</b></p>
                  </div>
                  <div style='display: inline-flex;width: 100%;'>
                  <p style='align-self:center;width: 25%;'>EMAIL:</p>
                  <p style='align-self:center;width: 25%;'><b>$email</b></p>
                  <p style='align-self:center;width: 25%;'>USERNAME:</p>
                  <p style='align-self:center;width: 25%;'><b>$username</b></p>
                  </div>
                  <div style='display: inline-flex;width: 100%;'>
                  <p style='align-self:center;width: 25%;'>NO. OF ARTICLES POSTED:</p>
                  <p style='align-self:center;width: 25%;'><b>$count</b></p>
                  </div>";

                  if($result1->num_rows!=0){
                    $i = 0;
                    echo "<h2>Popular Blogs</h2>";
                    if($result1->num_rows > 5){
                    while($blogs = $result1->fetch_assoc() && $i < 5){
                      $blog_id = $blogs['id'];
                      $blog_name = $blogs['name'];
                      echo "<p><a href='article.php?id=$blog_id'>$blog_name</a></p>";
                      $i = $i + 1;
                    }
                  }
                  else{
                    while($blogs = $result1->fetch_assoc()){
                      $blog_id = $blogs['id'];
                      $blog_name = $blogs['name'];
                      echo "<p><a href='article.php?id=$blog_id'>$blog_name</a></p>";
                    }
                  }
                  }

                  echo "</div>
                  <div style='text-align: center; width: 100%;'>
                  <button id='goBack' class='btn btn-outline-success my-2 mr-sm-2' onclick='goBack()'>
                  Go Back
              </button>
              </div>";
                }
                if($id == $_SESSION["uid"]){
                  echo "<div style='text-align: center; width: 100%;'>
                  <button id='changePassword' class='btn btn-outline-success my-2 mr-sm-2' onclick='goChangePassword()'>
                  Change Password
              </button>
              </div>
                  <div style='text-align: center; width: 100%;'>
              </div>";
                }
            }
        ?>
    </div>

    <footer class="bg-light text-center text-lg-start">
      <div id="footer" class="text-center p-3 fixed-bottom">
        © 2021 Copyright:
        <a class="text-dark" href="index.php">BloggerPost.com</a>
      </div>
      <!-- Copyright -->
    </footer>
  </body>
</html>