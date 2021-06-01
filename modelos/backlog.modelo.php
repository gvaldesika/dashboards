<?php

require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/Conexion.php';

class BacklogModelo
{


    public static function mdlVerBacklog()
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select dash_backlog.*,
est.Valor_Dato as estado,
est.Id_Dato as id_estado,
cco.Descripcion as nom_cco
from
dash_backlog
INNER JOIN sys_tablas est on dash_backlog.Id_Estado = est.Id_Dato and est.Id_Tabla=2
left JOIN sicentro_costo cco on cco.Codigo_Centro_Costo = dash_backlog.CCO_Proy and cco.Cod_Empresa=1
order by dash_backlog.Nom_Cli asc');
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }

    // Muestra el backlog con mas detalle (Si se especifica en el argumento true, muestra todas las empresas, si es false, no muestra empresa IKA Infraestructura)
    public static function mdlVerBacklogDetalle($op)
    {
        try {
            $sql = '';
            switch ($op)
            {
                case 7: // Industrial + Mineria
                    $sql = 'select 
dash_backlog.*,
CASE WHEN TIMESTAMPDIFF(MONTH, CURRENT_DATE, Fecha_Fin) < 0 then 0 else TIMESTAMPDIFF(MONTH, CURRENT_DATE, Fecha_Fin) end as restante_meses,
TIMESTAMPDIFF(MONTH, Fecha_Ini, Fecha_Fin) as total_meses,
round((dash_backlog.Tot_Proy/TIMESTAMPDIFF(MONTH, Fecha_Ini, Fecha_Fin)),0) as mensual,
emp.Razon_Social,
IFNULL(cco.Descripcion, \'Sin CCO\') as nom_cco,
estado.Valor_Dato as nom_estado
from 
dash_backlog
left JOIN Empresas emp on emp.Cod_Empresa = dash_backlog.Id_Empresa
left JOIN sicentro_costo cco on cco.Codigo_Centro_Costo = dash_backlog.CCO_Proy and cco.Cod_Empresa = 1
INNER JOIN sys_tablas estado on estado.Id_Dato = dash_backlog.Id_Estado and estado.Id_Tabla=2
where dash_backlog.Id_Empresa != 3
order by Nom_Cli asc';
                    $stmt = Conexion::conectarGoDaddy()->prepare($sql);
                    break;


                case -1: // Ver Todos
                    $sql = 'select 
dash_backlog.*,
CASE WHEN TIMESTAMPDIFF(MONTH, CURRENT_DATE, Fecha_Fin) < 0 then 0 else TIMESTAMPDIFF(MONTH, CURRENT_DATE, Fecha_Fin) end as restante_meses,
TIMESTAMPDIFF(MONTH, Fecha_Ini, Fecha_Fin) as total_meses,
round((dash_backlog.Tot_Proy/TIMESTAMPDIFF(MONTH, Fecha_Ini, Fecha_Fin)),0) as mensual,
emp.Razon_Social,
IFNULL(cco.Descripcion, \'Sin CCO\') as nom_cco,
estado.Valor_Dato as nom_estado
from 
dash_backlog
left JOIN Empresas emp on emp.Cod_Empresa = dash_backlog.Id_Empresa
left JOIN sicentro_costo cco on cco.Codigo_Centro_Costo = dash_backlog.CCO_Proy and cco.Cod_Empresa = 1
INNER JOIN sys_tablas estado on estado.Id_Dato = dash_backlog.Id_Estado and estado.Id_Tabla=2
order by Nom_Cli asc';
                    $stmt = Conexion::conectarGoDaddy()->prepare($sql);
                    break;



                default:
                    $sql = 'select 
dash_backlog.*,
CASE WHEN TIMESTAMPDIFF(MONTH, CURRENT_DATE, Fecha_Fin) < 0 then 0 else TIMESTAMPDIFF(MONTH, CURRENT_DATE, Fecha_Fin) end as restante_meses,
TIMESTAMPDIFF(MONTH, Fecha_Ini, Fecha_Fin) as total_meses,
round((dash_backlog.Tot_Proy/TIMESTAMPDIFF(MONTH, Fecha_Ini, Fecha_Fin)),0) as mensual,
emp.Razon_Social,
IFNULL(cco.Descripcion, \'Sin CCO\') as nom_cco,
estado.Valor_Dato as nom_estado
from 
dash_backlog
left JOIN Empresas emp on emp.Cod_Empresa = dash_backlog.Id_Empresa
left JOIN sicentro_costo cco on cco.Codigo_Centro_Costo = dash_backlog.CCO_Proy and cco.Cod_Empresa = 1
INNER JOIN sys_tablas estado on estado.Id_Dato = dash_backlog.Id_Estado and estado.Id_Tabla=2
where dash_backlog.Id_Empresa = :idempresa
order by Nom_Cli asc';
                    $stmt = Conexion::conectarGoDaddy()->prepare($sql);
                    $stmt->bindParam(":idempresa", $op, PDO::PARAM_STR);
                    break;

            }







            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }

    // Muestra el backlog con mas detalle (Solo para la empresa Infraestructura)
    public static function mdlVerBacklogDetalleInfra($idEmpresa)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('select 
dash_backlog.*,
CASE WHEN TIMESTAMPDIFF(MONTH, CURRENT_DATE, Fecha_Fin) < 0 then 0 else TIMESTAMPDIFF(MONTH, CURRENT_DATE, Fecha_Fin) end as restante_meses,
TIMESTAMPDIFF(MONTH, Fecha_Ini, Fecha_Fin) as total_meses,
round((dash_backlog.Tot_Proy/TIMESTAMPDIFF(MONTH, Fecha_Ini, Fecha_Fin)),0) as mensual,
emp.Razon_Social,
IFNULL(cco.Descripcion, \'Sin CCO\') as nom_cco,
estado.Valor_Dato as nom_estado
from 
dash_backlog
left JOIN Empresas emp on emp.Cod_Empresa = dash_backlog.Id_Empresa
left JOIN sicentro_costo cco on cco.Codigo_Centro_Costo = dash_backlog.CCO_Proy and cco.Cod_Empresa = 1
INNER JOIN sys_tablas estado on estado.Id_Dato = dash_backlog.Id_Estado and estado.Id_Tabla=2
where dash_backlog.Id_Empresa = :idempresa
order by Nom_Cli asc');
            $stmt->bindParam(":idempresa", $idEmpresa, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }



    public static function mdlEliminaBacklog($idBacklog)
    {
        try {

            $stmt = Conexion::conectarGoDaddy()->prepare('delete from dash_backlog where IdBacklogs = :idbacklog');
            $stmt->bindParam(":idbacklog", $idBacklog, PDO::PARAM_STR);
            if ($stmt->execute())
            {
              return 'ok';
            }else
            {
              return 'fallo';
            }
        } catch (Exception $e) {

        }
    }



    public static function mdlEditarBacklog($backlog)
    {
        $id = $backlog['IdBacklogs'];

        try {
            $stmt = Conexion::conectarGoDaddy() ->prepare('update dash_backlog  set
         Rut_Cli = :rutcli,
          Nom_Cli = :nomcli,
          Nom_Proy = :nomproy,
          Fecha_Ini = :fechainicio,
          Fecha_Fin = :fechafin, 
          Id_Estado = :idestado,
          Tot_Proy = :totproy,
          Notas_Proy = :notas,
          CCO_Proy = :cco,
          Id_Empresa = :idempresa
          where
          IdBacklogs = :idbacklog');


            $stmt->bindParam(":idbacklog", $id, PDO::PARAM_STR);
            $stmt->bindParam(":rutcli", $backlog['Rut_Cli'], PDO::PARAM_STR);
            $stmt->bindParam(":nomcli", $backlog['Nom_Cli'], PDO::PARAM_STR);
            $stmt->bindParam(":nomproy", $backlog['Nom_Proy'], PDO::PARAM_STR);
            $stmt->bindParam(":fechainicio", $backlog['Fecha_Ini'], PDO::PARAM_STR);
            $stmt->bindParam(":fechafin", $backlog['Fecha_Fin'], PDO::PARAM_STR);
            $stmt->bindParam(":idestado", $backlog['Id_Estado'], PDO::PARAM_STR);
            $stmt->bindParam(":totproy", $backlog['Tot_Proy'], PDO::PARAM_STR);
            $stmt->bindParam(":notas", $backlog['Notas_Proy'], PDO::PARAM_STR);
            $stmt->bindParam(":cco", $backlog['CCO_Proy'], PDO::PARAM_STR);
            $stmt->bindParam(":idempresa", $backlog['Id_Empresa'], PDO::PARAM_STR);

            if ($stmt->execute())
            {
                return 'ok';
            }else
            {
                return 'error';
            }
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }




    public static function mdlInsertarBacklog($backlog)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('insert into dash_backlog (Rut_Cli,Nom_Cli,Nom_Proy,Fecha_Ini,Fecha_Fin,Id_Estado,Tot_Proy,Notas_Proy,CCO_Proy,Id_Empresa) values (:rutCliente, :nomCliente, :nomProyecto, :fechaInicio , 
:fechaFin , :idEstado , :totalProyecto , :notas , :idCCO , :idEmpresa)');

            $stmt->bindParam(":nomCliente", $backlog['nomCliente'], PDO::PARAM_STR);
            $stmt->bindParam(":rutCliente", $backlog['rutCliente'], PDO::PARAM_STR);
            $stmt->bindParam(":nomProyecto", $backlog['nomProyecto'], PDO::PARAM_STR);
            $stmt->bindParam(":fechaInicio", $backlog['fechaInicio'], PDO::PARAM_STR);
            $stmt->bindParam(":fechaFin", $backlog['fechaFin'], PDO::PARAM_STR);
            $stmt->bindParam(":totalProyecto", $backlog['totalProyecto'], PDO::PARAM_STR);
            $stmt->bindParam(":notas", $backlog['notas'], PDO::PARAM_STR);
            $stmt->bindParam(":idCCO", $backlog['idCCO'], PDO::PARAM_STR);
            $stmt->bindParam(":idEstado", $backlog['idEstado'], PDO::PARAM_STR);
            $stmt->bindParam(":idEmpresa", $backlog['idEmpresa'], PDO::PARAM_STR);


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


    //Devuelve ultima fecha del backlog (funcion utilizada para grasicar el backlog)
    public static function mdlBacklogFechaFinal($idempresa)
    {
        try {

            if(is_null($idempresa)):
                $stmt = Conexion::conectarGoDaddy()->prepare('select 
MAX(Fecha_Fin) as ultima_fecha
from 
dash_backlog
');
                $stmt->execute();
                return $stmt->fetch();
            else:
                $stmt = Conexion::conectarGoDaddy()->prepare('select 
MAX(Fecha_Fin) as ultima_fecha
from 
dash_backlog
where dash_backlog.Id_Empresa = :idEmpresa
');
                $stmt->bindParam(":idEmpresa", $idempresa, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch();
            endif;


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }




}
