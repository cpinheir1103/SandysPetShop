<?php          
  require("Includes/class.phpmailer.php");
  $to = 'admin@sandyspetshop.com';    
  $from = $_POST['email'];
  $fromName = $_POST['fname'] . ' ' . $_POST['lname'];  
  $subject = 'Message from a Sandys Pet Shop customer' ;
  $message = $_POST['notes'];                      
  // fname, lname, email, notes     
      
  $mail = new PHPMailer();            
  $mail->IsSMTP(); // send via SMTP
  $mail->Host = '127.0.0.1'; //SMTP server     
  $mail->SMTPAuth=false;    
  $mail->From = $from;
  $mail->FromName = $fromName;
  $mail->AddAddress($to);
  $mail->AddReplyTo($from);    
  $mail->WordWrap = 50; // set word wrap
  $mail->IsHTML(true);      
  $mail->Subject  = $subject;
  $mail->Body = $message;

  if($mail->Send())                    
    echo "SUCCESS";   
  else
    echo "Message Not Sent! Mailer Error: " . $mail->ErrorInfo;
?>  
