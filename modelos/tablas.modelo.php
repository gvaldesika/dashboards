<?php

// Permite manipular las tablas genericas del sistema (sys_yablas)
class TablasModelo
{


    public static function mdlObtenerCCO()
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM sys_tablas
            where
            Id_Tabla = 1');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }

    }




    public static function mdlObtenerTabla($idTabla)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM sys_tablas
            where
            Id_Tabla = :id');
            $stmt->bindParam(":id", $idTabla, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }

    }






}

