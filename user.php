<?php 
$conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant');

 session_start();
                                        //update statement
                                        if (isset($_POST['update_status'])) {

                                          //query for updating the user table
                                          
                                          $results = $conn->query ("UPDATE `employee` SET `visible`= '".$_POST['visible']."' WHERE Id = '".$_POST['hiddenId']."' ");
          
          
          
                                        if ($results) {
                                          print 'success! record updated';
                                          header('Location: '.$_SERVER['REQUEST_URI']);
          
                                          }
                                          else {
                                            print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
                                          }
                                        }
 ?>
 <!DOCTYPE html>
<html>
  <head>
    <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {

            xmlhttp = new XMLHttpRequest();

        } else {

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","userOriginal.php?q="+str,true);// this will get the user according to whats on link
        xmlhttp.send();
    }
}
</script>
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


  <section class="content-wrapper" style="padding: 98px 0px;">
    <div class="container" style="background-color: #343a40;">
      <div class="row" style="color: #f90d3d; padding: 15px 0px;">
          <h1 style="text-align: center; margin: 15px 0px;">Career View(Activities)</h1>
        </div>
      <div class="row" style="background-color: #343a40; color: #f90d3d; padding: 15px 5px;">
          <!-- DataTables Card-->
            <div class="card col-md-12">
              <div class="card-header">
                <i class="fa fa-table"></i> Administration for Career
              </div>

                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Suburb</th>
                        <th>Date Started</th>
                        <th>Status</th>
                        <th>Update</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant');
                      if (!$conn) {
                          die('Could not connect: ' . mysqli_error($conn));
                      }
                                        
                      $query = "SELECT * FROM employee";
                      $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_array($result)) {
                  ?>
                <form method="post" action="">
                    <tr>
                      <?php echo ""."<input type ='hidden' name ='hiddenId' value = " .$row["Id"] . "></input>";?>
                      <td><?php echo $row["name"]; ?></td>
                      <td><?php echo $row["email"]; ?></td>
                      <td><?php echo $row["city"]; ?></td>
                      <td><?php echo $row["suburb"]; ?></td>
                      <td><?php echo $row["registered_date"]; ?></td>
                      <td>
                          <select name="visible">
                            <option>
                              <?php if($row["visible"] == 0) {
                                echo "OFF";
                            } else {
                              echo "ON";
                            }
                             ?></option>
                              <option value="0" style="background-color: #f90d3d;">OFF</option>
                              <option value="1" style="background-color: #31ff00;">ON</option>
                          </select>
                      </td>
                      <td><input type="submit" value="update_status" name="update_status"></td>
                  </tr>
                </form>

                  <?php

                        }
                        
                  ?>

                    </tbody>
                  </table>
                </div>
          </div>

      </div>
    </div>
  </section>

  <!-- Profile Information Edit-->
    <section class="content-wrapper" style="padding: 30px 0px;">
      <div class="container" style="background-color: #343a40;">        
        <div class="row" style="background-color: #343a40; color: #f90d3d; padding: 15px 0px;">
          <h1 style="text-align: center; margin: 15px 0px;">Profile Edit</h1>
        </div>          
        <form style="margin: 15px 0px;" method="post" >
          <select class="form-control" name="users" style="background-color: #666767; max-width: 400px; color: #fff;" onchange="showUser(this.value)">
            <option value="">Select a person:</option>
              <?php
                $conn = new mysqli('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant');
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                } 
                $query = "SELECT * FROM employee";
                $result = mysqli_query($conn, $query);
                  if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_array($result)) {                          
                        ?><option value="<?php echo $row['Id']; ?>" style="background-color: #f90d3d;"><?php echo $row['name']; ?></option><?php
                          }
                        }
                      }
                    ?>
          </select>
          <input type="submit" name="submit_user" value="Load User" />
        </form>                                 
          <div id="txtHint"><b>Person info will be listed here...</b></div>
      </div>
    </section>

    <section class="content-wrapper">
      <div class="container">
        <?php

/*$conn = mysqli_connect('stone.aserv.co.za','instaapn','n5eahq]glm4t', 'instaapn_instant');
$q = "";
$q = intval($_GET['q']);// this q get from the value of the options then combines with whats in the base

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}*/


//update statement
if (isset($_POST['update'])) {

  //query for updating the user table
  $results = $conn->query ("UPDATE `employee` SET `name`= '".$_POST['name']."',`nationality`='".$_POST['nationality']."',`body_type`='".$_POST['body_type']."',`cell_number`='".$_POST['cell_number']."',`email`= '".$_POST['email']."',`experience`='".$_POST['experience']."',`gender`='".$_POST['gender']."',`city`='".$_POST['city']."',`suburb`='".$_POST['suburb']."',`bio`='".$_POST['bio']."' WHERE Id = '".$_POST['hidden']."' ");



if ($results) {
  print 'success! record updated';


  }
  else {
    print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
  }
}


//deleting the record from institutions table
if (isset($_POST['delete'])) {
  $results = $conn->query("DELETE FROM employee WHERE Id = '".$_POST['hidden']."' ");
  if($results) {
    print 'success! record deleted';

  }else {
     print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
  }
}

$selected_val= "";
if(isset($_POST['submit_user'])){
  $selected_val = $_POST['users'];  // Storing Selected Value In Variable
  echo "You have selected :" .$selected_val;  // Displaying Selected Value
  }

mysqli_select_db($conn,"instant");// lols they told me to use this function its same as used in ur code but this function feels wrong
$sql="SELECT * FROM `employee` WHERE Id = '".$selected_val."'";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result)) {



?>
                <form action="user.php" method="post" enctype="multipart/form-data">
                   <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-table"></i> <h5>All accounts.</h5>
              </div>

              <div class="card-body">
                  <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <?php echo "<td>"."<input class = form-control name = name value =" .$row['name'] . "></td>"; ?>
                        </div>
                      
                    <div class="col-md-6">
                      <label>Email address</label>
                      <input class="form-control" name="email" type="email" value="<?php echo $row["email"]; ?>">
                    </div>
                    </div>

                    <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-6">
                            <label>City</label>
                            <select class="form-control" name="city">
                              <option value="<?php echo $row['city']; ?>"><?php $row['city']; ?></option>
                              <option value="Pretoria">Pretoria</option>
                              <option value="Johannesburg">Johannesburg</option>
                            </select>
                          </div>

                          <div class="col-md-6">
                            <label>Suburb</label>
                            <input class="form-control" name="suburb" type="text" value="<?php echo $row["suburb"]; ?>">
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label>Phone Number</label>
                      <input class="form-control" name="cell_number" type="text" value="<?php echo $row["cell_number"]; ?>">
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Male</label>
                          <input type="radio" name="gender" checked="required" value="<?php $row['gender'];?>" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Female</label>
                        <input type="radio" name="gender" checked="required" value="<?php $row['gender'];?>" required>
                      </div>
                    </div>
                  </div>

                
                    <div class="form-group">
                      <h6>Fetish</h6>
                      <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="prostae_play" type="checkbox">Prostate Play</label> 
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="greek" type="checkbox">Greek</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="gold_showere" type="checkbox">Gold Showers</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="fisting" type="checkbox">Fisting</label>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="foot_fetish" type="checkbox">Foot fetish</label>  
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="cross_dressing" type="checkbox">Cross Dressing</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="couples" type="checkbox">Couples</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="rimming" type="checkbox">Rimming</label>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="pregnant" type="checkbox">Pregnant</label>  
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="matwe" type="checkbox">Matwe</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="tranny" type="checkbox">Tranny</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="dress_up" type="checkbox">Dress Up</label>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="massage" type="checkbox">Massage</label>  
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="bdsm" type="checkbox">BDSM</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="cock_torture" type="checkbox">Cock Torture</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="massage_only" type="checkbox">Massage Only</label>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="bbw" type="checkbox">BBW</label>  
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="strpper" type="checkbox">Stripper</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="discipline" type="checkbox">Discipline</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="shemale" type="checkbox">Shemale</label>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="upmarket" type="checkbox">Upmarket</label>  
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" name="brown_showers" type="checkbox">Brown Showers</label>
                            </div>
                          </div>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-6">
                          <div class="form-group">
                        <select class="form-control" type="text" name="nationality" required="required">
                          <option value="<?php echo $row['nationality'] ?><?php echo $row['nationality'] ?></option>
                          <option value="Black">Black</option>
                          <option value="White">White</option>
                          <option value="Coloured">Coloured</option>
                          <option value="Indian">Indian</option>
                        </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                        <select class="form-control" type="text" name="body_type" required="required">
                          <option value="<?php echo $row['body_type'] ?>"> <?php echo $row['body_type'] ?></option>
                          <option value="Black">BBW</option>
                          <option value="Slender">Slender</option>
                          <option value="Muscular">Muscular</option>
                        </select>
                        </div>
                    </div>
                  </div>

               

                  <div class="form-group">
                    <label>Experience</label>
                    <input class="form-control " type="date" name="experience" value="<?php echo $row['experience'] ?>" placeholder="experience" required>
                  </div>



                    <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-6">
                            <label>Eyes</label>
                            <select class="form-control" name="eye_colour">
                              <option><?php echo $row['eye_colour']; ?></option>
                              <option>Eye colour</option>
                              <option>Brown</option>
                              <option>Blue</option>
                              <option>Hazel</option>
                            </select>
                          </div>

                          <div class="col-md-6">
                            <label>Hair</label>
                            <select class="form-control">
                              <option>Hair colour</option>
                              <option>Black</option>
                              <option>Brown</option>
                              <option>Blond</option>
                            </select>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-6">
                            <label>Travel</label>
                            <select class="form-control">
                              <option>yes</option>
                              <option>No</option>
                            </select>
                          </div>

                          <div class="col-md-6">
                            <label>Property</label>
                            <select class="form-control">
                              <option>Property</option>
                              <option>Flat</option>
                              <option>Town house</option>
                              <option>Apartment</option>
                              <option>Guest house</option>
                              <option>Private Vanue</option>
                            </select>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <textarea class="form-control" name ="bio" value ="<?php echo $row['bio']; ?>" placeholder="BIO"><?php echo $row['bio']; ?></textarea>
                  </div>
                 

            
                  
                  <?php
                  echo ""."<input type ='hidden' name ='hidden' value = " .$row['Id'] . "></input>";
                  ?>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="submit" id="button"  name="update" value="update" style="width: 100%; background-color: limegreen;">
                    </div>

                    <div class="col-md-6">
                      <input type="submit" id="button" name="delete" value="delete" style="width: 100%; background-color: #f90d3d;">
                    </div>
                  </div>
                </div>
      </div>
      </div>

              </form>
<?php
}
?>
<?php

?>

      </div>
    </section>
  </body>

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

</html>