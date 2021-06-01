<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CargosControlador
{

    public static function ctrExportarExcel($lista)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Periodo');
        $sheet->setCellValue('B1', 'Mes');
        $sheet->setCellValue('C1', 'Centro de Costo');
        $sheet->setCellValue('D1', 'Cargo');
        $sheet->setCellValue('E1', 'Dot. Actual');
        $sheet->setCellValue('F1', 'Dot. Programada');
        $indiceFila = 2;

        foreach ($lista as $row)
        {
            $sheet->setCellValue('A'.$indiceFila, $row['periodo']);
            $sheet->setCellValue('B'.$indiceFila, nroaMes($row['mes']));
            $sheet->setCellValue('C'.$indiceFila, $row['nom_cco']);
            $sheet->setCellValue('D'.$indiceFila, $row['cargo']);
            $sheet->setCellValue('E'.$indiceFila, $row['cantidad']);
            $sheet->setCellValue('F'.$indiceFila, $row['headc']);
            $indiceFila++;
        }


        $writer = new Xlsx($spreadsheet);
        $nomArchivo = 'head_count_'.date('d_m_Y').'.xlsx';
        $writer->save('tmp/'.$nomArchivo);

    }

    public static function ctrverHeadCount($periodo,$mes,$cco)
    {
        $listaRetorno = array();
        $resu = CargosModelo::mdlverHeadCount($periodo,$mes,$cco);

        $listaHeadCount = CargosModelo::mdlVerHeadCountAnual($periodo);


        foreach ($resu as $row)
        {
            $dot = 0;
            foreach ($listaHeadCount as $row2)
            {
                if ($row2['nom_cargo'] == $row['cargo'] && $row2['cco'] == $row['cco'])
                {

                    $dot = $row2['dotacion'];
                }


            }
            $a = array(
                'periodo' => $row['periodo'],
                'mes' => $row['mes'],
                'nom_cco' => $row['nom_cco'],
                'cargo' => $row['cargo'],
                'cantidad' => $row['cantidad'],
                'headc' => $dot
            );
            $listaRetorno[] = $a;
        }

        return $listaRetorno;
    }

    public static function ctrverHeadCountTrabajadores($periodo,$mes,$cco,$cargo)
    {
        return CargosModelo::mdlverHeadCountTrabajadores($periodo,$mes,$cco,$cargo);
    }


    public static function ctrverCCO()
    {
        return CargosModelo::mdlverCCO();
    }


    public static function ctrVerPeriodos()
    {
        return CargosModelo::mdlverPeriodos();
    }

    public static function ctrverPeriodosAno()
    {
        return CargosModelo::mdlverPeriodosAno();
    }







}

