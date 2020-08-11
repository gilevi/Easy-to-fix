<?php  
  
require_once('../include/problem.php');
require_once('../include/supplier.php');
require_once( '../PHPMailer/src/Exception.php');
require_once('../PHPMailer/src/PHPMailer.php');
require '../PHPMailer/src/SMTP.php';


if($_POST['function'] == "load"){
  $start = DateTime::createFromFormat("d-m-Y G:i", $_POST['start']);
  $end = DateTime::createFromFormat("d-m-Y G:i", $_POST['end']);
  
  $problems=problem::fetch_all();
  $s="";
  for($i=0;$i<count($problems);$i+=1){
    $p=$problems[$i];
    $s=$s.'{';
      $s=$s.'"id":"'.$p->id.'",';
      $s=$s.'"ack":"'.$p->evenType.'",';
      $s=$s.'"time":"'.$p->pdate.'",';
      $s=$s.'"date":"'.$p->pdate.'",';
      $s=$s.'"isopen":"'.$p->isopen.'",';
      $s=$s.'"city":"'.$p->city.'"';
      if($i<count($problems)-1)
      {
        $s=$s.'},';

      }else{
        $s=$s.'}';

      }
  }
  echo "[".$s."]";
}

if($_POST['function'] == "supplier"){   
  $problem=problem::get_by_id($_POST['pid']);
  $suppliers=supplier::fetch_all_from($problem->city);
  $s="";
  for($i=0;$i<count($suppliers);$i+=1){
    $p=$suppliers[$i];
    $s=$s.'{';
      $s=$s.'"id":"'.$p->id.'",';
      $s=$s.'"name":"'.$p->fullname.'"';
      if($i<count($suppliers)-1)
      {
        $s=$s.'},';

      }else{
        $s=$s.'}';

      }
  }
  echo "[".$s."]";
}

if($_POST['function'] == "choose"){
  $code = strval(rand(1000,9999));
  problem::update_code($_POST['pid'], $code);
  problem::update_sid($_POST['pid'], $_POST['sid']);
  problem::update_isopen($_POST['pid'], 2);
  $problem=problem::get_by_id($_POST['pid']);
  $supplier=supplier::get_by_id($_POST['sid']);
  $link = 'http://inbalzu.mtacloud.co.il/sadna/fillpurposal.php?pid='.$_POST['pid'];

  $subject = "A new problem request";
 
  $from = 'easy.tofix2019@gmail.com';
  $to = $supplier->email;
  
  $mail = new PHPMailer\PHPMailer\PHPMailer();

  try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                                                // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $from;                     // SMTP username
    $mail->Password   = 'easytofix123!@#';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                  // TCP port to connect to

    //Recipients
    $mail->setFrom('easy.tofix2019@gmail.com', 'Easy To Fix');
    $mail->addAddress($to, 'Supplier');     // Add a recipient
   
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body     = "<!DOCTYPE html>"; // the first one does not contain the dot
  $mail->Body    .= "<head></head>";
  $mail->Body    .= "<title></title>";
  $mail->Body    .= "<body><table><tr><td>";
  $mail->Body    .= "You have a new problem request.<br />Address: ".$problem->address."<br />Type: ".$problem->evenType."<br />Your secret code is: ".$code."<br />The link to fill your purposal is: ".$link.".";
  $mail->Body    .= "</td></tr></table></body>";
  $mail->Body    .= "</html>";

    $mail->send();
    echo '{"success" : true }';
} catch (Exception $e) {
    echo '{"success" : false, "error": "'.$mail->ErrorInfo.'"}';
}



}

if($_POST['function'] == "purposal"){
  $problem=problem::get_by_id($_POST['pid']);
  $price=$problem->price;
  $avail=$problem->avail;
  $supplier=supplier::get_by_id($problem->sid);
  $s="";
  $s=$s.'{';
    $s=$s.'"price":"'.$price.'",';
    $s=$s.'"avail":"'.$avail.'",';
    $s=$s.'"name":"'.$supplier->fullname.'"';
    $s=$s.'}';
     
  echo $s;
}


if($_POST['function'] == "confirm"){
  
  $problem=problem::get_by_id($_POST['pid']);
  $supplier=supplier::get_by_id($problem->sid);
  
  if($_POST['action'] == 'confirm')
  {  
    problem::update_isopen($_POST['pid'], 4);
            $subject = "You got confirmation mail to fix the problem";
          
            $from = 'easy.tofix2019@gmail.com';
            $to = $supplier->email;
            
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            try {
              //Server settings
              $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                                                         // Set mailer to use SMTP
              $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
              $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
              $mail->Username   = $from;                     // SMTP username
              $mail->Password   = 'easytofix123!@#';                               // SMTP password
              $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 587;                                  // TCP port to connect to

              //Recipients
              $mail->setFrom('easy.tofix2019@gmail.com', 'Easy To Fix');
              $mail->addAddress($to, 'Supplier');     // Add a recipient
            
              // Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = $subject;
              $mail->Body     = "<!DOCTYPE html>"; // the first one does not contain the dot
              $mail->Body    .= "<head></head>";
              $mail->Body    .= "<title></title>";
              $mail->Body    .= "<body>";
              $mail->Body    .= "You got a confirmation message.<br />Price: ".$problem->price."<br />Address: ".$problem->address."<br />Type: ".$problem->evenType."<br />You can go and fix the problem now.";
              $mail->Body    .= "</body>";
              $mail->Body    .= "</html>";

              $mail->send();
              echo '{"success" : true }';
          } catch (Exception $e) {
              echo '{"success" : false, "error": "'.$mail->ErrorInfo.'"}';
          }
        }
        else{
          problem::update_isopen($_POST['pid'], 1);
          
          $subject = "Your proposal has been declined";
          
          $from = 'easy.tofix2019@gmail.com';
          $to = $supplier->email;
          
          $mail = new PHPMailer\PHPMailer\PHPMailer();

          try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $from;                     // SMTP username
            $mail->Password   = 'easytofix123!@#';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                  // TCP port to connect to

            //Recipients
            $mail->setFrom('easy.tofix2019@gmail.com', 'Easy To Fix');
            $mail->addAddress($to, 'Supplier');     // Add a recipient
          
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body     = "<!DOCTYPE html>"; // the first one does not contain the dot
            $mail->Body    .= "<head></head>";
            $mail->Body    .= "<title></title>";
            $mail->Body    .= "<body>";
            $mail->Body    .= "Your proposal has been declined.<br />Price: ".$problem->price."<br />Address: ".$problem->address."<br />Type: ".$problem->evenType."<br />";
            $mail->Body    .= "</body>";
            $mail->Body    .= "</html>";

            $mail->send();
            echo '{"success" : true }';
        } catch (Exception $e) {
            echo '{"success" : false, "error": "'.$mail->ErrorInfo.'"}';
        }
    }
}

?>
