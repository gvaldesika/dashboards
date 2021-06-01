<?php

require_once "Conexion.php";
require_once "config/parametros.php";

class ComprobantesModelo
{

    public static function mdlObtenerIngresos($ano,$mes,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
estado_de_resultados,
sum(saldo)

FROM '.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_centro_costo != 50
GROUP BY estado_de_resultados');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }
    public static function mdlObtenerIngresosPeriodo($fechaInicio,$fechaFin,$op,$tabla)
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
                    fecha BETWEEN :finicio and :ffin
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534,536)
                    GROUP BY estado_de_resultados');
                    $stmt->bindParam(":finicio", $fechaInicio, PDO::PARAM_STR);
                    $stmt->bindParam(":ffin", $fechaFin, PDO::PARAM_STR);
                    break;

                case 1: // Industrial
                    $stmt = Conexion::conectar()->prepare('SELECT 
                    sum(saldo)
                    FROM '.$tabla.'
                    WHERE
                    estado_de_resultados = \'Ingresos de Explotación\' 
                    and
                    fecha BETWEEN :finicio and :ffin
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (525,526,527,529,530,536)
                    GROUP BY estado_de_resultados');
                    $stmt->bindParam(":finicio", $fechaInicio, PDO::PARAM_STR);
                    $stmt->bindParam(":ffin", $fechaFin, PDO::PARAM_STR);
                    break;

                case 6: // Mineria
                    $stmt = Conexion::conectar()->prepare('SELECT 
                    sum(saldo)
                    FROM '.$tabla.'
                    WHERE
                    estado_de_resultados = \'Ingresos de Explotación\' 
                    and
                    fecha BETWEEN :finicio and :ffin
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (528,532,533,534)
                    GROUP BY estado_de_resultados');
                    $stmt->bindParam(":finicio", $fechaInicio, PDO::PARAM_STR);
                    $stmt->bindParam(":ffin", $fechaFin, PDO::PARAM_STR);
                    break;

                case 3: // Infraestructura
                    $stmt = Conexion::conectar()->prepare('SELECT 
                    sum(saldo)
                    FROM '.$tabla.'
                    WHERE
                    estado_de_resultados = \'Ingresos de Explotación\' 
                    and
                    fecha BETWEEN :finicio and :ffin
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (535,537,538)
                    GROUP BY estado_de_resultados');
                    $stmt->bindParam(":finicio", $fechaInicio, PDO::PARAM_STR);
                    $stmt->bindParam(":ffin", $fechaFin, PDO::PARAM_STR);
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
    public static function mdlObtenerVentas($ano,$mes,$op)
    {
        try {

            $sql = '';

            if ($op)
            {
                $sql = 'SELECT 
estado_de_resultados,
sum(saldo)

FROM he_comprobantes_contables
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_centro_costo != 50 and
codigo_he != \'0000100003\'
GROUP BY estado_de_resultados';

            }else
            {
                $sql = 'SELECT 
estado_de_resultados,
sum(saldo)

FROM he_comprobantes_contables
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_centro_costo != 50 and
codigo_he == \'0000100003\'
GROUP BY estado_de_resultados';

            }

            $stmt = Conexion::conectar()->prepare($sql);


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }



 //******* CIERRE PERIODO CONTABLE **************
    public static function mdlObtenerPeriodosPublicados()
    {
        try {
            $sql = 'select 
ano_cierre,
mes_cierre,
fecha_cierre,
usuario
from he_comprobantes_contables_cierre
group by ano_cierre,mes_cierre,fecha_cierre,usuario';

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }

    // Efectura un cierre (snapshoot) de la información contable
    public static function mdlCierraData($ano,$mes,$usuario)
    {
        try {
            $stmt = Conexion::conectar()->prepare('INSERT INTO he_comprobantes_contables_cierre (codigo_he, comprobante, razon_social, ano_proceso, tipocomprobante, comprobante_1, fecha, mesfecha, codigo_cuenta, descripcion_cuenta, codigo_centro_costo ,glosa,
debe, haber, codigo_tipo_documento, numero_documento ,codigo_maquina, saldo ,tipo_de_cuenta, estado_de_resultados, cuentas_de_gastos, nombre_cco, tipo_comprobante_nombre,rut)
select * from he_comprobantes_contables
where ano_proceso = :ano and
mesfecha = :mes');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);

            if (!$stmt->execute())
            {
                return 'fallo';
            }

        } catch (PDOException $e) {

            return 'fallo';
        }

        try {
            $stmt = Conexion::conectar()->prepare('update he_comprobantes_contables_cierre set 
                                            ano_cierre=:ano, mes_cierre=:mes, fecha_cierre= NOW(), usuario = :usuario, estado=1 where ano_proceso = :ano and
mesfecha = :mes');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);

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

    // Elimina un periodo publicado
    public static function mdlEliminaData($ano,$mes)
    {
        try {
            $stmt = Conexion::conectar()->prepare('delete from he_comprobantes_contables_cierre where ano_cierre = :ano and mes_cierre = :mes');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);

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















    public static function mdlObtenerCostos($ano,$mes,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
\'Costo Directo\' as categ,
sum(saldo)
FROM '.$tabla.'
WHERE
descripcion_cuenta not in (\'ARRIENDO MAQUINARIAS PROPIA\',\'CORR. MONETARIA PASIVOS\',\'CORR.MONETARIA ACTIVOS\',\'CORR.MONETARIA LEASING\',\'COSTO VENTA ACTIVO FIJO\',\'GASTOS BANCARIOS\'
,\'IMPUESTO RENTA\',\'IMPUESTOS DIFERIDOS\',\'INGRESOS SS. MAQUINARIAS\',\'INTERESES\',\'INTERESES GANADOS\',\'INTERESES LEASING\',\'OTROS COSTOS FUERA DE EXPLOTACION\',\'OTROS INGRESOS ACTIVOS LEASING\',\'\',\'OTROS INGRESOS DE EXPLOTACION\',\'OTROS INGRESOS FUERA DE EXPLOTACION\',\'VENTA ACTIVO FIJO\')
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_he != \'0000100004\' and
codigo_centro_costo >= 30
');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }

    public static function mdlObtenerCostosUnIndustrial($ano,$mes,$tabla,$ctaGasto)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
sum(saldo)
FROM '.$tabla.'
WHERE
cuentas_de_gastos = :gasto
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_he != \'0000100004\' and
codigo_centro_costo in ('.implode(',', ParametrosApp::obtenerCCOUnIndustrial()).')
');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":gasto", $ctaGasto, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public static function mdlObtenerCostosUnMineria($ano,$mes,$tabla,$ctaGasto)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
sum(saldo)
FROM '.$tabla.'
WHERE
cuentas_de_gastos = :gasto
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_he != \'0000100004\' and
codigo_centro_costo in ('.implode(',', ParametrosApp::obtenerCCOUnMineria()).')
');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":gasto", $ctaGasto, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public static function mdlObtenerCostosUnInfraestructura($ano,$mes,$tabla,$ctaGasto)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
sum(saldo)
FROM '.$tabla.'
WHERE
cuentas_de_gastos = :gasto
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_he != \'0000100004\' and
codigo_centro_costo in ('.implode(',', ParametrosApp::obtenerCCOUnInfraestructura()).')
');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":gasto", $ctaGasto, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }



    public static function mdlObtenerGAV($ano,$mes,$tabla)
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
codigo_centro_costo IN (10,15,19,20,21,22,23,18,25)
');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }
    public static function mdlObtenerClasifEstadoResul($ano,$mes,$clasificador,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT
sum(saldo)
FROM '.$tabla.'
WHERE
estado_de_resultados = :clasificador
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes
');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":clasificador", $clasificador, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch()['sum'];

        } catch (Exception $e) {


        }
    }
    public static function mdlObtenerCuenta($ano,$mes,$nomCuenta)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT
sum(saldo)
FROM he_comprobantes_contables
WHERE
descripcion_cuenta = :cuenta 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) =  :mes
');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":cuenta", $nomCuenta, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->fetch() == false)
            {
                return 0;
            }else
            {
                $stmt->fetch()['sum'];
            }

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }
    public static function mdlObtenerCuentaEbitda($ano,$mes,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT
sum(saldo)
FROM '.$tabla.'
WHERE
descripcion_cuenta in (\'DEPRECIACION ACTIVOS LEASING\',\'DEPRECIACION ACTIVO FIJO\')
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) =  :mes and
codigo_he in (\'0000100003\',\'0000100001\',\'0000100006\')
');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch()['sum'];


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    public static function mdlObtenerIngresosAcumuladosClientes($finicio,$ffin,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
analisis."Analisis_Texto_1" as clientes,
sum(he_comprobantes_contables.saldo)

FROM '.$tabla.'
INNER JOIN sys_tablas analisis on analisis."Id_Dato"::INTEGER = he_comprobantes_contables.codigo_centro_costo::INTEGER and analisis."Id_Tabla"::INTEGER = 1
WHERE
he_comprobantes_contables.estado_de_resultados = \'Ingresos de Explotación\' 
and
fecha::date BETWEEN :inicio and :fin and
he_comprobantes_contables.codigo_centro_costo != 50
GROUP BY analisis."Analisis_Texto_1"');


            $stmt->bindParam(":inicio", $finicio, PDO::PARAM_STR);
            $stmt->bindParam(":fin", $ffin, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }
    public static function mdlObtenerIngresosAcumuladosZona($finicio,$ffin,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
analisis."Analisis_Texto_2" as zona,
sum(he_comprobantes_contables.saldo)
FROM '.$tabla.'
INNER JOIN sys_tablas analisis on analisis."Id_Dato"::INTEGER = he_comprobantes_contables.codigo_centro_costo::INTEGER and analisis."Id_Tabla"::INTEGER = 1
WHERE
he_comprobantes_contables.estado_de_resultados = \'Ingresos de Explotación\' 
and
fecha::date BETWEEN :inicio and :fin and
he_comprobantes_contables.codigo_centro_costo != 50
GROUP BY analisis."Analisis_Texto_2"');


            $stmt->bindParam(":inicio", $finicio, PDO::PARAM_STR);
            $stmt->bindParam(":fin", $ffin, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }
    public static function mdlObtenerIngresosAcumuladosIndustria($finicio,$ffin)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
analisis."Analisis_Texto_3" as industria,
sum(he_comprobantes_contables.saldo)
FROM he_comprobantes_contables
INNER JOIN sys_tablas analisis on analisis."Id_Dato"::INTEGER = he_comprobantes_contables.codigo_centro_costo and analisis."Id_Tabla"::INTEGER = 1
WHERE
he_comprobantes_contables.estado_de_resultados = \'Ingresos de Explotación\' 
and
fecha::date BETWEEN :inicio and :fin and
he_comprobantes_contables.codigo_centro_costo != 50
GROUP BY analisis."Analisis_Texto_3"');


            $stmt->bindParam(":inicio", $finicio, PDO::PARAM_STR);
            $stmt->bindParam(":fin", $ffin, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }










    //-----------------------------------  Modulo COmercial ------------------------------------------------

    public static function mdlObtenerIngresosMineria($ano,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('select
(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 1 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Enero",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 2 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Febrero",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 3 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Marzo",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 4 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Abril",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 5 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Mayo",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 6 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Junio",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 7 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Julio",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 8 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Agosto",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 9 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Septiembre",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 10 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Octubre",

(
SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 11 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)

) as "Noviembre",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 12 and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
) as "Diciembre"');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            //$stmt->bindParam(":un", $un, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public static function mdlObtenerIngresosIndustrial($ano,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('select
(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 1 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Enero",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 2 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Febrero",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 3 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Marzo",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 4 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Abril",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 5 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Mayo",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 6 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Junio",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 7 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Julio",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 8 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Agosto",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 9 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Septiembre",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 10 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Octubre",

(
SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 11 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)

) as "Noviembre",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 12 and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
) as "Diciembre"');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            //$stmt->bindParam(":un", $un, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public static function mdlObtenerIngresosIndustrialMineria($ano,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('select
(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 1 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Enero",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 2 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Febrero",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 3 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Marzo",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 4 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Abril",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 5 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Mayo",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 6 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Junio",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 7 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Julio",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 8 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Agosto",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 9 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Septiembre",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 10 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Octubre",

(
SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 11 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)

) as "Noviembre",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 12 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\') and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
) as "Diciembre"');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            //$stmt->bindParam(":un", $un, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }


    public static function mdlObtenerIngresosInfraestructura($ano,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('select
(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 1 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Enero",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 2 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Febrero",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 3 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Marzo",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 4 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Abril",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 5 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Mayo",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 6 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Junio",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 7 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Julio",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 8 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Agosto",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 9 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Septiembre",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 10 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Octubre",

(
SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 11 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)

) as "Noviembre",

(SELECT 
COALESCE(sum(saldo),0) as "sum"
FROM
'.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = 12 and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100003\',\'0000100006\') and
codigo_centro_costo in (535,537,538,539,540,541)
) as "Diciembre"');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            //$stmt->bindParam(":un", $un, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }





    public static function mdlObtenerIngresosIndustrialMes($ano,$mes,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
estado_de_resultados,
sum(saldo)

FROM '.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
GROUP BY estado_de_resultados');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }

    public static function mdlObtenerIngresosIndustrialMineriaMes($ano,$mes,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
estado_de_resultados,
sum(saldo)

FROM '.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_centro_costo != 50 and
codigo_he in (\'0000100001\',\'0000100006\')  and
codigo_centro_costo in (525,526,527,529,530,536,528,532,533,534)
GROUP BY estado_de_resultados');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }

    public static function mdlObtenerIngresosIndustrialMesDetalle($ano,$mes)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT
codigo_centro_costo,
cco.nombre_cco,
COALESCE(sum(saldo),0) as "sum"
FROM
he_comprobantes_contables
INNER JOIN dm_centro_de_costo cco on cco.codigo_cco = he_comprobantes_contables.codigo_centro_costo and cco.codigo_empresa_eugcom = \'0000100001\'
WHERE
estado_de_resultados = \'Ingresos de Explotación\'
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_centro_costo != 50 and
codigo_he = \'0000100001\' and
codigo_centro_costo in (525,526,527,529,530,536)
GROUP BY codigo_centro_costo,cco.nombre_cco');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    public static function mdlObtenerIngresosMesDetalleCCO($ano,$mes,$cco)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT
codigo_centro_costo,
cco.nombre_cco,
COALESCE(sum(saldo),0) as "sum"
FROM
he_comprobantes_contables
INNER JOIN dm_centro_de_costo cco on cco.codigo_cco = he_comprobantes_contables.codigo_centro_costo and cco.codigo_empresa_eugcom = \'0000100001\'
WHERE
estado_de_resultados = \'Ingresos de Explotación\'
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_centro_costo != 50 and
codigo_centro_costo = :cco
GROUP BY codigo_centro_costo,cco.nombre_cco');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":cco", $cco, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }


    public static function mdlObtenerIngresosMineriaMes($ano,$mes,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
estado_de_resultados,
sum(saldo)

FROM '.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_centro_costo != 50 and
codigo_centro_costo in (528,532,533,534)
GROUP BY estado_de_resultados');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }

    public static function mdlObtenerIngresosInfraestructuraMes($ano,$mes,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT 
estado_de_resultados,
sum(saldo)

FROM '.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', fecha) = :ano and
date_part(\'month\', fecha) = :mes and
codigo_centro_costo != 50 and
codigo_centro_costo in ('.implode(',', ParametrosApp::obtenerCCOUnInfraestructura()).')
GROUP BY estado_de_resultados');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }


    public static function mdlObtenerIngresosAnualesCCO($finicio,$ffin,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT
codigo_centro_costo,
nombre_cco,
sum(saldo)
FROM '.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
fecha::date BETWEEN :inicio and :fin
and
codigo_centro_costo != 50
GROUP BY codigo_centro_costo,nombre_cco');


            $stmt->bindParam(":inicio", $finicio, PDO::PARAM_STR);
            $stmt->bindParam(":fin", $ffin, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function mdlObtenerIngresosAnualesClientes($finicio,$ffin,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT
cco."Analisis_Texto_1" as cliente,
sum(saldo)

FROM '.$tabla.'
INNER JOIN sys_tablas cco on cco."Id_Dato"::INTEGER = he_comprobantes_contables.codigo_centro_costo
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
fecha::date BETWEEN :inicio and :fin and
codigo_centro_costo != 50
GROUP BY cco."Analisis_Texto_1"');


            $stmt->bindParam(":inicio", $finicio, PDO::PARAM_STR);
            $stmt->bindParam(":fin", $ffin, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public static function mdlObtenerIngresosAnualesIndustria($finicio,$ffin,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT
cco."Analisis_Texto_3" as zona,
sum(saldo)

FROM '.$tabla.'
INNER JOIN sys_tablas cco on cco."Id_Dato"::INTEGER = he_comprobantes_contables.codigo_centro_costo
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
fecha::date BETWEEN :inicio and :fin and
codigo_centro_costo != 50
GROUP BY cco."Analisis_Texto_3"');


            $stmt->bindParam(":inicio", $finicio, PDO::PARAM_STR);
            $stmt->bindParam(":fin", $ffin, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }



    // Obtiene el promedio de ingresos de una faena (ultimos 12 meses)
    public static function mdlObtenerIngresosPromedioObra($finicio,$ffin,$cco,$tabla)
    {
        try {

            $stmt = Conexion::conectar()->prepare('SELECT
ROUND(avg(venta.suma)) as promedio
from

(SELECT 
mesfecha,
ano_proceso,
sum(saldo) as suma
FROM '.$tabla.'
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
fecha BETWEEN :inicio and :fin
and
codigo_centro_costo = :cco
GROUP BY mesfecha,ano_proceso
order by ano_proceso,mesfecha asc
) venta');


            $stmt->bindParam(":inicio", $finicio, PDO::PARAM_STR);
            $stmt->bindParam(":fin", $ffin, PDO::PARAM_STR);
            $stmt->bindParam(":cco", $cco, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {

        }
    }


    public static function mdlObtenerVentasAcumuladasClientes($ano,$mes,$tabla)
    {
        try {
            $stmt = Conexion::conectar()->prepare('SELECT 
he_comprobantes_contables.codigo_centro_costo,
analisis."Valor_Dato" as nom_cco,
sum(he_comprobantes_contables.saldo),
analisis."Analisis_Texto_1" as cliente,
analisis."Analisis_Texto_2" as zona,
analisis."Analisis_Texto_3" as industria
FROM '.$tabla.'
inner JOIN dm_centro_de_costo cco on cco.codigo_cco = he_comprobantes_contables.codigo_centro_costo and cco.codigo_empresa_eugcom = \'0000100001\'
INNER JOIN sys_tablas analisis on analisis."Id_Dato" = he_comprobantes_contables.codigo_centro_costo and analisis."Id_Tabla" = 1
WHERE
he_comprobantes_contables.estado_de_resultados = \'Ingresos de Explotación\' 
and
date_part(\'year\', he_comprobantes_contables.fecha) = :ano and
date_part(\'month\', he_comprobantes_contables.fecha) BETWEEN 1 and :mes and
he_comprobantes_contables.codigo_centro_costo != 50
GROUP BY he_comprobantes_contables.codigo_centro_costo,analisis."Analisis_Texto_1",
analisis."Analisis_Texto_2",
analisis."Analisis_Texto_3",
analisis."Valor_Dato"');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public static function mdlObtenerPresupuesto($ano,$mes,$tipoPresupuesto)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('select 
                SUM('.$mes.') as sum
                from
                dash_presupuesto
                where 
                Periodo = :ano and
                Tipo = :tipo');

            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $tipoPresupuesto, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function mdlObtenerPresupuestoUn($ano,$mes,$tipoPresupuesto,$empresa)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('select 
SUM('.$mes.') as sum
from
dash_presupuesto
where 
Periodo = :ano and
Tipo = :tipo and
Empresa = :empresa');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $tipoPresupuesto, PDO::PARAM_STR);
            $stmt->bindParam(":empresa", $empresa, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function mdlObtenerPresupuestoIndustrialMineria($ano,$mes,$tipoPresupuesto)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('select 
SUM('.$mes.') as sum
from
dash_presupuesto
where 
Periodo = :ano and
Tipo = :tipo and
Empresa in (\'IKA Mineria\',\'IKA Industrial\')');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $tipoPresupuesto, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // Muestra todos los clientes con ventas
    public static function mdlVerClientes()
    {
        try {
            $stmt = Conexion::conectar()->prepare('SELECT 
analisis."Analisis_Texto_1" as clientes
FROM he_comprobantes_contables
INNER JOIN sys_tablas analisis on analisis."Id_Dato" = he_comprobantes_contables.codigo_centro_costo and analisis."Id_Tabla" = 1
WHERE
he_comprobantes_contables.estado_de_resultados = \'Ingresos de Explotación\' 
and
he_comprobantes_contables.codigo_centro_costo != 50
GROUP BY analisis."Analisis_Texto_1"
');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

// Muestra las empresas que emiten facturación a clientes
    public static function mdlVerEmpresasFactura()
    {
        try {
            $stmt = Conexion::conectar()->prepare('SELECT 
codigo_he,
razon_social
FROM 
he_comprobantes_contables
WHERE
estado_de_resultados = \'Ingresos de Explotación\' 
and
codigo_centro_costo != 50
GROUP BY codigo_he,razon_social');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // FIN Modulo COmercial








}

