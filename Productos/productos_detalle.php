<?php
    if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
    {
    header("Location: index.php");
    exit();
    }

    require("Funciones/menu.php");
    require "Funciones/conecta.php";
    $id = $_REQUEST["id"];

    $con = conecta();

    $sql = "SELECT *
            FROM productos
            WHERE status = 1 AND eliminado = 0 AND id = $id";
    $res = $con->query($sql);
?>
<html>
<body id="cuerpo">
    <table id="tabladatos">
        <thead>
            <tr>
                <br><td colspan="7" id="lista"><h3><br>Detalle de productos</h3></td><br>
            </tr>
            <tr>
                <br><td colspan="7" id="lista"><a href="productos_lista.php"><h3>Regresar al listado</h3></a></td><br>
            </tr>
            <tr>
                <th id="encabezado">Nombre</th>
                <th id="encabezado">Codigo</th>
                <th id="encabezado">Costo</th>
                <th id="encabezado">Stock</th>
                <th id="encabezado">Descripcion</th>
                <th id="encabezado">Status</th>
                <th id="encabezado">Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = $res->fetch_array()){
                $nombre = $row["nombre"];
                $codigo = $row["codigo"];
                $descripcion = $row["descripcion"];
                $costo = $row["costo"];
			    $stock = $row["stock"];
                $status      = $row["status"];
                $status_txt = ($status == 1) ? 'Activo' : 'Inactivo';
                $foto = $row["archivo_n"];
            ?>
               <tr id="fila">
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><?php echo "$nombre";?></td>
               <td id="celdas" style="background-color:hsl(190,50%,70%);"><?php echo "$codigo";?></td>
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><?php echo "$$costo"; ?></td> 
               <td id="celdas" style="background-color:hsl(190,50%,70%);"><?php echo "$stock";?></td>
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><?php echo "$descripcion"; ?></td> 
               <td id="celdas" style="background-color:hsl(190,50%,70%);"><?php echo "$status_txt"; ?></td>
               <td id="celdas" style="background-color:hsl(180,40%,70%);"><img id="imagen" src="Imagenes/<?php echo "$foto";?>"></td>
               </tr>
            <?php } ?>
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