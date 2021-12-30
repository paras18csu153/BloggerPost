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
    <link rel="stylesheet" href="./stylesheets/addPost.css" />
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
    <script src="./scripts/addPost.js"></script>
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
        <form method="POST" action="addPost.php" autocomplete="off">
            <input id="blogTitle" name="blogTitle" type="text" placeholder="Title" maxlength="255" required>
            <input id="tags" name="tags" type="text" placeholder="Tags (Separated by Commas)" maxlength="255" required>
            <input id="description" name="description" type="text" placeholder="Description" maxlength="255" required>
            <textarea id="blog" name="blog" placeholder="Blog" maxlength="65536" rows="5" required></textarea>
            <div>
              <button id="submit" class='btn btn-outline-success my-2 mr-sm-2' type="submit">
                  Submit
              </button>
              <button id="cancel" class='btn btn-outline-danger my-2 mr-sm-2' type="button" onclick="checkForm()" data-toggle="modal" data-target="#exampleModalCenter">
                  Cancel
              </button>
              <!-- Modal -->
              <div
                class="modal fade"
                id="exampleModalCenter"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">
                        Unsaved Changes
                      </h5>
                      <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                      >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">There are some Unsaved changes. Do you want to discard the changes??</div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                      >
                        Close
                      </button>
                      <button type="button" class="btn btn-primary" onclick="location.href='index.php'">Discard changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </form>
    </div>
    <?php
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
        echo "<script> location.href='index.php'; </script>";
    }

    if(isset($_POST['blogTitle'])){
        if($_POST['blogTitle'] == ""){
          echo "<script>alert('Blog Title cannot be empty!!');</script>";
          die("");
        }

        if($_POST['description'] == ""){
          echo "<script>alert('Description cannot be empty!!');</script>";
          die("");
        }

        if($_POST['blog'] == ""){
          echo "<script>alert('Blog cannot be empty!!');</script>";
          die("");
        }

        if($_POST['tags'] == ""){
          echo "<script>alert('Tags cannot be empty!!');</script>";
          die("");
        }
      
        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password);

        if(!$con){
            die("Connection to this database failed due to ". mysqli_connect_error());
        }

        $blogTitle = $_POST['blogTitle'];
        $tags = $_POST['tags'];
        $blog = $_POST['blog'];
        $description = $_POST['description'];
        $author_name = $_SESSION['username'];

        if(empty($blogTitle) || empty($tags) || empty($blog) || empty($description)){
            die("Please Fill all Fields!!");
        }

        $sql = "INSERT INTO `bloggerpost`.`blog` (`name`, `tags`, `description`, `blog`, `date_time`, `author_name`) VALUES ('$blogTitle','$tags','$description', '$blog', current_timestamp(), '$author_name');";
        $result = $con->query($sql);
        if($result == true){
          $sql = "SELECT * FROM `bloggerpost`.`blog` WHERE `name`='$blogTitle' AND `tags`='$tags' AND `blog`='$blog' AND `description` = '$description'";
          $result = $con->query($sql);
          while($row = $result->fetch_assoc()) {
            $blog_id = $row['id'];
            $user_id = $_SESSION['uid'];
            $sql = "INSERT INTO `bloggerpost`.`user_blog_mapper` (`user_id`, `blog_id`) VALUES ('$user_id','$blog_id');";
            $result = $con->query($sql);
            if($result == true){
              echo "<script> location.href='index.php'; </script>";
            }
          }
        }
        else{
            echo "Error: $sql <br> $con->error";
        }

        $con->close();
    }
  ?>

    <footer class="bg-light text-center text-lg-start">
      <div id="footer" class="text-center p-3 fixed-bottom">
        © 2021 Copyright:
        <a class="text-dark" href="index.php">BloggerPost.com</a>
      </div>
      <!-- Copyright -->
    </footer>
  </body>
</html>