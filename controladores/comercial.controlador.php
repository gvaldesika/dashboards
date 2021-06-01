<?php

require_once 'controladores/comprobantes.controlador.php';
require_once 'controladores/financiero.controlador.php';


class ComercialControlador
{

    public static function ctrVerCumplimientoBudget($ano,$un,$listaCCO,$listaEmpresasEugCom)
    {

        //$listaMin = FinancieroControlador::ctrVerEstadoResultadoAnual($ano,['Ingresos de Explotación'],$listaCCO,$listaEmpresasEugCom);
        switch ($un)
        {
            case 'IKA Mineria':
                $lista = ComprobantesControlador::ctrObtenerIngresosAnualesMineria($ano,2);
                $budgetBase = ComprobantesControlador::ctrObtenerPresupuestoUn($ano,'Base',$un);
                $listaAcumulado = ComprobantesControlador::ctrObtenerIngresosAnualesAcumuladoMineria($ano,2);
                $budgetBaseAcumulado = ComprobantesControlador::ctrObtenerPresupuestoAcumuladoUn($ano,'Base',$un);
                break;

            case 'IKA Industrial':
                $lista = ComprobantesControlador::ctrObtenerIngresosAnualesIndustrial($ano,2);
                $budgetBase = ComprobantesControlador::ctrObtenerPresupuestoUn($ano,'Base',$un);
                $listaAcumulado = ComprobantesControlador::ctrObtenerIngresosAnualesAcumuladoIndustrial($ano,2);
                $budgetBaseAcumulado = ComprobantesControlador::ctrObtenerPresupuestoAcumuladoUn($ano,'Base',$un);
                break;

            case 'IKA Infraestructura':
                $lista = ComprobantesControlador::ctrObtenerIngresosAnualesInfraestructura($ano,2);
                $budgetBase = ComprobantesControlador::ctrObtenerPresupuestoUn($ano,'Base','IKA Infraestructura');
                $listaAcumulado = ComprobantesControlador::ctrObtenerIngresosAnualesAcumuladoInfraestructura($ano,2);
                $budgetBaseAcumulado = ComprobantesControlador::ctrObtenerPresupuestoAcumuladoUn($ano,'Base','IKA Infraestructura');
                break;
        }

        /*
        var_dump($listaMin);
        var_dump($budgetBaseMin);
        var_dump($listaAcumuladoMin);
        var_dump($budgetBaseAcumuladoMin);
*/


        $listaFinal[] = array(

            1 => round(($lista[0]['Enero']/$budgetBase[0]['valor'])*100,1),
            2 => round(($lista[0]['Febrero']/$budgetBase[0]['valor'])*100,1),
            3 => round(($lista[0]['Marzo']/$budgetBase[0]['valor'])*100,1),
            4 => round(($lista[0]['Abril']/$budgetBase[0]['valor'])*100,1),
            5 => round(($lista[0]['Mayo']/$budgetBase[0]['valor'])*100,1),
            6 => round(($lista[0]['Junio']/$budgetBase[0]['valor'])*100,1),
            7 => round(($lista[0]['Julio']/$budgetBase[0]['valor'])*100,1),
            8 => round(($lista[0]['Agosto']/$budgetBase[0]['valor'])*100,1),
            9 => round(($lista[0]['Septiembre']/$budgetBase[0]['valor'])*100,1),
            10 => round(($lista[0]['Octubre']/$budgetBase[0]['valor'])*100,1),
            11 => round(($lista[0]['Noviembre']/$budgetBase[0]['valor'])*100,1),
            12 => round(($lista[0]['Diciembre']/$budgetBase[0]['valor'])*100,1)
        );

        $tmp = array(

            1 => round(($listaAcumulado[0]['valor']/$budgetBaseAcumulado[0]['valor'])*100,1),
            2 => round(($listaAcumulado[1]['valor']/$budgetBaseAcumulado[1]['valor'])*100,1),
            3 => round(($listaAcumulado[2]['valor']/$budgetBaseAcumulado[2]['valor'])*100,1),
            4 => round(($listaAcumulado[3]['valor']/$budgetBaseAcumulado[3]['valor'])*100,1),
            5 => round(($listaAcumulado[4]['valor']/$budgetBaseAcumulado[4]['valor'])*100,1),
            6 => round(($listaAcumulado[5]['valor']/$budgetBaseAcumulado[5]['valor'])*100,1),
            7 => round(($listaAcumulado[6]['valor']/$budgetBaseAcumulado[6]['valor'])*100,1),
            8 => round(($listaAcumulado[7]['valor']/$budgetBaseAcumulado[7]['valor'])*100,1),
            9 => round(($listaAcumulado[8]['valor']/$budgetBaseAcumulado[8]['valor'])*100,1),
            10 => round(($listaAcumulado[9]['valor']/$budgetBaseAcumulado[9]['valor'])*100,1),
            11 => round(($listaAcumulado[10]['valor']/$budgetBaseAcumulado[10]['valor'])*100,1),
            12 => round(($listaAcumulado[11]['valor']/$budgetBaseAcumulado[11]['valor'])*100,1)
        );


        $res[] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($tmp as $row)
        {
            if ($indice<=12) {

                if ($indice < date('n')-1) {
                    $res[] = (float)$row;
                } else {
                    if ($ano != date('Y')) {
                        $res[] = (float)$row;

                    } else {
                        $res[] = null;
                    }

                }
            }
            $indice++;
        }

        $listaFinal[] = $res;

        return $listaFinal;
    }







}
