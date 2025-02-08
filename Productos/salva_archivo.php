<?php
$idEmpleado = $_REQUEST['idEmpleado'];
$file_name = $_FILES['archivo']['name'];
$file_tmp = $_FILES['archivo']['tmp_name'];
$cadena = explode(".", $file_name);
$pos = count($cadena)-1;
$ext = $cadena[$pos];
$dir = "archivos/";
$file_enc = md5_file($file_tmp);

echo "idEmpleado : $idEmpleado <br>";
echo "file_name : $file_name <br>";
echo "file_tmp : $file_tmp <br>";
echo "ext : $ext <br>";
echo "file_enc : $file_enc <br>";

if ($file_name != ''){
    $file_name1 = "$file_enc.$ext";
    copy($file_tmp, $dir.$file_name1);
}
?>