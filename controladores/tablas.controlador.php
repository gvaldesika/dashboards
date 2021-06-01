<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/tablas.modelo.php';

class TablasControlador
{
    public static function ctrObtenerCCO()
    {
        $resultado = TablasModelo::mdlObtenerCCO();
        return $resultado;
    }

    public static function ctrObtenerTabla($idTabla)
    {
        $resultado = TablasModelo::mdlObtenerTabla($idTabla);
        return $resultado;

    }





}
