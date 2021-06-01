<?php
require_once 'Conexion.php';
class ResultadosModelo
{

    public static function mdlObtenerInformeAnual($idInforme,$periodo)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo
order by mes,orden asc');
            $stmt->bindParam(":id", $idInforme, PDO::PARAM_STR);
            $stmt->bindParam(":periodo", $periodo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }

    public static function mdlObtenerInformeMensual($idInforme,$periodo,$mes)
    {
        try {


            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and mes = :mes
order by mes,orden asc');
            $stmt->bindParam(":id", $idInforme, PDO::PARAM_STR);
            $stmt->bindParam(":periodo", $periodo, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return  $e->getMessage();
        }
    }

    /**
     * Obtiene los valores anuales para un concepto determinado (en formato de una fila)
     * @param $idInforme
     * @param $periodo
     * @return array
     */
    public static function mdlObtenerInformeAnualFila($idInforme,$periodo, $concepto)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 1
order by mes,orden asc),0) as \'Enero\',

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 2
order by mes,orden asc),0) as \'Febrero\',


IFNULL((SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 3
order by mes,orden asc),0) as \'Marzo\',

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 4
order by mes,orden asc),0) as \'Abril\',

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 5
order by mes,orden asc),0) as \'Mayo\',

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 6
order by mes,orden asc),0) as \'Junio\',

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 7
order by mes,orden asc),0) as \'Julio\',

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 8
order by mes,orden asc),0) as \'Agosto\',

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 9
order by mes,orden asc),0) as \'Septiembre\',

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 10
order by mes,orden asc),0) as \'Octubre\',

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 11
order by mes,orden asc),0) as \'Noviembre\',

IFNULL((
SELECT valor FROM `dash_resultados_publicados` where id_informe= :id and periodo = :periodo and nombre = :concepto and mes = 12
order by mes,orden asc),0) as \'Diciembre\'
');
            $stmt->bindParam(":id", $idInforme, PDO::PARAM_STR);
            $stmt->bindParam(":periodo", $periodo, PDO::PARAM_STR);
            $stmt->bindParam(":concepto", $concepto, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


}
