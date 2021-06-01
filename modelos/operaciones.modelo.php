<?php
require_once 'Conexion.php';

class OperacionesModelo
{


    public static function mdlIndicadorPrevencion($ano,$listaTipo,$listaCentroCostos)
    {        try {

        $listaT = '';
        foreach ($listaTipo as $row) {
            $listaT .= "'" . $row . "',";
        }

        $listaCCO = '';
        foreach ($listaCentroCostos as $row) {
            $listaCCO .= "'" . $row . "',";
        }

        $stmt = Conexion::conectar()->prepare('
        select
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=1 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "1",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=2 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "2",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=3 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "3",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=4 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "4",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=5 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "5",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=6 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "6",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=7 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "7",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=8 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "8",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=9 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "9",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=10 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "10",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=11 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "11",
(SELECT "count"(nro_incidente) FROM "he_incidentes" where clasificacion_evento in ('.substr($listaT, 0, -1).') and ano = :ano and mes=12 and codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "12"

');

        $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->fetch();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    }

    /**
     * Devuelve el promedio de disponibilidad de los equipos esociados a los CCO especificados
     * @param $ano
     * @param $listaCentroCostos
     * @return array|string
     */
    public static function mdlPorcDisponibilidad($ano,$listaCentroCostos)
    {        try {



        $listaCCO = '';
        foreach ($listaCentroCostos as $row) {
            $listaCCO .= "'" . $row . "',";
        }

        $stmt = Conexion::conectar()->prepare('
        select
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=1 and cco in ('.substr($listaCCO, 0, -1).')) as "1",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=2 and cco in ('.substr($listaCCO, 0, -1).')) as "2",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=3 and cco in ('.substr($listaCCO, 0, -1).')) as "3",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=4 and cco in ('.substr($listaCCO, 0, -1).')) as "4",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=5 and cco in ('.substr($listaCCO, 0, -1).')) as "5",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=6 and cco in ('.substr($listaCCO, 0, -1).')) as "6",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=7 and cco in ('.substr($listaCCO, 0, -1).')) as "7",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=8 and cco in ('.substr($listaCCO, 0, -1).')) as "8",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=9 and cco in ('.substr($listaCCO, 0, -1).')) as "9",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=10 and cco in ('.substr($listaCCO, 0, -1).')) as "10",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=11 and cco in ('.substr($listaCCO, 0, -1).')) as "11",
(SELECT round(avg(porc_disponibilidad)) FROM "he_disponibilidad_formateada" where ano=:ano and mes=12 and cco in ('.substr($listaCCO, 0, -1).')) as "12"
');

        $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->fetch();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    }


    /**
     * Obtiene el promedio de la producción (para un tipo de equipo,CCO y unidad de medida especificados)
     * @param $ano
     * @param $listaEquipos
     * @param $listaCentroCostos
     * @param $listaUm
     * @return array|string
     */
    public static function mdlObtenerPromProduccion($ano,$listaEquipos,$listaCentroCostos,$listaUm)
    {        try {

        $listaE = '';
        foreach ($listaEquipos as $row) {
            $listaE .= "'" . $row . "',";
        }

        $listaCCO = '';
        foreach ($listaCentroCostos as $row) {
            $listaCCO .= "'" . $row . "',";
        }

        $listaU = '';
        foreach ($listaUm as $row) {
            $listaU .= "'" . $row . "',";
        }

        $stmt = Conexion::conectar()->prepare('
        select
(select sum(cantidad) from he_reports where ano = :ano and mes = 1 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "1",
(select sum(cantidad) from he_reports where ano = :ano and mes = 2 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "2",
(select sum(cantidad) from he_reports where ano = :ano and mes = 3 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "3",
(select sum(cantidad) from he_reports where ano = :ano and mes = 4 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "4",
(select sum(cantidad) from he_reports where ano = :ano and mes = 5 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "5",
(select sum(cantidad) from he_reports where ano = :ano and mes = 6 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "6",
(select sum(cantidad) from he_reports where ano = :ano and mes = 7 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "7",
(select sum(cantidad) from he_reports where ano = :ano and mes = 8 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).'))as "8",
(select sum(cantidad) from he_reports where ano = :ano and mes = 9 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "9",
(select sum(cantidad) from he_reports where ano = :ano and mes = 10 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "10",
(select sum(cantidad) from he_reports where ano = :ano and mes = 11 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "11",
(select sum(cantidad) from he_reports where ano = :ano and mes = 12 and "Cod. CCO" in ('.substr($listaCCO, 0, -1).') and "Tipo Veh." in ('.substr($listaE, 0, -1).') and um in ('.substr($listaU, 0, -1).')) as "12"
');
        $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->fetch();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    }


    public static function mdlObtenerTotCombustible($ano,$listaEquipos,$listaCentroCostos)
    {        try {

        $listaE = '';
        foreach ($listaEquipos as $row) {
            $listaE .= "'" . $row . "',";
        }

        $listaCCO = '';
        foreach ($listaCentroCostos as $row) {
            $listaCCO .= "'" . $row . "',";
        }


        $stmt = Conexion::conectar()->prepare('
        select
(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 1 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "1",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 2 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "2",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 3 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "3",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 4 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "4",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 5 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "5",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 6 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "6",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 7 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "7",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 8 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "8",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 9 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "9",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 10 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "10",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 11 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "11",

(SELECT "sum"(cm.litros) FROM "dm_combustible" cm 
INNER JOIN dm_equipos eq on eq.codigo_vehiculo = cm.codigo_equipos
WHERE date_part(\'year\', cm."Fecha Carga") = :ano and date_part(\'month\',  cm."Fecha Carga") = 12 and eq.tipo_vehiculo in ('.substr($listaE, 0, -1).') and cm.codigo_centro_costo in ('.substr($listaCCO, 0, -1).')) as "12"
');
        $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->fetch();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    }






}