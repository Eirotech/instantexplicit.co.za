<?php 
$conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant');

 session_start();
 if(isset($_SESSION["name"])) {
 		
 }else{
 	header('Location: main_admin_login.php');
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
		          <a class="nav-link" href="main_admin.php" >
		            <i class="fa fa-fw fa-dashboard"></i>
		            <span class="nav-link-text">Dashboard</span>
		          </a>
		        </li>

		        <!--Profile-->
		        <li class="nav-item" data-toggle="tooltip" data-placement="right">
		          <a class="nav-link" href="user.php">
		            <i class="fa fa-fw fa-user"></i>
		            <span class="nav-link-text">Career Admin</span>
		          </a>
		        </li>

		        <!--Gallery-->
		        <li class="nav-item" data-toggle="tooltip" data-placement="right">
		          <a class="nav-link" href="admin_view.php">
		            <i class="fa fa-fw fa-users"></i>
		            <span class="nav-link-text">VIP Admin</span>
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
		          <a class="nav-link" href="main_admin_logout.php">
		            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
		        </li>
		      </ul>
		    </div>
		  </nav>


		 <!-- Dashboard -->
		<section id="dashboard" class="w3-container move">
		<div class="content-wrapper" style="padding-top: 90px;">
			<div class="container">
				<div class="row" style="background-color: #343a40; color: #f90d3d; padding: 15px 0px;">
					<h1 style="text-align: center; margin: 15px 0px;">Dashboard</h1>
				</div>

				<div class="row" style="background-color: #666767; padding: 15px 15px;">
					<div class="col-xs-6" style="padding: 40px 0px 0px 10px;">
						<h2 style="text-transform: uppercase;"><?php echo $_SESSION['name'];?> </h2>
						<p><?php echo $_SESSION['email'];?></p>
					</div>
				</div>
			</div>
		</div>

		<!-- Notice Board -->
		<div class="content-wrapper">
			<div class="container">
				<div class="row" style="background-color: #343a40; color: #f90d3d; padding: 15px 5px;">
					<h1 style="text-align: center; margin: 15px 0px;">News Feed</h1>
				</div>
				<div class="row" style="background-color: #343a40; color: #f90d3d; padding: 15px 5px;">
					<div class="col-md-12">
						<div class="card" width="100%">
	      					<div class="card-body">
								<form action="" method="post">
									<div class="form-group">
				            			<div class="form-row">
											<input class="form-control" type="text" name="subject" placeholder="Subject">
										</div>
									</div>

									<div class="form-group">
				            			<div class="form-row">
											<textarea class="form-control" name="message" placeholder="Message"></textarea>
										</div>
									</div>

									<input class="btn btn-primary btn-block" type="submit" name="submit" value="submit">
								</form>
							</div>
						</div>
					</div>

					<?php 
						if(isset($_POST['submit'])); {
							if(!empty($_POST['subject']) && !empty($_POST['message'])) {
								$subject = $_POST['subject'];
								$message = $_POST['message'];
							
								$conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant') or die (mysqli_error());
								$db = mysqli_select_db($conn, 'instant') or die("DB error");

								$query = mysqli_query($conn, "SELECT * FROM message WHERE message='".$message."'" );
								$numrows = mysqli_num_rows($query);
								
								$sql = "INSERT INTO message(subject, message) VALUES('{$subject}','{$message}')";
								$results = mysqli_query($conn, $sql);

									if($results) {
										echo "Your message was sent ";

									} else {
										echo "Failure";
									}

								}
							else
							{

							?>


							<?php

								}
							}
						?>

				</div>
			</div>
			</div>
		</section>

		<!-- Database Table -->
		<section id="career" class="w3-container move" style="display:none;">					
			





				<!-- John Database Table -->
		<section id="vip_admin" class="content-wrapper w3-container move" style="display:none;">
			<div class="content-wrapper" style="padding: 98px 0px;">
	    	<div class="container" style="background-color: #343a40;">
	    		<div class="row" style="color: #f90d3d; padding: 15px 0px;">
					<h1 style="text-align: center; margin: 15px 0px;">Admin View(Activities)</h1>
				</div>
	      		<!-- DataTables Card-->
	      		<div class="card col-md-12">
	        		<div class="card-header">
	      				<i class="fa fa-table"></i> Administration for VIP
	      			</div>

			        <div class="card-body">
			          <div class="table-responsive">
			            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			              <thead>
			                <tr>
			                  <th>Surname</th>
			                  <th>Email</th>
			                  <th>Status</th>
			                </tr>
			              </thead>
			              <tbody>
			              	<?php  
					          	$query = "SELECT * FROM vip";
					          	$result = mysqli_query($conn, $query);
					            	if(mysqli_num_rows($result) > 0) {
					             		while($row = mysqli_fetch_array($result)) {
					        ?>
					        <tr>
					            <td><?php echo $row["surname"]; ?></td>
					            <td><?php echo $row["email"]; ?></td>			
					            <td>
					                <select>
					                  	<option value="0" style="background-color: #f90d3d;">OFF</option>
					                  	<option value="1" style="background-color: #31ff00;">ON</option>
					                </select>
					            </td>
					        </tr>

					        <?php
					            	}
					          	}
					        ?>
			              </tbody>
			            </table>
			          </div>
			      </div>
	        </div>
				</div>
			</div>
		</section>




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
	<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>

	</body>
</html>