<?php


class ParametrosApp
{

    // Estos metodos permiten la configuracion de los CCO de Costo para cada UN.

    public static function obtenerCCOUnMineria()
    {
        return [528,532,533,534];

    }

    public static function obtenerCCOUnIndustrial()
    {
        return [525,526,527,529,530,536];
    }

    public static function obtenerCCOUnInfraestructura()
    {
        return [535,537,538];

    }



    // Parametros calculos informes Fin.


    public static function cuentasGasto() // Para calculo del GAV
    {
        return ['ARRIENDO MAQUINARIAS PROPIA','CORR. MONETARIA PASIVOS','CORR.MONETARIA ACTIVOS','CORR.MONETARIA LEASING','COSTO VENTA ACTIVO FIJO',
            'GASTOS BANCARIOS'
            ,'IMPUESTO RENTA','IMPUESTOS DIFERIDOS','INGRESOS SS. MAQUINARIAS','INTERESES','INTERESES GANADOS','INTERESES LEASING','OTROS COSTOS FUERA DE EXPLOTACION',
            'OTROS INGRESOS ACTIVOS LEASING','','OTROS INGRESOS DE EXPLOTACION','OTROS INGRESOS FUERA DE EXPLOTACION','VENTA ACTIVO FIJO'];
    }

    public static function ccoObrasGav() // CCO Unidades de apoyo
    {
        return [10,15,20,21,22,23];
    }

    public static function ccoUNGav() // CCO Unidades de negocio
    {
        return [18,19,25];
    }


}