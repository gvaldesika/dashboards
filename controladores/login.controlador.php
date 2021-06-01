<?php
require_once 'modelos/app.modelo.php';
require_once 'modelos/usuarios.modelo.php';
require_once  'controladores/usuarios.controlador.php';
class LoginControlador
{
    public function loginUsuario($user, $pass)
    {
        $flag = false;
        switch ($user) {
            case 'admin':
                if ($pass == 'Ika.Spa.2020') {
                    $flag = true;
                }
                break;

        }


        if ($flag) {
            // Información para entrar desde localhost (PRUEBAS)
            $usuario = UsuariosModelo::mdlValidaAccesoSesion('GUSTAVO.VALDES@IKA.CL');
            $_SESSION['usuario'] = $usuario;
            $_SESSION['permisos'] = UsuariosControlador::ctrVerAccesosUsuario($usuario['Id_Usuario']);

            //echo '<div class="alert alert-danger"> Por favor ingrese desde la IKA APP</div>';
            echo '<script>
                        window.location = "main.php?pag=dashboard";
                    </script>';
        } else {
            echo '<script>
                        if (window.history.replaceState)
                    {
                        windows.history.replaceState(null, null, window.location.href);

                    }
                    </script>';
            echo '<div class="alert alert-danger"> Por favor ingrese desde la IKA APP </div>';
        }


    }


    public static function validaLoginPagina()
    {

        if (!isset($_SESSION['usuario'])) {
            echo '<script>
                        window.location = "legacy.ika-hub.cl/app";
                    </script>';
        }
    }


    public function ctrValidaSesGoogle($keySes)
    {
        $res = AppModelo::mdlObtenerSesion($keySes);

        $usuario = UsuariosModelo::mdlValidaAccesoSesion($res['Cuenta']);


        //$resu = UsuariosModelo::mdlLoginUsuario($usuario,$contraseña);
        //$resu = UsuariosModelo::mdlLoginUsuario($usuario['Cuenta'],$usuario['Clave']);
        if ($usuario != false) {
            // Acá debria cargar permisos de acceso a Menú ....

            $_SESSION['usuario'] = $usuario;


            $_SESSION['permisos'] = UsuariosControlador::ctrVerAccesosUsuario($usuario['Id_Usuario']);
            session_write_close();

            //Genera log
            //$log = LogControlador::ctrNuevolog($usuario['Cuenta'], 'Login a Sistema - Google', 'LOGIN');

            echo '<script>
                        window.location = "main.php?pag=dashboard";
                    </script>';

        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><i class="fa fa-warning"></i> AVISO: </strong> No tiene permisos para entrar a este sistema
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

        }
    }

    public function ctrTerminaSesion()
    {
        try {
            $_SESSION = array();
            session_destroy();
            return "ok";
        }catch (Exception $e)
        {
            return "fallo";
        }

    }
}
