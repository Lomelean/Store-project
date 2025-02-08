<?php
require "Funciones/conecta.php";
$con = conecta();
    if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
    {
    header("Location: index.php");
    exit();
    }

    require("Funciones/menu.php");
    $id = $_REQUEST["id"];

    $sql = "SELECT *
            FROM productos
            WHERE status = 1 AND eliminado = 0 AND id = $id";
    $res = $con->query($sql);
?>
<html>
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
<body id="cuerpo">
    <table id="tabladatos">
        <tbody><br><br><br>
        <div id="producto">
            <?php
            while($row = $res->fetch_array()){
                $id = $row["id"];
                $nombre = $row["nombre"];
                $codigo = $row["codigo"];
                $descripcion = $row["descripcion"];
                $costo = $row["costo"];
                $foto = $row["archivo_n"];
            }
            ?>
               <td colspan="3" id="celdas">
               <img id="imagen" src="Productos/<?php echo "$foto";?>">
            <?php echo "<a href=productos_detalle.php?id=+$id><h3>$nombre</h3></a>";?>
                <h4>Codigo: <?php echo "$codigo";?></h4>
                <h4><?php echo "$$costo";?></h4>
                <h4>Descripción: <?php echo "$descripcion";?></h4>
                <h3><a href="javascript:void(0);" class="borrar" onclick="Agregar(<?php echo $id;?>, this.parentElement.querySelector('input'));">Comprar</a><input type="number" value="1"></h3>
                <h2>Otros productos similares:</h2>
                </td>
        </div>
        </tbody>  
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
               <img id="imagen" src="Productos/<?php echo "$foto";?>">
               <h3><?php echo "<a href=productos_detalle.php?id=+$id>$nombre</a>";?><br>
               <?php echo "$$costo"; ?><br>
               <a href="javascript:void(0);" class="borrar" onclick="Agregar(<?php echo $id;?>, this.parentElement.querySelector('input'));">Comprar</a><input type="number" value="1"></h3>
               </td>
            <?php }} ?>
        </tr>
        </table>
    </body>
    <div id="pie"><footer>tiendita.com | Todos los derechos reservados | Politica de privacidad | Terminos y condiciones</footer></div>
</html>
<style type="text/css">
#pie{
    position: absolute;
    bottom: 0px;
    left: 650px;
}
#tabladatos{
    display: table;
    width: 80%;
    height: 40%;
    text-align: center;
    margin: 0 auto;
    border-spacing: 0;
    border-collapse: collapse;
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
#imagen{
    width: 200px;
    height: 200px;
    box-shadow: 0 0 5px 5px rgba(255, 0, 0 );
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
    background-image: url("Imagenes/clickwallpapers-God\ of\ War\ I-img1.png");
}
</style>