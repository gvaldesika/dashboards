<?php
require_once 'Conexion.php';
class AuxiliaresModelo
{

// Convierte el ID de uyn centro de costo y devuelve su nombre;
    public static function mdlCCOaNombre($cco)
    {

        try {

            $stmt = Conexion::conectar()->prepare('select nombre_cco from dm_centro_de_costo
where "codigo_empresa_eugcom" = \'0000100001\' and "codigo_cco"= :cco');


            $stmt->bindParam(":cco", $cco, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }


    public static function mdlVerTodosCCO()
    {
        try {

            $stmt = Conexion::conectar()->prepare('select * from dm_centro_de_costo
where "codigo_empresa_eugcom" = \'0000100001\'
order by codigo_cco asc');

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }

    }

    /**
     * Muestra solo los CCO Operacionales (< a 523)
     * @return array
     */
    public static function mdlVerTodosCCOOperacionales()
    {
        try {

            $stmt = Conexion::conectar()->prepare('select * from dm_centro_de_costo
where "codigo_empresa_eugcom" = \'0000100001\' and codigo_cco >= 523 and codigo_cco not in (524,531)
order by codigo_cco asc');

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }

    }



    public static function mdlVerUltimaActualizacion()
    {
        try {

            $stmt = Conexion::conectar()->prepare('select * from sys_actualizacion');

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }

    }


    /**
     * Obtiene el valor de los indicadores diarios (UF, UTM y Dolar)
     * @param $fecha
     * @return mixed
     */
    public static function mdlObtenerIndicadorDiario($fecha)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM `appika_fi_valores_historico` where Fecha_ValHist = :fecha');
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }

    }

    /**
     * Permite obtener un arreglo con el valor del dolar por cada mes. (Se toma para cada mes, el valor del 1er día del siguente mes).
     * Este caclculo se utiliza en informe de Maquinaria $USD
     * @param $ano
     * @return array
     */
    public static function mdlObtenerValorDolar($ano)
    {
        try {

            $stmt = Conexion::conectar()->prepare('select
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-01-01 00:00:00\'::date) + interval \'1 month\') as Enero,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-02-01 00:00:00\'::date) + interval \'1 month\') as Febrero,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-03-01 00:00:00\'::date) + interval \'1 month\') as Marzo,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-04-01 00:00:00\'::date) + interval \'1 month\') as Abril,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-05-01 00:00:00\'::date) + interval \'1 month\') as Mayo,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-06-01 00:00:00\'::date) + interval \'1 month\') as Junio,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-07-01 00:00:00\'::date) + interval \'1 month\') as Julio,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-08-01 00:00:00\'::date) + interval \'1 month\') as Agosto,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-09-01 00:00:00\'::date) + interval \'1 month\') as Septiembre,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-10-01 00:00:00\'::date) + interval \'1 month\') as Octubre,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-11-01 00:00:00\'::date) + interval \'1 month\') as Noviembre,
(SELECT 
ind.dolar
from aux_indicadores_economicos ind
where ind.fecha = date_trunc(\'month\', \''.$ano.'-12-01 00:00:00\'::date) + interval \'1 month\') as Diciembre');

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }

    }















}