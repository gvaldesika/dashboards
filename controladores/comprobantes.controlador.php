<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/comprobantes.modelo.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/tablas.modelo.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/clientes.modelo.php';

class ComprobantesControlador
{

    // Utilitarios de Contabilidad-Finanzas

  public static function ctrObtenerPeriodosPublicados()
  {
      return ComprobantesModelo::mdlObtenerPeriodosPublicados();
  }


  public function ctrCierraData($ano,$mes,$usuario)
  {
      $resu = ComprobantesModelo::mdlCierraData($ano,$mes,$usuario);
      if($resu == 'ok')
      {
          echo '<script>
                        window.location = "main.php?pag=com_form_publica_fi&msg=ok1";
                    </script>';
      }
      else
      {
          echo '<script>
                        window.location = "main.php?pag=com_form_publica_fi&msg=err1";
                    </script>';
      }
  }

    public function ctrEliminaData($ano,$mes)
    {
        $resu = ComprobantesModelo::mdlEliminaData($ano,$mes);
        if($resu == 'ok')
        {
            echo '<script>
                        window.location = "main.php?pag=com_form_publica_fi&msg=ok2";
                    </script>';
        }
        else
        {
            echo '<script>
                        window.location = "main.php?pag=com_form_publica_fi&msg=err2";
                    </script>';
        }
    }



// FIN Utilitarios de Contabilidad-Finanzas




// Informe COnsolidado Directorio
    public static function ctrObtenerConsolidado($ano,$origen)
    {
        $tabla = '';
        switch ($origen)
        {
            case 1:
                $tabla = 'he_comprobantes_contables';
                break;

            case 2:
                $tabla = 'he_comprobantes_contables_cierre';
                break;

        }
        $consolidado = array();

        for ($i=1;$i<=12;$i++)
        {

            $ingresos = (ComprobantesModelo::mdlObtenerIngresos($ano,$i,$tabla)['sum']==null ? 0 : ComprobantesModelo::mdlObtenerIngresos($ano,$i,$tabla)['sum']);

            $costo = (ComprobantesModelo::mdlObtenerCostos($ano,$i,$tabla)['sum']==false ? 0 : ComprobantesModelo::mdlObtenerCostos($ano,$i,$tabla)['sum']);

            $margenContrib = $ingresos+$costo;
            $margenContribPorc =  (is_nan($margenContrib/$ingresos)? 0 : $margenContrib/$ingresos);
            $ventasCosto = (is_nan($ingresos/$costo)? 0 : $ingresos/$costo);
            $gav = (ComprobantesModelo::mdlObtenerGAV($ano,$i,$tabla)['sum']==false ? 0 : ComprobantesModelo::mdlObtenerGAV($ano,$i,$tabla)['sum']);
            $gavIngresos = ($gav==0 ? 0 : $gav/$ingresos);
            $resuOp = ($gav==false ? 0 : $margenContrib + $gav);

            $tmp1 = ComprobantesModelo::mdlObtenerClasifEstadoResul($ano,$i,'Otros Ingresos',$tabla);
            $otrosIngresos = ($tmp1==false ? 0 : $tmp1);


            $tmp2 = ComprobantesModelo::mdlObtenerClasifEstadoResul($ano,$i,'Otros Egresos',$tabla);
            $otrosEgresos = ($tmp2==false ? 0 : $tmp2);

            $tmp3 = ComprobantesModelo::mdlObtenerClasifEstadoResul($ano,$i,'Gastos Financieros',$tabla);
            $gastosFinc = ($tmp3==false ? 0 : $tmp3);

            $tmp4 = ComprobantesModelo::mdlObtenerClasifEstadoResul($ano,$i,'Correc. Monetaria',$tabla);
            $corrMonetaria = ($tmp4==false ? 0 : $tmp4);

            $resuNoOp = $otrosIngresos+$otrosEgresos+$gastosFinc+$corrMonetaria;


            $resuAntesImpuestos = $resuNoOp+$resuOp;
            $tmp6 = ComprobantesModelo::mdlObtenerClasifEstadoResul($ano,$i,'Impuesto Renta',$tabla);

            $impuestoRenta = ($tmp6==false ? 0 : $tmp6);
            $resuDespuesImpuestos = $resuAntesImpuestos+$impuestoRenta;

            $tmp5 = self::calculaEbitda($ano,$i,$resuOp,$tabla);
            $ebitda = ($tmp5==false ? 0 : $tmp5);

            $ebitdaPorc = ($tmp5==0 ? 0 : $ebitda/$ingresos);

            $mes = array(
                'ingresos' => $ingresos,
                'costo' => $costo,
                'margenContrib' => $margenContrib,
                'margenContribPorc' => $margenContribPorc,
                'ventasCosto' => $ventasCosto,
                'gav' => $gav,
                'gavIngresos' => $gavIngresos,
                'resuOp' => $resuOp,
                'otrosIngresos' => $otrosIngresos,
                'otrosEgresos' => $otrosEgresos,
                'gastosFinc' => $gastosFinc,
                'corrMonetaria' => $corrMonetaria,
                'resuNoOp' => $resuNoOp,
                'resuAntesImpuestos' => $resuAntesImpuestos,
                'impuestoRenta' => $impuestoRenta,
                'resuDespuesImpuestos' => $resuDespuesImpuestos,
                'ebitda' => $ebitda,
                'ebitdaPorc' => $ebitdaPorc
            );
            $consolidado[] = $mes;

        }

        return $consolidado;
    }

    public static function calculaEbitda($ano,$mes,$resuOp,$tabla)
    {
        $ebitda = $resuOp-ComprobantesModelo::mdlObtenerCuentaEbitda($ano,$mes,$tabla);
        return $ebitda;
    }
// Informe COnsolidado Directorio




// Informe UN

    public static function ctrObtenerAnualUN($ano,$origen,$un)
    {
        $tabla = '';
        switch ($origen)
        {
            case 1:
                $tabla = 'he_comprobantes_contables';
                break;

            case 2:
                $tabla = 'he_comprobantes_contables_cierre';
                break;

        }
        $consolidado = array();

        switch ($un)
        {
            case 1:
                for ($i=1;$i<=12;$i++)
                {
                    $inresos = ComprobantesModelo::mdlObtenerIngresosIndustrialMes($ano,$i,$tabla)['sum'];
                    // Costo Directo
                    $arriendoInmu = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Arriendo Inmuebles')['sum'];
                    $arriendoMaqu = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Arriendo Maquinarias')['sum'];
                    $arriendoMaquProp = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Arriendo Maquinarias Propias')['sum'];
                    $arriendoVeh = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Arriendo Vehiculos')['sum'];
                    $combustible = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Combustible')['sum'];
                    $comunicaciones = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Comunicaciones')['sum'];
                    $contratista = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Contratista')['sum'];
                    $desmFaena = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Demovilización Faenas')['sum'];
                    $fleteMaquinaria = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Flete Maquinarias')['sum'];
                    $gastoViaje = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Gastos de Viaje y Representación')['sum'];
                    $gastosGenerales = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Gastos Generales')['sum'];
                    $indemnizaciones = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Indemnizaciones')['sum'];
                    $materialesInsum = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Mat. E Insumos Varios')['sum'];
                    $multasInfracc = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Multas, Infracciones y Mermas')['sum'];
                    $patentesMunicipales = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Patentes y D° Municipales')['sum'];
                    $permisoCirc = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Permisos de Circulación')['sum'];

                    $remuneraciones = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Remuneraciones y Gastos del Personal')['sum'];
                    $servicioAlimentacion = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Servicio de Alimentación')['sum'];
                    $serviciosAdministr = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Servicios Administrativos')['sum'];
                    $servicioVigilancia = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Servicio de Vigilancia')['sum'];
                    $servicioTecnico = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Servicios Técnicos Industriales')['sum'];
                    $ti = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Sistemas TI y Software')['sum'];
                    $transpCombustible = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Transporte Combustibles')['sum'];
                    $transpPersonal = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Transporte del Personal')['sum'];
                    $vacaciones = ComprobantesModelo::mdlObtenerCostosUnIndustrial($ano,$i,$tabla,'Vacaciones Personal')['sum'];

                    $totalCosto = $arriendoInmu+$arriendoMaqu+$arriendoMaquProp+$arriendoVeh+$combustible+$comunicaciones+$contratista+$desmFaena+$fleteMaquinaria+$gastoViaje+
                        $gastosGenerales+$indemnizaciones+$materialesInsum+$multasInfracc+$patentesMunicipales+$permisoCirc+$remuneraciones+$servicioAlimentacion+$serviciosAdministr+
                        $servicioVigilancia+$servicioTecnico+$ti+$transpCombustible+$transpPersonal+$vacaciones;

                    $ingEgrMaquinaria = '';
                    $resultadoOp = $inresos+$totalCosto;
                    $margenContribPorc = $inresos/$totalCosto;
                    $gavIndustrial = '';
                    $gavUnidadApoyo = '';

                    $totalResultado = '';

                    $mes = array(
                        'ingresos' => $inresos,
                        'arriendoInmu' => $arriendoInmu,
                        'arriendoMaqu' => $arriendoMaqu,
                        'arriendoMaquProp' => $arriendoMaquProp,
                        'arriendoVeh' => $arriendoVeh,
                        'combustible' => $combustible,
                        'comunicaciones' => $comunicaciones,
                        'contratista' => $contratista,
                        'desmFaena' => $desmFaena,
                        'fleteMaquinaria' => $fleteMaquinaria,
                        'gastoViaje' => $gastoViaje,
                        'gastosGenerales' => $gastosGenerales,
                        'indemnizaciones' => $indemnizaciones,
                        'materialesInsum' => $materialesInsum,
                        'multasInfracc' => $multasInfracc,
                        'patentesMunicipales' =>$patentesMunicipales,
                        'permisoCirc' => $permisoCirc,
                        'remuneraciones' =>$remuneraciones,
                        'servicioAlimentacion' =>$servicioAlimentacion,
                        'serviciosAdministr' =>$serviciosAdministr,
                        'servicioVigilancia' => $servicioVigilancia,
                        'servicioTecnico' =>$servicioTecnico,
                        'ti' =>$ti,
                        'transpCombustible' => $transpCombustible,
                        'transpPersonal' => $transpPersonal,
                        'vacaciones' => $vacaciones,
                        'totalCosto' =>$totalCosto,
                        'ingEgrMaquinaria' => $ingEgrMaquinaria,
                        'resultadoOp' =>$resultadoOp,
                        'margenContribPorc' => $margenContribPorc
                    );

                    $consolidado[] = $mes;

                }
                break;


            case 6:
                for ($i=1;$i<=12;$i++)
                {
                    $inresos = ComprobantesModelo::mdlObtenerIngresosMineriaMes($ano,$i,$tabla)['sum'];
                    // Costo Directo
                    $arriendoInmu = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Arriendo Inmuebles')['sum'];
                    $arriendoMaqu = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Arriendo Maquinarias')['sum'];
                    $arriendoMaquProp = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Arriendo Maquinarias Propias')['sum'];
                    $arriendoVeh = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Arriendo Vehiculos')['sum'];
                    $combustible = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Combustible')['sum'];
                    $comunicaciones = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Comunicaciones')['sum'];
                    $contratista = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Contratista')['sum'];
                    $desmFaena = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Demovilización Faenas')['sum'];
                    $fleteMaquinaria = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Flete Maquinarias')['sum'];
                    $gastoViaje = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Gastos de Viaje y Representación')['sum'];
                    $gastosGenerales = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Gastos Generales')['sum'];
                    $indemnizaciones = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Indemnizaciones')['sum'];
                    $materialesInsum = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Mat. E Insumos Varios')['sum'];
                    $multasInfracc = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Multas, Infracciones y Mermas')['sum'];
                    $patentesMunicipales = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Patentes y D° Municipales')['sum'];
                    $permisoCirc = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Permisos de Circulación')['sum'];

                    $remuneraciones = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Remuneraciones y Gastos del Personal')['sum'];
                    $servicioAlimentacion = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Servicio de Alimentación')['sum'];
                    $serviciosAdministr = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Servicios Administrativos')['sum'];
                    $servicioVigilancia = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Servicio de Vigilancia')['sum'];
                    $servicioTecnico = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Servicios Técnicos Industriales')['sum'];
                    $ti = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Sistemas TI y Software')['sum'];
                    $transpCombustible = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Transporte Combustibles')['sum'];
                    $transpPersonal = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Transporte del Personal')['sum'];
                    $vacaciones = ComprobantesModelo::mdlObtenerCostosUnMineria($ano,$i,$tabla,'Vacaciones Personal')['sum'];

                    $totalCosto = $arriendoInmu+$arriendoMaqu+$arriendoMaquProp+$arriendoVeh+$combustible+$comunicaciones+$contratista+$desmFaena+$fleteMaquinaria+$gastoViaje+
                        $gastosGenerales+$indemnizaciones+$materialesInsum+$multasInfracc+$patentesMunicipales+$permisoCirc+$remuneraciones+$servicioAlimentacion+$serviciosAdministr+
                        $servicioVigilancia+$servicioTecnico+$ti+$transpCombustible+$transpPersonal+$vacaciones;

                    $ingEgrMaquinaria = '';
                    $resultadoOp = $inresos+$totalCosto;
                    $margenContribPorc = $inresos/$totalCosto;
                    $gavIndustrial = '';
                    $gavUnidadApoyo = '';

                    $totalResultado = '';

                    $mes = array(
                        'ingresos' => $inresos,
                        'arriendoInmu' => $arriendoInmu,
                        'arriendoMaqu' => $arriendoMaqu,
                        'arriendoMaquProp' => $arriendoMaquProp,
                        'arriendoVeh' => $arriendoVeh,
                        'combustible' => $combustible,
                        'comunicaciones' => $comunicaciones,
                        'contratista' => $contratista,
                        'desmFaena' => $desmFaena,
                        'fleteMaquinaria' => $fleteMaquinaria,
                        'gastoViaje' => $gastoViaje,
                        'gastosGenerales' => $gastosGenerales,
                        'indemnizaciones' => $indemnizaciones,
                        'materialesInsum' => $materialesInsum,
                        'multasInfracc' => $multasInfracc,
                        'patentesMunicipales' =>$patentesMunicipales,
                        'permisoCirc' => $permisoCirc,
                        'remuneraciones' =>$remuneraciones,
                        'servicioAlimentacion' =>$servicioAlimentacion,
                        'serviciosAdministr' =>$serviciosAdministr,
                        'servicioVigilancia' => $servicioVigilancia,
                        'servicioTecnico' =>$servicioTecnico,
                        'ti' =>$ti,
                        'transpCombustible' => $transpCombustible,
                        'transpPersonal' => $transpPersonal,
                        'vacaciones' => $vacaciones,
                        'totalCosto' =>$totalCosto,
                        'ingEgrMaquinaria' => $ingEgrMaquinaria,
                        'resultadoOp' =>$resultadoOp,
                        'margenContribPorc' => $margenContribPorc
                    );

                    $consolidado[] = $mes;

                }
                break;

            case 3:
                for ($i=1;$i<=12;$i++)
                {
                    $inresos = ComprobantesModelo::mdlObtenerIngresosInfraestructuraMes($ano,$i,$tabla)['sum'];
                    // Costo Directo
                    $arriendoInmu = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Arriendo Inmuebles')['sum'];
                    $arriendoMaqu = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Arriendo Maquinarias')['sum'];
                    $arriendoMaquProp = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Arriendo Maquinarias Propias')['sum'];
                    $arriendoVeh = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Arriendo Vehiculos')['sum'];
                    $combustible = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Combustible')['sum'];
                    $comunicaciones = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Comunicaciones')['sum'];
                    $contratista = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Contratista')['sum'];
                    $desmFaena = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Demovilización Faenas')['sum'];
                    $fleteMaquinaria = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Flete Maquinarias')['sum'];
                    $gastoViaje = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Gastos de Viaje y Representación')['sum'];
                    $gastosGenerales = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Gastos Generales')['sum'];
                    $indemnizaciones = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Indemnizaciones')['sum'];
                    $materialesInsum = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Mat. E Insumos Varios')['sum'];
                    $multasInfracc = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Multas, Infracciones y Mermas')['sum'];
                    $patentesMunicipales = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Patentes y D° Municipales')['sum'];
                    $permisoCirc = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Permisos de Circulación')['sum'];

                    $remuneraciones = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Remuneraciones y Gastos del Personal')['sum'];
                    $servicioAlimentacion = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Servicio de Alimentación')['sum'];
                    $serviciosAdministr = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Servicios Administrativos')['sum'];
                    $servicioVigilancia = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Servicio de Vigilancia')['sum'];
                    $servicioTecnico = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Servicios Técnicos Industriales')['sum'];
                    $ti = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Sistemas TI y Software')['sum'];
                    $transpCombustible = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Transporte Combustibles')['sum'];
                    $transpPersonal = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Transporte del Personal')['sum'];
                    $vacaciones = ComprobantesModelo::mdlObtenerCostosUnInfraestructura($ano,$i,$tabla,'Vacaciones Personal')['sum'];

                    $totalCosto = $arriendoInmu+$arriendoMaqu+$arriendoMaquProp+$arriendoVeh+$combustible+$comunicaciones+$contratista+$desmFaena+$fleteMaquinaria+$gastoViaje+
                        $gastosGenerales+$indemnizaciones+$materialesInsum+$multasInfracc+$patentesMunicipales+$permisoCirc+$remuneraciones+$servicioAlimentacion+$serviciosAdministr+
                        $servicioVigilancia+$servicioTecnico+$ti+$transpCombustible+$transpPersonal+$vacaciones;

                    $ingEgrMaquinaria = '';
                    $resultadoOp = $inresos+$totalCosto;
                    $margenContribPorc = $inresos/$totalCosto;
                    $gavIndustrial = '';
                    $gavUnidadApoyo = '';

                    $totalResultado = '';

                    $mes = array(
                        'ingresos' => $inresos,
                        'arriendoInmu' => $arriendoInmu,
                        'arriendoMaqu' => $arriendoMaqu,
                        'arriendoMaquProp' => $arriendoMaquProp,
                        'arriendoVeh' => $arriendoVeh,
                        'combustible' => $combustible,
                        'comunicaciones' => $comunicaciones,
                        'contratista' => $contratista,
                        'desmFaena' => $desmFaena,
                        'fleteMaquinaria' => $fleteMaquinaria,
                        'gastoViaje' => $gastoViaje,
                        'gastosGenerales' => $gastosGenerales,
                        'indemnizaciones' => $indemnizaciones,
                        'materialesInsum' => $materialesInsum,
                        'multasInfracc' => $multasInfracc,
                        'patentesMunicipales' =>$patentesMunicipales,
                        'permisoCirc' => $permisoCirc,
                        'remuneraciones' =>$remuneraciones,
                        'servicioAlimentacion' =>$servicioAlimentacion,
                        'serviciosAdministr' =>$serviciosAdministr,
                        'servicioVigilancia' => $servicioVigilancia,
                        'servicioTecnico' =>$servicioTecnico,
                        'ti' =>$ti,
                        'transpCombustible' => $transpCombustible,
                        'transpPersonal' => $transpPersonal,
                        'vacaciones' => $vacaciones,
                        'totalCosto' =>$totalCosto,
                        'ingEgrMaquinaria' => $ingEgrMaquinaria,
                        'resultadoOp' =>$resultadoOp,
                        'margenContribPorc' => $margenContribPorc
                    );

                    $consolidado[] = $mes;

                }
                break;
        }



        return $consolidado;
    }

// FIN Informe UN

// Informes Comercial


    public static function ctrObtenerIngresosAnuales($ano,$origen)
{
    $tabla = '';
    switch ($origen)
    {
        case 1:
            $tabla = 'he_comprobantes_contables';
            break;

        case 2:
            $tabla = 'he_comprobantes_contables_cierre';
            break;

    }
    $mesActual = date('n');
    $anoActual = date('Y');
    $lista = array();
    for($i = 1 ;$i<=12; $i++)
    {
        if ($anoActual == $ano)
        {
            if ($mesActual > $i) {

                $resultado = ComprobantesModelo::mdlObtenerIngresos($ano, $i,$tabla);
                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => $resultado['sum'],
                    'mesNro' => $i
                );
                $lista[] = $a;
            }else
            {
                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => 0,
                    'mesNro' => $i
                );
                $lista[] = $a;

            }

        }else
        {
            $resultado = ComprobantesModelo::mdlObtenerIngresos($ano, $i);
            $a = array(
                'mes' => nroaMes($i),
                'valor' => $resultado['sum'],
                'mesNro' => $i
            );
            $lista[] = $a;
        }

    }
    return $lista;
}


    public static function ctrObtenerIngresosPeriodo($fechaInicio,$fechaFin,$op,$origen)
    {
        $tabla = '';
        switch ($origen)
        {
            case 1:
                $tabla = 'he_comprobantes_contables';
                break;

            case 2:
                $tabla = 'he_comprobantes_contables_cierre';
                break;

        }
        return  ComprobantesModelo::mdlObtenerIngresosPeriodo($fechaInicio,$fechaFin,$op,$tabla);
    }



    public static function ctrObtenerIngresosAnualesIndustrial($ano,$origen)
    {
        $tabla = '';
        switch ($origen)
        {
            case 1:
                $tabla = 'he_comprobantes_contables';
                break;

            case 2:
                $tabla = 'he_comprobantes_contables_cierre';
                break;

        }
        $anoActual = date('Y');
        //$lista = array();
        //$empresas = ComprobantesModelo::mdlVerEmpresasFactura();

        if ($anoActual == $ano)
        {
            $resultado = ComprobantesModelo::mdlObtenerIngresosIndustrial($ano,$tabla);

            $a = array(
                'empresa' => 'UN Industrial',
                'Enero' => (date('n') > 1 ? $resultado['Enero'] : 0),
                'Febrero' => (date('n') > 2 ? $resultado['Febrero'] : 0),
                'Marzo' => (date('n') > 3 ? $resultado['Marzo'] : 0),
                'Abril' => (date('n') > 4 ? $resultado['Abril'] : 0),
                'Mayo' => (date('n') > 5? $resultado['Mayo'] : 0),
                'Junio' => (date('n') > 6 ? $resultado['Junio'] : 0),
                'Julio' => (date('n') > 7 ? $resultado['Julio'] : 0),
                'Agosto' => (date('n') > 8 ? $resultado['Agosto'] : 0),
                'Septiembre' => (date('n') > 9 ? $resultado['Septiembre'] : 0),
                'Octubre' => (date('n') > 10 ? $resultado['Octubre'] : 0),
                'Noviembre' => (date('n') > 11 ? $resultado['Noviembre'] : 0),
                'Diciembre' => (date('n') > 12 ? $resultado['Diciembre'] : 0)
            );
            $lista[] = $a;

        }else
        {
            $resultado = ComprobantesModelo::mdlObtenerIngresosIndustrial($ano,$tabla);

            $a = array(
                'empresa' => 'UN Industrial',
                'Enero' => $resultado['Enero'],
                'Febrero' => $resultado['Febrero'],
                'Marzo' => $resultado['Marzo'],
                'Abril' => $resultado['Abril'],
                'Mayo' => $resultado['Mayo'],
                'Junio' => $resultado['Junio'],
                'Julio' => $resultado['Julio'],
                'Agosto' => $resultado['Agosto'],
                'Septiembre' => $resultado['Septiembre'],
                'Octubre' => $resultado['Octubre'],
                'Noviembre' => $resultado['Noviembre'],
                'Diciembre' => $resultado['Diciembre']
            );
            $lista[] = $a;

        }




        return $lista;
    }

    public static function ctrObtenerIngresosAnualesMineria($ano,$origen)
    {
        $anoActual = date('Y');
        // --- Valida Origen Datos ---
        $tabla = '';
        switch ($origen)
        {
            case 1:
                $tabla = 'he_comprobantes_contables';
                break;

            case 2:
                $tabla = 'he_comprobantes_contables_cierre';
                break;

        }
        // --- Valida Origen Datos ---

        if ($anoActual == $ano)
        {
            $resultado = ComprobantesModelo::mdlObtenerIngresosMineria($ano,$tabla);


            $a = array(
                'empresa' => 'UN Minería',
                'Enero' => (date('n') > 1 ? $resultado['Enero'] : 0),
                'Febrero' => (date('n') > 2 ? $resultado['Febrero'] : 0),
                'Marzo' => (date('n') > 3 ? $resultado['Marzo'] : 0),
                'Abril' => (date('n') > 4 ? $resultado['Abril'] : 0),
                'Mayo' => (date('n') > 5? $resultado['Mayo'] : 0),
                'Junio' => (date('n') > 6 ? $resultado['Junio'] : 0),
                'Julio' => (date('n') > 7 ? $resultado['Julio'] : 0),
                'Agosto' => (date('n') > 8 ? $resultado['Agosto'] : 0),
                'Septiembre' => (date('n') > 9 ? $resultado['Septiembre'] : 0),
                'Octubre' => (date('n') > 10 ? $resultado['Octubre'] : 0),
                'Noviembre' => (date('n') > 11 ? $resultado['Noviembre'] : 0),
                'Diciembre' => (date('n') > 12 ? $resultado['Diciembre'] : 0)
            );
            $lista[] = $a;


        }else
        {
            $resultado = ComprobantesModelo::mdlObtenerIngresosMineria($ano,$tabla);


            $a = array(
                'empresa' => 'UN Minería',
                'Enero' => $resultado['Enero'],
                'Febrero' => $resultado['Febrero'],
                'Marzo' => $resultado['Marzo'],
                'Abril' => $resultado['Abril'],
                'Mayo' => $resultado['Mayo'],
                'Junio' => $resultado['Junio'],
                'Julio' => $resultado['Julio'],
                'Agosto' => $resultado['Agosto'],
                'Septiembre' => $resultado['Septiembre'],
                'Octubre' => $resultado['Octubre'],
                'Noviembre' => $resultado['Noviembre'],
                'Diciembre' => $resultado['Diciembre']
            );
            $lista[] = $a;
        }

        return $lista;
    }

    public static function ctrObtenerIngresosAnualesInfraestructura($ano,$origen)
    {
        $tabla = '';
        switch ($origen)
        {
            case 1:
                $tabla = 'he_comprobantes_contables';
                break;

            case 2:
                $tabla = 'he_comprobantes_contables_cierre';
                break;

        }
        $anoActual = date('Y');
        //$lista = array();
        //$empresas = ComprobantesModelo::mdlVerEmpresasFactura();

        if ($anoActual == $ano)
        {
            $resultado = ComprobantesModelo::mdlObtenerIngresosInfraestructura($ano,$tabla);

            $a = array(
                'empresa' => 'UN Industrial',
                'Enero' => (date('n') > 1 ? $resultado['Enero'] : 0),
                'Febrero' => (date('n') > 2 ? $resultado['Febrero'] : 0),
                'Marzo' => (date('n') > 3 ? $resultado['Marzo'] : 0),
                'Abril' => (date('n') > 4 ? $resultado['Abril'] : 0),
                'Mayo' => (date('n') > 5? $resultado['Mayo'] : 0),
                'Junio' => (date('n') > 6 ? $resultado['Junio'] : 0),
                'Julio' => (date('n') > 7 ? $resultado['Julio'] : 0),
                'Agosto' => (date('n') > 8 ? $resultado['Agosto'] : 0),
                'Septiembre' => (date('n') > 9 ? $resultado['Septiembre'] : 0),
                'Octubre' => (date('n') > 10 ? $resultado['Octubre'] : 0),
                'Noviembre' => (date('n') > 11 ? $resultado['Noviembre'] : 0),
                'Diciembre' => (date('n') > 12 ? $resultado['Diciembre'] : 0)
            );
            $lista[] = $a;

        }else
        {
            $resultado = ComprobantesModelo::mdlObtenerIngresosInfraestructura($ano,$tabla);

            $a = array(
                'empresa' => 'UN Industrial',
                'Enero' => $resultado['Enero'],
                'Febrero' => $resultado['Febrero'],
                'Marzo' => $resultado['Marzo'],
                'Abril' => $resultado['Abril'],
                'Mayo' => $resultado['Mayo'],
                'Junio' => $resultado['Junio'],
                'Julio' => $resultado['Julio'],
                'Agosto' => $resultado['Agosto'],
                'Septiembre' => $resultado['Septiembre'],
                'Octubre' => $resultado['Octubre'],
                'Noviembre' => $resultado['Noviembre'],
                'Diciembre' => $resultado['Diciembre']
            );
            $lista[] = $a;

        }




        return $lista;
    }

    public static function ctrObtenerIngresosAnualesIndustrialMineria($ano,$origen)
    {
        // --- Valida Origen Datos ---
        $tabla = '';
        switch ($origen)
        {
            case 1:
                $tabla = 'he_comprobantes_contables';
                break;

            case 2:
                $tabla = 'he_comprobantes_contables_cierre';
                break;

        }
        // --- Valida Origen Datos ---
        $anoActual = date('Y');
        //$lista = array();
        //$empresas = ComprobantesModelo::mdlVerEmpresasFactura();

        if ($anoActual == $ano)
        {
            $resultado = ComprobantesModelo::mdlObtenerIngresosIndustrialMineria($ano,$tabla);

            $a = array(
                'empresa' => 'UN Industrial',
                'Enero' => (date('n') > 1 ? $resultado['Enero'] : 0),
                'Febrero' => (date('n') > 2 ? $resultado['Febrero'] : 0),
                'Marzo' => (date('n') > 3 ? $resultado['Marzo'] : 0),
                'Abril' => (date('n') > 4 ? $resultado['Abril'] : 0),
                'Mayo' => (date('n') > 5? $resultado['Mayo'] : 0),
                'Junio' => (date('n') > 6 ? $resultado['Junio'] : 0),
                'Julio' => (date('n') > 7 ? $resultado['Julio'] : 0),
                'Agosto' => (date('n') > 8 ? $resultado['Agosto'] : 0),
                'Septiembre' => (date('n') > 9 ? $resultado['Septiembre'] : 0),
                'Octubre' => (date('n') > 10 ? $resultado['Octubre'] : 0),
                'Noviembre' => (date('n') > 11 ? $resultado['Noviembre'] : 0),
                'Diciembre' => (date('n') > 12 ? $resultado['Diciembre'] : 0)
            );
            $lista[] = $a;

        }else
        {
            $resultado = ComprobantesModelo::mdlObtenerIngresosIndustrial($ano,$tabla);

            $a = array(
                'empresa' => 'UN Industrial',
                'Enero' => $resultado['Enero'],
                'Febrero' => $resultado['Febrero'],
                'Marzo' => $resultado['Marzo'],
                'Abril' => $resultado['Abril'],
                'Mayo' => $resultado['Mayo'],
                'Junio' => $resultado['Junio'],
                'Julio' => $resultado['Julio'],
                'Agosto' => $resultado['Agosto'],
                'Septiembre' => $resultado['Septiembre'],
                'Octubre' => $resultado['Octubre'],
                'Noviembre' => $resultado['Noviembre'],
                'Diciembre' => $resultado['Diciembre']
            );
            $lista[] = $a;

        }




        return $lista;
    }




    public static function ctrObtenerIngresosAnualesAcumuladoIndustrial($ano,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $mesActual = date('n');
        $anoActual = date('Y');
        $sumAcumulado = 0;
        $lista = array();
        for($i = 1 ;$i<=12; $i++)
        {
            if ($ano == $anoActual)
            {
                if ($mesActual > $i) {
                    $resultado = ComprobantesModelo::mdlObtenerIngresosIndustrialMes($ano,$i,$tabla);
                    $sumAcumulado = $sumAcumulado + $resultado['sum'];
                    $a = array(
                        'mes' => nroaMes($i),
                        'valor' => $sumAcumulado,
                        'mesNro' => $i
                    );
                    $lista[] = $a;
                }else
                {
                    $a = array(
                        'mes' => nroaMes($i),
                        'valor' => $sumAcumulado,
                        'mesNro' => $i
                    );

                    $lista[] = $a;

                }

            }else
            {
                $resultado = ComprobantesModelo::mdlObtenerIngresosIndustrialMes($ano,$i,$tabla);
                $sumAcumulado = $sumAcumulado + $resultado['sum'];
                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => $sumAcumulado,
                    'mesNro' => $i
                );
                $lista[] = $a;
            }
        }
        return $lista;
    }


    public static function ctrObtenerIngresosAnualesAcumuladoMineria($ano,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $mesActual = date('n');
        $anoActual = date('Y');

        $sumAcumulado = 0;
        $lista = array();
        for($i = 1 ;$i<=12; $i++)
        {
            if ($ano == $anoActual)
            {
                if ($mesActual > $i) {
                    $resultado = ComprobantesModelo::mdlObtenerIngresosMineriaMes($ano,$i,$tabla);
                    $sumAcumulado = $sumAcumulado + $resultado['sum'];
                    $a = array(
                        'mes' => nroaMes($i),
                        'valor' => $sumAcumulado,
                        'mesNro' => $i
                    );
                    $lista[] = $a;

                }else
                {
                    $a = array(
                        'mes' => nroaMes($i),
                        'valor' => $sumAcumulado,
                        'mesNro' => $i
                    );
                    $lista[] = $a;
                }

            }else
            {
                $resultado = ComprobantesModelo::mdlObtenerIngresosMineriaMes($ano,$i,$tabla);
                $sumAcumulado = $sumAcumulado + $resultado['sum'];
                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => $sumAcumulado,
                    'mesNro' => $i
                );
                $lista[] = $a;
            }


        }
        return $lista;
    }

    public static function ctrObtenerIngresosAnualesAcumuladoInfraestructura($ano,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $mesActual = date('n');
        $anoActual = date('Y');
        $sumAcumulado = 0;
        $lista = array();
        for($i = 1 ;$i<=12; $i++)
        {
            if ($ano == $anoActual)
            {
                if ($mesActual > $i) {
                    $resultado = ComprobantesModelo::mdlObtenerIngresosInfraestructuraMes($ano,$i,$tabla);
                    $sumAcumulado = $sumAcumulado + $resultado['sum'];
                    $a = array(
                        'mes' => nroaMes($i),
                        'valor' => $sumAcumulado,
                        'mesNro' => $i
                    );
                    $lista[] = $a;
                }else
                {
                    $a = array(
                        'mes' => nroaMes($i),
                        'valor' => $sumAcumulado,
                        'mesNro' => $i
                    );

                    $lista[] = $a;

                }

            }else
            {
                $resultado = ComprobantesModelo::mdlObtenerIngresosInfraestructuraMes($ano,$i,$tabla);
                $sumAcumulado = $sumAcumulado + $resultado['sum'];
                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => $sumAcumulado,
                    'mesNro' => $i
                );
                $lista[] = $a;
            }
        }
        return $lista;
    }


    public static function ctrObtenerIngresosAnualesAcumuladoIndustrialMineria($ano,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $mesActual = date('n');
        $anoActual = date('Y');
        $sumAcumulado = 0;
        $lista = array();
        for($i = 1 ;$i<=12; $i++)
        {
            if ($ano == $anoActual)
            {
                if ($mesActual > $i) {
                    $resultado = ComprobantesModelo::mdlObtenerIngresosIndustrialMineriaMes($ano,$i,$tabla);
                    $sumAcumulado = $sumAcumulado + $resultado['sum'];
                    $a = array(
                        'mes' => nroaMes($i),
                        'valor' => $sumAcumulado,
                        'mesNro' => $i
                    );
                    $lista[] = $a;
                }else
                {
                    $a = array(
                        'mes' => nroaMes($i),
                        'valor' => $sumAcumulado,
                        'mesNro' => $i
                    );

                    $lista[] = $a;

                }

            }else
            {
                $resultado = ComprobantesModelo::mdlObtenerIngresosIndustrialMes($ano,$i,$tabla);
                $sumAcumulado = $sumAcumulado + $resultado['sum'];
                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => $sumAcumulado,
                    'mesNro' => $i
                );
                $lista[] = $a;
            }
        }
        return $lista;
    }






    public static function ctrObtenerIngresosAnualesAcumulado($ano,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $mesActual = date('n');
        $anoActual = date('Y');
        $sumAcumulado = 0;
        $lista = array();
        for($i = 1 ;$i<=12; $i++)
        {
            if ($anoActual == $ano)
            {
                if ($mesActual > $i) {
                    $resultado = ComprobantesModelo::mdlObtenerIngresos($ano,$i,$tabla);
                    $sumAcumulado = $sumAcumulado + $resultado['sum'];
                    $a = array(
                        'mes' => nroaMes($i),
                        'valor' => $sumAcumulado,
                        'mesNro' => $i
                    );
                    $lista[] = $a;

                }else
                {
                    $a = array(
                        'mes' => nroaMes($i),
                        'valor' => $sumAcumulado,
                        'mesNro' => $i
                    );
                    $lista[] = $a;

                }

            }else
            {
                $resultado = ComprobantesModelo::mdlObtenerIngresos($ano,$i,$tabla);
                $sumAcumulado = $sumAcumulado + $resultado['sum'];
                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => $sumAcumulado,
                    'mesNro' => $i
                );
                $lista[] = $a;
            }

        }
        return $lista;
    }






    // Metodos para Presupuesto (Deberian ir en modelo de Presupuesto ...)
    public static function ctrObtenerPresupuesto($ano,$tipo)
    {
        $lista = array();
        for($i = 1 ;$i<=12; $i++)
        {
            $resultado = ComprobantesModelo::mdlObtenerPresupuesto($ano,nroaMes($i),$tipo);
            $a = array(
                'mes' => nroaMes($i),
                'valor' => $resultado['sum'],
                'mesNro' => $i,
                'tipo' => $tipo
            );
            $lista[] = $a;
        }
        return $lista;
    }

    public static function ctrObtenerPresupuestoUn($ano,$tipo,$empresa)
    {
        if ($empresa == 'min_ind')
        {
            $lista = array();
            for($i = 1 ;$i<=12; $i++)
            {
                $resultado = ComprobantesModelo::mdlObtenerPresupuestoIndustrialMineria($ano,nroaMes($i),$tipo);
                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => $resultado['sum'],
                    'mesNro' => $i,
                    'tipo' => $tipo
                );
                $lista[] = $a;
            }
        }else
        {
            $lista = array();
            for($i = 1 ;$i<=12; $i++)
            {
                $resultado = ComprobantesModelo::mdlObtenerPresupuestoUn($ano,nroaMes($i),$tipo,$empresa);
                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => $resultado['sum'],
                    'mesNro' => $i,
                    'tipo' => $tipo
                );
                $lista[] = $a;
            }
        }
        return $lista;
    }

    public static function ctrObtenerPresupuestoAcumulado($ano,$tipo)
    {
        $sumAcumulado = 0;
        $lista = array();
        for($i = 1 ;$i<=12; $i++)
        {
            $resultado = ComprobantesModelo::mdlObtenerPresupuesto($ano,nroaMes($i),$tipo);
            $sumAcumulado = $sumAcumulado + $resultado['sum'];

            $a = array(
                'mes' => nroaMes($i),
                'valor' => $sumAcumulado,
                'mesNro' => $i,
                'tipo' => $tipo
            );

            $lista[] = $a;
        }
        return $lista;
    }

    public static function ctrObtenerPresupuestoAcumuladoUn($ano,$tipo,$razsoc)
    {
        $sumAcumulado = 0;
        $lista = array();

        if ($razsoc == 'min_ind')
        {
            for($i = 1 ;$i<=12; $i++)
            {
                $resultado = ComprobantesModelo::mdlObtenerPresupuestoIndustrialMineria($ano,nroaMes($i),$tipo,$razsoc);
                $sumAcumulado = $sumAcumulado + $resultado['sum'];

                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => $sumAcumulado,
                    'mesNro' => $i,
                    'tipo' => $tipo
                );

                $lista[] = $a;
            }
            return $lista;

        }else
        {
            for($i = 1 ;$i<=12; $i++)
            {
                $resultado = ComprobantesModelo::mdlObtenerPresupuestoUn($ano,nroaMes($i),$tipo,$razsoc);
                $sumAcumulado = $sumAcumulado + $resultado['sum'];

                $a = array(
                    'mes' => nroaMes($i),
                    'valor' => $sumAcumulado,
                    'mesNro' => $i,
                    'tipo' => $tipo
                );

                $lista[] = $a;
            }
            return $lista;

        }
    }

    public static function ctrObtenerPresupuestoTabla($ano,$tipo)
    {
        $lista = array(
            0 => $ano,
            1 => '',
            2 => '',
            3 => '',
            4 => '',
            5 => '',
            6 => '',
            7 => '',
            8 => '',
            9 => '',
            10 => '',
            11 => '',
            12 => '',
            13 => $tipo
        );



        for($i = 1 ;$i<=12; $i++)
        {
            $resultado = ComprobantesModelo::mdlObtenerPresupuesto($ano,$i,$tipo);

            if ($resultado != false)
            {
                $lista[$i] = $resultado['Valor'];
            }else
            {
                $lista[$i] = 0;
            }

        }
        return $lista;
    }

    // Metodos para Presupuesto (Deberian ir en modelo de Presupuesto ...)






    // Permite obtener los ingresos anuales por CCO Aanul. Incluye los análisis adiciones por CCO
    public static function ctrObtenerIngresosAnualesCCO($finicio,$ffin,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $listaCCO = TablasModelo::mdlObtenerCCO();
        $listaFinal = array();
        $totalAnual = 0;
        $tmp = ComprobantesModelo::mdlObtenerIngresosAnualesCCO($finicio,$ffin,$tabla);

        foreach ($tmp as $row)
        {
            $totalAnual = $totalAnual + $row['sum'];
        }

        foreach ($tmp as $row)
        {
            foreach ($listaCCO as $row2)
            {
                if ($row['codigo_centro_costo'] == $row2['Id_Dato'])
                {
                    $a = array(
                        'codigo_centro_costo' => $row['codigo_centro_costo'],
                        'nombre_cco' => $row['nombre_cco'],
                        'cliente' => $row2['Analisis_Texto_1'],
                        'zona' => $row2['Analisis_Texto_2'],
                        'industria' => $row2['Analisis_Texto_3'],
                        'totalAnualCCO' => (int)$row['sum'],
                        'porcTotal' => round(($row['sum']*100)/$totalAnual,1),
                        'totalAnual' => $totalAnual
                    );
                    $listaFinal[] = $a;
                }
            }
        }
        return $listaFinal;
    }


    public static function ctrObtenerIngresosAnualesClientes($finicio,$ffin,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $listaFinal = array();
        $totalAnual = 0;
        $tmp = ComprobantesModelo::mdlObtenerIngresosAnualesClientes($finicio,$ffin,$tabla);



        foreach ($tmp as $row)
        {
            $totalAnual = $totalAnual + $row['sum'];
        }

        foreach ($tmp as $row)
        {
            $a = array(
                'cliente' => $row['cliente'],
                'totalAnualCliente' => $row['sum'],
                'porcTotal' => round(($row['sum']*100)/$totalAnual,1),
                'totalAnual' => $totalAnual,
                'color' => ClientesModelo::mdlVerClientesNombre($row['cliente'])['cli_color']
            );
            $listaFinal[] = $a;
        }
        //var_dump($listaFinal);
        return $listaFinal;
    }

    public static function ctrObtenerIngresosAnualesIndustria($finicio,$ffin,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $listaFinal = array();
        $totalAnual = 0;
        $tmp = ComprobantesModelo::mdlObtenerIngresosAnualesIndustria($finicio,$ffin,$tabla);


        foreach ($tmp as $row)
        {
            $totalAnual = $totalAnual + $row['sum'];
        }

        foreach ($tmp as $row)
        {
            $a = array(
                'zona' => $row['zona'],
                'totalAnualCliente' => $row['sum'],
                'porcTotal' => round(($row['sum']*100)/$totalAnual,1),
                'totalAnual' => $totalAnual,
                'color' => coloresIndustria($row['zona'])
            );
            $listaFinal[] = $a;
        }
        //var_dump($listaFinal);
        return $listaFinal;
    }


    public static function ctrObtenerVentasAcumuladasClientes($ano,$mes,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $resu = ComprobantesModelo::mdlObtenerVentasAcumuladasClientes($ano,$mes,$tabla);
        return $resu;
    }


    public static function ctrGraficoZona($finicio,$ffin,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $resultado = self::ctrObtenerIngresosAnualesCCO($finicio,$ffin,$tabla);
        //var_dump($resultado);

        $norte = 0;
        $norteTotal = 0;

        $centro = 0;
        $centroTotal = 0;

        $sur =0;
        $surTotal = 0;

        foreach ($resultado as $row)
        {
            switch ($row['zona'])
            {
                case 'Norte':
                    $norte = $norte + $row['porcTotal'];
                    $norteTotal = $norteTotal + $row['totalAnualCCO'];
                    break;

                case 'Centro':
                    $centro = $centro + $row['porcTotal'];
                    $centroTotal = $centroTotal + $row['totalAnualCCO'];
                    break;

                case 'Sur':
                    $sur = $sur + $row['porcTotal'];
                    $surTotal = $surTotal + $row['totalAnualCCO'];
                    break;
            }
        }


        $lista[] = array(
            'Norte' => $norte,
            'totalNorte' => $norteTotal
        );
        $lista[] = array(
            'Centro' => $centro,
            'totalCentro' => $centroTotal
        );
        $lista[] = array(
            'Sur' => $sur,
            'totalSur' => $surTotal
        );




        /*
        $lista = array(
            'Norte' => $norte,
            'Centro' => $centro,
            'Sur' => $sur
        );*/
        return $lista;

    }

    public static function ctrGraficoCliente($finicio,$ffin,$origen)
    {
        $resultado = self::ctrObtenerIngresosAnualesClientes($finicio,$ffin,$origen);
        return $resultado;
    }

    public static function ctrGraficoIndustria($finicio,$ffin,$origen)
    {
        $resultado = self::ctrObtenerIngresosAnualesIndustria($finicio,$ffin,$origen);
        return $resultado;
    }



    public static function ctrGrafVentasAcumClientes($finicio,$ffin,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $coloresClientes = ['#3e95cd','#8e5ea2','#3cba9f','#e8c3b9','#c45850','#63842B','#1F7CCE','#F9F871','#E69C24','#00C9B6','#B4552F'];
        $total = 0;
        $lista = ComprobantesModelo::mdlObtenerIngresosAcumuladosClientes($finicio,$ffin,$tabla);
        $listaFinal = array();

        foreach ($lista as $row)
        {
            $total = $total + $row['sum'];
        }

        foreach ($lista as $row)
        {
            $a = array(
                'cliente' => $row['clientes'],
                'acumulado' => (int)$row['sum'],
                'porcTotal' => round(($row['sum']*100)/$total,1),
                'totalAcumulado' => $total,
                'color' => ClientesModelo::mdlVerClientesNombre($row['clientes'])['cli_color']
            );
            $listaFinal[] = $a;
        }
        return $listaFinal;
    }

    public static function ctrGrafVentasAcumZona($finicio,$ffin,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $total = 0;
        $lista = ComprobantesModelo::mdlObtenerIngresosAcumuladosZona($finicio,$ffin,$tabla);
        $listaFinal = array();

        foreach ($lista as $row)
        {
            $total = $total + $row['sum'];
        }

        foreach ($lista as $row)
        {
            $a = array(
                'zona' => $row['zona'],
                'acumulado' => (int)$row['sum'],
                'porcTotal' => round(($row['sum']*100)/$total,1),
                'totalAcumulado' => $total
            );
            $listaFinal[] = $a;
        }
        return $listaFinal;
    }

    public static function ctrGrafVentasAcumIndustria($finicio,$ffin,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $total = 0;
        $lista = ComprobantesModelo::mdlObtenerIngresosAcumuladosIndustria($finicio,$ffin,$tabla);
        $listaFinal = array();

        foreach ($lista as $row)
        {
            $total = $total + $row['sum'];
        }

        foreach ($lista as $row)
        {
            $a = array(
                'industria' => $row['industria'],
                'acumulado' => (int)$row['sum'],
                'porcTotal' => round(($row['sum']*100)/$total,1),
                'totalAcumulado' => $total,
                'color' => coloresIndustria($row['industria'])
            );
            $listaFinal[] = $a;
        }
        return $listaFinal;
    }




    /**
     * Utilizado en com_inf_real_budget. Si se especifica false en el 2do argumento, solo muestra venta de empresa IKA Infraestructura
     *
     * @param $ano
     * @return array
     */
    public static function ctrIngresosVentas($ano, $op,$origen)
    {
        $tabla = estableceOrigenDatos($origen);
        $lista = array();
        for($i = 1 ;$i<=12; $i++)
        {
            $resultado = ComprobantesModelo::ctrObtenerIngresosAnuales($ano,$i,$op,$tabla);
            $a = array(
                'mes' => nroaMes($i),
                'valor' => $resultado['sum'],
                'mesNro' => $i
            );

            $lista[] = $a;
        }
        return $lista;
    }










// Informes Comercial


}
