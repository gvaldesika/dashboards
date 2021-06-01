<?php

require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/Conexion.php';
class AsistenciaModelo
{
    public static function mdlVerAsistencia($op,$fecha)
    {
        try {
            // Datos actuales
            $ano = date('Y');
            $semana = date('W');


            if ($op == -1)
            {
                $stmt = Conexion::conectarGoDaddy()->prepare('select * from dash_inf_asistencia where ano = :ano and semana = :semana ');
                $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
                $stmt->bindParam(":semana", $semana, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetchAll();
            }else
            {
                if (!is_null($fecha))
                {
                    $stmt = Conexion::conectarGoDaddy()->prepare('select * from dash_inf_asistencia where cco= :cco and ano = :ano and semana = :semana ');
                    $stmt->bindParam(":cco", $op, PDO::PARAM_STR);
                    $stmt->bindParam(":ano", $fecha[0], PDO::PARAM_STR);
                    $stmt->bindParam(":semana", $fecha[1], PDO::PARAM_STR);
                    $stmt->execute();
                    return $stmt->fetchAll();

                }else
                {

                    $stmt = Conexion::conectarGoDaddy()->prepare('select * from dash_inf_asistencia where cco= :cco and ano = :ano and semana = :semana ');
                    $stmt->bindParam(":cco", $op, PDO::PARAM_STR);
                    $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
                    $stmt->bindParam(":semana",$semana, PDO::PARAM_STR);
                    $stmt->execute();
                    return $stmt->fetchAll();
                }
            }

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    /**
     * Muestra los CCO disponibles (para mostrarlos en un dropDownBox)
     * @return array
     */
    public static function mdlVerCCO()
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select cco from dash_inf_asistencia GROUP BY cco order by cco asc');
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    /***
     * Devuelve una lista de los trabajadores con asistencia en una semana espcificada
     * @return array
     *
     */
    public static function mdlVerRutSemana($semana,$op)
    {
        try {
            if ($op == -1)
            {
                $stmt = Conexion::conectarGoDaddy()->prepare('Select rut from dash_inf_asistencia_det where semana = :semana GROUP BY rut');
                $stmt->bindParam(":semana", $semana, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetchAll();
            }
            else
            {
                $stmt = Conexion::conectarGoDaddy()->prepare('Select rut from dash_inf_asistencia_det where semana = :semana and cco = :cco GROUP BY rut');
                $stmt->bindParam(":semana", $semana, PDO::PARAM_STR);
                $stmt->bindParam(":cco", $op, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetchAll();
            }


        } catch (Exception $e) {

        }
    }


    /**
     * Muestra la asitencia semanal de un trabajador
     *
     * @param $rut
     * @param $semana
     * @return array
     */
    public static function mdlVerAsistSemana($semana,$rut)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('Select * from dash_inf_asistencia_det where semana = :semana and rut = :rut order by fecha asc');
            $stmt->bindParam(":semana", $semana, PDO::PARAM_STR);
            $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }




    /**
     * Muestras las semanas cargadas en la tabla dash_inf_asistencia
     * @return array
     */
    public static function mdlVeSemanas()
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select ano,semana from dash_inf_asistencia GROUP BY ano,semana order by ano desc');
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }

    public static function mdlVeSemanasDet()
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select YEAR(fecha) as ano ,semana from dash_inf_asistencia_det GROUP BY YEAR(fecha),semana order by YEAR(fecha) desc');
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    public static function mdlInsertarAsistencia($fila)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('insert into dash_inf_asistencia (ano,mes,semana,nombre,empresa,cco,trabajados,inasistencia
,licencia,vacaciones,hrs_trabajadas,hhee_50,hhee_100,atrasos,rut) values (:ano, :mes, :semana, :nombre , 
:empresa , :cco , :trabajados , :inasistencia , :licencia , :vacaciones, :hrs_trabajadas, :hhee_50, :hhee_100, :atrasos, :rut)');

            $stmt->bindParam(":ano", $fila['ano'], PDO::PARAM_STR);
            $stmt->bindParam(":mes", $fila['mes'], PDO::PARAM_STR);
            $stmt->bindParam(":semana", $fila['semana'], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $fila['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":empresa", $fila['empresa'], PDO::PARAM_STR);
            $stmt->bindParam(":cco", $fila['cco'], PDO::PARAM_STR);
            $stmt->bindParam(":trabajados", $fila['trabajados'], PDO::PARAM_STR);
            $stmt->bindParam(":inasistencia", $fila['inasistencia'], PDO::PARAM_STR);
            $stmt->bindParam(":licencia", $fila['licencia'], PDO::PARAM_STR);
            $stmt->bindParam(":vacaciones", $fila['vacaciones'], PDO::PARAM_STR);

            $stmt->bindParam(":hrs_trabajadas", $fila['hrs_trabajadas'], PDO::PARAM_STR);
            $stmt->bindParam(":hhee_50", $fila['hhee_50'], PDO::PARAM_STR);
            $stmt->bindParam(":hhee_100", $fila['hhee_100'], PDO::PARAM_STR);
            $stmt->bindParam(":atrasos", $fila['atrasos'], PDO::PARAM_STR);
            $stmt->bindParam(":rut", $fila['rut'], PDO::PARAM_STR);


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


    public static function mdlInsertarAsistenciaDetalle($fila)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('insert into dash_inf_asistencia_det values (:rut, :nombre, :empresa, :cco , 
:fecha , :semana , :turno ,:entrada ,:salida ,:atraso , :jornada, :he_entrada, :he_salida, :ausencia)');

            $stmt->bindParam(":rut", $fila['rut'], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $fila['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":empresa", $fila['empresa'], PDO::PARAM_STR);
            $stmt->bindParam(":cco", $fila['cco'], PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $fila['fecha'], PDO::PARAM_STR);
            $stmt->bindParam(":semana", $fila['semana'], PDO::PARAM_STR);
            $stmt->bindParam(":turno", $fila['turno'], PDO::PARAM_STR);
            $stmt->bindParam(":entrada", $fila['entrada'], PDO::PARAM_STR);
            $stmt->bindParam(":salida", $fila['salida'], PDO::PARAM_STR);
            $stmt->bindParam(":atraso", $fila['atraso'], PDO::PARAM_STR);
            $stmt->bindParam(":jornada", $fila['jornada'], PDO::PARAM_STR);
            $stmt->bindParam(":he_entrada", $fila['he_entrada'], PDO::PARAM_STR);
            $stmt->bindParam(":he_salida", $fila['he_salida'], PDO::PARAM_STR);
            $stmt->bindParam(":ausencia", $fila['ausencia'], PDO::PARAM_STR);


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


}