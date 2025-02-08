<?php
//administradores_elimina - copia.php
session_start();
require "funciones/conecta.php";
$con = conecta();

//recibe variables
$id = $_REQUEST['id'];
$id_temp = $_SESSION['id_temp'];
$cant = $_REQUEST['cant'];

$sql="SELECT * FROM pedidos WHERE status = 0 AND id_cliente = '$id_temp'";
$res = $con->query($sql);
$num = mysqli_num_rows($res);
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");

if($num == 0){
    $sql = "INSERT INTO pedidos
    (fecha, id_cliente)
    VALUES ('$fecha', '$id_temp')";
    $res = $con->query($sql);

    $sql="SELECT costo FROM productos WHERE status = 1 AND id = '$id' AND stock > 0";
    $res = $con->query($sql);
    $row = $res->fetch_array();
    $costo = $row['costo'];

    $sql="SELECT id FROM pedidos WHERE status = 0 AND id_cliente = '$id_temp'";
    $res = $con->query($sql);
    $row = $res->fetch_array();
    $id_pedido = $row['id'];

    $sql = "INSERT INTO pedidos_productos
    (id_pedido, id_producto, cantidad, precio)
    VALUES ('$id_pedido', '$id', '$cant', '$costo')";
    $res = $con->query($sql);

}elseif($num > 0){
    $sql="SELECT id_producto FROM pedidos_productos WHERE id_producto = '$id'";
    $res = $con->query($sql);
    $num = mysqli_num_rows($res);

    if($num == 0){
        $sql="SELECT id FROM pedidos WHERE status = 0 AND id_cliente = '$id_temp'";
        $res = $con->query($sql);
        $row = $res->fetch_array();
        $id_pedido = $row['id'];

        $sql="SELECT costo FROM productos WHERE status = 1 AND id = '$id' AND stock > 0";
        $res = $con->query($sql);
        $row = $res->fetch_array();
        $costo = $row['costo'];

        $sql = "INSERT INTO pedidos_productos
        (id_pedido, id_producto, cantidad, precio)
        VALUES ('$id_pedido', '$id', '$cant', '$costo')";
        $res = $con->query($sql);
    }else{
        $sql="SELECT costo FROM productos WHERE status = 1 AND id = '$id' AND stock > 0";
        $res = $con->query($sql);
        $row = $res->fetch_array();
        $costo = $row['costo'];
    
        $sql="SELECT id FROM pedidos WHERE status = 0 AND id_cliente = '$id_temp'";
        $res = $con->query($sql);
        $row = $res->fetch_array();
        $id_pedido = $row['id'];
    
        $sql = "UPDATE pedidos_productos 
                SET cantidad = cantidad + '$cant'
                WHERE id_pedido = $id_pedido AND id_producto = $id";
        $res = $con->query($sql);
    }
}
?>