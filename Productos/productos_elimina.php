<?php
//administradores_elimina - copia.php
require "funciones/conecta.php";
$con = conecta();

//recibe variables
$id = $_REQUEST['id'];

//$sql = "DELETE FROM administradores WHERE id = $id";
$sql = "UPDATE productos SET eliminado = 1 WHERE id = $id";
$con->query($sql);

header("Location: productos_lista.php");
//CMS
//Sistema de administración de contenidos
//Módulos:
//- administradores
//- clientes
///- productos
?>