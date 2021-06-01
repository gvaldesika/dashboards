<?php
class PresupuestoModelo
{


    public static function mdlInsertarPresupuesto($fila)
    {
        $stmt = Conexion::conectarGoDaddy()->prepare("INSERT INTO dash_presupuesto values (:periodo, :cco, :nomcco, :empresa , :tipo ,:enero, :febrero, :marzo, :abril , :mayo, :junio, :julio ,:agosto ,:septiembre , :octubre, :noviembre, :diciembre)");
        $stmt->bindParam(":periodo",$fila['periodo'],PDO::PARAM_STR);
        $stmt->bindParam(":cco",$fila['CCO'],PDO::PARAM_STR);
        $stmt->bindParam(":nomcco",$fila['nombreCCO'],PDO::PARAM_INT);
        $stmt->bindParam(":empresa",$fila['empresa'],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$fila['tipo'],PDO::PARAM_STR);

        $stmt->bindParam(":enero",$fila['Enero'],PDO::PARAM_STR);
        $stmt->bindParam(":febrero",$fila['Febrero'],PDO::PARAM_STR);
        $stmt->bindParam(":marzo",$fila['Marzo'],PDO::PARAM_STR);
        $stmt->bindParam(":abril",$fila['Abril'],PDO::PARAM_STR);
        $stmt->bindParam(":mayo",$fila['Mayo'],PDO::PARAM_STR);
        $stmt->bindParam(":junio",$fila['Junio'],PDO::PARAM_STR);
        $stmt->bindParam(":julio",$fila['Julio'],PDO::PARAM_STR);
        $stmt->bindParam(":agosto",$fila['Agosto'],PDO::PARAM_STR);
        $stmt->bindParam(":septiembre",$fila['Septiembre'],PDO::PARAM_STR);
        $stmt->bindParam(":octubre",$fila['Octubre'],PDO::PARAM_STR);
        $stmt->bindParam(":noviembre",$fila['Noviembre'],PDO::PARAM_STR);
        $stmt->bindParam(":diciembre",$fila['Diciembre'],PDO::PARAM_STR);


        if($stmt->execute())
        {
            return 'ok';
        }else
        {
            return Conexion::conectar()->errorInfo();
        }
    }

    public static function mdlEliminaPresupuesto($ano,$tipo)
    {
        $stmt = Conexion::conectar()->prepare("delete from aux_com_presupuesto where \"Periodo\" = :ano and \"Tipo\"=:tipo");
        $stmt->bindParam(":ano",$ano,PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$tipo,PDO::PARAM_STR);


        if($stmt->execute())
        {
            return 'ok';
        }else
        {
            return Conexion::conectar()->errorInfo();
        }
    }


    public static function mdlVerPresupuesto($ano,$tipo)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select * from dash_presupuesto
where Periodo=:ano and Tipo= :tipo');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    public static function mdlVerPresupCliente($ano)
    {
        try {

            $stmt = Conexion::conectar()->prepare('select * from aux_com_presupuesto
where "Periodo"=:ano and "Tipo"= :tipo');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }

    }


    // Muestra solo los CCO de mineria o Industrial
    public static function mdlVerPresupDetalle($ano,$un)
    {
        try {

            switch ($un)
            {
                case 1: // Unidad Industrial
                    $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM `dash_presupuesto`
                    where CCO in (525,526,527,529,530,536) and
                    Periodo = :ano
                    ');
                    $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
                    $stmt->execute();
                    return $stmt->fetchAll();
                    break;

                case 6: // Unidad Mineria
                    $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM `dash_presupuesto`
                    where CCO in (528,532,533,534) and
                    Periodo = :ano
                    ');
                    $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
                    $stmt->execute();
                    return $stmt->fetchAll();
                    break;
            }


        } catch (Exception $e) {

        }

    }




    public static function mdlObtenerPresupuestoCCO($ano,$tipoPresupuesto,$mes)
    {
        $op = '';
        switch ($mes)
        {
            case 1:
                $op = 'SUM("Enero")';
                break;

            case 2:
                $op = 'SUM("Enero")+SUM("Febrero")';
                break;

            case 3:
                $op = 'SUM("Enero")+SUM("Febrero")+SUM("Marzo")';
                break;

            case 4:
                $op = 'SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")';
                break;

            case 5:
                $op = 'SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")+SUM("Mayo")';
                break;

            case 6:
                $op = 'SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")+SUM("Mayo")+SUM("Junio")';
                break;

            case 7:
                $op = 'SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")+SUM("Mayo")+SUM("Junio")+SUM("Julio")';
                break;

            case 8:
                $op = 'SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")+SUM("Mayo")+SUM("Junio")+SUM("Julio")+SUM("Agosto")';
                break;

            case 9:
                $op = 'SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")+SUM("Mayo")+SUM("Junio")+SUM("Julio")+SUM("Agosto")+SUM("Septiembre")';
                break;

            case 10:
                $op = 'SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")+SUM("Mayo")+SUM("Junio")+SUM("Julio")+SUM("Agosto")+SUM("Septiembre")+SUM("Octubre")';
                break;

            case 11:
                $op = 'SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")+SUM("Mayo")+SUM("Junio")+SUM("Julio")+SUM("Agosto")+SUM("Septiembre")+SUM("Octubre")+SUM("Noviembre")';
                break;

            case 12:
                $op = 'SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")+SUM("Mayo")+SUM("Junio")+SUM("Julio")+SUM("Agosto")+SUM("Septiembre")+SUM("Octubre")+SUM("Noviembre")+SUM("Diciembre")';
                break;
        }



        try {


            $stmt = Conexion::conectar()->prepare('select 
"CCO",
"Valor_Dato" as "Nombre_CCO",
('.$op.') as acumulado,
(SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")+SUM("Mayo")+SUM("Junio")+SUM("Julio")+SUM("Agosto")+SUM("Septiembre")+SUM("Octubre")+SUM("Noviembre")+SUM("Diciembre")) as total,
analisis."Analisis_Texto_1",
analisis."Analisis_Texto_2",
analisis."Analisis_Texto_3"
from
aux_com_presupuesto
INNER JOIN sys_tablas analisis on analisis."Id_Dato" = aux_com_presupuesto."CCO" and analisis."Id_Tabla"=1
Where 
"Periodo" = :ano and
"Tipo" = :tipo
GROUP BY "CCO",analisis."Analisis_Texto_1",
analisis."Analisis_Texto_2",
analisis."Analisis_Texto_3",
"Valor_Dato"');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $tipoPresupuesto, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function mdlTotalPresup($ano,$tipo)
    {
        try {

            $stmt = Conexion::conectar()->prepare('select 

(SUM("Enero")+SUM("Febrero")+SUM("Marzo")+SUM("Abril")+SUM("Mayo")+SUM("Junio")+SUM("Julio")+SUM("Agosto")+SUM("Septiembre")+SUM("Octubre")+SUM("Noviembre")+SUM("Diciembre")) as total

from
aux_com_presupuesto
INNER JOIN sys_tablas analisis on analisis."Id_Dato" = aux_com_presupuesto."CCO" and analisis."Id_Tabla"=1
Where 
"Periodo" = :ano and
"Tipo" = :tipo
');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }

    }






}
