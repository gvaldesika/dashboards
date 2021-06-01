<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/backlog.modelo.php';

class BacklogControlador
{

    public static function mdlVerBacklog()
    {
        $resu = BacklogModelo::mdlVerBacklog();
        return $resu;
    }

    public static function ctrEditarBacklog($backlog){

        $resu = BacklogModelo::mdlEditarBacklog($backlog);
        return $resu;

    }


    public static function mdlVerBacklogDetalle()
    {
        $resu = BacklogModelo::mdlVerBacklogDetalle();
        return $resu;
    }

    public static function ctrVerBacklogTabla($vertodos)
    {
        $lista = array();
        $resu = BacklogModelo::mdlVerBacklogDetalle($vertodos);
        foreach ($resu as $row)
        {
            $promedio = 0;
            $promedioTmp = ComprobantesModelo::mdlObtenerIngresosPromedioObra(date('Y-m-01',strtotime('-1 year')),date('Y-m-t'),$row['CCO_Proy'],'he_comprobantes_contables_cierre')['promedio'];
            if (!is_null($promedioTmp)):
                $promedio = $promedioTmp;
            endif;

            $a = array(
                'IdBacklogs' => $row['IdBacklogs'],
                'Rut_Cli' => $row['Rut_Cli'],
                'Nom_Cli' => $row['Nom_Cli'],
                'Nom_Proy' => $row['Nom_Proy'],
                'Fecha_Ini' => $row['Fecha_Ini'],
                'Fecha_Fin' => $row['Fecha_Fin'],
                'Id_Estado' => $row['Id_Estado'],
              'Tot_Proy' => $row['Tot_Proy'],
              'Notas_Proy' => $row['Notas_Proy'],
              'CCO_Proy' => $row['CCO_Proy'],
              'Id_Empresa' => $row['Id_Empresa'],
              'restante_meses' => $row['restante_meses'],
              'total_meses' => $row['total_meses'],
              'mensual' => $row['mensual'],
              'Razon_Social' => $row['Razon_Social'],
              'nom_cco' => $row['nom_cco'],
                'nom_estado' => $row['nom_estado'],
                'promedio' => $promedio
            );


            if (date('Y-m-d') <= date('Y-m-d',strtotime($row['Fecha_Fin']))):
                $lista[] = $a;
            endif;

        }
        return $lista;
    }



    public static function ctrEliminaBacklog($idBacklog)
    {
        $resu = BacklogModelo::mdlEliminaBacklog($idBacklog);
        return $resu;
    }


    public function ctrInsertarBacklog($backlog)
    {
        $resu = BacklogModelo::mdlInsertarBacklog($backlog);
        return $resu;

    }


    // Utilizado para el grafico BurnDown de com_inf_backlog
    public static function ctrVerBacklogGrafico($op)
    {
        $resu = BacklogModelo::mdlVerBacklogDetalle($op);

        $listaBacklog = array();

        $fechaActual = new DateTime(date('Y-m-d'));
        //$fechaActual = new DateTime(date('2021-01-01')); // ****** -> Cambio solicitado por Agustin (Temporal)
        $fechaFinal = new DateTime(BacklogModelo::mdlBacklogFechaFinal(null)['ultima_fecha']);

        $fechaPuntero = $fechaActual;
        $mesPuntero = 1;

        //$final = date("Y-m-d", strtotime("+1 month", $time));

        while ($fechaPuntero<$fechaFinal):
            $sumaMes = 0;
            foreach ($resu as $row):
                if($row['restante_meses'] >= $mesPuntero && $row['restante_meses']!= 0):
                    $sumaMes = $sumaMes + $row['mensual'];
                endif;
            endforeach;

            $a = array(
                'mes' => $fechaPuntero->format('m-Y'),
                'total_mensual' => $sumaMes
            );

            $listaBacklog[] = $a;


            // Suma 1 Mes a la fecha puntero (hasta que llegue a la fechaFinal)
            $day = $fechaPuntero->format('j');
            $fechaPuntero->modify('first day of +1 month');
            $fechaPuntero->modify('+' . (min($day, $fechaPuntero->format('t')) - 1) . ' days');
            // SUma 1 al mes de comparacion del campo '$row['restante_meses']'
            $mesPuntero++;
        endwhile;

        return $listaBacklog;
    }

    // Utilizado para el grafico BurnDown de com_inf_backlog_infra (Solo muestra el backlog de Infraestructura)
    public static function ctrVerBacklogGraficoInf()
    {
        $resu = BacklogModelo::mdlVerBacklogDetalleInfra(3);

        $listaBacklog = array();

        $fechaActual = new DateTime(date('Y-m-d'));
        $fechaFinal = new DateTime(BacklogModelo::mdlBacklogFechaFinal(3)['ultima_fecha']);


        $fechaPuntero = $fechaActual;
        $mesPuntero = 1;

        //$final = date("Y-m-d", strtotime("+1 month", $time));

        while ($fechaPuntero<$fechaFinal):
            $sumaMes = 0;
            foreach ($resu as $row):
                if($row['restante_meses'] >= $mesPuntero && $row['restante_meses']!= 0):
                    $sumaMes = $sumaMes + $row['mensual'];
                endif;
            endforeach;

            $a = array(
                'mes' => $fechaPuntero->format('m-Y'),
                'total_mensual' => $sumaMes
            );

            $listaBacklog[] = $a;


            // Suma 1 Mes a la fecha puntero (hasta que llegue a la fechaFinal)
            $day = $fechaPuntero->format('j');
            $fechaPuntero->modify('first day of +1 month');
            $fechaPuntero->modify('+' . (min($day, $fechaPuntero->format('t')) - 1) . ' days');
            // SUma 1 al mes de comparacion del campo '$row['restante_meses']'
            $mesPuntero++;
        endwhile;

        return $listaBacklog;
    }


    public static function ctrVerBackloVentaAdjudicada($op)
    {
        $resu = self::ctrVerBacklogGrafico($op);

        $listaBacklog = array();

        $anoInicial = new DateTime(date('Y-m-d'));
       // $anoInicial = new DateTime(date('2021-01-01')); // ****** -> Cambio solicitado por Agustin (Temporal)
        //$anoFinal = new DateTime(BacklogModelo::mdlBacklogFechaFinal()['ultima_fecha']);
        $anoPuntero = (int)$anoInicial->format('Y');
        $sumaAno = 0;

        foreach ($resu as $row)
        {
            $fechaCompara = new DateTime('1-'.$row['mes']);

            if ($fechaCompara->format('Y') == $anoPuntero):
                $sumaAno = $sumaAno + $row['total_mensual'];
            else:
                $a = array(
                    'ano' => $anoPuntero,
                    'total_anual' => $sumaAno
                );
                $listaBacklog[] = $a;
                $anoPuntero++;
                $sumaAno = 0;
                $sumaAno = $sumaAno + $row['total_mensual'];
            endif;
        }
        // agrega el ultimo año al array
        $a = array(
            'ano' => $anoPuntero,
            'total_anual' => $sumaAno
        );
        $listaBacklog[] = $a;

        return $listaBacklog;
    }

    public static function ctrVerBackloVentaAdjudicadaInf()
    {
        $resu = self::ctrVerBacklogGraficoInf();

        $listaBacklog = array();

        $anoInicial = new DateTime(date('Y-m-d'));
        //$anoFinal = new DateTime(BacklogModelo::mdlBacklogFechaFinal()['ultima_fecha']);
        $anoPuntero = (int)$anoInicial->format('Y');
        $sumaAno = 0;

        foreach ($resu as $row)
        {
            $fechaCompara = new DateTime('1-'.$row['mes']);

            if ($fechaCompara->format('Y') == $anoPuntero):
                $sumaAno = $sumaAno + $row['total_mensual'];
            else:
                $a = array(
                    'ano' => $anoPuntero,
                    'total_anual' => $sumaAno
                );
                $listaBacklog[] = $a;
                $anoPuntero++;
                $sumaAno = 0;
                $sumaAno = $sumaAno + $row['total_mensual'];
            endif;
        }
        // agrega el ultimo año al array
        $a = array(
            'ano' => $anoPuntero,
            'total_anual' => $sumaAno
        );
        $listaBacklog[] = $a;

        return $listaBacklog;
    }

}
