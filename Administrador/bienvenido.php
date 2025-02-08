<?php
if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
{
  header("Location: index.php");
  exit();
}
require("Funciones/menu.php");
$nombre_temp = $_SESSION['nombre_temp'];
?>
<html>
    <head>
        <title>Sistema de administración</title>
        <script src="JS/jquery.js"></script>
    </head>
    <div id="centrar">
    <body id="cuerpo">
    <br><div id="user"><h3>Hola <?php echo $nombre_temp;?>, bienvenido al sistema de administración</h3></div>
    </body>
    </div>
</html>
<style type="text/css">
    #user
    {
        display: table-cell;
        font-size: larger;
        background-color:hsl(180,40%,70%);
        text-align: center;
        margin: 0 auto;
        border-radius: 20px;
        box-shadow: 0 0 10px 10px rgba(0, 0, 0, 0.25);
    }
    #cuerpo
    {
        background-image: url('https://images.wallpaperscraft.com/image/single/blue_backgrounds_solid_light_65833_2560x1440.jpg');
    }
    #centrar
    {
        justify-content: center;
        display: flex;
        align-items:center;
        padding: 0;
        height: 100vh;
        margin-top: -200px;
    }
</style>