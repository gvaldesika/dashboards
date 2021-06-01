<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/usuarios.modelo.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/permisos.modelo.php';
class UsuariosControlador
{

    public static function ctrVerUsuarios($sistema)
    {
        return UsuariosModelo::mdlVerUsuarios($sistema);
    }

    public function ctrNuevoUsuario($idusuario)
    {
        $usuario = self::ctrVerUsuario($idusuario);
        $res1 = UsuariosModelo::mdlNuevoUsuario($usuario);

        // Busca la cuenta creada de Dashboard
        $usuarioDashboard = UsuariosModelo::mdlVerUsuarioCuenta($usuario['Cuenta'],16);
        $res2 = PermisosModelo::mdlNuevoPermiso($usuarioDashboard['Id_Usuario']);
        if ($res1 == 'ok' && $res2 == 'ok')
        {
            return 'ok';
        }else
        {
            return 'fallo';
        }
    }

    public static function ctrVerUsuariosNuevos($usuariosActuales)
    {
        $listaFinal = array();
        $tmp = UsuariosModelo::mdlVerUsuariosNuevos();

        foreach ($tmp as $row)
        {
            $flag = 0;
            foreach ($usuariosActuales as $row2)
            {
                if($row['Cuenta'] == $row2['Cuenta'])
                {
                    $flag=1;
                }
            }

            if ($flag==0)
            {
                $listaFinal[] = $row;
            }
        }

        return $listaFinal;
    }


    public static function ctrVerUsuario($idUsuario)
    {
        return UsuariosModelo::mdlVerUsuario($idUsuario);

    }

    public static function ctrVerAccesosUsuario($idUsuario)
    {
        return UsuariosModelo::mdlVerAccesosUsuario($idUsuario);
    }

    public function ctrActualizarPermisos($idUsuario,$permisos)
    {
        return PermisosModelo::mdlActualizarPermisos($idUsuario,$permisos);
    }

    public function ctrEliminaAccesoUsuario($idUsuario)
    {
        $res2 = PermisosModelo::mdlEliminaPermiso($idUsuario);
        $res1 = UsuariosModelo::mdlEliminaAccesoUsuario($idUsuario);
        if ($res1 == 'ok' && $res2 == 'ok')
        {
            return 'ok';
        }else
        {
            return 'fallo';
        }

    }






}
