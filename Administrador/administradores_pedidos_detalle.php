<?php
    if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
    {
    header("Location: index.php");
    exit();
    }

    require("Funciones/menu.php");
    require "Funciones/conecta.php";
    $id = $_REQUEST["id"];
    $id_temp = $_SESSION['id_temp'];

    $con = conecta();

    $sql = "SELECT *
            FROM administradores
            WHERE status = 1 AND eliminado = 0 AND id = $id";
    $res = $con->query($sql);
?>
<html>
<body id="cuerpo">
    <table id="tabladatos">
        <thead>
            <tr>
                <br><td colspan="5" id="lista"><h3><br>Detalle del pedido</h3></td><br>
            </tr>
            <tr>
                <br><td colspan="5" id="lista"><a href="administradores_pedidos.php"><h3>Regresar al listado</h3></a></td><br>
            </tr>
            <tr>
                <th id="encabezado">Producto</th>
                <th id="encabezado">Cantidad</th>
                <th id="encabezado">Costo unitario</th>
                <th id="encabezado">Subtotal</th>
                <th id="encabezado">Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM pedidos_productos WHERE id_pedido = '$id'";
            $res_productos = $con->query($sql);
            while($row = $res_productos->fetch_array()){
                $id_producto = $row["id_producto"];
                $cantidad = $row["cantidad"];
                $precio = $row["precio"];
                $subtotal = $cantidad * $precio;
                $sql = "SELECT * FROM productos WHERE id = '$id_producto'";
                $res_nombre = $con->query($sql);
                while($row = $res_nombre->fetch_array()){
                $nombre = $row["nombre"];
                $foto = $row["archivo_n"];
            ?>
               <tr id="fila">
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><?php echo "$id_producto";?></td>
               <td id="celdas" style="background-color:hsl(190,50%,70%);"><?php echo "$cantidad";?></td>
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><?php echo "$$precio"; ?></td>   
               <td id="celdas" style="background-color:hsl(190,50%,70%);"><?php echo "$$subtotal"; ?></td>
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><img id="imagen" src="../Productos/Imagenes/<?php echo "$foto";?>"></td>
               </tr>
            <?php }} ?>
        </tbody>  
    </body>
</html>
<style type="text/css">
#tabladatos{
    display: table;
    width: 80%;
    height: 40%;
    text-align: center;
    margin: 0 auto;
    border-spacing: 0;
    border-collapse: collapse;
    font-family: Arial;
    border-radius: 20px;
    background-color: cornflowerblue;
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
#imagen{
    width: 200px;
    height: 200px;
    box-shadow: 0 0 5px 5px rgba(0, 0, 0, 0.5);
}
#lista{
    display: table-cell;
    text-align: center;
    margin: 1 auto;
    border-spacing: 0;
    border-collapse: collapse;
    font-family: Arial;
    border-radius: 20px;
}
#lista1{
    display: table-cell;
    text-align: left;
    margin: 1 auto;
    border-spacing: 0;
    border-collapse: collapse;
    font-family: Arial;
    border-radius: 20px;
}

#encabezado{
    display: table-cell;
    background-color: #eb920e;
    border-radius: 20px;
}
#cuerpo{
    background-image: url('https://images.wallpaperscraft.com/image/single/blue_backgrounds_solid_light_65833_2560x1440.jpg');
}
</style>