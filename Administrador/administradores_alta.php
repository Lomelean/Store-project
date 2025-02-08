<?php
if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
{
  header("Location: index.php");
  exit();
}
?>
<html>
 <head>
  <title>Formulario request</title>
  <script src="JS/jquery.js"></script>
  <script>
	function recibe()
		{
			var nombre=document.forma01.nombre.value;
            var apellidos=document.forma01.apellidos.value;
			var correo=document.forma01.correo.value;
			var rol=document.forma01.rol.value;
			var pasw=document.forma01.pasw.value;
			var archivo=document.forma01.archivo.value;
	
			if (rol!=2 && pasw!=false && !(correo=="@udg.mx" || correo=="") && nombre!=false && apellidos!=false && archivo!=false)
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
		var correo = $("#correo").val();
		if (correo)
		{
			$.ajax({
                url      : 'Funciones/verifica.php',
                type     : 'post',
                dataType : 'text',
                data     : 'correo='+correo,
                success  : function(res){
                    if(res==0){
                        $('#mensajemail').html("El correo "+correo+" ya existe");
						setTimeout("$('#mensajemail').html('');",5000);
						$('#correo').val('');
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
	<form enctype="multipart/form-data" name="forma01" action="administradores_salva.php" method="POST">
		<div id="centrartitle"><h2 id="titulo">Alta de administradores</h2></div>
        <div id="centrarback"><a href="administradores_lista.php"><h3>Regresar al listado</h3></a></div>
		<label>
			Nombre:
			<input id="nombre" type="text" name="nombre" placeholder="Escribe tu nombre" required>
		</label>
        <br><br>
        <label>
			Apellido:
			<input id="apellidos" type="text" name="apellidos" placeholder="Escribe tu apellido" required>
		</label>
		<br><br>
		<div class="input-container">
		<label>Correo:</label>
		<input onblur="verificacion();" type="email" id="correo" name="correo" placeholder="Escribe tu correo"><div id="mensajemail"></div>
		</div>
		<br><br>
		<label for="rol">Rol:</label>
		<select name="rol">
			<option value="2" selected>Selecciona</option>
			<option value="0">Gerente</option>
			<option value="1">Ejecutivo</option>			
		</select>
		<br><br>
		<label for="pasw">Contraseña:</label>
		<input type="password" name="pasw">
		<br><br>
		<input type="file" name="archivo" id="archivo" placeholder="Subir foto de administrador">
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
		left: 145;
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

	#mensajemail
	{
		height: 20px;
		color: #F00;
		position: absolute;
		top: 50%;
		right: 0;
		transform: translateY(-50%);
		width: 50%;
		font-size: 16px;
		background: #EFEFEF;
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

	#titulo{
		margin: 0 auto;
	}
</style>