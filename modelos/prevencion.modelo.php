<?php
require_once 'Conexion.php';

class PrevencionModelo
{

    public static function mdlObtenerIncidentes($ano,$mes)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT
appika_incidentes.Id_Inci as nro_incidente,
claf.Nombre_CInci as tipo_evento,
sclaf.Nombre_SubCInci as clasificacion_evento,
CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci) as clasificacion,
 
appika_incidentes.Grave_Inci as gravedad,
divi.Nombre_Div as division,
appika_incidentes.TipoPer_Inci as tipo_personal,
appika_incidentes.Fecha_Inci as fecha_incidente,
appika_incidentes.Hora_Inci as hora_incidente,
appika_incidentes.Direcc_Inci as direccion_incidente,
appika_incidentes.Descrip_Inci as detalle_incidente,
appika_incidentes.Accio_Inci as acciones_inmediatas,
appika_incidentes.Antec_Inci as antecendentes_complementarios,
appika_incidentes.Fechareg_Inci as fecha_registro_evento,
usr.Nombre_Cuenta as reportado_por,
appika_incidentes.Equipo,
divi.Codigo_Centro_Costo,
YEAR(appika_incidentes.Fecha_Inci) as ano,
MONTH(appika_incidentes.Fecha_Inci) as mes,
DAY(appika_incidentes.Fecha_Inci) as dia
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = :mes

order by appika_incidentes.Fecha_Inci desc');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    public static function mdlObtenerNroIncidentesDivicion($ano,$iddivicion,$nomdivicion)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('Select

:nomdivicion as \'Faena\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 01
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Enero\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 02
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Febrero\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 03
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Marzo\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 04
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Abril\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 05
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Mayo\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 06
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Junio\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 07
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Julio\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 08
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Agosto\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 09
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Septiembre\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 10
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Octubre\',


COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) AS \'mes\'
 
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 11
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Noviembre\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 12
and appika_incidentes.Id_Div = :divicion
GROUP BY divi.Nombre_Div
order by appika_incidentes.Fecha_Inci desc
),0) as \'Diciembre\'');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":nomdivicion", $nomdivicion, PDO::PARAM_STR);
            $stmt->bindParam(":divicion", $iddivicion, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
return $stmt->errorInfo();
        }
    }


    public static function mdlObtenerDiviciones()
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('select 
appika_divisiones.Nombre_Div,
appika_divisiones.Id_Div
from
appika_divisiones
where appika_divisiones.Activo_Div = 1 and appika_divisiones.Codigo_Centro_Costo != 0
GROUP BY appika_divisiones.Nombre_Div');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    // Utilizado por el Grafico 1
    public static function mdlObtenerIncidentesMes($ano,$mes)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('select
a.Nombre_Div,
COALESCE(b.nro,0) as nro
from
(select 
appika_divisiones.Nombre_Div,
appika_divisiones.Id_Div
from
appika_divisiones
where appika_divisiones.Activo_Div = 1 and appika_divisiones.Codigo_Centro_Costo != 0
GROUP BY appika_divisiones.Nombre_Div) a
left JOIN
(
select 
appika_incidentes.Id_Div,
COUNT(appika_incidentes.Id_Inci) as \'nro\'
from
appika_incidentes
where
MONTH(appika_incidentes.Fecha_Inci) = :mes and
YEAR(appika_incidentes.Fecha_Inci) = :ano
GROUP BY appika_incidentes.Id_Div
) b on b.Id_Div = a.Id_Div');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


// Utilizado con Grafico 2
    public static function mdlObtenerIncidentesMesTipo($ano,$mes)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('select
a.clasificacion,
COALESCE(b.nro,0) as nro
from
(SELECT
CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci) as clasificacion
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc) a
left JOIN
(
select 
CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci) as clasificacion,
COUNT(appika_incidentes.Id_Inci) as \'nro\'
from
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
where
MONTH(appika_incidentes.Fecha_Inci) = :mes and
YEAR(appika_incidentes.Fecha_Inci) = :ano
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
) b on b.clasificacion = a.clasificacion');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    public static function mdlObtenerIncidentesTipo($ano,$mes)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('select
a.Nombre_Div,
COALESCE(b.nro,0) as nro
from
(select 
appika_divisiones.Nombre_Div,
appika_divisiones.Id_Div
from
appika_divisiones
where appika_divisiones.Activo_Div = 1 and appika_divisiones.Codigo_Centro_Costo != 0
GROUP BY appika_divisiones.Nombre_Div) a
left JOIN
(
select 
appika_incidentes.Id_Div,
COUNT(appika_incidentes.Id_Inci) as \'nro\'
from
appika_incidentes
where
MONTH(appika_incidentes.Fecha_Inci) = :mes and
YEAR(appika_incidentes.Fecha_Inci) = :ano
GROUP BY appika_incidentes.Id_Div
) b on b.Id_Div = a.Id_Div');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }


    public static function mdlObtenerTipoIncidentes()
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT
CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci) as clasificacion
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {

        }
    }



    // Utilizado en Grafico 2 (Chart JS)
    public static function mdlObtenerNroIncidentesTipo($ano,$tipo)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('
            Select

:tipo as \'tipo\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 01
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Enero\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 02
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Febrero\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 03
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Marzo\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 04
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Abril\',

COALESCE((
SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 05
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Mayo\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 06
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Junio\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 07
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Julio\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 08
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Agosto\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 09
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Septiembre\',

COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 10
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Octubre\',


COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 11
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Noviembre\',


COALESCE((SELECT
COUNT(appika_incidentes.Id_Inci) as \'mes\'
FROM
appika_incidentes
LEFT JOIN appika_claf_incidentes claf on
appika_incidentes.Id_CInci = claf.Id_CInci
LEFT JOIN appika_claf_incidentes_sub sclaf on
appika_incidentes.Id_SubCInci = sclaf.Id_SubCInci
LEFT JOIN appika_divisiones divi on
appika_incidentes.Id_Div=divi.Id_Div
LEFT JOIN Usuarios usr on
appika_incidentes.Id_Usuario_Reg = usr.Id_Usuario
where 
YEAR(appika_incidentes.Fecha_Inci) = :ano and
MONTH(appika_incidentes.Fecha_Inci) = 12
and CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)  = :tipo
GROUP BY CONCAT_WS(\'-\',claf.Nombre_CInci,sclaf.Nombre_SubCInci)
order by appika_incidentes.Fecha_Inci desc
),0) as \'Diciembre\'');


            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);


            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            return $stmt->errorInfo();
        }
    }





}
