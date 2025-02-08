<?php
require "Funciones/conecta.php";
$con = conecta();
require("Funciones/menu.php");
if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] == false) 
{
  header("Location: index.php");
  exit();
}

?>
<html>
 <head>
  <title>index</title>
  <script src="JS/jquery.js"></script>
  <script>
	function recibe()
		{
			var correo=document.forma01.correo.value;
			var nombre=document.forma01.nombre.value;
            var comentario=document.forma01.comentario.value;

            if (comentario=="" || correo=="" || nombre=="")
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
  </script>
 </head>
 <body id="cuerpo">
    <div id="move">
	<form name="forma01" method="POST" action="contacto_envia.php">
        <div id="titulo"><h2>Formulario de contacto</h2></div>
		<br>
		<label>Correo:</label>
		<input type="email" id="correo" name="correo" placeholder="Escribe tu correo">
        <br>
		<label for="nombre">Nombre(s):</label>
		<input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre">
		<br>
        <label for="comentario">Comentario:</label><br>
		<textarea id="comentario" name="comentario" cols="30" rows="5" placeholder="Comentario, sugenencia, motivo del contacto"></textarea>
		<br>
		<br><br>
		<input id="enviar" name="enviar" onClick="recibe(); return false;" type="submit" value="Enviar">
        <br><br>
        <div id="mensaje"></div>
	</form>
    </div>
 </body>
 <div id="pie"><footer><h5>1UP.com | Todos los derechos reservados | Politica de privacidad | Terminos y condiciones</h5></footer></div>
</html>
<style>
    #pie{
    display: flex;
    justify-content: center;
    position: absolute;
    bottom: 0;
    right: 660px;
}
    #mensaje
	{
        color: #F00;
        font-size: 16px;
        background: #EFEFEF;
        width: 350px;
        height: 20px;
        text-align: center;
    }
    #move{
        position: absolute;
        right: 900px;
        bottom: 350px;
    }
    #cuerpo
    {
        justify-content: center;
        align-items:center;
        padding: 0;
        background-image: url("Imagenes/265215-blackangel.jpg");
    }
    #titulo
	{
		position: relative;
  		top: -30px;
		left: 10;
	}
</style>