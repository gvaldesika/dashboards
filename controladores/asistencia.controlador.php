<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/asistencia.modelo.php';


require_once $_SERVER["DOCUMENT_ROOT"]."/dashboards/vistas/librerias/PHPExcel/Classes/PHPExcel.php";

class AsistenciaControlador
{

    public function ctrInsertarAsistencia($lista)
    {
        $listaDebug = array();
        foreach ($lista as $row)
        {
            $r = AsistenciaModelo::mdlInsertarAsistencia($row);
            $listaDebug[] = $r;
        }
        return $listaDebug;
    }


    public function ctrInsertarAsistenciaDetalle($lista)
    {
        foreach ($lista as $row)
        {
            $r = AsistenciaModelo::mdlInsertarAsistenciaDetalle($row);


        }

    }



    public static function ctrVerAsistencia($op,$fecha)
    {
        $resu = AsistenciaModelo::mdlVerAsistencia($op,$fecha);
        return $resu;
    }


    /**
     * Muestra la ssitencia de un colaborador para una semana especifica
     * @param $op
     * @param $rut
     * @return array|string
     */
    public static function ctrVerAsistSemana($op,$rut)
    {
        $resu = AsistenciaModelo::mdlVerAsistSemana($op,$rut);
        return $resu;
    }

    public static function ctrVerAsistenciaCompleta($op,$fecha)
    {
        $asistenciaSemana = array();
        $trabajadores = AsistenciaModelo::mdlVerRutSemana($fecha[1],$op);

        foreach ($trabajadores as $row)
        {
            $listaJornadaSem = 0;
            $tmpAsistSem = AsistenciaModelo::mdlVerAsistSemana($row['rut'],$fecha[1]);
            foreach ($tmpAsistSem as $row2)
            {

            }

        }

        //$resu = AsistenciaModelo::mdlVerAsistencia($op,$fecha);
        //return $resu;
    }


    /**
     * Muestra los CCO disponibles (para mostrarlos en un dropDownBox)
     * @return array
     */
    public static function ctrVerCCO()
    {
        $resu = AsistenciaModelo::mdlVerCCO();
        return $resu;
    }


    /**
     * Muestras las semanas cargadas en la tabla dash_inf_asistencia
     * @return array
     */
    public static function ctrVeSemanas()
    {
        $resu = AsistenciaModelo::mdlVeSemanas();
        return $resu;
    }

    public static function ctrVeSemanasDet()
    {
        $resu = AsistenciaModelo::mdlVeSemanasDet();
        return $resu;
    }



}