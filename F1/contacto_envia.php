<?php
session_start();
require "Funciones/conecta.php";
$con = conecta();

$correo = $_REQUEST['correo'];
$nombre = $_REQUEST['nombre'];
$comentario = $_REQUEST['comentario'];

require "Funciones/Exception.php";
require "Funciones/PHPMailer.php";
require "Funciones/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
 
$oMail= new PHPMailer();
$oMail->isSMTP();
$oMail->Host="smtp.gmail.com";
$oMail->Port=587;
$oMail->SMTPSecure="tls";
$oMail->SMTPAuth=true;
$oMail->Username="carloseflomeli@gmail.com";
$oMail->Password="mxyoqzxspwcelnwd";
$oMail->setFrom("$correo", "$nombre");
$oMail->addAddress("Carloseflomeli@gmail.com" , "Carlos lomeli");
$oMail->Subject="Contacto";
$oMail->msgHTML($comentario);
 
if(!$oMail->send())
  echo $oMail->ErrorInfo;

header("Location: home.php");
exit();
?>