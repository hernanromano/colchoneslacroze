<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
require ("class.phpmailer.php");
$mail = new phpmailer();
				
$mail->CharSet='utf-8';
$mail->FromName = $_POST["nombre"];
$mail->From = $_POST["email"];
				 			  
$mail->AddAddress("info@colchoneslacroze.com.ar");
$mail->AddAddress("lalabelvis@yahoo.com");

$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->AddAddress("colchoneslacroze@gmail.com");

// $mail->AddAddress("monibelvis@gmail.com");
				  
$mail->Subject = "Consulta desde sitio web";

$h = "Consultas - Colchones Lacroze";
$texto1="Nombre :   ".$name;
$texto2="Email:   ".$email_address;
$texto3="Teléfono.:   ".$phone;
$texto4="Consulta / Mensaje:   ".$message;
$mail->Body = $h."\n"."\n".$texto1."\n"."\n".$texto2."\n"."\n".$texto3."\n"."\n".$texto4;
$mail->Send();

return true;			
?>