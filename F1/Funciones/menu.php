<?php
session_start();
$nombre_temp = $_SESSION['nombre_temp'];
$correo_temp = $_SESSION['correo_temp'];
$id_temp = $_SESSION['id_temp'];

if(!isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
{
  header("Location: index.php");
  exit();
}
$sql = "SELECT * FROM administradores WHERE status = 1 AND eliminado = 0 AND correo = '$correo_temp'";
            $res = $con->query($sql);
            while($row = $res->fetch_array()){
            $foto = $row["archivo_n"];
            }

$sql="SELECT * FROM pedidos WHERE status = 0 AND id_cliente = '$id_temp'";
$res = $con->query($sql);
$num = mysqli_num_rows($res);

$sql="SELECT * FROM pedidos WHERE status = 1 AND id_cliente = '$id_temp'";
$res_on = $con->query($sql);
$numcar = mysqli_num_rows($res_on);


?>    
    <table id="datatable">
        <tbody>
               <tr>
               <td id="cells" style="background-color:hsl(190,50%,70%);"><a href="home.php">HOME</a></td>
               <td id="cells" style="background-color:hsl(180,40%,70%);"><a href="productos.php">PRODUCTOS</a></td>
               <td id="cells" style="background-color:hsl(190,50%,70%);"><a href="contacto.php">CONTACTO</a></td>
               <td id="cells" style="background-color:hsl(180,40%,70%);"><a href="carrito1.php">CARRITO</a></td>   
               </tr>
               <img id="img" src="Imagenes/logo.png">
        </tbody>
    </table>    
<style type="text/css">
    #img{
    display: table-cell;
    width: 100px;
    height: 100px;
    margin-bottom: -100px;
    }    
    #datatable
    {
        display: table;
        width: 800px;
        height: 50px;
        text-align: center;
        margin: 0 auto;
        border-spacing: 0;
        border-collapse: collapse;
        font-family: Arial;
        border-radius: 20px;
    }
    #cells{
        display: table-cell;
        width: 10%;
        height: 10%;
        text-align: center;
        margin: 0 auto;
        border-spacing: 0;
        border-collapse: collapse;
        font-family: Arial;
        border-radius: 20px;
    }
</style>