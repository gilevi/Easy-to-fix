<?php  
		session_start();
		include '../include/class.user.php';
		$user = new User();
		$uid = $_SESSION['uid'];
		if (!$user->get_session()){
		header("location: login.php");
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
    <script type="text/javascript" src="demoFiles/js/jquery1.5.1.js"></script>
    <script type="text/javascript" src="demoFiles/js/en.js"></script>
    <script type="text/javascript" src="demoFiles/js/oCalendar.js"></script>
    <link id="themeCss" rel="stylesheet" type="text/css" href="demoFiles/css/blue.css"/>
    <link href="../css/style.css" rel="stylesheet">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <script>
        $(document).ready(function(){
           
            $("#calendar").oCalendar({
                height:630,
                url:'remote.php'
            });
        });

        function sendmail(){
          console.log("sendmail");
            $.ajax({
                    url: 'remote.php',
                    type:'POST',
                    async: false,
                    dataType: 'json',
                    data: "function=choose&pid="+document.getElementById('cpid').value+"&sid="+document.getElementById('csid').value,
                    success: function(resp){                        
                        if(resp.success){
                          console.log('s');
                          alert("An email was send to the supplier");
                          //location.reload();
                        }else{
                          console.log('e');
                          alert("ERROR sending mail: "+resp.error);
                          //location.reload();
                        }
                    }
            });
        }

        function sendmail2(btn){
          console.log("sendmail2 "+btn.value);
            $.ajax({
                    url: 'remote.php',
                    type:'POST',
                    async: false,
                    dataType: 'json',
                    data: "function=confirm&pid="+document.getElementById('cpid2').value+"&action="+btn.value,
                    success: function(resp){                        
                        if(resp.success){
                          alert("An email was sent to the supplier");
                          //location.reload();
                        }else{
                          console.log('e');
                          alert("ERROR sending mail: "+resp.error);
                          //location.reload();
                        }
                    }
            });
        }

        


    </script>
  </head>
        <body>
            
            <div class="code">

            <div id="calendar">
            $("#calendar").oCalendar({
                    
                });

            </div>
            </div>

  <script src="../contactform/contactform.js"></script>

  <script src="../js/main.js"></script>

  </body>

</html>
