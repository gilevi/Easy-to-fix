<?php  
		session_start();
		include 'include/class.user.php';
		$user = new User();
		$uid = $_SESSION['uid'];
		if (!$user->get_session()){
		header("location: login.php");
		exit();
		}

	

	if (isset($_GET['q'])){
	$user->user_logout();
	header("location:login.php");
	exit();
  }
  

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Easy To Fix </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/icon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">


 
</head>

<body>

  <!--==========================
  Header
  ============================-->
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
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#supplierForm">Add New supplier </a></li>
          <li><a href="#problemsForm">Add new problem</a></li>
          
          <li><a href="calendar/calendar.php">Start to fix the fault</a></li>
          <li> <a href="index.php?q=logout">LOGOUT</a></li>  



        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="img/intro-img.svg" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>We provide<br><span>solutions</span><br>for your problems!</h2>
        <div>
          <a href="#team" class="btn-get-started scrollto">Team</a>
          <a href="#why-us" class="btn-services scrollto">Why choose us</a>
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">



     <!--==========================
      supplier Section
    ============================-->


  <center><section id="supplierForm" class="clearfix">
  
      <div class="container">
      <header class="section-header">
                        <h3 class="section-title">Add new supplier </h3>
                      </header>

        <div class="row">
            <div class="col-lg-12">
          
                <div class="col-md-6 col-md-offset-3">
                   
                <form role="form" method="post" id="reused_form" action="add_supplier.php">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="name">
                                Full Name:</label>
                            <input type="text" class="form-control" id="fullname" name="fullname"  maxlength="50" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="city">
                                City :</label>
                            <input type="text" class="form-control" id="citycode" name="city"  maxlength="50" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="email">
                                Phone:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required
                            maxlength="50">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="name">
                                specialization</label>
                            <input type="text" class="form-control" id="specialization" name="specialization"  maxlength="50" required>
                        </div>
                    </div>

  
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="email">
                                Email:</label>
                            <input type="text" class="form-control" id="email" name="email" required
                            maxlength="50">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="date" id="inputD">
                               Date: </label>
                                <input type="date" name="Sdate"  required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="name">
                                Comments:</label>
                            <textarea class="form-control" type="textarea" id="message" name="comments" placeholder="Your comments type Here" maxlength="6000" rows="7"></textarea>
                        </div>
                    </div>
                    
                                <div class="row">
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Add! </button>
                        </div>
                    </div>
        
                </form>
                <div id="success_message" style="width:100%; height:100%; display:none; ">
                    <h3>Sent your message successfully!</h3>
                </div>
                <div id="error_message"
                        style="width:100%; height:100%; display:none; ">
                            <h3>Error</h3>
                            Sorry there was an error sending your form.
        
                </div>
            </div>
   </div>
             </div>
        

      </div>
    </section></center>




    <!--==========================
      problem form Section
    ============================-->
    <center><section id="problemsForm" class="clearfix">
      <div class="container">

        

        <div class="row">
            <div class="col-lg-12">
               
                <div class="col-md-6 col-md-offset-3">
                    <header class="section-header">
                    <br>
                    <br>
                        <h3 class="section-title"> Add new problem </h3>
                      </header>
                      
                <form role="form" method="post" id="reused_form" action="add_problem.php">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="name">
                                ID:</label>
                                <input type="text" class="form-control" id="problemId" name="problemId"  maxlength="50" required>
                                <input type="hidden" id="City" name="City" />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="citycode">
                               Name of Authority:</label>
                            <input type="text" class="form-control" id="nameOfAuthority" name="nameOfAuthority"  maxlength="50" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="email">
                                Exact Location:</label>
                            <input type="text" class="form-control" id="ExactLocation" name="ExactLocation" required
                            maxlength="50">
                        </div>
						              <div class="col-sm-6 form-group">
                            <label for="date" id="inputD">
                               Date: </label>
                                <input type="text" name="sdate" id="sdate" required>
                        </div>

                        
                    </div>
                 
  
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="email">
                               Citizen phone:</label>
                            <input type="tel" class="form-control" id="phoneOfCitizen" name="phoneOfCitizen" required
                            maxlength="50">
                        </div>
			     <div class="col-sm-6 form-group">
						<label for="email">
                               Citizen Full Name:</label>
                            <input type="text" class="form-control" id="fullNameCitizen" name="fullNameCitizen" required
                            maxlength="50">
                        </div>
                        
                    </div>
					
					   <div class="row">
					   <div class="col-sm-6 form-group">
                            <label for="name">
                                Citizen Email</label>
                            <input type="email" class="form-control" id="emailOfCitizen" name="emailOfCitizen"  maxlength="50" required>
                        </div>
						
                            

                        <div class="col-sm-6 form-group">
                            <label>
									Image path</label>
                            <input type="text"  id="img" name="img" readonly  maxlength="50" required>
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="name">
                                Event Type:</label>
                            <textarea class="form-control" type="textarea" id="evenType" name="evenType" placeholder="Your comments type Here" maxlength="6000" rows="7"></textarea>
                        </div>
                    </div>
                                <div class="row">
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Add! </button>
                        </div>
                    </div>
        
                </form>

               
                <div id="success_message" style="width:100%; height:100%; display:none; ">
                    <h3>Sent your message successfully!</h3>
                </div>
                <div id="error_message"
                        style="width:100%; height:100%; display:none; ">
                            <h3>Error</h3>
                            Sorry there was an error sending your form.
        
                </div>
            </div>
   </div>
            </div>
        

      </div>
</center>
    


    
    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Why choose us?</h3>
          
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-diamond"></i>
              <div class="card-body">
                <h5 class="card-title">Simple and convenient interface</h5>
                <p class="card-text">the transfer of treatment to the owner of the profession, the manner in which the professionals are introduced, the speed of handling the request is simple and convenient to operate</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4"> 
            <div class="card wow bounceInUp">
                <i class="fa fa-language"></i>
              <div class="card-body">
                <h5 class="card-title">Professionalism</h5>
                <p class="card-text">We believe in personal responsibility and great responsibility to our customers at all stages of the process and after the completion of the malfunction</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-object-group"></i>
              <div class="card-body">
                <h5 class="card-title">High standard</h5>
                <p class="card-text">for us, the guideline is a genuine aspiration for excellence.We always keep our finger on the pulse with innovation, quality and professionalism </p>
              </div>
            </div>
          </div>

        </div>

    

      </div>
    </section>

    <!--==========================
      Team Section
    ============================-->
    
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3>Team</h3>
        </div>

         <center><div class="row">

         <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/gil.jpg" class="img-fluid" alt="img/gil.jpg">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Gil Levi</h4>
                  <div class="social">
                    <a href="https://www.facebook.com/gil.levi.9"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/in/gil-levi-4a9501167/"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
    
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="img/inbal.jpg" class="img-fluid" alt="img/inbal.jpg">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Inbal Zubari</h4>
                  <div class="social">
                    <a href="https://www.facebook.com/inbal.zubari"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/in/inbal-zubari-%D7%A2%D7%A0%D7%91%D7%9C-%D7%A6%D7%95%D7%91%D7%A8%D7%99-662614153/"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="img/aviad.jpg" class="img-fluid" alt="img/aviad.jpg">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Aviad Haim</h4>
                  <div class="social">
                    <a href="https://www.facebook.com/aviad.haim"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/in/aviad-haim-%D7%90%D7%91%D7%99%D7%A2%D7%93-%D7%97%D7%99%D7%99%D7%9D-97b01b173/"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>        </center>

    </section>
    <!-- #team -->
    

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row wow fadeInUp">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
            </div>
          </div>

         <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p>Gaza Street Tel Aviv</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>easy.tofix2019@gmail.com</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>+1 5589 55488 55</p>
              </div>
            </div>

            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>
  
  
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Easy to fix</h3>
            <p> </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#intro">Home</a></li>
             <li><a href="#supplierForm">Add New supplier </a></li>
          <li><a href="#problemsForm">Add new problem</a></li>
          <li><a href="calendar/calendar.php">Start to fix the fault</a></li>
              
            </ul>
          </div>

        

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              
              <strong>Email:</strong> easy.tofix2019@gmail.com <br>
            </p>

            <div class="social-links">
              <a href="https://www.facebook.com/esay.tofix" class="facebook"><i class="fa fa-facebook"></i></a>
             
            </div>

          </div>

          <!--<div class="col-lg-3 col-md-6 footer-newsletter">-->
          <!--  <h4>Our Newsletter</h4>-->
          <!--  <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>-->
          <!--  <form action="" method="post">-->
          <!--    <input type="email" name="email"><input type="submit"  value="Subscribe">-->
          <!--  </form>-->
          <!--</div>-->

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Easy to fix</strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!--  Main Javascript File -->
  <script src="js/main.js"></script>
  <script>
    <?php 

    require_once('include/problem.php');   
    $json = file_get_contents("https://report-it.herokuapp.com/reports/byauthorityintimerange/Tel%20Aviv_police/1483221600/1560879806"); 
    $obj = json_decode($json, true);
     if(strpos($obj['message'], "0 reports") !== false)
    {
        echo '<!-- no reports -->';
    }else{
    foreach($obj['reports'] as $report){
      $id = $report['_id'];
      if(problem::is_exist($id)){
        continue;
      }

      // found a new problem
      echo 'var problemId = "'.$report['_id'].'";';
      echo 'var nameOfAuthority = "'.$report['reportAuthoritiesFull'][0].'";';
      $date = substr($report['createdAt'],0,10);
      $year = substr($date,0,4);
      $month = substr($date,5,2);
      $day = substr($date,8,2);
      echo 'var sdate = "'.$day.'-'.$month.'-'.$year.'";';
      echo 'var phoneOfCitizen = "'.$report['reporterPhone'].'";';
      echo 'var fullNameCitizen = "'.$report['reporterName'].'";';
      echo 'var emailOfCitizen = "'.$report['reporterEmail'].'";';
      echo 'var evenType = "';
        foreach($report['reportScenarios'] as $s){
          echo $s.". ";
        }
        echo '";';
      
        break;
        }
        //echo 'var image = "'..'";';
        $intArray = $report['reportPicture']['data'];
        $filename = 'images/'.strval(time()).'.png';
        file_put_contents($filename, pack("C*", ...$intArray));
        echo 'var img = "'.$filename.'";';
        $key = 'AIzaSyD2h83nN9agaQlRoYcTuAoCcpF6q3ev7xI';
        $addr_json = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$report['reportLocation']['latitude'].','.$report['reportLocation']['longitude'].'&sensor=true&key='.$key),true); 

        echo 'var ExactLocation = "'.$addr_json['results'][0]['formatted_address'].'";';
        $components = $addr_json['results'][0]['address_components'];
        $City = "";
        foreach($components as $c){
          $types = $c['types'];
          foreach($types as $t){
            if($t == 'locality'){
              $City = $c['short_name'];
              break;
            }
          }
          if($City!="")
          {
            break;
          }
        }
        echo 'var City = "'.$City.'";';
    ?>

    document.getElementById('problemId').value = problemId; 
    document.getElementById('nameOfAuthority').value = nameOfAuthority;
    document.getElementById('ExactLocation').value = ExactLocation.replace("'","");
    document.getElementById('sdate').value = sdate;
    document.getElementById('phoneOfCitizen').value = phoneOfCitizen;
    document.getElementById('fullNameCitizen').value = fullNameCitizen;
    document.getElementById('emailOfCitizen').value = emailOfCitizen;
    document.getElementById('evenType').value = evenType;
    document.getElementById('img').value = img;
    document.getElementById('City').value = City;
    <?php
    }
    ?>
    
  </script>
  
</body>
</html>
