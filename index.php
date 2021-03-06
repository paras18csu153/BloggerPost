<?php
// Start the session
include 'createdate.php';
session_start();
if(isset($_SESSION['username']) || !empty($_SESSION['username'])){

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
    <link rel="stylesheet" href="./stylesheets/style.css" />
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
    <script src="./scripts/script.js"></script>
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
          echo "<script src='./scripts/global.js'></script>
          <div class='nav-item dropdown'>
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
          echo "<div class='form-inline my-2 my-lg-0'>
          <button class='btn btn-outline-success my-2 mr-sm-2' id='login' onclick='login()'>
            Login
          </button>
        </div>";
        }
      ?> 
      </div>
    </nav>

    <?php
      if(isset($_SESSION['username']) || !empty($_SESSION['username'])){
          echo "<div>
          <button id='add' onclick='redirectToAddPost()'>
            <svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' fill='currentColor' class='bi bi-plus-circle-fill' viewBox='0 0 16 16'>
            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z'/>
            </svg>
          </button>
        </div>";
      }
    ?>

    <div id="container">
      <?php 
        $server = "localhost";
        $username = "root";
        $password = "";
  
        $con = mysqli_connect($server, $username, $password);
  
        if(!$con){
          die("Connection to this database failed due to ". mysqli_connect_error());
        }
        if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
        $sql = "SELECT * FROM `bloggerpost`.`blog` ORDER BY blog.date_time DESC";
        $result = $con->query($sql);
        if($result->num_rows!=0){
          $i = 0;
          while($row = $result->fetch_assoc()) {
            $blogTitle = $row['name'];
            $description = $row['description'];
            $blog = $row['blog'];
            $strlen = strlen($blog);
            $author_name = $row['author_name'];
            if($strlen>96){
              $blog = substr($blog, 0, 97) . '...';
            }
            $id = $row['id'];
            $date_time = $row['date_time'];
            $d = DateTime::createFromFormat('Y-m-d H:i:s', $date_time);
            $timestamp = $d->getTimestamp() - 16200;
            
            $date_time = secondsToTime(time() - $timestamp);

            if($i == 0){
              echo "<h3>Recently Posted</h3>
              <div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
                <div class='carousel-inner'>
                  <div class='carousel-item active'>
                    <div class='d-flex justify-content-center card-div'>
                      <div class='card'>
                        <div class='card-body d-flex flex-column'>
                          <h5 class='card-title'><b>$blogTitle</b></h5>
                          <p class='card-text'>
                            $blog<a href='article.php?id=$id' class='card-link' style='font-size:12px; margin-left: 10px;'>Read More...</a>
                          </p>
                          <p style='font-size: 12px; color: #707070;' class='mt-auto align-self-start'>Posted $date_time <span style='font-size: 12px; color: #707070;'> by <b>$author_name</b></span></p>
                        </div>
                      </div>";
            }
  
            else if($i%4 == 0){
              echo "</div></div><div class='carousel-item'>
              <div class='d-flex justify-content-center card-div'>
                <div class='card'>
                  <div class='card-body d-flex flex-column'>
                    <h5 class='card-title'><b>$blogTitle</b></h5>
                    <p class='card-text'>
                      $blog<a href='article.php?id=$id' class='card-link' style='font-size:12px; margin-left: 10px;'>Read More...</a>
                    </p>
                    <p style='font-size: 12px; color: #707070;' class='mt-auto align-self-start'>Posted $date_time <span style='font-size: 12px; color: #707070;'> by <b>$author_name</b></span></p>
                  </div>
                </div>";
            }
            else{
              echo "<div class='card'>
              <div class='card-body d-flex flex-column'>
                <h5 class='card-title'><b>$blogTitle</b></h5>
                <p class='card-text'>
                  $blog<a href='article.php?id=$id' class='card-link' style='font-size:12px; margin-left: 10px;'>Read More...</a>
                </p>
                <p style='font-size: 12px; color: #707070;' class='mt-auto align-self-start'>Posted $date_time <span style='font-size: 12px; color: #707070;'> by <b>$author_name</b></span></p>
              </div>
            </div>";
            }
  
            $i = $i + 1;
          }
          echo "</div></div></div><a style='width:10%' class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
          <span class='carousel-control-prev-icon' aria-hidden='true')'></span>
          <span class='sr-only'>Previous</span>
        </a>
        <a style='width:10%' class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
          <span class='carousel-control-next-icon' aria-hidden='true'></span>
          <span class='sr-only'>Next</span>
        </a>
        </div>";
          $con->close();
        }
      }
      else{
        $sql = "SELECT `blog`.`name`, `blog`.`description`, `blog`.`blog`,`blog`.`id`, `blog`.`date_time`, `user_blog_mapper`.`user_id`, `blog`.`author_name` FROM `bloggerpost`.`blog` CROSS JOIN `bloggerpost`.`user_blog_mapper` WHERE `blog`.`id` = `user_blog_mapper`.`blog_id` ORDER BY blog.date_time DESC";
        $result = $con->query($sql);
        if($result->num_rows!=0){
          $i = 0;
          while($row = $result->fetch_assoc()) {
            $blogTitle = $row['name'];
            $description = $row['description'];
            $blog = $row['blog'];
            $strlen = strlen($blog);
            if($strlen>96){
              $blog = substr($blog, 0, 97) . '...';
            }
            $id = $row['id'];
            $date_time = $row['date_time'];
            $user_id = $row['user_id'];
            $author_name = $row['author_name'];
            $d = DateTime::createFromFormat('Y-m-d H:i:s', $date_time);
            $timestamp = $d->getTimestamp() - 16200;
            
            $date_time = secondsToTime(time() - $timestamp);
            
            if($i == 0){
            if($user_id == $_SESSION['uid']){
              echo "<h3>Recently Posted</h3>
              <div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
                <div class='carousel-inner'>
                  <div class='carousel-item active'>
                    <div class='d-flex justify-content-center card-div'>
                      <div class='card'>
                        <div class='card-body d-flex flex-column'>
                          <h5 class='card-title' style='display: inline-flex;'><span><b>$blogTitle</b></span><button style='text-align: right; align-self: self-start;color: red;border : none; outline:none; box-shadow:none;cursor: pointer;'  id='$id' onclick='cache($id)' data-toggle='modal' data-target='#exampleModalCenter'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                          <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                          <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                        </svg></button></h5>
                          <p class='card-text'>
                            $blog<a href='article.php?id=$id' class='card-link' style='font-size:12px; margin-left: 10px;'>Read More...</a>
                          </p>
                          <p style='font-size: 12px; color: #707070;' class='mt-auto align-self-start'>Posted $date_time <span style='font-size: 12px; color: #707070;'> by <a href='viewUser.php?username=$author_name'><b>$author_name</b></a></span></p>
                        </div>
                      </div>";
            }
            else{
              echo "<h3>Recently Posted</h3>
              <div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
                <div class='carousel-inner'>
                  <div class='carousel-item active'>
                    <div class='d-flex justify-content-center card-div'>
                      <div class='card'>
                        <div class='card-body d-flex flex-column'>
                          <h5 class='card-title'><span><b>$blogTitle</b></span></h5>
                          <p class='card-text'>
                            $blog<a href='article.php?id=$id' class='card-link' style='font-size:12px; margin-left: 10px;'>Read More...</a>
                          </p>
                          <p style='font-size: 12px; color: #707070;' class='mt-auto align-self-start'>Posted $date_time <span style='font-size: 12px; color: #707070;'> by <a href='viewUser.php?username=$author_name'><b>$author_name</b></a></span></p>
                        </div>
                      </div>";
            }
            }
  
            else if($i%4 == 0){
            if($user_id == $_SESSION['uid']){
              echo "</div></div><div class='carousel-item'>
              <div class='d-flex justify-content-center card-div'>
                <div class='card'>
                  <div class='card-body d-flex flex-column'>
                    <h5 class='card-title' style='display : inline-flex;'><b>$blogTitle</b><button style='text-align: right; align-self: self-start;color: red;border : none; outline:none; box-shadow:none;cursor: pointer;'  id='$id' onclick='cache($id)' data-toggle='modal' data-target='#exampleModalCenter'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                  </svg></button></h5>
                    <p class='card-text'>
                      $blog<a href='article.php?id=$id' class='card-link' style='font-size:12px; margin-left: 10px;'>Read More...</a>
                    </p>
                    <p style='font-size: 12px; color: #707070;' class='mt-auto align-self-start'>Posted $date_time <span style='font-size: 12px; color: #707070;'> by <a href='viewUser.php?username=$author_name'><b>$author_name</b></a></span></p>
                  </div>
                </div>";
            }
            else{
              echo "</div></div><div class='carousel-item'>
              <div class='d-flex justify-content-center card-div'>
                <div class='card'>
                  <div class='card-body d-flex flex-column'>
                    <h5 class='card-title'><b>$blogTitle</b></h5>
                    <p class='card-text'>
                      $blog<a href='article.php?id=$id' class='card-link' style='font-size:12px; margin-left: 10px;'>Read More...</a>
                    </p>
                    <p style='font-size: 12px; color: #707070;' class='mt-auto align-self-start'>Posted $date_time <span style='font-size: 12px; color: #707070;'> by <a href='viewUser.php?username=$author_name'><b>$author_name</b></a></span></p>
                  </div>
                </div>";
            }
            }
            else{
            if($user_id == $_SESSION['uid']){
              echo "<div class='card'>
              <div class='card-body d-flex flex-column'>
                <h5 class='card-title' style='display : inline-flex;'><b>$blogTitle</b><button style='text-align: right; align-self: self-start;color: red;border : none; outline:none; box-shadow:none;cursor: pointer;'  id='$id' onclick='cache($id)' data-toggle='modal' data-target='#exampleModalCenter'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
              </svg></button></h5>
                <p class='card-text'>
                  $blog<a href='article.php?id=$id' class='card-link' style='font-size:12px; margin-left: 10px;'>Read More...</a>
                </p>
                <p style='font-size: 12px; color: #707070;' class='mt-auto align-self-start'>Posted $date_time <span style='font-size: 12px; color: #707070;'> by <a href='viewUser.php?username=$author_name'><b>$author_name</b></a></span></p>
              </div>
            </div>";
            }
            else{
              echo "<div class='card'>
              <div class='card-body d-flex flex-column'>
                <h5 class='card-title'><b>$blogTitle</b></h5>
                <p class='card-text'>
                  $blog<a href='article.php?id=$id' class='card-link' style='font-size:12px; margin-left: 10px;'>Read More...</a>
                </p>
                <p style='font-size: 12px; color: #707070;' class='mt-auto align-self-start'>Posted $date_time <span style='font-size: 12px; color: #707070;'> by <a href='viewUser.php?username=$author_name'><b>$author_name</b></a></span></p>
              </div>
            </div>";
            }
          }
  
            $i = $i + 1;
          }
          echo "</div></div></div><a style='width:10%' class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
          <span class='carousel-control-prev-icon' aria-hidden='true')'></span>
          <span class='sr-only'>Previous</span>
        </a>
        <a style='width:10%' class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
          <span class='carousel-control-next-icon' aria-hidden='true'></span>
          <span class='sr-only'>Next</span>
        </a>
        </div>";
          $con->close();
        }
      }
      ?>
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
                        Delete Post
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
                    <div class="modal-body">Are you sure you want to delete this Post??</div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                        onclick="clearCache()"
                      >
                        Close
                      </button>
                      <button type="button" class="btn btn-primary" onclick="deletePost()">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
      <!-- <h3>Recently Posted</h3>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="d-flex justify-content-center card-div">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Third slide">
            </div>
          </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      </div> -->
    </div>

    <footer class="bg-light text-center text-lg-start">
      <div id="footer" class="text-center p-3 fixed-bottom">
        ?? 2021 Copyright:
        <a class="text-dark" href="index.php">BloggerPost.com</a>
      </div>
      <!-- Copyright -->
    </footer>
  </body>
</html>
