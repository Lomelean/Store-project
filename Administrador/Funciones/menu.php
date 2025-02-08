<?php
session_start();
$nombre_temp = $_SESSION['nombre_temp'];
$correo_temp = $_SESSION['correo_temp'];

if(!isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
{
  header("Location: index.php");
  exit();
}
?>    
    <table id="datatable">
        <tbody>
               <tr>
               <td id="cells" style="background-color:hsl(190,50%,70%);"><a href="bienvenido.php">INICIO</a></td>
               <td id="cells" style="background-color:hsl(180,40%,70%);"><a href="administradores_lista.php">ADMINISTRADORES</a></td>
               <td id="cells" style="background-color:hsl(190,50%,70%);"><a href="../Productos/productos_lista.php">PRODUCTOS</a></td>
               <td id="cells" style="background-color:hsl(180,40%,70%);"><a href="../Banners/banners_lista.php">BANNERS</a></td>   
               <td id="cells" style="background-color:hsl(190,50%,70%);"><a href="Administradores_pedidos.php">PEDIDOS</a></td>
               <td id="cells" style="background-color:hsl(180,40%,70%);">Bienvenido <?php echo $nombre_temp;?></td>
               <td id="cells" style="background-color:hsl(190,50%,70%);"><a href="Funciones/cerrar.php">CERRAR SESIÓN</a></td>  
               </tr>
        </tbody>
    </table>    
<style type="text/css">
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
        background-color: cornflowerblue;
        box-shadow: 0 0 10px 10px rgba(0, 0, 0, 0.20);
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