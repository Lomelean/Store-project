<?php
//administradores_lista - copia.php
require "Funciones/conecta.php";
$con = conecta();

include("Funciones/menu.php");

if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
{
  header("Location: index.php");
  exit();
}
$banner = rand(1,4);
$sql = "SELECT * FROM banners
        WHERE id = '$banner'";
$res = $con->query($sql);

while($row = $res->fetch_array()){
    $ban = $row["archivo"];
}
?>
<html>
    <head>
    <script src="JS/jquery.js"></script>
    <script>
        function Agregar(id, cantidadElemento){
            var cant = cantidadElemento.value;
            if (cant > 0){
                $.ajax({
                    url      : 'productos_agregar.php',
                    type     : 'post',
                    dataType : 'text',
                    data     : 'id='+id+'&cant='+cant,
                    success  : function(res){
                        if(id)
                        {
                            alert("El producto fue agregado al carrito");
                        }
                    },error : function(){
                        alert('Error, archivo no encontrado...');
                    }
                });
            }
}
    </script>
    <br><br><div id="banner"><img src="Banners/<?php echo "$ban";?>" alt=""></div>
    </head>
    <body id="cuerpo">
        <br><br><br>
    <table id="tabladatos">
        <tbody>
            <?php
            for($i = 0; $i < 3; $i++){
            $rand = rand(1,9);
            $sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0 AND id = '$rand'";
            $res = $con->query($sql);
            while($row = $res->fetch_array()){
                $id = $row["id"];
                $nombre = $row["nombre"];
                $costo = $row["costo"];
                $foto = $row["archivo_n"];
            ?>
               <td id="celdas">
               <img id="imagen" src="Productos/<?php echo "$foto";?>"><br><br>
               <h3><?php echo "<a href=productos_detalle.php?id=+$id>$nombre</a>";?></h3>
               <h3><?php echo "$$costo"; ?></h3>
               <h3><a href="javascript:void(0);" class="borrar" onclick="Agregar(<?php echo $id;?>, this.parentElement.querySelector('input'));">Comprar:</a><input type="number" value="1"></h3>
               </td>
            <?php }} ?>
            <tr>
            <?php
            for($i = 0; $i < 3; $i++){
            $rand = rand(1,10);
            $sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0 AND id = '$rand'";
            $res = $con->query($sql);
            while($row = $res->fetch_array()){
                $id = $row["id"];
                $nombre = $row["nombre"];
                $costo = $row["costo"];
                $foto = $row["archivo_n"];
            ?>
               <td id="celdas">
               <img id="imagen" src="Productos/<?php echo "$foto";?>"><br><br>
               <h3><?php echo "<a href=productos_detalle.php?id=+$id>$nombre</a>";?></h3>
               <h3><?php echo "$$costo"; ?></h3>
               <h3><a href="javascript:void(0);" class="borrar" onclick="Agregar(<?php echo $id;?>, this.parentElement.querySelector('input'));">Comprar</a><input type="number" value="1"></h3>
               </td>
            <?php }} ?>
            </tr>
        </tbody>
    </table>   
    </body>
<br><br><br>
<div id="pie"><footer><h5>1UP.com | Todos los derechos reservados | Politica de privacidad | Terminos y condiciones</h5></footer></div>
</html>
<style type="text/css">
#pie{
    display: flex;
    justify-content: center;
}
#banner
{
    justify-content: center;
    display: flex;
    align-items:center;
    padding: 0;
    margin-top: 0%;
    margin-right: 0%;
}
#imagen{
    width: 200px;
    height: 200px;
    box-shadow: 0 0 5px 5px rgba(255, 0, 0 );
}    
#tabladatos{
    display: table;
    width: 35%;
    height: 35%;
    text-align: center;
    margin: 0 auto;
    font-family: Arial;
}
#celdas{
    display: table-cell;
    width: 10%;
    height: 10%;
    text-align: center;
    margin: 0 auto;
    border-spacing: 0;
    border-collapse: collapse;
    font-family: Arial;
}
#lista{
    display: table-cell;
    text-align: center;
    margin: 1 auto;
    border-spacing: 0;
    border-collapse: collapse;
    font-family: Arial;
}
#cuerpo{
    background-image: url("Imagenes/bross-clasico-juego-mario-wallpaper-preview.jpg");
}
</style>