<?php  
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link href="img/icon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <!-- <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
	<div style="margin-top: 4%;"></div>
	<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4 well">
	<center><h1 class="text-light"><a href="#header"><span>Easy To Fix</span></a></h1></center>
<br>
	<h2 class="text-center">Login Here</h2>
		<form action="include/login.php" method="post" name="login">
		<div class="form-group">
		<label>UserName or Email:</label>
		<input class="form-control" type="text" name="emailusername" required="" />
		</div>
		<div class="form-group">
		<label>Password:</label>
		<input class="form-control" type="password" name="password" required="" />
		</div>
		<input class="btn btn-primary" type="submit" name="login" value="Login" />
		</form>
	<br>
	<?php 
	// Show any success or error message 
		if(isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			session_unset();
		}
	?>
	</div>


         
	</div> <!-- End row -->
	</div> <!-- End container -->
</body>
</html>
