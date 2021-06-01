<?php

require_once 'Conexion.php';

class FinancieroModelo
{

    // Funciones Informes "Consolidados"




    // Funciones Informes "Consolidados"





/*
    public static function mdlVerCuentaGasto($ano,$mes,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {        try {

        $listaCuentas = '';
        foreach ($listaCuentaGastos as $row) {
            $listaCuentas .= "'" . $row . "',";
        }

        $listaCCO = '';
        foreach ($listaCentroCostos as $row) {
            $listaCCO .= "'" . $row . "',";
        }

        $listaEmpresas = '';
        foreach ($listaEmpresasEugcom as $row) {
            $listaEmpresas .= "'" . $row . "',";
        }


        $stmt = Conexion::conectar()->prepare('select sum(saldo) from he_comprobantes_contables where ano_proceso=:ano and mesfecha=:mes
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')');

        $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
        $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->fetch();
        return $stmt->fetch();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    }
*/
    public static function mdlVerCuentaGastoAnualv2($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {        try {

        $listaCuentas = '';
        foreach ($listaCuentaGastos as $row) {
            $listaCuentas .= "'" . $row . "',";
        }

        $listaCCO = '';
        foreach ($listaCentroCostos as $row) {
            $listaCCO .= "'" . $row . "',";
        }

        $listaEmpresas = '';
        foreach ($listaEmpresasEugcom as $row) {
            $listaEmpresas .= "'" . $row . "',";
        }


        $stmt = Conexion::conectar()->prepare('select
COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 1
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "1",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 2
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "2",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 3
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "3",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 4
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "4",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 5
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "5",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 6
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "6",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 7
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "7",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 8
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "8",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 9
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "9",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 10
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "10",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 11
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "11",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 12
and cuentas_de_gastos in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "12"
');
// nota
        $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->fetch();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    }


    public static function mdlVerEstadoResultado($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {        try {

        $listaCuentas = '';
        foreach ($listaCuentaGastos as $row) {
            $listaCuentas .= "'" . $row . "',";
        }

        $listaCCO = '';
        foreach ($listaCentroCostos as $row) {
            $listaCCO .= "'" . $row . "',";
        }

        $listaEmpresas = '';
        foreach ($listaEmpresasEugcom as $row) {
            $listaEmpresas .= "'" . $row . "',";
        }


        $stmt = Conexion::conectar()->prepare('select
COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 1
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "1",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 2
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "2",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 3
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "3",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 4
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "4",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 5
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "5",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 6
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "6",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 7
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "7",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 8
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "8",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 9
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "9",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 10
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "10",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 11
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "11",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 12
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "12"
');
// nota
        $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->fetch();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    }

    public static function mdlVerEstadoResultadoGAV($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {        try {

        $listaCuentas = '';
        foreach ($listaCuentaGastos as $row) {
            $listaCuentas .= "'" . $row . "',";
        }

        $listaCCO = '';
        foreach ($listaCentroCostos as $row) {
            $listaCCO .= "'" . $row . "',";
        }

        $listaEmpresas = '';
        foreach ($listaEmpresasEugcom as $row) {
            $listaEmpresas .= "'" . $row . "',";
        }


        $stmt = Conexion::conectar()->prepare('select
COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 1
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "1",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 2
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "2",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 3
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "3",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 4
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "4",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 5
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "5",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 6
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "6",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 7
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "7",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 8
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "8",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 9
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "9",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 10
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "10",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 11
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "11",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 12
and estado_de_resultados in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo not in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),null) as "12"
');
// nota
        $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->fetch();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    }

    /**
     * Muestra la suma de una (o varias) cuentas especificadas
     *
     * @param $ano
     * @param $listaCuentaGastos
     * @param $listaCentroCostos
     * @param $listaEmpresasEugcom
     * @return array|string
     */
    public static function mdlVerCosto($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {        try {

        $listaCuentas = '';
        foreach ($listaCuentaGastos as $row) {
            $listaCuentas .= "'" . $row . "',";
        }

        $listaCCO = '';
        foreach ($listaCentroCostos as $row) {
            $listaCCO .= "'" . $row . "',";
        }

        $listaEmpresas = '';
        foreach ($listaEmpresasEugcom as $row) {
            $listaEmpresas .= "'" . $row . "',";
        }


        $stmt = Conexion::conectar()->prepare('select
COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 1
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "1",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 2
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "2",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 3
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "3",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 4
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "4",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 5
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "5",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 6
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "6",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 7
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "7",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 8
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "8",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 9
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "9",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 10
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "10",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 11
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "11",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 12
and descripcion_cuenta not in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "12"
');

        $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->fetch();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    }


    public static function mdlVerCostov2($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {        try {

        $listaCuentas = '';
        foreach ($listaCuentaGastos as $row) {
            $listaCuentas .= "'" . $row . "',";
        }

        $listaCCO = '';
        foreach ($listaCentroCostos as $row) {
            $listaCCO .= "'" . $row . "',";
        }

        $listaEmpresas = '';
        foreach ($listaEmpresasEugcom as $row) {
            $listaEmpresas .= "'" . $row . "',";
        }


        $stmt = Conexion::conectar()->prepare('select
COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 1
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "1",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 2
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "2",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 3
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "3",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 4
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "4",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 5
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "5",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 6
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "6",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 7
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "7",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 8
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "8",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 9
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "9",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 10
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "10",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 11
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "11",

COALESCE((select sum(saldo) from he_comprobantes_contables where ano_proceso= :ano and mesfecha = 12
and descripcion_cuenta in ('.substr($listaCuentas, 0, -1).')
and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')
and codigo_he in ('.substr($listaEmpresas, 0, -1).')
GROUP BY mesfecha),0) as "12"
');

        $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->fetch();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    }










    //Calculos GAV Obras

    public static function mdlProrrateoGAVObras($ano,$mes,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
\'gav\' as categ,
sum(saldo)
FROM '.$tabla.'
WHERE
descripcion_cuenta not in (\'ARRIENDO MAQUINARIAS\',\'ARRIENDO MAQUINARIAS PROPIA\',\'CORR. MONETARIA PASIVOS\',\'CORR.MONETARIA ACTIVOS\',
\'CORR.MONETARIA LEASING\',\'COSTO VENTA ACTIVO FIJO\',\'GASTOS BANCARIOS\',\'IMPUESTO RENTA\',\'INDEMNIZACIONES POR SINIESTRO\',\'INGRESOS ARRIENDO INMUEBLES\',
\'INGRESOS SS. MAQUINARIAS\',\'INTERESES\',\'INTERESES GANADOS\',\'INTERESES LEASING\',\'OTROS INGRESOS DE EXPLOTACION\',\'OTROS INGRESOS FUERA DE EXPLOTACION\',
\'VENTA ACTIVO FIJO\')
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_he != \'0000100004\' and
codigo_centro_costo IN (10,15,20,21,22,23)');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }

    public static function mdlProrrateoGAVUN($ano,$mes,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
\'gav\' as categ,
sum(saldo)
FROM '.$tabla.'
WHERE
descripcion_cuenta not in (\'ARRIENDO MAQUINARIAS\',\'ARRIENDO MAQUINARIAS PROPIA\',\'CORR. MONETARIA PASIVOS\',\'CORR.MONETARIA ACTIVOS\',
\'CORR.MONETARIA LEASING\',\'COSTO VENTA ACTIVO FIJO\',\'GASTOS BANCARIOS\',\'IMPUESTO RENTA\',\'INDEMNIZACIONES POR SINIESTRO\',\'INGRESOS ARRIENDO INMUEBLES\',
\'INGRESOS SS. MAQUINARIAS\',\'INTERESES\',\'INTERESES GANADOS\',\'INTERESES LEASING\',\'OTROS INGRESOS DE EXPLOTACION\',\'OTROS INGRESOS FUERA DE EXPLOTACION\',
\'VENTA ACTIVO FIJO\')
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_he != \'0000100004\' and
codigo_centro_costo IN (18,19,25)');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }

    public static function mdlVerIngresosPeriodo($ano,$mes,$op,$tabla)
    {
        try {

            $sql = '';
            switch ($op)
            {
                case 7: // Mineria + Industrial
                    $stmt = Conexion::conectar()->prepare('SELECT 
                    sum(saldo)
                    FROM '.$tabla.'
                    WHERE
                    estado_de_resultados = \'Ingresos de Explotación\' 
                    and
                    ano_proceso = :ano and mesfecha = :mes
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534,536)
                    GROUP BY estado_de_resultados');
                    $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
                    $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
                    break;

                case 1: // Industrial
                    $stmt = Conexion::conectar()->prepare('SELECT 
                    sum(saldo)
                    FROM '.$tabla.'
                    WHERE
                    estado_de_resultados = \'Ingresos de Explotación\' 
                    and
                    ano_proceso = :ano and mesfecha = :mes
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (525,526,527,529,530,536)
                    GROUP BY estado_de_resultados');
                    $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
                    $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
                    break;

                case 6: // Mineria
                    $stmt = Conexion::conectar()->prepare('SELECT 
                    sum(saldo)
                    FROM '.$tabla.'
                    WHERE
                    estado_de_resultados = \'Ingresos de Explotación\' 
                    and
                    ano_proceso = :ano and mesfecha = :mes
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (528,532,533,534)
                    GROUP BY estado_de_resultados');
                    $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
                    $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
                    break;

                case 3: // Infraestructura
                    $stmt = Conexion::conectar()->prepare('SELECT 
                    sum(saldo)
                    FROM '.$tabla.'
                    WHERE
                    estado_de_resultados = \'Ingresos de Explotación\' 
                    and
                    ano_proceso = :ano and mesfecha = :mes
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (535,537,538)
                    GROUP BY estado_de_resultados');
                    $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
                    $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
                    break;

                case null; // Todas las empresas
                    $stmt = Conexion::conectar()->prepare('SELECT 
                        sum(saldo)
                        FROM '.$tabla.'
                        WHERE
                        estado_de_resultados = \'Ingresos de Explotación\' 
                        and
                        fecha BETWEEN :finicio and :ffin
                        and
                        codigo_centro_costo != 50                        
                        GROUP BY estado_de_resultados ');

                    $stmt->bindParam(":finicio", $fechaInicio, PDO::PARAM_STR);
                    $stmt->bindParam(":ffin", $fechaFin, PDO::PARAM_STR);
                    break;

                default: //Codigo Empresa
                    $stmt = Conexion::conectar()->prepare('SELECT 
                        sum(saldo)
                        FROM '.$tabla.'
                        WHERE
                        estado_de_resultados = \'Ingresos de Explotación\' 
                        and
                        fecha BETWEEN :finicio and :ffin
                        and
                        codigo_centro_costo != 50 and
                        codigo_he = :empresa
                        GROUP BY estado_de_resultados ');

                    $stmt->bindParam(":finicio", $fechaInicio, PDO::PARAM_STR);
                    $stmt->bindParam(":ffin", $fechaFin, PDO::PARAM_STR);
                    $stmt->bindParam(":empresa", $op, PDO::PARAM_STR);
                    break;

            }


            $stmt->execute();
            return $stmt->fetch();


            $stmt->execute();
            return $stmt->fetch();






        } catch (Exception $e) {

        }
    }

    //Calculos GAV Obras



// Calculos Ingresos de Maquinarias

    public static function mdlVerIngresosFijos($ano)
    {
        try {

            $stmt = Conexion::conectar()->prepare('select
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =1) as "1",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =2) as "2",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =3) as "3",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =4) as "4",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =5) as "5",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =6) as "6",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =7) as "7",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =8) as "8",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =9) as "9",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =10) as "10",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =11) as "11",
(SELECT round(sum(costo_fijo)) FROM "he_arriendo_equipos" where ano = :ano and mes =12) as "12"
       
');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }

    }

    public static function mdlVerIngresosVariables($ano)
    {
        try {

            $stmt = Conexion::conectar()->prepare('select
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =1) as "1",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =2) as "2",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =3) as "3",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =4) as "4",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =5) as "5",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =6) as "6",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =7) as "7",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =8) as "8",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =9) as "9",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =10) as "10",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =11) as "11",
(SELECT round(sum(costo_variable)) FROM "he_arriendo_equipos" where ano = :ano and mes =12) as "12"

');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }

    }

    public static function mdlVerDescDisponibilidad($ano)
    {
        try {

            $stmt = Conexion::conectar()->prepare('select
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =1) as "1",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =2) as "2",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =3) as "3",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =4) as "4",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =5) as "5",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =6) as "6",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =7) as "7",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =8) as "8",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =9) as "9",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =10) as "10",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =11) as "11",
(SELECT round(sum(desc_disp)) FROM "he_arriendo_equipos" where ano = :ano and mes =12) as "12"       
');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }

    }


    // FIN Calculos Ingresos de Maquinarias



}

