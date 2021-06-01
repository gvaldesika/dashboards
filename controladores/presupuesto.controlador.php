<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/presupuesto.modelo.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/comprobantes.modelo.php';

class PresupuestoControlador
{




    public function ctrInsertarPresupuestos($fila)
    {
        try {
            $res = PresupuestoModelo::mdlInsertarPresupuesto($fila);
        }catch (Exception $e)
        {
            return $e->getMessage();
        }
    }




    public static function ctrVerPresupuesto($ano,$tipo)
       {
        $res = PresupuestoModelo::mdlVerPresupuesto($ano,$tipo);
        return $res;
        }


        // Muestra el detalle del presupuesto por CCO y lo compara con las ventas del CCO
    public static function ctrVerPresupuestoDetalle($ano,$un)
    {
        $res = PresupuestoModelo::mdlVerPresupDetalle($ano,$un);

        $lista = array();

        foreach ($res as $row)
        {
            $enero = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,1,$row['CCO'])['sum'];
            $febrero = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,2,$row['CCO'])['sum'];
            $marzo = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,3,$row['CCO'])['sum'];
            $abril = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,4,$row['CCO'])['sum'];
            $mayo = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,5,$row['CCO'])['sum'];
            $junio = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,6,$row['CCO'])['sum'];
            $julio = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,7,$row['CCO'])['sum'];
            $agosto = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,8,$row['CCO'])['sum'];
            $septiembre = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,9,$row['CCO'])['sum'];
            $octubre = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,10,$row['CCO'])['sum'];
            $noviembre = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,11,$row['CCO'])['sum'];
            $diciembre = ComprobantesModelo::mdlObtenerIngresosMesDetalleCCO($ano,12,$row['CCO'])['sum'];




            $_1 = array(
                'mes' => 'Enero',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Enero'],
                'real' => isset($enero) ? $enero : '0'
            );
            $_2 = array(
                'mes' => 'Febrero',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Febrero'],
                'real' => isset($febrero) ? $febrero : '0'
            );
            $_3 = array(
                'mes' => 'Marzo',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Marzo'],
                'real' => isset($marzo) ? $marzo : '0'
            );

            $_4 = array(
                'mes' => 'Abril',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Abril'],
                'real' => isset($abril) ? $abril : '0'
            );
            $_5 = array(
                'mes' => 'Mayo',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Mayo'],
                'real' => isset($mayo) ? $mayo : '0'
            );
            $_6 = array(
                'mes' => 'Junio',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Junio'],
                'real' => isset($junio) ? $junio : '0'
            );
            $_7 = array(
                'mes' => 'Julio',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Julio'],
                'real' => isset($julio) ? $julio : '0'
            );
            $_8 = array(
                'mes' => 'Agosto',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Agosto'],
                'real' => isset($agosto) ? $agosto : '0'
            );
            $_9 = array(
                'mes' => 'Septiembre',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Septiembre'],
                'real' => isset($septiembre) ? $septiembre : '0'
            );
            $_10 = array(
                'mes' => 'Octubre',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Octubre'],
                'real' => isset($octubre) ? $octubre : '0'
            );
            $_11 = array(
                'mes' => 'Noviembre',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Noviembre'],
                'real' => isset($noviembre) ? $noviembre : '0'
            );
            $_12 = array(
                'mes' => 'Diciembre',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestado' =>$row['Diciembre'],
                'real' => isset($diciembre) ? $diciembre : '0'
            );
            $totalAnualCCO = array(
                'mes' => 'total',
                'cco' => $row['CCO'],
                'nombre_cco' => $row['Nombre_CCO'],
                'tipo' => $row['Tipo'],
                'presupuestadoTotal' =>$_1['presupuestado']+$_2['presupuestado']+$_3['presupuestado']+$_4['presupuestado']+$_5['presupuestado']+$_6['presupuestado']+$_7['presupuestado']
            +$_8['presupuestado']+$_9['presupuestado']+$_10['presupuestado']+$_11['presupuestado']+$_12['presupuestado'],
                'realTotal' => $_1['real']+$_2['real']+$_3['presupuestado']+$_4['real']+$_5['real']+$_6['real']+$_7['real']
                    +$_8['real']+$_9['real']+$_10['real']+$_11['real']+$_12['real']


            );

            $anual = [$_1,$_2,$_3,$_4,$_5,$_6,$_7,$_8,$_9,$_10,$_11,$_12,$totalAnualCCO];
            $lista[] = $anual;
        }
        return $lista;
    }


// SIn Utilizar
    public static function ctrObtenerPresupuestoAcumuladoCCO($ano,$tipo,$mes)
    {
        $sumAcumulado = 0;
        $lista = array();
        $totalPresup = PresupuestoModelo::mdlTotalPresup($ano,$tipo);

        $tmp = PresupuestoModelo::mdlObtenerPresupuestoCCO($ano,$tipo,$mes);
        foreach ($tmp as $row)
        {
            $a = array(
                'CCO' => $row['CCO'],
                'nomCCO' => $row['Nombre_CCO'],
                'acumulado' => $row['acumulado'],
                'total' => $row['total'],
                'porc' =>  ($row['acumulado']*100)/$totalPresup[0],
                'cliente' => $row['Analisis_Texto_1'],
                'zona' => $row['Analisis_Texto_2'],
                'industria' => $row['Analisis_Texto_3']
            );
            $lista[]=$a;

        }


        /*for($i = 1 ;$i<=$mes; $i++)
        {
            $resultado = PresupuestoModelo::mdlObtenerPresupuestoCCO($ano,$i,$tipo);
            $sumAcumulado = $sumAcumulado + $resultado['sum'];

            $a = array(
                'mes' => nroaMes($i),
                'valor' => $sumAcumulado,
                'mesNro' => $i,
                'tipo' => $tipo,
                'cco' => re
            );

            $lista[] = $a;
        }*/
        return $lista;
    }









}
