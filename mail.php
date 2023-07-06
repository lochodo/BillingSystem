<?php
         $id=$_POST['id'];
		 $conn=mysqli_connect("localhost","root","","vms");
		 $sql="select * from bookings where id='$id'";
		 $query=mysqli_query($conn,$sql);
		 $row=mysqli_fetch_assoc($query);
		 $office=$row['Office'];
		 $date=$row['Date'];
		 $name=$row['VisitorName'];
		 $email=$row['EmailAddress'];

use AfricasTalking\SDK\AfricasTalking;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/Exception.php";
require_once "PHPMailer/src/SMTP.php";
require_once"vendor/autoload.php";

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'winwritesofficial@gmail.com';				
	$mail->Password = 'capdwmpqvrnwqnxc';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;
	$mail->setFrom("vincentbettoh@gmail.com", "Visitor Management System");		
	$mail->addAddress($email);	
	$mail->isHTML(true);								
	$mail->Subject = 'Subject';
	$mail->Body="Dear $name Your appointment to visit $office office on Date:$date has been confirmed";
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";

} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
