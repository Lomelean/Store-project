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
$id_temp = $_SESSION['id_temp'];
?>
<html>
    <head>
    <script src="JS/jquery.js"></script>
    <script>
        function Agregar(id_producto, cantidadElemento){
            var cant = cantidadElemento.value;
            if (cant > 0){
                $.ajax({
                    url      : 'productos_agregar_carrito.php',
                    type     : 'post',
                    dataType : 'text',
                    data     : 'id='+id_producto+'&cant='+cant,
                    success  : function(){
                        if(cant)
                        {
                            window.location.href="carrito1.php";
                        }
                    },error : function(){
                        alert('Error, archivo no encontrado...');
                    }
                });
            }
        }
        function EliminaAjax(id_producto){
            if (confirm("Seguro que quieres eliminar el producto?")==true){
                $.ajax({
                    url      : 'productos_elimina.php',
                    type     : 'post',
                    dataType : 'text',
                    data     : 'id='+id_producto,
                    success  : function(){
                        if(id_producto)
                        {
                            window.location.href="carrito1.php";
                        }
                    },error : function(){
                        alert('Error, archivo no encontrado...');
                    }
                });
            } else {
            }
        }
    </script>
    </head>
    <body id="cuerpo">
        <br><br><br>
        <table id="tabladatos">
        <thead>
            <tr>
                <th id="encabezado">Producto</th>
                <th id="encabezado">Cantidad</th>
                <th id="encabezado">Costo unitario</th>
                <th id="encabezado">Subtotal</th>   
                <th id="encabezado">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql="SELECT id FROM pedidos WHERE status = 0 AND id_cliente = '$id_temp'";
            $res = $con->query($sql);
            $row = $res->fetch_array();
            $id_pedido = $row['id'];
            $sql = "SELECT * FROM pedidos_productos WHERE id_pedido = '$id_pedido'";
            $res_productos = $con->query($sql);
            while($row = $res_productos->fetch_array()){
                $id_producto = $row["id_producto"];
                $cantidad = $row["cantidad"];
                $precio = $row["precio"];
                $subtotal = $cantidad * $precio;
                $sql = "SELECT nombre FROM productos WHERE id = '$id_producto'";
                $res_nombre = $con->query($sql);
                while($row = $res_nombre->fetch_array()){
                    $nombre = $row["nombre"];
            ?>
               <tr id="fila">
               <td id="celdas" style="background-color:crimson;"><?php echo "$nombre";?></td>
               <td id="celdas" style="background-color:#FF7070;"><a href="javascript:void(0);" class="borrar" onclick="Agregar(<?php echo $id_producto;?>, this.parentElement.querySelector('input'));">Agregar</a><input type="number" value="<?php echo "$cantidad";?>">
               <td id="celdas" style="background-color:crimson;"><?php echo "$$precio";?></td>
               <td id="celdas" style="background-color:#FF7070;"><?php echo "$$subtotal"; ?></td>   
               <td id="celdas" style="background-color:crimson;"><a href="javascript:void(0);" class="borrar" onclick="EliminaAjax(<?php echo $id_producto;?>);">Eliminar</a></td>
               </tr>
               <td></td>
               
            <?php
            error_reporting(0); 
            $total = $total + $subtotal; 
            }} 
            ?>
                <td colspan="3" id="lista"><h3>Gran total:  <?php echo "$$total"; ?></h3></td>
        </tbody>
    </table>
     <div id="end"><button onclick="window.location.href='carritofin.php'">Finalizar compra</button></div>
    </body>
<br><br><br>
<div id="pie"><footer>1UP.com | Todos los derechos reservados | Politica de privacidad | Terminos y condiciones</footer></div>
</html>
<style type="text/css">
#end{
    position: absolute;
    right: 1300px;
    top: 500px;
}
#pie{
    display: flex;
    justify-content: center;
    position: absolute;
    bottom: 0;
    right: 660px;
}
#tabladatos{
    display: table;
    width: 50%;
    height: 50%;
    text-align: center;
    margin: 0 auto;
    border-spacing: 0;
    border-collapse: collapse;
    font-family: Arial;
    border-radius: 20px;
    background-color: hsl(7, 94%, 40%);
    box-shadow: 0 0 10px 10px rgba(0, 0, 0, 0.5);
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
    border-radius: 20px;
}
#lista{
    display: table-cell;
    text-align: right;
    margin: 1 auto;
    font-family: Arial;
    border-radius: 20px;
}

#encabezado{
    display: table-cell;
    background-color: #E04300;
    border-radius: 20px;
}
#cuerpo{
    background-image: url("Imagenes/rdr.png");
}
</style>