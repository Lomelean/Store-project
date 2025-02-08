<?php
session_start();
require "conecta.php";
$con = conecta();

$mail = $_REQUEST['mail'];
$contra = $_REQUEST['contra'];
$contra = md5($contra);

$sql = "SELECT * FROM administradores WHERE status = 1 AND eliminado = 0 AND correo = '$mail' AND pass = '$contra'";

$res = $con->query($sql);
$num = mysqli_num_rows($res);

if($num > 0){
    $row = $res->fetch_assoc();
    $id_temp = $row["id"];
    $nombre_temp = $row["nombre"].' '.$row["apellidos"];
    $correo_temp = $row["correo"];
    $_SESSION['id_temp'] = $id_temp;
    $_SESSION['nombre_temp'] = $nombre_temp;
    $_SESSION['correo_temp'] = $correo_temp;
}

echo mysqli_num_rows($res);
?>