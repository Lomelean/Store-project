<?php
require "conecta.php";
$con = conecta();
$correo = $_REQUEST['correo'];
$ban = 0;

$sql = "SELECT correo FROM administradores WHERE status = 1 AND eliminado = 0 AND correo = '$correo'";

$res = $con->query($sql);

if (mysqli_num_rows($res)==0) {
	$ban = 1;
}

echo $ban;
?>