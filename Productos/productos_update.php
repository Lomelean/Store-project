<?php
//administradores_update.php
require "funciones/conecta.php";
$con = conecta();

//recibe variables
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$codigo = $_REQUEST['codigo'];
$descripcion = $_REQUEST['descripcion'];
$costo = $_REQUEST['costo'];
$stock = $_REQUEST['stock'];
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
        $sql = "UPDATE productos
                SET archivo_n = '$encriptado', archivo = '$file_name'
                WHERE id = $id";
        $res = $con->query($sql);
        $file_name1 = "$file_enc.$ext";
        copy($file_tmp, $dir.$file_name1);
}

$sql = "UPDATE productos
        SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion', costo = '$costo', stock = '$stock'
        WHERE id = $id";

$res = $con->query($sql);

header("Location: productos_lista.php");
?>