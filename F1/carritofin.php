<?php
require "Funciones/conecta.php";
$con = conecta();

include("Funciones/menu.php");

if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
{
  header("Location: index.php");
  exit();
}
$id_temp = $_SESSION['id_temp'];

$sql="SELECT id FROM pedidos WHERE status = 0 AND id_cliente = '$id_temp'";
    $res = $con->query($sql);
    $row = $res->fetch_array();
    $id_pedido = $row['id'];

$sql = "UPDATE pedidos
        SET status = 1
        WHERE id = $id_pedido";
        $res = $con->query($sql);

header("Location: carrito2.php");
?>
