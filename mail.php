<?php
use AfricasTalking\SDK\AfricasTalking;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/Exception.php";
require_once "PHPMailer/src/SMTP.php";
require_once "vendor/autoload.php";

$mail = new PHPMailer(true);
$email=$_POST['email'];
$new_password=rand(10000,20000);
$conn=mysqli_connect("localhost","root","","student");
$sql="update users set password='$new_password' where username='$email'";
if($query=mysqli_query($conn,$sql))
{
try {
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true,
		)
	  );
	$mail->SMTPDebug = 0;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'vincentbettoh@gmail.com';				
	$mail->Password = 'vecz oiqv wrlp jxne';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;
	$mail->setFrom("student@gmail.com", "Login");		
	$mail->addAddress($email);	
	$mail->isHTML(true);								
	$mail->Subject = 'Password reset';
	$mail->Body="Your password has been successfully reset to:$new_password login with your new password";
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "<script>alert('Password reset successful. Check your email'); location.replace('index.php');</script>";

} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
