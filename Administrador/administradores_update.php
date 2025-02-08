<?php
//administradores_update.php
require "funciones/conecta.php";
$con = conecta();

//recibe variables
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$correo = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];
$rol = $_REQUEST['rol'];
$passEnc = md5($pass);
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
        $sql = "UPDATE administradores
                SET archivo_n = '$encriptado', archivo = '$file_name'
                WHERE id = $id";
        $res = $con->query($sql);
        $file_name1 = "$file_enc.$ext";
        copy($file_tmp, $dir.$file_name1);
}

$sql = "UPDATE administradores
        SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$passEnc', rol = '$rol'
        WHERE id = $id";

$res = $con->query($sql);

header("Location: administradores_lista.php");
?>