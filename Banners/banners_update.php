<?php
//administradores_update.php
require "funciones/conecta.php";
$con = conecta();

//recibe variables
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$file_name = $_FILES['archivo']['name'];
$file_tmp = $_FILES['archivo']['tmp_name'];
$cadena = explode(".", $file_name);
$pos = count($cadena)-1;
$ext = $cadena[$pos];
$dir = "Imagenes/";
if ($file_name != '')
{       
        $file_enc = md5_file($file_tmp);
        $encriptado = "$file_enc.$ext";
        $sql = "UPDATE banners
                SET archivo = '$encriptado'
                WHERE id = $id";
        $res = $con->query($sql);
        $file_name1 = "$file_enc.$ext";
        copy($file_tmp, $dir.$file_name1);
}

$sql = "UPDATE banners
        SET nombre = '$nombre'
        WHERE id = $id";

$res = $con->query($sql);

header("Location: banners_lista.php");
?>