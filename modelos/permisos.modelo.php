<?php

class PermisosModelo
{

    public static function mdlActualizarPermisos($idUsuario,$permisos)
    {
        try {
            $stmt = Conexion::conectarGoDaddy() ->prepare('update dash_accesos  set
                         modAll = :modAll,
                         mod1 = :mod1,
                         mod2 = :mod2,
                         mod3 = :mod3,
                         mod4 = :mod4,
                         mod5 = :mod5,
                         mod6 = :mod6,
                         mod7 = :mod7,
                         mod8 = :mod8,
                         mod9 = :mod9,
                         mod10 = :mod10,
                         mod11 = :mod11,
                         mod12 = :mod12,
                         mod13 = :mod13,
                         mod14 = :mod14,
                         mod15 = :mod15,
                         mod16 = :mod16,
                         mod17 = :mod17,
                         mod18 = :mod18,
                         mod19 = :mod19,
                         mod20 = :mod20,
                         mod21 = :mod21,
                         mod22 = :mod22,
                         mod23 = :mod23,
                         mod24 = :mod24,
                         mod25 = :mod25,
                         mod26 = :mod26,
                         mod27 = :mod27,
                         mod28 = :mod28,
                         mod29 = :mod29,
                         mod30 = :mod30,
                         mod31 = :mod31,
                         mod32 = :mod32,
                         mod33 = :mod33,
                         mod34 = :mod34,
                         mod35 = :mod35,
                         mod36 = :mod36,
                         mod37 = :mod37,
                         mod38 = :mod38,
                         mod39 = :mod39,
                         mod40 = :mod40,
                         mod41 = :mod41,
                         mod43 = :mod43,
                         mod44 = :mod44,
                         mod46 = :mod46,
                         mod47 = :mod47,
                         mod48 = :mod48,
                         mod49 = :mod49
                         
          where
          cod_usuario = :idusuario');


            $stmt->bindParam(":idusuario", $idUsuario, PDO::PARAM_STR);
            $stmt->bindParam(":modAll", $permisos['modAll'], PDO::PARAM_STR);
            $stmt->bindParam(":mod1", $permisos['mod1'], PDO::PARAM_STR);
            $stmt->bindParam(":mod2", $permisos['mod2'], PDO::PARAM_STR);
            $stmt->bindParam(":mod3", $permisos['mod3'], PDO::PARAM_STR);
            $stmt->bindParam(":mod4", $permisos['mod4'], PDO::PARAM_STR);
            $stmt->bindParam(":mod5", $permisos['mod5'], PDO::PARAM_STR);
            $stmt->bindParam(":mod6", $permisos['mod6'], PDO::PARAM_STR);
            $stmt->bindParam(":mod7", $permisos['mod7'], PDO::PARAM_STR);
            $stmt->bindParam(":mod8", $permisos['mod8'], PDO::PARAM_STR);
            $stmt->bindParam(":mod9", $permisos['mod9'], PDO::PARAM_STR);
            $stmt->bindParam(":mod10", $permisos['mod10'], PDO::PARAM_STR);
            $stmt->bindParam(":mod11", $permisos['mod11'], PDO::PARAM_STR);
            $stmt->bindParam(":mod12", $permisos['mod12'], PDO::PARAM_STR);
            $stmt->bindParam(":mod13", $permisos['mod13'], PDO::PARAM_STR);
            $stmt->bindParam(":mod14", $permisos['mod14'], PDO::PARAM_STR);
            $stmt->bindParam(":mod15", $permisos['mod15'], PDO::PARAM_STR);
            $stmt->bindParam(":mod16", $permisos['mod16'], PDO::PARAM_STR);
            $stmt->bindParam(":mod17", $permisos['mod17'], PDO::PARAM_STR);
            $stmt->bindParam(":mod18", $permisos['mod18'], PDO::PARAM_STR);
            $stmt->bindParam(":mod19", $permisos['mod19'], PDO::PARAM_STR);
            $stmt->bindParam(":mod20", $permisos['mod20'], PDO::PARAM_STR);
            $stmt->bindParam(":mod21", $permisos['mod21'], PDO::PARAM_STR);
            $stmt->bindParam(":mod22", $permisos['mod22'], PDO::PARAM_STR);
            $stmt->bindParam(":mod23", $permisos['mod23'], PDO::PARAM_STR);
            $stmt->bindParam(":mod24", $permisos['mod24'], PDO::PARAM_STR);
            $stmt->bindParam(":mod25", $permisos['mod25'], PDO::PARAM_STR);
            $stmt->bindParam(":mod26", $permisos['mod26'], PDO::PARAM_STR);
            $stmt->bindParam(":mod27", $permisos['mod27'], PDO::PARAM_STR);
            $stmt->bindParam(":mod28", $permisos['mod28'], PDO::PARAM_STR);
            $stmt->bindParam(":mod29", $permisos['mod29'], PDO::PARAM_STR);
            $stmt->bindParam(":mod30", $permisos['mod30'], PDO::PARAM_STR);
            $stmt->bindParam(":mod31", $permisos['mod31'], PDO::PARAM_STR);
            $stmt->bindParam(":mod32", $permisos['mod32'], PDO::PARAM_STR);
            $stmt->bindParam(":mod33", $permisos['mod33'], PDO::PARAM_STR);
            $stmt->bindParam(":mod34", $permisos['mod34'], PDO::PARAM_STR);
            $stmt->bindParam(":mod35", $permisos['mod35'], PDO::PARAM_STR);
            $stmt->bindParam(":mod36", $permisos['mod36'], PDO::PARAM_STR);
            $stmt->bindParam(":mod37", $permisos['mod37'], PDO::PARAM_STR);
            $stmt->bindParam(":mod38", $permisos['mod38'], PDO::PARAM_STR);
            $stmt->bindParam(":mod39", $permisos['mod39'], PDO::PARAM_STR);
            $stmt->bindParam(":mod40", $permisos['mod40'], PDO::PARAM_STR);
            $stmt->bindParam(":mod41", $permisos['mod41'], PDO::PARAM_STR);
            $stmt->bindParam(":mod43", $permisos['mod43'], PDO::PARAM_STR);
            $stmt->bindParam(":mod44", $permisos['mod44'], PDO::PARAM_STR);
            $stmt->bindParam(":mod46", $permisos['mod46'], PDO::PARAM_STR);
            $stmt->bindParam(":mod47", $permisos['mod47'], PDO::PARAM_STR);
            $stmt->bindParam(":mod48", $permisos['mod47'], PDO::PARAM_STR);
            $stmt->bindParam(":mod49", $permisos['mod48'], PDO::PARAM_STR);


            if ($stmt->execute())
            {
                return 'ok';
            }else
            {
                var_dump($stmt->errorInfo());
                return 'error';
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public static function mdlNuevoPermiso($idUsuario)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('insert into dash_accesos (cod_usuario) values (:idusuario) ');
            $stmt->bindParam(":idusuario", $idUsuario, PDO::PARAM_STR);
            if ($stmt->execute())
            {
                return 'ok';
            }else
            {
                return 'error';
            }
        }catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public static function mdlEliminaPermiso($idUsuario)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('delete from dash_accesos where cod_usuario = :idusuario ');
            $stmt->bindParam(":idusuario", $idUsuario, PDO::PARAM_STR);
            if ($stmt->execute())
            {
                return 'ok';
            }else
            {
                return 'error';
            }
        }catch (Exception $e)
        {
            return $e->getMessage();
        }
    }



}
