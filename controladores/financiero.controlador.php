<?php

require_once 'modelos/financiero.modelo.php';
require_once  'modelos/comprobantes.modelo.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class  FinancieroControlador
{

    public static function ctrVerObra($ano,$listaCentroCostos,$listaEmpresasEugcom)
    {
        $informe = array();

        //Ingresos de Explotación
        $informe['Ingresos de Explotación'] = self::ctrVerCuentaGastoAnual($ano,['Ingresos de Explotación','Otros Ingresos'],$listaCentroCostos,$listaEmpresasEugcom);


        // Arriendo Inmuebles
        $informe['Arriendo Inmuebles'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Inmuebles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Maquinarias
        $informe['Arriendo Maquinarias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Maquinarias Propias
        $informe['Arriendo Maquinarias Propias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias Propias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Vehiculos
        $informe['Arriendo Vehiculos'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Vehiculos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Alojamiento y Pensión
        $informe['Alojamiento y Pensión'] = self::ctrVerCuentaGastoAnual($ano,['Alojamiento y Pensión'],$listaCentroCostos,$listaEmpresasEugcom);

        // Combustible
        $informe['Combustible'] = self::ctrVerCuentaGastoAnual($ano,['Combustible'],$listaCentroCostos,$listaEmpresasEugcom);

        // Comunicaciones
        $informe['Comunicaciones'] = self::ctrVerCuentaGastoAnual($ano,['Comunicaciones'],$listaCentroCostos,$listaEmpresasEugcom);

        // Contratista
        $informe['Contratista'] = self::ctrVerCuentaGastoAnual($ano,['Contratista'],$listaCentroCostos,$listaEmpresasEugcom);

        // Correc. Monetaria
        $informe['Correc. Monetaria'] = self::ctrVerCuentaGastoAnual($ano,['Correc. Monetaria'],$listaCentroCostos,$listaEmpresasEugcom);

        // Demovilización Faenas
        $informe['Demovilización Faenas'] = self::ctrVerCuentaGastoAnual($ano,['Demovilización Faenas'],$listaCentroCostos,$listaEmpresasEugcom);

        // Depreciacion Activo
        $informe['Depreciacion Activo'] = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activo'],$listaCentroCostos,$listaEmpresasEugcom);

        // Flete Maquinarias
        $informe['Flete Maquinarias'] = self::ctrVerCuentaGastoAnual($ano,['Flete Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos de Viaje y Representación
        $informe['Gastos de Viaje y Representación'] = self::ctrVerCuentaGastoAnual($ano,['Gastos de Viaje y Representación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Generales
        $informe['Gastos Generales'] = self::ctrVerCuentaGastoAnual($ano,['Gastos Generales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Indemnizaciones
        $informe['Indemnizaciones'] = self::ctrVerCuentaGastoAnual($ano,['Indemnizaciones'],$listaCentroCostos,$listaEmpresasEugcom);

        // Mat. E Insumos Varios
        $informe['Mat. E Insumos Varios'] = self::ctrVerCuentaGastoAnual($ano,['Mat. E Insumos Varios'],$listaCentroCostos,$listaEmpresasEugcom);

        // Multas, Infracciones y Mermas
        $informe['Multas, Infracciones y Mermas'] = self::ctrVerCuentaGastoAnual($ano,['Multas, Infracciones y Mermas'],$listaCentroCostos,$listaEmpresasEugcom);

        // Patentes y D° Municipales
        $informe['Patentes y D° Municipales'] = self::ctrVerCuentaGastoAnual($ano,['Patentes y D° Municipales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Permisos de Circulación
        $informe['Permisos de Circulación'] = self::ctrVerCuentaGastoAnual($ano,['Permisos de Circulación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Remuneraciones y Gastos del Personal
        $informe['Remuneraciones y Gastos del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Remuneraciones y Gastos del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicios Administrativos
        $informe['Servicios Administrativos'] = self::ctrVerCuentaGastoAnual($ano,['Servicios Administrativos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicio de Alimentación
        $informe['Servicio de Alimentación'] = self::ctrVerCuentaGastoAnual($ano,['Servicio de Alimentación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicio de Vigilancia
        $informe['Servicio de Vigilancia'] = self::ctrVerCuentaGastoAnual($ano,['Servicio de Vigilancia'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicios Técnicos Industriales
        $informe['Servicios Técnicos Industriales'] = self::ctrVerCuentaGastoAnual($ano,['Servicios Técnicos Industriales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Sistemas TI y Software
        $informe['Sistemas TI y Software'] = self::ctrVerCuentaGastoAnual($ano,['Sistemas TI y Software'],$listaCentroCostos,$listaEmpresasEugcom);

        // Transporte Combustibles
        $informe['Transporte Combustibles'] = self::ctrVerCuentaGastoAnual($ano,['Transporte Combustibles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Transporte del Personal
        $informe['Transporte del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Transporte del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Vacaciones Personal
        $informe['Vacaciones Personal'] = self::ctrVerCuentaGastoAnual($ano,['Vacaciones Personal'],$listaCentroCostos,$listaEmpresasEugcom);

            //Total Costo Directo

        $informe['Total Costo Directo'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Inmuebles',
            'Arriendo Maquinarias Propias','Arriendo Maquinarias','Arriendo Vehiculos',
            'Alojamiento y Pensión','Combustible','Comunicaciones',
            'Contratista','Correc. Monetaria','Demovilización Faenas',
            'Depreciacion Activo','Gastos de Viaje y Representación',
            'Gastos Generales','Indemnizaciones','Mat. E Insumos Varios',
            'Multas, Infracciones y Mermas','Patentes y D° Municipales',
            'Permisos de Circulación','Remuneraciones y Gastos del Personal',
            'Servicios Administrativos','Servicio de Alimentación',
            'Servicio de Vigilancia','Servicios Técnicos Industriales',
            'Sistemas TI y Software','Transporte Combustibles',
            'Transporte del Personal','Vacaciones Personal'],$listaCentroCostos,$listaEmpresasEugcom);




        //Resultados Operacionales
        $tmp1 = array(
            1 =>   ((($informe['Ingresos de Explotación'][0][1]+$informe['Total Costo Directo'][0][1]))==0?null:($informe['Ingresos de Explotación'][0][1]+$informe['Total Costo Directo'][0][1])),
            2 =>   ((($informe['Ingresos de Explotación'][0][2]+$informe['Total Costo Directo'][0][2]))==0?null:($informe['Ingresos de Explotación'][0][2]+$informe['Total Costo Directo'][0][2])),
            3 =>   ((($informe['Ingresos de Explotación'][0][3]+$informe['Total Costo Directo'][0][3]))==0?null:($informe['Ingresos de Explotación'][0][3]+$informe['Total Costo Directo'][0][3])),
            4 =>   ((($informe['Ingresos de Explotación'][0][4]+$informe['Total Costo Directo'][0][4]))==0?null:($informe['Ingresos de Explotación'][0][4]+$informe['Total Costo Directo'][0][4])),
            5 =>   ((($informe['Ingresos de Explotación'][0][5]+$informe['Total Costo Directo'][0][5]))==0?null:($informe['Ingresos de Explotación'][0][5]+$informe['Total Costo Directo'][0][5])),
            6 =>   ((($informe['Ingresos de Explotación'][0][6]+$informe['Total Costo Directo'][0][6]))==0?null:($informe['Ingresos de Explotación'][0][6]+$informe['Total Costo Directo'][0][6])),
            7 =>   ((($informe['Ingresos de Explotación'][0][7]+$informe['Total Costo Directo'][0][7]))==0?null:($informe['Ingresos de Explotación'][0][7]+$informe['Total Costo Directo'][0][7])),
            8 =>   ((($informe['Ingresos de Explotación'][0][8]+$informe['Total Costo Directo'][0][8]))==0?null:($informe['Ingresos de Explotación'][0][8]+$informe['Total Costo Directo'][0][8])),
            9 =>   ((($informe['Ingresos de Explotación'][0][9]+$informe['Total Costo Directo'][0][9]))==0?null:($informe['Ingresos de Explotación'][0][9]+$informe['Total Costo Directo'][0][9])),
            10 =>   ((($informe['Ingresos de Explotación'][0][10]+$informe['Total Costo Directo'][0][10]))==0?null:($informe['Ingresos de Explotación'][0][10]+$informe['Total Costo Directo'][0][10])),
            11 =>   ((($informe['Ingresos de Explotación'][0][11]+$informe['Total Costo Directo'][0][11]))==0?null:($informe['Ingresos de Explotación'][0][11]+$informe['Total Costo Directo'][0][11])),
            12 =>   ((($informe['Ingresos de Explotación'][0][12]+$informe['Total Costo Directo'][0][12]))==0?null:($informe['Ingresos de Explotación'][0][12]+$informe['Total Costo Directo'][0][12])),
        );
        $totRes = 0;
        foreach ($tmp1 as $row)
        {
            $totRes = $totRes + $row;
        }
        $tmp1[13] = $totRes;
        $informe['Resultados Operacionales'][0] = $tmp1;

        // Margen de Contribución (%)
        $tmp2 = array(
            1 =>   ((($informe['Resultados Operacionales'][0][1]/$informe['Ingresos de Explotación'][0][1]))==0?null:round(($informe['Resultados Operacionales'][0][1]/$informe['Ingresos de Explotación'][0][1])*100,1)),
            2 =>   ((($informe['Resultados Operacionales'][0][2]/$informe['Ingresos de Explotación'][0][2]))==0?null:round(($informe['Resultados Operacionales'][0][2]/$informe['Ingresos de Explotación'][0][2])*100,1)),
            3 =>   ((($informe['Resultados Operacionales'][0][3]/$informe['Ingresos de Explotación'][0][3]))==0?null:round(($informe['Resultados Operacionales'][0][3]/$informe['Ingresos de Explotación'][0][3])*100,1)),
            4 =>   ((($informe['Resultados Operacionales'][0][4]/$informe['Ingresos de Explotación'][0][4]))==0?null:round(($informe['Resultados Operacionales'][0][4]/$informe['Ingresos de Explotación'][0][4])*100,1)),
            5 =>   ((($informe['Resultados Operacionales'][0][5]/$informe['Ingresos de Explotación'][0][5]))==0?null:round(($informe['Resultados Operacionales'][0][5]/$informe['Ingresos de Explotación'][0][5])*100,1)),
            6 =>   ((($informe['Resultados Operacionales'][0][6]/$informe['Ingresos de Explotación'][0][6]))==0?null:round(($informe['Resultados Operacionales'][0][6]/$informe['Ingresos de Explotación'][0][6])*100,1)),
            7 =>   ((($informe['Resultados Operacionales'][0][7]/$informe['Ingresos de Explotación'][0][7]))==0?null:round(($informe['Resultados Operacionales'][0][7]/$informe['Ingresos de Explotación'][0][7])*100,1)),
            8 =>   ((($informe['Resultados Operacionales'][0][8]/$informe['Ingresos de Explotación'][0][8]))==0?null:round(($informe['Resultados Operacionales'][0][8]/$informe['Ingresos de Explotación'][0][8])*100,1)),
            9 =>   ((($informe['Resultados Operacionales'][0][9]/$informe['Ingresos de Explotación'][0][9]))==0?null:round(($informe['Resultados Operacionales'][0][9]/$informe['Ingresos de Explotación'][0][9])*100,1)),
            10 =>   ((($informe['Resultados Operacionales'][0][10]/$informe['Ingresos de Explotación'][0][10]))==0?null:round(($informe['Resultados Operacionales'][0][10]/$informe['Ingresos de Explotación'][0][10])*100,1)),
            11 =>   ((($informe['Resultados Operacionales'][0][11]/$informe['Ingresos de Explotación'][0][11]))==0?null:round(($informe['Resultados Operacionales'][0][11]/$informe['Ingresos de Explotación'][0][11])*100,1)),
            12 =>   ((($informe['Resultados Operacionales'][0][12]/$informe['Ingresos de Explotación'][0][12]))==0?null:round(($informe['Resultados Operacionales'][0][12]/$informe['Ingresos de Explotación'][0][12])*100,1)),
        );

        $tmp2[13] = round(($informe['Resultados Operacionales'][0][13]/$informe['Ingresos de Explotación'][0][13])*100,1);
        // Elimina numero NAN
        $tmp22 = array(
            1 =>   is_nan($tmp2[1])?'':$tmp2[1],
            2 =>   is_nan($tmp2[2])?'':$tmp2[2],
            3 =>   is_nan($tmp2[3])?'':$tmp2[3],
            4 =>   is_nan($tmp2[4])?'':$tmp2[4],
            5 =>   is_nan($tmp2[5])?'':$tmp2[5],
            6 =>   is_nan($tmp2[6])?'':$tmp2[6],
            7 =>   is_nan($tmp2[7])?'':$tmp2[7],
            8 =>   is_nan($tmp2[8])?'':$tmp2[8],
            9 =>   is_nan($tmp2[9])?'':$tmp2[9],
            10 =>  is_nan($tmp2[10])?'':$tmp2[10],
            11 =>  is_nan($tmp2[11])?'':$tmp2[11],
            12 =>  is_nan($tmp2[12])?'':$tmp2[12],
            13 =>  is_nan($tmp2[13])?'':$tmp2[13]
        );

        $informe['Margen de Contribución (%)'][0] = $tmp22;



        //Gastos Adm. y Ventas
        $informe['Gastos Adm. y Ventas'][0] = self::ctrVerGAVObra($ano,$informe['Ingresos de Explotación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Total Resultado
        $tmp = array(
          1 =>   ((($informe['Ingresos de Explotación'][0][1]+$informe['Total Costo Directo'][0][1]) + $informe['Gastos Adm. y Ventas'][0][1])==0?null:($informe['Ingresos de Explotación'][0][1]+$informe['Total Costo Directo'][0][1]) + $informe['Gastos Adm. y Ventas'][0][1]),
            2 =>   ((($informe['Ingresos de Explotación'][0][2]+$informe['Total Costo Directo'][0][2]) + $informe['Gastos Adm. y Ventas'][0][2])==0?null:($informe['Ingresos de Explotación'][0][2]+$informe['Total Costo Directo'][0][2]) + $informe['Gastos Adm. y Ventas'][0][2]),
            3 =>   ((($informe['Ingresos de Explotación'][0][3]+$informe['Total Costo Directo'][0][3]) + $informe['Gastos Adm. y Ventas'][0][3])==0?null:($informe['Ingresos de Explotación'][0][3]+$informe['Total Costo Directo'][0][3]) + $informe['Gastos Adm. y Ventas'][0][3]),
            4 =>   ((($informe['Ingresos de Explotación'][0][4]+$informe['Total Costo Directo'][0][4]) + $informe['Gastos Adm. y Ventas'][0][4])==0?null:($informe['Ingresos de Explotación'][0][4]+$informe['Total Costo Directo'][0][4]) + $informe['Gastos Adm. y Ventas'][0][4]),
            5 =>   ((($informe['Ingresos de Explotación'][0][5]+$informe['Total Costo Directo'][0][5]) + $informe['Gastos Adm. y Ventas'][0][5])==0?null:($informe['Ingresos de Explotación'][0][5]+$informe['Total Costo Directo'][0][5]) + $informe['Gastos Adm. y Ventas'][0][5]),
            6 =>   ((($informe['Ingresos de Explotación'][0][6]+$informe['Total Costo Directo'][0][6]) + $informe['Gastos Adm. y Ventas'][0][6])==0?null:($informe['Ingresos de Explotación'][0][6]+$informe['Total Costo Directo'][0][6]) + $informe['Gastos Adm. y Ventas'][0][6]),
            7 =>   ((($informe['Ingresos de Explotación'][0][7]+$informe['Total Costo Directo'][0][7]) + $informe['Gastos Adm. y Ventas'][0][7])==0?null:($informe['Ingresos de Explotación'][0][7]+$informe['Total Costo Directo'][0][7]) + $informe['Gastos Adm. y Ventas'][0][7]),
            8 =>   ((($informe['Ingresos de Explotación'][0][8]+$informe['Total Costo Directo'][0][8]) + $informe['Gastos Adm. y Ventas'][0][8])==0?null:($informe['Ingresos de Explotación'][0][8]+$informe['Total Costo Directo'][0][8]) + $informe['Gastos Adm. y Ventas'][0][8]),
            9 =>   ((($informe['Ingresos de Explotación'][0][9]+$informe['Total Costo Directo'][0][9]) + $informe['Gastos Adm. y Ventas'][0][9])==0?null:($informe['Ingresos de Explotación'][0][9]+$informe['Total Costo Directo'][0][9]) + $informe['Gastos Adm. y Ventas'][0][9]),
            10 =>   ((($informe['Ingresos de Explotación'][0][10]+$informe['Total Costo Directo'][0][10]) + $informe['Gastos Adm. y Ventas'][0][10])==0?null:($informe['Ingresos de Explotación'][0][10]+$informe['Total Costo Directo'][0][10]) + $informe['Gastos Adm. y Ventas'][0][10]),
            11 =>   ((($informe['Ingresos de Explotación'][0][11]+$informe['Total Costo Directo'][0][11]) + $informe['Gastos Adm. y Ventas'][0][11])==0?null:($informe['Ingresos de Explotación'][0][11]+$informe['Total Costo Directo'][0][11]) + $informe['Gastos Adm. y Ventas'][0][11]),
            12 =>   ((($informe['Ingresos de Explotación'][0][12]+$informe['Total Costo Directo'][0][12]) + $informe['Gastos Adm. y Ventas'][0][12])==0?null:($informe['Ingresos de Explotación'][0][12]+$informe['Total Costo Directo'][0][12]) + $informe['Gastos Adm. y Ventas'][0][12]),
        );

        $totRes = 0;
        foreach ($tmp as $row)
        {
            $totRes = $totRes + $row;
        }
        $tmp[13] = $totRes;

        $informe['Total Resultado'][0] = $tmp;


        return $informe;

    }

    public static function ctrVerAdmVentas($ano,$listaCentroCostos,$listaEmpresasEugcom)
    {
        $informe = array();


        // Arriendo Inmuebles
        $informe['Arriendo Inmuebles'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Inmuebles'],$listaCentroCostos,$listaEmpresasEugcom);



        // Arriendo Maquinarias Propias
        $informe['Arriendo Maquinarias Propias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias Propias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Vehiculos
        $informe['Arriendo Vehiculos'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Vehiculos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Alojamiento y Pensión
        $informe['Alojamiento y Pensión'] = self::ctrVerCuentaGastoAnual($ano,['Alojamiento y Pensión'],$listaCentroCostos,$listaEmpresasEugcom);

        // Combustible
        $informe['Combustible'] = self::ctrVerCuentaGastoAnual($ano,['Combustible'],$listaCentroCostos,$listaEmpresasEugcom);

        // Comunicaciones
        $informe['Comunicaciones'] = self::ctrVerCuentaGastoAnual($ano,['Comunicaciones'],$listaCentroCostos,$listaEmpresasEugcom);

        // Contratista
        $informe['Contratista'] = self::ctrVerCuentaGastoAnual($ano,['Contratista'],$listaCentroCostos,$listaEmpresasEugcom);



        // Depreciacion Activo
        $informe['Depreciacion Activo'] = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activo'],$listaCentroCostos,$listaEmpresasEugcom);



        // Gastos de Viaje y Representación
        $informe['Gastos de Viaje y Representación'] = self::ctrVerCuentaGastoAnual($ano,['Gastos de Viaje y Representación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Generales
        $informe['Gastos Generales'] = self::ctrVerCuentaGastoAnual($ano,['Gastos Generales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Indemnizaciones
        $informe['Indemnizaciones'] = self::ctrVerCuentaGastoAnual($ano,['Indemnizaciones'],$listaCentroCostos,$listaEmpresasEugcom);

        // Mat. E Insumos Varios
        $informe['Mat. E Insumos Varios'] = self::ctrVerCuentaGastoAnual($ano,['Mat. E Insumos Varios'],$listaCentroCostos,$listaEmpresasEugcom);

        // Multas, Infracciones y Mermas
        $informe['Multas, Infracciones y Mermas'] = self::ctrVerCuentaGastoAnual($ano,['Multas, Infracciones y Mermas'],$listaCentroCostos,$listaEmpresasEugcom);

        // Patentes y D° Municipales
        $informe['Patentes y D° Municipales'] = self::ctrVerCuentaGastoAnual($ano,['Patentes y D° Municipales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Permisos de Circulación
        $informe['Permisos de Circulación'] = self::ctrVerCuentaGastoAnual($ano,['Permisos de Circulación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Remuneraciones y Gastos del Personal
        $informe['Remuneraciones y Gastos del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Remuneraciones y Gastos del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicios Administrativos
        $informe['Servicios Administrativos'] = self::ctrVerCuentaGastoAnual($ano,['Servicios Administrativos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicio de Alimentación
        $informe['Servicio de Alimentación'] = self::ctrVerCuentaGastoAnual($ano,['Servicio de Alimentación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicio de Vigilancia
        $informe['Servicio de Vigilancia'] = self::ctrVerCuentaGastoAnual($ano,['Servicio de Vigilancia'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicios Técnicos Industriales
        $informe['Servicios Técnicos Industriales'] = self::ctrVerCuentaGastoAnual($ano,['Servicios Técnicos Industriales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Seguros Generales
        $informe['Seguros Generales'] = self::ctrVerCuentaGastoAnual($ano,['Seguros Generales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Suministros Básicos
        $informe['Suministros Básicos'] = self::ctrVerCuentaGastoAnual($ano,['Suministros Básicos'],$listaCentroCostos,$listaEmpresasEugcom);



        // Sistemas TI y Software
        $informe['Sistemas TI y Software'] = self::ctrVerCuentaGastoAnual($ano,['Sistemas TI y Software'],$listaCentroCostos,$listaEmpresasEugcom);

        // Transporte Combustibles
        $informe['Transporte Combustibles'] = self::ctrVerCuentaGastoAnual($ano,['Transporte Combustibles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Transporte del Personal
        $informe['Transporte del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Transporte del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Vacaciones Personal
        $informe['Vacaciones Personal'] = self::ctrVerCuentaGastoAnual($ano,['Vacaciones Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        //Total Costo Directo

        $informe['Total Costo Directo'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Inmuebles',
            'Arriendo Maquinarias Propias','Arriendo Vehiculos',
            'Alojamiento y Pensión','Combustible','Comunicaciones',
            'Contratista',
            'Depreciacion Activo','Gastos de Viaje y Representación',
            'Gastos Generales','Indemnizaciones','Mat. E Insumos Varios',
            'Multas, Infracciones y Mermas','Patentes y D° Municipales',
            'Permisos de Circulación','Remuneraciones y Gastos del Personal',
            'Servicios Administrativos','Servicio de Alimentación',
            'Servicio de Vigilancia','Servicios Técnicos Industriales',
            'Sistemas TI y Software','Transporte Combustibles',
            'Transporte del Personal','Vacaciones Personal','Seguros Generales','Suministros Básicos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Correc. Monetaria
        $informe['Correc. Monetaria'] = self::ctrVerCuentaGastoAnual($ano,['Correc. Monetaria'],$listaCentroCostos,$listaEmpresasEugcom);

        // Costo Venta Act. Fijo
        $informe['Costo Venta Act. Fijo'] = self::ctrVerCuentaGastoAnual($ano,['Costo Venta Act. Fijo'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Bancarios
        $informe['Gastos Bancarios'] = self::ctrVerCuentaGastoAnual($ano,['Gastos Bancarios'],$listaCentroCostos,$listaEmpresasEugcom);

        // Impuesto Renta
        $informe['Impuesto Renta'] = self::ctrVerCuentaGastoAnual($ano,['Impuesto Renta'],$listaCentroCostos,$listaEmpresasEugcom);

        // Otros Ingresos
        $informe['Otros Ingresos'] = self::ctrVerCuentaGastoAnual($ano,['Otros Ingresos'],$listaCentroCostos,$listaEmpresasEugcom);


        // Otros Ingresos / Egresos / Impto.
        $informe['Otros Ingresos / Egresos / Impto.'] = self::ctrVerCuentaGastoAnual($ano,['Otros Ingresos','Impuesto Renta','Gastos Bancarios','Costo Venta Act. Fijo','Correc. Monetaria'],$listaCentroCostos,$listaEmpresasEugcom);
        return $informe;

    }

    public static function ctrVerMantencion($ano,$listaCentroCostos,$listaEmpresasEugcom)
    {
        $informe = array();


        // Arriendo Maquinarias
        $informe['Arriendo Maquinarias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Maquinarias Propias
        $informe['Arriendo Maquinarias Propias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias Propias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Vehiculos
        $informe['Arriendo Vehiculos'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Vehiculos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Alojamiento y Pensión
        $informe['Alojamiento y Pensión'] = self::ctrVerCuentaGastoAnual($ano,['Alojamiento y Pensión'],$listaCentroCostos,$listaEmpresasEugcom);

        // Combustible
        $informe['Combustible'] = self::ctrVerCuentaGastoAnual($ano,['Combustible'],$listaCentroCostos,$listaEmpresasEugcom);

        // Comunicaciones
        $informe['Comunicaciones'] = self::ctrVerCuentaGastoAnual($ano,['Comunicaciones'],$listaCentroCostos,$listaEmpresasEugcom);

        // Contratista
        $informe['Contratista'] = self::ctrVerCuentaGastoAnual($ano,['Contratista'],$listaCentroCostos,$listaEmpresasEugcom);

        // Correc. Monetaria
        $informe['Correc. Monetaria'] = self::ctrVerCuentaGastoAnual($ano,['Correc. Monetaria'],$listaCentroCostos,$listaEmpresasEugcom);



        // Depreciacion Activo
        $informe['Depreciacion Activo'] = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activo'],$listaCentroCostos,$listaEmpresasEugcom);

        // Depreciacion Activos Leasing
        $informe['Depreciacion Activos Leasing'] = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activos Leasing'],$listaCentroCostos,$listaEmpresasEugcom);

        // Flete Maquinarias
        $informe['Flete Maquinarias'] = self::ctrVerCuentaGastoAnual($ano,['Flete Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);



        // Gastos de Viaje y Representación
        $informe['Gastos de Viaje y Representación'] = self::ctrVerCuentaGastoAnual($ano,['Gastos de Viaje y Representación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Financieros
        $informe['Gastos Financieros'] = self::ctrVerCuentaGastoAnual($ano,['Gastos Financieros'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Generales
        $informe['Gastos Generales'] = self::ctrVerCuentaGastoAnual($ano,['Gastos Generales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Mantención Equipos Móviles
        $informe['Mantención Equipos Móviles'] = self::ctrVerCuentaGastoAnual($ano,['Mantención Equipos Móviles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Mat. E Insumos Varios
        $informe['Mat. E Insumos Varios'] = self::ctrVerCuentaGastoAnual($ano,['Mat. E Insumos Varios'],$listaCentroCostos,$listaEmpresasEugcom);

        // Multas, Infracciones y Mermas
        $informe['Multas, Infracciones y Mermas'] = self::ctrVerCuentaGastoAnual($ano,['Multas, Infracciones y Mermas'],$listaCentroCostos,$listaEmpresasEugcom);

        // Neumáticos
        $informe['Neumáticos'] = self::ctrVerCuentaGastoAnual($ano,['Neumáticos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Otros Ingresos
        $informe['Otros Ingresos'] = self::ctrVerCuentaGastoAnual($ano,['Otros Ingresos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Permisos de Circulación
        $informe['Permisos de Circulación'] = self::ctrVerCuentaGastoAnual($ano,['Permisos de Circulación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Remuneraciones y Gastos del Personal
        $informe['Remuneraciones y Gastos del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Remuneraciones y Gastos del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Reparación Equipos Móviles
        $informe['Reparación Equipos Móviles'] = self::ctrVerCuentaGastoAnual($ano,['Reparación Equipos Móviles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Seguros Generales
        $informe['Seguros Generales'] = self::ctrVerCuentaGastoAnual($ano,['Seguros Generales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicio Mant. Full Service
        $informe['Servicio Mant. Full Service'] = self::ctrVerCuentaGastoAnual($ano,['Servicio Mant. Full Service'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicios Técnicos Industriales
        $informe['Servicios Técnicos Industriales'] = self::ctrVerCuentaGastoAnual($ano,['Servicios Técnicos Industriales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Transporte Combustibles
        $informe['Transporte Combustibles'] = self::ctrVerCuentaGastoAnual($ano,['Transporte Combustibles'],$listaCentroCostos,$listaEmpresasEugcom);


        // Transporte del Personal
        $informe['Transporte del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Transporte del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Vacaciones Personal
        $informe['Vacaciones Personal'] = self::ctrVerCuentaGastoAnual($ano,['Vacaciones Personal'],$listaCentroCostos,$listaEmpresasEugcom);




        //Total Costo Directo

        $informe['Total Costo Directo'] = self::ctrVerCuentaGastoAnual($ano,[
            'Arriendo Maquinarias',
            'Arriendo Maquinarias Propias',
            'Arriendo Vehiculos',
            'Alojamiento y Pensión',
            'Combustible',
            'Comunicaciones',
            'Contratista',
            'Correc. Monetaria',
            'Depreciacion Activo',
            'Depreciacion Activos Leasing',
            'Flete Maquinarias',
            'Gastos de Viaje y Representación',
            'Gastos Financieros',
            'Gastos Generales',
            'Mantención Equipos Móviles',
            'Mat. E Insumos Varios',
            'Multas, Infracciones y Mermas',
            'Neumáticos',
            'Otros Ingresos',
            'Permisos de Circulación',
            'Remuneraciones y Gastos del Personal',
            'Reparación Equipos Móviles',
            'Seguros Generales',
            'Servicio Mant. Full Service',
            'Servicios Técnicos Industriales',
            'Transporte Combustibles',
            'Transporte del Personal',
            'Vacaciones Personal'],$listaCentroCostos,$listaEmpresasEugcom);


        return $informe;

    }

    public static function ctrVerMaquinaria($ano,$listaCentroCostos,$listaEmpresasEugcom)
    {
        $informe = array();

        // Ingresos - Fijo
        $informe['Ingresos de Posicionamiento'] = self::ctrVerIngresosFijos($ano);

        // Ingresos - Variables
        $informe['Ingresos de Operación'] = self::ctrVerIngresosVariables($ano);

        // Ingresos - Descuento Disponibilidad
        $informe['Descuento Disponibilidad'] = self::ctrVerDescDisponibilidad($ano);



        $informe['Ingresos de Explotación'] = self::ctrVerResOperacional($informe['Ingresos de Posicionamiento'][0],$informe['Ingresos de Operación'][0],$informe['Descuento Disponibilidad'][0],$ano);



        // Arriendo Maquinarias
        $informe['Arriendo Maquinarias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Maquinarias Propias
        $informe['Arriendo Maquinarias Propias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias Propias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Vehiculos
        $informe['Arriendo Vehiculos'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Vehiculos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Alojamiento y Pensión
        $informe['Alojamiento y Pensión'] = self::ctrVerCuentaGastoAnual($ano,['Alojamiento y Pensión'],$listaCentroCostos,$listaEmpresasEugcom);

        // Combustible
        $informe['Combustible'] = self::ctrVerCuentaGastoAnual($ano,['Combustible'],$listaCentroCostos,$listaEmpresasEugcom);

        // Comunicaciones
        $informe['Comunicaciones'] = self::ctrVerCuentaGastoAnual($ano,['Comunicaciones'],$listaCentroCostos,$listaEmpresasEugcom);

        // Contratista
        $informe['Contratista'] = self::ctrVerCuentaGastoAnual($ano,['Contratista'],$listaCentroCostos,$listaEmpresasEugcom);

        // Correc. Monetaria
        $informe['Correc. Monetaria'] = self::ctrVerCuentaGastoAnual($ano,['Correc. Monetaria'],$listaCentroCostos,$listaEmpresasEugcom);



        // Depreciacion Activo
        $informe['Depreciacion Activo'] = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activo'],$listaCentroCostos,$listaEmpresasEugcom);

        // Depreciacion Activos Leasing
        $informe['Depreciacion Activos Leasing'] = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activos Leasing'],$listaCentroCostos,$listaEmpresasEugcom);

        // Flete Maquinarias
        $informe['Flete Maquinarias'] = self::ctrVerCuentaGastoAnual($ano,['Flete Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);



        // Gastos de Viaje y Representación
        $informe['Gastos de Viaje y Representación'] = self::ctrVerCuentaGastoAnual($ano,['Gastos de Viaje y Representación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Financieros
        $informe['Gastos Financieros'] = self::ctrVerCuentaGastoAnual($ano,['Intereses','Gastos Bancarios','Intereses Leasing'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Generales
        $informe['Gastos Generales'] = self::ctrVerCuentaGastoAnual($ano,['Gastos Generales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Intereses Leasing
        $informe['Intereses Leasing'] = self::ctrVerCuentaGastoAnual($ano,['Intereses Leasing'],$listaCentroCostos,$listaEmpresasEugcom);

        // Mantención Equipos Móviles
        $informe['Mantención Equipos Móviles'] = self::ctrVerCuentaGastoAnual($ano,['Mantención Equipos Móviles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Mat. E Insumos Varios
        $informe['Mat. E Insumos Varios'] = self::ctrVerCuentaGastoAnual($ano,['Mat. E Insumos Varios'],$listaCentroCostos,$listaEmpresasEugcom);

        // Multas, Infracciones y Mermas
        $informe['Multas, Infracciones y Mermas'] = self::ctrVerCuentaGastoAnual($ano,['Multas, Infracciones y Mermas'],$listaCentroCostos,$listaEmpresasEugcom);

        // Neumáticos
        $informe['Neumáticos'] = self::ctrVerCuentaGastoAnual($ano,['Neumáticos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Otros Ingresos
        $informe['Otros Ingresos'] = self::ctrVerCuentaGastoAnual($ano,['Otros Ingresos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Permisos de Circulación
        $informe['Permisos de Circulación'] = self::ctrVerCuentaGastoAnual($ano,['Permisos de Circulación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Remuneraciones y Gastos del Personal
        $informe['Remuneraciones y Gastos del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Remuneraciones y Gastos del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Reparación Equipos Móviles
        $informe['Reparación Equipos Móviles'] = self::ctrVerCuentaGastoAnual($ano,['Reparación Equipos Móviles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Seguros Generales
        $informe['Seguros Generales'] = self::ctrVerCuentaGastoAnual($ano,['Seguros Generales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicio Mant. Full Service
        $informe['Servicio Mant. Full Service'] = self::ctrVerCuentaGastoAnual($ano,['Servicio Mant. Full Service'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicios Técnicos Industriales
        $informe['Servicios Técnicos Industriales'] = self::ctrVerCuentaGastoAnual($ano,['Servicios Técnicos Industriales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Transporte Combustibles
        $informe['Transporte Combustibles'] = self::ctrVerCuentaGastoAnual($ano,['Transporte Combustibles'],$listaCentroCostos,$listaEmpresasEugcom);


        // Transporte del Personal
        $informe['Transporte del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Transporte del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Vacaciones Personal
        $informe['Vacaciones Personal'] = self::ctrVerCuentaGastoAnual($ano,['Vacaciones Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        //Total Costo Directo

        $informe['Total Costo Directo'] = self::ctrVerCuentaGastoAnual($ano,[
            'Arriendo Maquinarias',
            'Arriendo Maquinarias Propias',
            'Arriendo Vehiculos',
            'Alojamiento y Pensión',
            'Combustible',
            'Comunicaciones',
            'Contratista',
            'Correc. Monetaria',
            'Depreciacion Activo',
            'Depreciacion Activos Leasing',
            'Flete Maquinarias',
            'Gastos de Viaje y Representación',
            'Gastos Financieros',
            'Gastos Generales',
            'Mantención Equipos Móviles',
            'Mat. E Insumos Varios',
            'Multas, Infracciones y Mermas',
            'Neumáticos',
            'Otros Ingresos',
            'Permisos de Circulación',
            'Remuneraciones y Gastos del Personal',
            'Reparación Equipos Móviles',
            'Seguros Generales',
            'Servicio Mant. Full Service',
            'Servicios Técnicos Industriales',
            'Transporte Combustibles',
            'Transporte del Personal',
            'Vacaciones Personal',
            'Intereses Leasing','Intereses','Gastos Bancarios','Intereses Leasing'],$listaCentroCostos,$listaEmpresasEugcom);

        $informe['Costo Mantención'] = self::ctrVerCuentaGastoAnual($ano,[
            'Arriendo Maquinarias',
            'Arriendo Maquinarias Propias',
            'Arriendo Vehiculos',
            'Alojamiento y Pensión',
            'Combustible',
            'Comunicaciones',
            'Contratista',
            'Correc. Monetaria',
            'Depreciacion Activo',
            'Depreciacion Activos Leasing',
            'Flete Maquinarias',
            'Gastos de Viaje y Representación',
            'Gastos Financieros',
            'Gastos Generales',
            'Mantención Equipos Móviles',
            'Mat. E Insumos Varios',
            'Multas, Infracciones y Mermas',
            'Neumáticos',
            'Otros Ingresos',
            'Permisos de Circulación',
            'Remuneraciones y Gastos del Personal',
            'Reparación Equipos Móviles',
            'Seguros Generales',
            'Servicio Mant. Full Service',
            'Servicios Técnicos Industriales',
            'Transporte Combustibles',
            'Transporte del Personal',
            'Vacaciones Personal',
            'Intereses Leasing'],[30],$listaEmpresasEugcom);


        $informe['Margen de Contribución'][0]= array(
            1 => ($informe['Ingresos de Explotación'][0][1]+$informe['Costo Mantención'][0][1]+ $informe['Total Costo Directo'][0][1])==0?null:($informe['Ingresos de Explotación'][0][1]+$informe['Costo Mantención'][0][1]+ $informe['Total Costo Directo'][0][1]),
            2 => ($informe['Ingresos de Explotación'][0][2]+$informe['Costo Mantención'][0][2]+ $informe['Total Costo Directo'][0][2])==0?null:($informe['Ingresos de Explotación'][0][2]+$informe['Costo Mantención'][0][2]+ $informe['Total Costo Directo'][0][2]),
            3 => ($informe['Ingresos de Explotación'][0][3]+$informe['Costo Mantención'][0][3]+ $informe['Total Costo Directo'][0][3])==0?null:($informe['Ingresos de Explotación'][0][3]+$informe['Costo Mantención'][0][3]+ $informe['Total Costo Directo'][0][3]),
            4 => ($informe['Ingresos de Explotación'][0][4]+$informe['Costo Mantención'][0][4]+ $informe['Total Costo Directo'][0][4])==0?null:($informe['Ingresos de Explotación'][0][4]+$informe['Costo Mantención'][0][4]+ $informe['Total Costo Directo'][0][4]),
            5 => ($informe['Ingresos de Explotación'][0][5]+$informe['Costo Mantención'][0][5]+ $informe['Total Costo Directo'][0][5])==0?null:($informe['Ingresos de Explotación'][0][5]+$informe['Costo Mantención'][0][5]+ $informe['Total Costo Directo'][0][5]),
            6 => ($informe['Ingresos de Explotación'][0][6]+$informe['Costo Mantención'][0][6]+ $informe['Total Costo Directo'][0][6])==0?null:($informe['Ingresos de Explotación'][0][6]+$informe['Costo Mantención'][0][6]+ $informe['Total Costo Directo'][0][6]),
            7 => ($informe['Ingresos de Explotación'][0][7]+$informe['Costo Mantención'][0][7]+ $informe['Total Costo Directo'][0][7])==0?null:($informe['Ingresos de Explotación'][0][7]+$informe['Costo Mantención'][0][7]+ $informe['Total Costo Directo'][0][7]),
            8 => ($informe['Ingresos de Explotación'][0][8]+$informe['Costo Mantención'][0][8]+ $informe['Total Costo Directo'][0][8])==0?null:($informe['Ingresos de Explotación'][0][8]+$informe['Costo Mantención'][0][8]+ $informe['Total Costo Directo'][0][8]),
            9 => ($informe['Ingresos de Explotación'][0][9]+$informe['Costo Mantención'][0][9]+ $informe['Total Costo Directo'][0][9])==0?null:($informe['Ingresos de Explotación'][0][9]+informe['Costo Mantención'][0][9]+ $informe['Total Costo Directo'][0][9]),
            10 => ($informe['Ingresos de Explotación'][0][10]+$informe['Costo Mantención'][0][10]+ $informe['Total Costo Directo'][0][10])==0?null:($informe['Ingresos de Explotación'][0][10]+$informe['Costo Mantención'][0][10]+ $informe['Total Costo Directo'][0][10]),
            11 => ($informe['Ingresos de Explotación'][0][11]+$informe['Costo Mantención'][0][11]+ $informe['Total Costo Directo'][0][11])==0?null:($informe['Ingresos de Explotación'][0][11]+$informe['Costo Mantención'][0][11]+ $informe['Total Costo Directo'][0][11]),
            12 => ($informe['Ingresos de Explotación'][0][12]+$informe['Costo Mantención'][0][12]+ $informe['Total Costo Directo'][0][12])==0?null:($informe['Ingresos de Explotación'][0][12]+$informe['Costo Mantención'][0][12]+ $informe['Total Costo Directo'][0][12]),
            13 =>$informe['Ingresos de Explotación'][0][13]+$informe['Costo Mantención'][0][13]+ $informe['Total Costo Directo'][0][13]
        );


        return $informe;
    }

    public static function ctrVerMaquinariaUSD($ano,$listaCentroCostos,$listaEmpresasEugcom,$dolar)
    {
        $informe = array();

        // Ingresos - Fijo
        $tmp_i1 = self::ctrVerIngresosFijos($ano);
        $informe['Ingresos de Posicionamiento'][0] = self::cuenaDolar($tmp_i1,$dolar);

        // Ingresos - Variables
        $tmp_i2 = self::ctrVerIngresosVariables($ano);
        $informe['Ingresos de Operación'][0] = self::cuenaDolar($tmp_i2,$dolar);

        // Ingresos - Descuento Disponibilidad
        $tmp_i3 = self::ctrVerDescDisponibilidad($ano);
        $informe['Descuento Disponibilidad'][0] = self::cuenaDolar($tmp_i3,$dolar);


        $tmp = self::ctrVerResOperacional($tmp_i1[0],$tmp_i2[0],$tmp_i3[0],$ano);
        $informe['Ingresos de Explotación'][0] = self::cuenaDolar($tmp,$dolar);


        // Arriendo Maquinarias
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Arriendo Maquinarias'][0] = self::cuenaDolar($tmp,$dolar);

        // Arriendo Maquinarias Propias
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias Propias'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Arriendo Maquinarias Propias'][0] = self::cuenaDolar($tmp,$dolar);

        // Arriendo Vehiculos
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Arriendo Vehiculos'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Arriendo Vehiculos'][0] =  self::cuenaDolar($tmp,$dolar);


        // Alojamiento y Pensión
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Alojamiento y Pensión'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Alojamiento y Pensión'][0] =  self::cuenaDolar($tmp,$dolar);

        // Combustible
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Combustible'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Combustible'][0] =  self::cuenaDolar($tmp,$dolar);

        // Comunicaciones
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Comunicaciones'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Comunicaciones'][0] =  self::cuenaDolar($tmp,$dolar);

        // Contratista
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Contratista'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Contratista'][0] =  self::cuenaDolar($tmp,$dolar);

        // Depreciacion Activo
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activo'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Depreciacion Activo'][0] =  self::cuenaDolar($tmp,$dolar);

        // Depreciacion Activos Leasing
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activos Leasing'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Depreciacion Activos Leasing'][0] =  self::cuenaDolar($tmp,$dolar);

        // Flete Maquinarias
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Flete Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Flete Maquinarias'][0] =  self::cuenaDolar($tmp,$dolar);


        // Gastos de Viaje y Representación
        $informe['Gastos de Viaje y Representación'] = self::ctrVerCuentaGastoAnual($ano,['Gastos de Viaje y Representación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Financieros
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Intereses','Gastos Bancarios','Intereses Leasing'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Gastos Financieros'][0] =  self::cuenaDolar($tmp,$dolar);

        // Gastos Generales
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Gastos Generales'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Gastos Generales'][0] =  self::cuenaDolar($tmp,$dolar);

        // Intereses Leasing
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Intereses Leasing'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Intereses Leasing'][0] =  self::cuenaDolar($tmp,$dolar);

        // Mantención Equipos Móviles
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Mantención Equipos Móviles'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Mantención Equipos Móviles'][0] =  self::cuenaDolar($tmp,$dolar);

        // Mat. E Insumos Varios
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Mat. E Insumos Varios'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Mat. E Insumos Varios'][0] =  self::cuenaDolar($tmp,$dolar);

        // Multas, Infracciones y Mermas
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Multas, Infracciones y Mermas'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Multas, Infracciones y Mermas'][0] =  self::cuenaDolar($tmp,$dolar);

        // Neumáticos
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Neumáticos'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Neumáticos'][0] =  self::cuenaDolar($tmp,$dolar);

        // Otros Ingresos
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Otros Ingresos'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Otros Ingresos'][0] =  self::cuenaDolar($tmp,$dolar);

        // Permisos de Circulación
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Permisos de Circulación'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Permisos de Circulación'][0] =  self::cuenaDolar($tmp,$dolar);

        // Remuneraciones y Gastos del Personal
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Remuneraciones y Gastos del Personal'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Remuneraciones y Gastos del Personal'][0] =  self::cuenaDolar($tmp,$dolar);

        // Reparación Equipos Móviles
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Reparación Equipos Móviles'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Reparación Equipos Móviles'][0] =  self::cuenaDolar($tmp,$dolar);

        // Seguros Generales
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Seguros Generales'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Seguros Generales'][0] =  self::cuenaDolar($tmp,$dolar);

        // Servicio Mant. Full Service
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Servicio Mant. Full Service'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Servicio Mant. Full Service'][0] =  self::cuenaDolar($tmp,$dolar);

        // Servicios Técnicos Industriales
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Servicios Técnicos Industriales'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Servicios Técnicos Industriales'][0] =  self::cuenaDolar($tmp,$dolar);

        // Transporte Combustibles
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Transporte Combustibles'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Transporte Combustibles'][0] =  self::cuenaDolar($tmp,$dolar);


        // Transporte del Personal
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Transporte del Personal'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Transporte del Personal'][0] =  self::cuenaDolar($tmp,$dolar);

        // Vacaciones Personal
        $tmp = self::ctrVerCuentaGastoAnual($ano,['Vacaciones Personal'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Vacaciones Personal'][0] =  self::cuenaDolar($tmp,$dolar);




        //Total Costo Directo

        $tmp = self::ctrVerCuentaGastoAnual($ano,[
            'Arriendo Maquinarias',
            'Arriendo Maquinarias Propias',
            'Alojamiento y Pensión',
            'Combustible',
            'Comunicaciones',
            'Contratista',
            'Depreciacion Activo',
            'Depreciacion Activos Leasing',
            'Flete Maquinarias',
            'Gastos de Viaje y Representación',
            'Gastos Financieros',
            'Gastos Generales',
            'Mantención Equipos Móviles',
            'Mat. E Insumos Varios',
            'Multas, Infracciones y Mermas',
            'Neumáticos',
            'Otros Ingresos',
            'Permisos de Circulación',
            'Remuneraciones y Gastos del Personal',
            'Reparación Equipos Móviles',
            'Seguros Generales',
            'Servicio Mant. Full Service',
            'Servicios Técnicos Industriales',
            'Transporte Combustibles',
            'Transporte del Personal',
            'Vacaciones Personal','Intereses','Gastos Bancarios','Intereses Leasing'],$listaCentroCostos,$listaEmpresasEugcom);
        $informe['Total Costo Directo'][0]  = self::cuenaDolar($tmp,$dolar);


        $tmp = self::ctrVerCuentaGastoAnual($ano,[
            'Arriendo Maquinarias',
            'Arriendo Maquinarias Propias',
            'Arriendo Vehiculos',
            'Alojamiento y Pensión',
            'Combustible',
            'Comunicaciones',
            'Contratista',
            'Correc. Monetaria',
            'Depreciacion Activo',
            'Depreciacion Activos Leasing',
            'Flete Maquinarias',
            'Gastos de Viaje y Representación',
            'Gastos Financieros',
            'Gastos Generales',
            'Mantención Equipos Móviles',
            'Mat. E Insumos Varios',
            'Multas, Infracciones y Mermas',
            'Neumáticos',
            'Otros Ingresos',
            'Permisos de Circulación',
            'Remuneraciones y Gastos del Personal',
            'Reparación Equipos Móviles',
            'Seguros Generales',
            'Servicio Mant. Full Service',
            'Servicios Técnicos Industriales',
            'Transporte Combustibles',
            'Transporte del Personal',
            'Vacaciones Personal',
            'Intereses Leasing'],[30],$listaEmpresasEugcom);
        $informe['Costo Mantención'][0]  = self::cuenaDolar($tmp,$dolar);


        $informe['Margen de Contribución'][0]= array(
            1 => ($informe['Ingresos de Explotación'][0][1]+$informe['Costo Mantención'][0][1]+ $informe['Total Costo Directo'][0][1])==0?null:($informe['Ingresos de Explotación'][0][1]+$informe['Costo Mantención'][0][1]+ $informe['Total Costo Directo'][0][1]),
            2 => ($informe['Ingresos de Explotación'][0][2]+$informe['Costo Mantención'][0][2]+ $informe['Total Costo Directo'][0][2])==0?null:($informe['Ingresos de Explotación'][0][2]+$informe['Costo Mantención'][0][2]+ $informe['Total Costo Directo'][0][2]),
            3 => ($informe['Ingresos de Explotación'][0][3]+$informe['Costo Mantención'][0][3]+ $informe['Total Costo Directo'][0][3])==0?null:($informe['Ingresos de Explotación'][0][3]+$informe['Costo Mantención'][0][3]+ $informe['Total Costo Directo'][0][3]),
            4 => ($informe['Ingresos de Explotación'][0][4]+$informe['Costo Mantención'][0][4]+ $informe['Total Costo Directo'][0][4])==0?null:($informe['Ingresos de Explotación'][0][4]+$informe['Costo Mantención'][0][4]+ $informe['Total Costo Directo'][0][4]),
            5 => ($informe['Ingresos de Explotación'][0][5]+$informe['Costo Mantención'][0][5]+ $informe['Total Costo Directo'][0][5])==0?null:($informe['Ingresos de Explotación'][0][5]+$informe['Costo Mantención'][0][5]+ $informe['Total Costo Directo'][0][5]),
            6 => ($informe['Ingresos de Explotación'][0][6]+$informe['Costo Mantención'][0][6]+ $informe['Total Costo Directo'][0][6])==0?null:($informe['Ingresos de Explotación'][0][6]+$informe['Costo Mantención'][0][6]+ $informe['Total Costo Directo'][0][6]),
            7 => ($informe['Ingresos de Explotación'][0][7]+$informe['Costo Mantención'][0][7]+ $informe['Total Costo Directo'][0][7])==0?null:($informe['Ingresos de Explotación'][0][7]+$informe['Costo Mantención'][0][7]+ $informe['Total Costo Directo'][0][7]),
            8 => ($informe['Ingresos de Explotación'][0][8]+$informe['Costo Mantención'][0][8]+ $informe['Total Costo Directo'][0][8])==0?null:($informe['Ingresos de Explotación'][0][8]+$informe['Costo Mantención'][0][8]+ $informe['Total Costo Directo'][0][8]),
            9 => ($informe['Ingresos de Explotación'][0][9]+$informe['Costo Mantención'][0][9]+ $informe['Total Costo Directo'][0][9])==0?null:($informe['Ingresos de Explotación'][0][9]+informe['Costo Mantención'][0][9]+ $informe['Total Costo Directo'][0][9]),
            10 => ($informe['Ingresos de Explotación'][0][10]+$informe['Costo Mantención'][0][10]+ $informe['Total Costo Directo'][0][10])==0?null:($informe['Ingresos de Explotación'][0][10]+$informe['Costo Mantención'][0][10]+ $informe['Total Costo Directo'][0][10]),
            11 => ($informe['Ingresos de Explotación'][0][11]+$informe['Costo Mantención'][0][11]+ $informe['Total Costo Directo'][0][11])==0?null:($informe['Ingresos de Explotación'][0][11]+$informe['Costo Mantención'][0][11]+ $informe['Total Costo Directo'][0][11]),
            12 => ($informe['Ingresos de Explotación'][0][12]+$informe['Costo Mantención'][0][12]+ $informe['Total Costo Directo'][0][12])==0?null:($informe['Ingresos de Explotación'][0][12]+$informe['Costo Mantención'][0][12]+ $informe['Total Costo Directo'][0][12]),
            13 =>$informe['Ingresos de Explotación'][0][13]+$informe['Costo Mantención'][0][13]+ $informe['Total Costo Directo'][0][13]
        );



        return $informe;

    }

    public static function ctrVerGerenciaActivos($ano,$listaCentroCostos,$listaEmpresasEugcom)
    {
        $informe = array();

        // Ingresos - Fijo
        $informe['Ingresos de Posicionamiento'] = self::ctrVerIngresosFijos($ano);

        // Ingresos - Variables
        $informe['Ingresos de Operación'] = self::ctrVerIngresosVariables($ano);

        // Ingresos - Descuento Disponibilidad
        $informe['Descuento Disponibilidad'] = self::ctrVerDescDisponibilidad($ano);



        $informe['Ingresos de Explotación'] = self::ctrVerResOperacional($informe['Ingresos de Posicionamiento'][0],$informe['Ingresos de Operación'][0],$informe['Descuento Disponibilidad'][0],$ano);



        // Arriendo Maquinarias
        $informe['Arriendo Maquinarias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Maquinarias Propias
        $informe['Arriendo Maquinarias Propias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias Propias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Vehiculos
        $informe['Arriendo Vehiculos'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Vehiculos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Alojamiento y Pensión
        $informe['Alojamiento y Pensión'] = self::ctrVerCuentaGastoAnual($ano,['Alojamiento y Pensión'],$listaCentroCostos,$listaEmpresasEugcom);

        // Combustible
        $informe['Combustible'] = self::ctrVerCuentaGastoAnual($ano,['Combustible'],$listaCentroCostos,$listaEmpresasEugcom);

        // Comunicaciones
        $informe['Comunicaciones'] = self::ctrVerCuentaGastoAnual($ano,['Comunicaciones'],$listaCentroCostos,$listaEmpresasEugcom);

        // Contratista
        $informe['Contratista'] = self::ctrVerCuentaGastoAnual($ano,['Contratista'],$listaCentroCostos,$listaEmpresasEugcom);

        // Correc. Monetaria
        $informe['Correc. Monetaria'] = self::ctrVerCuentaGastoAnual($ano,['Correc. Monetaria'],$listaCentroCostos,$listaEmpresasEugcom);



        // Depreciacion Activo
        $informe['Depreciacion Activo'] = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activo'],$listaCentroCostos,$listaEmpresasEugcom);

        // Depreciacion Activos Leasing
        $informe['Depreciacion Activos Leasing'] = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activos Leasing'],$listaCentroCostos,$listaEmpresasEugcom);

        // Flete Maquinarias
        $informe['Flete Maquinarias'] = self::ctrVerCuentaGastoAnual($ano,['Flete Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);



        // Gastos de Viaje y Representación
        $informe['Gastos de Viaje y Representación'] = self::ctrVerCuentaGastoAnual($ano,['Gastos de Viaje y Representación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Financieros
        $informe['Gastos Financieros'] = self::ctrVerCuentaGastoAnual($ano,['Gastos Financieros'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Generales
        $informe['Gastos Generales'] = self::ctrVerCuentaGastoAnual($ano,['Gastos Generales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Intereses Leasing
        $informe['Intereses Leasing'] = self::ctrVerCuentaGastoAnual($ano,['Intereses Leasing'],$listaCentroCostos,$listaEmpresasEugcom);

        // Mantención Equipos Móviles
        $informe['Mantención Equipos Móviles'] = self::ctrVerCuentaGastoAnual($ano,['Mantención Equipos Móviles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Mat. E Insumos Varios
        $informe['Mat. E Insumos Varios'] = self::ctrVerCuentaGastoAnual($ano,['Mat. E Insumos Varios'],$listaCentroCostos,$listaEmpresasEugcom);

        // Multas, Infracciones y Mermas
        $informe['Multas, Infracciones y Mermas'] = self::ctrVerCuentaGastoAnual($ano,['Multas, Infracciones y Mermas'],$listaCentroCostos,$listaEmpresasEugcom);

        // Neumáticos
        $informe['Neumáticos'] = self::ctrVerCuentaGastoAnual($ano,['Neumáticos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Otros Ingresos
        $informe['Otros Ingresos'] = self::ctrVerCuentaGastoAnual($ano,['Otros Ingresos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Permisos de Circulación
        $informe['Permisos de Circulación'] = self::ctrVerCuentaGastoAnual($ano,['Permisos de Circulación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Remuneraciones y Gastos del Personal
        $informe['Remuneraciones y Gastos del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Remuneraciones y Gastos del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Reparación Equipos Móviles
        $informe['Reparación Equipos Móviles'] = self::ctrVerCuentaGastoAnual($ano,['Reparación Equipos Móviles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Seguros Generales
        $informe['Seguros Generales'] = self::ctrVerCuentaGastoAnual($ano,['Seguros Generales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicio Mant. Full Service
        $informe['Servicio Mant. Full Service'] = self::ctrVerCuentaGastoAnual($ano,['Servicio Mant. Full Service'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicios Técnicos Industriales
        $informe['Servicios Técnicos Industriales'] = self::ctrVerCuentaGastoAnual($ano,['Servicios Técnicos Industriales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Transporte Combustibles
        $informe['Transporte Combustibles'] = self::ctrVerCuentaGastoAnual($ano,['Transporte Combustibles'],$listaCentroCostos,$listaEmpresasEugcom);


        // Transporte del Personal
        $informe['Transporte del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Transporte del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Vacaciones Personal
        $informe['Vacaciones Personal'] = self::ctrVerCuentaGastoAnual($ano,['Vacaciones Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        //Total Costo Directo

        $informe['Total Costo Directo'] = self::ctrVerCuentaGastoAnual($ano,[
            'Arriendo Maquinarias',
            'Arriendo Maquinarias Propias',
            'Arriendo Vehiculos',
            'Alojamiento y Pensión',
            'Combustible',
            'Comunicaciones',
            'Contratista',
            'Correc. Monetaria',
            'Depreciacion Activo',
            'Depreciacion Activos Leasing',
            'Flete Maquinarias',
            'Gastos de Viaje y Representación',
            'Gastos Financieros',
            'Gastos Generales',
            'Mantención Equipos Móviles',
            'Mat. E Insumos Varios',
            'Multas, Infracciones y Mermas',
            'Neumáticos',
            'Otros Ingresos',
            'Permisos de Circulación',
            'Remuneraciones y Gastos del Personal',
            'Reparación Equipos Móviles',
            'Seguros Generales',
            'Servicio Mant. Full Service',
            'Servicios Técnicos Industriales',
            'Transporte Combustibles',
            'Transporte del Personal',
            'Vacaciones Personal',
            ],$listaCentroCostos,$listaEmpresasEugcom);

        $informe['Margen de Contribución'][0]= array(
            1 => ($informe['Ingresos de Explotación'][0][1]+$informe['Total Costo Directo'][0][1])==0?null:($informe['Ingresos de Explotación'][0][1]+$informe['Total Costo Directo'][0][1]),
            2 => ($informe['Ingresos de Explotación'][0][2]+$informe['Total Costo Directo'][0][2])==0?null:($informe['Ingresos de Explotación'][0][2]+$informe['Total Costo Directo'][0][2]),
            3 => ($informe['Ingresos de Explotación'][0][3]+$informe['Total Costo Directo'][0][3])==0?null:($informe['Ingresos de Explotación'][0][3]+$informe['Total Costo Directo'][0][3]),
            4 => ($informe['Ingresos de Explotación'][0][4]+$informe['Total Costo Directo'][0][4])==0?null:($informe['Ingresos de Explotación'][0][4]+$informe['Total Costo Directo'][0][4]),
            5 => ($informe['Ingresos de Explotación'][0][5]+$informe['Total Costo Directo'][0][5])==0?null:($informe['Ingresos de Explotación'][0][5]+$informe['Total Costo Directo'][0][5]),
            6 => ($informe['Ingresos de Explotación'][0][6]+$informe['Total Costo Directo'][0][6])==0?null:($informe['Ingresos de Explotación'][0][6]+$informe['Total Costo Directo'][0][6]),
            7 => ($informe['Ingresos de Explotación'][0][7]+$informe['Total Costo Directo'][0][7])==0?null:($informe['Ingresos de Explotación'][0][7]+$informe['Total Costo Directo'][0][7]),
            8 => ($informe['Ingresos de Explotación'][0][8]+$informe['Total Costo Directo'][0][8])==0?null:($informe['Ingresos de Explotación'][0][8]+$informe['Total Costo Directo'][0][8]),
            9 => ($informe['Ingresos de Explotación'][0][9]+$informe['Total Costo Directo'][0][9])==0?null:($informe['Ingresos de Explotación'][0][9]+$informe['Total Costo Directo'][0][9]),
            10 => ($informe['Ingresos de Explotación'][0][10]+$informe['Total Costo Directo'][0][10])==0?null:($informe['Ingresos de Explotación'][0][10]+$informe['Total Costo Directo'][0][10]),
            11 => ($informe['Ingresos de Explotación'][0][11]+$informe['Total Costo Directo'][0][11])==0?null:($informe['Ingresos de Explotación'][0][11]+$informe['Total Costo Directo'][0][11]),
            12 => ($informe['Ingresos de Explotación'][0][12]+$informe['Total Costo Directo'][0][12])==0?null:($informe['Ingresos de Explotación'][0][12]+$informe['Total Costo Directo'][0][12]),
            13 =>$informe['Ingresos de Explotación'][0][13]+$informe['Total Costo Directo'][0][13]
        );


        return $informe;
    }


    public static function ctrVerUnidad($ano,$listaCentroCostos,$listaEmpresasEugcom,$ccoUnidad)
    {
        $informe = array();

        //Ingresos de Explotación
        $informe['Ingresos de Explotación'] = self::ctrVerCuentaGastoAnual($ano,['Ingresos de Explotación','Otros Ingresos'],$listaCentroCostos,$listaEmpresasEugcom);


        // Arriendo Inmuebles
        $informe['Arriendo Inmuebles'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Inmuebles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Maquinarias
        $informe['Arriendo Maquinarias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Maquinarias Propias
        $informe['Arriendo Maquinarias Propias'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Maquinarias Propias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Arriendo Vehiculos
        $informe['Arriendo Vehiculos'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Vehiculos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Alojamiento y Pensión
        $informe['Alojamiento y Pensión'] = self::ctrVerCuentaGastoAnual($ano,['Alojamiento y Pensión'],$listaCentroCostos,$listaEmpresasEugcom);

        // Combustible
        $informe['Combustible'] = self::ctrVerCuentaGastoAnual($ano,['Combustible'],$listaCentroCostos,$listaEmpresasEugcom);

        // Comunicaciones
        $informe['Comunicaciones'] = self::ctrVerCuentaGastoAnual($ano,['Comunicaciones'],$listaCentroCostos,$listaEmpresasEugcom);

        // Contratista
        $informe['Contratista'] = self::ctrVerCuentaGastoAnual($ano,['Contratista'],$listaCentroCostos,$listaEmpresasEugcom);

        // Correc. Monetaria
        $informe['Correc. Monetaria'] = self::ctrVerCuentaGastoAnual($ano,['Correc. Monetaria'],$listaCentroCostos,$listaEmpresasEugcom);

        // Demovilización Faenas
        $informe['Demovilización Faenas'] = self::ctrVerCuentaGastoAnual($ano,['Demovilización Faenas'],$listaCentroCostos,$listaEmpresasEugcom);

        // Depreciacion Activo
        $informe['Depreciacion Activo'] = self::ctrVerCuentaGastoAnual($ano,['Depreciacion Activo'],$listaCentroCostos,$listaEmpresasEugcom);

        // Flete Maquinarias
        $informe['Flete Maquinarias'] = self::ctrVerCuentaGastoAnual($ano,['Flete Maquinarias'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos de Viaje y Representación
        $informe['Gastos de Viaje y Representación'] = self::ctrVerCuentaGastoAnual($ano,['Gastos de Viaje y Representación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Gastos Generales
        $informe['Gastos Generales'] = self::ctrVerCuentaGastoAnual($ano,['Gastos Generales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Indemnizaciones
        $informe['Indemnizaciones'] = self::ctrVerCuentaGastoAnual($ano,['Indemnizaciones'],$listaCentroCostos,$listaEmpresasEugcom);

        // Mat. E Insumos Varios
        $informe['Mat. E Insumos Varios'] = self::ctrVerCuentaGastoAnual($ano,['Mat. E Insumos Varios'],$listaCentroCostos,$listaEmpresasEugcom);

        // Multas, Infracciones y Mermas
        $informe['Multas, Infracciones y Mermas'] = self::ctrVerCuentaGastoAnual($ano,['Multas, Infracciones y Mermas'],$listaCentroCostos,$listaEmpresasEugcom);

        // Patentes y D° Municipales
        $informe['Patentes y D° Municipales'] = self::ctrVerCuentaGastoAnual($ano,['Patentes y D° Municipales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Permisos de Circulación
        $informe['Permisos de Circulación'] = self::ctrVerCuentaGastoAnual($ano,['Permisos de Circulación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Remuneraciones y Gastos del Personal
        $informe['Remuneraciones y Gastos del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Remuneraciones y Gastos del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicios Administrativos
        $informe['Servicios Administrativos'] = self::ctrVerCuentaGastoAnual($ano,['Servicios Administrativos'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicio de Alimentación
        $informe['Servicio de Alimentación'] = self::ctrVerCuentaGastoAnual($ano,['Servicio de Alimentación'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicio de Vigilancia
        $informe['Servicio de Vigilancia'] = self::ctrVerCuentaGastoAnual($ano,['Servicio de Vigilancia'],$listaCentroCostos,$listaEmpresasEugcom);

        // Servicios Técnicos Industriales
        $informe['Servicios Técnicos Industriales'] = self::ctrVerCuentaGastoAnual($ano,['Servicios Técnicos Industriales'],$listaCentroCostos,$listaEmpresasEugcom);

        // Sistemas TI y Software
        $informe['Sistemas TI y Software'] = self::ctrVerCuentaGastoAnual($ano,['Sistemas TI y Software'],$listaCentroCostos,$listaEmpresasEugcom);

        // Transporte Combustibles
        $informe['Transporte Combustibles'] = self::ctrVerCuentaGastoAnual($ano,['Transporte Combustibles'],$listaCentroCostos,$listaEmpresasEugcom);

        // Transporte del Personal
        $informe['Transporte del Personal'] = self::ctrVerCuentaGastoAnual($ano,['Transporte del Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        // Vacaciones Personal
        $informe['Vacaciones Personal'] = self::ctrVerCuentaGastoAnual($ano,['Vacaciones Personal'],$listaCentroCostos,$listaEmpresasEugcom);

        //Total Costo Directo

        $informe['Total Costo Directo'] = self::ctrVerCuentaGastoAnual($ano,['Arriendo Inmuebles',
            'Arriendo Maquinarias Propias','Arriendo Maquinarias','Arriendo Vehiculos',
            'Alojamiento y Pensión','Combustible','Comunicaciones',
            'Contratista','Correc. Monetaria','Demovilización Faenas',
            'Depreciacion Activo','Gastos de Viaje y Representación',
            'Gastos Generales','Indemnizaciones','Mat. E Insumos Varios','Flete Maquinarias',
            'Multas, Infracciones y Mermas','Patentes y D° Municipales',
            'Permisos de Circulación','Remuneraciones y Gastos del Personal',
            'Servicios Administrativos','Servicio de Alimentación',
            'Servicio de Vigilancia','Servicios Técnicos Industriales',
            'Sistemas TI y Software','Transporte Combustibles',
            'Transporte del Personal','Vacaciones Personal'],$listaCentroCostos,$listaEmpresasEugcom);




        //Resultados Operacionales
        $tmp1 = array(
            1 =>   ((($informe['Ingresos de Explotación'][0][1]+$informe['Total Costo Directo'][0][1]))==0?null:($informe['Ingresos de Explotación'][0][1]+$informe['Total Costo Directo'][0][1])),
            2 =>   ((($informe['Ingresos de Explotación'][0][2]+$informe['Total Costo Directo'][0][2]))==0?null:($informe['Ingresos de Explotación'][0][2]+$informe['Total Costo Directo'][0][2])),
            3 =>   ((($informe['Ingresos de Explotación'][0][3]+$informe['Total Costo Directo'][0][3]))==0?null:($informe['Ingresos de Explotación'][0][3]+$informe['Total Costo Directo'][0][3])),
            4 =>   ((($informe['Ingresos de Explotación'][0][4]+$informe['Total Costo Directo'][0][4]))==0?null:($informe['Ingresos de Explotación'][0][4]+$informe['Total Costo Directo'][0][4])),
            5 =>   ((($informe['Ingresos de Explotación'][0][5]+$informe['Total Costo Directo'][0][5]))==0?null:($informe['Ingresos de Explotación'][0][5]+$informe['Total Costo Directo'][0][5])),
            6 =>   ((($informe['Ingresos de Explotación'][0][6]+$informe['Total Costo Directo'][0][6]))==0?null:($informe['Ingresos de Explotación'][0][6]+$informe['Total Costo Directo'][0][6])),
            7 =>   ((($informe['Ingresos de Explotación'][0][7]+$informe['Total Costo Directo'][0][7]))==0?null:($informe['Ingresos de Explotación'][0][7]+$informe['Total Costo Directo'][0][7])),
            8 =>   ((($informe['Ingresos de Explotación'][0][8]+$informe['Total Costo Directo'][0][8]))==0?null:($informe['Ingresos de Explotación'][0][8]+$informe['Total Costo Directo'][0][8])),
            9 =>   ((($informe['Ingresos de Explotación'][0][9]+$informe['Total Costo Directo'][0][9]))==0?null:($informe['Ingresos de Explotación'][0][9]+$informe['Total Costo Directo'][0][9])),
            10 =>   ((($informe['Ingresos de Explotación'][0][10]+$informe['Total Costo Directo'][0][10]))==0?null:($informe['Ingresos de Explotación'][0][10]+$informe['Total Costo Directo'][0][10])),
            11 =>   ((($informe['Ingresos de Explotación'][0][11]+$informe['Total Costo Directo'][0][11]))==0?null:($informe['Ingresos de Explotación'][0][11]+$informe['Total Costo Directo'][0][11])),
            12 =>   ((($informe['Ingresos de Explotación'][0][12]+$informe['Total Costo Directo'][0][12]))==0?null:($informe['Ingresos de Explotación'][0][12]+$informe['Total Costo Directo'][0][12])),
        );
        $totRes = 0;
        foreach ($tmp1 as $row)
        {
            $totRes = $totRes + $row;
        }
        $tmp1[13] = $totRes;
        $informe['Resultados Operacionales'][0] = $tmp1;

        // Margen de Contribución (%)
        $tmp2 = array(
            1 =>   ((($informe['Resultados Operacionales'][0][1]/$informe['Ingresos de Explotación'][0][1]))==0?null:round(($informe['Resultados Operacionales'][0][1]/$informe['Ingresos de Explotación'][0][1])*100,1)),
            2 =>   ((($informe['Resultados Operacionales'][0][2]/$informe['Ingresos de Explotación'][0][2]))==0?null:round(($informe['Resultados Operacionales'][0][2]/$informe['Ingresos de Explotación'][0][2])*100,1)),
            3 =>   ((($informe['Resultados Operacionales'][0][3]/$informe['Ingresos de Explotación'][0][3]))==0?null:round(($informe['Resultados Operacionales'][0][3]/$informe['Ingresos de Explotación'][0][3])*100,1)),
            4 =>   ((($informe['Resultados Operacionales'][0][4]/$informe['Ingresos de Explotación'][0][4]))==0?null:round(($informe['Resultados Operacionales'][0][4]/$informe['Ingresos de Explotación'][0][4])*100,1)),
            5 =>   ((($informe['Resultados Operacionales'][0][5]/$informe['Ingresos de Explotación'][0][5]))==0?null:round(($informe['Resultados Operacionales'][0][5]/$informe['Ingresos de Explotación'][0][5])*100,1)),
            6 =>   ((($informe['Resultados Operacionales'][0][6]/$informe['Ingresos de Explotación'][0][6]))==0?null:round(($informe['Resultados Operacionales'][0][6]/$informe['Ingresos de Explotación'][0][6])*100,1)),
            7 =>   ((($informe['Resultados Operacionales'][0][7]/$informe['Ingresos de Explotación'][0][7]))==0?null:round(($informe['Resultados Operacionales'][0][7]/$informe['Ingresos de Explotación'][0][7])*100,1)),
            8 =>   ((($informe['Resultados Operacionales'][0][8]/$informe['Ingresos de Explotación'][0][8]))==0?null:round(($informe['Resultados Operacionales'][0][8]/$informe['Ingresos de Explotación'][0][8])*100,1)),
            9 =>   ((($informe['Resultados Operacionales'][0][9]/$informe['Ingresos de Explotación'][0][9]))==0?null:round(($informe['Resultados Operacionales'][0][9]/$informe['Ingresos de Explotación'][0][9])*100,1)),
            10 =>   ((($informe['Resultados Operacionales'][0][10]/$informe['Ingresos de Explotación'][0][10]))==0?null:round(($informe['Resultados Operacionales'][0][10]/$informe['Ingresos de Explotación'][0][10])*100,1)),
            11 =>   ((($informe['Resultados Operacionales'][0][11]/$informe['Ingresos de Explotación'][0][11]))==0?null:round(($informe['Resultados Operacionales'][0][11]/$informe['Ingresos de Explotación'][0][11])*100,1)),
            12 =>   ((($informe['Resultados Operacionales'][0][12]/$informe['Ingresos de Explotación'][0][12]))==0?null:round(($informe['Resultados Operacionales'][0][12]/$informe['Ingresos de Explotación'][0][12])*100,1)),
            13 =>   ((($informe['Resultados Operacionales'][0][13]/$informe['Ingresos de Explotación'][0][13]))==0?null:round(($informe['Resultados Operacionales'][0][13]/$informe['Ingresos de Explotación'][0][13])*100,1)),
        );



        // Elimina numero NAN
        $tmp22 = array(
            1 =>   is_nan($tmp2[1])?'':$tmp2[1],
            2 =>   is_nan($tmp2[2])?'':$tmp2[2],
            3 =>   is_nan($tmp2[3])?'':$tmp2[3],
            4 =>   is_nan($tmp2[4])?'':$tmp2[4],
            5 =>   is_nan($tmp2[5])?'':$tmp2[5],
            6 =>   is_nan($tmp2[6])?'':$tmp2[6],
            7 =>   is_nan($tmp2[7])?'':$tmp2[7],
            8 =>   is_nan($tmp2[8])?'':$tmp2[8],
            9 =>   is_nan($tmp2[9])?'':$tmp2[9],
            10 =>  is_nan($tmp2[10])?'':$tmp2[10],
            11 =>  is_nan($tmp2[11])?'':$tmp2[11],
            12 =>  is_nan($tmp2[12])?'':$tmp2[12],
            13 =>  is_nan($tmp2[13])?'':$tmp2[13]
        );

        $informe['Margen de Contribución (%)'][0] = $tmp22;



        //Gastos Adm. y Ventas
        $informe['Gastos Adm. y Ventas'] = self::ctrverGAVUnidad($ano,$ccoUnidad,$listaEmpresasEugcom); //self::ctrVerGAVObra($ano,$informe['Ingresos de Explotación'],$listaCentroCostos,$listaEmpresasEugcom);


        // Total Resultado

        $tmp = array(
            1 =>   ((($informe['Ingresos de Explotación'][0][1]+$informe['Total Costo Directo'][0][1]) + $informe['Gastos Adm. y Ventas'][2][1])==0?null:($informe['Ingresos de Explotación'][0][1]+$informe['Total Costo Directo'][0][1]) + $informe['Gastos Adm. y Ventas'][2][1]),
            2 =>   ((($informe['Ingresos de Explotación'][0][2]+$informe['Total Costo Directo'][0][2]) + $informe['Gastos Adm. y Ventas'][2][2])==0?null:($informe['Ingresos de Explotación'][0][2]+$informe['Total Costo Directo'][0][2]) + $informe['Gastos Adm. y Ventas'][2][2]),
            3 =>   ((($informe['Ingresos de Explotación'][0][3]+$informe['Total Costo Directo'][0][3]) + $informe['Gastos Adm. y Ventas'][2][3])==0?null:($informe['Ingresos de Explotación'][0][3]+$informe['Total Costo Directo'][0][3]) + $informe['Gastos Adm. y Ventas'][2][3]),
            4 =>   ((($informe['Ingresos de Explotación'][0][4]+$informe['Total Costo Directo'][0][4]) + $informe['Gastos Adm. y Ventas'][2][4])==0?null:($informe['Ingresos de Explotación'][0][4]+$informe['Total Costo Directo'][0][4]) + $informe['Gastos Adm. y Ventas'][2][4]),
            5 =>   ((($informe['Ingresos de Explotación'][0][5]+$informe['Total Costo Directo'][0][5]) + $informe['Gastos Adm. y Ventas'][2][5])==0?null:($informe['Ingresos de Explotación'][0][5]+$informe['Total Costo Directo'][0][5]) + $informe['Gastos Adm. y Ventas'][2][5]),
            6 =>   ((($informe['Ingresos de Explotación'][0][6]+$informe['Total Costo Directo'][0][6]) + $informe['Gastos Adm. y Ventas'][2][6])==0?null:($informe['Ingresos de Explotación'][0][6]+$informe['Total Costo Directo'][0][6]) + $informe['Gastos Adm. y Ventas'][2][6]),
            7 =>   ((($informe['Ingresos de Explotación'][0][7]+$informe['Total Costo Directo'][0][7]) + $informe['Gastos Adm. y Ventas'][2][7])==0?null:($informe['Ingresos de Explotación'][0][7]+$informe['Total Costo Directo'][0][7]) + $informe['Gastos Adm. y Ventas'][2][7]),
            8 =>   ((($informe['Ingresos de Explotación'][0][8]+$informe['Total Costo Directo'][0][8]) + $informe['Gastos Adm. y Ventas'][2][8])==0?null:($informe['Ingresos de Explotación'][0][8]+$informe['Total Costo Directo'][0][8]) + $informe['Gastos Adm. y Ventas'][2][8]),
            9 =>   ((($informe['Ingresos de Explotación'][0][9]+$informe['Total Costo Directo'][0][9]) + $informe['Gastos Adm. y Ventas'][2][9])==0?null:($informe['Ingresos de Explotación'][0][9]+$informe['Total Costo Directo'][0][9]) + $informe['Gastos Adm. y Ventas'][2][9]),
            10 =>   ((($informe['Ingresos de Explotación'][0][10]+$informe['Total Costo Directo'][0][10]) + $informe['Gastos Adm. y Ventas'][2][10])==0?null:($informe['Ingresos de Explotación'][0][10]+$informe['Total Costo Directo'][0][10]) + $informe['Gastos Adm. y Ventas'][2][10]),
            11 =>   ((($informe['Ingresos de Explotación'][0][11]+$informe['Total Costo Directo'][0][11]) + $informe['Gastos Adm. y Ventas'][2][11])==0?null:($informe['Ingresos de Explotación'][0][11]+$informe['Total Costo Directo'][0][11]) + $informe['Gastos Adm. y Ventas'][2][11]),
            12 =>   ((($informe['Ingresos de Explotación'][0][12]+$informe['Total Costo Directo'][0][12]) + $informe['Gastos Adm. y Ventas'][2][12])==0?null:($informe['Ingresos de Explotación'][0][12]+$informe['Total Costo Directo'][0][12]) + $informe['Gastos Adm. y Ventas'][2][12]),
        );

        $total = 0;
        $res[] = null;
        foreach ($tmp as $row)
        {

            if ($indice < date('n')-1 )
            {
                $res[] = (int)$row;
                $total = $total+(int)$row;
            }
            else
            {
                if($ano != date('Y'))
                {
                    $res[] = (int)$row;
                    $total = $total+(int)$row;

                }else
                {
                    $res[] = null;
                }

            }
            $indice++;
        }
        $res[13] = $total;
        $informe['Total Resultado'][0] = $res;


        return $informe;

    }



    // Calculo Informes "Consolidados"

    public static function ctrVerConsolidado($ano,$listaCentroCostos,$listaEmpresasEugcom)
    {
        $informe = array();


        // 1- Ingresos
       $informe['Ingresos de Explotación'] = self::ctrVerEstadoResultadoAnual($ano,['Ingresos de Explotación'],$listaCentroCostos,$listaEmpresasEugcom);

        // 2- Costos
        // Costos = Costo(Min+Infra+Ind+GActivos) - Arriendo Maq. Propias (Min+Infra+Ind+GActivos) - Corr. Monetaria/G.Financ (G.Activos)

        $tmp1 = $listaCentroCostos;
        $tmp1[] = 10;
        $tmp1[] = 15;
        $tmp1[] = 18;
        $tmp1[] = 20;
        $tmp1[] = 21;
        $tmp1[] = 22;
        $tmp1[] = 25;
        $tmp1[] = 30;
        $tmp1[] = 50;
        $informe['Costo Directo'] = self::ctrVerEstadoResultadoAnual($ano,['Costos de Explotación'],$tmp1,$listaEmpresasEugcom);

        // 3- Margen de COntribucipon
        $informe['Margen de Contribución'][0] = array(

            1 => $informe['Ingresos de Explotación'][0][1]+$informe['Costo Directo'][0][1]==0?null:$informe['Ingresos de Explotación'][0][1]+$informe['Costo Directo'][0][1],
            2 => $informe['Ingresos de Explotación'][0][2]+$informe['Costo Directo'][0][2]==0?null:$informe['Ingresos de Explotación'][0][2]+$informe['Costo Directo'][0][2],
            3 => $informe['Ingresos de Explotación'][0][3]+$informe['Costo Directo'][0][3]==0?null:$informe['Ingresos de Explotación'][0][3]+$informe['Costo Directo'][0][3],
            4 => $informe['Ingresos de Explotación'][0][4]+$informe['Costo Directo'][0][4]==0?null:$informe['Ingresos de Explotación'][0][4]+$informe['Costo Directo'][0][4],
            5 => $informe['Ingresos de Explotación'][0][5]+$informe['Costo Directo'][0][5]==0?null:$informe['Ingresos de Explotación'][0][5]+$informe['Costo Directo'][0][5],
            6 => $informe['Ingresos de Explotación'][0][6]+$informe['Costo Directo'][0][6]==0?null:$informe['Ingresos de Explotación'][0][6]+$informe['Costo Directo'][0][6],
            7 => $informe['Ingresos de Explotación'][0][7]+$informe['Costo Directo'][0][7]==0?null:$informe['Ingresos de Explotación'][0][7]+$informe['Costo Directo'][0][7],
            8 => $informe['Ingresos de Explotación'][0][8]+$informe['Costo Directo'][0][8]==0?null:$informe['Ingresos de Explotación'][0][8]+$informe['Costo Directo'][0][8],
            9 => $informe['Ingresos de Explotación'][0][9]+$informe['Costo Directo'][0][9]==0?null:$informe['Ingresos de Explotación'][0][9]+$informe['Costo Directo'][0][9],
            10 => ($informe['Ingresos de Explotación'][0][10]+$informe['Costo Directo'][0][10])==0?null:$informe['Ingresos de Explotación'][0][10]+$informe['Costo Directo'][0][10],
            11 => ($informe['Ingresos de Explotación'][0][11]+$informe['Costo Directo'][0][11])==0?null:$informe['Ingresos de Explotación'][0][11]+$informe['Costo Directo'][0][11],
            12 => ($informe['Ingresos de Explotación'][0][12]+$informe['Costo Directo'][0][12])==0?null:$informe['Ingresos de Explotación'][0][12]+$informe['Costo Directo'][0][12],
            13 => ($informe['Ingresos de Explotación'][0][13]+$informe['Costo Directo'][0][13])==0?null:$informe['Ingresos de Explotación'][0][13]+$informe['Costo Directo'][0][13]
        );

        // 4 - Margen de contribución %
        $informe['% Margen de Contribución (%)'][0] = array(
            1 => round(($informe['Margen de Contribución'][0][1]/$informe['Ingresos de Explotación'][0][1])*100,1),
            2 => round(($informe['Margen de Contribución'][0][2]/$informe['Ingresos de Explotación'][0][2])*100,1),
            3 => round(($informe['Margen de Contribución'][0][3]/$informe['Ingresos de Explotación'][0][3])*100,1),
            4 => round(($informe['Margen de Contribución'][0][4]/$informe['Ingresos de Explotación'][0][4])*100,1),
            5 => round(($informe['Margen de Contribución'][0][5]/$informe['Ingresos de Explotación'][0][5])*100,1),
            6 => round(($informe['Margen de Contribución'][0][6]/$informe['Ingresos de Explotación'][0][6])*100,1),
            7 => round(($informe['Margen de Contribución'][0][7]/$informe['Ingresos de Explotación'][0][7])*100,1),
            8 => round(($informe['Margen de Contribución'][0][8]/$informe['Ingresos de Explotación'][0][8])*100,1),
            9 => round(($informe['Margen de Contribución'][0][9]/$informe['Ingresos de Explotación'][0][9])*100,1),
            10 => round(($informe['Margen de Contribución'][0][10]/$informe['Ingresos de Explotación'][0][10])*100,1),
            11 => round(($informe['Margen de Contribución'][0][11]/$informe['Ingresos de Explotación'][0][11])*100,1),
            12 => round(($informe['Margen de Contribución'][0][12]/$informe['Ingresos de Explotación'][0][12])*100,1),
            13 => round(($informe['Margen de Contribución'][0][13]/$informe['Ingresos de Explotación'][0][13])*100,1)
        );



        // 5 - Ventas / Costo Directo
        $informe['Ventas / Costo Directo'][0] = array(
            1 => round(($informe['Ingresos de Explotación'][0][1]/$informe['Costo Directo'][0][1]),2)*-1,
            2 => round(($informe['Ingresos de Explotación'][0][2]/$informe['Costo Directo'][0][2]),2)*-1,
            3 => round(($informe['Ingresos de Explotación'][0][3]/$informe['Costo Directo'][0][3]),2)*-1,
            4 => round(($informe['Ingresos de Explotación'][0][4]/$informe['Costo Directo'][0][4]),2)*-1,
            5 => is_nan(round(($informe['Ingresos de Explotación'][0][5]/$informe['Costo Directo'][0][5]),2))?null:round(($informe['Ingresos de Explotación'][0][5]/$informe['Costo Directo'][0][5]),1)*-1,
            6 => is_nan(round(($informe['Ingresos de Explotación'][0][6]/$informe['Costo Directo'][0][6]),2))?null:round(($informe['Ingresos de Explotación'][0][6]/$informe['Costo Directo'][0][6]),1)*-1,
            7 => is_nan(round(($informe['Ingresos de Explotación'][0][7]/$informe['Costo Directo'][0][7]),2))?null:round(($informe['Ingresos de Explotación'][0][7]/$informe['Costo Directo'][0][7]),1)*-1,
            8 => is_nan(round(($informe['Ingresos de Explotación'][0][8]/$informe['Costo Directo'][0][8]),2))?null:round(($informe['Ingresos de Explotación'][0][8]/$informe['Costo Directo'][0][8]),1)*-1,
            9 => is_nan(round(($informe['Ingresos de Explotación'][0][9]/$informe['Costo Directo'][0][9]),2))?null:round(($informe['Ingresos de Explotación'][0][9]/$informe['Costo Directo'][0][9]),1)*-1,
            10 => is_nan(round(($informe['Ingresos de Explotación'][0][10]/$informe['Costo Directo'][0][10]),2))?null:round(($informe['Ingresos de Explotación'][0][10]/$informe['Costo Directo'][0][10]),1)*-1,
            11 => is_nan(round(($informe['Ingresos de Explotación'][0][11]/$informe['Costo Directo'][0][11]),2))?null:round(($informe['Ingresos de Explotación'][0][11]/$informe['Costo Directo'][0][11]),1)*-1,
            12 => is_nan(round(($informe['Ingresos de Explotación'][0][12]/$informe['Costo Directo'][0][12]),2))?null:round(($informe['Ingresos de Explotación'][0][12]/$informe['Costo Directo'][0][12]),1)*-1,
        );
        $sumaCostoPorc = 0;
        foreach ($informe['Ventas / Costo Directo'][0] as $row) {

            $sumaCostoPorc = $sumaCostoPorc + (double)$row;
        }
        $informe['Ventas / Costo Directo'][0][13] = $sumaCostoPorc;


        // 6 - Gastos de Adm. y Ventas
        $informe['Gastos de Adm. y Ventas'] = self::ctrVerEstadoResultadoAnualGAV($ano,['Gastos de Administración y Ventas'],$listaCentroCostos,$listaEmpresasEugcom);

        //var_dump($informe['Gastos de Adm. y Ventas']);

        // 7- % Gastos de Ventas / Ingresos (%)
        $informe['% Gastos de Ventas / Ingresos (%)'][0] = array(
            1 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][1])/$informe['Ingresos de Explotación'][0][1])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][1])/$informe['Ingresos de Explotación'][0][1])*100,1)),
            2 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][2])/$informe['Ingresos de Explotación'][0][2])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][2])/$informe['Ingresos de Explotación'][0][2])*100,1)),
            3 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][3])/$informe['Ingresos de Explotación'][0][3])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][3])/$informe['Ingresos de Explotación'][0][3])*100,1)),
            4 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][4])/$informe['Ingresos de Explotación'][0][4])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][4])/$informe['Ingresos de Explotación'][0][4])*100,1)),
            5 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][5])/$informe['Ingresos de Explotación'][0][5])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][5])/$informe['Ingresos de Explotación'][0][5])*100,1)),
            6 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][6])/$informe['Ingresos de Explotación'][0][6])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][6])/$informe['Ingresos de Explotación'][0][6])*100,1)),
            7 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][7])/$informe['Ingresos de Explotación'][0][7])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][7])/$informe['Ingresos de Explotación'][0][7])*100,1)),
            8 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][8])/$informe['Ingresos de Explotación'][0][8])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][8])/$informe['Ingresos de Explotación'][0][8])*100,1)),
            9 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][9])/$informe['Ingresos de Explotación'][0][9])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][9])/$informe['Ingresos de Explotación'][0][9])*100,1)),
            10 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][10])/$informe['Ingresos de Explotación'][0][10])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][10])/$informe['Ingresos de Explotación'][0][10])*100,1)),
            11 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][11])/$informe['Ingresos de Explotación'][0][11])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][11])/$informe['Ingresos de Explotación'][0][11])*100,1)),
            12 => (is_nan(round(((-1*$informe['Gastos de Adm. y Ventas'][0][12])/$informe['Ingresos de Explotación'][0][12])*100,1))?null:round(((-1*$informe['Gastos de Adm. y Ventas'][0][12])/$informe['Ingresos de Explotación'][0][12])*100,1)),
    );
        $informe['% Gastos de Ventas / Ingresos (%)'][0][13] = round(-1*$informe['Gastos de Adm. y Ventas'][0][13]/$informe['Ingresos de Explotación'][0][13]*100,1);


        // 8 - Resultado Operacional
        $informe['Resultado Operacional'][0] = array(
            1 => ($informe['Margen de Contribución'][0][1]+$informe['Gastos de Adm. y Ventas'][0][1]) == 0 ? null: $informe['Margen de Contribución'][0][1]+$informe['Gastos de Adm. y Ventas'][0][1],
            2 => ($informe['Margen de Contribución'][0][2]+$informe['Gastos de Adm. y Ventas'][0][2]) == 0 ? null: $informe['Margen de Contribución'][0][2]+$informe['Gastos de Adm. y Ventas'][0][2],
            3 => ($informe['Margen de Contribución'][0][3]+$informe['Gastos de Adm. y Ventas'][0][3]) == 0 ? null: $informe['Margen de Contribución'][0][3]+$informe['Gastos de Adm. y Ventas'][0][3],
            4 => ($informe['Margen de Contribución'][0][4]+$informe['Gastos de Adm. y Ventas'][0][4]) == 0 ? null: $informe['Margen de Contribución'][0][4]+$informe['Gastos de Adm. y Ventas'][0][4],
            5 => ($informe['Margen de Contribución'][0][5]+$informe['Gastos de Adm. y Ventas'][0][5]) == 0 ? null: $informe['Margen de Contribución'][0][5]+$informe['Gastos de Adm. y Ventas'][0][5],
            6 => ($informe['Margen de Contribución'][0][6]+$informe['Gastos de Adm. y Ventas'][0][6]) == 0 ? null: $informe['Margen de Contribución'][0][6]+$informe['Gastos de Adm. y Ventas'][0][6],
            7 => ($informe['Margen de Contribución'][0][7]+$informe['Gastos de Adm. y Ventas'][0][7]) == 0 ? null: $informe['Margen de Contribución'][0][7]+$informe['Gastos de Adm. y Ventas'][0][7],
            8 => ($informe['Margen de Contribución'][0][8]+$informe['Gastos de Adm. y Ventas'][0][8]) == 0 ? null: $informe['Margen de Contribución'][0][8]+$informe['Gastos de Adm. y Ventas'][0][8],
            9 => ($informe['Margen de Contribución'][0][9]+$informe['Gastos de Adm. y Ventas'][0][9]) == 0 ? null: $informe['Margen de Contribución'][0][9]+$informe['Gastos de Adm. y Ventas'][0][9],
            10 => ($informe['Margen de Contribución'][0][10]+$informe['Gastos de Adm. y Ventas'][0][10]) == 0 ? null: $informe['Margen de Contribución'][0][10]+$informe['Gastos de Adm. y Ventas'][0][10],
            11 => ($informe['Margen de Contribución'][0][11]+$informe['Gastos de Adm. y Ventas'][0][11]) == 0 ? null: $informe['Margen de Contribución'][0][11]+$informe['Gastos de Adm. y Ventas'][0][11],
            12 => ($informe['Margen de Contribución'][0][12]+$informe['Gastos de Adm. y Ventas'][0][12]) == 0 ? null: $informe['Margen de Contribución'][0][12]+$informe['Gastos de Adm. y Ventas'][0][12]
        );

        $sumaCostoPorc = 0;
        foreach ($informe['Resultado Operacional'][0] as $row) {

            $sumaCostoPorc = $sumaCostoPorc + (double)$row;
        }
        $informe['Resultado Operacional'][0][13] = $sumaCostoPorc;


        $tmp1 = $listaCentroCostos;
        $tmp1[] = 30;
        $tmp1[] = 50;
        $tmp1[] = 20;
        // 9 - Otros Ingresos
        $informe['Otros Ingresos'] = self::ctrVerEstadoResultadoAnual($ano,['Otros Ingresos'],$tmp1,$listaEmpresasEugcom);

        // 10 - Otros Engresos
        $informe['Otros Egresos'] = self::ctrVerEstadoResultadoAnual($ano,['Otros Egresos'],$tmp1,$listaEmpresasEugcom);

        // 11 - Gastos Financieros
        $informe['Gastos Financieros'] = self::ctrVerEstadoResultadoAnual($ano,['Gastos Financieros'],$tmp1,$listaEmpresasEugcom);

        // 12 - Otros Engresos
        $informe['Correc. Monetaria'] = self::ctrVerEstadoResultadoAnual($ano,['Correc. Monetaria'],$tmp1,$listaEmpresasEugcom);

        // 13 - Resultado No Operacional
        $informe['Resultado No Operacional'][0] = array(

            1 =>$informe['Otros Ingresos'][0][1]+$informe['Otros Egresos'][0][1]+$informe['Gastos Financieros'][0][1]+$informe['Correc. Monetaria'][0][1]==0?null:$informe['Otros Ingresos'][0][1]+$informe['Otros Egresos'][0][1]+$informe['Gastos Financieros'][0][1]+$informe['Correc. Monetaria'][0][1],
            2 =>$informe['Otros Ingresos'][0][2]+$informe['Otros Egresos'][0][2]+$informe['Gastos Financieros'][0][2]+$informe['Correc. Monetaria'][0][2]==0?null:$informe['Otros Ingresos'][0][2]+$informe['Otros Egresos'][0][2]+$informe['Gastos Financieros'][0][2]+$informe['Correc. Monetaria'][0][2],
            3 =>$informe['Otros Ingresos'][0][3]+$informe['Otros Egresos'][0][3]+$informe['Gastos Financieros'][0][3]+$informe['Correc. Monetaria'][0][3]==0?null:$informe['Otros Ingresos'][0][3]+$informe['Otros Egresos'][0][3]+$informe['Gastos Financieros'][0][3]+$informe['Correc. Monetaria'][0][3],
            4 =>$informe['Otros Ingresos'][0][4]+$informe['Otros Egresos'][0][4]+$informe['Gastos Financieros'][0][4]+$informe['Correc. Monetaria'][0][4]==0?null:$informe['Otros Ingresos'][0][4]+$informe['Otros Egresos'][0][4]+$informe['Gastos Financieros'][0][4]+$informe['Correc. Monetaria'][0][4],
            5 =>$informe['Otros Ingresos'][0][5]+$informe['Otros Egresos'][0][5]+$informe['Gastos Financieros'][0][5]+$informe['Correc. Monetaria'][0][5]==0?null:$informe['Otros Ingresos'][0][5]+$informe['Otros Egresos'][0][5]+$informe['Gastos Financieros'][0][5]+$informe['Correc. Monetaria'][0][5],
            6 =>$informe['Otros Ingresos'][0][6]+$informe['Otros Egresos'][0][6]+$informe['Gastos Financieros'][0][6]+$informe['Correc. Monetaria'][0][6]==0?null:$informe['Otros Ingresos'][0][6]+$informe['Otros Egresos'][0][6]+$informe['Gastos Financieros'][0][6]+$informe['Correc. Monetaria'][0][6],
            7 =>$informe['Otros Ingresos'][0][7]+$informe['Otros Egresos'][0][7]+$informe['Gastos Financieros'][0][7]+$informe['Correc. Monetaria'][0][7]==0?null:$informe['Otros Ingresos'][0][7]+$informe['Otros Egresos'][0][7]+$informe['Gastos Financieros'][0][7]+$informe['Correc. Monetaria'][0][7],
            8 =>$informe['Otros Ingresos'][0][8]+$informe['Otros Egresos'][0][8]+$informe['Gastos Financieros'][0][8]+$informe['Correc. Monetaria'][0][8]==0?null:$informe['Otros Ingresos'][0][8]+$informe['Otros Egresos'][0][8]+$informe['Gastos Financieros'][0][8]+$informe['Correc. Monetaria'][0][8],
            9 =>$informe['Otros Ingresos'][0][9]+$informe['Otros Egresos'][0][9]+$informe['Gastos Financieros'][0][9]+$informe['Correc. Monetaria'][0][9]==0?null:$informe['Otros Ingresos'][0][9]+$informe['Otros Egresos'][0][9]+$informe['Gastos Financieros'][0][9]+$informe['Correc. Monetaria'][0][9],
            10 =>$informe['Otros Ingresos'][0][10]+$informe['Otros Egresos'][0][10]+$informe['Gastos Financieros'][0][10]+$informe['Correc. Monetaria'][0][10]==0?null:$informe['Otros Ingresos'][0][10]+$informe['Otros Egresos'][0][10]+$informe['Gastos Financieros'][0][10]+$informe['Correc. Monetaria'][0][10],
            11 =>$informe['Otros Ingresos'][0][11]+$informe['Otros Egresos'][0][11]+$informe['Gastos Financieros'][0][11]+$informe['Correc. Monetaria'][0][11]==0?null:$informe['Otros Ingresos'][0][11]+$informe['Otros Egresos'][0][11]+$informe['Gastos Financieros'][0][11]+$informe['Correc. Monetaria'][0][11],
            12 =>$informe['Otros Ingresos'][0][12]+$informe['Otros Egresos'][0][12]+$informe['Gastos Financieros'][0][12]+$informe['Correc. Monetaria'][0][12]==0?null:$informe['Otros Ingresos'][0][12]+$informe['Otros Egresos'][0][12]+$informe['Gastos Financieros'][0][12]+$informe['Correc. Monetaria'][0][12]
        );
        $sumaCostoPorc = 0;
        foreach ($informe['Resultado No Operacional'][0] as $row) {

            $sumaCostoPorc = $sumaCostoPorc + (double)$row;
        }
        $informe['Resultado No Operacional'][0][13] = $sumaCostoPorc;


        // 14 - Resultado Antes de Impuestos
        $informe['Resultado Antes de Impuestos'][0] = array(

            1 => ($informe['Resultado No Operacional'][0][1]+$informe['Resultado Operacional'][0][1]) == 0?null:($informe['Resultado No Operacional'][0][1]+$informe['Resultado Operacional'][0][1]),
            2 => ($informe['Resultado No Operacional'][0][2]+$informe['Resultado Operacional'][0][2]) == 0?null:($informe['Resultado No Operacional'][0][2]+$informe['Resultado Operacional'][0][2]),
            3 => ($informe['Resultado No Operacional'][0][3]+$informe['Resultado Operacional'][0][3]) == 0?null:($informe['Resultado No Operacional'][0][3]+$informe['Resultado Operacional'][0][3]),
            4 => ($informe['Resultado No Operacional'][0][4]+$informe['Resultado Operacional'][0][4]) == 0?null:($informe['Resultado No Operacional'][0][4]+$informe['Resultado Operacional'][0][4]),
            5 => ($informe['Resultado No Operacional'][0][5]+$informe['Resultado Operacional'][0][5]) == 0?null:($informe['Resultado No Operacional'][0][5]+$informe['Resultado Operacional'][0][5]),
            6 => ($informe['Resultado No Operacional'][0][6]+$informe['Resultado Operacional'][0][6]) == 0?null:($informe['Resultado No Operacional'][0][6]+$informe['Resultado Operacional'][0][6]),
            7 => ($informe['Resultado No Operacional'][0][7]+$informe['Resultado Operacional'][0][7]) == 0?null:($informe['Resultado No Operacional'][0][7]+$informe['Resultado Operacional'][0][7]),
            8 => ($informe['Resultado No Operacional'][0][8]+$informe['Resultado Operacional'][0][8]) == 0?null:($informe['Resultado No Operacional'][0][8]+$informe['Resultado Operacional'][0][8]),
            9 => ($informe['Resultado No Operacional'][0][9]+$informe['Resultado Operacional'][0][9]) == 0?null:($informe['Resultado No Operacional'][0][9]+$informe['Resultado Operacional'][0][9]),
            10 => ($informe['Resultado No Operacional'][0][10]+$informe['Resultado Operacional'][0][10]) == 0?null:($informe['Resultado No Operacional'][0][10]+$informe['Resultado Operacional'][0][10]),
            11 => ($informe['Resultado No Operacional'][0][11]+$informe['Resultado Operacional'][0][11]) == 0?null:($informe['Resultado No Operacional'][0][11]+$informe['Resultado Operacional'][0][11]),
            12 => ($informe['Resultado No Operacional'][0][12]+$informe['Resultado Operacional'][0][12]) == 0?null:($informe['Resultado No Operacional'][0][12]+$informe['Resultado Operacional'][0][12]),
            13 => ($informe['Resultado No Operacional'][0][13]+$informe['Resultado Operacional'][0][13]) == 0?null:($informe['Resultado No Operacional'][0][13]+$informe['Resultado Operacional'][0][13])
        );


        // 15 - Impuesto Renta

        $informe['Impuesto Renta'] = self::ctrVerEstadoResultadoAnual($ano,['Impuesto Renta'],$tmp1,$listaEmpresasEugcom);
        $sumaCostoPorc = 0;
        foreach ($informe['Impuesto Renta'][0] as $row) {

            $sumaCostoPorc = $sumaCostoPorc + (double)$row;
        }
        $informe['Impuesto Renta'][0][13] = $sumaCostoPorc;

        // 16 - Resultado Desp. Impuestos
        $informe['Resultado Desp. Impuestos'][0] = array(

            1 => ($informe['Resultado Antes de Impuestos'][0][1]+$informe['Impuesto Renta'][0][1]) == 0?null:($informe['Resultado Antes de Impuestos'][0][1]+$informe['Impuesto Renta'][0][1]),
            2 => ($informe['Resultado Antes de Impuestos'][0][2]+$informe['Impuesto Renta'][0][2]) == 0?null:($informe['Resultado Antes de Impuestos'][0][2]+$informe['Impuesto Renta'][0][2]),
            3 => ($informe['Resultado Antes de Impuestos'][0][3]+$informe['Impuesto Renta'][0][3]) == 0?null:($informe['Resultado Antes de Impuestos'][0][3]+$informe['Impuesto Renta'][0][3]),
            4 => ($informe['Resultado Antes de Impuestos'][0][4]+$informe['Impuesto Renta'][0][4]) == 0?null:($informe['Resultado Antes de Impuestos'][0][4]+$informe['Impuesto Renta'][0][4]),
            5 => ($informe['Resultado Antes de Impuestos'][0][5]+$informe['Impuesto Renta'][0][5]) == 0?null:($informe['Resultado Antes de Impuestos'][0][5]+$informe['Impuesto Renta'][0][5]),
            6 => ($informe['Resultado Antes de Impuestos'][0][6]+$informe['Impuesto Renta'][0][6]) == 0?null:($informe['Resultado Antes de Impuestos'][0][6]+$informe['Impuesto Renta'][0][6]),
            7 => ($informe['Resultado Antes de Impuestos'][0][7]+$informe['Impuesto Renta'][0][7]) == 0?null:($informe['Resultado Antes de Impuestos'][0][7]+$informe['Impuesto Renta'][0][7]),
            8 => ($informe['Resultado Antes de Impuestos'][0][8]+$informe['Impuesto Renta'][0][8]) == 0?null:($informe['Resultado Antes de Impuestos'][0][8]+$informe['Impuesto Renta'][0][8]),
            9 => ($informe['Resultado Antes de Impuestos'][0][9]+$informe['Impuesto Renta'][0][9]) == 0?null:($informe['Resultado Antes de Impuestos'][0][9]+$informe['Impuesto Renta'][0][9]),
            10 => ($informe['Resultado Antes de Impuestos'][0][10]+$informe['Impuesto Renta'][0][10]) == 0?null:($informe['Resultado Antes de Impuestos'][0][10]+$informe['Impuesto Renta'][0][10]),
            11 => ($informe['Resultado Antes de Impuestos'][0][11]+$informe['Impuesto Renta'][0][11]) == 0?null:($informe['Resultado Antes de Impuestos'][0][11]+$informe['Impuesto Renta'][0][11]),
            12 => ($informe['Resultado Antes de Impuestos'][0][12]+$informe['Impuesto Renta'][0][12]) == 0?null:($informe['Resultado Antes de Impuestos'][0][12]+$informe['Impuesto Renta'][0][12]),
            13 => ($informe['Resultado Antes de Impuestos'][0][13]+$informe['Impuesto Renta'][0][13]) == 0?null:($informe['Resultado Antes de Impuestos'][0][13]+$informe['Impuesto Renta'][0][13])
        );

        // 17 - EBITDA
        $tmp_ebitda = self::ctrVerCostosGastoAnualV2($ano,['DEPRECIACION ACTIVOS LEASING','DEPRECIACION ACTIVO FIJO'],$tmp1,$listaEmpresasEugcom);

        $informe['EBITDA'][0] = array(
            1 => ($informe['Resultado Operacional'][0][1]-$tmp_ebitda[0][1])==0?null:($informe['Resultado Operacional'][0][1]-$tmp_ebitda[0][1]),
            2 => ($informe['Resultado Operacional'][0][2]-$tmp_ebitda[0][2])==0?null:($informe['Resultado Operacional'][0][2]-$tmp_ebitda[0][2]),
            3 => ($informe['Resultado Operacional'][0][3]-$tmp_ebitda[0][3])==0?null:($informe['Resultado Operacional'][0][3]-$tmp_ebitda[0][3]),
            4 => ($informe['Resultado Operacional'][0][4]-$tmp_ebitda[0][4])==0?null:($informe['Resultado Operacional'][0][4]-$tmp_ebitda[0][4]),
            5 => ($informe['Resultado Operacional'][0][5]-$tmp_ebitda[0][5])==0?null:($informe['Resultado Operacional'][0][5]-$tmp_ebitda[0][5]),
            6 => ($informe['Resultado Operacional'][0][6]-$tmp_ebitda[0][6])==0?null:($informe['Resultado Operacional'][0][6]-$tmp_ebitda[0][6]),
            7 => ($informe['Resultado Operacional'][0][7]-$tmp_ebitda[0][7])==0?null:($informe['Resultado Operacional'][0][7]-$tmp_ebitda[0][7]),
            8 => ($informe['Resultado Operacional'][0][8]-$tmp_ebitda[0][8])==0?null:($informe['Resultado Operacional'][0][8]-$tmp_ebitda[0][8]),
            9 => ($informe['Resultado Operacional'][0][9]-$tmp_ebitda[0][9])==0?null:($informe['Resultado Operacional'][0][9]-$tmp_ebitda[0][9]),
            10 => ($informe['Resultado Operacional'][0][10]-$tmp_ebitda[0][10])==0?null:($informe['Resultado Operacional'][0][10]-$tmp_ebitda[0][10]),
            11 => ($informe['Resultado Operacional'][0][11]-$tmp_ebitda[0][11])==0?null:($informe['Resultado Operacional'][0][11]-$tmp_ebitda[0][11]),
            12 => ($informe['Resultado Operacional'][0][12]-$tmp_ebitda[0][12])==0?null:($informe['Resultado Operacional'][0][12]-$tmp_ebitda[0][12]),
            13 => ($informe['Resultado Operacional'][0][13]-$tmp_ebitda[0][13])==0?null:($informe['Resultado Operacional'][0][13]-$tmp_ebitda[0][13]),
        );

        // 18 - % EBITDA / Ingresos (%)
        $informe['% EBITDA / Ingresos (%)'][0] = array(

            1 => is_nan($informe['EBITDA'][0][1]/$informe['Ingresos de Explotación'][0][1])?null:round(($informe['EBITDA'][0][1]/$informe['Ingresos de Explotación'][0][1])*100,1),
            2 => is_nan($informe['EBITDA'][0][2]/$informe['Ingresos de Explotación'][0][2])?null:round(($informe['EBITDA'][0][2]/$informe['Ingresos de Explotación'][0][2])*100,1),
            3 => is_nan($informe['EBITDA'][0][3]/$informe['Ingresos de Explotación'][0][3])?null:round(($informe['EBITDA'][0][3]/$informe['Ingresos de Explotación'][0][3])*100,1),
            4 => is_nan($informe['EBITDA'][0][4]/$informe['Ingresos de Explotación'][0][4])?null:round(($informe['EBITDA'][0][4]/$informe['Ingresos de Explotación'][0][4])*100,1),
            5 => is_nan($informe['EBITDA'][0][5]/$informe['Ingresos de Explotación'][0][5])?null:round(($informe['EBITDA'][0][5]/$informe['Ingresos de Explotación'][0][5])*100,1),
            6 => is_nan($informe['EBITDA'][0][6]/$informe['Ingresos de Explotación'][0][6])?null:round(($informe['EBITDA'][0][6]/$informe['Ingresos de Explotación'][0][6])*100,1),
            7 => is_nan($informe['EBITDA'][0][7]/$informe['Ingresos de Explotación'][0][7])?null:round(($informe['EBITDA'][0][7]/$informe['Ingresos de Explotación'][0][7])*100,1),
            8 => is_nan($informe['EBITDA'][0][8]/$informe['Ingresos de Explotación'][0][8])?null:round(($informe['EBITDA'][0][8]/$informe['Ingresos de Explotación'][0][8])*100,1),
            9 => is_nan($informe['EBITDA'][0][9]/$informe['Ingresos de Explotación'][0][9])?null:round(($informe['EBITDA'][0][9]/$informe['Ingresos de Explotación'][0][9])*100,1),
            10 => is_nan($informe['EBITDA'][0][10]/$informe['Ingresos de Explotación'][0][10])?null:round(($informe['EBITDA'][0][10]/$informe['Ingresos de Explotación'][0][10])*100,1),
            11 => is_nan($informe['EBITDA'][0][11]/$informe['Ingresos de Explotación'][0][11])?null:round(($informe['EBITDA'][0][11]/$informe['Ingresos de Explotación'][0][11])*100,1),
            12 => is_nan($informe['EBITDA'][0][12]/$informe['Ingresos de Explotación'][0][12])?null:round(($informe['EBITDA'][0][12]/$informe['Ingresos de Explotación'][0][12])*100,1),
            13 => is_nan($informe['EBITDA'][0][13]/$informe['Ingresos de Explotación'][0][13])?null:round(($informe['EBITDA'][0][13]/$informe['Ingresos de Explotación'][0][13])*100,1)
        );

        return $informe;

    }

    //Fin Calculo Informes "Consolidados"






/*
    public static function ctrVerCuentaGasto($ano,$mes,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {
        $resu = FinancieroModelo::mdlVerCuentaGasto($ano,$mes,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom);
        return $resu;
    }*/

    public static function ctrVerCuentaGastoAnual($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {
        $res[0] = array();
        $resu = FinancieroModelo::mdlVerCuentaGastoAnualv2($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom);
        $indice = 1;
        $res[0][] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($resu[0] as $row)
        {

            if ($indice < date('n') )
            {
                $res[0][] = (int)$row;
                $total = $total+(int)$row;
            }
            else
            {
                if($ano != date('Y'))
                {
                    $res[0][] = (int)$row;
                    $total = $total+(int)$row;

                }else
                {
                    $res[0][] = null;
                }

            }
            $indice++;
        }
        $res[0][13] = $total;
        return $res;
    }

    public static function ctrVerEstadoResultadoAnual($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {
        $res[0] = array();
        $resu = FinancieroModelo::mdlVerEstadoResultado($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom);

        $indice = 1;
        $res[0][] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($resu[0] as $row)
        {
            if ($indice<=12) {

                if ($indice < date('n')) {
                    $res[0][] = (int)$row;
                    $total = $total + (int)$row;
                } else {
                    if ($ano != date('Y')) {
                        $res[0][] = (int)$row;
                        $total = $total + (int)$row;

                    } else {
                        $res[0][] = null;
                    }

                }
            }
            $indice++;
        }

        $res[0][13] = $total;
        return $res;
    }

    public static function ctrVerEstadoResultadoAnualGAV($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {
        $res[0] = array();
        $resu = FinancieroModelo::mdlVerEstadoResultadoGAV($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom);
        $indice = 1;
        $res[0][] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($resu[0] as $row)
        {

            if ($indice < date('n') )
            {
                $res[0][] = (int)$row;
                $total = $total+(int)$row;
            }
            else
            {
                if($ano != date('Y'))
                {
                    $res[0][] = (int)$row;
                    $total = $total+(int)$row;

                }else
                {
                    $res[0][] = null;
                }

            }
            $indice++;
        }
        $res[0][13] = $total;
        return $res;
    }

    /**
     * @param $ano
     * @param $listaCuentaGastos (Se debe especificar el nombre de las cuentas que no se desean mostrar)
     * @param $listaCentroCostos
     * @param $listaEmpresasEugcom
     * @return array|string
     */
    public static function ctrVerCostosGastoAnual($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {

        $resu = FinancieroModelo::mdlVerCosto($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom);
        $indice = 1;
        $res[0][] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($resu[0] as $row)
        {
            if ($indice<=12) {

                if ($indice < date('n')) {
                    $res[0][] = (int)$row;
                    $total = $total + (int)$row;
                } else {
                    if ($ano != date('Y')) {
                        $res[0][] = (int)$row;
                        $total = $total + (int)$row;

                    } else {
                        $res[0][] = null;
                    }

                }
            }
            $indice++;
        }
        $res[0][13] = $total;

        return $res;
    }

    public static function ctrVerCostosGastoAnualV2($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom)
    {

        $resu = FinancieroModelo::mdlVerCostov2($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom);
        $indice = 1;
        $res[0][] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($resu[0] as $row)
        {
            if ($indice<=12) {

                if ($indice < date('n')) {
                    $res[0][] = (int)$row;
                    $total = $total + (int)$row;
                } else {
                    if ($ano != date('Y')) {
                        $res[0][] = (int)$row;
                        $total = $total + (int)$row;

                    } else {
                        $res[0][] = null;
                    }

                }
            }
            $indice++;
        }
        $res[0][13] = $total;

        return $res;
    }


    // Calculos de GAV

    public static function ctrVerGAVObra($ano,$ingresosCCO,$listaCentroCostos,$listaEmpresasEugcom)
    {
        // Obtiene el Prorateo del GAV (CCO 10,15,20,21,22,23)
        $proGav = FinancieroModelo::mdlVerCosto($ano,ParametrosApp::cuentasGasto(),ParametrosApp::ccoObrasGav(),$listaEmpresasEugcom);


        // Obtiene el Prorateo del GAV UNidades de Negocio (CCO 18,19,25)
        $ccoUn = AuxiliaresControlador::ccoaUnidadNegocio($listaCentroCostos[0]);
        $proGavUN = FinancieroModelo::mdlVerCosto($ano,ParametrosApp::cuentasGasto(),[$ccoUn],$listaEmpresasEugcom);
        //var_dump($proGavUN);

        // Obtiene Ingresos Unidad de Negocio
        $unCCO = AuxiliaresControlador::UnidadNegocioaCCO($ccoUn);
        $ingun = FinancieroModelo::mdlVerCuentaGastoAnualv2($ano,['Ingresos de Explotación'],$unCCO,$listaEmpresasEugcom);

        // Obtiene Ingresos Consolidados
        $ccoTodos = array_merge(ParametrosApp::obtenerCCOUnIndustrial(),ParametrosApp::obtenerCCOUnMineria());
        $ingTotales = FinancieroModelo::mdlVerCuentaGastoAnualv2($ano,['Ingresos de Explotación'],$ccoTodos,$listaEmpresasEugcom);



        // Calculo GAV Unidades
            $gavUnidades = array(
                1 => ($ingun[0][1]/$ingTotales[0][1])*$proGav[0][1],
                2 => ($ingun[0][2]/$ingTotales[0][2])*$proGav[0][2],
                3 => ($ingun[0][3]/$ingTotales[0][3])*$proGav[0][3],
                4 => ($ingun[0][4]/$ingTotales[0][4])*$proGav[0][4],
                5 => ($ingun[0][5]/$ingTotales[0][5])*$proGav[0][5],
                6 => ($ingun[0][6]/$ingTotales[0][6])*$proGav[0][6],
                7 => ($ingun[0][7]/$ingTotales[0][7])*$proGav[0][7],
                8 => ($ingun[0][8]/$ingTotales[0][8])*$proGav[0][8],
                9 => ($ingun[0][9]/$ingTotales[0][9])*$proGav[0][9],
                10 => ($ingun[0][10]/$ingTotales[0][10])*$proGav[0][10],
                11 => ($ingun[0][11]/$ingTotales[0][11])*$proGav[0][11],
                12 => ($ingun[0][12]/$ingTotales[0][12])*$proGav[0][12],
            );

        //var_dump($gavUnidades);
            // Calculo GAV Obras

            $gavObra = array(
                1 => is_nan(round(($ingresosCCO[0][1]/$ingun[0][1])*$gavUnidades[1],0)) ? null:round(($ingresosCCO[0][1]/$ingun[0][1])*$gavUnidades[1],0),
                2 => is_nan(round(($ingresosCCO[0][2]/$ingun[0][2])*$gavUnidades[2],0)) ? null:round(($ingresosCCO[0][2]/$ingun[0][2])*$gavUnidades[2],0),
                3 => is_nan(round(($ingresosCCO[0][3]/$ingun[0][3])*$gavUnidades[3],0)) ? null:round(($ingresosCCO[0][3]/$ingun[0][3])*$gavUnidades[3],0),
                4 => is_nan(round(($ingresosCCO[0][4]/$ingun[0][4])*$gavUnidades[4],0)) ? null:round(($ingresosCCO[0][4]/$ingun[0][4])*$gavUnidades[4],0),
                5 => is_nan(round(($ingresosCCO[0][5]/$ingun[0][5])*$gavUnidades[5],0)) ? null:round(($ingresosCCO[0][5]/$ingun[0][5])*$gavUnidades[5],0),
                6 => is_nan(round(($ingresosCCO[0][6]/$ingun[0][6])*$gavUnidades[6],0)) ? null:round(($ingresosCCO[0][6]/$ingun[0][6])*$gavUnidades[6],0),
                7 => is_nan(round(($ingresosCCO[0][7]/$ingun[0][7])*$gavUnidades[7],0)) ? null:round(($ingresosCCO[0][7]/$ingun[0][7])*$gavUnidades[7],0),
                8 => is_nan(round(($ingresosCCO[0][8]/$ingun[0][8])*$gavUnidades[8],0)) ? null:round(($ingresosCCO[0][8]/$ingun[0][8])*$gavUnidades[8],0),
                9 => is_nan(round(($ingresosCCO[0][9]/$ingun[0][9])*$gavUnidades[9],0)) ? null:round(($ingresosCCO[0][9]/$ingun[0][9])*$gavUnidades[9],0),
                10 => is_nan(round(($ingresosCCO[0][10]/$ingun[0][10])*$gavUnidades[10],0)) ? null:round(($ingresosCCO[0][10]/$ingun[0][10])*$gavUnidades[10],0),
                11 => is_nan(round(($ingresosCCO[0][11]/$ingun[0][11])*$gavUnidades[11],0)) ? null:round(($ingresosCCO[0][11]/$ingun[0][11])*$gavUnidades[11],0),
                12 => is_nan(round(($ingresosCCO[0][12]/$ingun[0][12])*$gavUnidades[12],0)) ? null:round(($ingresosCCO[0][12]/$ingun[0][12])*$gavUnidades[12],0),

            );

        // Calculo GAV Obras Gerencias
            $gavObrasGerencias = array(
                1 => is_nan(round(($ingresosCCO[0][1]/$ingun[0][1])*$proGavUN[0][1],0)) ? null:round(($ingresosCCO[0][1]/$ingun[0][1])*$proGavUN[0][1],0),
                2 => is_nan(round(($ingresosCCO[0][2]/$ingun[0][2])*$proGavUN[0][2],0)) ? null:round(($ingresosCCO[0][2]/$ingun[0][2])*$proGavUN[0][2],0),
                3 => is_nan(round(($ingresosCCO[0][3]/$ingun[0][3])*$proGavUN[0][3],0)) ? null:round(($ingresosCCO[0][3]/$ingun[0][3])*$proGavUN[0][3],0),
                4 => is_nan(round(($ingresosCCO[0][4]/$ingun[0][4])*$proGavUN[0][4],0)) ? null:round(($ingresosCCO[0][4]/$ingun[0][4])*$proGavUN[0][4],0),
                5 => is_nan(round(($ingresosCCO[0][5]/$ingun[0][5])*$proGavUN[0][5],0)) ? null:round(($ingresosCCO[0][5]/$ingun[0][5])*$proGavUN[0][5],0),
                6 => is_nan(round(($ingresosCCO[0][6]/$ingun[0][6])*$proGavUN[0][6],0)) ? null:round(($ingresosCCO[0][6]/$ingun[0][6])*$proGavUN[0][6],0),
                7 => is_nan(round(($ingresosCCO[0][7]/$ingun[0][7])*$proGavUN[0][7],0)) ? null:round(($ingresosCCO[0][7]/$ingun[0][7])*$proGavUN[0][7],0),
                8 => is_nan(round(($ingresosCCO[0][8]/$ingun[0][8])*$proGavUN[0][8],0)) ? null:round(($ingresosCCO[0][8]/$ingun[0][8])*$proGavUN[0][8],0),
                9 => is_nan(round(($ingresosCCO[0][9]/$ingun[0][9])*$proGavUN[0][9],0)) ? null:round(($ingresosCCO[0][9]/$ingun[0][9])*$proGavUN[0][9],0),
                10 => is_nan(round(($ingresosCCO[0][10]/$ingun[0][10])*$proGavUN[0][10],0)) ? null:round(($ingresosCCO[0][10]/$ingun[0][10])*$proGavUN[0][10],0),
                11 => is_nan(round(($ingresosCCO[0][11]/$ingun[0][11])*$proGavUN[0][11],0)) ? null:round(($ingresosCCO[0][11]/$ingun[0][11])*$proGavUN[0][11],0),
                12 => is_nan(round(($ingresosCCO[0][12]/$ingun[0][12])*$proGavUN[0][12],0)) ? null:round(($ingresosCCO[0][12]/$ingun[0][12])*$proGavUN[0][12],0)
            );

        // Calculo Final GAV Obras
        $gavFinal = array(
            1 => ($gavObrasGerencias[1]+$gavObra[1])==0 ? null : $gavObrasGerencias[1]+$gavObra[1],
            2 => ($gavObrasGerencias[2]+$gavObra[2])==0 ? null : $gavObrasGerencias[2]+$gavObra[2],
            3 => ($gavObrasGerencias[3]+$gavObra[3])==0 ? null : $gavObrasGerencias[3]+$gavObra[3],
            4 => ($gavObrasGerencias[4]+$gavObra[4])==0 ? null : $gavObrasGerencias[4]+$gavObra[4],
            5 => ($gavObrasGerencias[5]+$gavObra[5])==0 ? null : $gavObrasGerencias[5]+$gavObra[5],
            6 => ($gavObrasGerencias[6]+$gavObra[6])==0 ? null : $gavObrasGerencias[6]+$gavObra[6],
            7 => ($gavObrasGerencias[7]+$gavObra[7])==0 ? null : $gavObrasGerencias[7]+$gavObra[7],
            8 => ($gavObrasGerencias[8]+$gavObra[8])==0 ? null : $gavObrasGerencias[8]+$gavObra[8],
            9 => ($gavObrasGerencias[9]+$gavObra[9])==0 ? null : $gavObrasGerencias[9]+$gavObra[9],
            10 => ($gavObrasGerencias[10]+$gavObra[10])==0 ? null : $gavObrasGerencias[10]+$gavObra[10],
            11 => ($gavObrasGerencias[11]+$gavObra[11])==0 ? null : $gavObrasGerencias[11]+$gavObra[11],
            12 => ($gavObrasGerencias[12]+$gavObra[12])==0 ? null : $gavObrasGerencias[12]+$gavObra[12]
        );
        $sumaTotalGAV = 0;
        foreach ($gavFinal as $row)
        {
            $sumaTotalGAV = $sumaTotalGAV + $row;
        }
        $gavFinal[13] = $sumaTotalGAV;


            return $gavFinal;
    }

    public static function ctrverGAVUnidad($ano,$ccoUn,$listaEmpresasEugcom)
    {
        $listado = null;
        // Obtiene el Prorateo del GAV (CCO 10,15,20,21,22,23)
        $proGav = FinancieroModelo::mdlVerCosto($ano,ParametrosApp::cuentasGasto(),ParametrosApp::ccoObrasGav(),$listaEmpresasEugcom);



        // Obtiene el Prorateo del GAV UNidades de Negocio (CCO 18,19,25)
        $proGavUN = FinancieroModelo::mdlVerCosto($ano,ParametrosApp::cuentasGasto(),[$ccoUn],$listaEmpresasEugcom);

        $res = null;
        $indice = 1;
        $res[] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($proGavUN[0] as $row)
        {

            if ($indice < date('n') )
            {
                $res[] = (int)$row;
                $total = $total+(int)$row;
            }
            else
            {
                $res[] = null;
            }
            $indice++;
        }
        $res[13] = $total;
        $listado[] = $res;

        // Obtiene Ingresos Unidad de Negocio

        $unCCO = AuxiliaresControlador::UnidadNegocioaCCO($ccoUn);

        $ingun = FinancieroModelo::mdlVerCuentaGastoAnualv2($ano,['Ingresos de Explotación'],$unCCO,$listaEmpresasEugcom);


        // Obtiene Ingresos Consolidados
        $ccoTodos = array_merge(ParametrosApp::obtenerCCOUnIndustrial(),ParametrosApp::obtenerCCOUnMineria());
//[525,526,527,529,530,536,528,532,533,534]
        $ingTotales = FinancieroModelo::mdlVerCuentaGastoAnualv2($ano,['Ingresos de Explotación'],$ccoTodos,$listaEmpresasEugcom);



        // Calculo GAV Unidades
        $gavUnidades = array(
            1 => ($ingun[0][1]/$ingTotales[0][1])*$proGav[0][1],
            2 => ($ingun[0][2]/$ingTotales[0][2])*$proGav[0][2],
            3 => ($ingun[0][3]/$ingTotales[0][3])*$proGav[0][3],
            4 => ($ingun[0][4]/$ingTotales[0][4])*$proGav[0][4],
            5 => ($ingun[0][5]/$ingTotales[0][5])*$proGav[0][5],
            6 => ($ingun[0][6]/$ingTotales[0][6])*$proGav[0][6],
            7 => ($ingun[0][7]/$ingTotales[0][7])*$proGav[0][7],
            8 => ($ingun[0][8]/$ingTotales[0][8])*$proGav[0][8],
            9 => ($ingun[0][9]/$ingTotales[0][9])*$proGav[0][9],
            10 => ($ingun[0][10]/$ingTotales[0][10])*$proGav[0][10],
            11 => ($ingun[0][11]/$ingTotales[0][11])*$proGav[0][11],
            12 => ($ingun[0][12]/$ingTotales[0][12])*$proGav[0][12],
        );

        $res = null;
        $indice = 1;
        $res[] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($gavUnidades as $row)
        {

            if ($indice < date('n') )
            {
                $res[] = (int)$row;
                $total = $total+(int)$row;
            }
            else
            {
                if($ano != date('Y'))
                {
                    $res[] = (int)$row;
                    $total = $total+(int)$row;

                }else
                {
                    $res[] = null;
                }

            }
            $indice++;
        }
        $res[13] = $total;
        $res[13] = $total;
        $listado[] = $res;


        //$listado[] = $gavUnidades;


        $sumaGav = array(
            1 => ($listado[0][1]+$listado[1][1])==0?null:$listado[0][1]+$listado[1][1],
            2 => ($listado[0][2]+$listado[1][2])==0?null:$listado[0][2]+$listado[1][2],
            3 => ($listado[0][3]+$listado[1][3])==0?null:$listado[0][3]+$listado[1][3],
            4 => ($listado[0][4]+$listado[1][4])==0?null:$listado[0][4]+$listado[1][4],
            5 => ($listado[0][5]+$listado[1][5])==0?null:$listado[0][5]+$listado[1][5],
            6 => ($listado[0][6]+$listado[1][6])==0?null:$listado[0][6]+$listado[1][6],
            7 => ($listado[0][7]+$listado[1][7])==0?null:$listado[0][7]+$listado[1][7],
            8 => ($listado[0][8]+$listado[1][8])==0?null:$listado[0][8]+$listado[1][8],
            9 => ($listado[0][9]+$listado[1][9])==0?null:$listado[0][9]+$listado[1][9],
            10 => ($listado[0][10]+$listado[1][10])==0?null:$listado[0][10]+$listado[1][10],
            11 => ($listado[0][11]+$listado[1][11])==0?null:$listado[0][11]+$listado[1][11],
            12 => ($listado[0][12]+$listado[1][12])==0?null:$listado[0][12]+$listado[1][12],
            13 => ($listado[0][13]+$listado[1][13])==0?null:$listado[0][13]+$listado[1][13]
        );
        $listado[] = $sumaGav;
        //var_dump($listado);
        return $listado;

    }

    //Fin Calculos de GAV


    // Ingrtesos de Maquinarias (CCO 50)
    public static function ctrVerIngresosFijos($ano)
    {
        $resu = FinancieroModelo::mdlVerIngresosFijos($ano);
        $indice = 1;
        $res[0][] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($resu[0] as $row)
        {

            if ($indice < date('n') )
            {
                $res[0][] = (int)$row;
                $total = $total+(int)$row;
            }
            else
            {
                if($ano != date('Y'))
                {
                    $res[0][] = (int)$row;
                    $total = $total+(int)$row;

                }else
                {
                    $res[0][] = null;
                }

            }
            $indice++;
        }
        $res[0][13] = $total;
        return $res;

    }

    public static function ctrVerIngresosVariables($ano)
    {
        $resu = FinancieroModelo::mdlVerIngresosVariables($ano);
        $indice = 1;
        $res[0][] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($resu[0] as $row)
        {

            if ($indice < date('n') )
            {
                $res[0][] = (int)$row;
                $total = $total+(int)$row;
            }
            else
            {
                if($ano != date('Y'))
                {
                    $res[0][] = (int)$row;
                    $total = $total+(int)$row;

                }else
                {
                    $res[0][] = null;
                }

            }
            $indice++;
        }
        $res[0][13] = $total;
        return $res;

    }

    public static function ctrVerDescDisponibilidad($ano)
    {
        $resu = FinancieroModelo::mdlVerDescDisponibilidad($ano);
        $indice = 1;
        $res[0][] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;
        foreach ($resu[0] as $row)
        {

            if ($indice < date('n') )
            {
                $res[0][] = (int)$row;
                $total = $total+(int)$row;
            }
            else
            {
                if($ano != date('Y'))
                {
                    $res[0][] = (int)$row;
                    $total = $total+(int)$row;

                }else
                {
                    $res[0][] = null;
                }

            }
            $indice++;
        }
        $res[0][13] = $total;
        return $res;


    }

    public static function ctrVerResOperacional($ingVariable,$ingFijo,$descDisp,$ano)
    {
        $indice = 1;
        $res[0][] = ''; // Array pos 0 en blanco (Enero = 1 ... etc)
        $total = 0;

        for ($i = 1; $i<=12;$i++)
        {
            if ($i < date('n') )
            {
                $res[0][] = $ingVariable[$i]+$ingFijo[$i]+$descDisp[$i];
                $total = $total+$ingVariable[$i]+$ingFijo[$i]+$descDisp[$i];
            }
            else
            {
                if($ano != date('Y'))
                {
                    $res[0][] = $ingVariable[$i]+$ingFijo[$i]+$descDisp[$i];
                    $total = $total+$ingVariable[$i]+$ingFijo[$i]+$descDisp[$i];

                }else
                {
                    $res[0][] = null;
                }
            }
            $indice++;

        }
        /*
        foreach ($ingVariable as $row)
        {

            if ($indice < date('n') )
            {
                $res[0][] = $ingVariable[$indice]+$ingFijo[$indice]+$descDisp[$indice];
                $total = $total+$ingVariable[$indice]+$ingFijo[$indice]+$descDisp[$indice];
            }
            else
            {
                if($ano != date('Y'))
                {
                    $res[0][] = $ingVariable[$indice]+$ingFijo[$indice]+$descDisp[$indice];
                    $total = $total+$ingVariable[$indice]+$ingFijo[$indice]+$descDisp[$indice];

                }else
                {
                    $res[0][] = null;
                }
            }
            $indice++;
        }
*/
        $res[0][13] = $total;

        return $res;


    }
    // Ingrtesos de Maquinarias (CCO 50)


    /**
     * Convierte un array de gastos de Pesos a Dolar
     * @param $tmp
     * @param $dolar
     * @return float[]|int[]
     */
    public static function cuenaDolar($tmp,$dolar)
    {

        $tmpDolar = array(
            1 => round($tmp[0][1]/$dolar['enero'],0),
            2 => round($tmp[0][2]/$dolar['febrero'],0),
            3 => round($tmp[0][3]/$dolar['marzo'],0),
            4 => round($tmp[0][4]/$dolar['abril'],0),
            5 => round($tmp[0][5]/$dolar['mayo'],0),
            6 => round($tmp[0][6]/$dolar['junio'],0),
            7 => round($tmp[0][7]/$dolar['julio'],0),
            8 => round($tmp[0][8]/$dolar['agosto'],0),
            9 => round($tmp[0][9]/$dolar['septiembre'],0),
            10 => round($tmp[0][10]/$dolar['octubre'],0),
            11 => round($tmp[0][11]/$dolar['noviembre'],0),
            12 => round($tmp[0][12]/$dolar['diciembre'],0)
        );
        $total = 0;
        foreach ($tmpDolar as $row)
        {
            if (!is_nan($row))
            {
                $total = $total + $row;
            }
        }
        $tmpDolar[13] = $total;
        return $tmpDolar;
    }








}
