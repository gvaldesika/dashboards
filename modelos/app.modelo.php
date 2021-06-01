<?php
require_once 'Conexion.php';
/**
 * Permite manipular las tablas de IKA APP
 * Class AppModelo
 */
class AppModelo
{

    public static function mdlObtenerSesion($keySes)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('select * from appika_usuarios_sesiones_app app
INNER JOIN Usuarios usr on usr.Id_Usuario = app.Id_Usuario
where app.Key_Ses = :idsess');
            $stmt->bindParam(":idsess", $keySes, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {

        }

    }

}
