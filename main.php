<?php


 // Habilita el DEBUG
/*
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
*/
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php';
require_once 'controladores/comprobantes.controlador.php';
require_once 'controladores/prevencion.controlador.php';
require_once 'controladores/login.controlador.php';
require_once 'controladores/tablas.controlador.php';
require_once 'controladores/presupuesto.controlador.php';
require_once 'controladores/auxiliares.controlador.php';
require_once 'controladores/backlog.controlador.php';
require_once 'config/parametros.php';
require_once 'controladores/asistencia.controlador.php';
require_once 'controladores/talana.controlador.php';
require_once 'controladores/resultados.controlador.php';
require_once 'controladores/financiero.controlador.php';
require_once 'controladores/usuarios.controlador.php';
require_once 'controladores/operaciones.controlador.php';
require_once 'controladores/comercial.controlador.php';


include 'vistas/admin_plantilla.php';
session_write_close();

// Funciones auxiliares

function formateaPorcentajes ($n)
{
    if(!is_nan($n) && !is_infinite($n)) {
        if ($n != -INF) {
            if (!is_null($n) || $n != false) {
                if ($n != false) {
                    if ($n < 0) {
                        return $n * -1 . '%';
                    } else {
                        return $n . '%';
                    }
                }
            }
        }
        return null;
    }else
    {
        return '';
    }
}

function formateaNumeroMillones($n) {
    if(!is_nan($n)) {

        if (!is_null($n)) {
            $n = (0 + str_replace(",", "", $n));

            // is this a number?
            if (!is_numeric($n) || is_null($n)) return '';

            // now filter it;
            if ($n < 0) {
                return '(' . number_format(abs(round(($n / 1000000), 1)), 1, ',', '.') . ')';
            } else {
                return number_format(round(($n / 1000000), 1), 1, ',', '.');
            }

            return number_format($n, 1, ',', '.');
        } else {
            return ''; //nulo
        }
    }else
    {
        return '';
    }
}

function formateaNumero($n) {
    if(!is_null($n)) {
        // first strip any formatting;
        $n = (0 + str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n) || is_null($n)) return '';

        // now filter it;
        if ($n < 0) {
            if ($n < -1000000000000) return '(' . number_format(abs(round(($n / 1000000000000), 1)) . ')', 0, ',', '.');
            else if ($n < -1000000000) return '(' . number_format(abs(round(($n / 1000000000), 1)) . ')', 0, ',', '.');
            else if ($n < -1000000) return '(' . number_format(abs(round(($n / 1000000), 1)), 0, ',', '.') . ')';
            else if ($n < -1000) return '(' . number_format(abs(round(($n / 1000), 1)), 0, ',', '.') . ')';
        } else {
            if ($n > 1000000000000) return number_format(round(($n / 1000000000000), 1), 0, ',', '.');
            else if ($n > 1000000000) return number_format(round(($n / 1000000000), 1), 0, ',', '.');
            else if ($n > 1000000) return number_format(round(($n / 1000000), 1), 0, ',', '.');
            else if ($n > 1000) return number_format(round(($n / 1000), 1), 0, ',', '.');
        }
        return number_format($n, 0, ',', '.');
    }
    {
        return ''; //nulo
    }
}

function formateaDolares($n) {
    if(!is_nan($n)) {

        if (!is_null($n)) {
            $n = (0 + str_replace(",", "", $n));

            // is this a number?
            if (!is_numeric($n) || is_null($n)) return '';

            // now filter it;
            if ($n < 0) {
                return '(' . number_format(abs(round(($n / 1000), 1)), 1, ',', '.') . ')';
            } else {
                return number_format(round(($n / 1000), 1), 1, ',', '.');
            }

            return number_format($n, 1, ',', '.');
        } else {
            return ''; //nulo
        }
    }else
    {
        return '';
    }
}

function nroaMes($nro)
{
    $meses = ["","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    return $meses[$nro];
}

function mesaNro($mes)
{
    $op = -1;
    switch ($mes)
    {
        case 'Enero':
            $op = 1;
            break;

        case 'Febrero':
            $op = 2;
            break;

        case 'Marzo':
            $op = 3;
            break;

        case 'Abril':
            $op = 4;
            break;

        case 'Mayo':
            $op = 5;
            break;

        case 'Junio':
            $op = 6;
            break;

        case 'Julio':
            $op = 7;
            break;

        case 'Agosto':
            $op = 8;
            break;

        case 'Septiembre':
            $op = 9;
            break;

        case 'Octubre':
            $op = 10;
            break;

        case 'Noviembre':
            $op = 11;
            break;

        case 'Diciembre':
            $op = 12;
            break;
    }
    return $op;
}


function devuelveAnos()
{
    $anos = ['2021'];
    return $anos;
}

function devuelveMeses()
{
    $meses = ['Enero|1','Febrero|2','Marzo|3','Abril|4','Mayo|5','Junio|6','Julio|7','Agosto|8','Septiembre|9','Octubre|10','Noviembre|11','Diciembre|12'];
    return $meses;
}

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

function empresasIKA()
{
    $a = array(
        '1' => 'IKA Industrial',
        '3' => 'IKA Infraestructura',
        '6' => 'IKA Mineria'
    );

    return $a;
}




// Auxiliares utilizados en graficos de com_inf_diversific_budget
function coloresIndustria($industria){

    $lista = array(
        'Minería' => '#0057E9',
        'Cemento' => '#dc3545',
        'Energía' => '#87E911'
    );
    return $lista[$industria];
}


// en las consultas de datos contables, permite establecer la fuente
function estableceOrigenDatos($origen)
{
    switch ($origen)
    {
        case 1:
            return 'he_comprobantes_contables';
            break;

        case 2:
            return 'he_comprobantes_contables_cierre';
            break;

    }

}


function sumaHoras($listaHoras) {

    $sum = strtotime('00:00');
    $totaltime = 0;
    foreach( $listaHoras as $element ) {

        if ($element == '')
        {
            // Converting the time into seconds
            $timeinsec = strtotime('00:00') - $sum;

            // Sum the time with previous value
            $totaltime = $totaltime + $timeinsec;

        }else
        {
            // Converting the time into seconds
            $timeinsec = strtotime($element) - $sum;

            // Sum the time with previous value
            $totaltime = $totaltime + $timeinsec;
        }


    }

// Totaltime is the summation of all
// time in seconds

// Hours is obtained by dividing
// totaltime with 3600
    $h = intval($totaltime / 3600);
    $totaltime = $totaltime - ($h * 3600);
// Minutes is obtained by dividing
// remaining total time with 60
    $m = intval($totaltime / 60);

// Remaining value is seconds
    //$s = $totaltime - ($m * 60);

    $mFinal = (strlen($m) >= 2 ? $m : '0'.$m);

    return $h.':'.$mFinal;
}


function semanaAFechas($nroSemana, $ano) {
    $dto = new DateTime();
    $dto->setISODate($ano, $nroSemana);
    $ret['week_start'] = $dto->format('Y-m-d');
    $dto->modify('+6 days');
    $ret['week_end'] = $dto->format('Y-m-d');
    return $ret;
}



