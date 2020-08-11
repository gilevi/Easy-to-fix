<?php  

		session_start();
		include '../include/class.user.php';
		$user = new User();
		$uid = $_SESSION['uid'];
		if (!$user->get_session()){
		header("location: ../login.php");
		exit();
		}



        if (isset($_GET['q'])){
        $user->user_logout();
        header("location:../login.php");
        exit();
        }
        ?>

<?php  

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
  <title> Easy To Fix </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"> 
    <meta content="" name="keywords">
    <meta content="" name="description">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <!-- Favicons -->
  <link href="../img/icon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

<!-- Bootstrap CSS File -->
<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Libraries CSS Files -->
<link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="../lib/animate/animate.min.css" rel="stylesheet">
<link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

<!-- Main Stylesheet File -->
<link href="../css/style.css" rel="stylesheet">

    <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#header"><span>Easy To Fix</span></a></h1>
        <a href="../index.php#intro" class="scrollto"><img src="../img/logo.png" alt="" class="img-fluid"></a>
        
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
     
        <ul>
        <li><a href="#"> Welcome <?php $user->get_fullname($uid); ?>!</a>	</li>        
          <li class="active"><a href="../index.php#intro">Home</a></li>
          <li><a href="../index.php#supplierForm">Add New supplier </a></li>
          <li><a href="../index.php#problemsForm">Add new problem</a></li>
          <li><a href="calendar.php">Start to fix the fault</a></li>
          <li> <a href="../index.php?q=logout">LOGOUT</a></li>  



        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

    <script>


        $(document).ready(function(){
            $("#theme").change(function(){
                changeTheme();
            });

            $("#calendar").oCalendar({
                height:630,
                url:'remote.php'
            });
        });

        function loadCss(filename){
            $("#themeCss").attr("href", filename);
        }

        function changeTheme(){
            var val = $("#theme").val();
            loadCss(val);
        }
        


    </script>
  </head>
        <body>
        
        <button type="button" class="mobile-nav-toggle d-lg-none">
            <i class="fa fa-bars">
                </i>
        </button>
        
        <iframe src="inner.php" id="iFrame1" style="position:absolute;top:57px;width:100%;height:100vh;"></iframe>

        </body>

</html>
