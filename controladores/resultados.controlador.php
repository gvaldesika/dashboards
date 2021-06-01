<?php
require_once 'modelos/resultados.modelo.php';
class ResultadosControlador
{


    public static function ctrObtenerInformeAnualFila($idInforme, $periodo)
    {
        $informe = array(
            'Ingresos de Explotación' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Ingresos de Explotación'),
            'Costo Directo' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Costo Directo'),
            'Margen de Contribución' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Margen de Contribución'),
            '% Margen de Contrigución (%)' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'% Margen de Contrigución (%)'),
            'Venta / Costo Directo' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Venta / Costo Directo'),
            'Gastos de Adm. Y Ventas' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Gastos de Adm. Y Ventas'),
            '% Gastos de Centas / Ingresos (%)' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'% Gastos de Centas / Ingresos (%)'),
            'Resultado Operacional' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Resultado Operacional'),
            'Otros Ingresos' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Otros Ingresos'),
            'Otros Egresos' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Otros Egresos'),
            'Gastos Financieros' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Gastos Financieros'),
            'Corección Monetaria' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Corección Monetaria'),
            'Resultado No Operacional' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Resultado No Operacional'),
            'Resultado Antes de Impuestos' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Resultado Antes de Impuestos'),
            'Impuesto Renta' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Impuesto Renta'),
            'Resultado Desp. Impuestos' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'Resultado Desp. Impuestos'),
            'EBITDA' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'EBITDA'),
            '% EBITDA / Ingresos (%)' => ResultadosModelo::mdlObtenerInformeAnualFila($idInforme,$periodo,'% EBITDA / Ingresos (%)')
        );

        return $informe;

    }


    public static function ctrObtenerInformeAnualColumna($idInforme, $periodo)
    {
        $consolidado = array();

        for ($i=1;$i<=12;$i++)
        {
            $mes = ResultadosModelo::mdlObtenerInformeMensual($idInforme,$periodo,$i);

            $ingresos = (int)$mes[0]['valor'];
            $costo  = (int)$mes[1]['valor'];
            $margenContrib  = (int)$mes[2]['valor'];
            $margenContribPorc  = (double)$mes[3]['valor']/100;
            $ventasCosto  = (double)$mes[4]['valor'];

            $gav  = (int)$mes[5]['valor'];
            $gavIngresos  = ((double)$mes[6]['valor']/100)*-1;
            $resuOp  = (int)$mes[7]['valor'];
            $otrosIngresos  = (int)$mes[8]['valor'];
            $otrosEgresos  = (int)$mes[9]['valor'];
            $gastosFinc  = (int)$mes[10]['valor'];
            $corrMonetaria  = (int)$mes[11]['valor'];
            $resuNoOp  = (int)$mes[12]['valor'];
            $resuAntesImpuestos  = (int)$mes[13]['valor'];
            $impuestoRenta  = (int)$mes[14]['valor'];
            $resuDespuesImpuestos  = (int)$mes[15]['valor'];
            $ebitda  = (int)$mes[16]['valor'];
            $ebitdaPorc  = (double)$mes[17]['valor']/100;



            $a = array(
                'ingresos' =>$ingresos,
                'costo' => $costo,
                'margenContrib' => $margenContrib,
                'margenContribPorc' => $margenContribPorc,
                'ventasCosto' => $ventasCosto,
                'gav' => $gav,
                'gavIngresos' => $gavIngresos,
                'resuOp' => $resuOp,
                'otrosIngresos' => $otrosIngresos,
                'otrosEgresos' => $otrosEgresos,
                'gastosFinc' => $gastosFinc,
                'corrMonetaria' => $corrMonetaria,
                'resuNoOp' => $resuNoOp,
                'resuAntesImpuestos' => $resuAntesImpuestos,
                'impuestoRenta' => $impuestoRenta,
                'resuDespuesImpuestos' => $resuDespuesImpuestos,
                'ebitda' => $ebitda,
                'ebitdaPorc' =>$ebitdaPorc
            );
            $consolidado[] = $a;


        }
        return $consolidado;
    }


}