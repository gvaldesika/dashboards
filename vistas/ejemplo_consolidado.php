

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <center><h3>Informe Consolidado</h3></center><br>
                <?php

                $ano = '';
                if(isset($_POST['btnMostrar']))
                {
                    $origen = $_POST['dropOrigen'];
                    $ano = $_POST['dropPerido'];
                    $resu = null;
                    switch ($origen)
                    {
                        case 1: //Data en vivo
                            $resu = ComprobantesControlador::ctrObtenerConsolidado($ano,1);
                            break;

                        case 2: // Data publicada
                            $resu = ResultadosControlador::ctrObtenerInformeAnualColumna(1,$ano);
                            break;
                    }


                    $_SESSION['anoConsolidado'] = $ano;

                    switch ($origen)
                    {
                        case 1:
                            $_SESSION['origenConsolidado'] = 'Dato en vivo';
                            break;

                        case 2:
                            $_SESSION['origenConsolidado'] = 'Datos publicados (*Beta)';
                            break;
                    }



                }else
                {

                    $ano = date('Y');
                    $_SESSION['origenConsolidado'] = 'Dato en vivo';
                    $_SESSION['anoConsolidado'] = $ano;
                    $resu = ComprobantesControlador::ctrObtenerConsolidado($ano,1);
                }



                ?>


<form method="post">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="cars">Escoja origen del dato</label>
                        <select name="dropOrigen" id="dropOrigen" class="form-control">
                            <option value="1">Dato en vivo</option>
                            <option value="2">Datos publicados (*Beta)</option>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label for="cars">Seleccione Periodo</label>
                        <select name="dropPerido" id="dropPerido" class="form-control">
                            <option value="2020">2020</option>
                            <option value="2021" selected="selected">2021</option>
                            <option value="2022">2020</option>
                            <option value="2023">2020</option>
                            <option value="2024">2020</option>
                            <option value="2025">2020</option>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label for="cars">&nbsp;</label><br>
                        <button type="submit" name="btnMostrar" id="btnMostrar" class="btn btn-primary">Mostrar</button>
                    </div>
                </div>
</form>

                <br>

                <table class="table table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="13"><center>RESULTADO CONSOLIDADOS MENSUALES - PERIODO ENERO <?php echo $_SESSION['anoConsolidado']; ?> / DICIEMBRE <?php echo $_SESSION['anoConsolidado']; ?> - Fuente: <?php echo $_SESSION['origenConsolidado']; ?></center></th>
                    </tr>



                    <tr>
                        <th scope="col">Estado Resultado</th>
                        <th scope="col">Enero</th>
                        <th scope="col">Febrero</th>
                        <th scope="col">Marzo</th>
                        <th scope="col">Abril</th>
                        <th scope="col">Mayo</th>
                        <th scope="col">Junio</th>
                        <th scope="col">Julio</th>
                        <th scope="col">Agosto</th>
                        <th scope="col">Septiembre</th>
                        <th scope="col">Octubre</th>
                        <th scope="col">Noviembre</th>
                        <th scope="col">Diciembre</th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php
                    // 1 - Ingresos
                    echo '<tr>';
                    echo '<td>Ingresos de Explotación</td>';
                    echo '<td>'.formateaNumeroMillones($resu[0]['ingresos']).'</td>';
                    echo '<td>'.formateaNumeroMillones($resu[1]['ingresos']).'</td>';
                    echo '<td>'.formateaNumeroMillones($resu[2]['ingresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['ingresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['ingresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['ingresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['ingresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['ingresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['ingresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['ingresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['ingresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['ingresos']).'</td>';
                    echo '</tr>';

                    // 2 - Costo Directo
                    echo '<tr>';
                    echo '<td>Costo Directo</td>';
                    echo '<td>'.formateaNumero($resu[0]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[1]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[2]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['costo']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['costo']).'</td>';
                    echo '</tr>';

                    // 3 - Margen de Contribucion
                    echo '<tr>';
                    echo '<td class="table-active" >Margen de Contribución</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[0]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[1]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[2]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[3]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[4]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[5]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[6]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[7]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[8]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[9]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[10]['margenContrib']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[11]['margenContrib']).'</td>';
                    echo '</tr>';

                    // 4 - % Margen de Contribucion %
                    echo '<tr>';
                    echo '<td class="table-active">Margen de Contribucion (%)</td>';
                    echo '<td class="table-active">'.round($resu[0]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[1]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[2]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[3]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[4]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[5]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[6]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[7]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[8]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[9]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[10]['margenContribPorc']*100,1) .'%</td>';
                    echo '<td class="table-active">'.round($resu[11]['margenContribPorc']*100,1) .'%</td>';
                    echo '</tr>';


                    // 5 - Ventas / Costo Directo
                    echo '<tr>';
                    echo '<td>Ventas/Costo Directo</td>';
                    echo '<td>'.round($resu[0]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[1]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[2]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[3]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[4]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[5]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[6]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[7]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[8]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[9]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[10]['ventasCosto'],2).'</td>';
                    echo '<td>'.round($resu[11]['ventasCosto'],2).'</td>';
                    echo '</tr>';


                    // 6 - Gastos de Adm. y Ventas
                    echo '<tr>';
                    echo '<td>Gastos de Adm. y Ventas</td>';
                    echo '<td>'.formateaNumero($resu[0]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[1]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[2]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['gav']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['gav']).'</td>';
                    echo '</tr>';


                    // 7 - Gastos de Ventas / Ingresos (%)
                    echo '<tr>';
                    echo '<td>Gastos de Ventas / Ingresos (%)</td>';
                    echo '<td>'.round($resu[0]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[1]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[2]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[3]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[4]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[5]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[6]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[7]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[8]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[9]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[10]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '<td>'.round($resu[11]['gavIngresos']*100,1)*-1 .'%</td>';
                    echo '</tr>';

                    // 8 - Resultado Operacional
                    echo '<tr>';
                    echo '<td>Resultado Operacional</td>';
                    echo '<td>'.formateaNumero($resu[0]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[1]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[2]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['resuOp']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['resuOp']).'</td>';
                    echo '</tr>';


                    // 9 - Otros Ingresos
                    echo '<tr>';
                    echo '<td>Otros Ingresos</td>';
                    echo '<td>'.formateaNumeroMillones($resu[0]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumeroMillones($resu[1]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[2]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['otrosIngresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['otrosIngresos']).'</td>';
                    echo '</tr>';


                    // 10 - Otros Egresos
                    echo '<tr>';
                    echo '<td>Otros Egresos</td>';
                    echo '<td>'.formateaNumero($resu[0]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[1]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[2]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['otrosEgresos']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['otrosEgresos']).'</td>';
                    echo '</tr>';

                    // 11 - Gastos Financieros
                    echo '<tr>';
                    echo '<td>Gastos Financieros</td>';
                    echo '<td>'.formateaNumero($resu[0]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[1]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[2]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['gastosFinc']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['gastosFinc']).'</td>';
                    echo '</tr>';


                    // 11 - Correción Monetaria
                    echo '<tr>';
                    echo '<td>Correción Monetaria</td>';
                    echo '<td>'.formateaNumero($resu[0]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[1]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[2]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['corrMonetaria']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['corrMonetaria']).'</td>';
                    echo '</tr>';


                    // 12 - Resultado No Operacional
                    echo '<tr>';
                    echo '<td class="table-active">Resultado No Operacional</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[0]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[1]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[2]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[3]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[4]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[5]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[6]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[7]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[8]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[9]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[10]['resuNoOp']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[11]['resuNoOp']).'</td>';
                    echo '</tr>';

                    // 13 - Resultado Antes de Impuestos
                    echo '<tr>';
                    echo '<td>Resultado Antes de Impuestos</td>';
                    echo '<td>'.formateaNumero($resu[0]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[1]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[2]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['resuAntesImpuestos']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['resuAntesImpuestos']).'</td>';
                    echo '</tr>';


                    // 14 - Impuesto Renta
                    echo '<tr>';
                    echo '<td>Impuesto Renta</td>';
                    echo '<td>'.formateaNumero($resu[0]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[1]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[2]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['impuestoRenta']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['impuestoRenta']).'</td>';
                    echo '</tr>';


                    // 15 - Resultado Desp. Impuestos
                    echo '<tr>';
                    echo '<td class="table-active">Resultado Desp. Impuestos</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[0]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[1]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[2]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[3]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[4]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[5]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[6]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[7]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[8]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[9]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[10]['resuDespuesImpuestos']).'</td>';
                    echo '<td class="table-active">'.formateaNumero($resu[11]['resuDespuesImpuestos']).'</td>';
                    echo '</tr>';

                    // 16 - EBITDA
                    echo '<tr>';
                    echo '<td>EBITDA</td>';
                    echo '<td>'.formateaNumero($resu[0]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[1]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[2]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[3]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[4]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[5]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[6]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[7]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[8]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[9]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[10]['ebitda']).'</td>';
                    echo '<td>'.formateaNumero($resu[11]['ebitda']).'</td>';
                    echo '</tr>';

                    // 17 - EBITDA (%)
                    echo '<tr>';
                    echo '<td>% EBITDA / Ingresos (%)</td>';
                    echo '<td>'.round($resu[0]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[1]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[2]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[3]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[4]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[5]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[6]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[7]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[8]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[9]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[10]['ebitdaPorc']*100,2).'%</td>';
                    echo '<td>'.round($resu[11]['ebitdaPorc']*100,2).'%</td>';
                    echo '</tr>';


                    ?>

                    <!--
                    <tr>
                        <td>Ingresos de Explotación</td>
                        <td>
                            <?php
                            //echo number_format($ingreso['sum'],1);
                            ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Costo Directo</td>
                        <td>(469.6)</td>

                    </tr>
                    <tr>
                        <td>Margen de Contribución</td>
                        <td>135.3</td>

                    </tr>
                    <tr>
                        <td>% Margen de Contribución (%)</td>
                        <td>22.4%</td>

                    </tr>
                    <tr>
                        <td>Ventas / Costo Directo</td>
                        <td>1.3</td>

                    </tr>
                    <tr>
                        <td>Gastos de Adm. y Ventas</td>
                        <td>(105.3)</td>
                    </tr>
                    <tr>
                        <td>% Gastos de Ventas / Ingresos (%)</td>
                        <td>17.4%</td>
                    </tr>
                    <tr>
                        <td>Resultado Operacional</td>
                        <td>30.0</td>
                    </tr>
                    <tr>
                        <td>Otros Ingresos</td>
                        <td>1.3</td>
                    </tr>
                    <tr>
                        <td>Otros Egresos</td>
                        <td>0.0</td>
                    </tr>
                    <tr>
                        <td>Gastos Financieros</td>
                        <td>(11.8)</td>
                    </tr>
                    <tr>
                        <td>Correción Monetaria</td>
                        <td>(80.7)</td>
                    </tr>
                    <tr>
                        <td>Resultado No Operacional</td>
                        <td>(91.3)</td>
                    </tr>
                    <tr>
                        <td>Resultado Antes de Impuestos</td>
                        <td>(61.2)</td>
                    </tr>
                    <tr>
                        <td>EBITDA</td>
                        <td>(79.0)</td>
                    </tr>
                    <tr>
                        <td>% EBITDA / Ingresos (%)</td>
                        <td>(13.1%)</td>
                    </tr> -->

                    </tbody>
                </table>


            </div>
        </div>
    </div>

</div>


