<?php
    session_start();
    require "conecta.php";
    $con = conecta();

    $user = $_REQUEST['user']; //correo
    $pass = $_REQUEST['pass'];
    $pass = md5($pass);

    $sql = "SELECT * FROM empleados WHERE correo = '$user' AND pass = '$pass' AND status = 1 AND eliminado = 0";
    $res = $con->query($sql);
    $num = $res->num_rows;

    if($num == 1){
        $row    = $res->fetch_assoc();
        $idU    = $row["id"];
        $nombre = $row["nombre"].' '.$apellido = $row["apellido"];
        $correo = $row["correo"];
        $_SESSION['idU']    = $idU;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['correo']    = $correo;
    }

    echo $num;
?>