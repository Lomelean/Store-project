<?php
if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
{
  header("Location: index.php");
  exit();
}
?>
<html>
 <head>
  <title>Agregar banner</title>
  <script src="JS/jquery.js"></script>
  <script>
	function recibe()
		{
			var nombre=document.forma01.nombre.value;
			var archivo=document.forma01.archivo.value;
	
			if (nombre!=false && archivo!=false)
			{
				document.forma01.submit()
			}
			else
			{
			    $('#mensaje').html('Faltan campos por llenar');
                setTimeout("$('#mensaje').html('');",5000);
				return false;
			}
		}
	function verificacion(){
		var nombre = $("#nombre").val();
		if (nombre)
		{
			$.ajax({
                url      : 'Funciones/verifica.php',
                type     : 'post',
                dataType : 'text',
                data     : 'nombre='+nombre,
                success  : function(res){
                    if(res==0){
                        $('#mensaje').html("El nombre "+nombre+" ya existe");
						setTimeout("$('#mensaje').html('');",5000);
						$('#nombre').val('');
						return false;
                    }else{
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
	<form enctype="multipart/form-data" name="forma01" action="banners_salva.php" method="POST">
		<div id="centrartitle"><h2 id="titulo">Alta de banners</h2></div>
        <div id="centrarback"><a href="banners_lista.php"><h3>Regresar al listado</h3></a></div>
		<label>
			Nombre:
			<input id="nombre" type="text" name="nombre" placeholder="nombre del producto" required onblur="verificacion();">
		</label>
        <br><br>
		<input type="file" name="archivo" id="archivo">
		<br><br>
		<input onClick="recibe(); return false;" type="submit" value="Salvar">
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
		left: 107;
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
	#margin
	{
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
	.input-container
	{
  		position: relative;
  		display: inline-block;
  		width: 600px;
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

	#titulo{
		margin: 0 auto;
	}
</style>