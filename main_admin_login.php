<?php $conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant'); ?>
<?php

 if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM main_admin WHERE username='".$username."' AND password='".$password."' ");
    if (mysqli_num_rows($result)>0) {
      $row = mysqli_fetch_assoc($result);

    session_start();

              $_SESSION["name"] = $row['name'];
              $_SESSION['email'] = $row['email'];
              
      header('Location: main_admin.php');
    }else{
      //invalid 
            echo '<script type="text/javascript"> alert("invalid credentials") </script>';
    }
    
}else {
 
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
      <div class="card-header">Main Admin Login</div>
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
                <input class="form-check-input" name="remember" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="submit" value="submit">
        </form>
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