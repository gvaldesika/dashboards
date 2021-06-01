<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/Conexion.php';

/**
 * Permite operaciones en la tabla dash_inf_cargos
 * Class CargosModelo
 */
class CargosModelo
{

    public static function insertarFilas($fila)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('insert into dash_inf_cargos (periodo,mes,cco,nom_cco,cargo,empresa, rut, nombre, ap_paterno, ap_materno) values (:periodo,:mes,:cco,:nom_cco,:cargo,:empresa,:rut,:nombre,:appaterno,:apmaterno)');

            $stmt->bindParam(":periodo", $fila['periodo'], PDO::PARAM_STR);
            $stmt->bindParam(":mes", $fila['mes'], PDO::PARAM_STR);
            $stmt->bindParam(":cco", $fila['cco'], PDO::PARAM_STR);
            $stmt->bindParam(":nom_cco", $fila['nom_cco'], PDO::PARAM_STR);
            $stmt->bindParam(":cargo", $fila['cargo'], PDO::PARAM_STR);
            $stmt->bindParam(":empresa", $fila['empresa'], PDO::PARAM_STR);


            $stmt->bindParam(":rut", $fila['rut'], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $fila['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":appaterno", $fila['appaterno'], PDO::PARAM_STR);
            $stmt->bindParam(":apmaterno", $fila['apmaterno'], PDO::PARAM_STR);


            if ($stmt->execute())
            {
                return 'ok';
            }else
            {
                return $stmt->errorInfo();
                //   return 'fallo';
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }


    public static function mdlverHeadCount($periodo,$mes,$cco)
    {
        try {
            $lista = '';
            foreach ($cco as $row) {
                $lista .= "'" . $row . "',";
            }

            $stmt = Conexion::conectarGoDaddy()->prepare('select periodo,mes,nom_cco,cargo,cco,COUNT(Cargo) as cantidad from dash_inf_cargos
where periodo = :periodo and mes = :mes and 
      nom_cco in ('.substr($lista, 0, -1).')
GROUP BY nom_cco,cargo,cco
order by mes,cargo,cco asc');
            $stmt->bindParam(":periodo", $periodo, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    /**
     * Muestra los trabajadores de un cargo especifico (para un periodo, mes y cco especificados)
     * @param $periodo
     * @param $mes
     * @param $cco
     * @param $cargo
     * @return array|string
     */

    public static function mdlverHeadCountTrabajadores($periodo,$mes,$cco,$cargo)
    {
        try {
            $lista = '';
            foreach ($cco as $row) {
                $lista .= "'" . $row . "',";
            }
            $stmt = Conexion::conectarGoDaddy()->prepare('select rut,nombre,ap_paterno,ap_materno,cargo  from dash_inf_cargos
where periodo = :periodo and mes = :mes and nom_cco in ('.substr($lista, 0, -1).') and cargo = :cargo
order by mes,cargo,cco asc');
            $stmt->bindParam(":periodo", $periodo, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":cargo", $cargo, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }


    /**
     * Muestra los CCO Disponibles para filtrar (utilizados en filtros)
     * @return array
     */
    public static function mdlverCCO()
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select nom_cco from dash_inf_cargos
GROUP BY nom_cco order by nom_cco asc');
           $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    /**
     * Muestra los Periodos sincronizados con talana (contratos)
     * @return array
     */
    public static function mdlverPeriodos()
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select periodo,mes from dash_inf_cargos
GROUP BY periodo,mes
order by periodo,mes asc');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }

    /**
     * Muestra los Periodos sincronizados con talana (contratos) - Muestra solo los años (para ser usados en combobox)
     * @return array
     */
    public static function mdlverPeriodosAno()
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select periodo from dash_inf_cargos
GROUP BY periodo
order by periodo asc');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }






    public static function mdlVerHeadCountAnual($periodo)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select * from dash_inf_headcount where periodo = :periodo');
            $stmt->bindParam(":periodo", $periodo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }

}
