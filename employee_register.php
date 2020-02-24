<?php
  if (isset($_POST['password']) != isset($_POST['password2'])){
    echo 'Passwords do not match!';
  }else{

  if(isset($_POST['submit'])); {
      if(!empty($_POST['username'])&& !empty($_POST['name'])&& !empty($_POST['email'])&& !empty($_POST['gender'])&& !empty($_POST['nationality']) && !empty($_POST['cell_number'])&& !empty($_POST['age'])&& !empty($_POST['suburb'])&& !empty($_POST['city'])&& !empty($_POST['password'])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];       
        $cell_number = $_POST['cell_number'];       
        $nationality = $_POST['nationality'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $suburb = $_POST['suburb'];
        $city = $_POST['city'];
        $password = $_POST['password'];

        $conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant') or die (mysqli_error());
        $db = mysqli_select_db($conn, 'instaapn_instant') or die("DB error");

        $query = mysqli_query($conn, "SELECT * FROM employee WHERE username ='".$username."' ");
        $numrows = mysqli_num_rows($query);
        if($numrows == 0) {
          $sql = "INSERT INTO employee(username, name, email, cell_number, nationality, age, gender, suburb, city, password) VALUES('{$username}','{$name}','{$email}','{$cell_number}','{$nationality}','{$age}','{$gender}','{$suburb}','{$city}','{$password}')";
          $results = mysqli_query($conn, $sql);

          if($results) {
         //   echo "Your Account created Succefully ";
            header("Location: employee_login.php");
          } else {
            echo "Failure";
          }

        }else {
           echo "username already exists";
        }
      }
    }
    }
    ?>
    
<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Instant Explicit</title>

  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">

  <!-- Favicon -->
  <link href="img/favicon.png"  rel="icon" />
</head>

<body class="bg-dark">
    <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="mainNav">
    <img src="img/logo.png" width="200px" class="navbar-brand">
  </nav>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account To join</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" name="username" placeholder="Enter Username" required>  
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Name</label>
                <input class="form-control"  type="text" name="name"  placeholder="Enter First Name" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Email address</label>
            <input class="form-control" type="email" name="email" placeholder="Enter email" required>
          </div>
          
          <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" type="text" name="cell_number" placeholder="Enter Phone Number" required>
          </div>

          <div class="form-row">
            <div class="col-md-6">
            <div class="form-group">
              <select class="form-control" type="text" name="nationality" required="required">
                <option disabled=""> Nationality</option>
                <option value="Black">Black</option>
                <option value="White">White</option>
                <option value="Coloured">Coloured</option>
                <option value="Indian">Indian</option>
                <option value="Asian">Asian</option>
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" type="text" name="age" placeholder="age" required="required">
            </div>
          </div>
          </div>

          <div class="form-row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Male</label>
                    <input type="radio" name="gender" checked="required" value="male" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Female</label>
                    <input type="radio" name="gender" checked="required" value="female" required>
                </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                
                <label>City</label>
                  <select class="form-control" name="city">
                    <option value="">Choose</option>
                    <option value="Pretoria">Pretoria</option>
                    <option value="Johannesburg">Johannesburg</option>
                  </select>
              </div>
              <div class="col-md-6">
                <label>Suburb</label>
                <input class="form-control" type="text" name="suburb"  placeholder="Enter Suburb E.g Akasia, Sandton" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Password</label>
                <input class="form-control"  type="password" name="password" placeholder="Password" required>
              </div>
              <div class="col-md-6">
                <label>Confirm password</label>
                <input class="form-control" type="password" name="password2" placeholder="Confirm password" required>
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="submit" value="Register">
          
        </form>

        <!--<div class="text-center">
          <a id="button" class="d-block small mt-3" href="employee_login.php">Login Page</a>
        </div>-->
      </div>
    </div>
  </div>

  <footer class="footer" style="">

    <p>&copy; All rights reserved | 2020</p>
  </footer>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>
