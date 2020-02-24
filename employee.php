<?php 
$conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant');

 session_start();
 if(isset($_SESSION["name"])) {
 		
 }else{
 	header('Location: employee_login.php');
 }


//update statement
if (isset($_POST['update'])) {

  $name =$_POST['name'];
  $email = $_POST['email'];
  $cell_number = $_POST['cell_number'];
  $suburb = $_POST['suburb'];
  $city = $_POST['city'];
  $hidden =$_POST['hidden'];

  //query for updating the user table
  $results = $conn->query ("UPDATE employee SET name = '".$_POST['name']."', email = '".$_POST['email']."', city = '".$_POST['city']."', suburb = '".$_POST['suburb']."', cell_number = '".$_POST['cell_number']."' WHERE Id = '$hidden' ");

if ($results) {
  print 'success! record updated';
  //directing to user page

  $_SESSION["name"] = $name;
  $_SESSION['email'] = $email;
  $_SESSION['cell_number'] = $cell_number ;
  $_SESSION['suburb'] = $suburb ;
  $_SESSION['city'] = $city;


  }
  else {
    print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
  }
  
  
}

//end of update statement
?>
<?php
$conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant'); 



 // image1
 if (isset($_POST['submit_image'])) {
   $hidden =$_POST['hidden'];


   
 $target_dir = "img/";
 $image1 = 'image1';
 $target_file = $target_dir . basename($_FILES["image1"]["name"]);
 $name = basename($_FILES["image1"]["name"]);


   //query for updating the user table
   $results = $conn->query ("UPDATE employee SET image =  '$name' WHERE Id = " .$_SESSION["Id"] . " ");

   if (move_uploaded_file($_FILES['image1']['tmp_name'], $target_file)) {
         echo "The file ". basename( $_FILES["image1"]["name"]). " has been uploaded.";
         $_SESSION["image1"] = $name; 
         header('Location: '.$_SERVER['REQUEST_URI']);
     } else {
         echo "Sorry, there was an error uploading your file.";
     }

 if ($results) {
   print 'success! record updated';
   //directing to user page

   }
   else {
     print 'Error : ('. $conn->errno .') '. $conn->error;
   }
}

// image2
 if (isset($_POST['submit_image2'])) {
   $hidden =$_POST['hidden'];


   
 $target_dir = "img/";
 $image2 = 'image1';
 $target_file = $target_dir . basename($_FILES["image2"]["name"]);
 $name = basename($_FILES["image2"]["name"]);


   //query for updating the user table
   $results = $conn->query ("UPDATE employee SET image2 =  '$name' WHERE Id = " .$_SESSION["Id"] . " ");

   if (move_uploaded_file($_FILES['image2']['tmp_name'], $target_file)) {
         echo "The file ". basename( $_FILES["image2"]["name"]). " has been uploaded.";
         $_SESSION["image2"] = $name; 
         header('Location: '.$_SERVER['REQUEST_URI']);
     } else {
         echo "Sorry, there was an error uploading your file.";
     }

 if ($results) {
   print 'success! record updated';
   //directing to user page

   }
   else {
     print 'Error : ('. $conn->errno .') '. $conn->error;
   }
}

// image3
 if (isset($_POST['submit_image3'])) {
   $hidden =$_POST['hidden'];


   
 $target_dir = "img/";
 $image3 = 'image3';
 $target_file = $target_dir . basename($_FILES["image3"]["name"]);
 $name = basename($_FILES["image3"]["name"]);


   //query for updating the user table
   $results = $conn->query ("UPDATE employee SET image3 =  '$name' WHERE Id = " .$_SESSION["Id"] . " ");

   if (move_uploaded_file($_FILES['image3']['tmp_name'], $target_file)) {
         echo "The file ". basename( $_FILES["image3"]["name"]). " has been uploaded.";
         $_SESSION["image3"] = $name; 
         header('Location: '.$_SERVER['REQUEST_URI']);
     } else {
         echo "Sorry, there was an error uploading your file.";
     }

 if ($results) {
   print 'success! record updated';
   //directing to user page

   }
   else {
     print 'Error : ('. $conn->errno .') '. $conn->error;
   }
}



    ?>
<!DOCTYPE html>
<html>
	<head>
		 <meta charset="utf-8">
	    <meta name="author" content="EiroTech"/>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Instant Explicit</title>


		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
		<link href="css/sb-admin.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
		<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 

		<!-- Favicon -->
    <link href="img/favicon.png"  rel="icon" />
	</head>
	<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img src="img/logo.png" width="200px" class="navbar-brand">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="margin-top: 125px;">
        
      	<!--Dashboard-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" onclick="openmove('dashboard')" >
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <!--Profile-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" onclick="openmove('profile')" >
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Profile Edit</span>
          </a>
        </li>

        <!--Gallery-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" onclick="openmove('gallery')" >
            <i class="fa fa-fw fa-image"></i>
            <span class="nav-link-text">Gallery</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="employee_logout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>


<section id="dashboard" class="w3-container move">
		<section class="content-wrapper" style="padding-top: 90px;">
			<div class="container">
				<div class="row" style="background-color: #343a40; color: #f90d3d; padding: 15px 0px;">
					<h1 style="text-align: center; margin: 15px 0px;">Dashboard</h1>
				</div>

				<div class="row" style="background-color: #666767; padding: 15px 15px;">
					<div class="col-xs-6">
            <div class="card-footer" style="margin-top:0px;">
            <img src="img/avatar.png" width="100%" style="width: 150px; position: absolute;">
						<img src="img/<?php echo $_SESSION['profile_pic']; ?>" class="avatar" style="width: 150px; border-radius: 75px; border: solid 4px #f90d3d; position: relative;">
						<br>
						
             
                <button class="btn" href="" style="margin-top: 10px;">Change Picture</button>
              </div>
					</div>

					<div class="col-xs-6" style="padding: 40px 0px 0px 10px;">
						<h2 style="text-transform: uppercase;"><?php echo $_SESSION['name']; ?> </h2>
					</div>
				</div>
			</div>
		</section>

		<section class="content-wrapper">
			<div class="container">
				<div class="row" style="margin-top: 15px;">
					<h3 class="uppercase" style="color: #000"></h3>

					<!-- Profile Information Display-->
                    <div class="col-xs-12 col-lg-12">
                        <div class="card">
                            <div class="list-group list-group-flush small">
                                <div class="list-group-item list-group-item-action">
                                    <div class="media">
                                        <div class="media-body">
                                           	<div class="text-muted">
                                              	<div class="row">
	                                              	<div class="col-xs-6 col-lg-6">
		                                              	<ul class="listing">
  				                                            <li class="listing-item"><p>Nationality :</p></li>
  				                                            <li class="listing-item"><p>Email :</p></li>
  				                                            <li class="listing-item"><p>Phone Number :</p></li>
        							                                <li class="listing-item"><p>Gender :</p></li>
        							                                <li class="listing-item"><p>City :</p></li>
        							                                <li class="listing-item"><p>Suburb :</p></li>
					                                          <ul>     
		                                              </div>

				                                    <div class="col-xs-6 col-lg-6">
				                                        <ul class="listing">
				                                            <li class="listing-item"><p class="text-info"><?php echo $_SESSION["nationality"]; ?></p></li>
				                                            <li class="listing-item"><p class="text-info"><?php echo $_SESSION["email"]; ?></p></li>
				                                            <li class="listing-item"><p class="text-info"><?php echo $_SESSION["cell_number"]; ?></p></li>
      							                                <li class="listing-item"><p class="text-info"><?php echo $_SESSION["gender"]; ?></p></li>
      							                                <li class="listing-item"><p class="text-info"><?php echo $_SESSION["city"]; ?></p></li>
      							                                <li class="listing-item"><p class="text-info"><?php echo $_SESSION["suburb"]; ?></p></li>
      							                            <ul>
				                                    </div>
                                              	</div>
			                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</section>

    <!-- Preview -->
		<section class="content-wrapper" style="background-color: #fff;">
		    <div class="container">
		        <div class="row">
		        		<div class="col-lg-4" style="padding-left: 0px; background-color: #666767;">
                  <div class="card">                           
                                <div class="list-group list-group-flush small">
                                    <div class="list-group-item list-group-item-action">
                                        <div class="media">
                                          <div class="media-body" style="height: 310px;">
                                            <div class="text-muted">
                                                <img src="img/avatar.png" width="100%" style="position: absolute;">
                                                <img src="img/<?php echo $_SESSION["image1"]; ?>" width="100%" style="position: relative;">
                                                <?php    echo ""."<input type ='hidden' name ='hidden' value = " .$_SESSION["Id"] . "></input>";?>
                                        </div>
                                        
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer small text-muted" style="padding-top: 10px;">
                              <form action="upload.php" method="post" enctype="multipart/form-data">
                    
                              </form>
                            </div>
                </div>
			        	
                <div class="col-lg-4" style="padding-left: 0px; background-color: #666767;">
                  <div class="card">                           
                                <div class="list-group list-group-flush small">
                                    <div class="list-group-item list-group-item-action">
                                        <div class="media">
                                          <div class="media-body" style="height: 310px;">
                                            <div class="text-muted">
                                                <img src="img/avatar.png" width="100%" style="position: absolute;">
                                                <img src="img/<?php echo $_SESSION["image2"]; ?>" width="100%" style="position: relative;">
                                        </div>
                                        
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer small text-muted" style="padding-top: 10px;">
                              <form action="upload.php" method="post" enctype="multipart/form-data">
                    
                              </form>
                            </div>
                </div>
			        	
                <div class="col-lg-4" style="padding-right: 0px; background-color: #666767;">
                  <div class="card">                           
                                <div class="list-group list-group-flush small">
                                    <div class="list-group-item list-group-item-action">
                                        <div class="media">
                                          <div class="media-body" style="height: 310px;">
                                            <div class="text-muted">
                                                <img src="img/avatar.png" width="100%" style="position: absolute;">
                                                <img src="img/<?php echo $_SESSION["image3"]; ?>" width="100%" style="position: relative;">
                                        </div>
                                        
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer small text-muted" style="padding-top: 10px;">
                              <form action="upload.php" method="post" enctype="multipart/form-data">
                    
                              </form>
                            </div>
                </div>

		      	</div>
		    </div>
  		</section>
</section>

<!-- Profile Information Edit-->
<section id="profile" class="w3-container move" style="display:none; margin: 90px 0px;">
		<section class="content-wrapper">
			<div class="container">
				<div class="row" style="background-color: #343a40; color: #f90d3d; padding: 15px 0px;">
					<h1 style="text-align: center; margin: 15px 0px;">Profile Edit</h1>
				</div>
				<form action="employee.php" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Name</label>
                <input class="form-control" name="name" type="text" value="<?php echo $_SESSION["name"]; ?>">
              </div>
            <div class="col-md-6">
            <label>Email address</label>
            <input class="form-control" name="email" type="email" value="<?php echo $_SESSION["email"]; ?>">
          </div>
        </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>City</label>
                <input class="form-control" name="city"  type="text" value="<?php echo $_SESSION["city"]; ?>">
              </div>
              <div class="col-md-6">
                <label>Suburb</label>
                <input class="form-control" name="suburb" type="text" value="<?php echo $_SESSION["suburb"]; ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" name="cell_number" type="text" value="<?php echo $_SESSION["cell_number"]; ?>">
          </div>
       <?php    echo ""."<input type ='hidden' name ='hidden' value = " .$_SESSION["Id"] . "></input>";?>
          <button type="" id="button"  name="update" style="width: 100%;">Update</button>
        </form>
			</div>
		</section>
</section>	

<!-- Gallery -->
<section id="gallery" class="w3-container move" style="display:none;" >
	<section class="content-wrapper" style="padding: 98px 0px;">
			<div class="container">
				<div class="row" style="background-color: #343a40; color: #f90d3d; padding: 15px 0px;">
					<h1 style="text-align: center; margin: 15px 0px;">Gallery</h1>
				</div>

				<div class="row">
		        		<div class="col-lg-4" style="padding-left: 0px; background-color: #666767;">
		        			<div class="card">                           
                                <div class="list-group list-group-flush small">
                                    <div class="list-group-item list-group-item-action">
                                        <div class="media">
                                          <div class="media-body" style="height: 310px;">
                                            <div class="text-muted">
                                              	<img src="img/avatar.png" width="100%" style="position: absolute;">
                                              	<img src="img/<?php echo $_SESSION["image1"]; ?>" width="100%" style="position: relative;">
                                  			</div>
                                  			
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer small text-muted" style="padding-top: 10px;">
                            	<form action="employee.php" method="post" enctype="multipart/form-data">
								    <input class="btn" type="file" name="image1" id="fileToUpload">
								    <input class="btn" type="submit" value="Upload Image" name="submit_image">
                      <?php    echo ""."<input type ='text' name ='hidden' value = " .$_SESSION["image1"] . "></input>";?>
								</form>
							</div>
			        	</div>
			        	<div class="col-lg-4" style="padding: 0px 7px 0px 7px; background-color: #666767;">
							<div class="card">                           
                                <div class="list-group list-group-flush small">
                                    <div class="list-group-item list-group-item-action">
                                        <div class="media">
                                          <div class="media-body" style="height: 310px;">
                                            <div class="text-muted">
                                              	<img src="img/avatar.png" width="100%" style="position: absolute;">
                                              	<img src="img/<?php echo $_SESSION["image2"]; ?>" width="100%" style="position: relative;">
                                  			</div>
                                  			
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer small text-muted" style="padding-top: 10px;">
                                <form action="" method="post" enctype="multipart/form-data">
								    <input class="btn" type="file" name="image2" id="fileToUpload">
								    <input class="btn" type="submit" value="Upload Image" name="submit_image2">
								</form>
							</div>
			        	</div>
			        	<div class="col-lg-4" style="padding-right: 0px; background-color: #666767;">
			        		<div class="card">                           
                                <div class="list-group list-group-flush small">
                                    <div class="list-group-item list-group-item-action">
                                        <div class="media">
                                          <div class="media-body" style="height: 310px;">
                                            <div class="text-muted">
                                              	<img src="img/avatar.png" width="100%" style="position: absolute;">
                                              	<img src="img/<?php echo $_SESSION["image3"]; ?>" width="100%" style="position: relative;">
                                  			</div>
                                  			
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer small text-muted" style="padding-top: 10px;">
                               <form action="" method="post" enctype="multipart/form-data">
								    <input class="btn" type="file" name="image3" id="fileToUpload">
								    <input class="btn" type="submit" value="Upload Image" name="submit_image3">
								</form>
							</div>
			        	</div>
		      	</div>
			</div>


		</section>
</section>
<?php

mysqli_close($conn);
?>


		<footer class="footer" style="">
				<p>&copy; All rights reserved | 2020</p>
			</div>
		</footer>


		<script>
  function openmove(moveName) {
      var i;
      var x = document.getElementsByClassName("move");
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      document.getElementById(moveName).style.display = "block";  
  }
  </script>

		<script type="text/javascript" src="js/test.js"></script>
		<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
 
	</body>
</html>