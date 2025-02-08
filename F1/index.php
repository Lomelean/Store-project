<?php
session_start();

if(isset($_SESSION['nombre_temp']) && $_SESSION['correo_temp'] == true) 
{
  header("Location: home.php");
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
			var pasw=document.forma01.pasw.value;

			if (pasw!=false && !(correo=="@udg.mx" || correo==""))
			{
				$.ajax({
                    url      : 'Funciones/login.php',
                    type     : 'post',
                    dataType : 'text',
                    data     : 'mail='+correo+'&contra='+pasw,
                    success  : function(res){
                        if(res==0)
                        {
                            $('#mensaje').html("Usuario no válido");
                            setTimeout("$('#mensaje').html('');",5000);
                            return false;
                        }
                        else
                        {
                            window.location.href = 'home.php';
                        }
                    },error : function(){
                        alert('Error, archivo no encontrado...');
                    }
                });
			}
			else
			{
			    $('#mensaje').html('Faltan campos por llenar');
                setTimeout("$('#mensaje').html('');",5000);
                return false;
			}
		}
  </script>
 </head>
 <body id="cuerpo">
	<form name="forma01" method="POST">
        <div id="titulo"><h2>Login</h2></div>
		<br>
		<label>Correo:</label>
		<input type="email" id="correo" name="correo" placeholder="Escribe tu correo">
        <br>
		<label for="pasw">Contraseña:</label>
		<input type="password" name="pasw" id="pasw" placeholder="Escribe tu contraseña">
		<br><br>
		<input id="enviar" name="enviar" onClick="recibe(); return false;" type="submit" value="Login">
        <br><br>
        <div id="mensaje"></div>
	</form>
 </body>
</html>
<style>
    #mensaje
	{
        color: #F00;
        font-size: 16px;
        background: #EFEFEF;
        width: 350px;
        height: 20px;
        text-align: center;
    }
    #cuerpo
    {
        justify-content: center;
        display: flex;
        align-items:center;
        padding: 0;
        background-color: cadetblue;
        height: 100vh;
    }
    #titulo
	{
		position: relative;
  		top: -30px;
		left: 100;
	}
</style>