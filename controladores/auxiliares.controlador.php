<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/auxiliares.modelo.php';
require_once $_SERVER["DOCUMENT_ROOT"]."/dashboards/vistas/librerias/PHPExcel/Classes/PHPExcel.php";

class AuxiliaresControlador
{
    // Convierte el ID de uyn centro de costo y devuelve su nombre;
    public static function mdlCCOaNombre($cco)
    {
    $resu = AuxiliaresModelo::mdlCCOaNombre($cco);
    return $resu;
    }



    public static function ctrVerTodosCCO()
    {
        $resu = AuxiliaresModelo::mdlVerTodosCCO();
        return $resu;
    }

    public static function ctrVerTodosCCOOperacionales()
    {
        $resu = AuxiliaresModelo::mdlVerTodosCCOOperacionales();
        return $resu;
    }



    public static function ctrVerUltimaActualizacion()
    {
        $resu = AuxiliaresModelo::mdlVerUltimaActualizacion();
        return $resu;
    }

    public static function ctrObtenerIndicadorDiario($fecha)
    {
        $resu = AuxiliaresModelo::mdlObtenerIndicadorDiario($fecha);
        return $resu;

    }


    /**
     * Utilizado para conocer la unidad de negocio de un CCO indicado
     * @param $cco
     * @return int|null
     */
    public static function ccoaUnidadNegocio($cco)
    {
        if (in_array($cco,ParametrosApp::obtenerCCOUnMineria()))
        {
            return 25;
        }else
        {
            if (in_array($cco,ParametrosApp::obtenerCCOUnIndustrial()))
            {
                return 18;
            }else
            {
                if (in_array($cco,ParametrosApp::obtenerCCOUnInfraestructura()))
                {
                    return 19;
                }else
                {
                    return null;
                }

            }
        }

    }

    /**
     * Devuelve los CCO correspondientes a la unidad de negocio ingresada (CCO de la UN)
     * @param $cco
     * @return int|null
     */
    public static function UnidadNegocioaCCO($cco)
    {
        switch ($cco)
        {
            case 25:
                return ParametrosApp::obtenerCCOUnMineria();
                break;

            case 18:
                return ParametrosApp::obtenerCCOUnIndustrial();
                break;

            case 19:
                return ParametrosApp::obtenerCCOUnInfraestructura();
                break;
        }
    }


    /**
     * Permite obtener un arreglo con el valor del dolar por cada mes. (Se toma para cada mes, el valor del 1er día del siguente mes).
     * Este caclculo se utiliza en informe de Maquinaria $USD
     * @param $ano
     * @return array
     */
    public static function ctrObtenerValorDolar($ano)
    {
        $resu = AuxiliaresModelo::mdlObtenerValorDolar($ano);
        return $resu;

    }






}