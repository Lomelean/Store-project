<?php
require "conecta.php";
$con = conecta();
$codigo = $_REQUEST['codigo'];
$ban = 0;

$sql = "SELECT codigo FROM productos WHERE status = 1 AND eliminado = 0 AND codigo = '$codigo'";

$res = $con->query($sql);

if (mysqli_num_rows($res)==0) {
	$ban = 1;
}

echo $ban;
?>