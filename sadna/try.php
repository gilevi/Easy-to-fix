<?php  
require_once('./PHPMailer/src/PHPMailer.php');
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';
  
  $subject = "A new problem request";
 
  $from = 'easy.tofix2019@gmail.com';
  $to = 'oran.gilboa1@gmail.com';
  
  $mail = new PHPMailer\PHPMailer\PHPMailer();
//Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    //$mail->isSMTP();                                            // Set mailer to use SMTP
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
    ?>
