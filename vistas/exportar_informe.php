<?php
session_start();
$var = $_SESSION['informe'];
session_write_close();



require_once $_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php';

ini_set('memory_limit', '4000M');
ini_set('max_execution_time', 0);
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


$spreadsheet = new Spreadsheet();

switch ($var['nom_informe'])
{

    case 'resultado_obra':
        $spreadsheet->getActiveSheet()->mergeCells("A2:N2");

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A2', 'RESULTADO POR OBRA: '.$var['nom_cco'].' - PERIODO '.$var['periodo']);


        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A3', 'Estado Resultado (Millones de Pesos)')
            ->setCellValue('B3', 'Ene')
            ->setCellValue('C3', 'Feb')
            ->setCellValue('D3', 'Mar')
            ->setCellValue('E3', 'Abr')
            ->setCellValue('F3', 'May')
            ->setCellValue('G3', 'Jun')
            ->setCellValue('H3', 'Jul')
            ->setCellValue('I3', 'Ago')
            ->setCellValue('J3', 'Sep')
            ->setCellValue('K3', 'Oct')
            ->setCellValue('L3', 'Nov')
            ->setCellValue('M3', 'Dic')
            ->setCellValue('N3', 'Tot');

        $indiceFila =4;

        foreach ($var['informe']['Ingresos de Explotación'] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, 'Ingresos de Explotación')
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Maquinarias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Maquinarias Propias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Vehiculos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Alojamiento y Pensión';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Combustible';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Comunicaciones';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Contratista';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Correc. Monetaria';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Demovilización Faenas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Depreciacion Activo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Flete Maquinarias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos de Viaje y Representación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos Generales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Indemnizaciones';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Mat. E Insumos Varios';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Multas, Infracciones y Mermas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Patentes y D° Municipales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Remuneraciones y Gastos del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Servicios Administrativos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Servicio de Alimentación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Servicio de Vigilancia';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Servicios Técnicos Industriales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Sistemas TI y Software';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Transporte Combustibles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Transporte del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Vacaciones Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }


        $indiceFila++;
        $op = 'Total Costo Directo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Resultados Operacionales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Margen de Contribución (%)';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaPorcentajes($row[1]))
                ->setCellValue('C'.$indiceFila, formateaPorcentajes($row[2]))
                ->setCellValue('D'.$indiceFila, formateaPorcentajes($row[3]))
                ->setCellValue('E'.$indiceFila, formateaPorcentajes($row[4]))
                ->setCellValue('F'.$indiceFila, formateaPorcentajes($row[5]))
                ->setCellValue('G'.$indiceFila, formateaPorcentajes($row[6]))
                ->setCellValue('H'.$indiceFila, formateaPorcentajes($row[7]))
                ->setCellValue('I'.$indiceFila, formateaPorcentajes($row[8]))
                ->setCellValue('J'.$indiceFila, formateaPorcentajes($row[9]))
                ->setCellValue('K'.$indiceFila, formateaPorcentajes($row[10]))
                ->setCellValue('L'.$indiceFila, formateaPorcentajes($row[11]))
                ->setCellValue('M'.$indiceFila, formateaPorcentajes($row[12]))
                ->setCellValue('N'.$indiceFila, formateaPorcentajes($row[13]));
        }


        $indiceFila++;
        $op = 'Gastos Adm. y Ventas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Total Resultado';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $spreadsheet->getActiveSheet()->setTitle("Res. Obras");
        $nomArchivo = 'resultado_obras';
        break;

     // **** Informe Consolidado General - Utilizado en fi_inf_consolidado.php ****
    case 'consolidado_general': //

        $spreadsheet->getActiveSheet()->mergeCells("A2:N2");

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A2', 'INFORME CONSOLIDADO '.$var['nom_cco'].' - PERIODO '.$var['periodo']);


        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A3', 'Estado Resultado (Millones de Pesos)')
            ->setCellValue('B3', 'Ene')
            ->setCellValue('C3', 'Feb')
            ->setCellValue('D3', 'Mar')
            ->setCellValue('E3', 'Abr')
            ->setCellValue('F3', 'May')
            ->setCellValue('G3', 'Jun')
            ->setCellValue('H3', 'Jul')
            ->setCellValue('I3', 'Ago')
            ->setCellValue('J3', 'Sep')
            ->setCellValue('K3', 'Oct')
            ->setCellValue('L3', 'Nov')
            ->setCellValue('M3', 'Dic')
            ->setCellValue('N3', 'Tot');

        $indiceFila =4;

        foreach ($var['informe']['Ingresos de Explotación'] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, 'Ingresos de Explotación')
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Costo Directo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Margen de Contribución';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = '% Margen de Contribución (%)';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaPorcentajes($row[1]))
                ->setCellValue('C'.$indiceFila, formateaPorcentajes($row[2]))
                ->setCellValue('D'.$indiceFila, formateaPorcentajes($row[3]))
                ->setCellValue('E'.$indiceFila, formateaPorcentajes($row[4]))
                ->setCellValue('F'.$indiceFila, formateaPorcentajes($row[5]))
                ->setCellValue('G'.$indiceFila, formateaPorcentajes($row[6]))
                ->setCellValue('H'.$indiceFila, formateaPorcentajes($row[7]))
                ->setCellValue('I'.$indiceFila, formateaPorcentajes($row[8]))
                ->setCellValue('J'.$indiceFila, formateaPorcentajes($row[9]))
                ->setCellValue('K'.$indiceFila, formateaPorcentajes($row[10]))
                ->setCellValue('L'.$indiceFila, formateaPorcentajes($row[11]))
                ->setCellValue('M'.$indiceFila, formateaPorcentajes($row[12]))
                ->setCellValue('N'.$indiceFila, formateaPorcentajes($row[13]));
        }
        $indiceFila++;

        $op = 'Gastos de Adm. y Ventas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = '% Gastos de Ventas / Ingresos (%)';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaPorcentajes($row[1]))
                ->setCellValue('C'.$indiceFila, formateaPorcentajes($row[2]))
                ->setCellValue('D'.$indiceFila, formateaPorcentajes($row[3]))
                ->setCellValue('E'.$indiceFila, formateaPorcentajes($row[4]))
                ->setCellValue('F'.$indiceFila, formateaPorcentajes($row[5]))
                ->setCellValue('G'.$indiceFila, formateaPorcentajes($row[6]))
                ->setCellValue('H'.$indiceFila, formateaPorcentajes($row[7]))
                ->setCellValue('I'.$indiceFila, formateaPorcentajes($row[8]))
                ->setCellValue('J'.$indiceFila, formateaPorcentajes($row[9]))
                ->setCellValue('K'.$indiceFila, formateaPorcentajes($row[10]))
                ->setCellValue('L'.$indiceFila, formateaPorcentajes($row[11]))
                ->setCellValue('M'.$indiceFila, formateaPorcentajes($row[12]))
                ->setCellValue('N'.$indiceFila, formateaPorcentajes($row[13]));
        }
        $indiceFila++;

        $op = 'Resultado Operacional';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Otros Ingresos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Otros Egresos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Gastos Financieros';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Correc. Monetaria';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Resultado No Operacional';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Resultado Antes de Impuestos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Impuesto Renta';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Resultado Desp. Impuestos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'EBITDA';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = '% EBITDA / Ingresos (%)';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaPorcentajes($row[1]))
                ->setCellValue('C'.$indiceFila, formateaPorcentajes($row[2]))
                ->setCellValue('D'.$indiceFila, formateaPorcentajes($row[3]))
                ->setCellValue('E'.$indiceFila, formateaPorcentajes($row[4]))
                ->setCellValue('F'.$indiceFila, formateaPorcentajes($row[5]))
                ->setCellValue('G'.$indiceFila, formateaPorcentajes($row[6]))
                ->setCellValue('H'.$indiceFila, formateaPorcentajes($row[7]))
                ->setCellValue('I'.$indiceFila, formateaPorcentajes($row[8]))
                ->setCellValue('J'.$indiceFila, formateaPorcentajes($row[9]))
                ->setCellValue('K'.$indiceFila, formateaPorcentajes($row[10]))
                ->setCellValue('L'.$indiceFila, formateaPorcentajes($row[11]))
                ->setCellValue('M'.$indiceFila, formateaPorcentajes($row[12]))
                ->setCellValue('N'.$indiceFila, formateaPorcentajes($row[13]));
        }
        $indiceFila++;
        $spreadsheet->getActiveSheet()->setTitle("Consolidado");
        $nomArchivo = 'consolidado_general';
        break;

    // **** Informe Unidad de Negocios - Utilizado en fi_inf_unindustrial.php - fi_inf_uninfraestructura.php - fi_inf_unmineria.php ****
    case 'resultado_unidad':
        $spreadsheet->getActiveSheet()->mergeCells("A2:N2");

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A2', 'RESULTADO POR UN: '.$var['nom_cco'].' - PERIODO '.$var['periodo']);


        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A3', 'Resultados UN (Millones de Pesos)')
            ->setCellValue('B3', 'Ene')
            ->setCellValue('C3', 'Feb')
            ->setCellValue('D3', 'Mar')
            ->setCellValue('E3', 'Abr')
            ->setCellValue('F3', 'May')
            ->setCellValue('G3', 'Jun')
            ->setCellValue('H3', 'Jul')
            ->setCellValue('I3', 'Ago')
            ->setCellValue('J3', 'Sep')
            ->setCellValue('K3', 'Oct')
            ->setCellValue('L3', 'Nov')
            ->setCellValue('M3', 'Dic')
            ->setCellValue('N3', 'Tot');

        $indiceFila =4;

        foreach ($var['informe']['Ingresos de Explotación'] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, 'Ingresos de Explotación')
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Maquinarias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Maquinarias Propias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Vehiculos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Alojamiento y Pensión';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Combustible';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Comunicaciones';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Contratista';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Correc. Monetaria';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Demovilización Faenas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Depreciacion Activo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Flete Maquinarias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos de Viaje y Representación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos Generales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Indemnizaciones';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Mat. E Insumos Varios';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Multas, Infracciones y Mermas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Patentes y D° Municipales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Remuneraciones y Gastos del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Servicios Administrativos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Servicio de Alimentación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Servicio de Vigilancia';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Servicios Técnicos Industriales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Sistemas TI y Software';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Transporte Combustibles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Transporte del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Vacaciones Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }


        $indiceFila++;
        $op = 'Total Costo Directo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Resultados Operacionales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Margen de Contribución (%)';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaPorcentajes($row[1]))
                ->setCellValue('C'.$indiceFila, formateaPorcentajes($row[2]))
                ->setCellValue('D'.$indiceFila, formateaPorcentajes($row[3]))
                ->setCellValue('E'.$indiceFila, formateaPorcentajes($row[4]))
                ->setCellValue('F'.$indiceFila, formateaPorcentajes($row[5]))
                ->setCellValue('G'.$indiceFila, formateaPorcentajes($row[6]))
                ->setCellValue('H'.$indiceFila, formateaPorcentajes($row[7]))
                ->setCellValue('I'.$indiceFila, formateaPorcentajes($row[8]))
                ->setCellValue('J'.$indiceFila, formateaPorcentajes($row[9]))
                ->setCellValue('K'.$indiceFila, formateaPorcentajes($row[10]))
                ->setCellValue('L'.$indiceFila, formateaPorcentajes($row[11]))
                ->setCellValue('M'.$indiceFila, formateaPorcentajes($row[12]))
                ->setCellValue('N'.$indiceFila, formateaPorcentajes($row[13]));
        }


        $indiceFila++;
        $op = 'Gastos Adm. y Ventas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Total Resultado';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $spreadsheet->getActiveSheet()->setTitle("Res. UN");
        $nomArchivo = 'resultado_un';
        break;

    // **** Informe Unidad de Maquinaria - fi_inf_maquinaria_usd.php ****
    case 'resultado_maquinaria_usd':
        $spreadsheet->getActiveSheet()->mergeCells("A2:N2");

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A2', 'RESULTADOS '.$var['nom_cco'].' - PERIODO '.$var['periodo']);

        $textoInforme = 'Resultados (Miles de $USD)';
        $esUSD = 1;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A3', $textoInforme)
            ->setCellValue('B3', 'Ene')
            ->setCellValue('C3', 'Feb')
            ->setCellValue('D3', 'Mar')
            ->setCellValue('E3', 'Abr')
            ->setCellValue('F3', 'May')
            ->setCellValue('G3', 'Jun')
            ->setCellValue('H3', 'Jul')
            ->setCellValue('I3', 'Ago')
            ->setCellValue('J3', 'Sep')
            ->setCellValue('K3', 'Oct')
            ->setCellValue('L3', 'Nov')
            ->setCellValue('M3', 'Dic')
            ->setCellValue('N3', 'Tot');

        $indiceFila =4;

        foreach ($var['informe']['Ingresos de Posicionamiento'] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, 'Ingresos de Posicionamiento')
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Ingresos de Operación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Descuento Disponibilidad';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Ingresos de Explotación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Maquinarias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Maquinarias Propias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Vehiculos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Alojamiento y Pensión';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Combustible';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Comunicaciones';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Contratista';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        // OJO ACA en informe $USD (no es necesaria la corr. monetaria)
        if ($esUSD!=1)
        {
            $indiceFila++;
            $op = 'Correc. Monetaria';
            foreach ($var['informe'][$op] as $row)
            {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$indiceFila, $op)
                    ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                    ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                    ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                    ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                    ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                    ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                    ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                    ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                    ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                    ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                    ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                    ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                    ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
            }
        }



        $indiceFila++;
        $op = 'Depreciacion Activo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Depreciacion Activos Leasing';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Flete Maquinarias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos de Viaje y Representación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos Financieros';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos Generales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Mantención Equipos Móviles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Mat. E Insumos Varios';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Multas, Infracciones y Mermas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Neumáticos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Otros Ingresos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Permisos de Circulación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Remuneraciones y Gastos del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Reparación Equipos Móviles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Seguros Generales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }


        $indiceFila++;
        $op = 'Servicio Mant. Full Service';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Servicios Técnicos Industriales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;

        $op = 'Transporte Combustibles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Transporte del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Vacaciones Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Total Costo Directo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }
        $indiceFila++;
        $op = 'Costo Mantención';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $indiceFila++;
        $op = 'Margen de Contribución';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaDolares($row[1]))
                ->setCellValue('C'.$indiceFila, formateaDolares($row[2]))
                ->setCellValue('D'.$indiceFila, formateaDolares($row[3]))
                ->setCellValue('E'.$indiceFila, formateaDolares($row[4]))
                ->setCellValue('F'.$indiceFila, formateaDolares($row[5]))
                ->setCellValue('G'.$indiceFila, formateaDolares($row[6]))
                ->setCellValue('H'.$indiceFila, formateaDolares($row[7]))
                ->setCellValue('I'.$indiceFila, formateaDolares($row[8]))
                ->setCellValue('J'.$indiceFila, formateaDolares($row[9]))
                ->setCellValue('K'.$indiceFila, formateaDolares($row[10]))
                ->setCellValue('L'.$indiceFila, formateaDolares($row[11]))
                ->setCellValue('M'.$indiceFila, formateaDolares($row[12]))
                ->setCellValue('N'.$indiceFila, formateaDolares($row[13]));
        }

        $spreadsheet->getActiveSheet()->setTitle("Res. Maquinaria \$USD");
        $nomArchivo = 'resultado_maquinaria';
        break;

    // **** Informe Unidad de Maquinaria - Utilizado en fi_inf_maquinaria.php ****
    case 'resultado_maquinaria':
        $spreadsheet->getActiveSheet()->mergeCells("A2:N2");

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A2', 'RESULTADOS '.$var['nom_cco'].' - PERIODO '.$var['periodo']);

        $textoInforme = 'Resultados (Millones de Pesos)';
        $esUSD = 0;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A3', $textoInforme)
            ->setCellValue('B3', 'Ene')
            ->setCellValue('C3', 'Feb')
            ->setCellValue('D3', 'Mar')
            ->setCellValue('E3', 'Abr')
            ->setCellValue('F3', 'May')
            ->setCellValue('G3', 'Jun')
            ->setCellValue('H3', 'Jul')
            ->setCellValue('I3', 'Ago')
            ->setCellValue('J3', 'Sep')
            ->setCellValue('K3', 'Oct')
            ->setCellValue('L3', 'Nov')
            ->setCellValue('M3', 'Dic')
            ->setCellValue('N3', 'Tot');

        $indiceFila =4;

        foreach ($var['informe']['Ingresos de Posicionamiento'] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, 'Ingresos de Posicionamiento')
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Ingresos de Operación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Descuento Disponibilidad';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Ingresos de Explotación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Maquinarias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Maquinarias Propias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Vehiculos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Alojamiento y Pensión';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Combustible';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Comunicaciones';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Contratista';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        // OJO ACA en informe $USD (no es necesaria la corr. monetaria)
        if ($esUSD!=1)
        {
            $indiceFila++;
            $op = 'Correc. Monetaria';
            foreach ($var['informe'][$op] as $row)
            {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$indiceFila, $op)
                    ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                    ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                    ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                    ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                    ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                    ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                    ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                    ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                    ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                    ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                    ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                    ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                    ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
            }
        }



        $indiceFila++;
        $op = 'Depreciacion Activo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Depreciacion Activos Leasing';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Flete Maquinarias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos de Viaje y Representación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos Financieros';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos Generales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Mantención Equipos Móviles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Mat. E Insumos Varios';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Multas, Infracciones y Mermas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Neumáticos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Otros Ingresos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Permisos de Circulación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Remuneraciones y Gastos del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Reparación Equipos Móviles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Seguros Generales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }


        $indiceFila++;
        $op = 'Servicio Mant. Full Service';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Servicios Técnicos Industriales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;

        $op = 'Transporte Combustibles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Transporte del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Vacaciones Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Total Costo Directo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Costo Mantención';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Margen de Contribución';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $spreadsheet->getActiveSheet()->setTitle("Res. Maquinaria");
        $nomArchivo = 'resultado_maquinaria';
        break;

// **** Informe Unidad de Maquinaria - Utilizado en fi_inf_admyventas.php ****
    case 'adm_finc':
        $spreadsheet->getActiveSheet()->mergeCells("A2:N2");

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A2', 'RESULTADOS  '.$var['nom_cco'].' - PERIODO '.$var['periodo']);


        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A3', 'Estado Resultado (Millones de Pesos)')
            ->setCellValue('B3', 'Ene')
            ->setCellValue('C3', 'Feb')
            ->setCellValue('D3', 'Mar')
            ->setCellValue('E3', 'Abr')
            ->setCellValue('F3', 'May')
            ->setCellValue('G3', 'Jun')
            ->setCellValue('H3', 'Jul')
            ->setCellValue('I3', 'Ago')
            ->setCellValue('J3', 'Sep')
            ->setCellValue('K3', 'Oct')
            ->setCellValue('L3', 'Nov')
            ->setCellValue('M3', 'Dic')
            ->setCellValue('N3', 'Tot');

        $indiceFila =4;

        $op = 'Arriendo Inmuebles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Maquinarias Propias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Vehiculos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Alojamiento y Pensión';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Combustible';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Comunicaciones';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Contratista';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Depreciacion Activo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;

        $op = 'Gastos de Viaje y Representación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos Generales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Indemnizaciones';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Mat. E Insumos Varios';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Multas, Infracciones y Mermas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Patentes y D° Municipales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Remuneraciones y Gastos del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Servicios Administrativos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;
        $op = 'Servicio de Alimentación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Servicio de Vigilancia';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Servicios Técnicos Industriales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;


        $op = 'Seguros Generales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Suministros Básicos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }
        $indiceFila++;

        $op = 'Sistemas TI y Software';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Transporte Combustibles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Transporte del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Vacaciones Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }


        $indiceFila++;
        $op = 'Total Costo Directo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Correc. Monetaria';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Costo Venta Act. Fijo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }


        $indiceFila++;
        $op = 'Gastos Bancarios';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Impuesto Renta';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Otros Ingresos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $indiceFila++;
        $op = 'Otros Ingresos / Egresos / Impto.';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumeroMillones($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumeroMillones($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumeroMillones($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumeroMillones($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumeroMillones($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumeroMillones($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumeroMillones($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumeroMillones($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumeroMillones($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumeroMillones($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumeroMillones($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumeroMillones($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumeroMillones($row[13]));
        }

        $spreadsheet->getActiveSheet()->setTitle("Res. Adm. y Vent.");
        $nomArchivo = 'resultado_admyvent';
        break;

    // **** Informe Unidad de Maquinaria - Utilizado en fi_inf_maquinaria.php ****
    case 'resultado_mantencion':
        $spreadsheet->getActiveSheet()->mergeCells("A2:N2");

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A2', 'RESULTADOS '.$var['nom_cco'].' - PERIODO '.$var['periodo']);

        $textoInforme = 'Resultados (Miles de Pesos)';

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A3', $textoInforme)
            ->setCellValue('B3', 'Ene')
            ->setCellValue('C3', 'Feb')
            ->setCellValue('D3', 'Mar')
            ->setCellValue('E3', 'Abr')
            ->setCellValue('F3', 'May')
            ->setCellValue('G3', 'Jun')
            ->setCellValue('H3', 'Jul')
            ->setCellValue('I3', 'Ago')
            ->setCellValue('J3', 'Sep')
            ->setCellValue('K3', 'Oct')
            ->setCellValue('L3', 'Nov')
            ->setCellValue('M3', 'Dic')
            ->setCellValue('N3', 'Tot');

        $indiceFila =4;


        $op = 'Arriendo Maquinarias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Maquinarias Propias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }
        $indiceFila++;
        $op = 'Arriendo Vehiculos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }
        $indiceFila++;
        $op = 'Alojamiento y Pensión';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }
        $indiceFila++;
        $op = 'Combustible';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Comunicaciones';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Contratista';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        // OJO ACA en informe $USD (no es necesaria la corr. monetaria)
        if ($esUSD!=1)
        {
            $indiceFila++;
            $op = 'Correc. Monetaria';
            foreach ($var['informe'][$op] as $row)
            {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$indiceFila, $op)
                    ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                    ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                    ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                    ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                    ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                    ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                    ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                    ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                    ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                    ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                    ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                    ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                    ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
            }
        }



        $indiceFila++;
        $op = 'Depreciacion Activo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Depreciacion Activos Leasing';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Flete Maquinarias';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos de Viaje y Representación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos Financieros';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Gastos Generales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Mantención Equipos Móviles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Mat. E Insumos Varios';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }
        $indiceFila++;
        $op = 'Multas, Infracciones y Mermas';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }
        $indiceFila++;
        $op = 'Neumáticos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Otros Ingresos';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Permisos de Circulación';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Remuneraciones y Gastos del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Reparación Equipos Móviles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Seguros Generales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }


        $indiceFila++;
        $op = 'Servicio Mant. Full Service';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Servicios Técnicos Industriales';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;

        $op = 'Transporte Combustibles';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Transporte del Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }
        $indiceFila++;
        $op = 'Vacaciones Personal';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }
        $indiceFila++;
        $op = 'Total Costo Directo';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }
        $indiceFila++;
        $op = 'Costo Mantención';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $indiceFila++;
        $op = 'Margen de Contribución';
        foreach ($var['informe'][$op] as $row)
        {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$indiceFila, $op)
                ->setCellValue('B'.$indiceFila, formateaNumero($row[1]))
                ->setCellValue('C'.$indiceFila, formateaNumero($row[2]))
                ->setCellValue('D'.$indiceFila, formateaNumero($row[3]))
                ->setCellValue('E'.$indiceFila, formateaNumero($row[4]))
                ->setCellValue('F'.$indiceFila, formateaNumero($row[5]))
                ->setCellValue('G'.$indiceFila, formateaNumero($row[6]))
                ->setCellValue('H'.$indiceFila, formateaNumero($row[7]))
                ->setCellValue('I'.$indiceFila, formateaNumero($row[8]))
                ->setCellValue('J'.$indiceFila, formateaNumero($row[9]))
                ->setCellValue('K'.$indiceFila, formateaNumero($row[10]))
                ->setCellValue('L'.$indiceFila, formateaNumero($row[11]))
                ->setCellValue('M'.$indiceFila, formateaNumero($row[12]))
                ->setCellValue('N'.$indiceFila, formateaNumero($row[13]));
        }

        $spreadsheet->getActiveSheet()->setTitle("Res. Mantencion");
        $nomArchivo = 'resultado_mantencion';
        break;
}



/// ****** Aplica formatos (colores, anchos col., etc a planilla Excel *****
switch ($var['nom_informe'])
{
    case 'resultado_obra':
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(40);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getAlignment()->setHorizontal('center');
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A2:N3')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A31:N31')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A33:N33')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A35:N35')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A2:N'.$indiceFila)->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('A4:A'.$indiceFila)->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('N4:N'.$indiceFila)->getFont()->setBold( true );
        break;

    case 'consolidado_general':
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(40);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getAlignment()->setHorizontal('center');
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A2:N3')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A2:N'.$indiceFila)->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('A4:A'.$indiceFila)->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('N4:N'.$indiceFila)->getFont()->setBold( true );
        break;


    case 'resultado_unidad':
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(40);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getAlignment()->setHorizontal('center');
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A2:N3')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A31:N31')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A33:N33')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A35:N35')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A2:N'.$indiceFila)->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('A4:A'.$indiceFila)->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('N4:N'.$indiceFila)->getFont()->setBold( true );
        break;

    case 'resultado_maquinaria_usd':
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(40);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getAlignment()->setHorizontal('center');
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A2:N3')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        // Formato de celda para totales finales en USD o Peso
        if ($esUSD!=1)
        {
            $spreadsheet
                ->getActiveSheet()
                ->getStyle('A36:N36')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('c8c8c8');

            $spreadsheet
                ->getActiveSheet()
                ->getStyle('A38:N38')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('c8c8c8');

        }else
        {
            $spreadsheet
                ->getActiveSheet()
                ->getStyle('A7:N7')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('c8c8c8');

            $spreadsheet
                ->getActiveSheet()
                ->getStyle('A35:N35')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('c8c8c8');

            $spreadsheet
                ->getActiveSheet()
                ->getStyle('A37:N37')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('c8c8c8');


        }

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A2:N'.$indiceFila)->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('A4:A'.$indiceFila)->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('N4:N'.$indiceFila)->getFont()->setBold( true );
        break;

    case 'resultado_maquinaria':
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(40);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getAlignment()->setHorizontal('center');
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A2:N3')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A36:N36')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A38:N38')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A7:N7')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A2:N'.$indiceFila)->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('A4:A'.$indiceFila)->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('N4:N'.$indiceFila)->getFont()->setBold( true );
        break;

    case 'adm_finc':
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(40);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getAlignment()->setHorizontal('center');
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A2:N3')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A29:N29')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');


        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A35:N35')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A2:N'.$indiceFila)->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('A4:A'.$indiceFila)->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('N4:N'.$indiceFila)->getFont()->setBold( true );
        break;

    case 'resultado_mantencion':
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(40);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('B4:N32')->getAlignment()->setHorizontal('right');
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A2:N3')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A32:N32')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c8c8c8');


        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A2:N'.$indiceFila)->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A2:N3')->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('A4:A'.$indiceFila)->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle('N4:N'.$indiceFila)->getFont()->setBold( true );
        break;

}
/// ****** Aplica formatos (colores, anchos col., etc a planilla Excel *****

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="informe_'.$nomArchivo.'_'.date("d/m/Y").'.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header ('Cache-Control: cache, must-revalidate');
header ('Pragma: public');
ob_end_clean();
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;





// *********************** Funciones de formato **********************

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