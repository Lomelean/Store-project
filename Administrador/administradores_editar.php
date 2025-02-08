<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] = true) 
{
  header("Location: index.php");
  exit();
}

require "Funciones/conecta.php";

$id = $_REQUEST["id"];

$con = conecta();

$sql = "SELECT *
        FROM administradores
        WHERE status = 1 AND eliminado = 0 AND id = $id";
$res = $con->query($sql);
while($row = $res->fetch_array())
    {   
        $id        = $row["id"];
        $nombre    = $row["nombre"];
        $apellidos = $row["apellidos"];
        $correo    = $row["correo"];
        $rol       = $row["rol"];
        $archivo   = $row["archivo_n"];
    }
?>
<html>
<head>
    <script src="JS/jquery.js"></script>
    <script>
        function validaDatos()
		{
			var nombre=document.forma01.nombre.value;
            var apellidos=document.forma01.apellidos.value;
			var correo=document.forma01.correo.value;
			var rol=document.forma01.rol.value;

			if (rol==2 || correo=="" || nombre==false || apellidos==false)
			{
                $('#mensaje').html('Faltan campos por llenar');
                setTimeout("$('#mensaje').html('');",5000);
				return false;
			}
			else
			{
                document.forma01.submit()
			}
		}
        function verificacion(){
		var correo = $("#correo").val();
		if (correo)
		{
			$.ajax({
                url      : 'Funciones/verifica.php',
                type     : 'post',
                dataType : 'text',
                data     : 'correo='+correo,
                success  : function(res){
                    if (res==0){
                        if (correo != '<?php echo addslashes($correo); ?>'){
                            $('#mensajemail').html("El correo "+correo+" ya existe");
                            setTimeout("$('#mensajemail').html('');",5000);
                            $('#correo').val('');
                        }else{
                        }
                    }
                    else
                    {
                        
                    }
                },error : function(){
                    alert('Error, archivo no encontrado...');
                }
            });
		}
        }
    </script>
</head>
<div id="margin">
<body id="cuerpo">
<div id="menu"><?php require("Funciones/menu.php"); ?></div>
	<form name="forma01" action="administradores_update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div id="centrartitle"><h2 id="titulo">Editar administradores</h2></div>
        <div id="centrarback"><a href="administradores_lista.php"><h3>Regresar al listado</h3></a></div>
        <input type="text" value="<?php echo $nombre;?>" name="nombre" id="nombre">
        <br><br>
        <input type="text" value="<?php echo $apellidos;?>" name="apellidos" id="apellidos">
        <br><br>
        <div class="input-container">
        <input type="text" onblur="verificacion();" value="<?php echo $correo;?>" name="correo" id="correo"><div id="mensajemail"></div>
        </div>
        <br><br>
        <input type="file" name="archivo" id="archivo" class="archivo">
        <br><br>
        <input type="text" name="pass" id="pass" placeholder="escribe tu contraseña">
        <br><br>
        <select name="rol" id="rol">
            <option value="2">Selecciona</option>
            <option value="1" <?php if($rol==1) echo 'selected';?>>Ejecutivo</option>
            <option value="0" <?php if($rol==0) echo 'selected';?>>Gerente</option>
        </select>
        <br><br>
        <input type="submit" value="actualizar" onclick="validaDatos(); return false;">
        <br><br>
        <div id="mensaje"></div>
	</form>
 </body>
 </div>
 </html>
 <style>
    #centrarback
	{
		position: relative;
  		top: -30px;
		left: 150;
	}
	#centrartitle
	{
		position: relative;
  		top: -30px;
		left: 100;
	}
    #menu
	{
		position: relative;
  		top: -120px;
		left: -120;
	}
    #margin{
        margin-top: -600px;
        margin-right: -300;
    }
    #mensaje
	{
        color: #F00;
        font-size: 16px;
        background: #EFEFEF;
        width: 50%;
        height: 20px;
        text-align: center;
    }
    #cuerpo
    {
        justify-content: center;
        display: flex;
        align-items:center;
        padding: 0;
        background-image: url('https://images.wallpaperscraft.com/image/single/blue_backgrounds_solid_light_65833_2560x1440.jpg');
        height: 100vh;
    }
    .input-container
	{
  		position: relative;
  		display: inline-block;
  		width: 600px;
	}
	#mensajemail
	{
		height: 20px;
		color: #F00;
		position: absolute;
		top: 50%;
		right: 0;
		transform: translateY(-50%);
		display: inline-block;
		width: 50%;
		font-size: 16px;
		background: #EFEFEF;
		text-align: center;
	}
 </style>