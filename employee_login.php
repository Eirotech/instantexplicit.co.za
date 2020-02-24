<?php 

$conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant'); 

 if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

   
  
    $conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant') or die (mysqli_error());

        $db = mysqli_select_db($conn, 'instaapn_instant') or die("DB error");

        $query = mysqli_query($conn, "SELECT * FROM employee WHERE username ='".$username."' AND password = '".$password."' ");
        $numrows = mysqli_num_rows($query);
        if($numrows == 0) {
        
        echo "wrong details";
          } elseif ($query)  {

            $row = mysqli_fetch_assoc($query);
            session_start();
              $_SESSION['username']= $username;
              $_SESSION['Id'] = $row['Id'];
              $_SESSION['username'] = $row['username'];
              $_SESSION["name"] = $row['name'];
              $_SESSION['gender'] = $row['gender'];
              $_SESSION['email'] = $row['email'];
              $_SESSION['image1'] = $row['image1'];
              $_SESSION['image2'] = $row['image2'];
              $_SESSION['image3'] = $row['image3'];
              $_SESSION['profile_pic'] = $row['profile_pic'];
              $_SESSION['cell_number'] = $row['cell_number'];
              $_SESSION['nationality'] = $row['nationality'];
              $_SESSION['suburb'] = $row['suburb'];
              $_SESSION['city'] = $row['city'];

            header('Location: employee.php');
            echo "login";           
            
          }

        }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Career Login</div>
      <div class="card-body">

        <form method="post" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" name="username" id="exampleInputEmail1" type="text" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="password" id="exampleInputPassword1" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" > Remember Password</label>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="submit">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="employee_register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
</body>

</html>
