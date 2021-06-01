<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/prevencion.modelo.php';
class PrevencionControlador
{


    public static function ctrObtenerIncidentes($ano,$mes)
    {
        $resultado = PrevencionModelo::mdlObtenerIncidentes($ano,$mes);
        return $resultado;
    }


    public static function ctrObtenerNroIncidentesAnual($ano)
    {
        $listaDiv = PrevencionModelo::mdlObtenerDiviciones();
        $lista = array();


        foreach ($listaDiv as $row)
        {
            $lista[] = PrevencionModelo::mdlObtenerNroIncidentesDivicion($ano,$row['Id_Div'],$row['Nombre_Div']);
        }
        return $lista;
    }


    public static function ctrVerDiviciones()
    {
        $lista = PrevencionModelo::mdlObtenerDiviciones();
        return $lista;
    }

    public static function ctrVerTipoIncidente()
    {
        $lista = PrevencionModelo::mdlObtenerTipoIncidentes();
        return $lista;
    }


    public static function ctrVerGraficoIncidentes($ano)
    {

        $listaMeses = array(
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        );

        $grafico = array();

        for ($i=1;$i<=12;$i++)
        {
            $res = PrevencionModelo::mdlObtenerIncidentesMes($ano,$i);
            $a = array($listaMeses[$i],$res[0][1],$res[1][1],$res[2][1],$res[3][1],$res[4][1],$res[5][1],$res[6][1],$res[7][1],$res[8][1]);
            $grafico[] = $a;

        }

        return $grafico;

    }


    public static function ctrVerGraficoIncidentesTipo($ano)
    {

        $listaMeses = array(
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        );

        $grafico = array();

        for ($i=1;$i<=12;$i++)
        {
            $res = PrevencionModelo::mdlObtenerIncidentesMesTipo($ano,$i);
            $a = array($listaMeses[$i],$res[0][1],$res[1][1],$res[2][1],$res[3][1],$res[4][1],$res[5][1],$res[6][1],$res[7][1],$res[8][1]);
            $grafico[] = $a;

        }

        return $grafico;

    }

    public static function ctrVerGraficoIncidentesTipoV2($ano)
    {
        $tipos = self::ctrVerTipoIncidente();

        $listaMeses = array(
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        );

        $grafico = array();

        foreach ($tipos as $row)
        {
            $a = PrevencionModelo::mdlObtenerNroIncidentesTipo(2020,$row['clasificacion']);
            $grafico[] = $a;
        }

        return $grafico;

    }





}
