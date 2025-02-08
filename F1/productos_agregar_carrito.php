<?php
//administradores_elimina - copia.php
session_start();
require "funciones/conecta.php";
$con = conecta();

//recibe variables
$id = $_REQUEST['id'];
$id_temp = $_SESSION['id_temp'];
$cant = $_REQUEST['cant'];

$sql="SELECT id FROM pedidos WHERE status = 0 AND id_cliente = '$id_temp'";
$res = $con->query($sql);
$row = $res->fetch_array();
$id_pedido = $row['id'];

$sql = "UPDATE pedidos_productos 
        SET cantidad = '$cant'
        WHERE id_pedido = $id_pedido AND id_producto = $id";
$res = $con->query($sql);
?>