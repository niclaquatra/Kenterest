<?php
// Include config file
require_once "config.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Register Account</title>

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src = "img/logo.png" alt="" width="72" height="57">
      <h2>Register Account</h2>
      <p class="lead">Fill out required information needed to register an account!</p>
    </div>
    <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] === "emptyInput") { //error for no input
          echo "<div class = \"alert alert-danger\"><center><strong>Error:</strong> Fill in all credentials</center></div>";
        }
        else if ($_GET["error"] === "invalidEmail") {
          echo "<div class = \"alert alert-danger\"><center><strong>Error:</strong> Invalid Email email adress <br>Remember to use @kent.edu address!</center></div>";
        }
        else if ($_GET["error"] === "invalidPwd") {
          echo "<div class = \"alert alert-danger\"><center><strong>Error:</strong> Invalid Password Confirmation</center></div>";
        }
        else if ($_GET["error"] === "emailExsists") {
          echo "<div class = \"alert alert-danger\"><center><strong>Error:</strong> Email already exists!</center></div>";
        }
        else if ($_GET["error"] === "none") {
          echo "<div class = \"alert alert-success\"><center><strong>Success:</strong> Account successfully created!</center></div>";
        }
      }
    ?>
      <center>
      <div class="col-md-7 col-lg-8">
        <form action = "includes/register.inc.php" method = "post" enctype="multipart/form-data" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" name="firstName" placeholder="" value="" required>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" name="lastName" placeholder="" value="" required>
            </div>


            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="example@kent.edu">
            </div>

            <div class="col-12">
              <label for="pass" class="form-label">Password</label>
              <input type="password" name="pwd" class="form-control" placeholder="Password" required>
            </div>

            <div class="col-12">
              <label for="cpass" class="form-label">Confirm Password</label>
              <input type="password" class = "form-control" name = "confirm_pwd" placeholder="Re-enter Password">
            </div>

            <!--Populating Drop Down menus from Database. https://www.youtube.com/watch?v=TNPxG2yrPlM. viewed 03/30/2021-->
            <?php
            $getCampus = mysqli_query($db, "SELECT CampusName from campus");
            ?>
            <div class="col-12">
              <label for="campus" class="form-label">Campus</label>
              <select name="campus" class="form-select">
			          <option value=null selected>Choose...</option>
                <?php
                while($rows = mysqli_fetch_assoc($getCampus))
                {
                  $campus_name = $rows['CampusName'];
                  echo "<option value='$campus_name'>$campus_name</option>";
                }
                ?>
			        </select>
	
            </div>

            <div class="col-12">
              <label for="cpass" class="form-label">Profile Picture</label>
              <input type ="file" class="form-control" name="file" />
            </div>
          

          <hr class="my-4">
        
        </center>
      </div>
    </div>
    <div style="text-align: center;">
    <input type="submit" class = "btn btn-primary" name="submit" value="Register">
    <a href = "login.php"><input type="button" class="btn btn-primary" name="login" value="Login Page"></a>
    </div>
  </main>
  </form>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2021 Kenterest</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="login.php">Login</a></li>
      <li class="list-inline-item"><a href="register.php">Register Account</a></li>
    </ul>
  </footer>
  </body>
</html>