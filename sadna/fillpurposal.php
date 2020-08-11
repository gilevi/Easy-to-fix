<?php

require_once('include/problem.php');
require_once('include/supplier.php');

if(isset($_POST['submit']))
{
    $code = $_POST['code'];
    $price = $_POST['price'];
    $avail = $_POST['avail'];
    $pid = $_POST['pid'];
	
	$problem = problem::get_by_id($pid);
	if($problem->code != $code || $problem->isopen != 2){
		echo '<script>alert("bad secret code or the status of the problem was changed");</script>';
	}else{
		problem::update_isopen($_POST['pid'], 3);
		problem::update_price($_POST['pid'], $price);
		problem::update_avail($_POST['pid'], $avail);
		echo '<script>alert("The purposal was sent successfuly! Now you need to wait for confirmation email.");</script>';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Supplier purposal</title>
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
	<h2 class="text-center">Purposal</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="login">
		<div class="form-group">
		<label>Secret code:</label>
		<input class="form-control" type="text" name="code" required="" />
		<input class="form-control" type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>" required="" />
		</div>
		<div class="form-group">
		<label>Price (ILS):</label>
		<input class="form-control" type="text" name="price" required="" />
		</div>
		<div class="form-group">
		<label>Availability:</label>
		<input class="form-control" type="text" name="avail" required="" />
		</div>
		<input class="btn btn-primary" type="submit" name="submit" value="Send" />
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
