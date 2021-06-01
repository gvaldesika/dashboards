<?php
class UsuariosModelo
{

    public static function mdlValidaAccesoSesion($correoUsuario)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM `Usuarios` where Cuenta = :usuario and Sistema = 16');
            $stmt->bindParam(":usuario", $correoUsuario, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }

    public static function mdlVerUsuarios($sistema)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM `Usuarios` usr 
left JOIN maestro_chofer cho on cho.Codigo_Chofer = usr.Cod_Operador and cho.Cod_Empresa=1
where usr.Sistema = :sistema and usr.Activo = 1  order by Nombre_Cuenta asc');
            $stmt->bindParam(":sistema", $sistema, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    public static function mdlVerUsuariosNuevos()
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT cho.Codigo_Chofer, 
usr.Id_Usuario, 
CONCAT(cho.Nombres," ",cho.Apellidos ) as nombre,
usr.Cuenta
FROM `appika_usuarios_app` app
INNER JOIN Usuarios usr on usr.Id_Usuario = app.Id_Usuario
INNER JOIN maestro_chofer cho on cho.Codigo_Chofer = usr.Cod_Operador and cho.Cod_Empresa=1
GROUP BY cho.Nombres,cho.Apellidos
order by cho.Nombres asc');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    /**
     * Muestra un Usuario por su ID
     * @param $idUsuario
     * @return mixed
     */
    public static function mdlVerUsuario($idUsuario)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM `Usuarios` usr 
            left JOIN maestro_chofer cho on cho.Codigo_Chofer = usr.Cod_Operador
            where usr.Id_Usuario= :idusuario');
            //usr.Sistema = 17 and
            $stmt->bindParam(":idusuario", $idUsuario, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }


    /**
     * Muestra un Usuario por su Correo (especificando un ID de Sistema)
     * @param $cuenta
     * @param $sistema
     * @return mixed
     */
    public static function mdlVerUsuarioCuenta($cuenta,$sistema)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM `Usuarios` usr 
            left JOIN maestro_chofer cho on cho.Codigo_Chofer = usr.Cod_Operador
            where usr.Sistema = :sistema and usr.Cuenta= :cuenta');
            //usr.Sistema = 17 and
            $stmt->bindParam(":cuenta", $cuenta, PDO::PARAM_STR);
            $stmt->bindParam(":sistema", $sistema, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }


    public static function mdlVerAccesosUsuario($idUsuario)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM `dash_accesos` where cod_usuario = :idusuario');
            $stmt->bindParam(":idusuario", $idUsuario, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }


    public static function mdlEliminaAccesoUsuario($idUsuario)
    {
        try {
            $stmt = Conexion::conectarGoDaddy() ->prepare('delete from Usuarios where Id_Usuario = :idusuario');
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

    public static function mdlNuevoUsuario($cuenta)
    {
        $sistema = 16;
        var_dump($cuenta);
        try {
            $stmt = Conexion::conectarGoDaddy() ->prepare('insert into Usuarios (Cuenta, Clave, Nombre_Cuenta, Nivel_Cuenta, Activo, Cod_Empresa, 
                      Sistema, Correo, datox, Bloque, Codigo_Centro_Costo, Area, Responsable, 
Firma, Celular, Cod_Operador, Id_Perfil, agregar, modificar, eliminar, Imprime, Administrativo, Cuenta_Anterior)
values (:Cuenta,:Clave,:Nombre_Cuenta,:Nivel_Cuenta,:Activo,:Cod_Empresa,:Sistema,:Correo,:datox,:Bloque,:Codigo_Centro_Costo,:Area,:Responsable,:Firma,
        :Celular,:Cod_Operador,:Id_Perfil,:agregar,:modificar,:eliminar,:Imprime,:Administrativo,:Cuenta_Anterior)');

            $stmt->bindParam(":Cuenta", $cuenta['Cuenta'], PDO::PARAM_STR);
            $stmt->bindParam(":Clave", $cuenta['Clave'], PDO::PARAM_STR);
            $stmt->bindParam(":Nombre_Cuenta", $cuenta['Nombre_Cuenta'], PDO::PARAM_STR);
            $stmt->bindParam(":Nivel_Cuenta", $cuenta['Nivel_Cuenta'], PDO::PARAM_STR);
            $stmt->bindParam(":Activo", $cuenta['Activo'], PDO::PARAM_STR);
            $stmt->bindParam(":Cod_Empresa", $cuenta['Cod_Empresa'], PDO::PARAM_STR);
            $stmt->bindParam(":Sistema", $sistema, PDO::PARAM_STR);
            $stmt->bindParam(":Correo", $cuenta['Correo'], PDO::PARAM_STR);
            $stmt->bindParam(":datox", $cuenta['datox'], PDO::PARAM_STR);
            $stmt->bindParam(":Bloque", $cuenta['Bloque'], PDO::PARAM_STR);
            $stmt->bindParam(":Codigo_Centro_Costo", $cuenta['Codigo_Centro_Costo'], PDO::PARAM_STR);
            $stmt->bindParam(":Area", $cuenta['Area'], PDO::PARAM_STR);
            $stmt->bindParam(":Responsable", $cuenta['Responsable'], PDO::PARAM_STR);
            $stmt->bindParam(":Firma", $cuenta['Firma'], PDO::PARAM_STR);
            $stmt->bindParam(":Celular", $cuenta['Celular'], PDO::PARAM_STR);
            $stmt->bindParam(":Cod_Operador", $cuenta['Cod_Operador'], PDO::PARAM_STR);
            $stmt->bindParam(":Id_Perfil", $cuenta['Id_Perfil'], PDO::PARAM_STR);
            $stmt->bindParam(":agregar", $cuenta['agregar'], PDO::PARAM_STR);
            $stmt->bindParam(":modificar", $cuenta['modificar'], PDO::PARAM_STR);
            $stmt->bindParam(":eliminar", $cuenta['eliminar'], PDO::PARAM_STR);
            $stmt->bindParam(":Imprime", $cuenta['Imprime'], PDO::PARAM_STR);
            $stmt->bindParam(":Administrativo", $cuenta['Administrativo'], PDO::PARAM_STR);
            $stmt->bindParam(":Cuenta_Anterior", $cuenta['Cuenta_Anterior'], PDO::PARAM_STR);

            if ($stmt->execute())
            {
                return 'ok';
            }else
            {
                return $stmt->errorInfo();;
            }
        }catch (Exception $e)
        {
            return $e->getMessage();
        }
    }








}
