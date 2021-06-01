<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/operaciones.modelo.php';
class OperacionesControlador
{

    // Sustentabilidad
    public static function ctrIndicadorPrevencion($ano,$listaTipo,$listaCentroCostos)
    {
        return OperacionesModelo::mdlIndicadorPrevencion($ano,$listaTipo,$listaCentroCostos);
    }

    // Clientes
    public static function ctrPorcDisponibilidad($ano,$listaCentroCostos)
    {
        return OperacionesModelo::mdlPorcDisponibilidad($ano,$listaCentroCostos);
    }

    //Eficiencia
    public static function ctrObtenerPromProduccion($ano,$listaEquipos,$listaCentroCostos,$listaUm)
    {
        $resu = OperacionesModelo::mdlObtenerPromProduccion($ano,$listaEquipos,$listaCentroCostos,$listaUm);

        $indice = 1;
        $res[0][] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($resu[0] as $row)
        {

            if ($indice < date('n') )
            {
                $res[0][] = (int)$row;
                $total = $total+(int)$row;
            }
            else
            {
                if($ano != date('Y'))
                {
                    $res[0][] = (int)$row;
                    $total = $total+(int)$row;

                }else
                {
                    $res[0][] = null;
                }

            }
            $indice++;
        }
        $res[0][13] = $total;

        return $res;
    }


    /**
     * Obtiene el rendimiento de combustible pro0medio mensual (12 meses) de un tipo de equipo
     * @param $ano
     * @param $listaEquipos
     * @param $listaCentroCostos
     */
    public static function ctrObtenerRendComb($ano,$listaEquipos,$listaCentroCostos,$listaHoras)
    {
        $combustible = OperacionesModelo::mdlObtenerTotCombustible($ano,$listaEquipos,$listaCentroCostos);

        $listatmp[0] = array(
            1 => is_nan(round($combustible[0][1]/$listaHoras[0][1],1)) ? '':round($combustible[0][1]/$listaHoras[0][1],1),
            2 => is_nan(round($combustible[0][2]/$listaHoras[0][2],1))? '':round($combustible[0][2]/$listaHoras[0][2],1),
            3 => is_nan(round($combustible[0][3]/$listaHoras[0][3],1))? '':round($combustible[0][3]/$listaHoras[0][3],1),
            4 => is_nan(round($combustible[0][4]/$listaHoras[0][4],1))? '':round($combustible[0][4]/$listaHoras[0][4],1),
            5 => is_nan(round($combustible[0][5]/$listaHoras[0][5],1))? '':round($combustible[0][5]/$listaHoras[0][5],1),
            6 => is_nan(round($combustible[0][6]/$listaHoras[0][6],1))? '':round($combustible[0][6]/$listaHoras[0][6],1),
            7 => is_nan(round($combustible[0][7]/$listaHoras[0][7],1))? '':round($combustible[0][7]/$listaHoras[0][7],1),
            8 => is_nan(round($combustible[0][8]/$listaHoras[0][8],1))? '':round($combustible[0][8]/$listaHoras[0][8],1),
            9 => is_nan(round( $combustible[0][9]/$listaHoras[0][9],1))? '':round($combustible[0][9]/$listaHoras[0][9],1),
            10 => is_nan(round($combustible[0][10]/$listaHoras[0][10],1))? '':round($combustible[0][10]/$listaHoras[0][10],1),
            11 => is_nan(round($combustible[0][11]/$listaHoras[0][11],1))? '':round($combustible[0][11]/$listaHoras[0][11],1),
            12 => is_nan(round($combustible[0][12]/$listaHoras[0][12],1))? '':round($combustible[0][12]/$listaHoras[0][12],1)
        );



        return $listatmp;

    }



    // Datos Fijos

    public static function ctrObtenerDatosFijos($ano,$cco)
    {
        $lista = TablasControlador::ctrObtenerTabla(4);
        $listaFinal = array();
        foreach ($lista as $row)
        {
            if ($row['Analisis_Numero_1'] == $ano && $row['Analisis_Numero_2'] == $cco)
            {
                $listaFinal[] = $row;
            }
        }


        return $listaFinal;

    }



}
