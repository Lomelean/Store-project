<?php
if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] != true) 
{
  header("Location: index.php");
  exit();
}
?>
<html>
 <head>
  <title>Agregar producto</title>
  <script src="JS/jquery.js"></script>
  <script>
	function recibe()
		{
			var nombre=document.forma01.nombre.value;
            var codigo=document.forma01.codigo.value;
			var desc=document.forma01.desc.value;
			var costo=document.forma01.costo.value;
			var stock=document.forma01.stock.value;
			var archivo=document.forma01.archivo.value;
	
			if (nombre!=false && codigo!=false && archivo!=false && stock!=false && costo!=false && desc!=false)
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
		var codigo = $("#codigo").val();
		if (codigo)
		{
			$.ajax({
                url      : 'Funciones/verifica.php',
                type     : 'post',
                dataType : 'text',
                data     : 'codigo='+codigo,
                success  : function(res){
                    if(res==0){
                        $('#mensajemail').html("El codigo "+codigo+" ya existe");
						setTimeout("$('#mensajemail').html('');",5000);
						$('#codigo').val('');
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
	<form enctype="multipart/form-data" name="forma01" action="productos_salva.php" method="POST">
		<div id="centrartitle"><h2 id="titulo">Alta de productos</h2></div>
        <div id="centrarback"><a href="productos_lista.php"><h3>Regresar al listado</h3></a></div>
		<label>
			Nombre:
			<input id="nombre" type="text" name="nombre" placeholder="nombre del producto" required>
		</label>
        <br><br>
        <label>
			Descripcion:
			<input id="desc" type="text" name="desc" placeholder="descripción del producto" required>
		</label>
		<br><br>
		<div class="input-container">
		<label>Codigo:</label>
		<input onblur="verificacion();" type="number" id="codigo" name="codigo" placeholder="codigo del producto"><div id="mensajemail"></div>
		</div>
		<br><br>
		<label>Costo:</label>
		<input type="number" id="costo" name="costo" placeholder="costo del producto">
		<br><br>
		<label>Stock:</label>
		<input type="number" id="stock" name="stock" placeholder="stock del producto">
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
		left: 160;
	}
	#centrartitle
	{
		position: relative;
  		top: -30px;
		left: 140;
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