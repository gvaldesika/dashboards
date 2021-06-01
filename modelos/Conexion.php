<?php
Class Conexion
{

    static public function conectar()
    {
        $contraseña = "Lc8_SaE7kI$)tV!h|TEK190w!exKP^fV";

        //Ika.Spa.2020
        //Q3CDSaLYE8bAk8jV / postgres

        $usuario = "dbmasteruser";
        $nombreBaseDeDatos = "DW_IKA";

        $rutaServidor = "ls-5353111af3dfba6d63a157059251330eaacb878f.cjnbcpxvgw91.us-west-2.rds.amazonaws.com";
        //http://sistemas.ika-hub.cl
        //ikadwfree.crejj47isqrn.us-east-2.rds.amazonaws.com
        $puerto = "5432";
        $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
        $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $base_de_datos;

    }

    static public function conectarGoDaddy()
    {
        $link = new PDO("mysql:host=legacy.ika-hub.cl; dbname=ikauser_flotas","ikauser_sistemas","Desarrollo2013");
        $link->exec("set names utf8");
        return $link;

    }


}




