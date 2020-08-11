<?php  
		session_start();
		include 'include/class.user.php';
		$user = new User();
		$uid = $_SESSION['uid'];
		if (!$user->get_session()){
		header("location: login.php");
		exit();
		}

	if ( $_SESSION['uid'] > 0 ) {
		$ucolor="white";
	}

	if (isset($_GET['q'])){
	$user->user_logout();
	header("location:login.php");
	exit();
	}
    ?>

<?php  

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Easy To Fix </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/mainTable.css">

    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
    </head>

    <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#header"><span>Easy To Fix</span></a></h1>
        <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a>
        
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
     
        <ul>
        <li><a href="#"> Welcome <?php $user->get_fullname($uid); ?>!</a>	</li>        
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="index.php">Add New supplier </a></li>
          <li><a href="index.php">Add new problem</a></li>
          <li> <a href="index.php?q=logout">LOGOUT</a></li>  



        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header>

<br>
<br>
<br>
<br>
<br>
<main>
  <section id="faultDetails" class="clearfix">
      <div class="container">

        

        <div class="row">
            <div class="col-lg-12">
               
                <div class="col-md-6 col-md-offset-3">
                    <header class="section-header">
                        <h3 class="section-title"> Fault details: </h3>
                      </header>
              
                      <div class="limiter">
		<!-- <div class="container-table100"> -->
			<div class="wrap-table100">
					<div class="table">

						<div class="row1 header">
							<div class="cell">
								Full Name
							</div>
							<div class="cell">
								Age
							</div>
							<div class="cell">
								Job Title
							</div>
							<div class="cell">
								Location
							</div>
						</div>

						<div class="row1">
							<div class="cell" data-title="Full Name">
								Vincent Williamson
							</div>
							<div class="cell" data-title="Age">
								31
							</div>
							<div class="cell" data-title="Job Title">
								iOS Developer
							</div>
							<div class="cell" data-title="Location">
								Washington
							</div>
						</div>

						<div class="row1">
							<div class="cell" data-title="Full Name">
								Joseph Smith
							</div>
							<div class="cell" data-title="Age">
								27
							</div>
							<div class="cell" data-title="Job Title">
								Project Manager
							</div>
							<div class="cell" data-title="Location">
								Somerville, MA
							</div>
						</div>

						<div class="row1">
							<div class="cell" data-title="Full Name">
								Justin Black
							</div>
							<div class="cell" data-title="Age">
								26
							</div>
							<div class="cell" data-title="Job Title">
								Front-End Developer
							</div>
							<div class="cell" data-title="Location">
								Los Angeles
							</div>
						</div>

						<div class="row1">
							<div class="cell" data-title="Full Name">
								Sean Guzman
							</div>
							<div class="cell" data-title="Age">
								25
							</div>
							<div class="cell" data-title="Job Title">
								Web Designer
							</div>
							<div class="cell" data-title="Location">
								San Francisco
							</div>
						</div>

						<div class="row1">
							<div class="cell" data-title="Full Name">
								Keith Carter
							</div>
							<div class="cell" data-title="Age">
								20
							</div>
							<div class="cell" data-title="Job Title">
								Graphic Designer
							</div>
							<div class="cell" data-title="Location">
								New York, NY
							</div>
						</div>

						<div class="row1">
							<div class="cell" data-title="Full Name">
								Austin Medina
							</div>
							<div class="cell" data-title="Age">
								32
							</div>
							<div class="cell" data-title="Job Title">
								Photographer
							</div>
							<div class="cell" data-title="Location">
								New York
							</div>
						</div>

						<div class="row1">
							<div class="cell" data-title="Full Name">
								Vincent Williamson
							</div>
							<div class="cell" data-title="Age">
								31
							</div>
							<div class="cell" data-title="Job Title">
								iOS Developer
							</div>
							<div class="cell" data-title="Location">
								Washington
							</div>
						</div>

						<div class="row1">
							<div class="cell" data-title="Full Name">
								Joseph Smith
							</div>
							<div class="cell" data-title="Age">
								27
							</div>
							<div class="cell" data-title="Job Title">
								Project Manager
							</div>
							<div class="cell" data-title="Location">
								Somerville, MA
							</div>
						</div>

					</div>
			</div>
		</div>
	</div>

                
            </div>
   <!-- </div> -->
             </div>
        

      </div>
    </section>

<br>
<br>
<br>
<br>
<br>
</main>

  <!--  Main table Javascript Files -->

  <!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/mainTable.js"></script>
</body>

</html>
