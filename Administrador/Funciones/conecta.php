<?php
class Conecta {
    public static function Conexion(){
        $host = "localhost";
        $dbname = "testjoin";
        $username = "postgres";
        $password = "Carlos18";
    
    try{
        $con = new PDO ("pgsql:host=$host; dbname = $dbname", $username, $password);
        echo("Se conectó la base de datelios");
    }
    catch(PDOException $exp){
        echo ("No se pudo conectar, $exp");
    }
}
}
?>