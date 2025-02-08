<?php
//administradores_elimina.php
require "funciones/conecta.php";
$con = conecta();

//recibe variables
$nombre = $_REQUEST['nombre'];
$codigo = $_REQUEST['codigo'];
$desc = $_REQUEST['desc'];
$costo = $_REQUEST['costo'];
$stock = $_REQUEST['stock'];
$file_name = $_FILES['archivo']['name'];
$file_tmp = $_FILES['archivo']['tmp_name'];
$cadena = explode(".", $file_name);
$pos = count($cadena)-1;
$ext = $cadena[$pos];
$dir = "Imagenes/";
$file_enc = md5_file($file_tmp);
$encriptado = "$file_enc.$ext";

//$sql = "DELETE FROM administradores WHERE id = $id";
$sql = "INSERT INTO productos
        (nombre, codigo, descripcion, costo, stock, archivo_n, archivo)
        VALUES ('$nombre', '$codigo', '$desc', '$costo', $stock , '$encriptado' , '$file_name' )";

$res = $con->query($sql);

if ($file_name != '')
   {
        $file_name1 = "$file_enc.$ext";
        copy($file_tmp, $dir.$file_name1);
   }

header("Location: productos_lista.php");
//CMS
//Sistema de administración de contenidos
//Módulos:
//- administradores
//- clientes
///- productos
?>
