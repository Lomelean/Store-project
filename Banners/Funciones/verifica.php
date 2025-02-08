<?php
require "conecta.php";
$con = conecta();
$nombre = $_REQUEST['nombre'];
$ban = 0;

$sql = "SELECT nombre FROM banners WHERE status = 1 AND eliminado = 0 AND nombre = '$nombre'";

$res = $con->query($sql);

if (mysqli_num_rows($res)==0) {
	$ban = 1;
}

echo $ban;
?>