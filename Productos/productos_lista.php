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
?>
<html>
    <head>
    <script src="JS/jquery.js"></script>
    <script>
        include("Funciones/menu.php");
        function EliminaAjax(id){
            if (confirm("Seguro que quieres eliminar el producto?")==true){
                $.ajax({
                    url      : 'productos_elimina.php?id='+id,
                    type     : 'post',
                    dataType : 'text',
                    data     : 'id='+id,
                    success  : function(){
                        if(id)
                        {
                            alert("El producto fue eliminado");
                            window.location.href="productos_lista.php";
                        }
                    },error : function(){
                        alert('Error, archivo no encontrado...');
                    }
                });
            } else {
            }}
    </script>
    </head>
    <body id="cuerpo">
    <table id="tabladatos">
        <thead>
            <tr>
                <br><td colspan="9" id="lista"><h3><br>Lista de productos</h3></td><br>
            </tr>
            <tr>

                <br><td colspan="9" id="lista"><h3><a href ="productos_alta.php">Agregar producto</a></h3></td><br>
            </tr>
            <tr>
                <th id="encabezado">id</th>
                <th id="encabezado">Nombre</th>
                <th id="encabezado">Codigo</th>
                <th id="encabezado">Costo</th>
                <th id="encabezado">Stock</th>
                <th id="encabezado">Descripcion</th>
                <th id="encabezado">Eliminar</th>
                <th id="encabezado">Ver detalle</th>
                <th id="encabezado">Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0";
            $res = $con->query($sql);
            while($row = $res->fetch_array()){
                $id = $row["id"];
                $nombre = $row["nombre"];
                $codigo = $row["codigo"];
                $descripcion = $row["descripcion"];
                $costo = $row["costo"];
			    $stock = $row["stock"];
            ?>
               <tr id="fila">
               <td id="celdas" style="background-color:hsl(190,50%,70%);"><?php echo "$id";?></td>
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><?php echo "$nombre";?></td>
               <td id="celdas" style="background-color:hsl(190,50%,70%);"><?php echo "$codigo";?></td>
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><?php echo "$$costo"; ?></td>
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><?php echo "$stock"; ?></td>
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><?php echo "$descripcion"; ?></td> 
               <td id="celdas" style="background-color:hsl(190,50%,70%);"><a href="javascript:void(0);" class="borrar" onclick="EliminaAjax(<?php echo $id;?>);">Eliminar producto</a></td>
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><?php echo "<a href=productos_detalle.php?id=+$id>Detalles</a>";?></td>
               <td id="celdas" style="background-color:hsl(190,50%,70%);"><?php echo "<a href=productos_editar.php?id=+$id>Editar</a>";?></td>  
               </tr>
            <?php } ?>
        </tbody>
    </table>    
    </body>
</html>
<style type="text/css">
#tabladatos{
    display: table;
    width: 80%;
    height: 80%;
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
#lista{
    display: table-cell;
    text-align: center;
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